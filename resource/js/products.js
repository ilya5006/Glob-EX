let bannersDiv = document.querySelector('.scroll');

let xmlhttp = new XMLHttpRequest();

xmlhttp.open('GET', './resource/xml/catalog_3.xml', false);
xmlhttp.send();

let xmlDoc = xmlhttp.responseXML;
let brands = xmlDoc.querySelectorAll('data brands value');

brands.forEach((brand) =>
{
    brand.attributes.image.nodeValue = brand.attributes.image.nodeValue.replace('user587s.beget.tech', 'user587s:CgIc6Wbt@user587s.beget.tech');
    let imagePath = brand.attributes.image.nodeValue;
    //bannersDiv.innerHTML += `<a href="#" class="brand"><img src="./../resource/img/brands/1.jpg"></a>`;
});

xmlhttp.open('GET', brands[0].attributes.image.nodeValue, true);
xmlhttp.send();
xmlhttp.onload = () =>
{
    console.log('loaded');
}