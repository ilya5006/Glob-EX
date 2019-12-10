let emailOrPhone = document.querySelector('#login');
let password = document.querySelector('#passwordLogin');
let loginButton = document.querySelector('#loginButton');

loginButton.addEventListener('click', () =>
{
    let formData = new FormData();
    formData.append('emailOrPhoneNumber', emailOrPhone.value);
    formData.append('password', password.value);

    let connection = fetch('../../model/login.php', 
    {
        method: 'POST',
        body: formData
    });

    connection.then((result) =>
    {
        result.json().then(result => alert(result));
    });

    connection.catch((error) => 
    {
        alert('Произошла ошибка. Попробуйте зарегестрироваться ещё раз.');
    });
});