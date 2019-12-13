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
    <h2> Мой профиль </h2>
    <?php
        $userEnteties = $mysqli->query("SELECT * FROM users_entities WHERE id_user = $idUser;")->num_rows;
        $userIndividuals = $mysqli->query("SELECT * FROM users_individuals WHERE id_user = $idUser;")->num_rows;
        //if ($userIndividuals == 1) { echo '<p class="usr-type"> Вы - физическое лицо. </p>'; }
        //if ($userEnteties == 1) { echo '<p class="usr-type"> Вы - юридическое лицо. </p>'; }
    ?>

    <div class="profile">
        <div class="first">
            <form action="" class="edit">
                <h3>Персональные данные</h3>
                <label class="placeinput">
                    <p class="input-info">ФИО:</p>
                    <? echo '<input required="1" type="text" id="fio" value="'.$userData['fio'].'">'; ?>
                    <div class="place_holder">Введите ФИО<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">e-mail:</p>
                    <? echo '<input required="1" type="text" id="email" value="'.$userData['email'].'">'; ?>
                    <div class="place_holder">Введите почту<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">Мобильный тел.:</p>
                    <? echo '<input required="1" type="tel" id="phone" value="'.$userData['phone_number'].'">'; ?>
                    <div class="place_holder">Введите телефон<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">Рабочий тел.:</p>
                    <? echo '<input required="1" type="text" id="adress" value="'.$userData['work_number'].'">'; ?>
                    <div class="place_holder">Введите адрес<span>*</span></div>
                </label>
                <div class="buttons">
                    <div id="editButton" class="button"> изменить </div>
                    <div id="editButton" class="button"> сменить пароль </div>
                </div>
            </form>
        </div>
        <div class="two">
            <div class="orders">
                <h3>ЗАКАЗЫ</h3>
                <a href="#">Корзина товаров (25)</a>
                <a href="#">история заказов (3)</a>
                <a href="favourite.php">избранные товары (122)</a>
            </div>
        </div>
    </div>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>