let products;
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

                element.querySelector('.delete-cart').addEventListener('click', function()
                {
                    
                    let cartDel = new FormData();
                    cartDel.append('id_product', element.querySelector('.id').textContent);            

                    let connectionDelCart = fetch('../../model/deleteCart.php', 
                    {
                        method: 'POST',
                        body: cartDel
                    });
                    connectionDelCart.then((result) =>
                    {
                        result.json().then(result => 
                        {
                            if (result == 'done')
                            {
                                document.location.reload();
                            }
                            else
                            {
                                //showMessaage(result);
                            }
                        });
                    });
                });
            });
        }
    }
    xhr.open('GET', '../../view/cart.php', true);
    xhr.send();
}

ajax();

//delivery type

let delivOne = document.querySelector('.delivery .delivery-type > .type-deliv');
let delivTwo = document.querySelector('.delivery > .delivery-type > .type-pickup');

delivOne.addEventListener('click', function()
{
    delivOne.classList.add('active');
    delivTwo.classList.remove('active');
    document.querySelector('.delivery > #deliv-one').style.display = "flex";
    document.querySelector('.delivery > #deliv-two').style.display = "none";
});

delivTwo.addEventListener('click', function()
{
    delivOne.classList.remove('active');
    delivTwo.classList.add('active');
    document.querySelector('.delivery > #deliv-one').style.display = "none";
    document.querySelector('.delivery > #deliv-two').style.display = "flex";
});