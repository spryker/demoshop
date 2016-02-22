<?php

namespace Pyz\Zed\ProductSearch\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacade as SprykerProductSearchFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\ProductSearch\Business\ProductSearchBusinessFactory getFactory()
 */
class ProductSearchFacade extends SprykerProductSearchFacade implements ProductSearchFacadeInterface
{

    /**
     * @param mixed $data
     * @param string $locale
     *
     * @return string
     */
    public function buildProductKey($data, $locale)
    {
        return $this->getFactory()
            ->createKeyBuilder()
            ->generateKey($data, $locale);
    }

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
