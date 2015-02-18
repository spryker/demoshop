<?php 

namespace Generated\Zed\ProductFrontendExporterConnector\Business\Dependency;

use ProjectA\Zed\FrontendProductConnector\Business\FrontendProductConnectorFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait ProductExporterFacadeTrait
{
    /**
     * @var FrontendProductConnectorFacade
     */
    protected $facadeProductExporter;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeProductExporter(FacadeAbstract $facade)
    {
        $this->facadeProductExporter = $facade;
    }
}
