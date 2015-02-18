<?php 

namespace Generated\Zed\Yves\Business\Dependency;

use ProjectA\Zed\Yves\Business\YvesFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait YvesFacadeTrait
{
    /**
     * @var YvesFacade
     */
    protected $facadeYves;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeYves(FacadeAbstract $facade)
    {
        $this->facadeYves = $facade;
    }
}
