let sortBlock = document.querySelector('#sort-block');
let sortHor = document.querySelector('#sort-hor');
let listProduct = document.querySelector('.list-products');
let products = document.querySelectorAll('.product');

// Т.к products - не обычный массив, а NodeList, нам нужно сделать из него обычный массив, чтобы использовать его методы
let productsArray = [];
products.forEach((product) => { productsArray.push(product); });
products = productsArray;
let originalProductsList = productsArray; // READ ONLY

let minPriceInput = document.querySelector('#price-min');
let maxPriceInput = document.querySelector('#price-max');

let productsSort = document.querySelector('#products_sort');
let productsQuantitySort = document.querySelector('#products_quantity');

let brandsSort = document.querySelectorAll('#brands-filter ul li label');

let pagination = document.querySelector('.pagination');

let applyFilters = document.querySelector('#apply_filters');

// Выбранное количество сортировки товаров на странице - productsQuantity.selectedOptions[0].value

let horEnable = true;

function setBlock() 
{
    sortBlock.classList.add('active');
    sortHor.classList.remove('active');

    products.forEach(function(e)
    {
        e.classList.remove('hor');
        e.classList.add('box');
    });

    listProduct.style.display = 'grid';
    listProduct.style.gridGap = '15px';
    listProduct.style.gridTemplateColumns = 'repeat(auto-fit, minmax(300px, 1fr))';
}

function setHor() 
{
    if (horEnable == true)
    {
        sortBlock.classList.remove('active');
        sortHor.classList.add('active');

        products.forEach(function(e)
        {
            e.classList.remove('box');
            e.classList.add('hor');
        });

        listProduct.style.display = 'flex';
        listProduct.style.flexFlow = 'column wrap';
    }
}

sortBlock.addEventListener('click', function () 
{   
    setBlock();
});

sortHor.addEventListener('click', function () 
{
    setHor();
});

setBlock();

window.addEventListener('resize', function()
{
    checkSize();
});

function checkSize()
{
    if (document.body.clientWidth < 1300)
    {
        setBlock();
        horEnable = false;
        sortHor.style.opacity = '0.1';
    }
    else
    {
        sortHor.style.removeProperty('opacity');
        horEnable = true;
    }
}

checkSize();

////////////////////////////////////////////////////////////////////////////////

let toApplyFilters = () =>
{
    let choseSpecs = document.querySelectorAll('.filter .container input:checked');

    // if (choseSpecs.length == 0)
    // {
    //     products = originalProductsList;
    //     showPages(1);
    //     productsListUpdate();
    //     return 0;
    // }
    
    products = [];
    let specsNameValueObject = {};

    let minPrice = parseFloat(minPriceInput.value);
    let maxPrice = parseFloat(maxPriceInput.value);

    choseSpecs.forEach((spec) =>
    {
        //Да, это очень плохой код, но я не знаю, как здесь сделать иначе
        let specName = spec.parentElement.parentElement.parentElement.parentElement.querySelector('p').textContent.slice(0, -1);
        let specValue = spec.parentElement.querySelector('#spec_value').textContent;

        let isSpecNameAlreayInObject = specsNameValueObject[specName];

        if (isSpecNameAlreayInObject)
        {
            specsNameValueObject[specName].push(specValue);
        }
        else
        {
            specsNameValueObject[specName] = [specValue];
        }

    });

    let accpetedFiltersLength = Object.keys(specsNameValueObject).length;

    originalProductsList.forEach((product) =>
    {
        let specsValuesProduct = product.dataset.specs.split(' ; ');
        let suitableFiltersCount = 0;
        let productPrice = parseFloat(product.querySelector('.new-price').textContent);
        
        specsValuesProduct.forEach((oneFilter) =>
        {
            let specValuePair = oneFilter.split(' => ');
            let specName = specValuePair[0];
            let specValue = specValuePair[1];

            if (specsNameValueObject[specName])
            {
                let isSpecInObject = specsNameValueObject[specName].find((element) => 
                { 
                    if (element == specValue) 
                    return true; 
                });

                if (isSpecInObject) suitableFiltersCount++;
            }
        });

        if (accpetedFiltersLength == suitableFiltersCount && productPrice >= minPrice && productPrice <= maxPrice) products.push(product);
    });
    
    showPages(1);
    productsListUpdate();
}

