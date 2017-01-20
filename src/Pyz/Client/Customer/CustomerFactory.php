<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Customer;

use Pyz\Client\Customer\Zed\CustomerStub;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Customer\CustomerFactory as SprykerCustomerFactory;

class CustomerFactory extends SprykerCustomerFactory
{

    /**
     * @return \Pyz\Client\Customer\Zed\CustomerStubInterface
     */
    public function createZedCustomerStub()
    {
        return new CustomerStub(
            $this->getProvidedDependency(CustomerDependencyProvider::SERVICE_ZED)
        );
    }

    /**
     * @return CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::CART_CLIENT);
    }

}
