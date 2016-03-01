<?php

namespace Pyz\Zed\Collector\Business;

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
use Spryker\Zed\Collector\Business\CollectorBusinessFactory as SprykerCollectorBusinessFactory;
use Pyz\Zed\Collector\Persistence\Search\Propel\ProductCollector as SearchProductCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\BlockCollector as StorageBlockCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\PageCollector as StoragePageCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\RedirectCollector as StorageRedirectCollectorPropelQueryAdapter;
use Pyz\Zed\Collector\Persistence\Storage\Propel\TranslationCollector as StorageTranslationCollectorPropelQueryAdapter;

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
            $this->getPriceQueryContainer(),
            $this->getCategoryQueryContainer(),
            $this->getProductSearchFacade()
        );

        $searchProductCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
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
            $this->createStoragePdoQueryAdapterByName('CategoryNodeCollector')
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
            $this->createStoragePdoQueryAdapterByName('NavigationCollector')
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
            $this->createStoragePageCollectorPropelQueryAdapter()
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
            $this->createStoragePdoQueryAdapterByName('ProductCollector')
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
            $this->createStorageRedirectCollectorPropelQueryAdapter()
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
            $this->createStorageTranslationCollectorPropelQueryAdapter()
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
            $this->createStoragePdoQueryAdapterByName('UrlCollector')
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
            $this->createStorageBlockCollectorPropelQueryAdapter()
        );

        return $storageBlockCollector;
    }

    /**
     * @param string $name
     *
     * @throws \Exception
     *
     * @return \Spryker\Zed\Collector\Persistence\Exporter\AbstractCollectorQuery
     */
    public function createStoragePdoQueryAdapterByName($name)
    {
        $classList = $this->getConfig()->getStoragePdoQueryAdapterClassNames();
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
     * @return \Spryker\Zed\Collector\Persistence\Exporter\AbstractCollectorQuery
     */
    public function createSearchPdoQueryAdapterByName($name)
    {
        $classList = $this->getConfig()->getSearchPdoQueryAdapterClassNames();
        if (!array_key_exists($name, $classList)) {
            throw new \Exception('Invalid SearchPdoQueryAdapter name: '.$name);
        }

        $queryBuilderClassName = $classList[$name];
        return new $queryBuilderClassName();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\BlockCollector
     */
    public function createStorageBlockCollectorPropelQueryAdapter()
    {
        return new StorageBlockCollectorPropelQueryAdapter();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\PageCollector
     */
    public function createStoragePageCollectorPropelQueryAdapter()
    {
        return new StoragePageCollectorPropelQueryAdapter();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\RedirectCollector
     */
    public function createStorageRedirectCollectorPropelQueryAdapter()
    {
        return new StorageRedirectCollectorPropelQueryAdapter();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\TranslationCollector
     */
    public function createStorageTranslationCollectorPropelQueryAdapter()
    {
        return new StorageTranslationCollectorPropelQueryAdapter();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Search\Propel\ProductCollector
     */
    public function createSearchProductCollectorPropelQueryAdapter()
    {
        return new SearchProductCollectorPropelQueryAdapter(
            $this->getCategoryQueryContainer()
        );
    }

    /**
     * @return \Everon\Component\CriteriaBuilder\CriteriaBuilderInterface
     */
    protected function createCriteriaBuilder()
    {
        $container = new \Everon\Component\Factory\Dependency\Container();
        $factory = new \Everon\Component\Factory\Factory($container);

        return $factory
            ->getWorkerByName('CriteriaBuilder', 'Everon\Component\CriteriaBuilder')
            ->buildCriteriaBuilder();
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
     * @return \Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected function getProductSearchFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_SEARCH);
    }

    /**
     * @return \Pyz\Zed\Price\Business\PriceFacadeInterface
     */
    protected function getPriceFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE);
    }

}
