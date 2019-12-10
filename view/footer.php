<?php

require_once __DIR__ . '/../model/xmlparser.php';

$data = $xmlParseData['partitions'];
$categories = [];


foreach($data as $category)
{
    if ($category['top_id'] == '')
    {
        array_push($categories, $category);
    }
}

?>

<footer class="footer">
    <div class="content">
        <ul class="logo">
            <li><a href="#" class="exception"><img src="./resource/img/logo.svg" alt="logo"></a></li>
            <li><a href="#" class="exception"><span>ПОЛИТИКА КОНФЕДЕНЦИАЛЬНОСТИ</span></a></li>
        </ul>
        <ul>
            <li><a href="#" class="catalog_expand_button">КАТАЛОГ</a></li>
            <?php
            foreach($categories as $category)
            {
                echo '<li><a href="products.php?id='.$category['id'].'">'.$category['name'].'</a></li>';
            }
            ?>
            <!-- <li><a href="#">КАНЦЕЛЯРИЯ</a></li>
            <li><a href="#">ХОЗТОВАРЫ</a></li>
            <li><a href="#">МЕБЕЛЬ</a></li> -->
        </ul>
        <ul>
            <li><a href="#">ДОСТАВКА</a></li>
            <li><a href="#">ОПЛАТА</a></li>
            <li><a href="#">КОНТАКТЫ</a></li>
            <li><a href="#">О КОМПАНИИ</a></li>
        </ul>
        <ul>
            <li><a href="#">ЗАДАТЬ ВОПРОС</a></li>
            <li><p class="exception tel"><span>8-495-380-42-88</span></p></li>
            <li><a href="#" class="exception email"><span>sale@glob-ex.ru</span></a></li>
        </ul>
    </div>
</footer>