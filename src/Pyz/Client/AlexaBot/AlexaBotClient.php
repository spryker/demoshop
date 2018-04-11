<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\AlexaBot\AlexaBotFactory getFactory()
 */
class AlexaBotClient extends AbstractClient implements AlexaBotClientInterface
{

    /**
     * @param string $abstractName
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return string[]
     */
    public function getVariantsByProductName($abstractName)
    {
        $abstractId = $this->getFactory()
            ->createAlexaProduct()
            ->getAbstractIdByName($abstractName);

        return $this->getFactory()
            ->createAlexaProduct()
            ->getConcreteListByAbstractId($abstractId);
    }

    /**
     * @param string $variantName
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return string
     */
    public function addConcreteToCartByVariantName($variantName)
    {
        $abstractId = $this->getFactory()
            ->createAlexaProduct()
            ->getAbstractIdBySession();

        $concreteSku = $this->getFactory()
            ->createAlexaProduct()
            ->getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName);

        return $this->getFactory()
            ->createAlexaOrder()
            ->addConcreteToCartBySku($concreteSku);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return bool|false|string
     */
    public function checkoutAndPlaceOrder()
    {
        return $this->getFactory()
            ->createAlexaOrder()
            ->performCheckout();
    }
}
