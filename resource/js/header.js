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

let allExpandButton = document.querySelectorAll('.catalog_expand_button');
allExpandButton.forEach(function(element)
{
    element.addEventListener('click', function()
    {
        document.querySelector('.expand-catalog').classList.remove('hide');
        document.body.scrollTo(0, 0);
    });
});

document.body.addEventListener('click', function()
{
    if (document.querySelector('.expand-catalog').classList.contains('hide') == false)
    {
        document.querySelector('.expand-catalog').classList.add('hide');
    }
}, true);