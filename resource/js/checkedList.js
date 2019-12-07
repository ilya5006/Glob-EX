let checkedProducts;
let allProducts = document.querySelectorAll('.product');
let allChecked = document.querySelectorAll('.product > .container input:checked');
let allCheckbox = document.querySelectorAll('.product > .container input[type=checkbox');
let countPanel = document.querySelector('.check-selecter');
let checkedCount = document.querySelector('.text-selected > .selected-count');

let btnDelete = document.querySelector('.fav-act > .check-selecter p.delete');
let btnInCart = document.querySelector('.fav-act > .check-selecter p.in-cart');

allCheckbox.forEach(function(element)
{
    element.addEventListener('change', function()
    {
        update();
    });
});

function update()
{
    allChecked = document.querySelectorAll('.product > .container input:checked');
    checkedProducts = [];
    allChecked.forEach(function(elem)
    {
        checkedProducts.push([elem.parentElement.parentElement.querySelector('.article').textContent, elem.parentElement.parentElement.querySelector('.product-count').value]);
    });
    checkedCount.textContent = checkedProducts.length;
    if (checkedProducts.length >= 1)
    {
        countPanel.style.display = 'flex';
    }
    else
    {
        countPanel.style.display = 'none';
    }
    console.log(checkedProducts);
}

allProducts.forEach(function(element)
{
    element.querySelector('input.product-count').addEventListener('change', function()
    {
        update();
    });
});

btnDelete.addEventListener('click', function()
{
    // сюда код, когда жмёшь УДАЛИТЬ
})

btnInCart.addEventListener('click', function()
{
    // сюда код, когда жмёшь В КОРЗИНУ
})