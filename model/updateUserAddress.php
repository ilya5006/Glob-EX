<?php
    require_once './connection.php';
    
    $address = $mysqli->escape_string($_GET['address']);
    $additAddress1 = $mysqli->escape_string($_GET['additional_address1']);
    $additAddress2 = $mysqli->escape_string($_GET['additional_address2']);
    $additAddress3 = $mysqli->escape_string($_GET['additional_address3']);
    $additAddress4 = $mysqli->escape_string($_GET['additional_address4']);
    $additAddress5 = $mysqli->escape_string($_GET['additional_address5']);
    $idUser = $mysqli->escape_string($_GET['id_user']);

    $mysqli->query("UPDATE `users_all` SET `address` = '$address', `additional_address1` = '$additAddress1', `additional_address2` = '$additAddress2', `additional_address3` = '$additAddress3', `additional_address4` = '$additAddress4', `additional_address5` = '$additAddress5' WHERE `users_all`.`id_user` = 1 AND `users_all`.`role` = $idUser;");

    header('Location: ../profile.php?id=' . $idUser);
?>