<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyRefund as ChildSpyRefund;
use Propel\SpyRefundQuery as ChildSpyRefundQuery;
use Propel\SpySalesExpense as ChildSpySalesExpense;
use Propel\SpySalesExpenseQuery as ChildSpySalesExpenseQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderItem as ChildSpySalesOrderItem;
use Propel\SpySalesOrderItemQuery as ChildSpySalesOrderItemQuery;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\Map\SpyRefundTableMap;
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
 * Base class that represents a row from the 'spy_refund' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyRefund extends SpyRefund implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyRefundTableMap';


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
     * The value for the id_refund field.
     * @var        int
     */
    protected $id_refund;

    /**
     * The value for the fk_sales_order field.
     * @var        int
     */
    protected $fk_sales_order;

    /**
     * The value for the amount field.
     * @var        int
     */
    protected $amount;

    /**
     * The value for the adjustment_fee field.
     * @var        int
     */
    protected $adjustment_fee;

    /**
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the created_at field.
     * @var        \DateTime
     */
    protected $created_at;

    /**
     * @var        ChildSpySalesOrder
     */
    protected $aSpySalesOrder;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderItem[] Collection to store aggregation of ChildSpySalesOrderItem objects.
     */
    protected $collSpySalesOrderItems;
    protected $collSpySalesOrderItemsPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesExpense[] Collection to store aggregation of ChildSpySalesExpense objects.
     */
    protected $collSpySalesExpenses;
    protected $collSpySalesExpensesPartial;

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
    protected $spySalesOrderItemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesExpense[]
     */
    protected $spySalesExpensesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyRefund object.
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
     * Compares this with another <code>SpyRefund</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyRefund</code>, delegates to
     * <code>equals(SpyRefund)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyRefund The current object, for fluid interface
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
     * Get the [id_refund] column value.
     *
     * @return int
     */
    public function getIdRefund()
    {
        return $this->id_refund;
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
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [adjustment_fee] column value.
     *
     * @return int
     */
    public function getAdjustmentFee()
    {
        return $this->adjustment_fee;
    }

    /**
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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
     * Set the value of [id_refund] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function setIdRefund($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_refund !== $v) {
            $this->id_refund = $v;
            $this->modifiedColumns[SpyRefundTableMap::COL_ID_REFUND] = true;
        }

        return $this;
    } // setIdRefund()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[SpyRefundTableMap::COL_FK_SALES_ORDER] = true;
        }

        if ($this->aSpySalesOrder !== null && $this->aSpySalesOrder->getIdSalesOrder() !== $v) {
            $this->aSpySalesOrder = null;
        }

        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[SpyRefundTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [adjustment_fee] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function setAdjustmentFee($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->adjustment_fee !== $v) {
            $this->adjustment_fee = $v;
            $this->modifiedColumns[SpyRefundTableMap::COL_ADJUSTMENT_FEE] = true;
        }

        return $this;
    } // setAdjustmentFee()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[SpyRefundTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyRefundTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyRefundTableMap::translateFieldName('IdRefund', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_refund = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyRefundTableMap::translateFieldName('FkSalesOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyRefundTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyRefundTableMap::translateFieldName('AdjustmentFee', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adjustment_fee = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyRefundTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyRefundTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = SpyRefundTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyRefund'), 0, $e);
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
        if ($this->aSpySalesOrder !== null && $this->fk_sales_order !== $this->aSpySalesOrder->getIdSalesOrder()) {
            $this->aSpySalesOrder = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyRefundTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyRefundQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpySalesOrder = null;
            $this->collSpySalesOrderItems = null;

            $this->collSpySalesExpenses = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyRefund::setDeleted()
     * @see SpyRefund::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRefundTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyRefundQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRefundTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyRefundTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SpyRefundTableMap::addInstanceToPool($this);
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

            if ($this->aSpySalesOrder !== null) {
                if ($this->aSpySalesOrder->isModified() || $this->aSpySalesOrder->isNew()) {
                    $affectedRows += $this->aSpySalesOrder->save($con);
                }
                $this->setSpySalesOrder($this->aSpySalesOrder);
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

            if ($this->spySalesOrderItemsScheduledForDeletion !== null) {
                if (!$this->spySalesOrderItemsScheduledForDeletion->isEmpty()) {
                    foreach ($this->spySalesOrderItemsScheduledForDeletion as $spySalesOrderItem) {
                        // need to save related object because we set the relation to null
                        $spySalesOrderItem->save($con);
                    }
                    $this->spySalesOrderItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSpySalesOrderItems !== null) {
                foreach ($this->collSpySalesOrderItems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spySalesExpensesScheduledForDeletion !== null) {
                if (!$this->spySalesExpensesScheduledForDeletion->isEmpty()) {
                    foreach ($this->spySalesExpensesScheduledForDeletion as $spySalesExpense) {
                        // need to save related object because we set the relation to null
                        $spySalesExpense->save($con);
                    }
                    $this->spySalesExpensesScheduledForDeletion = null;
                }
            }

            if ($this->collSpySalesExpenses !== null) {
                foreach ($this->collSpySalesExpenses as $referrerFK) {
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

        $this->modifiedColumns[SpyRefundTableMap::COL_ID_REFUND] = true;
        if (null !== $this->id_refund) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyRefundTableMap::COL_ID_REFUND . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyRefundTableMap::COL_ID_REFUND)) {
            $modifiedColumns[':p' . $index++]  = 'id_refund';
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order';
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_ADJUSTMENT_FEE)) {
            $modifiedColumns[':p' . $index++]  = 'adjustment_fee';
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_refund (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_refund':
                        $stmt->bindValue($identifier, $this->id_refund, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case 'adjustment_fee':
                        $stmt->bindValue($identifier, $this->adjustment_fee, PDO::PARAM_INT);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_refund_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdRefund($pk);

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
        $pos = SpyRefundTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdRefund();
                break;
            case 1:
                return $this->getFkSalesOrder();
                break;
            case 2:
                return $this->getAmount();
                break;
            case 3:
                return $this->getAdjustmentFee();
                break;
            case 4:
                return $this->getComment();
                break;
            case 5:
                return $this->getCreatedAt();
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

        if (isset($alreadyDumpedObjects['SpyRefund'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyRefund'][$this->hashCode()] = true;
        $keys = SpyRefundTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdRefund(),
            $keys[1] => $this->getFkSalesOrder(),
            $keys[2] => $this->getAmount(),
            $keys[3] => $this->getAdjustmentFee(),
            $keys[4] => $this->getComment(),
            $keys[5] => $this->getCreatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[5]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[5]];
            $result[$keys[5]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpySalesOrder) {

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

                $result[$key] = $this->aSpySalesOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpySalesOrderItems) {

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

                $result[$key] = $this->collSpySalesOrderItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpySalesExpenses) {

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

                $result[$key] = $this->collSpySalesExpenses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyRefund
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyRefundTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyRefund
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdRefund($value);
                break;
            case 1:
                $this->setFkSalesOrder($value);
                break;
            case 2:
                $this->setAmount($value);
                break;
            case 3:
                $this->setAdjustmentFee($value);
                break;
            case 4:
                $this->setComment($value);
                break;
            case 5:
                $this->setCreatedAt($value);
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
        $keys = SpyRefundTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdRefund($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkSalesOrder($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAmount($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAdjustmentFee($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setComment($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCreatedAt($arr[$keys[5]]);
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
     * @return $this|\Propel\SpyRefund The current object, for fluid interface
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
        $criteria = new Criteria(SpyRefundTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyRefundTableMap::COL_ID_REFUND)) {
            $criteria->add(SpyRefundTableMap::COL_ID_REFUND, $this->id_refund);
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_FK_SALES_ORDER)) {
            $criteria->add(SpyRefundTableMap::COL_FK_SALES_ORDER, $this->fk_sales_order);
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_AMOUNT)) {
            $criteria->add(SpyRefundTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_ADJUSTMENT_FEE)) {
            $criteria->add(SpyRefundTableMap::COL_ADJUSTMENT_FEE, $this->adjustment_fee);
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_COMMENT)) {
            $criteria->add(SpyRefundTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(SpyRefundTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyRefundTableMap::COL_CREATED_AT, $this->created_at);
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
        $criteria = ChildSpyRefundQuery::create();
        $criteria->add(SpyRefundTableMap::COL_ID_REFUND, $this->id_refund);

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
        $validPk = null !== $this->getIdRefund();

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
        return $this->getIdRefund();
    }

    /**
     * Generic method to set the primary key (id_refund column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdRefund($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdRefund();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyRefund (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setAdjustmentFee($this->getAdjustmentFee());
        $copyObj->setComment($this->getComment());
        $copyObj->setCreatedAt($this->getCreatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpySalesOrderItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpySalesOrderItem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpySalesExpenses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpySalesExpense($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdRefund(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyRefund Clone of current object.
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
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpySalesOrder(ChildSpySalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aSpySalesOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyRefund($this);
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
    public function getSpySalesOrder(ConnectionInterface $con = null)
    {
        if ($this->aSpySalesOrder === null && ($this->fk_sales_order !== null)) {
            $this->aSpySalesOrder = ChildSpySalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpySalesOrder->addSpyRefunds($this);
             */
        }

        return $this->aSpySalesOrder;
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
        if ('SpySalesOrderItem' == $relationName) {
            return $this->initSpySalesOrderItems();
        }
        if ('SpySalesExpense' == $relationName) {
            return $this->initSpySalesExpenses();
        }
    }

    /**
     * Clears out the collSpySalesOrderItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpySalesOrderItems()
     */
    public function clearSpySalesOrderItems()
    {
        $this->collSpySalesOrderItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpySalesOrderItems collection loaded partially.
     */
    public function resetPartialSpySalesOrderItems($v = true)
    {
        $this->collSpySalesOrderItemsPartial = $v;
    }

    /**
     * Initializes the collSpySalesOrderItems collection.
     *
     * By default this just sets the collSpySalesOrderItems collection to an empty array (like clearcollSpySalesOrderItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpySalesOrderItems($overrideExisting = true)
    {
        if (null !== $this->collSpySalesOrderItems && !$overrideExisting) {
            return;
        }
        $this->collSpySalesOrderItems = new ObjectCollection();
        $this->collSpySalesOrderItems->setModel('\Propel\SpySalesOrderItem');
    }

    /**
     * Gets an array of ChildSpySalesOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyRefund is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     * @throws PropelException
     */
    public function getSpySalesOrderItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpySalesOrderItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpySalesOrderItems) {
                // return empty collection
                $this->initSpySalesOrderItems();
            } else {
                $collSpySalesOrderItems = ChildSpySalesOrderItemQuery::create(null, $criteria)
                    ->filterBySpyRefund($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpySalesOrderItemsPartial && count($collSpySalesOrderItems)) {
                        $this->initSpySalesOrderItems(false);

                        foreach ($collSpySalesOrderItems as $obj) {
                            if (false == $this->collSpySalesOrderItems->contains($obj)) {
                                $this->collSpySalesOrderItems->append($obj);
                            }
                        }

                        $this->collSpySalesOrderItemsPartial = true;
                    }

                    return $collSpySalesOrderItems;
                }

                if ($partial && $this->collSpySalesOrderItems) {
                    foreach ($this->collSpySalesOrderItems as $obj) {
                        if ($obj->isNew()) {
                            $collSpySalesOrderItems[] = $obj;
                        }
                    }
                }

                $this->collSpySalesOrderItems = $collSpySalesOrderItems;
                $this->collSpySalesOrderItemsPartial = false;
            }
        }

        return $this->collSpySalesOrderItems;
    }

    /**
     * Sets a collection of ChildSpySalesOrderItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spySalesOrderItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyRefund The current object (for fluent API support)
     */
    public function setSpySalesOrderItems(Collection $spySalesOrderItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderItem[] $spySalesOrderItemsToDelete */
        $spySalesOrderItemsToDelete = $this->getSpySalesOrderItems(new Criteria(), $con)->diff($spySalesOrderItems);


        $this->spySalesOrderItemsScheduledForDeletion = $spySalesOrderItemsToDelete;

        foreach ($spySalesOrderItemsToDelete as $spySalesOrderItemRemoved) {
            $spySalesOrderItemRemoved->setSpyRefund(null);
        }

        $this->collSpySalesOrderItems = null;
        foreach ($spySalesOrderItems as $spySalesOrderItem) {
            $this->addSpySalesOrderItem($spySalesOrderItem);
        }

        $this->collSpySalesOrderItems = $spySalesOrderItems;
        $this->collSpySalesOrderItemsPartial = false;

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
    public function countSpySalesOrderItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpySalesOrderItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpySalesOrderItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpySalesOrderItems());
            }

            $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyRefund($this)
                ->count($con);
        }

        return count($this->collSpySalesOrderItems);
    }

    /**
     * Method called to associate a ChildSpySalesOrderItem object to this object
     * through the ChildSpySalesOrderItem foreign key attribute.
     *
     * @param  ChildSpySalesOrderItem $l ChildSpySalesOrderItem
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function addSpySalesOrderItem(ChildSpySalesOrderItem $l)
    {
        if ($this->collSpySalesOrderItems === null) {
            $this->initSpySalesOrderItems();
            $this->collSpySalesOrderItemsPartial = true;
        }

        if (!$this->collSpySalesOrderItems->contains($l)) {
            $this->doAddSpySalesOrderItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderItem $spySalesOrderItem The ChildSpySalesOrderItem object to add.
     */
    protected function doAddSpySalesOrderItem(ChildSpySalesOrderItem $spySalesOrderItem)
    {
        $this->collSpySalesOrderItems[]= $spySalesOrderItem;
        $spySalesOrderItem->setSpyRefund($this);
    }

    /**
     * @param  ChildSpySalesOrderItem $spySalesOrderItem The ChildSpySalesOrderItem object to remove.
     * @return $this|ChildSpyRefund The current object (for fluent API support)
     */
    public function removeSpySalesOrderItem(ChildSpySalesOrderItem $spySalesOrderItem)
    {
        if ($this->getSpySalesOrderItems()->contains($spySalesOrderItem)) {
            $pos = $this->collSpySalesOrderItems->search($spySalesOrderItem);
            $this->collSpySalesOrderItems->remove($pos);
            if (null === $this->spySalesOrderItemsScheduledForDeletion) {
                $this->spySalesOrderItemsScheduledForDeletion = clone $this->collSpySalesOrderItems;
                $this->spySalesOrderItemsScheduledForDeletion->clear();
            }
            $this->spySalesOrderItemsScheduledForDeletion[]= $spySalesOrderItem;
            $spySalesOrderItem->setSpyRefund(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyRefund is new, it will return
     * an empty collection; or if this SpyRefund has previously
     * been saved, it will retrieve related SpySalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyRefund.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSpySalesOrderItemsJoinOrder(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Order', $joinBehavior);

        return $this->getSpySalesOrderItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyRefund is new, it will return
     * an empty collection; or if this SpyRefund has previously
     * been saved, it will retrieve related SpySalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyRefund.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSpySalesOrderItemsJoinState(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('State', $joinBehavior);

        return $this->getSpySalesOrderItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyRefund is new, it will return
     * an empty collection; or if this SpyRefund has previously
     * been saved, it will retrieve related SpySalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyRefund.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSpySalesOrderItemsJoinProcess(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Process', $joinBehavior);

        return $this->getSpySalesOrderItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyRefund is new, it will return
     * an empty collection; or if this SpyRefund has previously
     * been saved, it will retrieve related SpySalesOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyRefund.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderItem[] List of ChildSpySalesOrderItem objects
     */
    public function getSpySalesOrderItemsJoinSalesOrderItemBundle(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('SalesOrderItemBundle', $joinBehavior);

        return $this->getSpySalesOrderItems($query, $con);
    }

    /**
     * Clears out the collSpySalesExpenses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpySalesExpenses()
     */
    public function clearSpySalesExpenses()
    {
        $this->collSpySalesExpenses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpySalesExpenses collection loaded partially.
     */
    public function resetPartialSpySalesExpenses($v = true)
    {
        $this->collSpySalesExpensesPartial = $v;
    }

    /**
     * Initializes the collSpySalesExpenses collection.
     *
     * By default this just sets the collSpySalesExpenses collection to an empty array (like clearcollSpySalesExpenses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpySalesExpenses($overrideExisting = true)
    {
        if (null !== $this->collSpySalesExpenses && !$overrideExisting) {
            return;
        }
        $this->collSpySalesExpenses = new ObjectCollection();
        $this->collSpySalesExpenses->setModel('\Propel\SpySalesExpense');
    }

    /**
     * Gets an array of ChildSpySalesExpense objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyRefund is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesExpense[] List of ChildSpySalesExpense objects
     * @throws PropelException
     */
    public function getSpySalesExpenses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesExpensesPartial && !$this->isNew();
        if (null === $this->collSpySalesExpenses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpySalesExpenses) {
                // return empty collection
                $this->initSpySalesExpenses();
            } else {
                $collSpySalesExpenses = ChildSpySalesExpenseQuery::create(null, $criteria)
                    ->filterBySpyRefund($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpySalesExpensesPartial && count($collSpySalesExpenses)) {
                        $this->initSpySalesExpenses(false);

                        foreach ($collSpySalesExpenses as $obj) {
                            if (false == $this->collSpySalesExpenses->contains($obj)) {
                                $this->collSpySalesExpenses->append($obj);
                            }
                        }

                        $this->collSpySalesExpensesPartial = true;
                    }

                    return $collSpySalesExpenses;
                }

                if ($partial && $this->collSpySalesExpenses) {
                    foreach ($this->collSpySalesExpenses as $obj) {
                        if ($obj->isNew()) {
                            $collSpySalesExpenses[] = $obj;
                        }
                    }
                }

                $this->collSpySalesExpenses = $collSpySalesExpenses;
                $this->collSpySalesExpensesPartial = false;
            }
        }

        return $this->collSpySalesExpenses;
    }

    /**
     * Sets a collection of ChildSpySalesExpense objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spySalesExpenses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyRefund The current object (for fluent API support)
     */
    public function setSpySalesExpenses(Collection $spySalesExpenses, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesExpense[] $spySalesExpensesToDelete */
        $spySalesExpensesToDelete = $this->getSpySalesExpenses(new Criteria(), $con)->diff($spySalesExpenses);


        $this->spySalesExpensesScheduledForDeletion = $spySalesExpensesToDelete;

        foreach ($spySalesExpensesToDelete as $spySalesExpenseRemoved) {
            $spySalesExpenseRemoved->setSpyRefund(null);
        }

        $this->collSpySalesExpenses = null;
        foreach ($spySalesExpenses as $spySalesExpense) {
            $this->addSpySalesExpense($spySalesExpense);
        }

        $this->collSpySalesExpenses = $spySalesExpenses;
        $this->collSpySalesExpensesPartial = false;

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
    public function countSpySalesExpenses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesExpensesPartial && !$this->isNew();
        if (null === $this->collSpySalesExpenses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpySalesExpenses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpySalesExpenses());
            }

            $query = ChildSpySalesExpenseQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyRefund($this)
                ->count($con);
        }

        return count($this->collSpySalesExpenses);
    }

    /**
     * Method called to associate a ChildSpySalesExpense object to this object
     * through the ChildSpySalesExpense foreign key attribute.
     *
     * @param  ChildSpySalesExpense $l ChildSpySalesExpense
     * @return $this|\Propel\SpyRefund The current object (for fluent API support)
     */
    public function addSpySalesExpense(ChildSpySalesExpense $l)
    {
        if ($this->collSpySalesExpenses === null) {
            $this->initSpySalesExpenses();
            $this->collSpySalesExpensesPartial = true;
        }

        if (!$this->collSpySalesExpenses->contains($l)) {
            $this->doAddSpySalesExpense($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesExpense $spySalesExpense The ChildSpySalesExpense object to add.
     */
    protected function doAddSpySalesExpense(ChildSpySalesExpense $spySalesExpense)
    {
        $this->collSpySalesExpenses[]= $spySalesExpense;
        $spySalesExpense->setSpyRefund($this);
    }

    /**
     * @param  ChildSpySalesExpense $spySalesExpense The ChildSpySalesExpense object to remove.
     * @return $this|ChildSpyRefund The current object (for fluent API support)
     */
    public function removeSpySalesExpense(ChildSpySalesExpense $spySalesExpense)
    {
        if ($this->getSpySalesExpenses()->contains($spySalesExpense)) {
            $pos = $this->collSpySalesExpenses->search($spySalesExpense);
            $this->collSpySalesExpenses->remove($pos);
            if (null === $this->spySalesExpensesScheduledForDeletion) {
                $this->spySalesExpensesScheduledForDeletion = clone $this->collSpySalesExpenses;
                $this->spySalesExpensesScheduledForDeletion->clear();
            }
            $this->spySalesExpensesScheduledForDeletion[]= $spySalesExpense;
            $spySalesExpense->setSpyRefund(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyRefund is new, it will return
     * an empty collection; or if this SpyRefund has previously
     * been saved, it will retrieve related SpySalesExpenses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyRefund.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesExpense[] List of ChildSpySalesExpense objects
     */
    public function getSpySalesExpensesJoinOrder(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesExpenseQuery::create(null, $criteria);
        $query->joinWith('Order', $joinBehavior);

        return $this->getSpySalesExpenses($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpySalesOrder) {
            $this->aSpySalesOrder->removeSpyRefund($this);
        }
        $this->id_refund = null;
        $this->fk_sales_order = null;
        $this->amount = null;
        $this->adjustment_fee = null;
        $this->comment = null;
        $this->created_at = null;
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
            if ($this->collSpySalesOrderItems) {
                foreach ($this->collSpySalesOrderItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpySalesExpenses) {
                foreach ($this->collSpySalesExpenses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpySalesOrderItems = null;
        $this->collSpySalesExpenses = null;
        $this->aSpySalesOrder = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyRefundTableMap::DEFAULT_STRING_FORMAT);
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
