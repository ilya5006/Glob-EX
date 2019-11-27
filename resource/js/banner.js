"use strict";

var allBaners = document.querySelectorAll(".banners > .banner");
var button;
for (let i = 0; i < allBaners.length; i++) 
{

    button = document.createElement('div');
    button.classList.add('button');
    button.addEventListener('click', function () 
    {
        bannersHide(i);
    });
    document.querySelector(".banners > .buttons").appendChild(button);
}

var allButtons = document.querySelectorAll(".banners > .buttons > .button");

function bannersHide(param) 
{
    for (let j = 0; j < allBaners.length; j++) 
    {
        if (param != j) 
        {
            allBaners[j].classList.add('hide');
            allButtons[j].classList.remove('active');
        } 
        else 
        {
            allBaners[j].classList.remove('hide');
            allButtons[j].classList.add('active');
        }
    }
}

bannersHide(0);