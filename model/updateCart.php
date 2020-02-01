<?php
    require_once './connection.php';

    $idUser = (int)$_COOKIE['isLogin'];
    $idProduct = htmlentities($mysqli->escape_string($_POST['id_product']));
    $productCount = htmlentities($mysqli->escape_string($_POST['product_count']));

    $mysqli->query("UPDATE `user-cart` SET `product_count` = $productCount WHERE id_user = $idUser AND id_product = $idProduct;");

    if ($mysqli)
    {
        echo json_encode(['done']);
    }
    
?>