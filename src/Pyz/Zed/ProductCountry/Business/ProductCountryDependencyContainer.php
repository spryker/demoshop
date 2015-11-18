<?php

namespace Pyz\Zed\ProductCountry\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductCountryBusiness;
use Propel\Runtime\Connection\ConnectionInterface;
use Pyz\Zed\ProductCountry\Business\Model\ProductCountryManagerInterface;
use Pyz\Zed\ProductCountry\Dependency\ProductCountryToCountryInterface;
use Pyz\Zed\ProductCountry\Dependency\ProductCountryToProductInterface;
use Pyz\Zed\ProductCountry\ProductCountryDependencyProvider;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;

/**
 * @method ProductCountryBusiness getFactory()
 */
class ProductCountryDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @return ProductCountryManagerInterface
     */
    public function createProductCountryManager()
    {
        return $this->getFactory()->createModelProductCountryManager(
            $this->createProductFacade(),
            $this->createCountryFacade(),
            $this->createPropelConnection()
        );
    }

    /**
     * @throws \ErrorException
     *
     * @return ProductCountryToCountryInterface
     */
    public function createCountryFacade()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::COUNTRY_FACADE);
    }

    /**
     * @throws \ErrorException
     *
     * @return ProductCountryToProductInterface
     */
    public function createProductFacade()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::PRODUCT_FACADE);
    }

    /**
     * @throws \ErrorException
     *
     * @return ConnectionInterface
     */
    public function createPropelConnection()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::PLUGIN_PROPEL_CONNECTION);
    }

}
