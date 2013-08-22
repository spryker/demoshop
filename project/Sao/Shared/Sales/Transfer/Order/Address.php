<?php

class Sao_Shared_Sales_Transfer_Order_Address extends ProjectA_Shared_Sales_Transfer_Order_Address
{
    protected $region = null;
    protected $_region = array('is_string');

    /**
     * @param $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }
}
