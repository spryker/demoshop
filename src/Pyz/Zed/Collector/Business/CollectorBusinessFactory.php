<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business;

use Everon\Component\CriteriaBuilder\CriteriaBuilderFactoryWorker;
use Everon\Component\Factory\Dependency\Container as CriteriaBuilderDependencyContainer;
use Everon\Component\Factory\Factory as CriteriaBuilderFactory;
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
use Pyz\Zed\Collector\Persistence\Search\Propel\ProductCollectorQuery as SearchProductCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\BlockCollectorQuery as StorageBlockCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\PageCollectorQuery as StoragePageCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\RedirectCollectorQuery as StorageRedirectCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\TranslationCollectorQuery as StorageTranslationCollectorPropelQuery;
use Spryker\Zed\Collector\Business\CollectorBusinessFactory as SprykerCollectorBusinessFactory;

/**
 * @method \Pyz\Zed\Collector\CollectorConfig getConfig()
 */
class CollectorBusinessFactory extends SprykerCollectorBusinessFactory
{

    /**
     * @return \Pyz\Zed\Collector\Business\Search\ProductCollector
     */
    public function createSearchProductCollector()
    {
        $searchProductCollector = new SearchProductCollector(
            $this->getProductSearchFacade(),
            $this->getPriceFacade()
        );

        $searchProductCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $searchProductCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $searchProductCollector->setQueryBuilder(
            $this->createSearchPdoQueryAdapterByName('ProductCollectorQuery')
        );

        return $searchProductCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\CategoryNodeCollector
     */
    public function createStorageCategoryNodeCollector()
    {
        $storageCategoryNodeCollector = new CategoryNodeCollector();

        $storageCategoryNodeCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $storageCategoryNodeCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageCategoryNodeCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('CategoryNodeCollectorQuery')
        );

        return $storageCategoryNodeCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\NavigationCollector
     */
    public function createStorageNavigationCollector()
    {
        $storageNavigationCollector = new NavigationCollector();

        $storageNavigationCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $storageNavigationCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageNavigationCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('NavigationCollectorQuery')
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
            $this->getTouchQueryContainer()
        );
        $storagePageCollector->setQueryBuilder(
            $this->createStoragePageCollectorPropelQuery()
        );

        return $storagePageCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\ProductCollector
     */
    public function createStorageProductCollector()
    {
        $storageProductCollector = new ProductCollector(
            $this->getCategoryQueryContainer(),
            $this->getProductCategoryQueryContainer(),
            $this->getPriceFacade()
        );

        $storageProductCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $storageProductCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageProductCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('ProductCollectorQuery')
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
            $this->getTouchQueryContainer()
        );
        $storageRedirectCollector->setQueryBuilder(
            $this->createStorageRedirectCollectorPropelQuery()
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
            $this->getTouchQueryContainer()
        );
        $storageTranslationCollector->setQueryBuilder(
            $this->createStorageTranslationCollectorPropelQuery()
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
            $this->getTouchQueryContainer()
        );
        $storageUrlCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageUrlCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('UrlCollectorQuery')
        );

        return $storageUrlCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\BlockCollector
     */
    public function createStorageBlockCollector()
    {
        $storageBlockCollector = new BlockCollector();

        $storageBlockCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $storageBlockCollector->setQueryBuilder(
            $this->createStorageBlockCollectorPropelQuery()
        );

        return $storageBlockCollector;
    }

    /**
     * @param string $name
     *
     * @throws \Exception
     *
     * @return \Spryker\Zed\Collector\Persistence\Collector\AbstractCollectorQuery
     */
    public function createStoragePdoQueryAdapterByName($name)
    {
        $classList = $this->getConfig()->getStoragePdoQueryAdapterClassNames(
            $this->getCurrentDatabaseEngineName()
        );
        if (!array_key_exists($name, $classList)) {
            throw new \Exception('Invalid StoragePdoQueryAdapter name: '.$name);
        }

        $queryBuilderClassName = $classList[$name];
        return new $queryBuilderClassName();
    }

    /**
     * @param string $name
     *
     * @throws \Exception
     *
     * @return \Spryker\Zed\Collector\Persistence\Collector\AbstractCollectorQuery
     */
    public function createSearchPdoQueryAdapterByName($name)
    {
        $classList = $this->getConfig()->getSearchPdoQueryAdapterClassNames(
            $this->getCurrentDatabaseEngineName()
        );
        if (!array_key_exists($name, $classList)) {
            throw new \Exception('Invalid SearchPdoQueryAdapter name: '.$name);
        }

        $queryBuilderClassName = $classList[$name];
        return new $queryBuilderClassName();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\BlockCollectorQuery
     */
    public function createStorageBlockCollectorPropelQuery()
    {
        return new StorageBlockCollectorPropelQuery();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\PageCollectorQuery
     */
    public function createStoragePageCollectorPropelQuery()
    {
        return new StoragePageCollectorPropelQuery();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\RedirectCollectorQuery
     */
    public function createStorageRedirectCollectorPropelQuery()
    {
        return new StorageRedirectCollectorPropelQuery();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\TranslationCollectorQuery
     */
    public function createStorageTranslationCollectorPropelQuery()
    {
        return new StorageTranslationCollectorPropelQuery();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Search\Propel\ProductCollectorQuery
     */
    public function createSearchProductCollectorPropelQuery()
    {
        return new SearchProductCollectorPropelQuery(
            $this->getCategoryQueryContainer()
        );
    }

    /**
     * @return \Everon\Component\CriteriaBuilder\CriteriaBuilderInterface
     */
    protected function createCriteriaBuilder()
    {
        $factory = new CriteriaBuilderFactory(
            $this->createCriteriaBuilderContainer()
        );

        $factory->registerWorkerCallback('CriteriaBuilderFactoryWorker', function () use ($factory) {
            return $factory->buildWorker(CriteriaBuilderFactoryWorker::class);
        });

        /* @var \Everon\Component\CriteriaBuilder\CriteriaBuilderFactoryWorkerInterface $factoryWorker */
        $factoryWorker = $factory->getWorkerByName('CriteriaBuilderFactoryWorker');

        return $factoryWorker->buildCriteriaBuilder();
    }

    /**
     * @return \Everon\Component\Factory\Dependency\Container
     */
    protected function createCriteriaBuilderContainer()
    {
        return new CriteriaBuilderDependencyContainer();
    }

    /**
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected function getCategoryQueryContainer()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY);
    }

    /**
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected function getPriceQueryContainer()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE);
    }

    /**
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected function getProductCategoryQueryContainer()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected function getProductSearchFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_SEARCH);
    }

    /**
     * @return \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected function getPriceFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE);
    }

    /**
     * @return \Spryker\Zed\Propel\Business\PropelFacadeInterface
     */
    protected function getPropelFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PROPEL);
    }

    /**
     * @return string
     */
    protected function getCurrentDatabaseEngineName()
    {
        return $this->getPropelFacade()->getCurrentDatabaseEngineName();
    }

}
