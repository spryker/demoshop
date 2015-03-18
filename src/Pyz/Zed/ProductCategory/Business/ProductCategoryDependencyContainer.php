<?php

namespace Pyz\Zed\ProductCategory\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductCategoryBusiness;
use ProjectA\Zed\Kernel\Business\AbstractDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall;

class ProductCategoryDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @var ProductCategoryBusiness
     */
    protected $factory;

    /**
     * @param LoggerInterface $logger
     *
     * @return ProductCategoryMappingInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataProductCategoryMappingInstall(
            $this->locator->locale()->facade(),
            $this->locator->touch()->facade()
        );
        $installer->setLogger($logger);

        return $installer;
    }

}
