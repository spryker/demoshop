<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterLocaleInterface;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterLocaleTransfer;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Locale\Business\LocaleFacade;
use SprykerEngine\Shared\Transfer\TransferInterface;

abstract class DefaultProductWriter implements ProductWriterInterface
{

    /** @var  LocaleFacade */
    protected $localeFacade;

    /**
     * @param PavProductDynamicImporterAbstractProductInterface|PavProductDynamicImporterConcreteProductInterface $product
     * @return array
     */
    protected function extractAttributes($product)
    {
        $attributes = $product->getAttributes();

        if ($attributes instanceof \ArrayObject) {
            $attributes = (array)$attributes;
        }

        if (count($product->getMedia()) > 0) {
            $attributes = $this->mergeAttributes(
                $attributes,
                [
                    'media' => $product->getMedia()
                ]
            );
        }
        return $attributes;
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
                } elseif (is_string($data)) {
                    $attributes[$key] = $data;
                }
            }
        }
        return $attributes;

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

            $attributes = $importerLocale->getAttributes();
            if ($attributes instanceof \ArrayObject) {
                $attributes = (array)$attributes;
            }
            $mergedAttributes = $this->mergeAttributes(
                $attributes,
                $this->getLocalizedAttributesToBeMerged($importerLocale)
            );
            $localeAttributeTransfer->setAttributes($mergedAttributes);
            $localeAttributeTransferList[] = $localeAttributeTransfer;
        }

        return new \ArrayObject($localeAttributeTransferList);

    }

    protected abstract function getLocalizedAttributesToBeMerged(PavProductDynamicImporterLocaleInterface $importerLocale);

}