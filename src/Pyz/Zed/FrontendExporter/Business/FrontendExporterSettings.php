<?php

namespace Pyz\Zed\FrontendExporter\Business;

use ProjectA\Zed\ProductCategorySearch\Communication\Plugin\ProductCategorySearchDataProcessorPlugin;
use ProjectA\Zed\ProductSearch\Communication\Plugin\ProductDataProcessorPlugin as ProductSearchProcessorPlugin;
use ProjectA\Zed\FrontendExporter\Business\FrontendExporterSettings as CoreSettings;

/**
 * Class FrontendExporterSettings
 *
 * @package Pyz\Zed\YvesExport\Business
 */
class FrontendExporterSettings extends CoreSettings
{
    /**
     * @var \Generated\Zed\Ide\AutoCompletion
     */
    protected $locator;

    public function __construct($locator)
    {
        $this->locator = $locator;
    }


    /**
     * @return array
     */
    public function getKeyValueProcessors()
    {
        return [
            //product export processors
            $this->locator->productFrontendExporterConnector()->pluginProductProcessorPlugin()
        ];
    }

    public function getKeyValueExportFailedDeciders()
    {
        return [
            $this->locator->productFrontendExporterConnector()->pluginProductExportIsFailedDeciderPlugin()
        ];
    }

    public function getKeyValueQueryExpander()
    {
        return [
            //product query expander
            $this->locator->productFrontendExporterConnector()->pluginProductQueryExpanderPlugin()
        ];
    }


    /**
     * @return array|\ProjectA\Zed\YvesExport\Communication\Plugin\ProcessorPluginInterface[]
     */
    public function getSearchProcessors()
    {
        return [
            new ProductSearchProcessorPlugin(100, 10)
        ];
    }

    /**
     * @return array
     */
    public function getSearchUpdateProcessors()
    {
        return [
            new ProductCategorySearchDataProcessorPlugin(100, 10),
        ];
    }
}
