function showMessaage(messageText)
{
    let messageBox = document.querySelector('.messageBox');
    let message = document.createElement('p');
    message.textContent = messageText;
    messageBox.appendChild(message);

    setTimeout(function() 
    {
        message.remove();    
    }, 2500);
}