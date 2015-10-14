<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\RouterExtensionInterface;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerFeature\Shared\Application\Business\Routing\SilexRouter;
use Symfony\Component\Routing\RouterInterface;

class RouterExtension extends LocatorAwareExtension implements RouterExtensionInterface
{

    /**
     * @param Application $app
     *
     * @return RouterInterface[]
     */
    public function getRouter(Application $app)
    {
        return [
            $this->getLocator()->collector()->pluginRouterStorageRouter()->setSsl(false),
            $this->getLocator()->catalog()->pluginRouterSearchRouter()->setSsl(false),
            /*
             * SilexRouter should come last, as it is not the fastest one if it can
             * not find a matching route (lots of magic)
             */
            new SilexRouter($app),
        ];
    }

}
