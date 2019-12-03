"use strict";

var elmentWidth;
var scrolls = document.querySelectorAll('.slider_header');
scrolls.forEach(function (element) 
{        
    if (parseInt(element.nextElementSibling.scrollLeft) == 0)
    {
        element.querySelectorAll('div')[0].style.filter = 'grayscale(1)';
    }
    element.querySelector('.slide_left').addEventListener('click', function () 
    {
        elmentWidth = element.nextElementSibling.children[0].offsetWidth + 20;
        element.nextElementSibling.scrollTo(element.nextElementSibling.scrollLeft - elmentWidth, 0);

        (parseInt(element.nextElementSibling.scrollLeft) == 0) ? element.querySelectorAll('div')[0].style.filter = 'grayscale(1)' :  element.querySelectorAll('div')[0].style.filter = 'grayscale(0)';
        (parseInt(element.nextElementSibling.scrollLeft) == parseInt(element.nextElementSibling.scrollWidth) - parseInt(element.nextElementSibling.clientWidth)) ? element.querySelectorAll('div')[1].style.filter = 'grayscale(1)' :  element.querySelectorAll('div')[1].style.filter = 'grayscale(0)';
    });
    element.querySelector('.slide_right').addEventListener('click', function () 
    {
        elmentWidth = element.nextElementSibling.children[0].offsetWidth + 20;
        element.nextElementSibling.scrollTo(element.nextElementSibling.scrollLeft + elmentWidth, 0);

        (parseInt(element.nextElementSibling.scrollLeft) == 0) ? element.querySelectorAll('div')[0].style.filter = 'grayscale(1)' :  element.querySelectorAll('div')[0].style.filter = 'grayscale(0)';
        (parseInt(element.nextElementSibling.scrollLeft) == parseInt(element.nextElementSibling.scrollWidth) - parseInt(element.nextElementSibling.clientWidth)) ? element.querySelectorAll('div')[1].style.filter = 'grayscale(1)' :  element.querySelectorAll('div')[1].style.filter = 'grayscale(0)';
        
    });

});