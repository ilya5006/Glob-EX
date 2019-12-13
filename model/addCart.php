<?php

    $idUser = $mysqli->escape_string($_POST['id_user']);
    $idProduct = $mysqli->escape_string($_POST['id_product']);
    $countProduct = $mysqli->escape_string($_POST['product_count']);

    $data['id_user'] = $idUser;
    $data['id_product'] = $idProduct;
    $data['product_count'] = $countProduct;

    $cart = $_SESSION['cart'];


    echo json_encode(['Товар добавлен в корзину']);

    
?>