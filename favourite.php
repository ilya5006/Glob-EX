<? 

session_start(); 

if (empty($_COOKIE['isLogin'])) { header('Location: ' . $_SERVER['HTTP_REFERER']); }

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Отложенные товары </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/scroll.css">
    <link rel="stylesheet" href="./resource/css/products.css">
    <link rel="stylesheet" href="./resource/css/footer.css">
    <script src="./resource/js/detectBrowser.js"></script>
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/productSort.js" defer></script>
    <script src="./resource/js/checkedList.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/favourite-cart.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
    <style> 
        .product.hor .sale { top: 55px; }
        .list-products .product .inp-cart-fav { width: 100%; }
        .product .product-count { margin-right: auto; }
        .product .fav-button { margin-left: auto; }
    </style>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<?php require(__DIR__ . '/view/favourite.php'); ?>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>