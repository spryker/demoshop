<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist;

use Spryker\Yves\Kernel\AbstractFactory;

class WishlistFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Client\Customer\CustomerClientInterface
     */
    public function createCustomerClient()
    {
        return $this->getProvidedDependency(WishlistDependencyProvider::CLIENT_CUSTOMER);
    }

}
