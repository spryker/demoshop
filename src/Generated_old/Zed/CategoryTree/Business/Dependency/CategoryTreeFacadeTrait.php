<?php 

namespace Generated\Zed\CategoryTree\Business\Dependency;

use Pyz\Zed\CategoryTree\Business\CategoryTreeFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CategoryTreeFacadeTrait
{
    /**
     * @var CategoryTreeFacade
     */
    protected $facadeCategoryTree;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCategoryTree(FacadeAbstract $facade)
    {
        $this->facadeCategoryTree = $facade;
    }
}
