<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Transformer;

use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\OptionType;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\OptionValue;

class XMLOptionsTransformer implements XMLTransformerInterface
{

    /**
     * @param \SimpleXMLElement $typeData
     *
     * @return OptionType
     */
    public function transform(\SimpleXMLElement $typeData)
    {
        $valueModels = $this->transformValues($typeData->values->value);

        return $this->transformType($typeData, $valueModels);
    }

    /**
     * @param \SimpleXMLElement $data
     *
     * @return OptionValue[]
     */
    private function transformValues($data)
    {
        $valueModels = [];
        foreach($data as $value) {
            (!empty($value->price)) ? $price = (float) $value->price : $price = null;
            $valueModel = new OptionValue(
                (string) $value['key'],
                $price
            );
            $valueModels[] = $valueModel;
        }

        return $valueModels;
    }

    /**
     * @param \SimpleXMLElement $typeData
     * @param OptionValue[] $valueModels
     *
     * @return OptionType
     */
    private function transformType($typeData, $valueModels)
    {
        (!empty($typeData->taxset)) ? $taxSet = (string) $typeData->taxset : $taxSet = null;

        $typeModel = new OptionType(
            (string) $typeData['key'],
            $valueModels,
            $taxSet
        );

        return $typeModel;
    }
}
