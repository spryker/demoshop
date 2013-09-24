<?php

namespace Pyz\Shared\Sales\Transfer;

use ProjectA\Shared\Sales\Transfer\Discount as BaseDiscount;

class Discount extends BaseDiscount
{

    /**
     * @var int
     */
    protected $saatchiAmount = null;
    protected $_saatchiAmount = array('is_int');

    /**
     * @var int
     */
    protected $artistAmount = null;
    protected $_artistAmount = array('is_int');
}
