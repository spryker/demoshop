<?php

namespace Pyz\Shared\Mail\Transfer\Cart\Abandoned;

class Unsubscribe extends \ProjectA_Shared_Library_Abstract_Object
{

    /**
     * @var string
     */
    protected $unsubscribeHash;
    protected $_unsubscribeHash = array('is_string');

    /**
     * @var int
     */
    protected $cartUserId;
    protected $_cartUserId = array('is_int');

    /**
     * @var string
     */
    protected $email;
    protected $_email = array('is_string');
}
