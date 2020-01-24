<?php
session_start(); 
require_once __DIR__ . '/model/xmlparser.php';
$idCategory = $_GET['id'];

if (empty($xmlParseData['partitions'][$idCategory]))
{
    header("Location: ./404.html");
}

$title = $xmlParseData['partitions'][$idCategory]['name'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $title; ?> </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/scroll.css">
    <link rel="stylesheet" href="./resource/css/products.css">
    <link rel="stylesheet" href="./resource/css/footer.css">

    <script src="./resource/js/detectBrowser.js"></script>
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/filters.js" defer></script>
    <script src="./resource/js/productsQuantityControl.js" defer></script>
    <script src="./resource/js/productSort.js" defer></script>
    <script src="./resource/js/slider.js" defer></script>
    <script src="./resource/js/favourite-cart.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
    <script src="./resource/js/selectBrand.js" defer></script>

    <script src="./resource/js/wNumb.min.js"></script>
    <script src="./resource/js/nouislider.js"></script>
    <link rel="stylesheet" href="./../resource/css/nouislider.css">

    <style>
        .product .product-count { display: none; }
        .product.hor .product-count { display: block; }
        .product .cart { margin-left: auto; }
    </style>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<?php require(__DIR__ . '/view/products.php'); ?>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>