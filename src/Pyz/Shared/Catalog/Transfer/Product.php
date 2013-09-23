<?php

namespace Pyz\Shared\Catalog\Transfer;

use Generated\Shared\Catalog\Transfer\BaseProduct;

class Product extends BaseProduct
{

    /**
     * @var int
     */
    protected $idCatalogProduct = null;
    protected $_idCatalogProduct = array('is_int');

    /**
     * @var string
     */
    protected $name = null;
    protected $_name = array('is_string');

    /**
     * @var string
     */
    protected $productName = null;
    protected $_productName = array('is_string');

    /**
     * @var int
     */
    protected $listPrice = null;
    protected $_listPrice = array('is_int');

    /**
     * @var string
     */
    protected $brand = null;
    protected $_brand = array('is_string');

    /**
     * @var string
     */
    protected $description = null;
    protected $_description = array('is_string');

    /**
     * @var string
     */
    protected $sku = null;
    protected $_sku = array('is_string');

    /**
     * @var string
     */
    protected $url = null;
    protected $_url = array('is_string');

    /**
     * @var int
     */
    protected $quantity = null;
    protected $_quantity = array('is_int');

    /**
     * @var int
     */
    protected $price = null;
    protected $_price = array('is_int');

    /**
     * @var string
     */
    protected $baseUrlKey = null;
    protected $_baseUrlKey = array('is_string');

    /**
     * @var array
     */
    protected $image = null;
    protected $_image = array('is_array');

    /**
     * @var string
     */
    protected $artSmall = null;
    protected $_artSmall = array('is_string');

    /**
     * @var string
     */
    protected $artTinyCrop = null;
    protected $_artTinyCrop = array('is_string');

    /**
     * @var string
     */
    protected $productCategory = null;
    protected $_productCategory = array('is_string');

    /**
     * @var string
     */
    protected $productSet = null;
    protected $_productSet = array('is_string');

    /**
     * @var int
     */
    protected $userId = null;
    protected $_userId = array('is_int');

    /**
     * @var string
     */
    protected $artistFirstName = null;
    protected $_artistFirstName = array('is_string');

    /**
     * @var string
     */
    protected $artistLastName = null;
    protected $_artistLastName = array('is_string');

    /**
     * @var string
     */
    protected $productType = null;
    protected $_productType = array('is_string');

    /**
     * @var string
     */
    protected $originRegion = null;
    protected $_originRegion = array('is_string');

    /**
     * @var string
     */
    protected $originCountry = null;
    protected $_originCountry = array('is_string');

    /**
     * @var int
     */
    protected $shipWidth = null;
    protected $_shipWidth = array('is_int');

    /**
     * @var int
     */
    protected $shipHeight = null;
    protected $_shipHeight = array('is_int');
}
