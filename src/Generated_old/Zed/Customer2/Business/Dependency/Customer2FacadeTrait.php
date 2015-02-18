<?php 

namespace Generated\Zed\Customer2\Business\Dependency;

use ProjectA\Zed\Customer2\Business\Customer2Facade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait Customer2FacadeTrait
{
    /**
     * @var Customer2Facade
     */
    protected $facadeCustomer2;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCustomer2(FacadeAbstract $facade)
    {
        $this->facadeCustomer2 = $facade;
    }
}
