"use strict";

var elmentWidth;
var scrolls = document.querySelectorAll('.slider_header');
scrolls.forEach(function (element) 
{
    element.querySelector('.slide_right').addEventListener('click', function () 
    {
        elmentWidth = element.nextElementSibling.children[0].offsetWidth + 20;
        element.nextElementSibling.scrollTo(element.nextElementSibling.scrollLeft + elmentWidth, 0);
    });
    element.querySelector('.slide_left').addEventListener('click', function () 
    {
        elmentWidth = element.nextElementSibling.children[0].offsetWidth + 20;
        element.nextElementSibling.scrollTo(element.nextElementSibling.scrollLeft - elmentWidth, 0);
    });
});