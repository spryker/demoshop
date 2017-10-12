<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\WebProfiler;

use Spryker\Yves\Kernel\AbstractFactory;

class WebProfilerFactory extends AbstractFactory
{
    /**
     * @return \Silex\ServiceProviderInterface[]|\Silex\ControllerProviderInterface[]
     */
    public function getWebProfiler()
    {
        return $this->getProvidedDependency(WebProfilerDependencyProvider::PLUGINS_WEB_PROFILER);
    }
}
