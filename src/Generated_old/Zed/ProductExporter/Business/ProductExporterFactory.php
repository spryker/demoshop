<?php 

namespace Generated\Zed\ProductFrontendExporterConnector\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class ProductExporterFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\FrontendProductConnector\Business\Builder\ProductKeyBuilder
     */
    public function createBuilderProductKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\FrontendProductConnector\Business\Builder\ProductKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\FrontendProductConnector\Business\Builder\ProductUrlKeyBuilder
     */
    public function createBuilderProductUrlKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\FrontendProductConnector\Business\Builder\ProductUrlKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\ProductFrontendExporterConnector\Persistence\ProductExporterQueryContainer $queryContainer
     * @param \ProjectA\Zed\ProductFrontendExporterConnector\Business\Builder\ProductFrontendExporterToProductInterface $productBuilder
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $productKeyBuilder
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlKeyBuilder
     * @return \ProjectA\Zed\ProductFrontendExporterConnector\Business\Processor\ProductProcessor
     */
    public function createProcessorProductProcessor(\ProjectA\Zed\ProductFrontendExporterConnector\Persistence\ProductExporterQueryContainer $queryContainer, \ProjectA\Zed\ProductFrontendExporterConnector\Business\Builder\ProductFrontendExporterToProductInterface $productBuilder, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $productKeyBuilder, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlKeyBuilder)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductFrontendExporterConnector\Business\Processor\ProductProcessor');
        $model = new $class($queryContainer, $productBuilder, $productKeyBuilder, $urlKeyBuilder);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\FrontendProductConnector\Business\FrontendProductConnectorDependencyContainer
     */
    public function createProductExporterDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductFrontendExporterConnector\Business\ProductExporterDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\FrontendProductConnector\Business\FrontendProductConnectorFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductFrontendExporterConnector\Business\ProductExporterFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\ProductFrontendExporterConnector\Business\ProductExporterSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductFrontendExporterConnector\Business\ProductExporterSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
