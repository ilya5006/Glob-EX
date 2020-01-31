<?php
session_start();

if (empty($_COOKIE['isLogin'])) { header('Location: ' . $_SERVER['HTTP_REFERER']); }

require_once __DIR__ . '/model/connection.php';
require 'vendor/autoload.php';

if (isset($_GET['change']))
{
    header('Location: ./model/updateUserInfo.php?fio=' . $_GET['fio'] . '&email=' . $_GET['email'] . '&phone_number=' . $_GET['phone_number'] . '&work_number=' . $_GET['work_number']);
}
if (isset($_GET['change_password']))
{
    header('Location: ./model/updateUserPassword.php?');
}
// if (isset($_GET['change_address']))
// {
//     header('Location: ./model/updateUserAddress.php?address=' . $_GET['address'] . '&additional_address=' . $_GET['additional_address'] . '&id_user=' . $_COOKIE['isLogin']);
// }
if (isset($_GET['mailing']))
{
    header('Location: ./model/updateUserMailing.php?mailing=' . $_GET['mail']);
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
    <script src="./resource/js/detectBrowser.js"></script>
    <script src="./resource/js/header.js" defer></script>
    <script src="./resource/js/registration.js" defer></script>
    <script src="./resource/js/login.js" defer></script>
    <script src="./resource/js/favourite-cart.js" defer></script>
    <script src="./resource/js/showMessage.js" defer></script>
    <script src="./resource/js/profile.js" defer></script>
    <script src="//code-ya.jivosite.com/widget/LsTlT3PJe2" async></script>
</head>
<body>

<?php require(__DIR__ . '/view/header.php'); ?>

<div class="content" style="padding-top: 0">
    <div class="cat_fold">
        <a href="./index.php"> Главная </a>
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
                <h3>Персональные данные</h3>
                <label class="placeinput" style="margin-bottom: 30px;">
                    <p class="input-info">ФИО:</p>
                    <?php echo '<input required="1" type="text" name="fio" value="'.$userData['fio'].'" autocomplete="name">'; ?>
                    <div class="place_holder">Введите ФИО<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">e-mail:</p>
                    <?php echo '<input required="1" type="text" name="email" value="'.$userData['email'].'" autocomplete="email">'; ?>
                    <div class="place_holder">Введите почту<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">Мобильный тел.:</p>
                    <?php echo '<input required="1" type="tel" name="phone_number" value="'.$userData['phone_number'].'" autocomplete="tel">'; ?>
                    <div class="place_holder">Введите телефон<span>*</span></div>
                </label>
                <label class="placeinput">
                    <p class="input-info">Рабочий тел.:</p>
                    <?php echo '<input type="text" name="work_number" value="'.$userData['work_number'].'" autocomplete="tel-extension">'; ?>
                    <div class="place_holder">Введите адрес</div>
                </label>
                <div class="buttons">
                    <input id="editButton" class="button button-anim" type="submit" name="change" value="сохранить">
                    <div id="changePassword" class="button button-anim" name="change_password"> сменить пароль </div>
                </div>
            </form>

            <form action="./model/updateUserAddress.php" method="GET" class="edit">
                <h3>Адреса доставки</h3>
                <label class="placeinput">
                    <p class="input-info">Адрес:</p>
                    <?php echo '<input required="1" type="text" name="address" value="'.$userData['address'].'" autocomplete="address-line1">'; ?>
                    <div class="place_holder">Введите адрес<span>*</span></div>
                </label>
                <label class="placeinput additionalAdress" style="display: none;">
                    <p class="input-info">Доп. адрес:</p>
                    <?php echo '<input type="text" name="additional_address1" value="'.$userData['additional_address1'].'" autocomplete="address-line2">'; ?>
                    <div class="place_holder">Введите дополнительный адрес<span>*</span></div>
                </label>
                <label class="placeinput additionalAdress" style="display: none;">
                    <p class="input-info">Доп. адрес:</p>
                    <?php echo '<input type="text" name="additional_address2" value="'.$userData['additional_address2'].'" autocomplete="address-line2">'; ?>
                    <div class="place_holder">Введите дополнительный адрес<span>*</span></div>
                </label>
                <label class="placeinput additionalAdress" style="display: none;">
                    <p class="input-info">Доп. адрес:</p>
                    <?php echo '<input type="text" name="additional_address3" value="'.$userData['additional_address3'].'" autocomplete="address-line2">'; ?>
                    <div class="place_holder">Введите дополнительный адрес<span>*</span></div>
                </label>
                <label class="placeinput additionalAdress" style="display: none;">
                    <p class="input-info">Доп. адрес:</p>
                    <?php echo '<input type="text" name="additional_address4" value="'.$userData['additional_address4'].'" autocomplete="address-line2">'; ?>
                    <div class="place_holder">Введите дополнительный адрес<span>*</span></div>
                </label>
                <label class="placeinput additionalAdress" style="display: none;">
                    <p class="input-info">Доп. адрес:</p>
                    <?php echo '<input type="text" name="additional_address5" value="'.$userData['additional_address5'].'" autocomplete="address-line2">'; ?>
                    <div class="place_holder">Введите дополнительный адрес<span>*</span></div>
                </label>
                <div class="buttons">
                    <div class="button button-anim" id="addAddress"> Добавить адресс </div>
                    <input id="editButton" class="button button-anim" type="submit" name="change_address" value="сохранить">
                </div>
            </form>
        </div>

        <div class="two">
            <div class="orders">
                <?php
                    $favouriteResult = $mysqli->query("SELECT COUNT(*) FROM `user-favoutite` WHERE id_user = $idUser;");
                    $favouriteCount = $favouriteResult->fetch_row();

                    $cartResult = $mysqli->query("SELECT COUNT(*) FROM `user-cart` WHERE id_user = $idUser;");
                    $cartCount = $cartResult->fetch_row();

                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    $reader->setReadDataOnly(true);
                    $dir = "./orders/";
                    $orderFiles = array_diff( scandir( $dir), array('..', '.'));
                    $ordersCount = count($orderFiles);
                    $myOrder = 0;
                    if ($ordersCount > 0)
                    {
                        foreach($orderFiles as $order)
                        {
                            if ($order[0] != '~')
                            {
                                $pathToFile = './orders/' . $order;
                                $spreadsheet = $reader->load($pathToFile);
                                $orderData = $spreadsheet->getActiveSheet()->toArray(); 
    
                                if ($idUser ==  $orderData[1][0])
                                {
                                    $myOrder++;
                                }
                            }
                        }
                    }
                ?>
                <h3>ЗАКАЗЫ</h3>
                <? echo '<a href="cart.php">корзина товаров ('.$cartCount[0].')</a>'; ?>
                <? echo '<a href="order.php">история заказов ('.$myOrder.')</a>'; ?>
                <? echo '<a href="favourite.php">избранные товары ('.$favouriteCount[0].')</a>'; ?>
            </div>

            <form class="mail" method="GET" action="">
                <h3>РАССЫЛКИ</h3>
                <label class="container" id="cart"> <p> e-mail рассылка</p> <input type="checkbox" name="mail"> <span class="checkmark"></span></label>
                <input type="submit" name="mailing" href="./profile.php" class="button buttonMail" value="сохранить">
            </form>
        </div>
    </div>
</div>

<div id="modal_changePassword" style="display: none;">
    <div class="modal">
        <h3> Смена пароля </h3>
        <form class="changePassword">

            <label class="placeinput">
                <input required="1" type="password" id="current-password" autocomplete="current-password"/>
                <div class="place_holder">Введите старый пароль<span>*</span></div>
            </label>

            <label class="placeinput">
                <input required="1" type="password" id="new-password" autocomplete="new-password"/>
                <div class="place_holder">Введите новый пароль<span>*</span></div>
            </label>

            <label class="placeinput">
                <input required="1" type="password" id="re-new-password" autocomplete="new-password"/>
                <div class="place_holder">Повторите новый пароль<span>*</span></div>
            </label>

            <p class="require"> <span>*</span> Поля обязательные для ввода</p>

            <div id="loginButton"> СМЕНИТЬ ПАРОЛЬ </div>

        </form>
    </div>
</div>

<?php require(__DIR__ . '/view/footer.php'); ?>

</body>
</html>