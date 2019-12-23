<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Информация о сбросе пароля </title>
    <link rel="shortcut icon" href="./../resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./../resource/css/normalize.css">
    <link rel="stylesheet" href="./..//resource/css/base.css">
    <link rel="stylesheet" href="./..//resource/css/profile.css">
    <style>
        body { position: relative; background-color: rgb(227, 30, 36); }
        h2 { text-align: center; margin-bottom: 55px;}
        .info-box 
        {
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
            width: 600px; 
            background-color: #FFFFFF; 
            padding: 55px; 
            position: absolute;
            top: 240px;
            left: 50%;
            transform: translate(-50%, 0%);
        }
        @media screen and (max-width: 650px) { .info-box { width: 100%; } }
    </style>
</head>
<body>

<?php
    require_once './connection.php';

    $token = $mysqli->escape_string($_GET['token']);
    $password = $mysqli->escape_string($_GET['new_password']);
    $passwordRepeat = $mysqli->escape_string($_GET['new_password_repeat']);


    // В дальнейшем эта проверка будет удалена
    if ($password != $passwordRepeat)
    {
        echo '<div class="info-box">';
        echo '<h2> Пароли не совпадают </h2>';
        echo '<a href="./../index.php" class="button button-anim"> вернуться на главную </a>';
        echo '</div>';
    }
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $email = $mysqli->query("SELECT email FROM password_recovery WHERE token = '$token'");
    $email = $email->fetch_array()[0];

    if (!$email)
    {
        echo '<div class="info-box">';
        echo '<h2> Token не валидный </h2>';
        echo '<a href="./../index.php" class="button button-anim"> вернуться на главную </a>';
        echo '</div>';
    }

    $updatePassword = $mysqli->query("UPDATE users_all SET password = '$passwordHash' WHERE email = '$email'");

    if ($updatePassword)
    {
        $mysqli->query("DELETE FROM password_recovery WHERE token = '$token'");
        echo '<div class="info-box">';
        echo '<h2> Пароль успешно обновлён </h2>';
        echo '<a href="./../index.php" class="button button-anim"> вернуться на главную </a>';
        echo '</div>';
        
    }
?>
</body>
</html>