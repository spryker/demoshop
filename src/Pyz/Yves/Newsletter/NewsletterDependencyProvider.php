<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Newsletter;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class NewsletterDependencyProvider extends AbstractBundleDependencyProvider
{
    const SERVICE_UTIL_VALIDATE = 'SERVICE_UTIL_VALIDATE';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        parent::provideDependencies($container);

        $container = $this->addUtilValidateService($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addUtilValidateService(Container $container)
    {
        $container[static::SERVICE_UTIL_VALIDATE] = function (\Spryker\Yves\Kernel\Container $container) {
            return $container->getLocator()->utilValidate()->service();
        };

        return $container;
    }
}
