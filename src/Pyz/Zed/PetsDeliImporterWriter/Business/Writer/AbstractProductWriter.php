<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterLocaleTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use SprykerEngine\Shared\Transfer\TransferInterface;
use SprykerFeature\Zed\Tax\Business\TaxFacade;

class AbstractProductWriter implements ProductWriterInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;
    protected $localeFacade;
    protected $taxFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param LocaleFacade $localeFacade
     * @param TaxFacade $taxFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        LocaleFacade $localeFacade,
        TaxFacade $taxFacade
    ) {
        $this->productFacade = $productFacade;
        $this->localeFacade = $localeFacade;
        $this->taxFacade = $taxFacade;

    }


    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractSku = $product->getSku();
        if ($this->productFacade->hasAbstractProduct($abstractSku)) {
            $abstractProduct = $this->productFacade->getAbstractProduct($abstractSku);
        } else {
            $abstractProduct = new AbstractProductTransfer();
            $abstractProduct->setSku($abstractSku);
        }

        $abstractProduct->setType($product->getType());


        $abstractProduct->setTaxSet($this->extractTaxSet($product->getTax()));
        $abstractProduct->setAttributes($this->extractAttributes($product));

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

            $mergedAttributes = $this->mergeAttributes(
                $importerLocale->getAttributes(),
                [
                    'url' => $importerLocale->getUrl(),
                    'media' => $importerLocale->getMedia()
                ]
            );
            $localeAttributeTransfer->setAttributes($mergedAttributes);
            $localeAttributeTransferList[] = $localeAttributeTransfer;
        }

        return new \ArrayObject($localeAttributeTransferList);

    }

    protected function extractTaxSet($tax)
    {
        $tax = (float)$tax;
        $taxSets = $this->taxFacade->getTaxSets();

        /** @var TaxSetTransfer $taxSet */
        foreach ($taxSets->getTaxSets() as $taxSet) {
            foreach ($taxSet->getTaxRates() as $taxRate) {
                $taxSetTaxRate = (float)$taxRate->getRate();
                if ($taxSetTaxRate === $tax) {
                    return $taxSet;
                }
            }
        }
        return null;
    }

    protected function extractAttributes(PavProductDynamicImporterAbstractProductInterface $product)
    {
        return $this->mergeAttributes(
            $product->getAttributes(),
            [
                'media' => $product->getMedia()
            ]
        );
    }

    protected function mergeAttributes(array $attributes, array $toMerge)
    {

        foreach ($toMerge as $key => $data) {
            if (!empty($data)) {
                if ($data instanceof \ArrayObject) {
                    $attributes[$key] = [];
                    /** @var TransferInterface $element */
                    foreach ($data as $element) {
                        $attributes[$key][] = $element->toArray();
                    }
                }
                elseif (is_string($data)) {
                    $attributes[$key] = $data;
                }
            }
        }
        return $attributes;

    }


}