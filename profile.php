<?php
require_once __DIR__ . '/model/connection.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Профиль </title>
    <link rel="shortcut icon" href="./resource/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/base.css">
    <link rel="stylesheet" href="./resource/css/header.css">
    <link rel="stylesheet" href="./resource/css/profile.css">
    <link rel="stylesheet" href="./resource/css/footer.css">
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/favourite.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<div class="content" style="padding-top: 0">
    <div class="cat_fold">
        <p> Главная </p>
        <p><span> &#92; Профиль </span></p>
    </div>
    <h2> Профиль </h2>
    <div class="sliders">
        <?php echo '<a class="profile active" href="./profile.php?id='.$idUser.'"> Информация </a>' ?>
        <a class="orders" href="./orders.php"> Заказы </a>
    </div>

    <h2> Изменить информацию </h2>
    
    <?php
        $userEnteties = $mysqli->query("SELECT * FROM users_entities WHERE id_user = $idUser;")->num_rows;
        $userIndividuals = $mysqli->query("SELECT * FROM users_individuals WHERE id_user = $idUser;")->num_rows;
        if ($userIndividuals == 1) { echo '<p class="usr-type"> Вы - физическое лицо. </p>'; }
        if ($userEnteties == 1) { echo '<p class="usr-type"> Вы - юридическое лицо. </p>'; }
    ?>
    <form action="" class="edit">

        <p class="input-info">Имя</p>
        <label class="placeinput">
            <? echo '<input required="1" type="text" id="fio" value="'.$userData['fio'].'">'; ?>
            <div class="place_holder">Введите ФИО<span>*</span></div>
        </label>

        <p class="input-info">Почта</p>
        <label class="placeinput">
            <? echo '<input required="1" type="text" id="email" value="'.$userData['email'].'">'; ?>
            <div class="place_holder">Введите почту<span>*</span></div>
        </label>

        <p class="input-info">Телефон</p>
        <label class="placeinput">
            <? echo '<input required="1" type="tel" id="phone" value="'.$userData['phone_number'].'">'; ?>
            <div class="place_holder">Введите телефон<span>*</span></div>
        </label>

        <p class="input-info">Адрес</p>
        <label class="placeinput">
            <? echo '<input required="1" type="text" id="adress" value="'.$userData['address'].'">'; ?>
            <div class="place_holder">Введите адрес<span>*</span></div>
        </label>

        <div id="editButton"> изменить </div>

    </form>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>