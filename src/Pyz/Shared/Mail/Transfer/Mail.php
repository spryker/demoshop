<?php

namespace Pyz\Shared\Mail\Transfer;

use ProjectA\Shared\Mail\Transfer\Mail as BaseMail;

/**
 * @version
 */
class Mail extends BaseMail
{

    /**
     * @var  string
     */
    protected $salutation = null;
    protected $_salutation = array('is_string');

    /**
     * @var string
     */
    protected $lastName = null;
    protected $_lastName = array('is_string');

    /**
     * @var string
     */
    protected $firstName = null;
    protected $_firstName = array('is_string');
}
