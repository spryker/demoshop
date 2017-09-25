<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * Class DynamicPricingQueryContainer
 * @package Pyz\Zed\DynamicPricing\Persistence
 *
 * @method \Pyz\Zed\DynamicPricing\Persistence\DynamicPricingPersistenceFactory getFactory()
 */
class DynamicPricingQueryContainer extends AbstractQueryContainer implements DynamicPricingQueryContainerInterface
{

    /**
     * @param int $customerId
     *
     * @return \Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactorQuery
     */
    public function queryPricingFactorsByCustomerId($customerId)
    {
        $query = $this->getFactory()->createCustomerPricingFactorQuery();
        $query
            ->leftJoinWithSpyPricingFactor()
            ->useSpyPricingFactorQuery()
            ->leftJoinWithSpyPricingFactorType()
            ->endUse()
            ->filterByFkCustomer($customerId);

        return $query;
    }

}
