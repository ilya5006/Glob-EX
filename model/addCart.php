<?php
    require_once './connection.php';

    $idUser = $mysqli->escape_string((int)$_POST['id_user']);
    $idProduct = $mysqli->escape_string((int)$_POST['id_product']);
    $productCount = $mysqli->escape_string((int)$_POST['product_count']);

    $resultCheck = $mysqli->query("SELECT COUNT(*) FROM `user-cart` WHERE id_user = $idUser AND id_product = $idProduct;");
    $checkData = $resultCheck->fetch_row();

    if ($checkData[0] == 0)
    {
        $mysqli->query("INSERT INTO `user-cart` (`id_user`, `id_product`, `product_count`) VALUES ($idUser, $idProduct, $productCount);");

    session_start();

    $idUser = $mysqli->escape_string($_POST['id_user']);
    $idProduct = $mysqli->escape_string($_POST['id_product']);
    $countProduct = $mysqli->escape_string($_POST['product_count']);

    }
    else
    {
        $mysqli->query("DELETE FROM `user-cart` WHERE id_user = $idUser AND id_product = $idProduct");

        echo json_encode(['Товар убран из корзины']);
    }

    
?>