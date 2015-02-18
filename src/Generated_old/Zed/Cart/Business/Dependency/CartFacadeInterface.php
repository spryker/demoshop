<?php 

namespace Generated\Zed\Cart\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface CartFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCart(FacadeAbstract $facade);

}
