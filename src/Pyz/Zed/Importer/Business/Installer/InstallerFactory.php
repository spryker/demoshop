<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer;

use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Importer\Business\Importer\Category\CategoryRootImporter;
use Pyz\Zed\Importer\Business\Installer\Category\CategoryRootInstaller;
use Pyz\Zed\Importer\Business\Installer\Factory\AbstractFactory;
use Pyz\Zed\Importer\ImporterConfig;
use Spryker\Zed\Category\Business\Tree\CategoryTreeReader;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;


/**
 * @method \Pyz\Zed\Importer\ImporterConfig getConfig()
 */
class InstallerFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Category\CategoryRootInstaller
     */
    protected function createCategoryRootInstaller()
    {
        $categoryRootInstaller = new CategoryRootInstaller(
            $this->getImporterCategoryRootCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $categoryRootInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterCategoryRootCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_ROOT => $this->createCategoryRootImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryRootImporter
     */
    protected function createCategoryRootImporter()
    {
        $categoryRootImporter = new CategoryRootImporter(
            $this->getLocaleFacade()
        );

        $categoryRootImporter->setCategoryFacade($this->getCategoryFacade());
        $categoryRootImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());
        $categoryRootImporter->setTouchFacade($this->getTouchFacade());
        $categoryRootImporter->setUrlFacade($this->getUrlFacade());
        $categoryRootImporter->setNodeUrlManager($this->createNodeUrlManager());
        $categoryRootImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());

        return $categoryRootImporter;
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
            $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_LOCALE)
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
     * @return \Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter
     */
    protected function createCategoryTreeFormatter()
    {
        return new CategoryTreeFormatter();
    }

}
