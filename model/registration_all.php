<?php
    $role = mysqli_real_escape_string($link, $_GET['role']);
    $surName = mysqli_real_escape_string($link, $_GET['surname']);
    $firstName = mysqli_real_escape_string($link, $_GET['first_name']);
    $middleName = mysqli_real_escape_string($link, $_GET['middle_name']);
    $login = mysqli_real_escape_string($link, $_GET['login']);
    $password = mysqli_real_escape_string($link, $_GET['password']);
    $email = mysqli_real_escape_string($link, $_GET['email']);
    $phoneNumber = mysqli_real_escape_string($link, $_GET['phone_number']);
    $address = mysqli_real_escape_string($link, $_GET['address']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($link, "INSERT INTO users_all VALUES (NULL, '$role', '$surName', '$firstName', '$middleName', '$login', '$password', '$email', '$phoneNumber', '$address')");
?>