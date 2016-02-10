<?php

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\TransferGenerator;
use Spryker\Zed\Category\Business\Generator\UrlPathGenerator;
use Spryker\Zed\Category\Business\Tree\ClosureTableWriter;
use Spryker\Zed\Category\Business\Tree\CategoryTreeReader;
use Spryker\Zed\Category\Business\Tree\ClosureTableWriterInterface;
use Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;
use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Category\CategoryDependencyProvider;
use Spryker\Zed\Category\Business\CategoryBusinessFactory as SprykerCategoryBusinessFactory;
use Pyz\Zed\Category\Business\Internal\DemoData\CategoryTreeInstall;
use Psr\Log\LoggerInterface;
use Spryker\Zed\Category\Persistence\CategoryQueryContainer;

/**
 * @method \Spryker\Zed\Category\Persistence\CategoryQueryContainer getQueryContainer()
 */
class CategoryBusinessFactory extends SprykerCategoryBusinessFactory
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\Category\Business\Internal\DemoData\CategoryTreeInstall
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
     * @return \Pyz\Zed\Category\Business\Manager\NodeUrlManager
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
     * @return \Spryker\Zed\Category\Business\Tree\CategoryTreeWriter
     */
    public function createCategoryTreeWriter()
    {
        return new CategoryTreeWriter(
            $this->createNodeWriter(),
            $this->createClosureTableWriter(),
            $this->createCategoryTreeReader(),
            $this->createNodeUrlManager(),
            $this->getTouchFacade(),
            $this->getQueryContainer()->getConnection()
        );
    }

    /**
     * @param array $category
     *
     * @return \Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter
     */
    public function createCategoryTreeStructure(array $category)
    {
        return new CategoryTreeFormatter($category);
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\CategoryTreeReader
     */
    public function createCategoryTreeReader()
    {
        return new CategoryTreeReader(
            $this->getQueryContainer(),
            $this->createCategoryTreeFormatter()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\ClosureTableWriterInterface
     */
    protected function createClosureTableWriter()
    {
        return new ClosureTableWriter(
            $this->getQueryContainer()
        );
    }

}
