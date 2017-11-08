<?php

namespace Pyz\Zed\Quote\Persistence;

use Orm\Zed\Customer\Persistence\SpyCustomerQuery;
use Orm\Zed\Product\Persistence\PyzQuoteQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class QuotePersistenceFactory extends AbstractPersistenceFactory
{

    /**
     * @return PyzQuoteQuery
     */
    public function createQuoteQuery()
    {
        return PyzQuoteQuery::create();
    }

    /**
     * @return SpyCustomerQuery
     */
    public function createCustomerQuery()
    {
        return SpyCustomerQuery::create();
    }

}