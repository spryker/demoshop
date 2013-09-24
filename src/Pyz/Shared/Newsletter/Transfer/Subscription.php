<?php

namespace Pyz\Shared\Newsletter\Transfer;

use ProjectA\Shared\Newsletter\Transfer\Subscription as BaseSubscription;

class Subscription extends BaseSubscription
{

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var bool
     */
    protected $isRegistrationCoupon = false;
}
