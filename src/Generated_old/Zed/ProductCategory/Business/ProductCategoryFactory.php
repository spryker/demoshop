<?php 

namespace Generated\Zed\ProductCategory\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class ProductCategoryFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \ProjectA\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer $queryContainer
     * @return \ProjectA\Zed\ProductCategory\Business\Collector\ProductNodeCollector
     */
    public function createCollectorProductNodeCollector(\ProjectA\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer $queryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductCategory\Business\Collector\ProductNodeCollector');
        $model = new $class($queryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\ProductCategory\Business\KeyBuilder\BreadcrumbKeyBuilder
     */
    public function createKeyBuilderBreadcrumbKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductCategory\Business\KeyBuilder\BreadcrumbKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\ProductCategory\Business\External\ProductCategoryToCategoryTreeInterface $pathsProvider
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $breadcrumbKeyGenerator
     * @param \ProjectA\Zed\ProductCategory\Business\Collector\ProductNodeCollectorInterface $productNodeCollector
     * @return \ProjectA\Zed\ProductCategory\Business\Processor\ProductBreadcrumbProcessor
     */
    public function createProcessorProductBreadcrumbProcessor(\ProjectA\Zed\ProductCategory\Business\External\ProductCategoryToCategoryTreeInterface $pathsProvider, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $breadcrumbKeyGenerator, \ProjectA\Zed\ProductCategory\Business\Collector\ProductNodeCollectorInterface $productNodeCollector)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductCategory\Business\Processor\ProductBreadcrumbProcessor');
        $model = new $class($pathsProvider, $breadcrumbKeyGenerator, $productNodeCollector);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\ProductCategory\Business\ProductCategoryDependencyContainer
     */
    public function createProductCategoryDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\ProductCategory\Business\ProductCategoryDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \Pyz\Zed\ProductCategory\Business\ProductCategoryFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('Pyz\Zed\ProductCategory\Business\ProductCategoryFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall
     */
    public function createInternalDemoDataProductCategoryMappingInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
