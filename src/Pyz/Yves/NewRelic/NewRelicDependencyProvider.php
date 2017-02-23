<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\NewRelic;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;

use Spryker\Yves\Kernel\Container;

class NewRelicDependencyProvider extends AbstractBundleDependencyProvider
{

    const SERVICE_UTIL_DATE_TIME = 'util date time service';

    const SERVICE_NETWORK = 'util network service';

    const SERVICE_UTIL_IO = 'util io service';

    const SERVICE_DATA = 'util data service';
    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::SERVICE_NETWORK] = function (Container $container) {
            return $container->getLocator()->utilNetwork()->service();
        };

        return $container;
    }

}
