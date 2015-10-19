<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCategory as ChildSpyCategory;
use Propel\SpyCategoryAttribute as ChildSpyCategoryAttribute;
use Propel\SpyCategoryAttributeQuery as ChildSpyCategoryAttributeQuery;
use Propel\SpyCategoryNode as ChildSpyCategoryNode;
use Propel\SpyCategoryNodeQuery as ChildSpyCategoryNodeQuery;
use Propel\SpyCategoryQuery as ChildSpyCategoryQuery;
use Propel\SpyProductCategory as ChildSpyProductCategory;
use Propel\SpyProductCategoryQuery as ChildSpyProductCategoryQuery;
use Propel\Map\SpyCategoryTableMap;
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
 * Base class that represents a row from the 'spy_category' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyCategory extends SpyCategory implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyCategoryTableMap';


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
     * The value for the id_category field.
     * @var        int
     */
    protected $id_category;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the is_in_menu field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_in_menu;

    /**
     * The value for the is_clickable field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_clickable;

    /**
     * @var        ObjectCollection|ChildSpyCategoryAttribute[] Collection to store aggregation of ChildSpyCategoryAttribute objects.
     */
    protected $collAttributes;
    protected $collAttributesPartial;

    /**
     * @var        ObjectCollection|ChildSpyCategoryNode[] Collection to store aggregation of ChildSpyCategoryNode objects.
     */
    protected $collNodes;
    protected $collNodesPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductCategory[] Collection to store aggregation of ChildSpyProductCategory objects.
     */
    protected $collSpyProductCategories;
    protected $collSpyProductCategoriesPartial;

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
    protected $attributesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCategoryNode[]
     */
    protected $nodesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductCategory[]
     */
    protected $spyProductCategoriesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
        $this->is_in_menu = true;
        $this->is_clickable = true;
    }

    /**
     * Initializes internal state of Propel\Base\SpyCategory object.
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
     * Compares this with another <code>SpyCategory</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyCategory</code>, delegates to
     * <code>equals(SpyCategory)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyCategory The current object, for fluid interface
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
     * Get the [id_category] column value.
     *
     * @return int
     */
    public function getIdCategory()
    {
        return $this->id_category;
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
     * Get the [is_in_menu] column value.
     *
     * @return boolean
     */
    public function getIsInMenu()
    {
        return $this->is_in_menu;
    }

    /**
     * Get the [is_in_menu] column value.
     *
     * @return boolean
     */
    public function isInMenu()
    {
        return $this->getIsInMenu();
    }

    /**
     * Get the [is_clickable] column value.
     *
     * @return boolean
     */
    public function getIsClickable()
    {
        return $this->is_clickable;
    }

    /**
     * Get the [is_clickable] column value.
     *
     * @return boolean
     */
    public function isClickable()
    {
        return $this->getIsClickable();
    }

    /**
     * Set the value of [id_category] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCategory The current object (for fluent API support)
     */
    public function setIdCategory($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_category !== $v) {
            $this->id_category = $v;
            $this->modifiedColumns[SpyCategoryTableMap::COL_ID_CATEGORY] = true;
        }

        return $this;
    } // setIdCategory()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyCategory The current object (for fluent API support)
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
            $this->modifiedColumns[SpyCategoryTableMap::COL_IS_ACTIVE] = true;
        }

        return $this;
    } // setIsActive()

    /**
     * Sets the value of the [is_in_menu] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyCategory The current object (for fluent API support)
     */
    public function setIsInMenu($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_in_menu !== $v) {
            $this->is_in_menu = $v;
            $this->modifiedColumns[SpyCategoryTableMap::COL_IS_IN_MENU] = true;
        }

        return $this;
    } // setIsInMenu()

    /**
     * Sets the value of the [is_clickable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyCategory The current object (for fluent API support)
     */
    public function setIsClickable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_clickable !== $v) {
            $this->is_clickable = $v;
            $this->modifiedColumns[SpyCategoryTableMap::COL_IS_CLICKABLE] = true;
        }

        return $this;
    } // setIsClickable()

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

            if ($this->is_in_menu !== true) {
                return false;
            }

            if ($this->is_clickable !== true) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyCategoryTableMap::translateFieldName('IdCategory', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_category = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyCategoryTableMap::translateFieldName('IsActive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_active = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyCategoryTableMap::translateFieldName('IsInMenu', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_in_menu = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyCategoryTableMap::translateFieldName('IsClickable', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_clickable = (null !== $col) ? (boolean) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = SpyCategoryTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyCategory'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyCategoryTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyCategoryQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAttributes = null;

            $this->collNodes = null;

            $this->collSpyProductCategories = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyCategory::setDeleted()
     * @see SpyCategory::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyCategoryQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryTableMap::DATABASE_NAME);
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
                SpyCategoryTableMap::addInstanceToPool($this);
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

            if ($this->attributesScheduledForDeletion !== null) {
                if (!$this->attributesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCategoryAttributeQuery::create()
                        ->filterByPrimaryKeys($this->attributesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->attributesScheduledForDeletion = null;
                }
            }

            if ($this->collAttributes !== null) {
                foreach ($this->collAttributes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->nodesScheduledForDeletion !== null) {
                if (!$this->nodesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCategoryNodeQuery::create()
                        ->filterByPrimaryKeys($this->nodesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nodesScheduledForDeletion = null;
                }
            }

            if ($this->collNodes !== null) {
                foreach ($this->collNodes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductCategoriesScheduledForDeletion !== null) {
                if (!$this->spyProductCategoriesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductCategoryQuery::create()
                        ->filterByPrimaryKeys($this->spyProductCategoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductCategoriesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductCategories !== null) {
                foreach ($this->collSpyProductCategories as $referrerFK) {
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

        $this->modifiedColumns[SpyCategoryTableMap::COL_ID_CATEGORY] = true;
        if (null !== $this->id_category) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyCategoryTableMap::COL_ID_CATEGORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyCategoryTableMap::COL_ID_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = 'id_category';
        }
        if ($this->isColumnModified(SpyCategoryTableMap::COL_IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'is_active';
        }
        if ($this->isColumnModified(SpyCategoryTableMap::COL_IS_IN_MENU)) {
            $modifiedColumns[':p' . $index++]  = 'is_in_menu';
        }
        if ($this->isColumnModified(SpyCategoryTableMap::COL_IS_CLICKABLE)) {
            $modifiedColumns[':p' . $index++]  = 'is_clickable';
        }

        $sql = sprintf(
            'INSERT INTO spy_category (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_category':
                        $stmt->bindValue($identifier, $this->id_category, PDO::PARAM_INT);
                        break;
                    case 'is_active':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case 'is_in_menu':
                        $stmt->bindValue($identifier, (int) $this->is_in_menu, PDO::PARAM_INT);
                        break;
                    case 'is_clickable':
                        $stmt->bindValue($identifier, (int) $this->is_clickable, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_category_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCategory($pk);

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
        $pos = SpyCategoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdCategory();
                break;
            case 1:
                return $this->getIsActive();
                break;
            case 2:
                return $this->getIsInMenu();
                break;
            case 3:
                return $this->getIsClickable();
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

        if (isset($alreadyDumpedObjects['SpyCategory'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyCategory'][$this->hashCode()] = true;
        $keys = SpyCategoryTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCategory(),
            $keys[1] => $this->getIsActive(),
            $keys[2] => $this->getIsInMenu(),
            $keys[3] => $this->getIsClickable(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collAttributes) {

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

                $result[$key] = $this->collAttributes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNodes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCategoryNodes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_category_nodes';
                        break;
                    default:
                        $key = 'SpyCategoryNodes';
                }

                $result[$key] = $this->collNodes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductCategories) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductCategories';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_categories';
                        break;
                    default:
                        $key = 'SpyProductCategories';
                }

                $result[$key] = $this->collSpyProductCategories->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyCategory
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyCategoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyCategory
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCategory($value);
                break;
            case 1:
                $this->setIsActive($value);
                break;
            case 2:
                $this->setIsInMenu($value);
                break;
            case 3:
                $this->setIsClickable($value);
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
        $keys = SpyCategoryTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCategory($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIsActive($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIsInMenu($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIsClickable($arr[$keys[3]]);
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
     * @return $this|\Propel\SpyCategory The current object, for fluid interface
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
        $criteria = new Criteria(SpyCategoryTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyCategoryTableMap::COL_ID_CATEGORY)) {
            $criteria->add(SpyCategoryTableMap::COL_ID_CATEGORY, $this->id_category);
        }
        if ($this->isColumnModified(SpyCategoryTableMap::COL_IS_ACTIVE)) {
            $criteria->add(SpyCategoryTableMap::COL_IS_ACTIVE, $this->is_active);
        }
        if ($this->isColumnModified(SpyCategoryTableMap::COL_IS_IN_MENU)) {
            $criteria->add(SpyCategoryTableMap::COL_IS_IN_MENU, $this->is_in_menu);
        }
        if ($this->isColumnModified(SpyCategoryTableMap::COL_IS_CLICKABLE)) {
            $criteria->add(SpyCategoryTableMap::COL_IS_CLICKABLE, $this->is_clickable);
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
        $criteria = ChildSpyCategoryQuery::create();
        $criteria->add(SpyCategoryTableMap::COL_ID_CATEGORY, $this->id_category);

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
        $validPk = null !== $this->getIdCategory();

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
        return $this->getIdCategory();
    }

    /**
     * Generic method to set the primary key (id_category column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCategory($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdCategory();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyCategory (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setIsInMenu($this->getIsInMenu());
        $copyObj->setIsClickable($this->getIsClickable());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAttributes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAttribute($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNode($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductCategories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductCategory($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCategory(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyCategory Clone of current object.
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
        if ('Attribute' == $relationName) {
            return $this->initAttributes();
        }
        if ('Node' == $relationName) {
            return $this->initNodes();
        }
        if ('SpyProductCategory' == $relationName) {
            return $this->initSpyProductCategories();
        }
    }

    /**
     * Clears out the collAttributes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAttributes()
     */
    public function clearAttributes()
    {
        $this->collAttributes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAttributes collection loaded partially.
     */
    public function resetPartialAttributes($v = true)
    {
        $this->collAttributesPartial = $v;
    }

    /**
     * Initializes the collAttributes collection.
     *
     * By default this just sets the collAttributes collection to an empty array (like clearcollAttributes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAttributes($overrideExisting = true)
    {
        if (null !== $this->collAttributes && !$overrideExisting) {
            return;
        }
        $this->collAttributes = new ObjectCollection();
        $this->collAttributes->setModel('\Propel\SpyCategoryAttribute');
    }

    /**
     * Gets an array of ChildSpyCategoryAttribute objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCategoryAttribute[] List of ChildSpyCategoryAttribute objects
     * @throws PropelException
     */
    public function getAttributes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAttributesPartial && !$this->isNew();
        if (null === $this->collAttributes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAttributes) {
                // return empty collection
                $this->initAttributes();
            } else {
                $collAttributes = ChildSpyCategoryAttributeQuery::create(null, $criteria)
                    ->filterByCategory($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAttributesPartial && count($collAttributes)) {
                        $this->initAttributes(false);

                        foreach ($collAttributes as $obj) {
                            if (false == $this->collAttributes->contains($obj)) {
                                $this->collAttributes->append($obj);
                            }
                        }

                        $this->collAttributesPartial = true;
                    }

                    return $collAttributes;
                }

                if ($partial && $this->collAttributes) {
                    foreach ($this->collAttributes as $obj) {
                        if ($obj->isNew()) {
                            $collAttributes[] = $obj;
                        }
                    }
                }

                $this->collAttributes = $collAttributes;
                $this->collAttributesPartial = false;
            }
        }

        return $this->collAttributes;
    }

    /**
     * Sets a collection of ChildSpyCategoryAttribute objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $attributes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCategory The current object (for fluent API support)
     */
    public function setAttributes(Collection $attributes, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCategoryAttribute[] $attributesToDelete */
        $attributesToDelete = $this->getAttributes(new Criteria(), $con)->diff($attributes);


        $this->attributesScheduledForDeletion = $attributesToDelete;

        foreach ($attributesToDelete as $attributeRemoved) {
            $attributeRemoved->setCategory(null);
        }

        $this->collAttributes = null;
        foreach ($attributes as $attribute) {
            $this->addAttribute($attribute);
        }

        $this->collAttributes = $attributes;
        $this->collAttributesPartial = false;

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
    public function countAttributes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAttributesPartial && !$this->isNew();
        if (null === $this->collAttributes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAttributes());
            }

            $query = ChildSpyCategoryAttributeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCategory($this)
                ->count($con);
        }

        return count($this->collAttributes);
    }

    /**
     * Method called to associate a ChildSpyCategoryAttribute object to this object
     * through the ChildSpyCategoryAttribute foreign key attribute.
     *
     * @param  ChildSpyCategoryAttribute $l ChildSpyCategoryAttribute
     * @return $this|\Propel\SpyCategory The current object (for fluent API support)
     */
    public function addAttribute(ChildSpyCategoryAttribute $l)
    {
        if ($this->collAttributes === null) {
            $this->initAttributes();
            $this->collAttributesPartial = true;
        }

        if (!$this->collAttributes->contains($l)) {
            $this->doAddAttribute($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCategoryAttribute $attribute The ChildSpyCategoryAttribute object to add.
     */
    protected function doAddAttribute(ChildSpyCategoryAttribute $attribute)
    {
        $this->collAttributes[]= $attribute;
        $attribute->setCategory($this);
    }

    /**
     * @param  ChildSpyCategoryAttribute $attribute The ChildSpyCategoryAttribute object to remove.
     * @return $this|ChildSpyCategory The current object (for fluent API support)
     */
    public function removeAttribute(ChildSpyCategoryAttribute $attribute)
    {
        if ($this->getAttributes()->contains($attribute)) {
            $pos = $this->collAttributes->search($attribute);
            $this->collAttributes->remove($pos);
            if (null === $this->attributesScheduledForDeletion) {
                $this->attributesScheduledForDeletion = clone $this->collAttributes;
                $this->attributesScheduledForDeletion->clear();
            }
            $this->attributesScheduledForDeletion[]= clone $attribute;
            $attribute->setCategory(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCategory is new, it will return
     * an empty collection; or if this SpyCategory has previously
     * been saved, it will retrieve related Attributes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategory.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCategoryAttribute[] List of ChildSpyCategoryAttribute objects
     */
    public function getAttributesJoinLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCategoryAttributeQuery::create(null, $criteria);
        $query->joinWith('Locale', $joinBehavior);

        return $this->getAttributes($query, $con);
    }

    /**
     * Clears out the collNodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNodes()
     */
    public function clearNodes()
    {
        $this->collNodes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collNodes collection loaded partially.
     */
    public function resetPartialNodes($v = true)
    {
        $this->collNodesPartial = $v;
    }

    /**
     * Initializes the collNodes collection.
     *
     * By default this just sets the collNodes collection to an empty array (like clearcollNodes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNodes($overrideExisting = true)
    {
        if (null !== $this->collNodes && !$overrideExisting) {
            return;
        }
        $this->collNodes = new ObjectCollection();
        $this->collNodes->setModel('\Propel\SpyCategoryNode');
    }

    /**
     * Gets an array of ChildSpyCategoryNode objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCategoryNode[] List of ChildSpyCategoryNode objects
     * @throws PropelException
     */
    public function getNodes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collNodesPartial && !$this->isNew();
        if (null === $this->collNodes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNodes) {
                // return empty collection
                $this->initNodes();
            } else {
                $collNodes = ChildSpyCategoryNodeQuery::create(null, $criteria)
                    ->filterByCategory($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collNodesPartial && count($collNodes)) {
                        $this->initNodes(false);

                        foreach ($collNodes as $obj) {
                            if (false == $this->collNodes->contains($obj)) {
                                $this->collNodes->append($obj);
                            }
                        }

                        $this->collNodesPartial = true;
                    }

                    return $collNodes;
                }

                if ($partial && $this->collNodes) {
                    foreach ($this->collNodes as $obj) {
                        if ($obj->isNew()) {
                            $collNodes[] = $obj;
                        }
                    }
                }

                $this->collNodes = $collNodes;
                $this->collNodesPartial = false;
            }
        }

        return $this->collNodes;
    }

    /**
     * Sets a collection of ChildSpyCategoryNode objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $nodes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCategory The current object (for fluent API support)
     */
    public function setNodes(Collection $nodes, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCategoryNode[] $nodesToDelete */
        $nodesToDelete = $this->getNodes(new Criteria(), $con)->diff($nodes);


        $this->nodesScheduledForDeletion = $nodesToDelete;

        foreach ($nodesToDelete as $nodeRemoved) {
            $nodeRemoved->setCategory(null);
        }

        $this->collNodes = null;
        foreach ($nodes as $node) {
            $this->addNode($node);
        }

        $this->collNodes = $nodes;
        $this->collNodesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCategoryNode objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCategoryNode objects.
     * @throws PropelException
     */
    public function countNodes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collNodesPartial && !$this->isNew();
        if (null === $this->collNodes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNodes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getNodes());
            }

            $query = ChildSpyCategoryNodeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCategory($this)
                ->count($con);
        }

        return count($this->collNodes);
    }

    /**
     * Method called to associate a ChildSpyCategoryNode object to this object
     * through the ChildSpyCategoryNode foreign key attribute.
     *
     * @param  ChildSpyCategoryNode $l ChildSpyCategoryNode
     * @return $this|\Propel\SpyCategory The current object (for fluent API support)
     */
    public function addNode(ChildSpyCategoryNode $l)
    {
        if ($this->collNodes === null) {
            $this->initNodes();
            $this->collNodesPartial = true;
        }

        if (!$this->collNodes->contains($l)) {
            $this->doAddNode($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCategoryNode $node The ChildSpyCategoryNode object to add.
     */
    protected function doAddNode(ChildSpyCategoryNode $node)
    {
        $this->collNodes[]= $node;
        $node->setCategory($this);
    }

    /**
     * @param  ChildSpyCategoryNode $node The ChildSpyCategoryNode object to remove.
     * @return $this|ChildSpyCategory The current object (for fluent API support)
     */
    public function removeNode(ChildSpyCategoryNode $node)
    {
        if ($this->getNodes()->contains($node)) {
            $pos = $this->collNodes->search($node);
            $this->collNodes->remove($pos);
            if (null === $this->nodesScheduledForDeletion) {
                $this->nodesScheduledForDeletion = clone $this->collNodes;
                $this->nodesScheduledForDeletion->clear();
            }
            $this->nodesScheduledForDeletion[]= clone $node;
            $node->setCategory(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCategory is new, it will return
     * an empty collection; or if this SpyCategory has previously
     * been saved, it will retrieve related Nodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategory.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCategoryNode[] List of ChildSpyCategoryNode objects
     */
    public function getNodesJoinParentCategoryNode(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCategoryNodeQuery::create(null, $criteria);
        $query->joinWith('ParentCategoryNode', $joinBehavior);

        return $this->getNodes($query, $con);
    }

    /**
     * Clears out the collSpyProductCategories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductCategories()
     */
    public function clearSpyProductCategories()
    {
        $this->collSpyProductCategories = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductCategories collection loaded partially.
     */
    public function resetPartialSpyProductCategories($v = true)
    {
        $this->collSpyProductCategoriesPartial = $v;
    }

    /**
     * Initializes the collSpyProductCategories collection.
     *
     * By default this just sets the collSpyProductCategories collection to an empty array (like clearcollSpyProductCategories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductCategories($overrideExisting = true)
    {
        if (null !== $this->collSpyProductCategories && !$overrideExisting) {
            return;
        }
        $this->collSpyProductCategories = new ObjectCollection();
        $this->collSpyProductCategories->setModel('\Propel\SpyProductCategory');
    }

    /**
     * Gets an array of ChildSpyProductCategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductCategory[] List of ChildSpyProductCategory objects
     * @throws PropelException
     */
    public function getSpyProductCategories(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductCategoriesPartial && !$this->isNew();
        if (null === $this->collSpyProductCategories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductCategories) {
                // return empty collection
                $this->initSpyProductCategories();
            } else {
                $collSpyProductCategories = ChildSpyProductCategoryQuery::create(null, $criteria)
                    ->filterBySpyCategory($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductCategoriesPartial && count($collSpyProductCategories)) {
                        $this->initSpyProductCategories(false);

                        foreach ($collSpyProductCategories as $obj) {
                            if (false == $this->collSpyProductCategories->contains($obj)) {
                                $this->collSpyProductCategories->append($obj);
                            }
                        }

                        $this->collSpyProductCategoriesPartial = true;
                    }

                    return $collSpyProductCategories;
                }

                if ($partial && $this->collSpyProductCategories) {
                    foreach ($this->collSpyProductCategories as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductCategories[] = $obj;
                        }
                    }
                }

                $this->collSpyProductCategories = $collSpyProductCategories;
                $this->collSpyProductCategoriesPartial = false;
            }
        }

        return $this->collSpyProductCategories;
    }

    /**
     * Sets a collection of ChildSpyProductCategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductCategories A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCategory The current object (for fluent API support)
     */
    public function setSpyProductCategories(Collection $spyProductCategories, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductCategory[] $spyProductCategoriesToDelete */
        $spyProductCategoriesToDelete = $this->getSpyProductCategories(new Criteria(), $con)->diff($spyProductCategories);


        $this->spyProductCategoriesScheduledForDeletion = $spyProductCategoriesToDelete;

        foreach ($spyProductCategoriesToDelete as $spyProductCategoryRemoved) {
            $spyProductCategoryRemoved->setSpyCategory(null);
        }

        $this->collSpyProductCategories = null;
        foreach ($spyProductCategories as $spyProductCategory) {
            $this->addSpyProductCategory($spyProductCategory);
        }

        $this->collSpyProductCategories = $spyProductCategories;
        $this->collSpyProductCategoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductCategory objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductCategory objects.
     * @throws PropelException
     */
    public function countSpyProductCategories(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductCategoriesPartial && !$this->isNew();
        if (null === $this->collSpyProductCategories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductCategories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductCategories());
            }

            $query = ChildSpyProductCategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyCategory($this)
                ->count($con);
        }

        return count($this->collSpyProductCategories);
    }

    /**
     * Method called to associate a ChildSpyProductCategory object to this object
     * through the ChildSpyProductCategory foreign key attribute.
     *
     * @param  ChildSpyProductCategory $l ChildSpyProductCategory
     * @return $this|\Propel\SpyCategory The current object (for fluent API support)
     */
    public function addSpyProductCategory(ChildSpyProductCategory $l)
    {
        if ($this->collSpyProductCategories === null) {
            $this->initSpyProductCategories();
            $this->collSpyProductCategoriesPartial = true;
        }

        if (!$this->collSpyProductCategories->contains($l)) {
            $this->doAddSpyProductCategory($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductCategory $spyProductCategory The ChildSpyProductCategory object to add.
     */
    protected function doAddSpyProductCategory(ChildSpyProductCategory $spyProductCategory)
    {
        $this->collSpyProductCategories[]= $spyProductCategory;
        $spyProductCategory->setSpyCategory($this);
    }

    /**
     * @param  ChildSpyProductCategory $spyProductCategory The ChildSpyProductCategory object to remove.
     * @return $this|ChildSpyCategory The current object (for fluent API support)
     */
    public function removeSpyProductCategory(ChildSpyProductCategory $spyProductCategory)
    {
        if ($this->getSpyProductCategories()->contains($spyProductCategory)) {
            $pos = $this->collSpyProductCategories->search($spyProductCategory);
            $this->collSpyProductCategories->remove($pos);
            if (null === $this->spyProductCategoriesScheduledForDeletion) {
                $this->spyProductCategoriesScheduledForDeletion = clone $this->collSpyProductCategories;
                $this->spyProductCategoriesScheduledForDeletion->clear();
            }
            $this->spyProductCategoriesScheduledForDeletion[]= clone $spyProductCategory;
            $spyProductCategory->setSpyCategory(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCategory is new, it will return
     * an empty collection; or if this SpyCategory has previously
     * been saved, it will retrieve related SpyProductCategories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategory.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductCategory[] List of ChildSpyProductCategory objects
     */
    public function getSpyProductCategoriesJoinSpyAbstractProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductCategoryQuery::create(null, $criteria);
        $query->joinWith('SpyAbstractProduct', $joinBehavior);

        return $this->getSpyProductCategories($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id_category = null;
        $this->is_active = null;
        $this->is_in_menu = null;
        $this->is_clickable = null;
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
            if ($this->collAttributes) {
                foreach ($this->collAttributes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNodes) {
                foreach ($this->collNodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductCategories) {
                foreach ($this->collSpyProductCategories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAttributes = null;
        $this->collNodes = null;
        $this->collSpyProductCategories = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyCategoryTableMap::DEFAULT_STRING_FORMAT);
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
