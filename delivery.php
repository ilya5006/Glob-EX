<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Доставка </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/delivery.css">
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
        <a href="./index.php"> Главная </a>
        <p><span> &#92; Доставка </span></p>
    </div>
    <h2> Доставка </h2>

    <div class="one">
        <img src="./resource/img/icons/delivery.png" alt="доставка">
        <div>
            <h2>по москве (в пределах мкад) - <span class="red"> 500Р  </span> </h2>
            <h3>При заказе от 5 000р - <span class="red"> БЕСПЛАТНО  </span> </h3>

            <h2>по мосКОВСКОЙ ОБЛАСТЕ  (ЗА ПРЕДЕЛАМИ мкад) - <span class="red"> 500Р + 20Р/КМ </span> </h2>
            <h3>При заказе от 10 000р - <span class="red"> БЕСПЛАТНО  </span> </h3>
        </div>
    </div>

    <h2 style="margin-top: 65px;"> САМОВЫВОЗ - <span class="red"> БЕСПЛАТНО </span>  </h2>
    <div class="two">
        <iframe src="https://yandex.ru/map-widget/v1/-/CGhtnJ5D" width="640" height="400" frameborder="1" allowfullscreen="true"></iframe>
        <div>
            <h3> <span class="bold"> Адрес: </span> г. Москва. Ул золоторожский вал дом 11 строение 8 </h3>
            <h3> <span class="bold"> Телефон: </span> <span class="red"> 8-495-380-42-88 </span> </h3>
        </div>
    </div>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>