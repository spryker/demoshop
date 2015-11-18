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
     * @return SpyProductToBundle
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveBundleProduct(ProductToBundleRelationInterface $productToBundleRelation)
    {
        $bundleProduct = $productToBundleRelation->getBundle();
        $bundledProduct = $productToBundleRelation->getProduct();

        $entity = new SpyProductToBundle();
        $entity
            ->setFkProduct($bundleProduct->getIdConcreteProduct())
            ->setFkRelatedProduct($bundledProduct->getIdConcreteProduct())
            ->setQuantity($productToBundleRelation->getProductQuantity())
            ->save();

        return $entity;
    }

    /**
     * @param ProductToBundleRelationInterface $productToBundleRelation
     * @return SpyProductToBundle
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function updateBundleProduct(ProductToBundleRelationInterface $productToBundleRelation)
    {
        $bundleProductEntity = $this->getProductToBundleEntity($productToBundleRelation);
        $bundleProductEntity
            ->setQuantity($productToBundleRelation->getProductQuantity())
            ->save();

        return $bundleProductEntity;
    }

    /**
     * @param ProductToBundleRelationInterface $productToBundleRelation
     */
    public function deleteBundleProduct(ProductToBundleRelationInterface $productToBundleRelation)
    {
        $bundleProductEntity = $this->getProductToBundleEntity($productToBundleRelation);
        $bundleProductEntity->delete();
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
     * @param ProductToBundleRelationInterface $bundleProduct
     * @return SpyProductToBundle
     */
    protected function getProductToBundleEntity(ProductToBundleRelationInterface $bundleProduct)
    {
        $idBundleProduct = $bundleProduct->getBundle()->getIdConcreteProduct();
        $idBundledProduct = $bundleProduct->getProduct()->getIdConcreteProduct();

        return $this->productQueryContainer->queryBundleProductByBundleId($idBundleProduct, $idBundledProduct)
            ->findOne();
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
