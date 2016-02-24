<?php

namespace Pyz\Zed\Product\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Product\Business\ProductFacade as SprykerProductFacade;

/**
 * @method \Pyz\Zed\Product\Business\ProductBusinessFactory getFactory()
 */
class ProductFacade extends SprykerProductFacade implements ProductFacadeInterface
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
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
