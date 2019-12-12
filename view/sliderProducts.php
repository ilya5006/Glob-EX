<?php

require_once dirname(__DIR__) . '/model/xmlparser.php';

function createSlideProduct(int $categoryId, array $data)
{
    echo 
    '<div class="content">
        <div class="slider_header">
            <h2> Акции: '. $data['partitions'][$categoryId]['name'].'</h2>
            <div class="slide_left slide_anim"> <span>&#60;</span> </div>
            <div class="slide_right slide_anim"> <span>&#62;</span> </div>
        </div>

        <div class="scroll">';

    foreach($data['nomeklatura'] as $product)
    {
        $twoId = $data['partitions'][$product['top_id']]['top_id'];
        $firstId = $data['partitions'][$twoId]['top_id'];

        if (!is_null($product['discount']))
        {
            if ($firstId == $categoryId)
            {
                echo '<div class="product">';
                    $img = str_replace('ftp://37.140.192.146', './../', $product['image1']);
                    echo '  <a href="product.php?id='.$product['id'].'" class="img"><img src="' . $img . '" class="product_img" alt="фотография продукта"></a>';
                    echo '  <a href="product.php?id='.$product['id'].'" class="product-name">'.$product['name'].'</a>';
                    echo '  <p class="id" style="display: none;">'.$product['id'].'</p>';
                    echo '  <p class="old-price">'.$product['old_price'].'</p>';
                    echo '  <p class="new-price">'.$product['price'].'</p>';
                    echo '  <p class="sale">'.$product['discount'].'</p>';
                    echo '  <a class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>';
                    echo '  <a class="favourite fav-button"> <img src="./resource/img/icons/favourite.svg" alt=""></a>';
                echo '</div>';
            }
        }
    }

    echo '
        </div>
    </div>';
}

$data = $xmlParseData['partitions'];
$categories = [];

foreach($data as $category)
{
    if (categoryLevel($data, $category['id'], 0) == '1')
    {
        array_push($categories, $category);
    }
}

foreach($categories as $category)
{
    createSlideProduct($category['id'], $xmlParseData);
}
?>