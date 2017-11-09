<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Customer\Persistence;

use Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface as BaseCustomerQueryContainerInterface;

interface CustomerQueryContainerInterface extends BaseCustomerQueryContainerInterface
{
    /**
     * @param int $idCustomer
     *
     * @return $this|\Orm\Zed\Product\Persistence\PyzQuoteQuery
     */
    public function queryCart($idCustomer);

    /**
     * @param int $name
     *
     * @return $this|\Orm\Zed\CustomerGroup\Persistence\SpyCustomerOrganizationRoleQuery
     */
    public function queryCustomerOrganizationRoleByName($name);
}
