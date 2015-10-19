<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionType as ChildSpyProductOptionType;
use Propel\SpyProductOptionTypeQuery as ChildSpyProductOptionTypeQuery;
use Propel\SpyProductOptionValue as ChildSpyProductOptionValue;
use Propel\SpyProductOptionValuePrice as ChildSpyProductOptionValuePrice;
use Propel\SpyProductOptionValuePriceQuery as ChildSpyProductOptionValuePriceQuery;
use Propel\SpyProductOptionValueQuery as ChildSpyProductOptionValueQuery;
use Propel\SpyProductOptionValueTranslation as ChildSpyProductOptionValueTranslation;
use Propel\SpyProductOptionValueTranslationQuery as ChildSpyProductOptionValueTranslationQuery;
use Propel\SpyProductOptionValueUsage as ChildSpyProductOptionValueUsage;
use Propel\SpyProductOptionValueUsageQuery as ChildSpyProductOptionValueUsageQuery;
use Propel\Map\SpyProductOptionValueTableMap;
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
 * Base class that represents a row from the 'spy_product_option_value' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyProductOptionValue extends SpyProductOptionValue implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyProductOptionValueTableMap';


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
     * The value for the id_product_option_value field.
     * @var        int
     */
    protected $id_product_option_value;

    /**
     * The value for the import_key field.
     * @var        string
     */
    protected $import_key;

    /**
     * The value for the fk_product_option_type field.
     * @var        int
     */
    protected $fk_product_option_type;

    /**
     * The value for the fk_product_option_value_price field.
     * @var        int
     */
    protected $fk_product_option_value_price;

    /**
     * @var        ChildSpyProductOptionType
     */
    protected $aSpyProductOptionType;

    /**
     * @var        ChildSpyProductOptionValuePrice
     */
    protected $aSpyProductOptionValuePrice;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionValueTranslation[] Collection to store aggregation of ChildSpyProductOptionValueTranslation objects.
     */
    protected $collSpyProductOptionValueTranslations;
    protected $collSpyProductOptionValueTranslationsPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionValueUsage[] Collection to store aggregation of ChildSpyProductOptionValueUsage objects.
     */
    protected $collSpyProductOptionValueUsages;
    protected $collSpyProductOptionValueUsagesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionValueTranslation[]
     */
    protected $spyProductOptionValueTranslationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionValueUsage[]
     */
    protected $spyProductOptionValueUsagesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyProductOptionValue object.
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
     * Compares this with another <code>SpyProductOptionValue</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyProductOptionValue</code>, delegates to
     * <code>equals(SpyProductOptionValue)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyProductOptionValue The current object, for fluid interface
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
     * Get the [id_product_option_value] column value.
     *
     * @return int
     */
    public function getIdProductOptionValue()
    {
        return $this->id_product_option_value;
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
     * Get the [fk_product_option_type] column value.
     *
     * @return int
     */
    public function getFkProductOptionType()
    {
        return $this->fk_product_option_type;
    }

    /**
     * Get the [fk_product_option_value_price] column value.
     *
     * @return int
     */
    public function getFkProductOptionValuePrice()
    {
        return $this->fk_product_option_value_price;
    }

    /**
     * Set the value of [id_product_option_value] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
     */
    public function setIdProductOptionValue($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_product_option_value !== $v) {
            $this->id_product_option_value = $v;
            $this->modifiedColumns[SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE] = true;
        }

        return $this;
    } // setIdProductOptionValue()

    /**
     * Set the value of [import_key] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
     */
    public function setImportKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->import_key !== $v) {
            $this->import_key = $v;
            $this->modifiedColumns[SpyProductOptionValueTableMap::COL_IMPORT_KEY] = true;
        }

        return $this;
    } // setImportKey()

    /**
     * Set the value of [fk_product_option_type] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
     */
    public function setFkProductOptionType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_product_option_type !== $v) {
            $this->fk_product_option_type = $v;
            $this->modifiedColumns[SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE] = true;
        }

        if ($this->aSpyProductOptionType !== null && $this->aSpyProductOptionType->getIdProductOptionType() !== $v) {
            $this->aSpyProductOptionType = null;
        }

        return $this;
    } // setFkProductOptionType()

    /**
     * Set the value of [fk_product_option_value_price] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
     */
    public function setFkProductOptionValuePrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_product_option_value_price !== $v) {
            $this->fk_product_option_value_price = $v;
            $this->modifiedColumns[SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE] = true;
        }

        if ($this->aSpyProductOptionValuePrice !== null && $this->aSpyProductOptionValuePrice->getIdProductOptionValuePrice() !== $v) {
            $this->aSpyProductOptionValuePrice = null;
        }

        return $this;
    } // setFkProductOptionValuePrice()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyProductOptionValueTableMap::translateFieldName('IdProductOptionValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_product_option_value = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyProductOptionValueTableMap::translateFieldName('ImportKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->import_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyProductOptionValueTableMap::translateFieldName('FkProductOptionType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_product_option_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyProductOptionValueTableMap::translateFieldName('FkProductOptionValuePrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_product_option_value_price = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = SpyProductOptionValueTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyProductOptionValue'), 0, $e);
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
        if ($this->aSpyProductOptionType !== null && $this->fk_product_option_type !== $this->aSpyProductOptionType->getIdProductOptionType()) {
            $this->aSpyProductOptionType = null;
        }
        if ($this->aSpyProductOptionValuePrice !== null && $this->fk_product_option_value_price !== $this->aSpyProductOptionValuePrice->getIdProductOptionValuePrice()) {
            $this->aSpyProductOptionValuePrice = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyProductOptionValueQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyProductOptionType = null;
            $this->aSpyProductOptionValuePrice = null;
            $this->collSpyProductOptionValueTranslations = null;

            $this->collSpyProductOptionValueUsages = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyProductOptionValue::setDeleted()
     * @see SpyProductOptionValue::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyProductOptionValueQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
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
                SpyProductOptionValueTableMap::addInstanceToPool($this);
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

            if ($this->aSpyProductOptionType !== null) {
                if ($this->aSpyProductOptionType->isModified() || $this->aSpyProductOptionType->isNew()) {
                    $affectedRows += $this->aSpyProductOptionType->save($con);
                }
                $this->setSpyProductOptionType($this->aSpyProductOptionType);
            }

            if ($this->aSpyProductOptionValuePrice !== null) {
                if ($this->aSpyProductOptionValuePrice->isModified() || $this->aSpyProductOptionValuePrice->isNew()) {
                    $affectedRows += $this->aSpyProductOptionValuePrice->save($con);
                }
                $this->setSpyProductOptionValuePrice($this->aSpyProductOptionValuePrice);
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

            if ($this->spyProductOptionValueTranslationsScheduledForDeletion !== null) {
                if (!$this->spyProductOptionValueTranslationsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionValueTranslationQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionValueTranslationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionValueTranslationsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionValueTranslations !== null) {
                foreach ($this->collSpyProductOptionValueTranslations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE)) {
            $modifiedColumns[':p' . $index++]  = 'id_product_option_value';
        }
        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_IMPORT_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'import_key';
        }
        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_product_option_type';
        }
        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_product_option_value_price';
        }

        $sql = sprintf(
            'INSERT INTO spy_product_option_value (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_product_option_value':
                        $stmt->bindValue($identifier, $this->id_product_option_value, PDO::PARAM_INT);
                        break;
                    case 'import_key':
                        $stmt->bindValue($identifier, $this->import_key, PDO::PARAM_STR);
                        break;
                    case 'fk_product_option_type':
                        $stmt->bindValue($identifier, $this->fk_product_option_type, PDO::PARAM_INT);
                        break;
                    case 'fk_product_option_value_price':
                        $stmt->bindValue($identifier, $this->fk_product_option_value_price, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_product_option_value_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdProductOptionValue($pk);
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
        $pos = SpyProductOptionValueTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdProductOptionValue();
                break;
            case 1:
                return $this->getImportKey();
                break;
            case 2:
                return $this->getFkProductOptionType();
                break;
            case 3:
                return $this->getFkProductOptionValuePrice();
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

        if (isset($alreadyDumpedObjects['SpyProductOptionValue'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyProductOptionValue'][$this->hashCode()] = true;
        $keys = SpyProductOptionValueTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProductOptionValue(),
            $keys[1] => $this->getImportKey(),
            $keys[2] => $this->getFkProductOptionType(),
            $keys[3] => $this->getFkProductOptionValuePrice(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
            if (null !== $this->aSpyProductOptionValuePrice) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionValuePrice';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_value_price';
                        break;
                    default:
                        $key = 'SpyProductOptionValuePrice';
                }

                $result[$key] = $this->aSpyProductOptionValuePrice->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpyProductOptionValueTranslations) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionValueTranslations';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_value_translations';
                        break;
                    default:
                        $key = 'SpyProductOptionValueTranslations';
                }

                $result[$key] = $this->collSpyProductOptionValueTranslations->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyProductOptionValue
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyProductOptionValueTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyProductOptionValue
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProductOptionValue($value);
                break;
            case 1:
                $this->setImportKey($value);
                break;
            case 2:
                $this->setFkProductOptionType($value);
                break;
            case 3:
                $this->setFkProductOptionValuePrice($value);
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
        $keys = SpyProductOptionValueTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdProductOptionValue($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setImportKey($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkProductOptionType($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkProductOptionValuePrice($arr[$keys[3]]);
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
     * @return $this|\Propel\SpyProductOptionValue The current object, for fluid interface
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
        $criteria = new Criteria(SpyProductOptionValueTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE)) {
            $criteria->add(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $this->id_product_option_value);
        }
        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_IMPORT_KEY)) {
            $criteria->add(SpyProductOptionValueTableMap::COL_IMPORT_KEY, $this->import_key);
        }
        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE)) {
            $criteria->add(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE, $this->fk_product_option_type);
        }
        if ($this->isColumnModified(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE)) {
            $criteria->add(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE, $this->fk_product_option_value_price);
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
        $criteria = ChildSpyProductOptionValueQuery::create();
        $criteria->add(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, $this->id_product_option_value);

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
        $validPk = null !== $this->getIdProductOptionValue();

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
        return $this->getIdProductOptionValue();
    }

    /**
     * Generic method to set the primary key (id_product_option_value column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProductOptionValue($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdProductOptionValue();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyProductOptionValue (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setImportKey($this->getImportKey());
        $copyObj->setFkProductOptionType($this->getFkProductOptionType());
        $copyObj->setFkProductOptionValuePrice($this->getFkProductOptionValuePrice());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyProductOptionValueTranslations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionValueTranslation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionValueUsages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionValueUsage($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdProductOptionValue(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyProductOptionValue Clone of current object.
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
     * Declares an association between this object and a ChildSpyProductOptionType object.
     *
     * @param  ChildSpyProductOptionType $v
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
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
            $v->addSpyProductOptionValue($this);
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
                $this->aSpyProductOptionType->addSpyProductOptionValues($this);
             */
        }

        return $this->aSpyProductOptionType;
    }

    /**
     * Declares an association between this object and a ChildSpyProductOptionValuePrice object.
     *
     * @param  ChildSpyProductOptionValuePrice $v
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyProductOptionValuePrice(ChildSpyProductOptionValuePrice $v = null)
    {
        if ($v === null) {
            $this->setFkProductOptionValuePrice(NULL);
        } else {
            $this->setFkProductOptionValuePrice($v->getIdProductOptionValuePrice());
        }

        $this->aSpyProductOptionValuePrice = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyProductOptionValuePrice object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProductOptionValue($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyProductOptionValuePrice object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyProductOptionValuePrice The associated ChildSpyProductOptionValuePrice object.
     * @throws PropelException
     */
    public function getSpyProductOptionValuePrice(ConnectionInterface $con = null)
    {
        if ($this->aSpyProductOptionValuePrice === null && ($this->fk_product_option_value_price !== null)) {
            $this->aSpyProductOptionValuePrice = ChildSpyProductOptionValuePriceQuery::create()->findPk($this->fk_product_option_value_price, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyProductOptionValuePrice->addSpyProductOptionValues($this);
             */
        }

        return $this->aSpyProductOptionValuePrice;
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
        if ('SpyProductOptionValueTranslation' == $relationName) {
            return $this->initSpyProductOptionValueTranslations();
        }
        if ('SpyProductOptionValueUsage' == $relationName) {
            return $this->initSpyProductOptionValueUsages();
        }
    }

    /**
     * Clears out the collSpyProductOptionValueTranslations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionValueTranslations()
     */
    public function clearSpyProductOptionValueTranslations()
    {
        $this->collSpyProductOptionValueTranslations = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionValueTranslations collection loaded partially.
     */
    public function resetPartialSpyProductOptionValueTranslations($v = true)
    {
        $this->collSpyProductOptionValueTranslationsPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionValueTranslations collection.
     *
     * By default this just sets the collSpyProductOptionValueTranslations collection to an empty array (like clearcollSpyProductOptionValueTranslations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionValueTranslations($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionValueTranslations && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionValueTranslations = new ObjectCollection();
        $this->collSpyProductOptionValueTranslations->setModel('\Propel\SpyProductOptionValueTranslation');
    }

    /**
     * Gets an array of ChildSpyProductOptionValueTranslation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductOptionValue is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionValueTranslation[] List of ChildSpyProductOptionValueTranslation objects
     * @throws PropelException
     */
    public function getSpyProductOptionValueTranslations(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueTranslationsPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueTranslations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueTranslations) {
                // return empty collection
                $this->initSpyProductOptionValueTranslations();
            } else {
                $collSpyProductOptionValueTranslations = ChildSpyProductOptionValueTranslationQuery::create(null, $criteria)
                    ->filterBySpyProductOptionValue($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionValueTranslationsPartial && count($collSpyProductOptionValueTranslations)) {
                        $this->initSpyProductOptionValueTranslations(false);

                        foreach ($collSpyProductOptionValueTranslations as $obj) {
                            if (false == $this->collSpyProductOptionValueTranslations->contains($obj)) {
                                $this->collSpyProductOptionValueTranslations->append($obj);
                            }
                        }

                        $this->collSpyProductOptionValueTranslationsPartial = true;
                    }

                    return $collSpyProductOptionValueTranslations;
                }

                if ($partial && $this->collSpyProductOptionValueTranslations) {
                    foreach ($this->collSpyProductOptionValueTranslations as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionValueTranslations[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionValueTranslations = $collSpyProductOptionValueTranslations;
                $this->collSpyProductOptionValueTranslationsPartial = false;
            }
        }

        return $this->collSpyProductOptionValueTranslations;
    }

    /**
     * Sets a collection of ChildSpyProductOptionValueTranslation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionValueTranslations A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductOptionValue The current object (for fluent API support)
     */
    public function setSpyProductOptionValueTranslations(Collection $spyProductOptionValueTranslations, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionValueTranslation[] $spyProductOptionValueTranslationsToDelete */
        $spyProductOptionValueTranslationsToDelete = $this->getSpyProductOptionValueTranslations(new Criteria(), $con)->diff($spyProductOptionValueTranslations);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductOptionValueTranslationsScheduledForDeletion = clone $spyProductOptionValueTranslationsToDelete;

        foreach ($spyProductOptionValueTranslationsToDelete as $spyProductOptionValueTranslationRemoved) {
            $spyProductOptionValueTranslationRemoved->setSpyProductOptionValue(null);
        }

        $this->collSpyProductOptionValueTranslations = null;
        foreach ($spyProductOptionValueTranslations as $spyProductOptionValueTranslation) {
            $this->addSpyProductOptionValueTranslation($spyProductOptionValueTranslation);
        }

        $this->collSpyProductOptionValueTranslations = $spyProductOptionValueTranslations;
        $this->collSpyProductOptionValueTranslationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionValueTranslation objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionValueTranslation objects.
     * @throws PropelException
     */
    public function countSpyProductOptionValueTranslations(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionValueTranslationsPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionValueTranslations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionValueTranslations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionValueTranslations());
            }

            $query = ChildSpyProductOptionValueTranslationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductOptionValue($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionValueTranslations);
    }

    /**
     * Method called to associate a ChildSpyProductOptionValueTranslation object to this object
     * through the ChildSpyProductOptionValueTranslation foreign key attribute.
     *
     * @param  ChildSpyProductOptionValueTranslation $l ChildSpyProductOptionValueTranslation
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
     */
    public function addSpyProductOptionValueTranslation(ChildSpyProductOptionValueTranslation $l)
    {
        if ($this->collSpyProductOptionValueTranslations === null) {
            $this->initSpyProductOptionValueTranslations();
            $this->collSpyProductOptionValueTranslationsPartial = true;
        }

        if (!$this->collSpyProductOptionValueTranslations->contains($l)) {
            $this->doAddSpyProductOptionValueTranslation($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionValueTranslation $spyProductOptionValueTranslation The ChildSpyProductOptionValueTranslation object to add.
     */
    protected function doAddSpyProductOptionValueTranslation(ChildSpyProductOptionValueTranslation $spyProductOptionValueTranslation)
    {
        $this->collSpyProductOptionValueTranslations[]= $spyProductOptionValueTranslation;
        $spyProductOptionValueTranslation->setSpyProductOptionValue($this);
    }

    /**
     * @param  ChildSpyProductOptionValueTranslation $spyProductOptionValueTranslation The ChildSpyProductOptionValueTranslation object to remove.
     * @return $this|ChildSpyProductOptionValue The current object (for fluent API support)
     */
    public function removeSpyProductOptionValueTranslation(ChildSpyProductOptionValueTranslation $spyProductOptionValueTranslation)
    {
        if ($this->getSpyProductOptionValueTranslations()->contains($spyProductOptionValueTranslation)) {
            $pos = $this->collSpyProductOptionValueTranslations->search($spyProductOptionValueTranslation);
            $this->collSpyProductOptionValueTranslations->remove($pos);
            if (null === $this->spyProductOptionValueTranslationsScheduledForDeletion) {
                $this->spyProductOptionValueTranslationsScheduledForDeletion = clone $this->collSpyProductOptionValueTranslations;
                $this->spyProductOptionValueTranslationsScheduledForDeletion->clear();
            }
            $this->spyProductOptionValueTranslationsScheduledForDeletion[]= clone $spyProductOptionValueTranslation;
            $spyProductOptionValueTranslation->setSpyProductOptionValue(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProductOptionValue is new, it will return
     * an empty collection; or if this SpyProductOptionValue has previously
     * been saved, it will retrieve related SpyProductOptionValueTranslations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProductOptionValue.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionValueTranslation[] List of ChildSpyProductOptionValueTranslation objects
     */
    public function getSpyProductOptionValueTranslationsJoinSpyLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionValueTranslationQuery::create(null, $criteria);
        $query->joinWith('SpyLocale', $joinBehavior);

        return $this->getSpyProductOptionValueTranslations($query, $con);
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
     * If this ChildSpyProductOptionValue is new, it will return
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
                    ->filterBySpyProductOptionValue($this)
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
     * @return $this|ChildSpyProductOptionValue The current object (for fluent API support)
     */
    public function setSpyProductOptionValueUsages(Collection $spyProductOptionValueUsages, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionValueUsage[] $spyProductOptionValueUsagesToDelete */
        $spyProductOptionValueUsagesToDelete = $this->getSpyProductOptionValueUsages(new Criteria(), $con)->diff($spyProductOptionValueUsages);


        $this->spyProductOptionValueUsagesScheduledForDeletion = $spyProductOptionValueUsagesToDelete;

        foreach ($spyProductOptionValueUsagesToDelete as $spyProductOptionValueUsageRemoved) {
            $spyProductOptionValueUsageRemoved->setSpyProductOptionValue(null);
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
                ->filterBySpyProductOptionValue($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionValueUsages);
    }

    /**
     * Method called to associate a ChildSpyProductOptionValueUsage object to this object
     * through the ChildSpyProductOptionValueUsage foreign key attribute.
     *
     * @param  ChildSpyProductOptionValueUsage $l ChildSpyProductOptionValueUsage
     * @return $this|\Propel\SpyProductOptionValue The current object (for fluent API support)
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
        $spyProductOptionValueUsage->setSpyProductOptionValue($this);
    }

    /**
     * @param  ChildSpyProductOptionValueUsage $spyProductOptionValueUsage The ChildSpyProductOptionValueUsage object to remove.
     * @return $this|ChildSpyProductOptionValue The current object (for fluent API support)
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
            $spyProductOptionValueUsage->setSpyProductOptionValue(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProductOptionValue is new, it will return
     * an empty collection; or if this SpyProductOptionValue has previously
     * been saved, it will retrieve related SpyProductOptionValueUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProductOptionValue.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionValueUsage[] List of ChildSpyProductOptionValueUsage objects
     */
    public function getSpyProductOptionValueUsagesJoinSpyProductOptionTypeUsage(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionValueUsageQuery::create(null, $criteria);
        $query->joinWith('SpyProductOptionTypeUsage', $joinBehavior);

        return $this->getSpyProductOptionValueUsages($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyProductOptionType) {
            $this->aSpyProductOptionType->removeSpyProductOptionValue($this);
        }
        if (null !== $this->aSpyProductOptionValuePrice) {
            $this->aSpyProductOptionValuePrice->removeSpyProductOptionValue($this);
        }
        $this->id_product_option_value = null;
        $this->import_key = null;
        $this->fk_product_option_type = null;
        $this->fk_product_option_value_price = null;
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
            if ($this->collSpyProductOptionValueTranslations) {
                foreach ($this->collSpyProductOptionValueTranslations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionValueUsages) {
                foreach ($this->collSpyProductOptionValueUsages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyProductOptionValueTranslations = null;
        $this->collSpyProductOptionValueUsages = null;
        $this->aSpyProductOptionType = null;
        $this->aSpyProductOptionValuePrice = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyProductOptionValueTableMap::DEFAULT_STRING_FORMAT);
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
