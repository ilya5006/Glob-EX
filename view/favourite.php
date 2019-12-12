<?php

require_once __DIR__ . '/../model/xmlparser.php';
require_once __DIR__ . '/../model/connection.php';

$idUser = (int)$_COOKIE['isLogin'];

$productInfo = $xmlParseData['nomeklatura'];
$brandInfo = $xmlParseData['brands'];
?>

<div class="content" style="padding-top: 0">
    <div class="cat_fold">
        <p> Главная </p>
        <p><span> &#92; Корзина </span></p>
    </div>
    <h2> Корзина </h2>
    <div class="sliders">
        <a class="cart" href="./cart.php"> Моя корзина </a>
        <a class="favourite active" href="./favourite.php"> Отложенные товары </a>
    </div>

    <div class="catalg_view">
        <div class='fav-act'>
            <div class="sort">
                <p>
                    Сортировка:
                    <select>
                        <option value="10">По популярности</option>
                        <option value="30">Сначала дешевые</option>
                        <option value="50">Сначала дорогие</option>
                    </select>
                </p>

                <p>
                    Товаров на странице:
                    <select>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                    </select>
                </p>

                <div class="view">
                    <img src="./resource/img/icons/block.png" alt="sort" id="sort-block">
                    <img src="./resource/img/icons/horizontal.png" alt="sort" id="sort-hor">
                </div>
            </div>

            <div class="check-selecter" style="display: none;">
                <!-- <label class="container" id="cart"> -->
                    <p class="text-selected">Выбранно: <span class="selected-count">0</span> </p> 
                <!-- <input type="checkbox" name="prduct-check"> <span class="checkmark"></span>  </label> -->
                <p class="delete"> Удалить </p>
                <p class=in-cart> В корзину </p>
            </div>
        </div>

        <div class="products" style="width: 100%;">
            <div class="list-products">
            <?php
                $result = $mysqli->query("SELECT `id_product` FROM `user-favoutite` WHERE id_user = $idUser;");

                while($idProduct = $result->fetch_assoc()['id_product'])
                {
                    echo '<div class="product">';
                        if (isset($productInfo[$idProduct]['discount']))
                        {
                            echo '<p class="sale">'.$productInfo[$idProduct]['discount'].'</p>';
                        }
                        echo '<label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label>';
                        $image = str_replace('ftp://37.140.192.146','./../', $productInfo[$idProduct]['image1']);
                        echo '<a href="#" class="product-image"><img src="' . $image . '" alt="фотография продукта"></a>';
                        echo '<div class="product-disc">';
                            echo '<p class="product-name">'.$productInfo[$idProduct]['name'].'</p>';
                            echo '<p class="article" style="display: none;">'.$productInfo[$idProduct]['article'].'</p>';
                            echo '<p class="id" style="display: none;">'.$productInfo[$idProduct]['id'].'</p>';
                            echo '<div class="features">';
                                $specsPrintedCount = 0;

                                $specsNames = [];
                                $specsId = array_keys($productInfo[$idProduct]['specs']);
                                foreach ($specsId as $id => $specId)
                                {
                                    $specsNames[$specId] = $specs[$specId]['name'];
                                }

                                foreach ($specsNames as $id => $name)
                                {
                                    echo '<p class="feature">' . $name . ' ' . $productInfo[$idProduct]['specs'][$id]. '</p>';
                                    if (++$specsPrintedCount == 5) break;
                                }
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="product-act">';
                            if ($productInfo[$idProduct]['quantity'] > 0)
                            {
                                echo '<p class="available">есть в наличии <span class="available-count">'.$productInfo[$idProduct]['quantity'].'</span> </p>';
                            }
                            else
                            {
                                echo '<p class="available">нет в наличии</p>';
                            }
                            if (isset($productInfo[$idProduct]['old_price']))
                            {
                                echo '<p class="old-price">'.$productInfo[$idProduct]['old_price'].'</p>';
                            }
                            echo '<p class="new-price">'.$productInfo[$idProduct]['price'].'</p>';
                            echo '<p class="product-brand">БРЕНД: <a href="#">'.$brandInfo[$productInfo[$idProduct]['brand']]['name'].'</a></p>';
                            echo '<div class="inp-cart-fav">';

                            if ((int)$productInfo[$idProduct]['quantity'] > 0)
                            {
                                echo '<input class="product-count" type="number" name="" id="" min="1" max="'.$productInfo['quantity'].'" value="1">';
                                echo '<button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>';
                            }
                                echo '<img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>
            </div>
        </div>
    </div>
</div>
