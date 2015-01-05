<?php


namespace Pyz\Zed\YvesExport\Business;

use Generated\Zed\CategoryExporter\Business\Dependency\CategoryExporterFacadeInterface;
use Generated\Zed\CategoryExporter\Business\Dependency\CategoryExporterFacadeTrait;
use Generated\Zed\ProductExporter\Business\Dependency\ProductExporterFacadeInterface;
use Generated\Zed\ProductExporter\Business\Dependency\ProductExporterFacadeTrait;
use ProjectA\Zed\CategoryExporter\Communication\Plugin\CategoryNodeProcessorPlugin;
use ProjectA\Zed\CategoryExporter\Communication\Plugin\NavigationProcessorPlugin;
use ProjectA\Zed\ProductExporter\Communication\Plugin\ProductProcessorPlugin;
use ProjectA\Zed\YvesExport\Business\YvesExportSettings as CoreYvesExportSettings;

/**
 * Class YvesExportSettings
 *
 * @package Pyz\Zed\YvesExport\Business
 */
class YvesExportSettings extends CoreYvesExportSettings
    implements ProductExporterFacadeInterface, CategoryExporterFacadeInterface
{
    use ProductExporterFacadeTrait;
    use CategoryExporterFacadeTrait;

    /**
     * @return array
     */
    public function getKeyValueProcessors()
    {
        return [
            new ProductProcessorPlugin($this->facadeProductExporter, 100, 10),
            new NavigationProcessorPlugin($this->facadeCategoryExporter),
            new CategoryNodeProcessorPlugin($this->facadeCategoryExporter, 100)
        ];
    }
}
