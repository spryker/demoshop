<?php


/**
 * Base class that represents a row from the 'sao_fulfillment_quote' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuote extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_quote field.
     * @var        int
     */
    protected $id_quote;

    /**
     * The value for the fk_sales_order field.
     * @var        int
     */
    protected $fk_sales_order;

    /**
     * The value for the fk_fulfillment_provider field.
     * @var        int
     */
    protected $fk_fulfillment_provider;

    /**
     * The value for the quote_id field.
     * @var        string
     */
    protected $quote_id;

    /**
     * The value for the fk_shipping_agent field.
     * @var        int
     */
    protected $fk_shipping_agent;

    /**
     * The value for the shipping_product field.
     * @var        string
     */
    protected $shipping_product;

    /**
     * The value for the shipping_price field.
     * @var        int
     */
    protected $shipping_price;

    /**
     * The value for the shipping_freight field.
     * @var        int
     */
    protected $shipping_freight;

    /**
     * The value for the shipping_tax_duties field.
     * @var        int
     */
    protected $shipping_tax_duties;

    /**
     * The value for the shipping_currency_code field.
     * @var        string
     */
    protected $shipping_currency_code;

    /**
     * The value for the packing_slip_url_front field.
     * @var        string
     */
    protected $packing_slip_url_front;

    /**
     * The value for the packing_slip_url_back field.
     * @var        string
     */
    protected $packing_slip_url_back;

    /**
     * The value for the provider_order_number field.
     * @var        string
     */
    protected $provider_order_number;

    /**
     * The value for the internal_order_number field.
     * @var        string
     */
    protected $internal_order_number;

    /**
     * The value for the order_timestamp field.
     * @var        string
     */
    protected $order_timestamp;

    /**
     * The value for the is_deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_deleted;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        SaoFulfillmentShippingAgent
     */
    protected $aShippingAgent;

    /**
     * @var        PacSalesOrder
     */
    protected $aOrder;

    /**
     * @var        SaoFulfillmentProvider
     */
    protected $aProvider;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem[] Collection to store aggregation of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects.
     */
    protected $collQuoteItems;
    protected $collQuoteItemsPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[] Collection to store aggregation of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects.
     */
    protected $collTrackings;
    protected $collTrackingsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects.
     */
    protected $collItems;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $itemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $quoteItemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $trackingsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_deleted = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuote object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_quote] column value.
     *
     * @return int
     */
    public function getIdQuote()
    {
        return $this->id_quote;
    }

    /**
     * Get the [fk_sales_order] column value.
     *
     * @return int
     */
    public function getFkSalesOrder()
    {
        return $this->fk_sales_order;
    }

    /**
     * Get the [fk_fulfillment_provider] column value.
     *
     * @return int
     */
    public function getFkFulfillmentProvider()
    {
        return $this->fk_fulfillment_provider;
    }

    /**
     * Get the [quote_id] column value.
     * needs to be set for tracking
     * @return string
     */
    public function getQuoteId()
    {
        return $this->quote_id;
    }

    /**
     * Get the [fk_shipping_agent] column value.
     *
     * @return int
     */
    public function getFkShippingAgent()
    {
        return $this->fk_shipping_agent;
    }

    /**
     * Get the [shipping_product] column value.
     *
     * @return string
     */
    public function getShippingProduct()
    {
        return $this->shipping_product;
    }

    /**
     * Get the [shipping_price] column value.
     *
     * @return int
     */
    public function getShippingPrice()
    {
        return $this->shipping_price;
    }

    /**
     * Get the [shipping_freight] column value.
     *
     * @return int
     */
    public function getShippingFreight()
    {
        return $this->shipping_freight;
    }

    /**
     * Get the [shipping_tax_duties] column value.
     *
     * @return int
     */
    public function getShippingTaxDuties()
    {
        return $this->shipping_tax_duties;
    }

    /**
     * Get the [shipping_currency_code] column value.
     *
     * @return string
     */
    public function getShippingCurrencyCode()
    {
        return $this->shipping_currency_code;
    }

    /**
     * Get the [packing_slip_url_front] column value.
     *
     * @return string
     */
    public function getPackingSlipUrlFront()
    {
        return $this->packing_slip_url_front;
    }

    /**
     * Get the [packing_slip_url_back] column value.
     *
     * @return string
     */
    public function getPackingSlipUrlBack()
    {
        return $this->packing_slip_url_back;
    }

    /**
     * Get the [provider_order_number] column value.
     *
     * @return string
     */
    public function getProviderOrderNumber()
    {
        return $this->provider_order_number;
    }

    /**
     * Get the [internal_order_number] column value.
     *
     * @return string
     */
    public function getInternalOrderNumber()
    {
        return $this->internal_order_number;
    }

    /**
     * Get the [optionally formatted] temporal [order_timestamp] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getOrderTimestamp($format = 'Y-m-d H:i:s')
    {
        if ($this->order_timestamp === null) {
            return null;
        }

        if ($this->order_timestamp === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->order_timestamp);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->order_timestamp, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [is_deleted] column value.
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id_quote] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setIdQuote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_quote !== $v) {
            $this->id_quote = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE;
        }


        return $this;
    } // setIdQuote()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [fk_fulfillment_provider] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setFkFulfillmentProvider($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_fulfillment_provider !== $v) {
            $this->fk_fulfillment_provider = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER;
        }

        if ($this->aProvider !== null && $this->aProvider->getIdProvider() !== $v) {
            $this->aProvider = null;
        }


        return $this;
    } // setFkFulfillmentProvider()

    /**
     * Set the value of [quote_id] column.
     * needs to be set for tracking
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setQuoteId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->quote_id !== $v) {
            $this->quote_id = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID;
        }


        return $this;
    } // setQuoteId()

    /**
     * Set the value of [fk_shipping_agent] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setFkShippingAgent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_shipping_agent !== $v) {
            $this->fk_shipping_agent = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT;
        }

        if ($this->aShippingAgent !== null && $this->aShippingAgent->getIdShippingAgent() !== $v) {
            $this->aShippingAgent = null;
        }


        return $this;
    } // setFkShippingAgent()

    /**
     * Set the value of [shipping_product] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setShippingProduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->shipping_product !== $v) {
            $this->shipping_product = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT;
        }


        return $this;
    } // setShippingProduct()

    /**
     * Set the value of [shipping_price] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setShippingPrice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->shipping_price !== $v) {
            $this->shipping_price = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE;
        }


        return $this;
    } // setShippingPrice()

    /**
     * Set the value of [shipping_freight] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setShippingFreight($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->shipping_freight !== $v) {
            $this->shipping_freight = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT;
        }


        return $this;
    } // setShippingFreight()

    /**
     * Set the value of [shipping_tax_duties] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setShippingTaxDuties($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->shipping_tax_duties !== $v) {
            $this->shipping_tax_duties = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES;
        }


        return $this;
    } // setShippingTaxDuties()

    /**
     * Set the value of [shipping_currency_code] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setShippingCurrencyCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->shipping_currency_code !== $v) {
            $this->shipping_currency_code = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE;
        }


        return $this;
    } // setShippingCurrencyCode()

    /**
     * Set the value of [packing_slip_url_front] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setPackingSlipUrlFront($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->packing_slip_url_front !== $v) {
            $this->packing_slip_url_front = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT;
        }


        return $this;
    } // setPackingSlipUrlFront()

    /**
     * Set the value of [packing_slip_url_back] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setPackingSlipUrlBack($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->packing_slip_url_back !== $v) {
            $this->packing_slip_url_back = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK;
        }


        return $this;
    } // setPackingSlipUrlBack()

    /**
     * Set the value of [provider_order_number] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setProviderOrderNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->provider_order_number !== $v) {
            $this->provider_order_number = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER;
        }


        return $this;
    } // setProviderOrderNumber()

    /**
     * Set the value of [internal_order_number] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setInternalOrderNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->internal_order_number !== $v) {
            $this->internal_order_number = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER;
        }


        return $this;
    } // setInternalOrderNumber()

    /**
     * Sets the value of [order_timestamp] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setOrderTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->order_timestamp !== null || $dt !== null) {
            $currentDateAsString = ($this->order_timestamp !== null && $tmpDt = new DateTime($this->order_timestamp)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->order_timestamp = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP;
            }
        } // if either are not null


        return $this;
    } // setOrderTimestamp()

    /**
     * Sets the value of the [is_deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setIsDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_deleted !== $v) {
            $this->is_deleted = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->is_deleted !== false) {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_quote = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_sales_order = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_fulfillment_provider = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->quote_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->fk_shipping_agent = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->shipping_product = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->shipping_price = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->shipping_freight = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->shipping_tax_duties = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->shipping_currency_code = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->packing_slip_url_front = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->packing_slip_url_back = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->provider_order_number = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->internal_order_number = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->order_timestamp = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->is_deleted = ($row[$startcol + 15] !== null) ? (boolean) $row[$startcol + 15] : null;
            $this->created_at = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->updated_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 18; // 18 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aOrder !== null && $this->fk_sales_order !== $this->aOrder->getIdSalesOrder()) {
            $this->aOrder = null;
        }
        if ($this->aProvider !== null && $this->fk_fulfillment_provider !== $this->aProvider->getIdProvider()) {
            $this->aProvider = null;
        }
        if ($this->aShippingAgent !== null && $this->fk_shipping_agent !== $this->aShippingAgent->getIdShippingAgent()) {
            $this->aShippingAgent = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aShippingAgent = null;
            $this->aOrder = null;
            $this->aProvider = null;
            $this->collQuoteItems = null;

            $this->collTrackings = null;

            $this->collItems = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                // lumberjack behavior
                
                if ($affectedRows > 0) {
                    $blacklistedEntities = array (
                );
                
                    if (!in_array(get_class($this), $blacklistedEntities)) {
                        $id = $this->getPrimaryKey();
                        $id = is_null($id) ? 0 : $id;
                
                        // Fix an issue when having multiple primary keys
                        if (is_array($id)) {
                            $id = implode(',', $id);
                        }
                
                        $lumberjack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
                        $lumberjack->addField("entityData", $this->toArray());
                        $lumberjack->addField("entity", get_class($this));
                        $lumberjack->addField("entityId", $id);
                        $lumberjack->addField("affectedRows", $affectedRows);
                
                        $authIdentity = ProjectA_Zed_Auth_Component_Model_Auth::getInstance()->getIdentity();
                        if (isset($authIdentity) && $authIdentity instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
                            $lumberjack->addField("aclUserName", $authIdentity->getUsername());
                        }
                
                        $subType = $isInsert ? "insert" : "update";
                        $lumberjack->send(ProjectA_Shared_Lumberjack_Code_Log_Types::SAVE, get_class($this) . " id:" . $id . " " . $subType, $subType);
                    }
                }

                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aShippingAgent !== null) {
                if ($this->aShippingAgent->isModified() || $this->aShippingAgent->isNew()) {
                    $affectedRows += $this->aShippingAgent->save($con);
                }
                $this->setShippingAgent($this->aShippingAgent);
            }

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

            if ($this->aProvider !== null) {
                if ($this->aProvider->isModified() || $this->aProvider->isNew()) {
                    $affectedRows += $this->aProvider->save($con);
                }
                $this->setProvider($this->aProvider);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->itemsScheduledForDeletion !== null) {
                if (!$this->itemsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->itemsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    QuoteItemQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->itemsScheduledForDeletion = null;
                }

                foreach ($this->getItems() as $item) {
                    if ($item->isModified()) {
                        $item->save($con);
                    }
                }
            } elseif ($this->collItems) {
                foreach ($this->collItems as $item) {
                    if ($item->isModified()) {
                        $item->save($con);
                    }
                }
            }

            if ($this->quoteItemsScheduledForDeletion !== null) {
                if (!$this->quoteItemsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery::create()
                        ->filterByPrimaryKeys($this->quoteItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quoteItemsScheduledForDeletion = null;
                }
            }

            if ($this->collQuoteItems !== null) {
                foreach ($this->collQuoteItems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trackingsScheduledForDeletion !== null) {
                if (!$this->trackingsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create()
                        ->filterByPrimaryKeys($this->trackingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trackingsScheduledForDeletion = null;
                }
            }

            if ($this->collTrackings !== null) {
                foreach ($this->collTrackings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE;
        if (null !== $this->id_quote) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE)) {
            $modifiedColumns[':p' . $index++]  = '`id_quote`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_fulfillment_provider`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`quote_id`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT)) {
            $modifiedColumns[':p' . $index++]  = '`fk_shipping_agent`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_product`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_price`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_freight`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_tax_duties`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_currency_code`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT)) {
            $modifiedColumns[':p' . $index++]  = '`packing_slip_url_front`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK)) {
            $modifiedColumns[':p' . $index++]  = '`packing_slip_url_back`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`provider_order_number`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`internal_order_number`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = '`order_timestamp`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_fulfillment_quote` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_quote`':
                        $stmt->bindValue($identifier, $this->id_quote, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order`':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case '`fk_fulfillment_provider`':
                        $stmt->bindValue($identifier, $this->fk_fulfillment_provider, PDO::PARAM_INT);
                        break;
                    case '`quote_id`':
                        $stmt->bindValue($identifier, $this->quote_id, PDO::PARAM_STR);
                        break;
                    case '`fk_shipping_agent`':
                        $stmt->bindValue($identifier, $this->fk_shipping_agent, PDO::PARAM_INT);
                        break;
                    case '`shipping_product`':
                        $stmt->bindValue($identifier, $this->shipping_product, PDO::PARAM_STR);
                        break;
                    case '`shipping_price`':
                        $stmt->bindValue($identifier, $this->shipping_price, PDO::PARAM_INT);
                        break;
                    case '`shipping_freight`':
                        $stmt->bindValue($identifier, $this->shipping_freight, PDO::PARAM_INT);
                        break;
                    case '`shipping_tax_duties`':
                        $stmt->bindValue($identifier, $this->shipping_tax_duties, PDO::PARAM_INT);
                        break;
                    case '`shipping_currency_code`':
                        $stmt->bindValue($identifier, $this->shipping_currency_code, PDO::PARAM_STR);
                        break;
                    case '`packing_slip_url_front`':
                        $stmt->bindValue($identifier, $this->packing_slip_url_front, PDO::PARAM_STR);
                        break;
                    case '`packing_slip_url_back`':
                        $stmt->bindValue($identifier, $this->packing_slip_url_back, PDO::PARAM_STR);
                        break;
                    case '`provider_order_number`':
                        $stmt->bindValue($identifier, $this->provider_order_number, PDO::PARAM_STR);
                        break;
                    case '`internal_order_number`':
                        $stmt->bindValue($identifier, $this->internal_order_number, PDO::PARAM_STR);
                        break;
                    case '`order_timestamp`':
                        $stmt->bindValue($identifier, $this->order_timestamp, PDO::PARAM_STR);
                        break;
                    case '`is_deleted`':
                        $stmt->bindValue($identifier, (int) $this->is_deleted, PDO::PARAM_INT);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdQuote($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aShippingAgent !== null) {
                if (!$this->aShippingAgent->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aShippingAgent->getValidationFailures());
                }
            }

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }

            if ($this->aProvider !== null) {
                if (!$this->aProvider->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProvider->getValidationFailures());
                }
            }


            if (($retval = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collQuoteItems !== null) {
                    foreach ($this->collQuoteItems as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTrackings !== null) {
                    foreach ($this->collTrackings as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdQuote();
                break;
            case 1:
                return $this->getFkSalesOrder();
                break;
            case 2:
                return $this->getFkFulfillmentProvider();
                break;
            case 3:
                return $this->getQuoteId();
                break;
            case 4:
                return $this->getFkShippingAgent();
                break;
            case 5:
                return $this->getShippingProduct();
                break;
            case 6:
                return $this->getShippingPrice();
                break;
            case 7:
                return $this->getShippingFreight();
                break;
            case 8:
                return $this->getShippingTaxDuties();
                break;
            case 9:
                return $this->getShippingCurrencyCode();
                break;
            case 10:
                return $this->getPackingSlipUrlFront();
                break;
            case 11:
                return $this->getPackingSlipUrlBack();
                break;
            case 12:
                return $this->getProviderOrderNumber();
                break;
            case 13:
                return $this->getInternalOrderNumber();
                break;
            case 14:
                return $this->getOrderTimestamp();
                break;
            case 15:
                return $this->getIsDeleted();
                break;
            case 16:
                return $this->getCreatedAt();
                break;
            case 17:
                return $this->getUpdatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote'][$this->getPrimaryKey()] = true;
        $keys = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdQuote(),
            $keys[1] => $this->getFkSalesOrder(),
            $keys[2] => $this->getFkFulfillmentProvider(),
            $keys[3] => $this->getQuoteId(),
            $keys[4] => $this->getFkShippingAgent(),
            $keys[5] => $this->getShippingProduct(),
            $keys[6] => $this->getShippingPrice(),
            $keys[7] => $this->getShippingFreight(),
            $keys[8] => $this->getShippingTaxDuties(),
            $keys[9] => $this->getShippingCurrencyCode(),
            $keys[10] => $this->getPackingSlipUrlFront(),
            $keys[11] => $this->getPackingSlipUrlBack(),
            $keys[12] => $this->getProviderOrderNumber(),
            $keys[13] => $this->getInternalOrderNumber(),
            $keys[14] => $this->getOrderTimestamp(),
            $keys[15] => $this->getIsDeleted(),
            $keys[16] => $this->getCreatedAt(),
            $keys[17] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aShippingAgent) {
                $result['ShippingAgent'] = $this->aShippingAgent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProvider) {
                $result['Provider'] = $this->aProvider->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collQuoteItems) {
                $result['QuoteItems'] = $this->collQuoteItems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrackings) {
                $result['Trackings'] = $this->collTrackings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdQuote($value);
                break;
            case 1:
                $this->setFkSalesOrder($value);
                break;
            case 2:
                $this->setFkFulfillmentProvider($value);
                break;
            case 3:
                $this->setQuoteId($value);
                break;
            case 4:
                $this->setFkShippingAgent($value);
                break;
            case 5:
                $this->setShippingProduct($value);
                break;
            case 6:
                $this->setShippingPrice($value);
                break;
            case 7:
                $this->setShippingFreight($value);
                break;
            case 8:
                $this->setShippingTaxDuties($value);
                break;
            case 9:
                $this->setShippingCurrencyCode($value);
                break;
            case 10:
                $this->setPackingSlipUrlFront($value);
                break;
            case 11:
                $this->setPackingSlipUrlBack($value);
                break;
            case 12:
                $this->setProviderOrderNumber($value);
                break;
            case 13:
                $this->setInternalOrderNumber($value);
                break;
            case 14:
                $this->setOrderTimestamp($value);
                break;
            case 15:
                $this->setIsDeleted($value);
                break;
            case 16:
                $this->setCreatedAt($value);
                break;
            case 17:
                $this->setUpdatedAt($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdQuote($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkSalesOrder($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkFulfillmentProvider($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setQuoteId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFkShippingAgent($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setShippingProduct($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setShippingPrice($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setShippingFreight($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setShippingTaxDuties($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setShippingCurrencyCode($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setPackingSlipUrlFront($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setPackingSlipUrlBack($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setProviderOrderNumber($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setInternalOrderNumber($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setOrderTimestamp($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setIsDeleted($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setCreatedAt($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setUpdatedAt($arr[$keys[17]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $this->id_quote);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, $this->fk_sales_order);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, $this->fk_fulfillment_provider);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID, $this->quote_id);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, $this->fk_shipping_agent);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT, $this->shipping_product);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE, $this->shipping_price);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT, $this->shipping_freight);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES, $this->shipping_tax_duties);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE, $this->shipping_currency_code);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT, $this->packing_slip_url_front);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK, $this->packing_slip_url_back);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER, $this->provider_order_number);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER, $this->internal_order_number);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP, $this->order_timestamp);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT, $this->updated_at);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $this->id_quote);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdQuote();
    }

    /**
     * Generic method to set the primary key (id_quote column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdQuote($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdQuote();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setFkFulfillmentProvider($this->getFkFulfillmentProvider());
        $copyObj->setQuoteId($this->getQuoteId());
        $copyObj->setFkShippingAgent($this->getFkShippingAgent());
        $copyObj->setShippingProduct($this->getShippingProduct());
        $copyObj->setShippingPrice($this->getShippingPrice());
        $copyObj->setShippingFreight($this->getShippingFreight());
        $copyObj->setShippingTaxDuties($this->getShippingTaxDuties());
        $copyObj->setShippingCurrencyCode($this->getShippingCurrencyCode());
        $copyObj->setPackingSlipUrlFront($this->getPackingSlipUrlFront());
        $copyObj->setPackingSlipUrlBack($this->getPackingSlipUrlBack());
        $copyObj->setProviderOrderNumber($this->getProviderOrderNumber());
        $copyObj->setInternalOrderNumber($this->getInternalOrderNumber());
        $copyObj->setOrderTimestamp($this->getOrderTimestamp());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getQuoteItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuoteItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrackings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTracking($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdQuote(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object.
     *
     * @param             Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent $v
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShippingAgent(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent $v = null)
    {
        if ($v === null) {
            $this->setFkShippingAgent(NULL);
        } else {
            $this->setFkShippingAgent($v->getIdShippingAgent());
        }

        $this->aShippingAgent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object, it will not be re-added.
        if ($v !== null) {
            $v->addQuote($this);
        }


        return $this;
    }


    /**
     * Get the associated Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The associated Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object.
     * @throws PropelException
     */
    public function getShippingAgent(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aShippingAgent === null && ($this->fk_shipping_agent !== null) && $doQuery) {
            $this->aShippingAgent = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()->findPk($this->fk_shipping_agent, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShippingAgent->addQuotes($this);
             */
        }

        return $this->aShippingAgent;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_PacSalesOrder object.
     *
     * @param             ProjectA_Zed_Sales_Persistence_PacSalesOrder $v
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(ProjectA_Zed_Sales_Persistence_PacSalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_PacSalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addQuote($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The associated ProjectA_Zed_Sales_Persistence_PacSalesOrder object.
     * @throws PropelException
     */
    public function getOrder(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrder === null && ($this->fk_sales_order !== null) && $doQuery) {
            $this->aOrder = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrder->addQuotes($this);
             */
        }

        return $this->aOrder;
    }

    /**
     * Declares an association between this object and a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider object.
     *
     * @param             Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider $v
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProvider(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider $v = null)
    {
        if ($v === null) {
            $this->setFkFulfillmentProvider(NULL);
        } else {
            $this->setFkFulfillmentProvider($v->getIdProvider());
        }

        $this->aProvider = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider object, it will not be re-added.
        if ($v !== null) {
            $v->addQuote($this);
        }


        return $this;
    }


    /**
     * Get the associated Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider The associated Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider object.
     * @throws PropelException
     */
    public function getProvider(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProvider === null && ($this->fk_fulfillment_provider !== null) && $doQuery) {
            $this->aProvider = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->findPk($this->fk_fulfillment_provider, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProvider->addQuotes($this);
             */
        }

        return $this->aProvider;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('QuoteItem' == $relationName) {
            $this->initQuoteItems();
        }
        if ('Tracking' == $relationName) {
            $this->initTrackings();
        }
    }

    /**
     * Clears out the collQuoteItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     * @see        addQuoteItems()
     */
    public function clearQuoteItems()
    {
        $this->collQuoteItems = null; // important to set this to null since that means it is uninitialized
        $this->collQuoteItemsPartial = null;

        return $this;
    }

    /**
     * reset is the collQuoteItems collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuoteItems($v = true)
    {
        $this->collQuoteItemsPartial = $v;
    }

    /**
     * Initializes the collQuoteItems collection.
     *
     * By default this just sets the collQuoteItems collection to an empty array (like clearcollQuoteItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuoteItems($overrideExisting = true)
    {
        if (null !== $this->collQuoteItems && !$overrideExisting) {
            return;
        }
        $this->collQuoteItems = new PropelObjectCollection();
        $this->collQuoteItems->setModel('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem');
    }

    /**
     * Gets an array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects
     * @throws PropelException
     */
    public function getQuoteItems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuoteItemsPartial && !$this->isNew();
        if (null === $this->collQuoteItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuoteItems) {
                // return empty collection
                $this->initQuoteItems();
            } else {
                $collQuoteItems = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery::create(null, $criteria)
                    ->filterByQuote($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuoteItemsPartial && count($collQuoteItems)) {
                      $this->initQuoteItems(false);

                      foreach($collQuoteItems as $obj) {
                        if (false == $this->collQuoteItems->contains($obj)) {
                          $this->collQuoteItems->append($obj);
                        }
                      }

                      $this->collQuoteItemsPartial = true;
                    }

                    $collQuoteItems->getInternalIterator()->rewind();
                    return $collQuoteItems;
                }

                if($partial && $this->collQuoteItems) {
                    foreach($this->collQuoteItems as $obj) {
                        if($obj->isNew()) {
                            $collQuoteItems[] = $obj;
                        }
                    }
                }

                $this->collQuoteItems = $collQuoteItems;
                $this->collQuoteItemsPartial = false;
            }
        }

        return $this->collQuoteItems;
    }

    /**
     * Sets a collection of QuoteItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quoteItems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setQuoteItems(PropelCollection $quoteItems, PropelPDO $con = null)
    {
        $quoteItemsToDelete = $this->getQuoteItems(new Criteria(), $con)->diff($quoteItems);

        $this->quoteItemsScheduledForDeletion = unserialize(serialize($quoteItemsToDelete));

        foreach ($quoteItemsToDelete as $quoteItemRemoved) {
            $quoteItemRemoved->setQuote(null);
        }

        $this->collQuoteItems = null;
        foreach ($quoteItems as $quoteItem) {
            $this->addQuoteItem($quoteItem);
        }

        $this->collQuoteItems = $quoteItems;
        $this->collQuoteItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects.
     * @throws PropelException
     */
    public function countQuoteItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuoteItemsPartial && !$this->isNew();
        if (null === $this->collQuoteItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuoteItems) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getQuoteItems());
            }
            $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByQuote($this)
                ->count($con);
        }

        return count($this->collQuoteItems);
    }

    /**
     * Method called to associate a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem object to this object
     * through the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem foreign key attribute.
     *
     * @param    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem $l Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function addQuoteItem(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem $l)
    {
        if ($this->collQuoteItems === null) {
            $this->initQuoteItems();
            $this->collQuoteItemsPartial = true;
        }
        if (!in_array($l, $this->collQuoteItems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuoteItem($l);
        }

        return $this;
    }

    /**
     * @param	QuoteItem $quoteItem The quoteItem object to add.
     */
    protected function doAddQuoteItem($quoteItem)
    {
        $this->collQuoteItems[]= $quoteItem;
        $quoteItem->setQuote($this);
    }

    /**
     * @param	QuoteItem $quoteItem The quoteItem object to remove.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function removeQuoteItem($quoteItem)
    {
        if ($this->getQuoteItems()->contains($quoteItem)) {
            $this->collQuoteItems->remove($this->collQuoteItems->search($quoteItem));
            if (null === $this->quoteItemsScheduledForDeletion) {
                $this->quoteItemsScheduledForDeletion = clone $this->collQuoteItems;
                $this->quoteItemsScheduledForDeletion->clear();
            }
            $this->quoteItemsScheduledForDeletion[]= clone $quoteItem;
            $quoteItem->setQuote(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SaoFulfillmentQuote is new, it will return
     * an empty collection; or if this SaoFulfillmentQuote has previously
     * been saved, it will retrieve related QuoteItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoFulfillmentQuote.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects
     */
    public function getQuoteItemsJoinItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery::create(null, $criteria);
        $query->joinWith('Item', $join_behavior);

        return $this->getQuoteItems($query, $con);
    }

    /**
     * Clears out the collTrackings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     * @see        addTrackings()
     */
    public function clearTrackings()
    {
        $this->collTrackings = null; // important to set this to null since that means it is uninitialized
        $this->collTrackingsPartial = null;

        return $this;
    }

    /**
     * reset is the collTrackings collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrackings($v = true)
    {
        $this->collTrackingsPartial = $v;
    }

    /**
     * Initializes the collTrackings collection.
     *
     * By default this just sets the collTrackings collection to an empty array (like clearcollTrackings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrackings($overrideExisting = true)
    {
        if (null !== $this->collTrackings && !$overrideExisting) {
            return;
        }
        $this->collTrackings = new PropelObjectCollection();
        $this->collTrackings->setModel('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking');
    }

    /**
     * Gets an array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects
     * @throws PropelException
     */
    public function getTrackings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrackingsPartial && !$this->isNew();
        if (null === $this->collTrackings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrackings) {
                // return empty collection
                $this->initTrackings();
            } else {
                $collTrackings = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create(null, $criteria)
                    ->filterByQuote($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrackingsPartial && count($collTrackings)) {
                      $this->initTrackings(false);

                      foreach($collTrackings as $obj) {
                        if (false == $this->collTrackings->contains($obj)) {
                          $this->collTrackings->append($obj);
                        }
                      }

                      $this->collTrackingsPartial = true;
                    }

                    $collTrackings->getInternalIterator()->rewind();
                    return $collTrackings;
                }

                if($partial && $this->collTrackings) {
                    foreach($this->collTrackings as $obj) {
                        if($obj->isNew()) {
                            $collTrackings[] = $obj;
                        }
                    }
                }

                $this->collTrackings = $collTrackings;
                $this->collTrackingsPartial = false;
            }
        }

        return $this->collTrackings;
    }

    /**
     * Sets a collection of Tracking objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trackings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setTrackings(PropelCollection $trackings, PropelPDO $con = null)
    {
        $trackingsToDelete = $this->getTrackings(new Criteria(), $con)->diff($trackings);

        $this->trackingsScheduledForDeletion = unserialize(serialize($trackingsToDelete));

        foreach ($trackingsToDelete as $trackingRemoved) {
            $trackingRemoved->setQuote(null);
        }

        $this->collTrackings = null;
        foreach ($trackings as $tracking) {
            $this->addTracking($tracking);
        }

        $this->collTrackings = $trackings;
        $this->collTrackingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects.
     * @throws PropelException
     */
    public function countTrackings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrackingsPartial && !$this->isNew();
        if (null === $this->collTrackings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrackings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrackings());
            }
            $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByQuote($this)
                ->count($con);
        }

        return count($this->collTrackings);
    }

    /**
     * Method called to associate a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object to this object
     * through the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking foreign key attribute.
     *
     * @param    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $l Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function addTracking(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $l)
    {
        if ($this->collTrackings === null) {
            $this->initTrackings();
            $this->collTrackingsPartial = true;
        }
        if (!in_array($l, $this->collTrackings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTracking($l);
        }

        return $this;
    }

    /**
     * @param	Tracking $tracking The tracking object to add.
     */
    protected function doAddTracking($tracking)
    {
        $this->collTrackings[]= $tracking;
        $tracking->setQuote($this);
    }

    /**
     * @param	Tracking $tracking The tracking object to remove.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function removeTracking($tracking)
    {
        if ($this->getTrackings()->contains($tracking)) {
            $this->collTrackings->remove($this->collTrackings->search($tracking));
            if (null === $this->trackingsScheduledForDeletion) {
                $this->trackingsScheduledForDeletion = clone $this->collTrackings;
                $this->trackingsScheduledForDeletion->clear();
            }
            $this->trackingsScheduledForDeletion[]= clone $tracking;
            $tracking->setQuote(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SaoFulfillmentQuote is new, it will return
     * an empty collection; or if this SaoFulfillmentQuote has previously
     * been saved, it will retrieve related Trackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoFulfillmentQuote.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects
     */
    public function getTrackingsJoinShippingAgent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create(null, $criteria);
        $query->joinWith('ShippingAgent', $join_behavior);

        return $this->getTrackings($query, $con);
    }

    /**
     * Clears out the collItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     * @see        addItems()
     */
    public function clearItems()
    {
        $this->collItems = null; // important to set this to null since that means it is uninitialized
        $this->collItemsPartial = null;

        return $this;
    }

    /**
     * Initializes the collItems collection.
     *
     * By default this just sets the collItems collection to an empty collection (like clearItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initItems()
    {
        $this->collItems = new PropelObjectCollection();
        $this->collItems->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderItem');
    }

    /**
     * Gets a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects related by a many-to-many relationship
     * to the current object by way of the sao_fulfillment_quote_item cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects
     */
    public function getItems($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collItems || null !== $criteria) {
            if ($this->isNew() && null === $this->collItems) {
                // return empty collection
                $this->initItems();
            } else {
                $collItems = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create(null, $criteria)
                    ->filterByQuote($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collItems;
                }
                $this->collItems = $collItems;
            }
        }

        return $this->collItems;
    }

    /**
     * Sets a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects related by a many-to-many relationship
     * to the current object by way of the sao_fulfillment_quote_item cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $items A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function setItems(PropelCollection $items, PropelPDO $con = null)
    {
        $this->clearItems();
        $currentItems = $this->getItems();

        $this->itemsScheduledForDeletion = $currentItems->diff($items);

        foreach ($items as $item) {
            if (!$currentItems->contains($item)) {
                $this->doAddItem($item);
            }
        }

        $this->collItems = $items;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects related by a many-to-many relationship
     * to the current object by way of the sao_fulfillment_quote_item cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects
     */
    public function countItems($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collItems || null !== $criteria) {
            if ($this->isNew() && null === $this->collItems) {
                return 0;
            } else {
                $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByQuote($this)
                    ->count($con);
            }
        } else {
            return count($this->collItems);
        }
    }

    /**
     * Associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object to this object
     * through the sao_fulfillment_quote_item cross reference table.
     *
     * @param  ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $pacSalesOrderItem The Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem object to relate
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function addItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $pacSalesOrderItem)
    {
        if ($this->collItems === null) {
            $this->initItems();
        }
        if (!$this->collItems->contains($pacSalesOrderItem)) { // only add it if the **same** object is not already associated
            $this->doAddItem($pacSalesOrderItem);

            $this->collItems[]= $pacSalesOrderItem;
        }

        return $this;
    }

    /**
     * @param	Item $item The item object to add.
     */
    protected function doAddItem($item)
    {
        $saoFulfillmentQuoteItem = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem();
        $saoFulfillmentQuoteItem->setItem($item);
        $this->addQuoteItem($saoFulfillmentQuoteItem);
    }

    /**
     * Remove a ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object to this object
     * through the sao_fulfillment_quote_item cross reference table.
     *
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $pacSalesOrderItem The Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem object to relate
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function removeItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $pacSalesOrderItem)
    {
        if ($this->getItems()->contains($pacSalesOrderItem)) {
            $this->collItems->remove($this->collItems->search($pacSalesOrderItem));
            if (null === $this->itemsScheduledForDeletion) {
                $this->itemsScheduledForDeletion = clone $this->collItems;
                $this->itemsScheduledForDeletion->clear();
            }
            $this->itemsScheduledForDeletion[]= $pacSalesOrderItem;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_quote = null;
        $this->fk_sales_order = null;
        $this->fk_fulfillment_provider = null;
        $this->quote_id = null;
        $this->fk_shipping_agent = null;
        $this->shipping_product = null;
        $this->shipping_price = null;
        $this->shipping_freight = null;
        $this->shipping_tax_duties = null;
        $this->shipping_currency_code = null;
        $this->packing_slip_url_front = null;
        $this->packing_slip_url_back = null;
        $this->provider_order_number = null;
        $this->internal_order_number = null;
        $this->order_timestamp = null;
        $this->is_deleted = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collQuoteItems) {
                foreach ($this->collQuoteItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrackings) {
                foreach ($this->collTrackings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collItems) {
                foreach ($this->collItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aShippingAgent instanceof Persistent) {
              $this->aShippingAgent->clearAllReferences($deep);
            }
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }
            if ($this->aProvider instanceof Persistent) {
              $this->aProvider->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collQuoteItems instanceof PropelCollection) {
            $this->collQuoteItems->clearIterator();
        }
        $this->collQuoteItems = null;
        if ($this->collTrackings instanceof PropelCollection) {
            $this->collTrackings->clearIterator();
        }
        $this->collTrackings = null;
        if ($this->collItems instanceof PropelCollection) {
            $this->collItems->clearIterator();
        }
        $this->collItems = null;
        $this->aShippingAgent = null;
        $this->aOrder = null;
        $this->aProvider = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT;

        return $this;
    }

}
