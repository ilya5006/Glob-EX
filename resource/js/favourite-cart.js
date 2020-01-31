function getCookie(name) 
{
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

let idUser = getCookie('isLogin');

allProducts = document.querySelectorAll('.product');
if(typeof(originalProductsList) != "undefined" && originalProductsList !== null) { allProducts = [...originalProductsList]; }
let idProduct;

allProducts.forEach(function(element)
{
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

    if (element.querySelector('.cart'))
    {
        element.querySelector('.cart').addEventListener('click', function()
        {
            if (idUser)
            {
                let cartData = new FormData();
                cartData.append('id_product', element.querySelector('.id').textContent);
                cartData.append('id_user', idUser);
                if (element.querySelector('input[type=number]')) { cartData.append('product_count', element.querySelector('input[type=number]').value); }
                else { cartData.append('product_count', '1'); }

                let connectionCart = fetch('../../model/addCart.php', 
                {
                    method: 'POST',
                    body: cartData
                });
                connectionCart.then((result) =>
                {
                    result.json().then(result => showMessaage(result));
                });
            }
            else
            {
                showMessaage('Вы не авторизованны!');
            }
        });
    }
});

if (document.querySelector('.product_info'))
{
    document.querySelector('.product_info').querySelector('.cart').addEventListener('click', function(e)
    {
        e.preventDefault();
        if (idUser)
        {
            let cartData = new FormData();
            cartData.append('id_product', document.querySelector('.product_info').querySelector('.id').textContent);
            cartData.append('id_user', idUser);
            if (document.querySelector('.product_info').querySelector('input[type=number]')) { cartData.append('product_count', document.querySelector('.product_info').querySelector('input[type=number]').value); }
            else { cartData.append('product_count', '1'); }

            let connectionCart = fetch('../../model/addCart.php', 
            {
                method: 'POST',
                body: cartData
            });
            connectionCart.then((result) =>
            {
                result.json().then(result => showMessaage(result));
            });
        }
        else
        {
            showMessaage('Вы не авторизованны!');
        }
    });

    document.querySelector('.product_info').querySelector('.fav-button').addEventListener('click', function(e)
    {
        e.preventDefault();
        if (idUser)
        {
            let favDara = new FormData();
            favDara.append('id_product', document.querySelector('.product_info').querySelector('.id').textContent);
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
}