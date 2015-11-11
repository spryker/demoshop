<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\PetsDeliImporterWriterBusiness;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use Pyz\Zed\PetsDeliImporterWriter\PetsDeliImporterWriterDependencyProvider;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;

/**
 * @method PetsDeliImporterWriterBusiness getFactory()
 */
class PetsDeliImporterWriterDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @return ProductWriterProviderInterface
     */
    public function getProductWriterProvider() {

        return $this->getFactory()->createWriterProviderPetsDeliWriterProvider(
            $this->getAbstractProductWriter(),
            $this->getConcreteProductWriter(),
            $this->getAbstractProductDynamicWriter()

        );
    }

    /**
     * @return Writer\AbstractProductWriter
     * @throws \ErrorException
     */
    protected function getAbstractProductWriter() {
        return $this->getFactory()->createWriterAbstractProductWriter(
                $this->getProvidedDependency(PetsDeliImporterWriterDependencyProvider::PRODUCT_FACADE),
                $this->getProvidedDependency(PetsDeliImporterWriterDependencyProvider::LOCALE_FACADE),
                $this->getProvidedDependency(PetsDeliImporterWriterDependencyProvider::TAX_FACADE),
                $this->getProvidedDependency(PetsDeliImporterWriterDependencyProvider::PRODUCT_CATEGORY_FACADE)
            );
    }

    /**
     * @return Writer\AbstractProductWriter
     * @throws \ErrorException
     */
    protected function getConcreteProductWriter() {
        return $this->getFactory()->createWriterConcreteProductWriter(
                $this->getProvidedDependency(PetsDeliImporterWriterDependencyProvider::PRODUCT_FACADE),
                $this->getProvidedDependency(PetsDeliImporterWriterDependencyProvider::LOCALE_FACADE),
                $this->getProvidedDependency(PetsDeliImporterWriterDependencyProvider::PRICE_FACADE)

            );
    }

    protected function getAbstractProductDynamicWriter() {
        return $this->getFactory()->createWriterAbstractProductDynamicWriter(

        );
    }
}