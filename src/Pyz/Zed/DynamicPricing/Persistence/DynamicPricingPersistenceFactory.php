<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Persistence;

use Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactorQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * Class DynamicPricingPersistenceFactory
 * @package Pyz\Zed\DynamicPricing\Persistence
 * @method \Pyz\Zed\DynamicPricing\Persistence\DynamicPricingQueryContainer getQueryContainer()
 */
class DynamicPricingPersistenceFactory extends AbstractPersistenceFactory
{

    /**
     * @return \Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactorQuery
     */
    public function createCustomerPricingFactorQuery()
    {
        return new SpyCustomerPricingFactorQuery();
    }

}
