<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterLocaleTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Business\ProductFacade;

class AbstractProductWriter implements ProductWriterInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;
    protected $productDynamicFacade;
    protected $localeFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param ProductDynamicFacade $productDynamicFacade
     * @param LocaleFacade $localeFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        ProductDynamicFacade $productDynamicFacade,
        LocaleFacade $localeFacade
    ) {
        $this->productFacade = $productFacade;
        $this->productDynamicFacade = $productDynamicFacade;
        $this->localeFacade = $localeFacade;

    }


    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractSku = $product->getSku();
        if ($this->productFacade->hasAbstractProduct($abstractSku)) {
            $abstractProduct = $this->productFacade->getAbstractProduct($abstractSku);
        }
        else {
            $abstractProduct = new AbstractProductTransfer();
            $abstractProduct->setSku($abstractSku);
        }

        $abstractProduct->setAttributes($product->getAttributes());

        $abstractProduct->setLocalizedAttributes($this->extractLocalizedAttributes($product->getLocales()));

        $idAbstractProduct = $this->productFacade->saveAbstractProduct($abstractProduct);



    }

    /**
     * @param \ArrayObject|PavProductDynamicImporterLocaleTransfer[] $importerLocales
     * @return \Generated\Shared\Transfer\LocalizedAttributesTransfer[]
     */
    private function extractLocalizedAttributes(\ArrayObject $importerLocales)
    {
        $localeAttributeTransferList = [];

        foreach ($importerLocales as $importerLocale) {
            $localeTransfer = $this->localeFacade->getLocale($importerLocale->getLocale());


            $localeAttributeTransfer = new LocalizedAttributesTransfer();
            $localeAttributeTransfer->setLocale($localeTransfer);
            $localeAttributeTransfer->setName('test123');
            $localeAttributeTransfer->setAttributes($importerLocale->getAttributes());
            $localeAttributeTransferList[] = $localeAttributeTransfer;
        }

        return new \ArrayObject($localeAttributeTransferList);

    }


}