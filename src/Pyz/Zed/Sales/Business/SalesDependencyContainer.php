<?php

namespace Pyz\Zed\Sales\Business;

use SprykerFeature\Zed\Sales\Business\SalesDependencyContainer as SprykerSalesDependencyContainer;
use Generated\Zed\Ide\FactoryAutoCompletion\SalesBusiness;
use SprykerFeature\Zed\Sales\SalesDependencyProvider;

/**
 * @method SalesBusiness getFactory()
 */
class SalesDependencyContainer extends SprykerSalesDependencyContainer
{
    /**
     * @return Model\SalesManager
     * @throws \ErrorException
     */
    public function createSalesManager()
    {
        return $this->getFactory()->createModelSalesManager(
            $this->getQueryContainer(),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_COUNTRY),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_OMS),
            $this->createReferenceGenerator()
        );
    }
}
