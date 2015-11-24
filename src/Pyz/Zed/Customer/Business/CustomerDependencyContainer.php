<?php

namespace Pyz\Zed\Customer\Business;

use Pyz\Zed\Customer\CustomerDependencyProvider;
use SprykerFeature\Zed\Customer\Business\CustomerDependencyContainer as SpyCustomerDependencyContainer;
use Generated\Zed\Ide\FactoryAutoCompletion\CustomerBusiness;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Pyz\Zed\Customer\Business\Model\MagentoPasswordManagerInterface;
use Pyz\Zed\Customer\Business\Customer\CustomerInterface;
use Pyz\Zed\Customer\Business\MagentoDataImporter\CsvReaderInterface;
use Pyz\Zed\Customer\Dependency\Facade\CustomerToCountryInterface;

/**
 * @method CustomerBusiness getFactory()
 * @method CustomerQueryContainerInterface getQueryContainer()
 */
class CustomerDependencyContainer extends SpyCustomerDependencyContainer
{
    /**
     * @return MagentoPasswordManagerInterface
     */
    public function createMagentoPasswordManager()
    {
        return $this->getFactory()->createModelMagentoPasswordManager(
            $this->createCustomerModel(),
            $this->getQueryContainer()
        );
    }

    /**
     * @return CsvReaderInterface
     */
    public function createCsvReader()
    {
        return $this->getFactory()->createMagentoDataImporterCsvReader(
            $this->createCustomerReferenceGenerator(),
            $this->getQueryContainer(),
            $this->getCountryFacade()
        );
    }

    /**
     * @return CustomerToCountryInterface
     * @throws \ErrorException
     */
    protected function getCountryFacade()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::FACADE_COUNTRY);
    }

    /**
     * @return CustomerInterface
     */
    public function createCustomerModel()
    {
        return parent::createCustomer();
    }
}
