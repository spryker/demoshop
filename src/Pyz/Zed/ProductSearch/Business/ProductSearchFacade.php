<?php

namespace Pyz\Zed\ProductSearch\Business;

use Spryker\Zed\ProductSearch\Business\ProductSearchFacade as SprykerProductSearchFacade;
use Psr\Log\LoggerInterface;

/**
 * @method ProductSearchBusinessFactory getFactory()
 */
class ProductSearchFacade extends SprykerProductSearchFacade
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
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->getDemoDataInstaller($messenger)->install();
    }

}
