<?php
    function isElement($type)
    {
        return $type == XMLReader::ELEMENT;
    }

    $reader = new XMLReader();
    $reader->open('../resource/xml/catalog.xml');
    $allData = [];

    while ($reader->read())
    {
        if (isElement($reader->nodeType) && $reader->name == 'brands')
        {
            $reader->read();

            $brands = [];

            while ($reader->name != 'brands')
            {
                if (isElement($reader->nodeType))
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

    echo '<pre>';
        echo var_export($allData);
    echo '</pre>';
?>