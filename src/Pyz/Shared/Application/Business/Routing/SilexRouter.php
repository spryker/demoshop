<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Shared\Application\Business\Routing;

use \SprykerFeature\Shared\Application\Business\Routing\SilexRouter as SprykerSilexRouter;


/**
 * The default router, which matches/generates all the routes
 * add by the methods in Application
 */
class SilexRouter extends SprykerSilexRouter
{
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $generator = new UrlGenerator($this->getRouteCollection(), $this->getContext(), $this->logger);

        return $generator->generate($name, $parameters, $referenceType);

    }

}
