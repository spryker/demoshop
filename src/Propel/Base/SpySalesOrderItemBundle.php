<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpySalesOrderItem as ChildSpySalesOrderItem;
use Propel\SpySalesOrderItemBundle as ChildSpySalesOrderItemBundle;
use Propel\SpySalesOrderItemBundleItem as ChildSpySalesOrderItemBundleItem;
use Propel\SpySalesOrderItemBundleItemQuery as ChildSpySalesOrderItemBundleItemQuery;
use Propel\SpySalesOrderItemBundleQuery as ChildSpySalesOrderItemBundleQuery;
use Propel\SpySalesOrderItemQuery as ChildSpySalesOrderItemQuery;
use Propel\Map\SpySalesOrderItemBundleTableMap;
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
 * Base class that represents a row from the 'spy_sales_order_item_bundle' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySalesOrderItemBundle extends SpySalesOrderItemBundle implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySalesOrderItemBundleTableMap';


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
     * The value for the id_sales_order_item_bundle field.
     * @var        int
     */
    protected $id_sales_order_item_bundle;

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
     * The value for the bundle_type field.
     * @var        int
     */
    protected $bundle_type;

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
     * @var        ObjectCollection|ChildSpySalesOrderItem[] Collection to store aggregation of ChildSpySalesOrderItem objects.
     */
    protected $collSalesOrderItems;
    protected $collSalesOrderItemsPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderItemBundleItem[] Collection to store aggregation of ChildSpySalesOrderItemBundleItem objects.
     */
    protected $collSalesOrderItemBundleItems;
    protected $collSalesOrderItemBundleItemsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderItem[]
     */
    protected $salesOrderItemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderItemBundleItem[]
     */
    protected $salesOrderItemBundleItemsScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpySalesOrderItemBundle object.
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
     * Compares this with another <code>SpySalesOrderItemBundle</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySalesOrderItemBundle</code>, delegates to
     * <code>equals(SpySalesOrderItemBundle)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpySalesOrderItemBundle The current object, for fluid interface
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
     * Get the [id_sales_order_item_bundle] column value.
     *
     * @return int
     */
    public function getIdSalesOrderItemBundle()
    {
        return $this->id_sales_order_item_bundle;
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
     * Get the [bundle_type] column value.
     *
     * @return string
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getBundleType()
    {
        if (null === $this->bundle_type) {
            return null;
        }
        $valueSet = SpySalesOrderItemBundleTableMap::getValueSet(SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE);
        if (!isset($valueSet[$this->bundle_type])) {
            throw new PropelException('Unknown stored enum key: ' . $this->bundle_type);
        }

        return $valueSet[$this->bundle_type];
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
     * Set the value of [id_sales_order_item_bundle] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setIdSalesOrderItemBundle($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_item_bundle !== $v) {
            $this->id_sales_order_item_bundle = $v;
            $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE] = true;
        }

        return $this;
    } // setIdSalesOrderItemBundle()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [sku] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_SKU] = true;
        }

        return $this;
    } // setSku()

    /**
     * Set the value of [gross_price] column.
     * /price for one unit including tax, without shipping, coupons/
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setGrossPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->gross_price !== $v) {
            $this->gross_price = $v;
            $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_GROSS_PRICE] = true;
        }

        return $this;
    } // setGrossPrice()

    /**
     * Set the value of [price_to_pay] column.
     * /value that the customer has to pay./
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setPriceToPay($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->price_to_pay !== $v) {
            $this->price_to_pay = $v;
            $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_PRICE_TO_PAY] = true;
        }

        return $this;
    } // setPriceToPay()

    /**
     * Set the value of [tax_percentage] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setTaxPercentage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tax_percentage !== $v) {
            $this->tax_percentage = $v;
            $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_TAX_PERCENTAGE] = true;
        }

        return $this;
    } // setTaxPercentage()

    /**
     * Set the value of [bundle_type] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setBundleType($v)
    {
        if ($v !== null) {
            $valueSet = SpySalesOrderItemBundleTableMap::getValueSet(SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->bundle_type !== $v) {
            $this->bundle_type = $v;
            $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE] = true;
        }

        return $this;
    } // setBundleType()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('IdSalesOrderItemBundle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sales_order_item_bundle = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('Sku', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sku = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('GrossPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gross_price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('PriceToPay', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price_to_pay = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('TaxPercentage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tax_percentage = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('BundleType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bundle_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpySalesOrderItemBundleTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = SpySalesOrderItemBundleTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySalesOrderItemBundle'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderItemBundleTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySalesOrderItemBundleQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSalesOrderItems = null;

            $this->collSalesOrderItemBundleItems = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySalesOrderItemBundle::setDeleted()
     * @see SpySalesOrderItemBundle::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemBundleTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySalesOrderItemBundleQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemBundleTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_UPDATED_AT)) {
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
                SpySalesOrderItemBundleTableMap::addInstanceToPool($this);
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

            if ($this->salesOrderItemsScheduledForDeletion !== null) {
                if (!$this->salesOrderItemsScheduledForDeletion->isEmpty()) {
                    foreach ($this->salesOrderItemsScheduledForDeletion as $salesOrderItem) {
                        // need to save related object because we set the relation to null
                        $salesOrderItem->save($con);
                    }
                    $this->salesOrderItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSalesOrderItems !== null) {
                foreach ($this->collSalesOrderItems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesOrderItemBundleItemsScheduledForDeletion !== null) {
                if (!$this->salesOrderItemBundleItemsScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderItemBundleItemQuery::create()
                        ->filterByPrimaryKeys($this->salesOrderItemBundleItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->salesOrderItemBundleItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSalesOrderItemBundleItems !== null) {
                foreach ($this->collSalesOrderItemBundleItems as $referrerFK) {
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

        $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE] = true;
        if (null !== $this->id_sales_order_item_bundle) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE)) {
            $modifiedColumns[':p' . $index++]  = 'id_sales_order_item_bundle';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_SKU)) {
            $modifiedColumns[':p' . $index++]  = 'sku';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_GROSS_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'gross_price';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_PRICE_TO_PAY)) {
            $modifiedColumns[':p' . $index++]  = 'price_to_pay';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_TAX_PERCENTAGE)) {
            $modifiedColumns[':p' . $index++]  = 'tax_percentage';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'bundle_type';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_sales_order_item_bundle (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_sales_order_item_bundle':
                        $stmt->bindValue($identifier, $this->id_sales_order_item_bundle, PDO::PARAM_INT);
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
                        $stmt->bindValue($identifier, $this->tax_percentage, PDO::PARAM_STR);
                        break;
                    case 'bundle_type':
                        $stmt->bindValue($identifier, $this->bundle_type, PDO::PARAM_INT);
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
            $pk = $con->lastInsertId('spy_sales_order_item_bundle_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSalesOrderItemBundle($pk);

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
        $pos = SpySalesOrderItemBundleTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSalesOrderItemBundle();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getSku();
                break;
            case 3:
                return $this->getGrossPrice();
                break;
            case 4:
                return $this->getPriceToPay();
                break;
            case 5:
                return $this->getTaxPercentage();
                break;
            case 6:
                return $this->getBundleType();
                break;
            case 7:
                return $this->getCreatedAt();
                break;
            case 8:
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

        if (isset($alreadyDumpedObjects['SpySalesOrderItemBundle'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySalesOrderItemBundle'][$this->hashCode()] = true;
        $keys = SpySalesOrderItemBundleTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrderItemBundle(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getSku(),
            $keys[3] => $this->getGrossPrice(),
            $keys[4] => $this->getPriceToPay(),
            $keys[5] => $this->getTaxPercentage(),
            $keys[6] => $this->getBundleType(),
            $keys[7] => $this->getCreatedAt(),
            $keys[8] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[7]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[7]];
            $result[$keys[7]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[8]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[8]];
            $result[$keys[8]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSalesOrderItems) {

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

                $result[$key] = $this->collSalesOrderItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderItemBundleItems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderItemBundleItems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_item_bundle_items';
                        break;
                    default:
                        $key = 'SpySalesOrderItemBundleItems';
                }

                $result[$key] = $this->collSalesOrderItemBundleItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpySalesOrderItemBundle
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySalesOrderItemBundleTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySalesOrderItemBundle
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdSalesOrderItemBundle($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setSku($value);
                break;
            case 3:
                $this->setGrossPrice($value);
                break;
            case 4:
                $this->setPriceToPay($value);
                break;
            case 5:
                $this->setTaxPercentage($value);
                break;
            case 6:
                $valueSet = SpySalesOrderItemBundleTableMap::getValueSet(SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setBundleType($value);
                break;
            case 7:
                $this->setCreatedAt($value);
                break;
            case 8:
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
        $keys = SpySalesOrderItemBundleTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdSalesOrderItemBundle($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSku($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setGrossPrice($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPriceToPay($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTaxPercentage($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setBundleType($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCreatedAt($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setUpdatedAt($arr[$keys[8]]);
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
     * @return $this|\Propel\SpySalesOrderItemBundle The current object, for fluid interface
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
        $criteria = new Criteria(SpySalesOrderItemBundleTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE, $this->id_sales_order_item_bundle);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_NAME)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_SKU)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_SKU, $this->sku);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_GROSS_PRICE)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_GROSS_PRICE, $this->gross_price);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_PRICE_TO_PAY)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_PRICE_TO_PAY, $this->price_to_pay);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_TAX_PERCENTAGE)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_TAX_PERCENTAGE, $this->tax_percentage);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE, $this->bundle_type);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_CREATED_AT)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpySalesOrderItemBundleTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpySalesOrderItemBundleQuery::create();
        $criteria->add(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE, $this->id_sales_order_item_bundle);

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
        $validPk = null !== $this->getIdSalesOrderItemBundle();

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
        return $this->getIdSalesOrderItemBundle();
    }

    /**
     * Generic method to set the primary key (id_sales_order_item_bundle column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesOrderItemBundle($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdSalesOrderItemBundle();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpySalesOrderItemBundle (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setSku($this->getSku());
        $copyObj->setGrossPrice($this->getGrossPrice());
        $copyObj->setPriceToPay($this->getPriceToPay());
        $copyObj->setTaxPercentage($this->getTaxPercentage());
        $copyObj->setBundleType($this->getBundleType());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSalesOrderItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesOrderItemBundleItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderItemBundleItem($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesOrderItemBundle(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpySalesOrderItemBundle Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('SalesOrderItem' == $relationName) {
            return $this->initSalesOrderItems();
        }
        if ('SalesOrderItemBundleItem' == $relationName) {
            return $this->initSalesOrderItemBundleItems();
        }
    }

    /**
     * Clears out the collSalesOrderItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSalesOrderItems()
     */
    public function clearSalesOrderItems()
    {
        $this->collSalesOrderItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSalesOrderItems collection loaded partially.
     */
    public function resetPartialSalesOrderItems($v = true)
    {
        $this->collSalesOrderItemsPartial = $v;
    }

    /**
     * Initializes the collSalesOrderItems collection.
     *
     * By default this just sets the collSalesOrderItems collection to an empty array (like clearcollSalesOrderItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderItems($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderItems && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderItems = new ObjectCollection();
        $this->collSalesOrderItems->setModel('\Propel\SpySalesOrderItem');
    }

    /**
     * Gets an array of ChildSpySalesOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItemBundle is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     * @throws PropelException
     */
    public function getSalesOrderItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderItemsPartial && !$this->isNew();
        if (null === $this->collSalesOrderItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderItems) {
                // return empty collection
                $this->initSalesOrderItems();
            } else {
                $collSalesOrderItems = ChildSpySalesOrderItemQuery::create(null, $criteria)
                    ->filterBySalesOrderItemBundle($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderItemsPartial && count($collSalesOrderItems)) {
                        $this->initSalesOrderItems(false);

                        foreach ($collSalesOrderItems as $obj) {
                            if (false == $this->collSalesOrderItems->contains($obj)) {
                                $this->collSalesOrderItems->append($obj);
                            }
                        }

                        $this->collSalesOrderItemsPartial = true;
                    }

                    return $collSalesOrderItems;
                }

                if ($partial && $this->collSalesOrderItems) {
                    foreach ($this->collSalesOrderItems as $obj) {
                        if ($obj->isNew()) {
                            $collSalesOrderItems[] = $obj;
                        }
                    }
                }

                $this->collSalesOrderItems = $collSalesOrderItems;
                $this->collSalesOrderItemsPartial = false;
            }
        }

        return $this->collSalesOrderItems;
    }

    /**
     * Sets a collection of ChildSpySalesOrderItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $salesOrderItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setSalesOrderItems(Collection $salesOrderItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderItem[] $salesOrderItemsToDelete */
        $salesOrderItemsToDelete = $this->getSalesOrderItems(new Criteria(), $con)->diff($salesOrderItems);


        $this->salesOrderItemsScheduledForDeletion = $salesOrderItemsToDelete;

        foreach ($salesOrderItemsToDelete as $salesOrderItemRemoved) {
            $salesOrderItemRemoved->setSalesOrderItemBundle(null);
        }

        $this->collSalesOrderItems = null;
        foreach ($salesOrderItems as $salesOrderItem) {
            $this->addSalesOrderItem($salesOrderItem);
        }

        $this->collSalesOrderItems = $salesOrderItems;
        $this->collSalesOrderItemsPartial = false;

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
    public function countSalesOrderItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderItemsPartial && !$this->isNew();
        if (null === $this->collSalesOrderItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSalesOrderItems());
            }

            $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySalesOrderItemBundle($this)
                ->count($con);
        }

        return count($this->collSalesOrderItems);
    }

    /**
     * Method called to associate a ChildSpySalesOrderItem object to this object
     * through the ChildSpySalesOrderItem foreign key attribute.
     *
     * @param  ChildSpySalesOrderItem $l ChildSpySalesOrderItem
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function addSalesOrderItem(ChildSpySalesOrderItem $l)
    {
        if ($this->collSalesOrderItems === null) {
            $this->initSalesOrderItems();
            $this->collSalesOrderItemsPartial = true;
        }

        if (!$this->collSalesOrderItems->contains($l)) {
            $this->doAddSalesOrderItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderItem $salesOrderItem The ChildSpySalesOrderItem object to add.
     */
    protected function doAddSalesOrderItem(ChildSpySalesOrderItem $salesOrderItem)
    {
        $this->collSalesOrderItems[]= $salesOrderItem;
        $salesOrderItem->setSalesOrderItemBundle($this);
    }

    /**
     * @param  ChildSpySalesOrderItem $salesOrderItem The ChildSpySalesOrderItem object to remove.
     * @return $this|ChildSpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function removeSalesOrderItem(ChildSpySalesOrderItem $salesOrderItem)
    {
        if ($this->getSalesOrderItems()->contains($salesOrderItem)) {
            $pos = $this->collSalesOrderItems->search($salesOrderItem);
            $this->collSalesOrderItems->remove($pos);
            if (null === $this->salesOrderItemsScheduledForDeletion) {
                $this->salesOrderItemsScheduledForDeletion = clone $this->collSalesOrderItems;
                $this->salesOrderItemsScheduledForDeletion->clear();
            }
            $this->salesOrderItemsScheduledForDeletion[]= $salesOrderItem;
            $salesOrderItem->setSalesOrderItemBundle(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItemBundle is new, it will return
     * an empty collection; or if this SpySalesOrderItemBundle has previously
     * been saved, it will retrieve related SalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItemBundle.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSalesOrderItemsJoinSpyRefund(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('SpyRefund', $joinBehavior);

        return $this->getSalesOrderItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItemBundle is new, it will return
     * an empty collection; or if this SpySalesOrderItemBundle has previously
     * been saved, it will retrieve related SalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItemBundle.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSalesOrderItemsJoinOrder(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Order', $joinBehavior);

        return $this->getSalesOrderItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItemBundle is new, it will return
     * an empty collection; or if this SpySalesOrderItemBundle has previously
     * been saved, it will retrieve related SalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItemBundle.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSalesOrderItemsJoinState(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('State', $joinBehavior);

        return $this->getSalesOrderItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderItemBundle is new, it will return
     * an empty collection; or if this SpySalesOrderItemBundle has previously
     * been saved, it will retrieve related SalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderItemBundle.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSalesOrderItemsJoinProcess(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Process', $joinBehavior);

        return $this->getSalesOrderItems($query, $con);
    }

    /**
     * Clears out the collSalesOrderItemBundleItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSalesOrderItemBundleItems()
     */
    public function clearSalesOrderItemBundleItems()
    {
        $this->collSalesOrderItemBundleItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSalesOrderItemBundleItems collection loaded partially.
     */
    public function resetPartialSalesOrderItemBundleItems($v = true)
    {
        $this->collSalesOrderItemBundleItemsPartial = $v;
    }

    /**
     * Initializes the collSalesOrderItemBundleItems collection.
     *
     * By default this just sets the collSalesOrderItemBundleItems collection to an empty array (like clearcollSalesOrderItemBundleItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderItemBundleItems($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderItemBundleItems && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderItemBundleItems = new ObjectCollection();
        $this->collSalesOrderItemBundleItems->setModel('\Propel\SpySalesOrderItemBundleItem');
    }

    /**
     * Gets an array of ChildSpySalesOrderItemBundleItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderItemBundle is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderItemBundleItem[] List of ChildSpySalesOrderItemBundleItem objects
     * @throws PropelException
     */
    public function getSalesOrderItemBundleItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderItemBundleItemsPartial && !$this->isNew();
        if (null === $this->collSalesOrderItemBundleItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderItemBundleItems) {
                // return empty collection
                $this->initSalesOrderItemBundleItems();
            } else {
                $collSalesOrderItemBundleItems = ChildSpySalesOrderItemBundleItemQuery::create(null, $criteria)
                    ->filterBySalesOrderItemBundle($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderItemBundleItemsPartial && count($collSalesOrderItemBundleItems)) {
                        $this->initSalesOrderItemBundleItems(false);

                        foreach ($collSalesOrderItemBundleItems as $obj) {
                            if (false == $this->collSalesOrderItemBundleItems->contains($obj)) {
                                $this->collSalesOrderItemBundleItems->append($obj);
                            }
                        }

                        $this->collSalesOrderItemBundleItemsPartial = true;
                    }

                    return $collSalesOrderItemBundleItems;
                }

                if ($partial && $this->collSalesOrderItemBundleItems) {
                    foreach ($this->collSalesOrderItemBundleItems as $obj) {
                        if ($obj->isNew()) {
                            $collSalesOrderItemBundleItems[] = $obj;
                        }
                    }
                }

                $this->collSalesOrderItemBundleItems = $collSalesOrderItemBundleItems;
                $this->collSalesOrderItemBundleItemsPartial = false;
            }
        }

        return $this->collSalesOrderItemBundleItems;
    }

    /**
     * Sets a collection of ChildSpySalesOrderItemBundleItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $salesOrderItemBundleItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function setSalesOrderItemBundleItems(Collection $salesOrderItemBundleItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderItemBundleItem[] $salesOrderItemBundleItemsToDelete */
        $salesOrderItemBundleItemsToDelete = $this->getSalesOrderItemBundleItems(new Criteria(), $con)->diff($salesOrderItemBundleItems);


        $this->salesOrderItemBundleItemsScheduledForDeletion = $salesOrderItemBundleItemsToDelete;

        foreach ($salesOrderItemBundleItemsToDelete as $salesOrderItemBundleItemRemoved) {
            $salesOrderItemBundleItemRemoved->setSalesOrderItemBundle(null);
        }

        $this->collSalesOrderItemBundleItems = null;
        foreach ($salesOrderItemBundleItems as $salesOrderItemBundleItem) {
            $this->addSalesOrderItemBundleItem($salesOrderItemBundleItem);
        }

        $this->collSalesOrderItemBundleItems = $salesOrderItemBundleItems;
        $this->collSalesOrderItemBundleItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySalesOrderItemBundleItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderItemBundleItem objects.
     * @throws PropelException
     */
    public function countSalesOrderItemBundleItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderItemBundleItemsPartial && !$this->isNew();
        if (null === $this->collSalesOrderItemBundleItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderItemBundleItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSalesOrderItemBundleItems());
            }

            $query = ChildSpySalesOrderItemBundleItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySalesOrderItemBundle($this)
                ->count($con);
        }

        return count($this->collSalesOrderItemBundleItems);
    }

    /**
     * Method called to associate a ChildSpySalesOrderItemBundleItem object to this object
     * through the ChildSpySalesOrderItemBundleItem foreign key attribute.
     *
     * @param  ChildSpySalesOrderItemBundleItem $l ChildSpySalesOrderItemBundleItem
     * @return $this|\Propel\SpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function addSalesOrderItemBundleItem(ChildSpySalesOrderItemBundleItem $l)
    {
        if ($this->collSalesOrderItemBundleItems === null) {
            $this->initSalesOrderItemBundleItems();
            $this->collSalesOrderItemBundleItemsPartial = true;
        }

        if (!$this->collSalesOrderItemBundleItems->contains($l)) {
            $this->doAddSalesOrderItemBundleItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderItemBundleItem $salesOrderItemBundleItem The ChildSpySalesOrderItemBundleItem object to add.
     */
    protected function doAddSalesOrderItemBundleItem(ChildSpySalesOrderItemBundleItem $salesOrderItemBundleItem)
    {
        $this->collSalesOrderItemBundleItems[]= $salesOrderItemBundleItem;
        $salesOrderItemBundleItem->setSalesOrderItemBundle($this);
    }

    /**
     * @param  ChildSpySalesOrderItemBundleItem $salesOrderItemBundleItem The ChildSpySalesOrderItemBundleItem object to remove.
     * @return $this|ChildSpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function removeSalesOrderItemBundleItem(ChildSpySalesOrderItemBundleItem $salesOrderItemBundleItem)
    {
        if ($this->getSalesOrderItemBundleItems()->contains($salesOrderItemBundleItem)) {
            $pos = $this->collSalesOrderItemBundleItems->search($salesOrderItemBundleItem);
            $this->collSalesOrderItemBundleItems->remove($pos);
            if (null === $this->salesOrderItemBundleItemsScheduledForDeletion) {
                $this->salesOrderItemBundleItemsScheduledForDeletion = clone $this->collSalesOrderItemBundleItems;
                $this->salesOrderItemBundleItemsScheduledForDeletion->clear();
            }
            $this->salesOrderItemBundleItemsScheduledForDeletion[]= clone $salesOrderItemBundleItem;
            $salesOrderItemBundleItem->setSalesOrderItemBundle(null);
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
        $this->id_sales_order_item_bundle = null;
        $this->name = null;
        $this->sku = null;
        $this->gross_price = null;
        $this->price_to_pay = null;
        $this->tax_percentage = null;
        $this->bundle_type = null;
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
            if ($this->collSalesOrderItems) {
                foreach ($this->collSalesOrderItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesOrderItemBundleItems) {
                foreach ($this->collSalesOrderItemBundleItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSalesOrderItems = null;
        $this->collSalesOrderItemBundleItems = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySalesOrderItemBundleTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpySalesOrderItemBundle The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpySalesOrderItemBundleTableMap::COL_UPDATED_AT] = true;

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
