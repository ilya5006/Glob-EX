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
                            echo '<div class="product-info">';
                                echo '<p class="product-name">'.$productData[$idProduct['id_product']]['name'].'</p>';
                                echo '<p class="article" style="display: none;">'.$productData[$idProduct['id_product']]['article'].'</p>';
                                echo '<p class="id" style="display: none;">'.$productData[$idProduct['id_product']]['id'].'</p>';
                                echo '<div class="product-detail">';
                                    echo '<p class="available">есть в наличии <span class="available-count">'.$productData[$idProduct['id_product']]['quantity'].'</span> </p>';
                                if ($brands[$productData[$idProduct['id_product']]['brand']]['name']) { echo '<p>БРЕНД: <a href="#">'.$brands[$productData[$idProduct['id_product']]['brand']]['name'].'</a></p>'; }
                                else { echo '<p>БРЕНД: <a> ОТСУСТВУЕТ </a></p>'; }
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
                        <h2> СПОСОБ ДОСТАВКИ </h2>
                        <div class="delivery">
                            <div class="delivery-type">
                                <p class="type-deliv active">Доставка</p>
                                <p class="type-pickup">Самовызов</p>
                            </div>
                            <div class="deliv-inf">
                                <label class="placeinput">
                                    <p>
                                        <span> Адрес: </span> 
                                        <input required="1" type="text" id="adress" />
                                        <div class="place_holder">Введите адресс<span>*</span></div>
                                    </p> 
                                </label>
                                <label class="placeinput">
                                    <p>
                                        <span> Телефон: </span> 
                                        <input required="1" type="number" id="number" />
                                        <div class="place_holder">Введите Номер<span>*</span></div>
                                    </p>
                                </label>
                                <!-- <button class="change-address">ВЫБРАТЬ АДРЕС</button> -->
                            </div>
                            <!-- <p class="delivery-cost">Стоимость доставки: <span>200</span></p> -->
                            <p class="info">Курьер свяжется с Вами для уточнения адреса и времени и стоймости доставки, после оформления заказа.</p>
                        </div>

                        <h2> СПОСОБ ОПЛАТЫ </h2>
                        <div class="pay-type">
                            <label class="container" id="cash">
                                <p> НАЛИЧНЫМИ ПРИ ПОЛУЧЕНИИ </p> <input type="radio" name="pay_type"> <span
                                    class="checkmark"></span>
                            </label>
                            <label class="container" id="cart">
                                <p> ОПЛАТА КАРТОЙ ПРИ ПОЛУЧЕНИИ</p> <input type="radio" name="pay_type"> <span
                                    class="checkmark"></span>
                            </label>
                        </div>


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
</div>