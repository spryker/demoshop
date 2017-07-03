<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog;

use Pyz\Yves\Catalog\ActiveSearchFilter\UrlGenerator;
use Spryker\Client\Category\CategoryClientInterface;
use Spryker\Client\Locale\LocaleClientInterface;
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
     * @return CategoryClientInterface
     */
    public function createCategoryClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_CATEGORY);
    }

    /**
     * @return LocaleClientInterface
     */
    public function createLocaleClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_LOCALE);
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    protected function getSearchClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_SEARCH);
    }

}
