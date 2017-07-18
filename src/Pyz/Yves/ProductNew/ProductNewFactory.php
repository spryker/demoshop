<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductNew;

use Spryker\Yves\Kernel\AbstractFactory;

class ProductNewFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    protected function getSearchClient()
    {
        return $this->getProvidedDependency(ProductNewDependencyProvider::CLIENT_SEARCH);
    }

    /**
     * @return \Pyz\Yves\Category\Plugin\CategoryReaderPlugin
     */
    public function getCategoryReaderPlugin()
    {
        return $this->getProvidedDependency(ProductNewDependencyProvider::PLUGIN_CATEGORY_READER);
    }

}
