<?php

namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use ProjectA\Zed\Product\Business\ProductDependencyContainer as CoreDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;

/**
 * Class ProductDependencyContainer
 *
 * @package Pyz\Zed\Product\Business
 */
class ProductDependencyContainer extends CoreDependencyContainer
{
    /**
     * @return SimpleAttributeMergeBuilder
     */
    public function getProductBuilder()
    {
        return $this->factory->create('Builder\\SimpleAttributeMergeBuilder');
    }

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductDataInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger = null)
    {
        $installer = $this->factory->createInternalDemoDataProductDataInstall();
        $installer->setMessenger($messenger);

        return $installer;
    }

}
