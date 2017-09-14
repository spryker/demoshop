<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\Application\Plugin\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\Provider\WebProfilerServiceProvider as SilexWebProfilerServiceProvider;
use Silex\ServiceProviderInterface;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Config\Plugin\ServiceProvider\ConfigProfilerServiceProvider;

class WebProfilerServiceProvider implements ServiceProviderInterface, ControllerProviderInterface
{

    /**
     * @var \Silex\ServiceProviderInterface|\Silex\Provider\WebProfilerServiceProvider
     */
    protected $silexWebProfiler;

    /**
     * @var \Silex\ServiceProviderInterface|\Spryker\Shared\Config\Plugin\ServiceProvider\ConfigProfilerServiceProvider
     */
    protected $configWebProfiler;

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        if (Config::get(ApplicationConstants::ENABLE_WEB_PROFILER)) {
            $this->getSilexWebProfiler()->register($app);
            $this->getConfigWebProfiler()->register($app);
        }
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        if (Config::get(ApplicationConstants::ENABLE_WEB_PROFILER)) {
            $this->getSilexWebProfiler()->boot($app);
            $this->getConfigWebProfiler()->register($app);
        }
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function connect(Application $app)
    {
        if (Config::get(ApplicationConstants::ENABLE_WEB_PROFILER)) {
            $this->getSilexWebProfiler()->connect($app);
        }
    }

    /**
     * @return \Silex\ServiceProviderInterface|\Silex\Provider\WebProfilerServiceProvider
     */
    protected function getSilexWebProfiler()
    {
        if ($this->silexWebProfiler === null) {
            $this->silexWebProfiler = new SilexWebProfilerServiceProvider();
        }

        return $this->silexWebProfiler;
    }

    /**
     * @return \Silex\ServiceProviderInterface|\Spryker\Shared\Config\Plugin\ServiceProvider\ConfigProfilerServiceProvider
     */
    protected function getConfigWebProfiler()
    {
        if ($this->configWebProfiler === null) {
            $this->configWebProfiler = new ConfigProfilerServiceProvider();
        }

        return $this->configWebProfiler;
    }

}
