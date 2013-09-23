<?php

namespace Pyz\Shared\Sales\Transfer;

use ProjectA\Shared\Sales\Transfer\Totals as BaseTotals;

class Totals extends BaseTotals
{

    /**
     * @var int
     */
    protected $subtotalWithoutItemExpenses = null;
    protected $_subtotalWithoutItemExpenses = array();

    /**
     * @var int
     */
    protected $shippingCostsWithoutDiscounts = null;
    protected $_shippingCostsWithoutDiscounts = array();

    /**
     * @var int
     */
    protected $freightCosts = null;
    protected $_freightCosts = array('is_int');

    /**
     * @var int
     */
    protected $customsAndDuties = null;
    protected $_customsAndDuties = array('is_int');

    /**
     * @var int
     */
    protected $stateTaxAmount = null;
    protected $_stateTaxAmount = array('is_int');

    /**
     * @var int
     */
    protected $cartTotalForCartPage = null;
    protected $_cartTotalForCartPage = array('is_int');

    /**
     * @var int
     */
    protected $cartTotalForReviewPage = null;
    protected $_cartTotalForReviewPage = array('is_int');
}
