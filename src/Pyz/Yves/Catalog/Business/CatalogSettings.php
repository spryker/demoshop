<?php

namespace Pyz\Yves\Catalog\Business;
use ProjectA\Shared\Price\Code\PriceTypeConstants;

/**
 * @package Pyz\Yves\Catalog\Business
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