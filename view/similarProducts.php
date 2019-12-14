<?php

require_once dirname(__DIR__) . '/model/xmlparser.php';

$data = $xmlParseData['nomeklatura'];

$idProduct = $_GET['id'];

$concomitant = explode(',', $data[$idProduct]['concomitant']);



echo 
'<div class="content">
    <div class="slider_header">
        <h2> ЭТО МОЖЕТ ВАС ЗАИНТЕРИСОВАТЬ </h2>
        <div class="slide_left slide_anim"> <span>&#60;</span> </div>
        <div class="slide_right slide_anim"> <span>&#62;</span> </div>
    </div>

    <div class="scroll">';

foreach($concomitant as $idConcomitant)
{
    echo '<div class="product">';
    $img = str_replace('ftp://37.140.192.146', './../', $data[(int)$idConcomitant]['image1']);
    echo '  <a href="product.php?id='.$idConcomitant.'" class="img"><img src="' . $img . '" class="product_img" alt="фотография продукта"></a>';
    echo '  <a href="product.php?id='.$idConcomitant.'" class="product-name">'.$data[(int)$idConcomitant]['name'].'</a>';
    echo '  <p class="id" style="display: none;">'.$data[(int)$idConcomitant].'</p>';
    if (isset($data[(int)$idConcomitant]['discount'])) { echo '  <p class="old-price">'.$data[(int)$idConcomitant]['old_price'].'</p>'; };
    echo '  <p class="new-price">'.$data[(int)$idConcomitant]['price'].'</p>';
    if (isset($data[(int)$idConcomitant]['discount'])) { echo '  <p class="sale">'.$data[(int)$idConcomitant]['discount'].'</p>'; };
    if ($data[(int)$idConcomitant]['quantity'] > 0) {echo '  <a class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>'; };
    echo '  <a class="favourite fav-button"> <img src="./resource/img/icons/favourite.svg" alt=""></a>'; 
    echo '</div>';  
}

echo '
    </div>
</div>';