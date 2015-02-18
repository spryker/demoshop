<?php 

namespace Generated\Zed\CategoryExporter\Business\Dependency;

use ProjectA\Zed\CategoryExporter\Business\CategoryExporterFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CategoryExporterFacadeTrait
{
    /**
     * @var CategoryExporterFacade
     */
    protected $facadeCategoryExporter;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCategoryExporter(FacadeAbstract $facade)
    {
        $this->facadeCategoryExporter = $facade;
    }
}
