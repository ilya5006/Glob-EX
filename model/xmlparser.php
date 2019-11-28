<?php

    $reader = new XMLReader();
    $reader->open('../resource/xml/catalog.xml');
    $allData = [];

    while ($reader->read())
    {
        if ($reader->nodeType == XMLReader::ELEMENT && $reader->name == 'brands')
        {
            $shit2 = $reader->readInnerXml();

            var_dump($shit2);

            $reader->read();

            $brands = [];

            while ($reader->name != 'brands')
            {
                if ($reader->nodeType == XMLReader::ELEMENT)
                {
                    $brandId = $reader->getAttribute('id');
                    $brands[$brandId]['name'] = $reader->getAttribute('name');
                    $brands[$brandId]['image'] = $reader->getAttribute('image');
                }

                $reader->read();
            }

            $allData['brands'] = $brands;
        }
    }

    // echo '<pre>';
    //     echo var_export($allData);
    // echo '</pre>';
?>