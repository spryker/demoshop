<?php 

namespace Generated\Zed\DemoPayment\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface DemoPaymentFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeDemoPayment(FacadeAbstract $facade);

}
