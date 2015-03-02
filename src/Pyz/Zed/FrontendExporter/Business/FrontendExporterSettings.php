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

            // category nodes
            $this->locator->categoryExporter()->pluginNavigationProcessorPlugin(),
            $this->locator->categoryExporter()->pluginCategoryNodeProcessorPlugin(),
            $this->locator->categoryExporter()->pluginCategoryNodeUrlProcessorPlugin(),

            //translations
            $this->locator->glossaryExporter()->pluginTranslationProcessorPlugin(),

            $this->locator->cmsExporter()->pluginCmsPageProcessorPlugin(),
            $this->locator->cmsExporter()->pluginCmsPageUrlProcessorPlugin(),

            $this->locator->redirectExporter()->pluginRedirectProcessorPlugin(),
            $this->locator->redirectExporter()->pluginRedirectUrlProcessorPlugin(),
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
            $this->locator->categoryExporter()->pluginNavigationQueryExpanderPlugin(),
            $this->locator->categoryExporter()->pluginCategoryNodeQueryExpanderPlugin(),
            $this->locator->cmsExporter()->pluginCmsQueryExpanderPlugin(),
            $this->locator->redirectExporter()->pluginRedirectQueryExpanderPlugin(),
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
            $this->locator->productCategorySearch()->pluginProductCategorySearchProcessorPlugin(),
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
            $this->locator->productCategorySearch()->pluginProductCategorySearchQueryExpanderPlugin(),
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
