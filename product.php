<?php 
session_start(); 
require_once __DIR__ . '/model/xmlparser.php';
$idProduct = $_GET['id'];

if (empty($xmlParseData['nomeklatura'][$idProduct]))
{
    header("Location: ./404.html");
}


$title = $xmlParseData['nomeklatura'][$idProduct]['name'];
$description = $xmlParseData['nomeklatura'][$idProduct]['description'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> <?php echo $title; ?> </title>
    <meta name="description" content="<?php echo $description; ?>" />

    <meta name="og:title" content="<?php echo $title; ?>">
    <meta name="og:description" content="<?php echo $description; ?>">
    <meta name="og:type" content="product">

    <meta name="product:availability" content="<?php echo $quantity; ?>">
    <meta name="product:price:currency" content="RUS">
    <meta name="product:price:amount" content="<?php echo $price; ?>">
    <meta name="product:brand" content="<?php echo $brand; ?>">

    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/product.css">
    <link rel="stylesheet" href="./resource/css/scroll.css">
    <link rel="stylesheet" href="./resource/css/footer.css">

    <script src="./resource/js/detectBrowser.js"></script>
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/product.js" defer></script>
    <script src="./resource/js/slider.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/favourite-cart.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
    <script src="./resource/js/productsQuantityControl.js" defer></script>
    <script src="//code-ya.jivosite.com/widget/Wa5vYcSeDT" async></script>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<?php require(__DIR__ . '/view/product.php'); ?>

<?php require(__DIR__ . '/view/similarProducts.php'); ?>

<?php require(__DIR__ . '/view/sliderBrands.php'); ?>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>