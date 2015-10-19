<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyCustomer as ChildSpyCustomer;
use Propel\SpyCustomerQuery as ChildSpyCustomerQuery;
use Propel\SpyOmsTransitionLog as ChildSpyOmsTransitionLog;
use Propel\SpyOmsTransitionLogQuery as ChildSpyOmsTransitionLogQuery;
use Propel\SpyPaymentPayolution as ChildSpyPaymentPayolution;
use Propel\SpyPaymentPayolutionQuery as ChildSpyPaymentPayolutionQuery;
use Propel\SpyPaymentPayone as ChildSpyPaymentPayone;
use Propel\SpyPaymentPayoneQuery as ChildSpyPaymentPayoneQuery;
use Propel\SpyRefund as ChildSpyRefund;
use Propel\SpyRefundQuery as ChildSpyRefundQuery;
use Propel\SpySalesDiscount as ChildSpySalesDiscount;
use Propel\SpySalesDiscountQuery as ChildSpySalesDiscountQuery;
use Propel\SpySalesExpense as ChildSpySalesExpense;
use Propel\SpySalesExpenseQuery as ChildSpySalesExpenseQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderAddress as ChildSpySalesOrderAddress;
use Propel\SpySalesOrderAddressQuery as ChildSpySalesOrderAddressQuery;
use Propel\SpySalesOrderComment as ChildSpySalesOrderComment;
use Propel\SpySalesOrderCommentQuery as ChildSpySalesOrderCommentQuery;
use Propel\SpySalesOrderItem as ChildSpySalesOrderItem;
use Propel\SpySalesOrderItemQuery as ChildSpySalesOrderItemQuery;
use Propel\SpySalesOrderNote as ChildSpySalesOrderNote;
use Propel\SpySalesOrderNoteQuery as ChildSpySalesOrderNoteQuery;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\SpyShipmentMethod as ChildSpyShipmentMethod;
use Propel\SpyShipmentMethodQuery as ChildSpyShipmentMethodQuery;
use Propel\Map\SpySalesOrderTableMap;
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
 * Base class that represents a row from the 'spy_sales_order' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySalesOrder extends SpySalesOrder implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySalesOrderTableMap';


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
     * The value for the fk_customer field.
     * @var        int
     */
    protected $fk_customer;

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
     * The value for the order_reference field.
     * @var        string
     */
    protected $order_reference;

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
     * The value for the fk_shipment_method field.
     * @var        int
     */
    protected $fk_shipment_method;

    /**
     * The value for the shipment_delivery_time field.
     * @var        int
     */
    protected $shipment_delivery_time;

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
     * @var        ChildSpyCustomer
     */
    protected $aCustomer;

    /**
     * @var        ChildSpySalesOrderAddress
     */
    protected $aBillingAddress;

    /**
     * @var        ChildSpySalesOrderAddress
     */
    protected $aShippingAddress;

    /**
     * @var        ChildSpyShipmentMethod
     */
    protected $aShipmentMethod;

    /**
     * @var        ObjectCollection|ChildSpyOmsTransitionLog[] Collection to store aggregation of ChildSpyOmsTransitionLog objects.
     */
    protected $collTransitionLogs;
    protected $collTransitionLogsPartial;

    /**
     * @var        ObjectCollection|ChildSpyPaymentPayolution[] Collection to store aggregation of ChildSpyPaymentPayolution objects.
     */
    protected $collSpyPaymentPayolutions;
    protected $collSpyPaymentPayolutionsPartial;

    /**
     * @var        ObjectCollection|ChildSpyPaymentPayone[] Collection to store aggregation of ChildSpyPaymentPayone objects.
     */
    protected $collSpyPaymentPayones;
    protected $collSpyPaymentPayonesPartial;

    /**
     * @var        ObjectCollection|ChildSpyRefund[] Collection to store aggregation of ChildSpyRefund objects.
     */
    protected $collSpyRefunds;
    protected $collSpyRefundsPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderItem[] Collection to store aggregation of ChildSpySalesOrderItem objects.
     */
    protected $collItems;
    protected $collItemsPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesExpense[] Collection to store aggregation of ChildSpySalesExpense objects.
     */
    protected $collExpenses;
    protected $collExpensesPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderNote[] Collection to store aggregation of ChildSpySalesOrderNote objects.
     */
    protected $collNotes;
    protected $collNotesPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderComment[] Collection to store aggregation of ChildSpySalesOrderComment objects.
     */
    protected $collOrderComments;
    protected $collOrderCommentsPartial;

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
     * @var ObjectCollection|ChildSpyOmsTransitionLog[]
     */
    protected $transitionLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPaymentPayolution[]
     */
    protected $spyPaymentPayolutionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPaymentPayone[]
     */
    protected $spyPaymentPayonesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyRefund[]
     */
    protected $spyRefundsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderItem[]
     */
    protected $itemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesExpense[]
     */
    protected $expensesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderNote[]
     */
    protected $notesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderComment[]
     */
    protected $orderCommentsScheduledForDeletion = null;

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
        $this->is_test = false;
    }

    /**
     * Initializes internal state of Propel\Base\SpySalesOrder object.
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
     * Compares this with another <code>SpySalesOrder</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySalesOrder</code>, delegates to
     * <code>equals(SpySalesOrder)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpySalesOrder The current object, for fluid interface
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
     * Get the [fk_customer] column value.
     *
     * @return int
     */
    public function getFkCustomer()
    {
        return $this->fk_customer;
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
     * @return string
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getSalutation()
    {
        if (null === $this->salutation) {
            return null;
        }
        $valueSet = SpySalesOrderTableMap::getValueSet(SpySalesOrderTableMap::COL_SALUTATION);
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
     * Get the [order_reference] column value.
     *
     * @return string
     */
    public function getOrderReference()
    {
        return $this->order_reference;
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
     * Get the [is_test] column value.
     *
     * @return boolean
     */
    public function isTest()
    {
        return $this->getIsTest();
    }

    /**
     * Get the [fk_shipment_method] column value.
     *
     * @return int
     */
    public function getFkShipmentMethod()
    {
        return $this->fk_shipment_method;
    }

    /**
     * Get the [shipment_delivery_time] column value.
     *
     * @return int
     */
    public function getShipmentDeliveryTime()
    {
        return $this->shipment_delivery_time;
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
     * Set the value of [fk_customer] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setFkCustomer($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_customer !== $v) {
            $this->fk_customer = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_FK_CUSTOMER] = true;
        }

        if ($this->aCustomer !== null && $this->aCustomer->getIdCustomer() !== $v) {
            $this->aCustomer = null;
        }

        return $this;
    } // setFkCustomer()

    /**
     * Set the value of [id_sales_order] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setIdSalesOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sales_order !== $v) {
            $this->id_sales_order = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_ID_SALES_ORDER] = true;
        }

        return $this;
    } // setIdSalesOrder()

    /**
     * Set the value of [fk_sales_order_address_billing] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setFkSalesOrderAddressBilling($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_address_billing !== $v) {
            $this->fk_sales_order_address_billing = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING] = true;
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
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setFkSalesOrderAddressShipping($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_address_shipping !== $v) {
            $this->fk_sales_order_address_shipping = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING] = true;
        }

        if ($this->aShippingAddress !== null && $this->aShippingAddress->getIdSalesOrderAddress() !== $v) {
            $this->aShippingAddress = null;
        }

        return $this;
    } // setFkSalesOrderAddressShipping()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [salutation] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = SpySalesOrderTableMap::getValueSet(SpySalesOrderTableMap::COL_SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_SALUTATION] = true;
        }

        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [order_reference] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setOrderReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->order_reference !== $v) {
            $this->order_reference = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_ORDER_REFERENCE] = true;
        }

        return $this;
    } // setOrderReference()

    /**
     * Set the value of [grand_total] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setGrandTotal($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->grand_total !== $v) {
            $this->grand_total = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_GRAND_TOTAL] = true;
        }

        return $this;
    } // setGrandTotal()

    /**
     * Set the value of [subtotal] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setSubtotal($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->subtotal !== $v) {
            $this->subtotal = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_SUBTOTAL] = true;
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
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
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
            $this->modifiedColumns[SpySalesOrderTableMap::COL_IS_TEST] = true;
        }

        return $this;
    } // setIsTest()

    /**
     * Set the value of [fk_shipment_method] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setFkShipmentMethod($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_shipment_method !== $v) {
            $this->fk_shipment_method = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD] = true;
        }

        if ($this->aShipmentMethod !== null && $this->aShipmentMethod->getIdShipmentMethod() !== $v) {
            $this->aShipmentMethod = null;
        }

        return $this;
    } // setFkShipmentMethod()

    /**
     * Set the value of [shipment_delivery_time] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setShipmentDeliveryTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->shipment_delivery_time !== $v) {
            $this->shipment_delivery_time = $v;
            $this->modifiedColumns[SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME] = true;
        }

        return $this;
    } // setShipmentDeliveryTime()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySalesOrderTableMap::translateFieldName('FkCustomer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_customer = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySalesOrderTableMap::translateFieldName('IdSalesOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sales_order = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpySalesOrderTableMap::translateFieldName('FkSalesOrderAddressBilling', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order_address_billing = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpySalesOrderTableMap::translateFieldName('FkSalesOrderAddressShipping', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order_address_shipping = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpySalesOrderTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpySalesOrderTableMap::translateFieldName('Salutation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salutation = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpySalesOrderTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpySalesOrderTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpySalesOrderTableMap::translateFieldName('OrderReference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->order_reference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpySalesOrderTableMap::translateFieldName('GrandTotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->grand_total = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpySalesOrderTableMap::translateFieldName('Subtotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->subtotal = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpySalesOrderTableMap::translateFieldName('IsTest', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_test = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpySalesOrderTableMap::translateFieldName('FkShipmentMethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_shipment_method = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpySalesOrderTableMap::translateFieldName('ShipmentDeliveryTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipment_delivery_time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpySalesOrderTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpySalesOrderTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = SpySalesOrderTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySalesOrder'), 0, $e);
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
        if ($this->aCustomer !== null && $this->fk_customer !== $this->aCustomer->getIdCustomer()) {
            $this->aCustomer = null;
        }
        if ($this->aBillingAddress !== null && $this->fk_sales_order_address_billing !== $this->aBillingAddress->getIdSalesOrderAddress()) {
            $this->aBillingAddress = null;
        }
        if ($this->aShippingAddress !== null && $this->fk_sales_order_address_shipping !== $this->aShippingAddress->getIdSalesOrderAddress()) {
            $this->aShippingAddress = null;
        }
        if ($this->aShipmentMethod !== null && $this->fk_shipment_method !== $this->aShipmentMethod->getIdShipmentMethod()) {
            $this->aShipmentMethod = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySalesOrderQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCustomer = null;
            $this->aBillingAddress = null;
            $this->aShippingAddress = null;
            $this->aShipmentMethod = null;
            $this->collTransitionLogs = null;

            $this->collSpyPaymentPayolutions = null;

            $this->collSpyPaymentPayones = null;

            $this->collSpyRefunds = null;

            $this->collItems = null;

            $this->collExpenses = null;

            $this->collNotes = null;

            $this->collOrderComments = null;

            $this->collDiscounts = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySalesOrder::setDeleted()
     * @see SpySalesOrder::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySalesOrderQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpySalesOrderTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpySalesOrderTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpySalesOrderTableMap::COL_UPDATED_AT)) {
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
                SpySalesOrderTableMap::addInstanceToPool($this);
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

            if ($this->aCustomer !== null) {
                if ($this->aCustomer->isModified() || $this->aCustomer->isNew()) {
                    $affectedRows += $this->aCustomer->save($con);
                }
                $this->setCustomer($this->aCustomer);
            }

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

            if ($this->aShipmentMethod !== null) {
                if ($this->aShipmentMethod->isModified() || $this->aShipmentMethod->isNew()) {
                    $affectedRows += $this->aShipmentMethod->save($con);
                }
                $this->setShipmentMethod($this->aShipmentMethod);
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

            if ($this->spyPaymentPayolutionsScheduledForDeletion !== null) {
                if (!$this->spyPaymentPayolutionsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyPaymentPayolutionQuery::create()
                        ->filterByPrimaryKeys($this->spyPaymentPayolutionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyPaymentPayolutionsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyPaymentPayolutions !== null) {
                foreach ($this->collSpyPaymentPayolutions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyPaymentPayonesScheduledForDeletion !== null) {
                if (!$this->spyPaymentPayonesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyPaymentPayoneQuery::create()
                        ->filterByPrimaryKeys($this->spyPaymentPayonesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyPaymentPayonesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyPaymentPayones !== null) {
                foreach ($this->collSpyPaymentPayones as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyRefundsScheduledForDeletion !== null) {
                if (!$this->spyRefundsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyRefundQuery::create()
                        ->filterByPrimaryKeys($this->spyRefundsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyRefundsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyRefunds !== null) {
                foreach ($this->collSpyRefunds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->itemsScheduledForDeletion !== null) {
                if (!$this->itemsScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderItemQuery::create()
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

            if ($this->notesScheduledForDeletion !== null) {
                if (!$this->notesScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderNoteQuery::create()
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
                    \Propel\SpySalesOrderCommentQuery::create()
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

        $this->modifiedColumns[SpySalesOrderTableMap::COL_ID_SALES_ORDER] = true;
        if (null !== $this->id_sales_order) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySalesOrderTableMap::COL_ID_SALES_ORDER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = 'fk_customer';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_ID_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'id_sales_order';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order_address_billing';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order_address_shipping';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = 'salutation';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_ORDER_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'order_reference';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_GRAND_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'grand_total';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_SUBTOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'subtotal';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_IS_TEST)) {
            $modifiedColumns[':p' . $index++]  = 'is_test';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD)) {
            $modifiedColumns[':p' . $index++]  = 'fk_shipment_method';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'shipment_delivery_time';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_sales_order (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'fk_customer':
                        $stmt->bindValue($identifier, $this->fk_customer, PDO::PARAM_INT);
                        break;
                    case 'id_sales_order':
                        $stmt->bindValue($identifier, $this->id_sales_order, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order_address_billing':
                        $stmt->bindValue($identifier, $this->fk_sales_order_address_billing, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order_address_shipping':
                        $stmt->bindValue($identifier, $this->fk_sales_order_address_shipping, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'salutation':
                        $stmt->bindValue($identifier, $this->salutation, PDO::PARAM_INT);
                        break;
                    case 'first_name':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'last_name':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'order_reference':
                        $stmt->bindValue($identifier, $this->order_reference, PDO::PARAM_STR);
                        break;
                    case 'grand_total':
                        $stmt->bindValue($identifier, $this->grand_total, PDO::PARAM_INT);
                        break;
                    case 'subtotal':
                        $stmt->bindValue($identifier, $this->subtotal, PDO::PARAM_INT);
                        break;
                    case 'is_test':
                        $stmt->bindValue($identifier, (int) $this->is_test, PDO::PARAM_INT);
                        break;
                    case 'fk_shipment_method':
                        $stmt->bindValue($identifier, $this->fk_shipment_method, PDO::PARAM_INT);
                        break;
                    case 'shipment_delivery_time':
                        $stmt->bindValue($identifier, $this->shipment_delivery_time, PDO::PARAM_INT);
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
            $pk = $con->lastInsertId('spy_sales_order_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSalesOrder($pk);

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
        $pos = SpySalesOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFkCustomer();
                break;
            case 1:
                return $this->getIdSalesOrder();
                break;
            case 2:
                return $this->getFkSalesOrderAddressBilling();
                break;
            case 3:
                return $this->getFkSalesOrderAddressShipping();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getSalutation();
                break;
            case 6:
                return $this->getFirstName();
                break;
            case 7:
                return $this->getLastName();
                break;
            case 8:
                return $this->getOrderReference();
                break;
            case 9:
                return $this->getGrandTotal();
                break;
            case 10:
                return $this->getSubtotal();
                break;
            case 11:
                return $this->getIsTest();
                break;
            case 12:
                return $this->getFkShipmentMethod();
                break;
            case 13:
                return $this->getShipmentDeliveryTime();
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

        if (isset($alreadyDumpedObjects['SpySalesOrder'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySalesOrder'][$this->hashCode()] = true;
        $keys = SpySalesOrderTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getFkCustomer(),
            $keys[1] => $this->getIdSalesOrder(),
            $keys[2] => $this->getFkSalesOrderAddressBilling(),
            $keys[3] => $this->getFkSalesOrderAddressShipping(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getSalutation(),
            $keys[6] => $this->getFirstName(),
            $keys[7] => $this->getLastName(),
            $keys[8] => $this->getOrderReference(),
            $keys[9] => $this->getGrandTotal(),
            $keys[10] => $this->getSubtotal(),
            $keys[11] => $this->getIsTest(),
            $keys[12] => $this->getFkShipmentMethod(),
            $keys[13] => $this->getShipmentDeliveryTime(),
            $keys[14] => $this->getCreatedAt(),
            $keys[15] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
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
            if (null !== $this->aCustomer) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCustomer';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_customer';
                        break;
                    default:
                        $key = 'SpyCustomer';
                }

                $result[$key] = $this->aCustomer->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBillingAddress) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderAddress';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_address';
                        break;
                    default:
                        $key = 'SpySalesOrderAddress';
                }

                $result[$key] = $this->aBillingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aShippingAddress) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderAddress';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_address';
                        break;
                    default:
                        $key = 'SpySalesOrderAddress';
                }

                $result[$key] = $this->aShippingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aShipmentMethod) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyShipmentMethod';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_shipment_method';
                        break;
                    default:
                        $key = 'SpyShipmentMethod';
                }

                $result[$key] = $this->aShipmentMethod->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collSpyPaymentPayolutions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayolutions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payolutions';
                        break;
                    default:
                        $key = 'SpyPaymentPayolutions';
                }

                $result[$key] = $this->collSpyPaymentPayolutions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyPaymentPayones) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayones';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payones';
                        break;
                    default:
                        $key = 'SpyPaymentPayones';
                }

                $result[$key] = $this->collSpyPaymentPayones->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyRefunds) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyRefunds';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_refunds';
                        break;
                    default:
                        $key = 'SpyRefunds';
                }

                $result[$key] = $this->collSpyRefunds->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collItems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderItems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_items';
                        break;
                    default:
                        $key = 'SpySalesOrderItems';
                }

                $result[$key] = $this->collItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpenses) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesExpenses';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_expenses';
                        break;
                    default:
                        $key = 'SpySalesExpenses';
                }

                $result[$key] = $this->collExpenses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNotes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderNotes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_notes';
                        break;
                    default:
                        $key = 'SpySalesOrderNotes';
                }

                $result[$key] = $this->collNotes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrderComments) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderComments';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_comments';
                        break;
                    default:
                        $key = 'SpySalesOrderComments';
                }

                $result[$key] = $this->collOrderComments->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpySalesOrder
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySalesOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySalesOrder
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setFkCustomer($value);
                break;
            case 1:
                $this->setIdSalesOrder($value);
                break;
            case 2:
                $this->setFkSalesOrderAddressBilling($value);
                break;
            case 3:
                $this->setFkSalesOrderAddressShipping($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $valueSet = SpySalesOrderTableMap::getValueSet(SpySalesOrderTableMap::COL_SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 6:
                $this->setFirstName($value);
                break;
            case 7:
                $this->setLastName($value);
                break;
            case 8:
                $this->setOrderReference($value);
                break;
            case 9:
                $this->setGrandTotal($value);
                break;
            case 10:
                $this->setSubtotal($value);
                break;
            case 11:
                $this->setIsTest($value);
                break;
            case 12:
                $this->setFkShipmentMethod($value);
                break;
            case 13:
                $this->setShipmentDeliveryTime($value);
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
        $keys = SpySalesOrderTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setFkCustomer($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdSalesOrder($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkSalesOrderAddressBilling($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkSalesOrderAddressShipping($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEmail($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSalutation($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFirstName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLastName($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setOrderReference($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setGrandTotal($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSubtotal($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setIsTest($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setFkShipmentMethod($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setShipmentDeliveryTime($arr[$keys[13]]);
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
     * @return $this|\Propel\SpySalesOrder The current object, for fluid interface
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
        $criteria = new Criteria(SpySalesOrderTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_CUSTOMER)) {
            $criteria->add(SpySalesOrderTableMap::COL_FK_CUSTOMER, $this->fk_customer);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_ID_SALES_ORDER)) {
            $criteria->add(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $this->id_sales_order);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING)) {
            $criteria->add(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING, $this->fk_sales_order_address_billing);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING)) {
            $criteria->add(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING, $this->fk_sales_order_address_shipping);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_EMAIL)) {
            $criteria->add(SpySalesOrderTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_SALUTATION)) {
            $criteria->add(SpySalesOrderTableMap::COL_SALUTATION, $this->salutation);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FIRST_NAME)) {
            $criteria->add(SpySalesOrderTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_LAST_NAME)) {
            $criteria->add(SpySalesOrderTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_ORDER_REFERENCE)) {
            $criteria->add(SpySalesOrderTableMap::COL_ORDER_REFERENCE, $this->order_reference);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_GRAND_TOTAL)) {
            $criteria->add(SpySalesOrderTableMap::COL_GRAND_TOTAL, $this->grand_total);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_SUBTOTAL)) {
            $criteria->add(SpySalesOrderTableMap::COL_SUBTOTAL, $this->subtotal);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_IS_TEST)) {
            $criteria->add(SpySalesOrderTableMap::COL_IS_TEST, $this->is_test);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD)) {
            $criteria->add(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD, $this->fk_shipment_method);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME)) {
            $criteria->add(SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME, $this->shipment_delivery_time);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_CREATED_AT)) {
            $criteria->add(SpySalesOrderTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpySalesOrderTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpySalesOrderTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpySalesOrderQuery::create();
        $criteria->add(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $this->id_sales_order);

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
        $validPk = null !== $this->getIdSalesOrder();

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
        return $this->getIdSalesOrder();
    }

    /**
     * Generic method to set the primary key (id_sales_order column).
     *
     * @param       int $key Primary key.
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
     * @param      object $copyObj An object of \Propel\SpySalesOrder (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCustomer($this->getFkCustomer());
        $copyObj->setFkSalesOrderAddressBilling($this->getFkSalesOrderAddressBilling());
        $copyObj->setFkSalesOrderAddressShipping($this->getFkSalesOrderAddressShipping());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setSalutation($this->getSalutation());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setOrderReference($this->getOrderReference());
        $copyObj->setGrandTotal($this->getGrandTotal());
        $copyObj->setSubtotal($this->getSubtotal());
        $copyObj->setIsTest($this->getIsTest());
        $copyObj->setFkShipmentMethod($this->getFkShipmentMethod());
        $copyObj->setShipmentDeliveryTime($this->getShipmentDeliveryTime());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTransitionLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransitionLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyPaymentPayolutions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyPaymentPayolution($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyPaymentPayones() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyPaymentPayone($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyRefunds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyRefund($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpenses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpense($relObj->copy($deepCopy));
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

            foreach ($this->getDiscounts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscount($relObj->copy($deepCopy));
                }
            }

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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Propel\SpySalesOrder Clone of current object.
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
     * Declares an association between this object and a ChildSpyCustomer object.
     *
     * @param  ChildSpyCustomer $v
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCustomer(ChildSpyCustomer $v = null)
    {
        if ($v === null) {
            $this->setFkCustomer(NULL);
        } else {
            $this->setFkCustomer($v->getIdCustomer());
        }

        $this->aCustomer = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCustomer object, it will not be re-added.
        if ($v !== null) {
            $v->addOrder($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCustomer object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCustomer The associated ChildSpyCustomer object.
     * @throws PropelException
     */
    public function getCustomer(ConnectionInterface $con = null)
    {
        if ($this->aCustomer === null && ($this->fk_customer !== null)) {
            $this->aCustomer = ChildSpyCustomerQuery::create()->findPk($this->fk_customer, $con);
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
     * Declares an association between this object and a ChildSpySalesOrderAddress object.
     *
     * @param  ChildSpySalesOrderAddress $v
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBillingAddress(ChildSpySalesOrderAddress $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderAddressBilling(NULL);
        } else {
            $this->setFkSalesOrderAddressBilling($v->getIdSalesOrderAddress());
        }

        $this->aBillingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrderAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addSpySalesOrderRelatedByFkSalesOrderAddressBilling($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrderAddress object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrderAddress The associated ChildSpySalesOrderAddress object.
     * @throws PropelException
     */
    public function getBillingAddress(ConnectionInterface $con = null)
    {
        if ($this->aBillingAddress === null && ($this->fk_sales_order_address_billing !== null)) {
            $this->aBillingAddress = ChildSpySalesOrderAddressQuery::create()->findPk($this->fk_sales_order_address_billing, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBillingAddress->addSpySalesOrdersRelatedByFkSalesOrderAddressBilling($this);
             */
        }

        return $this->aBillingAddress;
    }

    /**
     * Declares an association between this object and a ChildSpySalesOrderAddress object.
     *
     * @param  ChildSpySalesOrderAddress $v
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShippingAddress(ChildSpySalesOrderAddress $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderAddressShipping(NULL);
        } else {
            $this->setFkSalesOrderAddressShipping($v->getIdSalesOrderAddress());
        }

        $this->aShippingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrderAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addSpySalesOrderRelatedByFkSalesOrderAddressShipping($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrderAddress object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrderAddress The associated ChildSpySalesOrderAddress object.
     * @throws PropelException
     */
    public function getShippingAddress(ConnectionInterface $con = null)
    {
        if ($this->aShippingAddress === null && ($this->fk_sales_order_address_shipping !== null)) {
            $this->aShippingAddress = ChildSpySalesOrderAddressQuery::create()->findPk($this->fk_sales_order_address_shipping, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShippingAddress->addSpySalesOrdersRelatedByFkSalesOrderAddressShipping($this);
             */
        }

        return $this->aShippingAddress;
    }

    /**
     * Declares an association between this object and a ChildSpyShipmentMethod object.
     *
     * @param  ChildSpyShipmentMethod $v
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShipmentMethod(ChildSpyShipmentMethod $v = null)
    {
        if ($v === null) {
            $this->setFkShipmentMethod(NULL);
        } else {
            $this->setFkShipmentMethod($v->getIdShipmentMethod());
        }

        $this->aShipmentMethod = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyShipmentMethod object, it will not be re-added.
        if ($v !== null) {
            $v->addShipmentMethods($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyShipmentMethod object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyShipmentMethod The associated ChildSpyShipmentMethod object.
     * @throws PropelException
     */
    public function getShipmentMethod(ConnectionInterface $con = null)
    {
        if ($this->aShipmentMethod === null && ($this->fk_shipment_method !== null)) {
            $this->aShipmentMethod = ChildSpyShipmentMethodQuery::create()->findPk($this->fk_shipment_method, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShipmentMethod->addShipmentMethodss($this);
             */
        }

        return $this->aShipmentMethod;
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
        if ('TransitionLog' == $relationName) {
            return $this->initTransitionLogs();
        }
        if ('SpyPaymentPayolution' == $relationName) {
            return $this->initSpyPaymentPayolutions();
        }
        if ('SpyPaymentPayone' == $relationName) {
            return $this->initSpyPaymentPayones();
        }
        if ('SpyRefund' == $relationName) {
            return $this->initSpyRefunds();
        }
        if ('Item' == $relationName) {
            return $this->initItems();
        }
        if ('Expense' == $relationName) {
            return $this->initExpenses();
        }
        if ('Note' == $relationName) {
            return $this->initNotes();
        }
        if ('OrderComment' == $relationName) {
            return $this->initOrderComments();
        }
        if ('Discount' == $relationName) {
            return $this->initDiscounts();
        }
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
     * If this ChildSpySalesOrder is new, it will return
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
                    ->filterByOrder($this)
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
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setTransitionLogs(Collection $transitionLogs, ConnectionInterface $con = null)
    {
        /** @var ChildSpyOmsTransitionLog[] $transitionLogsToDelete */
        $transitionLogsToDelete = $this->getTransitionLogs(new Criteria(), $con)->diff($transitionLogs);


        $this->transitionLogsScheduledForDeletion = $transitionLogsToDelete;

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
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collTransitionLogs);
    }

    /**
     * Method called to associate a ChildSpyOmsTransitionLog object to this object
     * through the ChildSpyOmsTransitionLog foreign key attribute.
     *
     * @param  ChildSpyOmsTransitionLog $l ChildSpyOmsTransitionLog
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
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
        $transitionLog->setOrder($this);
    }

    /**
     * @param  ChildSpyOmsTransitionLog $transitionLog The ChildSpyOmsTransitionLog object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
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
            $transitionLog->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyOmsTransitionLog[] List of ChildSpyOmsTransitionLog objects
     */
    public function getTransitionLogsJoinOrderItem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyOmsTransitionLogQuery::create(null, $criteria);
        $query->joinWith('OrderItem', $joinBehavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
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
     * Clears out the collSpyPaymentPayolutions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyPaymentPayolutions()
     */
    public function clearSpyPaymentPayolutions()
    {
        $this->collSpyPaymentPayolutions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyPaymentPayolutions collection loaded partially.
     */
    public function resetPartialSpyPaymentPayolutions($v = true)
    {
        $this->collSpyPaymentPayolutionsPartial = $v;
    }

    /**
     * Initializes the collSpyPaymentPayolutions collection.
     *
     * By default this just sets the collSpyPaymentPayolutions collection to an empty array (like clearcollSpyPaymentPayolutions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyPaymentPayolutions($overrideExisting = true)
    {
        if (null !== $this->collSpyPaymentPayolutions && !$overrideExisting) {
            return;
        }
        $this->collSpyPaymentPayolutions = new ObjectCollection();
        $this->collSpyPaymentPayolutions->setModel('\Propel\SpyPaymentPayolution');
    }

    /**
     * Gets an array of ChildSpyPaymentPayolution objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPaymentPayolution[] List of ChildSpyPaymentPayolution objects
     * @throws PropelException
     */
    public function getSpyPaymentPayolutions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutions) {
                // return empty collection
                $this->initSpyPaymentPayolutions();
            } else {
                $collSpyPaymentPayolutions = ChildSpyPaymentPayolutionQuery::create(null, $criteria)
                    ->filterBySpySalesOrder($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyPaymentPayolutionsPartial && count($collSpyPaymentPayolutions)) {
                        $this->initSpyPaymentPayolutions(false);

                        foreach ($collSpyPaymentPayolutions as $obj) {
                            if (false == $this->collSpyPaymentPayolutions->contains($obj)) {
                                $this->collSpyPaymentPayolutions->append($obj);
                            }
                        }

                        $this->collSpyPaymentPayolutionsPartial = true;
                    }

                    return $collSpyPaymentPayolutions;
                }

                if ($partial && $this->collSpyPaymentPayolutions) {
                    foreach ($this->collSpyPaymentPayolutions as $obj) {
                        if ($obj->isNew()) {
                            $collSpyPaymentPayolutions[] = $obj;
                        }
                    }
                }

                $this->collSpyPaymentPayolutions = $collSpyPaymentPayolutions;
                $this->collSpyPaymentPayolutionsPartial = false;
            }
        }

        return $this->collSpyPaymentPayolutions;
    }

    /**
     * Sets a collection of ChildSpyPaymentPayolution objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyPaymentPayolutions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setSpyPaymentPayolutions(Collection $spyPaymentPayolutions, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPaymentPayolution[] $spyPaymentPayolutionsToDelete */
        $spyPaymentPayolutionsToDelete = $this->getSpyPaymentPayolutions(new Criteria(), $con)->diff($spyPaymentPayolutions);


        $this->spyPaymentPayolutionsScheduledForDeletion = $spyPaymentPayolutionsToDelete;

        foreach ($spyPaymentPayolutionsToDelete as $spyPaymentPayolutionRemoved) {
            $spyPaymentPayolutionRemoved->setSpySalesOrder(null);
        }

        $this->collSpyPaymentPayolutions = null;
        foreach ($spyPaymentPayolutions as $spyPaymentPayolution) {
            $this->addSpyPaymentPayolution($spyPaymentPayolution);
        }

        $this->collSpyPaymentPayolutions = $spyPaymentPayolutions;
        $this->collSpyPaymentPayolutionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyPaymentPayolution objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPaymentPayolution objects.
     * @throws PropelException
     */
    public function countSpyPaymentPayolutions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyPaymentPayolutions());
            }

            $query = ChildSpyPaymentPayolutionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpySalesOrder($this)
                ->count($con);
        }

        return count($this->collSpyPaymentPayolutions);
    }

    /**
     * Method called to associate a ChildSpyPaymentPayolution object to this object
     * through the ChildSpyPaymentPayolution foreign key attribute.
     *
     * @param  ChildSpyPaymentPayolution $l ChildSpyPaymentPayolution
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function addSpyPaymentPayolution(ChildSpyPaymentPayolution $l)
    {
        if ($this->collSpyPaymentPayolutions === null) {
            $this->initSpyPaymentPayolutions();
            $this->collSpyPaymentPayolutionsPartial = true;
        }

        if (!$this->collSpyPaymentPayolutions->contains($l)) {
            $this->doAddSpyPaymentPayolution($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPaymentPayolution $spyPaymentPayolution The ChildSpyPaymentPayolution object to add.
     */
    protected function doAddSpyPaymentPayolution(ChildSpyPaymentPayolution $spyPaymentPayolution)
    {
        $this->collSpyPaymentPayolutions[]= $spyPaymentPayolution;
        $spyPaymentPayolution->setSpySalesOrder($this);
    }

    /**
     * @param  ChildSpyPaymentPayolution $spyPaymentPayolution The ChildSpyPaymentPayolution object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function removeSpyPaymentPayolution(ChildSpyPaymentPayolution $spyPaymentPayolution)
    {
        if ($this->getSpyPaymentPayolutions()->contains($spyPaymentPayolution)) {
            $pos = $this->collSpyPaymentPayolutions->search($spyPaymentPayolution);
            $this->collSpyPaymentPayolutions->remove($pos);
            if (null === $this->spyPaymentPayolutionsScheduledForDeletion) {
                $this->spyPaymentPayolutionsScheduledForDeletion = clone $this->collSpyPaymentPayolutions;
                $this->spyPaymentPayolutionsScheduledForDeletion->clear();
            }
            $this->spyPaymentPayolutionsScheduledForDeletion[]= clone $spyPaymentPayolution;
            $spyPaymentPayolution->setSpySalesOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyPaymentPayones collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyPaymentPayones()
     */
    public function clearSpyPaymentPayones()
    {
        $this->collSpyPaymentPayones = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyPaymentPayones collection loaded partially.
     */
    public function resetPartialSpyPaymentPayones($v = true)
    {
        $this->collSpyPaymentPayonesPartial = $v;
    }

    /**
     * Initializes the collSpyPaymentPayones collection.
     *
     * By default this just sets the collSpyPaymentPayones collection to an empty array (like clearcollSpyPaymentPayones());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyPaymentPayones($overrideExisting = true)
    {
        if (null !== $this->collSpyPaymentPayones && !$overrideExisting) {
            return;
        }
        $this->collSpyPaymentPayones = new ObjectCollection();
        $this->collSpyPaymentPayones->setModel('\Propel\SpyPaymentPayone');
    }

    /**
     * Gets an array of ChildSpyPaymentPayone objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPaymentPayone[] List of ChildSpyPaymentPayone objects
     * @throws PropelException
     */
    public function getSpyPaymentPayones(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayonesPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayones || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayones) {
                // return empty collection
                $this->initSpyPaymentPayones();
            } else {
                $collSpyPaymentPayones = ChildSpyPaymentPayoneQuery::create(null, $criteria)
                    ->filterBySpySalesOrder($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyPaymentPayonesPartial && count($collSpyPaymentPayones)) {
                        $this->initSpyPaymentPayones(false);

                        foreach ($collSpyPaymentPayones as $obj) {
                            if (false == $this->collSpyPaymentPayones->contains($obj)) {
                                $this->collSpyPaymentPayones->append($obj);
                            }
                        }

                        $this->collSpyPaymentPayonesPartial = true;
                    }

                    return $collSpyPaymentPayones;
                }

                if ($partial && $this->collSpyPaymentPayones) {
                    foreach ($this->collSpyPaymentPayones as $obj) {
                        if ($obj->isNew()) {
                            $collSpyPaymentPayones[] = $obj;
                        }
                    }
                }

                $this->collSpyPaymentPayones = $collSpyPaymentPayones;
                $this->collSpyPaymentPayonesPartial = false;
            }
        }

        return $this->collSpyPaymentPayones;
    }

    /**
     * Sets a collection of ChildSpyPaymentPayone objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyPaymentPayones A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setSpyPaymentPayones(Collection $spyPaymentPayones, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPaymentPayone[] $spyPaymentPayonesToDelete */
        $spyPaymentPayonesToDelete = $this->getSpyPaymentPayones(new Criteria(), $con)->diff($spyPaymentPayones);


        $this->spyPaymentPayonesScheduledForDeletion = $spyPaymentPayonesToDelete;

        foreach ($spyPaymentPayonesToDelete as $spyPaymentPayoneRemoved) {
            $spyPaymentPayoneRemoved->setSpySalesOrder(null);
        }

        $this->collSpyPaymentPayones = null;
        foreach ($spyPaymentPayones as $spyPaymentPayone) {
            $this->addSpyPaymentPayone($spyPaymentPayone);
        }

        $this->collSpyPaymentPayones = $spyPaymentPayones;
        $this->collSpyPaymentPayonesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyPaymentPayone objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPaymentPayone objects.
     * @throws PropelException
     */
    public function countSpyPaymentPayones(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayonesPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayones || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayones) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyPaymentPayones());
            }

            $query = ChildSpyPaymentPayoneQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpySalesOrder($this)
                ->count($con);
        }

        return count($this->collSpyPaymentPayones);
    }

    /**
     * Method called to associate a ChildSpyPaymentPayone object to this object
     * through the ChildSpyPaymentPayone foreign key attribute.
     *
     * @param  ChildSpyPaymentPayone $l ChildSpyPaymentPayone
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function addSpyPaymentPayone(ChildSpyPaymentPayone $l)
    {
        if ($this->collSpyPaymentPayones === null) {
            $this->initSpyPaymentPayones();
            $this->collSpyPaymentPayonesPartial = true;
        }

        if (!$this->collSpyPaymentPayones->contains($l)) {
            $this->doAddSpyPaymentPayone($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPaymentPayone $spyPaymentPayone The ChildSpyPaymentPayone object to add.
     */
    protected function doAddSpyPaymentPayone(ChildSpyPaymentPayone $spyPaymentPayone)
    {
        $this->collSpyPaymentPayones[]= $spyPaymentPayone;
        $spyPaymentPayone->setSpySalesOrder($this);
    }

    /**
     * @param  ChildSpyPaymentPayone $spyPaymentPayone The ChildSpyPaymentPayone object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function removeSpyPaymentPayone(ChildSpyPaymentPayone $spyPaymentPayone)
    {
        if ($this->getSpyPaymentPayones()->contains($spyPaymentPayone)) {
            $pos = $this->collSpyPaymentPayones->search($spyPaymentPayone);
            $this->collSpyPaymentPayones->remove($pos);
            if (null === $this->spyPaymentPayonesScheduledForDeletion) {
                $this->spyPaymentPayonesScheduledForDeletion = clone $this->collSpyPaymentPayones;
                $this->spyPaymentPayonesScheduledForDeletion->clear();
            }
            $this->spyPaymentPayonesScheduledForDeletion[]= clone $spyPaymentPayone;
            $spyPaymentPayone->setSpySalesOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyRefunds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyRefunds()
     */
    public function clearSpyRefunds()
    {
        $this->collSpyRefunds = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyRefunds collection loaded partially.
     */
    public function resetPartialSpyRefunds($v = true)
    {
        $this->collSpyRefundsPartial = $v;
    }

    /**
     * Initializes the collSpyRefunds collection.
     *
     * By default this just sets the collSpyRefunds collection to an empty array (like clearcollSpyRefunds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyRefunds($overrideExisting = true)
    {
        if (null !== $this->collSpyRefunds && !$overrideExisting) {
            return;
        }
        $this->collSpyRefunds = new ObjectCollection();
        $this->collSpyRefunds->setModel('\Propel\SpyRefund');
    }

    /**
     * Gets an array of ChildSpyRefund objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyRefund[] List of ChildSpyRefund objects
     * @throws PropelException
     */
    public function getSpyRefunds(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyRefundsPartial && !$this->isNew();
        if (null === $this->collSpyRefunds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyRefunds) {
                // return empty collection
                $this->initSpyRefunds();
            } else {
                $collSpyRefunds = ChildSpyRefundQuery::create(null, $criteria)
                    ->filterBySpySalesOrder($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyRefundsPartial && count($collSpyRefunds)) {
                        $this->initSpyRefunds(false);

                        foreach ($collSpyRefunds as $obj) {
                            if (false == $this->collSpyRefunds->contains($obj)) {
                                $this->collSpyRefunds->append($obj);
                            }
                        }

                        $this->collSpyRefundsPartial = true;
                    }

                    return $collSpyRefunds;
                }

                if ($partial && $this->collSpyRefunds) {
                    foreach ($this->collSpyRefunds as $obj) {
                        if ($obj->isNew()) {
                            $collSpyRefunds[] = $obj;
                        }
                    }
                }

                $this->collSpyRefunds = $collSpyRefunds;
                $this->collSpyRefundsPartial = false;
            }
        }

        return $this->collSpyRefunds;
    }

    /**
     * Sets a collection of ChildSpyRefund objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyRefunds A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setSpyRefunds(Collection $spyRefunds, ConnectionInterface $con = null)
    {
        /** @var ChildSpyRefund[] $spyRefundsToDelete */
        $spyRefundsToDelete = $this->getSpyRefunds(new Criteria(), $con)->diff($spyRefunds);


        $this->spyRefundsScheduledForDeletion = $spyRefundsToDelete;

        foreach ($spyRefundsToDelete as $spyRefundRemoved) {
            $spyRefundRemoved->setSpySalesOrder(null);
        }

        $this->collSpyRefunds = null;
        foreach ($spyRefunds as $spyRefund) {
            $this->addSpyRefund($spyRefund);
        }

        $this->collSpyRefunds = $spyRefunds;
        $this->collSpyRefundsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyRefund objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyRefund objects.
     * @throws PropelException
     */
    public function countSpyRefunds(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyRefundsPartial && !$this->isNew();
        if (null === $this->collSpyRefunds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyRefunds) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyRefunds());
            }

            $query = ChildSpyRefundQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpySalesOrder($this)
                ->count($con);
        }

        return count($this->collSpyRefunds);
    }

    /**
     * Method called to associate a ChildSpyRefund object to this object
     * through the ChildSpyRefund foreign key attribute.
     *
     * @param  ChildSpyRefund $l ChildSpyRefund
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function addSpyRefund(ChildSpyRefund $l)
    {
        if ($this->collSpyRefunds === null) {
            $this->initSpyRefunds();
            $this->collSpyRefundsPartial = true;
        }

        if (!$this->collSpyRefunds->contains($l)) {
            $this->doAddSpyRefund($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyRefund $spyRefund The ChildSpyRefund object to add.
     */
    protected function doAddSpyRefund(ChildSpyRefund $spyRefund)
    {
        $this->collSpyRefunds[]= $spyRefund;
        $spyRefund->setSpySalesOrder($this);
    }

    /**
     * @param  ChildSpyRefund $spyRefund The ChildSpyRefund object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function removeSpyRefund(ChildSpyRefund $spyRefund)
    {
        if ($this->getSpyRefunds()->contains($spyRefund)) {
            $pos = $this->collSpyRefunds->search($spyRefund);
            $this->collSpyRefunds->remove($pos);
            if (null === $this->spyRefundsScheduledForDeletion) {
                $this->spyRefundsScheduledForDeletion = clone $this->collSpyRefunds;
                $this->spyRefundsScheduledForDeletion->clear();
            }
            $this->spyRefundsScheduledForDeletion[]= clone $spyRefund;
            $spyRefund->setSpySalesOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addItems()
     */
    public function clearItems()
    {
        $this->collItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collItems collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initItems($overrideExisting = true)
    {
        if (null !== $this->collItems && !$overrideExisting) {
            return;
        }
        $this->collItems = new ObjectCollection();
        $this->collItems->setModel('\Propel\SpySalesOrderItem');
    }

    /**
     * Gets an array of ChildSpySalesOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     * @throws PropelException
     */
    public function getItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collItemsPartial && !$this->isNew();
        if (null === $this->collItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collItems) {
                // return empty collection
                $this->initItems();
            } else {
                $collItems = ChildSpySalesOrderItemQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collItemsPartial && count($collItems)) {
                        $this->initItems(false);

                        foreach ($collItems as $obj) {
                            if (false == $this->collItems->contains($obj)) {
                                $this->collItems->append($obj);
                            }
                        }

                        $this->collItemsPartial = true;
                    }

                    return $collItems;
                }

                if ($partial && $this->collItems) {
                    foreach ($this->collItems as $obj) {
                        if ($obj->isNew()) {
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
     * Sets a collection of ChildSpySalesOrderItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $items A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setItems(Collection $items, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderItem[] $itemsToDelete */
        $itemsToDelete = $this->getItems(new Criteria(), $con)->diff($items);


        $this->itemsScheduledForDeletion = $itemsToDelete;

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
     * Returns the number of related SpySalesOrderItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderItem objects.
     * @throws PropelException
     */
    public function countItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collItemsPartial && !$this->isNew();
        if (null === $this->collItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getItems());
            }

            $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpySalesOrderItem object to this object
     * through the ChildSpySalesOrderItem foreign key attribute.
     *
     * @param  ChildSpySalesOrderItem $l ChildSpySalesOrderItem
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function addItem(ChildSpySalesOrderItem $l)
    {
        if ($this->collItems === null) {
            $this->initItems();
            $this->collItemsPartial = true;
        }

        if (!$this->collItems->contains($l)) {
            $this->doAddItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderItem $item The ChildSpySalesOrderItem object to add.
     */
    protected function doAddItem(ChildSpySalesOrderItem $item)
    {
        $this->collItems[]= $item;
        $item->setOrder($this);
    }

    /**
     * @param  ChildSpySalesOrderItem $item The ChildSpySalesOrderItem object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function removeItem(ChildSpySalesOrderItem $item)
    {
        if ($this->getItems()->contains($item)) {
            $pos = $this->collItems->search($item);
            $this->collItems->remove($pos);
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
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Items from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getItemsJoinSpyRefund(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('SpyRefund', $joinBehavior);

        return $this->getItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Items from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getItemsJoinState(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('State', $joinBehavior);

        return $this->getItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Items from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getItemsJoinProcess(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Process', $joinBehavior);

        return $this->getItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Items from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getItemsJoinSalesOrderItemBundle(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('SalesOrderItemBundle', $joinBehavior);

        return $this->getItems($query, $con);
    }

    /**
     * Clears out the collExpenses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpenses()
     */
    public function clearExpenses()
    {
        $this->collExpenses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpenses collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpenses($overrideExisting = true)
    {
        if (null !== $this->collExpenses && !$overrideExisting) {
            return;
        }
        $this->collExpenses = new ObjectCollection();
        $this->collExpenses->setModel('\Propel\SpySalesExpense');
    }

    /**
     * Gets an array of ChildSpySalesExpense objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesExpense[] List of ChildSpySalesExpense objects
     * @throws PropelException
     */
    public function getExpenses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpensesPartial && !$this->isNew();
        if (null === $this->collExpenses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpenses) {
                // return empty collection
                $this->initExpenses();
            } else {
                $collExpenses = ChildSpySalesExpenseQuery::create(null, $criteria)
                    ->filterByOrder($this)
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
     * Sets a collection of ChildSpySalesExpense objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expenses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setExpenses(Collection $expenses, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesExpense[] $expensesToDelete */
        $expensesToDelete = $this->getExpenses(new Criteria(), $con)->diff($expenses);


        $this->expensesScheduledForDeletion = $expensesToDelete;

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
     * Returns the number of related SpySalesExpense objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesExpense objects.
     * @throws PropelException
     */
    public function countExpenses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpensesPartial && !$this->isNew();
        if (null === $this->collExpenses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpenses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpenses());
            }

            $query = ChildSpySalesExpenseQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpySalesExpense object to this object
     * through the ChildSpySalesExpense foreign key attribute.
     *
     * @param  ChildSpySalesExpense $l ChildSpySalesExpense
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function addExpense(ChildSpySalesExpense $l)
    {
        if ($this->collExpenses === null) {
            $this->initExpenses();
            $this->collExpensesPartial = true;
        }

        if (!$this->collExpenses->contains($l)) {
            $this->doAddExpense($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesExpense $expense The ChildSpySalesExpense object to add.
     */
    protected function doAddExpense(ChildSpySalesExpense $expense)
    {
        $this->collExpenses[]= $expense;
        $expense->setOrder($this);
    }

    /**
     * @param  ChildSpySalesExpense $expense The ChildSpySalesExpense object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function removeExpense(ChildSpySalesExpense $expense)
    {
        if ($this->getExpenses()->contains($expense)) {
            $pos = $this->collExpenses->search($expense);
            $this->collExpenses->remove($pos);
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
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Expenses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesExpense[] List of ChildSpySalesExpense objects
     */
    public function getExpensesJoinSpyRefund(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesExpenseQuery::create(null, $criteria);
        $query->joinWith('SpyRefund', $joinBehavior);

        return $this->getExpenses($query, $con);
    }

    /**
     * Clears out the collNotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNotes()
     */
    public function clearNotes()
    {
        $this->collNotes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collNotes collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNotes($overrideExisting = true)
    {
        if (null !== $this->collNotes && !$overrideExisting) {
            return;
        }
        $this->collNotes = new ObjectCollection();
        $this->collNotes->setModel('\Propel\SpySalesOrderNote');
    }

    /**
     * Gets an array of ChildSpySalesOrderNote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderNote[] List of ChildSpySalesOrderNote objects
     * @throws PropelException
     */
    public function getNotes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collNotesPartial && !$this->isNew();
        if (null === $this->collNotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNotes) {
                // return empty collection
                $this->initNotes();
            } else {
                $collNotes = ChildSpySalesOrderNoteQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collNotesPartial && count($collNotes)) {
                        $this->initNotes(false);

                        foreach ($collNotes as $obj) {
                            if (false == $this->collNotes->contains($obj)) {
                                $this->collNotes->append($obj);
                            }
                        }

                        $this->collNotesPartial = true;
                    }

                    return $collNotes;
                }

                if ($partial && $this->collNotes) {
                    foreach ($this->collNotes as $obj) {
                        if ($obj->isNew()) {
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
     * Sets a collection of ChildSpySalesOrderNote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $notes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setNotes(Collection $notes, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderNote[] $notesToDelete */
        $notesToDelete = $this->getNotes(new Criteria(), $con)->diff($notes);


        $this->notesScheduledForDeletion = $notesToDelete;

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
     * Returns the number of related SpySalesOrderNote objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderNote objects.
     * @throws PropelException
     */
    public function countNotes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collNotesPartial && !$this->isNew();
        if (null === $this->collNotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNotes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getNotes());
            }

            $query = ChildSpySalesOrderNoteQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpySalesOrderNote object to this object
     * through the ChildSpySalesOrderNote foreign key attribute.
     *
     * @param  ChildSpySalesOrderNote $l ChildSpySalesOrderNote
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function addNote(ChildSpySalesOrderNote $l)
    {
        if ($this->collNotes === null) {
            $this->initNotes();
            $this->collNotesPartial = true;
        }

        if (!$this->collNotes->contains($l)) {
            $this->doAddNote($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderNote $note The ChildSpySalesOrderNote object to add.
     */
    protected function doAddNote(ChildSpySalesOrderNote $note)
    {
        $this->collNotes[]= $note;
        $note->setOrder($this);
    }

    /**
     * @param  ChildSpySalesOrderNote $note The ChildSpySalesOrderNote object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function removeNote(ChildSpySalesOrderNote $note)
    {
        if ($this->getNotes()->contains($note)) {
            $pos = $this->collNotes->search($note);
            $this->collNotes->remove($pos);
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
     * Clears out the collOrderComments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOrderComments()
     */
    public function clearOrderComments()
    {
        $this->collOrderComments = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collOrderComments collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrderComments($overrideExisting = true)
    {
        if (null !== $this->collOrderComments && !$overrideExisting) {
            return;
        }
        $this->collOrderComments = new ObjectCollection();
        $this->collOrderComments->setModel('\Propel\SpySalesOrderComment');
    }

    /**
     * Gets an array of ChildSpySalesOrderComment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrder is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderComment[] List of ChildSpySalesOrderComment objects
     * @throws PropelException
     */
    public function getOrderComments(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collOrderCommentsPartial && !$this->isNew();
        if (null === $this->collOrderComments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrderComments) {
                // return empty collection
                $this->initOrderComments();
            } else {
                $collOrderComments = ChildSpySalesOrderCommentQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collOrderCommentsPartial && count($collOrderComments)) {
                        $this->initOrderComments(false);

                        foreach ($collOrderComments as $obj) {
                            if (false == $this->collOrderComments->contains($obj)) {
                                $this->collOrderComments->append($obj);
                            }
                        }

                        $this->collOrderCommentsPartial = true;
                    }

                    return $collOrderComments;
                }

                if ($partial && $this->collOrderComments) {
                    foreach ($this->collOrderComments as $obj) {
                        if ($obj->isNew()) {
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
     * Sets a collection of ChildSpySalesOrderComment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $orderComments A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setOrderComments(Collection $orderComments, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderComment[] $orderCommentsToDelete */
        $orderCommentsToDelete = $this->getOrderComments(new Criteria(), $con)->diff($orderComments);


        $this->orderCommentsScheduledForDeletion = $orderCommentsToDelete;

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
     * Returns the number of related SpySalesOrderComment objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderComment objects.
     * @throws PropelException
     */
    public function countOrderComments(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collOrderCommentsPartial && !$this->isNew();
        if (null === $this->collOrderComments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrderComments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrderComments());
            }

            $query = ChildSpySalesOrderCommentQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpySalesOrderComment object to this object
     * through the ChildSpySalesOrderComment foreign key attribute.
     *
     * @param  ChildSpySalesOrderComment $l ChildSpySalesOrderComment
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
     */
    public function addOrderComment(ChildSpySalesOrderComment $l)
    {
        if ($this->collOrderComments === null) {
            $this->initOrderComments();
            $this->collOrderCommentsPartial = true;
        }

        if (!$this->collOrderComments->contains($l)) {
            $this->doAddOrderComment($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderComment $orderComment The ChildSpySalesOrderComment object to add.
     */
    protected function doAddOrderComment(ChildSpySalesOrderComment $orderComment)
    {
        $this->collOrderComments[]= $orderComment;
        $orderComment->setOrder($this);
    }

    /**
     * @param  ChildSpySalesOrderComment $orderComment The ChildSpySalesOrderComment object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function removeOrderComment(ChildSpySalesOrderComment $orderComment)
    {
        if ($this->getOrderComments()->contains($orderComment)) {
            $pos = $this->collOrderComments->search($orderComment);
            $this->collOrderComments->remove($pos);
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
     * If this ChildSpySalesOrder is new, it will return
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
                    ->filterByOrder($this)
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
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function setDiscounts(Collection $discounts, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesDiscount[] $discountsToDelete */
        $discountsToDelete = $this->getDiscounts(new Criteria(), $con)->diff($discounts);


        $this->discountsScheduledForDeletion = $discountsToDelete;

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
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collDiscounts);
    }

    /**
     * Method called to associate a ChildSpySalesDiscount object to this object
     * through the ChildSpySalesDiscount foreign key attribute.
     *
     * @param  ChildSpySalesDiscount $l ChildSpySalesDiscount
     * @return $this|\Propel\SpySalesOrder The current object (for fluent API support)
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
        $discount->setOrder($this);
    }

    /**
     * @param  ChildSpySalesDiscount $discount The ChildSpySalesDiscount object to remove.
     * @return $this|ChildSpySalesOrder The current object (for fluent API support)
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
            $discount->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesDiscount[] List of ChildSpySalesDiscount objects
     */
    public function getDiscountsJoinOrderItem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesDiscountQuery::create(null, $criteria);
        $query->joinWith('OrderItem', $joinBehavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
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
     * Otherwise if this SpySalesOrder is new, it will return
     * an empty collection; or if this SpySalesOrder has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrder.
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
        if (null !== $this->aCustomer) {
            $this->aCustomer->removeOrder($this);
        }
        if (null !== $this->aBillingAddress) {
            $this->aBillingAddress->removeSpySalesOrderRelatedByFkSalesOrderAddressBilling($this);
        }
        if (null !== $this->aShippingAddress) {
            $this->aShippingAddress->removeSpySalesOrderRelatedByFkSalesOrderAddressShipping($this);
        }
        if (null !== $this->aShipmentMethod) {
            $this->aShipmentMethod->removeShipmentMethods($this);
        }
        $this->fk_customer = null;
        $this->id_sales_order = null;
        $this->fk_sales_order_address_billing = null;
        $this->fk_sales_order_address_shipping = null;
        $this->email = null;
        $this->salutation = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->order_reference = null;
        $this->grand_total = null;
        $this->subtotal = null;
        $this->is_test = null;
        $this->fk_shipment_method = null;
        $this->shipment_delivery_time = null;
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
            if ($this->collTransitionLogs) {
                foreach ($this->collTransitionLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyPaymentPayolutions) {
                foreach ($this->collSpyPaymentPayolutions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyPaymentPayones) {
                foreach ($this->collSpyPaymentPayones as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyRefunds) {
                foreach ($this->collSpyRefunds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collItems) {
                foreach ($this->collItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpenses) {
                foreach ($this->collExpenses as $o) {
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
            if ($this->collDiscounts) {
                foreach ($this->collDiscounts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTransitionLogs = null;
        $this->collSpyPaymentPayolutions = null;
        $this->collSpyPaymentPayones = null;
        $this->collSpyRefunds = null;
        $this->collItems = null;
        $this->collExpenses = null;
        $this->collNotes = null;
        $this->collOrderComments = null;
        $this->collDiscounts = null;
        $this->aCustomer = null;
        $this->aBillingAddress = null;
        $this->aShippingAddress = null;
        $this->aShipmentMethod = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySalesOrderTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpySalesOrder The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpySalesOrderTableMap::COL_UPDATED_AT] = true;

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
