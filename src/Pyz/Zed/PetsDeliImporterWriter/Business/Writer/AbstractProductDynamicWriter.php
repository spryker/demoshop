<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamic\ProductDynamicConfig;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Product\Business\ProductFacade;

class AbstractProductDynamicWriter implements ProductWriterInterface
{

    /**
     * @var ProductFacade
     */
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
        if ($product->getType() !== ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_DYNAMIC) {
            return;
        }


    }


}