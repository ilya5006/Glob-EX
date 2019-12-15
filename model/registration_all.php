<?php
    function isUserExists($email, $phoneNumber, $password)
    {
        global $mysqli;

        $userExistsQuery = $mysqli->query("SELECT password FROM users_all WHERE email = '$email' AND phone_number = '$phoneNumber'");
        $userExistsPasswordHash = $userExistsQuery->fetch_array()[0];
    
        if (password_verify($password, $userExistsPasswordHash))
        {
            return true;
        }

        return false;
    }

    require_once './connection.php';

    $role = $mysqli->escape_string($_POST['role']);
    $fio = $mysqli->escape_string(trim($_POST['fio']));
    $password = $mysqli->escape_string($_POST['password']);
    $email = $mysqli->escape_string($_POST['email']);
    $phoneNumber = $mysqli->escape_string($_POST['phone']);
    $mailing = $mysqli->escape_string($_POST['mailing']);

    if (isUserExists($email, $phoneNumber, $password))
    {
        echo json_encode(['Такой пользователь уже существует']);
        die();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $lastIdQuery = $mysqli->query("SELECT id_user FROM users_all ORDER BY id_user DESC");
    $lastIdResult = $lastIdQuery->fetch_assoc();
    $lastId = (int)$lastIdResult['id_user'] + 1;

    $mysqli->query("INSERT INTO users_all VALUES ('$lastId', '$role', '$fio', '$passwordHash', '$email', '$phoneNumber', NULL, NULL, NULL, '$mailing')");

    if ($mysqli)
    {
        echo json_encode(["done"]);
    }

    if ($role === '1') // юр. лица
    {
        $mysqli->query("INSERT INTO users_entities VALUES ('$lastId')");
    }
    if ($role === '0') // физ. лица
    {
        $mysqli->query("INSERT INTO users_individuals VALUES ('$lastId')");
    }
?>