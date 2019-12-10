<?php

require_once __DIR__ . '/../model/xmlparser.php';

$categoryId = isset($_GET['id']) ? $_GET['id'] : 1;

function findProductsWithSameCategory($categoryId, $products, $partitions)
{
    $productsWithSameCategory = [];
    $categoriesIdToCheck = [$categoryId];

    foreach ($partitions as $partitionId => $partitionInfo)
    {
        if ($partitionInfo['top_id'] == $categoryId)
        {
            $categoriesIdToCheck[] = $partitionId;
        }
    }

    foreach ($categoriesIdToCheck as $c => $category) // Если какие-то категории ссылаются на эту
    {
        foreach ($partitions as $partitionId => $partitionInfo)
        {
            if ($partitionInfo['top_id'] == $category && $category != $categoryId)
            {
                $categoriesIdToCheck[] = $partitionId;
            }
        }
    }

    foreach ($products as $productId => $productInfo)
    {
        foreach ($categoriesIdToCheck as $c => $categoryId)
        {
            if ($productInfo['top_id'] == $categoryId)
            {
                $productsWithSameCategory[$productId] = $productInfo;
            }
        }
        
    }

    return $productsWithSameCategory;
}

function quantityOfProductsForOneBrand($brandId, $products)
{
    $quantity = 0;

    foreach ($products as $productId => $productInfo)
    {
        if ($productInfo['brand'] == $brandId) 
            $quantity++;
    }

    return $quantity;
}

$brands = $xmlParseData['brands'];
$partitions = $xmlParseData['partitions'];
$products = $xmlParseData['nomeklatura'];
$specs = $xmlParseData['specs'];

