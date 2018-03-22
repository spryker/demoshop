<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\DiscountPromotion;

use Pyz\Yves\Product\Plugin\StorageProductMapperPlugin;
use Spryker\Yves\DiscountPromotion\DiscountPromotionFactory as SprykerDiscountPromotionFactory;

class DiscountPromotionFactory extends SprykerDiscountPromotionFactory
{
    /**
     * @return \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    public function createStorageProductMapperPlugin()
    {
        return new StorageProductMapperPlugin();
    }
}
