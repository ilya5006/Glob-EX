<?php
    require_once './connection.php';
    
    $address = $mysqli->escape_string($_GET['address']);
    $additAddress = $mysqli->escape_string($_GET['additional_address']);
    $idUser = $mysqli->escape_string($_GET['id_user']);

    $mysqli->query("UPDATE users_all SET address = '$address', additional_address = '$additAddress' WHERE id_user = '$idUser'");

    header('Location: ../profile.php?id=' . $idUser);
?>