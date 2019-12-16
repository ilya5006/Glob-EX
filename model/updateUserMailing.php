<?php
    require_once './connection.php';
    $mailing = $mysqli->escape_string($_GET['mailing']) ? 1 : 0;
    $idUser = $mysqli->escape_string($_COOKIE['isLogin']);

    $isQuerySucces = $mysqli->query("UPDATE users_all SET mailing = '$mailing' WHERE id_user = $idUser");

    header('Location: ../profile.php?id=' . $idUser);
?>