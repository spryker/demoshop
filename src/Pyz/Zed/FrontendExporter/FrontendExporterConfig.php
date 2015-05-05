<?php

namespace Pyz\Zed\FrontendExporter;

use SprykerFeature\Zed\FrontendExporter\Dependency\Plugin\DataProcessorPluginInterface;
use SprykerFeature\Zed\FrontendExporter\Dependency\Plugin\ExportFailedDeciderPluginInterface;
use SprykerFeature\Zed\FrontendExporter\Dependency\Plugin\QueryExpanderPluginInterface;
use SprykerFeature\Zed\FrontendExporter\FrontendExporterConfig as SprykerFrontendExporterConfig;

class FrontendExporterConfig extends SprykerFrontendExporterConfig
{

    /**
     * @return DataProcessorPluginInterface[]
     */
    public function getKeyValueProcessors()
    {
        return [
            //product export processors
            $this->getLocator()->productFrontendExporterConnector()->pluginProductProcessorPlugin(),
            $this->getLocator()->productFrontendExporterAvailabilityConnector()->pluginProductAvailabilityProcessorPlugin(),
            $this->getLocator()->productFrontendExporterPriceConnector()->pluginProductPriceProcessorPlugin(),
            $this->getLocator()->productCategoryFrontendExporterConnector()->pluginProductCategoryBreadcrumbProcessorPlugin(),

            $this->getLocator()->categoryExporter()->pluginNavigationProcessorPlugin(),
            $this->getLocator()->categoryExporter()->pluginCategoryNodeProcessorPlugin(),

            $this->getLocator()->glossaryExporter()->pluginTranslationProcessorPlugin(),

            $this->getLocator()->cmsExporter()->pluginCmsPageProcessorPlugin(),
            $this->getLocator()->urlExporter()->pluginRedirectProcessorPlugin(),

            $this->getLocator()->urlExporter()->pluginUrlProcessorPlugin(),
//            $this->getLocator()->searchPage()->pluginSearchPageConfigProcessorPlugin(),
        ];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getKeyValueExportFailedDeciders()
    {
        return [
            $this->getLocator()->productFrontendExporterConnector()->pluginProductExportIsFailedDeciderPlugin()
        ];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getKeyValueQueryExpander()
    {
        return [
            //product query expander
//            $this->getLocator()->searchPage()->pluginSearchPageConfigQueryExpanderPlugin(),
            $this->getLocator()->productFrontendExporterConnector()->pluginProductQueryExpanderPlugin(),
            $this->getLocator()->productFrontendExporterAvailabilityConnector()
                ->pluginProductAvailabilityQueryExpanderPlugin(),

            $this->getLocator()->productFrontendExporterPriceConnector()->pluginProductPriceQueryExpanderPlugin(),

            $this->getLocator()->productCategoryFrontendExporterConnector()
                ->pluginProductCategoryBreadcrumbQueryExpanderPlugin(),

            $this->getLocator()->glossaryExporter()->pluginTranslationQueryExpanderPlugin(),
            $this->getLocator()->categoryExporter()->pluginNavigationQueryExpanderPlugin(),
            $this->getLocator()->categoryExporter()->pluginCategoryNodeQueryExpanderPlugin(),
            $this->getLocator()->cmsExporter()->pluginCmsQueryExpanderPlugin(),
            $this->getLocator()->urlExporter()->pluginRedirectQueryExpanderPlugin(),
            $this->getLocator()->urlExporter()->pluginUrlQueryExpanderPlugin(),
        ];
    }

    /**
     * @return DataProcessorPluginInterface[]
     */
    public function getSearchProcessors()
    {
        return [
            $this->getLocator()->productSearch()->pluginProductSearchProcessorPlugin(),
            $this->getLocator()->productSearch()->pluginProductAttributesProcessorPlugin(),
//            $this->getLocator()->productSearchAvailabilityConnector()->pluginProductAvailabilityProcessorPlugin(),
            $this->getLocator()->productCategorySearch()->pluginProductCategorySearchProcessorPlugin(),
        ];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getSearchQueryExpander()
    {
        return [
            $this->getLocator()->productSearch()->pluginProductQueryExpanderPlugin(),
//            $this->getLocator()->productSearchAvailabilityConnector()->pluginProductAvailabilityQueryExpanderPlugin(),
            $this->getLocator()->productCategory()->pluginProductCategoryPathQueryExpanderPlugin(),
        ];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getSearchExportFailedDeciders()
    {
        return [
            $this->getLocator()->productSearch()->pluginProductSearchFailedDeciderPlugin()
        ];
    }

    /**
     * @return array
     */
    public function getSearchUpdateProcessors()
    {
        return [];
    }
}
