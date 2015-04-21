<?php

namespace Pyz\Zed\ProductSearch\Business;

use SprykerFeature\Zed\ProductCategorySearch\Business\External\ProductCategorySearchToProductSearchInterface;
use SprykerFeature\Zed\ProductSearch\Business\ProductSearchFacade as SprykerProductSearchFacade;
use Psr\Log\LoggerInterface;

/**
 * @method ProductSearchDependencyContainer getDependencyContainer()
 */
class ProductSearchFacade extends SprykerProductSearchFacade implements ProductCategorySearchToProductSearchInterface
{

    /**
     * @param $data
     * @param $locale
     * @return string
     */
    public function buildProductKey($data, $locale)
    {
        return $this->getDependencyContainer()
            ->createKeyBuilder()
            ->generateKey($data, $locale);
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->getDemoDataInstaller($messenger)->install();
    }

}
