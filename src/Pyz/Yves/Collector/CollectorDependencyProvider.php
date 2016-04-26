<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Category\Plugin\CategoryResourceCreator;
use Pyz\Yves\Cms\Plugin\PageResourceCreator;
use Pyz\Yves\Product\Plugin\ProductResourceCreator;
use Pyz\Yves\Redirect\Plugin\RedirectResourceCreator;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CollectorDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_COLLECTOR = 'collector client';
    const CLIENT_CATALOG = 'client client';
    const PLUGIN_APPLICATION = 'application plugin';
    const PLUGIN_CATEGORY_RESOURCE_CREATOR = 'category resource plugin';
    const PLUGIN_PAGE_RESOURCE_CREATOR = 'page resource creator plugin';
    const PLUGIN_PRODUCT_RESOURCE_CREATOR = 'page product creator plugin';
    const PLUGIN_REDIRECT_RESOURCE_CREATOR = 'redirect resource creator plugin';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_COLLECTOR] = function (Container $container) {
            return $container->getLocator()->collector()->client();
        };

        $container[self::CLIENT_CATALOG] = function (Container $container) {
            return $container->getLocator()->catalog()->client();
        };

        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        $container[self::PLUGIN_CATEGORY_RESOURCE_CREATOR] = function () {
            $categoryResourceCreatorPlugin = new CategoryResourceCreator();

            return $categoryResourceCreatorPlugin->createCategoryResourceCreator();
        };

        $container[self::PLUGIN_REDIRECT_RESOURCE_CREATOR] = function () {
            $redirectResourceCreatorPlugin = new RedirectResourceCreator();

            return $redirectResourceCreatorPlugin->createRedirectResourceCreator();
        };

        $container[self::PLUGIN_PAGE_RESOURCE_CREATOR] = function () {
            $pageResourceCreatorPlugin = new PageResourceCreator();

            return $pageResourceCreatorPlugin->createPageResourceCreator();
        };

        $container[self::PLUGIN_PRODUCT_RESOURCE_CREATOR] = function () {
            $productResourceCreatorPlugin = new ProductResourceCreator();

            return $productResourceCreatorPlugin->createProductResourceCreator();
        };

        return $container;
    }

}
