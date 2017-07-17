<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog;

use Pyz\Yves\Catalog\ActiveSearchFilter\UrlGenerator;
use Spryker\Yves\Kernel\AbstractFactory;

class CatalogFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Catalog\ActiveSearchFilter\UrlGeneratorInterface
     */
    public function createActiveSearchFilterUrlGenerator()
    {
        return new UrlGenerator($this->getSearchClient());
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    protected function getSearchClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_SEARCH);
    }

    /**
     * @return \Pyz\Yves\Category\Plugin\CategoryReaderPlugin
     */
    public function getCategoryReaderPlugin()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::PLUGIN_CATEGORY_READER);
    }

}
