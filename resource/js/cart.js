let productInCart = [];
let products = document.querySelectorAll('.product');

products.forEach(function(element)
{
    element.querySelector('input.product-count').addEventListener('change', function()
    {
        update();
    });
});

function update()
{
    productInCart = [];
    products.forEach(function(element)
    {   
        productInCart.push([element.querySelector('.article').textContent, element.querySelector('input.product-count').value]);
    });
    console.log(productInCart);
}

update();

let inputAdress = document.querySelector('input#adress');
let displayAdress = document.querySelector('.delivery > .deliv-inf > .address');
inputAdress.addEventListener('input', function()
{
    displayAdress.textContent = inputAdress.value;
})