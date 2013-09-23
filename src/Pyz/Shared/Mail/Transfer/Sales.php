<?php

namespace Pyz\Shared\Mail\Transfer;

abstract class Sales extends Mail
{

    /**
     * @var string
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

    /**
     * @var \Pyz\Shared\Mail\Transfer\Address
     */
    protected $billingAddress = 'Pyz\Shared\Mail\Transfer\Address';
    protected $_billingAddress = array();

    /**
     * @var \Pyz\Shared\Mail\Transfer\Address
     */
    protected $shippingAddress = 'Pyz\Shared\Mail\Transfer\Address';
    protected $_shippingAddress = array();

    /**
     * @var \Pyz\Shared\Mail\Transfer\Item\Collection
     */
    protected $items = 'Pyz\Shared\Mail\Transfer\Item\Collection';
    protected $_items = array();

    /**
     * @var \Pyz\Shared\Sales\Transfer\Totals
     */
    protected $totals = 'Pyz\Shared\Sales\Transfer\Totals';
    protected $_totals = array();

    /**
     * @var null string
     */
    protected $paymentMethod = null;
    protected $_paymentMethod = array('is_string');
}
