<?php


namespace Pyz\Zed\YvesExport\Business;

use Generated\Zed\CategoryExporter\Business\Dependency\CategoryExporterFacadeInterface;
use Generated\Zed\CategoryExporter\Business\Dependency\CategoryExporterFacadeTrait;
use Generated\Zed\ProductExporter\Business\Dependency\ProductExporterFacadeInterface;
use Generated\Zed\ProductExporter\Business\Dependency\ProductExporterFacadeTrait;
use Generated\Zed\ProductSearch\Business\Dependency\ProductSearchFacadeInterface;
use Generated\Zed\ProductSearch\Business\Dependency\ProductSearchFacadeTrait;
use ProjectA\Zed\CategoryExporter\Communication\Plugin\CategoryNodeProcessorPlugin;
use ProjectA\Zed\CategoryExporter\Communication\Plugin\NavigationProcessorPlugin;
use ProjectA\Zed\ProductExporter\Communication\Plugin\ProductProcessorPlugin;
use ProjectA\Zed\ProductSearch\Business\ProductSearchFacade;
use ProjectA\Zed\ProductSearch\Communication\Plugin\ProductProcessorPlugin as ProductSearchProcessorPlugin;
use ProjectA\Zed\YvesExport\Business\YvesExportSettings as CoreYvesExportSettings;

/**
 * Class YvesExportSettings
 *
 * @package Pyz\Zed\YvesExport\Business
 */
class YvesExportSettings extends CoreYvesExportSettings
    implements ProductExporterFacadeInterface,
    CategoryExporterFacadeInterface,
    ProductSearchFacadeInterface
{
    use ProductExporterFacadeTrait;
    use CategoryExporterFacadeTrait;
    use ProductSearchFacadeTrait;

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

    /**
     * @return array|\ProjectA\Zed\YvesExport\Communication\Plugin\ProcessorPluginInterface[]
     */
    public function getSearchProcessors()
    {
        return [
            new ProductSearchProcessorPlugin($this->facadeProductSearch, 100, 10)
        ];
    }


}
