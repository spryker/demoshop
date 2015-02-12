<?php

namespace Pyz\Zed\FrontendExporter\Business;

use ProjectA\Zed\CategoryExporter\Communication\Plugin\CategoryNodeProcessorPlugin;
use ProjectA\Zed\CategoryExporter\Communication\Plugin\NavigationProcessorPlugin;
use ProjectA\Zed\FrontendExporter\Business\FrontendExporterSettings as CoreYvesExportSettings;
use ProjectA\Zed\GlossaryExporter\Communication\Plugin\KeyBuilderAwareInterface;
use ProjectA\Zed\GlossaryExporter\Communication\Plugin\KeyBuilderPlugin;
use ProjectA\Zed\ProductCategorySearch\Communication\Plugin\ProductCategorySearchProcessorPlugin;
use ProjectA\Zed\ProductExporter\Communication\Plugin\ProductProcessorPlugin;
use ProjectA\Zed\ProductSearch\Communication\Plugin\ProductProcessorPlugin as ProductSearchProcessorPlugin;

/**
 * Class YvesExportSettings
 *
 * @package Pyz\Zed\YvesExport\Business
 */
class FrontendExporterSettings extends CoreYvesExportSettings
{
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
        /** @var KeyBuilderAwareInterface $translationProcessorPlugin */
        $translationProcessorPlugin = $this->locator->glossaryExporter()->pluginTranslationProcessorPlugin();
        /** @var KeyBuilderPlugin $keyBuilderPlugin */
        $keyBuilderPlugin = $this->locator->glossaryExporter()->pluginKeyBuilderPlugin();

        $translationProcessorPlugin->setKeyBuilder($keyBuilderPlugin);

        return [
            new ProductProcessorPlugin(100, 10),
            new NavigationProcessorPlugin(),
            new CategoryNodeProcessorPlugin(100),
            $translationProcessorPlugin
        ];
    }

    /**
     * @return array|\ProjectA\Zed\FrontendExporter\Communication\Plugin\ProcessorPluginInterface[]
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
            new ProductCategorySearchProcessorPlugin(100, 10),
        ];
    }
}
