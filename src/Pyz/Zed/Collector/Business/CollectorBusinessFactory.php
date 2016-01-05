<?php

namespace Pyz\Zed\Collector\Business;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Collector\Business\Exporter\ExporterInterface;
use Spryker\Zed\Collector\Business\Exporter\MarkerInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use Spryker\Zed\Collector\Business\Internal\InstallElasticsearch;
use Spryker\Zed\Collector\Business\Exporter\KeyBuilder\SearchMarkerKeyBuilder;
use Spryker\Zed\Collector\Business\Exporter\Reader\Search\ElasticsearchMarkerReader;
use Spryker\Zed\Collector\Business\Exporter\Writer\Search\ElasticsearchMarkerWriter;
use Spryker\Zed\Collector\Business\Exporter\Writer\Search\ElasticsearchUpdateWriter;
use Spryker\Zed\Collector\Business\Exporter\Writer\Search\ElasticsearchWriter;
use Spryker\Zed\Collector\Business\Exporter\SearchCollector;
use Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdater as KeyValueTouchUpdater;
use Spryker\Zed\Collector\Business\Exporter\Writer\Search\TouchUpdater;
use Spryker\Zed\Collector\Business\Model\BatchResult;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Spryker\Zed\Collector\Business\Model\FailedResult;
use Spryker\Zed\Collector\Business\Exporter\KeyBuilder\KvMarkerKeyBuilder;
use Spryker\Zed\Collector\Business\Exporter\Reader\KeyValue\RedisReader;
use Spryker\Zed\Collector\Business\Exporter\ExportMarker;
use Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\RedisWriter;
use Spryker\Zed\Collector\Business\Exporter\KeyValueCollector;
use Spryker\Zed\Collector\Business\Exporter\Collector;
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
use Spryker\Zed\Collector\Business\Model\FailedResultInterface;
use Spryker\Zed\Collector\CollectorConfig;

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
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRODUCT_SEARCH)
        );
        $searchProductCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
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
        $storageCategoryNodeCollector = new CategoryNodeCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
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
     * @return AbstractPropelCollectorQuery
     */
    public function createStoragePropelQueryAdapterByName($name)
    {
        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Persistence\\Storage\\Propel\\${name}";

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
        $engines = ApplicationConfig::ZED_DB_SUPPORTED_ENGINES;
        $adapterName = $engines[Config::get(ApplicationConfig::ZED_DB_ENGINE)];

        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Persistence\\Search\\Pdo\\${adapterName}\\${name}";

        $queryBuilder = new $queryBuilderClassName();

        return $queryBuilder;
    }

    /**
     * @param $name
     *
     * @return AbstractPropelCollectorQuery
     */
    public function createSearchPropelQueryAdapterByName($name)
    {
        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Persistence\\Search\\Propel\\${name}";

        $queryBuilder = new $queryBuilderClassName();

        return $queryBuilder;
    }

    /**
     * @return NavigationCollector
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
     * @return PageCollector
     */
    public function createStoragePageCollector()
    {
        $storagePageCollector = new PageCollector();

        $storagePageCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );

        $storagePageCollector->setQueryBuilder(
            $this->createStoragePropelQueryAdapterByName('PageCollector')
        );

        return $storagePageCollector;
    }

    /**
     * @return ProductCollector
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
     * @return RedirectCollector
     */
    public function createStorageRedirectCollector()
    {
        $storageRedirectCollector = new RedirectCollector();

        $storageRedirectCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageRedirectCollector->setQueryBuilder(
            $this->createStoragePropelQueryAdapterByName('RedirectCollector')
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
            $this->createStoragePropelQueryAdapterByName('TranslationCollector')
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
            $this->createStoragePropelQueryAdapterByName('BlockCollector')
        );

        return $storageBlockCollector;
    }

    /**
     * @return Collector
     */
    public function createYvesKeyValueExporter()
    {
        return parent::createYvesKeyValueExporter();
    }

    /**
     * @return ExporterInterface
     */
    protected function createKeyValueExporter()
    {
        return parent::createKeyValueExporter();
    }

    /**
     * @return WriterInterface
     */
    protected function createKeyValueWriter()
    {
        return parent::createKeyValueWriter();
    }

    /**
     * @return MarkerInterface
     */
    public function createKeyValueMarker()
    {
        return parent::createKeyValueMarker();
    }

    /**
     * @return RedisReader
     */
    protected function createRedisReader()
    {
        return parent::createRedisReader();
    }

    /**
     * @return KvMarkerKeyBuilder
     */
    protected function createKvMarkerKeyBuilder()
    {
        return parent::createKvMarkerKeyBuilder();
    }

    /**
     * @return FailedResultInterface
     */
    protected function createFailedResultModel()
    {
        return parent::createFailedResultModel();
    }

    /**
     * @return BatchResultInterface
     */
    protected function createBatchResultModel()
    {
        return parent::createBatchResultModel();
    }

    /**
     * @return TouchUpdaterInterface
     */
    protected function createExporterWriterSearchTouchUpdater()
    {
        return parent::createExporterWriterSearchTouchUpdater();
    }

    /**
     * @return TouchUpdaterInterface
     */
    protected function createExporterWriterKeyValueTouchUpdater()
    {
        return parent::createExporterWriterKeyValueTouchUpdater();
    }

    /**
     * @return Collector
     */
    public function getYvesSearchExporter()
    {
        return parent::getYvesSearchExporter();
    }

    /**
     * @return Collector
     */
    public function getYvesSearchUpdateExporter()
    {
        return parent::getYvesSearchUpdateExporter();
    }

    /**
     * @param WriterInterface $searchWriter
     * @param CollectorConfig $config
     *
     * @return SearchExporter
     */
    protected function createElasticSearchExporter(WriterInterface $searchWriter, CollectorConfig $config)
    {
        return parent::createElasticSearchExporter($searchWriter, $config);
    }

    /**
     * @return ElasticSearchWriter
     */
    protected function createSearchWriter()
    {
        return parent::createSearchWriter();
    }

    /**
     * @return WriterInterface
     */
    protected function createSearchUpdateWriter()
    {
        return parent::createSearchUpdateWriter();
    }

    /**
     * @return MarkerInterface
     */
    public function createSearchMarker()
    {
        return parent::createSearchMarker();
    }

    /**
     * @return ElasticSearchMarkerWriter
     */
    protected function createSearchMarkerWriter()
    {
        return parent::createSearchMarkerWriter();
    }

    /**
     * @return ElasticSearchMarkerReader
     */
    protected function createSearchMarkerReader()
    {
        return parent::createSearchMarkerReader();
    }

    /**
     * @return SearchMarkerKeyBuilder
     */
    protected function createSearchMarkerKeyBuilder()
    {
        return parent::createSearchMarkerKeyBuilder();
    }

    /**
     * @param MessengerInterface $messenger
     *
     * @return InstallElasticSearch
     */
    public function createInstaller(MessengerInterface $messenger)
    {
        return parent::createInstaller($messenger);
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
