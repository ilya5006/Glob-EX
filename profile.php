<?php
require_once __DIR__ . '/model/connection.php';

if (isset($_GET['change']))
{
    header('Location: ./model/updateUserInfo.php?fio=' . $_GET['fio'] . '&email=' . $_GET['email'] . '&phone_number=' . $_GET['phone_number'] . '&work_number=' .
            $_GET['work_number'] . '&id_user=' . $_GET['id_user']);
}
if (isset($_GET['change_password']))
{
    header('Location: ./model/updateUserPassword.php?');
}
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
            <form action="" method="GET" class="edit">
                <input type="text" name="id_user" value="<?php echo $_GET['id']; ?>" style="display: none;">
                <h3>Персональные данные</h3>
                <label class="placeinput">
                    <p class="input-info">ФИО:</p>
                    <?php echo '<input required="1" type="text" id="fio" name="fio" value="'.$userData['fio'].'">'; ?>
                    <div class="place_holder">Введите ФИО<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">e-mail:</p>
                    <?php echo '<input required="1" type="text" id="email" name="email" value="'.$userData['email'].'">'; ?>
                    <div class="place_holder">Введите почту<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">Мобильный тел.:</p>
                    <?php echo '<input required="1" type="tel" id="phone" name="phone_number" value="'.$userData['phone_number'].'">'; ?>
                    <div class="place_holder">Введите телефон<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">Рабочий тел.:</p>
                    <?php echo '<input type="text" id="adress" name="work_number" value="'.$userData['work_number'].'">'; ?>
                    <div class="place_holder">Введите адрес</div>
                </label>
                <div class="buttons">
                    <input id="editButton" class="button" type="submit" name="change" value="изменить">
                    <input id="editButton" class="button" type="submit" name="change_password" value="сменить пароль">
                </div>
            </form>

            <form action="" class="edit">
                <h3>Адреса доставки</h3>
                <label class="placeinput">
                    <p class="input-info">Адрес:</p>
                    <?php echo '<input required="1" type="text" id="fio" value="'.$userData['adress'].'">'; ?>
                    <div class="place_holder">Введите адрес<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">Доп. адрес:</p>
                    <?php echo '<input required="1" type="text" id="fio" value="'.$userData['additional_adress'].'">'; ?>
                    <div class="place_holder">Введите дополнительный адрес<span>*</span></div>
                </label>
                <div class="buttons">
                    <div id="editButton" class="button"> изменить </div>
                </div>
            </form>
        </div>
        <div class="two">
            <div class="orders">
                <?php
                    $favouriteResult = $mysqli->query("SELECT COUNT(*) FROM `user-favoutite` WHERE id_user = $idUser;");
                    $favouriteCount = $favouriteResult->fetch_row();
                ?>
                <h3>ЗАКАЗЫ</h3>
                <!-- <a href="#">Корзина товаров (25)</a>
                <a href="#">история заказов (3)</a> -->
                <? echo '<a href="favourite.php">избранные товары ('.$favouriteCount[0].')</a>'; ?>
            </div>

            <form class="mail">
                <h3>РАССЫЛКИ</h3>
                <label class="container" id="cart"> <p> e-mail рассылка</p> <input type="checkbox" name="mail"> <span class="checkmark"></span></label>
                <a href="favourite.php" class="button buttonMail">сохранить</a>
            </form>
        </div>
    </div>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>