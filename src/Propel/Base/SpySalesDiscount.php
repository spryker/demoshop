<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpySalesDiscount as ChildSpySalesDiscount;
use Propel\SpySalesDiscountCode as ChildSpySalesDiscountCode;
use Propel\SpySalesDiscountCodeQuery as ChildSpySalesDiscountCodeQuery;
use Propel\SpySalesDiscountQuery as ChildSpySalesDiscountQuery;
use Propel\SpySalesExpense as ChildSpySalesExpense;
use Propel\SpySalesExpenseQuery as ChildSpySalesExpenseQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderItem as ChildSpySalesOrderItem;
use Propel\SpySalesOrderItemOption as ChildSpySalesOrderItemOption;
use Propel\SpySalesOrderItemOptionQuery as ChildSpySalesOrderItemOptionQuery;
use Propel\SpySalesOrderItemQuery as ChildSpySalesOrderItemQuery;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\Map\SpySalesDiscountTableMap;
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
 * Base class that represents a row from the 'spy_sales_discount' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySalesDiscount extends SpySalesDiscount implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySalesDiscountTableMap';


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
     * The value for the id_sales_discount field.
     * @var        int
     */
    protected $id_sales_discount;

    /**
     * The value for the fk_sales_order field.
     * @var        int
     */
    protected $fk_sales_order;

    /**
     * The value for the fk_sales_order_item field.
     * @var        int
     */
    protected $fk_sales_order_item;

    /**
     * The value for the fk_sales_expense field.
     * @var        int
     */
    protected $fk_sales_expense;

    /**
     * The value for the fk_sales_order_item_option field.
     * @var        int
     */
    protected $fk_sales_order_item_option;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the display_name field.
     * @var        string
     */
    protected $display_name;

    /**
     * The value for the scope field.
     * @var        int
     */
    protected $scope;

    /**
     * The value for the action field.
     * @var        string
     */
    protected $action;

    /**
     * The value for the conditions field.
     * @var        string
     */
    protected $conditions;

    /**
     * The value for the amount field.
     * @var        int
     */
    protected $amount;

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
     * @var        ChildSpySalesOrder
     */
    protected $aOrder;

    /**
     * @var        ChildSpySalesOrderItem
     */
    protected $aOrderItem;

    /**
     * @var        ChildSpySalesExpense
     */
    protected $aExpense;

    /**
     * @var        ChildSpySalesOrderItemOption
     */
    protected $aOption;

    /**
     * @var        ObjectCollection|ChildSpySalesDiscountCode[] Collection to store aggregation of ChildSpySalesDiscountCode objects.
     */
    protected $collDiscountCodes;
    protected $collDiscountCodesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesDiscountCode[]
     */
    protected $discountCodesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpySalesDiscount object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>SpySalesDiscount</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySalesDiscount</code>, delegates to
     * <code>equals(SpySalesDiscount)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpySalesDiscount The current object, for fluid interface
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
     * Get the [id_sales_discount] column value.
     *
     * @return int
     */
    public function getIdSalesDiscount()
    {
        return $this->id_sales_discount;
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
     * Get the [fk_sales_order_item] column value.
     *
     * @return int
     */
    public function getFkSalesOrderItem()
    {
        return $this->fk_sales_order_item;
    }

    /**
     * Get the [fk_sales_expense] column value.
     *
     * @return int
     */
    public function getFkSalesExpense()
    {
        return $this->fk_sales_expense;
    }

    /**
     * Get the [fk_sales_order_item_option] column value.
     *
     * @return int
     */
    public function getFkSalesOrderItemOption()
    {
        return $this->fk_sales_order_item_option;
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
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [display_name] column value.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Get the [scope] column value.
     *
     * @return string
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getScope()
    {
        if (null === $this->scope) {
            return null;
        }
        $valueSet = SpySalesDiscountTableMap::getValueSet(SpySalesDiscountTableMap::COL_SCOPE);
        if (!isset($valueSet[$this->scope])) {
            throw new PropelException('Unknown stored enum key: ' . $this->scope);
        }

        return $valueSet[$this->scope];
    }

    /**
     * Get the [action] column value.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Get the [conditions] column value.
     *
     * @return string
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
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
     * Set the value of [id_sales_discount] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setIdSalesDiscount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sales_discount !== $v) {
            $this->id_sales_discount = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT] = true;
        }

        return $this;
    } // setIdSalesDiscount()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_FK_SALES_ORDER] = true;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }

        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [fk_sales_order_item] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setFkSalesOrderItem($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_item !== $v) {
            $this->fk_sales_order_item = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM] = true;
        }

        if ($this->aOrderItem !== null && $this->aOrderItem->getIdSalesOrderItem() !== $v) {
            $this->aOrderItem = null;
        }

        return $this;
    } // setFkSalesOrderItem()

    /**
     * Set the value of [fk_sales_expense] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setFkSalesExpense($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_expense !== $v) {
            $this->fk_sales_expense = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE] = true;
        }

        if ($this->aExpense !== null && $this->aExpense->getIdSalesExpense() !== $v) {
            $this->aExpense = null;
        }

        return $this;
    } // setFkSalesExpense()

    /**
     * Set the value of [fk_sales_order_item_option] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setFkSalesOrderItemOption($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_item_option !== $v) {
            $this->fk_sales_order_item_option = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION] = true;
        }

        if ($this->aOption !== null && $this->aOption->getIdSalesOrderItemOption() !== $v) {
            $this->aOption = null;
        }

        return $this;
    } // setFkSalesOrderItemOption()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_DISPLAY_NAME] = true;
        }

        return $this;
    } // setDisplayName()

    /**
     * Set the value of [scope] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setScope($v)
    {
        if ($v !== null) {
            $valueSet = SpySalesDiscountTableMap::getValueSet(SpySalesDiscountTableMap::COL_SCOPE);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->scope !== $v) {
            $this->scope = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_SCOPE] = true;
        }

        return $this;
    } // setScope()

    /**
     * Set the value of [action] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setAction($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->action !== $v) {
            $this->action = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_ACTION] = true;
        }

        return $this;
    } // setAction()

    /**
     * Set the value of [conditions] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setConditions($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->conditions !== $v) {
            $this->conditions = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_CONDITIONS] = true;
        }

        return $this;
    } // setConditions()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[SpySalesDiscountTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesDiscountTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesDiscountTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySalesDiscountTableMap::translateFieldName('IdSalesDiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sales_discount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySalesDiscountTableMap::translateFieldName('FkSalesOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpySalesDiscountTableMap::translateFieldName('FkSalesOrderItem', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order_item = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpySalesDiscountTableMap::translateFieldName('FkSalesExpense', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_expense = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpySalesDiscountTableMap::translateFieldName('FkSalesOrderItemOption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order_item_option = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpySalesDiscountTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpySalesDiscountTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpySalesDiscountTableMap::translateFieldName('DisplayName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->display_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpySalesDiscountTableMap::translateFieldName('Scope', TableMap::TYPE_PHPNAME, $indexType)];
            $this->scope = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpySalesDiscountTableMap::translateFieldName('Action', TableMap::TYPE_PHPNAME, $indexType)];
            $this->action = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpySalesDiscountTableMap::translateFieldName('Conditions', TableMap::TYPE_PHPNAME, $indexType)];
            $this->conditions = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpySalesDiscountTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpySalesDiscountTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpySalesDiscountTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = SpySalesDiscountTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySalesDiscount'), 0, $e);
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
        if ($this->aOrderItem !== null && $this->fk_sales_order_item !== $this->aOrderItem->getIdSalesOrderItem()) {
            $this->aOrderItem = null;
        }
        if ($this->aExpense !== null && $this->fk_sales_expense !== $this->aExpense->getIdSalesExpense()) {
            $this->aExpense = null;
        }
        if ($this->aOption !== null && $this->fk_sales_order_item_option !== $this->aOption->getIdSalesOrderItemOption()) {
            $this->aOption = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesDiscountTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySalesDiscountQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrder = null;
            $this->aOrderItem = null;
            $this->aExpense = null;
            $this->aOption = null;
            $this->collDiscountCodes = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySalesDiscount::setDeleted()
     * @see SpySalesDiscount::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySalesDiscountQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpySalesDiscountTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpySalesDiscountTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpySalesDiscountTableMap::COL_UPDATED_AT)) {
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
                SpySalesDiscountTableMap::addInstanceToPool($this);
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

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

            if ($this->aOrderItem !== null) {
                if ($this->aOrderItem->isModified() || $this->aOrderItem->isNew()) {
                    $affectedRows += $this->aOrderItem->save($con);
                }
                $this->setOrderItem($this->aOrderItem);
            }

            if ($this->aExpense !== null) {
                if ($this->aExpense->isModified() || $this->aExpense->isNew()) {
                    $affectedRows += $this->aExpense->save($con);
                }
                $this->setExpense($this->aExpense);
            }

            if ($this->aOption !== null) {
                if ($this->aOption->isModified() || $this->aOption->isNew()) {
                    $affectedRows += $this->aOption->save($con);
                }
                $this->setOption($this->aOption);
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

            if ($this->discountCodesScheduledForDeletion !== null) {
                if (!$this->discountCodesScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesDiscountCodeQuery::create()
                        ->filterByPrimaryKeys($this->discountCodesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->discountCodesScheduledForDeletion = null;
                }
            }

            if ($this->collDiscountCodes !== null) {
                foreach ($this->collDiscountCodes as $referrerFK) {
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

        $this->modifiedColumns[SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT] = true;
        if (null !== $this->id_sales_discount) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'id_sales_discount';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order_item';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_expense';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order_item_option';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'display_name';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_SCOPE)) {
            $modifiedColumns[':p' . $index++]  = 'scope';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_ACTION)) {
            $modifiedColumns[':p' . $index++]  = 'action';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_CONDITIONS)) {
            $modifiedColumns[':p' . $index++]  = 'conditions';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_sales_discount (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_sales_discount':
                        $stmt->bindValue($identifier, $this->id_sales_discount, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order_item':
                        $stmt->bindValue($identifier, $this->fk_sales_order_item, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_expense':
                        $stmt->bindValue($identifier, $this->fk_sales_expense, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order_item_option':
                        $stmt->bindValue($identifier, $this->fk_sales_order_item_option, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'display_name':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case 'scope':
                        $stmt->bindValue($identifier, $this->scope, PDO::PARAM_INT);
                        break;
                    case 'action':
                        $stmt->bindValue($identifier, $this->action, PDO::PARAM_STR);
                        break;
                    case 'conditions':
                        $stmt->bindValue($identifier, $this->conditions, PDO::PARAM_STR);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
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
            $pk = $con->lastInsertId('spy_sales_discount_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSalesDiscount($pk);

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
        $pos = SpySalesDiscountTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSalesDiscount();
                break;
            case 1:
                return $this->getFkSalesOrder();
                break;
            case 2:
                return $this->getFkSalesOrderItem();
                break;
            case 3:
                return $this->getFkSalesExpense();
                break;
            case 4:
                return $this->getFkSalesOrderItemOption();
                break;
            case 5:
                return $this->getName();
                break;
            case 6:
                return $this->getDescription();
                break;
            case 7:
                return $this->getDisplayName();
                break;
            case 8:
                return $this->getScope();
                break;
            case 9:
                return $this->getAction();
                break;
            case 10:
                return $this->getConditions();
                break;
            case 11:
                return $this->getAmount();
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

        if (isset($alreadyDumpedObjects['SpySalesDiscount'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySalesDiscount'][$this->hashCode()] = true;
        $keys = SpySalesDiscountTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesDiscount(),
            $keys[1] => $this->getFkSalesOrder(),
            $keys[2] => $this->getFkSalesOrderItem(),
            $keys[3] => $this->getFkSalesExpense(),
            $keys[4] => $this->getFkSalesOrderItemOption(),
            $keys[5] => $this->getName(),
            $keys[6] => $this->getDescription(),
            $keys[7] => $this->getDisplayName(),
            $keys[8] => $this->getScope(),
            $keys[9] => $this->getAction(),
            $keys[10] => $this->getConditions(),
            $keys[11] => $this->getAmount(),
            $keys[12] => $this->getCreatedAt(),
            $keys[13] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[12]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[12]];
            $result[$keys[12]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[13]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[13]];
            $result[$keys[13]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
            if (null !== $this->aOrderItem) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderItem';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_item';
                        break;
                    default:
                        $key = 'SpySalesOrderItem';
                }

                $result[$key] = $this->aOrderItem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aExpense) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesExpense';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_expense';
                        break;
                    default:
                        $key = 'SpySalesExpense';
                }

                $result[$key] = $this->aExpense->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOption) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderItemOption';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_item_option';
                        break;
                    default:
                        $key = 'SpySalesOrderItemOption';
                }

                $result[$key] = $this->aOption->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDiscountCodes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesDiscountCodes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_discount_codes';
                        break;
                    default:
                        $key = 'SpySalesDiscountCodes';
                }

                $result[$key] = $this->collDiscountCodes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpySalesDiscount
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySalesDiscountTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySalesDiscount
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdSalesDiscount($value);
                break;
            case 1:
                $this->setFkSalesOrder($value);
                break;
            case 2:
                $this->setFkSalesOrderItem($value);
                break;
            case 3:
                $this->setFkSalesExpense($value);
                break;
            case 4:
                $this->setFkSalesOrderItemOption($value);
                break;
            case 5:
                $this->setName($value);
                break;
            case 6:
                $this->setDescription($value);
                break;
            case 7:
                $this->setDisplayName($value);
                break;
            case 8:
                $valueSet = SpySalesDiscountTableMap::getValueSet(SpySalesDiscountTableMap::COL_SCOPE);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setScope($value);
                break;
            case 9:
                $this->setAction($value);
                break;
            case 10:
                $this->setConditions($value);
                break;
            case 11:
                $this->setAmount($value);
                break;
            case 12:
                $this->setCreatedAt($value);
                break;
            case 13:
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
        $keys = SpySalesDiscountTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdSalesDiscount($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkSalesOrder($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkSalesOrderItem($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkSalesExpense($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFkSalesOrderItemOption($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDescription($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDisplayName($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setScope($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAction($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setConditions($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAmount($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCreatedAt($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setUpdatedAt($arr[$keys[13]]);
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
     * @return $this|\Propel\SpySalesDiscount The current object, for fluid interface
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
        $criteria = new Criteria(SpySalesDiscountTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT)) {
            $criteria->add(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $this->id_sales_discount);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_ORDER)) {
            $criteria->add(SpySalesDiscountTableMap::COL_FK_SALES_ORDER, $this->fk_sales_order);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM)) {
            $criteria->add(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM, $this->fk_sales_order_item);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE)) {
            $criteria->add(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE, $this->fk_sales_expense);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION)) {
            $criteria->add(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION, $this->fk_sales_order_item_option);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_NAME)) {
            $criteria->add(SpySalesDiscountTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_DESCRIPTION)) {
            $criteria->add(SpySalesDiscountTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_DISPLAY_NAME)) {
            $criteria->add(SpySalesDiscountTableMap::COL_DISPLAY_NAME, $this->display_name);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_SCOPE)) {
            $criteria->add(SpySalesDiscountTableMap::COL_SCOPE, $this->scope);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_ACTION)) {
            $criteria->add(SpySalesDiscountTableMap::COL_ACTION, $this->action);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_CONDITIONS)) {
            $criteria->add(SpySalesDiscountTableMap::COL_CONDITIONS, $this->conditions);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_AMOUNT)) {
            $criteria->add(SpySalesDiscountTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_CREATED_AT)) {
            $criteria->add(SpySalesDiscountTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpySalesDiscountTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpySalesDiscountTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpySalesDiscountQuery::create();
        $criteria->add(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $this->id_sales_discount);

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
        $validPk = null !== $this->getIdSalesDiscount();

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
        return $this->getIdSalesDiscount();
    }

    /**
     * Generic method to set the primary key (id_sales_discount column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesDiscount($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdSalesDiscount();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpySalesDiscount (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setFkSalesOrderItem($this->getFkSalesOrderItem());
        $copyObj->setFkSalesExpense($this->getFkSalesExpense());
        $copyObj->setFkSalesOrderItemOption($this->getFkSalesOrderItemOption());
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setScope($this->getScope());
        $copyObj->setAction($this->getAction());
        $copyObj->setConditions($this->getConditions());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getDiscountCodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscountCode($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesDiscount(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpySalesDiscount Clone of current object.
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
     * Declares an association between this object and a ChildSpySalesOrder object.
     *
     * @param  ChildSpySalesOrder $v
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
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
            $v->addDiscount($this);
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
                $this->aOrder->addDiscounts($this);
             */
        }

        return $this->aOrder;
    }

    /**
     * Declares an association between this object and a ChildSpySalesOrderItem object.
     *
     * @param  ChildSpySalesOrderItem $v
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrderItem(ChildSpySalesOrderItem $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderItem(NULL);
        } else {
            $this->setFkSalesOrderItem($v->getIdSalesOrderItem());
        }

        $this->aOrderItem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrderItem object, it will not be re-added.
        if ($v !== null) {
            $v->addDiscount($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrderItem object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrderItem The associated ChildSpySalesOrderItem object.
     * @throws PropelException
     */
    public function getOrderItem(ConnectionInterface $con = null)
    {
        if ($this->aOrderItem === null && ($this->fk_sales_order_item !== null)) {
            $this->aOrderItem = ChildSpySalesOrderItemQuery::create()->findPk($this->fk_sales_order_item, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrderItem->addDiscounts($this);
             */
        }

        return $this->aOrderItem;
    }

    /**
     * Declares an association between this object and a ChildSpySalesExpense object.
     *
     * @param  ChildSpySalesExpense $v
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     * @throws PropelException
     */
    public function setExpense(ChildSpySalesExpense $v = null)
    {
        if ($v === null) {
            $this->setFkSalesExpense(NULL);
        } else {
            $this->setFkSalesExpense($v->getIdSalesExpense());
        }

        $this->aExpense = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesExpense object, it will not be re-added.
        if ($v !== null) {
            $v->addDiscount($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesExpense object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesExpense The associated ChildSpySalesExpense object.
     * @throws PropelException
     */
    public function getExpense(ConnectionInterface $con = null)
    {
        if ($this->aExpense === null && ($this->fk_sales_expense !== null)) {
            $this->aExpense = ChildSpySalesExpenseQuery::create()->findPk($this->fk_sales_expense, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aExpense->addDiscounts($this);
             */
        }

        return $this->aExpense;
    }

    /**
     * Declares an association between this object and a ChildSpySalesOrderItemOption object.
     *
     * @param  ChildSpySalesOrderItemOption $v
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOption(ChildSpySalesOrderItemOption $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderItemOption(NULL);
        } else {
            $this->setFkSalesOrderItemOption($v->getIdSalesOrderItemOption());
        }

        $this->aOption = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrderItemOption object, it will not be re-added.
        if ($v !== null) {
            $v->addDiscount($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrderItemOption object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrderItemOption The associated ChildSpySalesOrderItemOption object.
     * @throws PropelException
     */
    public function getOption(ConnectionInterface $con = null)
    {
        if ($this->aOption === null && ($this->fk_sales_order_item_option !== null)) {
            $this->aOption = ChildSpySalesOrderItemOptionQuery::create()->findPk($this->fk_sales_order_item_option, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOption->addDiscounts($this);
             */
        }

        return $this->aOption;
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
        if ('DiscountCode' == $relationName) {
            return $this->initDiscountCodes();
        }
    }

    /**
     * Clears out the collDiscountCodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDiscountCodes()
     */
    public function clearDiscountCodes()
    {
        $this->collDiscountCodes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDiscountCodes collection loaded partially.
     */
    public function resetPartialDiscountCodes($v = true)
    {
        $this->collDiscountCodesPartial = $v;
    }

    /**
     * Initializes the collDiscountCodes collection.
     *
     * By default this just sets the collDiscountCodes collection to an empty array (like clearcollDiscountCodes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiscountCodes($overrideExisting = true)
    {
        if (null !== $this->collDiscountCodes && !$overrideExisting) {
            return;
        }
        $this->collDiscountCodes = new ObjectCollection();
        $this->collDiscountCodes->setModel('\Propel\SpySalesDiscountCode');
    }

    /**
     * Gets an array of ChildSpySalesDiscountCode objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesDiscount is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesDiscountCode[] List of ChildSpySalesDiscountCode objects
     * @throws PropelException
     */
    public function getDiscountCodes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountCodesPartial && !$this->isNew();
        if (null === $this->collDiscountCodes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiscountCodes) {
                // return empty collection
                $this->initDiscountCodes();
            } else {
                $collDiscountCodes = ChildSpySalesDiscountCodeQuery::create(null, $criteria)
                    ->filterByDiscount($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDiscountCodesPartial && count($collDiscountCodes)) {
                        $this->initDiscountCodes(false);

                        foreach ($collDiscountCodes as $obj) {
                            if (false == $this->collDiscountCodes->contains($obj)) {
                                $this->collDiscountCodes->append($obj);
                            }
                        }

                        $this->collDiscountCodesPartial = true;
                    }

                    return $collDiscountCodes;
                }

                if ($partial && $this->collDiscountCodes) {
                    foreach ($this->collDiscountCodes as $obj) {
                        if ($obj->isNew()) {
                            $collDiscountCodes[] = $obj;
                        }
                    }
                }

                $this->collDiscountCodes = $collDiscountCodes;
                $this->collDiscountCodesPartial = false;
            }
        }

        return $this->collDiscountCodes;
    }

    /**
     * Sets a collection of ChildSpySalesDiscountCode objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $discountCodes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesDiscount The current object (for fluent API support)
     */
    public function setDiscountCodes(Collection $discountCodes, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesDiscountCode[] $discountCodesToDelete */
        $discountCodesToDelete = $this->getDiscountCodes(new Criteria(), $con)->diff($discountCodes);


        $this->discountCodesScheduledForDeletion = $discountCodesToDelete;

        foreach ($discountCodesToDelete as $discountCodeRemoved) {
            $discountCodeRemoved->setDiscount(null);
        }

        $this->collDiscountCodes = null;
        foreach ($discountCodes as $discountCode) {
            $this->addDiscountCode($discountCode);
        }

        $this->collDiscountCodes = $discountCodes;
        $this->collDiscountCodesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySalesDiscountCode objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesDiscountCode objects.
     * @throws PropelException
     */
    public function countDiscountCodes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountCodesPartial && !$this->isNew();
        if (null === $this->collDiscountCodes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscountCodes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiscountCodes());
            }

            $query = ChildSpySalesDiscountCodeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDiscount($this)
                ->count($con);
        }

        return count($this->collDiscountCodes);
    }

    /**
     * Method called to associate a ChildSpySalesDiscountCode object to this object
     * through the ChildSpySalesDiscountCode foreign key attribute.
     *
     * @param  ChildSpySalesDiscountCode $l ChildSpySalesDiscountCode
     * @return $this|\Propel\SpySalesDiscount The current object (for fluent API support)
     */
    public function addDiscountCode(ChildSpySalesDiscountCode $l)
    {
        if ($this->collDiscountCodes === null) {
            $this->initDiscountCodes();
            $this->collDiscountCodesPartial = true;
        }

        if (!$this->collDiscountCodes->contains($l)) {
            $this->doAddDiscountCode($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesDiscountCode $discountCode The ChildSpySalesDiscountCode object to add.
     */
    protected function doAddDiscountCode(ChildSpySalesDiscountCode $discountCode)
    {
        $this->collDiscountCodes[]= $discountCode;
        $discountCode->setDiscount($this);
    }

    /**
     * @param  ChildSpySalesDiscountCode $discountCode The ChildSpySalesDiscountCode object to remove.
     * @return $this|ChildSpySalesDiscount The current object (for fluent API support)
     */
    public function removeDiscountCode(ChildSpySalesDiscountCode $discountCode)
    {
        if ($this->getDiscountCodes()->contains($discountCode)) {
            $pos = $this->collDiscountCodes->search($discountCode);
            $this->collDiscountCodes->remove($pos);
            if (null === $this->discountCodesScheduledForDeletion) {
                $this->discountCodesScheduledForDeletion = clone $this->collDiscountCodes;
                $this->discountCodesScheduledForDeletion->clear();
            }
            $this->discountCodesScheduledForDeletion[]= clone $discountCode;
            $discountCode->setDiscount(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aOrder) {
            $this->aOrder->removeDiscount($this);
        }
        if (null !== $this->aOrderItem) {
            $this->aOrderItem->removeDiscount($this);
        }
        if (null !== $this->aExpense) {
            $this->aExpense->removeDiscount($this);
        }
        if (null !== $this->aOption) {
            $this->aOption->removeDiscount($this);
        }
        $this->id_sales_discount = null;
        $this->fk_sales_order = null;
        $this->fk_sales_order_item = null;
        $this->fk_sales_expense = null;
        $this->fk_sales_order_item_option = null;
        $this->name = null;
        $this->description = null;
        $this->display_name = null;
        $this->scope = null;
        $this->action = null;
        $this->conditions = null;
        $this->amount = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
            if ($this->collDiscountCodes) {
                foreach ($this->collDiscountCodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collDiscountCodes = null;
        $this->aOrder = null;
        $this->aOrderItem = null;
        $this->aExpense = null;
        $this->aOption = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySalesDiscountTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpySalesDiscount The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpySalesDiscountTableMap::COL_UPDATED_AT] = true;

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
