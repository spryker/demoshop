<?php


namespace Pyz\Zed\YvesExport\Component;

use Generated\Zed\ProductExporter\Component\Dependency\ProductExporterFacadeInterface;
use Generated\Zed\ProductExporter\Component\Dependency\ProductExporterFacadeTrait;
use ProjectA\Zed\YvesExport\Component\YvesExportSettings as CoreYvesExportSettings;

/**
 * Class YvesExportSettings
 *
 * @package Pyz\Zed\YvesExport\Component
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
 