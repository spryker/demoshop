<?php 

namespace Generated\Zed\Ui\Business\Dependency;

use ProjectA\Zed\Ui\Business\UiFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait UiFacadeTrait
{
    /**
     * @var UiFacade
     */
    protected $facadeUi;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeUi(FacadeAbstract $facade)
    {
        $this->facadeUi = $facade;
    }
}
