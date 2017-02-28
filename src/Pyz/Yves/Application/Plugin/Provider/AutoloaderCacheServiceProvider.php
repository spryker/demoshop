<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Shared\Kernel\ClassResolver\ResolverCacheManager;
use Spryker\Yves\Kernel\AbstractPlugin;

class AutoloaderCacheServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $app->finish(function () {
            $this->persistClassResolverCache();
        });
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

    /**
     * @return void
     */
    protected function persistClassResolverCache()
    {
        $resolverCacheManager = new ResolverCacheManager();

        if (!$resolverCacheManager->useCache()) {
            return;
        }

        $cacheProvider = $resolverCacheManager->createClassResolverCacheProvider();
        $cacheProvider->getCache()->persist();
    }

}
