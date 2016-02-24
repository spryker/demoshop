<?php

namespace Pyz\Zed\ProductCategory\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\ProductCategory\Business\ProductCategoryFacade as SprykerProductCategoryFacade;

/**
 * @method \Pyz\Zed\ProductCategory\Business\ProductCategoryBusinessFactory getFactory()
 */
class ProductCategoryFacade extends SprykerProductCategoryFacade implements ProductCategoryFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
