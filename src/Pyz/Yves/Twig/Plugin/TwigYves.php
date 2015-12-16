<?php

namespace Pyz\Yves\Twig\Plugin;

use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Twig\TwigFactory;

/**
 * @method TwigFactory getFactory()
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
        return $this->getFactory()
            ->createYvesTwigExtension($application);
    }

}
