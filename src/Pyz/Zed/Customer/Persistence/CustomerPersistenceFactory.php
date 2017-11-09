<?php

namespace Pyz\Zed\Customer\Persistence;

use Orm\Zed\CustomerGroup\Persistence\SpyCustomerOrganizationRoleQuery;
use Orm\Zed\Product\Persistence\PyzQuoteQuery;
use Spryker\Zed\Customer\Persistence\CustomerPersistenceFactory as SprykerCustomerPersistenceFactory;

class CustomerPersistenceFactory extends SprykerCustomerPersistenceFactory
{

    /**
     * @return PyzQuoteQuery
     */
    public function createQuoteQuery()
    {
        return PyzQuoteQuery::create();
    }

    /**
     * @return \Orm\Zed\CustomerGroup\Persistence\SpyCustomerOrganizationRoleQuery
     */
    public function createSpyCustomerOrganizationRoleQuery()
    {
        return SpyCustomerOrganizationRoleQuery::create();
    }

}