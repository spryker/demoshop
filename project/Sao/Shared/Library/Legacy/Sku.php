<?php

/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */
class Sao_Shared_Library_Legacy_Sku
{
    const PREFIX_PRODUCT_ID = 'P';
    const PREFIX_USER_ID = 'U';
    const PREFIX_USER_ART_ID = 'A';
    const PREFIX_CANVAS_WRAP_ID = 'W';
    const PREFIX_FRAME_TYPE_ID = 'F';
    const PREFIX_LIMITED_EDITION = 'L';

    /**
     * @var array
     */
    protected $optionParts = [
        self::PREFIX_CANVAS_WRAP_ID,
        self::PREFIX_FRAME_TYPE_ID
    ];

    /**
     * @var array
     */
    protected $configSkuParts = [
        self::PREFIX_USER_ID,
        self::PREFIX_USER_ART_ID
    ];

    /**
     * @var array
     */
    protected $skuParts = [];

    /**
     * @param string $sku (optional)
     */
    public function __construct($sku = null)
    {
        if (null !== $sku) {
            $this->parse($sku);
        }
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        if (isset($this->skuParts[self::PREFIX_PRODUCT_ID])) {
            return $this->skuParts[self::PREFIX_PRODUCT_ID];
        }
        return null;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        if (isset($this->skuParts[self::PREFIX_USER_ID])) {
            return $this->skuParts[self::PREFIX_USER_ID];
        }
        return null;
    }

    /**
     * @return int
     */
    public function getUserArtId()
    {
        if (isset($this->skuParts[self::PREFIX_USER_ART_ID])) {
            return $this->skuParts[self::PREFIX_USER_ART_ID];
        }
        return null;
    }

    /**
     * @return int
     */
    public function isLimitedEdition()
    {
        return isset($this->skuParts[self::PREFIX_LIMITED_EDITION]);
    }

    /**
     * @return int
     */
    public function getFrameTypeId()
    {
        if (isset($this->skuParts[self::PREFIX_FRAME_TYPE_ID])) {
            return $this->skuParts[self::PREFIX_FRAME_TYPE_ID];
        }
        return null;
    }

    /**
     * @return int
     */
    public function getCanvasWrapId()
    {
        if (isset($this->skuParts[self::PREFIX_CANVAS_WRAP_ID])) {
            return $this->skuParts[self::PREFIX_CANVAS_WRAP_ID];
        }
        return null;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->__toString();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->build();
    }

    /**
     * @return string
     */
    public function getConfigSku()
    {
        $skuParts = [];
        foreach ($this->configSkuParts as $part) {
            $skuParts[] = $part . $this->skuParts[$part];
        }

        return implode('-', $skuParts);
    }

    /**
     * @return string
     */
    public function getSimpleSku()
    {
        $skuParts = [];
        foreach ($this->skuParts as $part => $value) {
            if (!in_array($part, $this->optionParts)) {
                $skuParts[] = $part . $value;
            }
        }

        return implode('-', $skuParts);
    }

    /**
     * @return string
     */
    public function getMappedSku()
    {
        $skuParts = [];
        foreach ($this->skuParts as $part => $value) {
            if ($part === self::PREFIX_FRAME_TYPE_ID) {
                $value = Sao_Shared_Library_Legacy_FrameOptionMapping::mapLegacyFrameToCatalogFrame($value, $this->getProductId());
            }
            $skuParts[] = $part . $value;
        }

        return implode('-', $skuParts);
    }

    /**
     * @return string
     */
    public function build()
    {
        $skuParts = [];
        foreach ($this->skuParts as $part => $value) {
            $skuParts[] = $part . $value;
        }
        return implode('-', $skuParts);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->skuParts;
    }

    /**
     * @param $sku
     */
    protected function parse($sku)
    {
        $skuParts = explode('-', $sku);

        foreach ($skuParts as $part) {
            $prefix = substr($part, 0, 1);
            $value = substr($part, 1) ? : '';
            $this->skuParts[$prefix] = $value;
        }
    }
}
