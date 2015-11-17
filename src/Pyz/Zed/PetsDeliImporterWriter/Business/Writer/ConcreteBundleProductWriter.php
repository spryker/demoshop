<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterLocaleInterface;
use Generated\Shared\Transfer\ProductToBundleRelationTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Orm\Zed\Product\Persistence\SpyProductToBundle;

class ConcreteBundleProductWriter extends DefaultProductWriter
{
    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * @var ProductDynamicFacade
     */
    protected $productDynamicFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param ProductDynamicFacade $productDynamicFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        ProductDynamicFacade $productDynamicFacade
    ) {
        $this->productFacade = $productFacade;
        $this->productDynamicFacade = $productDynamicFacade;
    }

    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        // @TODO : add if type = blablabla
        foreach ($product->getConcreteProducts() as $concreteProduct) {
            $this->getConcreteBundleProduct($concreteProduct);
        }
    }

    /**
     * @param PavProductDynamicImporterConcreteProductInterface $concreteProduct
     */
    protected function getConcreteBundleProduct(PavProductDynamicImporterConcreteProductInterface $concreteProduct)
    {
        if ($this->productFacade->hasConcreteProduct($concreteProduct->getSku())) {
            $concreteProductTransfer = $this->productFacade->getConcreteProduct($concreteProduct->getSku());

            $bundledProductsToAssignBySku = $this->getBundledProductsToAssign($concreteProduct);
            $this->updateAssignedBundledProducts($concreteProductTransfer, $bundledProductsToAssignBySku);
        }
    }
    
    /**
     * @param ConcreteProductInterface $concreteProduct
     * @param array $bundledProductsToAssignBySku
     */
    protected function updateAssignedBundledProducts(ConcreteProductInterface $concreteProduct, array $bundledProductsToAssignBySku)
    {
        $currentAssignedProducts = $this->getAssignedBundledProduct($concreteProduct);

        foreach ($bundledProductsToAssignBySku as $skuToAssign => $quantityToAssign) {

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
        $this->deleteObsoleteProductToBundleRelations($concreteProduct, $currentAssignedProducts);
    }

    /**
     * @param ConcreteProductInterface $bundleProduct
     * @param array $obsoleteBundledProducts
     */
    protected function deleteObsoleteProductToBundleRelations(ConcreteProductInterface $bundleProduct, array $obsoleteBundledProducts)
    {
        foreach ($obsoleteBundledProducts as $sku => $quantity) {
            $productToBundleRelation = new ProductToBundleRelationTransfer();
            $productToBundleRelation->setProductQuantity($quantity)
                ->setBundle($bundleProduct)
                ->setProduct($this->productFacade->getConcreteProduct($sku));

            $this->productFacade->deleteBundleProduct($productToBundleRelation);
        }
    }

//    /**
//     * @param ConcreteProductInterface $concreteProduct
//     * @param PavProductDynamicImporterBundledProductInterface $bundledProductToImport
//     */
//    protected function persistBundledProduct(
//        ConcreteProductInterface $concreteProduct,
//        PavProductDynamicImporterBundledProductInterface $bundledProductToImport
//    ) {
//        if ($this->productFacade->hasConcreteProduct($bundledProductToImport->getSku())) { //@TODO need To verify??
//            $productToBundleRelationTransfer = new ProductToBundleRelationTransfer();
//            $concreteBundledProductTransfer = $this->productFacade->getConcreteProduct($bundledProductToImport->getSku());
//            $productToBundleRelationTransfer
//                ->setBundle($concreteProduct)
//                ->setProduct($concreteBundledProductTransfer)
//                ->setProductQuantity($bundledProductToImport->getQuantity());
//
//            $this->productFacade->saveBundleProduct($productToBundleRelationTransfer);
//        }
//    }

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


    /**
     * @param PavProductDynamicImporterLocaleInterface $importerLocale
     * @return array
     */
    protected function getLocalizedAttributesToBeMerged(PavProductDynamicImporterLocaleInterface $importerLocale)
    {
        return [];
    }

}
