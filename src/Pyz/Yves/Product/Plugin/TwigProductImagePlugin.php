<?php

namespace Pyz\Yves\Product\Plugin;

use Spryker\Shared\Library\Image;
use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;

class TwigProductImagePlugin extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction
     */
    public function getFunctions(Application $application)
    {
        return [
            new \Twig_SimpleFunction('getAllProductImagesBySize', function (array $images, $size = null) {
                $imageFilenames = Image::getAllProductImagesBySize($images, $size);

                $fullImagePaths = [];
                foreach ($imageFilenames as $filename) {
                    $fullImagePaths[] = Image::getAbsoluteProductImageUrl($filename);
                }

                return $fullImagePaths;
            }),
            new \Twig_SimpleFunction('getFirstProductImagesBySize', function (array $images, $size = null) {
                return Image::getAbsoluteProductImageUrl(
                    Image::getFirstProductImageFilenameBySize($images, $size)
                );
            }),
        ];
    }

}
