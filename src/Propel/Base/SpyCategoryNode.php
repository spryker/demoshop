<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCategory as ChildSpyCategory;
use Propel\SpyCategoryClosureTable as ChildSpyCategoryClosureTable;
use Propel\SpyCategoryClosureTableQuery as ChildSpyCategoryClosureTableQuery;
use Propel\SpyCategoryNode as ChildSpyCategoryNode;
use Propel\SpyCategoryNodeQuery as ChildSpyCategoryNodeQuery;
use Propel\SpyCategoryQuery as ChildSpyCategoryQuery;
use Propel\SpyUrl as ChildSpyUrl;
use Propel\SpyUrlQuery as ChildSpyUrlQuery;
use Propel\Map\SpyCategoryNodeTableMap;
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
 * Base class that represents a row from the 'spy_category_node' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyCategoryNode extends SpyCategoryNode implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyCategoryNodeTableMap';


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
     * The value for the id_category_node field.
     * @var        int
     */
    protected $id_category_node;

    /**
     * The value for the fk_category field.
     * @var        int
     */
    protected $fk_category;

    /**
     * The value for the fk_parent_category_node field.
     * @var        int
     */
    protected $fk_parent_category_node;

    /**
     * The value for the is_root field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_root;

    /**
     * The value for the is_main field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_main;

    /**
     * The value for the node_order field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $node_order;

    /**
     * @var        ChildSpyCategoryNode
     */
    protected $aParentCategoryNode;

    /**
     * @var        ChildSpyCategory
     */
    protected $aCategory;

    /**
     * @var        ObjectCollection|ChildSpyCategoryNode[] Collection to store aggregation of ChildSpyCategoryNode objects.
     */
    protected $collNodes;
    protected $collNodesPartial;

    /**
     * @var        ObjectCollection|ChildSpyCategoryClosureTable[] Collection to store aggregation of ChildSpyCategoryClosureTable objects.
     */
    protected $collClosureTables;
    protected $collClosureTablesPartial;

    /**
     * @var        ObjectCollection|ChildSpyCategoryClosureTable[] Collection to store aggregation of ChildSpyCategoryClosureTable objects.
     */
    protected $collDescendants;
    protected $collDescendantsPartial;

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
     * @var ObjectCollection|ChildSpyCategoryNode[]
     */
    protected $nodesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCategoryClosureTable[]
     */
    protected $closureTablesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCategoryClosureTable[]
     */
    protected $descendantsScheduledForDeletion = null;

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
        $this->is_root = false;
        $this->is_main = false;
        $this->node_order = 0;
    }

    /**
     * Initializes internal state of Propel\Base\SpyCategoryNode object.
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
     * Compares this with another <code>SpyCategoryNode</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyCategoryNode</code>, delegates to
     * <code>equals(SpyCategoryNode)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyCategoryNode The current object, for fluid interface
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
     * Get the [id_category_node] column value.
     *
     * @return int
     */
    public function getIdCategoryNode()
    {
        return $this->id_category_node;
    }

    /**
     * Get the [fk_category] column value.
     *
     * @return int
     */
    public function getFkCategory()
    {
        return $this->fk_category;
    }

    /**
     * Get the [fk_parent_category_node] column value.
     *
     * @return int
     */
    public function getFkParentCategoryNode()
    {
        return $this->fk_parent_category_node;
    }

    /**
     * Get the [is_root] column value.
     *
     * @return boolean
     */
    public function getIsRoot()
    {
        return $this->is_root;
    }

    /**
     * Get the [is_root] column value.
     *
     * @return boolean
     */
    public function isRoot()
    {
        return $this->getIsRoot();
    }

    /**
     * Get the [is_main] column value.
     *
     * @return boolean
     */
    public function getIsMain()
    {
        return $this->is_main;
    }

    /**
     * Get the [is_main] column value.
     *
     * @return boolean
     */
    public function isMain()
    {
        return $this->getIsMain();
    }

    /**
     * Get the [node_order] column value.
     *
     * @return int
     */
    public function getNodeOrder()
    {
        return $this->node_order;
    }

    /**
     * Set the value of [id_category_node] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function setIdCategoryNode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_category_node !== $v) {
            $this->id_category_node = $v;
            $this->modifiedColumns[SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE] = true;
        }

        return $this;
    } // setIdCategoryNode()

    /**
     * Set the value of [fk_category] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function setFkCategory($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_category !== $v) {
            $this->fk_category = $v;
            $this->modifiedColumns[SpyCategoryNodeTableMap::COL_FK_CATEGORY] = true;
        }

        if ($this->aCategory !== null && $this->aCategory->getIdCategory() !== $v) {
            $this->aCategory = null;
        }

        return $this;
    } // setFkCategory()

    /**
     * Set the value of [fk_parent_category_node] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function setFkParentCategoryNode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_parent_category_node !== $v) {
            $this->fk_parent_category_node = $v;
            $this->modifiedColumns[SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE] = true;
        }

        if ($this->aParentCategoryNode !== null && $this->aParentCategoryNode->getIdCategoryNode() !== $v) {
            $this->aParentCategoryNode = null;
        }

        return $this;
    } // setFkParentCategoryNode()

    /**
     * Sets the value of the [is_root] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function setIsRoot($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_root !== $v) {
            $this->is_root = $v;
            $this->modifiedColumns[SpyCategoryNodeTableMap::COL_IS_ROOT] = true;
        }

        return $this;
    } // setIsRoot()

    /**
     * Sets the value of the [is_main] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function setIsMain($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_main !== $v) {
            $this->is_main = $v;
            $this->modifiedColumns[SpyCategoryNodeTableMap::COL_IS_MAIN] = true;
        }

        return $this;
    } // setIsMain()

    /**
     * Set the value of [node_order] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function setNodeOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->node_order !== $v) {
            $this->node_order = $v;
            $this->modifiedColumns[SpyCategoryNodeTableMap::COL_NODE_ORDER] = true;
        }

        return $this;
    } // setNodeOrder()

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
            if ($this->is_root !== false) {
                return false;
            }

            if ($this->is_main !== false) {
                return false;
            }

            if ($this->node_order !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyCategoryNodeTableMap::translateFieldName('IdCategoryNode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_category_node = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyCategoryNodeTableMap::translateFieldName('FkCategory', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_category = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyCategoryNodeTableMap::translateFieldName('FkParentCategoryNode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_parent_category_node = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyCategoryNodeTableMap::translateFieldName('IsRoot', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_root = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyCategoryNodeTableMap::translateFieldName('IsMain', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_main = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyCategoryNodeTableMap::translateFieldName('NodeOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->node_order = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = SpyCategoryNodeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyCategoryNode'), 0, $e);
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
        if ($this->aCategory !== null && $this->fk_category !== $this->aCategory->getIdCategory()) {
            $this->aCategory = null;
        }
        if ($this->aParentCategoryNode !== null && $this->fk_parent_category_node !== $this->aParentCategoryNode->getIdCategoryNode()) {
            $this->aParentCategoryNode = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyCategoryNodeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aParentCategoryNode = null;
            $this->aCategory = null;
            $this->collNodes = null;

            $this->collClosureTables = null;

            $this->collDescendants = null;

            $this->collSpyUrls = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyCategoryNode::setDeleted()
     * @see SpyCategoryNode::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyCategoryNodeQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
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
                SpyCategoryNodeTableMap::addInstanceToPool($this);
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

            if ($this->aParentCategoryNode !== null) {
                if ($this->aParentCategoryNode->isModified() || $this->aParentCategoryNode->isNew()) {
                    $affectedRows += $this->aParentCategoryNode->save($con);
                }
                $this->setParentCategoryNode($this->aParentCategoryNode);
            }

            if ($this->aCategory !== null) {
                if ($this->aCategory->isModified() || $this->aCategory->isNew()) {
                    $affectedRows += $this->aCategory->save($con);
                }
                $this->setCategory($this->aCategory);
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

            if ($this->nodesScheduledForDeletion !== null) {
                if (!$this->nodesScheduledForDeletion->isEmpty()) {
                    foreach ($this->nodesScheduledForDeletion as $node) {
                        // need to save related object because we set the relation to null
                        $node->save($con);
                    }
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

            if ($this->closureTablesScheduledForDeletion !== null) {
                if (!$this->closureTablesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCategoryClosureTableQuery::create()
                        ->filterByPrimaryKeys($this->closureTablesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->closureTablesScheduledForDeletion = null;
                }
            }

            if ($this->collClosureTables !== null) {
                foreach ($this->collClosureTables as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->descendantsScheduledForDeletion !== null) {
                if (!$this->descendantsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCategoryClosureTableQuery::create()
                        ->filterByPrimaryKeys($this->descendantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->descendantsScheduledForDeletion = null;
                }
            }

            if ($this->collDescendants !== null) {
                foreach ($this->collDescendants as $referrerFK) {
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

        $this->modifiedColumns[SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE] = true;
        if (null !== $this->id_category_node) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE)) {
            $modifiedColumns[':p' . $index++]  = 'id_category_node';
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_FK_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = 'fk_category';
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_parent_category_node';
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_IS_ROOT)) {
            $modifiedColumns[':p' . $index++]  = 'is_root';
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_IS_MAIN)) {
            $modifiedColumns[':p' . $index++]  = 'is_main';
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_NODE_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'node_order';
        }

        $sql = sprintf(
            'INSERT INTO spy_category_node (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_category_node':
                        $stmt->bindValue($identifier, $this->id_category_node, PDO::PARAM_INT);
                        break;
                    case 'fk_category':
                        $stmt->bindValue($identifier, $this->fk_category, PDO::PARAM_INT);
                        break;
                    case 'fk_parent_category_node':
                        $stmt->bindValue($identifier, $this->fk_parent_category_node, PDO::PARAM_INT);
                        break;
                    case 'is_root':
                        $stmt->bindValue($identifier, (int) $this->is_root, PDO::PARAM_INT);
                        break;
                    case 'is_main':
                        $stmt->bindValue($identifier, (int) $this->is_main, PDO::PARAM_INT);
                        break;
                    case 'node_order':
                        $stmt->bindValue($identifier, $this->node_order, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_category_node_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCategoryNode($pk);

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
        $pos = SpyCategoryNodeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdCategoryNode();
                break;
            case 1:
                return $this->getFkCategory();
                break;
            case 2:
                return $this->getFkParentCategoryNode();
                break;
            case 3:
                return $this->getIsRoot();
                break;
            case 4:
                return $this->getIsMain();
                break;
            case 5:
                return $this->getNodeOrder();
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

        if (isset($alreadyDumpedObjects['SpyCategoryNode'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyCategoryNode'][$this->hashCode()] = true;
        $keys = SpyCategoryNodeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCategoryNode(),
            $keys[1] => $this->getFkCategory(),
            $keys[2] => $this->getFkParentCategoryNode(),
            $keys[3] => $this->getIsRoot(),
            $keys[4] => $this->getIsMain(),
            $keys[5] => $this->getNodeOrder(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aParentCategoryNode) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCategoryNode';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_category_node';
                        break;
                    default:
                        $key = 'SpyCategoryNode';
                }

                $result[$key] = $this->aParentCategoryNode->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCategory) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCategory';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_category';
                        break;
                    default:
                        $key = 'SpyCategory';
                }

                $result[$key] = $this->aCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collClosureTables) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCategoryClosureTables';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_category_closure_tables';
                        break;
                    default:
                        $key = 'SpyCategoryClosureTables';
                }

                $result[$key] = $this->collClosureTables->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDescendants) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCategoryClosureTables';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_category_closure_tables';
                        break;
                    default:
                        $key = 'SpyCategoryClosureTables';
                }

                $result[$key] = $this->collDescendants->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyCategoryNode
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyCategoryNodeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyCategoryNode
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCategoryNode($value);
                break;
            case 1:
                $this->setFkCategory($value);
                break;
            case 2:
                $this->setFkParentCategoryNode($value);
                break;
            case 3:
                $this->setIsRoot($value);
                break;
            case 4:
                $this->setIsMain($value);
                break;
            case 5:
                $this->setNodeOrder($value);
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
        $keys = SpyCategoryNodeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCategoryNode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkCategory($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkParentCategoryNode($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIsRoot($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIsMain($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setNodeOrder($arr[$keys[5]]);
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
     * @return $this|\Propel\SpyCategoryNode The current object, for fluid interface
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
        $criteria = new Criteria(SpyCategoryNodeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE)) {
            $criteria->add(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $this->id_category_node);
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_FK_CATEGORY)) {
            $criteria->add(SpyCategoryNodeTableMap::COL_FK_CATEGORY, $this->fk_category);
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE)) {
            $criteria->add(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE, $this->fk_parent_category_node);
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_IS_ROOT)) {
            $criteria->add(SpyCategoryNodeTableMap::COL_IS_ROOT, $this->is_root);
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_IS_MAIN)) {
            $criteria->add(SpyCategoryNodeTableMap::COL_IS_MAIN, $this->is_main);
        }
        if ($this->isColumnModified(SpyCategoryNodeTableMap::COL_NODE_ORDER)) {
            $criteria->add(SpyCategoryNodeTableMap::COL_NODE_ORDER, $this->node_order);
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
        $criteria = ChildSpyCategoryNodeQuery::create();
        $criteria->add(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $this->id_category_node);

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
        $validPk = null !== $this->getIdCategoryNode();

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
        return $this->getIdCategoryNode();
    }

    /**
     * Generic method to set the primary key (id_category_node column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCategoryNode($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdCategoryNode();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyCategoryNode (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCategory($this->getFkCategory());
        $copyObj->setFkParentCategoryNode($this->getFkParentCategoryNode());
        $copyObj->setIsRoot($this->getIsRoot());
        $copyObj->setIsMain($this->getIsMain());
        $copyObj->setNodeOrder($this->getNodeOrder());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getNodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNode($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClosureTables() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClosureTable($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDescendants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDescendant($relObj->copy($deepCopy));
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
            $copyObj->setIdCategoryNode(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyCategoryNode Clone of current object.
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
     * Declares an association between this object and a ChildSpyCategoryNode object.
     *
     * @param  ChildSpyCategoryNode $v
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     * @throws PropelException
     */
    public function setParentCategoryNode(ChildSpyCategoryNode $v = null)
    {
        if ($v === null) {
            $this->setFkParentCategoryNode(NULL);
        } else {
            $this->setFkParentCategoryNode($v->getIdCategoryNode());
        }

        $this->aParentCategoryNode = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCategoryNode object, it will not be re-added.
        if ($v !== null) {
            $v->addNode($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCategoryNode object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCategoryNode The associated ChildSpyCategoryNode object.
     * @throws PropelException
     */
    public function getParentCategoryNode(ConnectionInterface $con = null)
    {
        if ($this->aParentCategoryNode === null && ($this->fk_parent_category_node !== null)) {
            $this->aParentCategoryNode = ChildSpyCategoryNodeQuery::create()->findPk($this->fk_parent_category_node, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aParentCategoryNode->addNodes($this);
             */
        }

        return $this->aParentCategoryNode;
    }

    /**
     * Declares an association between this object and a ChildSpyCategory object.
     *
     * @param  ChildSpyCategory $v
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategory(ChildSpyCategory $v = null)
    {
        if ($v === null) {
            $this->setFkCategory(NULL);
        } else {
            $this->setFkCategory($v->getIdCategory());
        }

        $this->aCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCategory object, it will not be re-added.
        if ($v !== null) {
            $v->addNode($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCategory object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCategory The associated ChildSpyCategory object.
     * @throws PropelException
     */
    public function getCategory(ConnectionInterface $con = null)
    {
        if ($this->aCategory === null && ($this->fk_category !== null)) {
            $this->aCategory = ChildSpyCategoryQuery::create()->findPk($this->fk_category, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategory->addNodes($this);
             */
        }

        return $this->aCategory;
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
        if ('Node' == $relationName) {
            return $this->initNodes();
        }
        if ('ClosureTable' == $relationName) {
            return $this->initClosureTables();
        }
        if ('Descendant' == $relationName) {
            return $this->initDescendants();
        }
        if ('SpyUrl' == $relationName) {
            return $this->initSpyUrls();
        }
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
     * If this ChildSpyCategoryNode is new, it will return
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
                    ->filterByParentCategoryNode($this)
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
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
     */
    public function setNodes(Collection $nodes, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCategoryNode[] $nodesToDelete */
        $nodesToDelete = $this->getNodes(new Criteria(), $con)->diff($nodes);


        $this->nodesScheduledForDeletion = $nodesToDelete;

        foreach ($nodesToDelete as $nodeRemoved) {
            $nodeRemoved->setParentCategoryNode(null);
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
                ->filterByParentCategoryNode($this)
                ->count($con);
        }

        return count($this->collNodes);
    }

    /**
     * Method called to associate a ChildSpyCategoryNode object to this object
     * through the ChildSpyCategoryNode foreign key attribute.
     *
     * @param  ChildSpyCategoryNode $l ChildSpyCategoryNode
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
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
        $node->setParentCategoryNode($this);
    }

    /**
     * @param  ChildSpyCategoryNode $node The ChildSpyCategoryNode object to remove.
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
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
            $this->nodesScheduledForDeletion[]= $node;
            $node->setParentCategoryNode(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCategoryNode is new, it will return
     * an empty collection; or if this SpyCategoryNode has previously
     * been saved, it will retrieve related Nodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategoryNode.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCategoryNode[] List of ChildSpyCategoryNode objects
     */
    public function getNodesJoinCategory(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCategoryNodeQuery::create(null, $criteria);
        $query->joinWith('Category', $joinBehavior);

        return $this->getNodes($query, $con);
    }

    /**
     * Clears out the collClosureTables collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addClosureTables()
     */
    public function clearClosureTables()
    {
        $this->collClosureTables = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collClosureTables collection loaded partially.
     */
    public function resetPartialClosureTables($v = true)
    {
        $this->collClosureTablesPartial = $v;
    }

    /**
     * Initializes the collClosureTables collection.
     *
     * By default this just sets the collClosureTables collection to an empty array (like clearcollClosureTables());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClosureTables($overrideExisting = true)
    {
        if (null !== $this->collClosureTables && !$overrideExisting) {
            return;
        }
        $this->collClosureTables = new ObjectCollection();
        $this->collClosureTables->setModel('\Propel\SpyCategoryClosureTable');
    }

    /**
     * Gets an array of ChildSpyCategoryClosureTable objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCategoryNode is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCategoryClosureTable[] List of ChildSpyCategoryClosureTable objects
     * @throws PropelException
     */
    public function getClosureTables(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collClosureTablesPartial && !$this->isNew();
        if (null === $this->collClosureTables || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClosureTables) {
                // return empty collection
                $this->initClosureTables();
            } else {
                $collClosureTables = ChildSpyCategoryClosureTableQuery::create(null, $criteria)
                    ->filterByNode($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collClosureTablesPartial && count($collClosureTables)) {
                        $this->initClosureTables(false);

                        foreach ($collClosureTables as $obj) {
                            if (false == $this->collClosureTables->contains($obj)) {
                                $this->collClosureTables->append($obj);
                            }
                        }

                        $this->collClosureTablesPartial = true;
                    }

                    return $collClosureTables;
                }

                if ($partial && $this->collClosureTables) {
                    foreach ($this->collClosureTables as $obj) {
                        if ($obj->isNew()) {
                            $collClosureTables[] = $obj;
                        }
                    }
                }

                $this->collClosureTables = $collClosureTables;
                $this->collClosureTablesPartial = false;
            }
        }

        return $this->collClosureTables;
    }

    /**
     * Sets a collection of ChildSpyCategoryClosureTable objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $closureTables A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
     */
    public function setClosureTables(Collection $closureTables, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCategoryClosureTable[] $closureTablesToDelete */
        $closureTablesToDelete = $this->getClosureTables(new Criteria(), $con)->diff($closureTables);


        $this->closureTablesScheduledForDeletion = $closureTablesToDelete;

        foreach ($closureTablesToDelete as $closureTableRemoved) {
            $closureTableRemoved->setNode(null);
        }

        $this->collClosureTables = null;
        foreach ($closureTables as $closureTable) {
            $this->addClosureTable($closureTable);
        }

        $this->collClosureTables = $closureTables;
        $this->collClosureTablesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCategoryClosureTable objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCategoryClosureTable objects.
     * @throws PropelException
     */
    public function countClosureTables(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collClosureTablesPartial && !$this->isNew();
        if (null === $this->collClosureTables || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClosureTables) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClosureTables());
            }

            $query = ChildSpyCategoryClosureTableQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByNode($this)
                ->count($con);
        }

        return count($this->collClosureTables);
    }

    /**
     * Method called to associate a ChildSpyCategoryClosureTable object to this object
     * through the ChildSpyCategoryClosureTable foreign key attribute.
     *
     * @param  ChildSpyCategoryClosureTable $l ChildSpyCategoryClosureTable
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function addClosureTable(ChildSpyCategoryClosureTable $l)
    {
        if ($this->collClosureTables === null) {
            $this->initClosureTables();
            $this->collClosureTablesPartial = true;
        }

        if (!$this->collClosureTables->contains($l)) {
            $this->doAddClosureTable($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCategoryClosureTable $closureTable The ChildSpyCategoryClosureTable object to add.
     */
    protected function doAddClosureTable(ChildSpyCategoryClosureTable $closureTable)
    {
        $this->collClosureTables[]= $closureTable;
        $closureTable->setNode($this);
    }

    /**
     * @param  ChildSpyCategoryClosureTable $closureTable The ChildSpyCategoryClosureTable object to remove.
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
     */
    public function removeClosureTable(ChildSpyCategoryClosureTable $closureTable)
    {
        if ($this->getClosureTables()->contains($closureTable)) {
            $pos = $this->collClosureTables->search($closureTable);
            $this->collClosureTables->remove($pos);
            if (null === $this->closureTablesScheduledForDeletion) {
                $this->closureTablesScheduledForDeletion = clone $this->collClosureTables;
                $this->closureTablesScheduledForDeletion->clear();
            }
            $this->closureTablesScheduledForDeletion[]= clone $closureTable;
            $closureTable->setNode(null);
        }

        return $this;
    }

    /**
     * Clears out the collDescendants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDescendants()
     */
    public function clearDescendants()
    {
        $this->collDescendants = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDescendants collection loaded partially.
     */
    public function resetPartialDescendants($v = true)
    {
        $this->collDescendantsPartial = $v;
    }

    /**
     * Initializes the collDescendants collection.
     *
     * By default this just sets the collDescendants collection to an empty array (like clearcollDescendants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDescendants($overrideExisting = true)
    {
        if (null !== $this->collDescendants && !$overrideExisting) {
            return;
        }
        $this->collDescendants = new ObjectCollection();
        $this->collDescendants->setModel('\Propel\SpyCategoryClosureTable');
    }

    /**
     * Gets an array of ChildSpyCategoryClosureTable objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCategoryNode is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCategoryClosureTable[] List of ChildSpyCategoryClosureTable objects
     * @throws PropelException
     */
    public function getDescendants(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDescendantsPartial && !$this->isNew();
        if (null === $this->collDescendants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDescendants) {
                // return empty collection
                $this->initDescendants();
            } else {
                $collDescendants = ChildSpyCategoryClosureTableQuery::create(null, $criteria)
                    ->filterByDescendantNode($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDescendantsPartial && count($collDescendants)) {
                        $this->initDescendants(false);

                        foreach ($collDescendants as $obj) {
                            if (false == $this->collDescendants->contains($obj)) {
                                $this->collDescendants->append($obj);
                            }
                        }

                        $this->collDescendantsPartial = true;
                    }

                    return $collDescendants;
                }

                if ($partial && $this->collDescendants) {
                    foreach ($this->collDescendants as $obj) {
                        if ($obj->isNew()) {
                            $collDescendants[] = $obj;
                        }
                    }
                }

                $this->collDescendants = $collDescendants;
                $this->collDescendantsPartial = false;
            }
        }

        return $this->collDescendants;
    }

    /**
     * Sets a collection of ChildSpyCategoryClosureTable objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $descendants A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
     */
    public function setDescendants(Collection $descendants, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCategoryClosureTable[] $descendantsToDelete */
        $descendantsToDelete = $this->getDescendants(new Criteria(), $con)->diff($descendants);


        $this->descendantsScheduledForDeletion = $descendantsToDelete;

        foreach ($descendantsToDelete as $descendantRemoved) {
            $descendantRemoved->setDescendantNode(null);
        }

        $this->collDescendants = null;
        foreach ($descendants as $descendant) {
            $this->addDescendant($descendant);
        }

        $this->collDescendants = $descendants;
        $this->collDescendantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCategoryClosureTable objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCategoryClosureTable objects.
     * @throws PropelException
     */
    public function countDescendants(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDescendantsPartial && !$this->isNew();
        if (null === $this->collDescendants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDescendants) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDescendants());
            }

            $query = ChildSpyCategoryClosureTableQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDescendantNode($this)
                ->count($con);
        }

        return count($this->collDescendants);
    }

    /**
     * Method called to associate a ChildSpyCategoryClosureTable object to this object
     * through the ChildSpyCategoryClosureTable foreign key attribute.
     *
     * @param  ChildSpyCategoryClosureTable $l ChildSpyCategoryClosureTable
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
     */
    public function addDescendant(ChildSpyCategoryClosureTable $l)
    {
        if ($this->collDescendants === null) {
            $this->initDescendants();
            $this->collDescendantsPartial = true;
        }

        if (!$this->collDescendants->contains($l)) {
            $this->doAddDescendant($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCategoryClosureTable $descendant The ChildSpyCategoryClosureTable object to add.
     */
    protected function doAddDescendant(ChildSpyCategoryClosureTable $descendant)
    {
        $this->collDescendants[]= $descendant;
        $descendant->setDescendantNode($this);
    }

    /**
     * @param  ChildSpyCategoryClosureTable $descendant The ChildSpyCategoryClosureTable object to remove.
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
     */
    public function removeDescendant(ChildSpyCategoryClosureTable $descendant)
    {
        if ($this->getDescendants()->contains($descendant)) {
            $pos = $this->collDescendants->search($descendant);
            $this->collDescendants->remove($pos);
            if (null === $this->descendantsScheduledForDeletion) {
                $this->descendantsScheduledForDeletion = clone $this->collDescendants;
                $this->descendantsScheduledForDeletion->clear();
            }
            $this->descendantsScheduledForDeletion[]= clone $descendant;
            $descendant->setDescendantNode(null);
        }

        return $this;
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
     * If this ChildSpyCategoryNode is new, it will return
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
                    ->filterBySpyCategoryNode($this)
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
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
     */
    public function setSpyUrls(Collection $spyUrls, ConnectionInterface $con = null)
    {
        /** @var ChildSpyUrl[] $spyUrlsToDelete */
        $spyUrlsToDelete = $this->getSpyUrls(new Criteria(), $con)->diff($spyUrls);


        $this->spyUrlsScheduledForDeletion = $spyUrlsToDelete;

        foreach ($spyUrlsToDelete as $spyUrlRemoved) {
            $spyUrlRemoved->setSpyCategoryNode(null);
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
                ->filterBySpyCategoryNode($this)
                ->count($con);
        }

        return count($this->collSpyUrls);
    }

    /**
     * Method called to associate a ChildSpyUrl object to this object
     * through the ChildSpyUrl foreign key attribute.
     *
     * @param  ChildSpyUrl $l ChildSpyUrl
     * @return $this|\Propel\SpyCategoryNode The current object (for fluent API support)
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
        $spyUrl->setSpyCategoryNode($this);
    }

    /**
     * @param  ChildSpyUrl $spyUrl The ChildSpyUrl object to remove.
     * @return $this|ChildSpyCategoryNode The current object (for fluent API support)
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
            $this->spyUrlsScheduledForDeletion[]= $spyUrl;
            $spyUrl->setSpyCategoryNode(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCategoryNode is new, it will return
     * an empty collection; or if this SpyCategoryNode has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategoryNode.
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
     * Otherwise if this SpyCategoryNode is new, it will return
     * an empty collection; or if this SpyCategoryNode has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategoryNode.
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
     * Otherwise if this SpyCategoryNode is new, it will return
     * an empty collection; or if this SpyCategoryNode has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategoryNode.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyLocale', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCategoryNode is new, it will return
     * an empty collection; or if this SpyCategoryNode has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCategoryNode.
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
        if (null !== $this->aParentCategoryNode) {
            $this->aParentCategoryNode->removeNode($this);
        }
        if (null !== $this->aCategory) {
            $this->aCategory->removeNode($this);
        }
        $this->id_category_node = null;
        $this->fk_category = null;
        $this->fk_parent_category_node = null;
        $this->is_root = null;
        $this->is_main = null;
        $this->node_order = null;
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
            if ($this->collNodes) {
                foreach ($this->collNodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClosureTables) {
                foreach ($this->collClosureTables as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDescendants) {
                foreach ($this->collDescendants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyUrls) {
                foreach ($this->collSpyUrls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collNodes = null;
        $this->collClosureTables = null;
        $this->collDescendants = null;
        $this->collSpyUrls = null;
        $this->aParentCategoryNode = null;
        $this->aCategory = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyCategoryNodeTableMap::DEFAULT_STRING_FORMAT);
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
