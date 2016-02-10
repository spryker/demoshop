<?php

namespace Pyz\Yves\Twig\Plugin;

use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Twig\TwigFactory getFactory()
 */
class TwigYves extends AbstractPlugin
{

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_Extension
     */
    public function getTwigYvesExtension(Application $application)
    {
        return $this->getFactory()
            ->createYvesTwigExtension($application);
    }

}
