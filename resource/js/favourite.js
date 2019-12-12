function getCookie(name) 
{
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

let idUser = getCookie('isLogin');

let allProducts = document.querySelectorAll('.product');
let idProduct;

allProducts.forEach(function(element)
{
    element.querySelector('.fav-button').addEventListener('click', function()
    {
        let formData = new FormData();
        formData.append('id_product', element.querySelector('.id').textContent);
        formData.append('id_user', idUser);

        let connection = fetch('../../model/addFavourite.php', 
        {
            method: 'POST',
            body: formData
        });
        connection.then((result) =>
        {
            result.json().then(result => showMessaage(result));
        });
    });
});