let checkedProducts;
let allProducts = document.querySelectorAll('.product');
let allChecked = document.querySelectorAll('.product > .container input:checked');
let allCheckbox = document.querySelectorAll('.product > .container input[type=checkbox');

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
    console.log(checkedProducts);
}

allProducts.forEach(function(element)
{
    element.querySelector('input.product-count').addEventListener('change', function()
    {
        update();
    });
});