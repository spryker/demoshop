<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\AlexaBot;

use Pyz\Yves\Product\Mapper\AttributeVariantMapper;
use Pyz\Yves\Product\Mapper\StorageProductMapper;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;

/**
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 */
class AlexaBotFactory extends AbstractFactory
{
    /**
     * @throws ContainerKeyNotFoundException
     * @return \Spryker\Client\Catalog\CatalogClientInterface
     */
    public function getCatalogClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CATALOG);
    }

    /**
     * @throws ContainerKeyNotFoundException
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CART);
    }

    /**
     * @throws ContainerKeyNotFoundException
     * @return \Spryker\Client\Checkout\CheckoutClientInterface
     */
    public function getCheckoutClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CHECKOUT);
    }

    /**
     * @throws ContainerKeyNotFoundException
     * @return \Spryker\Client\PriceProduct\PriceProductClientInterface
     */
    protected function getPriceProductClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_PRICE_PRODUCT);
    }

    /**
     * @throws ContainerKeyNotFoundException
     * @return \Spryker\Client\Product\ProductClientInterface
     */
    public function getProductClient()
    {
        return $this->getProvidedDependency(AlexaBotDependencyProvider::CLIENT_PRODUCT);
    }

    /**
     * @throws ContainerKeyNotFoundException
     * @return \Pyz\Yves\AlexaBot\Plugin\AlexaProductPlugin
     */
    public function getAlexaProductPlugin()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::PRODUCT_PLUGIN);
    }

    /**
     * @throws ContainerKeyNotFoundException
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
     * @throws ContainerKeyNotFoundException
     * @return \Pyz\Yves\Product\Mapper\AttributeVariantMapperInterface
     */
    public function createAttributeVariantMapper()
    {
        return new AttributeVariantMapper($this->getProductClient());
    }

}
