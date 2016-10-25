<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Plugin;

use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use Spryker\Shared\Library\Image;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_SimpleFunction;

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
            new Twig_SimpleFunction('getAllProductImagesBySize', function (array $images, $size = null) {
                $imageFilenames = Image::getAllProductImagesBySize($images, $size);

                $fullImagePaths = [];
                foreach ($imageFilenames as $filename) {
                    $fullImagePaths[] = Image::getAbsoluteProductImageUrl($filename);
                }

                return $fullImagePaths;
            }),
            new Twig_SimpleFunction('getFirstProductImagesBySize', function (array $images, $size = null) {
                return Image::getAbsoluteProductImageUrl(
                    Image::getFirstProductImageFilenameBySize($images, $size)
                );
            }),
        ];
    }

}
