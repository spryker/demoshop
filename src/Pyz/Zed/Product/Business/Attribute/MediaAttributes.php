<?php

namespace Pyz\Zed\Product\Business\Attribute;

use Generated\Shared\Transfer\PavProductDynamicImporterMediaTransfer;

class MediaAttributes
{

    /**
     * @var PavProductDynamicImporterMediaTransfer
     */
    protected $mediaTransfer;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @param PavProductDynamicImporterMediaTransfer $mediaTransfer
     * @param array $attributes
     */
    public function __construct(PavProductDynamicImporterMediaTransfer $mediaTransfer, array $attributes)
    {
        $this->mediaTransfer = $mediaTransfer;
        $this->attributes = $attributes;
    }

    /**
     * @return PavProductDynamicImporterMediaTransfer
     */
    public function getMediaTransfer()
    {
        return $this->mediaTransfer;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

}
