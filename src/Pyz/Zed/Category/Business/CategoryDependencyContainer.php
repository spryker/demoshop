<?php

namespace Pyz\Zed\Category\Business;

use SprykerFeature\Zed\Category\Business\CategoryDependencyContainer as SprykerCategoryDependencyContainer;
use Pyz\Zed\Category\Business\Internal\DemoData\CategoryTreeInstall;
use Psr\Log\LoggerInterface;

class CategoryDependencyContainer extends SprykerCategoryDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return CategoryTreeInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->factory->createInternalDemoDataCategoryTreeInstall(
            $this->locator->category()->facade(),
            $this->locator->category()->queryContainer(),
            $this->locator->locale()->facade(),
            $this->locator
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
