<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Оплата </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/payment.css">
    <link rel="stylesheet" href="./resource/css/footer.css">
    <script src="./resource/js/detectBrowser.js"></script>
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
    <script src="//code-ya.jivosite.com/widget/Wa5vYcSeDT" async></script>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<div class="content" style="padding-top: 0">
    <div class="cat_fold">
        <a href="./index.php"> Главная </a>
        <p><span> &#92; Оплата </span></p>
    </div>
    <h2> Оплата </h2>

    <div class="payments">
        <div class="pay-block">
            <img src="./resource/img/icons/pay/payment_2.png" alt="оплата">
            <p>КАРТОЙ ПРИ ПОЛУЧЕНИИ КУРЬЕРУ ИЛИ В ПУНКТЕ ВЫДАЧИ</p>
        </div>
        <div class="pay-block">
            <img src="./resource/img/icons/pay/payment_1.png" alt="оплата">
            <p>НАЛИЧНЫМИ ПРИ ПОЛУЧЕНИИ КУРЬЕРУ ИЛИ В ПУНКТЕ ВЫДАЧИ</p>
        </div>
        <div class="pay-block">
            <img src="./resource/img/icons/pay/payment_3.png" alt="оплата">
            <p>ОПЛАТА СЧЕТА ПО РЕКВИЗИТАМ</p>
        </div>
    </div>

    <h3>БЕЗНАЛИЧНАЯ ОПЛАТА</h3>
    <p>Безналичная оплата возможна в пункте выдачи и курьеру</p>
    <br>

    <h4>Банковские карты</h4>
    <div class="pay-icons">
        <img src="./resource/img/icons/pay/visa.png" alt="VISA" style="padding: 0px 15px;">
        <img src="./resource/img/icons/pay/mastercard.png" alt="MasterCard" style="padding: 0px 15px;">
        <img src="./resource/img/icons/pay/mir.png" alt="МИР" style="padding: 0px 15px;">
    </div>
    <br>

    <h4>Платежные системы</h4>
    <div class="pay-icons">
        <img src="./resource/img/icons/pay/googlePay.png" alt="Google Pay" style="padding: 0px 15px;">
        <img src="./resource/img/icons/pay/applePay.png" alt="Apple Pay" style="padding: 0px 15px;">
        <img src="./resource/img/icons/pay/samsungPay.png" alt="Samsung Pay" style="padding: 0px 15px;">
    </div>
    <br>

    <h3>оплата наличными</h3>
    <p>Оплата наличными возможна в пункте выдачи и курьеру</p>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>