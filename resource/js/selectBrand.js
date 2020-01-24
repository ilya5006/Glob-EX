let allBrandsList = document.querySelectorAll('.scroll .brand');
let allBrandFiltersList = document.querySelector('.filter[data-sepcname="Бренд"]');
let allBrandFiltersCheckboxes = document.querySelectorAll('.filter[data-sepcname="Бренд"] ul li label input[type=checkbox]');
let clickedBrand;

allBrandsList.forEach((event) => 
{
    event.addEventListener('click', (b) =>
    {
        b.preventDefault();
        clickedBrand = b.target.parentElement.querySelector('span').textContent;
        
        allBrandFiltersCheckboxes.forEach((f, i) =>
        {   
            if (f.value === clickedBrand)
            {
                f.checked = true;
                
                if (allBrandFiltersList.querySelector('.filterHide').style.transform == "rotate(0deg)")
                {
                    allBrandFiltersList.querySelector('.filterHide').click();
                }
                
                
                toApplyFilters();
                if (i >= 6)
                {
                    if (allBrandFiltersList.querySelector('.filter_button').textContent == 'Показать еще')
                    {
                        allBrandFiltersList.querySelector('.filter_button').click();
                    }
                }
                else
                {
                    if (allBrandFiltersList.querySelector('.filter_button').textContent == 'Скрыть')
                    {
                        allBrandFiltersList.querySelector('.filter_button').click();
                    }
                }
            }
            else
            {
                f.checked = false;
            }
        });
    });
});