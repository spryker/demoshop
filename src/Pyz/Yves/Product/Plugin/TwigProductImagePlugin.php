<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product\Plugin;

use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;

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
            new \Twig_SimpleFunction('getAllProductImagesBySize', function (array $images, $size = null) {
                $imageFilenames = \Spryker\Shared\Library\Image::getAllProductImagesBySize($images, $size);

                $fullImagePaths = [];
                foreach ($imageFilenames as $filename) {
                    $fullImagePaths[] = \Spryker\Shared\Library\Image::getAbsoluteProductImageUrl($filename);
                }

                return $fullImagePaths;
            }),
            new \Twig_SimpleFunction('getFirstProductImagesBySize', function (array $images, $size = null) {
                return \Spryker\Shared\Library\Image::getAbsoluteProductImageUrl(
                    \Spryker\Shared\Library\Image::getFirstProductImageFilenameBySize($images, $size)
                );
            }),
        ];
    }

}
