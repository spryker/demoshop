<?php

namespace Pyz\Shared\Mail\Transfer\Cart\Abandoned;

use Pyz\Shared\Mail\Transfer\Mail;

class Item extends Mail
{

    /**
     * @var string
     */
    protected $image;
    protected $_image = array('is_string');

    /**
     * @varstring
     */
    protected $name;
    protected $_name = array('is_string');

    /**
     * @var string
     */
    protected $artistName;
    protected $_artistName = array('is_string');

    /**
     * @var string
     */
    protected $subText;
    protected $_subText = array('is_string');

    /**
     * @var string
     */
    protected $price;
    protected $_price = array('is_int');

    /**
     * @var string
     */
    protected $formattedPrice;
    protected $_formattedPrice = array('is_string');
}
