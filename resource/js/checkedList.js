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
        checkedProducts.push([elem.parentElement.parentElement.querySelector('.id').textContent, elem.parentElement.parentElement.querySelector('.product-count').value]);
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
    let cartData = new FormData();
    cartData.append('data', JSON.stringify(checkedProducts));

    let connectionCart = fetch('../../model/DeleteFavFromFav.php', 
    {
        method: 'POST',
        body: cartData
    });
    connectionCart.then((result) =>
    {
        result.json().then(result => 
        {
            if (result == 'done')
            {
                document.location.reload();
            }
        });
    });
})

btnInCart.addEventListener('click', function()
{
    let cartData = new FormData();
    cartData.append('data', JSON.stringify(checkedProducts));

    let connectionCart = fetch('../../model/addCartFromFav.php', 
    {
        method: 'POST',
        body: cartData
    });
    connectionCart.then((result) =>
    {
        result.json().then(result => 
        {
            if (result == 'done')
            {
                location.href = './cart.php';
            }
            else
            {
                showMessaage(result);
            }
        });
    });
})