<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyNopaymentPaid as ChildSpyNopaymentPaid;
use Propel\SpyNopaymentPaidQuery as ChildSpyNopaymentPaidQuery;
use Propel\SpyOmsEventTimeout as ChildSpyOmsEventTimeout;
use Propel\SpyOmsEventTimeoutQuery as ChildSpyOmsEventTimeoutQuery;
use Propel\SpyOmsOrderItemState as ChildSpyOmsOrderItemState;
use Propel\SpyOmsOrderItemStateHistory as ChildSpyOmsOrderItemStateHistory;
use Propel\SpyOmsOrderItemStateHistoryQuery as ChildSpyOmsOrderItemStateHistoryQuery;
use Propel\SpyOmsOrderItemStateQuery as ChildSpyOmsOrderItemStateQuery;
use Propel\SpyOmsOrderProcess as ChildSpyOmsOrderProcess;
use Propel\SpyOmsOrderProcessQuery as ChildSpyOmsOrderProcessQuery;
use Propel\SpyOmsTransitionLog as ChildSpyOmsTransitionLog;
use Propel\SpyOmsTransitionLogQuery as ChildSpyOmsTransitionLogQuery;
use Propel\SpyPaymentPayolutionOrderItem as ChildSpyPaymentPayolutionOrderItem;
use Propel\SpyPaymentPayolutionOrderItemQuery as ChildSpyPaymentPayolutionOrderItemQuery;
use Propel\SpyPaymentPayoneTransactionStatusLogOrderItem as ChildSpyPaymentPayoneTransactionStatusLogOrderItem;
use Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery as ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery;
use Propel\SpyRefund as ChildSpyRefund;
use Propel\SpyRefundQuery as ChildSpyRefundQuery;
use Propel\SpySalesDiscount as ChildSpySalesDiscount;
use Propel\SpySalesDiscountQuery as ChildSpySalesDiscountQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderItem as ChildSpySalesOrderItem;
use Propel\SpySalesOrderItemBundle as ChildSpySalesOrderItemBundle;
use Propel\SpySalesOrderItemBundleQuery as ChildSpySalesOrderItemBundleQuery;
use Propel\SpySalesOrderItemOption as ChildSpySalesOrderItemOption;
use Propel\SpySalesOrderItemOptionQuery as ChildSpySalesOrderItemOptionQuery;
use Propel\SpySalesOrderItemQuery as ChildSpySalesOrderItemQuery;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\Map\SpySalesOrderItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'spy_sales_order_item' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySalesOrderItem extends SpySalesOrderItem implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySalesOrderItemTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the fk_refund field.
     * @var        int
     */
    protected $fk_refund;

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
     * The value for the fk_oms_order_item_state field.
     * @var        int
     */
    protected $fk_oms_order_item_state;

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
     * The value for the last_state_change field.
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        \DateTime
     */
    protected $last_state_change;

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
     * @var        int
     */
    protected $tax_percentage;

    /**
     * The value for the quantity field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $quantity;

    /**
     * The value for the group_key field.
     * @var        string
     */
    protected $group_key;

    /**
     * The value for the created_at field.
     * @var        \DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        \DateTime
     */
    protected $updated_at;

    /**
     * @var        ChildSpyRefund
     */
    protected $aSpyRefund;

    /**
     * @var        ChildSpySalesOrder
     */
    protected $aOrder;

    /**
     * @var        ChildSpyOmsOrderItemState
     */
    protected $aState;

    /**
     * @var        ChildSpyOmsOrderProcess
     */
    protected $aProcess;

    /**
     * @var        ChildSpySalesOrderItemBundle
     */
    protected $aSalesOrderItemBundle;

    /**
     * @var        ObjectCollection|ChildSpyNopaymentPaid[] Collection to store aggregation of ChildSpyNopaymentPaid objects.
     */
    protected $collNopayments;
    protected $collNopaymentsPartial;

    /**
     * @var        ObjectCollection|ChildSpyOmsTransitionLog[] Collection to store aggregation of ChildSpyOmsTransitionLog objects.
     */
    protected $collTransitionLogs;
    protected $collTransitionLogsPartial;

    /**
     * @var        ObjectCollection|ChildSpyOmsOrderItemStateHistory[] Collection to store aggregation of ChildSpyOmsOrderItemStateHistory objects.
     */
    protected $collStateHistories;
    protected $collStateHistoriesPartial;

    /**
     * @var        ObjectCollection|ChildSpyOmsEventTimeout[] Collection to store aggregation of ChildSpyOmsEventTimeout objects.
     */
    protected $collEventTimeouts;
    protected $collEventTimeoutsPartial;

    /**
     * @var        ObjectCollection|ChildSpyPaymentPayolutionOrderItem[] Collection to store aggregation of ChildSpyPaymentPayolutionOrderItem objects.
     */
    protected $collSpyPaymentPayolutionOrderItems;
    protected $collSpyPaymentPayolutionOrderItemsPartial;

    /**
     * @var        ObjectCollection|ChildSpyPaymentPayoneTransactionStatusLogOrderItem[] Collection to store aggregation of ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects.
     */
    protected $collSpyPaymentPayoneTransactionStatusLogOrderItems;
    protected $collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderItemOption[] Collection to store aggregation of ChildSpySalesOrderItemOption objects.
     */
    protected $collOptions;
    protected $collOptionsPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesDiscount[] Collection to store aggregation of ChildSpySalesDiscount objects.
     */
    protected $collDiscounts;
    protected $collDiscountsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyNopaymentPaid[]
     */
    protected $nopaymentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyOmsTransitionLog[]
     */
    protected $transitionLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyOmsOrderItemStateHistory[]
     */
    protected $stateHistoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyOmsEventTimeout[]
     */
    protected $eventTimeoutsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPaymentPayolutionOrderItem[]
     */
    protected $spyPaymentPayolutionOrderItemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPaymentPayoneTransactionStatusLogOrderItem[]
     */
    protected $spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderItemOption[]
     */
    protected $optionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesDiscount[]
     */
    protected $discountsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->quantity = 1;
    }

    /**
     * Initializes internal state of Propel\Base\SpySalesOrderItem object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>SpySalesOrderItem</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySalesOrderItem</code>, delegates to
     * <code>equals(SpySalesOrderItem)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|SpySalesOrderItem The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [fk_refund] column value.
     *
     * @return int
     */
    public function getFkRefund()
    {
        return $this->fk_refund;
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
     * Get the [fk_oms_order_item_state] column value.
     *
     * @return int
     */
    public function getFkOmsOrderItemState()
    {
        return $this->fk_oms_order_item_state;
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
     * Get the [optionally formatted] temporal [last_state_change] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastStateChange($format = NULL)
    {
        if ($format === null) {
            return $this->last_state_change;
        } else {
            return $this->last_state_change instanceof \DateTime ? $this->last_state_change->format($format) : null;
        }
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
     * @return int
     */
    public function getTaxPercentage()
    {
        return $this->tax_percentage;
    }

    /**
     * Get the [quantity] column value.
     * /Quantity ordered for item/
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the [group_key] column value.
     *
     * @return string
     */
    public function getGroupKey()
    {
        return $this->group_key;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTime ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTime ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [fk_refund] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setFkRefund($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_refund !== $v) {
            $this->fk_refund = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_FK_REFUND] = true;
        }

        if ($this->aSpyRefund !== null && $this->aSpyRefund->getIdRefund() !== $v) {
            $this->aSpyRefund = null;
        }

        return $this;
    } // setFkRefund()

    /**
     * Set the value of [id_sales_order_item] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setIdSalesOrderItem($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_item !== $v) {
            $this->id_sales_order_item = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM] = true;
        }

        return $this;
    } // setIdSalesOrderItem()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_FK_SALES_ORDER] = true;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }

        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [fk_oms_order_item_state] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setFkOmsOrderItemState($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_oms_order_item_state !== $v) {
            $this->fk_oms_order_item_state = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE] = true;
        }

        if ($this->aState !== null && $this->aState->getIdOmsOrderItemState() !== $v) {
            $this->aState = null;
        }

        return $this;
    } // setFkOmsOrderItemState()

    /**
     * Set the value of [fk_oms_order_process] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setFkOmsOrderProcess($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_oms_order_process !== $v) {
            $this->fk_oms_order_process = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS] = true;
        }

        if ($this->aProcess !== null && $this->aProcess->getIdOmsOrderProcess() !== $v) {
            $this->aProcess = null;
        }

        return $this;
    } // setFkOmsOrderProcess()

    /**
     * Set the value of [fk_sales_order_item_bundle] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setFkSalesOrderItemBundle($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_item_bundle !== $v) {
            $this->fk_sales_order_item_bundle = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE] = true;
        }

        if ($this->aSalesOrderItemBundle !== null && $this->aSalesOrderItemBundle->getIdSalesOrderItemBundle() !== $v) {
            $this->aSalesOrderItemBundle = null;
        }

        return $this;
    } // setFkSalesOrderItemBundle()

    /**
     * Sets the value of [last_state_change] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setLastStateChange($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_state_change !== null || $dt !== null) {
            if ($this->last_state_change === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->last_state_change->format("Y-m-d H:i:s")) {
                $this->last_state_change = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE] = true;
            }
        } // if either are not null

        return $this;
    } // setLastStateChange()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [sku] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_SKU] = true;
        }

        return $this;
    } // setSku()

    /**
     * Set the value of [gross_price] column.
     * /price for one unit including tax, without shipping, coupons/
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setGrossPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->gross_price !== $v) {
            $this->gross_price = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_GROSS_PRICE] = true;
        }

        return $this;
    } // setGrossPrice()

    /**
     * Set the value of [price_to_pay] column.
     * /value that the customer has to pay./
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setPriceToPay($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->price_to_pay !== $v) {
            $this->price_to_pay = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_PRICE_TO_PAY] = true;
        }

        return $this;
    } // setPriceToPay()

    /**
     * Set the value of [tax_percentage] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setTaxPercentage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tax_percentage !== $v) {
            $this->tax_percentage = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE] = true;
        }

        return $this;
    } // setTaxPercentage()

    /**
     * Set the value of [quantity] column.
     * /Quantity ordered for item/
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->quantity !== $v) {
            $this->quantity = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_QUANTITY] = true;
        }

        return $this;
    } // setQuantity()

    /**
     * Set the value of [group_key] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setGroupKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->group_key !== $v) {
            $this->group_key = $v;
            $this->modifiedColumns[SpySalesOrderItemTableMap::COL_GROUP_KEY] = true;
        }

        return $this;
    } // setGroupKey()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderItemTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderItemTableMap::COL_UPDATED_AT] = true;
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
            if ($this->quantity !== 1) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
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
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySalesOrderItemTableMap::translateFieldName('FkRefund', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_refund = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySalesOrderItemTableMap::translateFieldName('IdSalesOrderItem', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sales_order_item = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpySalesOrderItemTableMap::translateFieldName('FkSalesOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpySalesOrderItemTableMap::translateFieldName('FkOmsOrderItemState', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_oms_order_item_state = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpySalesOrderItemTableMap::translateFieldName('FkOmsOrderProcess', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_oms_order_process = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpySalesOrderItemTableMap::translateFieldName('FkSalesOrderItemBundle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order_item_bundle = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpySalesOrderItemTableMap::translateFieldName('LastStateChange', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_state_change = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpySalesOrderItemTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpySalesOrderItemTableMap::translateFieldName('Sku', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sku = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpySalesOrderItemTableMap::translateFieldName('GrossPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gross_price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpySalesOrderItemTableMap::translateFieldName('PriceToPay', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price_to_pay = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpySalesOrderItemTableMap::translateFieldName('TaxPercentage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tax_percentage = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpySalesOrderItemTableMap::translateFieldName('Quantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpySalesOrderItemTableMap::translateFieldName('GroupKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->group_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpySalesOrderItemTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpySalesOrderItemTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = SpySalesOrderItemTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySalesOrderItem'), 0, $e);
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
        if ($this->aSpyRefund !== null && $this->fk_refund !== $this->aSpyRefund->getIdRefund()) {
            $this->aSpyRefund = null;
        }
        if ($this->aOrder !== null && $this->fk_sales_order !== $this->aOrder->getIdSalesOrder()) {
            $this->aOrder = null;
        }
        if ($this->aState !== null && $this->fk_oms_order_item_state !== $this->aState->getIdOmsOrderItemState()) {
            $this->aState = null;
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
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySalesOrderItemQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyRefund = null;
            $this->aOrder = null;
            $this->aState = null;
            $this->aProcess = null;
            $this->aSalesOrderItemBundle = null;
            $this->collNopayments = null;

            $this->collTransitionLogs = null;

            $this->collStateHistories = null;

            $this->collEventTimeouts = null;

            $this->collSpyPaymentPayolutionOrderItems = null;

            $this->collSpyPaymentPayoneTransactionStatusLogOrderItems = null;

            $this->collOptions = null;

            $this->collDiscounts = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySalesOrderItem::setDeleted()
     * @see SpySalesOrderItem::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySalesOrderItemQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpySalesOrderItemTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpySalesOrderItemTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpySalesOrderItemTableMap::COL_UPDATED_AT)) {
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
                SpySalesOrderItemTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSpyRefund !== null) {
                if ($this->aSpyRefund->isModified() || $this->aSpyRefund->isNew()) {
                    $affectedRows += $this->aSpyRefund->save($con);
                }
                $this->setSpyRefund($this->aSpyRefund);
            }

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

            if ($this->aState !== null) {
                if ($this->aState->isModified() || $this->aState->isNew()) {
                    $affectedRows += $this->aState->save($con);
                }
                $this->setState($this->aState);
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
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->nopaymentsScheduledForDeletion !== null) {
                if (!$this->nopaymentsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyNopaymentPaidQuery::create()
                        ->filterByPrimaryKeys($this->nopaymentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nopaymentsScheduledForDeletion = null;
                }
            }

            if ($this->collNopayments !== null) {
                foreach ($this->collNopayments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->transitionLogsScheduledForDeletion !== null) {
                if (!$this->transitionLogsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyOmsTransitionLogQuery::create()
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

            if ($this->stateHistoriesScheduledForDeletion !== null) {
                if (!$this->stateHistoriesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyOmsOrderItemStateHistoryQuery::create()
                        ->filterByPrimaryKeys($this->stateHistoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->stateHistoriesScheduledForDeletion = null;
                }
            }

            if ($this->collStateHistories !== null) {
                foreach ($this->collStateHistories as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->eventTimeoutsScheduledForDeletion !== null) {
                if (!$this->eventTimeoutsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyOmsEventTimeoutQuery::create()
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

            if ($this->spyPaymentPayolutionOrderItemsScheduledForDeletion !== null) {
                if (!$this->spyPaymentPayolutionOrderItemsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyPaymentPayolutionOrderItemQuery::create()
                        ->filterByPrimaryKeys($this->spyPaymentPayolutionOrderItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyPaymentPayolutionOrderItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyPaymentPayolutionOrderItems !== null) {
                foreach ($this->collSpyPaymentPayolutionOrderItems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion !== null) {
                if (!$this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery::create()
                        ->filterByPrimaryKeys($this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyPaymentPayoneTransactionStatusLogOrderItems !== null) {
                foreach ($this->collSpyPaymentPayoneTransactionStatusLogOrderItems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->optionsScheduledForDeletion !== null) {
                if (!$this->optionsScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderItemOptionQuery::create()
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
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM] = true;
        if (null !== $this->id_sales_order_item) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_REFUND)) {
            $modifiedColumns[':p' . $index++]  = 'fk_refund';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM)) {
            $modifiedColumns[':p' . $index++]  = 'id_sales_order_item';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_oms_order_item_state';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS)) {
            $modifiedColumns[':p' . $index++]  = 'fk_oms_order_process';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order_item_bundle';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE)) {
            $modifiedColumns[':p' . $index++]  = 'last_state_change';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_SKU)) {
            $modifiedColumns[':p' . $index++]  = 'sku';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_GROSS_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'gross_price';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_PRICE_TO_PAY)) {
            $modifiedColumns[':p' . $index++]  = 'price_to_pay';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE)) {
            $modifiedColumns[':p' . $index++]  = 'tax_percentage';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'quantity';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_GROUP_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'group_key';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_sales_order_item (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'fk_refund':
                        $stmt->bindValue($identifier, $this->fk_refund, PDO::PARAM_INT);
                        break;
                    case 'id_sales_order_item':
                        $stmt->bindValue($identifier, $this->id_sales_order_item, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case 'fk_oms_order_item_state':
                        $stmt->bindValue($identifier, $this->fk_oms_order_item_state, PDO::PARAM_INT);
                        break;
                    case 'fk_oms_order_process':
                        $stmt->bindValue($identifier, $this->fk_oms_order_process, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order_item_bundle':
                        $stmt->bindValue($identifier, $this->fk_sales_order_item_bundle, PDO::PARAM_INT);
                        break;
                    case 'last_state_change':
                        $stmt->bindValue($identifier, $this->last_state_change ? $this->last_state_change->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'sku':
                        $stmt->bindValue($identifier, $this->sku, PDO::PARAM_STR);
                        break;
                    case 'gross_price':
                        $stmt->bindValue($identifier, $this->gross_price, PDO::PARAM_INT);
                        break;
                    case 'price_to_pay':
                        $stmt->bindValue($identifier, $this->price_to_pay, PDO::PARAM_INT);
                        break;
                    case 'tax_percentage':
                        $stmt->bindValue($identifier, $this->tax_percentage, PDO::PARAM_INT);
                        break;
                    case 'quantity':
                        $stmt->bindValue($identifier, $this->quantity, PDO::PARAM_INT);
                        break;
                    case 'group_key':
                        $stmt->bindValue($identifier, $this->group_key, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_sales_order_item_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSalesOrderItem($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_FIELDNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySalesOrderItemTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getFkRefund();
                break;
            case 1:
                return $this->getIdSalesOrderItem();
                break;
            case 2:
                return $this->getFkSalesOrder();
                break;
            case 3:
                return $this->getFkOmsOrderItemState();
                break;
            case 4:
                return $this->getFkOmsOrderProcess();
                break;
            case 5:
                return $this->getFkSalesOrderItemBundle();
                break;
            case 6:
                return $this->getLastStateChange();
                break;
            case 7:
                return $this->getName();
                break;
            case 8:
                return $this->getSku();
                break;
            case 9:
                return $this->getGrossPrice();
                break;
            case 10:
                return $this->getPriceToPay();
                break;
            case 11:
                return $this->getTaxPercentage();
                break;
            case 12:
                return $this->getQuantity();
                break;
            case 13:
                return $this->getGroupKey();
                break;
            case 14:
                return $this->getCreatedAt();
                break;
            case 15:
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
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['SpySalesOrderItem'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySalesOrderItem'][$this->hashCode()] = true;
        $keys = SpySalesOrderItemTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getFkRefund(),
            $keys[1] => $this->getIdSalesOrderItem(),
            $keys[2] => $this->getFkSalesOrder(),
            $keys[3] => $this->getFkOmsOrderItemState(),
            $keys[4] => $this->getFkOmsOrderProcess(),
            $keys[5] => $this->getFkSalesOrderItemBundle(),
            $keys[6] => $this->getLastStateChange(),
            $keys[7] => $this->getName(),
            $keys[8] => $this->getSku(),
            $keys[9] => $this->getGrossPrice(),
            $keys[10] => $this->getPriceToPay(),
            $keys[11] => $this->getTaxPercentage(),
            $keys[12] => $this->getQuantity(),
            $keys[13] => $this->getGroupKey(),
            $keys[14] => $this->getCreatedAt(),
            $keys[15] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[6]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[6]];
            $result[$keys[6]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[14]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[14]];
            $result[$keys[14]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[15]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[15]];
            $result[$keys[15]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyRefund) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyRefund';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_refund';
                        break;
                    default:
                        $key = 'SpyRefund';
                }

                $result[$key] = $this->aSpyRefund->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrder) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrder';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order';
                        break;
                    default:
                        $key = 'SpySalesOrder';
                }

                $result[$key] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aState) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyOmsOrderItemState';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_oms_order_item_state';
                        break;
                    default:
                        $key = 'SpyOmsOrderItemState';
                }

                $result[$key] = $this->aState->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProcess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyOmsOrderProcess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_oms_order_process';
                        break;
                    default:
                        $key = 'SpyOmsOrderProcess';
                }

                $result[$key] = $this->aProcess->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSalesOrderItemBundle) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderItemBundle';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_item_bundle';
                        break;
                    default:
                        $key = 'SpySalesOrderItemBundle';
                }

                $result[$key] = $this->aSalesOrderItemBundle->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collNopayments) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyNopaymentPaids';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_nopayment_paids';
                        break;
                    default:
                        $key = 'SpyNopaymentPaids';
                }

                $result[$key] = $this->collNopayments->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTransitionLogs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyOmsTransitionLogs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_oms_transition_logs';
                        break;
                    default:
                        $key = 'SpyOmsTransitionLogs';
                }

                $result[$key] = $this->collTransitionLogs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStateHistories) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyOmsOrderItemStateHistories';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_oms_order_item_state_histories';
                        break;
                    default:
                        $key = 'SpyOmsOrderItemStateHistories';
                }

                $result[$key] = $this->collStateHistories->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEventTimeouts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyOmsEventTimeouts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_oms_event_timeouts';
                        break;
                    default:
                        $key = 'SpyOmsEventTimeouts';
                }

                $result[$key] = $this->collEventTimeouts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyPaymentPayolutionOrderItems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayolutionOrderItems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payolution_order_items';
                        break;
                    default:
                        $key = 'SpyPaymentPayolutionOrderItems';
                }

                $result[$key] = $this->collSpyPaymentPayolutionOrderItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyPaymentPayoneTransactionStatusLogOrderItems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayoneTransactionStatusLogOrderItems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payone_transaction_status_log_order_items';
                        break;
                    default:
                        $key = 'SpyPaymentPayoneTransactionStatusLogOrderItems';
                }

                $result[$key] = $this->collSpyPaymentPayoneTransactionStatusLogOrderItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOptions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderItemOptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_item_options';
                        break;
                    default:
                        $key = 'SpySalesOrderItemOptions';
                }

                $result[$key] = $this->collOptions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiscounts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesDiscounts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_discounts';
                        break;
                    default:
                        $key = 'SpySalesDiscounts';
                }

                $result[$key] = $this->collDiscounts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_FIELDNAME.
     * @return $this|\Propel\SpySalesOrderItem
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySalesOrderItemTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySalesOrderItem
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setFkRefund($value);
                break;
            case 1:
                $this->setIdSalesOrderItem($value);
                break;
            case 2:
                $this->setFkSalesOrder($value);
                break;
            case 3:
                $this->setFkOmsOrderItemState($value);
                break;
            case 4:
                $this->setFkOmsOrderProcess($value);
                break;
            case 5:
                $this->setFkSalesOrderItemBundle($value);
                break;
            case 6:
                $this->setLastStateChange($value);
                break;
            case 7:
                $this->setName($value);
                break;
            case 8:
                $this->setSku($value);
                break;
            case 9:
                $this->setGrossPrice($value);
                break;
            case 10:
                $this->setPriceToPay($value);
                break;
            case 11:
                $this->setTaxPercentage($value);
                break;
            case 12:
                $this->setQuantity($value);
                break;
            case 13:
                $this->setGroupKey($value);
                break;
            case 14:
                $this->setCreatedAt($value);
                break;
            case 15:
                $this->setUpdatedAt($value);
                break;
        } // switch()

        return $this;
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
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_FIELDNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_FIELDNAME)
    {
        $keys = SpySalesOrderItemTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setFkRefund($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdSalesOrderItem($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkSalesOrder($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkOmsOrderItemState($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFkOmsOrderProcess($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFkSalesOrderItemBundle($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLastStateChange($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setName($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSku($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setGrossPrice($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPriceToPay($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTaxPercentage($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setQuantity($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setGroupKey($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCreatedAt($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setUpdatedAt($arr[$keys[15]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_FIELDNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Propel\SpySalesOrderItem The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_FIELDNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SpySalesOrderItemTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_REFUND)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_FK_REFUND, $this->fk_refund);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $this->id_sales_order_item);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER, $this->fk_sales_order);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE, $this->fk_oms_order_item_state);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS, $this->fk_oms_order_process);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $this->fk_sales_order_item_bundle);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE, $this->last_state_change);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_NAME)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_SKU)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_SKU, $this->sku);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_GROSS_PRICE)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_GROSS_PRICE, $this->gross_price);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_PRICE_TO_PAY)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_PRICE_TO_PAY, $this->price_to_pay);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE, $this->tax_percentage);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_QUANTITY)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_QUANTITY, $this->quantity);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_GROUP_KEY)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_GROUP_KEY, $this->group_key);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_CREATED_AT)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpySalesOrderItemTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpySalesOrderItemTableMap::COL_UPDATED_AT, $this->updated_at);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildSpySalesOrderItemQuery::create();
        $criteria->add(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $this->id_sales_order_item);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdSalesOrderItem();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
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
     * @param       int $key Primary key.
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
     * @param      object $copyObj An object of \Propel\SpySalesOrderItem (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkRefund($this->getFkRefund());
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setFkOmsOrderItemState($this->getFkOmsOrderItemState());
        $copyObj->setFkOmsOrderProcess($this->getFkOmsOrderProcess());
        $copyObj->setFkSalesOrderItemBundle($this->getFkSalesOrderItemBundle());
        $copyObj->setLastStateChange($this->getLastStateChange());
        $copyObj->setName($this->getName());
        $copyObj->setSku($this->getSku());
        $copyObj->setGrossPrice($this->getGrossPrice());
        $copyObj->setPriceToPay($this->getPriceToPay());
        $copyObj->setTaxPercentage($this->getTaxPercentage());
        $copyObj->setQuantity($this->getQuantity());
        $copyObj->setGroupKey($this->getGroupKey());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getNopayments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNopayment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTransitionLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransitionLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStateHistories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStateHistory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEventTimeouts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEventTimeout($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyPaymentPayolutionOrderItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyPaymentPayolutionOrderItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyPaymentPayoneTransactionStatusLogOrderItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyPaymentPayoneTransactionStatusLogOrderItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOptions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOption($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDiscounts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscount($relObj->copy($deepCopy));
                }
            }

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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Propel\SpySalesOrderItem Clone of current object.
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
     * Declares an association between this object and a ChildSpyRefund object.
     *
     * @param  ChildSpyRefund $v
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyRefund(ChildSpyRefund $v = null)
    {
        if ($v === null) {
            $this->setFkRefund(NULL);
        } else {
            $this->setFkRefund($v->getIdRefund());
        }

        $this->aSpyRefund = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyRefund object, it will not be re-added.
        if ($v !== null) {
            $v->addSpySalesOrderItem($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyRefund object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyRefund The associated ChildSpyRefund object.
     * @throws PropelException
     */
    public function getSpyRefund(ConnectionInterface $con = null)
    {
        if ($this->aSpyRefund === null && ($this->fk_refund !== null)) {
            $this->aSpyRefund = ChildSpyRefundQuery::create()->findPk($this->fk_refund, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyRefund->addSpySalesOrderItems($this);
             */
        }

        return $this->aSpyRefund;
    }

    /**
     * Declares an association between this object and a ChildSpySalesOrder object.
     *
     * @param  ChildSpySalesOrder $v
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(ChildSpySalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addItem($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrder object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrder The associated ChildSpySalesOrder object.
     * @throws PropelException
     */
    public function getOrder(ConnectionInterface $con = null)
    {
        if ($this->aOrder === null && ($this->fk_sales_order !== null)) {
            $this->aOrder = ChildSpySalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
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
     * Declares an association between this object and a ChildSpyOmsOrderItemState object.
     *
     * @param  ChildSpyOmsOrderItemState $v
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setState(ChildSpyOmsOrderItemState $v = null)
    {
        if ($v === null) {
            $this->setFkOmsOrderItemState(NULL);
        } else {
            $this->setFkOmsOrderItemState($v->getIdOmsOrderItemState());
        }

        $this->aState = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyOmsOrderItemState object, it will not be re-added.
        if ($v !== null) {
            $v->addOrder($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyOmsOrderItemState object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyOmsOrderItemState The associated ChildSpyOmsOrderItemState object.
     * @throws PropelException
     */
    public function getState(ConnectionInterface $con = null)
    {
        if ($this->aState === null && ($this->fk_oms_order_item_state !== null)) {
            $this->aState = ChildSpyOmsOrderItemStateQuery::create()->findPk($this->fk_oms_order_item_state, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aState->addOrders($this);
             */
        }

        return $this->aState;
    }

    /**
     * Declares an association between this object and a ChildSpyOmsOrderProcess object.
     *
     * @param  ChildSpyOmsOrderProcess $v
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProcess(ChildSpyOmsOrderProcess $v = null)
    {
        if ($v === null) {
            $this->setFkOmsOrderProcess(NULL);
        } else {
            $this->setFkOmsOrderProcess($v->getIdOmsOrderProcess());
        }

        $this->aProcess = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyOmsOrderProcess object, it will not be re-added.
        if ($v !== null) {
            $v->addItem($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyOmsOrderProcess object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyOmsOrderProcess The associated ChildSpyOmsOrderProcess object.
     * @throws PropelException
     */
    public function getProcess(ConnectionInterface $con = null)
    {
        if ($this->aProcess === null && ($this->fk_oms_order_process !== null)) {
            $this->aProcess = ChildSpyOmsOrderProcessQuery::create()->findPk($this->fk_oms_order_process, $con);
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
     * Declares an association between this object and a ChildSpySalesOrderItemBundle object.
     *
     * @param  ChildSpySalesOrderItemBundle $v
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSalesOrderItemBundle(ChildSpySalesOrderItemBundle $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderItemBundle(NULL);
        } else {
            $this->setFkSalesOrderItemBundle($v->getIdSalesOrderItemBundle());
        }

        $this->aSalesOrderItemBundle = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrderItemBundle object, it will not be re-added.
        if ($v !== null) {
            $v->addSalesOrderItem($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrderItemBundle object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrderItemBundle The associated ChildSpySalesOrderItemBundle object.
     * @throws PropelException
     */
    public function getSalesOrderItemBundle(ConnectionInterface $con = null)
    {
        if ($this->aSalesOrderItemBundle === null && ($this->fk_sales_order_item_bundle !== null)) {
            $this->aSalesOrderItemBundle = ChildSpySalesOrderItemBundleQuery::create()->findPk($this->fk_sales_order_item_bundle, $con);
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
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Nopayment' == $relationName) {
            return $this->initNopayments();
        }
        if ('TransitionLog' == $relationName) {
            return $this->initTransitionLogs();
        }
        if ('StateHistory' == $relationName) {
            return $this->initStateHistories();
        }
        if ('EventTimeout' == $relationName) {
            return $this->initEventTimeouts();
        }
        if ('SpyPaymentPayolutionOrderItem' == $relationName) {
            return $this->initSpyPaymentPayolutionOrderItems();
        }
        if ('SpyPaymentPayoneTransactionStatusLogOrderItem' == $relationName) {
            return $this->initSpyPaymentPayoneTransactionStatusLogOrderItems();
        }
        if ('Option' == $relationName) {
            return $this->initOptions();
        }
        if ('Discount' == $relationName) {
            return $this->initDiscounts();
        }
    }

    /**
     * Clears out the collNopayments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNopayments()
     */
    public function clearNopayments()
    {
        $this->collNopayments = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collNopayments collection loaded partially.
     */
    public function resetPartialNopayments($v = true)
    {
        $this->collNopaymentsPartial = $v;
    }

    /**
     * Initializes the collNopayments collection.
     *
     * By default this just sets the collNopayments collection to an empty array (like clearcollNopayments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNopayments($overrideExisting = true)
    {
        if (null !== $this->collNopayments && !$overrideExisting) {
            return;
        }
        $this->collNopayments = new ObjectCollection();
        $this->collNopayments->setModel('\Propel\SpyNopaymentPaid');
    }

    /**
     * Gets an array of ChildSpyNopaymentPaid objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyNopaymentPaid[] List of ChildSpyNopaymentPaid objects
     * @throws PropelException
     */
    public function getNopayments(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collNopaymentsPartial && !$this->isNew();
        if (null === $this->collNopayments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNopayments) {
                // return empty collection
                $this->initNopayments();
            } else {
                $collNopayments = ChildSpyNopaymentPaidQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collNopaymentsPartial && count($collNopayments)) {
                        $this->initNopayments(false);

                        foreach ($collNopayments as $obj) {
                            if (false == $this->collNopayments->contains($obj)) {
                                $this->collNopayments->append($obj);
                            }
                        }

                        $this->collNopaymentsPartial = true;
                    }

                    return $collNopayments;
                }

                if ($partial && $this->collNopayments) {
                    foreach ($this->collNopayments as $obj) {
                        if ($obj->isNew()) {
                            $collNopayments[] = $obj;
                        }
                    }
                }

                $this->collNopayments = $collNopayments;
                $this->collNopaymentsPartial = false;
            }
        }

        return $this->collNopayments;
    }

    /**
     * Sets a collection of ChildSpyNopaymentPaid objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $nopayments A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setNopayments(Collection $nopayments, ConnectionInterface $con = null)
    {
        /** @var ChildSpyNopaymentPaid[] $nopaymentsToDelete */
        $nopaymentsToDelete = $this->getNopayments(new Criteria(), $con)->diff($nopayments);


        $this->nopaymentsScheduledForDeletion = $nopaymentsToDelete;

        foreach ($nopaymentsToDelete as $nopaymentRemoved) {
            $nopaymentRemoved->setOrderItem(null);
        }

        $this->collNopayments = null;
        foreach ($nopayments as $nopayment) {
            $this->addNopayment($nopayment);
        }

        $this->collNopayments = $nopayments;
        $this->collNopaymentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyNopaymentPaid objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyNopaymentPaid objects.
     * @throws PropelException
     */
    public function countNopayments(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collNopaymentsPartial && !$this->isNew();
        if (null === $this->collNopayments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNopayments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getNopayments());
            }

            $query = ChildSpyNopaymentPaidQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collNopayments);
    }

    /**
     * Method called to associate a ChildSpyNopaymentPaid object to this object
     * through the ChildSpyNopaymentPaid foreign key attribute.
     *
     * @param  ChildSpyNopaymentPaid $l ChildSpyNopaymentPaid
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addNopayment(ChildSpyNopaymentPaid $l)
    {
        if ($this->collNopayments === null) {
            $this->initNopayments();
            $this->collNopaymentsPartial = true;
        }

        if (!$this->collNopayments->contains($l)) {
            $this->doAddNopayment($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyNopaymentPaid $nopayment The ChildSpyNopaymentPaid object to add.
     */
    protected function doAddNopayment(ChildSpyNopaymentPaid $nopayment)
    {
        $this->collNopayments[]= $nopayment;
        $nopayment->setOrderItem($this);
    }

    /**
     * @param  ChildSpyNopaymentPaid $nopayment The ChildSpyNopaymentPaid object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeNopayment(ChildSpyNopaymentPaid $nopayment)
    {
        if ($this->getNopayments()->contains($nopayment)) {
            $pos = $this->collNopayments->search($nopayment);
            $this->collNopayments->remove($pos);
            if (null === $this->nopaymentsScheduledForDeletion) {
                $this->nopaymentsScheduledForDeletion = clone $this->collNopayments;
                $this->nopaymentsScheduledForDeletion->clear();
            }
            $this->nopaymentsScheduledForDeletion[]= clone $nopayment;
            $nopayment->setOrderItem(null);
        }

        return $this;
    }

    /**
     * Clears out the collTransitionLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTransitionLogs()
     */
    public function clearTransitionLogs()
    {
        $this->collTransitionLogs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTransitionLogs collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTransitionLogs($overrideExisting = true)
    {
        if (null !== $this->collTransitionLogs && !$overrideExisting) {
            return;
        }
        $this->collTransitionLogs = new ObjectCollection();
        $this->collTransitionLogs->setModel('\Propel\SpyOmsTransitionLog');
    }

    /**
     * Gets an array of ChildSpyOmsTransitionLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyOmsTransitionLog[] List of ChildSpyOmsTransitionLog objects
     * @throws PropelException
     */
    public function getTransitionLogs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTransitionLogsPartial && !$this->isNew();
        if (null === $this->collTransitionLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTransitionLogs) {
                // return empty collection
                $this->initTransitionLogs();
            } else {
                $collTransitionLogs = ChildSpyOmsTransitionLogQuery::create(null, $criteria)
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
     * Sets a collection of ChildSpyOmsTransitionLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $transitionLogs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setTransitionLogs(Collection $transitionLogs, ConnectionInterface $con = null)
    {
        /** @var ChildSpyOmsTransitionLog[] $transitionLogsToDelete */
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
     * Returns the number of related SpyOmsTransitionLog objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyOmsTransitionLog objects.
     * @throws PropelException
     */
    public function countTransitionLogs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTransitionLogsPartial && !$this->isNew();
        if (null === $this->collTransitionLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTransitionLogs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTransitionLogs());
            }

            $query = ChildSpyOmsTransitionLogQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpyOmsTransitionLog object to this object
     * through the ChildSpyOmsTransitionLog foreign key attribute.
     *
     * @param  ChildSpyOmsTransitionLog $l ChildSpyOmsTransitionLog
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addTransitionLog(ChildSpyOmsTransitionLog $l)
    {
        if ($this->collTransitionLogs === null) {
            $this->initTransitionLogs();
            $this->collTransitionLogsPartial = true;
        }

        if (!$this->collTransitionLogs->contains($l)) {
            $this->doAddTransitionLog($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyOmsTransitionLog $transitionLog The ChildSpyOmsTransitionLog object to add.
     */
    protected function doAddTransitionLog(ChildSpyOmsTransitionLog $transitionLog)
    {
        $this->collTransitionLogs[]= $transitionLog;
        $transitionLog->setOrderItem($this);
    }

    /**
     * @param  ChildSpyOmsTransitionLog $transitionLog The ChildSpyOmsTransitionLog object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeTransitionLog(ChildSpyOmsTransitionLog $transitionLog)
    {
        if ($this->getTransitionLogs()->contains($transitionLog)) {
            $pos = $this->collTransitionLogs->search($transitionLog);
            $this->collTransitionLogs->remove($pos);
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
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyOmsTransitionLog[] List of ChildSpyOmsTransitionLog objects
     */
    public function getTransitionLogsJoinOrder(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyOmsTransitionLogQuery::create(null, $criteria);
        $query->joinWith('Order', $joinBehavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyOmsTransitionLog[] List of ChildSpyOmsTransitionLog objects
     */
    public function getTransitionLogsJoinProcess(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyOmsTransitionLogQuery::create(null, $criteria);
        $query->joinWith('Process', $joinBehavior);

        return $this->getTransitionLogs($query, $con);
    }

    /**
     * Clears out the collStateHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addStateHistories()
     */
    public function clearStateHistories()
    {
        $this->collStateHistories = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collStateHistories collection loaded partially.
     */
    public function resetPartialStateHistories($v = true)
    {
        $this->collStateHistoriesPartial = $v;
    }

    /**
     * Initializes the collStateHistories collection.
     *
     * By default this just sets the collStateHistories collection to an empty array (like clearcollStateHistories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStateHistories($overrideExisting = true)
    {
        if (null !== $this->collStateHistories && !$overrideExisting) {
            return;
        }
        $this->collStateHistories = new ObjectCollection();
        $this->collStateHistories->setModel('\Propel\SpyOmsOrderItemStateHistory');
    }

    /**
     * Gets an array of ChildSpyOmsOrderItemStateHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyOmsOrderItemStateHistory[] List of ChildSpyOmsOrderItemStateHistory objects
     * @throws PropelException
     */
    public function getStateHistories(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collStateHistoriesPartial && !$this->isNew();
        if (null === $this->collStateHistories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStateHistories) {
                // return empty collection
                $this->initStateHistories();
            } else {
                $collStateHistories = ChildSpyOmsOrderItemStateHistoryQuery::create(null, $criteria)
                    ->filterByOrderItem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collStateHistoriesPartial && count($collStateHistories)) {
                        $this->initStateHistories(false);

                        foreach ($collStateHistories as $obj) {
                            if (false == $this->collStateHistories->contains($obj)) {
                                $this->collStateHistories->append($obj);
                            }
                        }

                        $this->collStateHistoriesPartial = true;
                    }

                    return $collStateHistories;
                }

                if ($partial && $this->collStateHistories) {
                    foreach ($this->collStateHistories as $obj) {
                        if ($obj->isNew()) {
                            $collStateHistories[] = $obj;
                        }
                    }
                }

                $this->collStateHistories = $collStateHistories;
                $this->collStateHistoriesPartial = false;
            }
        }

        return $this->collStateHistories;
    }

    /**
     * Sets a collection of ChildSpyOmsOrderItemStateHistory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $stateHistories A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setStateHistories(Collection $stateHistories, ConnectionInterface $con = null)
    {
        /** @var ChildSpyOmsOrderItemStateHistory[] $stateHistoriesToDelete */
        $stateHistoriesToDelete = $this->getStateHistories(new Criteria(), $con)->diff($stateHistories);


        $this->stateHistoriesScheduledForDeletion = $stateHistoriesToDelete;

        foreach ($stateHistoriesToDelete as $stateHistoryRemoved) {
            $stateHistoryRemoved->setOrderItem(null);
        }

        $this->collStateHistories = null;
        foreach ($stateHistories as $stateHistory) {
            $this->addStateHistory($stateHistory);
        }

        $this->collStateHistories = $stateHistories;
        $this->collStateHistoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyOmsOrderItemStateHistory objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyOmsOrderItemStateHistory objects.
     * @throws PropelException
     */
    public function countStateHistories(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collStateHistoriesPartial && !$this->isNew();
        if (null === $this->collStateHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStateHistories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getStateHistories());
            }

            $query = ChildSpyOmsOrderItemStateHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrderItem($this)
                ->count($con);
        }

        return count($this->collStateHistories);
    }

    /**
     * Method called to associate a ChildSpyOmsOrderItemStateHistory object to this object
     * through the ChildSpyOmsOrderItemStateHistory foreign key attribute.
     *
     * @param  ChildSpyOmsOrderItemStateHistory $l ChildSpyOmsOrderItemStateHistory
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addStateHistory(ChildSpyOmsOrderItemStateHistory $l)
    {
        if ($this->collStateHistories === null) {
            $this->initStateHistories();
            $this->collStateHistoriesPartial = true;
        }

        if (!$this->collStateHistories->contains($l)) {
            $this->doAddStateHistory($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyOmsOrderItemStateHistory $stateHistory The ChildSpyOmsOrderItemStateHistory object to add.
     */
    protected function doAddStateHistory(ChildSpyOmsOrderItemStateHistory $stateHistory)
    {
        $this->collStateHistories[]= $stateHistory;
        $stateHistory->setOrderItem($this);
    }

    /**
     * @param  ChildSpyOmsOrderItemStateHistory $stateHistory The ChildSpyOmsOrderItemStateHistory object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeStateHistory(ChildSpyOmsOrderItemStateHistory $stateHistory)
    {
        if ($this->getStateHistories()->contains($stateHistory)) {
            $pos = $this->collStateHistories->search($stateHistory);
            $this->collStateHistories->remove($pos);
            if (null === $this->stateHistoriesScheduledForDeletion) {
                $this->stateHistoriesScheduledForDeletion = clone $this->collStateHistories;
                $this->stateHistoriesScheduledForDeletion->clear();
            }
            $this->stateHistoriesScheduledForDeletion[]= clone $stateHistory;
            $stateHistory->setOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related StateHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyOmsOrderItemStateHistory[] List of ChildSpyOmsOrderItemStateHistory objects
     */
    public function getStateHistoriesJoinState(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyOmsOrderItemStateHistoryQuery::create(null, $criteria);
        $query->joinWith('State', $joinBehavior);

        return $this->getStateHistories($query, $con);
    }

    /**
     * Clears out the collEventTimeouts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEventTimeouts()
     */
    public function clearEventTimeouts()
    {
        $this->collEventTimeouts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEventTimeouts collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEventTimeouts($overrideExisting = true)
    {
        if (null !== $this->collEventTimeouts && !$overrideExisting) {
            return;
        }
        $this->collEventTimeouts = new ObjectCollection();
        $this->collEventTimeouts->setModel('\Propel\SpyOmsEventTimeout');
    }

    /**
     * Gets an array of ChildSpyOmsEventTimeout objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyOmsEventTimeout[] List of ChildSpyOmsEventTimeout objects
     * @throws PropelException
     */
    public function getEventTimeouts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEventTimeoutsPartial && !$this->isNew();
        if (null === $this->collEventTimeouts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEventTimeouts) {
                // return empty collection
                $this->initEventTimeouts();
            } else {
                $collEventTimeouts = ChildSpyOmsEventTimeoutQuery::create(null, $criteria)
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
     * Sets a collection of ChildSpyOmsEventTimeout objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $eventTimeouts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setEventTimeouts(Collection $eventTimeouts, ConnectionInterface $con = null)
    {
        /** @var ChildSpyOmsEventTimeout[] $eventTimeoutsToDelete */
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
     * Returns the number of related SpyOmsEventTimeout objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyOmsEventTimeout objects.
     * @throws PropelException
     */
    public function countEventTimeouts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEventTimeoutsPartial && !$this->isNew();
        if (null === $this->collEventTimeouts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEventTimeouts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEventTimeouts());
            }

            $query = ChildSpyOmsEventTimeoutQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpyOmsEventTimeout object to this object
     * through the ChildSpyOmsEventTimeout foreign key attribute.
     *
     * @param  ChildSpyOmsEventTimeout $l ChildSpyOmsEventTimeout
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addEventTimeout(ChildSpyOmsEventTimeout $l)
    {
        if ($this->collEventTimeouts === null) {
            $this->initEventTimeouts();
            $this->collEventTimeoutsPartial = true;
        }

        if (!$this->collEventTimeouts->contains($l)) {
            $this->doAddEventTimeout($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyOmsEventTimeout $eventTimeout The ChildSpyOmsEventTimeout object to add.
     */
    protected function doAddEventTimeout(ChildSpyOmsEventTimeout $eventTimeout)
    {
        $this->collEventTimeouts[]= $eventTimeout;
        $eventTimeout->setOrderItem($this);
    }

    /**
     * @param  ChildSpyOmsEventTimeout $eventTimeout The ChildSpyOmsEventTimeout object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeEventTimeout(ChildSpyOmsEventTimeout $eventTimeout)
    {
        if ($this->getEventTimeouts()->contains($eventTimeout)) {
            $pos = $this->collEventTimeouts->search($eventTimeout);
            $this->collEventTimeouts->remove($pos);
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
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related EventTimeouts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyOmsEventTimeout[] List of ChildSpyOmsEventTimeout objects
     */
    public function getEventTimeoutsJoinState(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyOmsEventTimeoutQuery::create(null, $criteria);
        $query->joinWith('State', $joinBehavior);

        return $this->getEventTimeouts($query, $con);
    }

    /**
     * Clears out the collSpyPaymentPayolutionOrderItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyPaymentPayolutionOrderItems()
     */
    public function clearSpyPaymentPayolutionOrderItems()
    {
        $this->collSpyPaymentPayolutionOrderItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyPaymentPayolutionOrderItems collection loaded partially.
     */
    public function resetPartialSpyPaymentPayolutionOrderItems($v = true)
    {
        $this->collSpyPaymentPayolutionOrderItemsPartial = $v;
    }

    /**
     * Initializes the collSpyPaymentPayolutionOrderItems collection.
     *
     * By default this just sets the collSpyPaymentPayolutionOrderItems collection to an empty array (like clearcollSpyPaymentPayolutionOrderItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyPaymentPayolutionOrderItems($overrideExisting = true)
    {
        if (null !== $this->collSpyPaymentPayolutionOrderItems && !$overrideExisting) {
            return;
        }
        $this->collSpyPaymentPayolutionOrderItems = new ObjectCollection();
        $this->collSpyPaymentPayolutionOrderItems->setModel('\Propel\SpyPaymentPayolutionOrderItem');
    }

    /**
     * Gets an array of ChildSpyPaymentPayolutionOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPaymentPayolutionOrderItem[] List of ChildSpyPaymentPayolutionOrderItem objects
     * @throws PropelException
     */
    public function getSpyPaymentPayolutionOrderItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionOrderItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionOrderItems) {
                // return empty collection
                $this->initSpyPaymentPayolutionOrderItems();
            } else {
                $collSpyPaymentPayolutionOrderItems = ChildSpyPaymentPayolutionOrderItemQuery::create(null, $criteria)
                    ->filterBySpySalesOrderItem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyPaymentPayolutionOrderItemsPartial && count($collSpyPaymentPayolutionOrderItems)) {
                        $this->initSpyPaymentPayolutionOrderItems(false);

                        foreach ($collSpyPaymentPayolutionOrderItems as $obj) {
                            if (false == $this->collSpyPaymentPayolutionOrderItems->contains($obj)) {
                                $this->collSpyPaymentPayolutionOrderItems->append($obj);
                            }
                        }

                        $this->collSpyPaymentPayolutionOrderItemsPartial = true;
                    }

                    return $collSpyPaymentPayolutionOrderItems;
                }

                if ($partial && $this->collSpyPaymentPayolutionOrderItems) {
                    foreach ($this->collSpyPaymentPayolutionOrderItems as $obj) {
                        if ($obj->isNew()) {
                            $collSpyPaymentPayolutionOrderItems[] = $obj;
                        }
                    }
                }

                $this->collSpyPaymentPayolutionOrderItems = $collSpyPaymentPayolutionOrderItems;
                $this->collSpyPaymentPayolutionOrderItemsPartial = false;
            }
        }

        return $this->collSpyPaymentPayolutionOrderItems;
    }

    /**
     * Sets a collection of ChildSpyPaymentPayolutionOrderItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyPaymentPayolutionOrderItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setSpyPaymentPayolutionOrderItems(Collection $spyPaymentPayolutionOrderItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPaymentPayolutionOrderItem[] $spyPaymentPayolutionOrderItemsToDelete */
        $spyPaymentPayolutionOrderItemsToDelete = $this->getSpyPaymentPayolutionOrderItems(new Criteria(), $con)->diff($spyPaymentPayolutionOrderItems);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyPaymentPayolutionOrderItemsScheduledForDeletion = clone $spyPaymentPayolutionOrderItemsToDelete;

        foreach ($spyPaymentPayolutionOrderItemsToDelete as $spyPaymentPayolutionOrderItemRemoved) {
            $spyPaymentPayolutionOrderItemRemoved->setSpySalesOrderItem(null);
        }

        $this->collSpyPaymentPayolutionOrderItems = null;
        foreach ($spyPaymentPayolutionOrderItems as $spyPaymentPayolutionOrderItem) {
            $this->addSpyPaymentPayolutionOrderItem($spyPaymentPayolutionOrderItem);
        }

        $this->collSpyPaymentPayolutionOrderItems = $spyPaymentPayolutionOrderItems;
        $this->collSpyPaymentPayolutionOrderItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyPaymentPayolutionOrderItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPaymentPayolutionOrderItem objects.
     * @throws PropelException
     */
    public function countSpyPaymentPayolutionOrderItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionOrderItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionOrderItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyPaymentPayolutionOrderItems());
            }

            $query = ChildSpyPaymentPayolutionOrderItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpySalesOrderItem($this)
                ->count($con);
        }

        return count($this->collSpyPaymentPayolutionOrderItems);
    }

    /**
     * Method called to associate a ChildSpyPaymentPayolutionOrderItem object to this object
     * through the ChildSpyPaymentPayolutionOrderItem foreign key attribute.
     *
     * @param  ChildSpyPaymentPayolutionOrderItem $l ChildSpyPaymentPayolutionOrderItem
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addSpyPaymentPayolutionOrderItem(ChildSpyPaymentPayolutionOrderItem $l)
    {
        if ($this->collSpyPaymentPayolutionOrderItems === null) {
            $this->initSpyPaymentPayolutionOrderItems();
            $this->collSpyPaymentPayolutionOrderItemsPartial = true;
        }

        if (!$this->collSpyPaymentPayolutionOrderItems->contains($l)) {
            $this->doAddSpyPaymentPayolutionOrderItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem The ChildSpyPaymentPayolutionOrderItem object to add.
     */
    protected function doAddSpyPaymentPayolutionOrderItem(ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem)
    {
        $this->collSpyPaymentPayolutionOrderItems[]= $spyPaymentPayolutionOrderItem;
        $spyPaymentPayolutionOrderItem->setSpySalesOrderItem($this);
    }

    /**
     * @param  ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem The ChildSpyPaymentPayolutionOrderItem object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeSpyPaymentPayolutionOrderItem(ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem)
    {
        if ($this->getSpyPaymentPayolutionOrderItems()->contains($spyPaymentPayolutionOrderItem)) {
            $pos = $this->collSpyPaymentPayolutionOrderItems->search($spyPaymentPayolutionOrderItem);
            $this->collSpyPaymentPayolutionOrderItems->remove($pos);
            if (null === $this->spyPaymentPayolutionOrderItemsScheduledForDeletion) {
                $this->spyPaymentPayolutionOrderItemsScheduledForDeletion = clone $this->collSpyPaymentPayolutionOrderItems;
                $this->spyPaymentPayolutionOrderItemsScheduledForDeletion->clear();
            }
            $this->spyPaymentPayolutionOrderItemsScheduledForDeletion[]= clone $spyPaymentPayolutionOrderItem;
            $spyPaymentPayolutionOrderItem->setSpySalesOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related SpyPaymentPayolutionOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyPaymentPayolutionOrderItem[] List of ChildSpyPaymentPayolutionOrderItem objects
     */
    public function getSpyPaymentPayolutionOrderItemsJoinSpyPaymentPayolution(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyPaymentPayolutionOrderItemQuery::create(null, $criteria);
        $query->joinWith('SpyPaymentPayolution', $joinBehavior);

        return $this->getSpyPaymentPayolutionOrderItems($query, $con);
    }

    /**
     * Clears out the collSpyPaymentPayoneTransactionStatusLogOrderItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyPaymentPayoneTransactionStatusLogOrderItems()
     */
    public function clearSpyPaymentPayoneTransactionStatusLogOrderItems()
    {
        $this->collSpyPaymentPayoneTransactionStatusLogOrderItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyPaymentPayoneTransactionStatusLogOrderItems collection loaded partially.
     */
    public function resetPartialSpyPaymentPayoneTransactionStatusLogOrderItems($v = true)
    {
        $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial = $v;
    }

    /**
     * Initializes the collSpyPaymentPayoneTransactionStatusLogOrderItems collection.
     *
     * By default this just sets the collSpyPaymentPayoneTransactionStatusLogOrderItems collection to an empty array (like clearcollSpyPaymentPayoneTransactionStatusLogOrderItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyPaymentPayoneTransactionStatusLogOrderItems($overrideExisting = true)
    {
        if (null !== $this->collSpyPaymentPayoneTransactionStatusLogOrderItems && !$overrideExisting) {
            return;
        }
        $this->collSpyPaymentPayoneTransactionStatusLogOrderItems = new ObjectCollection();
        $this->collSpyPaymentPayoneTransactionStatusLogOrderItems->setModel('\Propel\SpyPaymentPayoneTransactionStatusLogOrderItem');
    }

    /**
     * Gets an array of ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPaymentPayoneTransactionStatusLogOrderItem[] List of ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects
     * @throws PropelException
     */
    public function getSpyPaymentPayoneTransactionStatusLogOrderItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayoneTransactionStatusLogOrderItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayoneTransactionStatusLogOrderItems) {
                // return empty collection
                $this->initSpyPaymentPayoneTransactionStatusLogOrderItems();
            } else {
                $collSpyPaymentPayoneTransactionStatusLogOrderItems = ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery::create(null, $criteria)
                    ->filterBySpySalesOrderItem($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial && count($collSpyPaymentPayoneTransactionStatusLogOrderItems)) {
                        $this->initSpyPaymentPayoneTransactionStatusLogOrderItems(false);

                        foreach ($collSpyPaymentPayoneTransactionStatusLogOrderItems as $obj) {
                            if (false == $this->collSpyPaymentPayoneTransactionStatusLogOrderItems->contains($obj)) {
                                $this->collSpyPaymentPayoneTransactionStatusLogOrderItems->append($obj);
                            }
                        }

                        $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial = true;
                    }

                    return $collSpyPaymentPayoneTransactionStatusLogOrderItems;
                }

                if ($partial && $this->collSpyPaymentPayoneTransactionStatusLogOrderItems) {
                    foreach ($this->collSpyPaymentPayoneTransactionStatusLogOrderItems as $obj) {
                        if ($obj->isNew()) {
                            $collSpyPaymentPayoneTransactionStatusLogOrderItems[] = $obj;
                        }
                    }
                }

                $this->collSpyPaymentPayoneTransactionStatusLogOrderItems = $collSpyPaymentPayoneTransactionStatusLogOrderItems;
                $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial = false;
            }
        }

        return $this->collSpyPaymentPayoneTransactionStatusLogOrderItems;
    }

    /**
     * Sets a collection of ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyPaymentPayoneTransactionStatusLogOrderItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setSpyPaymentPayoneTransactionStatusLogOrderItems(Collection $spyPaymentPayoneTransactionStatusLogOrderItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPaymentPayoneTransactionStatusLogOrderItem[] $spyPaymentPayoneTransactionStatusLogOrderItemsToDelete */
        $spyPaymentPayoneTransactionStatusLogOrderItemsToDelete = $this->getSpyPaymentPayoneTransactionStatusLogOrderItems(new Criteria(), $con)->diff($spyPaymentPayoneTransactionStatusLogOrderItems);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion = clone $spyPaymentPayoneTransactionStatusLogOrderItemsToDelete;

        foreach ($spyPaymentPayoneTransactionStatusLogOrderItemsToDelete as $spyPaymentPayoneTransactionStatusLogOrderItemRemoved) {
            $spyPaymentPayoneTransactionStatusLogOrderItemRemoved->setSpySalesOrderItem(null);
        }

        $this->collSpyPaymentPayoneTransactionStatusLogOrderItems = null;
        foreach ($spyPaymentPayoneTransactionStatusLogOrderItems as $spyPaymentPayoneTransactionStatusLogOrderItem) {
            $this->addSpyPaymentPayoneTransactionStatusLogOrderItem($spyPaymentPayoneTransactionStatusLogOrderItem);
        }

        $this->collSpyPaymentPayoneTransactionStatusLogOrderItems = $spyPaymentPayoneTransactionStatusLogOrderItems;
        $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyPaymentPayoneTransactionStatusLogOrderItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPaymentPayoneTransactionStatusLogOrderItem objects.
     * @throws PropelException
     */
    public function countSpyPaymentPayoneTransactionStatusLogOrderItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayoneTransactionStatusLogOrderItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayoneTransactionStatusLogOrderItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyPaymentPayoneTransactionStatusLogOrderItems());
            }

            $query = ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpySalesOrderItem($this)
                ->count($con);
        }

        return count($this->collSpyPaymentPayoneTransactionStatusLogOrderItems);
    }

    /**
     * Method called to associate a ChildSpyPaymentPayoneTransactionStatusLogOrderItem object to this object
     * through the ChildSpyPaymentPayoneTransactionStatusLogOrderItem foreign key attribute.
     *
     * @param  ChildSpyPaymentPayoneTransactionStatusLogOrderItem $l ChildSpyPaymentPayoneTransactionStatusLogOrderItem
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addSpyPaymentPayoneTransactionStatusLogOrderItem(ChildSpyPaymentPayoneTransactionStatusLogOrderItem $l)
    {
        if ($this->collSpyPaymentPayoneTransactionStatusLogOrderItems === null) {
            $this->initSpyPaymentPayoneTransactionStatusLogOrderItems();
            $this->collSpyPaymentPayoneTransactionStatusLogOrderItemsPartial = true;
        }

        if (!$this->collSpyPaymentPayoneTransactionStatusLogOrderItems->contains($l)) {
            $this->doAddSpyPaymentPayoneTransactionStatusLogOrderItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPaymentPayoneTransactionStatusLogOrderItem $spyPaymentPayoneTransactionStatusLogOrderItem The ChildSpyPaymentPayoneTransactionStatusLogOrderItem object to add.
     */
    protected function doAddSpyPaymentPayoneTransactionStatusLogOrderItem(ChildSpyPaymentPayoneTransactionStatusLogOrderItem $spyPaymentPayoneTransactionStatusLogOrderItem)
    {
        $this->collSpyPaymentPayoneTransactionStatusLogOrderItems[]= $spyPaymentPayoneTransactionStatusLogOrderItem;
        $spyPaymentPayoneTransactionStatusLogOrderItem->setSpySalesOrderItem($this);
    }

    /**
     * @param  ChildSpyPaymentPayoneTransactionStatusLogOrderItem $spyPaymentPayoneTransactionStatusLogOrderItem The ChildSpyPaymentPayoneTransactionStatusLogOrderItem object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeSpyPaymentPayoneTransactionStatusLogOrderItem(ChildSpyPaymentPayoneTransactionStatusLogOrderItem $spyPaymentPayoneTransactionStatusLogOrderItem)
    {
        if ($this->getSpyPaymentPayoneTransactionStatusLogOrderItems()->contains($spyPaymentPayoneTransactionStatusLogOrderItem)) {
            $pos = $this->collSpyPaymentPayoneTransactionStatusLogOrderItems->search($spyPaymentPayoneTransactionStatusLogOrderItem);
            $this->collSpyPaymentPayoneTransactionStatusLogOrderItems->remove($pos);
            if (null === $this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion) {
                $this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion = clone $this->collSpyPaymentPayoneTransactionStatusLogOrderItems;
                $this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion->clear();
            }
            $this->spyPaymentPayoneTransactionStatusLogOrderItemsScheduledForDeletion[]= clone $spyPaymentPayoneTransactionStatusLogOrderItem;
            $spyPaymentPayoneTransactionStatusLogOrderItem->setSpySalesOrderItem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related SpyPaymentPayoneTransactionStatusLogOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyPaymentPayoneTransactionStatusLogOrderItem[] List of ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects
     */
    public function getSpyPaymentPayoneTransactionStatusLogOrderItemsJoinSpyPaymentPayoneTransactionStatusLog(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery::create(null, $criteria);
        $query->joinWith('SpyPaymentPayoneTransactionStatusLog', $joinBehavior);

        return $this->getSpyPaymentPayoneTransactionStatusLogOrderItems($query, $con);
    }

    /**
     * Clears out the collOptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOptions()
     */
    public function clearOptions()
    {
        $this->collOptions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collOptions collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOptions($overrideExisting = true)
    {
        if (null !== $this->collOptions && !$overrideExisting) {
            return;
        }
        $this->collOptions = new ObjectCollection();
        $this->collOptions->setModel('\Propel\SpySalesOrderItemOption');
    }

    /**
     * Gets an array of ChildSpySalesOrderItemOption objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderItemOption[] List of ChildSpySalesOrderItemOption objects
     * @throws PropelException
     */
    public function getOptions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collOptionsPartial && !$this->isNew();
        if (null === $this->collOptions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOptions) {
                // return empty collection
                $this->initOptions();
            } else {
                $collOptions = ChildSpySalesOrderItemOptionQuery::create(null, $criteria)
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
     * Sets a collection of ChildSpySalesOrderItemOption objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $options A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setOptions(Collection $options, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderItemOption[] $optionsToDelete */
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
     * Returns the number of related SpySalesOrderItemOption objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderItemOption objects.
     * @throws PropelException
     */
    public function countOptions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collOptionsPartial && !$this->isNew();
        if (null === $this->collOptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOptions());
            }

            $query = ChildSpySalesOrderItemOptionQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpySalesOrderItemOption object to this object
     * through the ChildSpySalesOrderItemOption foreign key attribute.
     *
     * @param  ChildSpySalesOrderItemOption $l ChildSpySalesOrderItemOption
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addOption(ChildSpySalesOrderItemOption $l)
    {
        if ($this->collOptions === null) {
            $this->initOptions();
            $this->collOptionsPartial = true;
        }

        if (!$this->collOptions->contains($l)) {
            $this->doAddOption($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderItemOption $option The ChildSpySalesOrderItemOption object to add.
     */
    protected function doAddOption(ChildSpySalesOrderItemOption $option)
    {
        $this->collOptions[]= $option;
        $option->setOrderItem($this);
    }

    /**
     * @param  ChildSpySalesOrderItemOption $option The ChildSpySalesOrderItemOption object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeOption(ChildSpySalesOrderItemOption $option)
    {
        if ($this->getOptions()->contains($option)) {
            $pos = $this->collOptions->search($option);
            $this->collOptions->remove($pos);
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
     * Clears out the collDiscounts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDiscounts()
     */
    public function clearDiscounts()
    {
        $this->collDiscounts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDiscounts collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiscounts($overrideExisting = true)
    {
        if (null !== $this->collDiscounts && !$overrideExisting) {
            return;
        }
        $this->collDiscounts = new ObjectCollection();
        $this->collDiscounts->setModel('\Propel\SpySalesDiscount');
    }

    /**
     * Gets an array of ChildSpySalesDiscount objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesDiscount[] List of ChildSpySalesDiscount objects
     * @throws PropelException
     */
    public function getDiscounts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountsPartial && !$this->isNew();
        if (null === $this->collDiscounts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiscounts) {
                // return empty collection
                $this->initDiscounts();
            } else {
                $collDiscounts = ChildSpySalesDiscountQuery::create(null, $criteria)
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
     * Sets a collection of ChildSpySalesDiscount objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $discounts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function setDiscounts(Collection $discounts, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesDiscount[] $discountsToDelete */
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
     * Returns the number of related SpySalesDiscount objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesDiscount objects.
     * @throws PropelException
     */
    public function countDiscounts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountsPartial && !$this->isNew();
        if (null === $this->collDiscounts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscounts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiscounts());
            }

            $query = ChildSpySalesDiscountQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpySalesDiscount object to this object
     * through the ChildSpySalesDiscount foreign key attribute.
     *
     * @param  ChildSpySalesDiscount $l ChildSpySalesDiscount
     * @return $this|\Propel\SpySalesOrderItem The current object (for fluent API support)
     */
    public function addDiscount(ChildSpySalesDiscount $l)
    {
        if ($this->collDiscounts === null) {
            $this->initDiscounts();
            $this->collDiscountsPartial = true;
        }

        if (!$this->collDiscounts->contains($l)) {
            $this->doAddDiscount($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesDiscount $discount The ChildSpySalesDiscount object to add.
     */
    protected function doAddDiscount(ChildSpySalesDiscount $discount)
    {
        $this->collDiscounts[]= $discount;
        $discount->setOrderItem($this);
    }

    /**
     * @param  ChildSpySalesDiscount $discount The ChildSpySalesDiscount object to remove.
     * @return $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function removeDiscount(ChildSpySalesDiscount $discount)
    {
        if ($this->getDiscounts()->contains($discount)) {
            $pos = $this->collDiscounts->search($discount);
            $this->collDiscounts->remove($pos);
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
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesDiscount[] List of ChildSpySalesDiscount objects
     */
    public function getDiscountsJoinOrder(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Order', $joinBehavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesDiscount[] List of ChildSpySalesDiscount objects
     */
    public function getDiscountsJoinExpense(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Expense', $joinBehavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItem is new, it will return
     * an empty collection; or if this SpySalesOrderItem has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItem.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesDiscount[] List of ChildSpySalesDiscount objects
     */
    public function getDiscountsJoinOption(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Option', $joinBehavior);

        return $this->getDiscounts($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyRefund) {
            $this->aSpyRefund->removeSpySalesOrderItem($this);
        }
        if (null !== $this->aOrder) {
            $this->aOrder->removeItem($this);
        }
        if (null !== $this->aState) {
            $this->aState->removeOrder($this);
        }
        if (null !== $this->aProcess) {
            $this->aProcess->removeItem($this);
        }
        if (null !== $this->aSalesOrderItemBundle) {
            $this->aSalesOrderItemBundle->removeSalesOrderItem($this);
        }
        $this->fk_refund = null;
        $this->id_sales_order_item = null;
        $this->fk_sales_order = null;
        $this->fk_oms_order_item_state = null;
        $this->fk_oms_order_process = null;
        $this->fk_sales_order_item_bundle = null;
        $this->last_state_change = null;
        $this->name = null;
        $this->sku = null;
        $this->gross_price = null;
        $this->price_to_pay = null;
        $this->tax_percentage = null;
        $this->quantity = null;
        $this->group_key = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collNopayments) {
                foreach ($this->collNopayments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTransitionLogs) {
                foreach ($this->collTransitionLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStateHistories) {
                foreach ($this->collStateHistories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEventTimeouts) {
                foreach ($this->collEventTimeouts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyPaymentPayolutionOrderItems) {
                foreach ($this->collSpyPaymentPayolutionOrderItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyPaymentPayoneTransactionStatusLogOrderItems) {
                foreach ($this->collSpyPaymentPayoneTransactionStatusLogOrderItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptions) {
                foreach ($this->collOptions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDiscounts) {
                foreach ($this->collDiscounts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collNopayments = null;
        $this->collTransitionLogs = null;
        $this->collStateHistories = null;
        $this->collEventTimeouts = null;
        $this->collSpyPaymentPayolutionOrderItems = null;
        $this->collSpyPaymentPayoneTransactionStatusLogOrderItems = null;
        $this->collOptions = null;
        $this->collDiscounts = null;
        $this->aSpyRefund = null;
        $this->aOrder = null;
        $this->aState = null;
        $this->aProcess = null;
        $this->aSalesOrderItemBundle = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySalesOrderItemTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpySalesOrderItem The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpySalesOrderItemTableMap::COL_UPDATED_AT] = true;

        return $this;
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
