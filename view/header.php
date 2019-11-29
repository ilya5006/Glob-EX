<header class="header">
    <div class="content">
        <div class="menu">
            <a href="#"><img src="./resource/img/logo.svg" alt="logo"></a>
            <ul>
                <li><a href="#">ДОСТАВКА</a></li>
                <li><a href="#">ОПЛАТА</a></li>
                <li><a href="#">КОНТАКТЫ</a></li>
                <li><a href="#">ЗАДАТЬ ВОПРОС</a></li>
                <li><a href="#">О КОМПАНИИ</a></li>
                <li><a href="#" class="tel">8-495-380-42-88</a></li>
            </ul>
        </div>
        <div class="nav">
            <button class="catalog" id="catalog"><span>|||</span> КАТАЛОГ ТОВАРОВ</button>

            <div class="expand-catalog hide">
                <a class="cat_1" href="#"> <img src="./resource/img/icons/percent.svg"><p> АКЦИИ И СКИДКИ </p></a>
                <a class="cat_1" href="#"> <img src="./resource/img/icons/clip.svg"><p> КАНЦЕЛЯРСКИЕ ТОВАРЫ </p><span>&#62;</span> </a>
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

                <a class="cat_1" href="#"> <img src="./resource/img/icons/bucket.svg"><p>ХОЗТОВАРЫ</p><span>&#62;</span></a>
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

                <a class="cat_1" href="#"> <img src="./resource/img/icons/furniture.svg"><p>МЕБЕЛЬ</p><span>&#62;</span></a>
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
                <li><a href="#"><img src="./resource/img/icons/favourite.svg" alt="favorite"></a></li>
                <li><a href="#"><img src="./resource/img/icons/cart.svg" alt="cart"></a></li>
                <li class="account"><a id="login_button"><img src="./resource/img/icons/account.svg" alt="account"><p>Войти</p></a></li>
            </ul>
        </div>
    </div>
</header>

<div id="modal_authorize">
    <div class="modal">
        <p id="close_modal"> x </p>
        <form action="../model/login.php" class="login">
            <input type="text">
            <input type="password">
            <input type="submit" value="войти">
        </form>
    </div>
</div>