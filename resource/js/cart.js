let productInCart = [];
let products = document.querySelectorAll('.product');

products.forEach(function(element)
{
    element.querySelector('input.product-count').addEventListener('change', function()
    {
        update(element.querySelector('.id').textContent, element.querySelector('input[type=number]').value);
    });
});

function update(id_product, product_count)
{
    let cartUpdate = new FormData();
    cartUpdate.append('id_product', id_product);
    cartUpdate.append('product_count', product_count);
    
    let connectionCart = fetch('../../model/updateCart.php', 
    {
        method: 'POST',
        body: cartUpdate
    });
    // connectionCart.then((result) =>
    // {
    //     result.text().then(result => console.log(result));
    // });
    productInCart = [];
    products.forEach(function(element)
    {   
        element.querySelector('.article').textContent, element.querySelector('input.product-count').value
    });
}