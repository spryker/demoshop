<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\WebProfiler\Plugin\ServiceProvider;

use Silex\Application;
use Silex\Provider\WebProfilerServiceProvider as SilexWebProfilerServiceProvider;
use Spryker\Shared\Kernel\Store;

class WebProfilerServiceProvider extends SilexWebProfilerServiceProvider
{

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $app['profiler.cache_dir'] = function () {
            return APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/profiler';
        };

        parent::register($app);
    }

}
