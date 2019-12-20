// "use strict";

// При генерации каталога могут появляться пустые <ul>
document.querySelectorAll('.expand-catalog .expand-cat_2 ul').forEach(function(element)
{
    if (element.textContent == "")
    {
        element.remove();
    }
});


// Разворачивание кнопки "каталог товаров"
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

// Разворачивание каталога 1 уровня
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

// Чтобы при нажатии на блок с надписью "каталог" разварачивался каталогы
var allExpandButton = document.querySelectorAll('.catalog_expand_button');
allExpandButton.forEach(function (element) 
{
    element.addEventListener('click', function () 
    {
        document.querySelector('.expand-catalog').classList.remove('hide');
        document.body.scrollTo(0, 0);
    });
});

document.body.addEventListener('click', function (e) 
{   
    if (document.querySelector('.expand-catalog').classList.contains('hide') == false) 
    {
        if (e.target.parentElement.classList.contains('cat_1') == false )
        {
            if (e.target.parentElement.classList.contains('expand-catalog') == false)
            {
                if (e.target.parentElement.classList.contains('nav') == false)
                {
                    if (e.target.parentElement.tagName.toUpperCase != 'LI')
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
        if (document.querySelector('#modal_changePassword')) { document.querySelector('#modal_changePassword').style.display = 'none'; }
        document.body.style.overflowY = 'scroll';
        document.body.style.paddingRight = '0px';
    }
}, true);

if (document.querySelector('#login_button'))
{
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
        document.querySelector('#modal_authorize .modal form.password_recovery').style.display = 'none';
    });

    document.querySelector('#reg_form').addEventListener('click', function()
    {
        document.querySelector('#reg_form').classList.add('active');
        document.querySelector('#log_form').classList.remove('active');
        document.querySelector('#modal_authorize .modal form.register').style.display = 'flex';
        document.querySelector('#modal_authorize .modal form.login').style.display = 'none';
        document.querySelector('#modal_authorize .modal form.password_recovery').style.display = 'none';
    });
}

// SEARCH
let searchInput = document.querySelector('.header .content .nav form input[type="search"]');
let searchResult = document.querySelector('#searchResult');
let data;
searchInput.addEventListener('input', function()
{
    searchInput.value = searchInput.value.toUpperCase();
    let xhr = new XMLHttpRequest();
    xhr.open('POST', './../../model/searchOutput.php', true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    data = "search=" + searchInput.value;

    xhr.send(data);

    xhr.onreadystatechange = function()
    {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            searchResult.innerHTML = xhr.responseText;
        }
    };
});

document.addEventListener("keydown", function (event)
{
    if (event.code == 'Escape') 
    {
        document.querySelector('#modal_authorize').style.display = 'none';
        if (document.querySelector('#modal_changePassword')) { document.querySelector('#modal_changePassword').style.display = 'none'; }
        document.body.style.overflowY = 'scroll';
        document.body.style.paddingRight = '0px';
    }
});

document.querySelector('.forget_password').addEventListener('click', function()
{
    document.querySelector('#reg_form').classList.remove('active');
    document.querySelector('#log_form').classList.remove('active');
    document.querySelector('#modal_authorize .modal form.register').style.display = 'none';
    document.querySelector('#modal_authorize .modal form.login').style.display = 'none';
    document.querySelector('#modal_authorize .modal form.password_recovery').style.display = 'flex';
});

document.querySelector('#modal_authorize .modal form.password_recovery .passwordRecoveryBack').addEventListener('click', function()
{
    document.querySelector('#log_form').classList.remove('add');
    document.querySelector('#modal_authorize .modal form.register').style.display = 'none';
    document.querySelector('#modal_authorize .modal form.login').style.display = 'flex';
    document.querySelector('#modal_authorize .modal form.password_recovery').style.display = 'none';
});