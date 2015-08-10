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
                $imageFilenames = \SprykerFeature_Shared_Library_Image::getAllProductImagesBySize($images, $size);

                $fullImagePaths = [];
                foreach ($imageFilenames as $filename) {
                    $fullImagePaths[] = \SprykerFeature_Shared_Library_Image::getAbsoluteProductImageUrl($filename);
                }

                return $fullImagePaths;
            }),
            new \Twig_SimpleFunction('getFirstProductImagesBySize', function (array $images, $size = null) {
                return \SprykerFeature_Shared_Library_Image::getAbsoluteProductImageUrl(
                    \SprykerFeature_Shared_Library_Image::getFirstProductImageFilenameBySize($images, $size)
                );
            }),
        ];
    }

}
