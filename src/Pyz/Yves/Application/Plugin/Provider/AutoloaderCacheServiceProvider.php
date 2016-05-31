<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Kernel\ClassResolver\Cache\Provider\File as ClassResolverFileCacheProvider;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoloaderCacheServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $provider = $this;
        $app->finish(function (Request $request, Response $response) use ($provider) {
            $provider->persistClassResolverCache();
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
        if (Config::get(ApplicationConstants::ENABLE_AUTO_LOADER_CACHE, false)) {
            (new ClassResolverFileCacheProvider())
                ->getCache()
                ->persist();
        }
    }

}
