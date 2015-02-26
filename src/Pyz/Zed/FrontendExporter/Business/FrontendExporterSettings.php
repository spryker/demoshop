<?php

namespace Pyz\Zed\FrontendExporter\Business;

use ProjectA\Zed\ProductCategorySearch\Communication\Plugin\ProductCategorySearchDataProcessorPlugin;
use ProjectA\Zed\FrontendExporter\Business\FrontendExporterSettings as CoreSettings;

/**
 * Class FrontendExporterSettings
 *
 * @package Pyz\Zed\FrontendExporter\Business
 */
class FrontendExporterSettings extends CoreSettings
{
    /**
     * @var \Generated\Zed\Ide\AutoCompletion
     */
    protected $locator;

    /**
     * @param $locator
     */
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
            $this->locator->productFrontendExporterConnector()->pluginProductProcessorPlugin(),
            $this->locator->productFrontendExporterAvailabilityConnector()->pluginProductAvailabilityProcessorPlugin(),
            $this->locator->productFrontendExporterConnector()->pluginProductUrlProcessorPlugin(),

            //translations
            $this->locator->glossaryExporter()->pluginTranslationProcessorPlugin(),
        ];
    }

    /**
     * @return array|\ProjectA\Zed\FrontendExporter\Dependency\Plugin\ExportFailedDeciderPluginInterface[]
     */
    public function getKeyValueExportFailedDeciders()
    {
        return [
            $this->locator->productFrontendExporterConnector()->pluginProductExportIsFailedDeciderPlugin()
        ];
    }

    /**
     * @return array|\ProjectA\Zed\FrontendExporter\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    public function getKeyValueQueryExpander()
    {
        return [
            //product query expander
            $this->locator->productFrontendExporterConnector()->pluginProductQueryExpanderPlugin(),
            $this->locator->productFrontendExporterAvailabilityConnector()
                ->pluginProductAvailabilityQueryExpanderPlugin(),
            $this->locator->glossaryExporter()->pluginTranslationQueryExpanderPlugin(),
        ];
    }


    /**
     * @return array|\ProjectA\Zed\FrontendExporter\Dependency\Plugin\DataProcessorPluginInterface[]
     */
    public function getSearchProcessors()
    {
        return [
            $this->locator->productSearch()->pluginProductSearchProcessorPlugin(),
            $this->locator->productSearch()->pluginProductAttributesProcessorPlugin(),
            $this->locator->productSearchAvailabilityConnector()->pluginProductAvailabilityProcessorPlugin(),
        ];
    }

    /**
     * @return array|\ProjectA\Zed\FrontendExporter\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    public function getSearchQueryExpander()
    {
        return [
            $this->locator->productSearch()->pluginProductQueryExpanderPlugin(),
            $this->locator->productSearchAvailabilityConnector()->pluginProductAvailabilityQueryExpanderPlugin(),
        ];
    }

    /**
     * @return array|\ProjectA\Zed\FrontendExporter\Dependency\Plugin\ExportFailedDeciderPluginInterface[]
     */
    public function getSearchExportFailedDeciders()
    {
        return [
            $this->locator->productSearch()->pluginProductSearchFailedDeciderPlugin()
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
