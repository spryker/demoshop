<?php

class Sao_Shared_Sales_Transfer_Discount extends ProjectA_Shared_Sales_Transfer_Discount
{
    protected $saatchiAmount = null;
    protected $_saatchiAmount = array('is_int');

    protected $artistAmount = null;
    protected $_artistAmount = array('is_int');

    /**
     * @param int $saatchiAmount
     *
     * @return ProjectA_Shared_Sales_Transfer_Order_ItemDiscount
     */
    public function setSaatchiAmount($saatchiAmount)
    {
        $this->saatchiAmount = $saatchiAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getSaatchiAmount()
    {
        return $this->saatchiAmount;
    }

    /**
     * @param int $artistAmount
     *
     * @return ProjectA_Shared_Sales_Transfer_Order_ItemDiscount
     */
    public function setArtistAmount($artistAmount)
    {
        $this->artistAmount = $artistAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getArtistAmount()
    {
        return $this->artistAmount;
    }

}