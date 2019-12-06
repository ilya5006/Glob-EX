let checkedProducts;
let allChecked = document.querySelectorAll('.product > .container input:checked');
let allCheckbox = document.querySelectorAll('.product > .container input[type=checkbox');
allCheckbox.forEach(function(element)
{
    element.addEventListener('change', function()
    {
        allChecked = document.querySelectorAll('.product > .container input:checked');
        checkedProducts = [];
        allChecked.forEach(function(elem)
        {
            checkedProducts.push(elem.parentElement.parentElement.querySelector('.article').textContent);
        });
        console.log(checkedProducts);
    });
});