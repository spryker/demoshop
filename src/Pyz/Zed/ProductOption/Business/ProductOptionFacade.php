<?php

namespace Pyz\Zed\ProductOption\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\ProductOption\Business\ProductOptionFacade as SprykerProductOptionFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\ProductOption\Business\ProductOptionBusinessFactory getFactory()
 */
class ProductOptionFacade extends SprykerProductOptionFacade implements ProductOptionFacadeInterface
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
