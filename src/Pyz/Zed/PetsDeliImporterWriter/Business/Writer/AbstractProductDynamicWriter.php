<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\ProductDynamic\AbstractProductDynamicInterface;
use Generated\Shared\ProductDynamic\ProductDynamicInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\Transfer\AbstractProductDynamicTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterDynamicProductSettingProductTransfer;
use Generated\Shared\Transfer\ProductDynamicTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamic\ProductDynamicConfig;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Product\Business\ProductFacade;

class AbstractProductDynamicWriter implements ProductWriterInterface
{

    protected $productFacade;
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
        $abstractProductTransfer = $this->productFacade->getAbstractProduct($product->getSku());
        if ($product->getType() !== ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_DYNAMIC) {
            $this->productDynamicFacade->deleteProductDynamicByAbstractProductId($abstractProductTransfer->getIdAbstractProduct());
            return;
        }
        $productDynamicTransfer = $this->persistDynamicProduct($abstractProductTransfer, $product);
        $this->assignConcreteProducts($productDynamicTransfer, $product);
    }

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @param PavProductDynamicImporterAbstractProductInterface $product
     * @return AbstractProductDynamicInterface
     */
    protected function persistDynamicProduct(
        AbstractProductInterface $abstractProductTransfer,
        PavProductDynamicImporterAbstractProductInterface $product
    ) {

        $dynamicProductSettings = $product->getDynamicProductSettings();
        $dynamicAbstractProductTransfer = new AbstractProductDynamicTransfer();
        $dynamicAbstractProductTransfer
            ->setIdAbstractProductDynamic($abstractProductTransfer->getIdAbstractProduct())
            ->setTotalQuantity($dynamicProductSettings->getTotalQuantity());

        return $this->productDynamicFacade->saveDynamicAbstractProduct($dynamicAbstractProductTransfer);

    }

    protected function assignConcreteProducts(
        AbstractProductDynamicInterface $abstractProductDynamicTransfer,
        PavProductDynamicImporterAbstractProductInterface $product

    ) {
        $currentAssignedProducts = $this->productDynamicFacade->getRelatedConcreteProducts($abstractProductDynamicTransfer->getIdAbstractProductDynamic());
        $currentAssignedProductsBySkuQuantity = [];
        /** @var ProductDynamicInterface[] $currentAssignedProductsBySkuObject */
        $currentAssignedProductsBySkuObject = [];
        foreach ($currentAssignedProducts as $assignedProduct) {
            $sku = $this->productFacade->getConcreteProductById($assignedProduct->getFkProduct())->getSku();
            $currentAssignedProductsBySkuQuantity[$sku] = $assignedProduct->getQuantity();
            $currentAssignedProductsBySkuObject[$sku] = $assignedProduct;
        }

        $productsToBeAssigned = $product->getDynamicProductSettings()->getProducts();
        $productsToBeAssignedBySkuQuantity = [];
        /** @var PavProductDynamicImporterDynamicProductSettingProductTransfer[] $productsToBeAssignedBySkuObject */
        $productsToBeAssignedBySkuObject = [];
        foreach ($productsToBeAssigned as $toBeAssignedProduct) {
            $productsToBeAssignedBySkuQuantity[$toBeAssignedProduct->getSku()] = $toBeAssignedProduct->getQuantity();
            $productsToBeAssignedBySkuObject[$toBeAssignedProduct->getSku()] = $toBeAssignedProduct;
        }


        foreach ($productsToBeAssignedBySkuQuantity as $sku => $quantity) {
            if (isset($currentAssignedProductsBySkuQuantity[$sku])) {
                $transfer = $currentAssignedProductsBySkuObject[$sku];
                $importerObject = $productsToBeAssignedBySkuObject[$sku];
                $transfer
                    ->setQuantity($quantity)
                    ->setSequence((int) $importerObject->getSequence())
                ;

                $this->productDynamicFacade->updateProductDynamic($transfer);
                unset($currentAssignedProductsBySkuQuantity[$sku]);
            }
            else {
                $importerObject = $productsToBeAssignedBySkuObject[$sku];
                $concreteProductTransfer = $this->productFacade->getConcreteProduct($sku);

                $transfer = new ProductDynamicTransfer();
                $transfer
                    ->setQuantity($quantity)
                    ->setSequence((int) $importerObject->getSequence())
                    ->setFkProduct($concreteProductTransfer->getIdConcreteProduct())
                    ->setFkAbstractProductDynamic($abstractProductDynamicTransfer->getIdAbstractProductDynamic());
                ;
                $this->productDynamicFacade->createProductDynamic($transfer);
            }
        }


        foreach ($currentAssignedProductsBySkuQuantity as $sku => $quantity) {
            $id = $currentAssignedProductsBySkuObject[$sku]->getIdProductDynamic();
            $this->productDynamicFacade->deleteProductDynamicById($id);
        }
    }

}