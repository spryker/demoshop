<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionType as ChildSpyProductOptionType;
use Propel\SpyProductOptionTypeQuery as ChildSpyProductOptionTypeQuery;
use Propel\SpyProductOptionTypeTranslation as ChildSpyProductOptionTypeTranslation;
use Propel\SpyProductOptionTypeTranslationQuery as ChildSpyProductOptionTypeTranslationQuery;
use Propel\SpyProductOptionTypeUsage as ChildSpyProductOptionTypeUsage;
use Propel\SpyProductOptionTypeUsageQuery as ChildSpyProductOptionTypeUsageQuery;
use Propel\SpyProductOptionValue as ChildSpyProductOptionValue;
use Propel\SpyProductOptionValueQuery as ChildSpyProductOptionValueQuery;
use Propel\SpyTaxSet as ChildSpyTaxSet;
use Propel\SpyTaxSetQuery as ChildSpyTaxSetQuery;
use Propel\Map\SpyProductOptionTypeTableMap;
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
 * Base class that represents a row from the 'spy_product_option_type' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyProductOptionType extends SpyProductOptionType implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyProductOptionTypeTableMap';


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
     * The value for the id_product_option_type field.
     * @var        int
     */
    protected $id_product_option_type;

    /**
     * The value for the import_key field.
     * @var        string
     */
    protected $import_key;

    /**
     * The value for the fk_tax_set field.
     * @var        int
     */
    protected $fk_tax_set;

    /**
     * @var        ChildSpyTaxSet
     */
    protected $aSpyTaxSet;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionValue[] Collection to store aggregation of ChildSpyProductOptionValue objects.
     */
    protected $collSpyProductOptionValues;
    protected $collSpyProductOptionValuesPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionTypeTranslation[] Collection to store aggregation of ChildSpyProductOptionTypeTranslation objects.
     */
    protected $collSpyProductOptionTypeTranslations;
    protected $collSpyProductOptionTypeTranslationsPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionTypeUsage[] Collection to store aggregation of ChildSpyProductOptionTypeUsage objects.
     */
    protected $collSpyProductOptionTypeUsages;
    protected $collSpyProductOptionTypeUsagesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionValue[]
     */
    protected $spyProductOptionValuesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionTypeTranslation[]
     */
    protected $spyProductOptionTypeTranslationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionTypeUsage[]
     */
    protected $spyProductOptionTypeUsagesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyProductOptionType object.
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
     * Compares this with another <code>SpyProductOptionType</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyProductOptionType</code>, delegates to
     * <code>equals(SpyProductOptionType)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyProductOptionType The current object, for fluid interface
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
     * Get the [id_product_option_type] column value.
     *
     * @return int
     */
    public function getIdProductOptionType()
    {
        return $this->id_product_option_type;
    }

    /**
     * Get the [import_key] column value.
     *
     * @return string
     */
    public function getImportKey()
    {
        return $this->import_key;
    }

    /**
     * Get the [fk_tax_set] column value.
     *
     * @return int
     */
    public function getFkTaxSet()
    {
        return $this->fk_tax_set;
    }

    /**
     * Set the value of [id_product_option_type] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionType The current object (for fluent API support)
     */
    public function setIdProductOptionType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_product_option_type !== $v) {
            $this->id_product_option_type = $v;
            $this->modifiedColumns[SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE] = true;
        }

        return $this;
    } // setIdProductOptionType()

    /**
     * Set the value of [import_key] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyProductOptionType The current object (for fluent API support)
     */
    public function setImportKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->import_key !== $v) {
            $this->import_key = $v;
            $this->modifiedColumns[SpyProductOptionTypeTableMap::COL_IMPORT_KEY] = true;
        }

        return $this;
    } // setImportKey()

    /**
     * Set the value of [fk_tax_set] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionType The current object (for fluent API support)
     */
    public function setFkTaxSet($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_tax_set !== $v) {
            $this->fk_tax_set = $v;
            $this->modifiedColumns[SpyProductOptionTypeTableMap::COL_FK_TAX_SET] = true;
        }

        if ($this->aSpyTaxSet !== null && $this->aSpyTaxSet->getIdTaxSet() !== $v) {
            $this->aSpyTaxSet = null;
        }

        return $this;
    } // setFkTaxSet()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyProductOptionTypeTableMap::translateFieldName('IdProductOptionType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_product_option_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyProductOptionTypeTableMap::translateFieldName('ImportKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->import_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyProductOptionTypeTableMap::translateFieldName('FkTaxSet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_tax_set = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = SpyProductOptionTypeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyProductOptionType'), 0, $e);
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
        if ($this->aSpyTaxSet !== null && $this->fk_tax_set !== $this->aSpyTaxSet->getIdTaxSet()) {
            $this->aSpyTaxSet = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionTypeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyProductOptionTypeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyTaxSet = null;
            $this->collSpyProductOptionValues = null;

            $this->collSpyProductOptionTypeTranslations = null;

            $this->collSpyProductOptionTypeUsages = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyProductOptionType::setDeleted()
     * @see SpyProductOptionType::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyProductOptionTypeQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeTableMap::DATABASE_NAME);
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
                SpyProductOptionTypeTableMap::addInstanceToPool($this);
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

            if ($this->aSpyTaxSet !== null) {
                if ($this->aSpyTaxSet->isModified() || $this->aSpyTaxSet->isNew()) {
                    $affectedRows += $this->aSpyTaxSet->save($con);
                }
                $this->setSpyTaxSet($this->aSpyTaxSet);
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

            if ($this->spyProductOptionValuesScheduledForDeletion !== null) {
                if (!$this->spyProductOptionValuesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionValueQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionValuesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionValuesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionValues !== null) {
                foreach ($this->collSpyProductOptionValues as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductOptionTypeTranslationsScheduledForDeletion !== null) {
                if (!$this->spyProductOptionTypeTranslationsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionTypeTranslationQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionTypeTranslationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionTypeTranslationsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionTypeTranslations !== null) {
                foreach ($this->collSpyProductOptionTypeTranslations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductOptionTypeUsagesScheduledForDeletion !== null) {
                if (!$this->spyProductOptionTypeUsagesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionTypeUsageQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionTypeUsagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionTypeUsagesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionTypeUsages !== null) {
                foreach ($this->collSpyProductOptionTypeUsages as $referrerFK) {
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

        $this->modifiedColumns[SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'id_product_option_type';
        }
        if ($this->isColumnModified(SpyProductOptionTypeTableMap::COL_IMPORT_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'import_key';
        }
        if ($this->isColumnModified(SpyProductOptionTypeTableMap::COL_FK_TAX_SET)) {
            $modifiedColumns[':p' . $index++]  = 'fk_tax_set';
        }

        $sql = sprintf(
            'INSERT INTO spy_product_option_type (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_product_option_type':
                        $stmt->bindValue($identifier, $this->id_product_option_type, PDO::PARAM_INT);
                        break;
                    case 'import_key':
                        $stmt->bindValue($identifier, $this->import_key, PDO::PARAM_STR);
                        break;
                    case 'fk_tax_set':
                        $stmt->bindValue($identifier, $this->fk_tax_set, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_product_option_type_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdProductOptionType($pk);
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
        $pos = SpyProductOptionTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdProductOptionType();
                break;
            case 1:
                return $this->getImportKey();
                break;
            case 2:
                return $this->getFkTaxSet();
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

        if (isset($alreadyDumpedObjects['SpyProductOptionType'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyProductOptionType'][$this->hashCode()] = true;
        $keys = SpyProductOptionTypeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProductOptionType(),
            $keys[1] => $this->getImportKey(),
            $keys[2] => $this->getFkTaxSet(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyTaxSet) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTaxSet';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_tax_set';
                        break;
                    default:
                        $key = 'SpyTaxSet';
                }

                $result[$key] = $this->aSpyTaxSet->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpyProductOptionValues) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionValues';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_values';
                        break;
                    default:
                        $key = 'SpyProductOptionValues';
                }

                $result[$key] = $this->collSpyProductOptionValues->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionTypeTranslations) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionTypeTranslations';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_type_translations';
                        break;
                    default:
                        $key = 'SpyProductOptionTypeTranslations';
                }

                $result[$key] = $this->collSpyProductOptionTypeTranslations->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionTypeUsages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionTypeUsages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_type_usages';
                        break;
                    default:
                        $key = 'SpyProductOptionTypeUsages';
                }

                $result[$key] = $this->collSpyProductOptionTypeUsages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyProductOptionType
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyProductOptionTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyProductOptionType
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProductOptionType($value);
                break;
            case 1:
                $this->setImportKey($value);
                break;
            case 2:
                $this->setFkTaxSet($value);
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
        $keys = SpyProductOptionTypeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdProductOptionType($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setImportKey($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkTaxSet($arr[$keys[2]]);
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
     * @return $this|\Propel\SpyProductOptionType The current object, for fluid interface
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
        $criteria = new Criteria(SpyProductOptionTypeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE)) {
            $criteria->add(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $this->id_product_option_type);
        }
        if ($this->isColumnModified(SpyProductOptionTypeTableMap::COL_IMPORT_KEY)) {
            $criteria->add(SpyProductOptionTypeTableMap::COL_IMPORT_KEY, $this->import_key);
        }
        if ($this->isColumnModified(SpyProductOptionTypeTableMap::COL_FK_TAX_SET)) {
            $criteria->add(SpyProductOptionTypeTableMap::COL_FK_TAX_SET, $this->fk_tax_set);
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
        $criteria = ChildSpyProductOptionTypeQuery::create();
        $criteria->add(SpyProductOptionTypeTableMap::COL_ID_PRODUCT_OPTION_TYPE, $this->id_product_option_type);

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
        $validPk = null !== $this->getIdProductOptionType();

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
        return $this->getIdProductOptionType();
    }

    /**
     * Generic method to set the primary key (id_product_option_type column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProductOptionType($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdProductOptionType();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyProductOptionType (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setImportKey($this->getImportKey());
        $copyObj->setFkTaxSet($this->getFkTaxSet());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyProductOptionValues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionValue($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionTypeTranslations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionTypeTranslation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionTypeUsages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionTypeUsage($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdProductOptionType(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyProductOptionType Clone of current object.
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
     * Declares an association between this object and a ChildSpyTaxSet object.
     *
     * @param  ChildSpyTaxSet $v
     * @return $this|\Propel\SpyProductOptionType The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyTaxSet(ChildSpyTaxSet $v = null)
    {
        if ($v === null) {
            $this->setFkTaxSet(NULL);
        } else {
            $this->setFkTaxSet($v->getIdTaxSet());
        }

        $this->aSpyTaxSet = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyTaxSet object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProductOptionType($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyTaxSet object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyTaxSet The associated ChildSpyTaxSet object.
     * @throws PropelException
     */
    public function getSpyTaxSet(ConnectionInterface $con = null)
    {
        if ($this->aSpyTaxSet === null && ($this->fk_tax_set !== null)) {
            $this->aSpyTaxSet = ChildSpyTaxSetQuery::create()->findPk($this->fk_tax_set, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyTaxSet->addSpyProductOptionTypes($this);
             */
        }

        return $this->aSpyTaxSet;
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
        if ('SpyProductOptionValue' == $relationName) {
            return $this->initSpyProductOptionValues();
        }
        if ('SpyProductOptionTypeTranslation' == $relationName) {
            return $this->initSpyProductOptionTypeTranslations();
        }
        if ('SpyProductOptionTypeUsage' == $relationName) {
            return $this->initSpyProductOptionTypeUsages();
        }
    }

    /**
     * Clears out the collSpyProductOptionValues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionValues()
     */
    public function clearSpyProductOptionValues()
    {
        $this->collSpyProductOptionValues = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionValues collection loaded partially.
     */
    public function resetPartialSpyProductOptionValues($v = true)
    {
        $this->collSpyProductOptionValuesPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionValues collection.
     *
     * By default this just sets the collSpyProductOptionValues collection to an empty array (like clearcollSpyProductOptionValues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionValues($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionValues && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionValues = new ObjectCollection();
        $this->collSpyProductOptionValues->setModel('\Propel\SpyProductOptionValue');
    }

    /**
     * Gets an array of ChildSpyProductOptionValue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionValue[] List of ChildSpyProductOptionValue objects
     * @throws PropelException
     */
    public function getSpyProductOptionValues(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValuesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValues) {
                // return empty collection
                $this->initSpyProductOptionValues();
            } else {
                $collSpyProductOptionValues = ChildSpyProductOptionValueQuery::create(null, $criteria)
                    ->filterBySpyProductOptionType($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionValuesPartial && count($collSpyProductOptionValues)) {
                        $this->initSpyProductOptionValues(false);

                        foreach ($collSpyProductOptionValues as $obj) {
                            if (false == $this->collSpyProductOptionValues->contains($obj)) {
                                $this->collSpyProductOptionValues->append($obj);
                            }
                        }

                        $this->collSpyProductOptionValuesPartial = true;
                    }

                    return $collSpyProductOptionValues;
                }

                if ($partial && $this->collSpyProductOptionValues) {
                    foreach ($this->collSpyProductOptionValues as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionValues[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionValues = $collSpyProductOptionValues;
                $this->collSpyProductOptionValuesPartial = false;
            }
        }

        return $this->collSpyProductOptionValues;
    }

    /**
     * Sets a collection of ChildSpyProductOptionValue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionValues A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionType The current object (for fluent API support)
     */
    public function setSpyProductOptionValues(Collection $spyProductOptionValues, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionValue[] $spyProductOptionValuesToDelete */
        $spyProductOptionValuesToDelete = $this->getSpyProductOptionValues(new Criteria(), $con)->diff($spyProductOptionValues);


        $this->spyProductOptionValuesScheduledForDeletion = $spyProductOptionValuesToDelete;

        foreach ($spyProductOptionValuesToDelete as $spyProductOptionValueRemoved) {
            $spyProductOptionValueRemoved->setSpyProductOptionType(null);
        }

        $this->collSpyProductOptionValues = null;
        foreach ($spyProductOptionValues as $spyProductOptionValue) {
            $this->addSpyProductOptionValue($spyProductOptionValue);
        }

        $this->collSpyProductOptionValues = $spyProductOptionValues;
        $this->collSpyProductOptionValuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionValue objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionValue objects.
     * @throws PropelException
     */
    public function countSpyProductOptionValues(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValuesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValues) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionValues());
            }

            $query = ChildSpyProductOptionValueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductOptionType($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionValues);
    }

    /**
     * Method called to associate a ChildSpyProductOptionValue object to this object
     * through the ChildSpyProductOptionValue foreign key attribute.
     *
     * @param  ChildSpyProductOptionValue $l ChildSpyProductOptionValue
     * @return $this|\Propel\SpyProductOptionType The current object (for fluent API support)
     */
    public function addSpyProductOptionValue(ChildSpyProductOptionValue $l)
    {
        if ($this->collSpyProductOptionValues === null) {
            $this->initSpyProductOptionValues();
            $this->collSpyProductOptionValuesPartial = true;
        }

        if (!$this->collSpyProductOptionValues->contains($l)) {
            $this->doAddSpyProductOptionValue($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionValue $spyProductOptionValue The ChildSpyProductOptionValue object to add.
     */
    protected function doAddSpyProductOptionValue(ChildSpyProductOptionValue $spyProductOptionValue)
    {
        $this->collSpyProductOptionValues[]= $spyProductOptionValue;
        $spyProductOptionValue->setSpyProductOptionType($this);
    }

    /**
     * @param  ChildSpyProductOptionValue $spyProductOptionValue The ChildSpyProductOptionValue object to remove.
     * @return $this|ChildSpyProductOptionType The current object (for fluent API support)
     */
    public function removeSpyProductOptionValue(ChildSpyProductOptionValue $spyProductOptionValue)
    {
        if ($this->getSpyProductOptionValues()->contains($spyProductOptionValue)) {
            $pos = $this->collSpyProductOptionValues->search($spyProductOptionValue);
            $this->collSpyProductOptionValues->remove($pos);
            if (null === $this->spyProductOptionValuesScheduledForDeletion) {
                $this->spyProductOptionValuesScheduledForDeletion = clone $this->collSpyProductOptionValues;
                $this->spyProductOptionValuesScheduledForDeletion->clear();
            }
            $this->spyProductOptionValuesScheduledForDeletion[]= clone $spyProductOptionValue;
            $spyProductOptionValue->setSpyProductOptionType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProductOptionType is new, it will return
     * an empty collection; or if this SpyProductOptionType has previously
     * been saved, it will retrieve related SpyProductOptionValues from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProductOptionType.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionValue[] List of ChildSpyProductOptionValue objects
     */
    public function getSpyProductOptionValuesJoinSpyProductOptionValuePrice(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionValueQuery::create(null, $criteria);
        $query->joinWith('SpyProductOptionValuePrice', $joinBehavior);

        return $this->getSpyProductOptionValues($query, $con);
    }

    /**
     * Clears out the collSpyProductOptionTypeTranslations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionTypeTranslations()
     */
    public function clearSpyProductOptionTypeTranslations()
    {
        $this->collSpyProductOptionTypeTranslations = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionTypeTranslations collection loaded partially.
     */
    public function resetPartialSpyProductOptionTypeTranslations($v = true)
    {
        $this->collSpyProductOptionTypeTranslationsPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionTypeTranslations collection.
     *
     * By default this just sets the collSpyProductOptionTypeTranslations collection to an empty array (like clearcollSpyProductOptionTypeTranslations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionTypeTranslations($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionTypeTranslations && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionTypeTranslations = new ObjectCollection();
        $this->collSpyProductOptionTypeTranslations->setModel('\Propel\SpyProductOptionTypeTranslation');
    }

    /**
     * Gets an array of ChildSpyProductOptionTypeTranslation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionTypeTranslation[] List of ChildSpyProductOptionTypeTranslation objects
     * @throws PropelException
     */
    public function getSpyProductOptionTypeTranslations(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeTranslationsPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeTranslations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeTranslations) {
                // return empty collection
                $this->initSpyProductOptionTypeTranslations();
            } else {
                $collSpyProductOptionTypeTranslations = ChildSpyProductOptionTypeTranslationQuery::create(null, $criteria)
                    ->filterBySpyProductOptionType($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionTypeTranslationsPartial && count($collSpyProductOptionTypeTranslations)) {
                        $this->initSpyProductOptionTypeTranslations(false);

                        foreach ($collSpyProductOptionTypeTranslations as $obj) {
                            if (false == $this->collSpyProductOptionTypeTranslations->contains($obj)) {
                                $this->collSpyProductOptionTypeTranslations->append($obj);
                            }
                        }

                        $this->collSpyProductOptionTypeTranslationsPartial = true;
                    }

                    return $collSpyProductOptionTypeTranslations;
                }

                if ($partial && $this->collSpyProductOptionTypeTranslations) {
                    foreach ($this->collSpyProductOptionTypeTranslations as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionTypeTranslations[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionTypeTranslations = $collSpyProductOptionTypeTranslations;
                $this->collSpyProductOptionTypeTranslationsPartial = false;
            }
        }

        return $this->collSpyProductOptionTypeTranslations;
    }

    /**
     * Sets a collection of ChildSpyProductOptionTypeTranslation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionTypeTranslations A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionType The current object (for fluent API support)
     */
    public function setSpyProductOptionTypeTranslations(Collection $spyProductOptionTypeTranslations, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionTypeTranslation[] $spyProductOptionTypeTranslationsToDelete */
        $spyProductOptionTypeTranslationsToDelete = $this->getSpyProductOptionTypeTranslations(new Criteria(), $con)->diff($spyProductOptionTypeTranslations);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductOptionTypeTranslationsScheduledForDeletion = clone $spyProductOptionTypeTranslationsToDelete;

        foreach ($spyProductOptionTypeTranslationsToDelete as $spyProductOptionTypeTranslationRemoved) {
            $spyProductOptionTypeTranslationRemoved->setSpyProductOptionType(null);
        }

        $this->collSpyProductOptionTypeTranslations = null;
        foreach ($spyProductOptionTypeTranslations as $spyProductOptionTypeTranslation) {
            $this->addSpyProductOptionTypeTranslation($spyProductOptionTypeTranslation);
        }

        $this->collSpyProductOptionTypeTranslations = $spyProductOptionTypeTranslations;
        $this->collSpyProductOptionTypeTranslationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionTypeTranslation objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionTypeTranslation objects.
     * @throws PropelException
     */
    public function countSpyProductOptionTypeTranslations(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeTranslationsPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeTranslations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeTranslations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionTypeTranslations());
            }

            $query = ChildSpyProductOptionTypeTranslationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductOptionType($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionTypeTranslations);
    }

    /**
     * Method called to associate a ChildSpyProductOptionTypeTranslation object to this object
     * through the ChildSpyProductOptionTypeTranslation foreign key attribute.
     *
     * @param  ChildSpyProductOptionTypeTranslation $l ChildSpyProductOptionTypeTranslation
     * @return $this|\Propel\SpyProductOptionType The current object (for fluent API support)
     */
    public function addSpyProductOptionTypeTranslation(ChildSpyProductOptionTypeTranslation $l)
    {
        if ($this->collSpyProductOptionTypeTranslations === null) {
            $this->initSpyProductOptionTypeTranslations();
            $this->collSpyProductOptionTypeTranslationsPartial = true;
        }

        if (!$this->collSpyProductOptionTypeTranslations->contains($l)) {
            $this->doAddSpyProductOptionTypeTranslation($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionTypeTranslation $spyProductOptionTypeTranslation The ChildSpyProductOptionTypeTranslation object to add.
     */
    protected function doAddSpyProductOptionTypeTranslation(ChildSpyProductOptionTypeTranslation $spyProductOptionTypeTranslation)
    {
        $this->collSpyProductOptionTypeTranslations[]= $spyProductOptionTypeTranslation;
        $spyProductOptionTypeTranslation->setSpyProductOptionType($this);
    }

    /**
     * @param  ChildSpyProductOptionTypeTranslation $spyProductOptionTypeTranslation The ChildSpyProductOptionTypeTranslation object to remove.
     * @return $this|ChildSpyProductOptionType The current object (for fluent API support)
     */
    public function removeSpyProductOptionTypeTranslation(ChildSpyProductOptionTypeTranslation $spyProductOptionTypeTranslation)
    {
        if ($this->getSpyProductOptionTypeTranslations()->contains($spyProductOptionTypeTranslation)) {
            $pos = $this->collSpyProductOptionTypeTranslations->search($spyProductOptionTypeTranslation);
            $this->collSpyProductOptionTypeTranslations->remove($pos);
            if (null === $this->spyProductOptionTypeTranslationsScheduledForDeletion) {
                $this->spyProductOptionTypeTranslationsScheduledForDeletion = clone $this->collSpyProductOptionTypeTranslations;
                $this->spyProductOptionTypeTranslationsScheduledForDeletion->clear();
            }
            $this->spyProductOptionTypeTranslationsScheduledForDeletion[]= clone $spyProductOptionTypeTranslation;
            $spyProductOptionTypeTranslation->setSpyProductOptionType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProductOptionType is new, it will return
     * an empty collection; or if this SpyProductOptionType has previously
     * been saved, it will retrieve related SpyProductOptionTypeTranslations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProductOptionType.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionTypeTranslation[] List of ChildSpyProductOptionTypeTranslation objects
     */
    public function getSpyProductOptionTypeTranslationsJoinSpyLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionTypeTranslationQuery::create(null, $criteria);
        $query->joinWith('SpyLocale', $joinBehavior);

        return $this->getSpyProductOptionTypeTranslations($query, $con);
    }

    /**
     * Clears out the collSpyProductOptionTypeUsages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionTypeUsages()
     */
    public function clearSpyProductOptionTypeUsages()
    {
        $this->collSpyProductOptionTypeUsages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionTypeUsages collection loaded partially.
     */
    public function resetPartialSpyProductOptionTypeUsages($v = true)
    {
        $this->collSpyProductOptionTypeUsagesPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionTypeUsages collection.
     *
     * By default this just sets the collSpyProductOptionTypeUsages collection to an empty array (like clearcollSpyProductOptionTypeUsages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionTypeUsages($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionTypeUsages && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionTypeUsages = new ObjectCollection();
        $this->collSpyProductOptionTypeUsages->setModel('\Propel\SpyProductOptionTypeUsage');
    }

    /**
     * Gets an array of ChildSpyProductOptionTypeUsage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionTypeUsage[] List of ChildSpyProductOptionTypeUsage objects
     * @throws PropelException
     */
    public function getSpyProductOptionTypeUsages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsagesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsages) {
                // return empty collection
                $this->initSpyProductOptionTypeUsages();
            } else {
                $collSpyProductOptionTypeUsages = ChildSpyProductOptionTypeUsageQuery::create(null, $criteria)
                    ->filterBySpyProductOptionType($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionTypeUsagesPartial && count($collSpyProductOptionTypeUsages)) {
                        $this->initSpyProductOptionTypeUsages(false);

                        foreach ($collSpyProductOptionTypeUsages as $obj) {
                            if (false == $this->collSpyProductOptionTypeUsages->contains($obj)) {
                                $this->collSpyProductOptionTypeUsages->append($obj);
                            }
                        }

                        $this->collSpyProductOptionTypeUsagesPartial = true;
                    }

                    return $collSpyProductOptionTypeUsages;
                }

                if ($partial && $this->collSpyProductOptionTypeUsages) {
                    foreach ($this->collSpyProductOptionTypeUsages as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionTypeUsages[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionTypeUsages = $collSpyProductOptionTypeUsages;
                $this->collSpyProductOptionTypeUsagesPartial = false;
            }
        }

        return $this->collSpyProductOptionTypeUsages;
    }

    /**
     * Sets a collection of ChildSpyProductOptionTypeUsage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionTypeUsages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionType The current object (for fluent API support)
     */
    public function setSpyProductOptionTypeUsages(Collection $spyProductOptionTypeUsages, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionTypeUsage[] $spyProductOptionTypeUsagesToDelete */
        $spyProductOptionTypeUsagesToDelete = $this->getSpyProductOptionTypeUsages(new Criteria(), $con)->diff($spyProductOptionTypeUsages);


        $this->spyProductOptionTypeUsagesScheduledForDeletion = $spyProductOptionTypeUsagesToDelete;

        foreach ($spyProductOptionTypeUsagesToDelete as $spyProductOptionTypeUsageRemoved) {
            $spyProductOptionTypeUsageRemoved->setSpyProductOptionType(null);
        }

        $this->collSpyProductOptionTypeUsages = null;
        foreach ($spyProductOptionTypeUsages as $spyProductOptionTypeUsage) {
            $this->addSpyProductOptionTypeUsage($spyProductOptionTypeUsage);
        }

        $this->collSpyProductOptionTypeUsages = $spyProductOptionTypeUsages;
        $this->collSpyProductOptionTypeUsagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionTypeUsage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionTypeUsage objects.
     * @throws PropelException
     */
    public function countSpyProductOptionTypeUsages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsagesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionTypeUsages());
            }

            $query = ChildSpyProductOptionTypeUsageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductOptionType($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionTypeUsages);
    }

    /**
     * Method called to associate a ChildSpyProductOptionTypeUsage object to this object
     * through the ChildSpyProductOptionTypeUsage foreign key attribute.
     *
     * @param  ChildSpyProductOptionTypeUsage $l ChildSpyProductOptionTypeUsage
     * @return $this|\Propel\SpyProductOptionType The current object (for fluent API support)
     */
    public function addSpyProductOptionTypeUsage(ChildSpyProductOptionTypeUsage $l)
    {
        if ($this->collSpyProductOptionTypeUsages === null) {
            $this->initSpyProductOptionTypeUsages();
            $this->collSpyProductOptionTypeUsagesPartial = true;
        }

        if (!$this->collSpyProductOptionTypeUsages->contains($l)) {
            $this->doAddSpyProductOptionTypeUsage($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage The ChildSpyProductOptionTypeUsage object to add.
     */
    protected function doAddSpyProductOptionTypeUsage(ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage)
    {
        $this->collSpyProductOptionTypeUsages[]= $spyProductOptionTypeUsage;
        $spyProductOptionTypeUsage->setSpyProductOptionType($this);
    }

    /**
     * @param  ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage The ChildSpyProductOptionTypeUsage object to remove.
     * @return $this|ChildSpyProductOptionType The current object (for fluent API support)
     */
    public function removeSpyProductOptionTypeUsage(ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage)
    {
        if ($this->getSpyProductOptionTypeUsages()->contains($spyProductOptionTypeUsage)) {
            $pos = $this->collSpyProductOptionTypeUsages->search($spyProductOptionTypeUsage);
            $this->collSpyProductOptionTypeUsages->remove($pos);
            if (null === $this->spyProductOptionTypeUsagesScheduledForDeletion) {
                $this->spyProductOptionTypeUsagesScheduledForDeletion = clone $this->collSpyProductOptionTypeUsages;
                $this->spyProductOptionTypeUsagesScheduledForDeletion->clear();
            }
            $this->spyProductOptionTypeUsagesScheduledForDeletion[]= clone $spyProductOptionTypeUsage;
            $spyProductOptionTypeUsage->setSpyProductOptionType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProductOptionType is new, it will return
     * an empty collection; or if this SpyProductOptionType has previously
     * been saved, it will retrieve related SpyProductOptionTypeUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProductOptionType.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionTypeUsage[] List of ChildSpyProductOptionTypeUsage objects
     */
    public function getSpyProductOptionTypeUsagesJoinSpyProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionTypeUsageQuery::create(null, $criteria);
        $query->joinWith('SpyProduct', $joinBehavior);

        return $this->getSpyProductOptionTypeUsages($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyTaxSet) {
            $this->aSpyTaxSet->removeSpyProductOptionType($this);
        }
        $this->id_product_option_type = null;
        $this->import_key = null;
        $this->fk_tax_set = null;
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
            if ($this->collSpyProductOptionValues) {
                foreach ($this->collSpyProductOptionValues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionTypeTranslations) {
                foreach ($this->collSpyProductOptionTypeTranslations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionTypeUsages) {
                foreach ($this->collSpyProductOptionTypeUsages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyProductOptionValues = null;
        $this->collSpyProductOptionTypeTranslations = null;
        $this->collSpyProductOptionTypeUsages = null;
        $this->aSpyTaxSet = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyProductOptionTypeTableMap::DEFAULT_STRING_FORMAT);
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
