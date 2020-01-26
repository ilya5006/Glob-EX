<?php

require_once __DIR__ . '/../model/xmlparser.php';

$brands = $xmlParseData['brands'];

foreach ($brands as $brandId => $brandInfo)
{
    $brands[$brandId]['image'] = str_replace('ftp://37.140.192.146', './../', $brands[$brandId]['image']);
}
?>

<div class="content">
    <div class="slider_header">
        <h2> Бренды </h2>
        <div class="slide_left slide_anim"> <span>&#60;</span> </div>
        <div class="slide_right slide_anim"> <span>&#62;</span> </div>
    </div>
    <div class="scroll">
        <?php
            foreach ($brands as $brandId => $brandInfo)
            {
                $image = $brandInfo['image'];
                echo '<a href="./products.php=?brand='.$brandInfo['id'].'" class="brand"><img src="' . $image . '"> <span class="name" style="display: none;">'.$brandInfo['name'].'</span> </a>';
            }
        ?> 
    </div>
</div>