<?php
    require_once './connection.php';
    $currentPassword = $mysqli->escape_string($_POST['current_password']);
    $newPassword = $mysqli->escape_string($_POST['new_password']);
    $newPasswordRepeat = $mysqli->escape_string($_POST['new_password_repeat']);
    $idUser = $mysqli->escape_string($_COOKIE['isLogin']);

    $userPasswordHashDB = $mysqli->query("SELECT password FROM users_all WHERE id_user = '$idUser'");
    $userPasswordHash = $userPasswordHashDB->fetch_assoc()['password'];
    $userPassword = password_verify($currentPassword, $userPasswordHash);

    if (!$userPassword)
    {
        echo json_encode(['Вы ввели неверный пароль']);
        die();
    }
    if ($newPassword != $newPasswordRepeat)
    {
        echo json_encode(['Введённые новые пароли несовпадают']);
        die();
    }

    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $isQuerySucces = $mysqli->query("UPDATE users_all SET password = '$newPasswordHash' WHERE id_user = '$idUser'");

    if ($isQuerySucces)
    {
        echo json_encode('Пароль успешно обновлён');
    }
    else
    {
        echo json_encode('Что-то пошло не так, попробуйте ещё раз');
    }
?>