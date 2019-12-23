<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Вся канцелярия </title>
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

    $email = $mysqli->escape_string($_GET['email']);

    $checkEmail = $mysqli->query("SELECT id_user FROM users_all WHERE email = '$email'");
    $checkEmail = $checkEmail->fetch_array()[0];
    
    if (!$checkEmail)
    {
        echo '<div class="info-box">';
        echo '<h2> Вы ввели неверный email, попробуйте снова </h2>';
        echo '<a href="./../index.php" class="button button-anim"> вернуться на главную </a>';
        echo '</div>';
        die();
    }

    $isAlreadyCreatedToken = $mysqli->query("SELECT token FROM password_recovery WHERE email = '$email'");
    $isAlreadyCreatedToken = $isAlreadyCreatedToken->fetch_array()[0];

    if ($isAlreadyCreatedToken)
    {
        echo '<div class="info-box">';
        echo '<h2> Вы уже пытались сбросить пароль. Попробуйте в другое время </h2>';
        echo '<a href="./../index.php" class="button button-anim"> вернуться на главную </a>';
        echo '</div>';
        die();
    }

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);

    $token = md5($email);
    $insertInfoInDB = $mysqli->query("INSERT INTO password_recovery VALUES ('$email', '$token', '$expDate')");

    if (!$insertInfoInDB)
    {
        echo '<div class="info-box">';
        echo '<h2> Повторите попытку </h2>';
        echo '<a href="./../index.php" class="button button-anim"> вернуться на главную </a>';
        echo '</div>';
        echo '';
    }
    else
    {
        $to = $email;

        $subject = 'Сброс пароля';

        $message = '

        <!doctype html>
            <html>
            <head>
                <meta name="viewport" content="width=device-width">
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>Восстановление пароля</title>
                <style>
                @media only screen and (max-width: 620px) {
                    table[class=body] h1 {
                    font-size: 28px !important;
                    margin-bottom: 10px !important;
                    }
                    table[class=body] p,
                        table[class=body] ul,
                        table[class=body] ol,
                        table[class=body] td,
                        table[class=body] span,
                        table[class=body] a {
                    font-size: 16px !important;
                    }
                    table[class=body] .wrapper,
                        table[class=body] .article {
                    padding: 10px !important;
                    }
                    table[class=body] .content {
                    padding: 0 !important;
                    }
                    table[class=body] .container {
                    padding: 0 !important;
                    width: 100% !important;
                    }
                    table[class=body] .main {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important;
                    }
                    table[class=body] .btn table {
                    width: 100% !important;
                    }
                    table[class=body] .btn a {
                    width: 100% !important;
                    }
                    table[class=body] .img-responsive {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important;
                    }
                }

                @media all {
                .ExternalClass {
                    width: 100%;
                }
                .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                    line-height: 100%;
                }
                .apple-link a {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important;
                }
                #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                    font-size: inherit;
                    font-family: inherit;
                    font-weight: inherit;
                    line-height: inherit;
                }
                .btn-primary table td:hover {
                    background-color: #34495e !important;
                }
                .btn-primary a:hover {
                    color: #E31E24 !important;
                    background-color: #FFFFFF !important;
                    border-color: #E31E24 !important;
                }
                }
                </style>
            </head>
            <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                    <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
                    <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">
                        <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">
                        <tr>
                            <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Здравствуйте, '.$email.'.</p>
                                    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Чтобы восстановить пароль, перейдите по ссылке:</p>
                                    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                                    <tbody>
                                        <tr>
                                        <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                            <tbody>
                                                <tr>
                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> 
                                                    <a href="https://vsekanc.ru/newPassword.php?token=' . $token . '" target="_blank" style="display: inline-block; color: #ffffff; background-color: #E31E24; border: 3px solid #E31E24; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 12px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize;">ВОССТАНОВИТЬ ПАРОЛЬ</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        </table>

                    </div>
                    </td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                </tr>
                </table>
            </body>
            </html>
        ';

        $headers = 'Content-Type: text/html' . "\r\n" . 'From: help@vsekanc.ru';

        mail($to, $subject, $message, $headers);
        
        echo '<div class="info-box">';
        echo '<h2> Вам было отправлено письмо на почту с ссылкой на страницу сброса пароля </h2>';
        echo '<a href="./../index.php" class="button button-anim"> вернуться на главную </a>';
        echo '</div>';
    }
?>

</body>
</html>