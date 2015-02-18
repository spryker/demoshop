<?php 

namespace Generated\Zed\YvesExport\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class YvesExportFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\Exception\BatchResultException
     */
    public function createExporterExceptionBatchResultException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\Exception\BatchResultException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\Exception\ProcessException
     */
    public function createExporterExceptionProcessException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\Exception\ProcessException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $message (optional) default: null
     * @param $code (optional) default: null
     * @param $previous (optional) default: null
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\Exception\WriteException
     */
    public function createExporterExceptionWriteException($message = null, $code = null, $previous = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\Exception\WriteException');
        $model = new $class($message, $code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\KeyBuilder\KvMarkerKeyBuilder
     */
    public function createExporterKeyBuilderKvMarkerKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\KeyBuilder\KvMarkerKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\KeyBuilder\SearchMarkerKeyBuilder
     */
    public function createExporterKeyBuilderSearchMarkerKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\KeyBuilder\SearchMarkerKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\YvesExport\Persistence\YvesExportQueryContainer $queryContainer
     * @param \ProjectA\Zed\YvesExport\Business\Exporter\Writer\WriterInterface $writer
     * @param \ProjectA\Zed\YvesExport\Business\Exporter\MarkerInterface $marker
     * @param \ProjectA\Zed\YvesExport\Business\Model\FailedResultInterface $failedResultPrototype
     * @param \ProjectA\Zed\YvesExport\Business\Model\BatchResultInterface $batchResultPrototype
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\KeyValueExporter
     */
    public function createExporterKeyValueExporter(\ProjectA\Zed\YvesExport\Persistence\YvesExportQueryContainer $queryContainer, \ProjectA\Zed\YvesExport\Business\Exporter\Writer\WriterInterface $writer, \ProjectA\Zed\YvesExport\Business\Exporter\MarkerInterface $marker, \ProjectA\Zed\YvesExport\Business\Model\FailedResultInterface $failedResultPrototype, \ProjectA\Zed\YvesExport\Business\Model\BatchResultInterface $batchResultPrototype)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\KeyValueExporter');
        $model = new $class($queryContainer, $writer, $marker, $failedResultPrototype, $batchResultPrototype);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\YvesExport\Business\Exporter\Writer\WriterInterface $writer
     * @param \ProjectA\Zed\YvesExport\Business\Exporter\Reader\ReaderInterface $reader
     * @param \ProjectA\Shared\YvesExport\Code\KeyBuilder\KeyBuilderInterface $keyBuilder
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\KeyValueMarker
     */
    public function createExporterKeyValueMarker(\ProjectA\Zed\YvesExport\Business\Exporter\Writer\WriterInterface $writer, \ProjectA\Zed\YvesExport\Business\Exporter\Reader\ReaderInterface $reader, \ProjectA\Shared\YvesExport\Code\KeyBuilder\KeyBuilderInterface $keyBuilder)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\KeyValueMarker');
        $model = new $class($writer, $reader, $keyBuilder);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $redis
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\Reader\KeyValue\RedisReader
     */
    public function createExporterReaderKeyValueRedisReader(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $redis)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\Reader\KeyValue\RedisReader');
        $model = new $class($redis);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\YvesExport\Persistence\YvesExportQueryContainer $queryContainer
     * @param \ProjectA\Zed\YvesExport\Business\Exporter\Writer\WriterInterface $writer
     * @param \ProjectA\Zed\YvesExport\Business\Exporter\MarkerInterface $marker
     * @param \ProjectA\Zed\YvesExport\Business\Model\FailedResultInterface $failedResultPrototype
     * @param \ProjectA\Zed\YvesExport\Business\Model\BatchResultInterface $batchResultPrototype
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\SearchExporter
     */
    public function createExporterSearchExporter(\ProjectA\Zed\YvesExport\Persistence\YvesExportQueryContainer $queryContainer, \ProjectA\Zed\YvesExport\Business\Exporter\Writer\WriterInterface $writer, \ProjectA\Zed\YvesExport\Business\Exporter\MarkerInterface $marker, \ProjectA\Zed\YvesExport\Business\Model\FailedResultInterface $failedResultPrototype, \ProjectA\Zed\YvesExport\Business\Model\BatchResultInterface $batchResultPrototype)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\SearchExporter');
        $model = new $class($queryContainer, $writer, $marker, $failedResultPrototype, $batchResultPrototype);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadWriteInterface $kvAdapter
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\Writer\KeyValue\RedisWriter
     */
    public function createExporterWriterKeyValueRedisWriter(\ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadWriteInterface $kvAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\Writer\KeyValue\RedisWriter');
        $model = new $class($kvAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Elastica\Client $searchClient
     * @param $indexName
     * @param $type
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\Writer\Search\ElasticsearchUpdateWriter
     */
    public function createExporterWriterSearchElasticsearchUpdateWriter(\Elastica\Client $searchClient, $indexName, $type)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\Writer\Search\ElasticsearchUpdateWriter');
        $model = new $class($searchClient, $indexName, $type);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Elastica\Client $searchClient
     * @param $indexName
     * @param $type
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\Writer\Search\ElasticsearchWriter
     */
    public function createExporterWriterSearchElasticsearchWriter(\Elastica\Client $searchClient, $indexName, $type)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\Writer\Search\ElasticsearchWriter');
        $model = new $class($searchClient, $indexName, $type);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\YvesExport\Persistence\YvesExportQueryContainer $queryContainer
     * @param \ProjectA\Zed\YvesExport\Business\Exporter\ExporterInterface $exporter
     * @return \ProjectA\Zed\YvesExport\Business\Exporter\YvesExporter
     */
    public function createExporterYvesExporter(\ProjectA\Zed\YvesExport\Persistence\YvesExportQueryContainer $queryContainer, \ProjectA\Zed\YvesExport\Business\Exporter\ExporterInterface $exporter)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Exporter\YvesExporter');
        $model = new $class($queryContainer, $exporter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Elastica\Client $client
     * @param $indexName
     * @return \ProjectA\Zed\YvesExport\Business\Internal\InstallElasticsearch
     */
    public function createInternalInstallElasticsearch(\Elastica\Client $client, $indexName)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Internal\InstallElasticsearch');
        $model = new $class($client, $indexName);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\YvesExport\Business\Model\BatchResult
     */
    public function createModelBatchResult()
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Model\BatchResult');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\YvesExport\Business\Model\FailedResult
     */
    public function createModelFailedResult()
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Model\FailedResult');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \PDOStatement $statement
     * @return \ProjectA\Zed\YvesExport\Business\Model\PdoStatementIterator
     */
    public function createModelPdoStatementIterator(\PDOStatement $statement)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Model\PdoStatementIterator');
        $model = new $class($statement);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ModelCriteria $query
     * @param $chunkSize (optional) default: 100
     * @return \ProjectA\Zed\YvesExport\Business\Propel\PropelIdSetIterator
     */
    public function createPropelPropelIdSetIterator(\ModelCriteria $query, $chunkSize = 100)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Propel\PropelIdSetIterator');
        $model = new $class($query, $chunkSize);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ModelCriteria $query
     * @param $chunkSize (optional) default: 100
     * @return \ProjectA\Zed\YvesExport\Business\Propel\PropelSetIterator
     */
    public function createPropelPropelSetIterator(\ModelCriteria $query, $chunkSize = 100)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\Propel\PropelSetIterator');
        $model = new $class($query, $chunkSize);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\YvesExport\Business\YvesExportDependencyContainer
     */
    public function createYvesExportDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\YvesExportDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\YvesExport\Business\YvesExportFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\YvesExport\Business\YvesExportFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $locator
     * @return \Pyz\Zed\YvesExport\Business\FrontendExporterSettings
     */
    public function createSettings($locator)
    {
        $class = $this->transformClassName('Pyz\Zed\YvesExport\Business\YvesExportSettings');
        $model = new $class($locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
