<?php 

namespace Generated\Zed\Checkout\Business\Dependency;

use ProjectA\Zed\Checkout\Business\CheckoutFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CheckoutFacadeTrait
{
    /**
     * @var CheckoutFacade
     */
    protected $facadeCheckout;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCheckout(FacadeAbstract $facade)
    {
        $this->facadeCheckout = $facade;
    }
}
