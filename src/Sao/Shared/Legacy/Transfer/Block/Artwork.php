<?php

class Sao_Shared_Legacy_Transfer_Block_Artwork extends ProjectA_Shared_Library_Abstract_Object
{

    /**
     * @var string
     */
    protected $sku = null;
    protected $_sku = ['is_string'];

    /**
     * @var int
     */
    protected $availability = null;
    protected $_availability = array('is_int');

    /**
     * @param $availability
     * @return Sao_Shared_Legacy_Transfer_Block_Artwork
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
        return $this;
    }

    /**
     * @return int
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param string $sku
     * @return Sao_Shared_Legacy_Transfer_Block_Artwork
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }
}
