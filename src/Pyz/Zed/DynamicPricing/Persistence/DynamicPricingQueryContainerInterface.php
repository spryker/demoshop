<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Persistence;

/**
 * Interface DynamicPricingQueryContainerInterface
 * @package Pyz\Zed\DynamicPricing\Persistence
 */
interface DynamicPricingQueryContainerInterface
{

    /**
     * @param int $customerId
     *
     * @return \Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactorQuery
     */
    public function queryPricingFactorsByCustomerId($customerId);

}
