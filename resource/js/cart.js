let products;
let orderButton = null;
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

            
            document.querySelector(".act > .order-button").addEventListener('click', () =>
            {
                let typesOfPayment = document.querySelectorAll('.pay-type input');
                let address = document.querySelector('#cart-address').value;
                let typesOfDelivery = document.querySelectorAll('.delivery-type input');
                let phoneNumber = document.querySelector('#cart-phone').value;
                let price = document.querySelector('.act-itog span').textContent;

                let typeOfPayment = null;
                let typeOfDelivery = null;

                typesOfPayment.forEach((type) =>
                {
                    if (type.checked)
                    {
                        typeOfPayment = type.value;
                    }
                });
                typesOfDelivery.forEach((type) =>
                {
                    if (type.checked)
                    {
                        typeOfDelivery = type.value;
                    }
                });

                if (!typeOfDelivery)
                {
                    showMessaage('Выберите тип доставки');
                    return 0;
                }

                if (!typeOfPayment)
                {
                    showMessaage('Выберите тип оплаты');
                    return 0;
                }

                let formData = new FormData();
                formData.append('address', address);
                formData.append('type_of_delivery', typeOfDelivery);
                formData.append('type_of_payment', typeOfPayment);
                formData.append('price', price);
                formData.append('phone_number', phoneNumber);

                let connectionOrder = fetch('../../model/makeOrder.php', 
                {
                    method: "POST",
                    body: formData
                });
                
                connectionOrder.then((result) =>
                {
                    result.json().then(result => 
                    {
                        if (result == 'done')
                        {
                            showMessaage('Заказ оформлен');
                            location.href = 'order.php';
                        }
                    });
                });

            });

            document.querySelector('.product > .product-count').addEventListener('input', (event) =>
            {
                event.target.value = event.target.value.replace('-', '');
        
                if (!parseInt(event.target.value))
                {
                    event.target.value = 1;
                }
        
                if (parseInt(event.target.value) > parseInt(event.target.max))
                {
                    event.target.value = event.target.max;
                }
            });
        }
    }
    xhr.open('GET', '../../view/cart.php', true);
    xhr.send();
}

ajax();

//delivery type

let delivOne = document.querySelector('.delivery .delivery-type .type-deliv');
let delivTwo = document.querySelector('.delivery > .delivery-type .type-pickup');

delivOne.addEventListener('click', function()
{
    delivOne.parentElement.classList.add('active');
    delivTwo.parentElement.classList.remove('active');
    document.querySelector('.delivery  #deliv-one').style.display = "flex";
    document.querySelector('.delivery  #deliv-two').style.display = "none";
});

delivTwo.addEventListener('click', function()
{
    delivOne.parentElement.classList.remove('active');
    delivTwo.parentElement.classList.add('active');
    document.querySelector('.delivery #deliv-one').style.display = "none";
    document.querySelector('.delivery #deliv-two').style.display = "flex";
});