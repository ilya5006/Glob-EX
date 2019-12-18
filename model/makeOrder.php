<?php
    require_once './connection.php';
    require_once './xmlparser.php';
    require_once '../vendor/autoload.php';

    function generateOrderNumber()
    {
        $orderNumber = rand(1000, 1000000);
        if (file_exists ('../orders/' . $orderNumber . '.xlsx'))
        {
            return generateOrderNumber();
        }
        else
        {
            return $orderNumber;
        }
    }

    $products = $xmlParseData['nomeklatura'];

    $idUser = $mysqli->escape_string($_COOKIE['isLogin']);
    $typeOfDelivery = $mysqli->escape_string($_POST['type_of_delivery']);
    $typeOfPayment = $mysqli->escape_string($_POST['type_of_payment']);
    $price = $mysqli->escape_string($_POST['price']);
    $phoneNumber = $mysqli->escape_string($_POST['phone_number']);
    $address = $mysqli->escape_string($_POST['address']);

    $fio = $mysqli->query("SELECT fio FROM users_all WHERE id_user = '$idUser'");
    $fio = $fio->fetch_assoc()['fio'];
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'ФИО');
    $sheet->setCellValue('A2', $fio);

    $sheet->setCellValue('B1', 'Телефонный номер');
    $sheet->setCellValue('B2', $phoneNumber);
    
    if ($typeOfDelivery == 's')
    {
        $sheet->setCellValue('C1', 'Тип доставки');
        $sheet->setCellValue('C2', 'Самовызов');
    }
    if ($typeOfDelivery == 'd')
    {
        $sheet->setCellValue('C1', 'Адрес');
        $sheet->setCellValue('C2', $address);
    }

    $sheet->setCellValue('D1', 'Тип оплаты');
    if ($typeOfPayment == 'card')
    {
        $sheet->setCellValue('D2', 'Оплата картой');
    }
    if ($typeOfPayment == 'cash')
    {
        $sheet->setCellValue('D2', 'Оплата наличными');
    }

    $productsToOrder = $mysqli->query("SELECT id_product, product_count FROM `user-cart` WHERE id_user = '$idUser'");

    $sheet->setCellValue('E1', 'Артикль товара');
    $sheet->setCellValue('F1', 'Количество товара');
    $sheet->setCellValue('G1', 'Цена товара');

    $cellNumber = 2;
    while ($idProductAndCount = $productsToOrder->fetch_assoc())
    {
        $productArticle = $products[$idProductAndCount['id_product']]['article'];
        $productCount = $idProductAndCount['product_count'];
        $productPrice = $products[$idProductAndCount['id_product']]['price'];

        $sheet->setCellValue('E' . $cellNumber, $productArticle);
        $sheet->setCellValue('F' . $cellNumber, $productCount);
        $sheet->setCellValue('G' . $cellNumber, $productPrice);

        $cellNumber++;
    }

    $sheet->setCellValue('H1', 'Итоговая цена');
    $sheet->setCellValue('H2', $price);

    $date = date('d.m.Y G:i');
    $sheet->setCellValue('I1', 'Дата заказа');
    $sheet->setCellValue('I2', $date);

    $writer = new Xlsx($spreadsheet);

    $filePath = '../orders/' . generateOrderNumber() . '.xlsx';
    $writer->save($filePath);
?>