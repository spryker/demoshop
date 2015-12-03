<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\ProductImage\Communication\Plugin;

use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;

class TwigProductImagePlugin extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction
     */
    public function getFunctions(Application $application)
    {
        return [
            new \Twig_SimpleFunction('getProductImageUrl', function ($filename) {
                return \Pyz\Shared\Library\Image::getAbsoluteProductImageUrl($filename);
            }),
        ];
    }

}
