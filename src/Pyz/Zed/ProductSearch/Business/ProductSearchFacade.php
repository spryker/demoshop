<?php

namespace Pyz\Zed\ProductSearch\Business;

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
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
