<?php

namespace Pyz\Zed\Installer\Business;

use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatInstaller;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductCategoryImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocaleManager;
use Pyz\Zed\Installer\Business\Model\Reader\CsvReader;
use Pyz\Zed\Installer\InstallerConfig;
use Pyz\Zed\Installer\InstallerDependencyProvider;
use Spryker\Zed\Category\Business\Generator\UrlPathGenerator;
use Spryker\Zed\Category\Business\TransferGenerator;
use Spryker\Zed\Category\Business\Tree\CategoryTreeReader;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;
use Spryker\Zed\Category\Business\Tree\ClosureTableWriter;
use Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter;
use Spryker\Zed\Category\Business\Tree\NodeWriter;
use Spryker\Zed\Installer\Business\InstallerBusinessFactory as SprykerInstallerBusinessFactory;
use Spryker\Zed\Product\Business\Attribute\AttributeManager;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Installer\InstallerConfig getConfig()
 */
class InstallerBusinessFactory extends SprykerInstallerBusinessFactory
{

    /**
     * @return \Spryker\Zed\Installer\Business\Model\AbstractInstaller[]
     */
    public function getIcecatDataImporters()
    {
        return [
            InstallerConfig::RESOURCE_PRODUCT => $this->getProductImporter(),
            InstallerConfig::RESOURCE_CATEGORY => $this->getCategoryImporter(),
            InstallerConfig::RESOURCE_PRODUCT_CATEGORY => $this->getProductCategoryImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter
     */
    protected function getCategoryImporter()
    {
        $categoryImporter = new CategoryImporter(
            $this->getCsvReader(), $this->getIcecatLocaleManager()
        );

        $categoryImporter->setCategoryFacade($this->getCategoryFacade());
        $categoryImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());
        $categoryImporter->setTouchFacade($this->getTouchFacade());
        $categoryImporter->setUrlFacade($this->getUrlFacade());
        $categoryImporter->setNodeUrlManager($this->createNodeUrlManager());
        $categoryImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());

        return $categoryImporter;
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter
     */
    protected function getProductCategoryImporter()
    {
        $categoryImporter = new ProductCategoryImporter(
            $this->getCsvReader(), $this->getIcecatLocaleManager()
        );

        $categoryImporter->setCategoryFacade($this->getCategoryFacade());
        $categoryImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());
        $categoryImporter->setProductFacade($this->getProductFacade());
        $categoryImporter->setProductQueryContainer($this->getProductQueryContainer());
        $categoryImporter->setProductCategoryFacade($this->getProductCategoryFacade());
        $categoryImporter->setProductCategoryQueryContainer($this->getProductCategoryQueryContainer());

        return $categoryImporter;
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductImporter
     */
    protected function getProductImporter()
    {
        $productImporter = new ProductImporter(
            $this->getCsvReader(), $this->getIcecatLocaleManager()
        );

        $productImporter->setAttributeManager($this->createAttributeManager());
        $productImporter->setProductFacade($this->getProductFacade());

        return $productImporter;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\IcecatInstaller
     */
    public function getIcecatDataInstaller(OutputInterface $output)
    {
        return new IcecatInstaller(
            $output, $this->getIcecatDataImporters()
        );
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface
     */
    public function getCsvReader()
    {
        return new CsvReader(
            $this->getConfig()->getIcecatDataPath()
        );
    }

    /**
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return IcecatLocaleManager
     */
    public function getIcecatLocaleManager()
    {
        return new IcecatLocaleManager(
            $this->getLocaleFacade()
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    protected function createAttributeManager()
    {
        return new AttributeManager(
            $this->getProductQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected function getCategoryQueryContainer()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::QUERY_CONTAINER_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected function getProductQueryContainer()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected function getProductCategoryQueryContainer()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY);
    }

    /**
     * @return \Pyz\Zed\ProductCategory\Business\ProductCategoryFacadeInterface
     */
    protected function getProductCategoryFacade()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::FACADE_PRODUCT_CATEGORY);
    }

    /**
     * @return \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected function getCategoryFacade()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::FACADE_CATEGORY);
    }

    /**
     * @return \Pyz\Zed\Product\Business\ProductFacadeInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected function getTouchFacade()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::FACADE_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected function getLocaleFacade()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected function getUrlFacade()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::FACADE_URL);
    }

    /**
     * @return \Pyz\Zed\Category\Business\Manager\NodeUrlManager
     */
    protected function createNodeUrlManager()
    {
        return new NodeUrlManager(
            $this->createCategoryTreeReader(),
            $this->createUrlPathGenerator(),
            $this->getCategoryToUrlBridge(),
            $this->getCategoryQueryContainer(),
            $this->getProvidedDependency(InstallerDependencyProvider::QUERY_CONTAINER_LOCALE)
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
            $this->getCategoryToTouchBridge(),
            $this->getQueryContainer()->getConnection()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\CategoryTreeReader
     */
    public function createCategoryTreeReader()
    {
        return new CategoryTreeReader(
            $this->getCategoryQueryContainer(),
            $this->createCategoryTreeFormatter()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\NodeWriterInterface
     */
    public function createNodeWriter()
    {
        return new NodeWriter(
            $this->getCategoryQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface
     */
    public function createUrlPathGenerator()
    {
        return new UrlPathGenerator();
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
     * @return \Spryker\Zed\Category\Business\Tree\ClosureTableWriterInterface
     */
    protected function createClosureTableWriter()
    {
        return new ClosureTableWriter(
            $this->getCategoryQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter
     */
    protected function createCategoryTreeFormatter()
    {
        return new CategoryTreeFormatter();
    }

    /**
     * @return \Spryker\Zed\Category\Business\TransferGeneratorInterface
     */
    protected function createCategoryTransferGenerator()
    {
        return new TransferGenerator();
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface
     */
    protected function getCategoryToTouchBridge()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::BRIDGE_CATEGORY_TO_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToUrlInterface
     */
    protected function getCategoryToUrlBridge()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::BRIDGE_CATEGORY_TO_URL);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface
     */
    protected function getCategoryToLocaleBridge()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::BRIDGE_CATEGORY_TO_LOCALE);
    }

}
