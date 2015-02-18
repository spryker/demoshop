<?php 

namespace Generated\Zed\FrontendExporter\Business\Dependency;

use ProjectA\Zed\FrontendExporter\Business\FrontendExporterFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait FrontendExporterFacadeTrait
{
    /**
     * @var FrontendExporterFacade
     */
    protected $facadeFrontendExporter;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeFrontendExporter(FacadeAbstract $facade)
    {
        $this->facadeFrontendExporter = $facade;
    }
}
