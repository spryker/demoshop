<?php 

namespace Generated\Zed\Availability\Business\Dependency;

use ProjectA\Zed\Availability\Business\AvailabilityFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait AvailabilityFacadeTrait
{
    /**
     * @var AvailabilityFacade
     */
    protected $facadeAvailability;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeAvailability(FacadeAbstract $facade)
    {
        $this->facadeAvailability = $facade;
    }
}
