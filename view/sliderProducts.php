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
                $img = str_replace('ftp://37.140.192.146', __DIR__ . '/.././', $product['image1']);
                $img = base64_encode(file_get_contents($img));
                echo '  <a href="product.php?id='.$product['id'].'" class="img"><img src="data:image/png;base64,' . $img . '" class="product_img" alt="фотография продукта"></a>';
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

?>
<!-- <div class="content">
    <div class="slider_header">
        <h2> Акции: Мебель </h2>
        <div class="slide_left slide_anim"> <span>&#60;</span> </div>
        <div class="slide_right slide_anim"> <span>&#62;</span> </div>
    </div>
    <div class="scroll">
        <div class="product">
            <a href="#"><img src="./resource/img/products/product.jpg" class="product_img" alt="фотография продукта"></a>
            <p class="product-name">Имя продукта</p>
            <p class="old-price">500р</p>
            <p class="new-price">375р</p>
            <p class="sale">25</p>
            <a href="#" class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>
            <a href="#" class="favourite"> <img src="./resource/img/icons/favourite.svg" alt=""></a>
        </div>
        <div class="product">
            <a href="#"><img src="./resource/img/products/product.jpg" class="product_img" alt="фотография продукта"></a>
            <p class="product-name">Имя продукта</p>
            <p class="old-price">500р</p>
            <p class="new-price">375р</p>
            <p class="sale">25</p>
            <a href="#" class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>
            <a href="#" class="favourite"> <img src="./resource/img/icons/favourite.svg" alt=""></a>
        </div>
        <div class="product">
            <a href="#"><img src="./resource/img/products/product.jpg" class="product_img" alt="фотография продукта"></a>
            <p class="product-name">Имя продукта</p>
            <p class="old-price">500р</p>
            <p class="new-price">375р</p>
            <p class="sale">25</p>
            <a href="#" class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>
            <a href="#" class="favourite"> <img src="./resource/img/icons/favourite.svg" alt=""></a>
        </div>
        <div class="product">
            <a href="#"><img src="./resource/img/products/product.jpg" class="product_img" alt="фотография продукта"></a>
            <p class="product-name">Имя продукта</p>
            <p class="old-price">500р</p>
            <p class="new-price">375р</p>
            <p class="sale">25</p>
            <a href="#" class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>
            <a href="#" class="favourite"> <img src="./resource/img/icons/favourite.svg" alt=""></a>
        </div>
        <div class="product">
            <a href="#"><img src="./resource/img/products/product.jpg" class="product_img" alt="фотография продукта"></a>
            <p class="product-name">Имя продукта</p>
            <p class="old-price">500р</p>
            <p class="new-price">375р</p>
            <p class="sale">25</p>
            <a href="#" class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>
            <a href="#" class="favourite"> <img src="./resource/img/icons/favourite.svg" alt=""></a>
        </div>
        <div class="product">
            <a href="#"><img src="./resource/img/products/product.jpg" class="product_img" alt="фотография продукта"></a>
            <p class="product-name">Имя продукта</p>
            <p class="old-price">500р</p>
            <p class="new-price">375р</p>
            <p class="sale">25</p>
            <a href="#" class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>
            <a href="#" class="favourite"> <img src="./resource/img/icons/favourite.svg" alt=""></a>
        </div>
        <div class="product">
            <a href="#"><img src="./resource/img/products/product.jpg" class="product_img" alt="фотография продукта"></a>
            <p class="product-name">Имя продукта</p>
            <p class="old-price">500р</p>
            <p class="new-price">375р</p>
            <p class="sale">25</p>
            <a href="#" class="cart"> <img src="./resource/img/icons/cart.svg" alt=""></a>
            <a href="#" class="favourite"> <img src="./resource/img/icons/favourite.svg" alt=""></a>
        </div>
    </div>
</div> -->