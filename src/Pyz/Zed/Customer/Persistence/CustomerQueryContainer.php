<?php

namespace Pyz\Zed\Customer\Persistence;

use Orm\Zed\Customer\Persistence\SpyCustomerQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerFeature\Zed\Customer\Persistence\CustomerQueryContainer as SpyCustomerQueryContainer;

class CustomerQueryContainer extends SpyCustomerQueryContainer implements CustomerQueryContainerInterface
{

    /**
     * @param string $email
     *
     * @return SpyCustomerQuery
     */
    public function queryCustomerWithPasswordByEmail($email)
    {
        $query = $this->getDependencyContainer()->createSpyCustomerQuery();
        $query->filterByEmail($email);
        $query->filterByPassword(null, Criteria::ISNOTNULL);

        return $query;
    }

}
