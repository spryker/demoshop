<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Order;

interface AlexaOrderInterface
{
    /**
     * @param string $concreteSku
     *
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku);

    /**
     * @return bool
     */
    public function performCheckout();
}
