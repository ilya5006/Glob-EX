<?php
    require_once './connection.php';

    $token = $mysqli->escape_string($_GET['token']);
    $password = $mysqli->escape_string($_GET['new_password']);
    $passwordRepeat = $mysqli->escape_string($_GET['new_password_repeat']);


    // В дальнейшем эта проверка будет удалена
    if ($password != $passwordRepeat)
    {
        echo 'Пароли не совпадают';
    }
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $email = $mysqli->query("SELECT email FROM password_recovery WHERE token = '$token'");
    $email = $email->fetch_array()[0];

    if (!$email)
    {
        echo 'Token не валидный';
    }

    $updatePassword = $mysqli->query("UPDATE users_all SET password = '$passwordHash' WHERE email = '$email'");

    if ($updatePassword)
    {
        echo 'Пароль успешно обновлён!';
    }
?>