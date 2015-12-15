<?php

namespace Pyz\Yves\Twig;

use Pyz\Yves\Twig\Plugin\TwigAsset;
use Pyz\Yves\Cms\Plugin\TwigCms;
use Pyz\Yves\Cms\Plugin\TwigCmsBlock;
use Pyz\Yves\Customer\Plugin\TwigCustomer;
use Pyz\Yves\Product\Plugin\TwigPrice;
use Pyz\Yves\Twig\Plugin\TwigNative;
use Generated\Yves\Ide\AutoCompletion;
use Spryker\Shared\Kernel\LocatorLocatorInterface;
use Pyz\Yves\Twig\Dependency\Plugin\TwigFilterPluginInterface;
use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;

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
