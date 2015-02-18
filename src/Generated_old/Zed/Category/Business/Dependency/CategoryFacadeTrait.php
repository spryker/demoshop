<?php 

namespace Generated\Zed\Category\Business\Dependency;

use ProjectA\Zed\Category\Business\CategoryFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CategoryFacadeTrait
{
    /**
     * @var CategoryFacade
     */
    protected $facadeCategory;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCategory(FacadeAbstract $facade)
    {
        $this->facadeCategory = $facade;
    }
}
