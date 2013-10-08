<?php
namespace Pyz\Yves\Catalog\Component;

use \ProjectA_Zed_Price_Component_Interface_PriceTypeConstants as PriceTypeConstants;

/**
 * @package Pyz\Yves\Catalog\Component
 */
class Settings
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
