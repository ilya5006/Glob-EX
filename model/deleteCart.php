<?php
    require_once './connection.php';

    $idUser = (int)$_COOKIE['isLogin'];
    $idProduct = htmlentities($mysqli->escape_string((int)$_POST['id_product']));

    $mysqli->query("DELETE FROM `user-cart` WHERE id_user = $idUser AND id_product = $idProduct");

    echo json_encode(['done']);
?>