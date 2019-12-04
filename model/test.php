<?php
    require_once './connection.php';

    $lastIdQuery = $mysqli->query("SELECT id_user FROM users_all ORDER BY id_user DESC");
    $lastIdResult = $lastIdQuery->fetch_assoc();
    $lastId = $lastIdResult['id_user'];

    echo $lastId;

?>