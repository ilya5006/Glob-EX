<?php
    require_once './connection.php';
    $fio = htmlentities($mysqli->escape_string($_GET['fio']));
    $email = htmlentities($mysqli->escape_string($_GET['email']));
    $phoneNumber = htmlentities($mysqli->escape_string($_GET['phone_number']));
    $workNumber = htmlentities($mysqli->escape_string($_GET['work_number']));
    $idUser = htmlentities($mysqli->escape_string($_COOKIE['isLogin']));

    $mysqli->query("UPDATE users_all SET fio = '$fio', email = '$email', phone_number = '$phoneNumber', work_number = '$workNumber' WHERE id_user = $idUser");

    header('Location: ../profile.php?id=' . $idUser);
?>