<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyAclGroup as ChildSpyAclGroup;
use Propel\SpyAclGroupArchive as ChildSpyAclGroupArchive;
use Propel\SpyAclGroupArchiveQuery as ChildSpyAclGroupArchiveQuery;
use Propel\SpyAclGroupQuery as ChildSpyAclGroupQuery;
use Propel\SpyAclGroupsHasRoles as ChildSpyAclGroupsHasRoles;
use Propel\SpyAclGroupsHasRolesQuery as ChildSpyAclGroupsHasRolesQuery;
use Propel\SpyAclRole as ChildSpyAclRole;
use Propel\SpyAclRoleQuery as ChildSpyAclRoleQuery;
use Propel\SpyAclUserHasGroup as ChildSpyAclUserHasGroup;
use Propel\SpyAclUserHasGroupQuery as ChildSpyAclUserHasGroupQuery;
use Propel\SpyUser as ChildSpyUser;
use Propel\SpyUserQuery as ChildSpyUserQuery;
use Propel\Map\SpyAclGroupTableMap;
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
 * Base class that represents a row from the 'spy_acl_group' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyAclGroup extends SpyAclGroup implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyAclGroupTableMap';


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
     * The value for the id_acl_group field.
     * @var        int
     */
    protected $id_acl_group;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the created_at field.
     * @var        \DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        \DateTime
     */
    protected $updated_at;

    /**
     * @var        ObjectCollection|ChildSpyAclUserHasGroup[] Collection to store aggregation of ChildSpyAclUserHasGroup objects.
     */
    protected $collSpyAclUserHasGroups;
    protected $collSpyAclUserHasGroupsPartial;

    /**
     * @var        ObjectCollection|ChildSpyAclGroupsHasRoles[] Collection to store aggregation of ChildSpyAclGroupsHasRoles objects.
     */
    protected $collSpyAclGroupsHasRoless;
    protected $collSpyAclGroupsHasRolessPartial;

    /**
     * @var        ObjectCollection|ChildSpyUser[] Cross Collection to store aggregation of ChildSpyUser objects.
     */
    protected $collSpyUsers;

    /**
     * @var bool
     */
    protected $collSpyUsersPartial;

    /**
     * @var        ObjectCollection|ChildSpyAclRole[] Cross Collection to store aggregation of ChildSpyAclRole objects.
     */
    protected $collSpyAclRoles;

    /**
     * @var bool
     */
    protected $collSpyAclRolesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    // archivable behavior
    protected $archiveOnDelete = true;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyUser[]
     */
    protected $spyUsersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyAclRole[]
     */
    protected $spyAclRolesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyAclUserHasGroup[]
     */
    protected $spyAclUserHasGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyAclGroupsHasRoles[]
     */
    protected $spyAclGroupsHasRolessScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyAclGroup object.
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
     * Compares this with another <code>SpyAclGroup</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyAclGroup</code>, delegates to
     * <code>equals(SpyAclGroup)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyAclGroup The current object, for fluid interface
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
     * Get the [id_acl_group] column value.
     *
     * @return int
     */
    public function getIdAclGroup()
    {
        return $this->id_acl_group;
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
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTime ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id_acl_group] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyAclGroup The current object (for fluent API support)
     */
    public function setIdAclGroup($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_acl_group !== $v) {
            $this->id_acl_group = $v;
            $this->modifiedColumns[SpyAclGroupTableMap::COL_ID_ACL_GROUP] = true;
        }

        return $this;
    } // setIdAclGroup()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyAclGroup The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpyAclGroupTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyAclGroup The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyAclGroupTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyAclGroup The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyAclGroupTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyAclGroupTableMap::translateFieldName('IdAclGroup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_acl_group = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyAclGroupTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyAclGroupTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyAclGroupTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = SpyAclGroupTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyAclGroup'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyAclGroupTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyAclGroupQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSpyAclUserHasGroups = null;

            $this->collSpyAclGroupsHasRoless = null;

            $this->collSpyUsers = null;
            $this->collSpyAclRoles = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyAclGroup::setDeleted()
     * @see SpyAclGroup::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclGroupTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyAclGroupQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // archivable behavior
            if ($ret) {
                if ($this->archiveOnDelete) {
                    // do nothing yet. The object will be archived later when calling ChildSpyAclGroupQuery::delete().
                } else {
                    $deleteQuery->setArchiveOnDelete(false);
                    $this->archiveOnDelete = true;
                }
            }

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclGroupTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyAclGroupTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyAclGroupTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyAclGroupTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SpyAclGroupTableMap::addInstanceToPool($this);
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

            if ($this->spyUsersScheduledForDeletion !== null) {
                if (!$this->spyUsersScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->spyUsersScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[1] = $this->getIdAclGroup();
                        $entryPk[0] = $entry->getIdUser();
                        $pks[] = $entryPk;
                    }

                    \Propel\SpyAclUserHasGroupQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->spyUsersScheduledForDeletion = null;
                }

            }

            if ($this->collSpyUsers) {
                foreach ($this->collSpyUsers as $spyUser) {
                    if (!$spyUser->isDeleted() && ($spyUser->isNew() || $spyUser->isModified())) {
                        $spyUser->save($con);
                    }
                }
            }


            if ($this->spyAclRolesScheduledForDeletion !== null) {
                if (!$this->spyAclRolesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    foreach ($this->spyAclRolesScheduledForDeletion as $entry) {
                        $entryPk = [];

                        $entryPk[1] = $this->getIdAclGroup();
                        $entryPk[0] = $entry->getIdAclRole();
                        $pks[] = $entryPk;
                    }

                    \Propel\SpyAclGroupsHasRolesQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);

                    $this->spyAclRolesScheduledForDeletion = null;
                }

            }

            if ($this->collSpyAclRoles) {
                foreach ($this->collSpyAclRoles as $spyAclRole) {
                    if (!$spyAclRole->isDeleted() && ($spyAclRole->isNew() || $spyAclRole->isModified())) {
                        $spyAclRole->save($con);
                    }
                }
            }


            if ($this->spyAclUserHasGroupsScheduledForDeletion !== null) {
                if (!$this->spyAclUserHasGroupsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyAclUserHasGroupQuery::create()
                        ->filterByPrimaryKeys($this->spyAclUserHasGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyAclUserHasGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyAclUserHasGroups !== null) {
                foreach ($this->collSpyAclUserHasGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyAclGroupsHasRolessScheduledForDeletion !== null) {
                if (!$this->spyAclGroupsHasRolessScheduledForDeletion->isEmpty()) {
                    \Propel\SpyAclGroupsHasRolesQuery::create()
                        ->filterByPrimaryKeys($this->spyAclGroupsHasRolessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyAclGroupsHasRolessScheduledForDeletion = null;
                }
            }

            if ($this->collSpyAclGroupsHasRoless !== null) {
                foreach ($this->collSpyAclGroupsHasRoless as $referrerFK) {
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

        $this->modifiedColumns[SpyAclGroupTableMap::COL_ID_ACL_GROUP] = true;
        if (null !== $this->id_acl_group) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyAclGroupTableMap::COL_ID_ACL_GROUP . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyAclGroupTableMap::COL_ID_ACL_GROUP)) {
            $modifiedColumns[':p' . $index++]  = 'id_acl_group';
        }
        if ($this->isColumnModified(SpyAclGroupTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SpyAclGroupTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyAclGroupTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_acl_group (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_acl_group':
                        $stmt->bindValue($identifier, $this->id_acl_group, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_acl_group_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdAclGroup($pk);

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
        $pos = SpyAclGroupTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdAclGroup();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getCreatedAt();
                break;
            case 3:
                return $this->getUpdatedAt();
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

        if (isset($alreadyDumpedObjects['SpyAclGroup'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyAclGroup'][$this->hashCode()] = true;
        $keys = SpyAclGroupTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdAclGroup(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getCreatedAt(),
            $keys[3] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[2]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[2]];
            $result[$keys[2]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[3]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[3]];
            $result[$keys[3]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSpyAclUserHasGroups) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyAclUserHasGroups';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_acl_user_has_groups';
                        break;
                    default:
                        $key = 'SpyAclUserHasGroups';
                }

                $result[$key] = $this->collSpyAclUserHasGroups->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyAclGroupsHasRoless) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyAclGroupsHasRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_acl_groups_has_roless';
                        break;
                    default:
                        $key = 'SpyAclGroupsHasRoless';
                }

                $result[$key] = $this->collSpyAclGroupsHasRoless->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyAclGroup
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyAclGroupTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyAclGroup
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdAclGroup($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setCreatedAt($value);
                break;
            case 3:
                $this->setUpdatedAt($value);
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
        $keys = SpyAclGroupTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdAclGroup($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCreatedAt($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUpdatedAt($arr[$keys[3]]);
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
     * @return $this|\Propel\SpyAclGroup The current object, for fluid interface
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
        $criteria = new Criteria(SpyAclGroupTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyAclGroupTableMap::COL_ID_ACL_GROUP)) {
            $criteria->add(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $this->id_acl_group);
        }
        if ($this->isColumnModified(SpyAclGroupTableMap::COL_NAME)) {
            $criteria->add(SpyAclGroupTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpyAclGroupTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyAclGroupTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyAclGroupTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyAclGroupTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyAclGroupQuery::create();
        $criteria->add(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $this->id_acl_group);

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
        $validPk = null !== $this->getIdAclGroup();

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
        return $this->getIdAclGroup();
    }

    /**
     * Generic method to set the primary key (id_acl_group column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdAclGroup($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdAclGroup();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyAclGroup (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyAclUserHasGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyAclUserHasGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyAclGroupsHasRoless() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyAclGroupsHasRoles($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdAclGroup(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyAclGroup Clone of current object.
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
        if ('SpyAclUserHasGroup' == $relationName) {
            return $this->initSpyAclUserHasGroups();
        }
        if ('SpyAclGroupsHasRoles' == $relationName) {
            return $this->initSpyAclGroupsHasRoless();
        }
    }

    /**
     * Clears out the collSpyAclUserHasGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyAclUserHasGroups()
     */
    public function clearSpyAclUserHasGroups()
    {
        $this->collSpyAclUserHasGroups = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyAclUserHasGroups collection loaded partially.
     */
    public function resetPartialSpyAclUserHasGroups($v = true)
    {
        $this->collSpyAclUserHasGroupsPartial = $v;
    }

    /**
     * Initializes the collSpyAclUserHasGroups collection.
     *
     * By default this just sets the collSpyAclUserHasGroups collection to an empty array (like clearcollSpyAclUserHasGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyAclUserHasGroups($overrideExisting = true)
    {
        if (null !== $this->collSpyAclUserHasGroups && !$overrideExisting) {
            return;
        }
        $this->collSpyAclUserHasGroups = new ObjectCollection();
        $this->collSpyAclUserHasGroups->setModel('\Propel\SpyAclUserHasGroup');
    }

    /**
     * Gets an array of ChildSpyAclUserHasGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAclGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyAclUserHasGroup[] List of ChildSpyAclUserHasGroup objects
     * @throws PropelException
     */
    public function getSpyAclUserHasGroups(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyAclUserHasGroupsPartial && !$this->isNew();
        if (null === $this->collSpyAclUserHasGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyAclUserHasGroups) {
                // return empty collection
                $this->initSpyAclUserHasGroups();
            } else {
                $collSpyAclUserHasGroups = ChildSpyAclUserHasGroupQuery::create(null, $criteria)
                    ->filterBySpyAclGroup($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyAclUserHasGroupsPartial && count($collSpyAclUserHasGroups)) {
                        $this->initSpyAclUserHasGroups(false);

                        foreach ($collSpyAclUserHasGroups as $obj) {
                            if (false == $this->collSpyAclUserHasGroups->contains($obj)) {
                                $this->collSpyAclUserHasGroups->append($obj);
                            }
                        }

                        $this->collSpyAclUserHasGroupsPartial = true;
                    }

                    return $collSpyAclUserHasGroups;
                }

                if ($partial && $this->collSpyAclUserHasGroups) {
                    foreach ($this->collSpyAclUserHasGroups as $obj) {
                        if ($obj->isNew()) {
                            $collSpyAclUserHasGroups[] = $obj;
                        }
                    }
                }

                $this->collSpyAclUserHasGroups = $collSpyAclUserHasGroups;
                $this->collSpyAclUserHasGroupsPartial = false;
            }
        }

        return $this->collSpyAclUserHasGroups;
    }

    /**
     * Sets a collection of ChildSpyAclUserHasGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyAclUserHasGroups A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function setSpyAclUserHasGroups(Collection $spyAclUserHasGroups, ConnectionInterface $con = null)
    {
        /** @var ChildSpyAclUserHasGroup[] $spyAclUserHasGroupsToDelete */
        $spyAclUserHasGroupsToDelete = $this->getSpyAclUserHasGroups(new Criteria(), $con)->diff($spyAclUserHasGroups);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyAclUserHasGroupsScheduledForDeletion = clone $spyAclUserHasGroupsToDelete;

        foreach ($spyAclUserHasGroupsToDelete as $spyAclUserHasGroupRemoved) {
            $spyAclUserHasGroupRemoved->setSpyAclGroup(null);
        }

        $this->collSpyAclUserHasGroups = null;
        foreach ($spyAclUserHasGroups as $spyAclUserHasGroup) {
            $this->addSpyAclUserHasGroup($spyAclUserHasGroup);
        }

        $this->collSpyAclUserHasGroups = $spyAclUserHasGroups;
        $this->collSpyAclUserHasGroupsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyAclUserHasGroup objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyAclUserHasGroup objects.
     * @throws PropelException
     */
    public function countSpyAclUserHasGroups(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyAclUserHasGroupsPartial && !$this->isNew();
        if (null === $this->collSpyAclUserHasGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyAclUserHasGroups) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyAclUserHasGroups());
            }

            $query = ChildSpyAclUserHasGroupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyAclGroup($this)
                ->count($con);
        }

        return count($this->collSpyAclUserHasGroups);
    }

    /**
     * Method called to associate a ChildSpyAclUserHasGroup object to this object
     * through the ChildSpyAclUserHasGroup foreign key attribute.
     *
     * @param  ChildSpyAclUserHasGroup $l ChildSpyAclUserHasGroup
     * @return $this|\Propel\SpyAclGroup The current object (for fluent API support)
     */
    public function addSpyAclUserHasGroup(ChildSpyAclUserHasGroup $l)
    {
        if ($this->collSpyAclUserHasGroups === null) {
            $this->initSpyAclUserHasGroups();
            $this->collSpyAclUserHasGroupsPartial = true;
        }

        if (!$this->collSpyAclUserHasGroups->contains($l)) {
            $this->doAddSpyAclUserHasGroup($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyAclUserHasGroup $spyAclUserHasGroup The ChildSpyAclUserHasGroup object to add.
     */
    protected function doAddSpyAclUserHasGroup(ChildSpyAclUserHasGroup $spyAclUserHasGroup)
    {
        $this->collSpyAclUserHasGroups[]= $spyAclUserHasGroup;
        $spyAclUserHasGroup->setSpyAclGroup($this);
    }

    /**
     * @param  ChildSpyAclUserHasGroup $spyAclUserHasGroup The ChildSpyAclUserHasGroup object to remove.
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function removeSpyAclUserHasGroup(ChildSpyAclUserHasGroup $spyAclUserHasGroup)
    {
        if ($this->getSpyAclUserHasGroups()->contains($spyAclUserHasGroup)) {
            $pos = $this->collSpyAclUserHasGroups->search($spyAclUserHasGroup);
            $this->collSpyAclUserHasGroups->remove($pos);
            if (null === $this->spyAclUserHasGroupsScheduledForDeletion) {
                $this->spyAclUserHasGroupsScheduledForDeletion = clone $this->collSpyAclUserHasGroups;
                $this->spyAclUserHasGroupsScheduledForDeletion->clear();
            }
            $this->spyAclUserHasGroupsScheduledForDeletion[]= clone $spyAclUserHasGroup;
            $spyAclUserHasGroup->setSpyAclGroup(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAclGroup is new, it will return
     * an empty collection; or if this SpyAclGroup has previously
     * been saved, it will retrieve related SpyAclUserHasGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAclGroup.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyAclUserHasGroup[] List of ChildSpyAclUserHasGroup objects
     */
    public function getSpyAclUserHasGroupsJoinSpyUser(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyAclUserHasGroupQuery::create(null, $criteria);
        $query->joinWith('SpyUser', $joinBehavior);

        return $this->getSpyAclUserHasGroups($query, $con);
    }

    /**
     * Clears out the collSpyAclGroupsHasRoless collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyAclGroupsHasRoless()
     */
    public function clearSpyAclGroupsHasRoless()
    {
        $this->collSpyAclGroupsHasRoless = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyAclGroupsHasRoless collection loaded partially.
     */
    public function resetPartialSpyAclGroupsHasRoless($v = true)
    {
        $this->collSpyAclGroupsHasRolessPartial = $v;
    }

    /**
     * Initializes the collSpyAclGroupsHasRoless collection.
     *
     * By default this just sets the collSpyAclGroupsHasRoless collection to an empty array (like clearcollSpyAclGroupsHasRoless());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyAclGroupsHasRoless($overrideExisting = true)
    {
        if (null !== $this->collSpyAclGroupsHasRoless && !$overrideExisting) {
            return;
        }
        $this->collSpyAclGroupsHasRoless = new ObjectCollection();
        $this->collSpyAclGroupsHasRoless->setModel('\Propel\SpyAclGroupsHasRoles');
    }

    /**
     * Gets an array of ChildSpyAclGroupsHasRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAclGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyAclGroupsHasRoles[] List of ChildSpyAclGroupsHasRoles objects
     * @throws PropelException
     */
    public function getSpyAclGroupsHasRoless(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyAclGroupsHasRolessPartial && !$this->isNew();
        if (null === $this->collSpyAclGroupsHasRoless || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyAclGroupsHasRoless) {
                // return empty collection
                $this->initSpyAclGroupsHasRoless();
            } else {
                $collSpyAclGroupsHasRoless = ChildSpyAclGroupsHasRolesQuery::create(null, $criteria)
                    ->filterBySpyAclGroup($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyAclGroupsHasRolessPartial && count($collSpyAclGroupsHasRoless)) {
                        $this->initSpyAclGroupsHasRoless(false);

                        foreach ($collSpyAclGroupsHasRoless as $obj) {
                            if (false == $this->collSpyAclGroupsHasRoless->contains($obj)) {
                                $this->collSpyAclGroupsHasRoless->append($obj);
                            }
                        }

                        $this->collSpyAclGroupsHasRolessPartial = true;
                    }

                    return $collSpyAclGroupsHasRoless;
                }

                if ($partial && $this->collSpyAclGroupsHasRoless) {
                    foreach ($this->collSpyAclGroupsHasRoless as $obj) {
                        if ($obj->isNew()) {
                            $collSpyAclGroupsHasRoless[] = $obj;
                        }
                    }
                }

                $this->collSpyAclGroupsHasRoless = $collSpyAclGroupsHasRoless;
                $this->collSpyAclGroupsHasRolessPartial = false;
            }
        }

        return $this->collSpyAclGroupsHasRoless;
    }

    /**
     * Sets a collection of ChildSpyAclGroupsHasRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyAclGroupsHasRoless A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function setSpyAclGroupsHasRoless(Collection $spyAclGroupsHasRoless, ConnectionInterface $con = null)
    {
        /** @var ChildSpyAclGroupsHasRoles[] $spyAclGroupsHasRolessToDelete */
        $spyAclGroupsHasRolessToDelete = $this->getSpyAclGroupsHasRoless(new Criteria(), $con)->diff($spyAclGroupsHasRoless);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyAclGroupsHasRolessScheduledForDeletion = clone $spyAclGroupsHasRolessToDelete;

        foreach ($spyAclGroupsHasRolessToDelete as $spyAclGroupsHasRolesRemoved) {
            $spyAclGroupsHasRolesRemoved->setSpyAclGroup(null);
        }

        $this->collSpyAclGroupsHasRoless = null;
        foreach ($spyAclGroupsHasRoless as $spyAclGroupsHasRoles) {
            $this->addSpyAclGroupsHasRoles($spyAclGroupsHasRoles);
        }

        $this->collSpyAclGroupsHasRoless = $spyAclGroupsHasRoless;
        $this->collSpyAclGroupsHasRolessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyAclGroupsHasRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyAclGroupsHasRoles objects.
     * @throws PropelException
     */
    public function countSpyAclGroupsHasRoless(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyAclGroupsHasRolessPartial && !$this->isNew();
        if (null === $this->collSpyAclGroupsHasRoless || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyAclGroupsHasRoless) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyAclGroupsHasRoless());
            }

            $query = ChildSpyAclGroupsHasRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyAclGroup($this)
                ->count($con);
        }

        return count($this->collSpyAclGroupsHasRoless);
    }

    /**
     * Method called to associate a ChildSpyAclGroupsHasRoles object to this object
     * through the ChildSpyAclGroupsHasRoles foreign key attribute.
     *
     * @param  ChildSpyAclGroupsHasRoles $l ChildSpyAclGroupsHasRoles
     * @return $this|\Propel\SpyAclGroup The current object (for fluent API support)
     */
    public function addSpyAclGroupsHasRoles(ChildSpyAclGroupsHasRoles $l)
    {
        if ($this->collSpyAclGroupsHasRoless === null) {
            $this->initSpyAclGroupsHasRoless();
            $this->collSpyAclGroupsHasRolessPartial = true;
        }

        if (!$this->collSpyAclGroupsHasRoless->contains($l)) {
            $this->doAddSpyAclGroupsHasRoles($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyAclGroupsHasRoles $spyAclGroupsHasRoles The ChildSpyAclGroupsHasRoles object to add.
     */
    protected function doAddSpyAclGroupsHasRoles(ChildSpyAclGroupsHasRoles $spyAclGroupsHasRoles)
    {
        $this->collSpyAclGroupsHasRoless[]= $spyAclGroupsHasRoles;
        $spyAclGroupsHasRoles->setSpyAclGroup($this);
    }

    /**
     * @param  ChildSpyAclGroupsHasRoles $spyAclGroupsHasRoles The ChildSpyAclGroupsHasRoles object to remove.
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function removeSpyAclGroupsHasRoles(ChildSpyAclGroupsHasRoles $spyAclGroupsHasRoles)
    {
        if ($this->getSpyAclGroupsHasRoless()->contains($spyAclGroupsHasRoles)) {
            $pos = $this->collSpyAclGroupsHasRoless->search($spyAclGroupsHasRoles);
            $this->collSpyAclGroupsHasRoless->remove($pos);
            if (null === $this->spyAclGroupsHasRolessScheduledForDeletion) {
                $this->spyAclGroupsHasRolessScheduledForDeletion = clone $this->collSpyAclGroupsHasRoless;
                $this->spyAclGroupsHasRolessScheduledForDeletion->clear();
            }
            $this->spyAclGroupsHasRolessScheduledForDeletion[]= clone $spyAclGroupsHasRoles;
            $spyAclGroupsHasRoles->setSpyAclGroup(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAclGroup is new, it will return
     * an empty collection; or if this SpyAclGroup has previously
     * been saved, it will retrieve related SpyAclGroupsHasRoless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAclGroup.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyAclGroupsHasRoles[] List of ChildSpyAclGroupsHasRoles objects
     */
    public function getSpyAclGroupsHasRolessJoinSpyAclRole(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyAclGroupsHasRolesQuery::create(null, $criteria);
        $query->joinWith('SpyAclRole', $joinBehavior);

        return $this->getSpyAclGroupsHasRoless($query, $con);
    }

    /**
     * Clears out the collSpyUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyUsers()
     */
    public function clearSpyUsers()
    {
        $this->collSpyUsers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSpyUsers crossRef collection.
     *
     * By default this just sets the collSpyUsers collection to an empty collection (like clearSpyUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initSpyUsers()
    {
        $this->collSpyUsers = new ObjectCollection();
        $this->collSpyUsersPartial = true;

        $this->collSpyUsers->setModel('\Propel\SpyUser');
    }

    /**
     * Checks if the collSpyUsers collection is loaded.
     *
     * @return bool
     */
    public function isSpyUsersLoaded()
    {
        return null !== $this->collSpyUsers;
    }

    /**
     * Gets a collection of ChildSpyUser objects related by a many-to-many relationship
     * to the current object by way of the spy_acl_user_has_group cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAclGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildSpyUser[] List of ChildSpyUser objects
     */
    public function getSpyUsers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUsersPartial && !$this->isNew();
        if (null === $this->collSpyUsers || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collSpyUsers) {
                    $this->initSpyUsers();
                }
            } else {

                $query = ChildSpyUserQuery::create(null, $criteria)
                    ->filterBySpyAclGroup($this);
                $collSpyUsers = $query->find($con);
                if (null !== $criteria) {
                    return $collSpyUsers;
                }

                if ($partial && $this->collSpyUsers) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collSpyUsers as $obj) {
                        if (!$collSpyUsers->contains($obj)) {
                            $collSpyUsers[] = $obj;
                        }
                    }
                }

                $this->collSpyUsers = $collSpyUsers;
                $this->collSpyUsersPartial = false;
            }
        }

        return $this->collSpyUsers;
    }

    /**
     * Sets a collection of SpyUser objects related by a many-to-many relationship
     * to the current object by way of the spy_acl_user_has_group cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $spyUsers A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function setSpyUsers(Collection $spyUsers, ConnectionInterface $con = null)
    {
        $this->clearSpyUsers();
        $currentSpyUsers = $this->getSpyUsers();

        $spyUsersScheduledForDeletion = $currentSpyUsers->diff($spyUsers);

        foreach ($spyUsersScheduledForDeletion as $toDelete) {
            $this->removeSpyUser($toDelete);
        }

        foreach ($spyUsers as $spyUser) {
            if (!$currentSpyUsers->contains($spyUser)) {
                $this->doAddSpyUser($spyUser);
            }
        }

        $this->collSpyUsersPartial = false;
        $this->collSpyUsers = $spyUsers;

        return $this;
    }

    /**
     * Gets the number of SpyUser objects related by a many-to-many relationship
     * to the current object by way of the spy_acl_user_has_group cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related SpyUser objects
     */
    public function countSpyUsers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUsersPartial && !$this->isNew();
        if (null === $this->collSpyUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyUsers) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getSpyUsers());
                }

                $query = ChildSpyUserQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySpyAclGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collSpyUsers);
        }
    }

    /**
     * Associate a ChildSpyUser to this object
     * through the spy_acl_user_has_group cross reference table.
     *
     * @param ChildSpyUser $spyUser
     * @return ChildSpyAclGroup The current object (for fluent API support)
     */
    public function addSpyUser(ChildSpyUser $spyUser)
    {
        if ($this->collSpyUsers === null) {
            $this->initSpyUsers();
        }

        if (!$this->getSpyUsers()->contains($spyUser)) {
            // only add it if the **same** object is not already associated
            $this->collSpyUsers->push($spyUser);
            $this->doAddSpyUser($spyUser);
        }

        return $this;
    }

    /**
     *
     * @param ChildSpyUser $spyUser
     */
    protected function doAddSpyUser(ChildSpyUser $spyUser)
    {
        $spyAclUserHasGroup = new ChildSpyAclUserHasGroup();

        $spyAclUserHasGroup->setSpyUser($spyUser);

        $spyAclUserHasGroup->setSpyAclGroup($this);

        $this->addSpyAclUserHasGroup($spyAclUserHasGroup);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$spyUser->isSpyAclGroupsLoaded()) {
            $spyUser->initSpyAclGroups();
            $spyUser->getSpyAclGroups()->push($this);
        } elseif (!$spyUser->getSpyAclGroups()->contains($this)) {
            $spyUser->getSpyAclGroups()->push($this);
        }

    }

    /**
     * Remove spyUser of this object
     * through the spy_acl_user_has_group cross reference table.
     *
     * @param ChildSpyUser $spyUser
     * @return ChildSpyAclGroup The current object (for fluent API support)
     */
    public function removeSpyUser(ChildSpyUser $spyUser)
    {
        if ($this->getSpyUsers()->contains($spyUser)) { $spyAclUserHasGroup = new ChildSpyAclUserHasGroup();

            $spyAclUserHasGroup->setSpyUser($spyUser);
            if ($spyUser->isSpyAclGroupsLoaded()) {
                //remove the back reference if available
                $spyUser->getSpyAclGroups()->removeObject($this);
            }

            $spyAclUserHasGroup->setSpyAclGroup($this);
            $this->removeSpyAclUserHasGroup(clone $spyAclUserHasGroup);
            $spyAclUserHasGroup->clear();

            $this->collSpyUsers->remove($this->collSpyUsers->search($spyUser));

            if (null === $this->spyUsersScheduledForDeletion) {
                $this->spyUsersScheduledForDeletion = clone $this->collSpyUsers;
                $this->spyUsersScheduledForDeletion->clear();
            }

            $this->spyUsersScheduledForDeletion->push($spyUser);
        }


        return $this;
    }

    /**
     * Clears out the collSpyAclRoles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyAclRoles()
     */
    public function clearSpyAclRoles()
    {
        $this->collSpyAclRoles = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSpyAclRoles crossRef collection.
     *
     * By default this just sets the collSpyAclRoles collection to an empty collection (like clearSpyAclRoles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initSpyAclRoles()
    {
        $this->collSpyAclRoles = new ObjectCollection();
        $this->collSpyAclRolesPartial = true;

        $this->collSpyAclRoles->setModel('\Propel\SpyAclRole');
    }

    /**
     * Checks if the collSpyAclRoles collection is loaded.
     *
     * @return bool
     */
    public function isSpyAclRolesLoaded()
    {
        return null !== $this->collSpyAclRoles;
    }

    /**
     * Gets a collection of ChildSpyAclRole objects related by a many-to-many relationship
     * to the current object by way of the spy_acl_groups_has_roles cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAclGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return ObjectCollection|ChildSpyAclRole[] List of ChildSpyAclRole objects
     */
    public function getSpyAclRoles(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyAclRolesPartial && !$this->isNew();
        if (null === $this->collSpyAclRoles || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collSpyAclRoles) {
                    $this->initSpyAclRoles();
                }
            } else {

                $query = ChildSpyAclRoleQuery::create(null, $criteria)
                    ->filterBySpyAclGroup($this);
                $collSpyAclRoles = $query->find($con);
                if (null !== $criteria) {
                    return $collSpyAclRoles;
                }

                if ($partial && $this->collSpyAclRoles) {
                    //make sure that already added objects gets added to the list of the database.
                    foreach ($this->collSpyAclRoles as $obj) {
                        if (!$collSpyAclRoles->contains($obj)) {
                            $collSpyAclRoles[] = $obj;
                        }
                    }
                }

                $this->collSpyAclRoles = $collSpyAclRoles;
                $this->collSpyAclRolesPartial = false;
            }
        }

        return $this->collSpyAclRoles;
    }

    /**
     * Sets a collection of SpyAclRole objects related by a many-to-many relationship
     * to the current object by way of the spy_acl_groups_has_roles cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param  Collection $spyAclRoles A Propel collection.
     * @param  ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function setSpyAclRoles(Collection $spyAclRoles, ConnectionInterface $con = null)
    {
        $this->clearSpyAclRoles();
        $currentSpyAclRoles = $this->getSpyAclRoles();

        $spyAclRolesScheduledForDeletion = $currentSpyAclRoles->diff($spyAclRoles);

        foreach ($spyAclRolesScheduledForDeletion as $toDelete) {
            $this->removeSpyAclRole($toDelete);
        }

        foreach ($spyAclRoles as $spyAclRole) {
            if (!$currentSpyAclRoles->contains($spyAclRole)) {
                $this->doAddSpyAclRole($spyAclRole);
            }
        }

        $this->collSpyAclRolesPartial = false;
        $this->collSpyAclRoles = $spyAclRoles;

        return $this;
    }

    /**
     * Gets the number of SpyAclRole objects related by a many-to-many relationship
     * to the current object by way of the spy_acl_groups_has_roles cross-reference table.
     *
     * @param      Criteria $criteria Optional query object to filter the query
     * @param      boolean $distinct Set to true to force count distinct
     * @param      ConnectionInterface $con Optional connection object
     *
     * @return int the number of related SpyAclRole objects
     */
    public function countSpyAclRoles(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyAclRolesPartial && !$this->isNew();
        if (null === $this->collSpyAclRoles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyAclRoles) {
                return 0;
            } else {

                if ($partial && !$criteria) {
                    return count($this->getSpyAclRoles());
                }

                $query = ChildSpyAclRoleQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBySpyAclGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collSpyAclRoles);
        }
    }

    /**
     * Associate a ChildSpyAclRole to this object
     * through the spy_acl_groups_has_roles cross reference table.
     *
     * @param ChildSpyAclRole $spyAclRole
     * @return ChildSpyAclGroup The current object (for fluent API support)
     */
    public function addSpyAclRole(ChildSpyAclRole $spyAclRole)
    {
        if ($this->collSpyAclRoles === null) {
            $this->initSpyAclRoles();
        }

        if (!$this->getSpyAclRoles()->contains($spyAclRole)) {
            // only add it if the **same** object is not already associated
            $this->collSpyAclRoles->push($spyAclRole);
            $this->doAddSpyAclRole($spyAclRole);
        }

        return $this;
    }

    /**
     *
     * @param ChildSpyAclRole $spyAclRole
     */
    protected function doAddSpyAclRole(ChildSpyAclRole $spyAclRole)
    {
        $spyAclGroupsHasRoles = new ChildSpyAclGroupsHasRoles();

        $spyAclGroupsHasRoles->setSpyAclRole($spyAclRole);

        $spyAclGroupsHasRoles->setSpyAclGroup($this);

        $this->addSpyAclGroupsHasRoles($spyAclGroupsHasRoles);

        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$spyAclRole->isSpyAclGroupsLoaded()) {
            $spyAclRole->initSpyAclGroups();
            $spyAclRole->getSpyAclGroups()->push($this);
        } elseif (!$spyAclRole->getSpyAclGroups()->contains($this)) {
            $spyAclRole->getSpyAclGroups()->push($this);
        }

    }

    /**
     * Remove spyAclRole of this object
     * through the spy_acl_groups_has_roles cross reference table.
     *
     * @param ChildSpyAclRole $spyAclRole
     * @return ChildSpyAclGroup The current object (for fluent API support)
     */
    public function removeSpyAclRole(ChildSpyAclRole $spyAclRole)
    {
        if ($this->getSpyAclRoles()->contains($spyAclRole)) { $spyAclGroupsHasRoles = new ChildSpyAclGroupsHasRoles();

            $spyAclGroupsHasRoles->setSpyAclRole($spyAclRole);
            if ($spyAclRole->isSpyAclGroupsLoaded()) {
                //remove the back reference if available
                $spyAclRole->getSpyAclGroups()->removeObject($this);
            }

            $spyAclGroupsHasRoles->setSpyAclGroup($this);
            $this->removeSpyAclGroupsHasRoles(clone $spyAclGroupsHasRoles);
            $spyAclGroupsHasRoles->clear();

            $this->collSpyAclRoles->remove($this->collSpyAclRoles->search($spyAclRole));

            if (null === $this->spyAclRolesScheduledForDeletion) {
                $this->spyAclRolesScheduledForDeletion = clone $this->collSpyAclRoles;
                $this->spyAclRolesScheduledForDeletion->clear();
            }

            $this->spyAclRolesScheduledForDeletion->push($spyAclRole);
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
        $this->id_acl_group = null;
        $this->name = null;
        $this->created_at = null;
        $this->updated_at = null;
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
            if ($this->collSpyAclUserHasGroups) {
                foreach ($this->collSpyAclUserHasGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyAclGroupsHasRoless) {
                foreach ($this->collSpyAclGroupsHasRoless as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyUsers) {
                foreach ($this->collSpyUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyAclRoles) {
                foreach ($this->collSpyAclRoles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyAclUserHasGroups = null;
        $this->collSpyAclGroupsHasRoless = null;
        $this->collSpyUsers = null;
        $this->collSpyAclRoles = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyAclGroupTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyAclGroupTableMap::COL_UPDATED_AT] = true;

        return $this;
    }

    // archivable behavior

    /**
     * Get an archived version of the current object.
     *
     * @param ConnectionInterface $con Optional connection object
     *
     * @return     ChildSpyAclGroupArchive An archive object, or null if the current object was never archived
     */
    public function getArchive(ConnectionInterface $con = null)
    {
        if ($this->isNew()) {
            return null;
        }
        $archive = ChildSpyAclGroupArchiveQuery::create()
            ->filterByPrimaryKey($this->getPrimaryKey())
            ->findOne($con);

        return $archive;
    }
    /**
     * Copy the data of the current object into a $archiveTablePhpName archive object.
     * The archived object is then saved.
     * If the current object has already been archived, the archived object
     * is updated and not duplicated.
     *
     * @param ConnectionInterface $con Optional connection object
     *
     * @throws PropelException If the object is new
     *
     * @return     ChildSpyAclGroupArchive The archive object based on this object
     */
    public function archive(ConnectionInterface $con = null)
    {
        if ($this->isNew()) {
            throw new PropelException('New objects cannot be archived. You must save the current object before calling archive().');
        }
        if (!$archive = $this->getArchive($con)) {
            $archive = new ChildSpyAclGroupArchive();
            $archive->setPrimaryKey($this->getPrimaryKey());
        }
        $this->copyInto($archive, $deepCopy = false, $makeNew = false);
        $archive->setArchivedAt(time());
        $archive->save($con);

        return $archive;
    }

    /**
     * Revert the the current object to the state it had when it was last archived.
     * The object must be saved afterwards if the changes must persist.
     *
     * @param ConnectionInterface $con Optional connection object
     *
     * @throws PropelException If the object has no corresponding archive.
     *
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function restoreFromArchive(ConnectionInterface $con = null)
    {
        if (!$archive = $this->getArchive($con)) {
            throw new PropelException('The current object has never been archived and cannot be restored');
        }
        $this->populateFromArchive($archive);

        return $this;
    }

    /**
     * Populates the the current object based on a $archiveTablePhpName archive object.
     *
     * @param      ChildSpyAclGroupArchive $archive An archived object based on the same class
      * @param      Boolean $populateAutoIncrementPrimaryKeys
     *               If true, autoincrement columns are copied from the archive object.
     *               If false, autoincrement columns are left intact.
      *
     * @return     ChildSpyAclGroup The current object (for fluent API support)
     */
    public function populateFromArchive($archive, $populateAutoIncrementPrimaryKeys = false) {
        if ($populateAutoIncrementPrimaryKeys) {
            $this->setIdAclGroup($archive->getIdAclGroup());
        }
        $this->setName($archive->getName());
        $this->setCreatedAt($archive->getCreatedAt());
        $this->setUpdatedAt($archive->getUpdatedAt());

        return $this;
    }

    /**
     * Removes the object from the database without archiving it.
     *
     * @param ConnectionInterface $con Optional connection object
     *
     * @return $this|ChildSpyAclGroup The current object (for fluent API support)
     */
    public function deleteWithoutArchive(ConnectionInterface $con = null)
    {
        $this->archiveOnDelete = false;

        return $this->delete($con);
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
