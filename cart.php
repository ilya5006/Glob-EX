<? 

session_start(); 

$redirectLink = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
if (empty($_COOKIE['isLogin'])) { header('Location: ' . $redirectLink); }

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Корзина </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/delivery.css">
    <link rel="stylesheet" href="./resource/css/cart.css">
    <link rel="stylesheet" href="./resource/css/footer.css">
    
    <script src="./resource/js/detectBrowser.js"></script>
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/cart.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/favourite-cart.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
    <script src="//code-ya.jivosite.com/widget/Wa5vYcSeDT" async></script>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<div class="content" style="padding-top: 0" id="cart-update"> </div>

<?php
        $countCart = $mysqli->query("SELECT count(*) FROM `user-cart` WHERE id_user = $idUser;")->fetch_row()[0];
        
        if ($countCart > 0)
        { 
    ?>
<div class="content">
    <h2> СПОСОБ ДОСТАВКИ </h2>
    <div class="delivery">
        <form class="delivery-type">
            <label class="active"> <input type="radio"  name="delivery" value="d" class="type-deliv" checked> <p> ДОСТАВКА </p> </label>
            <label> <input type="radio" name="delivery" value="s" class="type-pickup"> <p> САМОВЫВОЗ </p> </label>
        </form>
        <div class="deliv-inf" id="deliv-one">
        <?php
            $result = $mysqli->query("SELECT * FROM `users_all` WHERE id_user = $idUser;");
            $userData = $result->fetch_assoc();
        ?>
            <label class="placeinput">
                <p>
                    <span> Адрес: </span> 
                        <?php
                            $addressIsSet = false;
                            if ($userData['address'] != '') { $addressIsSet = true; }
                            if ($userData['additional_address1'] != '') { $addressIsSet = true; }
                            if ($userData['additional_address2'] != '') { $addressIsSet = true; }
                            if ($userData['additional_address3'] != '') { $addressIsSet = true; }
                            if ($userData['additional_address4'] != '') { $addressIsSet = true; }
                            if ($userData['additional_address5'] != '') { $addressIsSet = true; }
                            
                            if ($addressIsSet == true)
                            {
                                echo '<select name="address" id="cart-address">';
                                if ($userData['address'] != '')             { echo '<option>'.$userData['address'].'</option>'; }
                                if ($userData['additional_address1'] != '') { echo '<option>'.$userData['additional_address1'].'</option>'; }
                                if ($userData['additional_address2'] != '') { echo '<option>'.$userData['additional_address2'].'</option>'; }
                                if ($userData['additional_address3'] != '') { echo '<option>'.$userData['additional_address3'].'</option>'; }
                                if ($userData['additional_address4'] != '') { echo '<option>'.$userData['additional_address4'].'</option>'; }
                                if ($userData['additional_address5'] != '') { echo '<option>'.$userData['additional_address5'].'</option>'; }
                                echo '</select>';
                            }
                            else
                            {
                            ?>
                                <input required="1" type="text" id="cart-address" placeholder="У вас в профиле не указан адресс доставки!" />
                                <div class="place_holder">Введите адресс<span>*</span></div>
                            <?php
                            }
                        ?>
                </p> 
            </label>
            <label class="placeinput">
                <p>
                    <span> Телефон: </span> 
                    <?php
                        echo '<select name="phome" id="cart-phone">';
                        if ($userData['phone_number'] != '') { echo '<option>'.$userData['phone_number'].'</option>'; }
                        if ($userData['work_number'] != '') { echo '<option>'.$userData['work_number'].'</option>'; }
                        echo '</select>';
                    ?>
                </p>
            </label>
            <!-- <button class="change-address">ВЫБРАТЬ АДРЕС</button> -->
        </div>

        <div class="deliv-inf" id="deliv-two" style="display: none;"> 
            <div class="two">
                <iframe src="https://yandex.ru/map-widget/v1/-/CGhtnJ5D" width="640" height="400" frameborder="1" allowfullscreen="true"></iframe>
                <div>
                    <h3> <span class="bold"> Адрес: </span> г. Москва. Ул золоторожский вал дом 11 строение 8 </h3>
                    <h3> <span class="bold"> Телефон: </span> <span class="red"> 8-495-380-42-88 </span> </h3>
                </div>
            </div>
        </div>
        <!-- <p class="delivery-cost">Стоимость доставки: <span>200</span></p> -->
        <p class="info">Курьер свяжется с Вами для уточнения адреса и времени и стоймости доставки, после оформления заказа.</p>
    </div>

    <h2> СПОСОБ ОПЛАТЫ </h2>
    <div class="pay-type">
        <label class="container" id="cash">
            <p> НАЛИЧНЫМИ ПРИ ПОЛУЧЕНИИ </p> <input type="radio" value="cash" name="pay_type"> <span
                class="checkmark"></span>
        </label>
        <label class="container" id="cart">
            <p> ОПЛАТА КАРТОЙ ПРИ ПОЛУЧЕНИИ</p> <input type="radio" value="card" name="pay_type"> <span
                class="checkmark"></span>
        </label>
    </div>
</div>
<?php
        }
?>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>