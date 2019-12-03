<?php
    $loginEntered = mysqli_real_escape_string($link, $_GET['login']);
    $passwordEntered = mysqli_real_escape_string($link, $_GET['password']);

    $loginPasswordIdDbQuery = mysqli_query($link, "SELECT login, password, id_user FROM users_all WHERE login = '$loginEntered'");
    $loginPasswordIdDb = mysqli_fetch_row($loginPasswordIdDbQuery);
    $passwordDb = $loginPasswordIdDb[1];
    $idDb = $loginPasswordIdDb[2];

    if (password_verify($passwordEntered, $passwordDb))
    {
        setcookie("isLogin", md5($idDb), time() + 60*60*24*7); // 7 дней
    }
    else
    {
        // Логин или пароль неверны
    }
?>