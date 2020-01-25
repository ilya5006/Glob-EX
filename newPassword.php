<?php
if (empty($_GET['token']))
{
    header("Location: ./index.php");
}

$token = $_GET['token'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Изменение пароля </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/profile.css">
    <script src="./resource/js/detectBrowser.js"></script>
    <style>
        body { position: relative; background-color: rgb(227, 30, 36); }
        h2 { text-align: center; margin-bottom: 55px;}
        form 
        {
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
            width: 600px; 
            background-color: #FFFFFF; 
            padding: 55px; 
            position: absolute;
            top: 240px;
            left: 50%;
            transform: translate(-50%, 0%);
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
        }
        form input[type=password]
        {
            width: 80%;
            height: 40px;
            margin: 15px;
            padding: 5px 15px;
            border: 0;
            border-bottom: 1px rgb(208, 208, 208) solid;
        }
        @media screen and (max-width: 650px) { form { width: 100%; } form input[type=password] { width: 100% } }
    </style>
</head>
<body>
    <div class="content">
        <form action="./model/updateUserPasswordRecovery.php" method="GET" id="new_password">
            <input type="text" name="token" value="<?php echo $token; ?>" style="display: none;">
            <input type="password" name="new_password" placeholder="Введите новый пароль">
            <input type="password" name="new_password_repeat" placeholder="Повторите новый пароль">
            <input type="submit" value="Изменить пароль" class="button button-anim" style="align-self: center;">
        </form>
    </div>
</body>
</html>