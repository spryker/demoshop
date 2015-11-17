<?php

namespace Pyz\Zed\Product\Business\Product;

use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\Product\ProductToBundleRelationInterface;
use Orm\Zed\Product\Persistence\SpyProductToBundle;

interface ProductBundleManagerInterface
{
    /**
     * @param ProductToBundleRelationInterface $productToBundleRelation
     * @return int
     */
    public function saveBundleProduct(ProductToBundleRelationInterface $productToBundleRelation);

    /**
     * @param ConcreteProductInterface $bundleProduct
     * @return SpyProductToBundle[]
     */
    public function getAssignedBundledProducts(ConcreteProductInterface $bundleProduct);
}
