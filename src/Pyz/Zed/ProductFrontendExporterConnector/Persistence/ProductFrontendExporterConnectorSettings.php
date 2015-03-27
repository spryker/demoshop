<?php


namespace Pyz\Zed\ProductFrontendExporterConnector\Persistence;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use ProjectA\Zed\ProductFrontendExporterConnector\Dependency\Plugin\AdditionalProductQueryExpanderPluginInterface;
use ProjectA\Zed\ProductFrontendExporterConnector\Persistence\ProductFrontendExporterConnectorSettings as CoreSettings;

class ProductFrontendExporterConnectorSettings extends CoreSettings
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
     * @return AdditionalProductQueryExpanderPluginInterface[]
     */
    public function getAdditionalPlugins()
    {
        return [
            $this->locator->productFrontendExporterConnector()->pluginUrlProductQueryExpanderPlugin(),
        ];
    }
}
