<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Twig\Communication\Plugin;

use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Twig\Communication\TwigDependencyContainer;

/**
 * @method TwigDependencyContainer getDependencyContainer()
 */
class TwigYves extends AbstractPlugin
{

    /**
     * @param Application $application
     *
     * @return \Twig_Extension
     */
    public function getTwigYvesExtension(Application $application)
    {
        return $this->getDependencyContainer()
            ->createYvesTwigExtension($application);
    }

}
