"use strict";

var elmentWidth;
var scrolls = document.querySelectorAll('.slider_header');
scrolls.forEach(function (element) 
{       
    checkSlide(element);
    element.querySelector('.slide_left').addEventListener('click', function () 
    {
        elmentWidth = element.nextElementSibling.children[0].offsetWidth + 20;
        element.nextElementSibling.scrollTo(element.nextElementSibling.scrollLeft - elmentWidth, 0);
        checkSlide(element);
    });
    element.querySelector('.slide_right').addEventListener('click', function () 
    {
        elmentWidth = element.nextElementSibling.children[0].offsetWidth + 20;
        element.nextElementSibling.scrollTo(element.nextElementSibling.scrollLeft + elmentWidth, 0);
        checkSlide(element);
    });
});

function checkSlide(elem)
{
    if (parseInt(elem.nextElementSibling.scrollLeft) == 0) 
    {
        elem.querySelectorAll('div')[0].style.filter = 'grayscale(1)';
        elem.querySelectorAll('div')[0].classList.remove('slide_anim');
    } 
    else 
    {
        elem.querySelectorAll('div')[0].style.filter = 'grayscale(0)';
        elem.querySelectorAll('div')[0].classList.add('slide_anim');
    }

    
    if (parseInt(elem.nextElementSibling.scrollLeft) == parseInt(elem.nextElementSibling.scrollWidth) - parseInt(elem.nextElementSibling.clientWidth))
    { 
        elem.querySelectorAll('div')[1].style.filter = 'grayscale(1)';
        elem.querySelectorAll('div')[1].classList.remove('slide_anim');
    } 
    else 
    {
        elem.querySelectorAll('div')[1].style.filter = 'grayscale(0)';
        elem.querySelectorAll('div')[1].classList.add('slide_anim'); 
    }
}