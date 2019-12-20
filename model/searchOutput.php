<?php

require_once __DIR__ . '/xmlparser.php';

$inputText = trim(htmlentities($_POST['search']));
$inputText = preg_replace ("/[^a-zA-ZА-Яа-я0-9\s]/","", $inputText);

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