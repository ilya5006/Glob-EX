let emailOrPhone = document.querySelector('#login');
let password = document.querySelector('#passwordLogin');
let loginButton = document.querySelector('#loginButton');

let emailOrPhoneOkey = false;
let passowrdOkey = false;

emailOrPhone.addEventListener('input', function(element)
{
    if (emailOrPhone.value.length < 3)
    {
        emailOrPhone.style.outline = '1px solid red';
        emailOrPhoneOkey = false;
    }
    else
    {
        emailOrPhone.style.outline = '0px';
        emailOrPhoneOkey = true;
    }
});

password.addEventListener('input', function(element)
{
    if (password.value.length < 5)
    {
        password.style.outline = '1px solid red';
        passowrdOkey = false;
    }
    else
    {
        password.style.outline = '0px';
        passowrdOkey = true;
    }
});

checkValue(emailOrPhone);
checkValue(password);

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
        result.json().then(result => 
        {
            if (result == 'done')
            {
                document.location.reload()
            }
            else
            {
                showMessaage(result);
            }
        });
    });

    connection.catch((error) => 
    {
        showMessaage('Произошла ошибка. Попробуйте зарегестрироваться ещё раз.');
    });
});

function checkValue(element)
{
    if (element.value == "")
    {
        element.style.outline = '1px solid red';
    }
    else
    {
        element.style.outline = '0px';
    }
}