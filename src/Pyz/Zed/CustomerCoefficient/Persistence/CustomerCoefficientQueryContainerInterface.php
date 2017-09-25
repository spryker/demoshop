<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 15:06
 */

namespace Pyz\Zed\CustomerCoefficient\Persistence;

interface CustomerCoefficientQueryContainerInterface
{
    /**
     * @param $customerId
     * @return \Orm\Zed\CustomerCoefficient\Persistence\SpyCustomerCoefficientQuery
     */
    public function queryCustomerCoefficientByCustomerId($customerId);
}