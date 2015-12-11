<?php

namespace Pyz\Yves\Twig\Dependency\Plugin;

use Silex\Application;

interface TwigFunctionPluginInterface
{

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application);

}
