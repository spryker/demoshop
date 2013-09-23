<?php

namespace Pyz\Shared\Mail\Transfer;

class CustomerForgotPasswordConfirmation extends CustomerForgotPassword
{

    /**
     * @var string
     */
    protected $restorePasswordKey = null;
    protected $_restorePasswordKey = array('is_string');
}
