<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCategoryAttribute as ChildSpyCategoryAttribute;
use Propel\SpyCategoryAttributeQuery as ChildSpyCategoryAttributeQuery;
use Propel\SpyGlossaryTranslation as ChildSpyGlossaryTranslation;
use Propel\SpyGlossaryTranslationQuery as ChildSpyGlossaryTranslationQuery;
use Propel\SpyLocale as ChildSpyLocale;
use Propel\SpyLocaleQuery as ChildSpyLocaleQuery;
use Propel\SpyLocalizedAbstractProductAttributes as ChildSpyLocalizedAbstractProductAttributes;
use Propel\SpyLocalizedAbstractProductAttributesQuery as ChildSpyLocalizedAbstractProductAttributesQuery;
use Propel\SpyLocalizedProductAttributes as ChildSpyLocalizedProductAttributes;
use Propel\SpyLocalizedProductAttributesQuery as ChildSpyLocalizedProductAttributesQuery;
use Propel\SpyProductOptionTypeTranslation as ChildSpyProductOptionTypeTranslation;
use Propel\SpyProductOptionTypeTranslationQuery as ChildSpyProductOptionTypeTranslationQuery;
use Propel\SpyProductOptionValueTranslation as ChildSpyProductOptionValueTranslation;
use Propel\SpyProductOptionValueTranslationQuery as ChildSpyProductOptionValueTranslationQuery;
use Propel\SpySearchableProducts as ChildSpySearchableProducts;
use Propel\SpySearchableProductsQuery as ChildSpySearchableProductsQuery;
use Propel\SpyTouchSearch as ChildSpyTouchSearch;
use Propel\SpyTouchSearchQuery as ChildSpyTouchSearchQuery;
use Propel\SpyTouchStorage as ChildSpyTouchStorage;
use Propel\SpyTouchStorageQuery as ChildSpyTouchStorageQuery;
use Propel\SpyTypeValue as ChildSpyTypeValue;
use Propel\SpyTypeValueQuery as ChildSpyTypeValueQuery;
use Propel\SpyUrl as ChildSpyUrl;
use Propel\SpyUrlQuery as ChildSpyUrlQuery;
use Propel\Map\SpyLocaleTableMap;
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
 * Base class that represents a row from the 'spy_locale' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyLocale extends SpyLocale implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyLocaleTableMap';


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
     * The value for the id_locale field.
     * @var        int
     */
    protected $id_locale;

    /**
     * The value for the locale_name field.
     * @var        string
     */
    protected $locale_name;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * @var        ObjectCollection|ChildSpyCategoryAttribute[] Collection to store aggregation of ChildSpyCategoryAttribute objects.
     */
    protected $collSpyCategoryAttributes;
    protected $collSpyCategoryAttributesPartial;

    /**
     * @var        ObjectCollection|ChildSpyGlossaryTranslation[] Collection to store aggregation of ChildSpyGlossaryTranslation objects.
     */
    protected $collSpyGlossaryTranslations;
    protected $collSpyGlossaryTranslationsPartial;

    /**
     * @var        ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[] Collection to store aggregation of ChildSpyLocalizedAbstractProductAttributes objects.
     */
    protected $collSpyLocalizedAbstractProductAttributess;
    protected $collSpyLocalizedAbstractProductAttributessPartial;

    /**
     * @var        ObjectCollection|ChildSpyLocalizedProductAttributes[] Collection to store aggregation of ChildSpyLocalizedProductAttributes objects.
     */
    protected $collSpyLocalizedProductAttributess;
    protected $collSpyLocalizedProductAttributessPartial;

    /**
     * @var        ObjectCollection|ChildSpyTypeValue[] Collection to store aggregation of ChildSpyTypeValue objects.
     */
    protected $collSpyTypeValues;
    protected $collSpyTypeValuesPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionValueTranslation[] Collection to store aggregation of ChildSpyProductOptionValueTranslation objects.
     */
    protected $collSpyProductOptionValueTranslations;
    protected $collSpyProductOptionValueTranslationsPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionTypeTranslation[] Collection to store aggregation of ChildSpyProductOptionTypeTranslation objects.
     */
    protected $collSpyProductOptionTypeTranslations;
    protected $collSpyProductOptionTypeTranslationsPartial;

    /**
     * @var        ObjectCollection|ChildSpySearchableProducts[] Collection to store aggregation of ChildSpySearchableProducts objects.
     */
    protected $collSpySearchableProductss;
    protected $collSpySearchableProductssPartial;

    /**
     * @var        ObjectCollection|ChildSpyTouchStorage[] Collection to store aggregation of ChildSpyTouchStorage objects.
     */
    protected $collTouchStorages;
    protected $collTouchStoragesPartial;

    /**
     * @var        ObjectCollection|ChildSpyTouchSearch[] Collection to store aggregation of ChildSpyTouchSearch objects.
     */
    protected $collTouchSearches;
    protected $collTouchSearchesPartial;

    /**
     * @var        ObjectCollection|ChildSpyUrl[] Collection to store aggregation of ChildSpyUrl objects.
     */
    protected $collSpyUrls;
    protected $collSpyUrlsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCategoryAttribute[]
     */
    protected $spyCategoryAttributesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyGlossaryTranslation[]
     */
    protected $spyGlossaryTranslationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[]
     */
    protected $spyLocalizedAbstractProductAttributessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyLocalizedProductAttributes[]
     */
    protected $spyLocalizedProductAttributessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyTypeValue[]
     */
    protected $spyTypeValuesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionValueTranslation[]
     */
    protected $spyProductOptionValueTranslationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionTypeTranslation[]
     */
    protected $spyProductOptionTypeTranslationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySearchableProducts[]
     */
    protected $spySearchableProductssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyTouchStorage[]
     */
    protected $touchStoragesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyTouchSearch[]
     */
    protected $touchSearchesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyUrl[]
     */
    protected $spyUrlsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
    }

    /**
     * Initializes internal state of Propel\Base\SpyLocale object.
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
     * Compares this with another <code>SpyLocale</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyLocale</code>, delegates to
     * <code>equals(SpyLocale)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyLocale The current object, for fluid interface
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
     * Get the [id_locale] column value.
     *
     * @return int
     */
    public function getIdLocale()
    {
        return $this->id_locale;
    }

    /**
     * Get the [locale_name] column value.
     *
     * @return string
     */
    public function getLocaleName()
    {
        return $this->locale_name;
    }

    /**
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->getIsActive();
    }

    /**
     * Set the value of [id_locale] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function setIdLocale($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_locale !== $v) {
            $this->id_locale = $v;
            $this->modifiedColumns[SpyLocaleTableMap::COL_ID_LOCALE] = true;
        }

        return $this;
    } // setIdLocale()

    /**
     * Set the value of [locale_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function setLocaleName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->locale_name !== $v) {
            $this->locale_name = $v;
            $this->modifiedColumns[SpyLocaleTableMap::COL_LOCALE_NAME] = true;
        }

        return $this;
    } // setLocaleName()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function setIsActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_active !== $v) {
            $this->is_active = $v;
            $this->modifiedColumns[SpyLocaleTableMap::COL_IS_ACTIVE] = true;
        }

        return $this;
    } // setIsActive()

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
            if ($this->is_active !== true) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyLocaleTableMap::translateFieldName('IdLocale', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_locale = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyLocaleTableMap::translateFieldName('LocaleName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locale_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyLocaleTableMap::translateFieldName('IsActive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_active = (null !== $col) ? (boolean) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = SpyLocaleTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyLocale'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyLocaleTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyLocaleQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSpyCategoryAttributes = null;

            $this->collSpyGlossaryTranslations = null;

            $this->collSpyLocalizedAbstractProductAttributess = null;

            $this->collSpyLocalizedProductAttributess = null;

            $this->collSpyTypeValues = null;

            $this->collSpyProductOptionValueTranslations = null;

            $this->collSpyProductOptionTypeTranslations = null;

            $this->collSpySearchableProductss = null;

            $this->collTouchStorages = null;

            $this->collTouchSearches = null;

            $this->collSpyUrls = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyLocale::setDeleted()
     * @see SpyLocale::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocaleTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyLocaleQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocaleTableMap::DATABASE_NAME);
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
                SpyLocaleTableMap::addInstanceToPool($this);
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

            if ($this->spyCategoryAttributesScheduledForDeletion !== null) {
                if (!$this->spyCategoryAttributesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCategoryAttributeQuery::create()
                        ->filterByPrimaryKeys($this->spyCategoryAttributesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyCategoryAttributesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyCategoryAttributes !== null) {
                foreach ($this->collSpyCategoryAttributes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyGlossaryTranslationsScheduledForDeletion !== null) {
                if (!$this->spyGlossaryTranslationsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyGlossaryTranslationQuery::create()
                        ->filterByPrimaryKeys($this->spyGlossaryTranslationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyGlossaryTranslationsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyGlossaryTranslations !== null) {
                foreach ($this->collSpyGlossaryTranslations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyLocalizedAbstractProductAttributessScheduledForDeletion !== null) {
                if (!$this->spyLocalizedAbstractProductAttributessScheduledForDeletion->isEmpty()) {
                    \Propel\SpyLocalizedAbstractProductAttributesQuery::create()
                        ->filterByPrimaryKeys($this->spyLocalizedAbstractProductAttributessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyLocalizedAbstractProductAttributessScheduledForDeletion = null;
                }
            }

            if ($this->collSpyLocalizedAbstractProductAttributess !== null) {
                foreach ($this->collSpyLocalizedAbstractProductAttributess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyLocalizedProductAttributessScheduledForDeletion !== null) {
                if (!$this->spyLocalizedProductAttributessScheduledForDeletion->isEmpty()) {
                    \Propel\SpyLocalizedProductAttributesQuery::create()
                        ->filterByPrimaryKeys($this->spyLocalizedProductAttributessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyLocalizedProductAttributessScheduledForDeletion = null;
                }
            }

            if ($this->collSpyLocalizedProductAttributess !== null) {
                foreach ($this->collSpyLocalizedProductAttributess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyTypeValuesScheduledForDeletion !== null) {
                if (!$this->spyTypeValuesScheduledForDeletion->isEmpty()) {
                    foreach ($this->spyTypeValuesScheduledForDeletion as $spyTypeValue) {
                        // need to save related object because we set the relation to null
                        $spyTypeValue->save($con);
                    }
                    $this->spyTypeValuesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyTypeValues !== null) {
                foreach ($this->collSpyTypeValues as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->spySearchableProductssScheduledForDeletion !== null) {
                if (!$this->spySearchableProductssScheduledForDeletion->isEmpty()) {
                    foreach ($this->spySearchableProductssScheduledForDeletion as $spySearchableProducts) {
                        // need to save related object because we set the relation to null
                        $spySearchableProducts->save($con);
                    }
                    $this->spySearchableProductssScheduledForDeletion = null;
                }
            }

            if ($this->collSpySearchableProductss !== null) {
                foreach ($this->collSpySearchableProductss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->touchStoragesScheduledForDeletion !== null) {
                if (!$this->touchStoragesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyTouchStorageQuery::create()
                        ->filterByPrimaryKeys($this->touchStoragesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->touchStoragesScheduledForDeletion = null;
                }
            }

            if ($this->collTouchStorages !== null) {
                foreach ($this->collTouchStorages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->touchSearchesScheduledForDeletion !== null) {
                if (!$this->touchSearchesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyTouchSearchQuery::create()
                        ->filterByPrimaryKeys($this->touchSearchesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->touchSearchesScheduledForDeletion = null;
                }
            }

            if ($this->collTouchSearches !== null) {
                foreach ($this->collTouchSearches as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyUrlsScheduledForDeletion !== null) {
                if (!$this->spyUrlsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyUrlQuery::create()
                        ->filterByPrimaryKeys($this->spyUrlsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyUrlsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyUrls !== null) {
                foreach ($this->collSpyUrls as $referrerFK) {
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

        $this->modifiedColumns[SpyLocaleTableMap::COL_ID_LOCALE] = true;
        if (null !== $this->id_locale) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyLocaleTableMap::COL_ID_LOCALE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyLocaleTableMap::COL_ID_LOCALE)) {
            $modifiedColumns[':p' . $index++]  = 'id_locale';
        }
        if ($this->isColumnModified(SpyLocaleTableMap::COL_LOCALE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'locale_name';
        }
        if ($this->isColumnModified(SpyLocaleTableMap::COL_IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'is_active';
        }

        $sql = sprintf(
            'INSERT INTO spy_locale (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_locale':
                        $stmt->bindValue($identifier, $this->id_locale, PDO::PARAM_INT);
                        break;
                    case 'locale_name':
                        $stmt->bindValue($identifier, $this->locale_name, PDO::PARAM_STR);
                        break;
                    case 'is_active':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_locale_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdLocale($pk);

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
        $pos = SpyLocaleTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdLocale();
                break;
            case 1:
                return $this->getLocaleName();
                break;
            case 2:
                return $this->getIsActive();
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

        if (isset($alreadyDumpedObjects['SpyLocale'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyLocale'][$this->hashCode()] = true;
        $keys = SpyLocaleTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdLocale(),
            $keys[1] => $this->getLocaleName(),
            $keys[2] => $this->getIsActive(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSpyCategoryAttributes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCategoryAttributes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_category_attributes';
                        break;
                    default:
                        $key = 'SpyCategoryAttributes';
                }

                $result[$key] = $this->collSpyCategoryAttributes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyGlossaryTranslations) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyGlossaryTranslations';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_glossary_translations';
                        break;
                    default:
                        $key = 'SpyGlossaryTranslations';
                }

                $result[$key] = $this->collSpyGlossaryTranslations->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyLocalizedAbstractProductAttributess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyLocalizedAbstractProductAttributess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_abstract_product_localized_attributess';
                        break;
                    default:
                        $key = 'SpyLocalizedAbstractProductAttributess';
                }

                $result[$key] = $this->collSpyLocalizedAbstractProductAttributess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyLocalizedProductAttributess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyLocalizedProductAttributess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_localized_attributess';
                        break;
                    default:
                        $key = 'SpyLocalizedProductAttributess';
                }

                $result[$key] = $this->collSpyLocalizedProductAttributess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyTypeValues) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTypeValues';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_attribute_type_values';
                        break;
                    default:
                        $key = 'SpyTypeValues';
                }

                $result[$key] = $this->collSpyTypeValues->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collSpySearchableProductss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySearchableProductss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_searchable_productss';
                        break;
                    default:
                        $key = 'SpySearchableProductss';
                }

                $result[$key] = $this->collSpySearchableProductss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTouchStorages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTouchStorages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_touch_storages';
                        break;
                    default:
                        $key = 'SpyTouchStorages';
                }

                $result[$key] = $this->collTouchStorages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTouchSearches) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTouchSearches';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_touch_searches';
                        break;
                    default:
                        $key = 'SpyTouchSearches';
                }

                $result[$key] = $this->collTouchSearches->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyUrls) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyUrls';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_urls';
                        break;
                    default:
                        $key = 'SpyUrls';
                }

                $result[$key] = $this->collSpyUrls->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyLocale
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyLocaleTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyLocale
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdLocale($value);
                break;
            case 1:
                $this->setLocaleName($value);
                break;
            case 2:
                $this->setIsActive($value);
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
        $keys = SpyLocaleTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdLocale($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setLocaleName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIsActive($arr[$keys[2]]);
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
     * @return $this|\Propel\SpyLocale The current object, for fluid interface
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
        $criteria = new Criteria(SpyLocaleTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyLocaleTableMap::COL_ID_LOCALE)) {
            $criteria->add(SpyLocaleTableMap::COL_ID_LOCALE, $this->id_locale);
        }
        if ($this->isColumnModified(SpyLocaleTableMap::COL_LOCALE_NAME)) {
            $criteria->add(SpyLocaleTableMap::COL_LOCALE_NAME, $this->locale_name);
        }
        if ($this->isColumnModified(SpyLocaleTableMap::COL_IS_ACTIVE)) {
            $criteria->add(SpyLocaleTableMap::COL_IS_ACTIVE, $this->is_active);
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
        $criteria = ChildSpyLocaleQuery::create();
        $criteria->add(SpyLocaleTableMap::COL_ID_LOCALE, $this->id_locale);

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
        $validPk = null !== $this->getIdLocale();

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
        return $this->getIdLocale();
    }

    /**
     * Generic method to set the primary key (id_locale column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdLocale($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdLocale();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyLocale (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setLocaleName($this->getLocaleName());
        $copyObj->setIsActive($this->getIsActive());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyCategoryAttributes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyCategoryAttribute($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyGlossaryTranslations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyGlossaryTranslation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyLocalizedAbstractProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyLocalizedAbstractProductAttributes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyLocalizedProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyLocalizedProductAttributes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyTypeValues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyTypeValue($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionValueTranslations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionValueTranslation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionTypeTranslations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionTypeTranslation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpySearchableProductss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpySearchableProducts($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTouchStorages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTouchStorage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTouchSearches() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTouchSearch($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyUrls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyUrl($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdLocale(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyLocale Clone of current object.
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
        if ('SpyCategoryAttribute' == $relationName) {
            return $this->initSpyCategoryAttributes();
        }
        if ('SpyGlossaryTranslation' == $relationName) {
            return $this->initSpyGlossaryTranslations();
        }
        if ('SpyLocalizedAbstractProductAttributes' == $relationName) {
            return $this->initSpyLocalizedAbstractProductAttributess();
        }
        if ('SpyLocalizedProductAttributes' == $relationName) {
            return $this->initSpyLocalizedProductAttributess();
        }
        if ('SpyTypeValue' == $relationName) {
            return $this->initSpyTypeValues();
        }
        if ('SpyProductOptionValueTranslation' == $relationName) {
            return $this->initSpyProductOptionValueTranslations();
        }
        if ('SpyProductOptionTypeTranslation' == $relationName) {
            return $this->initSpyProductOptionTypeTranslations();
        }
        if ('SpySearchableProducts' == $relationName) {
            return $this->initSpySearchableProductss();
        }
        if ('TouchStorage' == $relationName) {
            return $this->initTouchStorages();
        }
        if ('TouchSearch' == $relationName) {
            return $this->initTouchSearches();
        }
        if ('SpyUrl' == $relationName) {
            return $this->initSpyUrls();
        }
    }

    /**
     * Clears out the collSpyCategoryAttributes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyCategoryAttributes()
     */
    public function clearSpyCategoryAttributes()
    {
        $this->collSpyCategoryAttributes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyCategoryAttributes collection loaded partially.
     */
    public function resetPartialSpyCategoryAttributes($v = true)
    {
        $this->collSpyCategoryAttributesPartial = $v;
    }

    /**
     * Initializes the collSpyCategoryAttributes collection.
     *
     * By default this just sets the collSpyCategoryAttributes collection to an empty array (like clearcollSpyCategoryAttributes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyCategoryAttributes($overrideExisting = true)
    {
        if (null !== $this->collSpyCategoryAttributes && !$overrideExisting) {
            return;
        }
        $this->collSpyCategoryAttributes = new ObjectCollection();
        $this->collSpyCategoryAttributes->setModel('\Propel\SpyCategoryAttribute');
    }

    /**
     * Gets an array of ChildSpyCategoryAttribute objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCategoryAttribute[] List of ChildSpyCategoryAttribute objects
     * @throws PropelException
     */
    public function getSpyCategoryAttributes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyCategoryAttributesPartial && !$this->isNew();
        if (null === $this->collSpyCategoryAttributes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyCategoryAttributes) {
                // return empty collection
                $this->initSpyCategoryAttributes();
            } else {
                $collSpyCategoryAttributes = ChildSpyCategoryAttributeQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyCategoryAttributesPartial && count($collSpyCategoryAttributes)) {
                        $this->initSpyCategoryAttributes(false);

                        foreach ($collSpyCategoryAttributes as $obj) {
                            if (false == $this->collSpyCategoryAttributes->contains($obj)) {
                                $this->collSpyCategoryAttributes->append($obj);
                            }
                        }

                        $this->collSpyCategoryAttributesPartial = true;
                    }

                    return $collSpyCategoryAttributes;
                }

                if ($partial && $this->collSpyCategoryAttributes) {
                    foreach ($this->collSpyCategoryAttributes as $obj) {
                        if ($obj->isNew()) {
                            $collSpyCategoryAttributes[] = $obj;
                        }
                    }
                }

                $this->collSpyCategoryAttributes = $collSpyCategoryAttributes;
                $this->collSpyCategoryAttributesPartial = false;
            }
        }

        return $this->collSpyCategoryAttributes;
    }

    /**
     * Sets a collection of ChildSpyCategoryAttribute objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyCategoryAttributes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setSpyCategoryAttributes(Collection $spyCategoryAttributes, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCategoryAttribute[] $spyCategoryAttributesToDelete */
        $spyCategoryAttributesToDelete = $this->getSpyCategoryAttributes(new Criteria(), $con)->diff($spyCategoryAttributes);


        $this->spyCategoryAttributesScheduledForDeletion = $spyCategoryAttributesToDelete;

        foreach ($spyCategoryAttributesToDelete as $spyCategoryAttributeRemoved) {
            $spyCategoryAttributeRemoved->setLocale(null);
        }

        $this->collSpyCategoryAttributes = null;
        foreach ($spyCategoryAttributes as $spyCategoryAttribute) {
            $this->addSpyCategoryAttribute($spyCategoryAttribute);
        }

        $this->collSpyCategoryAttributes = $spyCategoryAttributes;
        $this->collSpyCategoryAttributesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCategoryAttribute objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCategoryAttribute objects.
     * @throws PropelException
     */
    public function countSpyCategoryAttributes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyCategoryAttributesPartial && !$this->isNew();
        if (null === $this->collSpyCategoryAttributes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyCategoryAttributes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyCategoryAttributes());
            }

            $query = ChildSpyCategoryAttributeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collSpyCategoryAttributes);
    }

    /**
     * Method called to associate a ChildSpyCategoryAttribute object to this object
     * through the ChildSpyCategoryAttribute foreign key attribute.
     *
     * @param  ChildSpyCategoryAttribute $l ChildSpyCategoryAttribute
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addSpyCategoryAttribute(ChildSpyCategoryAttribute $l)
    {
        if ($this->collSpyCategoryAttributes === null) {
            $this->initSpyCategoryAttributes();
            $this->collSpyCategoryAttributesPartial = true;
        }

        if (!$this->collSpyCategoryAttributes->contains($l)) {
            $this->doAddSpyCategoryAttribute($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCategoryAttribute $spyCategoryAttribute The ChildSpyCategoryAttribute object to add.
     */
    protected function doAddSpyCategoryAttribute(ChildSpyCategoryAttribute $spyCategoryAttribute)
    {
        $this->collSpyCategoryAttributes[]= $spyCategoryAttribute;
        $spyCategoryAttribute->setLocale($this);
    }

    /**
     * @param  ChildSpyCategoryAttribute $spyCategoryAttribute The ChildSpyCategoryAttribute object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeSpyCategoryAttribute(ChildSpyCategoryAttribute $spyCategoryAttribute)
    {
        if ($this->getSpyCategoryAttributes()->contains($spyCategoryAttribute)) {
            $pos = $this->collSpyCategoryAttributes->search($spyCategoryAttribute);
            $this->collSpyCategoryAttributes->remove($pos);
            if (null === $this->spyCategoryAttributesScheduledForDeletion) {
                $this->spyCategoryAttributesScheduledForDeletion = clone $this->collSpyCategoryAttributes;
                $this->spyCategoryAttributesScheduledForDeletion->clear();
            }
            $this->spyCategoryAttributesScheduledForDeletion[]= clone $spyCategoryAttribute;
            $spyCategoryAttribute->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyCategoryAttributes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCategoryAttribute[] List of ChildSpyCategoryAttribute objects
     */
    public function getSpyCategoryAttributesJoinCategory(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCategoryAttributeQuery::create(null, $criteria);
        $query->joinWith('Category', $joinBehavior);

        return $this->getSpyCategoryAttributes($query, $con);
    }

    /**
     * Clears out the collSpyGlossaryTranslations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyGlossaryTranslations()
     */
    public function clearSpyGlossaryTranslations()
    {
        $this->collSpyGlossaryTranslations = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyGlossaryTranslations collection loaded partially.
     */
    public function resetPartialSpyGlossaryTranslations($v = true)
    {
        $this->collSpyGlossaryTranslationsPartial = $v;
    }

    /**
     * Initializes the collSpyGlossaryTranslations collection.
     *
     * By default this just sets the collSpyGlossaryTranslations collection to an empty array (like clearcollSpyGlossaryTranslations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyGlossaryTranslations($overrideExisting = true)
    {
        if (null !== $this->collSpyGlossaryTranslations && !$overrideExisting) {
            return;
        }
        $this->collSpyGlossaryTranslations = new ObjectCollection();
        $this->collSpyGlossaryTranslations->setModel('\Propel\SpyGlossaryTranslation');
    }

    /**
     * Gets an array of ChildSpyGlossaryTranslation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyGlossaryTranslation[] List of ChildSpyGlossaryTranslation objects
     * @throws PropelException
     */
    public function getSpyGlossaryTranslations(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyGlossaryTranslationsPartial && !$this->isNew();
        if (null === $this->collSpyGlossaryTranslations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyGlossaryTranslations) {
                // return empty collection
                $this->initSpyGlossaryTranslations();
            } else {
                $collSpyGlossaryTranslations = ChildSpyGlossaryTranslationQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyGlossaryTranslationsPartial && count($collSpyGlossaryTranslations)) {
                        $this->initSpyGlossaryTranslations(false);

                        foreach ($collSpyGlossaryTranslations as $obj) {
                            if (false == $this->collSpyGlossaryTranslations->contains($obj)) {
                                $this->collSpyGlossaryTranslations->append($obj);
                            }
                        }

                        $this->collSpyGlossaryTranslationsPartial = true;
                    }

                    return $collSpyGlossaryTranslations;
                }

                if ($partial && $this->collSpyGlossaryTranslations) {
                    foreach ($this->collSpyGlossaryTranslations as $obj) {
                        if ($obj->isNew()) {
                            $collSpyGlossaryTranslations[] = $obj;
                        }
                    }
                }

                $this->collSpyGlossaryTranslations = $collSpyGlossaryTranslations;
                $this->collSpyGlossaryTranslationsPartial = false;
            }
        }

        return $this->collSpyGlossaryTranslations;
    }

    /**
     * Sets a collection of ChildSpyGlossaryTranslation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyGlossaryTranslations A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setSpyGlossaryTranslations(Collection $spyGlossaryTranslations, ConnectionInterface $con = null)
    {
        /** @var ChildSpyGlossaryTranslation[] $spyGlossaryTranslationsToDelete */
        $spyGlossaryTranslationsToDelete = $this->getSpyGlossaryTranslations(new Criteria(), $con)->diff($spyGlossaryTranslations);


        $this->spyGlossaryTranslationsScheduledForDeletion = $spyGlossaryTranslationsToDelete;

        foreach ($spyGlossaryTranslationsToDelete as $spyGlossaryTranslationRemoved) {
            $spyGlossaryTranslationRemoved->setLocale(null);
        }

        $this->collSpyGlossaryTranslations = null;
        foreach ($spyGlossaryTranslations as $spyGlossaryTranslation) {
            $this->addSpyGlossaryTranslation($spyGlossaryTranslation);
        }

        $this->collSpyGlossaryTranslations = $spyGlossaryTranslations;
        $this->collSpyGlossaryTranslationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyGlossaryTranslation objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyGlossaryTranslation objects.
     * @throws PropelException
     */
    public function countSpyGlossaryTranslations(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyGlossaryTranslationsPartial && !$this->isNew();
        if (null === $this->collSpyGlossaryTranslations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyGlossaryTranslations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyGlossaryTranslations());
            }

            $query = ChildSpyGlossaryTranslationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collSpyGlossaryTranslations);
    }

    /**
     * Method called to associate a ChildSpyGlossaryTranslation object to this object
     * through the ChildSpyGlossaryTranslation foreign key attribute.
     *
     * @param  ChildSpyGlossaryTranslation $l ChildSpyGlossaryTranslation
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addSpyGlossaryTranslation(ChildSpyGlossaryTranslation $l)
    {
        if ($this->collSpyGlossaryTranslations === null) {
            $this->initSpyGlossaryTranslations();
            $this->collSpyGlossaryTranslationsPartial = true;
        }

        if (!$this->collSpyGlossaryTranslations->contains($l)) {
            $this->doAddSpyGlossaryTranslation($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyGlossaryTranslation $spyGlossaryTranslation The ChildSpyGlossaryTranslation object to add.
     */
    protected function doAddSpyGlossaryTranslation(ChildSpyGlossaryTranslation $spyGlossaryTranslation)
    {
        $this->collSpyGlossaryTranslations[]= $spyGlossaryTranslation;
        $spyGlossaryTranslation->setLocale($this);
    }

    /**
     * @param  ChildSpyGlossaryTranslation $spyGlossaryTranslation The ChildSpyGlossaryTranslation object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeSpyGlossaryTranslation(ChildSpyGlossaryTranslation $spyGlossaryTranslation)
    {
        if ($this->getSpyGlossaryTranslations()->contains($spyGlossaryTranslation)) {
            $pos = $this->collSpyGlossaryTranslations->search($spyGlossaryTranslation);
            $this->collSpyGlossaryTranslations->remove($pos);
            if (null === $this->spyGlossaryTranslationsScheduledForDeletion) {
                $this->spyGlossaryTranslationsScheduledForDeletion = clone $this->collSpyGlossaryTranslations;
                $this->spyGlossaryTranslationsScheduledForDeletion->clear();
            }
            $this->spyGlossaryTranslationsScheduledForDeletion[]= clone $spyGlossaryTranslation;
            $spyGlossaryTranslation->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyGlossaryTranslations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyGlossaryTranslation[] List of ChildSpyGlossaryTranslation objects
     */
    public function getSpyGlossaryTranslationsJoinGlossaryKey(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyGlossaryTranslationQuery::create(null, $criteria);
        $query->joinWith('GlossaryKey', $joinBehavior);

        return $this->getSpyGlossaryTranslations($query, $con);
    }

    /**
     * Clears out the collSpyLocalizedAbstractProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyLocalizedAbstractProductAttributess()
     */
    public function clearSpyLocalizedAbstractProductAttributess()
    {
        $this->collSpyLocalizedAbstractProductAttributess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyLocalizedAbstractProductAttributess collection loaded partially.
     */
    public function resetPartialSpyLocalizedAbstractProductAttributess($v = true)
    {
        $this->collSpyLocalizedAbstractProductAttributessPartial = $v;
    }

    /**
     * Initializes the collSpyLocalizedAbstractProductAttributess collection.
     *
     * By default this just sets the collSpyLocalizedAbstractProductAttributess collection to an empty array (like clearcollSpyLocalizedAbstractProductAttributess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyLocalizedAbstractProductAttributess($overrideExisting = true)
    {
        if (null !== $this->collSpyLocalizedAbstractProductAttributess && !$overrideExisting) {
            return;
        }
        $this->collSpyLocalizedAbstractProductAttributess = new ObjectCollection();
        $this->collSpyLocalizedAbstractProductAttributess->setModel('\Propel\SpyLocalizedAbstractProductAttributes');
    }

    /**
     * Gets an array of ChildSpyLocalizedAbstractProductAttributes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[] List of ChildSpyLocalizedAbstractProductAttributes objects
     * @throws PropelException
     */
    public function getSpyLocalizedAbstractProductAttributess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedAbstractProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedAbstractProductAttributess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedAbstractProductAttributess) {
                // return empty collection
                $this->initSpyLocalizedAbstractProductAttributess();
            } else {
                $collSpyLocalizedAbstractProductAttributess = ChildSpyLocalizedAbstractProductAttributesQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyLocalizedAbstractProductAttributessPartial && count($collSpyLocalizedAbstractProductAttributess)) {
                        $this->initSpyLocalizedAbstractProductAttributess(false);

                        foreach ($collSpyLocalizedAbstractProductAttributess as $obj) {
                            if (false == $this->collSpyLocalizedAbstractProductAttributess->contains($obj)) {
                                $this->collSpyLocalizedAbstractProductAttributess->append($obj);
                            }
                        }

                        $this->collSpyLocalizedAbstractProductAttributessPartial = true;
                    }

                    return $collSpyLocalizedAbstractProductAttributess;
                }

                if ($partial && $this->collSpyLocalizedAbstractProductAttributess) {
                    foreach ($this->collSpyLocalizedAbstractProductAttributess as $obj) {
                        if ($obj->isNew()) {
                            $collSpyLocalizedAbstractProductAttributess[] = $obj;
                        }
                    }
                }

                $this->collSpyLocalizedAbstractProductAttributess = $collSpyLocalizedAbstractProductAttributess;
                $this->collSpyLocalizedAbstractProductAttributessPartial = false;
            }
        }

        return $this->collSpyLocalizedAbstractProductAttributess;
    }

    /**
     * Sets a collection of ChildSpyLocalizedAbstractProductAttributes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyLocalizedAbstractProductAttributess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setSpyLocalizedAbstractProductAttributess(Collection $spyLocalizedAbstractProductAttributess, ConnectionInterface $con = null)
    {
        /** @var ChildSpyLocalizedAbstractProductAttributes[] $spyLocalizedAbstractProductAttributessToDelete */
        $spyLocalizedAbstractProductAttributessToDelete = $this->getSpyLocalizedAbstractProductAttributess(new Criteria(), $con)->diff($spyLocalizedAbstractProductAttributess);


        $this->spyLocalizedAbstractProductAttributessScheduledForDeletion = $spyLocalizedAbstractProductAttributessToDelete;

        foreach ($spyLocalizedAbstractProductAttributessToDelete as $spyLocalizedAbstractProductAttributesRemoved) {
            $spyLocalizedAbstractProductAttributesRemoved->setLocale(null);
        }

        $this->collSpyLocalizedAbstractProductAttributess = null;
        foreach ($spyLocalizedAbstractProductAttributess as $spyLocalizedAbstractProductAttributes) {
            $this->addSpyLocalizedAbstractProductAttributes($spyLocalizedAbstractProductAttributes);
        }

        $this->collSpyLocalizedAbstractProductAttributess = $spyLocalizedAbstractProductAttributess;
        $this->collSpyLocalizedAbstractProductAttributessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyLocalizedAbstractProductAttributes objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyLocalizedAbstractProductAttributes objects.
     * @throws PropelException
     */
    public function countSpyLocalizedAbstractProductAttributess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedAbstractProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedAbstractProductAttributess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedAbstractProductAttributess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyLocalizedAbstractProductAttributess());
            }

            $query = ChildSpyLocalizedAbstractProductAttributesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collSpyLocalizedAbstractProductAttributess);
    }

    /**
     * Method called to associate a ChildSpyLocalizedAbstractProductAttributes object to this object
     * through the ChildSpyLocalizedAbstractProductAttributes foreign key attribute.
     *
     * @param  ChildSpyLocalizedAbstractProductAttributes $l ChildSpyLocalizedAbstractProductAttributes
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addSpyLocalizedAbstractProductAttributes(ChildSpyLocalizedAbstractProductAttributes $l)
    {
        if ($this->collSpyLocalizedAbstractProductAttributess === null) {
            $this->initSpyLocalizedAbstractProductAttributess();
            $this->collSpyLocalizedAbstractProductAttributessPartial = true;
        }

        if (!$this->collSpyLocalizedAbstractProductAttributess->contains($l)) {
            $this->doAddSpyLocalizedAbstractProductAttributes($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes The ChildSpyLocalizedAbstractProductAttributes object to add.
     */
    protected function doAddSpyLocalizedAbstractProductAttributes(ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes)
    {
        $this->collSpyLocalizedAbstractProductAttributess[]= $spyLocalizedAbstractProductAttributes;
        $spyLocalizedAbstractProductAttributes->setLocale($this);
    }

    /**
     * @param  ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes The ChildSpyLocalizedAbstractProductAttributes object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeSpyLocalizedAbstractProductAttributes(ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes)
    {
        if ($this->getSpyLocalizedAbstractProductAttributess()->contains($spyLocalizedAbstractProductAttributes)) {
            $pos = $this->collSpyLocalizedAbstractProductAttributess->search($spyLocalizedAbstractProductAttributes);
            $this->collSpyLocalizedAbstractProductAttributess->remove($pos);
            if (null === $this->spyLocalizedAbstractProductAttributessScheduledForDeletion) {
                $this->spyLocalizedAbstractProductAttributessScheduledForDeletion = clone $this->collSpyLocalizedAbstractProductAttributess;
                $this->spyLocalizedAbstractProductAttributessScheduledForDeletion->clear();
            }
            $this->spyLocalizedAbstractProductAttributessScheduledForDeletion[]= clone $spyLocalizedAbstractProductAttributes;
            $spyLocalizedAbstractProductAttributes->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyLocalizedAbstractProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[] List of ChildSpyLocalizedAbstractProductAttributes objects
     */
    public function getSpyLocalizedAbstractProductAttributessJoinSpyAbstractProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyLocalizedAbstractProductAttributesQuery::create(null, $criteria);
        $query->joinWith('SpyAbstractProduct', $joinBehavior);

        return $this->getSpyLocalizedAbstractProductAttributess($query, $con);
    }

    /**
     * Clears out the collSpyLocalizedProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyLocalizedProductAttributess()
     */
    public function clearSpyLocalizedProductAttributess()
    {
        $this->collSpyLocalizedProductAttributess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyLocalizedProductAttributess collection loaded partially.
     */
    public function resetPartialSpyLocalizedProductAttributess($v = true)
    {
        $this->collSpyLocalizedProductAttributessPartial = $v;
    }

    /**
     * Initializes the collSpyLocalizedProductAttributess collection.
     *
     * By default this just sets the collSpyLocalizedProductAttributess collection to an empty array (like clearcollSpyLocalizedProductAttributess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyLocalizedProductAttributess($overrideExisting = true)
    {
        if (null !== $this->collSpyLocalizedProductAttributess && !$overrideExisting) {
            return;
        }
        $this->collSpyLocalizedProductAttributess = new ObjectCollection();
        $this->collSpyLocalizedProductAttributess->setModel('\Propel\SpyLocalizedProductAttributes');
    }

    /**
     * Gets an array of ChildSpyLocalizedProductAttributes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyLocalizedProductAttributes[] List of ChildSpyLocalizedProductAttributes objects
     * @throws PropelException
     */
    public function getSpyLocalizedProductAttributess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedProductAttributess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedProductAttributess) {
                // return empty collection
                $this->initSpyLocalizedProductAttributess();
            } else {
                $collSpyLocalizedProductAttributess = ChildSpyLocalizedProductAttributesQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyLocalizedProductAttributessPartial && count($collSpyLocalizedProductAttributess)) {
                        $this->initSpyLocalizedProductAttributess(false);

                        foreach ($collSpyLocalizedProductAttributess as $obj) {
                            if (false == $this->collSpyLocalizedProductAttributess->contains($obj)) {
                                $this->collSpyLocalizedProductAttributess->append($obj);
                            }
                        }

                        $this->collSpyLocalizedProductAttributessPartial = true;
                    }

                    return $collSpyLocalizedProductAttributess;
                }

                if ($partial && $this->collSpyLocalizedProductAttributess) {
                    foreach ($this->collSpyLocalizedProductAttributess as $obj) {
                        if ($obj->isNew()) {
                            $collSpyLocalizedProductAttributess[] = $obj;
                        }
                    }
                }

                $this->collSpyLocalizedProductAttributess = $collSpyLocalizedProductAttributess;
                $this->collSpyLocalizedProductAttributessPartial = false;
            }
        }

        return $this->collSpyLocalizedProductAttributess;
    }

    /**
     * Sets a collection of ChildSpyLocalizedProductAttributes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyLocalizedProductAttributess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setSpyLocalizedProductAttributess(Collection $spyLocalizedProductAttributess, ConnectionInterface $con = null)
    {
        /** @var ChildSpyLocalizedProductAttributes[] $spyLocalizedProductAttributessToDelete */
        $spyLocalizedProductAttributessToDelete = $this->getSpyLocalizedProductAttributess(new Criteria(), $con)->diff($spyLocalizedProductAttributess);


        $this->spyLocalizedProductAttributessScheduledForDeletion = $spyLocalizedProductAttributessToDelete;

        foreach ($spyLocalizedProductAttributessToDelete as $spyLocalizedProductAttributesRemoved) {
            $spyLocalizedProductAttributesRemoved->setLocale(null);
        }

        $this->collSpyLocalizedProductAttributess = null;
        foreach ($spyLocalizedProductAttributess as $spyLocalizedProductAttributes) {
            $this->addSpyLocalizedProductAttributes($spyLocalizedProductAttributes);
        }

        $this->collSpyLocalizedProductAttributess = $spyLocalizedProductAttributess;
        $this->collSpyLocalizedProductAttributessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyLocalizedProductAttributes objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyLocalizedProductAttributes objects.
     * @throws PropelException
     */
    public function countSpyLocalizedProductAttributess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedProductAttributess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedProductAttributess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyLocalizedProductAttributess());
            }

            $query = ChildSpyLocalizedProductAttributesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collSpyLocalizedProductAttributess);
    }

    /**
     * Method called to associate a ChildSpyLocalizedProductAttributes object to this object
     * through the ChildSpyLocalizedProductAttributes foreign key attribute.
     *
     * @param  ChildSpyLocalizedProductAttributes $l ChildSpyLocalizedProductAttributes
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addSpyLocalizedProductAttributes(ChildSpyLocalizedProductAttributes $l)
    {
        if ($this->collSpyLocalizedProductAttributess === null) {
            $this->initSpyLocalizedProductAttributess();
            $this->collSpyLocalizedProductAttributessPartial = true;
        }

        if (!$this->collSpyLocalizedProductAttributess->contains($l)) {
            $this->doAddSpyLocalizedProductAttributes($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes The ChildSpyLocalizedProductAttributes object to add.
     */
    protected function doAddSpyLocalizedProductAttributes(ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes)
    {
        $this->collSpyLocalizedProductAttributess[]= $spyLocalizedProductAttributes;
        $spyLocalizedProductAttributes->setLocale($this);
    }

    /**
     * @param  ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes The ChildSpyLocalizedProductAttributes object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeSpyLocalizedProductAttributes(ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes)
    {
        if ($this->getSpyLocalizedProductAttributess()->contains($spyLocalizedProductAttributes)) {
            $pos = $this->collSpyLocalizedProductAttributess->search($spyLocalizedProductAttributes);
            $this->collSpyLocalizedProductAttributess->remove($pos);
            if (null === $this->spyLocalizedProductAttributessScheduledForDeletion) {
                $this->spyLocalizedProductAttributessScheduledForDeletion = clone $this->collSpyLocalizedProductAttributess;
                $this->spyLocalizedProductAttributessScheduledForDeletion->clear();
            }
            $this->spyLocalizedProductAttributessScheduledForDeletion[]= clone $spyLocalizedProductAttributes;
            $spyLocalizedProductAttributes->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyLocalizedProductAttributes[] List of ChildSpyLocalizedProductAttributes objects
     */
    public function getSpyLocalizedProductAttributessJoinSpyProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyLocalizedProductAttributesQuery::create(null, $criteria);
        $query->joinWith('SpyProduct', $joinBehavior);

        return $this->getSpyLocalizedProductAttributess($query, $con);
    }

    /**
     * Clears out the collSpyTypeValues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyTypeValues()
     */
    public function clearSpyTypeValues()
    {
        $this->collSpyTypeValues = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyTypeValues collection loaded partially.
     */
    public function resetPartialSpyTypeValues($v = true)
    {
        $this->collSpyTypeValuesPartial = $v;
    }

    /**
     * Initializes the collSpyTypeValues collection.
     *
     * By default this just sets the collSpyTypeValues collection to an empty array (like clearcollSpyTypeValues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyTypeValues($overrideExisting = true)
    {
        if (null !== $this->collSpyTypeValues && !$overrideExisting) {
            return;
        }
        $this->collSpyTypeValues = new ObjectCollection();
        $this->collSpyTypeValues->setModel('\Propel\SpyTypeValue');
    }

    /**
     * Gets an array of ChildSpyTypeValue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyTypeValue[] List of ChildSpyTypeValue objects
     * @throws PropelException
     */
    public function getSpyTypeValues(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyTypeValuesPartial && !$this->isNew();
        if (null === $this->collSpyTypeValues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyTypeValues) {
                // return empty collection
                $this->initSpyTypeValues();
            } else {
                $collSpyTypeValues = ChildSpyTypeValueQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyTypeValuesPartial && count($collSpyTypeValues)) {
                        $this->initSpyTypeValues(false);

                        foreach ($collSpyTypeValues as $obj) {
                            if (false == $this->collSpyTypeValues->contains($obj)) {
                                $this->collSpyTypeValues->append($obj);
                            }
                        }

                        $this->collSpyTypeValuesPartial = true;
                    }

                    return $collSpyTypeValues;
                }

                if ($partial && $this->collSpyTypeValues) {
                    foreach ($this->collSpyTypeValues as $obj) {
                        if ($obj->isNew()) {
                            $collSpyTypeValues[] = $obj;
                        }
                    }
                }

                $this->collSpyTypeValues = $collSpyTypeValues;
                $this->collSpyTypeValuesPartial = false;
            }
        }

        return $this->collSpyTypeValues;
    }

    /**
     * Sets a collection of ChildSpyTypeValue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyTypeValues A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setSpyTypeValues(Collection $spyTypeValues, ConnectionInterface $con = null)
    {
        /** @var ChildSpyTypeValue[] $spyTypeValuesToDelete */
        $spyTypeValuesToDelete = $this->getSpyTypeValues(new Criteria(), $con)->diff($spyTypeValues);


        $this->spyTypeValuesScheduledForDeletion = $spyTypeValuesToDelete;

        foreach ($spyTypeValuesToDelete as $spyTypeValueRemoved) {
            $spyTypeValueRemoved->setLocale(null);
        }

        $this->collSpyTypeValues = null;
        foreach ($spyTypeValues as $spyTypeValue) {
            $this->addSpyTypeValue($spyTypeValue);
        }

        $this->collSpyTypeValues = $spyTypeValues;
        $this->collSpyTypeValuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyTypeValue objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyTypeValue objects.
     * @throws PropelException
     */
    public function countSpyTypeValues(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyTypeValuesPartial && !$this->isNew();
        if (null === $this->collSpyTypeValues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyTypeValues) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyTypeValues());
            }

            $query = ChildSpyTypeValueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collSpyTypeValues);
    }

    /**
     * Method called to associate a ChildSpyTypeValue object to this object
     * through the ChildSpyTypeValue foreign key attribute.
     *
     * @param  ChildSpyTypeValue $l ChildSpyTypeValue
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addSpyTypeValue(ChildSpyTypeValue $l)
    {
        if ($this->collSpyTypeValues === null) {
            $this->initSpyTypeValues();
            $this->collSpyTypeValuesPartial = true;
        }

        if (!$this->collSpyTypeValues->contains($l)) {
            $this->doAddSpyTypeValue($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyTypeValue $spyTypeValue The ChildSpyTypeValue object to add.
     */
    protected function doAddSpyTypeValue(ChildSpyTypeValue $spyTypeValue)
    {
        $this->collSpyTypeValues[]= $spyTypeValue;
        $spyTypeValue->setLocale($this);
    }

    /**
     * @param  ChildSpyTypeValue $spyTypeValue The ChildSpyTypeValue object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeSpyTypeValue(ChildSpyTypeValue $spyTypeValue)
    {
        if ($this->getSpyTypeValues()->contains($spyTypeValue)) {
            $pos = $this->collSpyTypeValues->search($spyTypeValue);
            $this->collSpyTypeValues->remove($pos);
            if (null === $this->spyTypeValuesScheduledForDeletion) {
                $this->spyTypeValuesScheduledForDeletion = clone $this->collSpyTypeValues;
                $this->spyTypeValuesScheduledForDeletion->clear();
            }
            $this->spyTypeValuesScheduledForDeletion[]= $spyTypeValue;
            $spyTypeValue->setLocale(null);
        }

        return $this;
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
     * If this ChildSpyLocale is new, it will return
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
                    ->filterBySpyLocale($this)
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
     * @return $this|ChildSpyLocale The current object (for fluent API support)
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
            $spyProductOptionValueTranslationRemoved->setSpyLocale(null);
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
                ->filterBySpyLocale($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionValueTranslations);
    }

    /**
     * Method called to associate a ChildSpyProductOptionValueTranslation object to this object
     * through the ChildSpyProductOptionValueTranslation foreign key attribute.
     *
     * @param  ChildSpyProductOptionValueTranslation $l ChildSpyProductOptionValueTranslation
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
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
        $spyProductOptionValueTranslation->setSpyLocale($this);
    }

    /**
     * @param  ChildSpyProductOptionValueTranslation $spyProductOptionValueTranslation The ChildSpyProductOptionValueTranslation object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
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
            $spyProductOptionValueTranslation->setSpyLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyProductOptionValueTranslations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionValueTranslation[] List of ChildSpyProductOptionValueTranslation objects
     */
    public function getSpyProductOptionValueTranslationsJoinSpyProductOptionValue(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionValueTranslationQuery::create(null, $criteria);
        $query->joinWith('SpyProductOptionValue', $joinBehavior);

        return $this->getSpyProductOptionValueTranslations($query, $con);
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
     * If this ChildSpyLocale is new, it will return
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
                    ->filterBySpyLocale($this)
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
     * @return $this|ChildSpyLocale The current object (for fluent API support)
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
            $spyProductOptionTypeTranslationRemoved->setSpyLocale(null);
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
                ->filterBySpyLocale($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionTypeTranslations);
    }

    /**
     * Method called to associate a ChildSpyProductOptionTypeTranslation object to this object
     * through the ChildSpyProductOptionTypeTranslation foreign key attribute.
     *
     * @param  ChildSpyProductOptionTypeTranslation $l ChildSpyProductOptionTypeTranslation
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
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
        $spyProductOptionTypeTranslation->setSpyLocale($this);
    }

    /**
     * @param  ChildSpyProductOptionTypeTranslation $spyProductOptionTypeTranslation The ChildSpyProductOptionTypeTranslation object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
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
            $spyProductOptionTypeTranslation->setSpyLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyProductOptionTypeTranslations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionTypeTranslation[] List of ChildSpyProductOptionTypeTranslation objects
     */
    public function getSpyProductOptionTypeTranslationsJoinSpyProductOptionType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionTypeTranslationQuery::create(null, $criteria);
        $query->joinWith('SpyProductOptionType', $joinBehavior);

        return $this->getSpyProductOptionTypeTranslations($query, $con);
    }

    /**
     * Clears out the collSpySearchableProductss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpySearchableProductss()
     */
    public function clearSpySearchableProductss()
    {
        $this->collSpySearchableProductss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpySearchableProductss collection loaded partially.
     */
    public function resetPartialSpySearchableProductss($v = true)
    {
        $this->collSpySearchableProductssPartial = $v;
    }

    /**
     * Initializes the collSpySearchableProductss collection.
     *
     * By default this just sets the collSpySearchableProductss collection to an empty array (like clearcollSpySearchableProductss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpySearchableProductss($overrideExisting = true)
    {
        if (null !== $this->collSpySearchableProductss && !$overrideExisting) {
            return;
        }
        $this->collSpySearchableProductss = new ObjectCollection();
        $this->collSpySearchableProductss->setModel('\Propel\SpySearchableProducts');
    }

    /**
     * Gets an array of ChildSpySearchableProducts objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySearchableProducts[] List of ChildSpySearchableProducts objects
     * @throws PropelException
     */
    public function getSpySearchableProductss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySearchableProductssPartial && !$this->isNew();
        if (null === $this->collSpySearchableProductss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpySearchableProductss) {
                // return empty collection
                $this->initSpySearchableProductss();
            } else {
                $collSpySearchableProductss = ChildSpySearchableProductsQuery::create(null, $criteria)
                    ->filterBySpyLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpySearchableProductssPartial && count($collSpySearchableProductss)) {
                        $this->initSpySearchableProductss(false);

                        foreach ($collSpySearchableProductss as $obj) {
                            if (false == $this->collSpySearchableProductss->contains($obj)) {
                                $this->collSpySearchableProductss->append($obj);
                            }
                        }

                        $this->collSpySearchableProductssPartial = true;
                    }

                    return $collSpySearchableProductss;
                }

                if ($partial && $this->collSpySearchableProductss) {
                    foreach ($this->collSpySearchableProductss as $obj) {
                        if ($obj->isNew()) {
                            $collSpySearchableProductss[] = $obj;
                        }
                    }
                }

                $this->collSpySearchableProductss = $collSpySearchableProductss;
                $this->collSpySearchableProductssPartial = false;
            }
        }

        return $this->collSpySearchableProductss;
    }

    /**
     * Sets a collection of ChildSpySearchableProducts objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spySearchableProductss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setSpySearchableProductss(Collection $spySearchableProductss, ConnectionInterface $con = null)
    {
        /** @var ChildSpySearchableProducts[] $spySearchableProductssToDelete */
        $spySearchableProductssToDelete = $this->getSpySearchableProductss(new Criteria(), $con)->diff($spySearchableProductss);


        $this->spySearchableProductssScheduledForDeletion = $spySearchableProductssToDelete;

        foreach ($spySearchableProductssToDelete as $spySearchableProductsRemoved) {
            $spySearchableProductsRemoved->setSpyLocale(null);
        }

        $this->collSpySearchableProductss = null;
        foreach ($spySearchableProductss as $spySearchableProducts) {
            $this->addSpySearchableProducts($spySearchableProducts);
        }

        $this->collSpySearchableProductss = $spySearchableProductss;
        $this->collSpySearchableProductssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySearchableProducts objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySearchableProducts objects.
     * @throws PropelException
     */
    public function countSpySearchableProductss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySearchableProductssPartial && !$this->isNew();
        if (null === $this->collSpySearchableProductss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpySearchableProductss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpySearchableProductss());
            }

            $query = ChildSpySearchableProductsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyLocale($this)
                ->count($con);
        }

        return count($this->collSpySearchableProductss);
    }

    /**
     * Method called to associate a ChildSpySearchableProducts object to this object
     * through the ChildSpySearchableProducts foreign key attribute.
     *
     * @param  ChildSpySearchableProducts $l ChildSpySearchableProducts
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addSpySearchableProducts(ChildSpySearchableProducts $l)
    {
        if ($this->collSpySearchableProductss === null) {
            $this->initSpySearchableProductss();
            $this->collSpySearchableProductssPartial = true;
        }

        if (!$this->collSpySearchableProductss->contains($l)) {
            $this->doAddSpySearchableProducts($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySearchableProducts $spySearchableProducts The ChildSpySearchableProducts object to add.
     */
    protected function doAddSpySearchableProducts(ChildSpySearchableProducts $spySearchableProducts)
    {
        $this->collSpySearchableProductss[]= $spySearchableProducts;
        $spySearchableProducts->setSpyLocale($this);
    }

    /**
     * @param  ChildSpySearchableProducts $spySearchableProducts The ChildSpySearchableProducts object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeSpySearchableProducts(ChildSpySearchableProducts $spySearchableProducts)
    {
        if ($this->getSpySearchableProductss()->contains($spySearchableProducts)) {
            $pos = $this->collSpySearchableProductss->search($spySearchableProducts);
            $this->collSpySearchableProductss->remove($pos);
            if (null === $this->spySearchableProductssScheduledForDeletion) {
                $this->spySearchableProductssScheduledForDeletion = clone $this->collSpySearchableProductss;
                $this->spySearchableProductssScheduledForDeletion->clear();
            }
            $this->spySearchableProductssScheduledForDeletion[]= $spySearchableProducts;
            $spySearchableProducts->setSpyLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpySearchableProductss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySearchableProducts[] List of ChildSpySearchableProducts objects
     */
    public function getSpySearchableProductssJoinSpyProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySearchableProductsQuery::create(null, $criteria);
        $query->joinWith('SpyProduct', $joinBehavior);

        return $this->getSpySearchableProductss($query, $con);
    }

    /**
     * Clears out the collTouchStorages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTouchStorages()
     */
    public function clearTouchStorages()
    {
        $this->collTouchStorages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTouchStorages collection loaded partially.
     */
    public function resetPartialTouchStorages($v = true)
    {
        $this->collTouchStoragesPartial = $v;
    }

    /**
     * Initializes the collTouchStorages collection.
     *
     * By default this just sets the collTouchStorages collection to an empty array (like clearcollTouchStorages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTouchStorages($overrideExisting = true)
    {
        if (null !== $this->collTouchStorages && !$overrideExisting) {
            return;
        }
        $this->collTouchStorages = new ObjectCollection();
        $this->collTouchStorages->setModel('\Propel\SpyTouchStorage');
    }

    /**
     * Gets an array of ChildSpyTouchStorage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyTouchStorage[] List of ChildSpyTouchStorage objects
     * @throws PropelException
     */
    public function getTouchStorages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTouchStoragesPartial && !$this->isNew();
        if (null === $this->collTouchStorages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTouchStorages) {
                // return empty collection
                $this->initTouchStorages();
            } else {
                $collTouchStorages = ChildSpyTouchStorageQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTouchStoragesPartial && count($collTouchStorages)) {
                        $this->initTouchStorages(false);

                        foreach ($collTouchStorages as $obj) {
                            if (false == $this->collTouchStorages->contains($obj)) {
                                $this->collTouchStorages->append($obj);
                            }
                        }

                        $this->collTouchStoragesPartial = true;
                    }

                    return $collTouchStorages;
                }

                if ($partial && $this->collTouchStorages) {
                    foreach ($this->collTouchStorages as $obj) {
                        if ($obj->isNew()) {
                            $collTouchStorages[] = $obj;
                        }
                    }
                }

                $this->collTouchStorages = $collTouchStorages;
                $this->collTouchStoragesPartial = false;
            }
        }

        return $this->collTouchStorages;
    }

    /**
     * Sets a collection of ChildSpyTouchStorage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $touchStorages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setTouchStorages(Collection $touchStorages, ConnectionInterface $con = null)
    {
        /** @var ChildSpyTouchStorage[] $touchStoragesToDelete */
        $touchStoragesToDelete = $this->getTouchStorages(new Criteria(), $con)->diff($touchStorages);


        $this->touchStoragesScheduledForDeletion = $touchStoragesToDelete;

        foreach ($touchStoragesToDelete as $touchStorageRemoved) {
            $touchStorageRemoved->setLocale(null);
        }

        $this->collTouchStorages = null;
        foreach ($touchStorages as $touchStorage) {
            $this->addTouchStorage($touchStorage);
        }

        $this->collTouchStorages = $touchStorages;
        $this->collTouchStoragesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyTouchStorage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyTouchStorage objects.
     * @throws PropelException
     */
    public function countTouchStorages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTouchStoragesPartial && !$this->isNew();
        if (null === $this->collTouchStorages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTouchStorages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTouchStorages());
            }

            $query = ChildSpyTouchStorageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collTouchStorages);
    }

    /**
     * Method called to associate a ChildSpyTouchStorage object to this object
     * through the ChildSpyTouchStorage foreign key attribute.
     *
     * @param  ChildSpyTouchStorage $l ChildSpyTouchStorage
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addTouchStorage(ChildSpyTouchStorage $l)
    {
        if ($this->collTouchStorages === null) {
            $this->initTouchStorages();
            $this->collTouchStoragesPartial = true;
        }

        if (!$this->collTouchStorages->contains($l)) {
            $this->doAddTouchStorage($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyTouchStorage $touchStorage The ChildSpyTouchStorage object to add.
     */
    protected function doAddTouchStorage(ChildSpyTouchStorage $touchStorage)
    {
        $this->collTouchStorages[]= $touchStorage;
        $touchStorage->setLocale($this);
    }

    /**
     * @param  ChildSpyTouchStorage $touchStorage The ChildSpyTouchStorage object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeTouchStorage(ChildSpyTouchStorage $touchStorage)
    {
        if ($this->getTouchStorages()->contains($touchStorage)) {
            $pos = $this->collTouchStorages->search($touchStorage);
            $this->collTouchStorages->remove($pos);
            if (null === $this->touchStoragesScheduledForDeletion) {
                $this->touchStoragesScheduledForDeletion = clone $this->collTouchStorages;
                $this->touchStoragesScheduledForDeletion->clear();
            }
            $this->touchStoragesScheduledForDeletion[]= clone $touchStorage;
            $touchStorage->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related TouchStorages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyTouchStorage[] List of ChildSpyTouchStorage objects
     */
    public function getTouchStoragesJoinTouch(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyTouchStorageQuery::create(null, $criteria);
        $query->joinWith('Touch', $joinBehavior);

        return $this->getTouchStorages($query, $con);
    }

    /**
     * Clears out the collTouchSearches collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTouchSearches()
     */
    public function clearTouchSearches()
    {
        $this->collTouchSearches = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTouchSearches collection loaded partially.
     */
    public function resetPartialTouchSearches($v = true)
    {
        $this->collTouchSearchesPartial = $v;
    }

    /**
     * Initializes the collTouchSearches collection.
     *
     * By default this just sets the collTouchSearches collection to an empty array (like clearcollTouchSearches());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTouchSearches($overrideExisting = true)
    {
        if (null !== $this->collTouchSearches && !$overrideExisting) {
            return;
        }
        $this->collTouchSearches = new ObjectCollection();
        $this->collTouchSearches->setModel('\Propel\SpyTouchSearch');
    }

    /**
     * Gets an array of ChildSpyTouchSearch objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyTouchSearch[] List of ChildSpyTouchSearch objects
     * @throws PropelException
     */
    public function getTouchSearches(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTouchSearchesPartial && !$this->isNew();
        if (null === $this->collTouchSearches || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTouchSearches) {
                // return empty collection
                $this->initTouchSearches();
            } else {
                $collTouchSearches = ChildSpyTouchSearchQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTouchSearchesPartial && count($collTouchSearches)) {
                        $this->initTouchSearches(false);

                        foreach ($collTouchSearches as $obj) {
                            if (false == $this->collTouchSearches->contains($obj)) {
                                $this->collTouchSearches->append($obj);
                            }
                        }

                        $this->collTouchSearchesPartial = true;
                    }

                    return $collTouchSearches;
                }

                if ($partial && $this->collTouchSearches) {
                    foreach ($this->collTouchSearches as $obj) {
                        if ($obj->isNew()) {
                            $collTouchSearches[] = $obj;
                        }
                    }
                }

                $this->collTouchSearches = $collTouchSearches;
                $this->collTouchSearchesPartial = false;
            }
        }

        return $this->collTouchSearches;
    }

    /**
     * Sets a collection of ChildSpyTouchSearch objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $touchSearches A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setTouchSearches(Collection $touchSearches, ConnectionInterface $con = null)
    {
        /** @var ChildSpyTouchSearch[] $touchSearchesToDelete */
        $touchSearchesToDelete = $this->getTouchSearches(new Criteria(), $con)->diff($touchSearches);


        $this->touchSearchesScheduledForDeletion = $touchSearchesToDelete;

        foreach ($touchSearchesToDelete as $touchSearchRemoved) {
            $touchSearchRemoved->setLocale(null);
        }

        $this->collTouchSearches = null;
        foreach ($touchSearches as $touchSearch) {
            $this->addTouchSearch($touchSearch);
        }

        $this->collTouchSearches = $touchSearches;
        $this->collTouchSearchesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyTouchSearch objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyTouchSearch objects.
     * @throws PropelException
     */
    public function countTouchSearches(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTouchSearchesPartial && !$this->isNew();
        if (null === $this->collTouchSearches || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTouchSearches) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTouchSearches());
            }

            $query = ChildSpyTouchSearchQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collTouchSearches);
    }

    /**
     * Method called to associate a ChildSpyTouchSearch object to this object
     * through the ChildSpyTouchSearch foreign key attribute.
     *
     * @param  ChildSpyTouchSearch $l ChildSpyTouchSearch
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addTouchSearch(ChildSpyTouchSearch $l)
    {
        if ($this->collTouchSearches === null) {
            $this->initTouchSearches();
            $this->collTouchSearchesPartial = true;
        }

        if (!$this->collTouchSearches->contains($l)) {
            $this->doAddTouchSearch($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyTouchSearch $touchSearch The ChildSpyTouchSearch object to add.
     */
    protected function doAddTouchSearch(ChildSpyTouchSearch $touchSearch)
    {
        $this->collTouchSearches[]= $touchSearch;
        $touchSearch->setLocale($this);
    }

    /**
     * @param  ChildSpyTouchSearch $touchSearch The ChildSpyTouchSearch object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeTouchSearch(ChildSpyTouchSearch $touchSearch)
    {
        if ($this->getTouchSearches()->contains($touchSearch)) {
            $pos = $this->collTouchSearches->search($touchSearch);
            $this->collTouchSearches->remove($pos);
            if (null === $this->touchSearchesScheduledForDeletion) {
                $this->touchSearchesScheduledForDeletion = clone $this->collTouchSearches;
                $this->touchSearchesScheduledForDeletion->clear();
            }
            $this->touchSearchesScheduledForDeletion[]= clone $touchSearch;
            $touchSearch->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related TouchSearches from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyTouchSearch[] List of ChildSpyTouchSearch objects
     */
    public function getTouchSearchesJoinTouch(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyTouchSearchQuery::create(null, $criteria);
        $query->joinWith('Touch', $joinBehavior);

        return $this->getTouchSearches($query, $con);
    }

    /**
     * Clears out the collSpyUrls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyUrls()
     */
    public function clearSpyUrls()
    {
        $this->collSpyUrls = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyUrls collection loaded partially.
     */
    public function resetPartialSpyUrls($v = true)
    {
        $this->collSpyUrlsPartial = $v;
    }

    /**
     * Initializes the collSpyUrls collection.
     *
     * By default this just sets the collSpyUrls collection to an empty array (like clearcollSpyUrls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyUrls($overrideExisting = true)
    {
        if (null !== $this->collSpyUrls && !$overrideExisting) {
            return;
        }
        $this->collSpyUrls = new ObjectCollection();
        $this->collSpyUrls->setModel('\Propel\SpyUrl');
    }

    /**
     * Gets an array of ChildSpyUrl objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     * @throws PropelException
     */
    public function getSpyUrls(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUrlsPartial && !$this->isNew();
        if (null === $this->collSpyUrls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyUrls) {
                // return empty collection
                $this->initSpyUrls();
            } else {
                $collSpyUrls = ChildSpyUrlQuery::create(null, $criteria)
                    ->filterBySpyLocale($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyUrlsPartial && count($collSpyUrls)) {
                        $this->initSpyUrls(false);

                        foreach ($collSpyUrls as $obj) {
                            if (false == $this->collSpyUrls->contains($obj)) {
                                $this->collSpyUrls->append($obj);
                            }
                        }

                        $this->collSpyUrlsPartial = true;
                    }

                    return $collSpyUrls;
                }

                if ($partial && $this->collSpyUrls) {
                    foreach ($this->collSpyUrls as $obj) {
                        if ($obj->isNew()) {
                            $collSpyUrls[] = $obj;
                        }
                    }
                }

                $this->collSpyUrls = $collSpyUrls;
                $this->collSpyUrlsPartial = false;
            }
        }

        return $this->collSpyUrls;
    }

    /**
     * Sets a collection of ChildSpyUrl objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyUrls A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function setSpyUrls(Collection $spyUrls, ConnectionInterface $con = null)
    {
        /** @var ChildSpyUrl[] $spyUrlsToDelete */
        $spyUrlsToDelete = $this->getSpyUrls(new Criteria(), $con)->diff($spyUrls);


        $this->spyUrlsScheduledForDeletion = $spyUrlsToDelete;

        foreach ($spyUrlsToDelete as $spyUrlRemoved) {
            $spyUrlRemoved->setSpyLocale(null);
        }

        $this->collSpyUrls = null;
        foreach ($spyUrls as $spyUrl) {
            $this->addSpyUrl($spyUrl);
        }

        $this->collSpyUrls = $spyUrls;
        $this->collSpyUrlsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyUrl objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyUrl objects.
     * @throws PropelException
     */
    public function countSpyUrls(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUrlsPartial && !$this->isNew();
        if (null === $this->collSpyUrls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyUrls) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyUrls());
            }

            $query = ChildSpyUrlQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyLocale($this)
                ->count($con);
        }

        return count($this->collSpyUrls);
    }

    /**
     * Method called to associate a ChildSpyUrl object to this object
     * through the ChildSpyUrl foreign key attribute.
     *
     * @param  ChildSpyUrl $l ChildSpyUrl
     * @return $this|\Propel\SpyLocale The current object (for fluent API support)
     */
    public function addSpyUrl(ChildSpyUrl $l)
    {
        if ($this->collSpyUrls === null) {
            $this->initSpyUrls();
            $this->collSpyUrlsPartial = true;
        }

        if (!$this->collSpyUrls->contains($l)) {
            $this->doAddSpyUrl($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyUrl $spyUrl The ChildSpyUrl object to add.
     */
    protected function doAddSpyUrl(ChildSpyUrl $spyUrl)
    {
        $this->collSpyUrls[]= $spyUrl;
        $spyUrl->setSpyLocale($this);
    }

    /**
     * @param  ChildSpyUrl $spyUrl The ChildSpyUrl object to remove.
     * @return $this|ChildSpyLocale The current object (for fluent API support)
     */
    public function removeSpyUrl(ChildSpyUrl $spyUrl)
    {
        if ($this->getSpyUrls()->contains($spyUrl)) {
            $pos = $this->collSpyUrls->search($spyUrl);
            $this->collSpyUrls->remove($pos);
            if (null === $this->spyUrlsScheduledForDeletion) {
                $this->spyUrlsScheduledForDeletion = clone $this->collSpyUrls;
                $this->spyUrlsScheduledForDeletion->clear();
            }
            $this->spyUrlsScheduledForDeletion[]= clone $spyUrl;
            $spyUrl->setSpyLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyCategoryNode(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyCategoryNode', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinCmsPage(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('CmsPage', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyProduct', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyLocale is new, it will return
     * an empty collection; or if this SpyLocale has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyLocale.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyRedirect(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyRedirect', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id_locale = null;
        $this->locale_name = null;
        $this->is_active = null;
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
            if ($this->collSpyCategoryAttributes) {
                foreach ($this->collSpyCategoryAttributes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyGlossaryTranslations) {
                foreach ($this->collSpyGlossaryTranslations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyLocalizedAbstractProductAttributess) {
                foreach ($this->collSpyLocalizedAbstractProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyLocalizedProductAttributess) {
                foreach ($this->collSpyLocalizedProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyTypeValues) {
                foreach ($this->collSpyTypeValues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionValueTranslations) {
                foreach ($this->collSpyProductOptionValueTranslations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionTypeTranslations) {
                foreach ($this->collSpyProductOptionTypeTranslations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpySearchableProductss) {
                foreach ($this->collSpySearchableProductss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTouchStorages) {
                foreach ($this->collTouchStorages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTouchSearches) {
                foreach ($this->collTouchSearches as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyUrls) {
                foreach ($this->collSpyUrls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyCategoryAttributes = null;
        $this->collSpyGlossaryTranslations = null;
        $this->collSpyLocalizedAbstractProductAttributess = null;
        $this->collSpyLocalizedProductAttributess = null;
        $this->collSpyTypeValues = null;
        $this->collSpyProductOptionValueTranslations = null;
        $this->collSpyProductOptionTypeTranslations = null;
        $this->collSpySearchableProductss = null;
        $this->collTouchStorages = null;
        $this->collTouchSearches = null;
        $this->collSpyUrls = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyLocaleTableMap::DEFAULT_STRING_FORMAT);
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
