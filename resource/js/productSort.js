let sortBlock = document.querySelector('#sort-block');
let sortHor = document.querySelector('#sort-hor');
let listProduct = document.querySelector('.list-products');
let products = document.querySelectorAll('.product');

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

sortBlock.addEventListener('click', function () 
{   
    setBlock();
});

sortHor.addEventListener('click', function () 
{
    setHor();
});

setHor();