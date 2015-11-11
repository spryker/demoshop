<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\Transfer\ProductGroupTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamic\ProductDynamicConfig;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Product\Business\ProductFacade;

class AbstractProductDynamicWriter  implements ProductWriterInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;
    protected $localeFacade;
    protected $priceFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductDynamicFacade $productDynamicFacade
     */
    public function __construct(
    ) {

    }


    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        if ($product->getType() !== ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_DYNAMIC) {
            return;
        }

        $productTransfer = $this->productFacade->getAbstractProduct($product->getSku());

        $this->assignProductGroups($productTransfer, $product);

    }

    protected function assignProductGroups(AbstractProductInterface $productTransfer, PavProductDynamicImporterAbstractProductInterface $product) {
        $productGroupKeysToBeAssigned = $product->getProductGroupKeys();

        $assignedGroups = $this->productFacade->getAbstractProductGroups($productTransfer);
        $assignedProductGroupKeys = [];
        foreach ($assignedGroups as $group) {
            $assignedProductGroupKeys[$group->getKey()] = $group;
        }

        foreach ($productGroupKeysToBeAssigned as $key) {
            if (array_key_exists($key, $assignedProductGroupKeys)) {
                unset($assignedProductGroupKeys[$key]);
            }
            else {
                $productGroupTransfer = new ProductGroupTransfer();
                $productGroupTransfer->setKey($key);

                $this->productFacade->assignAbstractProductToGroup($productTransfer->getIdAbstractProduct(), $productGroupTransfer);
            }
        }

        foreach ($assignedProductGroupKeys as $productGroupToDelete) {
            $this->productFacade->removeAbstractProductFromGroup($productTransfer->getIdAbstractProduct(), $productGroupToDelete);
        }
    }

}