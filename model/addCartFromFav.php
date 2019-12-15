<?php
    require_once './connection.php';

    $idUser = (int)$_COOKIE['isLogin'];

    $json = $_POST['data'];
    
    $data = json_decode($json);

    foreach($data as $product)
    {
        $idProduct = (int)$product[0];
        $productCount = (int)$product[1];
        $count = $mysqli->query("SELECT count(*) FROM `user-cart` WHERE id_user = $idUser AND id_product = $idProduct;")->fetch_array()[0];
        if ($count == 0)
        {
            $mysqli->query("REPLACE INTO `user-cart` (`id_user`, `id_product`, `product_count`) VALUES ($idUser, $idProduct, $productCount);");
        }
    }

    echo json_encode(['done']);
?>