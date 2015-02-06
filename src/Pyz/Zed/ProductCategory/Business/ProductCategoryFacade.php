<?php

namespace Pyz\Zed\ProductCategory\Business;

use ProjectA\Zed\ProductCategorySearch\Business\External\ProductCategorySearchToProductCategoryInterface;
use ProjectA\Zed\ProductCategory\Business\ProductCategoryFacade as CoreProductCategoryFacade;

/**
 * Class ProductCategoryFacade
 * @package Pyz\Zed\ProductCategory\Business
 */
class ProductCategoryFacade extends CoreProductCategoryFacade
    implements ProductCategorySearchToProductCategoryInterface
{
    /**
     * @param $data
     * @return array
     */
    public function collectProductNodes($data)
    {
        return $this->dependencyContainer
            ->createProductNodeCollector()
            ->collectProductNodes($data);
    }
}