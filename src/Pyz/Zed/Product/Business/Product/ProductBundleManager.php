<?php

namespace Pyz\Zed\Product\Business\Product;

use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\Product\ProductToBundleRelationInterface;
use Orm\Zed\Product\Persistence\SpyProductToBundle;
use Pyz\SprykerBugfixInterface;
use Pyz\Zed\Product\Persistence\ProductQueryContainer;
use Orm\Zed\Product\Persistence\SpyProduct;

/**
 * Bundle product implementation is missing in Spryker Core
 */
class ProductBundleManager implements ProductBundleManagerInterface, SprykerBugfixInterface
{
    /**
     * @var ProductQueryContainer
     */
    protected $productQueryContainer;

    /**
     * @param ProductQueryContainer $productQueryContainer
     */
    public function __construct(ProductQueryContainer $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param ProductToBundleRelationInterface $productToBundleRelation
     * @return int
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveBundleProduct(ProductToBundleRelationInterface $productToBundleRelation)
    {
        $productTransfer = $productToBundleRelation->getProduct();
        $productQuantity = $productToBundleRelation->getProductQuantity();
        $bundleProductEntity = $this->getBundleProductEntity($productToBundleRelation->getBundle());

        $entity = new SpyProductToBundle();
        $entity
            ->setBundleProduct($bundleProductEntity)
            ->setFkProduct($productTransfer->getIdConcreteProduct())
            ->setQuantity($productQuantity)
            ->save();

        return $entity->getPrimaryKey();
    }

    /**
     * @param ConcreteProductInterface $bundleProduct
     * @return SpyProductToBundle[]
     */
    public function getAssignedBundledProducts(ConcreteProductInterface $bundleProduct)
    {
        $idBundleProduct = $bundleProduct->getIdConcreteProduct();

        return $this->productQueryContainer->queryBundledProductsByConcreteProductId($idBundleProduct)
            ->find();
    }


    /**
     * @param ConcreteProductInterface $bundleProduct
     * @return SpyProduct
     */
    protected function getBundleProductEntity(ConcreteProductInterface $bundleProduct)
    {
        $idBundleProduct = $bundleProduct->getIdConcreteProduct();

        return $this->productQueryContainer->queryConcreteProductById($idBundleProduct)
            ->findOne();
    }

}
