<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;
use ProjectA\Shared\Sales\Transfer\Order;

class AccountingAwaitingRefund extends Order implements UniqueInterface
{

    /**
     * @var string
     */
    protected $customerName = null;
    protected $_customerName = array('is_string');

    /**
     * @var string
     */
    protected $customerEmail = null;
    protected $_customerEmail = array('is_string');

    /**
     * @var string
     */
    protected $itemName = null;
    protected $_itemName = array('is_string');

    /**
     * @var float
     */
    protected $itemPrice = null;
    protected $_itemPrice = array('is_float');

    /**
     * @var array
     */
    protected $orderComments = null;
    protected $_orderComments = array('is_array');

    /**
     * @var float
     */
    protected $refundAmount = null;
    protected $_refundAmount = array('is_float');

    /**
     * @var int
     */
    protected $itemId = null;
    protected $_itemId = array('is_int');

    public function getId()
    {
        return $this->getItemId();
    }
}
