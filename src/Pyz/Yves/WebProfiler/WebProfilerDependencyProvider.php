<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\WebProfiler;

use Pyz\Shared\WebProfiler\Plugin\ServiceProvider\WebProfilerServiceProvider;
use Spryker\Yves\Config\Plugin\ServiceProvider\ConfigProfilerServiceProvider;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class WebProfilerDependencyProvider extends AbstractBundleDependencyProvider
{
    const PLUGINS_WEB_PROFILER = 'PLUGINS_WEB_PROFILER';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[static::PLUGINS_WEB_PROFILER] = function () {
            return [
                new WebProfilerServiceProvider(),
                new ConfigProfilerServiceProvider(),
            ];
        };

        return $container;
    }
}
