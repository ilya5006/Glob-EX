<?
require_once __DIR__ . '/../model/xmlparser.php';

$data = $xmlParseData['partitions'];
$first = [];
$two = [];
$three = [];


foreach($data as $category)
{
    if ($category['top_id'] == '')
    {
        array_push($first, $category);
    }

    if ($category['top_id'] != '')
    {
        if (empty($category['specs']))
        {
            array_push($two, $category);
        }
    }

    if (isset($category['specs']))
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
?>

<div class="content">
    <div class="catalog_two">
        <div class="cat_fold"><p class="catalog_expand_button">Каталог</p>
            <p><span> &#92; Канцелярские товары </span></p></div>
        <h2> Канцелярское товары</h2>
        <div class="catalog_list">

        <?php
            foreach($categories['two'] as $category)
            {
                $catId = $category['id'];

                echo '<div class="catalog">';
                    echo '<img src="'.$category['icon'].'" alt="cat imgs">';
                    echo '<div class="cat">';
                        echo '<p>'.$category['name'].'</p>';
                        foreach($categories['three'] as $category)
                        {
                            if ($catId == $category['top_id'])
                            {
                                echo '<a href="products.php?id='.$category['id'].'">'.$category['name'].'</a>';
                            }
                        }
                    echo '</div>';
                echo '</div>';
            }
        ?>

            <!-- <div class="catalog">
                <img src="./resource/img/catalog/image1.png" alt="cat imgs">
                <div class="cat">
                    <p> Бумажная продукция</p>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                </div>
            </div>
            <div class="catalog">
                <img src="./resource/img/catalog/image1.png" alt="cat imgs">
                <div class="cat">
                    <p> Бумажная продукция</p>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                </div>
            </div>
            <div class="catalog">
                <img src="./resource/img/catalog/image1.png" alt="cat imgs">
                <div class="cat">
                    <p> Бумажная продукция</p>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                </div>
            </div>
            <div class="catalog">
                <img src="./resource/img/catalog/image1.png" alt="cat imgs">
                <div class="cat">
                    <p> Бумажная продукция</p>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                    <a href="#">АЛЬБОМЫ ДЛЯ РИСОВАНИЯ</a>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- КОНЕЦ КАТАЛОГА ВТОРОГО УРОВНЯ-->