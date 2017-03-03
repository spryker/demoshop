<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig;

use Pyz\Yves\Catalog\Plugin\TwigCatalogActiveSearchFilterFunctions;
use Pyz\Yves\Cms\Plugin\TwigCms;
use Pyz\Yves\Cms\Plugin\TwigCmsBlock;
use Pyz\Yves\Customer\Plugin\TwigCustomer;
use Pyz\Yves\Navigation\Plugin\TwigNavigation;
use Pyz\Yves\Twig\Plugin\TwigAsset;
use Pyz\Yves\Twig\Plugin\TwigNative;

class TwigSettings
{

    /**
     * @return \Pyz\Yves\Twig\Dependency\Plugin\TwigFilterPluginInterface[]
     */
    public function getTwigFilters()
    {
        return [
            new TwigNative(),
        ];
    }

    /**
     * @return \Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface[]
     */
    public function getTwigFunctions()
    {
        return [
            new TwigCms(),
            new TwigCmsBlock(),
            new TwigCustomer(),
            new TwigAsset(),
            new TwigCatalogActiveSearchFilterFunctions(),
            new TwigNavigation(),
        ];
    }

}
