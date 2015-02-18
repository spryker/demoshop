<?php 

namespace Generated\Zed\CategoryExporter\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CategoryExporterFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\CategoryExporter\Business\CategoryExporterDependencyContainer
     */
    public function createCategoryExporterDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\CategoryExporterDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\CategoryExporter\Business\CategoryExporterFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\CategoryExporterFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer
     * @param \ProjectA\Zed\CategoryTree\Business\CategoryTreeFacade $categoryTreeFacade
     * @param \ProjectA\Zed\CategoryExporter\Business\Formatter\CategoryNodeFormatterInterface $categoryFormatter
     * @return \ProjectA\Zed\CategoryExporter\Business\Collector\CategoryNodeCollector
     */
    public function createCollectorCategoryNodeCollector(\ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer, \ProjectA\Zed\CategoryTree\Business\CategoryTreeFacade $categoryTreeFacade, \ProjectA\Zed\CategoryExporter\Business\Formatter\CategoryNodeFormatterInterface $categoryFormatter)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\Collector\CategoryNodeCollector');
        $model = new $class($queryContainer, $categoryTreeFacade, $categoryFormatter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryTree\Business\CategoryTreeFacade $categoryTreeFacade
     * @param \ProjectA\Zed\CategoryExporter\Business\Formatter\CategoryNodeFormatterInterface $categoryFormatter
     * @return \ProjectA\Zed\CategoryExporter\Business\Collector\NavigationCollector
     */
    public function createCollectorNavigationCollector(\ProjectA\Zed\CategoryTree\Business\CategoryTreeFacade $categoryTreeFacade, \ProjectA\Zed\CategoryExporter\Business\Formatter\CategoryNodeFormatterInterface $categoryFormatter)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\Collector\NavigationCollector');
        $model = new $class($categoryTreeFacade, $categoryFormatter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryExporter\Business\Formatter\CategoryNodeFormatter
     */
    public function createFormatterCategoryNodeFormatter()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\Formatter\CategoryNodeFormatter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryExporter\Business\Formatter\NavigationCategoryNodeFormatter
     */
    public function createFormatterNavigationCategoryNodeFormatter()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\Formatter\NavigationCategoryNodeFormatter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryExporter\Business\KeyBuilder\CategoryNodeKeyBuilder
     */
    public function createKeyBuilderCategoryNodeKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\KeyBuilder\CategoryNodeKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryExporter\Business\KeyBuilder\CategoryUrlKeyBuilder
     */
    public function createKeyBuilderCategoryUrlKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\KeyBuilder\CategoryUrlKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryExporter\Business\KeyBuilder\NavigationKeyBuilder
     */
    public function createKeyBuilderNavigationKeyBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\KeyBuilder\NavigationKeyBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryExporter\Business\Collector\CategoryNodeCollectorInterface $categoryCollector
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlKeyBuilder
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $keyBuilder
     * @return \ProjectA\Zed\CategoryExporter\Business\Processor\CategoryNodeProcessor
     */
    public function createProcessorCategoryNodeProcessor(\ProjectA\Zed\CategoryExporter\Business\Collector\CategoryNodeCollectorInterface $categoryCollector, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $urlKeyBuilder, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $keyBuilder)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\Processor\CategoryNodeProcessor');
        $model = new $class($categoryCollector, $urlKeyBuilder, $keyBuilder);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryExporter\Business\Collector\NavigationCollectorInterface $categoryCollector
     * @param \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $navigationKeyBuilder
     * @return \ProjectA\Zed\CategoryExporter\Business\Processor\NavigationProcessor
     */
    public function createProcessorNavigationProcessor(\ProjectA\Zed\CategoryExporter\Business\Collector\NavigationCollectorInterface $categoryCollector, \ProjectA\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface $navigationKeyBuilder)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryExporter\Business\Processor\NavigationProcessor');
        $model = new $class($categoryCollector, $navigationKeyBuilder);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
