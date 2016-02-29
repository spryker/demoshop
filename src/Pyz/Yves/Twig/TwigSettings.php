<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig;

use Pyz\Yves\Cms\Plugin\TwigCms;
use Pyz\Yves\Cms\Plugin\TwigCmsBlock;
use Pyz\Yves\Customer\Plugin\TwigCustomer;
use Pyz\Yves\Product\Plugin\TwigPrice;
use Pyz\Yves\Twig\Plugin\TwigAsset;
use Pyz\Yves\Twig\Plugin\TwigNative;
use Spryker\Shared\Kernel\LocatorLocatorInterface;

class TwigSettings
{

    /**
     * @var \Generated\Client\Ide\AutoCompletion
     */
    private $locator;

    /**
     * @param \Spryker\Shared\Kernel\LocatorLocatorInterface $locator
     */
    public function __construct(LocatorLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * @return \Pyz\Yves\Twig\Dependency\Plugin\TwigFilterPluginInterface[]
     */
    public function getTwigFilters()
    {
        return [
            new TwigNative(),
            new TwigPrice(),
        ];
    }

    /**
     * @return \Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface[]
     */
    public function getTwigFunctions()
    {
        $twigCustomer = new TwigCustomer();

        $twigCmsBlock = new TwigCmsBlock();

        return [
            new TwigPrice(),
            new TwigCms(),
            $twigCmsBlock,
            $twigCustomer,
            new TwigAsset(),
        ];
    }

    /**
     * @return \Generated\Client\Ide\AutoCompletion
     */
    protected function getLocator()
    {
        return $this->locator;
    }

}
