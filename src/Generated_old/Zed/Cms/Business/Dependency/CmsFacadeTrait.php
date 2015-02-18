<?php 

namespace Generated\Zed\Cms\Business\Dependency;

use ProjectA\Zed\Cms\Business\CmsFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CmsFacadeTrait
{
    /**
     * @var CmsFacade
     */
    protected $facadeCms;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCms(FacadeAbstract $facade)
    {
        $this->facadeCms = $facade;
    }
}
