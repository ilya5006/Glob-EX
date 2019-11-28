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
        //brands
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
        //specs
        if (isElement($reader->nodeType) && $reader->name == 'specs')
        {
            $reader->read();

            $specs = [];

            while ($reader->name != 'specs')
            {
                if (isElement($reader->nodeType))
                {
                    $specsId = $reader->getAttribute('id');
                    $specs[$specsId]['name'] = $reader->getAttribute('name');
                }

                $reader->read();
            }

            $allData['specs'] = $specs;
        }
        //country
        if (isElement($reader->nodeType) && $reader->name == 'Country')
        {
            $reader->read();

            $country = [];

            while ($reader->name != 'Country')
            {
                if (isElement($reader->nodeType))
                {
                    $countryId = $reader->getAttribute('id');
                    $country[$countryId]['name'] = $reader->getAttribute('name');
                }

                $reader->read();
            }

            $allData['country'] = $country;
        }
        //partitions
        if (isElement($reader->nodeType) && $reader->name == 'partitions')
        {
            $reader->read();

            $partitions = [];

            while ($reader->name != 'partitions')
            {
                if (isElement($reader->nodeType))
                {
                    if ($reader->name == 'value')
                    {
                        $partitionsId = $reader->getAttribute('id');
                        $partitions[$partitionsId]['name'] = $reader->getAttribute('name');
                        $partitions[$partitionsId]['technical_name'] = $reader->getAttribute('technical_name');
                        $partitions[$partitionsId]['top_id'] = $reader->getAttribute('top_id');
                        $partitions[$partitionsId]['sort'] = $reader->getAttribute('sort');
                        $partitions[$partitionsId]['banner'] = $reader->getAttribute('banner');
                        $partitions[$partitionsId]['image1'] = $reader->getAttribute('image1');
                    }
                    if ($reader->name == 'spec')
                    {
                        $value = $reader->getAttribute('id');
                        $partitions[$partitionsId]['specs'][$reader->getAttribute('id')] = $reader->getAttribute('value');
                    }
                }

                $reader->read();
            }

            $allData['partitions'] = $partitions;
        }
        //nomeklatura
        if (isElement($reader->nodeType) && $reader->name == 'nomeklatura')
        {
            $reader->read();

            $nomeklatura = [];

            while ($reader->name != 'nomeklatura')
            {
                if (isElement($reader->nodeType))
                {
                    if ($reader->name == 'value')
                    {
                        $nomeklaturaId = $reader->getAttribute('id');
                        $nomeklatura[$nomeklaturaId]['name'] = $reader->getAttribute('name');
                        $nomeklatura[$nomeklaturaId]['technical_name'] = $reader->getAttribute('technical_name');
                        $nomeklatura[$nomeklaturaId]['top_id'] = $reader->getAttribute('top_id');
                        $nomeklatura[$nomeklaturaId]['sort'] = $reader->getAttribute('sort');
                        $nomeklatura[$nomeklaturaId]['banner'] = $reader->getAttribute('banner');
                        $nomeklatura[$nomeklaturaId]['unit'] = $reader->getAttribute('unit');
                        $nomeklatura[$nomeklaturaId]['image1'] = $reader->getAttribute('image1');
                    }
                    if ($reader->name == 'spec')
                    {
                        $value = $reader->getAttribute('id');
                        $nomeklatura[$nomeklaturaId]['specs'][$reader->getAttribute('id')] = $reader->getAttribute('value');
                    }
                }

                $reader->read();
            }

            $allData['nomeklatura'] = $nomeklatura;
        }
    }

    echo '<pre>';
        echo var_export($allData);
    echo '</pre>';
?>