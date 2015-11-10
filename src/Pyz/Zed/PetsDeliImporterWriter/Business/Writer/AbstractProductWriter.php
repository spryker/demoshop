<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterAbstractProductTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterLocaleTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use SprykerFeature\Zed\Tax\Business\TaxFacade;

class AbstractProductWriter implements ProductWriterInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;
    protected $productDynamicFacade;
    protected $localeFacade;
    protected $taxFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param ProductDynamicFacade $productDynamicFacade
     * @param LocaleFacade $localeFacade
     * @param TaxFacade $taxFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        ProductDynamicFacade $productDynamicFacade,
        LocaleFacade $localeFacade,
        TaxFacade $taxFacade
    ) {
        $this->productFacade = $productFacade;
        $this->productDynamicFacade = $productDynamicFacade;
        $this->localeFacade = $localeFacade;
        $this->taxFacade = $taxFacade;

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

        $abstractProduct->setType($product->getType());


        $abstractProduct->setTaxSet($this->extractTaxSet($product->getTax()));
        $abstractProduct->setAttributes($product->getAttributes());
        $abstractProduct->setLocalizedAttributes($this->extractLocalizedAttributes($product->getLocales()));
        $this->productFacade->saveAbstractProduct($abstractProduct);
    }

    /**
     * @param \ArrayObject|PavProductDynamicImporterLocaleTransfer[] $importerLocales
     * @return \Generated\Shared\Transfer\LocalizedAttributesTransfer[]
     */
    protected function extractLocalizedAttributes(\ArrayObject $importerLocales)
    {
        $localeAttributeTransferList = [];

        foreach ($importerLocales as $importerLocale) {
            $localeTransfer = $this->localeFacade->getLocale($importerLocale->getLocale());


            $localeAttributeTransfer = new LocalizedAttributesTransfer();
            $localeAttributeTransfer->setLocale($localeTransfer);
            $localeAttributeTransfer->setName($importerLocale->getName());
            $localeAttributeTransfer->setAttributes($importerLocale->getAttributes());
            $localeAttributeTransferList[] = $localeAttributeTransfer;
        }

        return new \ArrayObject($localeAttributeTransferList);

    }

    protected function extractTaxSet($tax)
    {
        $tax = floatval($tax);
        $taxSets = $this->taxFacade->getTaxSets();

        /** @var TaxSetTransfer $taxSet */
        foreach ($taxSets->getTaxSets() as $taxSet) {
            foreach ($taxSet->getTaxRates() as $taxRate) {
                $taxSetTaxRate = floatval($taxRate->getRate());
                if ($taxSetTaxRate === $tax) {
                    return $taxSet;
                }
            }
        }
        return null;
    }


}