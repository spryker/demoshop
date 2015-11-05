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
     * @param AttributeConverter $attributeConverter
     */
    public function __construct(AttributeConverter $attributeConverter)
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
            'small_image' => 'thumbnail_url',
            'thumbnail' => 'thumbnail_url'
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
                $mediaData[$mediaKey] = $attributes[$attributeName];
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
        $mediaTransfer = $this->createMediaTransfer($mediaData);

        return new MediaAttributes($mediaTransfer, $attributes);
    }

    /**
     * @param array $mediaData
     *
     * @return PavProductDynamicImporterMediaTransfer
     */
    protected function createMediaTransfer(array $mediaData)
    {
        $mediaTransfer = new PavProductDynamicImporterMediaTransfer();
        $mediaTransfer->fromArray($mediaData, true);

        return $mediaTransfer;
    }

}
