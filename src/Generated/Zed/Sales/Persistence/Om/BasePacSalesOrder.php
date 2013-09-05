<?php


/**
 * Base class that represents a row from the 'pac_sales_order' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrder extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_sales_order field.
     * @var        int
     */
    protected $id_sales_order;

    /**
     * The value for the fk_sales_order_address_billing field.
     * @var        int
     */
    protected $fk_sales_order_address_billing;

    /**
     * The value for the fk_sales_order_address_shipping field.
     * @var        int
     */
    protected $fk_sales_order_address_shipping;

    /**
     * The value for the fk_customer field.
     * @var        int
     */
    protected $fk_customer;

    /**
     * The value for the fk_sales_order_process field.
     * @var        int
     */
    protected $fk_sales_order_process;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the salutation field.
     * @var        int
     */
    protected $salutation;

    /**
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the customer_session_id field.
     * @var        string
     */
    protected $customer_session_id;

    /**
     * The value for the increment_id field.
     * @var        string
     */
    protected $increment_id;

    /**
     * The value for the invoice_number field.
     * @var        string
     */
    protected $invoice_number;

    /**
     * The value for the invoice_generated_at field.
     * @var        string
     */
    protected $invoice_generated_at;

    /**
     * The value for the ip_address field.
     * @var        string
     */
    protected $ip_address;

    /**
     * The value for the grand_total field.
     * @var        int
     */
    protected $grand_total;

    /**
     * The value for the subtotal field.
     * @var        int
     */
    protected $subtotal;

    /**
     * The value for the is_test field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_test;

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
     * @var        PacSalesOrderAddress
     */
    protected $aBillingAddress;

    /**
     * @var        PacSalesOrderAddress
     */
    protected $aShippingAddress;

    /**
     * @var        PacCustomer
     */
    protected $aCustomer;

    /**
     * @var        PacSalesOrderProcess
     */
    protected $aProcess;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_PacInvoice[] Collection to store aggregation of ProjectA_Zed_Invoice_Persistence_PacInvoice objects.
     */
    protected $collInvoices;
    protected $collInvoicesPartial;

    /**
     * @var        ProjectA_Zed_Payment_Persistence_PacPayment one-to-one related ProjectA_Zed_Payment_Persistence_PacPayment object
     */
    protected $singlePayment;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects.
     */
    protected $collTransitionLogs;
    protected $collTransitionLogsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects.
     */
    protected $collItems;
    protected $collItemsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderNote[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects.
     */
    protected $collNotes;
    protected $collNotesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderComment[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderComment objects.
     */
    protected $collOrderComments;
    protected $collOrderCommentsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory objects.
     */
    protected $collHistories;
    protected $collHistoriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesExpense[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesExpense objects.
     */
    protected $collExpenses;
    protected $collExpensesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects.
     */
    protected $collDiscounts;
    protected $collDiscountsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] Collection to store aggregation of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects.
     */
    protected $collCodeUsages;
    protected $collCodeUsagesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog[] Collection to store aggregation of ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog objects.
     */
    protected $collSalesruleLogs;
    protected $collSalesruleLogsPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] Collection to store aggregation of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     */
    protected $collQuotes;
    protected $collQuotesPartial;

    /**
     * @var        Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder one-to-one related Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder object
     */
    protected $singleSaoOrder;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesCCValidation[] Collection to store aggregation of Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects.
     */
    protected $collCCValidations;
    protected $collCCValidationsPartial;

    /**
     * @var        Sao_Zed_Sales_Persistence_SaoSalesOrder one-to-one related Sao_Zed_Sales_Persistence_SaoSalesOrder object
     */
    protected $singleSaoSalesOrder;

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
    protected $invoicesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $paymentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $transitionLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $itemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $notesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orderCommentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $historiesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $expensesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $discountsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $codeUsagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $salesruleLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $quotesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoOrdersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cCValidationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoSalesOrdersScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_test = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BasePacSalesOrder object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_sales_order] column value.
     *
     * @return int
     */
    public function getIdSalesOrder()
    {
        return $this->id_sales_order;
    }

    /**
     * Get the [fk_sales_order_address_billing] column value.
     *
     * @return int
     */
    public function getFkSalesOrderAddressBilling()
    {
        return $this->fk_sales_order_address_billing;
    }

    /**
     * Get the [fk_sales_order_address_shipping] column value.
     *
     * @return int
     */
    public function getFkSalesOrderAddressShipping()
    {
        return $this->fk_sales_order_address_shipping;
    }

    /**
     * Get the [fk_customer] column value.
     *
     * @return int
     */
    public function getFkCustomer()
    {
        return $this->fk_customer;
    }

    /**
     * Get the [fk_sales_order_process] column value.
     *
     * @return int
     */
    public function getFkSalesOrderProcess()
    {
        return $this->fk_sales_order_process;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [salutation] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getSalutation()
    {
        if (null === $this->salutation) {
            return null;
        }
        $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION);
        if (!isset($valueSet[$this->salutation])) {
            throw new PropelException('Unknown stored enum key: ' . $this->salutation);
        }

        return $valueSet[$this->salutation];
    }

    /**
     * Get the [first_name] column value.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the [customer_session_id] column value.
     *
     * @return string
     */
    public function getCustomerSessionId()
    {
        return $this->customer_session_id;
    }

    /**
     * Get the [increment_id] column value.
     *
     * @return string
     */
    public function getIncrementId()
    {
        return $this->increment_id;
    }

    /**
     * Get the [invoice_number] column value.
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * Get the [optionally formatted] temporal [invoice_generated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getInvoiceGeneratedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->invoice_generated_at === null) {
            return null;
        }

        if ($this->invoice_generated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->invoice_generated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->invoice_generated_at, true), $x);
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
     * Get the [ip_address] column value.
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Get the [grand_total] column value.
     *
     * @return int
     */
    public function getGrandTotal()
    {
        return $this->grand_total;
    }

    /**
     * Get the [subtotal] column value.
     *
     * @return int
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Get the [is_test] column value.
     *
     * @return boolean
     */
    public function getIsTest()
    {
        return $this->is_test;
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
     * Set the value of [id_sales_order] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setIdSalesOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_sales_order !== $v) {
            $this->id_sales_order = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER;
        }


        return $this;
    } // setIdSalesOrder()

    /**
     * Set the value of [fk_sales_order_address_billing] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setFkSalesOrderAddressBilling($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_address_billing !== $v) {
            $this->fk_sales_order_address_billing = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING;
        }

        if ($this->aBillingAddress !== null && $this->aBillingAddress->getIdSalesOrderAddress() !== $v) {
            $this->aBillingAddress = null;
        }


        return $this;
    } // setFkSalesOrderAddressBilling()

    /**
     * Set the value of [fk_sales_order_address_shipping] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setFkSalesOrderAddressShipping($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_address_shipping !== $v) {
            $this->fk_sales_order_address_shipping = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING;
        }

        if ($this->aShippingAddress !== null && $this->aShippingAddress->getIdSalesOrderAddress() !== $v) {
            $this->aShippingAddress = null;
        }


        return $this;
    } // setFkSalesOrderAddressShipping()

    /**
     * Set the value of [fk_customer] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setFkCustomer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_customer !== $v) {
            $this->fk_customer = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER;
        }

        if ($this->aCustomer !== null && $this->aCustomer->getIdCustomer() !== $v) {
            $this->aCustomer = null;
        }


        return $this;
    } // setFkCustomer()

    /**
     * Set the value of [fk_sales_order_process] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setFkSalesOrderProcess($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_process !== $v) {
            $this->fk_sales_order_process = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS;
        }

        if ($this->aProcess !== null && $this->aProcess->getIdSalesOrderProcess() !== $v) {
            $this->aProcess = null;
        }


        return $this;
    } // setFkSalesOrderProcess()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [salutation] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION;
        }


        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [customer_session_id] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setCustomerSessionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->customer_session_id !== $v) {
            $this->customer_session_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CUSTOMER_SESSION_ID;
        }


        return $this;
    } // setCustomerSessionId()

    /**
     * Set the value of [increment_id] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setIncrementId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->increment_id !== $v) {
            $this->increment_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INCREMENT_ID;
        }


        return $this;
    } // setIncrementId()

    /**
     * Set the value of [invoice_number] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setInvoiceNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->invoice_number !== $v) {
            $this->invoice_number = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_NUMBER;
        }


        return $this;
    } // setInvoiceNumber()

    /**
     * Sets the value of [invoice_generated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setInvoiceGeneratedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->invoice_generated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->invoice_generated_at !== null && $tmpDt = new DateTime($this->invoice_generated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->invoice_generated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_GENERATED_AT;
            }
        } // if either are not null


        return $this;
    } // setInvoiceGeneratedAt()

    /**
     * Set the value of [ip_address] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setIpAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ip_address !== $v) {
            $this->ip_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IP_ADDRESS;
        }


        return $this;
    } // setIpAddress()

    /**
     * Set the value of [grand_total] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setGrandTotal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->grand_total !== $v) {
            $this->grand_total = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::GRAND_TOTAL;
        }


        return $this;
    } // setGrandTotal()

    /**
     * Set the value of [subtotal] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setSubtotal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->subtotal !== $v) {
            $this->subtotal = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SUBTOTAL;
        }


        return $this;
    } // setSubtotal()

    /**
     * Sets the value of the [is_test] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setIsTest($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_test !== $v) {
            $this->is_test = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IS_TEST;
        }


        return $this;
    } // setIsTest()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT;
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
            if ($this->is_test !== false) {
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

            $this->id_sales_order = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_sales_order_address_billing = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_sales_order_address_shipping = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_customer = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->fk_sales_order_process = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->email = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->salutation = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->first_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->customer_session_id = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->increment_id = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->invoice_number = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->invoice_generated_at = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->ip_address = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->grand_total = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->subtotal = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->is_test = ($row[$startcol + 16] !== null) ? (boolean) $row[$startcol + 16] : null;
            $this->created_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->updated_at = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 19; // 19 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Sales_Persistence_PacSalesOrder object", $e);
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

        if ($this->aBillingAddress !== null && $this->fk_sales_order_address_billing !== $this->aBillingAddress->getIdSalesOrderAddress()) {
            $this->aBillingAddress = null;
        }
        if ($this->aShippingAddress !== null && $this->fk_sales_order_address_shipping !== $this->aShippingAddress->getIdSalesOrderAddress()) {
            $this->aShippingAddress = null;
        }
        if ($this->aCustomer !== null && $this->fk_customer !== $this->aCustomer->getIdCustomer()) {
            $this->aCustomer = null;
        }
        if ($this->aProcess !== null && $this->fk_sales_order_process !== $this->aProcess->getIdSalesOrderProcess()) {
            $this->aProcess = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBillingAddress = null;
            $this->aShippingAddress = null;
            $this->aCustomer = null;
            $this->aProcess = null;
            $this->collInvoices = null;

            $this->singlePayment = null;

            $this->collTransitionLogs = null;

            $this->collItems = null;

            $this->collNotes = null;

            $this->collOrderComments = null;

            $this->collHistories = null;

            $this->collExpenses = null;

            $this->collDiscounts = null;

            $this->collCodeUsages = null;

            $this->collSalesruleLogs = null;

            $this->collQuotes = null;

            $this->singleSaoOrder = null;

            $this->collCCValidations = null;

            $this->singleSaoSalesOrder = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($this);
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

            if ($this->aBillingAddress !== null) {
                if ($this->aBillingAddress->isModified() || $this->aBillingAddress->isNew()) {
                    $affectedRows += $this->aBillingAddress->save($con);
                }
                $this->setBillingAddress($this->aBillingAddress);
            }

            if ($this->aShippingAddress !== null) {
                if ($this->aShippingAddress->isModified() || $this->aShippingAddress->isNew()) {
                    $affectedRows += $this->aShippingAddress->save($con);
                }
                $this->setShippingAddress($this->aShippingAddress);
            }

            if ($this->aCustomer !== null) {
                if ($this->aCustomer->isModified() || $this->aCustomer->isNew()) {
                    $affectedRows += $this->aCustomer->save($con);
                }
                $this->setCustomer($this->aCustomer);
            }

            if ($this->aProcess !== null) {
                if ($this->aProcess->isModified() || $this->aProcess->isNew()) {
                    $affectedRows += $this->aProcess->save($con);
                }
                $this->setProcess($this->aProcess);
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

            if ($this->invoicesScheduledForDeletion !== null) {
                if (!$this->invoicesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery::create()
                        ->filterByPrimaryKeys($this->invoicesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->invoicesScheduledForDeletion = null;
                }
            }

            if ($this->collInvoices !== null) {
                foreach ($this->collInvoices as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->paymentsScheduledForDeletion !== null) {
                if (!$this->paymentsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Payment_Persistence_PacPaymentQuery::create()
                        ->filterByPrimaryKeys($this->paymentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paymentsScheduledForDeletion = null;
                }
            }

            if ($this->singlePayment !== null) {
                if (!$this->singlePayment->isDeleted() && ($this->singlePayment->isNew() || $this->singlePayment->isModified())) {
                        $affectedRows += $this->singlePayment->save($con);
                }
            }

            if ($this->transitionLogsScheduledForDeletion !== null) {
                if (!$this->transitionLogsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create()
                        ->filterByPrimaryKeys($this->transitionLogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->transitionLogsScheduledForDeletion = null;
                }
            }

            if ($this->collTransitionLogs !== null) {
                foreach ($this->collTransitionLogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->itemsScheduledForDeletion !== null) {
                if (!$this->itemsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create()
                        ->filterByPrimaryKeys($this->itemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->itemsScheduledForDeletion = null;
                }
            }

            if ($this->collItems !== null) {
                foreach ($this->collItems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->notesScheduledForDeletion !== null) {
                if (!$this->notesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderNoteQuery::create()
                        ->filterByPrimaryKeys($this->notesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->notesScheduledForDeletion = null;
                }
            }

            if ($this->collNotes !== null) {
                foreach ($this->collNotes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orderCommentsScheduledForDeletion !== null) {
                if (!$this->orderCommentsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderCommentQuery::create()
                        ->filterByPrimaryKeys($this->orderCommentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orderCommentsScheduledForDeletion = null;
                }
            }

            if ($this->collOrderComments !== null) {
                foreach ($this->collOrderComments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->historiesScheduledForDeletion !== null) {
                if (!$this->historiesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderHistoryQuery::create()
                        ->filterByPrimaryKeys($this->historiesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->historiesScheduledForDeletion = null;
                }
            }

            if ($this->collHistories !== null) {
                foreach ($this->collHistories as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expensesScheduledForDeletion !== null) {
                if (!$this->expensesScheduledForDeletion->isEmpty()) {
                    foreach ($this->expensesScheduledForDeletion as $expense) {
                        // need to save related object because we set the relation to null
                        $expense->save($con);
                    }
                    $this->expensesScheduledForDeletion = null;
                }
            }

            if ($this->collExpenses !== null) {
                foreach ($this->collExpenses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->discountsScheduledForDeletion !== null) {
                if (!$this->discountsScheduledForDeletion->isEmpty()) {
                    foreach ($this->discountsScheduledForDeletion as $discount) {
                        // need to save related object because we set the relation to null
                        $discount->save($con);
                    }
                    $this->discountsScheduledForDeletion = null;
                }
            }

            if ($this->collDiscounts !== null) {
                foreach ($this->collDiscounts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->codeUsagesScheduledForDeletion !== null) {
                if (!$this->codeUsagesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create()
                        ->filterByPrimaryKeys($this->codeUsagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->codeUsagesScheduledForDeletion = null;
                }
            }

            if ($this->collCodeUsages !== null) {
                foreach ($this->collCodeUsages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesruleLogsScheduledForDeletion !== null) {
                if (!$this->salesruleLogsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Salesrule_Persistence_PacSalesruleLogQuery::create()
                        ->filterByPrimaryKeys($this->salesruleLogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->salesruleLogsScheduledForDeletion = null;
                }
            }

            if ($this->collSalesruleLogs !== null) {
                foreach ($this->collSalesruleLogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->quotesScheduledForDeletion !== null) {
                if (!$this->quotesScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()
                        ->filterByPrimaryKeys($this->quotesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quotesScheduledForDeletion = null;
                }
            }

            if ($this->collQuotes !== null) {
                foreach ($this->collQuotes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->saoOrdersScheduledForDeletion !== null) {
                if (!$this->saoOrdersScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery::create()
                        ->filterByPrimaryKeys($this->saoOrdersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoOrdersScheduledForDeletion = null;
                }
            }

            if ($this->singleSaoOrder !== null) {
                if (!$this->singleSaoOrder->isDeleted() && ($this->singleSaoOrder->isNew() || $this->singleSaoOrder->isModified())) {
                        $affectedRows += $this->singleSaoOrder->save($con);
                }
            }

            if ($this->cCValidationsScheduledForDeletion !== null) {
                if (!$this->cCValidationsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery::create()
                        ->filterByPrimaryKeys($this->cCValidationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cCValidationsScheduledForDeletion = null;
                }
            }

            if ($this->collCCValidations !== null) {
                foreach ($this->collCCValidations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->saoSalesOrdersScheduledForDeletion !== null) {
                if (!$this->saoSalesOrdersScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Sales_Persistence_SaoSalesOrderQuery::create()
                        ->filterByPrimaryKeys($this->saoSalesOrdersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoSalesOrdersScheduledForDeletion = null;
                }
            }

            if ($this->singleSaoSalesOrder !== null) {
                if (!$this->singleSaoSalesOrder->isDeleted() && ($this->singleSaoSalesOrder->isNew() || $this->singleSaoSalesOrder->isModified())) {
                        $affectedRows += $this->singleSaoSalesOrder->save($con);
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

        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER;
        if (null !== $this->id_sales_order) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`id_sales_order`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order_address_billing`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order_address_shipping`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_customer`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order_process`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = '`salutation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CUSTOMER_SESSION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`customer_session_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INCREMENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`increment_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`invoice_number`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_GENERATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`invoice_generated_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IP_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`ip_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::GRAND_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = '`grand_total`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SUBTOTAL)) {
            $modifiedColumns[':p' . $index++]  = '`subtotal`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IS_TEST)) {
            $modifiedColumns[':p' . $index++]  = '`is_test`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_sales_order` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_sales_order`':
                        $stmt->bindValue($identifier, $this->id_sales_order, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order_address_billing`':
                        $stmt->bindValue($identifier, $this->fk_sales_order_address_billing, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order_address_shipping`':
                        $stmt->bindValue($identifier, $this->fk_sales_order_address_shipping, PDO::PARAM_INT);
                        break;
                    case '`fk_customer`':
                        $stmt->bindValue($identifier, $this->fk_customer, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order_process`':
                        $stmt->bindValue($identifier, $this->fk_sales_order_process, PDO::PARAM_INT);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`salutation`':
                        $stmt->bindValue($identifier, $this->salutation, PDO::PARAM_INT);
                        break;
                    case '`first_name`':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`customer_session_id`':
                        $stmt->bindValue($identifier, $this->customer_session_id, PDO::PARAM_STR);
                        break;
                    case '`increment_id`':
                        $stmt->bindValue($identifier, $this->increment_id, PDO::PARAM_STR);
                        break;
                    case '`invoice_number`':
                        $stmt->bindValue($identifier, $this->invoice_number, PDO::PARAM_STR);
                        break;
                    case '`invoice_generated_at`':
                        $stmt->bindValue($identifier, $this->invoice_generated_at, PDO::PARAM_STR);
                        break;
                    case '`ip_address`':
                        $stmt->bindValue($identifier, $this->ip_address, PDO::PARAM_STR);
                        break;
                    case '`grand_total`':
                        $stmt->bindValue($identifier, $this->grand_total, PDO::PARAM_INT);
                        break;
                    case '`subtotal`':
                        $stmt->bindValue($identifier, $this->subtotal, PDO::PARAM_INT);
                        break;
                    case '`is_test`':
                        $stmt->bindValue($identifier, (int) $this->is_test, PDO::PARAM_INT);
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
        $this->setIdSalesOrder($pk);

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

            if ($this->aBillingAddress !== null) {
                if (!$this->aBillingAddress->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBillingAddress->getValidationFailures());
                }
            }

            if ($this->aShippingAddress !== null) {
                if (!$this->aShippingAddress->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aShippingAddress->getValidationFailures());
                }
            }

            if ($this->aCustomer !== null) {
                if (!$this->aCustomer->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCustomer->getValidationFailures());
                }
            }

            if ($this->aProcess !== null) {
                if (!$this->aProcess->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProcess->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collInvoices !== null) {
                    foreach ($this->collInvoices as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singlePayment !== null) {
                    if (!$this->singlePayment->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singlePayment->getValidationFailures());
                    }
                }

                if ($this->collTransitionLogs !== null) {
                    foreach ($this->collTransitionLogs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collItems !== null) {
                    foreach ($this->collItems as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNotes !== null) {
                    foreach ($this->collNotes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrderComments !== null) {
                    foreach ($this->collOrderComments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collHistories !== null) {
                    foreach ($this->collHistories as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collExpenses !== null) {
                    foreach ($this->collExpenses as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDiscounts !== null) {
                    foreach ($this->collDiscounts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCodeUsages !== null) {
                    foreach ($this->collCodeUsages as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSalesruleLogs !== null) {
                    foreach ($this->collSalesruleLogs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collQuotes !== null) {
                    foreach ($this->collQuotes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleSaoOrder !== null) {
                    if (!$this->singleSaoOrder->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSaoOrder->getValidationFailures());
                    }
                }

                if ($this->collCCValidations !== null) {
                    foreach ($this->collCCValidations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleSaoSalesOrder !== null) {
                    if (!$this->singleSaoSalesOrder->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSaoSalesOrder->getValidationFailures());
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
        $pos = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdSalesOrder();
                break;
            case 1:
                return $this->getFkSalesOrderAddressBilling();
                break;
            case 2:
                return $this->getFkSalesOrderAddressShipping();
                break;
            case 3:
                return $this->getFkCustomer();
                break;
            case 4:
                return $this->getFkSalesOrderProcess();
                break;
            case 5:
                return $this->getEmail();
                break;
            case 6:
                return $this->getSalutation();
                break;
            case 7:
                return $this->getFirstName();
                break;
            case 8:
                return $this->getLastName();
                break;
            case 9:
                return $this->getCustomerSessionId();
                break;
            case 10:
                return $this->getIncrementId();
                break;
            case 11:
                return $this->getInvoiceNumber();
                break;
            case 12:
                return $this->getInvoiceGeneratedAt();
                break;
            case 13:
                return $this->getIpAddress();
                break;
            case 14:
                return $this->getGrandTotal();
                break;
            case 15:
                return $this->getSubtotal();
                break;
            case 16:
                return $this->getIsTest();
                break;
            case 17:
                return $this->getCreatedAt();
                break;
            case 18:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_PacSalesOrder'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_PacSalesOrder'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrder(),
            $keys[1] => $this->getFkSalesOrderAddressBilling(),
            $keys[2] => $this->getFkSalesOrderAddressShipping(),
            $keys[3] => $this->getFkCustomer(),
            $keys[4] => $this->getFkSalesOrderProcess(),
            $keys[5] => $this->getEmail(),
            $keys[6] => $this->getSalutation(),
            $keys[7] => $this->getFirstName(),
            $keys[8] => $this->getLastName(),
            $keys[9] => $this->getCustomerSessionId(),
            $keys[10] => $this->getIncrementId(),
            $keys[11] => $this->getInvoiceNumber(),
            $keys[12] => $this->getInvoiceGeneratedAt(),
            $keys[13] => $this->getIpAddress(),
            $keys[14] => $this->getGrandTotal(),
            $keys[15] => $this->getSubtotal(),
            $keys[16] => $this->getIsTest(),
            $keys[17] => $this->getCreatedAt(),
            $keys[18] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aBillingAddress) {
                $result['BillingAddress'] = $this->aBillingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aShippingAddress) {
                $result['ShippingAddress'] = $this->aShippingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCustomer) {
                $result['Customer'] = $this->aCustomer->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProcess) {
                $result['Process'] = $this->aProcess->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collInvoices) {
                $result['Invoices'] = $this->collInvoices->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singlePayment) {
                $result['Payment'] = $this->singlePayment->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTransitionLogs) {
                $result['TransitionLogs'] = $this->collTransitionLogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collItems) {
                $result['Items'] = $this->collItems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNotes) {
                $result['Notes'] = $this->collNotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrderComments) {
                $result['OrderComments'] = $this->collOrderComments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHistories) {
                $result['Histories'] = $this->collHistories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpenses) {
                $result['Expenses'] = $this->collExpenses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiscounts) {
                $result['Discounts'] = $this->collDiscounts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCodeUsages) {
                $result['CodeUsages'] = $this->collCodeUsages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesruleLogs) {
                $result['SalesruleLogs'] = $this->collSalesruleLogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collQuotes) {
                $result['Quotes'] = $this->collQuotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleSaoOrder) {
                $result['SaoOrder'] = $this->singleSaoOrder->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCCValidations) {
                $result['CCValidations'] = $this->collCCValidations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleSaoSalesOrder) {
                $result['SaoSalesOrder'] = $this->singleSaoSalesOrder->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdSalesOrder($value);
                break;
            case 1:
                $this->setFkSalesOrderAddressBilling($value);
                break;
            case 2:
                $this->setFkSalesOrderAddressShipping($value);
                break;
            case 3:
                $this->setFkCustomer($value);
                break;
            case 4:
                $this->setFkSalesOrderProcess($value);
                break;
            case 5:
                $this->setEmail($value);
                break;
            case 6:
                $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 7:
                $this->setFirstName($value);
                break;
            case 8:
                $this->setLastName($value);
                break;
            case 9:
                $this->setCustomerSessionId($value);
                break;
            case 10:
                $this->setIncrementId($value);
                break;
            case 11:
                $this->setInvoiceNumber($value);
                break;
            case 12:
                $this->setInvoiceGeneratedAt($value);
                break;
            case 13:
                $this->setIpAddress($value);
                break;
            case 14:
                $this->setGrandTotal($value);
                break;
            case 15:
                $this->setSubtotal($value);
                break;
            case 16:
                $this->setIsTest($value);
                break;
            case 17:
                $this->setCreatedAt($value);
                break;
            case 18:
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
        $keys = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdSalesOrder($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkSalesOrderAddressBilling($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkSalesOrderAddressShipping($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkCustomer($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFkSalesOrderProcess($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSalutation($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setFirstName($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastName($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCustomerSessionId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIncrementId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setInvoiceNumber($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setInvoiceGeneratedAt($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setIpAddress($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setGrandTotal($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setSubtotal($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setIsTest($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCreatedAt($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setUpdatedAt($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $this->id_sales_order);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, $this->fk_sales_order_address_billing);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, $this->fk_sales_order_address_shipping);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, $this->fk_customer);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, $this->fk_sales_order_process);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::EMAIL)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::EMAIL, $this->email);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION, $this->salutation);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FIRST_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::LAST_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CUSTOMER_SESSION_ID)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CUSTOMER_SESSION_ID, $this->customer_session_id);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INCREMENT_ID)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INCREMENT_ID, $this->increment_id);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_NUMBER)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_NUMBER, $this->invoice_number);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_GENERATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_GENERATED_AT, $this->invoice_generated_at);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IP_ADDRESS)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IP_ADDRESS, $this->ip_address);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::GRAND_TOTAL)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::GRAND_TOTAL, $this->grand_total);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SUBTOTAL)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SUBTOTAL, $this->subtotal);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IS_TEST)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IS_TEST, $this->is_test);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $this->id_sales_order);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdSalesOrder();
    }

    /**
     * Generic method to set the primary key (id_sales_order column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesOrder($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdSalesOrder();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Sales_Persistence_PacSalesOrder (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrderAddressBilling($this->getFkSalesOrderAddressBilling());
        $copyObj->setFkSalesOrderAddressShipping($this->getFkSalesOrderAddressShipping());
        $copyObj->setFkCustomer($this->getFkCustomer());
        $copyObj->setFkSalesOrderProcess($this->getFkSalesOrderProcess());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setSalutation($this->getSalutation());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setCustomerSessionId($this->getCustomerSessionId());
        $copyObj->setIncrementId($this->getIncrementId());
        $copyObj->setInvoiceNumber($this->getInvoiceNumber());
        $copyObj->setInvoiceGeneratedAt($this->getInvoiceGeneratedAt());
        $copyObj->setIpAddress($this->getIpAddress());
        $copyObj->setGrandTotal($this->getGrandTotal());
        $copyObj->setSubtotal($this->getSubtotal());
        $copyObj->setIsTest($this->getIsTest());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getInvoices() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInvoice($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getPayment();
            if ($relObj) {
                $copyObj->setPayment($relObj->copy($deepCopy));
            }

            foreach ($this->getTransitionLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransitionLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNote($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrderComments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrderComment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHistories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpenses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpense($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDiscounts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscount($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCodeUsages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCodeUsage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesruleLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesruleLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getQuotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuote($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getSaoOrder();
            if ($relObj) {
                $copyObj->setSaoOrder($relObj->copy($deepCopy));
            }

            foreach ($this->getCCValidations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCCValidation($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getSaoSalesOrder();
            if ($relObj) {
                $copyObj->setSaoSalesOrder($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesOrder(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder Clone of current object.
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object.
     *
     * @param             ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $v
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBillingAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderAddressBilling(NULL);
        } else {
            $this->setFkSalesOrderAddressBilling($v->getIdSalesOrderAddress());
        }

        $this->aBillingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addPacSalesOrderRelatedByFkSalesOrderAddressBilling($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The associated ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object.
     * @throws PropelException
     */
    public function getBillingAddress(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBillingAddress === null && ($this->fk_sales_order_address_billing !== null) && $doQuery) {
            $this->aBillingAddress = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery::create()->findPk($this->fk_sales_order_address_billing, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBillingAddress->addPacSalesOrdersRelatedByFkSalesOrderAddressBilling($this);
             */
        }

        return $this->aBillingAddress;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object.
     *
     * @param             ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $v
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShippingAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderAddressShipping(NULL);
        } else {
            $this->setFkSalesOrderAddressShipping($v->getIdSalesOrderAddress());
        }

        $this->aShippingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addPacSalesOrderRelatedByFkSalesOrderAddressShipping($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The associated ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object.
     * @throws PropelException
     */
    public function getShippingAddress(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aShippingAddress === null && ($this->fk_sales_order_address_shipping !== null) && $doQuery) {
            $this->aShippingAddress = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery::create()->findPk($this->fk_sales_order_address_shipping, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShippingAddress->addPacSalesOrdersRelatedByFkSalesOrderAddressShipping($this);
             */
        }

        return $this->aShippingAddress;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Customer_Persistence_PacCustomer object.
     *
     * @param             ProjectA_Zed_Customer_Persistence_PacCustomer $v
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCustomer(ProjectA_Zed_Customer_Persistence_PacCustomer $v = null)
    {
        if ($v === null) {
            $this->setFkCustomer(NULL);
        } else {
            $this->setFkCustomer($v->getIdCustomer());
        }

        $this->aCustomer = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer_Persistence_PacCustomer object, it will not be re-added.
        if ($v !== null) {
            $v->addOrder($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer_Persistence_PacCustomer object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The associated ProjectA_Zed_Customer_Persistence_PacCustomer object.
     * @throws PropelException
     */
    public function getCustomer(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCustomer === null && ($this->fk_customer !== null) && $doQuery) {
            $this->aCustomer = ProjectA_Zed_Customer_Persistence_PacCustomerQuery::create()->findPk($this->fk_customer, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCustomer->addOrders($this);
             */
        }

        return $this->aCustomer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess object.
     *
     * @param             ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess $v
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProcess(ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderProcess(NULL);
        } else {
            $this->setFkSalesOrderProcess($v->getIdSalesOrderProcess());
        }

        $this->aProcess = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess object, it will not be re-added.
        if ($v !== null) {
            $v->addOrder($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess The associated ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess object.
     * @throws PropelException
     */
    public function getProcess(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProcess === null && ($this->fk_sales_order_process !== null) && $doQuery) {
            $this->aProcess = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery::create()->findPk($this->fk_sales_order_process, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProcess->addOrders($this);
             */
        }

        return $this->aProcess;
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
        if ('Invoice' == $relationName) {
            $this->initInvoices();
        }
        if ('TransitionLog' == $relationName) {
            $this->initTransitionLogs();
        }
        if ('Item' == $relationName) {
            $this->initItems();
        }
        if ('Note' == $relationName) {
            $this->initNotes();
        }
        if ('OrderComment' == $relationName) {
            $this->initOrderComments();
        }
        if ('History' == $relationName) {
            $this->initHistories();
        }
        if ('Expense' == $relationName) {
            $this->initExpenses();
        }
        if ('Discount' == $relationName) {
            $this->initDiscounts();
        }
        if ('CodeUsage' == $relationName) {
            $this->initCodeUsages();
        }
        if ('SalesruleLog' == $relationName) {
            $this->initSalesruleLogs();
        }
        if ('Quote' == $relationName) {
            $this->initQuotes();
        }
        if ('CCValidation' == $relationName) {
            $this->initCCValidations();
        }
    }

    /**
     * Clears out the collInvoices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addInvoices()
     */
    public function clearInvoices()
    {
        $this->collInvoices = null; // important to set this to null since that means it is uninitialized
        $this->collInvoicesPartial = null;

        return $this;
    }

    /**
     * reset is the collInvoices collection loaded partially
     *
     * @return void
     */
    public function resetPartialInvoices($v = true)
    {
        $this->collInvoicesPartial = $v;
    }

    /**
     * Initializes the collInvoices collection.
     *
     * By default this just sets the collInvoices collection to an empty array (like clearcollInvoices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInvoices($overrideExisting = true)
    {
        if (null !== $this->collInvoices && !$overrideExisting) {
            return;
        }
        $this->collInvoices = new PropelObjectCollection();
        $this->collInvoices->setModel('ProjectA_Zed_Invoice_Persistence_PacInvoice');
    }

    /**
     * Gets an array of ProjectA_Zed_Invoice_Persistence_PacInvoice objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_PacInvoice[] List of ProjectA_Zed_Invoice_Persistence_PacInvoice objects
     * @throws PropelException
     */
    public function getInvoices($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInvoicesPartial && !$this->isNew();
        if (null === $this->collInvoices || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInvoices) {
                // return empty collection
                $this->initInvoices();
            } else {
                $collInvoices = ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInvoicesPartial && count($collInvoices)) {
                      $this->initInvoices(false);

                      foreach($collInvoices as $obj) {
                        if (false == $this->collInvoices->contains($obj)) {
                          $this->collInvoices->append($obj);
                        }
                      }

                      $this->collInvoicesPartial = true;
                    }

                    $collInvoices->getInternalIterator()->rewind();
                    return $collInvoices;
                }

                if($partial && $this->collInvoices) {
                    foreach($this->collInvoices as $obj) {
                        if($obj->isNew()) {
                            $collInvoices[] = $obj;
                        }
                    }
                }

                $this->collInvoices = $collInvoices;
                $this->collInvoicesPartial = false;
            }
        }

        return $this->collInvoices;
    }

    /**
     * Sets a collection of Invoice objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $invoices A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setInvoices(PropelCollection $invoices, PropelPDO $con = null)
    {
        $invoicesToDelete = $this->getInvoices(new Criteria(), $con)->diff($invoices);

        $this->invoicesScheduledForDeletion = unserialize(serialize($invoicesToDelete));

        foreach ($invoicesToDelete as $invoiceRemoved) {
            $invoiceRemoved->setOrder(null);
        }

        $this->collInvoices = null;
        foreach ($invoices as $invoice) {
            $this->addInvoice($invoice);
        }

        $this->collInvoices = $invoices;
        $this->collInvoicesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Invoice_Persistence_PacInvoice objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Invoice_Persistence_PacInvoice objects.
     * @throws PropelException
     */
    public function countInvoices(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInvoicesPartial && !$this->isNew();
        if (null === $this->collInvoices || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInvoices) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getInvoices());
            }
            $query = ProjectA_Zed_Invoice_Persistence_PacInvoiceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collInvoices);
    }

    /**
     * Method called to associate a ProjectA_Zed_Invoice_Persistence_PacInvoice object to this object
     * through the ProjectA_Zed_Invoice_Persistence_PacInvoice foreign key attribute.
     *
     * @param    ProjectA_Zed_Invoice_Persistence_PacInvoice $l ProjectA_Zed_Invoice_Persistence_PacInvoice
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addInvoice(ProjectA_Zed_Invoice_Persistence_PacInvoice $l)
    {
        if ($this->collInvoices === null) {
            $this->initInvoices();
            $this->collInvoicesPartial = true;
        }
        if (!in_array($l, $this->collInvoices->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInvoice($l);
        }

        return $this;
    }

    /**
     * @param	Invoice $invoice The invoice object to add.
     */
    protected function doAddInvoice($invoice)
    {
        $this->collInvoices[]= $invoice;
        $invoice->setOrder($this);
    }

    /**
     * @param	Invoice $invoice The invoice object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeInvoice($invoice)
    {
        if ($this->getInvoices()->contains($invoice)) {
            $this->collInvoices->remove($this->collInvoices->search($invoice));
            if (null === $this->invoicesScheduledForDeletion) {
                $this->invoicesScheduledForDeletion = clone $this->collInvoices;
                $this->invoicesScheduledForDeletion->clear();
            }
            $this->invoicesScheduledForDeletion[]= clone $invoice;
            $invoice->setOrder(null);
        }

        return $this;
    }

    /**
     * Gets a single ProjectA_Zed_Payment_Persistence_PacPayment object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Payment_Persistence_PacPayment
     * @throws PropelException
     */
    public function getPayment(PropelPDO $con = null)
    {

        if ($this->singlePayment === null && !$this->isNew()) {
            $this->singlePayment = ProjectA_Zed_Payment_Persistence_PacPaymentQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singlePayment;
    }

    /**
     * Sets a single ProjectA_Zed_Payment_Persistence_PacPayment object as related to this object by a one-to-one relationship.
     *
     * @param             ProjectA_Zed_Payment_Persistence_PacPayment $v ProjectA_Zed_Payment_Persistence_PacPayment
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPayment(ProjectA_Zed_Payment_Persistence_PacPayment $v = null)
    {
        $this->singlePayment = $v;

        // Make sure that that the passed-in ProjectA_Zed_Payment_Persistence_PacPayment isn't already associated with this object
        if ($v !== null && $v->getOrder(null, false) === null) {
            $v->setOrder($this);
        }

        return $this;
    }

    /**
     * Clears out the collTransitionLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addTransitionLogs()
     */
    public function clearTransitionLogs()
    {
        $this->collTransitionLogs = null; // important to set this to null since that means it is uninitialized
        $this->collTransitionLogsPartial = null;

        return $this;
    }

    /**
     * reset is the collTransitionLogs collection loaded partially
     *
     * @return void
     */
    public function resetPartialTransitionLogs($v = true)
    {
        $this->collTransitionLogsPartial = $v;
    }

    /**
     * Initializes the collTransitionLogs collection.
     *
     * By default this just sets the collTransitionLogs collection to an empty array (like clearcollTransitionLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTransitionLogs($overrideExisting = true)
    {
        if (null !== $this->collTransitionLogs && !$overrideExisting) {
            return;
        }
        $this->collTransitionLogs = new PropelObjectCollection();
        $this->collTransitionLogs->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     * @throws PropelException
     */
    public function getTransitionLogs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTransitionLogsPartial && !$this->isNew();
        if (null === $this->collTransitionLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTransitionLogs) {
                // return empty collection
                $this->initTransitionLogs();
            } else {
                $collTransitionLogs = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTransitionLogsPartial && count($collTransitionLogs)) {
                      $this->initTransitionLogs(false);

                      foreach($collTransitionLogs as $obj) {
                        if (false == $this->collTransitionLogs->contains($obj)) {
                          $this->collTransitionLogs->append($obj);
                        }
                      }

                      $this->collTransitionLogsPartial = true;
                    }

                    $collTransitionLogs->getInternalIterator()->rewind();
                    return $collTransitionLogs;
                }

                if($partial && $this->collTransitionLogs) {
                    foreach($this->collTransitionLogs as $obj) {
                        if($obj->isNew()) {
                            $collTransitionLogs[] = $obj;
                        }
                    }
                }

                $this->collTransitionLogs = $collTransitionLogs;
                $this->collTransitionLogsPartial = false;
            }
        }

        return $this->collTransitionLogs;
    }

    /**
     * Sets a collection of TransitionLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $transitionLogs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setTransitionLogs(PropelCollection $transitionLogs, PropelPDO $con = null)
    {
        $transitionLogsToDelete = $this->getTransitionLogs(new Criteria(), $con)->diff($transitionLogs);

        $this->transitionLogsScheduledForDeletion = unserialize(serialize($transitionLogsToDelete));

        foreach ($transitionLogsToDelete as $transitionLogRemoved) {
            $transitionLogRemoved->setOrder(null);
        }

        $this->collTransitionLogs = null;
        foreach ($transitionLogs as $transitionLog) {
            $this->addTransitionLog($transitionLog);
        }

        $this->collTransitionLogs = $transitionLogs;
        $this->collTransitionLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects.
     * @throws PropelException
     */
    public function countTransitionLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTransitionLogsPartial && !$this->isNew();
        if (null === $this->collTransitionLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTransitionLogs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTransitionLogs());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collTransitionLogs);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog $l ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addTransitionLog(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog $l)
    {
        if ($this->collTransitionLogs === null) {
            $this->initTransitionLogs();
            $this->collTransitionLogsPartial = true;
        }
        if (!in_array($l, $this->collTransitionLogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTransitionLog($l);
        }

        return $this;
    }

    /**
     * @param	TransitionLog $transitionLog The transitionLog object to add.
     */
    protected function doAddTransitionLog($transitionLog)
    {
        $this->collTransitionLogs[]= $transitionLog;
        $transitionLog->setOrder($this);
    }

    /**
     * @param	TransitionLog $transitionLog The transitionLog object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeTransitionLog($transitionLog)
    {
        if ($this->getTransitionLogs()->contains($transitionLog)) {
            $this->collTransitionLogs->remove($this->collTransitionLogs->search($transitionLog));
            if (null === $this->transitionLogsScheduledForDeletion) {
                $this->transitionLogsScheduledForDeletion = clone $this->collTransitionLogs;
                $this->transitionLogsScheduledForDeletion->clear();
            }
            $this->transitionLogsScheduledForDeletion[]= clone $transitionLog;
            $transitionLog->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     */
    public function getTransitionLogsJoinOrderItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
        $query->joinWith('OrderItem', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     */
    public function getTransitionLogsJoinAclUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
        $query->joinWith('AclUser', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     */
    public function getTransitionLogsJoinProcess($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
        $query->joinWith('Process', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }

    /**
     * Clears out the collItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addItems()
     */
    public function clearItems()
    {
        $this->collItems = null; // important to set this to null since that means it is uninitialized
        $this->collItemsPartial = null;

        return $this;
    }

    /**
     * reset is the collItems collection loaded partially
     *
     * @return void
     */
    public function resetPartialItems($v = true)
    {
        $this->collItemsPartial = $v;
    }

    /**
     * Initializes the collItems collection.
     *
     * By default this just sets the collItems collection to an empty array (like clearcollItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initItems($overrideExisting = true)
    {
        if (null !== $this->collItems && !$overrideExisting) {
            return;
        }
        $this->collItems = new PropelObjectCollection();
        $this->collItems->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderItem');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects
     * @throws PropelException
     */
    public function getItems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collItemsPartial && !$this->isNew();
        if (null === $this->collItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collItems) {
                // return empty collection
                $this->initItems();
            } else {
                $collItems = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collItemsPartial && count($collItems)) {
                      $this->initItems(false);

                      foreach($collItems as $obj) {
                        if (false == $this->collItems->contains($obj)) {
                          $this->collItems->append($obj);
                        }
                      }

                      $this->collItemsPartial = true;
                    }

                    $collItems->getInternalIterator()->rewind();
                    return $collItems;
                }

                if($partial && $this->collItems) {
                    foreach($this->collItems as $obj) {
                        if($obj->isNew()) {
                            $collItems[] = $obj;
                        }
                    }
                }

                $this->collItems = $collItems;
                $this->collItemsPartial = false;
            }
        }

        return $this->collItems;
    }

    /**
     * Sets a collection of Item objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $items A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setItems(PropelCollection $items, PropelPDO $con = null)
    {
        $itemsToDelete = $this->getItems(new Criteria(), $con)->diff($items);

        $this->itemsScheduledForDeletion = unserialize(serialize($itemsToDelete));

        foreach ($itemsToDelete as $itemRemoved) {
            $itemRemoved->setOrder(null);
        }

        $this->collItems = null;
        foreach ($items as $item) {
            $this->addItem($item);
        }

        $this->collItems = $items;
        $this->collItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects.
     * @throws PropelException
     */
    public function countItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collItemsPartial && !$this->isNew();
        if (null === $this->collItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collItems) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getItems());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collItems);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderItem foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $l ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $l)
    {
        if ($this->collItems === null) {
            $this->initItems();
            $this->collItemsPartial = true;
        }
        if (!in_array($l, $this->collItems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddItem($l);
        }

        return $this;
    }

    /**
     * @param	Item $item The item object to add.
     */
    protected function doAddItem($item)
    {
        $this->collItems[]= $item;
        $item->setOrder($this);
    }

    /**
     * @param	Item $item The item object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeItem($item)
    {
        if ($this->getItems()->contains($item)) {
            $this->collItems->remove($this->collItems->search($item));
            if (null === $this->itemsScheduledForDeletion) {
                $this->itemsScheduledForDeletion = clone $this->collItems;
                $this->itemsScheduledForDeletion->clear();
            }
            $this->itemsScheduledForDeletion[]= clone $item;
            $item->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Items from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects
     */
    public function getItemsJoinStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Status', $join_behavior);

        return $this->getItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Items from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects
     */
    public function getItemsJoinProcess($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Process', $join_behavior);

        return $this->getItems($query, $con);
    }

    /**
     * Clears out the collNotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addNotes()
     */
    public function clearNotes()
    {
        $this->collNotes = null; // important to set this to null since that means it is uninitialized
        $this->collNotesPartial = null;

        return $this;
    }

    /**
     * reset is the collNotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialNotes($v = true)
    {
        $this->collNotesPartial = $v;
    }

    /**
     * Initializes the collNotes collection.
     *
     * By default this just sets the collNotes collection to an empty array (like clearcollNotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNotes($overrideExisting = true)
    {
        if (null !== $this->collNotes && !$overrideExisting) {
            return;
        }
        $this->collNotes = new PropelObjectCollection();
        $this->collNotes->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderNote');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderNote[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects
     * @throws PropelException
     */
    public function getNotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNotesPartial && !$this->isNew();
        if (null === $this->collNotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNotes) {
                // return empty collection
                $this->initNotes();
            } else {
                $collNotes = ProjectA_Zed_Sales_Persistence_PacSalesOrderNoteQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNotesPartial && count($collNotes)) {
                      $this->initNotes(false);

                      foreach($collNotes as $obj) {
                        if (false == $this->collNotes->contains($obj)) {
                          $this->collNotes->append($obj);
                        }
                      }

                      $this->collNotesPartial = true;
                    }

                    $collNotes->getInternalIterator()->rewind();
                    return $collNotes;
                }

                if($partial && $this->collNotes) {
                    foreach($this->collNotes as $obj) {
                        if($obj->isNew()) {
                            $collNotes[] = $obj;
                        }
                    }
                }

                $this->collNotes = $collNotes;
                $this->collNotesPartial = false;
            }
        }

        return $this->collNotes;
    }

    /**
     * Sets a collection of Note objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $notes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setNotes(PropelCollection $notes, PropelPDO $con = null)
    {
        $notesToDelete = $this->getNotes(new Criteria(), $con)->diff($notes);

        $this->notesScheduledForDeletion = unserialize(serialize($notesToDelete));

        foreach ($notesToDelete as $noteRemoved) {
            $noteRemoved->setOrder(null);
        }

        $this->collNotes = null;
        foreach ($notes as $note) {
            $this->addNote($note);
        }

        $this->collNotes = $notes;
        $this->collNotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects.
     * @throws PropelException
     */
    public function countNotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNotesPartial && !$this->isNew();
        if (null === $this->collNotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNotes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getNotes());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderNoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collNotes);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderNote object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderNote foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderNote $l ProjectA_Zed_Sales_Persistence_PacSalesOrderNote
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addNote(ProjectA_Zed_Sales_Persistence_PacSalesOrderNote $l)
    {
        if ($this->collNotes === null) {
            $this->initNotes();
            $this->collNotesPartial = true;
        }
        if (!in_array($l, $this->collNotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNote($l);
        }

        return $this;
    }

    /**
     * @param	Note $note The note object to add.
     */
    protected function doAddNote($note)
    {
        $this->collNotes[]= $note;
        $note->setOrder($this);
    }

    /**
     * @param	Note $note The note object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeNote($note)
    {
        if ($this->getNotes()->contains($note)) {
            $this->collNotes->remove($this->collNotes->search($note));
            if (null === $this->notesScheduledForDeletion) {
                $this->notesScheduledForDeletion = clone $this->collNotes;
                $this->notesScheduledForDeletion->clear();
            }
            $this->notesScheduledForDeletion[]= clone $note;
            $note->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Notes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderNote[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects
     */
    public function getNotesJoinAclUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderNoteQuery::create(null, $criteria);
        $query->joinWith('AclUser', $join_behavior);

        return $this->getNotes($query, $con);
    }

    /**
     * Clears out the collOrderComments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addOrderComments()
     */
    public function clearOrderComments()
    {
        $this->collOrderComments = null; // important to set this to null since that means it is uninitialized
        $this->collOrderCommentsPartial = null;

        return $this;
    }

    /**
     * reset is the collOrderComments collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrderComments($v = true)
    {
        $this->collOrderCommentsPartial = $v;
    }

    /**
     * Initializes the collOrderComments collection.
     *
     * By default this just sets the collOrderComments collection to an empty array (like clearcollOrderComments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrderComments($overrideExisting = true)
    {
        if (null !== $this->collOrderComments && !$overrideExisting) {
            return;
        }
        $this->collOrderComments = new PropelObjectCollection();
        $this->collOrderComments->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderComment');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderComment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderComment[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderComment objects
     * @throws PropelException
     */
    public function getOrderComments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrderCommentsPartial && !$this->isNew();
        if (null === $this->collOrderComments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrderComments) {
                // return empty collection
                $this->initOrderComments();
            } else {
                $collOrderComments = ProjectA_Zed_Sales_Persistence_PacSalesOrderCommentQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrderCommentsPartial && count($collOrderComments)) {
                      $this->initOrderComments(false);

                      foreach($collOrderComments as $obj) {
                        if (false == $this->collOrderComments->contains($obj)) {
                          $this->collOrderComments->append($obj);
                        }
                      }

                      $this->collOrderCommentsPartial = true;
                    }

                    $collOrderComments->getInternalIterator()->rewind();
                    return $collOrderComments;
                }

                if($partial && $this->collOrderComments) {
                    foreach($this->collOrderComments as $obj) {
                        if($obj->isNew()) {
                            $collOrderComments[] = $obj;
                        }
                    }
                }

                $this->collOrderComments = $collOrderComments;
                $this->collOrderCommentsPartial = false;
            }
        }

        return $this->collOrderComments;
    }

    /**
     * Sets a collection of OrderComment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orderComments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setOrderComments(PropelCollection $orderComments, PropelPDO $con = null)
    {
        $orderCommentsToDelete = $this->getOrderComments(new Criteria(), $con)->diff($orderComments);

        $this->orderCommentsScheduledForDeletion = unserialize(serialize($orderCommentsToDelete));

        foreach ($orderCommentsToDelete as $orderCommentRemoved) {
            $orderCommentRemoved->setOrder(null);
        }

        $this->collOrderComments = null;
        foreach ($orderComments as $orderComment) {
            $this->addOrderComment($orderComment);
        }

        $this->collOrderComments = $orderComments;
        $this->collOrderCommentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderComment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderComment objects.
     * @throws PropelException
     */
    public function countOrderComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrderCommentsPartial && !$this->isNew();
        if (null === $this->collOrderComments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrderComments) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOrderComments());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderCommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collOrderComments);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderComment object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderComment foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderComment $l ProjectA_Zed_Sales_Persistence_PacSalesOrderComment
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addOrderComment(ProjectA_Zed_Sales_Persistence_PacSalesOrderComment $l)
    {
        if ($this->collOrderComments === null) {
            $this->initOrderComments();
            $this->collOrderCommentsPartial = true;
        }
        if (!in_array($l, $this->collOrderComments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrderComment($l);
        }

        return $this;
    }

    /**
     * @param	OrderComment $orderComment The orderComment object to add.
     */
    protected function doAddOrderComment($orderComment)
    {
        $this->collOrderComments[]= $orderComment;
        $orderComment->setOrder($this);
    }

    /**
     * @param	OrderComment $orderComment The orderComment object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeOrderComment($orderComment)
    {
        if ($this->getOrderComments()->contains($orderComment)) {
            $this->collOrderComments->remove($this->collOrderComments->search($orderComment));
            if (null === $this->orderCommentsScheduledForDeletion) {
                $this->orderCommentsScheduledForDeletion = clone $this->collOrderComments;
                $this->orderCommentsScheduledForDeletion->clear();
            }
            $this->orderCommentsScheduledForDeletion[]= clone $orderComment;
            $orderComment->setOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addHistories()
     */
    public function clearHistories()
    {
        $this->collHistories = null; // important to set this to null since that means it is uninitialized
        $this->collHistoriesPartial = null;

        return $this;
    }

    /**
     * reset is the collHistories collection loaded partially
     *
     * @return void
     */
    public function resetPartialHistories($v = true)
    {
        $this->collHistoriesPartial = $v;
    }

    /**
     * Initializes the collHistories collection.
     *
     * By default this just sets the collHistories collection to an empty array (like clearcollHistories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistories($overrideExisting = true)
    {
        if (null !== $this->collHistories && !$overrideExisting) {
            return;
        }
        $this->collHistories = new PropelObjectCollection();
        $this->collHistories->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory objects
     * @throws PropelException
     */
    public function getHistories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collHistoriesPartial && !$this->isNew();
        if (null === $this->collHistories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHistories) {
                // return empty collection
                $this->initHistories();
            } else {
                $collHistories = ProjectA_Zed_Sales_Persistence_PacSalesOrderHistoryQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collHistoriesPartial && count($collHistories)) {
                      $this->initHistories(false);

                      foreach($collHistories as $obj) {
                        if (false == $this->collHistories->contains($obj)) {
                          $this->collHistories->append($obj);
                        }
                      }

                      $this->collHistoriesPartial = true;
                    }

                    $collHistories->getInternalIterator()->rewind();
                    return $collHistories;
                }

                if($partial && $this->collHistories) {
                    foreach($this->collHistories as $obj) {
                        if($obj->isNew()) {
                            $collHistories[] = $obj;
                        }
                    }
                }

                $this->collHistories = $collHistories;
                $this->collHistoriesPartial = false;
            }
        }

        return $this->collHistories;
    }

    /**
     * Sets a collection of History objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $histories A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setHistories(PropelCollection $histories, PropelPDO $con = null)
    {
        $historiesToDelete = $this->getHistories(new Criteria(), $con)->diff($histories);

        $this->historiesScheduledForDeletion = unserialize(serialize($historiesToDelete));

        foreach ($historiesToDelete as $historyRemoved) {
            $historyRemoved->setOrder(null);
        }

        $this->collHistories = null;
        foreach ($histories as $history) {
            $this->addHistory($history);
        }

        $this->collHistories = $histories;
        $this->collHistoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory objects.
     * @throws PropelException
     */
    public function countHistories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collHistoriesPartial && !$this->isNew();
        if (null === $this->collHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHistories) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getHistories());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collHistories);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory $l ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addHistory(ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory $l)
    {
        if ($this->collHistories === null) {
            $this->initHistories();
            $this->collHistoriesPartial = true;
        }
        if (!in_array($l, $this->collHistories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddHistory($l);
        }

        return $this;
    }

    /**
     * @param	History $history The history object to add.
     */
    protected function doAddHistory($history)
    {
        $this->collHistories[]= $history;
        $history->setOrder($this);
    }

    /**
     * @param	History $history The history object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeHistory($history)
    {
        if ($this->getHistories()->contains($history)) {
            $this->collHistories->remove($this->collHistories->search($history));
            if (null === $this->historiesScheduledForDeletion) {
                $this->historiesScheduledForDeletion = clone $this->collHistories;
                $this->historiesScheduledForDeletion->clear();
            }
            $this->historiesScheduledForDeletion[]= clone $history;
            $history->setOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpenses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addExpenses()
     */
    public function clearExpenses()
    {
        $this->collExpenses = null; // important to set this to null since that means it is uninitialized
        $this->collExpensesPartial = null;

        return $this;
    }

    /**
     * reset is the collExpenses collection loaded partially
     *
     * @return void
     */
    public function resetPartialExpenses($v = true)
    {
        $this->collExpensesPartial = $v;
    }

    /**
     * Initializes the collExpenses collection.
     *
     * By default this just sets the collExpenses collection to an empty array (like clearcollExpenses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpenses($overrideExisting = true)
    {
        if (null !== $this->collExpenses && !$overrideExisting) {
            return;
        }
        $this->collExpenses = new PropelObjectCollection();
        $this->collExpenses->setModel('ProjectA_Zed_Sales_Persistence_PacSalesExpense');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesExpense objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesExpense[] List of ProjectA_Zed_Sales_Persistence_PacSalesExpense objects
     * @throws PropelException
     */
    public function getExpenses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExpensesPartial && !$this->isNew();
        if (null === $this->collExpenses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpenses) {
                // return empty collection
                $this->initExpenses();
            } else {
                $collExpenses = ProjectA_Zed_Sales_Persistence_PacSalesExpenseQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpensesPartial && count($collExpenses)) {
                      $this->initExpenses(false);

                      foreach($collExpenses as $obj) {
                        if (false == $this->collExpenses->contains($obj)) {
                          $this->collExpenses->append($obj);
                        }
                      }

                      $this->collExpensesPartial = true;
                    }

                    $collExpenses->getInternalIterator()->rewind();
                    return $collExpenses;
                }

                if($partial && $this->collExpenses) {
                    foreach($this->collExpenses as $obj) {
                        if($obj->isNew()) {
                            $collExpenses[] = $obj;
                        }
                    }
                }

                $this->collExpenses = $collExpenses;
                $this->collExpensesPartial = false;
            }
        }

        return $this->collExpenses;
    }

    /**
     * Sets a collection of Expense objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $expenses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setExpenses(PropelCollection $expenses, PropelPDO $con = null)
    {
        $expensesToDelete = $this->getExpenses(new Criteria(), $con)->diff($expenses);

        $this->expensesScheduledForDeletion = unserialize(serialize($expensesToDelete));

        foreach ($expensesToDelete as $expenseRemoved) {
            $expenseRemoved->setOrder(null);
        }

        $this->collExpenses = null;
        foreach ($expenses as $expense) {
            $this->addExpense($expense);
        }

        $this->collExpenses = $expenses;
        $this->collExpensesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesExpense objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesExpense objects.
     * @throws PropelException
     */
    public function countExpenses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpensesPartial && !$this->isNew();
        if (null === $this->collExpenses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpenses) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getExpenses());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesExpenseQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collExpenses);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesExpense object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesExpense foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesExpense $l ProjectA_Zed_Sales_Persistence_PacSalesExpense
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addExpense(ProjectA_Zed_Sales_Persistence_PacSalesExpense $l)
    {
        if ($this->collExpenses === null) {
            $this->initExpenses();
            $this->collExpensesPartial = true;
        }
        if (!in_array($l, $this->collExpenses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpense($l);
        }

        return $this;
    }

    /**
     * @param	Expense $expense The expense object to add.
     */
    protected function doAddExpense($expense)
    {
        $this->collExpenses[]= $expense;
        $expense->setOrder($this);
    }

    /**
     * @param	Expense $expense The expense object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeExpense($expense)
    {
        if ($this->getExpenses()->contains($expense)) {
            $this->collExpenses->remove($this->collExpenses->search($expense));
            if (null === $this->expensesScheduledForDeletion) {
                $this->expensesScheduledForDeletion = clone $this->collExpenses;
                $this->expensesScheduledForDeletion->clear();
            }
            $this->expensesScheduledForDeletion[]= $expense;
            $expense->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Expenses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesExpense[] List of ProjectA_Zed_Sales_Persistence_PacSalesExpense objects
     */
    public function getExpensesJoinOrderItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesExpenseQuery::create(null, $criteria);
        $query->joinWith('OrderItem', $join_behavior);

        return $this->getExpenses($query, $con);
    }

    /**
     * Clears out the collDiscounts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addDiscounts()
     */
    public function clearDiscounts()
    {
        $this->collDiscounts = null; // important to set this to null since that means it is uninitialized
        $this->collDiscountsPartial = null;

        return $this;
    }

    /**
     * reset is the collDiscounts collection loaded partially
     *
     * @return void
     */
    public function resetPartialDiscounts($v = true)
    {
        $this->collDiscountsPartial = $v;
    }

    /**
     * Initializes the collDiscounts collection.
     *
     * By default this just sets the collDiscounts collection to an empty array (like clearcollDiscounts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiscounts($overrideExisting = true)
    {
        if (null !== $this->collDiscounts && !$overrideExisting) {
            return;
        }
        $this->collDiscounts = new PropelObjectCollection();
        $this->collDiscounts->setModel('ProjectA_Zed_Sales_Persistence_PacSalesDiscount');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects
     * @throws PropelException
     */
    public function getDiscounts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDiscountsPartial && !$this->isNew();
        if (null === $this->collDiscounts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiscounts) {
                // return empty collection
                $this->initDiscounts();
            } else {
                $collDiscounts = ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDiscountsPartial && count($collDiscounts)) {
                      $this->initDiscounts(false);

                      foreach($collDiscounts as $obj) {
                        if (false == $this->collDiscounts->contains($obj)) {
                          $this->collDiscounts->append($obj);
                        }
                      }

                      $this->collDiscountsPartial = true;
                    }

                    $collDiscounts->getInternalIterator()->rewind();
                    return $collDiscounts;
                }

                if($partial && $this->collDiscounts) {
                    foreach($this->collDiscounts as $obj) {
                        if($obj->isNew()) {
                            $collDiscounts[] = $obj;
                        }
                    }
                }

                $this->collDiscounts = $collDiscounts;
                $this->collDiscountsPartial = false;
            }
        }

        return $this->collDiscounts;
    }

    /**
     * Sets a collection of Discount objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $discounts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setDiscounts(PropelCollection $discounts, PropelPDO $con = null)
    {
        $discountsToDelete = $this->getDiscounts(new Criteria(), $con)->diff($discounts);

        $this->discountsScheduledForDeletion = unserialize(serialize($discountsToDelete));

        foreach ($discountsToDelete as $discountRemoved) {
            $discountRemoved->setOrder(null);
        }

        $this->collDiscounts = null;
        foreach ($discounts as $discount) {
            $this->addDiscount($discount);
        }

        $this->collDiscounts = $discounts;
        $this->collDiscountsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects.
     * @throws PropelException
     */
    public function countDiscounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDiscountsPartial && !$this->isNew();
        if (null === $this->collDiscounts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscounts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDiscounts());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collDiscounts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesDiscount object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesDiscount foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesDiscount $l ProjectA_Zed_Sales_Persistence_PacSalesDiscount
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addDiscount(ProjectA_Zed_Sales_Persistence_PacSalesDiscount $l)
    {
        if ($this->collDiscounts === null) {
            $this->initDiscounts();
            $this->collDiscountsPartial = true;
        }
        if (!in_array($l, $this->collDiscounts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDiscount($l);
        }

        return $this;
    }

    /**
     * @param	Discount $discount The discount object to add.
     */
    protected function doAddDiscount($discount)
    {
        $this->collDiscounts[]= $discount;
        $discount->setOrder($this);
    }

    /**
     * @param	Discount $discount The discount object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeDiscount($discount)
    {
        if ($this->getDiscounts()->contains($discount)) {
            $this->collDiscounts->remove($this->collDiscounts->search($discount));
            if (null === $this->discountsScheduledForDeletion) {
                $this->discountsScheduledForDeletion = clone $this->collDiscounts;
                $this->discountsScheduledForDeletion->clear();
            }
            $this->discountsScheduledForDeletion[]= $discount;
            $discount->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects
     */
    public function getDiscountsJoinOrderItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('OrderItem', $join_behavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects
     */
    public function getDiscountsJoinExpense($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Expense', $join_behavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects
     */
    public function getDiscountsJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getDiscounts($query, $con);
    }

    /**
     * Clears out the collCodeUsages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addCodeUsages()
     */
    public function clearCodeUsages()
    {
        $this->collCodeUsages = null; // important to set this to null since that means it is uninitialized
        $this->collCodeUsagesPartial = null;

        return $this;
    }

    /**
     * reset is the collCodeUsages collection loaded partially
     *
     * @return void
     */
    public function resetPartialCodeUsages($v = true)
    {
        $this->collCodeUsagesPartial = $v;
    }

    /**
     * Initializes the collCodeUsages collection.
     *
     * By default this just sets the collCodeUsages collection to an empty array (like clearcollCodeUsages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCodeUsages($overrideExisting = true)
    {
        if (null !== $this->collCodeUsages && !$overrideExisting) {
            return;
        }
        $this->collCodeUsages = new PropelObjectCollection();
        $this->collCodeUsages->setModel('ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage');
    }

    /**
     * Gets an array of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects
     * @throws PropelException
     */
    public function getCodeUsages($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCodeUsagesPartial && !$this->isNew();
        if (null === $this->collCodeUsages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCodeUsages) {
                // return empty collection
                $this->initCodeUsages();
            } else {
                $collCodeUsages = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCodeUsagesPartial && count($collCodeUsages)) {
                      $this->initCodeUsages(false);

                      foreach($collCodeUsages as $obj) {
                        if (false == $this->collCodeUsages->contains($obj)) {
                          $this->collCodeUsages->append($obj);
                        }
                      }

                      $this->collCodeUsagesPartial = true;
                    }

                    $collCodeUsages->getInternalIterator()->rewind();
                    return $collCodeUsages;
                }

                if($partial && $this->collCodeUsages) {
                    foreach($this->collCodeUsages as $obj) {
                        if($obj->isNew()) {
                            $collCodeUsages[] = $obj;
                        }
                    }
                }

                $this->collCodeUsages = $collCodeUsages;
                $this->collCodeUsagesPartial = false;
            }
        }

        return $this->collCodeUsages;
    }

    /**
     * Sets a collection of CodeUsage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $codeUsages A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setCodeUsages(PropelCollection $codeUsages, PropelPDO $con = null)
    {
        $codeUsagesToDelete = $this->getCodeUsages(new Criteria(), $con)->diff($codeUsages);

        $this->codeUsagesScheduledForDeletion = unserialize(serialize($codeUsagesToDelete));

        foreach ($codeUsagesToDelete as $codeUsageRemoved) {
            $codeUsageRemoved->setOrder(null);
        }

        $this->collCodeUsages = null;
        foreach ($codeUsages as $codeUsage) {
            $this->addCodeUsage($codeUsage);
        }

        $this->collCodeUsages = $codeUsages;
        $this->collCodeUsagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects.
     * @throws PropelException
     */
    public function countCodeUsages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCodeUsagesPartial && !$this->isNew();
        if (null === $this->collCodeUsages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCodeUsages) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCodeUsages());
            }
            $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collCodeUsages);
    }

    /**
     * Method called to associate a ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage object to this object
     * through the ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage foreign key attribute.
     *
     * @param    ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage $l ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addCodeUsage(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage $l)
    {
        if ($this->collCodeUsages === null) {
            $this->initCodeUsages();
            $this->collCodeUsagesPartial = true;
        }
        if (!in_array($l, $this->collCodeUsages->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCodeUsage($l);
        }

        return $this;
    }

    /**
     * @param	CodeUsage $codeUsage The codeUsage object to add.
     */
    protected function doAddCodeUsage($codeUsage)
    {
        $this->collCodeUsages[]= $codeUsage;
        $codeUsage->setOrder($this);
    }

    /**
     * @param	CodeUsage $codeUsage The codeUsage object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeCodeUsage($codeUsage)
    {
        if ($this->getCodeUsages()->contains($codeUsage)) {
            $this->collCodeUsages->remove($this->collCodeUsages->search($codeUsage));
            if (null === $this->codeUsagesScheduledForDeletion) {
                $this->codeUsagesScheduledForDeletion = clone $this->collCodeUsages;
                $this->codeUsagesScheduledForDeletion->clear();
            }
            $this->codeUsagesScheduledForDeletion[]= clone $codeUsage;
            $codeUsage->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related CodeUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects
     */
    public function getCodeUsagesJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria);
        $query->joinWith('Customer', $join_behavior);

        return $this->getCodeUsages($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related CodeUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects
     */
    public function getCodeUsagesJoinCode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria);
        $query->joinWith('Code', $join_behavior);

        return $this->getCodeUsages($query, $con);
    }

    /**
     * Clears out the collSalesruleLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addSalesruleLogs()
     */
    public function clearSalesruleLogs()
    {
        $this->collSalesruleLogs = null; // important to set this to null since that means it is uninitialized
        $this->collSalesruleLogsPartial = null;

        return $this;
    }

    /**
     * reset is the collSalesruleLogs collection loaded partially
     *
     * @return void
     */
    public function resetPartialSalesruleLogs($v = true)
    {
        $this->collSalesruleLogsPartial = $v;
    }

    /**
     * Initializes the collSalesruleLogs collection.
     *
     * By default this just sets the collSalesruleLogs collection to an empty array (like clearcollSalesruleLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesruleLogs($overrideExisting = true)
    {
        if (null !== $this->collSalesruleLogs && !$overrideExisting) {
            return;
        }
        $this->collSalesruleLogs = new PropelObjectCollection();
        $this->collSalesruleLogs->setModel('ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog');
    }

    /**
     * Gets an array of ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog objects
     * @throws PropelException
     */
    public function getSalesruleLogs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSalesruleLogsPartial && !$this->isNew();
        if (null === $this->collSalesruleLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesruleLogs) {
                // return empty collection
                $this->initSalesruleLogs();
            } else {
                $collSalesruleLogs = ProjectA_Zed_Salesrule_Persistence_PacSalesruleLogQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesruleLogsPartial && count($collSalesruleLogs)) {
                      $this->initSalesruleLogs(false);

                      foreach($collSalesruleLogs as $obj) {
                        if (false == $this->collSalesruleLogs->contains($obj)) {
                          $this->collSalesruleLogs->append($obj);
                        }
                      }

                      $this->collSalesruleLogsPartial = true;
                    }

                    $collSalesruleLogs->getInternalIterator()->rewind();
                    return $collSalesruleLogs;
                }

                if($partial && $this->collSalesruleLogs) {
                    foreach($this->collSalesruleLogs as $obj) {
                        if($obj->isNew()) {
                            $collSalesruleLogs[] = $obj;
                        }
                    }
                }

                $this->collSalesruleLogs = $collSalesruleLogs;
                $this->collSalesruleLogsPartial = false;
            }
        }

        return $this->collSalesruleLogs;
    }

    /**
     * Sets a collection of SalesruleLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $salesruleLogs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setSalesruleLogs(PropelCollection $salesruleLogs, PropelPDO $con = null)
    {
        $salesruleLogsToDelete = $this->getSalesruleLogs(new Criteria(), $con)->diff($salesruleLogs);

        $this->salesruleLogsScheduledForDeletion = unserialize(serialize($salesruleLogsToDelete));

        foreach ($salesruleLogsToDelete as $salesruleLogRemoved) {
            $salesruleLogRemoved->setOrder(null);
        }

        $this->collSalesruleLogs = null;
        foreach ($salesruleLogs as $salesruleLog) {
            $this->addSalesruleLog($salesruleLog);
        }

        $this->collSalesruleLogs = $salesruleLogs;
        $this->collSalesruleLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog objects.
     * @throws PropelException
     */
    public function countSalesruleLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesruleLogsPartial && !$this->isNew();
        if (null === $this->collSalesruleLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesruleLogs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSalesruleLogs());
            }
            $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collSalesruleLogs);
    }

    /**
     * Method called to associate a ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog object to this object
     * through the ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog foreign key attribute.
     *
     * @param    ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog $l ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addSalesruleLog(ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog $l)
    {
        if ($this->collSalesruleLogs === null) {
            $this->initSalesruleLogs();
            $this->collSalesruleLogsPartial = true;
        }
        if (!in_array($l, $this->collSalesruleLogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesruleLog($l);
        }

        return $this;
    }

    /**
     * @param	SalesruleLog $salesruleLog The salesruleLog object to add.
     */
    protected function doAddSalesruleLog($salesruleLog)
    {
        $this->collSalesruleLogs[]= $salesruleLog;
        $salesruleLog->setOrder($this);
    }

    /**
     * @param	SalesruleLog $salesruleLog The salesruleLog object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeSalesruleLog($salesruleLog)
    {
        if ($this->getSalesruleLogs()->contains($salesruleLog)) {
            $this->collSalesruleLogs->remove($this->collSalesruleLogs->search($salesruleLog));
            if (null === $this->salesruleLogsScheduledForDeletion) {
                $this->salesruleLogsScheduledForDeletion = clone $this->collSalesruleLogs;
                $this->salesruleLogsScheduledForDeletion->clear();
            }
            $this->salesruleLogsScheduledForDeletion[]= clone $salesruleLog;
            $salesruleLog->setOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collQuotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addQuotes()
     */
    public function clearQuotes()
    {
        $this->collQuotes = null; // important to set this to null since that means it is uninitialized
        $this->collQuotesPartial = null;

        return $this;
    }

    /**
     * reset is the collQuotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuotes($v = true)
    {
        $this->collQuotesPartial = $v;
    }

    /**
     * Initializes the collQuotes collection.
     *
     * By default this just sets the collQuotes collection to an empty array (like clearcollQuotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuotes($overrideExisting = true)
    {
        if (null !== $this->collQuotes && !$overrideExisting) {
            return;
        }
        $this->collQuotes = new PropelObjectCollection();
        $this->collQuotes->setModel('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote');
    }

    /**
     * Gets an array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects
     * @throws PropelException
     */
    public function getQuotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuotesPartial && !$this->isNew();
        if (null === $this->collQuotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuotes) {
                // return empty collection
                $this->initQuotes();
            } else {
                $collQuotes = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuotesPartial && count($collQuotes)) {
                      $this->initQuotes(false);

                      foreach($collQuotes as $obj) {
                        if (false == $this->collQuotes->contains($obj)) {
                          $this->collQuotes->append($obj);
                        }
                      }

                      $this->collQuotesPartial = true;
                    }

                    $collQuotes->getInternalIterator()->rewind();
                    return $collQuotes;
                }

                if($partial && $this->collQuotes) {
                    foreach($this->collQuotes as $obj) {
                        if($obj->isNew()) {
                            $collQuotes[] = $obj;
                        }
                    }
                }

                $this->collQuotes = $collQuotes;
                $this->collQuotesPartial = false;
            }
        }

        return $this->collQuotes;
    }

    /**
     * Sets a collection of Quote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quotes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setQuotes(PropelCollection $quotes, PropelPDO $con = null)
    {
        $quotesToDelete = $this->getQuotes(new Criteria(), $con)->diff($quotes);

        $this->quotesScheduledForDeletion = unserialize(serialize($quotesToDelete));

        foreach ($quotesToDelete as $quoteRemoved) {
            $quoteRemoved->setOrder(null);
        }

        $this->collQuotes = null;
        foreach ($quotes as $quote) {
            $this->addQuote($quote);
        }

        $this->collQuotes = $quotes;
        $this->collQuotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException
     */
    public function countQuotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuotesPartial && !$this->isNew();
        if (null === $this->collQuotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuotes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getQuotes());
            }
            $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collQuotes);
    }

    /**
     * Method called to associate a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object to this object
     * through the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote foreign key attribute.
     *
     * @param    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $l Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addQuote(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $l)
    {
        if ($this->collQuotes === null) {
            $this->initQuotes();
            $this->collQuotesPartial = true;
        }
        if (!in_array($l, $this->collQuotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuote($l);
        }

        return $this;
    }

    /**
     * @param	Quote $quote The quote object to add.
     */
    protected function doAddQuote($quote)
    {
        $this->collQuotes[]= $quote;
        $quote->setOrder($this);
    }

    /**
     * @param	Quote $quote The quote object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeQuote($quote)
    {
        if ($this->getQuotes()->contains($quote)) {
            $this->collQuotes->remove($this->collQuotes->search($quote));
            if (null === $this->quotesScheduledForDeletion) {
                $this->quotesScheduledForDeletion = clone $this->collQuotes;
                $this->quotesScheduledForDeletion->clear();
            }
            $this->quotesScheduledForDeletion[]= clone $quote;
            $quote->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Quotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects
     */
    public function getQuotesJoinShippingAgent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria);
        $query->joinWith('ShippingAgent', $join_behavior);

        return $this->getQuotes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrder is new, it will return
     * an empty collection; or if this PacSalesOrder has previously
     * been saved, it will retrieve related Quotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrder.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects
     */
    public function getQuotesJoinProvider($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria);
        $query->joinWith('Provider', $join_behavior);

        return $this->getQuotes($query, $con);
    }

    /**
     * Gets a single Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder
     * @throws PropelException
     */
    public function getSaoOrder(PropelPDO $con = null)
    {

        if ($this->singleSaoOrder === null && !$this->isNew()) {
            $this->singleSaoOrder = Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSaoOrder;
    }

    /**
     * Sets a single Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder object as related to this object by a one-to-one relationship.
     *
     * @param             Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder $v Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSaoOrder(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder $v = null)
    {
        $this->singleSaoOrder = $v;

        // Make sure that that the passed-in Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder isn't already associated with this object
        if ($v !== null && $v->getSalesOrder(null, false) === null) {
            $v->setSalesOrder($this);
        }

        return $this;
    }

    /**
     * Clears out the collCCValidations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @see        addCCValidations()
     */
    public function clearCCValidations()
    {
        $this->collCCValidations = null; // important to set this to null since that means it is uninitialized
        $this->collCCValidationsPartial = null;

        return $this;
    }

    /**
     * reset is the collCCValidations collection loaded partially
     *
     * @return void
     */
    public function resetPartialCCValidations($v = true)
    {
        $this->collCCValidationsPartial = $v;
    }

    /**
     * Initializes the collCCValidations collection.
     *
     * By default this just sets the collCCValidations collection to an empty array (like clearcollCCValidations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCCValidations($overrideExisting = true)
    {
        if (null !== $this->collCCValidations && !$overrideExisting) {
            return;
        }
        $this->collCCValidations = new PropelObjectCollection();
        $this->collCCValidations->setModel('Sao_Zed_Sales_Persistence_SaoSalesCCValidation');
    }

    /**
     * Gets an array of Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesCCValidation[] List of Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects
     * @throws PropelException
     */
    public function getCCValidations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCCValidationsPartial && !$this->isNew();
        if (null === $this->collCCValidations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCCValidations) {
                // return empty collection
                $this->initCCValidations();
            } else {
                $collCCValidations = Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCCValidationsPartial && count($collCCValidations)) {
                      $this->initCCValidations(false);

                      foreach($collCCValidations as $obj) {
                        if (false == $this->collCCValidations->contains($obj)) {
                          $this->collCCValidations->append($obj);
                        }
                      }

                      $this->collCCValidationsPartial = true;
                    }

                    $collCCValidations->getInternalIterator()->rewind();
                    return $collCCValidations;
                }

                if($partial && $this->collCCValidations) {
                    foreach($this->collCCValidations as $obj) {
                        if($obj->isNew()) {
                            $collCCValidations[] = $obj;
                        }
                    }
                }

                $this->collCCValidations = $collCCValidations;
                $this->collCCValidationsPartial = false;
            }
        }

        return $this->collCCValidations;
    }

    /**
     * Sets a collection of CCValidation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $cCValidations A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function setCCValidations(PropelCollection $cCValidations, PropelPDO $con = null)
    {
        $cCValidationsToDelete = $this->getCCValidations(new Criteria(), $con)->diff($cCValidations);

        $this->cCValidationsScheduledForDeletion = unserialize(serialize($cCValidationsToDelete));

        foreach ($cCValidationsToDelete as $cCValidationRemoved) {
            $cCValidationRemoved->setOrder(null);
        }

        $this->collCCValidations = null;
        foreach ($cCValidations as $cCValidation) {
            $this->addCCValidation($cCValidation);
        }

        $this->collCCValidations = $cCValidations;
        $this->collCCValidationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects.
     * @throws PropelException
     */
    public function countCCValidations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCCValidationsPartial && !$this->isNew();
        if (null === $this->collCCValidations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCCValidations) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCCValidations());
            }
            $query = Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collCCValidations);
    }

    /**
     * Method called to associate a Sao_Zed_Sales_Persistence_SaoSalesCCValidation object to this object
     * through the Sao_Zed_Sales_Persistence_SaoSalesCCValidation foreign key attribute.
     *
     * @param    Sao_Zed_Sales_Persistence_SaoSalesCCValidation $l Sao_Zed_Sales_Persistence_SaoSalesCCValidation
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function addCCValidation(Sao_Zed_Sales_Persistence_SaoSalesCCValidation $l)
    {
        if ($this->collCCValidations === null) {
            $this->initCCValidations();
            $this->collCCValidationsPartial = true;
        }
        if (!in_array($l, $this->collCCValidations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCCValidation($l);
        }

        return $this;
    }

    /**
     * @param	CCValidation $cCValidation The cCValidation object to add.
     */
    protected function doAddCCValidation($cCValidation)
    {
        $this->collCCValidations[]= $cCValidation;
        $cCValidation->setOrder($this);
    }

    /**
     * @param	CCValidation $cCValidation The cCValidation object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function removeCCValidation($cCValidation)
    {
        if ($this->getCCValidations()->contains($cCValidation)) {
            $this->collCCValidations->remove($this->collCCValidations->search($cCValidation));
            if (null === $this->cCValidationsScheduledForDeletion) {
                $this->cCValidationsScheduledForDeletion = clone $this->collCCValidations;
                $this->cCValidationsScheduledForDeletion->clear();
            }
            $this->cCValidationsScheduledForDeletion[]= clone $cCValidation;
            $cCValidation->setOrder(null);
        }

        return $this;
    }

    /**
     * Gets a single Sao_Zed_Sales_Persistence_SaoSalesOrder object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrder
     * @throws PropelException
     */
    public function getSaoSalesOrder(PropelPDO $con = null)
    {

        if ($this->singleSaoSalesOrder === null && !$this->isNew()) {
            $this->singleSaoSalesOrder = Sao_Zed_Sales_Persistence_SaoSalesOrderQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSaoSalesOrder;
    }

    /**
     * Sets a single Sao_Zed_Sales_Persistence_SaoSalesOrder object as related to this object by a one-to-one relationship.
     *
     * @param             Sao_Zed_Sales_Persistence_SaoSalesOrder $v Sao_Zed_Sales_Persistence_SaoSalesOrder
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSaoSalesOrder(Sao_Zed_Sales_Persistence_SaoSalesOrder $v = null)
    {
        $this->singleSaoSalesOrder = $v;

        // Make sure that that the passed-in Sao_Zed_Sales_Persistence_SaoSalesOrder isn't already associated with this object
        if ($v !== null && $v->getSalesOrder(null, false) === null) {
            $v->setSalesOrder($this);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_sales_order = null;
        $this->fk_sales_order_address_billing = null;
        $this->fk_sales_order_address_shipping = null;
        $this->fk_customer = null;
        $this->fk_sales_order_process = null;
        $this->email = null;
        $this->salutation = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->customer_session_id = null;
        $this->increment_id = null;
        $this->invoice_number = null;
        $this->invoice_generated_at = null;
        $this->ip_address = null;
        $this->grand_total = null;
        $this->subtotal = null;
        $this->is_test = null;
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
            if ($this->collInvoices) {
                foreach ($this->collInvoices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singlePayment) {
                $this->singlePayment->clearAllReferences($deep);
            }
            if ($this->collTransitionLogs) {
                foreach ($this->collTransitionLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collItems) {
                foreach ($this->collItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNotes) {
                foreach ($this->collNotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrderComments) {
                foreach ($this->collOrderComments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHistories) {
                foreach ($this->collHistories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpenses) {
                foreach ($this->collExpenses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDiscounts) {
                foreach ($this->collDiscounts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCodeUsages) {
                foreach ($this->collCodeUsages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesruleLogs) {
                foreach ($this->collSalesruleLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collQuotes) {
                foreach ($this->collQuotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleSaoOrder) {
                $this->singleSaoOrder->clearAllReferences($deep);
            }
            if ($this->collCCValidations) {
                foreach ($this->collCCValidations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleSaoSalesOrder) {
                $this->singleSaoSalesOrder->clearAllReferences($deep);
            }
            if ($this->aBillingAddress instanceof Persistent) {
              $this->aBillingAddress->clearAllReferences($deep);
            }
            if ($this->aShippingAddress instanceof Persistent) {
              $this->aShippingAddress->clearAllReferences($deep);
            }
            if ($this->aCustomer instanceof Persistent) {
              $this->aCustomer->clearAllReferences($deep);
            }
            if ($this->aProcess instanceof Persistent) {
              $this->aProcess->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collInvoices instanceof PropelCollection) {
            $this->collInvoices->clearIterator();
        }
        $this->collInvoices = null;
        if ($this->singlePayment instanceof PropelCollection) {
            $this->singlePayment->clearIterator();
        }
        $this->singlePayment = null;
        if ($this->collTransitionLogs instanceof PropelCollection) {
            $this->collTransitionLogs->clearIterator();
        }
        $this->collTransitionLogs = null;
        if ($this->collItems instanceof PropelCollection) {
            $this->collItems->clearIterator();
        }
        $this->collItems = null;
        if ($this->collNotes instanceof PropelCollection) {
            $this->collNotes->clearIterator();
        }
        $this->collNotes = null;
        if ($this->collOrderComments instanceof PropelCollection) {
            $this->collOrderComments->clearIterator();
        }
        $this->collOrderComments = null;
        if ($this->collHistories instanceof PropelCollection) {
            $this->collHistories->clearIterator();
        }
        $this->collHistories = null;
        if ($this->collExpenses instanceof PropelCollection) {
            $this->collExpenses->clearIterator();
        }
        $this->collExpenses = null;
        if ($this->collDiscounts instanceof PropelCollection) {
            $this->collDiscounts->clearIterator();
        }
        $this->collDiscounts = null;
        if ($this->collCodeUsages instanceof PropelCollection) {
            $this->collCodeUsages->clearIterator();
        }
        $this->collCodeUsages = null;
        if ($this->collSalesruleLogs instanceof PropelCollection) {
            $this->collSalesruleLogs->clearIterator();
        }
        $this->collSalesruleLogs = null;
        if ($this->collQuotes instanceof PropelCollection) {
            $this->collQuotes->clearIterator();
        }
        $this->collQuotes = null;
        if ($this->singleSaoOrder instanceof PropelCollection) {
            $this->singleSaoOrder->clearIterator();
        }
        $this->singleSaoOrder = null;
        if ($this->collCCValidations instanceof PropelCollection) {
            $this->collCCValidations->clearIterator();
        }
        $this->collCCValidations = null;
        if ($this->singleSaoSalesOrder instanceof PropelCollection) {
            $this->singleSaoSalesOrder->clearIterator();
        }
        $this->singleSaoSalesOrder = null;
        $this->aBillingAddress = null;
        $this->aShippingAddress = null;
        $this->aCustomer = null;
        $this->aProcess = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrder The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT;

        return $this;
    }

}
