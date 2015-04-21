<?php

namespace Pyz\Zed\Price\Communication;

use SprykerEngine\Zed\Kernel\Communication\AbstractDependencyContainer;
use SprykerFeature\Zed\Price\Communication\PriceDependencyContainer as SprykerPriceDependencyContainer;
use Pyz\Zed\Price\Business\PriceFacade;

class PriceDependencyContainer extends SprykerPriceDependencyContainer
{

    /**
     * @return PriceFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->price()->facade();
    }

}
