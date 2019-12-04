<?php
    require_once './xmlparser.php';
    require_once './connection.php';

    
    echo '<pre>';
        echo var_export($xmlParseData);
    echo '</pre>';

    echo '<hr>';

    foreach ($xmlParseData['brands'] as $idBrand => $data)
    {
        $nameBrand = $data['name'];
        $imageBrand = $data['image'];
        $imageBrand = str_replace('\\', '/', $imageBrand);

        $mysqli->query("REPLACE INTO brands SET id_brand = '$idBrand', name = '$nameBrand', image = '$imageBrand'");
    }

    foreach ($xmlParseData['countries'] as $idCountry => $data)
    {
        $nameCountry = $data['name'];

        $mysqli->query("REPLACE INTO country SET id_country = '$idCountry', name = '$nameCountry'");
    }

    foreach ($xmlParseData['specs'] as $idSpec => $data)
    {
        $nameSpec = $data['name'];

        $mysqli->query("REPLACE INTO specs SET id_spec = '$idSpec', name = '$nameSpec'");
    }

    foreach ($xmlParseData['partitions'] as $idPartition => $data)
    {
        $name = $data['name'];
        $technicalName = $data['technical_name'];
        $topId = $data['top_id'];
        $sort = $data['sort'];
        $banner = $data['banner'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $description = $data['description'];
        $icon = $data['icon'];
        
        $image1 = str_replace('\\', '/', $image1);
        $image2 = str_replace('\\', '/', $image2);

        $mysqli->query("REPLACE INTO partitions SET id_partition = '$idPartition', top_id = '$topId', name = '$name', technical_name = '$technicalName', sort = '$sort',
                                                    banner = '$banner', image1 = '$image1', image2 = '$image2', description = '$description', icon = '$icon'");

        echo '<p>' . 'Name: '. $name . '</p>';
        echo '<p>' . 'Technical name: '. $technicalName . '</p>';
        echo '<p>' . 'Id: '. $idPartition . '</p>';
        echo '<p>' . 'Top id: '. $topId . '</p>';
        echo '<p>' . 'Sort: '. $sort . '</p>';
        echo '<p>' . 'Banner: '. $banner . '</p>';
        echo '<p>' . 'Image1: '. $image1 . '</p>';
        echo '<p>' . 'Image2: '. $image2 . '</p>';
        echo '<p>' . 'Description: '. $description . '</p>';
        echo '<p>' . 'Icon: '. $icon . '</p>';

        echo '<hr>';

        // if (isset($data['specs']))
        // {
        //     foreach($data['specs'] as $key => $idSpec)
        //     {
        //         $mysqli->query("REPLACE INTO partition_specs SET id_partition = '$idPartition', id_spec = '$idSpec'");
        //     }
        // }
    }
?>