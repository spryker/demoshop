<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\Customer;

class CustomerForgotPassword extends Customer
{

    /**
     * @var string
     */
    protected $restorePasswordKey = null;
    protected $_restorePasswordKey = array('is_string');
}
