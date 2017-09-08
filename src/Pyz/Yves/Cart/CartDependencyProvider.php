<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart;

use Pyz\Yves\Checkout\Plugin\CheckoutBreadcrumbPlugin;
use Pyz\Yves\Product\Plugin\StorageProductMapperPlugin;
use Spryker\Yves\CartVariant\Dependency\Plugin\CartVariantAttributeMapperPlugin;
use Spryker\Yves\DiscountPromotion\Plugin\ProductPromotionMapperPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Kernel\Plugin\Pimple;

class CartDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_CALCULATION = 'calculation client';
    const CLIENT_CART = 'cart client';
    const PLUGIN_APPLICATION = 'application plugin';
    const PLUGIN_CHECKOUT_BREADCRUMB = 'PLUGIN_CHECKOUT_BREADCRUMB';
    const PLUGIN_CART_VARIANT = 'PLUGIN_CART_VARIANT';
    const CLIENT_PRODUCT = 'CLIENT_PRODUCT';
    const PLUGIN_STORAGE_PRODUCT_MAPPER = 'PLUGIN_STORAGE_PRODUCT_MAPPER';
    const PLUGIN_PROMOTION_PRODUCT_MAPPER = 'PLUGIN_PROMOTION_PRODUCT_MAPPER';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);
        $container = $this->providePlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        $container[self::CLIENT_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->client();
        };

        $container[self::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        $container[static::CLIENT_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function providePlugins(Container $container)
    {
        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        $container[self::PLUGIN_CART_VARIANT] = function () {
            return new CartVariantAttributeMapperPlugin();
        };

        $container[self::PLUGIN_CHECKOUT_BREADCRUMB] = function () {
            return new CheckoutBreadcrumbPlugin();
        };

        $container[self::PLUGIN_STORAGE_PRODUCT_MAPPER] = function () {
            return new StorageProductMapperPlugin();
        };

        $container[self::PLUGIN_PROMOTION_PRODUCT_MAPPER] = function () {
            return new ProductPromotionMapperPlugin();
        };

        return $container;
    }

}
