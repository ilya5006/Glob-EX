<header class="header">
    <div class="content" style="padding-bottom: 0;">
        <div class="menu">
            <a href="./index.php"><img src="./resource/img/logo.svg" alt="logo"></a>
            <ul>
                <li><a href="#">ДОСТАВКА</a></li>
                <li><a href="#">ОПЛАТА</a></li>
                <li><a href="#">КОНТАКТЫ</a></li>
                <li><a href="#">ЗАДАТЬ ВОПРОС</a></li>
                <li><a href="#">О КОМПАНИИ</a></li>
                <li><p class="tel">8-495-380-42-88</p></li>
            </ul>
        </div>
        <div class="nav">
            <button class="catalog" id="catalog"><span>|||</span> КАТАЛОГ ТОВАРОВ</button>

            <div class="expand-catalog hide">
                <a class="cat_1" href="#"> <img src="./resource/img/icons/percent.svg"><p> АКЦИИ И СКИДКИ </p></a>
                <a class="cat_1"> <img src="./resource/img/icons/clip.svg"><p> КАНЦЕЛЯРСКИЕ ТОВАРЫ </p><span>&#62;</span> </a>
                <div class='expand-cat_2 hide'>
                    <ul>
                        <li><span>1</span></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                    </ul>
                </div>

                <a class="cat_1"> <img src="./resource/img/icons/bucket.svg"><p>ХОЗТОВАРЫ</p><span>&#62;</span></a>
                <div class='expand-cat_2 hide'>
                    <ul>
                        <li><span>2</span></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                    </ul>
                </div>

                <a class="cat_1"> <img src="./resource/img/icons/furniture.svg"><p>МЕБЕЛЬ</p><span>&#62;</span></a>
                <div class='expand-cat_2 hide'>
                    <ul>
                        <li><span>3</span></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                        <li><a href="#">asdasd</a></li>
                    </ul>
                </div>
            </div>

            <form action="#">
                <input type="search" placeholder="Поиск...">
                <button><img src="./resource/img/icons/search.svg" alt="search"></button>
            </form>
            <ul>
                <li><a href="./favourite.php"><img src="./resource/img/icons/favourite.svg" alt="favorite"></a></li>
                <li><a href="./cart.php"><img src="./resource/img/icons/cart.svg" alt="cart"></a></li>
                <li class="account"><a id="login_button"><img src="./resource/img/icons/account.svg" alt="account"><p>Войти <span>&#62;</span></p></a></li>
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
                <input required="1" type="text" name="fio" id="fio" />
                <div class="place_holder">Введите фио<span>*</span></div>
            </label>

            <label class="placeinput" id="email_label">
                <input required="1" type="text" name="email" id="email" />
                <div class="place_holder">Введите email<span>*</span></div>
            </label>
            <label class="placeinput" id="tel_label">
                <input required="1" type="tel" name="phone_number" id="tel" />
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

            <div class="user-type">
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