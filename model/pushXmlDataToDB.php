<?php
    require_once './xmlparser.php';
    require_once './connection.php';

    echo '<pre>';
        echo var_export($xmlParseData);
    echo '</pre>';

    echo '<hr>';

    foreach ($xmlParseData['brands'] as $idBrand => $data)
    {
        $name = $data['name'];
        $image = $data['image'];
        $image = str_replace('\\', '/', $image);

        $mysqli->query("REPLACE INTO brands SET id_brand = '$idBrand', name = '$name', image = '$image'");
    }

    foreach ($xmlParseData['countries'] as $idCountry => $data)
    {
        $name = $data['name'];

        $mysqli->query("REPLACE INTO country SET id_country = '$idCountry', name = '$name'");
    }

    foreach ($xmlParseData['specs'] as $idSpec => $data)
    {
        $name = $data['name'];

        $mysqli->query("REPLACE INTO specs SET id_spec = '$idSpec', name = '$name'");
    }

    foreach ($xmlParseData['partitions'] as $idPartition => $data)
    {
        $name = $data['name'];
        $topId = $data['top_id'];
        $sort = $data['sort'];
        $banner = $data['banner'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $description = $data['description'];
        $icon = $data['icon'];
        
        $image1 = str_replace('\\', '/', $image1); // Потому что MySQL экранирует символ \
        $image2 = str_replace('\\', '/', $image2); // Потому что MySQL экранирует символ \

        $query = "REPLACE INTO partitions SET id_partition = '$idPartition', top_id = '$topId', name = '$name', sort = '$sort', 
                                              banner = '$banner', image1 = '$image1', image2 = '$image2', description = '$description', icon = '$icon'";

        if ($topId === '')
            $query = str_replace("top_id = '$topId'", 'top_id = NULL', $query);

        $mysqli->query($query);

        if (isset($data['specs']))
        {
            foreach($data['specs'] as $key => $idSpec)
            {
                $mysqli->query("REPLACE INTO partition_specs SET id_partition = '$idPartition', id_spec = '$idSpec'");
            }
        }
    }

    foreach ($xmlParseData['nomeklatura'] as $idGood => $data)
    {
        $name = $data['name'];
        $topId = $data['top_id'];
        $sort = $data['sort'];
        $brand = $data['brand'];
        $idCountry = $data['country'];
        $quantity = $data['quantity'];
        $unit = $data['unit'];
        $price = $data['price'];
        $oldPrice = $data['old_price'];
        $discount = $data['discount'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $image3 = $data['image3'];
        $image4 = $data['image4'];
        $image5 = $data['image5'];
        $description = $data['description'];
        
        $image1 = str_replace('\\', '/', $image1); // Потому что MySQL экранирует символ \
        $image2 = str_replace('\\', '/', $image2); // Потому что MySQL экранирует символ \
        $image3 = str_replace('\\', '/', $image3); // Потому что MySQL экранирует символ \
        $image4 = str_replace('\\', '/', $image4); // Потому что MySQL экранирует символ \
        $image5 = str_replace('\\', '/', $image5); // Потому что MySQL экранирует символ \

        $query = "REPLACE INTO goods SET id_good = '$idGood', id_country = '$idCountry', id_brand = '$brand', top_id = '$topId', name = '$name',
                                         sort = '$sort', price = '$price', old_price = '$oldPrice', discount = '$discount', unit = '$unit', 
                                         image1 = '$image1', image2 = '$image2', image3 = '$image3', 
                                         image4 = '$image4', image5 = '$image5', quantity = '$quantity', description = '$description'";

        if (gettype($oldPrice) === 'NULL')
            $query = str_replace("old_price = '$oldPrice'", 'old_price = NULL', $query);

        if (gettype($discount) === 'NULL')
            $query = str_replace("discount = '$discount'", 'discount = NULL', $query);

        if ($brand === '')
            $query = str_replace("id_brand = '$brand'", 'id_brand = NULL', $query);

        if ($country === '')
            $query = str_replace("id_country = '$country'", 'id_country = NULL', $query);

        $mysqli->query($query);


        if (isset($data['specs']))
        {
            foreach($data['specs'] as $idSpec => $value)
            {
                $mysqli->query("REPLACE INTO good_specs SET id_good = '$idGood', id_spec = '$idSpec', value = '$value'");
            }
        }
    }
?>