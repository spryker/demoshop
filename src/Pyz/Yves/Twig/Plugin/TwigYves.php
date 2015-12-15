<?php

namespace Pyz\Yves\Twig\Plugin;

use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Twig\TwigDependencyContainer;

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
