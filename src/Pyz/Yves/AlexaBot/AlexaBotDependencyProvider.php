<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot;

use Pyz\Yves\AlexaBot\Plugin\AlexaProductPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class AlexaBotDependencyProvider extends AbstractBundleDependencyProvider
{
    const CLIENT_CATALOG        = 'CLIENT_CATALOG';
    const PRODUCT_PLUGIN        = 'PRODUCT_PLUGIN';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addCatalogClient($container);
        $container = $this->addProductPlugin($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCatalogClient(Container $container)
    {
        $container[self::CLIENT_CATALOG] = function (Container $container) {
            return $container->getLocator()->catalog()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addProductPlugin(Container $container)
    {
        $container[self::PRODUCT_PLUGIN] = function () {
            return new AlexaProductPlugin();
        };

        return $container;
    }

}
