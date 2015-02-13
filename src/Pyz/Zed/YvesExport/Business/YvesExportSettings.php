<?php

namespace Pyz\Zed\YvesExport\Business;

use ProjectA\Zed\CategoryExporter\Communication\Plugin\CategoryNodeDataProcessorPlugin;
use ProjectA\Zed\CategoryExporter\Communication\Plugin\NavigationDataProcessorPlugin;
use ProjectA\Zed\GlossaryExporter\Communication\Plugin\KeyBuilderAwareInterface;
use ProjectA\Zed\GlossaryExporter\Communication\Plugin\KeyBuilderPlugin;
use ProjectA\Zed\GlossaryExporter\Communication\Plugin\TranslationDataProcessorPlugin;
use ProjectA\Zed\ProductCategorySearch\Communication\Plugin\ProductCategorySearchDataProcessorPlugin;
use ProjectA\Zed\ProductExporter\Communication\Plugin\ProductDataProcessorPlugin;
use ProjectA\Zed\ProductSearch\Communication\Plugin\ProductDataProcessorPlugin as ProductSearchProcessorPlugin;
use ProjectA\Zed\YvesExport\Business\Exporter\KeyBuilder\KvMarkerKeyBuilder;
use ProjectA\Zed\YvesExport\Business\YvesExportSettings as CoreYvesExportSettings;

/**
 * Class YvesExportSettings
 *
 * @package Pyz\Zed\YvesExport\Business
 */
class YvesExportSettings extends CoreYvesExportSettings
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
            new ProductDataProcessorPlugin(100, 10),
            new NavigationDataProcessorPlugin(),
            new CategoryNodeDataProcessorPlugin(100),
            $translationProcessorPlugin
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
