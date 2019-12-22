<?php
    require_once './connection.php';

    $email = $mysqli->escape_string($_GET['email']);

    $checkEmail = $mysqli->query("SELECT id_user FROM users_all WHERE email = '$email'");
    $checkEmail = $checkEmail->fetch_array()[0];
    
    if (!$checkEmail)
    {
        echo 'Вы ввели неверный email, попробуйте снова';
        die();
    }

    $isAlreadyCreatedToken = $mysqli->query("SELECT token FROM password_recovery WHERE email = '$email'");
    $isAlreadyCreatedToken = $isAlreadyCreatedToken->fetch_array()[0];

    if ($isAlreadyCreatedToken)
    {
        echo 'Вы уже пытались сбросить пароль. Попробуйте в другое время';
        die();
    }

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);

    $token = md5($email);
    $insertInfoInDB = $mysqli->query("INSERT INTO password_recovery VALUES ('$email', '$token', '$expDate')");

    if (!$insertInfoInDB)
    {
        echo 'Повторите попытку';
    }
    else
    {
        $to = $email;

        $subject = 'Сброс пароля';

        $message = '
            <html>
            <head>
                <title>Сброс пароля</title>
                <meta charset="UTF-8">
            </head>
            <body>
                <p>Чтобы восстановить пароль, перейдите по ссылке:</p><br>
                <a href="https://vsekanc.ru/newPassword.php?token=' . $token . '>https://vsekanc.ru/newPassword.php?token=' . $token . '</a>
            </body>
            </html>
        ';

        $headers = 'Content-Type: text/html' . "\r\n" . 'From: help@vsekanc.ru';

        mail($to, $subject, $message, $headers);
        
        echo 'Вам было отправлено письмо на почту с ссылкой на страницу сброса пароля';
    }
?>