<?php

namespace Pyz\Zed\ProductOption\Communication;

use Spryker\Zed\ProductOption\Communication\ProductOptionCommunicationFactory as SprykerProductOptionCommunicationFactory;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use Pyz\Zed\ProductOption\ProductOptionDependencyProvider;
use Pyz\Zed\ProductOption\ProductOptionConfig;

/**
 * @method ProductOptionConfig getConfig()
 */
class ProductOptionCommunicationFactory extends SprykerProductOptionCommunicationFactory
{

    /**
     * @return ProductOptionFacade
     */
    public function getInstallerFacade()
    {
        return $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT_OPTION);
    }

}
