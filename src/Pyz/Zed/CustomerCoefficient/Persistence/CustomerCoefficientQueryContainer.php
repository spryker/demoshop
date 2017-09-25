<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 15:06
 */

namespace Pyz\Zed\CustomerCoefficient\Persistence;


use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * Class CustomerCoefficientQueryContainer
 * @package Pyz\Zed\CustomerCoefficient\Persistence
 *
 * @method CustomerCoefficientPersistenceFactory getFactory()
 */
class CustomerCoefficientQueryContainer extends AbstractQueryContainer implements CustomerCoefficientQueryContainerInterface
{
    /**
     * @param $customerId
     * @return \Orm\Zed\CustomerCoefficient\Persistence\SpyCustomerCoefficientQuery
     */
    public function queryCustomerCoefficientByCustomerId($customerId)
    {
        $query = $this->getFactory()->createCustomerCoefficientQuery();
        $query->filterByFkCustomer($customerId);

        return $query;
    }
}