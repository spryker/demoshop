<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Redirect\ResourceCreator;

use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Silex\Application;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;

class RedirectResourceCreator extends AbstractResourceCreator
{

    /**
     * @return string
     */
    public function getType()
    {
        return 'redirect';
    }

    /**
     * @param Application $app
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $app, array $data)
    {
        $bundleControllerAction = new BundleControllerAction('Redirect', 'Redirect', 'redirect');
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);
        $service = $this->createServiceForController($app, $bundleControllerAction, $routeResolver);

        return [
            '_controller' => $service,
            '_route' => $routeResolver->resolve(),
            'meta' => $data,
        ];
    }

}
