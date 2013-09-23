<?php

namespace Pyz\Shared\Sales\Transfer\Order;
use ProjectA\Shared\Sales\Transfer\Order\Item as BaseItem;

class Item extends BaseItem
{

    /**
     * @var string
     */
    protected $uniqueQuoteKey;
    protected $_uniqueQuoteKey = ['is_string'];

    /**
     * @var string
     */
    protected $uniqueItemId;
    protected $_uniqueItemId = ['is_string'];

    /**
     * @var \Pyz\Shared\Catalog\Transfer\Product
     */
    protected $product = 'Pyz\Shared\Catalog\Transfer\Product';
    protected $_product = array();

    /**
     * @var bool
     */
    protected $isMerged = null;
    protected $_isMerged = array();

    /**
     * @var null
     */
    protected $totalDiscountOnItem = null;
    protected $_totalDiscountOnItem = array();
}
