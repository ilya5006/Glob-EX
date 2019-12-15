﻿let products;
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
    connectionCart.then((result) =>
    {
        result.json().then(result => ajax());
    });
    
    products.forEach(function(element)
    {   
        element.querySelector('.article').textContent, element.querySelector('input.product-count').value;
    });
}

function ajax()
{
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() 
    {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            document.querySelector('#cart-update').innerHTML = xhr.responseText;
            products = document.querySelectorAll('.product');
            products.forEach(function(element)
            {
                element.querySelector('input.product-count').addEventListener('change', function()
                {
                    update(element.querySelector('.id').textContent, element.querySelector('input[type=number]').value);
                });
                element.querySelector('.fav-button').addEventListener('click', function()
                {
                    if (idUser)
                    {
                        let favDara = new FormData();
                        favDara.append('id_product', element.querySelector('.id').textContent);
                        favDara.append('id_user', idUser);
            
                        let connectionFav = fetch('../../model/addFavourite.php', 
                        {
                            method: 'POST',
                            body: favDara
                        });
                        connectionFav.then((result) =>
                        {
                            result.json().then(result => showMessaage(result));
                        });
                    }
                    else
                    {
                        showMessaage('Вы не авторизованны!');
                    }
                });
            });
        }
    }
    xhr.open('GET', '../../view/cart.php', true);
    xhr.send();
}

ajax();