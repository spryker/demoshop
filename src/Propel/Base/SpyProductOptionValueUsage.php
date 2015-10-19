<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionConfigurationPresetValue as ChildSpyProductOptionConfigurationPresetValue;
use Propel\SpyProductOptionConfigurationPresetValueQuery as ChildSpyProductOptionConfigurationPresetValueQuery;
use Propel\SpyProductOptionTypeUsage as ChildSpyProductOptionTypeUsage;
use Propel\SpyProductOptionTypeUsageQuery as ChildSpyProductOptionTypeUsageQuery;
use Propel\SpyProductOptionValue as ChildSpyProductOptionValue;
use Propel\SpyProductOptionValueQuery as ChildSpyProductOptionValueQuery;
use Propel\SpyProductOptionValueUsage as ChildSpyProductOptionValueUsage;
use Propel\SpyProductOptionValueUsageConstraint as ChildSpyProductOptionValueUsageConstraint;
use Propel\SpyProductOptionValueUsageConstraintQuery as ChildSpyProductOptionValueUsageConstraintQuery;
use Propel\SpyProductOptionValueUsageQuery as ChildSpyProductOptionValueUsageQuery;
use Propel\Map\SpyProductOptionValueUsageTableMap;
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
 * Base class that represents a row from the 'spy_product_option_value_usage' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyProductOptionValueUsage extends SpyProductOptionValueUsage implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyProductOptionValueUsageTableMap';


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
     * The value for the id_product_option_value_usage field.
     * @var        int
     */
    protected $id_product_option_value_usage;

    /**
     * The value for the sequence field.
     * @var        int
     */
    protected $sequence;

    /**
     * The value for the fk_product_option_type_usage field.
     * @var        int
     */
    protected $fk_product_option_type_usage;

    /**
     * The value for the fk_product_option_value field.
     * @var        int
     */
    protected $fk_product_option_value;

    /**
     * @var        ChildSpyProductOptionTypeUsage
     */
    protected $aSpyProductOptionTypeUsage;

    /**
     * @var        ChildSpyProductOptionValue
     */
    protected $aSpyProductOptionValue;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionValueUsageConstraint[] Collection to store aggregation of ChildSpyProductOptionValueUsageConstraint objects.
     */
    protected $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA;
    protected $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionValueUsageConstraint[] Collection to store aggregation of ChildSpyProductOptionValueUsageConstraint objects.
     */
    protected $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB;
    protected $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionConfigurationPresetValue[] Collection to store aggregation of ChildSpyProductOptionConfigurationPresetValue objects.
     */
    protected $collSpyProductOptionConfigurationPresetValues;
    protected $collSpyProductOptionConfigurationPresetValuesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionValueUsageConstraint[]
     */
    protected $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionValueUsageConstraint[]
     */
    protected $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionConfigurationPresetValue[]
     */
    protected $spyProductOptionConfigurationPresetValuesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyProductOptionValueUsage object.
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
     * Compares this with another <code>SpyProductOptionValueUsage</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyProductOptionValueUsage</code>, delegates to
     * <code>equals(SpyProductOptionValueUsage)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyProductOptionValueUsage The current object, for fluid interface
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
     * Get the [id_product_option_value_usage] column value.
     *
     * @return int
     */
    public function getIdProductOptionValueUsage()
    {
        return $this->id_product_option_value_usage;
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
     * Get the [fk_product_option_type_usage] column value.
     *
     * @return int
     */
    public function getFkProductOptionTypeUsage()
    {
        return $this->fk_product_option_type_usage;
    }

    /**
     * Get the [fk_product_option_value] column value.
     *
     * @return int
     */
    public function getFkProductOptionValue()
    {
        return $this->fk_product_option_value;
    }

    /**
     * Set the value of [id_product_option_value_usage] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function setIdProductOptionValueUsage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_product_option_value_usage !== $v) {
            $this->id_product_option_value_usage = $v;
            $this->modifiedColumns[SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE] = true;
        }

        return $this;
    } // setIdProductOptionValueUsage()

    /**
     * Set the value of [sequence] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function setSequence($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sequence !== $v) {
            $this->sequence = $v;
            $this->modifiedColumns[SpyProductOptionValueUsageTableMap::COL_SEQUENCE] = true;
        }

        return $this;
    } // setSequence()

    /**
     * Set the value of [fk_product_option_type_usage] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function setFkProductOptionTypeUsage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_product_option_type_usage !== $v) {
            $this->fk_product_option_type_usage = $v;
            $this->modifiedColumns[SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE] = true;
        }

        if ($this->aSpyProductOptionTypeUsage !== null && $this->aSpyProductOptionTypeUsage->getIdProductOptionTypeUsage() !== $v) {
            $this->aSpyProductOptionTypeUsage = null;
        }

        return $this;
    } // setFkProductOptionTypeUsage()

    /**
     * Set the value of [fk_product_option_value] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function setFkProductOptionValue($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_product_option_value !== $v) {
            $this->fk_product_option_value = $v;
            $this->modifiedColumns[SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE] = true;
        }

        if ($this->aSpyProductOptionValue !== null && $this->aSpyProductOptionValue->getIdProductOptionValue() !== $v) {
            $this->aSpyProductOptionValue = null;
        }

        return $this;
    } // setFkProductOptionValue()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyProductOptionValueUsageTableMap::translateFieldName('IdProductOptionValueUsage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_product_option_value_usage = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyProductOptionValueUsageTableMap::translateFieldName('Sequence', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sequence = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyProductOptionValueUsageTableMap::translateFieldName('FkProductOptionTypeUsage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_product_option_type_usage = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyProductOptionValueUsageTableMap::translateFieldName('FkProductOptionValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_product_option_value = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = SpyProductOptionValueUsageTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyProductOptionValueUsage'), 0, $e);
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
        if ($this->aSpyProductOptionTypeUsage !== null && $this->fk_product_option_type_usage !== $this->aSpyProductOptionTypeUsage->getIdProductOptionTypeUsage()) {
            $this->aSpyProductOptionTypeUsage = null;
        }
        if ($this->aSpyProductOptionValue !== null && $this->fk_product_option_value !== $this->aSpyProductOptionValue->getIdProductOptionValue()) {
            $this->aSpyProductOptionValue = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyProductOptionValueUsageQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyProductOptionTypeUsage = null;
            $this->aSpyProductOptionValue = null;
            $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = null;

            $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = null;

            $this->collSpyProductOptionConfigurationPresetValues = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyProductOptionValueUsage::setDeleted()
     * @see SpyProductOptionValueUsage::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyProductOptionValueUsageQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
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
                SpyProductOptionValueUsageTableMap::addInstanceToPool($this);
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

            if ($this->aSpyProductOptionTypeUsage !== null) {
                if ($this->aSpyProductOptionTypeUsage->isModified() || $this->aSpyProductOptionTypeUsage->isNew()) {
                    $affectedRows += $this->aSpyProductOptionTypeUsage->save($con);
                }
                $this->setSpyProductOptionTypeUsage($this->aSpyProductOptionTypeUsage);
            }

            if ($this->aSpyProductOptionValue !== null) {
                if ($this->aSpyProductOptionValue->isModified() || $this->aSpyProductOptionValue->isNew()) {
                    $affectedRows += $this->aSpyProductOptionValue->save($con);
                }
                $this->setSpyProductOptionValue($this->aSpyProductOptionValue);
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

            if ($this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion !== null) {
                if (!$this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionValueUsageConstraintQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA !== null) {
                foreach ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion !== null) {
                if (!$this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionValueUsageConstraintQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB !== null) {
                foreach ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductOptionConfigurationPresetValuesScheduledForDeletion !== null) {
                if (!$this->spyProductOptionConfigurationPresetValuesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionConfigurationPresetValueQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionConfigurationPresetValuesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionConfigurationPresetValuesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionConfigurationPresetValues !== null) {
                foreach ($this->collSpyProductOptionConfigurationPresetValues as $referrerFK) {
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

        $this->modifiedColumns[SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE)) {
            $modifiedColumns[':p' . $index++]  = 'id_product_option_value_usage';
        }
        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_SEQUENCE)) {
            $modifiedColumns[':p' . $index++]  = 'sequence';
        }
        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_product_option_type_usage';
        }
        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_product_option_value';
        }

        $sql = sprintf(
            'INSERT INTO spy_product_option_value_usage (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_product_option_value_usage':
                        $stmt->bindValue($identifier, $this->id_product_option_value_usage, PDO::PARAM_INT);
                        break;
                    case 'sequence':
                        $stmt->bindValue($identifier, $this->sequence, PDO::PARAM_INT);
                        break;
                    case 'fk_product_option_type_usage':
                        $stmt->bindValue($identifier, $this->fk_product_option_type_usage, PDO::PARAM_INT);
                        break;
                    case 'fk_product_option_value':
                        $stmt->bindValue($identifier, $this->fk_product_option_value, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_product_option_value_usage_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdProductOptionValueUsage($pk);
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
        $pos = SpyProductOptionValueUsageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdProductOptionValueUsage();
                break;
            case 1:
                return $this->getSequence();
                break;
            case 2:
                return $this->getFkProductOptionTypeUsage();
                break;
            case 3:
                return $this->getFkProductOptionValue();
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

        if (isset($alreadyDumpedObjects['SpyProductOptionValueUsage'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyProductOptionValueUsage'][$this->hashCode()] = true;
        $keys = SpyProductOptionValueUsageTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProductOptionValueUsage(),
            $keys[1] => $this->getSequence(),
            $keys[2] => $this->getFkProductOptionTypeUsage(),
            $keys[3] => $this->getFkProductOptionValue(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyProductOptionTypeUsage) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionTypeUsage';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_type_usage';
                        break;
                    default:
                        $key = 'SpyProductOptionTypeUsage';
                }

                $result[$key] = $this->aSpyProductOptionTypeUsage->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSpyProductOptionValue) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionValue';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_value';
                        break;
                    default:
                        $key = 'SpyProductOptionValue';
                }

                $result[$key] = $this->aSpyProductOptionValue->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionValueUsageConstraints';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_value_usage_constraints';
                        break;
                    default:
                        $key = 'SpyProductOptionValueUsageConstraints';
                }

                $result[$key] = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionValueUsageConstraints';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_value_usage_constraints';
                        break;
                    default:
                        $key = 'SpyProductOptionValueUsageConstraints';
                }

                $result[$key] = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionConfigurationPresetValues) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionConfigurationPresetValues';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_configuration_preset_values';
                        break;
                    default:
                        $key = 'SpyProductOptionConfigurationPresetValues';
                }

                $result[$key] = $this->collSpyProductOptionConfigurationPresetValues->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyProductOptionValueUsage
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyProductOptionValueUsageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyProductOptionValueUsage
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProductOptionValueUsage($value);
                break;
            case 1:
                $this->setSequence($value);
                break;
            case 2:
                $this->setFkProductOptionTypeUsage($value);
                break;
            case 3:
                $this->setFkProductOptionValue($value);
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
        $keys = SpyProductOptionValueUsageTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdProductOptionValueUsage($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSequence($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkProductOptionTypeUsage($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkProductOptionValue($arr[$keys[3]]);
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
     * @return $this|\Propel\SpyProductOptionValueUsage The current object, for fluid interface
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
        $criteria = new Criteria(SpyProductOptionValueUsageTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE)) {
            $criteria->add(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $this->id_product_option_value_usage);
        }
        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_SEQUENCE)) {
            $criteria->add(SpyProductOptionValueUsageTableMap::COL_SEQUENCE, $this->sequence);
        }
        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE)) {
            $criteria->add(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE, $this->fk_product_option_type_usage);
        }
        if ($this->isColumnModified(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE)) {
            $criteria->add(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE, $this->fk_product_option_value);
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
        $criteria = ChildSpyProductOptionValueUsageQuery::create();
        $criteria->add(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, $this->id_product_option_value_usage);

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
        $validPk = null !== $this->getIdProductOptionValueUsage();

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
        return $this->getIdProductOptionValueUsage();
    }

    /**
     * Generic method to set the primary key (id_product_option_value_usage column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProductOptionValueUsage($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdProductOptionValueUsage();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyProductOptionValueUsage (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSequence($this->getSequence());
        $copyObj->setFkProductOptionTypeUsage($this->getFkProductOptionTypeUsage());
        $copyObj->setFkProductOptionValue($this->getFkProductOptionValue());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionConfigurationPresetValues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionConfigurationPresetValue($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdProductOptionValueUsage(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyProductOptionValueUsage Clone of current object.
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
     * Declares an association between this object and a ChildSpyProductOptionTypeUsage object.
     *
     * @param  ChildSpyProductOptionTypeUsage $v
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyProductOptionTypeUsage(ChildSpyProductOptionTypeUsage $v = null)
    {
        if ($v === null) {
            $this->setFkProductOptionTypeUsage(NULL);
        } else {
            $this->setFkProductOptionTypeUsage($v->getIdProductOptionTypeUsage());
        }

        $this->aSpyProductOptionTypeUsage = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyProductOptionTypeUsage object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProductOptionValueUsage($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyProductOptionTypeUsage object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyProductOptionTypeUsage The associated ChildSpyProductOptionTypeUsage object.
     * @throws PropelException
     */
    public function getSpyProductOptionTypeUsage(ConnectionInterface $con = null)
    {
        if ($this->aSpyProductOptionTypeUsage === null && ($this->fk_product_option_type_usage !== null)) {
            $this->aSpyProductOptionTypeUsage = ChildSpyProductOptionTypeUsageQuery::create()->findPk($this->fk_product_option_type_usage, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyProductOptionTypeUsage->addSpyProductOptionValueUsages($this);
             */
        }

        return $this->aSpyProductOptionTypeUsage;
    }

    /**
     * Declares an association between this object and a ChildSpyProductOptionValue object.
     *
     * @param  ChildSpyProductOptionValue $v
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyProductOptionValue(ChildSpyProductOptionValue $v = null)
    {
        if ($v === null) {
            $this->setFkProductOptionValue(NULL);
        } else {
            $this->setFkProductOptionValue($v->getIdProductOptionValue());
        }

        $this->aSpyProductOptionValue = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyProductOptionValue object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProductOptionValueUsage($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyProductOptionValue object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyProductOptionValue The associated ChildSpyProductOptionValue object.
     * @throws PropelException
     */
    public function getSpyProductOptionValue(ConnectionInterface $con = null)
    {
        if ($this->aSpyProductOptionValue === null && ($this->fk_product_option_value !== null)) {
            $this->aSpyProductOptionValue = ChildSpyProductOptionValueQuery::create()->findPk($this->fk_product_option_value, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyProductOptionValue->addSpyProductOptionValueUsages($this);
             */
        }

        return $this->aSpyProductOptionValue;
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
        if ('SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA' == $relationName) {
            return $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA();
        }
        if ('SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB' == $relationName) {
            return $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB();
        }
        if ('SpyProductOptionConfigurationPresetValue' == $relationName) {
            return $this->initSpyProductOptionConfigurationPresetValues();
        }
    }

    /**
     * Clears out the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA()
     */
    public function clearSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA()
    {
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA collection loaded partially.
     */
    public function resetPartialSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA($v = true)
    {
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA collection.
     *
     * By default this just sets the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA collection to an empty array (like clearcollSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = new ObjectCollection();
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA->setModel('\Propel\SpyProductOptionValueUsageConstraint');
    }

    /**
     * Gets an array of ChildSpyProductOptionValueUsageConstraint objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionValueUsage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionValueUsageConstraint[] List of ChildSpyProductOptionValueUsageConstraint objects
     * @throws PropelException
     */
    public function getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA) {
                // return empty collection
                $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA();
            } else {
                $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = ChildSpyProductOptionValueUsageConstraintQuery::create(null, $criteria)
                    ->filterByproductOptionValueUsageA($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial && count($collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA)) {
                        $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA(false);

                        foreach ($collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA as $obj) {
                            if (false == $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA->contains($obj)) {
                                $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA->append($obj);
                            }
                        }

                        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial = true;
                    }

                    return $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA;
                }

                if ($partial && $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA) {
                    foreach ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA;
                $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial = false;
            }
        }

        return $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA;
    }

    /**
     * Sets a collection of ChildSpyProductOptionValueUsageConstraint objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function setSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA(Collection $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionValueUsageConstraint[] $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAToDelete */
        $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAToDelete = $this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA(new Criteria(), $con)->diff($spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion = clone $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAToDelete;

        foreach ($spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAToDelete as $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageARemoved) {
            $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageARemoved->setproductOptionValueUsageA(null);
        }

        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = null;
        foreach ($spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA as $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA) {
            $this->addSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA);
        }

        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA;
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionValueUsageConstraint objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionValueUsageConstraint objects.
     * @throws PropelException
     */
    public function countSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA());
            }

            $query = ChildSpyProductOptionValueUsageConstraintQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByproductOptionValueUsageA($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA);
    }

    /**
     * Method called to associate a ChildSpyProductOptionValueUsageConstraint object to this object
     * through the ChildSpyProductOptionValueUsageConstraint foreign key attribute.
     *
     * @param  ChildSpyProductOptionValueUsageConstraint $l ChildSpyProductOptionValueUsageConstraint
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function addSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA(ChildSpyProductOptionValueUsageConstraint $l)
    {
        if ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA === null) {
            $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA();
            $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAPartial = true;
        }

        if (!$this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA->contains($l)) {
            $this->doAddSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA The ChildSpyProductOptionValueUsageConstraint object to add.
     */
    protected function doAddSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA(ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA)
    {
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA[]= $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA;
        $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA->setproductOptionValueUsageA($this);
    }

    /**
     * @param  ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA The ChildSpyProductOptionValueUsageConstraint object to remove.
     * @return $this|ChildSpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function removeSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA(ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA)
    {
        if ($this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA()->contains($spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA)) {
            $pos = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA->search($spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA);
            $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA->remove($pos);
            if (null === $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion) {
                $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion = clone $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA;
                $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion->clear();
            }
            $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageAScheduledForDeletion[]= clone $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA;
            $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA->setproductOptionValueUsageA(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB()
     */
    public function clearSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB()
    {
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB collection loaded partially.
     */
    public function resetPartialSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB($v = true)
    {
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB collection.
     *
     * By default this just sets the collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB collection to an empty array (like clearcollSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = new ObjectCollection();
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB->setModel('\Propel\SpyProductOptionValueUsageConstraint');
    }

    /**
     * Gets an array of ChildSpyProductOptionValueUsageConstraint objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionValueUsage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionValueUsageConstraint[] List of ChildSpyProductOptionValueUsageConstraint objects
     * @throws PropelException
     */
    public function getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB) {
                // return empty collection
                $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB();
            } else {
                $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = ChildSpyProductOptionValueUsageConstraintQuery::create(null, $criteria)
                    ->filterByproductOptionValueUsageB($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial && count($collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB)) {
                        $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB(false);

                        foreach ($collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB as $obj) {
                            if (false == $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB->contains($obj)) {
                                $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB->append($obj);
                            }
                        }

                        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial = true;
                    }

                    return $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB;
                }

                if ($partial && $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB) {
                    foreach ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = $collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB;
                $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial = false;
            }
        }

        return $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB;
    }

    /**
     * Sets a collection of ChildSpyProductOptionValueUsageConstraint objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function setSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB(Collection $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionValueUsageConstraint[] $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBToDelete */
        $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBToDelete = $this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB(new Criteria(), $con)->diff($spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion = clone $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBToDelete;

        foreach ($spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBToDelete as $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageBRemoved) {
            $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageBRemoved->setproductOptionValueUsageB(null);
        }

        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = null;
        foreach ($spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB as $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB) {
            $this->addSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB);
        }

        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = $spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB;
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionValueUsageConstraint objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionValueUsageConstraint objects.
     * @throws PropelException
     */
    public function countSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB());
            }

            $query = ChildSpyProductOptionValueUsageConstraintQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByproductOptionValueUsageB($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB);
    }

    /**
     * Method called to associate a ChildSpyProductOptionValueUsageConstraint object to this object
     * through the ChildSpyProductOptionValueUsageConstraint foreign key attribute.
     *
     * @param  ChildSpyProductOptionValueUsageConstraint $l ChildSpyProductOptionValueUsageConstraint
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function addSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB(ChildSpyProductOptionValueUsageConstraint $l)
    {
        if ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB === null) {
            $this->initSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB();
            $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBPartial = true;
        }

        if (!$this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB->contains($l)) {
            $this->doAddSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB The ChildSpyProductOptionValueUsageConstraint object to add.
     */
    protected function doAddSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB(ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB)
    {
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB[]= $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB;
        $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB->setproductOptionValueUsageB($this);
    }

    /**
     * @param  ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB The ChildSpyProductOptionValueUsageConstraint object to remove.
     * @return $this|ChildSpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function removeSpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB(ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB)
    {
        if ($this->getSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB()->contains($spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB)) {
            $pos = $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB->search($spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB);
            $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB->remove($pos);
            if (null === $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion) {
                $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion = clone $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB;
                $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion->clear();
            }
            $this->spyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageBScheduledForDeletion[]= clone $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB;
            $spyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB->setproductOptionValueUsageB(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyProductOptionConfigurationPresetValues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionConfigurationPresetValues()
     */
    public function clearSpyProductOptionConfigurationPresetValues()
    {
        $this->collSpyProductOptionConfigurationPresetValues = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionConfigurationPresetValues collection loaded partially.
     */
    public function resetPartialSpyProductOptionConfigurationPresetValues($v = true)
    {
        $this->collSpyProductOptionConfigurationPresetValuesPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionConfigurationPresetValues collection.
     *
     * By default this just sets the collSpyProductOptionConfigurationPresetValues collection to an empty array (like clearcollSpyProductOptionConfigurationPresetValues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionConfigurationPresetValues($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionConfigurationPresetValues && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionConfigurationPresetValues = new ObjectCollection();
        $this->collSpyProductOptionConfigurationPresetValues->setModel('\Propel\SpyProductOptionConfigurationPresetValue');
    }

    /**
     * Gets an array of ChildSpyProductOptionConfigurationPresetValue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionValueUsage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionConfigurationPresetValue[] List of ChildSpyProductOptionConfigurationPresetValue objects
     * @throws PropelException
     */
    public function getSpyProductOptionConfigurationPresetValues(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionConfigurationPresetValuesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionConfigurationPresetValues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionConfigurationPresetValues) {
                // return empty collection
                $this->initSpyProductOptionConfigurationPresetValues();
            } else {
                $collSpyProductOptionConfigurationPresetValues = ChildSpyProductOptionConfigurationPresetValueQuery::create(null, $criteria)
                    ->filterBySpyProductOptionValueUsage($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionConfigurationPresetValuesPartial && count($collSpyProductOptionConfigurationPresetValues)) {
                        $this->initSpyProductOptionConfigurationPresetValues(false);

                        foreach ($collSpyProductOptionConfigurationPresetValues as $obj) {
                            if (false == $this->collSpyProductOptionConfigurationPresetValues->contains($obj)) {
                                $this->collSpyProductOptionConfigurationPresetValues->append($obj);
                            }
                        }

                        $this->collSpyProductOptionConfigurationPresetValuesPartial = true;
                    }

                    return $collSpyProductOptionConfigurationPresetValues;
                }

                if ($partial && $this->collSpyProductOptionConfigurationPresetValues) {
                    foreach ($this->collSpyProductOptionConfigurationPresetValues as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionConfigurationPresetValues[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionConfigurationPresetValues = $collSpyProductOptionConfigurationPresetValues;
                $this->collSpyProductOptionConfigurationPresetValuesPartial = false;
            }
        }

        return $this->collSpyProductOptionConfigurationPresetValues;
    }

    /**
     * Sets a collection of ChildSpyProductOptionConfigurationPresetValue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionConfigurationPresetValues A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function setSpyProductOptionConfigurationPresetValues(Collection $spyProductOptionConfigurationPresetValues, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionConfigurationPresetValue[] $spyProductOptionConfigurationPresetValuesToDelete */
        $spyProductOptionConfigurationPresetValuesToDelete = $this->getSpyProductOptionConfigurationPresetValues(new Criteria(), $con)->diff($spyProductOptionConfigurationPresetValues);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductOptionConfigurationPresetValuesScheduledForDeletion = clone $spyProductOptionConfigurationPresetValuesToDelete;

        foreach ($spyProductOptionConfigurationPresetValuesToDelete as $spyProductOptionConfigurationPresetValueRemoved) {
            $spyProductOptionConfigurationPresetValueRemoved->setSpyProductOptionValueUsage(null);
        }

        $this->collSpyProductOptionConfigurationPresetValues = null;
        foreach ($spyProductOptionConfigurationPresetValues as $spyProductOptionConfigurationPresetValue) {
            $this->addSpyProductOptionConfigurationPresetValue($spyProductOptionConfigurationPresetValue);
        }

        $this->collSpyProductOptionConfigurationPresetValues = $spyProductOptionConfigurationPresetValues;
        $this->collSpyProductOptionConfigurationPresetValuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionConfigurationPresetValue objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionConfigurationPresetValue objects.
     * @throws PropelException
     */
    public function countSpyProductOptionConfigurationPresetValues(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionConfigurationPresetValuesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionConfigurationPresetValues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionConfigurationPresetValues) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionConfigurationPresetValues());
            }

            $query = ChildSpyProductOptionConfigurationPresetValueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductOptionValueUsage($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionConfigurationPresetValues);
    }

    /**
     * Method called to associate a ChildSpyProductOptionConfigurationPresetValue object to this object
     * through the ChildSpyProductOptionConfigurationPresetValue foreign key attribute.
     *
     * @param  ChildSpyProductOptionConfigurationPresetValue $l ChildSpyProductOptionConfigurationPresetValue
     * @return $this|\Propel\SpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function addSpyProductOptionConfigurationPresetValue(ChildSpyProductOptionConfigurationPresetValue $l)
    {
        if ($this->collSpyProductOptionConfigurationPresetValues === null) {
            $this->initSpyProductOptionConfigurationPresetValues();
            $this->collSpyProductOptionConfigurationPresetValuesPartial = true;
        }

        if (!$this->collSpyProductOptionConfigurationPresetValues->contains($l)) {
            $this->doAddSpyProductOptionConfigurationPresetValue($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionConfigurationPresetValue $spyProductOptionConfigurationPresetValue The ChildSpyProductOptionConfigurationPresetValue object to add.
     */
    protected function doAddSpyProductOptionConfigurationPresetValue(ChildSpyProductOptionConfigurationPresetValue $spyProductOptionConfigurationPresetValue)
    {
        $this->collSpyProductOptionConfigurationPresetValues[]= $spyProductOptionConfigurationPresetValue;
        $spyProductOptionConfigurationPresetValue->setSpyProductOptionValueUsage($this);
    }

    /**
     * @param  ChildSpyProductOptionConfigurationPresetValue $spyProductOptionConfigurationPresetValue The ChildSpyProductOptionConfigurationPresetValue object to remove.
     * @return $this|ChildSpyProductOptionValueUsage The current object (for fluent API support)
     */
    public function removeSpyProductOptionConfigurationPresetValue(ChildSpyProductOptionConfigurationPresetValue $spyProductOptionConfigurationPresetValue)
    {
        if ($this->getSpyProductOptionConfigurationPresetValues()->contains($spyProductOptionConfigurationPresetValue)) {
            $pos = $this->collSpyProductOptionConfigurationPresetValues->search($spyProductOptionConfigurationPresetValue);
            $this->collSpyProductOptionConfigurationPresetValues->remove($pos);
            if (null === $this->spyProductOptionConfigurationPresetValuesScheduledForDeletion) {
                $this->spyProductOptionConfigurationPresetValuesScheduledForDeletion = clone $this->collSpyProductOptionConfigurationPresetValues;
                $this->spyProductOptionConfigurationPresetValuesScheduledForDeletion->clear();
            }
            $this->spyProductOptionConfigurationPresetValuesScheduledForDeletion[]= clone $spyProductOptionConfigurationPresetValue;
            $spyProductOptionConfigurationPresetValue->setSpyProductOptionValueUsage(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProductOptionValueUsage is new, it will return
     * an empty collection; or if this SpyProductOptionValueUsage has previously
     * been saved, it will retrieve related SpyProductOptionConfigurationPresetValues from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProductOptionValueUsage.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionConfigurationPresetValue[] List of ChildSpyProductOptionConfigurationPresetValue objects
     */
    public function getSpyProductOptionConfigurationPresetValuesJoinSpyProductOptionConfigurationPreset(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionConfigurationPresetValueQuery::create(null, $criteria);
        $query->joinWith('SpyProductOptionConfigurationPreset', $joinBehavior);

        return $this->getSpyProductOptionConfigurationPresetValues($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyProductOptionTypeUsage) {
            $this->aSpyProductOptionTypeUsage->removeSpyProductOptionValueUsage($this);
        }
        if (null !== $this->aSpyProductOptionValue) {
            $this->aSpyProductOptionValue->removeSpyProductOptionValueUsage($this);
        }
        $this->id_product_option_value_usage = null;
        $this->sequence = null;
        $this->fk_product_option_type_usage = null;
        $this->fk_product_option_value = null;
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
            if ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA) {
                foreach ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB) {
                foreach ($this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionConfigurationPresetValues) {
                foreach ($this->collSpyProductOptionConfigurationPresetValues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA = null;
        $this->collSpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB = null;
        $this->collSpyProductOptionConfigurationPresetValues = null;
        $this->aSpyProductOptionTypeUsage = null;
        $this->aSpyProductOptionValue = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyProductOptionValueUsageTableMap::DEFAULT_STRING_FORMAT);
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
