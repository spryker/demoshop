<?php 

namespace Generated\Zed\Acl\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface AclFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeAcl(FacadeAbstract $facade);

}
