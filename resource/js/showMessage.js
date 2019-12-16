function showMessaage(messageText)
{
    let messageBox = document.querySelector('.messageBox');
    messageBox.innerHTML += '';
    let message = document.createElement('p');
    message.textContent = messageText;
    messageBox.appendChild(message);

    setTimeout(() =>
    {
        document.querySelectorAll('.messageBox > p')[0].remove();
    }, 2000);

}