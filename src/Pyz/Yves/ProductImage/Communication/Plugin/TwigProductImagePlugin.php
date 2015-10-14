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
            new \Twig_SimpleFunction('getAllProductImagesBySize', function (array $images, $size = null) {
                $imageFilenames = \SprykerFeature\Shared\Library\Image::getAllProductImagesBySize($images, $size);

                $fullImagePaths = [];
                foreach ($imageFilenames as $filename) {
                    $fullImagePaths[] = \SprykerFeature\Shared\Library\Image::getAbsoluteProductImageUrl($filename);
                }

                return $fullImagePaths;
            }),
            new \Twig_SimpleFunction('getFirstProductImagesBySize', function (array $images, $size = null) {
                return \SprykerFeature\Shared\Library\Image::getAbsoluteProductImageUrl(
                    \SprykerFeature\Shared\Library\Image::getFirstProductImageFilenameBySize($images, $size)
                );
            }),
        ];
    }

}
