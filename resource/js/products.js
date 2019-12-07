let bannersDiv = document.querySelector('.scroll');

let xmlhttp = new XMLHttpRequest();

xmlhttp.open('GET', './resource/xml/catalog_3.xml', false);
xmlhttp.send();

let xmlDoc = xmlhttp.responseXML;
let brands = xmlDoc.querySelectorAll('data brands value');