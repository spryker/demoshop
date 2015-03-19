<?php

namespace Pyz\Zed\Category\Business;

use ProjectA\Zed\Category\Business\CategoryDependencyContainer as SprykerCategoryDependencyContainer;
use Pyz\Zed\Category\Business\Internal\DemoData\CategoryTreeInstall;
use Psr\Log\LoggerInterface;

class CategoryDependencyContainer extends SprykerCategoryDependencyContainer
{

    /**
     * @param LoggerInterface $logger
     *
     * @return CategoryTreeInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataCategoryTreeInstall(
            $this->locator->category()->facade(),
            $this->locator->category()->queryContainer(),
            $this->locator->locale()->facade()
        );
        $installer->setLogger($logger);

        return $installer;
    }

}
