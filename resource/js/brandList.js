let brandsTemp = document.querySelectorAll('.brand > .name');
let brandsLetters = [];
let alphablet = document.createElement('div');
let temp;
let tempAlph = [];
let tempAlphNumLet = [];
let counter = 1;
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
            console.log(brandsTemp[element[1]-1]);
        });
        alphablet.appendChild(temp);
        counter++;
    }
});
document.querySelector('.slider_header').after(alphablet);

let allLetters = document.querySelectorAll('.alphablet > div');

document.querySelector('.scroll').addEventListener('scroll', function(element)
{
    console.log(parseInt(element.target.scrollLeft / (150 + 20)) + 1);
    for (let i = 0; i < tempAlphNumLet.length; i++)
    {
        if (tempAlphNumLet[i][1] == parseInt(element.target.scrollLeft / (150 + 20)) + 1)
        {
            allLetters[tempAlphNumLet[i][2]].style.color = '#E31E25';
            console.log('ебать');
        }
        else
        {
            allLetters[i].style.color = '#000000';
        }
    }
    // if (tempAlphNumLet[parseInt(element.target.scrollLeft / (150 + 20))][1] == parseInt(element.target.scrollLeft / (150 + 20) + 1))
    // {
    //     temp = tempAlphNumLet[parseInt(element.target.scrollLeft / (150 + 20) + 1)][2];
    //     console.log(temp);
    // }
});

//allLetters[parseInt(element.target.scrollLeft / (150 + 20))]);