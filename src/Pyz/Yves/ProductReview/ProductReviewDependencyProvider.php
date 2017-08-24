<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview;

use Spryker\Shared\ProductReview\ProductReviewConfig;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\ProductReview\ProductReviewDependencyProvider as SprykerProductReviewDependencyProvider;

class ProductReviewDependencyProvider extends SprykerProductReviewDependencyProvider
{

    const CLIENT_CUSTOMER = 'CLIENT_CUSTOMER';
    const CLIENT_PRODUCT = 'CLIENT_PRODUCT';
    const CLIENT_PRODUCT_REVIEW = 'CLIENT_PRODUCT_REVIEW';

    const CONFIG_PRODUCT_REVIEW_SHARED = 'CONFIG_PRODUCT_REVIEW_SHARED';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = parent::provideDependencies($container);

        $container = $this->addCustomerClient($container);
        $container = $this->addProductClient($container);
        $container = $this->addProductReviewClient($container);
        $container = $this->addSharedProductReviewConfig($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCustomerClient(Container $container)
    {
        $container[static::CLIENT_CUSTOMER] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addProductClient(Container $container)
    {
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
    protected function addProductReviewClient(Container $container)
    {
        $container[static::CLIENT_PRODUCT_REVIEW] = function (Container $container) {
            return $container->getLocator()->productReview()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addSharedProductReviewConfig(Container $container)
    {
        $container[static::CONFIG_PRODUCT_REVIEW_SHARED] = function (Container $container) {
            return new ProductReviewConfig();
        };

        return $container;
    }

}
