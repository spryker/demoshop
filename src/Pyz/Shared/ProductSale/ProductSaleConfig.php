<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\ProductSale;

use Spryker\Shared\Kernel\AbstractBundleConfig;

class ProductSaleConfig extends AbstractBundleConfig
{

    const PRICE_TYPE_ORIGINAL = 'ORIGINAL';

    /**
     * @return string
     */
    public function getLabelSaleName()
    {
        return 'SALE';
    }

}
