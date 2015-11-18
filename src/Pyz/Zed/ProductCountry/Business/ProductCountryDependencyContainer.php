<?php

namespace Pyz\Zed\ProductCountry\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductCountryBusiness;
use Pyz\Zed\ProductCountry\Business\Model\ProductCountryManagerInterface;
use Pyz\Zed\ProductCountry\ProductCountryDependencyProvider;
use Pyz\Zed\Queue\Business\QueueFacade;
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
            $this->createCountryFacade()
        );
    }

    /**
     * @throws \ErrorException
     *
     * @return QueueFacade
     */
    public function createCountryFacade()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::COUNTRY_FACADE);
    }

    /**
     * @throws \ErrorException
     *
     * @return ProductCountryFacade
     */
    public function createProductFacade()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::PRODUCT_FACADE);
    }

}
