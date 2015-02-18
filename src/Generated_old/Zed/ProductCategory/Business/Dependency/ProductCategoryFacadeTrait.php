<?php 

namespace Generated\Zed\ProductCategory\Business\Dependency;

use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait ProductCategoryFacadeTrait
{
    /**
     * @var ProductCategoryFacade
     */
    protected $facadeProductCategory;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeProductCategory(FacadeAbstract $facade)
    {
        $this->facadeProductCategory = $facade;
    }
}
