<?php
    require_once './connection.php';

    $idUser = (int)$_COOKIE['isLogin'];

    $json = $_POST['data'];
    
    $data = json_decode($json);

    foreach($data as $product)
    {
        $idProduct = (int)$product[0];
        $mysqli->query("DELETE FROM `user-favoutite` WHERE id_user = $idUser AND id_product = $idProduct;");
    }

    echo json_encode(['done']);
?>