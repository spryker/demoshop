<?php

namespace Pyz\Zed\Collector\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Collector\Business\Exporter\MarkerInterface;
use Spryker\Zed\Collector\Business\Internal\InstallElasticsearch;
use Spryker\Zed\Collector\Business\Exporter\KeyBuilder\SearchMarkerKeyBuilder;
use Spryker\Zed\Collector\Business\Exporter\Reader\Search\ElasticsearchMarkerReader;
use Spryker\Zed\Collector\Business\Exporter\Writer\Search\ElasticsearchMarkerWriter;
use Spryker\Zed\Collector\Business\Exporter\Writer\Search\ElasticsearchUpdateWriter;
use Spryker\Zed\Collector\Business\Exporter\Writer\Search\ElasticsearchWriter;
use Spryker\Zed\Collector\Business\Exporter\ExportMarker;
use Pyz\Zed\Collector\Business\Search\ProductCollector as SearchProductCollector;
use Pyz\Zed\Collector\Business\Storage\BlockCollector;
use Pyz\Zed\Collector\Business\Storage\CategoryNodeCollector;
use Pyz\Zed\Collector\Business\Storage\NavigationCollector;
use Pyz\Zed\Collector\Business\Storage\PageCollector;
use Pyz\Zed\Collector\Business\Storage\ProductCollector;
use Pyz\Zed\Collector\Business\Storage\RedirectCollector;
use Pyz\Zed\Collector\Business\Storage\TranslationCollector;
use Pyz\Zed\Collector\Business\Storage\UrlCollector;
use Pyz\Zed\Collector\CollectorDependencyProvider;
use Spryker\Shared\Library\Storage\StorageInstanceBuilder;
use Spryker\Zed\Collector\Business\CollectorBusinessFactory as SprykerCollectorBusinessFactory;
use Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use Spryker\Zed\Collector\CollectorConfig;

/**
 * @method \Spryker\Zed\Collector\CollectorConfig getConfig()
 */
class CollectorBusinessFactory extends SprykerCollectorBusinessFactory
{

    /**
     * @return \Pyz\Zed\Collector\Business\Search\ProductCollector
     */
    public function createSearchProductCollector()
    {
        $searchProductCollector = new SearchProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_SEARCH)
        );
        $searchProductCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $searchProductCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\CategoryNodeCollector
     */
    public function createStorageCategoryNodeCollector()
    {
        $storageCategoryNodeCollector = new CategoryNodeCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
        $storageCategoryNodeCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageCategoryNodeCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\NavigationCollector
     */
    public function createStorageNavigationCollector()
    {
        $storageNavigationCollector = new NavigationCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
        $storageNavigationCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageNavigationCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\PageCollector
     */
    public function createStoragePageCollector()
    {
        $storagePageCollector = new PageCollector();

        $storagePageCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storagePageCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\ProductCollector
     */
    public function createStorageProductCollector()
    {
        $storageProductCollector = new ProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_OPTION_EXPORTER)
        );
        $storageProductCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageProductCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\RedirectCollector
     */
    public function createStorageRedirectCollector()
    {
        $storageRedirectCollector = new RedirectCollector();

        $storageRedirectCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageRedirectCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\TranslationCollector
     */
    public function createStorageTranslationCollector()
    {
        $storageTranslationCollector = new TranslationCollector();

        $storageTranslationCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageTranslationCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\UrlCollector
     */
    public function createStorageUrlCollector()
    {
        $storageUrlCollector = new UrlCollector();

        $storageUrlCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        return $storageUrlCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\BlockCollector
     */
    public function createStorageBlockCollector()
    {
        $collector = new BlockCollector();
        $collector->setTouchQueryContainer($this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH));

        return $collector;
    }

}
