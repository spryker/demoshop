<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\WebProfiler\Communication;

use Pyz\Zed\WebProfiler\WebProfilerDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \Pyz\Zed\WebProfiler\WebProfilerConfig getConfig()
 */
class WebProfilerCommunicationFactory extends AbstractCommunicationFactory
{

    /**
     * @return \Silex\ServiceProviderInterface[]|\Silex\ControllerProviderInterface[]
     */
    public function getWebProfiler()
    {
        return $this->getProvidedDependency(WebProfilerDependencyProvider::PLUGINS_WEB_PROFILER);
    }

}
