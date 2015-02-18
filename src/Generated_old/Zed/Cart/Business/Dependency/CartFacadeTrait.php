<?php 

namespace Generated\Zed\Cart\Business\Dependency;

use ProjectA\Zed\Cart\Business\CartFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CartFacadeTrait
{
    /**
     * @var CartFacade
     */
    protected $facadeCart;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCart(FacadeAbstract $facade)
    {
        $this->facadeCart = $facade;
    }
}
