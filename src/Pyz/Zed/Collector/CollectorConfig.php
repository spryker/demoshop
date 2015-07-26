<?php

namespace Pyz\Zed\Collector;

use SprykerFeature\Zed\Collector\Dependency\Plugin\DataProcessorPluginInterface;
use SprykerFeature\Zed\Collector\Dependency\Plugin\ExportFailedDeciderPluginInterface;
use SprykerFeature\Zed\Collector\Dependency\Plugin\QueryExpanderPluginInterface;
use SprykerFeature\Zed\Collector\CollectorConfig as SprykerCollectorConfig;

class CollectorConfig extends SprykerCollectorConfig
{

    /**
     * @return DataProcessorPluginInterface[]
     */
    public function getKeyValueProcessors()
    {
        return [
            $this->getLocator()->productFrontendExporterConnector()->pluginProductProcessorPlugin(),
            $this->getLocator()->productFrontendExporterAvailabilityConnector()->pluginProductAvailabilityProcessorPlugin(),
            $this->getLocator()->productFrontendExporterPriceConnector()->pluginProductPriceProcessorPlugin(),
            $this->getLocator()->taxFrontendExporterConnector()->pluginTaxProcessorPlugin(),
            $this->getLocator()->productCategoryFrontendExporterConnector()->pluginProductCategoryBreadcrumbProcessorPlugin(),

            $this->getLocator()->productOptionExporter()->pluginProductOptionProcessorPlugin(),

            $this->getLocator()->categoryExporter()->pluginNavigationProcessorPlugin(),
            $this->getLocator()->categoryExporter()->pluginCategoryNodeProcessorPlugin(),

            $this->getLocator()->glossaryExporter()->pluginTranslationProcessorPlugin(),

            $this->getLocator()->cmsExporter()->pluginCmsPageProcessorPlugin(),
            $this->getLocator()->urlExporter()->pluginRedirectProcessorPlugin(),

            $this->getLocator()->urlExporter()->pluginUrlProcessorPlugin(),
            //$this->getLocator()->searchPage()->pluginSearchPageConfigProcessorPlugin(),
        ];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getKeyValueExportFailedDeciders()
    {
        return [
            $this->getLocator()->productFrontendExporterConnector()->pluginProductExportIsFailedDeciderPlugin(),
        ];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getKeyValueQueryExpander()
    {
        return [
            $this->getLocator()->productFrontendExporterConnector()->pluginProductQueryExpanderPlugin(),
            $this->getLocator()->productFrontendExporterAvailabilityConnector()->pluginProductAvailabilityQueryExpanderPlugin(),

            $this->getLocator()->productFrontendExporterPriceConnector()->pluginProductPriceQueryExpanderPlugin(),
            $this->getLocator()->taxFrontendExporterConnector()->pluginTaxQueryExpanderPlugin(),

            $this->getLocator()->productOptionExporter()->pluginProductOptionExpanderPlugin(),

            $this->getLocator()->productCategoryFrontendExporterConnector()->pluginProductCategoryBreadcrumbQueryExpanderPlugin(),

            $this->getLocator()->glossaryExporter()->pluginTranslationQueryExpanderPlugin(),
            $this->getLocator()->categoryExporter()->pluginNavigationQueryExpanderPlugin(),
            $this->getLocator()->categoryExporter()->pluginCategoryNodeQueryExpanderPlugin(),
            $this->getLocator()->cmsExporter()->pluginCmsQueryExpanderPlugin(),
            $this->getLocator()->urlExporter()->pluginRedirectQueryExpanderPlugin(),
            $this->getLocator()->urlExporter()->pluginUrlQueryExpanderPlugin(),
            //$this->getLocator()->searchPage()->pluginSearchPageConfigQueryExpanderPlugin(),
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
            //$this->getLocator()->productSearchAvailabilityConnector()->pluginProductAvailabilityProcessorPlugin(),
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
            //$this->getLocator()->productSearchAvailabilityConnector()->pluginProductAvailabilityQueryExpanderPlugin(),
            $this->getLocator()->productCategory()->pluginProductCategoryPathQueryExpanderPlugin(),
        ];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getSearchExportFailedDeciders()
    {
        return [
            $this->getLocator()->productSearch()->pluginProductSearchFailedDeciderPlugin(),
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
