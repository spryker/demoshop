<?php

namespace Pyz\Zed\Collector;

use SprykerFeature\Zed\Collector\Dependency\Plugin\DataProcessorPluginInterface;
use SprykerFeature\Zed\Collector\Dependency\Plugin\ExportFailedDeciderPluginInterface;
use SprykerFeature\Zed\Collector\Dependency\Plugin\QueryExpanderPluginInterface;
use SprykerFeature\Zed\Collector\CollectorConfig as SprykerCollectorConfig;

class CollectorConfig extends SprykerCollectorConfig
{
    public function getSearchCollectors()
    {
        return [
            'abstract_product' => $this->getLocator()->collector()->pluginProductCollectorSearchPlugin(),
        ];
    }

    public function getStorageCollectors()
    {
        return [
            'abstract_product' => $this->getLocator()->collector()->pluginProductCollectorStoragePlugin(),
//            'categorynode' => $this->getLocator()->collector()->pluginCategoryNodeCollectorStoragePlugin(),
//            'navigation' => $this->getLocator()->collector()->pluginNavigationCollectorStoragePlugin(),
//            'translation' => $this->getLocator()->collector()->pluginTranslationCollectorStoragePlugin(),
//            'page' => $this->getLocator()->collector()->pluginPageCollectorStoragePlugin(),
            'redirect' => $this->getLocator()->collector()->pluginRedirectCollectorStoragePlugin(),
            'url' => $this->getLocator()->collector()->pluginUrlCollectorStoragePlugin(),
        ];
    }

    /**
     * @return DataProcessorPluginInterface[]
     */
    public function getKeyValueProcessors()
    {
        return [
            $this->getLocator()->productOptionExporter()->pluginProductOptionProcessorPlugin(),

            $this->getLocator()->categoryExporter()->pluginNavigationProcessorPlugin(),
            $this->getLocator()->categoryExporter()->pluginCategoryNodeProcessorPlugin(),

            $this->getLocator()->glossaryExporter()->pluginTranslationProcessorPlugin(),

            $this->getLocator()->cmsExporter()->pluginCmsPageProcessorPlugin(),
            //$this->getLocator()->searchPage()->pluginSearchPageConfigProcessorPlugin(),
        ];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getKeyValueExportFailedDeciders()
    {
        return [
        ];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getKeyValueQueryExpander()
    {
        return [
            $this->getLocator()->productOptionExporter()->pluginProductOptionExpanderPlugin(),

            $this->getLocator()->glossaryExporter()->pluginTranslationQueryExpanderPlugin(),
            $this->getLocator()->categoryExporter()->pluginNavigationQueryExpanderPlugin(),
            $this->getLocator()->categoryExporter()->pluginCategoryNodeQueryExpanderPlugin(),
            $this->getLocator()->cmsExporter()->pluginCmsQueryExpanderPlugin(),
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
