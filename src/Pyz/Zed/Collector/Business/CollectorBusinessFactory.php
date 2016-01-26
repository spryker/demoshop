<?php

namespace Pyz\Zed\Collector\Business;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Zed\Collector\Persistence\Exporter\AbstractPdoCollectorQuery;
use Spryker\Shared\Config;
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
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\Collector\Business\CollectorBusinessFactory as SprykerCollectorBusinessFactory;
use Pyz\Zed\Collector\Persistence\Search\Propel\ProductCollector as SearchProductCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\BlockCollector as StorageBlockCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\PageCollector as StoragePageCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\RedirectCollector as StorageRedirectCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\TranslationCollector as StorageTranslationCollectorPropelQueryAdapter;

/**
 * @method CollectorConfig getConfig()
 */
class CollectorBusinessFactory extends SprykerCollectorBusinessFactory
{

    /**
     * @return SearchProductCollector
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
        $searchProductCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $searchProductCollector->setQueryBuilder(
            $this->createSearchPdoQueryAdapterByName('ProductCollector')
        );

        return $searchProductCollector;
    }

    /**
     * @return CategoryNodeCollector
     */
    public function createStorageCategoryNodeCollector()
    {
        $storageCategoryNodeCollector = new CategoryNodeCollector();

        $storageCategoryNodeCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageCategoryNodeCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageCategoryNodeCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('CategoryNodeCollector')
        );

        return $storageCategoryNodeCollector;
    }

    /**
     * @return NavigationCollector
     */
    public function createStorageNavigationCollector()
    {
        $storageNavigationCollector = new NavigationCollector();

        $storageNavigationCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageNavigationCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageNavigationCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('NavigationCollector')
        );

        return $storageNavigationCollector;
    }

    /**
     * @return PageCollector
     */
    public function createStoragePageCollector()
    {
        $storagePageCollector = new PageCollector();

        $storagePageCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storagePageCollector->setQueryBuilder(
            $this->createStoragePageCollectorPropelQueryAdapter()
        );

        return $storagePageCollector;
    }

    /**
     * @return ProductCollector
     */
    public function createStorageProductCollector()
    {
        $storageProductCollector = new ProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE)
        );

        $storageProductCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageProductCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageProductCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('ProductCollector')
        );

        return $storageProductCollector;
    }

    /**
     * @return RedirectCollector
     */
    public function createStorageRedirectCollector()
    {
        $storageRedirectCollector = new RedirectCollector();

        $storageRedirectCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageRedirectCollector->setQueryBuilder(
            $this->createStorageRedirectCollectorPropelQueryAdapter()
        );

        return $storageRedirectCollector;
    }

    /**
     * @return TranslationCollector
     */
    public function createStorageTranslationCollector()
    {
        $storageTranslationCollector = new TranslationCollector();

        $storageTranslationCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageTranslationCollector->setQueryBuilder(
            $this->createStorageTranslationCollectorPropelQueryAdapter()
        );

        return $storageTranslationCollector;
    }

    /**
     * @return UrlCollector
     */
    public function createStorageUrlCollector()
    {
        $storageUrlCollector = new UrlCollector();

        $storageUrlCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageUrlCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageUrlCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('UrlCollector')
        );

        return $storageUrlCollector;
    }

    /**
     * @return BlockCollector
     */
    public function createStorageBlockCollector()
    {
        $storageBlockCollector = new BlockCollector();

        $storageBlockCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageBlockCollector->setQueryBuilder(
            $this->createStorageBlockCollectorPropelQueryAdapter()
        );

        return $storageBlockCollector;
    }

    /**
     * @param $name
     *
     * @return AbstractPdoCollectorQuery
     */
    public function createStoragePdoQueryAdapterByName($name)
    {
        $engines = ApplicationConstants::ZED_DB_SUPPORTED_ENGINES;
        $adapterName = $engines[Config::get(ApplicationConstants::ZED_DB_ENGINE)];

        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Persistence\\Storage\\Pdo\\${adapterName}\\${name}";

        $queryBuilder = new $queryBuilderClassName();

        return $queryBuilder;
    }

    /**
     * @param $name
     *
     * @return AbstractPdoCollectorQuery
     */
    public function createSearchPdoQueryAdapterByName($name)
    {
        $engines = ApplicationConstants::ZED_DB_SUPPORTED_ENGINES;
        $adapterName = $engines[Config::get(ApplicationConstants::ZED_DB_ENGINE)];

        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Persistence\\Search\\Pdo\\${adapterName}\\${name}";

        $queryBuilder = new $queryBuilderClassName();

        return $queryBuilder;
    }

    /**
     * @return StorageBlockCollectorPropelQueryAdapter
     */
    public function createStorageBlockCollectorPropelQueryAdapter()
    {
        return new StorageBlockCollectorPropelQueryAdapter();
    }

    /**
     * @return StoragePageCollectorPropelQueryAdapter
     */
    public function createStoragePageCollectorPropelQueryAdapter()
    {
        return new StoragePageCollectorPropelQueryAdapter();
    }

    /**
     * @return StorageRedirectCollectorPropelQueryAdapter
     */
    public function createStorageRedirectCollectorPropelQueryAdapter()
    {
        return new StorageRedirectCollectorPropelQueryAdapter();
    }

    /**
     * @return StorageTranslationCollectorPropelQueryAdapter
     */
    public function createStorageTranslationCollectorPropelQueryAdapter()
    {
        return new StorageTranslationCollectorPropelQueryAdapter();
    }

    /**
     * @return SearchProductCollectorPropelQueryAdapter
     */
    public function createSearchProductCollectorPropelQueryAdapter()
    {
        return new SearchProductCollectorPropelQueryAdapter(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
    }

    /**
     * @return \Everon\Component\CriteriaBuilder\CriteriaBuilderInterface
     */
    protected function createCriteriaBuilder()
    {
        $Container = new \Everon\Component\Factory\Dependency\Container();
        $Factory = new \Everon\Component\Factory\Factory($Container);

        return $Factory
            ->getWorkerByName('CriteriaBuilder', 'Everon\Component\CriteriaBuilder')
            ->buildCriteriaBuilder();
    }

}
