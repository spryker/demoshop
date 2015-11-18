<?php

namespace Pyz\Zed\Price\Business;

use SprykerFeature\Zed\Price\Business\PriceFacade as SprykerPriceFacade;
use Psr\Log\LoggerInterface;

/**
 * @method PriceDependencyContainer getDependencyContainer()
 */
class PriceFacade extends SprykerPriceFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->getDemoDataInstaller($messenger)->install();
    }

    /**
     * @param string $sku
     * @param null $priceType
     *
     * @return int
     */
    public function getIdPriceProduct($sku, $priceType = null)
    {
        return $this->getDependencyContainer()->getReaderModel()->getProductPriceIdBySku($sku, $priceType);
    }

}
