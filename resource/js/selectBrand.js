let allBrandsList = document.querySelectorAll('.scroll .brand');
let allBrandFiltersList = document.querySelector('.filter[data-specname="Бренд"]');
let allBrandFiltersCheckboxes = document.querySelectorAll('.filter[data-specname="Бренд"] ul li label input[type=checkbox]');
let clickedBrand;
let moreOrLessButton = allBrandFiltersList.querySelector('.filter_button');

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
                
                if (moreOrLessButton)
                {
                    if (i >= 6)
                    {
                        if (moreOrLessButton.textContent == 'Показать еще')
                        {
                            allBrandFiltersList.querySelector('.filter_button').click();
                        }
                    }
                    else if (moreOrLessButton.textContent == 'Скрыть')
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