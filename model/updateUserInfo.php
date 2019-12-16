<?php
    require_once './connection.php';
    $fio = $mysqli->escape_string($_GET['fio']);
    $email = $mysqli->escape_string($_GET['email']);
    $phoneNumber = $mysqli->escape_string($_GET['phone_number']);
    $workNumber = $mysqli->escape_string($_GET['work_number']);
    $idUser = $mysqli->escape_string($_COOKIE['isLogin']);

    $mysqli->query("UPDATE users_all SET fio = '$fio', email = '$email', phone_number = '$phoneNumber', work_number = '$workNumber' WHERE id_user = $idUser");

    header('Location: ../profile.php?id=' . $idUser);
?>