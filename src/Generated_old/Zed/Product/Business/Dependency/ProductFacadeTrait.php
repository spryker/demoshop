<?php 

namespace Generated\Zed\Product\Business\Dependency;

use Pyz\Zed\Product\Business\ProductFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait ProductFacadeTrait
{
    /**
     * @var ProductFacade
     */
    protected $facadeProduct;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeProduct(FacadeAbstract $facade)
    {
        $this->facadeProduct = $facade;
    }
}
