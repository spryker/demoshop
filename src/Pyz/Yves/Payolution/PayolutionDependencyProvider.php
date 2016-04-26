<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Payolution;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class PayolutionDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_PAYOLUTION = 'payolution client';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_PAYOLUTION] = function (Container $container) {
            return $container->getLocator()->payolution()->client();
        };

        return $container;
    }

}
