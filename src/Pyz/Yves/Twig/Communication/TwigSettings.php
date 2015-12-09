<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Twig\Communication;

use Pyz\Yves\Assets\Communication\Plugin\TwigAsset;
use Pyz\Yves\Cms\Communication\Plugin\TwigCms;
use Pyz\Yves\Cms\Communication\Plugin\TwigCmsBlock;
use Pyz\Yves\Customer\Communication\Plugin\TwigCustomer;
use Pyz\Yves\Product\Communication\Plugin\TwigPrice;
use Pyz\Yves\Twig\Communication\Plugin\TwigNative;
use Generated\Yves\Ide\AutoCompletion;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFilterPluginInterface;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;

class TwigSettings
{

    /**
     * @var AutoCompletion
     */
    private $locator;

    /**
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(LocatorLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * @return TwigFilterPluginInterface[]
     */
    public function getTwigFilters()
    {
        return [
            new TwigNative(),
            new TwigPrice(),
        ];
    }

    /**
     * @return TwigFunctionPluginInterface[]
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
     * @return AutoCompletion
     */
    protected function getLocator()
    {
        return $this->locator;
    }

}
