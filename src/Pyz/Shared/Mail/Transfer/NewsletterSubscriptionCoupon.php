<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\Customer;

class NewsletterSubscriptionCoupon extends Customer
{

    /**
     * @var string
     */
    protected $couponCode = null;
    protected $_couponCode = array('is_string');
}
