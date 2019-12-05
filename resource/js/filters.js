let slider = document.getElementById('slider');
let priceMin = document.getElementById('price-min');
let priceMax = document.getElementById('price-max');

noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        'min': 0,
        'max': 100
    },
    step: 10
});

slider.noUiSlider.on('update', function (values, handle) {
    priceMin.value = values[0];
});
priceMin.addEventListener('change', function () {
    slider.noUiSlider.set([this.value, slider.noUiSlider.get()[1]]);
});

slider.noUiSlider.on('update', function (values, handle) {
    priceMax.value = values[1];
});
priceMax.addEventListener('change', function () {
    slider.noUiSlider.set([slider.noUiSlider.get()[0], this.value]);
});

// filters
let buttoCreated;
let filterHide;
let allFilters = document.querySelectorAll('.filters .filter');
allFilters.forEach(function (element) {
    element.querySelector('ul').style.display = 'block';

    let buttoCreated = false;
    for (let i = 0; i < element.querySelectorAll('label').length; i++) {
        if (i > 5) {
            element.querySelectorAll('label')[i].style.display = 'none';

            if (buttoCreated == false) {
                let buttonExpandFilter = document.createElement('div');
                buttonExpandFilter.textContent = "Показать еще";
                buttonExpandFilter.classList.add('filter_button');
                let isShow = false;
                buttonExpandFilter.addEventListener('click', function () {
                    if (isShow == false) {
                        for (let i = 0; i < element.querySelectorAll('label')
                            .length; i++) {
                            if (i > 5) {
                                element.querySelectorAll('label')[i].style.display =
                                    'block';
                            }
                        }
                        isShow = true;
                        buttonExpandFilter.textContent = "Скрыть";
                    } else {
                        for (let i = 0; i < element.querySelectorAll('label')
                            .length; i++) {
                            if (i > 5) {
                                element.querySelectorAll('label')[i].style.display =
                                    'none';
                            }
                        }
                        isShow = false;
                        buttonExpandFilter.textContent = "Показать еще";
                    }
                });
                element.querySelector('ul').appendChild(buttonExpandFilter);
                buttoCreated = true;
            }
        }
    }
    filterHide = document.createElement('div');
    filterHide.textContent = "<";
    filterHide.classList.add('filterHide');
    filterHide.addEventListener('click', function (elem) {
        if (element.querySelector('ul').style.display == 'block') {
            element.querySelector('ul').style.display = 'none';
            elem.target.textContent = ">"
        } else {
            element.querySelector('ul').style.display = 'block';
            elem.target.textContent = "<"
        }
    });
    element.querySelector('p').appendChild(filterHide);
});

function checkSize()
{
    if (document.body.clientWidth < 1400)
    {
        setBlock();
        horEnable = false;
        sortHor.style.opacity = '0.1';
    }
    else
    {
        sortHor.style.removeProperty('opacity');
        horEnable = true;
    }
}