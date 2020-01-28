<?php

require_once __DIR__ . '/../model/xmlparser.php';

$categoryId = isset($_GET['id']) ? $_GET['id'] : null;

$brandId = isset($_GET['brand']) ? $_GET['brand'] : null;

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

function findProductsWithSameBrand($brandId, $products)
{
    $productsWithSameBrand = [];
    $brandIdToCheck = $brandId;

    foreach ($products as $productId => $productInfo)
    {
        if ($productInfo['brand'] == $brandIdToCheck)
        {
            $productsWithSameBrand[$productId] = $productInfo;
        }
    }

    return $productsWithSameBrand;
}

function findSpecsWithSameCategory($categoryId, $specs, $partitions)
{
    $specsWithSameCategory = [];

    if (is_array($categoryId) == false)
    {
        
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

        foreach ($categoriesIdToCheck as $c => $category)
        {
            if (is_array($partitions[$category]['specs']))
            {
                foreach ($partitions[$category]['specs'] as $c => $specId)
                {
                    if (!in_array($specs[$specId]['name'], $specsWithSameCategory))
                    {
                        $specsWithSameCategory[$specId] = $specs[$specId]['name'];
                    }
                }
            }
        }
    }    
    else
    {
       foreach ($categoryId as $c => $cat)
       {
            $categoriesIdToCheck = [$cat];

            foreach ($partitions as $partitionId => $partitionInfo)
            {
                if ($partitionInfo['top_id'] == $cat)
                {
                    $categoriesIdToCheck[] = $partitionId;
                }
            }

            foreach ($categoriesIdToCheck as $c => $category) // Если какие-то категории ссылаются на эту
            {
                foreach ($partitions as $partitionId => $partitionInfo)
                {
                    if ($partitionInfo['top_id'] == $category && $category != $category)
                    {
                        $categoriesIdToCheck[] = $partitionId;
                    }
                }
            }

            foreach ($categoriesIdToCheck as $c => $category)
            {
                if (is_array($partitions[$category]['specs']))
                {
                    foreach ($partitions[$category]['specs'] as $c => $specId)
                    {
                        if (!in_array($specs[$specId]['name'], $specsWithSameCategory))
                        {
                            $specsWithSameCategory[$specId] = $specs[$specId]['name'];
                        }
                    }
                }
            }
       } 
    }

    return $specsWithSameCategory;
};

function isSpecInArray($array, string $specToFind)
{
    if (is_array($array))
    {
        foreach ($array as $i => $specInArray)
        {
            if ($specInArray[0] == $specToFind)
            {
                return $i;
            }
        }
    }

    return false;
}

function quantityOfProductsForOneBrand($brandAll, $products)
{
    $quantity = 0;

    foreach ($products as $c => $productInfo)
    {
        if ($productInfo['brand'] == $brandAll)
        {
            $quantity++;
        }
    }

    return $quantity;
}

$brands = $xmlParseData['brands'];
$partitions = $xmlParseData['partitions'];
$products = $xmlParseData['nomeklatura'];
$specs = $xmlParseData['specs'];

if (!empty($categoryId)) 
{
    $productsWithSameCategory = findProductsWithSameCategory($categoryId, $products, $partitions);
    $specsWithSameCategory = findSpecsWithSameCategory($categoryId, $specs, $partitions);
}

if (!empty($brandId)) 
{ 
    $productsWithSameBrand = findProductsWithSameBrand($brandId, $products); 

    $categorysId = [];

    foreach ($productsWithSameBrand as $productId => $productInfo)
    {
        if ($productInfo['brand'] == $brandId)
        {
            $categorysId[] = $productInfo['top_id'];
        }
    }
    
    $categorysId = array_unique($categorysId);
    $specsWithSameCategory = findSpecsWithSameCategory($categorysId, $specs, $partitions);
}

foreach ($brands as $brandAll => $brandInfo)
{
    $brands[$brandAll]['image'] = str_replace('ftp://37.140.192.146', './../', $brands[$brandAll]['image']);
}
?>

