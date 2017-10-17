<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\Application\Business\Routing;

use Spryker\Shared\Application\Business\Routing\SilexRouter as SprykerSilexRouter;

/**
 * The default router, which matches/generates all the routes
 * add by the methods in Application
 */
class SilexRouter extends SprykerSilexRouter
{
    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $generator = new UrlGenerator($this->app, $this->getRouteCollection(), $this->getContext(), $this->logger);

        return $generator->generate($name, $parameters, $referenceType);
    }
}
