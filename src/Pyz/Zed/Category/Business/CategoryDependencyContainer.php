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
        $installer = $this->getFactory()->createInternalDemoDataCategoryTreeInstall(
            $this->getLocator()->category()->facade(),
            $this->getLocator()->category()->queryContainer(),
            $this->getLocator()->locale()->facade(),
            $this->getLocator()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
