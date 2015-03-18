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
     * @param LoggerInterface $logger
     *
     * @return ProductDataInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataProductDataInstall();
        $installer->setLogger($logger);

        return $installer;
    }

}
