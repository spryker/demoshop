<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\AlexaBot\AlexaBotFactory getFactory()
 */
class AlexaProductPlugin extends AbstractPlugin implements AlexaProductPluginInterface
{

    /**
     * @param int $abstractId
     * @return array
     */
    public function getConcreteListByAbstractId($abstractId)
    {
        if ($abstractId === 1) {
            return [
                0 => 'sweet',
                1 => 'salty',
            ];
        }

        if ($abstractId === 2) {
            return [
                0 => 'salsa',
                1 => 'cheese',
            ];
        }

        if ($abstractId === 3) {
            return [
                0 => 'cola',
                1 => 'fanta',
            ];
        }

        return [];
    }

    /**
     * @param int $abstractId
     * @param string $variantName
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName)
    {
        // I'll just loop into
        $this->getConcretesByAbstractId($abstractId);

        // And select the right name
        return "001-1";
    }

    /**
     * @param string $concreteSku
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku)
    {
        // Add the item and save the quote with session ID
        // \Spryker\Client\Cart\CartClientInterface::addItem

        return true;
    }

    /**
     * @return bool
     */
    public function performCheckout()
    {
        // Create CheckoutObject from Cart
        // \Spryker\Client\Cart\CartClient::getQuote BY SESSION ID

        return true;

    }

    protected function getConcretesByAbstractId($abstractId)
    {

    }
}
