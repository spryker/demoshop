<?php

namespace Pyz\Zed\ProductSearch\Dependency;

use Pyz\Zed\Product\Business\ProductFacade;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;

/**
 * (c) Spryker Systems GmbH copyright protected
 */
class ProductSearchToProductBridge implements ProductSearchToProductInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * ProductCategoryToProductBridge constructor.
     *
     * @param ProductFacade $productFacade
     */
    public function __construct($productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        $this->productFacade->buildProducts($productsData);
    }
}
