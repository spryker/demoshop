<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterConcreteProductInterface;
use Generated\Shared\Transfer\ProductToBundleRelationTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamic\ProductDynamicConfig;
use Pyz\Zed\Product\Business\ProductFacade;
use Orm\Zed\Product\Persistence\SpyProductToBundle;

class ConcreteBundleProductWriter
{
    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     */
    public function __construct(
        ProductFacade $productFacade
    ) {
        $this->productFacade = $productFacade;
    }

    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractProductTransfer = $this->productFacade->getAbstractProduct($product->getSku());
        if ($product->getType() !== ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_BUNDLE) {
            $this->productFacade->deleteBundleProductsByAbstractProductId($abstractProductTransfer->getIdAbstractProduct());
            return;
        }

        foreach ($product->getConcreteProducts() as $concreteProduct) {
            $this->assignConcreteBundleProduct($concreteProduct);
        }
    }

    /**
     * @param PavProductDynamicImporterConcreteProductInterface $concreteProduct
     */
    protected function assignConcreteBundleProduct(PavProductDynamicImporterConcreteProductInterface $concreteProduct)
    {
        if ($this->productFacade->hasConcreteProduct($concreteProduct->getSku())) {
            $concreteProductTransfer = $this->productFacade->getConcreteProduct($concreteProduct->getSku());

            $bundledProductsToAssignBySku = $this->getBundledProductsToAssign($concreteProduct);
            $this->assignBundledProducts($concreteProductTransfer, $bundledProductsToAssignBySku);
        }
    }
    
    /**
     * @param ConcreteProductInterface $concreteProduct
     * @param array $bundledProductsToAssignBySku
     */
    protected function assignBundledProducts(ConcreteProductInterface $concreteProduct, array $bundledProductsToAssignBySku)
    {
        $currentAssignedProducts = $this->getAssignedBundledProduct($concreteProduct);

        foreach ($bundledProductsToAssignBySku as $skuToAssign => $quantityToAssign) {

            if ($this->productFacade->hasConcreteProduct($skuToAssign)) {

                $productToBundleRelation = new ProductToBundleRelationTransfer();
                $productToBundleRelation
                    ->setBundle($concreteProduct)
                    ->setProduct($this->productFacade->getConcreteProduct($skuToAssign))
                    ->setProductQuantity($quantityToAssign);

                if (isset($currentAssignedProducts[$skuToAssign])) {
                    $this->productFacade->updateBundleProduct($productToBundleRelation);
                    unset($currentAssignedProducts[$skuToAssign]);
                } else {
                    $this->productFacade->saveBundleProduct($productToBundleRelation);
                }
            }
        }
        $this->deleteObsoleteProductToBundleRelations($concreteProduct, $currentAssignedProducts);
    }

    /**
     * @param ConcreteProductInterface $bundleProduct
     * @param array $obsoleteBundledProducts
     */
    protected function deleteObsoleteProductToBundleRelations(ConcreteProductInterface $bundleProduct, array $obsoleteBundledProducts)
    {
        foreach ($obsoleteBundledProducts as $sku => $quantity) {
            if ($this->productFacade->hasConcreteProduct($sku)) {
                $productToBundleRelation = new ProductToBundleRelationTransfer();
                $productToBundleRelation->setProductQuantity($quantity)
                    ->setBundle($bundleProduct)
                    ->setProduct($this->productFacade->getConcreteProduct($sku));

                $this->productFacade->deleteBundleProduct($productToBundleRelation);
            }
        }
    }

    /**
     * @param ConcreteProductInterface $concreteProduct
     * @return array
     */
    protected function getAssignedBundledProduct(ConcreteProductInterface $concreteProduct)
    {
        $assignedBundledProducts =  $this->productFacade->getAssignedBundledProducts($concreteProduct);

        return $this->getCurrentAssignedProductOrderedBySku($assignedBundledProducts);
    }

    /**
     * @param SpyProductToBundle[] $currentAssignedProducts
     * @return array
     */
    protected function getCurrentAssignedProductOrderedBySku($currentAssignedProducts)
    {
        $currentAssignedProductsBySku = [];

        foreach ($currentAssignedProducts as $currentAssignedProduct) {
            $idBundledProduct = $currentAssignedProduct->getFkRelatedProduct();
            $bundledProductSku = $this->productFacade->getConcreteProductById($idBundledProduct)->getSku();
            $currentAssignedProductsBySku[$bundledProductSku] = $currentAssignedProduct->getQuantity();
        }

        return $currentAssignedProductsBySku;
    }

    /**
     * @param PavProductDynamicImporterConcreteProductInterface $concreteProduct
     * @return array
     */
    protected function getBundledProductsToAssign(PavProductDynamicImporterConcreteProductInterface $concreteProduct)
    {
        $bundledProductsToAssignBySku = [];
        $bundledProductsToAssign = $concreteProduct->getBundledProducts();

        foreach ($bundledProductsToAssign as $bundledProductToAssign) {
            $bundledProductsToAssignBySku[$bundledProductToAssign->getSku()] = $bundledProductToAssign->getQuantity();
        }

        return $bundledProductsToAssignBySku;
    }

}
