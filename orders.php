<? 

session_start(); 

if (empty($_COOKIE['isLogin'])) { header('Location: ' . $_SERVER['HTTP_REFERER']); }

require 'vendor/autoload.php';
require_once __DIR__ . './model/xmlparser.php';
$productInfo = $xmlParseData['nomeklatura'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ваши заказы </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/order.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/footer.css">
    <script src="./resource/js/detectBrowser.js"></script>
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
        <p><span> &#92; Заказы </span></p>
    </div>
    <h2> Ваши заказы </h2>

    <div class="orders">
<?php

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);

    $dir = "./orders/";
    $orderFiles = array_diff( scandir( $dir), array('..', '.'));
    
    foreach($orderFiles as $order)
    {
        $pathToFile = './orders/' . $order;
        $spreadsheet = $reader->load($pathToFile);
        $orderData = $spreadsheet->getActiveSheet()->toArray();
        echo "<pre>";
        print_r($orderData);
        echo "</pre>";

        echo '<div class="order">
                <h2> ЗАКАЗ ОТ '.$orderData[1][8].'</h2>
                <hr>
                <div class="order-info">
                    <div class="one">
                        <div class="ord-product">';
                            $counter = 0;
                            foreach($orderData as $product)
                            {
                                if ($counter == 0) {} else
                                {
                                    echo '
                                    <div class="order">
                                        
                                    </div>';
                                }
                            }
                        echo '</div>
                    </div>

                    <div class="two">
                        <p>'.$orderData[0][0].': <span>'.$orderData[1][0].'</p>
                        <p>'.$orderData[0][3].': <span>'.$orderData[1][3].'</p>
                        <p>'.$orderData[0][2].': <span>'.$orderData[1][2].'</p>
                        <p>'.$orderData[0][7].': <span>'.$orderData[1][7].'</p>
                        <p>'.$orderData[0][1].': <span>'.$orderData[1][1].'</p>
                    </div>
                </div>
            </div>';


    }
?>
    </div>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>