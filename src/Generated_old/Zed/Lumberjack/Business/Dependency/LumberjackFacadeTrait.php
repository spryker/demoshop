<?php 

namespace Generated\Zed\Lumberjack\Business\Dependency;

use ProjectA\Zed\Lumberjack\Business\LumberjackFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait LumberjackFacadeTrait
{
    /**
     * @var LumberjackFacade
     */
    protected $facadeLumberjack;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeLumberjack(FacadeAbstract $facade)
    {
        $this->facadeLumberjack = $facade;
    }
}
