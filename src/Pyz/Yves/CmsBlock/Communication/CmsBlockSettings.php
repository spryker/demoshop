<?php

namespace Pyz\Yves\CmsBlock\Communication;

use Generated\Yves\Ide\AutoCompletion;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;

class CmsBlockSettings
{
    /**
     * @var AutoCompletion
     */
    protected $locator;

    /**
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(LocatorLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * @return array
     */
    public function getBlockDataProviderPlugins()
    {
        return [
            $this->locator->catalog()->pluginBlockControllerCatalogBlockController(),
            $this->locator->cmsBlock()->pluginBlockControllerHeaderTopBlockController(),
            $this->locator->cmsBlock()->pluginBlockControllerFooterNavigationBlockController(),
            $this->locator->cmsBlock()->pluginBlockControllerFooterNewsletterBlockController(),
            $this->locator->cmsBlock()->pluginBlockControllerFooterPaymentBlockController(),
            $this->locator->cmsBlock()->pluginBlockControllerFooterCommunicationBlockController(),
            $this->locator->cmsBlock()->pluginBlockControllerNavigationBlockController(),
        ];
    }
}
