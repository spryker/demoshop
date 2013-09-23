<?php

namespace Pyz\Shared\Sales\Transfer;

use ProjectA\Shared\Sales\Transfer\Order as BaseOrder;
use ProjectA\Shared\Sales\Transfer\Order\Item\Collection;

class Order extends BaseOrder
{

    /**
     * @var string
     */
    protected $os = null;
    protected $_os = array('is_string');

    /**
     * @var string
     */
    protected $redirectUrl = null;
    protected $_redirectUrl = array();

    /**
     * @var \ProjectA\Shared\Sales\Transfer\Order\Item\Collection
     */
    protected $itemsOutOfStock = 'Project\Shared\Sales\Transfer\Order\Item\Collection';
    protected $_itemsOutOfStock = array();

    /**
     * @var int
     */
    protected $legacyUserId = null;
    protected $_legacyUserId = array('is_int');

    /**
     * @var null
     */
    protected $isManualCheckout = null;
    protected $_isManualCheckout = array();

    /**
     * @var null
     */
    protected $manualCheckoutForced = null;
    protected $_manualCheckoutForced = array();

    /**
     * @var null
     */
    protected $checkoutWorkflow = null;
    protected $_checkoutWorkflow = array('is_string');

    /**
     * @var null
     */
    protected $clearSessionCart = null;
    protected $_clearSessionCart = array();

    /**
     * @param Collection $items
     *
     * @return Order
     */
    public function setItemsOutOfStock(Collection $items)
    {
        // create empty collection - disabling Out of stock feature. Task #350
        $this->itemsOutOfStock = new Collection();
        return $this;
    }
}
