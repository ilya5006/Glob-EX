<?php

    session_start();

    if (empty($_SESSION['cart']))
    {
        $_SESSION['cart'] = [];
    }
    
    require_once './connection.php';

    $idUser = $mysqli->escape_string($_POST['id_user']);
    $idProduct = $mysqli->escape_string($_POST['id_product']);
    $countProduct = $mysqli->escape_string($_POST['product_count']);

    $data = (array)[(int)$idUser, (int)$idProduct, (int)$countProduct];

    array_push($_SESSION['cart'], $data);

    echo json_encode(['Товар добавлен в корзину']);

    
?>