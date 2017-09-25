<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:41
 */

namespace Pyz\Zed\DynamicPricing\Persistence;

use Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactorQuery;

interface DynamicPricingQueryContainerInterface
{
    /**
     * @param $customerId
     * @return SpyCustomerPricingFactorQuery
     */
    public function queryPricingFactorsByCustomerId($customerId);
}