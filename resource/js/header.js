"use strict";

document.querySelector('#catalog').addEventListener('click', function () 
{
    if (document.querySelector('.expand-catalog').classList.contains('hide')) 
    {
        document.querySelector('.expand-catalog').classList.remove('hide');
    } 
    else 
    {
        document.querySelector('.expand-catalog').classList.add('hide');
    }
});

document.querySelectorAll('.cat_1').forEach(function (element) 
{
    element.addEventListener('mouseenter', function () 
    {
        if (element.nextElementSibling.classList.contains('expand-cat_2')) 
        {
            element.nextElementSibling.classList.remove('hide');
        }
    });
    element.addEventListener('mouseleave', function () 
    {
        if (element.nextElementSibling.classList.contains('expand-cat_2')) 
        {
            element.nextElementSibling.classList.add('hide');
        }
    });
});

var allExpandButton = document.querySelectorAll('.catalog_expand_button');
allExpandButton.forEach(function (element) 
{
    element.addEventListener('click', function () 
    {
        document.querySelector('.expand-catalog').classList.remove('hide');
        document.body.scrollTo(0, 0);
    });
});

document.body.addEventListener('click', function () 
{
    if (document.querySelector('.expand-catalog').classList.contains('hide') == false) 
    {
        document.querySelector('.expand-catalog').classList.add('hide');
    }
}, true);

document.querySelector('#login_button').addEventListener('click', function(e)
{
    e.preventDefault();
    document.querySelector('#modal_authorize').style.display = 'flex';
    document.body.style.overflow = 'hidden';
});

document.querySelector('#close_modal').addEventListener('click', function()
{
    document.querySelector('#modal_authorize').style.display = 'none';
    document.body.style.overflow = 'scroll';
});