<?php 

namespace Generated\Zed\Payment\Business\Dependency;

use ProjectA\Zed\Payment\Business\PaymentFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait PaymentFacadeTrait
{
    /**
     * @var PaymentFacade
     */
    protected $facadePayment;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadePayment(FacadeAbstract $facade)
    {
        $this->facadePayment = $facade;
    }
}
