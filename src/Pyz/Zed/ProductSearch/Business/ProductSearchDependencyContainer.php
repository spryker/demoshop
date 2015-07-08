<?php

namespace Pyz\Zed\ProductSearch\Business;

use SprykerFeature\Zed\ProductSearch\Business\ProductSearchDependencyContainer as SprykerProductSearchDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall;

class ProductSearchDependencyContainer extends SprykerProductSearchDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductAttributeMappingInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataProductAttributeMappingInstall(
            $this->createOperationManager(),
            $this->createLocaleFacade(),
            $this->createTouchFacade()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
