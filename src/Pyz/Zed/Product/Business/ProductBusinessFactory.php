<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Product\Business;

use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use Spryker\Zed\Product\Business\ProductBusinessFactory as SprykerBusinessFactory;

/**
 * @method \Pyz\Zed\Product\ProductConfig getConfig()
 */
class ProductBusinessFactory extends SprykerBusinessFactory
{

    /**
     * @return \Spryker\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder
     */
    public function createProductBuilder()
    {
        return new SimpleAttributeMergeBuilder();
    }

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installer = new ProductDataInstall(
            $this->createAttributeManager(),
            $this->createProductManager(),
            $this->getLocaleFacade(),
            $this->getConfig()->getDemoDataPath()
        );

        $installer->setMessenger($messenger);

        return $installer;
    }

}
