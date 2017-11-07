<?php

namespace Pyz\Zed\PriceCartConnector\Business;

use Pyz\Zed\PriceCartConnector\Business\Manager\PriceManager;
use Spryker\Zed\PriceCartConnector\Business\PriceCartConnectorBusinessFactory as SprykerPriceCartConnectorBusinessFactory;
use Spryker\Zed\PriceCartConnector\PriceCartConnectorDependencyProvider;

/**
 * @method \Spryker\Zed\PriceCartConnector\Business\PriceCartConnectorBusinessFactory getFactory()
 * @method \Spryker\Zed\PriceCartConnector\PriceCartConnectorConfig getConfig()
 */
class PriceCartConnectorBusinessFactory extends SprykerPriceCartConnectorBusinessFactory
{

    /**
     * @param string|null $grossPriceType
     *
     * @param $companyId
     * @return \Spryker\Zed\PriceCartConnector\Business\Manager\PriceManager
     */
    public function createPriceManager($grossPriceType = null, $companyId)
    {
        if ($grossPriceType === null) {
            $bundleConfig = $this->getConfig();
            $grossPriceType = $bundleConfig->getGrossPriceType();
        }

        return new PriceManager($this->getPriceFacade(), $grossPriceType, $this->getConfig()->getPriceMode(), $companyId);
    }
}
