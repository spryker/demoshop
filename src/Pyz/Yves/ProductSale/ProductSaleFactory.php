<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSale;

use Spryker\Yves\Kernel\AbstractFactory;

class ProductSaleFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    protected function getSearchClient()
    {
        return $this->getProvidedDependency(ProductSaleDependencyProvider::CLIENT_SEARCH);
    }

    /**
     * @return \Pyz\Yves\Category\Plugin\CategoryReaderPlugin
     */
    public function getCategoryReaderPlugin()
    {
        return $this->getProvidedDependency(ProductSaleDependencyProvider::PLUGIN_CATEGORY_READER);
    }

}
