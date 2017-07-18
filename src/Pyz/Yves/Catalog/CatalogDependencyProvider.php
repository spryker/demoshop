<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CatalogDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_LOCALE = 'CLIENT_LOCALE';
    const CLIENT_SEARCH = 'CLIENT_SEARCH';
    const PLUGIN_CATEGORY_READER = 'PLUGIN_CATEGORY_READER';
    const CLIENT_CATEGORY = 'CLIENT_CATEGORY';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = parent::provideDependencies($container);
        $container = $this->provideSearchClient($container);
        $container = $this->addCategoryClient($container);
        $container = $this->addLocaleClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideSearchClient(Container $container)
    {
        $container[self::CLIENT_SEARCH] = function (Container $container) {
            return $container->getLocator()->search()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCategoryClient(Container $container)
    {
        $container[static::CLIENT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addLocaleClient(Container $container)
    {
        $container[static::CLIENT_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->client();
        };

        return $container;
    }

}
