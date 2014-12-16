<?php


namespace Pyz\Zed\YvesExport\Business;

use Generated\Zed\ProductExporter\Business\Dependency\ProductExporterFacadeInterface;
use Generated\Zed\ProductExporter\Business\Dependency\ProductExporterFacadeTrait;
use ProjectA\Zed\YvesExport\Business\YvesExportSettings as CoreYvesExportSettings;

/**
 * Class YvesExportSettings
 *
 * @package Pyz\Zed\YvesExport\Business
 */
class YvesExportSettings extends CoreYvesExportSettings implements ProductExporterFacadeInterface
{
    use ProductExporterFacadeTrait;

    /**
     * @return array
     */
    public function getKeyValueProcessors()
    {
        return [
            $this->facadeProductExporter->getProductProcessor(),
        ];
    }
}
