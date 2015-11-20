<?php

namespace Pyz\Zed\Customer\Persistence;

use Orm\Zed\Customer\Persistence\SpyCustomerQuery;

interface CustomerQueryContainerInterface
{
    /**
     * @param $email
     * @return SpyCustomerQuery
     */
    public function queryCustomerByEmail($email);
}
