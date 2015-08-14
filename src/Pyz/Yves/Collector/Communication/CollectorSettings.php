<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector\Communication;

use Generated\Yves\Ide\AutoCompletion;
use Pyz\Yves\Collector\Communication\Creator\ResourceCreatorInterface;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;

class CollectorSettings
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
     * @return ResourceCreatorInterface[]
     */
    public function getResourceCreators()
    {
        return [
            $this->locator->productExporter()->pluginProductResourceCreator()
                ->createProductResourceCreator(),
            $this->locator->categoryExporter()->pluginCategoryResourceCreator()
                ->createCategoryResourceCreator(),
            $this->locator->redirectExporter()->pluginRedirectResourceCreator()
                ->createRedirectResourceCreator(),
            $this->locator->cmsExporter()->pluginPageResourceCreator()
                ->createPageResourceCreator(),
        ];
    }

}
