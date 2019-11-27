let allBaners = document.querySelectorAll(".banners > .banner");

let button;
for (let i = 0; i < allBaners.length; i++)
{
    button = document.createElement('div');
    button.classList.add('button');
    button.addEventListener('click', function() { bannersHide(i); });
    document.querySelector(".banners > .buttons").appendChild(button);
}

let allButtons = document.querySelectorAll(".banners > .buttons > .button");

function bannersHide(param)
{
    for (let i = 0; i < allBaners.length; i++)
    {
        if (param != i)
        {
            allBaners[i].classList.add('hide');
            allButtons[i].classList.remove('active');
        }
        else
        {
            allBaners[i].classList.remove('hide');
            allButtons[i].classList.add('active');
        }
    }
}
bannersHide(0);