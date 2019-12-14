<?php
session_start();
$productCartData = $_SESSION['cart'];

require_once __DIR__ . '/../model/xmlparser.php';

$productData = $xmlParseData['nomeklatura'];
$brands = $xmlParseData['brands'];
?>

<div class="content" style="padding-top: 0">
    <div class="cat_fold">
        <p> Главная </p>
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
            if (!empty($_SESSION['cart']))
            {
                foreach($productCartData as $productId)
                {
                    if ($productData[$productId[1]]['quantity'] > 0) 
                    { 
                        echo '<div class="product">';
                        $img = str_replace('ftp://37.140.192.146', './../', $productData[$productId[1]]['image1']);
                            echo '<img class="product-image" src="'.$img.'" alt="">';
                            echo '<div class="product-info">';
                                echo '<p class="product-name">'.$productData[$productId[1]]['name'].'</p>';
                                echo '<p class="article" style="display: none;">'.$productData[$productId[1]]['article'].'</p>';
                                echo '<p class="id" style="display: none;">'.$productData[$productId[1]]['id'].'</p>';
                                echo '<div class="product-detail">';
                                    echo '<p class="available">есть в наличии <span class="available-count">'.$productData[$productId[1]]['quantity'].'</span> </p>';
                                echo '<p>БРЕНД: <a href="#">'.$brands[$productData[$productId[1]]['brand']]['name'].'</a></p>';
                                echo '</div>';
                            echo '</div>';
                            echo '<p class="product-price">'.$productData[$productId[1]]['price'].'</p>';
                            echo '<input class="product-count" type="number" name="" id="" min="1" max="'.$productData[$productId[1]]['quantity'].'" value="1">';
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
                                <p class="address"></p>
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
                        <p class='act-itog'> ИТОГ <span>8 200</span> </p>
                        <hr>
                        <p class='act-tovari'> товары <span>8 200</span> </p>
                        <p class='act-skidka'> скидка <span>8 200</span> </p>
                        <!-- <p class='act-dostavka'> доставка <span>200</span> </p> -->
                        <input class="order-button" type="submit" value="ОФОРМИТЬ ЗАКАЗ">
                    </div>
                </div>
                <?php
            }
            ?>
</div>
</div>

</div>