<?php

namespace Pyz\Zed\ProductSearch\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductSearchBusiness;
use ProjectA\Zed\ProductSearch\Business\ProductSearchDependencyContainer as SprykerProductSearchDependencyContainer;
use Psr\Log\LoggerInterface;

class ProductSearchDependencyContainer extends SprykerProductSearchDependencyContainer
{

    /**
     * @var ProductSearchBusiness
     */
    protected $factory;

    /**
     * @param LoggerInterface $logger
     *
     * @return Internal\DemoData\ProductAttributeMappingInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataProductAttributeMappingInstall();
        $installer->setLogger($logger);

        return $installer;
    }

}
