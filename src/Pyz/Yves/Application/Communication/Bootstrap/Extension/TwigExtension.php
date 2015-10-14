<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\TwigExtensionInterface;
use SprykerEngine\Shared\Application\Communication\Application;

class TwigExtension extends LocatorAwareExtension implements TwigExtensionInterface
{

    /**
     * @param Application $app
     *
     * @return \Twig_Extension[]
     */
    public function getTwigExtensions(Application $app)
    {
        $yvesExtension = $this->getLocator()->twig()->pluginTwigYves();

        return [
            $yvesExtension->getTwigYvesExtension($app),
        ];
    }

}
