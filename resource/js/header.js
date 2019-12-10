"use strict";

document.querySelector('#catalog').addEventListener('mouseup', function () 
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
    element.addEventListener('click', function () 
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

document.body.addEventListener('mousedown', function (e) 
{   
    if (document.querySelector('.expand-catalog').classList.contains('hide') == false) 
    {
        if (e.target.parentElement.classList.contains('cat_1') == false )
        {
            if (e.target.parentElement.classList.contains('expand-catalog') == false)
            {
                if (e.target.parentElement.classList.contains('nav') == false)
                {
                    if (e.target.parentElement.tagName != 'LI')
                    {
                        document.querySelector('.expand-catalog').classList.add('hide');
                    }
                }
            }
        }
    }
    if (e.target.parentElement === document.body)
    {   
        document.querySelector('#modal_authorize').style.display = 'none';
        document.body.style.overflowY = 'scroll';
        document.body.style.paddingRight = '0px';
    }
}, true);

document.querySelector('#login_button').addEventListener('click', function(e)
{
    e.preventDefault();
    document.querySelector('#modal_authorize').style.display = 'flex';
    document.body.style.overflowY = 'hidden';
    document.body.style.paddingRight = '18px';
});


document.querySelector('#log_form').addEventListener('click', function()
{
    document.querySelector('#log_form').classList.add('active');
    document.querySelector('#reg_form').classList.remove('active');
    document.querySelector('#modal_authorize .modal form.login').style.display = 'flex';
    document.querySelector('#modal_authorize .modal form.register').style.display = 'none';
});

document.querySelector('#reg_form').addEventListener('click', function()
{
    document.querySelector('#reg_form').classList.add('active');
    document.querySelector('#log_form').classList.remove('active');
    document.querySelector('#modal_authorize .modal form.register').style.display = 'flex';
    document.querySelector('#modal_authorize .modal form.login').style.display = 'none';
});