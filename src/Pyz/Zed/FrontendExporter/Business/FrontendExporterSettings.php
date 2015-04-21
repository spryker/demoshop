<?php

namespace Pyz\Zed\FrontendExporter\Business;

use Generated\Zed\Ide\AutoCompletion;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerFeature\Zed\FrontendExporter\Dependency\Plugin\DataProcessorPluginInterface;
use SprykerFeature\Zed\FrontendExporter\Dependency\Plugin\ExportFailedDeciderPluginInterface;
use SprykerFeature\Zed\FrontendExporter\Dependency\Plugin\QueryExpanderPluginInterface;
use SprykerFeature\Zed\FrontendExporter\Business\FrontendExporterSettings as SprykerFrontendExporterSettings;

class FrontendExporterSettings extends SprykerFrontendExporterSettings
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
     * @return DataProcessorPluginInterface[]
     */
    public function getKeyValueProcessors()
    {
        return [
            //product export processors
            $this->locator->productFrontendExporterConnector()->pluginProductProcessorPlugin(),
            $this->locator->productFrontendExporterAvailabilityConnector()->pluginProductAvailabilityProcessorPlugin(),
            $this->locator->productFrontendExporterPriceConnector()->pluginProductPriceProcessorPlugin(),
            $this->locator->productCategoryFrontendExporterConnector()->pluginProductCategoryBreadcrumbProcessorPlugin(),

            // category nodes
            $this->locator->categoryExporter()->pluginNavigationProcessorPlugin(),
            $this->locator->categoryExporter()->pluginCategoryNodeProcessorPlugin(),

            //translations
            $this->locator->glossaryExporter()->pluginTranslationProcessorPlugin(),

            $this->locator->cmsExporter()->pluginCmsPageProcessorPlugin(),
            $this->locator->urlExporter()->pluginRedirectProcessorPlugin(),

            $this->locator->urlExporter()->pluginUrlProcessorPlugin(),
        ];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getKeyValueExportFailedDeciders()
    {
        return [
            $this->locator->productFrontendExporterConnector()->pluginProductExportIsFailedDeciderPlugin()
        ];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getKeyValueQueryExpander()
    {
        return [
            //product query expander
            $this->locator->productFrontendExporterConnector()->pluginProductQueryExpanderPlugin(),
            $this->locator->productFrontendExporterAvailabilityConnector()
                ->pluginProductAvailabilityQueryExpanderPlugin(),

            $this->locator->productFrontendExporterPriceConnector()->pluginProductPriceQueryExpanderPlugin(),

            $this->locator->productCategoryFrontendExporterConnector()
                ->pluginProductCategoryBreadcrumbQueryExpanderPlugin(),

            $this->locator->glossaryExporter()->pluginTranslationQueryExpanderPlugin(),
            $this->locator->categoryExporter()->pluginNavigationQueryExpanderPlugin(),
            $this->locator->categoryExporter()->pluginCategoryNodeQueryExpanderPlugin(),
            $this->locator->cmsExporter()->pluginCmsQueryExpanderPlugin(),
            $this->locator->urlExporter()->pluginRedirectQueryExpanderPlugin(),
            $this->locator->urlExporter()->pluginUrlQueryExpanderPlugin(),
        ];
    }

    /**
     * @return DataProcessorPluginInterface[]
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
     * @return QueryExpanderPluginInterface[]
     */
    public function getSearchQueryExpander()
    {
        return [
            $this->locator->productSearch()->pluginProductQueryExpanderPlugin(),
            $this->locator->productSearchAvailabilityConnector()->pluginProductAvailabilityQueryExpanderPlugin(),
            $this->locator->productCategory()->pluginProductCategoryPathQueryExpanderPlugin(),
        ];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
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
        return [];
    }
}
