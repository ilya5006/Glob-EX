//img
let puctures = document.querySelectorAll('.product_info .pictures img.little');
let bigPuctire = document.querySelector('.product_info .pictures img.big');

for (let i = 0; i < puctures.length; i++)
{
    puctures[i].addEventListener('click', function()
    {
        showImage(i)
    });
}
function showImage(param)
{
    for (let j = 0; j < puctures.length; j++)
    {
        if (param != j)
        {
            puctures[j].style.border = '1px solid #DADADA';
        }
        else
        {
            bigPuctire.src = puctures[j].src;
            puctures[j].style.border = '1px solid #E31E25';
        }
    }
}

//filters
let allFeature = document.querySelectorAll('.info > .features .feature');
let buttoCreated = false;
for (let i = 0; i < allFeature.length; i++)
{
    if (i > 5)
    {
        allFeature[i].style.display = 'none';

        // if (buttoCreated == false)
        // {
        //     let showAll = document.createElement('p');
        //     showAll.textContent = "Больше характеристик";
        //     showAll.classList.add('feature_button');

        //     allFeature[i].parentElement.appendChild(showAll);
        //     buttoCreated = true;
        //}
    }
}

document.querySelector('.feature_button').addEventListener('click', function()
{
    document.querySelector('.info_slider > .sliders .slider_d').classList.remove('active');
    document.querySelector('.info_slider > .sliders .slider_f').classList.add('active');
    document.querySelector('.informations .info_d').style.display = 'none';
    document.querySelector('.informations .features').style.display = 'block';
});

//sliders
document.querySelector('.info_slider > .sliders .slider_d').addEventListener('click', function()
{
    document.querySelector('.info_slider > .sliders .slider_d').classList.add('active');
    document.querySelector('.info_slider > .sliders .slider_f').classList.remove('active');
    document.querySelector('.informations .info_d').style.display = 'block';
    document.querySelector('.informations .features').style.display = 'none';
});
document.querySelector('.info_slider > .sliders .slider_f').addEventListener('click', function()
{
    document.querySelector('.info_slider > .sliders .slider_d').classList.remove('active');
    document.querySelector('.info_slider > .sliders .slider_f').classList.add('active');
    document.querySelector('.informations .info_d').style.display = 'none';
    document.querySelector('.informations .features').style.display = 'block';
});

