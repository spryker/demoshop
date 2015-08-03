<?php

namespace Pyz\Yves\Catalog\Business;

use SprykerFeature\Shared\Price\Code\PriceTypeConstants;

class CatalogSettings
{

    /**
     * @return array
     */
    public static function getSearchSortFields()
    {
        return [
            PriceTypeConstants::FINAL_GROSS_PRICE,
        ];
    }

}
