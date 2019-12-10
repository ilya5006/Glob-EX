<?php
    require_once './connection.php';

    $idUser = $mysqli->escape_string($_POST['id_user']);
    $idProduct = $mysqli->escape_string($_POST['id_product']);

    $mysqli->query("INSERT INTO `user-favoutite` (`id_user`, `id_product`) VALUES ($idUser, $idProduct);");
?>