<?php


namespace Pyz\Zed\ProductFrontendExporterConnector\Communication;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use ProjectA\Zed\ProductFrontendExporterConnector\Communication\Plugin\AdditionalProductQueryExpanderPluginInterface;
use ProjectA\Zed\ProductFrontendExporterConnector\Communication\ProductFrontendExporterConnectorSettings as CoreSettings;

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
