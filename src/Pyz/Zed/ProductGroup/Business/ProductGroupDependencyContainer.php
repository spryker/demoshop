<?php

namespace Pyz\Zed\ProductGroup\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductGroupBusiness;
use PavFeature\Zed\ProductGroup\Business\ProductGroupDependencyContainer as PavProductGroupDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductGroup\Business\Internal\DemoData\ProductGroupDataInstall;
use Pyz\Zed\ProductGroup\ProductGroupDependencyProvider;

/**
 * @method ProductGroupBusiness getFactory()
 */
class ProductGroupDependencyContainer extends PavProductGroupDependencyContainer
{
    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductGroupDataInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataProductGroupDataInstall(
            $this->getProvidedDependency(ProductGroupDependencyProvider::FACADE_PRODUCT_GROUP)
        );
        $installer->setMessenger($messenger);

        return $installer;
    }
}
