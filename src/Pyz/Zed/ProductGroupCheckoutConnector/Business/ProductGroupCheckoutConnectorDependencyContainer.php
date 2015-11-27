<?php

namespace Pyz\Zed\ProductGroupCheckoutConnector\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductGroupCheckoutConnectorBusiness;
use Pyz\Zed\ProductGroupCheckoutConnector\Business\Order\ProductGroupManager;
use Pyz\Zed\ProductGroupCheckoutConnector\ProductGroupCheckoutConnectorDependencyProvider;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;

/**
 * @method ProductGroupCheckoutConnectorBusiness getFactory
 */
class ProductGroupCheckoutConnectorDependencyContainer extends AbstractBusinessDependencyContainer
{


    /**
     * @return ProductGroupManager
     */
    public function createOrderProductGroupManager()
    {
        return $this->getFactory()->createOrderProductGroupManager(
            $this->getProvidedDependency(ProductGroupCheckoutConnectorDependencyProvider::FACADE_PRODUCT_GROUP),
            $this->getProvidedDependency(ProductGroupCheckoutConnectorDependencyProvider::FACADE_GLOSSARY),
            $this->getProvidedDependency(ProductGroupCheckoutConnectorDependencyProvider::FACADE_LOCALE)
        );

    }
}
