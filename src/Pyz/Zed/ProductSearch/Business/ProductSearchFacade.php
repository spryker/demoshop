<?php

namespace Pyz\Zed\ProductSearch\Business;

use ProjectA\Zed\ProductCategorySearch\Business\External\ProductCategorySearchToProductSearchInterface;
use ProjectA\Zed\ProductSearch\Business\ProductSearchFacade as SprykerProductSearchFacade;
use Psr\Log\LoggerInterface;

class ProductSearchFacade extends SprykerProductSearchFacade implements ProductCategorySearchToProductSearchInterface
{

    /**
     * @var ProductSearchDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param $data
     * @param $locale
     * @return string
     */
    public function buildProductKey($data, $locale)
    {
        return $this->dependencyContainer
            ->createKeyBuilder()
            ->generateKey($data, $locale);
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }

}
