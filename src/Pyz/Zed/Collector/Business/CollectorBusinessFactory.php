<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business;

use Exception;
use Pyz\Zed\Collector\Business\Search\CategoryNodeCollector as SearchCategoryNodeCollector;
use Pyz\Zed\Collector\Business\Search\CmsPageCollector as SearchCmsPageCollector;
use Pyz\Zed\Collector\Business\Search\ProductCollector as SearchProductCollector;
use Pyz\Zed\Collector\Business\Storage\AttributeMapCollector;
use Pyz\Zed\Collector\Business\Storage\AvailabilityCollector;
use Pyz\Zed\Collector\Business\Storage\BlockCollector;
use Pyz\Zed\Collector\Business\Storage\CategoryNodeCollector as StorageCategoryNodeCollector;
use Pyz\Zed\Collector\Business\Storage\NavigationCollector;
use Pyz\Zed\Collector\Business\Storage\PageCollector;
use Pyz\Zed\Collector\Business\Storage\ProductAbstractCollector as StorageProductCollector;
use Pyz\Zed\Collector\Business\Storage\ProductConcreteCollector;
use Pyz\Zed\Collector\Business\Storage\ProductOptionCollector;
use Pyz\Zed\Collector\Business\Storage\RedirectCollector;
use Pyz\Zed\Collector\Business\Storage\TranslationCollector;
use Pyz\Zed\Collector\Business\Storage\UrlCollector;
use Pyz\Zed\Collector\CollectorDependencyProvider;
use Pyz\Zed\Collector\Persistence\Storage\Propel\AttributeMapCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\AvailabilityCollectorQuery as StorageAvailabilityCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\BlockCollectorQuery as StorageBlockCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\PageCollectorQuery as StoragePageCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\RedirectCollectorQuery as StorageRedirectCollectorPropelQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\TranslationCollectorQuery as StorageTranslationCollectorPropelQuery;
use Spryker\Shared\SqlCriteriaBuilder\CriteriaBuilder\CriteriaBuilderDependencyContainer;
use Spryker\Shared\SqlCriteriaBuilder\CriteriaBuilder\CriteriaBuilderFactory;
use Spryker\Shared\SqlCriteriaBuilder\CriteriaBuilder\CriteriaBuilderFactoryWorker;
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
            $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_PRODUCT_DATA_PAGE_MAP),
            $this->getSearchFacade()
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
        $storageCategoryNodeCollector = new StorageCategoryNodeCollector();

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
     * @return \Pyz\Zed\Collector\Business\Search\CategoryNodeCollector
     */
    public function createSearchCategoryNodeCollector()
    {
        $categoryNodeCollector = new SearchCategoryNodeCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_CATEGORY_NODE_DATA_PAGE_MAP),
            $this->getSearchFacade()
        );

        $categoryNodeCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $categoryNodeCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $categoryNodeCollector->setQueryBuilder(
            $this->createSearchPdoQueryAdapterByName('CategoryNodeCollectorQuery')
        );

        return $categoryNodeCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Search\CmsPageCollector
     */
    public function createSearchCmsPageCollector()
    {
        $cmsPageCollector = new SearchCmsPageCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_CMS_PAGE_DATA_PAGE_MAP),
            $this->getSearchFacade()
        );

        $cmsPageCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $cmsPageCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $cmsPageCollector->setQueryBuilder(
            $this->createSearchPdoQueryAdapterByName('CmsPageCollectorQuery')
        );

        return $cmsPageCollector;
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
     * @return \Pyz\Zed\Collector\Business\Storage\ProductAbstractCollector
     */
    public function createStorageProductAbstractCollector()
    {
        $storageProductCollector = new StorageProductCollector(
            $this->getCategoryQueryContainer(),
            $this->getProductCategoryQueryContainer(),
            $this->getProductImageQueryContainer(),
            $this->getProductFacade(),
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
     * @return \Pyz\Zed\Collector\Business\Storage\ProductConcreteCollector
     */
    public function createStorageProductConcreteCollector()
    {
        $productConcreteCollector = new ProductConcreteCollector(
            $this->getProductFacade(),
            $this->getPriceFacade(),
            $this->getProductImageQueryContainer()
        );

        $productConcreteCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $productConcreteCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $productConcreteCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('ProductConcreteCollectorQuery')
        );

        return $productConcreteCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\AttributeMapCollector
     */
    public function createAttributeMapCollector()
    {
        $attributeMapCollector = new AttributeMapCollector($this->getProductFacade());

        $attributeMapCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );

        $attributeMapCollector->setQueryBuilder(
            new AttributeMapCollectorQuery()
        );

        return $attributeMapCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\ProductOptionCollector
     */
    public function createStorageProductOptionCollector()
    {
        $productOptionCollector = new ProductOptionCollector();

        $productOptionCollector->setChunkSize(2);

        $productOptionCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $productOptionCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $productOptionCollector->setQueryBuilder(
            $this->createStoragePdoQueryAdapterByName('ProductOptionCollectorQuery')
        );

        return $productOptionCollector;
    }

    /**
     * @return \Pyz\Zed\Collector\Business\Storage\AvailabilityCollector
     */
    public function createStorageAvailabilityCollector()
    {
        $storageAvailabilityCollector = new AvailabilityCollector();

        $storageAvailabilityCollector->setTouchQueryContainer(
            $this->getTouchQueryContainer()
        );
        $storageAvailabilityCollector->setQueryBuilder(
            $this->createStorageAvailabilityCollectorPropelQuery()
        );

        return $storageAvailabilityCollector;
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
            throw new Exception('Invalid StoragePdoQueryAdapter name: ' . $name);
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
            throw new Exception('Invalid SearchPdoQueryAdapter name: ' . $name);
        }

        $queryBuilderClassName = $classList[$name];

        return new $queryBuilderClassName();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\ProductOptionCollectorQuery
     */
    public function createProductOptionCollectorPropelQuery()
    {
        return new ProductOptionCollectorQuery();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\BlockCollectorQuery
     */
    public function createStorageBlockCollectorPropelQuery()
    {
        return new StorageBlockCollectorPropelQuery();
    }

    /**
     * @return \Pyz\Zed\Collector\Persistence\Storage\Propel\AvailabilityCollectorQuery
     */
    public function createStorageAvailabilityCollectorPropelQuery()
    {
        return new StorageAvailabilityCollectorPropelQuery();
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
     * @return \Spryker\Shared\SqlCriteriaBuilder\CriteriaBuilder\CriteriaBuilderInterface
     */
    protected function createCriteriaBuilder()
    {
        $factory = new CriteriaBuilderFactory(
            $this->createCriteriaBuilderContainer()
        );

        $factory->registerWorkerCallback('CriteriaBuilderFactoryWorker', function () use ($factory) {
            return $factory->buildWorker(CriteriaBuilderFactoryWorker::class);
        });

        /** @var \Spryker\Shared\SqlCriteriaBuilder\CriteriaBuilder\CriteriaBuilderFactoryWorker $factoryWorker */
        $factoryWorker = $factory->getWorkerByName('CriteriaBuilderFactoryWorker');

        return $factoryWorker->buildCriteriaBuilder();
    }

    /**
     * @return \Spryker\Shared\SqlCriteriaBuilder\CriteriaBuilder\CriteriaBuilderDependencyContainer
     */
    protected function createCriteriaBuilderContainer()
    {
        return new CriteriaBuilderDependencyContainer();
    }

    /**
     * @return \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected function getCategoryQueryContainer()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected function getPriceQueryContainer()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE);
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected function getProductCategoryQueryContainer()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected function getProductImageQueryContainer()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRODUCT_IMAGE);
    }

    /**
     * @return \Spryker\Zed\Search\Business\SearchFacadeInterface
     */
    protected function getSearchFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_SEARCH);
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
     * @return \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return string
     */
    protected function getCurrentDatabaseEngineName()
    {
        return $this->getPropelFacade()->getCurrentDatabaseEngineName();
    }

}
