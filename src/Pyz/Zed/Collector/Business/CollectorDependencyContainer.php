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
        $searchProductCollector = $this->getFactory()->createSearchProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_SEARCH),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PROPEL)
        );
        $searchProductCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $searchProductCollector;
    }

    /**
     * @return CategoryNodeCollector
     */
    public function createStorageCategoryNodeCollector()
    {
        $storageCategoryNodeCollector = $this->getFactory()->createStorageCategoryNodeCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
        $storageCategoryNodeCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageCategoryNodeCollector;
    }

    /**
     * @return NavigationCollector
     */
    public function createStorageNavigationCollector()
    {
        $storageNavigationCollector = $this->getFactory()->createStorageNavigationCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PROPEL)
        );
        $storageNavigationCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageNavigationCollector;
    }

    /**
     * @return PageCollector
     */
    public function createStoragePageCollector()
    {
        $storagePageCollector = $this->getFactory()->createStoragePageCollector();

        $storagePageCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storagePageCollector;
    }

    /**
     * @return ProductCollector
     */
    public function createStorageProductCollector()
    {
        $storageProductCollector = $this->getFactory()->createStorageProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_OPTION_EXPORTER),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PROPEL),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_DYNAMIC),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRODUCT_DYNAMIC)
        );
        $storageProductCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageProductCollector;
    }

    /**
     * @return RedirectCollector
     */
    public function createStorageRedirectCollector()
    {
        $storageRedirectCollector = $this->getFactory()->createStorageRedirectCollector();

        $storageRedirectCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageRedirectCollector;
    }

    /**
     * @return TranslationCollector
     */
    public function createStorageTranslationCollector()
    {
        $storageTranslationCollector = $this->getFactory()->createStorageTranslationCollector();

        $storageTranslationCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageTranslationCollector;
    }

    /**
     * @return UrlCollector
     */
    public function createStorageUrlCollector()
    {
        $storageUrlCollector = $this->getFactory()->createStorageUrlCollector();

        $storageUrlCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageUrlCollector;
    }

}
