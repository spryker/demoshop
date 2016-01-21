<?php

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\TransferGenerator;
use Spryker\Zed\Category\Business\Generator\UrlPathGenerator;
use Spryker\Zed\Category\Business\Tree\ClosureTableWriter;
use Spryker\Zed\Category\Business\Tree\NodeWriter;
use Spryker\Zed\Category\Business\Model\CategoryWriter;
use Spryker\Zed\Category\Business\Renderer\CategoryTreeRenderer;
use Spryker\Zed\Category\Business\Tree\CategoryTreeReader;
use Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;
use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Category\CategoryDependencyProvider;
use Spryker\Zed\Category\Business\CategoryBusinessFactory as SprykerCategoryBusinessFactory;
use Pyz\Zed\Category\Business\Internal\DemoData\CategoryTreeInstall;
use Psr\Log\LoggerInterface;
use Spryker\Zed\Category\Persistence\CategoryQueryContainer;

/**
 * @method CategoryQueryContainer getQueryContainer()
 */
class CategoryBusinessFactory extends SprykerCategoryBusinessFactory
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return CategoryTreeInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new CategoryTreeInstall(
            $this->createCategoryWriter(),
            $this->createCategoryTreeWriter(),
            $this->getQueryContainer(),
            $this->getProvidedDependency(CategoryDependencyProvider::FACADE_LOCALE),
            $this->getProvidedDependency(CategoryDependencyProvider::FACADE_TOUCH)
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return NodeUrlManager
     */
    protected function createNodeUrlManager()
    {
        return new NodeUrlManager(
            $this->createCategoryTreeReader(),
            $this->createUrlPathGenerator(),
            $this->getUrlFacade(),
            $this->getQueryContainer(),
            $this->getProvidedDependency(CategoryDependencyProvider::QUERY_CONTAINER_LOCALE)
        );
    }

    /**
     * @return CategoryTreeWriter
     */
    public function createCategoryTreeWriter()
    {
        return new CategoryTreeWriter(
                    $this->createNodeWriter(),
                    $this->createClosureTableWriter(),
                    $this->createCategoryTreeReader(),
                    $this->createNodeUrlManager(),
                    $this->createTouchFacade(),
                    $this->getProvidedDependency(CategoryDependencyProvider::PLUGIN_PROPEL_CONNECTION)
                );
    }

    /**
     * @param array $category
     *
     * @return CategoryTreeFormatter
     */
    public function createCategoryTreeStructure(array $category)
    {
        return new CategoryTreeFormatter($category);
    }

    /**
     * @return CategoryTreeReader
     */
    public function createCategoryTreeReader()
    {
        return new CategoryTreeReader(
                    $this->getQueryContainer(),
                    $this->createCategoryTreeFormatter()
                );
    }

    /**
     * @return CategoryTreeRenderer
     */
    public function createCategoryTreeRenderer()
    {
        $locale = $this->getLocaleFacade()->getCurrentLocale();

        return new CategoryTreeRenderer(
                    $this->getQueryContainer(),
                    $locale
                );
    }

    /**
     * @return CategoryWriterInterface
     */
    public function createCategoryWriter()
    {
        return new CategoryWriter(
                    $this->getQueryContainer()
                );
    }

    /**
     * @return NodeWriterInterface
     */
    public function createNodeWriter()
    {
        return new NodeWriter(
                    $this->getQueryContainer()
                );
    }

    /**
     * @return ClosureTableWriterInterface
     */
    protected function createClosureTableWriter()
    {
        return new ClosureTableWriter(
                    $this->getQueryContainer()
                );
    }

    /**
     * @return UrlPathGeneratorInterface
     */
    public function createUrlPathGenerator()
    {
        return new UrlPathGenerator();
    }

    /**
     * @return CategoryTreeFormatter
     */
    protected function createCategoryTreeFormatter()
    {
        return new CategoryTreeFormatter();
    }

    /**
     * @return TransferGeneratorInterface
     */
    public function createCategoryTransferGenerator()
    {
        return new TransferGenerator();
    }

}
