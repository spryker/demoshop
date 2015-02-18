<?php 

namespace Generated\Zed\Acl\Business\Dependency;

use ProjectA\Zed\Acl\Business\AclFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait AclFacadeTrait
{
    /**
     * @var AclFacade
     */
    protected $facadeAcl;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeAcl(FacadeAbstract $facade)
    {
        $this->facadeAcl = $facade;
    }
}
