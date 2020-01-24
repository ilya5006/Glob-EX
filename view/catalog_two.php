<?
require_once __DIR__ . '/../model/xmlparser.php';

$data = $xmlParseData['partitions'];
$first = [];
$two = [];
$three = [];

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

                $imagePath = str_replace('ftp://37.140.192.146', './../', $category['image1']);

                echo '<div class="catalog">';
                    echo '<img src="'.$imagePath.'" alt="cat imgs">';
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
        
        </div>
    </div>
</div>
<!-- КОНЕЦ КАТАЛОГА ВТОРОГО УРОВНЯ-->