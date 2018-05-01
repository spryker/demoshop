<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

use Pyz\Client\AlexaBot\Model\Cart\AlexaCart;
use Pyz\Client\AlexaBot\Model\CheckoutAndOrder\AlexaCheckoutAndCheckoutAndOrder;
use Pyz\Client\AlexaBot\Model\CheckoutAndOrder\OrderHydrator;
use Pyz\Client\AlexaBot\Model\FileSession\FileSession;
use Pyz\Client\AlexaBot\Model\Product\AlexaProduct;
use Pyz\Yves\Product\Mapper\AttributeVariantMapper;
use Pyz\Yves\Product\Mapper\StorageProductMapper;
use Spryker\Client\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\AlexaBot\AlexaBotConfig getConfig()
 */
class AlexaBotFactory extends AbstractFactory
{
    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return AlexaProduct
     */
    public function createAlexaProduct()
    {
        return new AlexaProduct(
            $this->getConfig(),
            $this->getCatalogClient(),
            $this->getProductClient(),
            $this->createStorageProductMapper(),
            $this->createFileSession()
        );
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return AlexaCart
     */
    public function createAlexaCart()
    {
        return new AlexaCart(
            $this->getConfig(),
            $this->getCartClient(),
            $this->createAlexaProduct(),
            $this->createFileSession()
        );
    }


    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return AlexaCheckoutAndCheckoutAndOrder
     */
    public function createAlexaOrder()
    {
        return new AlexaCheckoutAndCheckoutAndOrder(
            $this->getConfig(),
            $this->getCheckoutClient(),
            $this->getCalculationClient(),
            $this->getProductClient(),
            $this->createStorageProductMapper(),
            $this->createOrderHydrator(),
            $this->createFileSession()
        );
    }

    /**
     * @return FileSession
     */
    public function createFileSession()
    {
        return new FileSession();
    }

    public function createOrderHydrator()
    {
        return new OrderHydrator();
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return mixed
     */
    public function getCatalogClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CATALOG);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return mixed
     */
    public function getProductClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_PRODUCT);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return mixed
     */
    protected function getPriceProductClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_PRICE_PRODUCT);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return mixed
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CART);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return mixed
     */
    public function getCheckoutClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CHECKOUT);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return mixed
     */
    public function getCalculationClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_CALCULATION);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return StorageProductMapper
     */
    public function createStorageProductMapper()
    {
        return new StorageProductMapper(
            $this->createAttributeVariantMapper(),
            $this->getPriceProductClient()
        );
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return AttributeVariantMapper
     */
    public function createAttributeVariantMapper()
    {
        return new AttributeVariantMapper($this->getProductClient());
    }
}
