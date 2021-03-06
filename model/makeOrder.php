<?php
    require_once './connection.php';
    require_once './xmlparser.php';
    require_once '../vendor/autoload.php';

    function generateOrderNumber()
    {
        $orderNumber = mt_rand(1000, 1000000);
        if (file_exists ('../orders/' . $orderNumber . '.xlsx'))
        {
            return generateOrderNumber();
        }
        return $orderNumber;
    }

    $products = $xmlParseData['nomeklatura'];

    $idUser = htmlentities($mysqli->escape_string($_COOKIE['isLogin']));
    $typeOfDelivery = htmlentities($mysqli->escape_string($_POST['type_of_delivery']));
    $typeOfPayment = htmlentities($mysqli->escape_string($_POST['type_of_payment']));
    $price = htmlentities($mysqli->escape_string($_POST['price']));
    $phoneNumber = htmlentities($mysqli->escape_string($_POST['phone_number']));
    $address = htmlentities($mysqli->escape_string($_POST['address']));

    $fio = $mysqli->query("SELECT fio FROM users_all WHERE id_user = '$idUser'");
    $fio = $fio->fetch_assoc()['fio'];
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'ID пользователя');
    $sheet->setCellValue('A2', $idUser);

    $sheet->setCellValue('B1', 'ФИО');
    $sheet->setCellValue('B2', $fio);

    $sheet->setCellValue('C1', 'Телефонный номер');
    $sheet->setCellValue('C2', $phoneNumber);
    
    if ($typeOfDelivery == 's')
    {
        $sheet->setCellValue('D1', 'Тип доставки');
        $sheet->setCellValue('D2', 'Самовызов');
    }
    if ($typeOfDelivery == 'd')
    {
        $sheet->setCellValue('D1', 'Адрес');
        $sheet->setCellValue('D2', $address);
    }

    $sheet->setCellValue('E1', 'Тип оплаты');
    if ($typeOfPayment == 'card')
    {
        $sheet->setCellValue('E2', 'Оплата картой');
    }
    if ($typeOfPayment == 'cash')
    {
        $sheet->setCellValue('E2', 'Оплата наличными');
    }

    $productsToOrder = $mysqli->query("SELECT id_product, product_count FROM `user-cart` WHERE id_user = '$idUser'");

    $sheet->setCellValue('F1', 'Артикль товара');
    $sheet->setCellValue('G1', 'Количество товара');
    $sheet->setCellValue('H1', 'Цена товара');
    $sheet->setCellValue('I1', 'ID товара');

    $cellNumber = 2;
    while ($idProductAndCount = $productsToOrder->fetch_assoc())
    {
        $productArticle = $products[$idProductAndCount['id_product']]['article'];
        $productCount = $idProductAndCount['product_count'];
        $productPrice = $products[$idProductAndCount['id_product']]['price'];

        $sheet->setCellValue('F' . $cellNumber, $productArticle);
        $sheet->setCellValue('G' . $cellNumber, $productCount);
        $sheet->setCellValue('H' . $cellNumber, $productPrice);
        $sheet->setCellValue('I' . $cellNumber, $idProductAndCount['id_product']);

        $cellNumber++;
    }

    $sheet->setCellValue('J1', 'Итоговая цена');
    $sheet->setCellValue('J2', $price);

    $date = date('d.m.Y G:i');
    $sheet->setCellValue('K1', 'Дата заказа');
    $sheet->setCellValue('K2', $date);

    $sheet->setCellValue('L1', 'Статус заказа');
    $sheet->setCellValue('L2', 'Не подтверждён');


    $writer = new Xlsx($spreadsheet);

    $filePath = '../orders/' . generateOrderNumber() . '.xlsx';
    $writer->save($filePath);

    if ($writer)
    {
        $mysqli->query("DELETE FROM `user-cart` WHERE id_user = '$idUser'");
        echo json_encode(['done']);
    }

?>