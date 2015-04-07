<?php

namespace Pyz\Zed\ProductSearch\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductSearchBusiness;
use ProjectA\Zed\ProductSearch\Business\ProductSearchDependencyContainer as SprykerProductSearchDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall;

class ProductSearchDependencyContainer extends SprykerProductSearchDependencyContainer
{
    /**
     * @param LoggerInterface $logger
     *
     * @return ProductAttributeMappingInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->getFactory()->createInternalDemoDataProductAttributeMappingInstall(
            $this->createLocaleFacade(),
            $this->createTouchFacade()
        );
        $installer->setLogger($logger);

        return $installer;
    }

}
