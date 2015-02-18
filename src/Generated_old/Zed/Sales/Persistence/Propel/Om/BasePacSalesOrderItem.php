<?php


/**
 * Base class that represents a row from the 'pac_sales_order_item' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItem extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_sales_order_item field.
     * @var        int
     */
    protected $id_sales_order_item;

    /**
     * The value for the fk_sales_order field.
     * @var        int
     */
    protected $fk_sales_order;

    /**
     * The value for the fk_oms_order_item_status field.
     * @var        int
     */
    protected $fk_oms_order_item_status;

    /**
     * The value for the fk_oms_order_process field.
     * @var        int
     */
    protected $fk_oms_order_process;

    /**
     * The value for the fk_sales_order_item_bundle field.
     * @var        int
     */
    protected $fk_sales_order_item_bundle;

    /**
     * The value for the last_status_change field.
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        string
     */
    protected $last_status_change;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the sku field.
     * @var        string
     */
    protected $sku;

    /**
     * The value for the gross_price field.
     * @var        int
     */
    protected $gross_price;

    /**
     * The value for the price_to_pay field.
     * @var        int
     */
    protected $price_to_pay;

    /**
     * The value for the tax_percentage field.
     * @var        string
     */
    protected $tax_percentage;

    /**
     * The value for the variety field.
     * @var        string
     */
    protected $variety;

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
     * @var        PacSalesOrder
     */
    protected $aOrder;

    /**
     * @var        PacOmsOrderItemStatus
     */
    protected $aStatus;

    /**
     * @var        PacOmsOrderProcess
     */
    protected $aProcess;

    /**
     * @var        PacSalesOrderItemBundle
     */
    protected $aSalesOrderItemBundle;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[] Collection to store aggregation of ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects.
     */
    protected $collTransitionLogs;
    protected $collTransitionLogsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory[] Collection to store aggregation of ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects.
     */
    protected $collStatusHistories;
    protected $collStatusHistoriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout[] Collection to store aggregation of ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects.
     */
    protected $collEventTimeouts;
    protected $collEventTimeoutsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects.
     */
    protected $collOptions;
    protected $collOptionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects.
     */
    protected $collExpenses;
    protected $collExpensesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects.
     */
    protected $collDiscounts;
    protected $collDiscountsPartial;

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
    protected $transitionLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $statusHistoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $eventTimeoutsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionsScheduledForDeletion = null;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItem object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_sales_order_item] column value.
     *
     * @return int
     */
    public function getIdSalesOrderItem()
    {

        return $this->id_sales_order_item;
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
     * Get the [fk_oms_order_item_status] column value.
     *
     * @return int
     */
    public function getFkOmsOrderItemStatus()
    {

        return $this->fk_oms_order_item_status;
    }

    /**
     * Get the [fk_oms_order_process] column value.
     *
     * @return int
     */
    public function getFkOmsOrderProcess()
    {

        return $this->fk_oms_order_process;
    }

    /**
     * Get the [fk_sales_order_item_bundle] column value.
     *
     * @return int
     */
    public function getFkSalesOrderItemBundle()
    {

        return $this->fk_sales_order_item_bundle;
    }

    /**
     * Get the [optionally formatted] temporal [last_status_change] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastStatusChange($format = 'Y-m-d H:i:s')
    {
        if ($this->last_status_change === null) {
            return null;
        }

        if ($this->last_status_change === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->last_status_change);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_status_change, true), $x);
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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [sku] column value.
     *
     * @return string
     */
    public function getSku()
    {

        return $this->sku;
    }

    /**
     * Get the [gross_price] column value.
     * /price for one unit including tax, without shipping, coupons/
     * @return int
     */
    public function getGrossPrice()
    {

        return $this->gross_price;
    }

    /**
     * Get the [price_to_pay] column value.
     * /value that the customer has to pay./
     * @return int
     */
    public function getPriceToPay()
    {

        return $this->price_to_pay;
    }

    /**
     * Get the [tax_percentage] column value.
     *
     * @return string
     */
    public function getTaxPercentage()
    {

        return $this->tax_percentage;
    }

    /**
     * Get the [variety] column value.
     *
     * @return string
     */
    public function getVariety()
    {

        return $this->variety;
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
     * Set the value of [id_sales_order_item] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setIdSalesOrderItem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_item !== $v) {
            $this->id_sales_order_item = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM;
        }


        return $this;
    } // setIdSalesOrderItem()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [fk_oms_order_item_status] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setFkOmsOrderItemStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_oms_order_item_status !== $v) {
            $this->fk_oms_order_item_status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS;
        }

        if ($this->aStatus !== null && $this->aStatus->getIdOmsOrderItemStatus() !== $v) {
            $this->aStatus = null;
        }


        return $this;
    } // setFkOmsOrderItemStatus()

    /**
     * Set the value of [fk_oms_order_process] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setFkOmsOrderProcess($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_oms_order_process !== $v) {
            $this->fk_oms_order_process = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS;
        }

        if ($this->aProcess !== null && $this->aProcess->getIdOmsOrderProcess() !== $v) {
            $this->aProcess = null;
        }


        return $this;
    } // setFkOmsOrderProcess()

    /**
     * Set the value of [fk_sales_order_item_bundle] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setFkSalesOrderItemBundle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_item_bundle !== $v) {
            $this->fk_sales_order_item_bundle = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE;
        }

        if ($this->aSalesOrderItemBundle !== null && $this->aSalesOrderItemBundle->getIdSalesOrderItemBundle() !== $v) {
            $this->aSalesOrderItemBundle = null;
        }


        return $this;
    } // setFkSalesOrderItemBundle()

    /**
     * Sets the value of [last_status_change] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setLastStatusChange($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_status_change !== null || $dt !== null) {
            $currentDateAsString = ($this->last_status_change !== null && $tmpDt = new DateTime($this->last_status_change)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_status_change = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::LAST_STATUS_CHANGE;
            }
        } // if either are not null


        return $this;
    } // setLastStatusChange()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [sku] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::SKU;
        }


        return $this;
    } // setSku()

    /**
     * Set the value of [gross_price] column.
     * /price for one unit including tax, without shipping, coupons/
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setGrossPrice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->gross_price !== $v) {
            $this->gross_price = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::GROSS_PRICE;
        }


        return $this;
    } // setGrossPrice()

    /**
     * Set the value of [price_to_pay] column.
     * /value that the customer has to pay./
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setPriceToPay($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->price_to_pay !== $v) {
            $this->price_to_pay = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::PRICE_TO_PAY;
        }


        return $this;
    } // setPriceToPay()

    /**
     * Set the value of [tax_percentage] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setTaxPercentage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tax_percentage !== $v) {
            $this->tax_percentage = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::TAX_PERCENTAGE;
        }


        return $this;
    } // setTaxPercentage()

    /**
     * Set the value of [variety] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setVariety($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->variety !== $v) {
            $this->variety = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::VARIETY;
        }


        return $this;
    } // setVariety()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT;
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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_sales_order_item = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_sales_order = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_oms_order_item_status = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_oms_order_process = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->fk_sales_order_item_bundle = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->last_status_change = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->sku = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->gross_price = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->price_to_pay = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->tax_percentage = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->variety = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->created_at = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->updated_at = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 14; // 14 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object", $e);
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
        if ($this->aStatus !== null && $this->fk_oms_order_item_status !== $this->aStatus->getIdOmsOrderItemStatus()) {
            $this->aStatus = null;
        }
        if ($this->aProcess !== null && $this->fk_oms_order_process !== $this->aProcess->getIdOmsOrderProcess()) {
            $this->aProcess = null;
        }
        if ($this->aSalesOrderItemBundle !== null && $this->fk_sales_order_item_bundle !== $this->aSalesOrderItemBundle->getIdSalesOrderItemBundle()) {
            $this->aSalesOrderItemBundle = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrder = null;
            $this->aStatus = null;
            $this->aProcess = null;
            $this->aSalesOrderItemBundle = null;
            $this->collTransitionLogs = null;

            $this->collStatusHistories = null;

            $this->collEventTimeouts = null;

            $this->collOptions = null;

            $this->collExpenses = null;

            $this->collDiscounts = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT)) {
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

                        $lumberjack = \ProjectA\Shared\Lumberjack\Code\Lumberjack::getInstance();
                        $lumberjack->addField("entityData", $this->toArray());
                        $lumberjack->addField("entity", get_class($this));
                        $lumberjack->addField("entityId", $id);
                        $lumberjack->addField("affectedRows", $affectedRows);

                        $authIdentity = ProjectA\Zed\Auth\Business\Model\Auth::getInstance()->getIdentity();
                        if (isset($authIdentity) && $authIdentity instanceof \ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
                            $lumberjack->addField("aclUserName", $authIdentity->getUsername());
                        }

                        $subType = $isInsert ? "insert" : "update";
                        $lumberjack->send(\ProjectA\Shared\Lumberjack\Code\Log\Types::SAVE, get_class($this) . " id:" . $id . " " . $subType, $subType);
                    }
                }

                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::addInstanceToPool($this);
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
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

            if ($this->aStatus !== null) {
                if ($this->aStatus->isModified() || $this->aStatus->isNew()) {
                    $affectedRows += $this->aStatus->save($con);
                }
                $this->setStatus($this->aStatus);
            }

            if ($this->aProcess !== null) {
                if ($this->aProcess->isModified() || $this->aProcess->isNew()) {
                    $affectedRows += $this->aProcess->save($con);
                }
                $this->setProcess($this->aProcess);
            }

            if ($this->aSalesOrderItemBundle !== null) {
                if ($this->aSalesOrderItemBundle->isModified() || $this->aSalesOrderItemBundle->isNew()) {
                    $affectedRows += $this->aSalesOrderItemBundle->save($con);
                }
                $this->setSalesOrderItemBundle($this->aSalesOrderItemBundle);
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

            if ($this->transitionLogsScheduledForDeletion !== null) {
                if (!$this->transitionLogsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery::create()
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

            if ($this->statusHistoriesScheduledForDeletion !== null) {
                if (!$this->statusHistoriesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery::create()
                        ->filterByPrimaryKeys($this->statusHistoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->statusHistoriesScheduledForDeletion = null;
                }
            }

            if ($this->collStatusHistories !== null) {
                foreach ($this->collStatusHistories as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->eventTimeoutsScheduledForDeletion !== null) {
                if (!$this->eventTimeoutsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery::create()
                        ->filterByPrimaryKeys($this->eventTimeoutsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->eventTimeoutsScheduledForDeletion = null;
                }
            }

            if ($this->collEventTimeouts !== null) {
                foreach ($this->collEventTimeouts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->optionsScheduledForDeletion !== null) {
                if (!$this->optionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionQuery::create()
                        ->filterByPrimaryKeys($this->optionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->optionsScheduledForDeletion = null;
                }
            }

            if ($this->collOptions !== null) {
                foreach ($this->collOptions as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM;
        if (null !== $this->id_sales_order_item) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM)) {
            $modifiedColumns[':p' . $index++]  = '`id_sales_order_item`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`fk_oms_order_item_status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS)) {
            $modifiedColumns[':p' . $index++]  = '`fk_oms_order_process`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order_item_bundle`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::LAST_STATUS_CHANGE)) {
            $modifiedColumns[':p' . $index++]  = '`last_status_change`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::SKU)) {
            $modifiedColumns[':p' . $index++]  = '`sku`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::GROSS_PRICE)) {
            $modifiedColumns[':p' . $index++]  = '`gross_price`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::PRICE_TO_PAY)) {
            $modifiedColumns[':p' . $index++]  = '`price_to_pay`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::TAX_PERCENTAGE)) {
            $modifiedColumns[':p' . $index++]  = '`tax_percentage`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::VARIETY)) {
            $modifiedColumns[':p' . $index++]  = '`variety`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_sales_order_item` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_sales_order_item`':
                        $stmt->bindValue($identifier, $this->id_sales_order_item, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order`':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case '`fk_oms_order_item_status`':
                        $stmt->bindValue($identifier, $this->fk_oms_order_item_status, PDO::PARAM_INT);
                        break;
                    case '`fk_oms_order_process`':
                        $stmt->bindValue($identifier, $this->fk_oms_order_process, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order_item_bundle`':
                        $stmt->bindValue($identifier, $this->fk_sales_order_item_bundle, PDO::PARAM_INT);
                        break;
                    case '`last_status_change`':
                        $stmt->bindValue($identifier, $this->last_status_change, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`sku`':
                        $stmt->bindValue($identifier, $this->sku, PDO::PARAM_STR);
                        break;
                    case '`gross_price`':
                        $stmt->bindValue($identifier, $this->gross_price, PDO::PARAM_INT);
                        break;
                    case '`price_to_pay`':
                        $stmt->bindValue($identifier, $this->price_to_pay, PDO::PARAM_INT);
                        break;
                    case '`tax_percentage`':
                        $stmt->bindValue($identifier, $this->tax_percentage, PDO::PARAM_STR);
                        break;
                    case '`variety`':
                        $stmt->bindValue($identifier, $this->variety, PDO::PARAM_STR);
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
        $this->setIdSalesOrderItem($pk);

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
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }

            if ($this->aStatus !== null) {
                if (!$this->aStatus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatus->getValidationFailures());
                }
            }

            if ($this->aProcess !== null) {
                if (!$this->aProcess->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProcess->getValidationFailures());
                }
            }

            if ($this->aSalesOrderItemBundle !== null) {
                if (!$this->aSalesOrderItemBundle->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSalesOrderItemBundle->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collTransitionLogs !== null) {
                    foreach ($this->collTransitionLogs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStatusHistories !== null) {
                    foreach ($this->collStatusHistories as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEventTimeouts !== null) {
                    foreach ($this->collEventTimeouts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOptions !== null) {
                    foreach ($this->collOptions as $referrerFK) {
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
        $pos = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdSalesOrderItem();
                break;
            case 1:
                return $this->getFkSalesOrder();
                break;
            case 2:
                return $this->getFkOmsOrderItemStatus();
                break;
            case 3:
                return $this->getFkOmsOrderProcess();
                break;
            case 4:
                return $this->getFkSalesOrderItemBundle();
                break;
            case 5:
                return $this->getLastStatusChange();
                break;
            case 6:
                return $this->getName();
                break;
            case 7:
                return $this->getSku();
                break;
            case 8:
                return $this->getGrossPrice();
                break;
            case 9:
                return $this->getPriceToPay();
                break;
            case 10:
                return $this->getTaxPercentage();
                break;
            case 11:
                return $this->getVariety();
                break;
            case 12:
                return $this->getCreatedAt();
                break;
            case 13:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrderItem(),
            $keys[1] => $this->getFkSalesOrder(),
            $keys[2] => $this->getFkOmsOrderItemStatus(),
            $keys[3] => $this->getFkOmsOrderProcess(),
            $keys[4] => $this->getFkSalesOrderItemBundle(),
            $keys[5] => $this->getLastStatusChange(),
            $keys[6] => $this->getName(),
            $keys[7] => $this->getSku(),
            $keys[8] => $this->getGrossPrice(),
            $keys[9] => $this->getPriceToPay(),
            $keys[10] => $this->getTaxPercentage(),
            $keys[11] => $this->getVariety(),
            $keys[12] => $this->getCreatedAt(),
            $keys[13] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatus) {
                $result['Status'] = $this->aStatus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProcess) {
                $result['Process'] = $this->aProcess->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSalesOrderItemBundle) {
                $result['SalesOrderItemBundle'] = $this->aSalesOrderItemBundle->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTransitionLogs) {
                $result['TransitionLogs'] = $this->collTransitionLogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStatusHistories) {
                $result['StatusHistories'] = $this->collStatusHistories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventTimeouts) {
                $result['EventTimeouts'] = $this->collEventTimeouts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOptions) {
                $result['Options'] = $this->collOptions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpenses) {
                $result['Expenses'] = $this->collExpenses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiscounts) {
                $result['Discounts'] = $this->collDiscounts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdSalesOrderItem($value);
                break;
            case 1:
                $this->setFkSalesOrder($value);
                break;
            case 2:
                $this->setFkOmsOrderItemStatus($value);
                break;
            case 3:
                $this->setFkOmsOrderProcess($value);
                break;
            case 4:
                $this->setFkSalesOrderItemBundle($value);
                break;
            case 5:
                $this->setLastStatusChange($value);
                break;
            case 6:
                $this->setName($value);
                break;
            case 7:
                $this->setSku($value);
                break;
            case 8:
                $this->setGrossPrice($value);
                break;
            case 9:
                $this->setPriceToPay($value);
                break;
            case 10:
                $this->setTaxPercentage($value);
                break;
            case 11:
                $this->setVariety($value);
                break;
            case 12:
                $this->setCreatedAt($value);
                break;
            case 13:
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
        $keys = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdSalesOrderItem($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkSalesOrder($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkOmsOrderItemStatus($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkOmsOrderProcess($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFkSalesOrderItemBundle($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastStatusChange($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setName($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setSku($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setGrossPrice($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPriceToPay($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTaxPercentage($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setVariety($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setCreatedAt($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setUpdatedAt($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $this->id_sales_order_item);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER, $this->fk_sales_order);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS, $this->fk_oms_order_item_status);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS, $this->fk_oms_order_process);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $this->fk_sales_order_item_bundle);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::LAST_STATUS_CHANGE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::LAST_STATUS_CHANGE, $this->last_status_change);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::SKU)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::SKU, $this->sku);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::GROSS_PRICE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::GROSS_PRICE, $this->gross_price);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::PRICE_TO_PAY)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::PRICE_TO_PAY, $this->price_to_pay);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::TAX_PERCENTAGE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::TAX_PERCENTAGE, $this->tax_percentage);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::VARIETY)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::VARIETY, $this->variety);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $this->id_sales_order_item);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdSalesOrderItem();
    }

    /**
     * Generic method to set the primary key (id_sales_order_item column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesOrderItem($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdSalesOrderItem();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setFkOmsOrderItemStatus($this->getFkOmsOrderItemStatus());
        $copyObj->setFkOmsOrderProcess($this->getFkOmsOrderProcess());
        $copyObj->setFkSalesOrderItemBundle($this->getFkSalesOrderItemBundle());
        $copyObj->setLastStatusChange($this->getLastStatusChange());
        $copyObj->setName($this->getName());
        $copyObj->setSku($this->getSku());
        $copyObj->setGrossPrice($this->getGrossPrice());
        $copyObj->setPriceToPay($this->getPriceToPay());
        $copyObj->setTaxPercentage($this->getTaxPercentage());
        $copyObj->setVariety($this->getVariety());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getTransitionLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransitionLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStatusHistories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStatusHistory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEventTimeouts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventTimeout($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOptions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOption($relObj->copy($deepCopy));
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

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesOrderItem(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem Clone of current object.
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object.
     *
     * @param                  ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $v
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addItem($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder The associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object.
     * @throws PropelException
     */
    public function getOrder(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrder === null && ($this->fk_sales_order !== null) && $doQuery) {
            $this->aOrder = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrder->addItems($this);
             */
        }

        return $this->aOrder;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus object.
     *
     * @param                  ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus $v
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatus(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus $v = null)
    {
        if ($v === null) {
            $this->setFkOmsOrderItemStatus(NULL);
        } else {
            $this->setFkOmsOrderItemStatus($v->getIdOmsOrderItemStatus());
        }

        $this->aStatus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus object, it will not be re-added.
        if ($v !== null) {
            $v->addOrder($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus The associated ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus object.
     * @throws PropelException
     */
    public function getStatus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatus === null && ($this->fk_oms_order_item_status !== null) && $doQuery) {
            $this->aStatus = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery::create()->findPk($this->fk_oms_order_item_status, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatus->addOrders($this);
             */
        }

        return $this->aStatus;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object.
     *
     * @param                  ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess $v
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProcess(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess $v = null)
    {
        if ($v === null) {
            $this->setFkOmsOrderProcess(NULL);
        } else {
            $this->setFkOmsOrderProcess($v->getIdOmsOrderProcess());
        }

        $this->aProcess = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object, it will not be re-added.
        if ($v !== null) {
            $v->addItem($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess The associated ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object.
     * @throws PropelException
     */
    public function getProcess(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProcess === null && ($this->fk_oms_order_process !== null) && $doQuery) {
            $this->aProcess = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcessQuery::create()->findPk($this->fk_oms_order_process, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProcess->addItems($this);
             */
        }

        return $this->aProcess;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle object.
     *
     * @param                  ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle $v
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSalesOrderItemBundle(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderItemBundle(NULL);
        } else {
            $this->setFkSalesOrderItemBundle($v->getIdSalesOrderItemBundle());
        }

        $this->aSalesOrderItemBundle = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle object, it will not be re-added.
        if ($v !== null) {
            $v->addSalesOrderItem($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle The associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle object.
     * @throws PropelException
     */
    public function getSalesOrderItemBundle(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSalesOrderItemBundle === null && ($this->fk_sales_order_item_bundle !== null) && $doQuery) {
            $this->aSalesOrderItemBundle = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery::create()->findPk($this->fk_sales_order_item_bundle, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSalesOrderItemBundle->addSalesOrderItems($this);
             */
        }

        return $this->aSalesOrderItemBundle;
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
        if ('TransitionLog' == $relationName) {
            $this->initTransitionLogs();
        }
        if ('StatusHistory' == $relationName) {
            $this->initStatusHistories();
        }
        if ('EventTimeout' == $relationName) {
            $this->initEventTimeouts();
        }
        if ('Option' == $relationName) {
            $this->initOptions();
        }
        if ('Expense' == $relationName) {
            $this->initExpenses();
        }
        if ('Discount' == $relationName) {
            $this->initDiscounts();
        }
    }

    /**
     * Clears out the collTransitionLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
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
        $this->collTransitionLogs->setModel('ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog');
    }

    /**
     * Gets an array of ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects
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
                $collTransitionLogs = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTransitionLogsPartial && count($collTransitionLogs)) {
                      $this->initTransitionLogs(false);

                      foreach ($collTransitionLogs as $obj) {
                        if (false == $this->collTransitionLogs->contains($obj)) {
                          $this->collTransitionLogs->append($obj);
                        }
                      }

                      $this->collTransitionLogsPartial = true;
                    }

                    $collTransitionLogs->getInternalIterator()->rewind();

                    return $collTransitionLogs;
                }

                if ($partial && $this->collTransitionLogs) {
                    foreach ($this->collTransitionLogs as $obj) {
                        if ($obj->isNew()) {
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setTransitionLogs(PropelCollection $transitionLogs, PropelPDO $con = null)
    {
        $transitionLogsToDelete = $this->getTransitionLogs(new Criteria(), $con)->diff($transitionLogs);


        $this->transitionLogsScheduledForDeletion = $transitionLogsToDelete;

        foreach ($transitionLogsToDelete as $transitionLogRemoved) {
            $transitionLogRemoved->setOrderItem(null);
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
     * Returns the number of related ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects.
     * @throws PropelException
     */
    public function countTransitionLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTransitionLogsPartial && !$this->isNew();
        if (null === $this->collTransitionLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTransitionLogs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTransitionLogs());
            }
            $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collTransitionLogs);
    }

    /**
     * Method called to associate a ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog object to this object
     * through the ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog foreign key attribute.
     *
     * @param    ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog $l ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function addTransitionLog(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog $l)
    {
        if ($this->collTransitionLogs === null) {
            $this->initTransitionLogs();
            $this->collTransitionLogsPartial = true;
        }

        if (!in_array($l, $this->collTransitionLogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTransitionLog($l);

            if ($this->transitionLogsScheduledForDeletion and $this->transitionLogsScheduledForDeletion->contains($l)) {
                $this->transitionLogsScheduledForDeletion->remove($this->transitionLogsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	TransitionLog $transitionLog The transitionLog object to add.
     */
    protected function doAddTransitionLog($transitionLog)
    {
        $this->collTransitionLogs[]= $transitionLog;
        $transitionLog->setOrderItem($this);
    }

    /**
     * @param	TransitionLog $transitionLog The transitionLog object to remove.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
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
            $transitionLog->setOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects
     */
    public function getTransitionLogsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects
     */
    public function getTransitionLogsJoinAclUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery::create(null, $criteria);
        $query->joinWith('AclUser', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects
     */
    public function getTransitionLogsJoinProcess($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery::create(null, $criteria);
        $query->joinWith('Process', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }

    /**
     * Clears out the collStatusHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     * @see        addStatusHistories()
     */
    public function clearStatusHistories()
    {
        $this->collStatusHistories = null; // important to set this to null since that means it is uninitialized
        $this->collStatusHistoriesPartial = null;

        return $this;
    }

    /**
     * reset is the collStatusHistories collection loaded partially
     *
     * @return void
     */
    public function resetPartialStatusHistories($v = true)
    {
        $this->collStatusHistoriesPartial = $v;
    }

    /**
     * Initializes the collStatusHistories collection.
     *
     * By default this just sets the collStatusHistories collection to an empty array (like clearcollStatusHistories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStatusHistories($overrideExisting = true)
    {
        if (null !== $this->collStatusHistories && !$overrideExisting) {
            return;
        }
        $this->collStatusHistories = new PropelObjectCollection();
        $this->collStatusHistories->setModel('ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory');
    }

    /**
     * Gets an array of ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects
     * @throws PropelException
     */
    public function getStatusHistories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStatusHistoriesPartial && !$this->isNew();
        if (null === $this->collStatusHistories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStatusHistories) {
                // return empty collection
                $this->initStatusHistories();
            } else {
                $collStatusHistories = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStatusHistoriesPartial && count($collStatusHistories)) {
                      $this->initStatusHistories(false);

                      foreach ($collStatusHistories as $obj) {
                        if (false == $this->collStatusHistories->contains($obj)) {
                          $this->collStatusHistories->append($obj);
                        }
                      }

                      $this->collStatusHistoriesPartial = true;
                    }

                    $collStatusHistories->getInternalIterator()->rewind();

                    return $collStatusHistories;
                }

                if ($partial && $this->collStatusHistories) {
                    foreach ($this->collStatusHistories as $obj) {
                        if ($obj->isNew()) {
                            $collStatusHistories[] = $obj;
                        }
                    }
                }

                $this->collStatusHistories = $collStatusHistories;
                $this->collStatusHistoriesPartial = false;
            }
        }

        return $this->collStatusHistories;
    }

    /**
     * Sets a collection of StatusHistory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $statusHistories A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setStatusHistories(PropelCollection $statusHistories, PropelPDO $con = null)
    {
        $statusHistoriesToDelete = $this->getStatusHistories(new Criteria(), $con)->diff($statusHistories);


        $this->statusHistoriesScheduledForDeletion = $statusHistoriesToDelete;

        foreach ($statusHistoriesToDelete as $statusHistoryRemoved) {
            $statusHistoryRemoved->setOrderItem(null);
        }

        $this->collStatusHistories = null;
        foreach ($statusHistories as $statusHistory) {
            $this->addStatusHistory($statusHistory);
        }

        $this->collStatusHistories = $statusHistories;
        $this->collStatusHistoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects.
     * @throws PropelException
     */
    public function countStatusHistories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStatusHistoriesPartial && !$this->isNew();
        if (null === $this->collStatusHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStatusHistories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getStatusHistories());
            }
            $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collStatusHistories);
    }

    /**
     * Method called to associate a ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory object to this object
     * through the ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory foreign key attribute.
     *
     * @param    ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory $l ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function addStatusHistory(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory $l)
    {
        if ($this->collStatusHistories === null) {
            $this->initStatusHistories();
            $this->collStatusHistoriesPartial = true;
        }

        if (!in_array($l, $this->collStatusHistories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStatusHistory($l);

            if ($this->statusHistoriesScheduledForDeletion and $this->statusHistoriesScheduledForDeletion->contains($l)) {
                $this->statusHistoriesScheduledForDeletion->remove($this->statusHistoriesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	StatusHistory $statusHistory The statusHistory object to add.
     */
    protected function doAddStatusHistory($statusHistory)
    {
        $this->collStatusHistories[]= $statusHistory;
        $statusHistory->setOrderItem($this);
    }

    /**
     * @param	StatusHistory $statusHistory The statusHistory object to remove.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function removeStatusHistory($statusHistory)
    {
        if ($this->getStatusHistories()->contains($statusHistory)) {
            $this->collStatusHistories->remove($this->collStatusHistories->search($statusHistory));
            if (null === $this->statusHistoriesScheduledForDeletion) {
                $this->statusHistoriesScheduledForDeletion = clone $this->collStatusHistories;
                $this->statusHistoriesScheduledForDeletion->clear();
            }
            $this->statusHistoriesScheduledForDeletion[]= clone $statusHistory;
            $statusHistory->setOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related StatusHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects
     */
    public function getStatusHistoriesJoinStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery::create(null, $criteria);
        $query->joinWith('Status', $join_behavior);

        return $this->getStatusHistories($query, $con);
    }

    /**
     * Clears out the collEventTimeouts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     * @see        addEventTimeouts()
     */
    public function clearEventTimeouts()
    {
        $this->collEventTimeouts = null; // important to set this to null since that means it is uninitialized
        $this->collEventTimeoutsPartial = null;

        return $this;
    }

    /**
     * reset is the collEventTimeouts collection loaded partially
     *
     * @return void
     */
    public function resetPartialEventTimeouts($v = true)
    {
        $this->collEventTimeoutsPartial = $v;
    }

    /**
     * Initializes the collEventTimeouts collection.
     *
     * By default this just sets the collEventTimeouts collection to an empty array (like clearcollEventTimeouts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEventTimeouts($overrideExisting = true)
    {
        if (null !== $this->collEventTimeouts && !$overrideExisting) {
            return;
        }
        $this->collEventTimeouts = new PropelObjectCollection();
        $this->collEventTimeouts->setModel('ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout');
    }

    /**
     * Gets an array of ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects
     * @throws PropelException
     */
    public function getEventTimeouts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEventTimeoutsPartial && !$this->isNew();
        if (null === $this->collEventTimeouts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEventTimeouts) {
                // return empty collection
                $this->initEventTimeouts();
            } else {
                $collEventTimeouts = ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEventTimeoutsPartial && count($collEventTimeouts)) {
                      $this->initEventTimeouts(false);

                      foreach ($collEventTimeouts as $obj) {
                        if (false == $this->collEventTimeouts->contains($obj)) {
                          $this->collEventTimeouts->append($obj);
                        }
                      }

                      $this->collEventTimeoutsPartial = true;
                    }

                    $collEventTimeouts->getInternalIterator()->rewind();

                    return $collEventTimeouts;
                }

                if ($partial && $this->collEventTimeouts) {
                    foreach ($this->collEventTimeouts as $obj) {
                        if ($obj->isNew()) {
                            $collEventTimeouts[] = $obj;
                        }
                    }
                }

                $this->collEventTimeouts = $collEventTimeouts;
                $this->collEventTimeoutsPartial = false;
            }
        }

        return $this->collEventTimeouts;
    }

    /**
     * Sets a collection of EventTimeout objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $eventTimeouts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setEventTimeouts(PropelCollection $eventTimeouts, PropelPDO $con = null)
    {
        $eventTimeoutsToDelete = $this->getEventTimeouts(new Criteria(), $con)->diff($eventTimeouts);


        $this->eventTimeoutsScheduledForDeletion = $eventTimeoutsToDelete;

        foreach ($eventTimeoutsToDelete as $eventTimeoutRemoved) {
            $eventTimeoutRemoved->setOrderItem(null);
        }

        $this->collEventTimeouts = null;
        foreach ($eventTimeouts as $eventTimeout) {
            $this->addEventTimeout($eventTimeout);
        }

        $this->collEventTimeouts = $eventTimeouts;
        $this->collEventTimeoutsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects.
     * @throws PropelException
     */
    public function countEventTimeouts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEventTimeoutsPartial && !$this->isNew();
        if (null === $this->collEventTimeouts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEventTimeouts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEventTimeouts());
            }
            $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collEventTimeouts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout object to this object
     * through the ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout foreign key attribute.
     *
     * @param    ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout $l ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function addEventTimeout(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout $l)
    {
        if ($this->collEventTimeouts === null) {
            $this->initEventTimeouts();
            $this->collEventTimeoutsPartial = true;
        }

        if (!in_array($l, $this->collEventTimeouts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEventTimeout($l);

            if ($this->eventTimeoutsScheduledForDeletion and $this->eventTimeoutsScheduledForDeletion->contains($l)) {
                $this->eventTimeoutsScheduledForDeletion->remove($this->eventTimeoutsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	EventTimeout $eventTimeout The eventTimeout object to add.
     */
    protected function doAddEventTimeout($eventTimeout)
    {
        $this->collEventTimeouts[]= $eventTimeout;
        $eventTimeout->setOrderItem($this);
    }

    /**
     * @param	EventTimeout $eventTimeout The eventTimeout object to remove.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function removeEventTimeout($eventTimeout)
    {
        if ($this->getEventTimeouts()->contains($eventTimeout)) {
            $this->collEventTimeouts->remove($this->collEventTimeouts->search($eventTimeout));
            if (null === $this->eventTimeoutsScheduledForDeletion) {
                $this->eventTimeoutsScheduledForDeletion = clone $this->collEventTimeouts;
                $this->eventTimeoutsScheduledForDeletion->clear();
            }
            $this->eventTimeoutsScheduledForDeletion[]= clone $eventTimeout;
            $eventTimeout->setOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related EventTimeouts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout[] List of ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects
     */
    public function getEventTimeoutsJoinStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery::create(null, $criteria);
        $query->joinWith('Status', $join_behavior);

        return $this->getEventTimeouts($query, $con);
    }

    /**
     * Clears out the collOptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     * @see        addOptions()
     */
    public function clearOptions()
    {
        $this->collOptions = null; // important to set this to null since that means it is uninitialized
        $this->collOptionsPartial = null;

        return $this;
    }

    /**
     * reset is the collOptions collection loaded partially
     *
     * @return void
     */
    public function resetPartialOptions($v = true)
    {
        $this->collOptionsPartial = $v;
    }

    /**
     * Initializes the collOptions collection.
     *
     * By default this just sets the collOptions collection to an empty array (like clearcollOptions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOptions($overrideExisting = true)
    {
        if (null !== $this->collOptions && !$overrideExisting) {
            return;
        }
        $this->collOptions = new PropelObjectCollection();
        $this->collOptions->setModel('ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects
     * @throws PropelException
     */
    public function getOptions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOptionsPartial && !$this->isNew();
        if (null === $this->collOptions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOptions) {
                // return empty collection
                $this->initOptions();
            } else {
                $collOptions = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionsPartial && count($collOptions)) {
                      $this->initOptions(false);

                      foreach ($collOptions as $obj) {
                        if (false == $this->collOptions->contains($obj)) {
                          $this->collOptions->append($obj);
                        }
                      }

                      $this->collOptionsPartial = true;
                    }

                    $collOptions->getInternalIterator()->rewind();

                    return $collOptions;
                }

                if ($partial && $this->collOptions) {
                    foreach ($this->collOptions as $obj) {
                        if ($obj->isNew()) {
                            $collOptions[] = $obj;
                        }
                    }
                }

                $this->collOptions = $collOptions;
                $this->collOptionsPartial = false;
            }
        }

        return $this->collOptions;
    }

    /**
     * Sets a collection of Option objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $options A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setOptions(PropelCollection $options, PropelPDO $con = null)
    {
        $optionsToDelete = $this->getOptions(new Criteria(), $con)->diff($options);


        $this->optionsScheduledForDeletion = $optionsToDelete;

        foreach ($optionsToDelete as $optionRemoved) {
            $optionRemoved->setOrderItem(null);
        }

        $this->collOptions = null;
        foreach ($options as $option) {
            $this->addOption($option);
        }

        $this->collOptions = $options;
        $this->collOptionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects.
     * @throws PropelException
     */
    public function countOptions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionsPartial && !$this->isNew();
        if (null === $this->collOptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOptions());
            }
            $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collOptions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object to this object
     * through the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption $l ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function addOption(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption $l)
    {
        if ($this->collOptions === null) {
            $this->initOptions();
            $this->collOptionsPartial = true;
        }

        if (!in_array($l, $this->collOptions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOption($l);

            if ($this->optionsScheduledForDeletion and $this->optionsScheduledForDeletion->contains($l)) {
                $this->optionsScheduledForDeletion->remove($this->optionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Option $option The option object to add.
     */
    protected function doAddOption($option)
    {
        $this->collOptions[]= $option;
        $option->setOrderItem($this);
    }

    /**
     * @param	Option $option The option object to remove.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function removeOption($option)
    {
        if ($this->getOptions()->contains($option)) {
            $this->collOptions->remove($this->collOptions->search($option));
            if (null === $this->optionsScheduledForDeletion) {
                $this->optionsScheduledForDeletion = clone $this->collOptions;
                $this->optionsScheduledForDeletion->clear();
            }
            $this->optionsScheduledForDeletion[]= clone $option;
            $option->setOrderItem(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpenses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
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
        $this->collExpenses->setModel('ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects
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
                $collExpenses = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpensesPartial && count($collExpenses)) {
                      $this->initExpenses(false);

                      foreach ($collExpenses as $obj) {
                        if (false == $this->collExpenses->contains($obj)) {
                          $this->collExpenses->append($obj);
                        }
                      }

                      $this->collExpensesPartial = true;
                    }

                    $collExpenses->getInternalIterator()->rewind();

                    return $collExpenses;
                }

                if ($partial && $this->collExpenses) {
                    foreach ($this->collExpenses as $obj) {
                        if ($obj->isNew()) {
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setExpenses(PropelCollection $expenses, PropelPDO $con = null)
    {
        $expensesToDelete = $this->getExpenses(new Criteria(), $con)->diff($expenses);


        $this->expensesScheduledForDeletion = $expensesToDelete;

        foreach ($expensesToDelete as $expenseRemoved) {
            $expenseRemoved->setOrderItem(null);
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
     * Returns the number of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects.
     * @throws PropelException
     */
    public function countExpenses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpensesPartial && !$this->isNew();
        if (null === $this->collExpenses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpenses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpenses());
            }
            $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collExpenses);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense object to this object
     * through the ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense $l ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function addExpense(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense $l)
    {
        if ($this->collExpenses === null) {
            $this->initExpenses();
            $this->collExpensesPartial = true;
        }

        if (!in_array($l, $this->collExpenses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpense($l);

            if ($this->expensesScheduledForDeletion and $this->expensesScheduledForDeletion->contains($l)) {
                $this->expensesScheduledForDeletion->remove($this->expensesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Expense $expense The expense object to add.
     */
    protected function doAddExpense($expense)
    {
        $this->collExpenses[]= $expense;
        $expense->setOrderItem($this);
    }

    /**
     * @param	Expense $expense The expense object to remove.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
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
            $expense->setOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related Expenses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects
     */
    public function getExpensesJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getExpenses($query, $con);
    }

    /**
     * Clears out the collDiscounts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
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
        $this->collDiscounts->setModel('ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
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
                $collDiscounts = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDiscountsPartial && count($collDiscounts)) {
                      $this->initDiscounts(false);

                      foreach ($collDiscounts as $obj) {
                        if (false == $this->collDiscounts->contains($obj)) {
                          $this->collDiscounts->append($obj);
                        }
                      }

                      $this->collDiscountsPartial = true;
                    }

                    $collDiscounts->getInternalIterator()->rewind();

                    return $collDiscounts;
                }

                if ($partial && $this->collDiscounts) {
                    foreach ($this->collDiscounts as $obj) {
                        if ($obj->isNew()) {
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function setDiscounts(PropelCollection $discounts, PropelPDO $con = null)
    {
        $discountsToDelete = $this->getDiscounts(new Criteria(), $con)->diff($discounts);


        $this->discountsScheduledForDeletion = $discountsToDelete;

        foreach ($discountsToDelete as $discountRemoved) {
            $discountRemoved->setOrderItem(null);
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
     * Returns the number of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects.
     * @throws PropelException
     */
    public function countDiscounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDiscountsPartial && !$this->isNew();
        if (null === $this->collDiscounts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscounts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiscounts());
            }
            $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collDiscounts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount object to this object
     * through the ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount $l ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function addDiscount(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount $l)
    {
        if ($this->collDiscounts === null) {
            $this->initDiscounts();
            $this->collDiscountsPartial = true;
        }

        if (!in_array($l, $this->collDiscounts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDiscount($l);

            if ($this->discountsScheduledForDeletion and $this->discountsScheduledForDeletion->contains($l)) {
                $this->discountsScheduledForDeletion->remove($this->discountsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Discount $discount The discount object to add.
     */
    protected function doAddDiscount($discount)
    {
        $this->collDiscounts[]= $discount;
        $discount->setOrderItem($this);
    }

    /**
     * @param	Discount $discount The discount object to remove.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
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
            $discount->setOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
     */
    public function getDiscountsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
     */
    public function getDiscountsJoinExpense($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Expense', $join_behavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderItem is new, it will return
     * an empty collection; or if this PacSalesOrderItem has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderItem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
     */
    public function getDiscountsJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getDiscounts($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_sales_order_item = null;
        $this->fk_sales_order = null;
        $this->fk_oms_order_item_status = null;
        $this->fk_oms_order_process = null;
        $this->fk_sales_order_item_bundle = null;
        $this->last_status_change = null;
        $this->name = null;
        $this->sku = null;
        $this->gross_price = null;
        $this->price_to_pay = null;
        $this->tax_percentage = null;
        $this->variety = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collTransitionLogs) {
                foreach ($this->collTransitionLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStatusHistories) {
                foreach ($this->collStatusHistories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventTimeouts) {
                foreach ($this->collEventTimeouts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptions) {
                foreach ($this->collOptions as $o) {
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
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }
            if ($this->aStatus instanceof Persistent) {
              $this->aStatus->clearAllReferences($deep);
            }
            if ($this->aProcess instanceof Persistent) {
              $this->aProcess->clearAllReferences($deep);
            }
            if ($this->aSalesOrderItemBundle instanceof Persistent) {
              $this->aSalesOrderItemBundle->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collTransitionLogs instanceof PropelCollection) {
            $this->collTransitionLogs->clearIterator();
        }
        $this->collTransitionLogs = null;
        if ($this->collStatusHistories instanceof PropelCollection) {
            $this->collStatusHistories->clearIterator();
        }
        $this->collStatusHistories = null;
        if ($this->collEventTimeouts instanceof PropelCollection) {
            $this->collEventTimeouts->clearIterator();
        }
        $this->collEventTimeouts = null;
        if ($this->collOptions instanceof PropelCollection) {
            $this->collOptions->clearIterator();
        }
        $this->collOptions = null;
        if ($this->collExpenses instanceof PropelCollection) {
            $this->collExpenses->clearIterator();
        }
        $this->collExpenses = null;
        if ($this->collDiscounts instanceof PropelCollection) {
            $this->collDiscounts->clearIterator();
        }
        $this->collDiscounts = null;
        $this->aOrder = null;
        $this->aStatus = null;
        $this->aProcess = null;
        $this->aSalesOrderItemBundle = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT;

        return $this;
    }

}
