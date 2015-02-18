<?php 

namespace Generated\Zed\Customer\Business\Dependency;

use ProjectA\Zed\Customer\Business\CustomerFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CustomerFacadeTrait
{
    /**
     * @var CustomerFacade
     */
    protected $facadeCustomer;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCustomer(FacadeAbstract $facade)
    {
        $this->facadeCustomer = $facade;
    }
}
