<?php

require_once __DIR__ . '/xmlparser.php';

$inputText = $_POST['search'];

$products = $xmlParseData['nomeklatura'];

foreach($products as $product)
{
    $name = mb_strtoupper($product['name']);
    if ($inputText != '')
    {
        if (preg_match ('/'.$inputText.'/i', $name))
        {
            echo '<a href="product.php?id='.$product['id'].'">'.$product['name'].'</a>';
        }
    }
}