<?php 

namespace Generated\Zed\Checkout\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface CheckoutFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCheckout(FacadeAbstract $facade);

}
