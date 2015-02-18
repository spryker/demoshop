<?php 

namespace Generated\Zed\Price\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface PriceFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadePrice(FacadeAbstract $facade);

}
