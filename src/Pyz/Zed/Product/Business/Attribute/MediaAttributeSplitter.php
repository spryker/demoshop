<?php

namespace Pyz\Zed\Product\Business\Attribute;

use Generated\Shared\Transfer\PavProductDynamicImporterMediaTransfer;

class MediaAttributeSplitter
{

    /**
     * @var AttributeConverter
     */
    protected $attributeConverter;

    /**
     * @param AttributeConverterInterface $attributeConverter
     */
    public function __construct(AttributeConverterInterface $attributeConverter)
    {
        $this->attributeConverter = $attributeConverter;
    }

    /**
     * @param string|array $attributes
     */
    public function split($attributes)
    {
        if (is_string($attributes)) {
            $attributes = $this->attributeConverter->getAttributes($attributes);
        }

        return $this->splitAttributesAndMedia($attributes);
    }

    /**
     * @TODO: to be defined ..
     *
     * @return array
     */
    protected function getAttributeNameToMediaKeyMappings()
    {
        return [
            'media' => 'media',
        ];
    }

    /**
     * @param array $attributes
     *
     * @throws \Exception
     * @return MediaAttributes
     */
    protected function splitAttributesAndMedia(array $attributes)
    {
        $mediaData = [];

        foreach ($this->getAttributeNameToMediaKeyMappings() as $attributeName => $mediaKey) {
            if (array_key_exists($attributeName, $attributes)) {
                $mediaData = $attributes[$attributeName];
                unset($attributes[$attributeName]);
            }
        }

        return $this->createMediaAttributes($mediaData, $attributes);
    }

    /**
     * @param array $mediaData
     * @param array $attributes
     *
     * @return MediaAttributes
     */
    protected function createMediaAttributes(array $mediaData, array $attributes)
    {
        $mediaTransferCollection = $this->createMediaTransfers($mediaData);

        return new MediaAttributes($mediaTransferCollection, $attributes);
    }

    /**
     * @param array $mediaData
     *
     * @return PavProductDynamicImporterMediaTransfer[]
     */
    protected function createMediaTransfers(array $mediaData)
    {

        $mediaTransferCollection = [];
        foreach ($mediaData as $mediaEntry) {
            $mediaTransfer = new PavProductDynamicImporterMediaTransfer();
            $mediaTransfer->fromArray($mediaEntry, true);
            $mediaTransferCollection[] = $mediaTransfer;
        }
        return $mediaTransferCollection;
    }

}
