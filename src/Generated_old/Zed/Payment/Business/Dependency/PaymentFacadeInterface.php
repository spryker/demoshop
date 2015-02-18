<?php 

namespace Generated\Zed\Payment\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface PaymentFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadePayment(FacadeAbstract $facade);

}
