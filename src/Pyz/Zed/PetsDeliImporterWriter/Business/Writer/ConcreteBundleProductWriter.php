<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterBundledProductInterface;
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
            $bundledProducts = $concreteProduct->getBundledProducts();

            foreach ($bundledProducts as $bundleProductToImport) {
                $this->persistBundledProduct($concreteProductTransfer, $bundleProductToImport);
            }
        }
    }

    /**
     * @param ConcreteProductInterface $concreteProduct
     * @param PavProductDynamicImporterBundledProductInterface $bundledProductToImport
     */
    protected function persistBundledProduct(
        ConcreteProductInterface $concreteProduct,
        PavProductDynamicImporterBundledProductInterface $bundledProductToImport
    ) {
        if ($this->productFacade->hasConcreteProduct($bundledProductToImport->getSku())) {
            $productToBundleRelationTransfer = new ProductToBundleRelationTransfer();
            $concreteBundledProductTransfer = $this->productFacade->getConcreteProduct($bundledProductToImport->getSku());
            $productToBundleRelationTransfer
                ->setBundle($concreteProduct)
                ->setProduct($concreteBundledProductTransfer)
                ->setProductQuantity($bundledProductToImport->getQuantity());

            $this->productFacade->saveBundleProduct($productToBundleRelationTransfer);
        }
    }

    //@todo : change quantity

    /**
     * @param ConcreteProductInterface $concreteProduct
     * @return SpyProductToBundle[]
     */
    protected function getAssignedBundledProduct(ConcreteProductInterface $concreteProduct)
    {
        return $this->productFacade->getAssignedBundledProducts($concreteProduct);
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
