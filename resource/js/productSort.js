let sortBlock = document.querySelector('#sort-block');
let sortHor = document.querySelector('#sort-hor');
let listProduct = document.querySelector('.list-products');

function setBlock() {
    listProduct.style.display = 'grid';
    listProduct.style.gridGap = '15px';
    listProduct.style.gridTemplateColumns = 'repeat(auto-fit, minmax(300px, 1fr))';
    sortBlock.classList.add('active');
    sortHor.classList.remove('active');
}

function setHor() {}

sortBlock.addEventListener('click', function () 
{
    setBlock();
});

sortHor.addEventListener('click', function () 
{
    setHor();
});

setBlock();