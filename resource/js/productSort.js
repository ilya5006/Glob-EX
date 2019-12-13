let sortBlock = document.querySelector('#sort-block');
let sortHor = document.querySelector('#sort-hor');
let listProduct = document.querySelector('.list-products');
let products = document.querySelectorAll('.product');

// Т.к products - не обычный массив, а NodeList, нам нужно сделать из него массив, чтобы использовать его методы
let productsArray = [];
products.forEach((product) => { productsArray.push(product); });
products = productsArray;

let productsSort = document.querySelector('#products_sort');
let productsQuantitySort = document.querySelector('#products_quantity');

let pagination = document.querySelector('.pagination');

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
    listProduct.style.gridTemplateColumns = 'repeat(auto-fit, minmax(300px, 0fr))';
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

checkSize()

////////////////////////////////////////////////////////////////////////////////

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

let showPages = () =>
{
    pagination.innerHTML = '';

    let pagesQuantity = calculatePagesQuantity();
    pagination.insertAdjacentHTML('beforeEnd', '<li> <a href="#" class="active">1</a></li>');

    for (let page = 2; page <= pagesQuantity; page++)
    {
        pagination.insertAdjacentHTML('beforeEnd', `<li> <a href="#">${page}</a></li>`);
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

productsSort.addEventListener('input', () =>
{
    let selectedValue = productsSort.selectedOptions[0].value
    if (selectedValue == 'low') products = sortProductsAscendingOrDescending(1);
    if (selectedValue == 'hight') products = sortProductsAscendingOrDescending(-1);

    showPages();
    productsListUpdate();
})
productsQuantitySort.addEventListener('input', () =>
{
    showPages();
    productsListUpdate();
});
pagination.addEventListener('click', (event) =>
{
    event.preventDefault();
    
    if (event.target.tagName.toLowerCase() == 'a')
    {
        pagination.querySelector('li .active').classList.remove('active');
        event.target.classList.add('active');
        productsListUpdate();
    }
});

showPages();
productsListUpdate();