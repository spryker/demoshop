<?php

namespace Pyz\Zed\Category\Business;

use Pyz\Zed\Category\Business\Finder\CategoryProductCategoryFinder;
use Pyz\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Category\Business\CategoryDependencyContainer as SprykerCategoryDependencyContainer;
use Pyz\Zed\Category\Business\Internal\DemoData\CategoryTreeInstall;
use Psr\Log\LoggerInterface;
use SprykerFeature\Zed\Category\CategoryDependencyProvider;

/**
 * @method CategoryQueryContainer getQueryContainer()
 */
class CategoryDependencyContainer extends SprykerCategoryDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return CategoryTreeInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataCategoryTreeInstall(
            $this->createCategoryWriter(),
            $this->createCategoryTreeWriter(),
            $this->getQueryContainer(),
            $this->getProvidedDependency(CategoryDependencyProvider::FACADE_LOCALE)
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return CategoryProductCategoryFinder
     */
    public function createCategoryProductCategoryFinder()
    {
        return $this->getFactory()->createFinderCategoryProductCategoryFinder(
            $this->getQueryContainer(),
            $this->getProvidedDependency(CategoryDependencyProvider::FACADE_LOCALE)
        );
    }

}
