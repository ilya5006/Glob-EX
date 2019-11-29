<?php
    $login = mysqli_real_escape_string($link, $_GET['login']);
    $password = mysqli_real_escape_string($link, $_GET['password']);
    $email = mysqli_real_escape_string($link, $_GET['email']);

    mysqli_query($link, "INSERT INTO users VALUES (NULL, '$login', '$password', '$email')");
?>