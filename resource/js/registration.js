let fio = document.querySelector('#fio_label input');
let email = document.querySelector('#email_label input');
let phoneNumber = document.querySelector('#tel_label input');

let firstPassword = document.querySelector('#passwordRegister');
let secondPassword = document.querySelector('#passwordRegisterAgain');

let individual = document.querySelector('#individual input');
let entities = document.querySelector('#entities input');

let mailing = document.querySelector('#mailing input');

let registerButton = document.querySelector('#registerButton');

let personalData = document.querySelector('#personal_data input');
let role = -1;
let mailing1 = 0;

// Проверка на данные
let fioOkay = false;
let emailOkay = false;
let phoneNumberOkay = false;
let passwordsOkay = false;
let userTypeOkay = false;
let personalDataOkay = false;

function checkValue(element)
{
    element.addEventListener('input', () =>
    {
        if (element.value == "")
        {
            element.style.outline = '1px solid red';
        }
    });
    element.style.outline = '1px solid red';
}
checkValue(fio);
checkValue(email);
checkValue(phoneNumber);
checkValue(firstPassword);
checkValue(secondPassword);

//checkpassord
firstPassword.addEventListener('input', checkPassowrd);
secondPassword.addEventListener('input', checkPassowrd);

function checkPassowrd()
{
    if (firstPassword.value == secondPassword.value)
    {
        if (firstPassword.value != '' && secondPassword.value != '')
        {
            if (firstPassword.value.length > 5 || secondPassword.value.length > 5)
            {
                firstPassword.style.outline = '1px solid green';
                secondPassword.style.outline = '1px solid green';
                passwordsOkay = true;
            }
            else
            {
                firstPassword.style.outline = '1px solid red';
                secondPassword.style.outline = '1px solid red';
                passwordsOkay = false;
            }
        }
        else
        {
            firstPassword.style.outline = '1px solid red';
            secondPassword.style.outline = '1px solid red';
            passwordsOkay = false;
        }
    }
    else
    {
        firstPassword.style.outline = '1px solid red';
        secondPassword.style.outline = '1px solid red';
        passwordsOkay = false;
    }
}

// фио
fio.addEventListener('input', function()
{
    if(fio.value.match(/^[a-zA-ZА-Яа-яё]{1,}([-][a-zA-ZА-Яа-я][а-яё]{1,})?\s[a-zA-ZА-Яа-яё][a-zA-ZА-Яа-яё]{1,}/i))
    {
        fioOkay = true;
        fio.style.outline = '1px solid green';
    }
    else
    {
        fioOkay = false;
        fio.style.outline = '1px solid red';
    }
});

// телефончик
phoneNumber.addEventListener('input', function()
{
    if(phoneNumber.value.match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im))
    {
        phoneNumberOkay = true;
        phoneNumber.style.outline = '1px solid green';
    }
    else
    {
        phoneNumberOkay = false;
        phoneNumber.style.outline = '1px solid red';
    }
});


// емаил
email.addEventListener('input', function()
{
    if(email.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
    {
        emailOkay = true;
        email.style.outline = '1px solid green';
    }
    else
    {
        emailOkay = false;
        email.style.outline = '1px solid red';
    }
});

individual.addEventListener('input', function() { userTypeOkay = true; });
entities.addEventListener('input', function() { userTypeOkay = true; });

personalData.addEventListener('input', function() { personalDataOkay = personalData.checked; });

// уже сама регистрация
registerButton.addEventListener('click', () =>
{
    if (fioOkay == false) { showMessaage('Неверное ФИО.'); }
    if (emailOkay == false) { showMessaage('Неверная почта.'); }
    if (phoneNumberOkay == false) { showMessaage('Неверный номер.'); }
    if (passwordsOkay == false) { showMessaage('Неподходящий пароль или они не совпадат.'); }
    if (userTypeOkay == false) { showMessaage('Вы не выбрали кто вы.'); }
    if (personalDataOkay == false) { showMessaage('Вы против обработки персональных данных.'); }

    if (individual.checked) role = 0;
    if (entities.checked) role = 1;

    if (fioOkay == true) 
    {
        if (emailOkay == true) 
        { 
            if (phoneNumberOkay == true) 
            {
                if (passwordsOkay == true) 
                { 
                    if (userTypeOkay == true) 
                    {
                        if (personalDataOkay == true) 
                        {    

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
                                    result.json().then(result => 
                                    {
                                        showMessaage(result);
                                    });
                                });
                            
                                connection.catch((error) => 
                                {
                                    showMessaage('Произошла ошибка. Попробуйте зарегистрироваться ещё раз.');
                                });
                            }
                            else
                            {
                                showMessaage('Второй пароль не соответствует первому');
                            }

                        }
                    }
                }
            }
        }
    }
});