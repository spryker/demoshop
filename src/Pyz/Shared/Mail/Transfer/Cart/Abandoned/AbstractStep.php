<?php

namespace Pyz\Shared\Mail\Transfer\Cart\Abandoned;

use Pyz\Shared\Mail\Transfer\Mail;

class AbstractStep extends Mail
{

    /**
     * @var int
     */
    protected $id;
    protected $_id = array('is_int');

    /**
     * @var Pyz\Shared\Mail\Transfer\Item\Collection
     */
    protected $cartItems = 'Pyz\Shared\Mail\Transfer\Item\Collection';
    protected $_cartItems = array();

    /**
     * @var bool
     */
    protected $hasOriginal;
    protected $_hasOriginal = array('is_bool');

    /**
     * @var string
     */
    protected $code;
    protected $_code = array('is_string');

    /**
     * @var string
     */
    protected $codeValidTo;
    protected $_codeValidTo = array('is_string');

    /**
     * @var string
     */
    protected $yvesUrl;
    protected $_yvesUrl = array('is_string');

    /**
     * @var string
     */
    protected $staticMediaUrl;
    protected $_staticMediaUrl = array('is_string');

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
     * @var bool
     */
    protected $flagFetchLegacyUserError;
    protected $_flagFetchLegacyUserError = array('is_bool');
}
