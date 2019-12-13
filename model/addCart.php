<?php
    require_once './connection.php';

    $idUser = $mysqli->escape_string($_POST['id_user']);
    $idProduct = $mysqli->escape_string($_POST['id_product']);
    $countProduct = $mysqli->escape_string($_POST['product_count']);

    $data = [$idUser, $idProduct, $countProduct];

    array_push($data, $_SESSION['cart']);

    echo json_encode([$data]);

    
?>