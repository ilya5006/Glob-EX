<?php

require_once __DIR__ . '/../model/connection.php';
require_once __DIR__ . '/../model/xmlparser.php';

$idUser = (int)$_COOKIE['isLogin'];

$productData = $xmlParseData['nomeklatura'];
$brands = $xmlParseData['brands'];
?>


<div class="cat_fold">
    <a href="./index.php"> Главная </a>
    <p><span> &#92; Корзина </span></p>
</div>

<h2> Корзина </h2>

<div class="sliders">
    <a class="cart active" href="./cart.php"> Моя корзина </a>
    <a class="favourite" href="./favourite.php"> Отложенные товары </a>
</div>

<?php
        $countCart = $mysqli->query("SELECT count(*) FROM `user-cart` WHERE id_user = $idUser;")->fetch_row()[0];
        
        if ($countCart > 0)
        { 
    ?>
<div class="cart-block">
    <div class="items">

    <?php
        $cost = 0;
        $fullCost = 0;
        $discount = 0;

        $result = $mysqli->query("SELECT * FROM `user-cart` WHERE id_user = $idUser;");
        $count = $mysqli->query("SELECT COUNT(*) FROM `user-cart` WHERE id_user = $idUser")->fetch_row()[0];

        if ($count > 0)
        {
            while($idProduct = $result->fetch_assoc())
            {
                if ($productData[$idProduct['id_product']]['quantity'] > 0) 
                {
                    $cost +=  $productData[$idProduct['id_product']]['price'] * $idProduct['product_count'];

                    if ($productData[$idProduct['id_product']]['old_price']) 
                    {
                        $fullCost +=  $productData[$idProduct['id_product']]['old_price'] * $idProduct['product_count']; 
                        $discount +=  ($productData[$idProduct['id_product']]['old_price'] - $productData[$idProduct['id_product']]['price']) * $idProduct['product_count'];
                    }
                    else 
                    {
                        $fullCost +=  $productData[$idProduct['id_product']]['price'] * $idProduct['product_count']; 
                    }

                    echo '<div class="product">';
                    $img = str_replace('ftp://37.140.192.146', './../', $productData[$idProduct['id_product']]['image1']);
                        echo '<img class="product-image" src="'.$img.'" alt="">';
                        echo '<img class="delete-cart" src="./../resource/img/icons/delete.svg">';
                        if (isset($productData[$idProduct['id_product']]['discount'])) { echo '<p class="sale">'.$productData[$idProduct['id_product']]['discount'].'</p>'; }
                        echo '<div class="product-info">';
                            echo '<a class="product-name" href="./../product.php?id='.$productData[$idProduct['id_product']]['id'].'">'.$productData[$idProduct['id_product']]['name'].'</a>';
                            echo '<p class="article" style="display: none;">'.$productData[$idProduct['id_product']]['article'].'</p>';
                            echo '<p class="id" style="display: none;">'.$productData[$idProduct['id_product']]['id'].'</p>';
                            echo '<div class="product-detail">';
                                echo '<p class="available">есть в наличии <span class="available-count">'.$productData[$idProduct['id_product']]['quantity'].'</span> </p>';
                            if ($brands[$productData[$idProduct['id_product']]['brand']]['name']) { echo '<p class="product-brand">БРЕНД: <a href="#">'.$brands[$productData[$idProduct['id_product']]['brand']]['name'].'</a></p>'; }
                            else { echo '<p class="product-brand">БРЕНД: <a> ОТСУСТВУЕТ </a></p>'; }
                            echo '</div>';
                        echo '</div>';
                        echo '<p class="product-price">'.$productData[$idProduct['id_product']]['price'].'</p>';
                        echo '<input class="product-count" type="number" name="" id="" min="1" max="'.$productData[$idProduct['id_product']]['quantity'].'" value="'.$idProduct['product_count'].'">';
                        echo '<div class="fav-button">';
                            echo '<img src="./resource/img/icons/favourite.svg" alt="fav">';
                        echo '</div>';
                    echo '</div>';
                }
            }

            ?>
                </div>
                <div class="act">
                    <?php echo '<p class="act-itog"> ИТОГ <span>'.$cost.'</span> </p>'; ?>
                    <hr>
                    <?php echo '<p class="act-tovari"> товары <span>'.$fullCost.'</span> </p>'; ?>
                    <?php echo '<p class="act-skidka"> скидка <span>'.$discount.'</span> </p>'; ?>
                    <!-- <p class='act-dostavka'> доставка <span>200</span> </p> -->
                    <input class="order-button" type="submit" value="ОФОРМИТЬ ЗАКАЗ">
                </div>
            </div>
            <?php
        }
        ?>
        
</div>
<?php
        }
        else
        {
            echo '<h2 style="text-align: center"> У вас нет товаров в корзине.</h2>';
        }
    ?>
</div>