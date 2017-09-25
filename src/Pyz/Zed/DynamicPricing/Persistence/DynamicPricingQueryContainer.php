<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:40
 */

namespace Pyz\Zed\DynamicPricing\Persistence;

use Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactorQuery;
use Pyz\Shared\DynamicPricing\DynamicPricingConstants;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * Class DynamicPricingQueryContainer
 * @package Pyz\Zed\DynamicPricing\Persistence
 *
 * @method DynamicPricingPersistenceFactory getFactory()
 */
class DynamicPricingQueryContainer extends AbstractQueryContainer implements DynamicPricingQueryContainerInterface
{
    /**
     * @param $customerId
     * @return SpyCustomerPricingFactorQuery
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