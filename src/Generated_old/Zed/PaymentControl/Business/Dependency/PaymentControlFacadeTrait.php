<?php 

namespace Generated\Zed\PaymentControl\Business\Dependency;

use ProjectA\Zed\PaymentControl\Business\PaymentControlFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait PaymentControlFacadeTrait
{
    /**
     * @var PaymentControlFacade
     */
    protected $facadePaymentControl;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadePaymentControl(FacadeAbstract $facade)
    {
        $this->facadePaymentControl = $facade;
    }
}