<div class="content" style="padding-top: 0">
    <div class="catalg_view">
        <div class="filters">
            <div class="price-filter" data-specname="Цена">
                <p>Цена</p>
                <div class="price-input">
                    <input title="минимальная цена" id="price-min">
                    <p>-</p>
                    <input title="максимальная цена" id="price-max">
                </div>
                <div id="slider"></div>
            </div>

            <?php
                if (empty($brandId))
                { ?>
            <div class="filter" data-specname="Бренд">
                <p>Бренд</p>
                <ul>
                    <li> 
                    <?php
                        foreach ($brands as $brandAll => $brandInfo)
                        {
                            $productsQuantity = quantityOfProductsForOneBrand($brandAll, $productsWithSameCategory);
                            
                            if ($productsQuantity > 0)
                            {
                                echo '<label class="container">';
                                    echo '<p><span id="spec_value">' . $brandInfo['name'] . '</span>(' . $productsQuantity . ')</p> <input type="checkbox" value="' . $brandInfo['name'] . '"> <span class="checkmark"></span>';
                                echo '</label>';
                            }
                        }
                    ?>
                    </li>
                </ul>
            </div> 
         <?php }

            if (isset($categoryId))
            {
                foreach ($specsWithSameCategory as $specId => $specName)
                {
                    $specsProduct = [];
    
                    foreach ($productsWithSameCategory as $c => $productInfo)
                    {
                        if (is_array($productInfo['specs']))
                        {
                            foreach ($productInfo['specs'] as $specIdProduct => $specValueProduct)
                            {
                                if ($specId == $specIdProduct && $specValueProduct !== '')
                                {
                                    $idSpecIfExist = isSpecInArray($specsProduct[$specId], $specValueProduct);
                                    if ($idSpecIfExist || $idSpecIfExist === 0)
                                    {
                                        $specsProduct[$specId][$idSpecIfExist][1]++;
                                    }
                                    else 
                                    {
                                        $specsProduct[$specId][] = [$specValueProduct, 1];
                                    }
                                }
                            }
                        }
                    }
                    
                    echo '
                    <div class="filter" data-specname="' . $specName .'">
                        <p>' . $specName . '</p>
                        <ul>
                            <li>';
                            foreach ($specsProduct as $c => $specValue)
                            {
                                foreach ($specValue as $v => $specInfoOutput)
                                {
                                    echo '
                                    <label class="container">
                                        <p><span id="spec_value">' . $specInfoOutput[0] . '</span>(' .  $specInfoOutput[1]  .  ')</p> <input type="checkbox"> <span class="checkmark"></span>
                                    </label>';
                                }
                            }
                                
                        echo '</li>
                        </ul>
                    </div>';
    
                }
            }
            else
            {
                foreach ($specsWithSameCategory as $specId => $specName)
                {
                    $specsProduct = [];
    
                    foreach ($productsWithSameBrand as $c => $productInfo)
                    {
                        if (is_array($productInfo['specs']))
                        {
                            foreach ($productInfo['specs'] as $specIdProduct => $specValueProduct)
                            {
                                if ($specId == $specIdProduct && $specValueProduct !== '')
                                {
                                    $idSpecIfExist = isSpecInArray($specsProduct[$specId], $specValueProduct);
                                    if ($idSpecIfExist || $idSpecIfExist === 0)
                                    {
                                        $specsProduct[$specId][$idSpecIfExist][1]++;
                                    }
                                    else 
                                    {
                                        $specsProduct[$specId][] = [$specValueProduct, 1];
                                    }
                                }
                            }
                        }
                    }
                    
                    echo '
                    <div class="filter" data-specname="' . $specName .'">
                        <p>' . $specName . '</p>
                        <ul>
                            <li>';
                            foreach ($specsProduct as $c => $specValue)
                            {
                                foreach ($specValue as $v => $specInfoOutput)
                                {
                                    echo '
                                    <label class="container">
                                        <p><span id="spec_value">' . $specInfoOutput[0] . '</span>(' .  $specInfoOutput[1]  .  ')</p> <input type="checkbox"> <span class="checkmark"></span>
                                    </label>';
                                }
                            }
                                
                        echo '</li>
                        </ul>
                    </div>';
    
                }
            }
            ?>
            <button id="apply_filters" style="display: none;">Применить фильтры</button>
        </div>

        <div class="products">
            <?php
            if (empty($brandId))
            {
                ?>
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
                <?php
            }
            ?>

            <!-- СЛАЙДЕР С БРЕНДАМИ -->
            <?php
                if (empty($brandId))
                {
                    ?>
                    <div class="slider_header">
                        <h2> Бренды </h2>
                        <div class="slide_left slide_anim"> <span>&#60;</span> </div>
                        <div class="slide_right slide_anim"> <span>&#62;</span> </div>
                    </div>
                    <div class="scroll">
                    <?php
                    foreach ($brands as $brandAll => $brandInfo)
                    {
                        $productsQuantity = quantityOfProductsForOneBrand($brandAll, $productsWithSameCategory);
                        if ($productsQuantity > 0)
                        {
                            $image = $brandInfo['image'];
                            echo '<a href="#" class="brand"><img src="' . $image . '"> <span class="name" style="display: none;">'.$brandInfo['name'].'</span> </a>';
                        }
                    
                    }
                    ?>
                    </div>
                    <?php

                }
                else
                {
                    echo '<div class="slider_header">';
                    echo '<h2> Бренд ' . $brands[$brandId]['name'] . '</h2>';
                    echo '</div>';
                }
            ?>

            
            <!-- КОНЕЦ СЛАЙДЕРА С БРЕНДАМИ -->

            <div class="sort">

                <label class="container">
                    <input type="checkbox" id="only_in_stock"> 
                    <span class="checkmark"></span>
                    Товар в наличии
                </label>

                <p> Сортировка: <select id="products_sort">
                        <option value="popular" selected="selected">По популярности</option>
                        <option value="low">Сначала дешевые</option>
                        <option value="hight">Сначала дорогие</option>
                    </select>
                </p>

                <p> Товаров на странице: <select id="products_quantity">
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
            
            <div class="pages">
                <p class="page_left"> < </p>
                <ul class="pagination">
                    <!-- <li> <a href="#" class="active">1</a></li>
                    <li> <a href="#">2</a></li>
                    <li> <a href="#">3</a></li>
                    <li> <a href="#">4</a></li>
                    <li> <a href="#">5</a></li> -->
                </ul>
                <p class="page_right"> > </p>
            </div>

            <div class="list-products">
                <?php

                $productsToShow = NULL;
                if (isset($categoryId))
                {
                    $productsToShow = $productsWithSameCategory;
                }
                else
                {
                    $productsToShow = $productsWithSameBrand;
                }
                
                foreach ($productsToShow as $productId => $productInfo)
                {
                    $isProductHaveImage = $productInfo['image1'] != '';
                    $isProductHaveBrand = $productInfo['brand'] != '';
                    $isProductHaveDiscount = !is_null($productInfo['discount']);

                    if ($isProductHaveImage)
                    {
                        $image = str_replace('ftp://37.140.192.146', './../', $productInfo['image1']);
                    }
                    
                    $productSpecsIdValues = $productInfo['specs'];
                    $specsValuesString = '';

                    foreach ($productSpecsIdValues as $idSpec => $productSpecValue)
                    {
                        $specsValuesString .= $specs[$idSpec]['name'] . ' => ' . $productSpecValue . ' ; ';
                    }
                    ?>
                    <div class="product" data-specs="<?php echo $specsValuesString . 'Бренд => ' . $brands[$productInfo['brand']]['name'] . ' ; '; ?>">
                        
                        <?php
                        if ($isProductHaveImage)
                        { ?>
                            <a href="./product.php?id=<?php echo $productId; ?>" class="product-image"><img src="<?php echo $image; ?>" alt="фотография продукта"></a>
                  <?php } 
                        else
                        { ?>
                            <a href="./product.php?id=<?php echo $productId; ?>" class="product-image"><img src="./resource/img/none.jpg" alt="фотография продукта"></a>
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
                                if (is_array($productInfo['specs']))
                                {
                                    $specsPrintedCount = 0;

                                    $specsNames = [];
                                    $specsId = array_keys($productInfo['specs']);
                                    foreach ($specsId as $id => $specId)
                                    {
                                        $specsNames[$specId] = $specs[$specId]['name'];
                                    }
        
                                    foreach ($specsNames as $id => $name)
                                    {
                                        echo '<p class="feature">' . $name . '.. ' . $productInfo['specs'][$id]. '</p>';
                                        if (++$specsPrintedCount == 6)
                                        {
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <a class="feature_button" href="./product.php?id=<?php echo $productId; ?>#specs"> Больше характеристик </a>
                            </div>
                        </div>
                        <div class="product-act">
                            <?php
                            if ((int)$productInfo['quantity'] > 0)
                            { ?>
                                <p class="available">есть в наличии <span class="available-count"><?php echo $productInfo['quantity']; ?> </span> </p>
                            <?php
                            }
                            else
                            { ?>
                                <p class="available">нет в наличии</p>
                      <?php } 
                    
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
                        <?php
                            if ((int)$productInfo['quantity'] > 0)
                            {
                                echo '<input class="product-count" type="number" name="" id="" min="1" max="'.$productInfo['quantity'].'" value="1">';
                                echo '<button class="cart"> <img src="./resource/img/icons/cart.svg" alt=""> <p class="cart-text">В корзину</p></button>';
                            } ?>
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