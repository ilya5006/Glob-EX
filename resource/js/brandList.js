let brandsTemp = document.querySelectorAll('.brand > .name');
let brandsLetters = [];
let alphablet = document.createElement('div');
let temp;
let tempAlph = [];
let tempAlphNumLet = [];
let counter = 1;
let lastLetter;

brandsTemp.forEach(function(element)
{
    brandsLetters.push([element.textContent[0], counter]);
    counter++;
});

alphablet.classList.add('alphablet');

counter = 0;
brandsLetters.forEach(function(element)
{
    if (tempAlph.indexOf(element[0]) === -1)
    {
        tempAlph.push(element[0]);
        tempAlphNumLet.push([element[0], element[1], counter]);
        temp = document.createElement('div');
        temp.textContent = element[0];
        temp.addEventListener('click', function()
        {
            document.querySelector('.scroll').scrollTo(((element[1] - 1) * (document.querySelectorAll('.brand')[0].offsetWidth + 20)), 0);
            
            for (let i = 0; i < tempAlphNumLet.length; i++)
            {
                allLetters[i].style.color = '#000000';
                allLetters[i].style.removeProperty('opacity');
            }
        });
        alphablet.appendChild(temp);
        counter++;
    }
});
document.querySelector('.slider_header').after(alphablet);

let allLetters = document.querySelectorAll('.alphablet > div');

document.querySelector('.scroll').addEventListener('scroll', function(element)
{
    for (let i = 0; i < tempAlphNumLet.length; i++)
    {
        if (tempAlphNumLet[i][1] == parseInt(element.target.scrollLeft / (150 + 20)) + 1)
        {
            lastLetter = tempAlphNumLet[i][2];
            allLetters[tempAlphNumLet[i][2]].style.color = '#E31E25';
            allLetters[tempAlphNumLet[i][2]].style.opacity = '1';
        }
        else
        {
            if (i != lastLetter)
            {
                allLetters[i].style.color = '#000000';
                allLetters[i].style.removeProperty('opacity');
            }
        }
    }
});
