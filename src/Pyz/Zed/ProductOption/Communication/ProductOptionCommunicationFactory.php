<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
    public function getProductOptionFacade()
    {
        return $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT_OPTION);
    }

}
