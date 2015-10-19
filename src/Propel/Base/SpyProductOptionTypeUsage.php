<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProduct as ChildSpyProduct;
use Propel\SpyProductOptionType as ChildSpyProductOptionType;
use Propel\SpyProductOptionTypeQuery as ChildSpyProductOptionTypeQuery;
use Propel\SpyProductOptionTypeUsage as ChildSpyProductOptionTypeUsage;
use Propel\SpyProductOptionTypeUsageExclusion as ChildSpyProductOptionTypeUsageExclusion;
use Propel\SpyProductOptionTypeUsageExclusionQuery as ChildSpyProductOptionTypeUsageExclusionQuery;
use Propel\SpyProductOptionTypeUsageQuery as ChildSpyProductOptionTypeUsageQuery;
use Propel\SpyProductOptionValueUsage as ChildSpyProductOptionValueUsage;
use Propel\SpyProductOptionValueUsageQuery as ChildSpyProductOptionValueUsageQuery;
use Propel\SpyProductQuery as ChildSpyProductQuery;
use Propel\Map\SpyProductOptionTypeUsageTableMap;
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

/**
 * Base class that represents a row from the 'spy_product_option_type_usage' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyProductOptionTypeUsage extends SpyProductOptionTypeUsage implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyProductOptionTypeUsageTableMap';


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
     * The value for the id_product_option_type_usage field.
     * @var        int
     */
    protected $id_product_option_type_usage;

    /**
     * The value for the is_optional field.
     * @var        int
     */
    protected $is_optional;

    /**
     * The value for the sequence field.
     * @var        int
     */
    protected $sequence;

    /**
     * The value for the fk_product field.
     * @var        int
     */
    protected $fk_product;

    /**
     * The value for the fk_product_option_type field.
     * @var        int
     */
    protected $fk_product_option_type;

    /**
     * @var        ChildSpyProduct
     */
    protected $aSpyProduct;

    /**
     * @var        ChildSpyProductOptionType
     */
    protected $aSpyProductOptionType;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionValueUsage[] Collection to store aggregation of ChildSpyProductOptionValueUsage objects.
     */
    protected $collSpyProductOptionValueUsages;
    protected $collSpyProductOptionValueUsagesPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionTypeUsageExclusion[] Collection to store aggregation of ChildSpyProductOptionTypeUsageExclusion objects.
     */
    protected $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA;
    protected $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionTypeUsageExclusion[] Collection to store aggregation of ChildSpyProductOptionTypeUsageExclusion objects.
     */
    protected $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB;
    protected $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionValueUsage[]
     */
    protected $spyProductOptionValueUsagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionTypeUsageExclusion[]
     */
    protected $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionTypeUsageExclusion[]
     */
    protected $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyProductOptionTypeUsage object.
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
     * Compares this with another <code>SpyProductOptionTypeUsage</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyProductOptionTypeUsage</code>, delegates to
     * <code>equals(SpyProductOptionTypeUsage)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyProductOptionTypeUsage The current object, for fluid interface
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
     * Get the [id_product_option_type_usage] column value.
     *
     * @return int
     */
    public function getIdProductOptionTypeUsage()
    {
        return $this->id_product_option_type_usage;
    }

    /**
     * Get the [is_optional] column value.
     *
     * @return int
     */
    public function getIsOptional()
    {
        return $this->is_optional;
    }

    /**
     * Get the [sequence] column value.
     *
     * @return int
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Get the [fk_product] column value.
     *
     * @return int
     */
    public function getFkProduct()
    {
        return $this->fk_product;
    }

    /**
     * Get the [fk_product_option_type] column value.
     *
     * @return int
     */
    public function getFkProductOptionType()
    {
        return $this->fk_product_option_type;
    }

    /**
     * Set the value of [id_product_option_type_usage] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setIdProductOptionTypeUsage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_product_option_type_usage !== $v) {
            $this->id_product_option_type_usage = $v;
            $this->modifiedColumns[SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE] = true;
        }

        return $this;
    } // setIdProductOptionTypeUsage()

    /**
     * Set the value of [is_optional] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setIsOptional($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->is_optional !== $v) {
            $this->is_optional = $v;
            $this->modifiedColumns[SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL] = true;
        }

        return $this;
    } // setIsOptional()

    /**
     * Set the value of [sequence] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setSequence($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sequence !== $v) {
            $this->sequence = $v;
            $this->modifiedColumns[SpyProductOptionTypeUsageTableMap::COL_SEQUENCE] = true;
        }

        return $this;
    } // setSequence()

    /**
     * Set the value of [fk_product] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setFkProduct($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_product !== $v) {
            $this->fk_product = $v;
            $this->modifiedColumns[SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT] = true;
        }

        if ($this->aSpyProduct !== null && $this->aSpyProduct->getIdProduct() !== $v) {
            $this->aSpyProduct = null;
        }

        return $this;
    } // setFkProduct()

    /**
     * Set the value of [fk_product_option_type] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setFkProductOptionType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_product_option_type !== $v) {
            $this->fk_product_option_type = $v;
            $this->modifiedColumns[SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE] = true;
        }

        if ($this->aSpyProductOptionType !== null && $this->aSpyProductOptionType->getIdProductOptionType() !== $v) {
            $this->aSpyProductOptionType = null;
        }

        return $this;
    } // setFkProductOptionType()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyProductOptionTypeUsageTableMap::translateFieldName('IdProductOptionTypeUsage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_product_option_type_usage = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyProductOptionTypeUsageTableMap::translateFieldName('IsOptional', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_optional = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyProductOptionTypeUsageTableMap::translateFieldName('Sequence', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sequence = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyProductOptionTypeUsageTableMap::translateFieldName('FkProduct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_product = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyProductOptionTypeUsageTableMap::translateFieldName('FkProductOptionType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_product_option_type = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = SpyProductOptionTypeUsageTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyProductOptionTypeUsage'), 0, $e);
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
        if ($this->aSpyProduct !== null && $this->fk_product !== $this->aSpyProduct->getIdProduct()) {
            $this->aSpyProduct = null;
        }
        if ($this->aSpyProductOptionType !== null && $this->fk_product_option_type !== $this->aSpyProductOptionType->getIdProductOptionType()) {
            $this->aSpyProductOptionType = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyProductOptionTypeUsageQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyProduct = null;
            $this->aSpyProductOptionType = null;
            $this->collSpyProductOptionValueUsages = null;

            $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = null;

            $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyProductOptionTypeUsage::setDeleted()
     * @see SpyProductOptionTypeUsage::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyProductOptionTypeUsageQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
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
                SpyProductOptionTypeUsageTableMap::addInstanceToPool($this);
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

            if ($this->aSpyProduct !== null) {
                if ($this->aSpyProduct->isModified() || $this->aSpyProduct->isNew()) {
                    $affectedRows += $this->aSpyProduct->save($con);
                }
                $this->setSpyProduct($this->aSpyProduct);
            }

            if ($this->aSpyProductOptionType !== null) {
                if ($this->aSpyProductOptionType->isModified() || $this->aSpyProductOptionType->isNew()) {
                    $affectedRows += $this->aSpyProductOptionType->save($con);
                }
                $this->setSpyProductOptionType($this->aSpyProductOptionType);
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

            if ($this->spyProductOptionValueUsagesScheduledForDeletion !== null) {
                if (!$this->spyProductOptionValueUsagesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionValueUsageQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionValueUsagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionValueUsagesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionValueUsages !== null) {
                foreach ($this->collSpyProductOptionValueUsages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion !== null) {
                if (!$this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionTypeUsageExclusionQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA !== null) {
                foreach ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion !== null) {
                if (!$this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionTypeUsageExclusionQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB !== null) {
                foreach ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB as $referrerFK) {
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

        $this->modifiedColumns[SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE)) {
            $modifiedColumns[':p' . $index++]  = 'id_product_option_type_usage';
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL)) {
            $modifiedColumns[':p' . $index++]  = 'is_optional';
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_SEQUENCE)) {
            $modifiedColumns[':p' . $index++]  = 'sequence';
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = 'fk_product';
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_product_option_type';
        }

        $sql = sprintf(
            'INSERT INTO spy_product_option_type_usage (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_product_option_type_usage':
                        $stmt->bindValue($identifier, $this->id_product_option_type_usage, PDO::PARAM_INT);
                        break;
                    case 'is_optional':
                        $stmt->bindValue($identifier, $this->is_optional, PDO::PARAM_INT);
                        break;
                    case 'sequence':
                        $stmt->bindValue($identifier, $this->sequence, PDO::PARAM_INT);
                        break;
                    case 'fk_product':
                        $stmt->bindValue($identifier, $this->fk_product, PDO::PARAM_INT);
                        break;
                    case 'fk_product_option_type':
                        $stmt->bindValue($identifier, $this->fk_product_option_type, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_product_option_type_usage_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdProductOptionTypeUsage($pk);
        }

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
        $pos = SpyProductOptionTypeUsageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdProductOptionTypeUsage();
                break;
            case 1:
                return $this->getIsOptional();
                break;
            case 2:
                return $this->getSequence();
                break;
            case 3:
                return $this->getFkProduct();
                break;
            case 4:
                return $this->getFkProductOptionType();
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

        if (isset($alreadyDumpedObjects['SpyProductOptionTypeUsage'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyProductOptionTypeUsage'][$this->hashCode()] = true;
        $keys = SpyProductOptionTypeUsageTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProductOptionTypeUsage(),
            $keys[1] => $this->getIsOptional(),
            $keys[2] => $this->getSequence(),
            $keys[3] => $this->getFkProduct(),
            $keys[4] => $this->getFkProductOptionType(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyProduct) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProduct';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product';
                        break;
                    default:
                        $key = 'SpyProduct';
                }

                $result[$key] = $this->aSpyProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSpyProductOptionType) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionType';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_type';
                        break;
                    default:
                        $key = 'SpyProductOptionType';
                }

                $result[$key] = $this->aSpyProductOptionType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpyProductOptionValueUsages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionValueUsages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_value_usages';
                        break;
                    default:
                        $key = 'SpyProductOptionValueUsages';
                }

                $result[$key] = $this->collSpyProductOptionValueUsages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionTypeUsageExclusions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_type_usage_exclusions';
                        break;
                    default:
                        $key = 'SpyProductOptionTypeUsageExclusions';
                }

                $result[$key] = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionTypeUsageExclusions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_type_usage_exclusions';
                        break;
                    default:
                        $key = 'SpyProductOptionTypeUsageExclusions';
                }

                $result[$key] = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyProductOptionTypeUsage
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyProductOptionTypeUsageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyProductOptionTypeUsage
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProductOptionTypeUsage($value);
                break;
            case 1:
                $this->setIsOptional($value);
                break;
            case 2:
                $this->setSequence($value);
                break;
            case 3:
                $this->setFkProduct($value);
                break;
            case 4:
                $this->setFkProductOptionType($value);
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
        $keys = SpyProductOptionTypeUsageTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdProductOptionTypeUsage($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIsOptional($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSequence($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkProduct($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFkProductOptionType($arr[$keys[4]]);
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
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object, for fluid interface
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
        $criteria = new Criteria(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE)) {
            $criteria->add(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $this->id_product_option_type_usage);
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL)) {
            $criteria->add(SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL, $this->is_optional);
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_SEQUENCE)) {
            $criteria->add(SpyProductOptionTypeUsageTableMap::COL_SEQUENCE, $this->sequence);
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT)) {
            $criteria->add(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT, $this->fk_product);
        }
        if ($this->isColumnModified(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE)) {
            $criteria->add(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE, $this->fk_product_option_type);
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
        $criteria = ChildSpyProductOptionTypeUsageQuery::create();
        $criteria->add(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, $this->id_product_option_type_usage);

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
        $validPk = null !== $this->getIdProductOptionTypeUsage();

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
        return $this->getIdProductOptionTypeUsage();
    }

    /**
     * Generic method to set the primary key (id_product_option_type_usage column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProductOptionTypeUsage($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdProductOptionTypeUsage();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyProductOptionTypeUsage (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIsOptional($this->getIsOptional());
        $copyObj->setSequence($this->getSequence());
        $copyObj->setFkProduct($this->getFkProduct());
        $copyObj->setFkProductOptionType($this->getFkProductOptionType());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyProductOptionValueUsages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionValueUsage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdProductOptionTypeUsage(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyProductOptionTypeUsage Clone of current object.
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
     * Declares an association between this object and a ChildSpyProduct object.
     *
     * @param  ChildSpyProduct $v
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyProduct(ChildSpyProduct $v = null)
    {
        if ($v === null) {
            $this->setFkProduct(NULL);
        } else {
            $this->setFkProduct($v->getIdProduct());
        }

        $this->aSpyProduct = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyProduct object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProductOptionTypeUsage($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyProduct object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyProduct The associated ChildSpyProduct object.
     * @throws PropelException
     */
    public function getSpyProduct(ConnectionInterface $con = null)
    {
        if ($this->aSpyProduct === null && ($this->fk_product !== null)) {
            $this->aSpyProduct = ChildSpyProductQuery::create()->findPk($this->fk_product, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyProduct->addSpyProductOptionTypeUsages($this);
             */
        }

        return $this->aSpyProduct;
    }

    /**
     * Declares an association between this object and a ChildSpyProductOptionType object.
     *
     * @param  ChildSpyProductOptionType $v
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyProductOptionType(ChildSpyProductOptionType $v = null)
    {
        if ($v === null) {
            $this->setFkProductOptionType(NULL);
        } else {
            $this->setFkProductOptionType($v->getIdProductOptionType());
        }

        $this->aSpyProductOptionType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyProductOptionType object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProductOptionTypeUsage($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyProductOptionType object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyProductOptionType The associated ChildSpyProductOptionType object.
     * @throws PropelException
     */
    public function getSpyProductOptionType(ConnectionInterface $con = null)
    {
        if ($this->aSpyProductOptionType === null && ($this->fk_product_option_type !== null)) {
            $this->aSpyProductOptionType = ChildSpyProductOptionTypeQuery::create()->findPk($this->fk_product_option_type, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyProductOptionType->addSpyProductOptionTypeUsages($this);
             */
        }

        return $this->aSpyProductOptionType;
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
        if ('SpyProductOptionValueUsage' == $relationName) {
            return $this->initSpyProductOptionValueUsages();
        }
        if ('SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA' == $relationName) {
            return $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA();
        }
        if ('SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB' == $relationName) {
            return $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB();
        }
    }

    /**
     * Clears out the collSpyProductOptionValueUsages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionValueUsages()
     */
    public function clearSpyProductOptionValueUsages()
    {
        $this->collSpyProductOptionValueUsages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionValueUsages collection loaded partially.
     */
    public function resetPartialSpyProductOptionValueUsages($v = true)
    {
        $this->collSpyProductOptionValueUsagesPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionValueUsages collection.
     *
     * By default this just sets the collSpyProductOptionValueUsages collection to an empty array (like clearcollSpyProductOptionValueUsages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionValueUsages($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionValueUsages && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionValueUsages = new ObjectCollection();
        $this->collSpyProductOptionValueUsages->setModel('\Propel\SpyProductOptionValueUsage');
    }

    /**
     * Gets an array of ChildSpyProductOptionValueUsage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionTypeUsage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionValueUsage[] List of ChildSpyProductOptionValueUsage objects
     * @throws PropelException
     */
    public function getSpyProductOptionValueUsages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueUsagesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueUsages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueUsages) {
                // return empty collection
                $this->initSpyProductOptionValueUsages();
            } else {
                $collSpyProductOptionValueUsages = ChildSpyProductOptionValueUsageQuery::create(null, $criteria)
                    ->filterBySpyProductOptionTypeUsage($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionValueUsagesPartial && count($collSpyProductOptionValueUsages)) {
                        $this->initSpyProductOptionValueUsages(false);

                        foreach ($collSpyProductOptionValueUsages as $obj) {
                            if (false == $this->collSpyProductOptionValueUsages->contains($obj)) {
                                $this->collSpyProductOptionValueUsages->append($obj);
                            }
                        }

                        $this->collSpyProductOptionValueUsagesPartial = true;
                    }

                    return $collSpyProductOptionValueUsages;
                }

                if ($partial && $this->collSpyProductOptionValueUsages) {
                    foreach ($this->collSpyProductOptionValueUsages as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionValueUsages[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionValueUsages = $collSpyProductOptionValueUsages;
                $this->collSpyProductOptionValueUsagesPartial = false;
            }
        }

        return $this->collSpyProductOptionValueUsages;
    }

    /**
     * Sets a collection of ChildSpyProductOptionValueUsage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionValueUsages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setSpyProductOptionValueUsages(Collection $spyProductOptionValueUsages, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionValueUsage[] $spyProductOptionValueUsagesToDelete */
        $spyProductOptionValueUsagesToDelete = $this->getSpyProductOptionValueUsages(new Criteria(), $con)->diff($spyProductOptionValueUsages);


        $this->spyProductOptionValueUsagesScheduledForDeletion = $spyProductOptionValueUsagesToDelete;

        foreach ($spyProductOptionValueUsagesToDelete as $spyProductOptionValueUsageRemoved) {
            $spyProductOptionValueUsageRemoved->setSpyProductOptionTypeUsage(null);
        }

        $this->collSpyProductOptionValueUsages = null;
        foreach ($spyProductOptionValueUsages as $spyProductOptionValueUsage) {
            $this->addSpyProductOptionValueUsage($spyProductOptionValueUsage);
        }

        $this->collSpyProductOptionValueUsages = $spyProductOptionValueUsages;
        $this->collSpyProductOptionValueUsagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionValueUsage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionValueUsage objects.
     * @throws PropelException
     */
    public function countSpyProductOptionValueUsages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueUsagesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueUsages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueUsages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionValueUsages());
            }

            $query = ChildSpyProductOptionValueUsageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductOptionTypeUsage($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionValueUsages);
    }

    /**
     * Method called to associate a ChildSpyProductOptionValueUsage object to this object
     * through the ChildSpyProductOptionValueUsage foreign key attribute.
     *
     * @param  ChildSpyProductOptionValueUsage $l ChildSpyProductOptionValueUsage
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function addSpyProductOptionValueUsage(ChildSpyProductOptionValueUsage $l)
    {
        if ($this->collSpyProductOptionValueUsages === null) {
            $this->initSpyProductOptionValueUsages();
            $this->collSpyProductOptionValueUsagesPartial = true;
        }

        if (!$this->collSpyProductOptionValueUsages->contains($l)) {
            $this->doAddSpyProductOptionValueUsage($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionValueUsage $spyProductOptionValueUsage The ChildSpyProductOptionValueUsage object to add.
     */
    protected function doAddSpyProductOptionValueUsage(ChildSpyProductOptionValueUsage $spyProductOptionValueUsage)
    {
        $this->collSpyProductOptionValueUsages[]= $spyProductOptionValueUsage;
        $spyProductOptionValueUsage->setSpyProductOptionTypeUsage($this);
    }

    /**
     * @param  ChildSpyProductOptionValueUsage $spyProductOptionValueUsage The ChildSpyProductOptionValueUsage object to remove.
     * @return $this|ChildSpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function removeSpyProductOptionValueUsage(ChildSpyProductOptionValueUsage $spyProductOptionValueUsage)
    {
        if ($this->getSpyProductOptionValueUsages()->contains($spyProductOptionValueUsage)) {
            $pos = $this->collSpyProductOptionValueUsages->search($spyProductOptionValueUsage);
            $this->collSpyProductOptionValueUsages->remove($pos);
            if (null === $this->spyProductOptionValueUsagesScheduledForDeletion) {
                $this->spyProductOptionValueUsagesScheduledForDeletion = clone $this->collSpyProductOptionValueUsages;
                $this->spyProductOptionValueUsagesScheduledForDeletion->clear();
            }
            $this->spyProductOptionValueUsagesScheduledForDeletion[]= clone $spyProductOptionValueUsage;
            $spyProductOptionValueUsage->setSpyProductOptionTypeUsage(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProductOptionTypeUsage is new, it will return
     * an empty collection; or if this SpyProductOptionTypeUsage has previously
     * been saved, it will retrieve related SpyProductOptionValueUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProductOptionTypeUsage.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionValueUsage[] List of ChildSpyProductOptionValueUsage objects
     */
    public function getSpyProductOptionValueUsagesJoinSpyProductOptionValue(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionValueUsageQuery::create(null, $criteria);
        $query->joinWith('SpyProductOptionValue', $joinBehavior);

        return $this->getSpyProductOptionValueUsages($query, $con);
    }

    /**
     * Clears out the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA()
     */
    public function clearSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA()
    {
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA collection loaded partially.
     */
    public function resetPartialSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA($v = true)
    {
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA collection.
     *
     * By default this just sets the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA collection to an empty array (like clearcollSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = new ObjectCollection();
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA->setModel('\Propel\SpyProductOptionTypeUsageExclusion');
    }

    /**
     * Gets an array of ChildSpyProductOptionTypeUsageExclusion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionTypeUsage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionTypeUsageExclusion[] List of ChildSpyProductOptionTypeUsageExclusion objects
     * @throws PropelException
     */
    public function getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA) {
                // return empty collection
                $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA();
            } else {
                $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = ChildSpyProductOptionTypeUsageExclusionQuery::create(null, $criteria)
                    ->filterByproductOptionTypeUsageA($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial && count($collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA)) {
                        $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA(false);

                        foreach ($collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA as $obj) {
                            if (false == $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA->contains($obj)) {
                                $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA->append($obj);
                            }
                        }

                        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial = true;
                    }

                    return $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA;
                }

                if ($partial && $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA) {
                    foreach ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA;
                $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial = false;
            }
        }

        return $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA;
    }

    /**
     * Sets a collection of ChildSpyProductOptionTypeUsageExclusion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA(Collection $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionTypeUsageExclusion[] $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAToDelete */
        $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAToDelete = $this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA(new Criteria(), $con)->diff($spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion = clone $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAToDelete;

        foreach ($spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAToDelete as $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageARemoved) {
            $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageARemoved->setproductOptionTypeUsageA(null);
        }

        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = null;
        foreach ($spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA as $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA) {
            $this->addSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA);
        }

        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA;
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionTypeUsageExclusion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionTypeUsageExclusion objects.
     * @throws PropelException
     */
    public function countSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA());
            }

            $query = ChildSpyProductOptionTypeUsageExclusionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByproductOptionTypeUsageA($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA);
    }

    /**
     * Method called to associate a ChildSpyProductOptionTypeUsageExclusion object to this object
     * through the ChildSpyProductOptionTypeUsageExclusion foreign key attribute.
     *
     * @param  ChildSpyProductOptionTypeUsageExclusion $l ChildSpyProductOptionTypeUsageExclusion
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function addSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA(ChildSpyProductOptionTypeUsageExclusion $l)
    {
        if ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA === null) {
            $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA();
            $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAPartial = true;
        }

        if (!$this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA->contains($l)) {
            $this->doAddSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA The ChildSpyProductOptionTypeUsageExclusion object to add.
     */
    protected function doAddSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA(ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA)
    {
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA[]= $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA;
        $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA->setproductOptionTypeUsageA($this);
    }

    /**
     * @param  ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA The ChildSpyProductOptionTypeUsageExclusion object to remove.
     * @return $this|ChildSpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function removeSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA(ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA)
    {
        if ($this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA()->contains($spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA)) {
            $pos = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA->search($spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA);
            $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA->remove($pos);
            if (null === $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion) {
                $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion = clone $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA;
                $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion->clear();
            }
            $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageAScheduledForDeletion[]= clone $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA;
            $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA->setproductOptionTypeUsageA(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB()
     */
    public function clearSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB()
    {
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB collection loaded partially.
     */
    public function resetPartialSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB($v = true)
    {
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB collection.
     *
     * By default this just sets the collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB collection to an empty array (like clearcollSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = new ObjectCollection();
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB->setModel('\Propel\SpyProductOptionTypeUsageExclusion');
    }

    /**
     * Gets an array of ChildSpyProductOptionTypeUsageExclusion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionTypeUsage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionTypeUsageExclusion[] List of ChildSpyProductOptionTypeUsageExclusion objects
     * @throws PropelException
     */
    public function getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB) {
                // return empty collection
                $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB();
            } else {
                $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = ChildSpyProductOptionTypeUsageExclusionQuery::create(null, $criteria)
                    ->filterByproductOptionTypeUsageB($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial && count($collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB)) {
                        $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB(false);

                        foreach ($collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB as $obj) {
                            if (false == $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB->contains($obj)) {
                                $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB->append($obj);
                            }
                        }

                        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial = true;
                    }

                    return $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB;
                }

                if ($partial && $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB) {
                    foreach ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = $collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB;
                $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial = false;
            }
        }

        return $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB;
    }

    /**
     * Sets a collection of ChildSpyProductOptionTypeUsageExclusion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function setSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB(Collection $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionTypeUsageExclusion[] $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBToDelete */
        $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBToDelete = $this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB(new Criteria(), $con)->diff($spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion = clone $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBToDelete;

        foreach ($spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBToDelete as $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageBRemoved) {
            $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageBRemoved->setproductOptionTypeUsageB(null);
        }

        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = null;
        foreach ($spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB as $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB) {
            $this->addSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB);
        }

        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = $spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB;
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionTypeUsageExclusion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionTypeUsageExclusion objects.
     * @throws PropelException
     */
    public function countSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB());
            }

            $query = ChildSpyProductOptionTypeUsageExclusionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByproductOptionTypeUsageB($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB);
    }

    /**
     * Method called to associate a ChildSpyProductOptionTypeUsageExclusion object to this object
     * through the ChildSpyProductOptionTypeUsageExclusion foreign key attribute.
     *
     * @param  ChildSpyProductOptionTypeUsageExclusion $l ChildSpyProductOptionTypeUsageExclusion
     * @return $this|\Propel\SpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function addSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB(ChildSpyProductOptionTypeUsageExclusion $l)
    {
        if ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB === null) {
            $this->initSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB();
            $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBPartial = true;
        }

        if (!$this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB->contains($l)) {
            $this->doAddSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB The ChildSpyProductOptionTypeUsageExclusion object to add.
     */
    protected function doAddSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB(ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB)
    {
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB[]= $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB;
        $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB->setproductOptionTypeUsageB($this);
    }

    /**
     * @param  ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB The ChildSpyProductOptionTypeUsageExclusion object to remove.
     * @return $this|ChildSpyProductOptionTypeUsage The current object (for fluent API support)
     */
    public function removeSpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB(ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB)
    {
        if ($this->getSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB()->contains($spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB)) {
            $pos = $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB->search($spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB);
            $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB->remove($pos);
            if (null === $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion) {
                $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion = clone $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB;
                $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion->clear();
            }
            $this->spyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageBScheduledForDeletion[]= clone $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB;
            $spyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB->setproductOptionTypeUsageB(null);
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
        if (null !== $this->aSpyProduct) {
            $this->aSpyProduct->removeSpyProductOptionTypeUsage($this);
        }
        if (null !== $this->aSpyProductOptionType) {
            $this->aSpyProductOptionType->removeSpyProductOptionTypeUsage($this);
        }
        $this->id_product_option_type_usage = null;
        $this->is_optional = null;
        $this->sequence = null;
        $this->fk_product = null;
        $this->fk_product_option_type = null;
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
            if ($this->collSpyProductOptionValueUsages) {
                foreach ($this->collSpyProductOptionValueUsages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA) {
                foreach ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB) {
                foreach ($this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyProductOptionValueUsages = null;
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA = null;
        $this->collSpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB = null;
        $this->aSpyProduct = null;
        $this->aSpyProductOptionType = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyProductOptionTypeUsageTableMap::DEFAULT_STRING_FORMAT);
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
