<?php

require_once __DIR__ . '/../model/xmlparser.php';

$categoryId = $_GET['id'];

function quantityOfGoodsForOneBrand($brandId)
{
    global $goods;
    $quantity = 0;
    foreach ($goods as $goodId => $goodInfo)
    {
        if ($goodInfo['brand'] == $brandId) 
            $quantity++;
    }

    return $quantity;
}

$brands = $xmlParseData['brands'];
$partitions = $xmlParseData['partitions'];
$goods = $xmlParseData['nomeklatura'];

foreach ($brands as $brandId => $brandInfo)
{
    $brands[$brandId]['image'] = str_replace('user587s.beget.tech', 'user587s:CgIc6Wbt@user587s.beget.tech', $brands[$brandId]['image']);
}
// $img = base64_encode(file_get_contents('ftp://user587s:CgIc6Wbt@user587s.beget.tech/Data/Картинки и баннеры/Логотипы/1.jpg'));
?>

<div class="content" style="padding-top: 0">
    <div class="catalg_view">
        <div class="filters">
            <div class="price-filter">
                <p>Цена:</p>
                <div class="price-input">
                    <input title="минимальная цена" id="price-min">
                    <p>-</p>
                    <input title="максимальная цена" id="price-max">
                </div>
                <div id="slider"></div>
            </div>
            <div class="filter">
                <p>Бренд</p>
                <ul>
                    <li>
                        <?php
                        foreach ($brands as $brandId => $brandInfo)
                        {
                            $goodsQuantity = quantityOfGoodsForOneBrand($brandId);
                            echo '<label class="container">';
                                echo '<p>' . $brandInfo['name'] . ' (' . $goodsQuantity . ') </p> <input type="checkbox"> <span class="checkmark"></span>';
                            echo '</label>';
                        }
                        ?>
                        <!-- <label class="container">
                            <p>SvetoCopy (4)</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label> -->
                    </li>
                </ul>
            </div>
            <div class="filter">
                <p>ФОРМАТ</p>
                <ul>
                    <li>
                        <label class="container">
                            <p>A4 (3)</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>A5 (3)</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>A3 (3)</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>A2 (3)</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>A1 (3)</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="filter">
                <p>ХАРАКТЕРИСТИКА</p>
                <ul>
                    <li>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="filter">
                <p>ХАРАКТЕРИСТИКА</p>
                <ul>
                    <li>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            <p>Атрибут</p> <input type="checkbox"> <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="products">
            <div class="cat_fold">
                <p class="catalog_expand_button"> Каталог</p>
                <?php
                if ($partitions[$categoryId]['top_id'] === '') // Category 1
                {
                    echo '<p> <span> &frasl; ' . $partitions[$categoryId]['name'] . ' </span> </p>';
                }
                else
                {
                    $topId = $partitions[$categoryId]['top_id'];
                    $topIdCategory2 = $partitions[$topId];

                    if ($topIdCategory2['top_id'] === '') // Category 2
                    {
                        echo '<a href="#"> &frasl; ' . $topIdCategory2['name'] . ' </a>';
                        echo '<p> <span> &frasl; ' . $partitions[$categoryId]['name'] . '</span> </p>';
                    }
                    else // Category 3
                    {
                        $topIdCategory3 = $partitions[$topIdCategory2['top_id']];

                        echo '<a href="#"> &frasl; ' . $topIdCategory3['name'] . ' </a>';
                        echo '<a href="#"> &frasl; ' . $topIdCategory2['name'] . ' </a>';
                        echo '<p> <span> &frasl; ' . $partitions[$categoryId]['name'] . ' </span> </p>';
                    }
                }
                ?>
                <!-- <a href="#"> &frasl; Канцелярские товары </a>
                <p> <span> &frasl; Бумага для печати </span> </p> -->
            </div>
            <!-- СЛАЙДЕР С БРЕНДАМИ -->
            <div class="slider_header">
                <h2> Бренды </h2>
                <div class="slide_left slide_anim"> <span>&#60;</span> </div>
                <div class="slide_right slide_anim"> <span>&#62;</span> </div>
            </div>
            <div class="scroll">
            <?php
            foreach ($brands as $brandId => $brandInfo)
            {
                $img = base64_encode(file_get_contents($brandInfo['image']));
                echo '<a href="#" class="brand"><img src="data:image/png;base64,' . $img . '"> <span class="name" style="display: none;">'.$brandInfo['name'].'</span> </a>';
            }
            ?> 
                <!-- <a href="#" class="brand"><img src="./../resource/img/brands/1.jpg"></a> ПРИМЕР ИЗОБРАЖЕНИЯ БРЕНДА -->
            </div>
            <!-- КОНЕЦ СЛАЙДЕРА С БРЕНДАМИ -->

            <div class="sort">
                <p>
                    Сортировка:
                    <select>
                        <option value="10">По популярности</option>
                        <option value="30">Сначала дешевые</option>
                        <option value="50">Сначала дорогие</option>
                    </select>
                </p>

                <p>
                    Товаров на странице:
                    <select>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                    </select>
                </p>

                <div class="view">
                    <img src="./resource/img/icons/block.png" alt="sort" id="sort-block">
                    <img src="./resource/img/icons/horizontal.png" alt="sort" id="sort-hor">
                </div>
            </div>

            <ul class="pagination">
                <li> <a href="#">1</a></li>
                <li> <a href="#">2</a></li>
                <li> <a href="#" class="active">3</a></li>
                <li> <a href="#">4</a></li>
                <li> <a href="#">5</a></li>
            </ul>

            <div class="list-products">
                <div class="product">
                    <label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label>
                    <a href="#" class="product-image"><img src="./resource/img/products/product.jpg" alt="фотография продукта"></a>
                    <div class="product-disc">
                        <p class="product-name">Швабра-лентяйка Viieda самоотжимающаяся</p>
                        <p class="article" style="display: none;"> Сюда артикул </p>
                        <div class="features">
                            <p class="feature">Формат А4</p>
                            <p class="feature">Класс А</p>
                            <p class="feature">Плотность 80 г/м2</p>
                            <p class="feature">Листов в пачке 500 шт</p>
                            <p class="feature_button">Больше характеристик</p>
                        </div>
                    </div>
                    <div class="product-act">
                        <p class="available">есть в наличии <span class="available-count">500</span> </p>
                        <p class="new-price">375р</p>
                        <p style="display: none;">БРЕНД: <a href="#">SVETOCOPY</a></p>
                        <div class="inp-cart-fav">
                            <input class="product-count" type="number" name="" id="" min="1" max="999" value="1">
                            <button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>
                            <img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">
                        </div>
                    </div>
                </div>
                <div class="product">
                    <label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label>
                    <a href="#" class="product-image"><img src="./resource/img/products/product.jpg" alt="фотография продукта"></a>
                    <div class="product-disc">
                        <p class="product-name">Швабра-лентяйка Viieda самоотжимающаяся</p>
                        <p class="article" style="display: none;"> Сюда артикул </p>
                        <div class="features">
                            <p class="feature">Формат А4</p>
                            <p class="feature">Класс А</p>
                            <p class="feature">Плотность 80 г/м2</p>
                            <p class="feature">Листов в пачке 500 шт</p>
                            <p class="feature_button">Больше характеристик</p>
                        </div>
                    </div>
                    <div class="product-act">
                        <p class="available">есть в наличии <span class="available-count">500</span> </p>
                        <p class="new-price">375р</p>
                        <p style="display: none;">БРЕНД: <a href="#">SVETOCOPY</a></p>
                        <div class="inp-cart-fav">
                            <input class="product-count" type="number" name="" id="" min="1" max="999" value="1">
                            <button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>
                            <img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">
                        </div>
                    </div>
                </div>
                <div class="product">
                    <label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label>
                    <a href="#" class="product-image"><img src="./resource/img/products/product.jpg" alt="фотография продукта"></a>
                    <div class="product-disc">
                        <p class="product-name">Швабра-лентяйка Viieda самоотжимающаяся</p>
                        <p class="article" style="display: none;"> Сюда артикул </p>
                        <div class="features">
                            <p class="feature">Формат А4</p>
                            <p class="feature">Класс А</p>
                            <p class="feature">Плотность 80 г/м2</p>
                            <p class="feature">Листов в пачке 500 шт</p>
                            <p class="feature_button">Больше характеристик</p>
                        </div>
                    </div>
                    <div class="product-act">
                        <p class="available">есть в наличии <span class="available-count">500</span> </p>
                        <p class="new-price">375р</p>
                        <p style="display: none;">БРЕНД: <a href="#">SVETOCOPY</a></p>
                        <div class="inp-cart-fav">
                            <input class="product-count" type="number" name="" id="" min="1" max="999" value="1">
                            <button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>
                            <img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">
                        </div>
                    </div>
                </div>
                <div class="product">
                    <label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label>
                    <a href="#" class="product-image"><img src="./resource/img/products/product.jpg" alt="фотография продукта"></a>
                    <div class="product-disc">
                        <p class="product-name">Швабра-лентяйка Viieda самоотжимающаяся</p>
                        <p class="article" style="display: none;"> Сюда артикул </p>
                        <div class="features">
                            <p class="feature">Формат А4</p>
                            <p class="feature">Класс А</p>
                            <p class="feature">Плотность 80 г/м2</p>
                            <p class="feature">Листов в пачке 500 шт</p>
                            <p class="feature_button">Больше характеристик</p>
                        </div>
                    </div>
                    <div class="product-act">
                        <p class="available">есть в наличии <span class="available-count">500</span> </p>
                        <p class="new-price">375р</p>
                        <p style="display: none;">БРЕНД: <a href="#">SVETOCOPY</a></p>
                        <div class="inp-cart-fav">
                            <input class="product-count" type="number" name="" id="" min="1" max="999" value="1">
                            <button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>
                            <img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">
                        </div>
                    </div>
                </div>
                <div class="product">
                    <label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label>
                    <a href="#" class="product-image"><img src="./resource/img/products/product.jpg" alt="фотография продукта"></a>
                    <div class="product-disc">
                        <p class="product-name">Швабра-лентяйка Viieda самоотжимающаяся</p>
                        <p class="article" style="display: none;"> Сюда артикул </p>
                        <div class="features">
                            <p class="feature">Формат А4</p>
                            <p class="feature">Класс А</p>
                            <p class="feature">Плотность 80 г/м2</p>
                            <p class="feature">Листов в пачке 500 шт</p>
                            <p class="feature_button">Больше характеристик</p>
                        </div>
                    </div>
                    <div class="product-act">
                        <p class="available">есть в наличии <span class="available-count">500</span> </p>
                        <p class="new-price">375р</p>
                        <p style="display: none;">БРЕНД: <a href="#">SVETOCOPY</a></p>
                        <div class="inp-cart-fav">
                            <input class="product-count" type="number" name="" id="" min="1" max="999" value="1">
                            <button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>
                            <img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">
                        </div>
                    </div>
                </div>
                <div class="product">
                    <label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label>
                    <a href="#" class="product-image"><img src="./resource/img/products/product.jpg" alt="фотография продукта"></a>
                    <div class="product-disc">
                        <p class="product-name">Швабра-лентяйка Viieda самоотжимающаяся</p>
                        <p class="article" style="display: none;"> Сюда артикул </p>
                        <div class="features">
                            <p class="feature">Формат А4</p>
                            <p class="feature">Класс А</p>
                            <p class="feature">Плотность 80 г/м2</p>
                            <p class="feature">Листов в пачке 500 шт</p>
                            <p class="feature_button">Больше характеристик</p>
                        </div>
                    </div>
                    <div class="product-act">
                        <p class="available">есть в наличии <span class="available-count">500</span> </p>
                        <p class="new-price">375р</p>
                        <p style="display: none;">БРЕНД: <a href="#">SVETOCOPY</a></p>
                        <div class="inp-cart-fav">
                            <input class="product-count" type="number" name="" id="" min="1" max="999" value="1">
                            <button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>
                            <img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>