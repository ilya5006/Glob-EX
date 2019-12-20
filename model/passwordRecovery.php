<?php
    require_once './connection.php';

    $email = $mysqli->escape_string($_GET['email']);

    $checkEmail = $mysqli->query("SELECT * FROM users_all WHERE email = '$email'");
    
    if (!$checkEmail)
    {
        echo 'Вы ввели неверный email, попробуйте снова';
        die();
    }

    $isAlreadyCreatedToken = $mysqli->query("SELECT * FROM users_all WHERE email = '$email'");

    if (!$isAlreadyCreatedToken)
    {
        echo 'Вы уже пытались сбросить пароль. Попробуйте в другое время';
        die();
    }

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);

    $token = md5($email);
    $insertInfoInDB = $mysqli->query("INSERT INTO password_recovery VALUES ('$email', '$token', '$expFormat')");

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
                <a href="vsekanc.ru/newPassword.php?token=' . $token . '>vsekanc.ru/newPassword.php?token=' . $token . '</a>
            </body>
            </html>
        ';

        $headers = 
        [
            'Content-Type' => 'text/html',
            'From' => 'help@vsekanc.ru'
        ];

        mail($to, $subject, $message, $headers);
        
        echo 'Вам было отправлено письмо на почту с ссылкой на страницу сброса пароля';
    }
?>