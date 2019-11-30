<?php
    $loginEntered = mysqli_real_escape_string($link, $_GET['login']);
    $passwordEntered = mysqli_real_escape_string($link, $_GET['password']);

    $loginPasswordDbQuery = mysqli_query($link, "SELECT login, password, id_user FROM users_all WHERE login = '$loginEntered'");
    $loginPasswordDb = mysqli_fetch_row($loginPasswordDbQuery);
    $passwordDb = $loginPasswordDb[1];

    if (password_verify($passwordEntered, $passwordDb))
    {
        // Пользователь успешно вошёл
    }
    else
    {
        // Логин или пароль неверны
    }

    header("Location: ../index.php");
?>