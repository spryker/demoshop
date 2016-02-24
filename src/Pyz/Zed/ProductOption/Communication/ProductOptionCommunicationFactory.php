<?php

namespace Pyz\Zed\ProductOption\Communication;

use Pyz\Zed\ProductOption\ProductOptionDependencyProvider;
use Spryker\Zed\ProductOption\Communication\ProductOptionCommunicationFactory as SprykerProductOptionCommunicationFactory;

/**
 * @method \Pyz\Zed\ProductOption\ProductOptionConfig getConfig()
 */
class ProductOptionCommunicationFactory extends SprykerProductOptionCommunicationFactory
{

    /**
     * @return \Pyz\Zed\ProductOption\Business\ProductOptionFacade
     */
    public function getInstallerFacade()
    {
        return $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT_OPTION);
    }

}
