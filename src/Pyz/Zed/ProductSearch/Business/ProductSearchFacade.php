<?php

namespace Pyz\Zed\ProductSearch\Business;

use ProjectA\Zed\ProductCategorySearch\Business\External\ProductCategorySearchToProductSearchInterface;
use ProjectA\Zed\ProductSearch\Business\ProductSearchFacade as CoreProductSearchFacade;

/**
 * Class ProductSearchFacade
 * @package Pyz\Zed\ProductSearch\Business
 */
class ProductSearchFacade extends CoreProductSearchFacade
    implements ProductCategorySearchToProductSearchInterface
{
    /**
     * @param $data
     * @param $locale
     * @return string
     */
    public function buildProductKey($data, $locale)
    {
        return $this->dependencyContainer
            ->getKeyBuilder()
            ->generateKey($data, $locale);
    }
}