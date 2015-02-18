<?php 

namespace Generated\Zed\ProductFrontendExporterConnector\Business\Dependency;

use ProjectA\Zed\ProductFrontendExporterConnector\Business\ProductFrontendExporterConnectorFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait ProductFrontendExporterConnectorFacadeTrait
{
    /**
     * @var ProductFrontendExporterConnectorFacade
     */
    protected $facadeProductFrontendExporterConnector;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeProductFrontendExporterConnector(FacadeAbstract $facade)
    {
        $this->facadeProductFrontendExporterConnector = $facade;
    }
}
