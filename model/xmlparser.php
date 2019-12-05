<?php
function isElement($type)
{
    return $type == XMLReader::ELEMENT;
}

$reader = new XMLReader();
$reader->open('../resource/xml/catalog_1.xml');
$xmlParseData = [];

while ($reader->read()) {
    //brands
    if (isElement($reader->nodeType) && $reader->name == 'brands') {
        $reader->read();

        $brands = [];

        while ($reader->name != 'brands') {
            if (isElement($reader->nodeType)) {
                $brandId = $reader->getAttribute('id');
                $brands[$brandId]['name'] = $reader->getAttribute('name');
                $brands[$brandId]['image'] = $reader->getAttribute('image');
            }

            $reader->read();
        }

        $xmlParseData['brands'] = $brands;
    }
    //specs
    if (isElement($reader->nodeType) && $reader->name == 'specs') {
        $reader->read();

        $specs = [];

        while ($reader->name != 'specs') {
            if (isElement($reader->nodeType)) {
                $specsId = $reader->getAttribute('id');
                $specs[$specsId]['name'] = $reader->getAttribute('name');
            }

            $reader->read();
        }

        $xmlParseData['specs'] = $specs;
    }
    //country
    if (isElement($reader->nodeType) && $reader->name == 'Country') {
        $reader->read();

        $countries = [];

        while ($reader->name != 'Country') {
            if (isElement($reader->nodeType)) {
                $countryId = $reader->getAttribute('id');
                $countries[$countryId]['name'] = $reader->getAttribute('name');
            }

            $reader->read();
        }

        $xmlParseData['countries'] = $countries;
    }
    //partitions
    if (isElement($reader->nodeType) && $reader->name == 'partitions') {
        $reader->read();

        $partitions = [];

        while ($reader->name != 'partitions') {
            if (isElement($reader->nodeType)) {
                if ($reader->name == 'value') {
                    $partitionsId = $reader->getAttribute('id');
                    $partitions[$partitionsId]['name'] = $reader->getAttribute('name');
                    $partitions[$partitionsId]['technical_name'] = $reader->getAttribute('technical_name');
                    $partitions[$partitionsId]['top_id'] = $reader->getAttribute('top_id');
                    $partitions[$partitionsId]['sort'] = $reader->getAttribute('sort');
                    $partitions[$partitionsId]['banner'] = $reader->getAttribute('banner');
                    $partitions[$partitionsId]['image1'] = $reader->getAttribute('image1');
                    $partitions[$partitionsId]['image2'] = $reader->getAttribute('image2');
                    $partitions[$partitionsId]['description'] = $reader->getAttribute('description');
                    $partitions[$partitionsId]['icon'] = $reader->getAttribute('icon');

                }
                if ($reader->name == 'spec') {
                    $value = $reader->getAttribute('id');
                    $partitions[$partitionsId]['specs'][] = $reader->getAttribute('id');
                }
            }

            $reader->read();
        }

        $xmlParseData['partitions'] = $partitions;
    }
    //nomeklatura
    if (isElement($reader->nodeType) && $reader->name == 'nomeklatura') {
        $reader->read();

        $nomeklatura = [];

        while ($reader->name != 'nomeklatura') {
            if (isElement($reader->nodeType)) {
                if ($reader->name == 'value') {
                    $nomeklaturaId = $reader->getAttribute('id');
                    $nomeklatura[$nomeklaturaId]['name'] = $reader->getAttribute('name');
                    $nomeklatura[$nomeklaturaId]['technical_name'] = $reader->getAttribute('technical_name');
                    $nomeklatura[$nomeklaturaId]['top_id'] = $reader->getAttribute('top_id');
                    $nomeklatura[$nomeklaturaId]['sort'] = $reader->getAttribute('sort');
                    $nomeklatura[$nomeklaturaId]['brand'] = $reader->getAttribute('brand');
                    $nomeklatura[$nomeklaturaId]['country'] = $reader->getAttribute('country');
                    $nomeklatura[$nomeklaturaId]['quantity'] = $reader->getAttribute('quantity');
                    $nomeklatura[$nomeklaturaId]['unit'] = $reader->getAttribute('unit');
                    $nomeklatura[$nomeklaturaId]['price'] = $reader->getAttribute('price');
                    $nomeklatura[$nomeklaturaId]['old_price'] = $reader->getAttribute('old_price');
                    $nomeklatura[$nomeklaturaId]['discount'] = $reader->getAttribute('discount');
                    $nomeklatura[$nomeklaturaId]['image1'] = $reader->getAttribute('image1');
                    $nomeklatura[$nomeklaturaId]['image2'] = $reader->getAttribute('image2');
                    $nomeklatura[$nomeklaturaId]['image3'] = $reader->getAttribute('image3');
                    $nomeklatura[$nomeklaturaId]['image4'] = $reader->getAttribute('image4');
                    $nomeklatura[$nomeklaturaId]['image5'] = $reader->getAttribute('image5');
                    $nomeklatura[$nomeklaturaId]['description'] = $reader->getAttribute('description');

                }
                if ($reader->name == 'spec') {
                    $nomeklatura[$nomeklaturaId]['specs'][$reader->getAttribute('id')] = $reader->getAttribute('value');
                }
            }

            $reader->read();
        }

        $xmlParseData['nomeklatura'] = $nomeklatura;
    }
}
?>