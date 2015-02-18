<?php 

namespace Generated\Zed\ProductImage\Business\Dependency;

use ProjectA\Zed\ProductImage\Business\ProductImageFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait ProductImageFacadeTrait
{
    /**
     * @var ProductImageFacade
     */
    protected $facadeProductImage;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeProductImage(FacadeAbstract $facade)
    {
        $this->facadeProductImage = $facade;
    }
}
