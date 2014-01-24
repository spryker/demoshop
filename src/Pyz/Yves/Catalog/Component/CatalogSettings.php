<?php

namespace Pyz\Yves\Catalog\Component;

use ProjectA\Shared\Price\Code\PriceTypeConstants;

/**
 * @package Pyz\Yves\Catalog\Component
 */
class CatalogSettings
{
    /**
     * @return array
     */
    public static function getSearchSortFields()
    {
        return [
            PriceTypeConstants::FINAL_GROSS_PRICE
        ];
    }
}
