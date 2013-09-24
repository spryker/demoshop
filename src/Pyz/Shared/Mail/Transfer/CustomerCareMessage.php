<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\TransferInterface\UniqueInterface;
use ProjectA\Shared\Mail\Transfer\Order;

class CustomerCareMessage extends Order implements UniqueInterface
{

    /**
     * @var string
     */
    protected $stateName = null;
    protected $_stateName = array('is_string');
}