let allFiltersBox = document.querySelectorAll('.filter > ul > li .container input, .fav-act > .check-selecter .container input');
allFiltersBox.forEach(function(element)
{
    element.addEventListener('change', toApplyFilters);
});
slider.noUiSlider.on('change.one', toApplyFilters);

let sortProductsAscendingOrDescending = (ascendingOrDescending) => // Аргумент должен быть равен либо 1 (по возрастанию), либо -1 (по убыванию)
{
    let sortedProducts = products.sort((first, second) =>
    {
        let firstProductPrice = parseFloat(first.querySelector('.product-act .new-price').textContent);
        let secondProductPrice = parseFloat(second.querySelector('.product-act .new-price').textContent);
        if (firstProductPrice > secondProductPrice) return 1 * ascendingOrDescending;
        if (firstProductPrice < secondProductPrice) return -1 * ascendingOrDescending;
        return 0;
    });

    return sortedProducts;
}

let calculatePagesQuantity = () =>
{
    return Math.ceil(products.length / parseInt(productsQuantitySort.selectedOptions[0].value));
}

let showPages = (chosePage) =>
{
    chosePage = parseInt(chosePage)
    pagination.innerHTML = '';

    let pagesQuantity = calculatePagesQuantity(products);

    if (pagesQuantity < 6)
    {
        for (let page = 1; page <= pagesQuantity; page++)
        {
            if (page == chosePage)
            {
                pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#" class="active">${page}</a></li>`);
            }
            else
            {
                pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">${page}</a></li>`);
            }
        }
    }
    else
    {
        if (chosePage > pagesQuantity - 3)
        {
            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">1</a></li>`);
            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">...</a></li>`);
            for (let page = pagesQuantity - 3; page <= pagesQuantity; page++)
            {
                if (page == chosePage)
                {
                    pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#" class="active">${page}</a></li>`);
                }
                else
                {
                    pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">${page}</a></li>`);
                }
            }
        }
        else if (chosePage < 4)
        {
            for (let page = 1; page <= 4; page++)
            {
                if (page == chosePage)
                {
                    pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#" class="active">${page}</a></li>`);
                }
                else
                {
                    pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">${page}</a></li>`);
                }
            }
            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">...</a></li>`);
            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">${pagesQuantity}</a></li>`);
        }
        else
        {
            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">1</a></li>`);
            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">...</a></li>`);
            
            for (let page = chosePage - 1; page <= chosePage + 1; page++)
            {
                if (page == chosePage)
                {
                    pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#" class="active">${page}</a></li>`);
                }
                else
                {
                    pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">${page}</a></li>`);
                }
            }

            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">...</a></li>`);
            pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">${pagesQuantity}</a></li>`);
        }
    }
}

let productsListUpdate = () =>
{
    listProduct.innerHTML = '';

    let activePage = parseInt(pagination.querySelector('li .active').textContent);

    let quantitySelected = parseInt(productsQuantitySort.selectedOptions[0].value);

    let firstProductToShow = (activePage - 1) * quantitySelected;

    for (let i = firstProductToShow; i < products.length && i < firstProductToShow + quantitySelected; i++)
    {
        listProduct.insertAdjacentElement('beforeEnd', products[i]);
    }
}

showPages(1);
productsListUpdate();

productsSort.addEventListener('input', () =>
{
    let selectedValue = productsSort.selectedOptions[0].value;
    if (selectedValue == 'low') products = sortProductsAscendingOrDescending(1);
    if (selectedValue == 'hight') products = sortProductsAscendingOrDescending(-1);

    showPages(1);
    productsListUpdate();
});
productsQuantitySort.addEventListener('input', () =>
{
    showPages(1);
    productsListUpdate();
});
pagination.addEventListener('click', (event) =>
{
    event.preventDefault();
    
    if (event.target.tagName.toLowerCase() == 'a')
    {
        pagination.querySelector('li .active').classList.remove('active');
        event.target.classList.add('active');
        showPages(event.target.textContent);
        productsListUpdate();
    }
});

applyFilters.addEventListener('click', () =>
{
    toApplyFilters();
});

