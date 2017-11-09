<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Customer\Persistence;

use Spryker\Zed\Customer\Persistence\CustomerQueryContainer as BaseCustomerQueryContainer;

/**
 * @method \Pyz\Zed\Customer\Persistence\CustomerPersistenceFactory getFactory()
 */
class CustomerQueryContainer extends BaseCustomerQueryContainer implements CustomerQueryContainerInterface
{
    public function queryCustomers()
    {
        return $this->getFactory()->createSpyCustomerQuery();
    }

    /**
     * @param int $idCustomer
     *
     * @return $this|\Orm\Zed\Product\Persistence\PyzQuoteQuery
     */
    public function queryCart($idCustomer)
    {
        return $this->getFactory()
            ->createQuoteQuery()
            ->filterByFkCustomer($idCustomer);

    }
}
