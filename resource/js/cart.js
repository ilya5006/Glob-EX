let productInCart = [];
let temp = document.querySelectorAll('.product > .product-info > .article');
temp.forEach(function(element)
{
    productInCart.push(element.textContent);
});
console.log(productInCart);
