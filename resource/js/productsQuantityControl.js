let productsQuantityInputs = document.querySelectorAll('.product-count');

productsQuantityInputs.forEach((quantityInput) =>
{
    quantityInput.addEventListener('input', (event) =>
    {
        event.target.value = event.target.value.replace('-', '');
        console.log(event.target.value);

        if (!parseInt(event.target.value))
        {
            event.target.value = 1;
        }

        if (parseInt(event.target.value) > parseInt(event.target.max))
        {
            event.target.value = event.target.max;
        }
    });
});