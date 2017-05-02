<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Calculation;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CalculationDependencyProvider extends AbstractBundleDependencyProvider
{
    const CLIENT_QUOTE = 'quote client';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addQuoteClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addQuoteClient(Container $container)
    {
        $container[static::CLIENT_QUOTE] = function (Container $container) {
            return $container->getLocator()->quote()->client();
        };

        return $container;
    }
}
