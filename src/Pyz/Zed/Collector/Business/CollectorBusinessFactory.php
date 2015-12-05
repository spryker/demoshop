<?php

namespace Pyz\Zed\Collector\Business;

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
use Pyz\Zed\Collector\Business\Storage\NewCategoryNodeCollector;
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

        return $storageCategoryNodeCollector;
    }

    /**
     * @return NewCategoryNodeCollector
     */
    public function createStorageNewCategoryNodeCollector()
    {
        $storageNewCategoryNodeCollector = new \Pyz\Zed\Collector\Business\Storage\NewCategoryNodeCollector();

        $storageNewCategoryNodeCollector->setTouchQueryContainer(
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH)
        );
        $storageNewCategoryNodeCollector->setCriteriaBuilder(
            $this->createCriteriaBuilder()
        );
        $storageNewCategoryNodeCollector->setQueryBuilder(
            $this->createStorageQueryBuilderAdapterByName('NewCategoryNodeCollector')
        );

        return $storageNewCategoryNodeCollector;
    }

    /**
     * @param $name
     *
     * @return NewAbstractPropelCollectorQuery
     */
    public function createStorageQueryBuilderAdapterByName($name)
    {
        $engines = SystemConfig::ZED_DB_SUPPORTED_ENGINES;
        $adapterName = $engines[Config::get(SystemConfig::ZED_DB_ENGINE)];

        $queryBuilderClassName = "\\Pyz\\Zed\\Collector\\Business\\Storage\\QueryBuilder\\${adapterName}\\${name}";

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

        return $storageUrlCollector;
    }

    /**
     * @return BlockCollector
     */
    public function createStorageBlockCollector()
    {
        $collector = new BlockCollector();
        $collector->setTouchQueryContainer($this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_TOUCH));

        return $collector;
    }

    /**
     * @return Collector
     */
    public function createYvesKeyValueExporter()
    {
        return new Collector(
                    $this->createTouchQueryContainer(),
                    $this->createKeyValueExporter()
                );
    }

    /**
     * @return ExporterInterface
     */
    protected function createKeyValueExporter()
    {
        $keyValueExporter = new KeyValueCollector(
                    $this->createTouchQueryContainer(),
                    $this->createKeyValueWriter(),
                    $this->createKeyValueMarker(),
                    $this->createFailedResultModel(),
                    $this->createBatchResultModel(),
                    $this->createExporterWriterKeyValueTouchUpdater()
                );

        foreach ($this->getProvidedDependency(CollectorDependencyProvider::STORAGE_PLUGINS) as $touchItemType => $collectorPlugin) {
            $keyValueExporter->addCollectorPlugin($touchItemType, $collectorPlugin);
        }

        return $keyValueExporter;
    }

    /**
     * @return WriterInterface
     */
    protected function createKeyValueWriter()
    {
        return new RedisWriter(
                    StorageInstanceBuilder::getStorageReadWriteInstance()
                );
    }

    /**
     * @return MarkerInterface
     */
    public function createKeyValueMarker()
    {
        return new ExportMarker(
                    $this->createKeyValueWriter(),
                    $this->createRedisReader(),
                    $this->createKvMarkerKeyBuilder()
                );
    }

    /**
     * @return RedisReader
     */
    protected function createRedisReader()
    {
        return new RedisReader(
                    StorageInstanceBuilder::getStorageReadWriteInstance()
                );
    }

    /**
     * @return KvMarkerKeyBuilder
     */
    protected function createKvMarkerKeyBuilder()
    {
        return new KvMarkerKeyBuilder();
    }

    /**
     * @return FailedResultInterface
     */
    protected function createFailedResultModel()
    {
        return new FailedResult();
    }

    /**
     * @return BatchResultInterface
     */
    protected function createBatchResultModel()
    {
        return new BatchResult();
    }

    /**
     * @return TouchUpdaterInterface
     */
    protected function createExporterWriterSearchTouchUpdater()
    {
        return new TouchUpdater();
    }

    /**
     * @return TouchUpdaterInterface
     */
    protected function createExporterWriterKeyValueTouchUpdater()
    {
        return new KeyValueTouchUpdater();
    }

    /**
     * @return Collector
     */
    public function createYvesSearchExporter()
    {
        $config = $this->getConfig();
        $searchWriter = $this->createSearchWriter();

        return new Collector(
                    $this->createTouchQueryContainer(),
                    $this->createElasticsearchExporter(
                        $searchWriter,
                        $config
                    )
                );
    }

    /**
     * @return Collector
     */
    public function createYvesSearchUpdateExporter()
    {
        return new Collector(
                    $this->createTouchQueryContainer(),
                    $this->createElasticsearchExporter(
                        $this->createSearchUpdateWriter(),
                        $this->getConfig()
                    )
                );
    }

    /**
     * @param WriterInterface $searchWriter
     * @param CollectorConfig $config
     *
     * @return SearchCollector
     */
    protected function createElasticsearchExporter(WriterInterface $searchWriter, CollectorConfig $config)
    {
        $searchExporter = new SearchCollector(
                    $this->createTouchQueryContainer(),
                    $searchWriter,
                    $this->createSearchMarker(),
                    $this->createFailedResultModel(),
                    $this->createBatchResultModel(),
                    $this->createExporterWriterSearchTouchUpdater()
                );

        foreach ($this->getProvidedDependency(CollectorDependencyProvider::SEARCH_PLUGINS) as $touchItemType => $collectorPlugin) {
            $searchExporter->addCollectorPlugin($touchItemType, $collectorPlugin);
        }

        return $searchExporter;
    }

    /**
     * @return ElasticsearchWriter
     */
    protected function createSearchWriter()
    {
        $elasticSearchWriter = new ElasticsearchWriter(
                    StorageInstanceBuilder::getElasticsearchInstance(),
                    $this->getConfig()->getSearchIndexName(),
                    $this->getConfig()->getSearchDocumentType()
                );

        return $elasticSearchWriter;
    }

    /**
     * @return WriterInterface
     */
    protected function createSearchUpdateWriter()
    {
        $settings = $this->getConfig();

        $elasticsearchUpdateWriter = new ElasticsearchUpdateWriter(
                    StorageInstanceBuilder::getElasticsearchInstance(),
                    $settings->getSearchIndexName(),
                    $settings->getSearchDocumentType()
                );

        return $elasticsearchUpdateWriter;
    }

    /**
     * @return MarkerInterface
     */
    public function createSearchMarker()
    {
        return new ExportMarker(
                    $this->createSearchMarkerWriter(),
                    $this->createSearchMarkerReader(),
                    $this->createSearchMarkerKeyBuilder()
                );
    }

    /**
     * @return ElasticsearchMarkerWriter
     */
    protected function createSearchMarkerWriter()
    {
        $elasticSearchWriter = new ElasticsearchMarkerWriter(
                    StorageInstanceBuilder::getElasticsearchInstance(),
                    $this->getConfig()->getSearchIndexName(),
                    $this->getConfig()->getSearchDocumentType()
                );

        return $elasticSearchWriter;
    }

    /**
     * @return ElasticsearchMarkerReader
     */
    protected function createSearchMarkerReader()
    {
        return new ElasticsearchMarkerReader(
                    StorageInstanceBuilder::getElasticsearchInstance(),
                    $this->getConfig()->getSearchIndexName(),
                    $this->getConfig()->getSearchDocumentType()
                );
    }

    /**
     * @return SearchMarkerKeyBuilder
     */
    protected function createSearchMarkerKeyBuilder()
    {
        return new SearchMarkerKeyBuilder();
    }

    /**
     * @param MessengerInterface $messenger
     *
     * @return InstallElasticsearch
     */
    public function createInstaller(MessengerInterface $messenger)
    {
        $installer = new InstallElasticsearch(
                    StorageInstanceBuilder::getElasticsearchInstance(),
                    $this->getConfig()->getSearchIndexName()
                );

        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return \Everon\Component\CriteriaBuilder\BuilderInterface
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
