<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Twig\Communication;

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
            $this->getLocator()->twig()->pluginTwigNative(),
            $this->getLocator()->price()->pluginTwigPrice()
        ];
    }

    /**
     * @return TwigFunctionPluginInterface[]
     */
    public function getTwigFunctions()
    {
        $twigCustomer = $this->getLocator()->customer()->pluginTwigCustomer()
            ->setCustomerClient($this->getLocator()->customer()->client())
        ;

        return [
            $this->getLocator()->price()->pluginTwigPrice(),
            $this->getLocator()->cms()->pluginTwigCms(),
            $twigCustomer,
            $this->getLocator()->assets()->pluginTwigAsset()
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
