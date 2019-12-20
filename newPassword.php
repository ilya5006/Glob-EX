<?php
if (empty($_GET['token']))
{
    header("Location: ./index.php");
}

// TODO: Проверка на совпадение паролей

$token = $_GET['token'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Оплата </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <script src="./resource/js/detectBrowser.js"></script>
</head>
<body>
    <div class="content">
        <form action="./model/updateUserPasswordRecovery.php" method="GET" id="new_password">
            <input type="text" name="token" value="<?php echo $token; ?>" style="display: none;">
            <input type="password" name="new_password" placeholder="Введите новый пароль">
            <input type="password" name="new_password_repeat" placeholder="Введите новый пароль">
            <input type="submit" value="Сохранить">
        </form>
    </div>
</body>
</html>