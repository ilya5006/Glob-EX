//img
let puctires = document.querySelectorAll('.product_info .pictures img');
for (let i = 0; i < puctires.length; i++)
{
    puctires[i].addEventListener('click', function()
    {
        showImage(i)
    });
}
function showImage(param)
{
    for (let j = 0; j < puctires.length; j++)
    {
        if (param != j)
        {
            puctires[j].style.order = 'unset';
            puctires[j].classList.remove('big');
            puctires[j].classList.add('little');

        }
        else
        {
            puctires[j].style.order = '-1';
            puctires[j].classList.add('big');
            puctires[j].classList.remove('little');
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

