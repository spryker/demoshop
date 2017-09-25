<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:38
 */

namespace Pyz\Zed\DynamicPricing\Persistence;

use Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactorQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class DynamicPricingPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return SpyCustomerPricingFactorQuery
     */
    public function createCustomerPricingFactorQuery()
    {
        return new SpyCustomerPricingFactorQuery();
    }
}