$productsWithSameCategory = findProductsWithSameCategory($categoryId, $products, $partitions);

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
                            $productsQuantity = quantityOfProductsForOneBrand($brandId, $productsWithSameCategory);
                            
                            echo '<label class="container">';
                                echo '<p>' . $brandInfo['name'] . ' (' . $productsQuantity . ') </p> <input type="checkbox"> <span class="checkmark"></span>';
                            echo '</label>';
                        }
                        ?>
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
                $category1 = $partitions[$categoryId];
                $category1Id = $categoryId;
                
                if ($category1['top_id'] === '') // Category 1
                {
                    echo '<p> <span> &frasl; ' . $category1['name'] . ' </span> </p>';
                }
                else
                {
                    $category2Id = $category1['top_id'];
                    $category2 = $partitions[$category2Id];

                    if ($category2['top_id'] === '') // Category 2
                    {
                        echo '<a href="./products.php?id=' . $category2Id . '"> &frasl; ' . $category2['name'] . ' </a>';
                        echo '<p> <span> &frasl; ' . $category1['name'] . '</span> </p>';
                    }
                    else // Category 3
                    {
                        $category3Id = $category2['top_id'];
                        $category3 = $partitions[$category3Id];

                        echo '<a href="./products.php?id=' . $category3Id . '"> &frasl; ' . $category3['name'] . ' </a>';
                        echo '<a href="./products.php?id=' . $category2Id . '"> &frasl; ' . $category2['name'] . ' </a>';
                        echo '<p> <span> &frasl; ' . $category1['name'] . ' </span> </p>';
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
                $image = base64_encode(file_get_contents($brandInfo['image']));
                echo '<a href="#" class="brand"><img src="data:image/png;base64,' . $image . '"> <span class="name" style="display: none;">'.$brandInfo['name'].'</span> </a>';
            }
            ?>
            </div>
            <!-- КОНЕЦ СЛАЙДЕРА С БРЕНДАМИ -->

            <div class="sort">
                <p>
                    Сортировка:
                    <select id="products_sort">
                        <option value="10">По популярности</option>
                        <option value="30">Сначала дешевые</option>
                        <option value="50">Сначала дорогие</option>
                    </select>
                </p>

                <p>
                    Товаров на странице:
                    <select id="products_quantity">
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
                <!-- <li> <a href="#" class="active">1</a></li>
                <li> <a href="#">2</a></li>
                <li> <a href="#">3</a></li>
                <li> <a href="#">4</a></li>
                <li> <a href="#">5</a></li> -->
            </ul>

            <div class="list-products">
                <?php
                foreach ($productsWithSameCategory as $productId => $productInfo)
                { 

                $isProductHaveImage = $productInfo['image1'] != '';
                $isProductHaveBrand = $productInfo['brand'] != '';
                $isProductHaveDiscount = !is_null($productInfo['discount']);

                if ($isProductHaveImage)
                {
                    $image = str_replace('user587s.beget.tech', 'user587s:CgIc6Wbt@user587s.beget.tech', $productInfo['image1']);    
                    $imageBase64 = base64_encode(file_get_contents($image));
                }
                
                ?>
                <div class="product">
                    <!-- <label class="container" id="cart"> <input type="checkbox" name="prduct-check"> <span class="checkmark"></span> </label> -->
                    <?php
                    if ($isProductHaveImage)
                    { ?>
                        <a href="#" class="product-image"><img src="data:image/png;base64,<?php echo $imageBase64; ?>" alt="фотография продукта"></a>
              <?php } 
                    else
                    { ?>
                        <a href="#" class="product-image"><img src="./resource/img/products/product.jpg" alt="фотография продукта"></a>
              <?php } 

                    if ($isProductHaveDiscount)
                    { ?>
                        <p class="sale"><?php echo $productInfo['discount']; ?></p>
              <?php } ?>
                    <div class="product-disc">
                        <a class="product-name" href="product.php?id=<?php echo $productId; ?>"> <?php echo $productInfo['name']; ?> </a>
                        <p class="article" style="display: none;"> <?php echo $productInfo['article']; ?> </p>
                        <p class="id" style="display: none;"> <?php echo $productInfo['id']; ?> </p>
                        <div class="features">
                            <?php
                            $specsPrintedCount = 0;

                            $specsNames = [];
                            $specsId = array_keys($productInfo['specs']);
                            foreach ($specsId as $id => $specId)
                            {
                                $specsNames[$specId] = $specs[$specId]['name'];
                            }

                            foreach ($specsNames as $id => $name)
                            {
                                echo '<p class="feature">' . $name . ' ' . $productInfo['specs'][$id]. '</p>';
                                if (++$specsPrintedCount == 6) break;
                            }
                            ?>
                            <p class="feature_button"> Больше характеристик </p>
                        </div>
                    </div>
                    <div class="product-act">
                        <?php
                        echo (int)$productInfo['quantity'];
                        if ((int)$productInfo['quantity'] > 0)
                        { ?>
                            <p class="available">есть в наличии <span class="available-count"> <?php echo $productInfo['quantity']; ?> </span> </p>
                        <?php
                        }
                        else
                        { ?>
                            <p class="available">нет в наличии</p>
                  <?php } ?>

                        <?php
                        if ($isProductHaveDiscount)
                        { ?>
                            <p class="old-price"><?php echo $productInfo['old_price']; ?></p>
                  <?php } ?>
                            <p class="new-price"><?php echo $productInfo['price']; ?></p>

                        <?php
                        if ($isProductHaveBrand)
                        { ?>
                            <p class="product-brand">БРЕНД: <a href="#"><?php echo $brands[$productInfo['brand']]['name']; ?></a></p>
                  <?php }
                        else
                        { ?>
                            <p class="product-brand">БРЕНД: <a href="#"> ОТСУТСТВУЕТ </a></p>
                  <?php } ?>
                  
                        <div class="inp-cart-fav">
                            <input class="product-count" type="number" name="" id="" min="1" max="999" value="1">
                            <button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>
                            <img src="./resource/img/icons/favourite.svg" alt="fav" class="fav-button">
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>