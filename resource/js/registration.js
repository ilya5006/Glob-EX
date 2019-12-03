let fio = document.querySelector('#fio_label input');
let email = document.querySelector('#email_label input');
let phoneNumber = document.querySelector('#tel_label input');

let firstPassword = document.querySelector('#first_password');
let secondPassword = document.querySelector('#second_password');

let individual = document.querySelector('#individual input');
let entities = document.querySelector('#entities input');

let mailing = document.querySelector('#mailing input');

let registerButton = document.querySelector('#registerButton');

let role;

let mailing1 = 0;

document.querySelector('.register').preventDefault();

registerButton.addEventListener('click', (event) =>
{
    if (individual.checked) role = 0;
    if (entities.checked) role = 1;

    if (mailing.checked) mailing1 = 1;
    else mailing1 = 0;

    if (firstPassword.value == secondPassword.value)
    {
        let formData = new FormData();
 
        formData.append('fio', fio.value);
        formData.append('role', role);
        formData.append('phone', phoneNumber.value);
        formData.append('email', email.value);
        formData.append('mailing', mailing1);
        formData.append('password', firstPassword.value);
    
        let connection = fetch('../../model/registration_all.php', 
        {
            method: 'POST',
            body: formData
        });
    
        connection.then((result) =>
        {
            alert('Регистрация прошла успешно');
        });
    
        connection.catch((error) => 
        {
            alert('Какая-то ошибка: ' + error);
        });
    }
    else
    {
        alert('Второй пароль не соответствует первому');
    }
});