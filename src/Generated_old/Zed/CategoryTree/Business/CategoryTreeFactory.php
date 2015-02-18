<?php 

namespace Generated\Zed\CategoryTree\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CategoryTreeFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\CategoryTree\Business\CategoryTreeDependencyContainer
     */
    public function createCategoryTreeDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\CategoryTreeDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \Pyz\Zed\CategoryTree\Business\CategoryTreeFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('Pyz\Zed\CategoryTree\Business\CategoryTreeFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryTree\Business\CategoryTreeSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\CategoryTreeSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryTree\Business\Generator\UrlPathGenerator
     */
    public function createGeneratorUrlPathGenerator()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\Generator\UrlPathGenerator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\CategoryTree\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer
     * @return \ProjectA\Zed\CategoryTree\Business\Model\Category
     */
    public function createModelCategory(\ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\Model\Category');
        $model = new $class($queryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer
     * @return \ProjectA\Zed\CategoryTree\Business\Renderer\CategoryTreeRenderer
     */
    public function createRendererCategoryTreeRenderer(\ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\Renderer\CategoryTreeRenderer');
        $model = new $class($queryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer
     * @param \ProjectA\Zed\CategoryTree\Business\Model\CategoryInterface $category
     * @param \ProjectA\Zed\CategoryTree\Business\Tree\NodeInterface $node
     * @param \ProjectA\Zed\CategoryTree\Business\Tree\ClosureTableInterface $closureTable
     * @param \ProjectA\Zed\CategoryTree\Business\Generator\UrlPathGeneratorInterface $urlPathGenerator
     * @return \ProjectA\Zed\CategoryTree\Business\Tree\CategoryTree
     */
    public function createTreeCategoryTree(\ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $queryContainer, \ProjectA\Zed\CategoryTree\Business\Model\CategoryInterface $category, \ProjectA\Zed\CategoryTree\Business\Tree\NodeInterface $node, \ProjectA\Zed\CategoryTree\Business\Tree\ClosureTableInterface $closureTable, \ProjectA\Zed\CategoryTree\Business\Generator\UrlPathGeneratorInterface $urlPathGenerator)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\Tree\CategoryTree');
        $model = new $class($queryContainer, $category, $node, $closureTable, $urlPathGenerator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $categoryTreeRepository
     * @return \ProjectA\Zed\CategoryTree\Business\Tree\ClosureTable
     */
    public function createTreeClosureTable(\ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $categoryTreeRepository)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\Tree\ClosureTable');
        $model = new $class($categoryTreeRepository);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $categoryTreeRepository
     * @return \ProjectA\Zed\CategoryTree\Business\Tree\Node
     */
    public function createTreeNode(\ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer $categoryTreeRepository)
    {
        $class = $this->transformClassName('ProjectA\Zed\CategoryTree\Business\Tree\Node');
        $model = new $class($categoryTreeRepository);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\CategoryTree\Business\Internal\DemoData\CategoryTreeInstall
     */
    public function createInternalDemoDataCategoryTreeInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\CategoryTree\Business\Internal\DemoData\CategoryTreeInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
