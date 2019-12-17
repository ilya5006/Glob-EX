let additionalInputs = document.querySelectorAll('.additionalAdress');
let additionalAdressButton = document.querySelector('#addAddress');
let updatePasswordButton = document.querySelector('.changePassword #loginButton');

counter = 0;
additionalAdressButton.addEventListener('click', function()
{
    if (counter < additionalInputs.length)
    {
        additionalInputs[counter].style.display = 'flex';
        counter++;
    }
    else
    {
        additionalAdressButton.style.opacity = 0.5;
        additionalAdressButton.style.cursor = 'default';
        additionalAdressButton.classList.remove('button-anim');
    }
});

document.querySelector('#changePassword').addEventListener('click', function(e)
{
    e.preventDefault();
    document.querySelector('#modal_changePassword').style.display = 'flex';
    document.body.style.overflowY = 'hidden';
    document.body.style.paddingRight = '18px';
});
updatePasswordButton.addEventListener('click', () =>
{
    let currentPassword = document.querySelector('#current-password').value;
    let newPassword = document.querySelector('#new-password').value;
    let newPasswordRepeat = document.querySelector('#re-new-password').value;
    
    let formData = new FormData();
    formData.append('current_password', currentPassword);
    formData.append('new_password', newPassword);
    formData.append('new_password_repeat', newPasswordRepeat);

    let connection = fetch('../../model/updateUserPassword.php', 
    {
        method: 'POST',
        body: formData
    });

    connection.then((result) => result.json().then((message) =>
    {
        showMessaage(message);
    }));
});