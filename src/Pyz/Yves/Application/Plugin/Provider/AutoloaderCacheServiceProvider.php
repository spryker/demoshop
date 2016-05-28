<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;
use Spryker\Shared\Kernel\ClassResolver\ClassResolverCacheHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method \Pyz\Yves\Category\CategoryFactory getFactory()
 */
class AutoloaderCacheServiceProvider extends AbstractServiceProvider
{

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {

    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        //(new ClassResolverCacheHandler())->persistCache();
        
        register_shutdown_function(function() use ($app) {
            die('y???');
            (new ClassResolverCacheHandler())->persistCache();
            return true;
        });

        //this is not working
        /*
        dump('boot');
        $app->finish(function (Request $request, Response $response) use ($app) {
            (new ClassResolverCacheHandler())->persistCache();
        });
        */
    }

}
