<?php

namespace Pyz\Zed\YvesExport\Business;

use ProjectA\Zed\CategoryExporter\Communication\Plugin\CategoryNodeProcessorPlugin;
use ProjectA\Zed\CategoryExporter\Communication\Plugin\NavigationProcessorPlugin;
use ProjectA\Zed\GlossaryExporter\Communication\Plugin\TranslationProcessorPlugin;
use ProjectA\Zed\ProductExporter\Communication\Plugin\ProductProcessorPlugin;
use ProjectA\Zed\ProductSearch\Communication\Plugin\ProductProcessorPlugin as ProductSearchProcessorPlugin;
use ProjectA\Zed\YvesExport\Business\Exporter\KeyBuilder\KvMarkerKeyBuilder;
use ProjectA\Zed\YvesExport\Business\YvesExportSettings as CoreYvesExportSettings;

/**
 * Class YvesExportSettings
 *
 * @package Pyz\Zed\YvesExport\Business
 */
class YvesExportSettings extends CoreYvesExportSettings
{
    /**
     * @return array
     */
    public function getKeyValueProcessors()
    {
        return [
        //    new ProductProcessorPlugin(100, 10),
        //    new NavigationProcessorPlugin(),
        //    new CategoryNodeProcessorPlugin(100)
            new TranslationProcessorPlugin(new KvMarkerKeyBuilder())
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
}
