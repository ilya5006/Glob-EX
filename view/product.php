<?php

require_once __DIR__ . '/../model/xmlparser.php';

$idProduct = $_GET['id'];
$product = $xmlParseData['nomeklatura'][$idProduct];

$product['images'][] = $product['image1'];
$product['images'][] = $product['image2'];
$product['images'][] = $product['image3'];
$product['images'][] = $product['image4'];
$product['images'][] = $product['image5'];

for ($i = 0; $i < count($product['images']); $i++)
{
    $product['images'][$i] = str_replace('user587s.beget.tech', 'user587s:CgIc6Wbt@user587s.beget.tech', $product['images'][$i]);
}

$brand = $xmlParseData['brands'][$product['brand']];
$specsNames = [];
$specsId = array_keys($product['specs']);

foreach ($specsId as $id => $specId)
{
    $specsNames[$specId] = $xmlParseData['specs'][$specId]['name'];
}
?>

<div class="content" style="padding-top: 0; padding-bottom: 0;">
    <div class="cat_fold">
    <?php
        echo '<p class="catalog_expand_button"> Каталог</p>';
        if (isset($xmlParseData['partitions'][$xmlParseData['partitions'][$product['top_id']]['top_id']]))
        {
            echo '<a href="products.php?id='.$xmlParseData['partitions'][$xmlParseData['partitions'][$product['top_id']]['top_id']]['top_id'].'"> &#92; '.$xmlParseData['partitions'][$xmlParseData['partitions'][$xmlParseData['partitions'][$product['top_id']]['top_id']]['top_id']]['name'].' </a>';
        }   
        echo '<a href="products.php?id='.$xmlParseData['partitions'][$product['top_id']]['top_id'].'"> &#92; '.$xmlParseData['partitions'][$xmlParseData['partitions'][$product['top_id']]['top_id']]['name'].' </a>';
        echo '<a href="products.php?id='.$product['top_id'].'"><span> &#92; '.$xmlParseData['partitions'][$product['top_id']]['name'].' </span></a>';
    ?>
    </div>
    <div class="product_info">
        <div class="pictures">
            <img src="./resource/img/products/product.jpg" alt="" class="big" style="order: -1;">
            <div class="img_list">
                <?php
                    
                foreach ($product['images'] as $id => $image)
                {
                    if ($image != '')
                    {
                        $imageBase64 = base64_encode(file_get_contents($image));
                        echo '<a href="#" class="brand"><img src="data:image/png;base64,' . $imageBase64 . '" alt="" class="little"></a>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="info">
            <h2> <?php echo $product['name']; ?> </h2>
            <div class="detail">
                <p>Артикул <span><?php echo $product['article']; ?></span></p>
                <p>Бренд: <a href="#"><?php echo $brand['name']; ?></a></p>
            </div>
            <div class="features">
                <?php
                    $specsPrintedCount = 0;

                    foreach($specsNames as $id => $name)
                    {
                        $specsPrintedCount++;
                        echo '<p class="feature">' . $name . ' ' . $product['specs'][$id] .'</p>';
                        if ($specsPrintedCount == 6) 
                            break;
                    }
                ?>
                <p class="feature_button">Больше характеристик</p>
            </div>
        </div>
        <div class="act">
            <?php if ( !is_null($product['old_price']) )
            { ?>
                <p class="old-price"><?php echo $product['old_price']; ?> р.</p>
      <?php } ?>
            <p class="new-price"><?php echo $product['price']; ?> р.</p>
            <p class="available">есть в наличии <span class="available-count"><?php echo $product['quantity'] . ' ' . $product['unit']; ?></span> </p>
            <p class="brand">БРЕНД: <a href="#"><?php echo $brand['name']; ?></a> </p>
            <form action="#">
                <input type="number" name="" id="" min="1" max="999" value="1">
                <input type="submit" value="в корзину">
            </form>
        </div>
    </div>
    <div class="info_slider">
        <div class="sliders">
            <p class="slider_d active"> Описание товара </p>
            <p class="slider_f"> Все характеристики </p>
        </div>
        
        <div class="informations">
            <div class="info_d"> 
                <p> <?php echo $product['description']; ?></p>
            </div>
            <div class="features" style="display: none;">
                <?php
                foreach($specsNames as $id => $name)
                    echo '<p class="feature">' . $name . ' ' . $product['specs'][$id] .'</p>';
                ?>
            </div>
        </div>
    </div>
</div>