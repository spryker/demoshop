<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog;

use Spryker\Yves\Kernel\AbstractFactory;

class CatalogFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Collector\Plugin\UrlMapperPlugin
     */
    public function createUrlMapperPlugin()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::PLUGIN_URL_MAPPER);
    }

    /**
     * @return \Silex\Application
     */
    public function createApplication()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_SEARCH);
    }

}
