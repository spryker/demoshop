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
     * @param $abstractName
     *
     * @return int
     */
    public function getAbstractIdByAbstractName($abstractName)
    {
        return $this->getFactory()
            ->createAlexaProduct()
            ->getAbstractIdByName($abstractName);
    }

    /**
     * @param int $abstractId
     *
     * @return array
     */
    public function getConcreteListByAbstractId($abstractId)
    {
        return $this->getFactory()
            ->createAlexaProduct()
            ->getConcreteListByAbstractId($abstractId);
    }

    /**
     * @param int $abstractId
     * @param string $variantName
     *
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName)
    {
        return $this->getFactory()
            ->createAlexaProduct()
            ->getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName);
    }

    /**
     * @param string $concreteSku
     * @param int $sessionId
     *
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku, $sessionId)
    {
        return $this->getFactory()
            ->createAlexaOrder()
            ->addConcreteToCartBySku($concreteSku, $sessionId);
    }

    /**
     * @param int $sessionId
     *
     * @return bool|false|string
     */
    public function performCheckout($sessionId)
    {
        return $this->getFactory()
            ->createAlexaOrder()
            ->performCheckout($sessionId);
    }
}
