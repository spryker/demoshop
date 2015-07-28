<?php

namespace Pyz\Zed\Collector\Business;

use Pyz\Zed\Collector\Business\Storage\ProductCollector;
use Pyz\Zed\Collector\CollectorDependencyProvider;
use SprykerFeature\Zed\Collector\Business\CollectorDependencyContainer as SprykerCollectorDependencyContainer;

class CollectorDependencyContainer extends SprykerCollectorDependencyContainer
{

    /**
     * @return CategoryNodeCollector
     */
    public function createStorageCategoryNodeCollector()
    {
        return $this->getFactory()->createStorageCategoryNodeCollector();
    }

    /**
     * @return NavigationCollector
     */
    public function createStorageNavigationCollector()
    {
        return $this->getFactory()->createStorageNavigationCollector();
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
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_CATEGORY_EXPORTER),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
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