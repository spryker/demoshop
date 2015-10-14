<?php

namespace Pyz\Zed\Sales\Business;

use SprykerFeature\Zed\Sales\Business\SalesDependencyContainer as SprykerSalesDependencyContainer;
use Generated\Zed\Ide\FactoryAutoCompletion\SalesBusiness;
use SprykerFeature\Zed\Sales\SalesDependencyProvider;
use Pyz\Zed\Sales\Persistence\SalesQueryContainerInterface;

/**
 * @method SalesBusiness getFactory()
 */
class SalesDependencyContainer extends SprykerSalesDependencyContainer
{
    /**
     * @return Model\SalesManager
     * @throws \ErrorException
     */
    public function createOrderManager()
    {
        return $this->getFactory()->createModelSalesManager(
            $this->createSalesQueryContainer(),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_COUNTRY),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_OMS),
            $this->createReferenceGenerator()
        );
    }

    /**
     * @return SalesQueryContainerInterface
     */
    public function createSaleQueryContainer()
    {
        return $this->getQueryContainer();
    }
}
