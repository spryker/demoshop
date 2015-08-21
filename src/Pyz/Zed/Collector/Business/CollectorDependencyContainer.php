<?php

namespace Pyz\Zed\Collector\Business;

use Pyz\Zed\Collector\Business\Search\ProductCollector as SearchProductCollector;
use Pyz\Zed\Collector\Business\Storage\CategoryNodeCollector;
use Pyz\Zed\Collector\Business\Storage\NavigationCollector;
use Pyz\Zed\Collector\Business\Storage\PageCollector;
use Pyz\Zed\Collector\Business\Storage\ProductCollector;
use Pyz\Zed\Collector\Business\Storage\RedirectCollector;
use Pyz\Zed\Collector\Business\Storage\TranslationCollector;
use Pyz\Zed\Collector\Business\Storage\UrlCollector;
use Pyz\Zed\Collector\CollectorDependencyProvider;
use SprykerFeature\Zed\Collector\Business\CollectorDependencyContainer as SprykerCollectorDependencyContainer;

class CollectorDependencyContainer extends SprykerCollectorDependencyContainer
{

    /**
     * @return SearchProductCollector
     */
    public function createSearchProductCollector()
    {
        return $this->getFactory()->createSearchProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_SEARCH)
        );
    }

    /**
     * @return CategoryNodeCollector
     */
    public function createStorageCategoryNodeCollector()
    {
        return $this->getFactory()->createStorageCategoryNodeCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
    }

    /**
     * @return NavigationCollector
     */
    public function createStorageNavigationCollector()
    {
        return $this->getFactory()->createStorageNavigationCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
    }

    /**
     * @return PageCollector
     */
    public function createStoragePageCollector()
    {
        return $this->getFactory()->createStoragePageCollector();
    }

    /**
     * @return ProductCollector
     */
    public function createStorageProductCollector()
    {
        return $this->getFactory()->createStorageProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_OPTION_EXPORTER)
        );
    }

    /**
     * @return RedirectCollector
     */
    public function createStorageRedirectCollector()
    {
        return $this->getFactory()->createStorageRedirectCollector();
    }

    /**
     * @return TranslationCollector
     */
    public function createStorageTranslationCollector()
    {
        return $this->getFactory()->createStorageTranslationCollector();
    }

    /**
     * @return UrlCollector
     */
    public function createStorageUrlCollector()
    {
        return $this->getFactory()->createStorageUrlCollector();
    }

}
