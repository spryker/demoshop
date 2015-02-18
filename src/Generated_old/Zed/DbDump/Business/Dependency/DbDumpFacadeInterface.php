<?php 

namespace Generated\Zed\DbDump\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface DbDumpFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeDbDump(FacadeAbstract $facade);

}
