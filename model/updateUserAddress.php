<?php
    require_once './connection.php';
    
    $address = htmlentities($mysqli->escape_string($_GET['address']));
    $additAddress1 = htmlentities($mysqli->escape_string($_GET['additional_address1']));
    $additAddress2 = htmlentities($mysqli->escape_string($_GET['additional_address2']));
    $additAddress3 = htmlentities($mysqli->escape_string($_GET['additional_address3']));
    $additAddress4 = htmlentities($mysqli->escape_string($_GET['additional_address4']));
    $additAddress5 = htmlentities($mysqli->escape_string($_GET['additional_address5']));
    $idUser = htmlentities($mysqli->escape_string($_COOKIE['isLogin']));

    $mysqli->query("UPDATE `users_all` SET `address` = '$address', `additional_address1` = '$additAddress1', `additional_address2` = '$additAddress2', `additional_address3` = '$additAddress3', `additional_address4` = '$additAddress4', `additional_address5` = '$additAddress5' WHERE `id_user` = '$idUser'");

    header('Location: ../profile.php?id=' . $idUser);
?>