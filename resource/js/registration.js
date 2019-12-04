let fio = document.querySelector('#fio_label input');
let email = document.querySelector('#email_label input');
let phoneNumber = document.querySelector('#tel_label input');

let firstPassword = document.querySelector('#passwordRegister');
let secondPassword = document.querySelector('#passwordRegisterAgain');

let individual = document.querySelector('#individual input');
let entities = document.querySelector('#entities input');

let mailing = document.querySelector('#mailing input');

let registerButton = document.querySelector('#registerButton');

let role = -1;

let mailing1 = 0;

registerButton.addEventListener('click', (event) =>
{
    if (individual.checked) role = 0;
    if (entities.checked) role = 1;

    if (firstPassword.value == secondPassword.value)
    {
        let formData = new FormData();
 
        formData.append('fio', fio.value);
        formData.append('role', role);
        formData.append('phone', phoneNumber.value);
        formData.append('email', email.value);
        formData.append('mailing', mailing.checked ? 1 : 0);
        formData.append('password', firstPassword.value);
    
        let connection = fetch('../../model/registration_all.php', 
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
    }
    else
    {
        alert('Второй пароль не соответствует первому');
    }
});