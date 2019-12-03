<?php
    require_once './connection.php';

    $role = $mysqli->escape_string($_POST['role']);
    $fio = $mysqli->escape_string($_POST['fio']);
    $password = $mysqli->escape_string($_POST['password']);
    $email = $mysqli->escape_string($_POST['email']);
    $phoneNumber = $mysqli->escape_string($_POST['phone_number']);
    $address = $mysqli->escape_string($_POST['address']);
    $mailing = $mysqli->escape_string($_POST['mailing']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO users_all VALUES (NULL, '$role', '$surName', '$fio', '$password', '$email', '$phoneNumber', NULL, '$mailing')");

    if ($role == 1) // юр. лица
    {
        // TODO: Регистрация юр. лци
        $mysqli->query("INSERT INTO users_entities (id_user) VALUES (NULL)");
    }
    if ($role == 0) // физ. лица
    {
        // TODO: Регистрация физ. лци
        $mysqli->query("INSERT INTO users_individuals (id_user) VALUES (NULL)");
    }
    
?>