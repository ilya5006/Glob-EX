<?
require_once __DIR__ . '/../model/xmlparser.php';
require_once __DIR__ . '/../model/connection.php';

$data = $xmlParseData['partitions'];

$first = [];
$two = [];
$three = [];

function categoryLevel(array $arr, int $id, int $numb)
{
    $topId = $arr[$id]['top_id'];
    $counter = $numb;

    if ($arr[$id]['top_id'] != '')
    {
        ++$counter;
        return categoryLevel($arr, $topId, $counter);
    }

    return $counter + 1;
}

foreach($data as $category)
{
    if (categoryLevel($data, $category['id'], 0) == '1')
    {
        array_push($first, $category);
    }

    if (categoryLevel($data, $category['id'], 0) == '2')
    {
        array_push($two, $category);
    }

    if (categoryLevel($data, $category['id'], 0) == '3')
    {
        array_push($three, $category);
    }
}

$categories['first'] = $first;
$categories['two'] = $two;
$categories['three'] = $three;

// echo "<pre>";
// var_dump($categories);
// echo "</pre>";

if (isset($_COOKIE['isLogin']))
{
    $idUser = (int)$_COOKIE['isLogin'];
    $result = $mysqli->query("SELECT * FROM users_all WHERE id_user = $idUser;");
    $userData = $result->fetch_assoc();
    $fio = explode(' ', $userData['fio']);
    }
?>

<header class="header">
    <div class="content" style="padding-bottom: 0;">
        <div class="menu">
            <a href="./index.php"><img src="./resource/img/logo.svg" alt="logo"></a>
            <ul>
                <li><a href="./../delivery.php">ДОСТАВКА</a></li>
                <li><a href="./../payment.php">ОПЛАТА</a></li>
                <li><a href="#">КОНТАКТЫ</a></li>
                <li><a href="#">ЗАДАТЬ ВОПРОС</a></li>
                <li><a href="#">О КОМПАНИИ</a></li>
                <li><p class="tel">8-495-380-42-88</p></li>
            </ul>
        </div>
        <div class="nav">
            <button class="catalog" id="catalog"><span>|||</span> КАТАЛОГ ТОВАРОВ</button>
            <div class="expand-catalog hide">
            <?php

            foreach($categories['first'] as $category)
            {
                $idFirst = $category['id'];
                echo '<a order="'.$category['sort'].'" class="cat_1" href="catalog.php?id='.$category['id'].'"> <img src="./resource/img/icons/clip.svg"><p>'.$category['name'].'</p><span>&#62;</span> </a>';
                echo '<div class="expand-cat_2 hide">';
                echo '<ul>';
                    foreach($categories['two'] as $category)
                    {
                        if ($idFirst == $category['top_id'])
                        {
                            $idTwo = $category['id'];
                            echo '<li order="'.$category['sort'].'"> <a href="products.php?id='.$category['id'].'"><span>'.$category['name'].'</span> </a></li>';
                            foreach($categories['three'] as $category)
                            {
                                if ($idTwo == $category['top_id'])
                                {
                                    echo '<li order="'.$category['sort'].'"><a href="products.php?id='.$category['id'].'">'.$category['name'].'</a></li>';
                                }
                            }
                        }
                    }
                    echo '</ul>';
                echo '</div>';
            }
                    
            ?>
            </div>

            <form action="#" class="searchForm">
                <input type="search" placeholder="Поиск...">
                <button><img src="./resource/img/icons/search.svg" alt="search"></button>
                <div id="searchResult"> </div>
            </form>
            <ul>
                <li><a href="./favourite.php"><img src="./resource/img/icons/favourite.svg" alt="favorite"></a></li>
                <li><a href="./cart.php"><img src="./resource/img/icons/cart.svg" alt="cart"></a></li>
                <?php
                    if (isset($idUser) && !empty($userData))
                    {
                        echo '
                                <li class="account"><a id="profie_button"><img src="./resource/img/icons/account.svg" alt="account"><p>'.$fio[1] , ' ', mb_substr($fio[0], 0, 1), '.'.'<span class="arrow_down"> </span></p></a>
                                    <div class="user-act">
                                        <a href="../profile.php?id='.$idUser.'"> Профиль </a>
                                        <a href="../model/logout.php"> Выход </a>
                                    </div>
                                </li>';
                    }
                    else
                    {
                        echo '<li class="account"><a id="login_button"><img src="./resource/img/icons/account.svg" alt="account"><p>Войти <span class="arrow_down"></span></p></a></li>';
                    }
                ?>
                
            </ul>
        </div>
    </div>
</header>

<div id="modal_authorize" style="display: none;">
    <div class="modal">
        <div class="type_auth"> <p id='log_form' class="active"> ВОЙТИ </p> <p id="reg_form"> ЗАРЕГИСТРИРОВАТЬСЯ</p></div>
        <form action="../model/login.php" class="login">

            <label class="placeinput">
                <input required="1" type="text" id="login" />
                <div class="place_holder">Введите телефон или e-mail<span>*</span></div>
            </label>

            <label class="placeinput">
                <input required="1" type="password" id="passwordLogin" />
                <div class="place_holder">Введите пароль<span>*</span></div>
            </label>

            <a href="#" class="forget_password"> Забыли пароль? </a>
            <p class="require"> <span>*</span> Поля обязательные для ввода</p>

            <div id="loginButton"> войти </div>

        </form>

        <form class="register" style="display: none">

            <label class="placeinput" id="fio_label">
                <input required="1" type="text" name="fio" id="fio" autocomplete="name"/>
                <div class="place_holder">Введите фио<span>*</span></div>
            </label>

            <label class="placeinput" id="email_label">
                <input required="1" type="text" name="email" id="email" autocomplete="email"/>
                <div class="place_holder">Введите email<span>*</span></div>
            </label>
            <label class="placeinput" id="tel_label">
                <input required="1" type="tel" name="phone_number" id="tel" autocomplete="tel"/>
                <div class="place_holder">Введите телефон<span>*</span></div>
            </label>

            <div class="passwords" id="password_label">
                <label class="placeinput" id="first_password">
                    <input required="1" type="password" name="password" id="passwordRegister" />
                    <div class="place_holder">Введите пароль<span>*</span></div>
                </label>
                <label class="placeinput" id="second_password">
                    <input required="1" type="password" id="passwordRegisterAgain" />
                    <div class="place_holder">Повторите пароль<span>*</span></div>
                </label>
            </div>

            <div class="user-type" style="width: 100%;">
                <label class="container" id="individual"> <p> Частное лицо</p> <input type="radio" name="user_type" > <span class="checkmark"></span> </label>
                <label class="container" id="entities"> <p> Юридическое лицо</p> <input type="radio" name="user_type"  > <span class="checkmark"></span> </label>
            </div>
            <label class="container" id="personal_data"> <p>Согласен на <a href="#">обработку персональных данных *</a></p> <input type="checkbox" > <span class="checkmark"></span> </label>

            <label class="container" id="mailing"> <p>Я хочу получать рассылку об акциях и новостях</p> <input type="checkbox" > <span class="checkmark"></span> </label>

            <p class="require"> <span>*</span> Поля обязательные для ввода</p>

            <div id="registerButton"> зарегистрироваться </div>
        </form>

    </div>
</div>
