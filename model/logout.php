<?php
    setcookie('isLogin', '', time() - 3600, '/', $_SERVER['SERVER_NAME']);
    header("Location: ./../../index.php");
?>