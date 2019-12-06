<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Страница продуктов </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/scroll.css">
    <link rel="stylesheet" href="./resource/css/products.css">
    <link rel="stylesheet" href="./resource/css/footer.css">
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/productSort.js" defer></script>
    <script src="./resource/js/filters.js" defer></script>
    <script src="./resource/js/slider.js" defer></script>

    <script src="./resource/js/nouislider.js"></script>
    <link rel="stylesheet" href="./../resource/css/nouislider.css">
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<?php require(__DIR__ . '/view/products.php'); ?>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>