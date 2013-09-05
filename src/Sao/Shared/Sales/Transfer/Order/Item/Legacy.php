<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Shared_Sales_Transfer_Order_Item_Legacy extends Sao_Shared_Sales_Transfer_Order_Item
{

    protected $fkCustomer = null;
    protected $_fkCustomer = array('is_int');

    protected $userArtId = null;
    protected $_userArtId = array('is_int');

    protected $editionIdentifier = null;
    protected $_editionIdentifier = array('is_int');

    protected $fkArtistSales = null;
    protected $_fkArtistSales = array('is_int');

    protected $impression = null;
    protected $_impression = array('is_int');

    protected $artistCost;
    protected $_artistCost = array('is_int');

    protected $artDiscounts;
    protected $_artDiscounts = array('is_array');

    protected $createdAt;
    protected $_createdAt = array('is_string');

    /**
     * @param $fkArtistSales
     * @return $this
     */
    public function setFkArtistSales($fkArtistSales)
    {
        $this->fkArtistSales = $fkArtistSales;
        return $this;
    }

    /**
     * @return null
     */
    public function getFkArtistSales()
    {
        return $this->fkArtistSales;
    }

    /**
     * @param $fkCustomer
     * @return $this
     */
    public function setFkCustomer($fkCustomer)
    {
        $this->fkCustomer = $fkCustomer;
        return $this;
    }

    /**
     * @return null
     */
    public function getFkCustomer()
    {
        return $this->fkCustomer;
    }

    /**
     * @param $userArtId
     * @return $this
     */
    public function setUserArtId($userArtId)
    {
        $this->userArtId = $userArtId;
        return $this;
    }

    /**
     * @return null
     */
    public function getUserArtId()
    {
        return $this->userArtId;
    }

    /**
     * @param $editionIdentifier
     * @return $this
     */
    public function setEditionIdentifier($editionIdentifier)
    {
        $this->editionIdentifier = $editionIdentifier;
        return $this;
    }

    /**
     * @return null
     */
    public function getEditionIdentifier()
    {
        return $this->editionIdentifier;
    }

    /**
     * @param $impression
     * @return $this
     */
    public function setImpression($impression)
    {
        $this->impression = $impression;
        return $this;
    }

    /**
     * @return null
     */
    public function getImpression()
    {
        return $this->impression;
    }

    /**
     * @return array
     */
    public function getArtDiscounts()
    {
        return $this->artDiscounts;
    }

    /**
     * @param array $artDiscounts
     */
    public function setArtDiscounts($artDiscounts)
    {
        $this->artDiscounts = $artDiscounts;
    }

    /**
     * @return mixed
     */
    public function getArtistCost()
    {
        return $this->artistCost;
    }

    /**
     * @param mixed $artistCost
     */
    public function setArtistCost($artistCost)
    {
        $this->artistCost = $artistCost;
    }

    /**
     * @param mixed $createdAt
     * @return Sao_Shared_Sales_Transfer_Order_Item_Legacy
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
