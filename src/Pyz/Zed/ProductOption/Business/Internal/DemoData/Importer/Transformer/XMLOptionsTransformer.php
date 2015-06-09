<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue;

class XMLOptionsTransformer implements XMLTransformerInterface
{

    /**
     * @param \SimpleXMLElement $typeElement
     *
     * @return OptionType
     */
    public function transform(\SimpleXMLElement $typeElement)
    {
        $valueModels = $this->transformValues($typeElement->values->value);

        return $this->transformType($typeElement, $valueModels);
    }

    /**
     * @param \SimpleXMLElement $valueElements
     *
     * @return OptionValue[]
     */
    private function transformValues(\SimpleXMLElement $valueElements)
    {
        $valueModels = [];

        foreach($valueElements as $value) {
            $valueModel = new OptionValue(
                (string) $value['key'],
                $this->transformLocalizedNames($value->{'localized-attributes'}),
                $this->transformPrice($value)
            );
            $valueModels[] = $valueModel;
        }

        return $valueModels;
    }

    /**
     * @param \SimpleXMLElement $valueElement
     *
     * @return null|float
     */
    private function transformPrice(\SimpleXMLElement $valueElement)
    {
        if (empty($valueElement->price)) {
            return null;
        }

        return (float) $valueElement->price;
    }

    /**
     * @param \SimpleXMLElement $typeElement
     * @param OptionValue[] $valueModels
     *
     * @return OptionType
     */
    private function transformType(\SimpleXMLElement $typeElement, array $valueModels)
    {
        $typeModel = new OptionType(
            (string) $typeElement['key'],
            $valueModels,
            $this->transformLocalizedNames($typeElement->{'localized-attributes'}),
            $this->transformTaxSet($typeElement)
        );

        return $typeModel;
    }

    /**
     * @param \SimpleXMLElement $typeElement
     *
     * @return null|string
     */
    private function transformTaxSet(\SimpleXMLElement $typeElement)
    {
        if (empty($typeElement->taxset)) {
            return null;
        }

        return (string) $typeElement->taxset;
    }

    /**
     * @param \SimpleXMLElement $localizedAttributes
     *
     * @return array
     */
    private function transformLocalizedNames(\SimpleXMLElement $localizedAttributes)
    {
        if (empty($localizedAttributes->locale)) {
            return [];
        }

        $localizedNames = [];
        foreach ($localizedAttributes->locale as $localeData) {
            $localizedNames[(string)$localeData['name']] = (string) $localeData->name;
        }

        return $localizedNames;
    }
}
