<?php

namespace Pyz\Shared\Sales\Transfer\Order;

use ProjectA\Shared\Sales\Transfer\Order\Address as BaseAddress;

class Address extends BaseAddress
{

    /**
     * @var string
     */
    protected $region = null;
    protected $_region = array('is_string');
}
