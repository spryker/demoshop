<?php


/**
 * Base class that represents a row from the 'pac_acl_role' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.om
 */
abstract class Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclRole extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_acl_role field.
     * @var        int
     */
    protected $id_acl_role;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the is_deletable field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_deletable;

    /**
     * The value for the is_admin field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_admin;

    /**
     * The value for the is_deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_deleted;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclUser[] Collection to store aggregation of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects.
     */
    protected $collAclUsers;
    protected $collAclUsersPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege[] Collection to store aggregation of ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects.
     */
    protected $collAclGroupPrivileges;
    protected $collAclGroupPrivilegesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $aclUsersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $aclGroupPrivilegesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_deletable = true;
        $this->is_admin = false;
        $this->is_deleted = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclRole object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_acl_role] column value.
     *
     * @return int
     */
    public function getIdAclRole()
    {

        return $this->id_acl_role;
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
     * Get the [is_deletable] column value.
     *
     * @return boolean
     */
    public function getIsDeletable()
    {

        return $this->is_deletable;
    }

    /**
     * Get the [is_admin] column value.
     *
     * @return boolean
     */
    public function getIsAdmin()
    {

        return $this->is_admin;
    }

    /**
     * Get the [is_deleted] column value.
     *
     * @return boolean
     */
    public function getIsDeleted()
    {

        return $this->is_deleted;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id_acl_role] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setIdAclRole($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_acl_role !== $v) {
            $this->id_acl_role = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE;
        }


        return $this;
    } // setIdAclRole()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [is_deletable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setIsDeletable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_deletable !== $v) {
            $this->is_deletable = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETABLE;
        }


        return $this;
    } // setIsDeletable()

    /**
     * Sets the value of the [is_admin] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setIsAdmin($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_admin !== $v) {
            $this->is_admin = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_ADMIN;
        }


        return $this;
    } // setIsAdmin()

    /**
     * Sets the value of the [is_deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setIsDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_deleted !== $v) {
            $this->is_deleted = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT;
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
            if ($this->is_deletable !== true) {
                return false;
            }

            if ($this->is_admin !== false) {
                return false;
            }

            if ($this->is_deleted !== false) {
                return false;
            }

        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_acl_role = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->is_deletable = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->is_admin = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->is_deleted = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Acl_Persistence_Propel_PacAclRole object", $e);
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
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAclUsers = null;

            $this->collAclGroupPrivileges = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT)) {
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
                // lumberjack behavior

                if ($affectedRows > 0) {
                    $blacklistedEntities = array (
                );

                    if (!in_array(get_class($this), $blacklistedEntities)) {
                        $id = $this->getPrimaryKey();
                        $id = is_null($id) ? 0 : $id;

                        // Fix an issue when having multiple primary keys
                        if (is_array($id)) {
                            $id = implode(',', $id);
                        }

                        $lumberjack = \ProjectA\Shared\Lumberjack\Code\Lumberjack::getInstance();
                        $lumberjack->addField("entityData", $this->toArray());
                        $lumberjack->addField("entity", get_class($this));
                        $lumberjack->addField("entityId", $id);
                        $lumberjack->addField("affectedRows", $affectedRows);

                        $authIdentity = ProjectA\Zed\Auth\Business\Model\Auth::getInstance()->getIdentity();
                        if (isset($authIdentity) && $authIdentity instanceof \ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
                            $lumberjack->addField("aclUserName", $authIdentity->getUsername());
                        }

                        $subType = $isInsert ? "insert" : "update";
                        $lumberjack->send(\ProjectA\Shared\Lumberjack\Code\Log\Types::SAVE, get_class($this) . " id:" . $id . " " . $subType, $subType);
                    }
                }

                ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->aclUsersScheduledForDeletion !== null) {
                if (!$this->aclUsersScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery::create()
                        ->filterByPrimaryKeys($this->aclUsersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aclUsersScheduledForDeletion = null;
                }
            }

            if ($this->collAclUsers !== null) {
                foreach ($this->collAclUsers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->aclGroupPrivilegesScheduledForDeletion !== null) {
                if (!$this->aclGroupPrivilegesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery::create()
                        ->filterByPrimaryKeys($this->aclGroupPrivilegesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aclGroupPrivilegesScheduledForDeletion = null;
                }
            }

            if ($this->collAclGroupPrivileges !== null) {
                foreach ($this->collAclGroupPrivileges as $referrerFK) {
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
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE;
        if (null !== $this->id_acl_role) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE)) {
            $modifiedColumns[':p' . $index++]  = '`id_acl_role`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETABLE)) {
            $modifiedColumns[':p' . $index++]  = '`is_deletable`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_ADMIN)) {
            $modifiedColumns[':p' . $index++]  = '`is_admin`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_acl_role` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_acl_role`':
                        $stmt->bindValue($identifier, $this->id_acl_role, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`is_deletable`':
                        $stmt->bindValue($identifier, (int) $this->is_deletable, PDO::PARAM_INT);
                        break;
                    case '`is_admin`':
                        $stmt->bindValue($identifier, (int) $this->is_admin, PDO::PARAM_INT);
                        break;
                    case '`is_deleted`':
                        $stmt->bindValue($identifier, (int) $this->is_deleted, PDO::PARAM_INT);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdAclRole($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAclUsers !== null) {
                    foreach ($this->collAclUsers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAclGroupPrivileges !== null) {
                    foreach ($this->collAclGroupPrivileges as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdAclRole();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getIsDeletable();
                break;
            case 3:
                return $this->getIsAdmin();
                break;
            case 4:
                return $this->getIsDeleted();
                break;
            case 5:
                return $this->getCreatedAt();
                break;
            case 6:
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
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Acl_Persistence_Propel_PacAclRole'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Acl_Persistence_Propel_PacAclRole'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdAclRole(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getIsDeletable(),
            $keys[3] => $this->getIsAdmin(),
            $keys[4] => $this->getIsDeleted(),
            $keys[5] => $this->getCreatedAt(),
            $keys[6] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collAclUsers) {
                $result['AclUsers'] = $this->collAclUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAclGroupPrivileges) {
                $result['AclGroupPrivileges'] = $this->collAclGroupPrivileges->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdAclRole($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setIsDeletable($value);
                break;
            case 3:
                $this->setIsAdmin($value);
                break;
            case 4:
                $this->setIsDeleted($value);
                break;
            case 5:
                $this->setCreatedAt($value);
                break;
            case 6:
                $this->setUpdatedAt($value);
                break;
        } // switch()
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
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdAclRole($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIsDeletable($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsAdmin($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIsDeleted($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE)) $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $this->id_acl_role);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::NAME)) $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETABLE)) $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETABLE, $this->is_deletable);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_ADMIN)) $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_ADMIN, $this->is_admin);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT, $this->updated_at);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $this->id_acl_role);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdAclRole();
    }

    /**
     * Generic method to set the primary key (id_acl_role column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdAclRole($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdAclRole();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Acl_Persistence_Propel_PacAclRole (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setIsDeletable($this->getIsDeletable());
        $copyObj->setIsAdmin($this->getIsAdmin());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAclUsers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAclUser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAclGroupPrivileges() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAclGroupPrivilege($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdAclRole(NULL); // this is a auto-increment column, so set to default value
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole Clone of current object.
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
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('AclUser' == $relationName) {
            $this->initAclUsers();
        }
        if ('AclGroupPrivilege' == $relationName) {
            $this->initAclGroupPrivileges();
        }
    }

    /**
     * Clears out the collAclUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     * @see        addAclUsers()
     */
    public function clearAclUsers()
    {
        $this->collAclUsers = null; // important to set this to null since that means it is uninitialized
        $this->collAclUsersPartial = null;

        return $this;
    }

    /**
     * reset is the collAclUsers collection loaded partially
     *
     * @return void
     */
    public function resetPartialAclUsers($v = true)
    {
        $this->collAclUsersPartial = $v;
    }

    /**
     * Initializes the collAclUsers collection.
     *
     * By default this just sets the collAclUsers collection to an empty array (like clearcollAclUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAclUsers($overrideExisting = true)
    {
        if (null !== $this->collAclUsers && !$overrideExisting) {
            return;
        }
        $this->collAclUsers = new PropelObjectCollection();
        $this->collAclUsers->setModel('ProjectA_Zed_Acl_Persistence_Propel_PacAclUser');
    }

    /**
     * Gets an array of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_Propel_PacAclRole is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclUser[] List of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects
     * @throws PropelException
     */
    public function getAclUsers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAclUsersPartial && !$this->isNew();
        if (null === $this->collAclUsers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAclUsers) {
                // return empty collection
                $this->initAclUsers();
            } else {
                $collAclUsers = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery::create(null, $criteria)
                    ->filterByAclRole($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAclUsersPartial && count($collAclUsers)) {
                      $this->initAclUsers(false);

                      foreach ($collAclUsers as $obj) {
                        if (false == $this->collAclUsers->contains($obj)) {
                          $this->collAclUsers->append($obj);
                        }
                      }

                      $this->collAclUsersPartial = true;
                    }

                    $collAclUsers->getInternalIterator()->rewind();

                    return $collAclUsers;
                }

                if ($partial && $this->collAclUsers) {
                    foreach ($this->collAclUsers as $obj) {
                        if ($obj->isNew()) {
                            $collAclUsers[] = $obj;
                        }
                    }
                }

                $this->collAclUsers = $collAclUsers;
                $this->collAclUsersPartial = false;
            }
        }

        return $this->collAclUsers;
    }

    /**
     * Sets a collection of AclUser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aclUsers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setAclUsers(PropelCollection $aclUsers, PropelPDO $con = null)
    {
        $aclUsersToDelete = $this->getAclUsers(new Criteria(), $con)->diff($aclUsers);


        $this->aclUsersScheduledForDeletion = $aclUsersToDelete;

        foreach ($aclUsersToDelete as $aclUserRemoved) {
            $aclUserRemoved->setAclRole(null);
        }

        $this->collAclUsers = null;
        foreach ($aclUsers as $aclUser) {
            $this->addAclUser($aclUser);
        }

        $this->collAclUsers = $aclUsers;
        $this->collAclUsersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects.
     * @throws PropelException
     */
    public function countAclUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAclUsersPartial && !$this->isNew();
        if (null === $this->collAclUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAclUsers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAclUsers());
            }
            $query = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclRole($this)
                ->count($con);
        }

        return count($this->collAclUsers);
    }

    /**
     * Method called to associate a ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object to this object
     * through the ProjectA_Zed_Acl_Persistence_Propel_PacAclUser foreign key attribute.
     *
     * @param    ProjectA_Zed_Acl_Persistence_Propel_PacAclUser $l ProjectA_Zed_Acl_Persistence_Propel_PacAclUser
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function addAclUser(ProjectA_Zed_Acl_Persistence_Propel_PacAclUser $l)
    {
        if ($this->collAclUsers === null) {
            $this->initAclUsers();
            $this->collAclUsersPartial = true;
        }

        if (!in_array($l, $this->collAclUsers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAclUser($l);

            if ($this->aclUsersScheduledForDeletion and $this->aclUsersScheduledForDeletion->contains($l)) {
                $this->aclUsersScheduledForDeletion->remove($this->aclUsersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	AclUser $aclUser The aclUser object to add.
     */
    protected function doAddAclUser($aclUser)
    {
        $this->collAclUsers[]= $aclUser;
        $aclUser->setAclRole($this);
    }

    /**
     * @param	AclUser $aclUser The aclUser object to remove.
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function removeAclUser($aclUser)
    {
        if ($this->getAclUsers()->contains($aclUser)) {
            $this->collAclUsers->remove($this->collAclUsers->search($aclUser));
            if (null === $this->aclUsersScheduledForDeletion) {
                $this->aclUsersScheduledForDeletion = clone $this->collAclUsers;
                $this->aclUsersScheduledForDeletion->clear();
            }
            $this->aclUsersScheduledForDeletion[]= clone $aclUser;
            $aclUser->setAclRole(null);
        }

        return $this;
    }

    /**
     * Clears out the collAclGroupPrivileges collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     * @see        addAclGroupPrivileges()
     */
    public function clearAclGroupPrivileges()
    {
        $this->collAclGroupPrivileges = null; // important to set this to null since that means it is uninitialized
        $this->collAclGroupPrivilegesPartial = null;

        return $this;
    }

    /**
     * reset is the collAclGroupPrivileges collection loaded partially
     *
     * @return void
     */
    public function resetPartialAclGroupPrivileges($v = true)
    {
        $this->collAclGroupPrivilegesPartial = $v;
    }

    /**
     * Initializes the collAclGroupPrivileges collection.
     *
     * By default this just sets the collAclGroupPrivileges collection to an empty array (like clearcollAclGroupPrivileges());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAclGroupPrivileges($overrideExisting = true)
    {
        if (null !== $this->collAclGroupPrivileges && !$overrideExisting) {
            return;
        }
        $this->collAclGroupPrivileges = new PropelObjectCollection();
        $this->collAclGroupPrivileges->setModel('ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege');
    }

    /**
     * Gets an array of ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_Propel_PacAclRole is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege[] List of ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects
     * @throws PropelException
     */
    public function getAclGroupPrivileges($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAclGroupPrivilegesPartial && !$this->isNew();
        if (null === $this->collAclGroupPrivileges || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAclGroupPrivileges) {
                // return empty collection
                $this->initAclGroupPrivileges();
            } else {
                $collAclGroupPrivileges = ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery::create(null, $criteria)
                    ->filterByAclRole($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAclGroupPrivilegesPartial && count($collAclGroupPrivileges)) {
                      $this->initAclGroupPrivileges(false);

                      foreach ($collAclGroupPrivileges as $obj) {
                        if (false == $this->collAclGroupPrivileges->contains($obj)) {
                          $this->collAclGroupPrivileges->append($obj);
                        }
                      }

                      $this->collAclGroupPrivilegesPartial = true;
                    }

                    $collAclGroupPrivileges->getInternalIterator()->rewind();

                    return $collAclGroupPrivileges;
                }

                if ($partial && $this->collAclGroupPrivileges) {
                    foreach ($this->collAclGroupPrivileges as $obj) {
                        if ($obj->isNew()) {
                            $collAclGroupPrivileges[] = $obj;
                        }
                    }
                }

                $this->collAclGroupPrivileges = $collAclGroupPrivileges;
                $this->collAclGroupPrivilegesPartial = false;
            }
        }

        return $this->collAclGroupPrivileges;
    }

    /**
     * Sets a collection of AclGroupPrivilege objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aclGroupPrivileges A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function setAclGroupPrivileges(PropelCollection $aclGroupPrivileges, PropelPDO $con = null)
    {
        $aclGroupPrivilegesToDelete = $this->getAclGroupPrivileges(new Criteria(), $con)->diff($aclGroupPrivileges);


        $this->aclGroupPrivilegesScheduledForDeletion = $aclGroupPrivilegesToDelete;

        foreach ($aclGroupPrivilegesToDelete as $aclGroupPrivilegeRemoved) {
            $aclGroupPrivilegeRemoved->setAclRole(null);
        }

        $this->collAclGroupPrivileges = null;
        foreach ($aclGroupPrivileges as $aclGroupPrivilege) {
            $this->addAclGroupPrivilege($aclGroupPrivilege);
        }

        $this->collAclGroupPrivileges = $aclGroupPrivileges;
        $this->collAclGroupPrivilegesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects.
     * @throws PropelException
     */
    public function countAclGroupPrivileges(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAclGroupPrivilegesPartial && !$this->isNew();
        if (null === $this->collAclGroupPrivileges || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAclGroupPrivileges) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAclGroupPrivileges());
            }
            $query = ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclRole($this)
                ->count($con);
        }

        return count($this->collAclGroupPrivileges);
    }

    /**
     * Method called to associate a ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege object to this object
     * through the ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege foreign key attribute.
     *
     * @param    ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege $l ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function addAclGroupPrivilege(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege $l)
    {
        if ($this->collAclGroupPrivileges === null) {
            $this->initAclGroupPrivileges();
            $this->collAclGroupPrivilegesPartial = true;
        }

        if (!in_array($l, $this->collAclGroupPrivileges->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAclGroupPrivilege($l);

            if ($this->aclGroupPrivilegesScheduledForDeletion and $this->aclGroupPrivilegesScheduledForDeletion->contains($l)) {
                $this->aclGroupPrivilegesScheduledForDeletion->remove($this->aclGroupPrivilegesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	AclGroupPrivilege $aclGroupPrivilege The aclGroupPrivilege object to add.
     */
    protected function doAddAclGroupPrivilege($aclGroupPrivilege)
    {
        $this->collAclGroupPrivileges[]= $aclGroupPrivilege;
        $aclGroupPrivilege->setAclRole($this);
    }

    /**
     * @param	AclGroupPrivilege $aclGroupPrivilege The aclGroupPrivilege object to remove.
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function removeAclGroupPrivilege($aclGroupPrivilege)
    {
        if ($this->getAclGroupPrivileges()->contains($aclGroupPrivilege)) {
            $this->collAclGroupPrivileges->remove($this->collAclGroupPrivileges->search($aclGroupPrivilege));
            if (null === $this->aclGroupPrivilegesScheduledForDeletion) {
                $this->aclGroupPrivilegesScheduledForDeletion = clone $this->collAclGroupPrivileges;
                $this->aclGroupPrivilegesScheduledForDeletion->clear();
            }
            $this->aclGroupPrivilegesScheduledForDeletion[]= clone $aclGroupPrivilege;
            $aclGroupPrivilege->setAclRole(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclRole is new, it will return
     * an empty collection; or if this PacAclRole has previously
     * been saved, it will retrieve related AclGroupPrivileges from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclRole.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege[] List of ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects
     */
    public function getAclGroupPrivilegesJoinAclGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery::create(null, $criteria);
        $query->joinWith('AclGroup', $join_behavior);

        return $this->getAclGroupPrivileges($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_acl_role = null;
        $this->name = null;
        $this->is_deletable = null;
        $this->is_admin = null;
        $this->is_deleted = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collAclUsers) {
                foreach ($this->collAclUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAclGroupPrivileges) {
                foreach ($this->collAclGroupPrivileges as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAclUsers instanceof PropelCollection) {
            $this->collAclUsers->clearIterator();
        }
        $this->collAclUsers = null;
        if ($this->collAclGroupPrivileges instanceof PropelCollection) {
            $this->collAclGroupPrivileges->clearIterator();
        }
        $this->collAclGroupPrivileges = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclRole The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT;

        return $this;
    }

}
