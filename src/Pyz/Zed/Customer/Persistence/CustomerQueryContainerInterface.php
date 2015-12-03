<?php

namespace Pyz\Zed\Customer\Persistence;

use Orm\Zed\Customer\Persistence\SpyCustomerQuery;

interface CustomerQueryContainerInterface
{
    /**
     * @param string $email
     * @return SpyCustomerQuery
     */
    public function queryCustomerByEmail($email);

    /**
     * @param string $email
     *
     * @return SpyCustomerQuery
     */
    public function queryCustomerWithPasswordByEmail($email);
}
