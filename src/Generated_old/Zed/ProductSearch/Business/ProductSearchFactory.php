<?php 

namespace Generated\Zed\ProductSearch\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;
use ProjectA\Zed\ProductSearch\Business\Processor\ProductAttributesSearchProcessorInterface;

/**
 *
 */
class ProductSearchFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\ProductSearch\Business\Builder\ProductKeyBuilder
     */
    public function createBuilderProductKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Builder\ProductKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Elastica\Client $client
     * @param $indexName
     * @param $indexType
     * @return \ProjectA\Zed\ProductSearch\Business\Internal\InstallProductSearch
     */
    public function createInternalInstallProductSearch(\Elastica\Client $client, $indexName, $indexType)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Internal\InstallProductSearch');
        $model = new $class($client, $indexName, $indexType);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\ProductSearch\Business\Locator\OperationLocator
     */
    public function createLocatorOperationLocator()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Locator\OperationLocator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\ProductSearch\Business\Operation\AddToResult
     */
    public function createOperationAddToResult()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Operation\AddToResult');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\ProductSearch\Business\Operation\CopyToFacet
     */
    public function createOperationCopyToFacet()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Operation\CopyToFacet');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\ProductSearch\Business\Operation\CopyToField
     */
    public function createOperationCopyToField()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Operation\CopyToField');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\ProductSearch\Business\Operation\DefaultOperation
     */
    public function createOperationDefaultOperation()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Operation\DefaultOperation');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\ProductSearch\Persistence\ProductSearchQueryContainer $queryContainer
     * @param \ProjectA\Zed\ProductSearch\Business\Builder\ProductSearchToProductInterface $productBuilder
     * @param \ProjectA\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformerInterface $productTransformer
     * @return ProductAttributesSearchProcessorInterface
     */
    public function createProcessorProductSearchProcessor(\ProjectA\Zed\ProductSearch\Persistence\ProductSearchQueryContainer $queryContainer, \ProjectA\Zed\ProductSearch\Business\Builder\ProductSearchToProductInterface $productBuilder, \ProjectA\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformerInterface $productTransformer)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Processor\ProductSearchProcessor');
        $model = new $class($queryContainer, $productBuilder, $productTransformer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\ProductSearch\Business\ProductSearchDependencyContainer
     */
    public function createProductSearchDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\ProductSearchDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \Pyz\Zed\ProductSearch\Business\ProductSearchFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('Pyz\Zed\ProductSearch\Business\ProductSearchFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\ProductSearchSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\ProductSearch\Business\ProductSearchSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\ProductSearch\Persistence\ProductSearchQueryContainer $queryContainer
     * @param \ProjectA\Zed\ProductSearch\Business\Locator\OperationLocatorInterface $operationLocator
     * @param \ProjectA\Zed\ProductSearch\Business\Builder\ProductSearchToProductInterface $productBuilder
     * @param \ProjectA\Zed\ProductSearch\Business\Operation\OperationInterface $defaultOperation
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $keyBuilder
     * @param $defaultFieldMappings
     * @param $store
     * @return \ProjectA\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformer
     */
    public function createTransformerProductTransformer(\ProjectA\Zed\ProductSearch\Persistence\ProductSearchQueryContainer $queryContainer, \ProjectA\Zed\ProductSearch\Business\Locator\OperationLocatorInterface $operationLocator, \ProjectA\Zed\ProductSearch\Business\Builder\ProductSearchToProductInterface $productBuilder, \ProjectA\Zed\ProductSearch\Business\Operation\OperationInterface $defaultOperation, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $keyBuilder, $defaultFieldMappings, $store)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductSearch\Business\Transformer\ProductTransformer');
        $model = new $class($queryContainer, $operationLocator, $productBuilder, $defaultOperation, $keyBuilder, $defaultFieldMappings, $store);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall
     */
    public function createInternalDemoDataProductAttributeMappingInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
