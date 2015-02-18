<?php 

namespace Generated\Zed\YvesExport\Business\Dependency;

use ProjectA\Zed\YvesExport\Business\YvesExportFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait YvesExportFacadeTrait
{
    /**
     * @var YvesExportFacade
     */
    protected $facadeYvesExport;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeYvesExport(FacadeAbstract $facade)
    {
        $this->facadeYvesExport = $facade;
    }
}
