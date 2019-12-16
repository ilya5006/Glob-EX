let additionalInputs = document.querySelectorAll('.additionalAdress');
let additionalAdressButton = document.querySelector('#addAddress');

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