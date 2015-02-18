<?php 

namespace Generated\Zed\DbDump\Business\Dependency;

use ProjectA\Zed\DbDump\Business\DbDumpFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait DbDumpFacadeTrait
{
    /**
     * @var DbDumpFacade
     */
    protected $facadeDbDump;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeDbDump(FacadeAbstract $facade)
    {
        $this->facadeDbDump = $facade;
    }
}
