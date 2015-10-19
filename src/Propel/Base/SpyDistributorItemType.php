<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyDistributorItem as ChildSpyDistributorItem;
use Propel\SpyDistributorItemQuery as ChildSpyDistributorItemQuery;
use Propel\SpyDistributorItemType as ChildSpyDistributorItemType;
use Propel\SpyDistributorItemTypeQuery as ChildSpyDistributorItemTypeQuery;
use Propel\Map\SpyDistributorItemTypeTableMap;
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
 * Base class that represents a row from the 'spy_distributor_item_type' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyDistributorItemType extends SpyDistributorItemType implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyDistributorItemTypeTableMap';


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
     * The value for the id_distributor_item_type field.
     * @var        int
     */
    protected $id_distributor_item_type;

    /**
     * The value for the type_key field.
     * @var        string
     */
    protected $type_key;

    /**
     * The value for the last_distribution field.
     * @var        \DateTime
     */
    protected $last_distribution;

    /**
     * @var        ObjectCollection|ChildSpyDistributorItem[] Collection to store aggregation of ChildSpyDistributorItem objects.
     */
    protected $collSpyDistributorItems;
    protected $collSpyDistributorItemsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyDistributorItem[]
     */
    protected $spyDistributorItemsScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyDistributorItemType object.
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
     * Compares this with another <code>SpyDistributorItemType</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyDistributorItemType</code>, delegates to
     * <code>equals(SpyDistributorItemType)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyDistributorItemType The current object, for fluid interface
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
     * Get the [id_distributor_item_type] column value.
     *
     * @return int
     */
    public function getIdDistributorItemType()
    {
        return $this->id_distributor_item_type;
    }

    /**
     * Get the [type_key] column value.
     *
     * @return string
     */
    public function getTypeKey()
    {
        return $this->type_key;
    }

    /**
     * Get the [optionally formatted] temporal [last_distribution] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastDistribution($format = NULL)
    {
        if ($format === null) {
            return $this->last_distribution;
        } else {
            return $this->last_distribution instanceof \DateTime ? $this->last_distribution->format($format) : null;
        }
    }

    /**
     * Set the value of [id_distributor_item_type] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyDistributorItemType The current object (for fluent API support)
     */
    public function setIdDistributorItemType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_distributor_item_type !== $v) {
            $this->id_distributor_item_type = $v;
            $this->modifiedColumns[SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE] = true;
        }

        return $this;
    } // setIdDistributorItemType()

    /**
     * Set the value of [type_key] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyDistributorItemType The current object (for fluent API support)
     */
    public function setTypeKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type_key !== $v) {
            $this->type_key = $v;
            $this->modifiedColumns[SpyDistributorItemTypeTableMap::COL_TYPE_KEY] = true;
        }

        return $this;
    } // setTypeKey()

    /**
     * Sets the value of [last_distribution] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyDistributorItemType The current object (for fluent API support)
     */
    public function setLastDistribution($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_distribution !== null || $dt !== null) {
            if ($this->last_distribution === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->last_distribution->format("Y-m-d H:i:s")) {
                $this->last_distribution = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION] = true;
            }
        } // if either are not null

        return $this;
    } // setLastDistribution()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyDistributorItemTypeTableMap::translateFieldName('IdDistributorItemType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_distributor_item_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyDistributorItemTypeTableMap::translateFieldName('TypeKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyDistributorItemTypeTableMap::translateFieldName('LastDistribution', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_distribution = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = SpyDistributorItemTypeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyDistributorItemType'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyDistributorItemTypeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSpyDistributorItems = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyDistributorItemType::setDeleted()
     * @see SpyDistributorItemType::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyDistributorItemTypeQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
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
                SpyDistributorItemTypeTableMap::addInstanceToPool($this);
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

            if ($this->spyDistributorItemsScheduledForDeletion !== null) {
                if (!$this->spyDistributorItemsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyDistributorItemQuery::create()
                        ->filterByPrimaryKeys($this->spyDistributorItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyDistributorItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyDistributorItems !== null) {
                foreach ($this->collSpyDistributorItems as $referrerFK) {
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

        $this->modifiedColumns[SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE] = true;
        if (null !== $this->id_distributor_item_type) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'id_distributor_item_type';
        }
        if ($this->isColumnModified(SpyDistributorItemTypeTableMap::COL_TYPE_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'type_key';
        }
        if ($this->isColumnModified(SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION)) {
            $modifiedColumns[':p' . $index++]  = 'last_distribution';
        }

        $sql = sprintf(
            'INSERT INTO spy_distributor_item_type (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_distributor_item_type':
                        $stmt->bindValue($identifier, $this->id_distributor_item_type, PDO::PARAM_INT);
                        break;
                    case 'type_key':
                        $stmt->bindValue($identifier, $this->type_key, PDO::PARAM_STR);
                        break;
                    case 'last_distribution':
                        $stmt->bindValue($identifier, $this->last_distribution ? $this->last_distribution->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_distributor_item_type_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdDistributorItemType($pk);

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
        $pos = SpyDistributorItemTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdDistributorItemType();
                break;
            case 1:
                return $this->getTypeKey();
                break;
            case 2:
                return $this->getLastDistribution();
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

        if (isset($alreadyDumpedObjects['SpyDistributorItemType'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyDistributorItemType'][$this->hashCode()] = true;
        $keys = SpyDistributorItemTypeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdDistributorItemType(),
            $keys[1] => $this->getTypeKey(),
            $keys[2] => $this->getLastDistribution(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[2]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[2]];
            $result[$keys[2]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSpyDistributorItems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyDistributorItems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_distributor_items';
                        break;
                    default:
                        $key = 'SpyDistributorItems';
                }

                $result[$key] = $this->collSpyDistributorItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyDistributorItemType
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyDistributorItemTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyDistributorItemType
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdDistributorItemType($value);
                break;
            case 1:
                $this->setTypeKey($value);
                break;
            case 2:
                $this->setLastDistribution($value);
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
        $keys = SpyDistributorItemTypeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdDistributorItemType($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTypeKey($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLastDistribution($arr[$keys[2]]);
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
     * @return $this|\Propel\SpyDistributorItemType The current object, for fluid interface
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
        $criteria = new Criteria(SpyDistributorItemTypeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE)) {
            $criteria->add(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $this->id_distributor_item_type);
        }
        if ($this->isColumnModified(SpyDistributorItemTypeTableMap::COL_TYPE_KEY)) {
            $criteria->add(SpyDistributorItemTypeTableMap::COL_TYPE_KEY, $this->type_key);
        }
        if ($this->isColumnModified(SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION)) {
            $criteria->add(SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION, $this->last_distribution);
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
        $criteria = ChildSpyDistributorItemTypeQuery::create();
        $criteria->add(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $this->id_distributor_item_type);

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
        $validPk = null !== $this->getIdDistributorItemType();

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
        return $this->getIdDistributorItemType();
    }

    /**
     * Generic method to set the primary key (id_distributor_item_type column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdDistributorItemType($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdDistributorItemType();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyDistributorItemType (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTypeKey($this->getTypeKey());
        $copyObj->setLastDistribution($this->getLastDistribution());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyDistributorItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyDistributorItem($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdDistributorItemType(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyDistributorItemType Clone of current object.
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
        if ('SpyDistributorItem' == $relationName) {
            return $this->initSpyDistributorItems();
        }
    }

    /**
     * Clears out the collSpyDistributorItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyDistributorItems()
     */
    public function clearSpyDistributorItems()
    {
        $this->collSpyDistributorItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyDistributorItems collection loaded partially.
     */
    public function resetPartialSpyDistributorItems($v = true)
    {
        $this->collSpyDistributorItemsPartial = $v;
    }

    /**
     * Initializes the collSpyDistributorItems collection.
     *
     * By default this just sets the collSpyDistributorItems collection to an empty array (like clearcollSpyDistributorItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyDistributorItems($overrideExisting = true)
    {
        if (null !== $this->collSpyDistributorItems && !$overrideExisting) {
            return;
        }
        $this->collSpyDistributorItems = new ObjectCollection();
        $this->collSpyDistributorItems->setModel('\Propel\SpyDistributorItem');
    }

    /**
     * Gets an array of ChildSpyDistributorItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyDistributorItemType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyDistributorItem[] List of ChildSpyDistributorItem objects
     * @throws PropelException
     */
    public function getSpyDistributorItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyDistributorItemsPartial && !$this->isNew();
        if (null === $this->collSpyDistributorItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyDistributorItems) {
                // return empty collection
                $this->initSpyDistributorItems();
            } else {
                $collSpyDistributorItems = ChildSpyDistributorItemQuery::create(null, $criteria)
                    ->filterBySpyDistributorItemType($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyDistributorItemsPartial && count($collSpyDistributorItems)) {
                        $this->initSpyDistributorItems(false);

                        foreach ($collSpyDistributorItems as $obj) {
                            if (false == $this->collSpyDistributorItems->contains($obj)) {
                                $this->collSpyDistributorItems->append($obj);
                            }
                        }

                        $this->collSpyDistributorItemsPartial = true;
                    }

                    return $collSpyDistributorItems;
                }

                if ($partial && $this->collSpyDistributorItems) {
                    foreach ($this->collSpyDistributorItems as $obj) {
                        if ($obj->isNew()) {
                            $collSpyDistributorItems[] = $obj;
                        }
                    }
                }

                $this->collSpyDistributorItems = $collSpyDistributorItems;
                $this->collSpyDistributorItemsPartial = false;
            }
        }

        return $this->collSpyDistributorItems;
    }

    /**
     * Sets a collection of ChildSpyDistributorItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyDistributorItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyDistributorItemType The current object (for fluent API support)
     */
    public function setSpyDistributorItems(Collection $spyDistributorItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpyDistributorItem[] $spyDistributorItemsToDelete */
        $spyDistributorItemsToDelete = $this->getSpyDistributorItems(new Criteria(), $con)->diff($spyDistributorItems);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyDistributorItemsScheduledForDeletion = clone $spyDistributorItemsToDelete;

        foreach ($spyDistributorItemsToDelete as $spyDistributorItemRemoved) {
            $spyDistributorItemRemoved->setSpyDistributorItemType(null);
        }

        $this->collSpyDistributorItems = null;
        foreach ($spyDistributorItems as $spyDistributorItem) {
            $this->addSpyDistributorItem($spyDistributorItem);
        }

        $this->collSpyDistributorItems = $spyDistributorItems;
        $this->collSpyDistributorItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyDistributorItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyDistributorItem objects.
     * @throws PropelException
     */
    public function countSpyDistributorItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyDistributorItemsPartial && !$this->isNew();
        if (null === $this->collSpyDistributorItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyDistributorItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyDistributorItems());
            }

            $query = ChildSpyDistributorItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyDistributorItemType($this)
                ->count($con);
        }

        return count($this->collSpyDistributorItems);
    }

    /**
     * Method called to associate a ChildSpyDistributorItem object to this object
     * through the ChildSpyDistributorItem foreign key attribute.
     *
     * @param  ChildSpyDistributorItem $l ChildSpyDistributorItem
     * @return $this|\Propel\SpyDistributorItemType The current object (for fluent API support)
     */
    public function addSpyDistributorItem(ChildSpyDistributorItem $l)
    {
        if ($this->collSpyDistributorItems === null) {
            $this->initSpyDistributorItems();
            $this->collSpyDistributorItemsPartial = true;
        }

        if (!$this->collSpyDistributorItems->contains($l)) {
            $this->doAddSpyDistributorItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyDistributorItem $spyDistributorItem The ChildSpyDistributorItem object to add.
     */
    protected function doAddSpyDistributorItem(ChildSpyDistributorItem $spyDistributorItem)
    {
        $this->collSpyDistributorItems[]= $spyDistributorItem;
        $spyDistributorItem->setSpyDistributorItemType($this);
    }

    /**
     * @param  ChildSpyDistributorItem $spyDistributorItem The ChildSpyDistributorItem object to remove.
     * @return $this|ChildSpyDistributorItemType The current object (for fluent API support)
     */
    public function removeSpyDistributorItem(ChildSpyDistributorItem $spyDistributorItem)
    {
        if ($this->getSpyDistributorItems()->contains($spyDistributorItem)) {
            $pos = $this->collSpyDistributorItems->search($spyDistributorItem);
            $this->collSpyDistributorItems->remove($pos);
            if (null === $this->spyDistributorItemsScheduledForDeletion) {
                $this->spyDistributorItemsScheduledForDeletion = clone $this->collSpyDistributorItems;
                $this->spyDistributorItemsScheduledForDeletion->clear();
            }
            $this->spyDistributorItemsScheduledForDeletion[]= clone $spyDistributorItem;
            $spyDistributorItem->setSpyDistributorItemType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyDistributorItemType is new, it will return
     * an empty collection; or if this SpyDistributorItemType has previously
     * been saved, it will retrieve related SpyDistributorItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyDistributorItemType.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyDistributorItem[] List of ChildSpyDistributorItem objects
     */
    public function getSpyDistributorItemsJoinSpyGlossaryTranslation(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyDistributorItemQuery::create(null, $criteria);
        $query->joinWith('SpyGlossaryTranslation', $joinBehavior);

        return $this->getSpyDistributorItems($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id_distributor_item_type = null;
        $this->type_key = null;
        $this->last_distribution = null;
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
            if ($this->collSpyDistributorItems) {
                foreach ($this->collSpyDistributorItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyDistributorItems = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyDistributorItemTypeTableMap::DEFAULT_STRING_FORMAT);
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
