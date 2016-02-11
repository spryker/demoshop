<?php

namespace Pyz\Zed\Product\Business;

use Spryker\Zed\Product\Business\ProductFacade as SprykerProductFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\Product\Business\ProductBusinessFactory getFactory()
 */
class ProductFacade extends SprykerProductFacade
{

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        return $this->getFactory()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData)
    {
        return $this->getFactory()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
