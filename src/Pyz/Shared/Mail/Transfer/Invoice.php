<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\Order;

class Invoice extends Order
{

    /**
     * @var \Pyz\Shared\Mail\Transfer\Address
     */
    protected $billingAddress = 'Pyz\Shared\Mail\Transfer\Address';
    protected $_billingAddress = array();

    /**
     * @var \Pyz\Shared\Mail\Transfer\Address
     */
    protected $shippingAddress = 'Pyz\Shared\Mail\Transfer\Address';
    protected $_shippingAddress = array();

    /**
     * @var \Pyz\Shared\Mail\Transfer\Item\Collection
     */
    protected $items = 'Pyz\Shared\Mail\Transfer\Item\Collection';
    protected $_items = array();

    /**
     * @var \Pyz\Shared\Sales\Transfer\Totals
     */
    protected $totals = 'Pyz\Shared\Sales\Transfer\Totals';
    protected $_totals = array();
}
