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
        $productCountryFormType = $this->getFactory()
            ->createFormProductCountryFormType(
                $this->getProvidedDependency(ProductCountryDependencyProvider::COUNTRY_FACADE),
                $this->getProvidedDependency(ProductCountryDependencyProvider::PRODUCT_FACADE)
            )
        ;

        $productCountryForm = $this->getFactory()
            ->createFormProductCountryForm(
                $productCountryFormType,
                $this->getProvidedDependency(ProductCountryDependencyProvider::PRODUCT_FACADE),
                $this->getQueryContainer()
            )
        ;

        return $productCountryForm->create();
    }

}
