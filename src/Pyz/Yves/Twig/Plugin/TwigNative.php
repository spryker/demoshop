<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Plugin;

use Pyz\Yves\Twig\Dependency\Plugin\TwigFilterPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_SimpleFilter;

class TwigNative extends AbstractPlugin implements TwigFilterPluginInterface
{
    /**
     * @return \Twig_SimpleFilter[]
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('floor', function ($value) {
                return floor($value);
            }),
            new Twig_SimpleFilter('ceil', function ($value) {
                return ceil($value);
            }),
            new Twig_SimpleFilter('int', function ($value) {
                return (int)$value;
            }),
        ];
    }
}
