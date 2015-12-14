<?php

namespace Pyz\Zed\ProductSearch\Dependency;

use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;

/**
 * (c) Spryker Systems GmbH copyright protected
 */
class ProductSearchToProductBridge implements ProductSearchToProductInterface
{

    /**
     * @var \SprykerFeature\Zed\Product\Business\ProductFacade
     */
    protected $productFacade;

    /**
     * ProductCategoryToProductBridge constructor.
     *
     * @param \Pyz\Zed\Product\Business\ProductFacade $productFacade
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
