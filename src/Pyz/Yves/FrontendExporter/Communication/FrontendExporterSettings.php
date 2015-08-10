<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\FrontendExporter\Communication;

use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use Pyz\Yves\FrontendExporter\Communication\Creator\ResourceCreatorInterface;
use Generated\Yves\Ide\AutoCompletion;

class FrontendExporterSettings
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
