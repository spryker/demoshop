<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyTaxRate as ChildSpyTaxRate;
use Propel\SpyTaxRateQuery as ChildSpyTaxRateQuery;
use Propel\SpyTaxSet as ChildSpyTaxSet;
use Propel\SpyTaxSetQuery as ChildSpyTaxSetQuery;
use Propel\SpyTaxSetTax as ChildSpyTaxSetTax;
use Propel\SpyTaxSetTaxQuery as ChildSpyTaxSetTaxQuery;
use Propel\Map\SpyTaxRateTableMap;
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
 * Base class that represents a row from the 'spy_tax_rate' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyTaxRate extends SpyTaxRate implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyTaxRateTableMap';


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
     * The value for the id_tax_rate field.
     * @var        int
     */
    protected $id_tax_rate;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the rate field.
     * Note: this column has a database default value of: '0.0'
     * @var        string
     */
    protected $rate;

    /**
     * @var        ObjectCollection|ChildSpyTaxSetTax[] Collection to store aggregation of ChildSpyTaxSetTax objects.
     */
    protected $collSpyTaxSetTaxes;
    protected $collSpyTaxSetTaxesPartial;

    /**
     * @var        ObjectCollection|ChildSpyTaxSet[] Cross Collection to store aggregation of ChildSpyTaxSet objects.
     */
    protected $collSpyTaxSets;

    /**
     * @var bool
     */
    protected $collSpyTaxSetsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyTaxSet[]
     */
    protected $spyTaxSetsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyTaxSetTax[]
     */
    protected $spyTaxSetTaxesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->rate = '0.0';
    }

    /**
     * Initializes internal state of Propel\Base\SpyTaxRate object.
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
     * Compares this with another <code>SpyTaxRate</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyTaxRate</code>, delegates to
     * <code>equals(SpyTaxRate)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyTaxRate The current object, for fluid interface
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
     * Get the [id_tax_rate] column value.
     *
     * @return int
     */
    public function getIdTaxRate()
    {
        return $this->id_tax_rate;
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
     * Get the [rate] column value.
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of [id_tax_rate] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyTaxRate The current object (for fluent API support)
     */
    public function setIdTaxRate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_tax_rate !== $v) {
            $this->id_tax_rate = $v;
            $this->modifiedColumns[SpyTaxRateTableMap::COL_ID_TAX_RATE] = true;
        }

        return $this;
    } // setIdTaxRate()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyTaxRate The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpyTaxRateTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [rate] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyTaxRate The current object (for fluent API support)
     */
    public function setRate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rate !== $v) {
            $this->rate = $v;
            $this->modifiedColumns[SpyTaxRateTableMap::COL_RATE] = true;
        }

        return $this;
    } // setRate()

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
            if ($this->rate !== '0.0') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyTaxRateTableMap::translateFieldName('IdTaxRate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_tax_rate = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyTaxRateTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyTaxRateTableMap::translateFieldName('Rate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rate = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = SpyTaxRateTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyTaxRate'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyTaxRateTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyTaxRateQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSpyTaxSetTaxes = null;

            $this->collSpyTaxSets = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyTaxRate::setDeleted()
     * @see SpyTaxRate::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxRateTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyTaxRateQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxRateTableMap::DATABASE_NAME);
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
                SpyTaxRateTableMap::addInstanceToPool($this);
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

            if ($this->spyTaxSetsScheduledForDeletion !== null) {
                if (!$this->spyTaxSetsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->spyTaxSetsScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[1] = $this->getIdTaxRate();
                        $entryPk[0] = $entry->getIdTaxSet();
                        $pks[] = $entryPk;
                    }

                    \Propel\SpyTaxSetTaxQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->spyTaxSetsScheduledForDeletion = null;
                }

            }

            if ($this->collSpyTaxSets) {
                foreach ($this->collSpyTaxSets as $spyTaxSet) {
                    if (!$spyTaxSet->isDeleted() && ($spyTaxSet->isNew() || $spyTaxSet->isModified())) {
                        $spyTaxSet->save($con);
                    }
                }
            }


            if ($this->spyTaxSetTaxesScheduledForDeletion !== null) {
                if (!$this->spyTaxSetTaxesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyTaxSetTaxQuery::create()
                        ->filterByPrimaryKeys($this->spyTaxSetTaxesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyTaxSetTaxesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyTaxSetTaxes !== null) {
                foreach ($this->collSpyTaxSetTaxes as $referrerFK) {
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

        $this->modifiedColumns[SpyTaxRateTableMap::COL_ID_TAX_RATE] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyTaxRateTableMap::COL_ID_TAX_RATE)) {
            $modifiedColumns[':p' . $index++]  = 'id_tax_rate';
        }
        if ($this->isColumnModified(SpyTaxRateTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SpyTaxRateTableMap::COL_RATE)) {
            $modifiedColumns[':p' . $index++]  = 'rate';
        }

        $sql = sprintf(
            'INSERT INTO spy_tax_rate (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_tax_rate':
                        $stmt->bindValue($identifier, $this->id_tax_rate, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'rate':
                        $stmt->bindValue($identifier, $this->rate, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_tax_rate_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdTaxRate($pk);
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
        $pos = SpyTaxRateTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdTaxRate();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getRate();
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

        if (isset($alreadyDumpedObjects['SpyTaxRate'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyTaxRate'][$this->hashCode()] = true;
        $keys = SpyTaxRateTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdTaxRate(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getRate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSpyTaxSetTaxes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTaxSetTaxes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_tax_set_taxes';
                        break;
                    default:
                        $key = 'SpyTaxSetTaxes';
                }

                $result[$key] = $this->collSpyTaxSetTaxes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyTaxRate
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyTaxRateTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyTaxRate
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdTaxRate($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setRate($value);
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
        $keys = SpyTaxRateTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdTaxRate($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setRate($arr[$keys[2]]);
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
     * @return $this|\Propel\SpyTaxRate The current object, for fluid interface
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
        $criteria = new Criteria(SpyTaxRateTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyTaxRateTableMap::COL_ID_TAX_RATE)) {
            $criteria->add(SpyTaxRateTableMap::COL_ID_TAX_RATE, $this->id_tax_rate);
        }
        if ($this->isColumnModified(SpyTaxRateTableMap::COL_NAME)) {
            $criteria->add(SpyTaxRateTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpyTaxRateTableMap::COL_RATE)) {
            $criteria->add(SpyTaxRateTableMap::COL_RATE, $this->rate);
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
        $criteria = ChildSpyTaxRateQuery::create();
        $criteria->add(SpyTaxRateTableMap::COL_ID_TAX_RATE, $this->id_tax_rate);

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
        $validPk = null !== $this->getIdTaxRate();

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
        return $this->getIdTaxRate();
    }

    /**
     * Generic method to set the primary key (id_tax_rate column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdTaxRate($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdTaxRate();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyTaxRate (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setRate($this->getRate());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyTaxSetTaxes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyTaxSetTax($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdTaxRate(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyTaxRate Clone of current object.
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
        if ('SpyTaxSetTax' == $relationName) {
            return $this->initSpyTaxSetTaxes();
        }
    }

    /**
     * Clears out the collSpyTaxSetTaxes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyTaxSetTaxes()
     */
    public function clearSpyTaxSetTaxes()
    {
        $this->collSpyTaxSetTaxes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyTaxSetTaxes collection loaded partially.
     */
    public function resetPartialSpyTaxSetTaxes($v = true)
    {
        $this->collSpyTaxSetTaxesPartial = $v;
    }

    /**
     * Initializes the collSpyTaxSetTaxes collection.
     *
     * By default this just sets the collSpyTaxSetTaxes collection to an empty array (like clearcollSpyTaxSetTaxes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyTaxSetTaxes($overrideExisting = true)
    {
        if (null !== $this->collSpyTaxSetTaxes && !$overrideExisting) {
            return;
        }
        $this->collSpyTaxSetTaxes = new ObjectCollection();
        $this->collSpyTaxSetTaxes->setModel('\Propel\SpyTaxSetTax');
    }

    /**
     * Gets an array of ChildSpyTaxSetTax objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyTaxRate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyTaxSetTax[] List of ChildSpyTaxSetTax objects
     * @throws PropelException
     */
    public function getSpyTaxSetTaxes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyTaxSetTaxesPartial && !$this->isNew();
        if (null === $this->collSpyTaxSetTaxes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyTaxSetTaxes) {
                // return empty collection
                $this->initSpyTaxSetTaxes();
            } else {
                $collSpyTaxSetTaxes = ChildSpyTaxSetTaxQuery::create(null, $criteria)
                    ->filterBySpyTaxRate($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyTaxSetTaxesPartial && count($collSpyTaxSetTaxes)) {
                        $this->initSpyTaxSetTaxes(false);

                        foreach ($collSpyTaxSetTaxes as $obj) {
                            if (false == $this->collSpyTaxSetTaxes->contains($obj)) {
                                $this->collSpyTaxSetTaxes->append($obj);
                            }
                        }

                        $this->collSpyTaxSetTaxesPartial = true;
                    }

                    return $collSpyTaxSetTaxes;
                }

                if ($partial && $this->collSpyTaxSetTaxes) {
                    foreach ($this->collSpyTaxSetTaxes as $obj) {
                        if ($obj->isNew()) {
                            $collSpyTaxSetTaxes[] = $obj;
                        }
                    }
                }

                $this->collSpyTaxSetTaxes = $collSpyTaxSetTaxes;
                $this->collSpyTaxSetTaxesPartial = false;
            }
        }

        return $this->collSpyTaxSetTaxes;
    }

    /**
     * Sets a collection of ChildSpyTaxSetTax objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyTaxSetTaxes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyTaxRate The current object (for fluent API support)
     */
    public function setSpyTaxSetTaxes(Collection $spyTaxSetTaxes, ConnectionInterface $con = null)
    {
        /** @var ChildSpyTaxSetTax[] $spyTaxSetTaxesToDelete */
        $spyTaxSetTaxesToDelete = $this->getSpyTaxSetTaxes(new Criteria(), $con)->diff($spyTaxSetTaxes);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyTaxSetTaxesScheduledForDeletion = clone $spyTaxSetTaxesToDelete;

        foreach ($spyTaxSetTaxesToDelete as $spyTaxSetTaxRemoved) {
            $spyTaxSetTaxRemoved->setSpyTaxRate(null);
        }

        $this->collSpyTaxSetTaxes = null;
        foreach ($spyTaxSetTaxes as $spyTaxSetTax) {
            $this->addSpyTaxSetTax($spyTaxSetTax);
        }

        $this->collSpyTaxSetTaxes = $spyTaxSetTaxes;
        $this->collSpyTaxSetTaxesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyTaxSetTax objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyTaxSetTax objects.
     * @throws PropelException
     */
    public function countSpyTaxSetTaxes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyTaxSetTaxesPartial && !$this->isNew();
        if (null === $this->collSpyTaxSetTaxes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyTaxSetTaxes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyTaxSetTaxes());
            }

            $query = ChildSpyTaxSetTaxQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyTaxRate($this)
                ->count($con);
        }

        return count($this->collSpyTaxSetTaxes);
    }

    /**
     * Method called to associate a ChildSpyTaxSetTax object to this object
     * through the ChildSpyTaxSetTax foreign key attribute.
     *
     * @param  ChildSpyTaxSetTax $l ChildSpyTaxSetTax
     * @return $this|\Propel\SpyTaxRate The current object (for fluent API support)
     */
    public function addSpyTaxSetTax(ChildSpyTaxSetTax $l)
    {
        if ($this->collSpyTaxSetTaxes === null) {
            $this->initSpyTaxSetTaxes();
            $this->collSpyTaxSetTaxesPartial = true;
        }

        if (!$this->collSpyTaxSetTaxes->contains($l)) {
            $this->doAddSpyTaxSetTax($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyTaxSetTax $spyTaxSetTax The ChildSpyTaxSetTax object to add.
     */
    protected function doAddSpyTaxSetTax(ChildSpyTaxSetTax $spyTaxSetTax)
    {
        $this->collSpyTaxSetTaxes[]= $spyTaxSetTax;
        $spyTaxSetTax->setSpyTaxRate($this);
    }

    /**
     * @param  ChildSpyTaxSetTax $spyTaxSetTax The ChildSpyTaxSetTax object to remove.
     * @return $this|ChildSpyTaxRate The current object (for fluent API support)
     */
    public function removeSpyTaxSetTax(ChildSpyTaxSetTax $spyTaxSetTax)
    {
        if ($this->getSpyTaxSetTaxes()->contains($spyTaxSetTax)) {
            $pos = $this->collSpyTaxSetTaxes->search($spyTaxSetTax);
            $this->collSpyTaxSetTaxes->remove($pos);
            if (null === $this->spyTaxSetTaxesScheduledForDeletion) {
                $this->spyTaxSetTaxesScheduledForDeletion = clone $this->collSpyTaxSetTaxes;
                $this->spyTaxSetTaxesScheduledForDeletion->clear();
            }
            $this->spyTaxSetTaxesScheduledForDeletion[]= clone $spyTaxSetTax;
            $spyTaxSetTax->setSpyTaxRate(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyTaxRate is new, it will return
     * an empty collection; or if this SpyTaxRate has previously
     * been saved, it will retrieve related SpyTaxSetTaxes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyTaxRate.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyTaxSetTax[] List of ChildSpyTaxSetTax objects
     */
    public function getSpyTaxSetTaxesJoinSpyTaxSet(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyTaxSetTaxQuery::create(null, $criteria);
        $query->joinWith('SpyTaxSet', $joinBehavior);

        return $this->getSpyTaxSetTaxes($query, $con);
    }

    /**
     * Clears out the collSpyTaxSets collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyTaxSets()
     */
    public function clearSpyTaxSets()
    {
        $this->collSpyTaxSets = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSpyTaxSets crossRef collection.
     *
     * By default this just sets the collSpyTaxSets collection to an empty collection (like clearSpyTaxSets());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initSpyTaxSets()
    {
        $this->collSpyTaxSets = new ObjectCollection();
        $this->collSpyTaxSetsPartial = true;

        $this->collSpyTaxSets->setModel('\Propel\SpyTaxSet');
    }

    /**
     * Checks if the collSpyTaxSets collection is loaded.
     *
     * @return bool
     */
    public function isSpyTaxSetsLoaded()
    {
        return null !== $this->collSpyTaxSets;
    }

    /**
     * Gets a collection of ChildSpyTaxSet objects related by a many-to-many relationship
     * to the current object by way of the spy_tax_set_tax cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyTaxRate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildSpyTaxSet[] List of ChildSpyTaxSet objects
     */
    public function getSpyTaxSets(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyTaxSetsPartial && !$this->isNew();
        if (null === $this->collSpyTaxSets || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collSpyTaxSets) {
                    $this->initSpyTaxSets();
                }
            } else {

                $query = ChildSpyTaxSetQuery::create(null, $criteria)
                    ->filterBySpyTaxRate($this);
                $collSpyTaxSets = $query->find($con);
                if (null !== $criteria) {
                    return $collSpyTaxSets;
                }

                if ($partial && $this->collSpyTaxSets) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collSpyTaxSets as $obj) {
                        if (!$collSpyTaxSets->contains($obj)) {
                            $collSpyTaxSets[] = $obj;
                        }
                    }
                }

                $this->collSpyTaxSets = $collSpyTaxSets;
                $this->collSpyTaxSetsPartial = false;
            }
        }

        return $this->collSpyTaxSets;
    }

    /**
     * Sets a collection of SpyTaxSet objects related by a many-to-many relationship
     * to the current object by way of the spy_tax_set_tax cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $spyTaxSets A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyTaxRate The current object (for fluent API support)
     */
    public function setSpyTaxSets(Collection $spyTaxSets, ConnectionInterface $con = null)
    {
        $this->clearSpyTaxSets();
        $currentSpyTaxSets = $this->getSpyTaxSets();

        $spyTaxSetsScheduledForDeletion = $currentSpyTaxSets->diff($spyTaxSets);

        foreach ($spyTaxSetsScheduledForDeletion as $toDelete) {
            $this->removeSpyTaxSet($toDelete);
        }

        foreach ($spyTaxSets as $spyTaxSet) {
            if (!$currentSpyTaxSets->contains($spyTaxSet)) {
                $this->doAddSpyTaxSet($spyTaxSet);
            }
        }

        $this->collSpyTaxSetsPartial = false;
        $this->collSpyTaxSets = $spyTaxSets;

        return $this;
    }

    /**
     * Gets the number of SpyTaxSet objects related by a many-to-many relationship
     * to the current object by way of the spy_tax_set_tax cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related SpyTaxSet objects
     */
    public function countSpyTaxSets(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyTaxSetsPartial && !$this->isNew();
        if (null === $this->collSpyTaxSets || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyTaxSets) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getSpyTaxSets());
                }

                $query = ChildSpyTaxSetQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySpyTaxRate($this)
                    ->count($con);
            }
        } else {
            return count($this->collSpyTaxSets);
        }
    }

    /**
     * Associate a ChildSpyTaxSet to this object
     * through the spy_tax_set_tax cross reference table.
     *
     * @param ChildSpyTaxSet $spyTaxSet
     * @return ChildSpyTaxRate The current object (for fluent API support)
     */
    public function addSpyTaxSet(ChildSpyTaxSet $spyTaxSet)
    {
        if ($this->collSpyTaxSets === null) {
            $this->initSpyTaxSets();
        }

        if (!$this->getSpyTaxSets()->contains($spyTaxSet)) {
            // only add it if the **same** object is not already associated
            $this->collSpyTaxSets->push($spyTaxSet);
            $this->doAddSpyTaxSet($spyTaxSet);
        }

        return $this;
    }

    /**
     *
     * @param ChildSpyTaxSet $spyTaxSet
     */
    protected function doAddSpyTaxSet(ChildSpyTaxSet $spyTaxSet)
    {
        $spyTaxSetTax = new ChildSpyTaxSetTax();

        $spyTaxSetTax->setSpyTaxSet($spyTaxSet);

        $spyTaxSetTax->setSpyTaxRate($this);

        $this->addSpyTaxSetTax($spyTaxSetTax);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$spyTaxSet->isSpyTaxRatesLoaded()) {
            $spyTaxSet->initSpyTaxRates();
            $spyTaxSet->getSpyTaxRates()->push($this);
        } elseif (!$spyTaxSet->getSpyTaxRates()->contains($this)) {
            $spyTaxSet->getSpyTaxRates()->push($this);
        }

    }

    /**
     * Remove spyTaxSet of this object
     * through the spy_tax_set_tax cross reference table.
     *
     * @param ChildSpyTaxSet $spyTaxSet
     * @return ChildSpyTaxRate The current object (for fluent API support)
     */
    public function removeSpyTaxSet(ChildSpyTaxSet $spyTaxSet)
    {
        if ($this->getSpyTaxSets()->contains($spyTaxSet)) { $spyTaxSetTax = new ChildSpyTaxSetTax();

            $spyTaxSetTax->setSpyTaxSet($spyTaxSet);
            if ($spyTaxSet->isSpyTaxRatesLoaded()) {
                //remove the back reference if available
                $spyTaxSet->getSpyTaxRates()->removeObject($this);
            }

            $spyTaxSetTax->setSpyTaxRate($this);
            $this->removeSpyTaxSetTax(clone $spyTaxSetTax);
            $spyTaxSetTax->clear();

            $this->collSpyTaxSets->remove($this->collSpyTaxSets->search($spyTaxSet));

            if (null === $this->spyTaxSetsScheduledForDeletion) {
                $this->spyTaxSetsScheduledForDeletion = clone $this->collSpyTaxSets;
                $this->spyTaxSetsScheduledForDeletion->clear();
            }

            $this->spyTaxSetsScheduledForDeletion->push($spyTaxSet);
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
        $this->id_tax_rate = null;
        $this->name = null;
        $this->rate = null;
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
            if ($this->collSpyTaxSetTaxes) {
                foreach ($this->collSpyTaxSetTaxes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyTaxSets) {
                foreach ($this->collSpyTaxSets as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyTaxSetTaxes = null;
        $this->collSpyTaxSets = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyTaxRateTableMap::DEFAULT_STRING_FORMAT);
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
