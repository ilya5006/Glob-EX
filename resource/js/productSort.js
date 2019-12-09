let sortBlock = document.querySelector('#sort-block');
let sortHor = document.querySelector('#sort-hor');
let listProduct = document.querySelector('.list-products');
let products = document.querySelectorAll('.product');

let productsSort = document.querySelector('#products_sort');
let productsQuantitySort = document.querySelector('#products_quantity');

let pagination = document.querySelector('.pagination');

console.log(pagination);

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
    if (document.body.clientWidth < 1000)
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

console.log(products);



////////////////////////////////////////////////////////////////////////////////

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

productsQuantitySort.addEventListener('input', productsListUpdate);
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

productsListUpdate();