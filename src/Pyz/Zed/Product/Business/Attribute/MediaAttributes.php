<?php

namespace Pyz\Zed\Product\Business\Attribute;

use Generated\Shared\Transfer\PavProductDynamicImporterMediaTransfer;

class MediaAttributes
{

    /**
     * @var PavProductDynamicImporterMediaTransfer[]
     */
    protected $mediaTransfers;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @param PavProductDynamicImporterMediaTransfer[] $mediaTransfers
     * @param array $attributes
     */
    public function __construct(array $mediaTransfers, array $attributes)
    {
        $this->mediaTransfers = $mediaTransfers;
        $this->attributes = $attributes;
    }

    /**
     * @return PavProductDynamicImporterMediaTransfer[]
     */
    public function getMediaTransfers()
    {
        return $this->mediaTransfers;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

}
