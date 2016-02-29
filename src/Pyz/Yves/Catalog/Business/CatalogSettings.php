<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
