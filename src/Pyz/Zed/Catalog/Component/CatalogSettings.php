<?php

namespace Pyz\Zed\Catalog\Component;

use Pyz\Zed\Catalog\Component\Model\Import\Product\FieldnameConstantInterface;
use ProjectA\Zed\Catalog\Component\CatalogSettings as CoreSettings;

class CatalogSettings extends CoreSettings implements FieldnameConstantInterface
{
    /**
     * @return array
     */
    public function getProductImportFieldNames()
    {
        return [
            self::SKU => self::SKU,
            self::BUNDLE_TYPE => self::BUNDLE_TYPE,
            self::CONFIG_REFERENCE => self::CONFIG_REFERENCE,
            self::BUNDLE_REFERENCES => self::BUNDLE_REFERENCES,
            'quantity' => 'quantity',
            'refoption' => 'refoption',
            'saleable' => 'saleable',
            self::STATUS => self::STATUS,
            self::ATTRIBUTE_SET => self::ATTRIBUTE_SET,
            self::VARIETY => self::VARIETY,
            self::STOCK => self::STOCK,
            self::CATEGORIES => 'category',
            self::OPTIONS => self::OPTIONS
        ];
    }
}
