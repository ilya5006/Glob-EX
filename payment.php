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
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<div class="content" style="padding-top: 0">
    <div class="cat_fold">
        <p> Главная </p>
        <p><span> &#92; Оплата </span></p>
    </div>
    <h2> Оплата </h2>

    <div class="pay-block">
        <img src="./resource/img/icons/payment_1.png" alt="оплата">
        <p>НАЛИЧНЫМИ ПРИ ПОЛУЧЕНИИ КУРЬЕРУ ИЛИ В ПУНКТЕ ВЫДАЧИ</p>
    </div>

    <h3>оплата наличными</h3>
    <p>Оплата наличными возможна в пункте выдачи и курьеру</p>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>