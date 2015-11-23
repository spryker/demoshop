<?php

namespace Pyz\Zed\ProductCountry\Communication;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductCountryCommunication;
use Pyz\Zed\ProductCountry\Communication\Form\SampleForm;
use Pyz\Zed\ProductCountry\Communication\Table\ProductCountryTable;
use Pyz\Zed\ProductCountry\Persistence\ProductCountryQueryContainer;
use Pyz\Zed\ProductCountry\ProductCountryDependencyProvider;
use SprykerEngine\Zed\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Symfony\Component\Form\FormInterface;

/**
 * @method ProductCountryCommunication getFactory
 */
class ProductCountryDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return SampleForm
     */
    public function createCategoryFormAdd()
    {
        return $this->getFactory()->createFormSampleForm();
    }

    /**
     * @return ProductCountryTable
     */
    public function createProductCountryTable()
    {
        return $this->getFactory()->createTableProductCountryTable(
            $this->createProductCountryQueryContainer()
        );
    }

    /**
     * @return ProductCountryQueryContainer
     */
    public function createProductCountryQueryContainer()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::PRODUCT_COUNTRY_QUERY_CONTAINER);
    }

    /**
     * @return FormInterface
     */
    public function createProductCountryForm()
    {
        // @todo use getFactory to create ProductCountryFormType and pass CountryFacade and ProductFacade as parameteres
        $productCountryFormType = null;

        // @todo use getFactory to create ProductCountryForm
        // @todo and pass ProductCountryFormType, productFacade and ProductCountryQueryContainer as parameteres
        $productCountryForm = null;

        return $productCountryForm->create();
    }

}
