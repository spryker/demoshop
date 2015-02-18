<?php 

namespace Generated\Zed\DemoPayment\Business\Dependency;

use ProjectA\Zed\DemoPayment\Business\DemoPaymentFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait DemoPaymentFacadeTrait
{
    /**
     * @var DemoPaymentFacade
     */
    protected $facadeDemoPayment;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeDemoPayment(FacadeAbstract $facade)
    {
        $this->facadeDemoPayment = $facade;
    }
}
