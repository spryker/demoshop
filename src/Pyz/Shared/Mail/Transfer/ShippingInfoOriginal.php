<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;
use ProjectA\Shared\Mail\Transfer\Order;

class ShippingInfoOriginal extends Order implements UniqueInterface
{

    /**
     * @var string
     */
    protected $artTitle;
    protected $_artTitle = array('is_string');

    /**
     * @var array
     */
    protected $trackingUrls;
    protected $_trackingUrls = array('is_array');
}
