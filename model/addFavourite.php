<?php
    require_once './connection.php';

    $idUser = $mysqli->escape_string((int)$_POST['id_user']);
    $idProduct = $mysqli->escape_string((int)$_POST['id_product']);

    $resultCheck = $mysqli->query("SELECT COUNT(*) FROM `user-favoutite` WHERE id_user = $idUser AND id_product = $idProduct");
    $checkData = $resultCheck->fetch_row();

    if ($checkData[0] == 0)
    {
        $mysqli->query("INSERT INTO `user-favoutite` (`id_user`, `id_product`) VALUES ($idUser, $idProduct);");

        echo json_encode(['Товар добавлен в отложенные']);

    }
    else
    {
        $mysqli->query("DELETE FROM `user-favoutite` WHERE id_user = $idUser AND id_product = $idProduct");

        echo json_encode(['Товар удалён из отложенных']);
    }

    
?>