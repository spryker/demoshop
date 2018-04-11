<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

use Pyz\Client\AlexaBot\Model\Order\AlexaOrder;
use Pyz\Client\AlexaBot\Model\Product\AlexaProduct;
use Pyz\Yves\Product\Mapper\AttributeVariantMapper;
use Pyz\Yves\Product\Mapper\StorageProductMapper;
use Spryker\Client\Kernel\AbstractFactory;

class AlexaBotFactory extends AbstractFactory
{
    /**
     *
     * @return \Pyz\Client\AlexaBot\Model\Product\AlexaProduct
     */
    public function createAlexaProduct()
    {
        return new AlexaProduct(
            $this->getProductClient(),
            $this->createStorageProductMapper(),
            $this->getCatalogClient()
        );
    }

    /**
     *
     * @return \Pyz\Client\AlexaBot\Model\Order\AlexaOrder
     */
    public function createAlexaOrder()
    {
        return new AlexaOrder(
            $this->getCartClient(),
            $this->getCheckoutClient(),
            $this->getCalculationClient(),
            $this->getProductClient(),
            $this->createStorageProductMapper()
        );
    }

    /**
     *
     * @return \Pyz\Client\Catalog\CatalogClientInterface
     */
    public function getCatalogClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CATALOG);
    }

    /**
     *
     * @return \Spryker\Client\Product\ProductClientInterface
     */
    public function getProductClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_PRODUCT);
    }

    /**
     *
     * @return \Spryker\Client\PriceProduct\PriceProductClientInterface
     */
    protected function getPriceProductClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_PRICE_PRODUCT);
    }

    /**
     *
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CART);
    }

    /**
     *
     * @return \Spryker\Client\Checkout\CheckoutClientInterface
     */
    public function getCheckoutClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CHECKOUT);
    }

    /**
     *
     * @return \Spryker\Client\Calculation\CalculationClientInterface
     */
    public function getCalculationClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_CALCULATION);
    }

    /**
     *
     * @return \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    public function createStorageProductMapper()
    {
        return new StorageProductMapper(
            $this->createAttributeVariantMapper(),
            $this->getPriceProductClient()
        );
    }

    /**
     *
     * @return \Pyz\Yves\Product\Mapper\AttributeVariantMapper
     */
    public function createAttributeVariantMapper()
    {
        return new AttributeVariantMapper($this->getProductClient());
    }
}
