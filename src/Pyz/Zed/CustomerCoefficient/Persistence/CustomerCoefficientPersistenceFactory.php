<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 15:08
 */

namespace Pyz\Zed\CustomerCoefficient\Persistence;

use Orm\Zed\CustomerCoefficient\Persistence\SpyCustomerCoefficientQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class CustomerCoefficientPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return SpyCustomerCoefficientQuery
     */
    public function createCustomerCoefficientQuery()
    {
        return new SpyCustomerCoefficientQuery();
    }
}