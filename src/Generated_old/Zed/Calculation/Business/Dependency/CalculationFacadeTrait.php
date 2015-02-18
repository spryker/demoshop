<?php 

namespace Generated\Zed\Calculation\Business\Dependency;

use ProjectA\Zed\Calculation\Business\CalculationFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CalculationFacadeTrait
{
    /**
     * @var CalculationFacade
     */
    protected $facadeCalculation;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCalculation(FacadeAbstract $facade)
    {
        $this->facadeCalculation = $facade;
    }
}
