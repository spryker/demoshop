<?php

namespace Pyz\Yves\Catalog\Business;

use Spryker\Shared\Price\Code\PriceTypeConstants;

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
