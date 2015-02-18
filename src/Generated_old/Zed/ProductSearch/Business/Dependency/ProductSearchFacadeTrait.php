<?php 

namespace Generated\Zed\ProductSearch\Business\Dependency;

use Pyz\Zed\ProductSearch\Business\ProductSearchFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait ProductSearchFacadeTrait
{
    /**
     * @var ProductSearchFacade
     */
    protected $facadeProductSearch;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeProductSearch(FacadeAbstract $facade)
    {
        $this->facadeProductSearch = $facade;
    }
}
