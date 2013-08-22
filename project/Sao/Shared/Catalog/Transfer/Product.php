<?php

class Sao_Shared_Catalog_Transfer_Product extends ProjectA_Shared_Library_Abstract_Object
{
    protected $idCatalogProduct = null;
    protected $_idCatalogProduct = array('is_int');

    protected $name = null;
    protected $_name = array('is_string');

    protected $productName = null;
    protected $_productName = array('is_string');

    protected $listPrice = null;
    protected $_listPrice = array('is_int');

    protected $brand = null;
    protected $_brand = array('is_string');

    protected $description = null;
    protected $_description = array('is_string');

    protected $sku = null;
    protected $_sku = array('is_string');

    protected $url = null;
    protected $_url = array('is_string');

    protected $quantity = null;
    protected $_quantity = array('is_int');

    protected $price = null;
    protected $_price = array('is_int');

    protected $baseUrlKey = null;
    protected $_baseUrlKey = array('is_string');

    protected $image = null;
    protected $_image = array('is_array');

    protected $artSmall = null;
    protected $_artSmall = array('is_string');

    protected $artTinyCrop = null;
    protected $_artTinyCrop = array('is_string');

    protected $productCategory = null;
    protected $_productCategory = array('is_string');

    protected $productSet = null;
    protected $_productSet = array('is_string');

    protected $userId = null;
    protected $_userId = array('is_int');

    protected $artistFirstName = null;
    protected $_artistFirstName = array('is_string');

    protected $artistLastName = null;
    protected $_artistLastName = array('is_string');

    protected $productType = null;
    protected $_productType = array('is_string');

    protected $originRegion = null;
    protected $_originRegion = array('is_string');

    protected $originCountry = null;
    protected $_originCountry = array('is_string');

    protected $shipWidth = null;
    protected $_shipWidth = array('is_int');

    protected $shipHeight = null;
    protected $_shipHeight = array('is_int');

    /**
     * @return $idCatalogProduct
     */
    public function getIdCatalogProduct()
    {
        return $this->idCatalogProduct;
    }

    /**
     * @return $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return $listPrice
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * @return $brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return $sku
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return $baseUrlKey
     */
    public function getBaseUrlKey()
    {
        return $this->baseUrlKey;
    }

    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $idCatalogProduct
     * @return $this
     */
    public function setIdCatalogProduct($idCatalogProduct)
    {
        $this->idCatalogProduct = $idCatalogProduct;
        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param $listPrice
     * @return $this
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }

    /**
     * @param $brand
     * @return string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @param $description
     * @return string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param $sku
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @param $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param $baseUrlKey
     * @return $this
     */
    public function setBaseUrlKey($baseUrlKey)
    {
        $this->baseUrlKey = $baseUrlKey;
        return $this;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param $productName
     * @return $this
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @return null
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param $artTinyCrop
     * @return $this
     */
    public function setArtTinyCrop($artTinyCrop)
    {
        $this->artTinyCrop = $artTinyCrop;
        return $this;
    }

    /**
     * @return null
     */
    public function getArtTinyCrop()
    {
        return $this->artTinyCrop;
    }

    /**
     * @param $artSmall
     * @return $this
     */
    public function setArtSmall($artSmall)
    {
        $this->artSmall = $artSmall;
        return $this;
    }

    /**
     * @return null
     */
    public function getArtSmall()
    {
        return $this->artSmall;
    }

    /**
     * @param $productCategory
     * @return $this
     */
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;
        return $this;
    }

    /**
     * @return null
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * @param $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param null $artistFirstName
     */
    public function setArtistFirstName($artistFirstName)
    {
        $this->artistFirstName = $artistFirstName;
    }

    /**
     * @return null
     */
    public function getArtistFirstName()
    {
        return $this->artistFirstName;
    }

    /**
     * @param $artistLastName
     * @return $this
     */
    public function setArtistLastName($artistLastName)
    {
        $this->artistLastName = $artistLastName;
        return $this;
    }

    /**
     * @return null
     */
    public function getArtistLastName()
    {
        return $this->artistLastName;
    }

    /**
     * @param $productType
     * @return $this
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return null
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param $originCountry
     * @return $this
     */
    public function setOriginCountry($originCountry)
    {
        $this->originCountry = $originCountry;
        return $this;
    }

    /**
     * @return null
     */
    public function getOriginCountry()
    {
        return $this->originCountry;
    }

    /**
     * @param $originRegion
     * @return $this
     */
    public function setOriginRegion($originRegion)
    {
        $this->originRegion = $originRegion;
        return $this;
    }

    /**
     * @return null
     */
    public function getOriginRegion()
    {
        return $this->originRegion;
    }

    /**
     * @param $shipWidth
     * @return $this
     */
    public function setShipWidth($shipWidth)
    {
        $this->shipWidth = $shipWidth;
        return $this;
    }

    /**
     * @return null
     */
    public function getShipWidth()
    {
        return $this->shipWidth;
    }

    /**
     * @param $shipHeight
     * @return $this
     */
    public function setShipHeight($shipHeight)
    {
        $this->shipHeight = $shipHeight;
        return $this;
    }

    /**
     * @return null
     */
    public function getShipHeight()
    {
        return $this->shipHeight;
    }

    /**
     * @param $productSet
     * @return $this
     */
    public function setProductSet($productSet)
    {
        $this->productSet = $productSet;
        return $this;
    }

    /**
     * @return null
     */
    public function getProductSet()
    {
        return $this->productSet;
    }

}
