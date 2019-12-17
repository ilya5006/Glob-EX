<? session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Бренды </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/scroll.css">
    <link rel="stylesheet" href="./resource/css/footer.css">
    <script src="./resource/js/detectBrowser.js"></script>
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/brandList.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/favourite-cart.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<div class="content" style="padding: 0 50px;">
    <div class="cat_fold">
        <a href="./index.php"> Главная </a>
        <p><span> &#92; Торговые марки </span></p>
    </div>
</div>
<?php require(__DIR__ . '/view/sliderBrands.php'); ?>

<?php require(__DIR__ . '/view/footer.php'); ?>

<script src="./resource/js/registration.js"></script>
<script src="./resource/js/login.js"></script>

</body>
</html>