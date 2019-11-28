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
let allFeature = document.querySelectorAll('.features .feature');
let buttoCreated = false;
for (let i = 0; i < allFeature.length; i++)
{
    if (i > 5)
    {
        allFeature[i].style.display = 'none';
        
        if (buttoCreated == false)
        {
            let showAll = document.createElement('p');
            showAll.textContent = "Больше характеристик";
            showAll.classList.add('feature_button');
            let isShow = false;
            showAll.addEventListener('click', function()
            {
                if (isShow == false)
                {
                    for (let i = 0; i < allFeature.length; i++)
                    {
                        if (i > 5)
                        {
                            allFeature[i].style.display = 'block';
                        }   
                    }
                    isShow = true;
                    showAll.textContent = "Скрыть";
                }
                else
                {
                    for (let i = 0; i < allFeature.length; i++)
                    {
                        if (i > 5)
                        {
                            allFeature[i].style.display = 'none';
                        }   
                    }
                    isShow = false;
                    showAll.textContent = "Больше характеристик";
                }
            })
            allFeature[i].parentElement.appendChild(showAll)
            buttoCreated = true;
        }
    }
}