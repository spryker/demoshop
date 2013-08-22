<?php


/**
 * Base class that represents a row from the 'pac_acl_resource' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence.om
 */
abstract class Generated_Zed_Acl_Persistence_Om_BasePacAclResource extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Acl_Persistence_PacAclResourcePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Acl_Persistence_PacAclResourcePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_acl_resource field.
     * @var        int
     */
    protected $id_acl_resource;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

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
     * @var        PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclPrivilege[] Collection to store aggregation of ProjectA_Zed_Acl_Persistence_PacAclPrivilege objects.
     */
    protected $collAclPrivileges;
    protected $collAclPrivilegesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRoleResource[] Collection to store aggregation of ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects.
     */
    protected $collAclRoleResources;
    protected $collAclRoleResourcesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege[] Collection to store aggregation of ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects.
     */
    protected $collPacAclRolePrivileges;
    protected $collPacAclRolePrivilegesPartial;

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
    protected $aclPrivilegesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $aclRoleResourcesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacAclRolePrivilegesScheduledForDeletion = null;

    /**
     * Get the [id_acl_resource] column value.
     *
     * @return int
     */
    public function getIdAclResource()
    {
        return $this->id_acl_resource;
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
     * Set the value of [id_acl_resource] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function setIdAclResource($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_acl_resource !== $v) {
            $this->id_acl_resource = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::ID_ACL_RESOURCE;
        }


        return $this;
    } // setIdAclResource()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::UPDATED_AT;
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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_acl_resource = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->created_at = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->updated_at = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Acl_Persistence_PacAclResource object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAclPrivileges = null;

            $this->collAclRoleResources = null;

            $this->collPacAclRolePrivileges = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Acl_Persistence_PacAclResourceQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::UPDATED_AT)) {
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
                
                        $lumberjack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
                        $lumberjack->addField("entityData", $this->toArray());
                        $lumberjack->addField("entity", get_class($this));
                        $lumberjack->addField("entityId", $id);
                        $lumberjack->addField("affectedRows", $affectedRows);
                
                        $authIdentity = ProjectA_Zed_Auth_Component_Model_Auth::getInstance()->getIdentity();
                        if (isset($authIdentity) && $authIdentity instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
                            $lumberjack->addField("aclUserName", $authIdentity->getUsername());
                        }
                
                        $subType = $isInsert ? "insert" : "update";
                        $lumberjack->send(ProjectA_Shared_Lumberjack_Code_Log_Types::SAVE, get_class($this) . " id:" . $id . " " . $subType, $subType);
                    }
                }

                ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::addInstanceToPool($this);
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

            if ($this->aclPrivilegesScheduledForDeletion !== null) {
                if (!$this->aclPrivilegesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery::create()
                        ->filterByPrimaryKeys($this->aclPrivilegesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aclPrivilegesScheduledForDeletion = null;
                }
            }

            if ($this->collAclPrivileges !== null) {
                foreach ($this->collAclPrivileges as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->aclRoleResourcesScheduledForDeletion !== null) {
                if (!$this->aclRoleResourcesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create()
                        ->filterByPrimaryKeys($this->aclRoleResourcesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aclRoleResourcesScheduledForDeletion = null;
                }
            }

            if ($this->collAclRoleResources !== null) {
                foreach ($this->collAclRoleResources as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacAclRolePrivilegesScheduledForDeletion !== null) {
                if (!$this->pacAclRolePrivilegesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create()
                        ->filterByPrimaryKeys($this->pacAclRolePrivilegesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacAclRolePrivilegesScheduledForDeletion = null;
                }
            }

            if ($this->collPacAclRolePrivileges !== null) {
                foreach ($this->collPacAclRolePrivileges as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::ID_ACL_RESOURCE;
        if (null !== $this->id_acl_resource) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::ID_ACL_RESOURCE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::ID_ACL_RESOURCE)) {
            $modifiedColumns[':p' . $index++]  = '`id_acl_resource`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_acl_resource` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_acl_resource`':
                        $stmt->bindValue($identifier, $this->id_acl_resource, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
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
        $this->setIdAclResource($pk);

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
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAclPrivileges !== null) {
                    foreach ($this->collAclPrivileges as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAclRoleResources !== null) {
                    foreach ($this->collAclRoleResources as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacAclRolePrivileges !== null) {
                    foreach ($this->collPacAclRolePrivileges as $referrerFK) {
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
        $pos = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdAclResource();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Acl_Persistence_PacAclResource'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Acl_Persistence_PacAclResource'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdAclResource(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getCreatedAt(),
            $keys[3] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collAclPrivileges) {
                $result['AclPrivileges'] = $this->collAclPrivileges->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAclRoleResources) {
                $result['AclRoleResources'] = $this->collAclRoleResources->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacAclRolePrivileges) {
                $result['PacAclRolePrivileges'] = $this->collPacAclRolePrivileges->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdAclResource($value);
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
        $keys = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdAclResource($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::ID_ACL_RESOURCE)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::ID_ACL_RESOURCE, $this->id_acl_resource);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::NAME)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::ID_ACL_RESOURCE, $this->id_acl_resource);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdAclResource();
    }

    /**
     * Generic method to set the primary key (id_acl_resource column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdAclResource($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdAclResource();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Acl_Persistence_PacAclResource (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAclPrivileges() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAclPrivilege($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAclRoleResources() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAclRoleResource($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacAclRolePrivileges() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacAclRolePrivilege($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdAclResource(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource Clone of current object.
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclResourcePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Acl_Persistence_PacAclResourcePeer();
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
        if ('AclPrivilege' == $relationName) {
            $this->initAclPrivileges();
        }
        if ('AclRoleResource' == $relationName) {
            $this->initAclRoleResources();
        }
        if ('PacAclRolePrivilege' == $relationName) {
            $this->initPacAclRolePrivileges();
        }
    }

    /**
     * Clears out the collAclPrivileges collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     * @see        addAclPrivileges()
     */
    public function clearAclPrivileges()
    {
        $this->collAclPrivileges = null; // important to set this to null since that means it is uninitialized
        $this->collAclPrivilegesPartial = null;

        return $this;
    }

    /**
     * reset is the collAclPrivileges collection loaded partially
     *
     * @return void
     */
    public function resetPartialAclPrivileges($v = true)
    {
        $this->collAclPrivilegesPartial = $v;
    }

    /**
     * Initializes the collAclPrivileges collection.
     *
     * By default this just sets the collAclPrivileges collection to an empty array (like clearcollAclPrivileges());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAclPrivileges($overrideExisting = true)
    {
        if (null !== $this->collAclPrivileges && !$overrideExisting) {
            return;
        }
        $this->collAclPrivileges = new PropelObjectCollection();
        $this->collAclPrivileges->setModel('ProjectA_Zed_Acl_Persistence_PacAclPrivilege');
    }

    /**
     * Gets an array of ProjectA_Zed_Acl_Persistence_PacAclPrivilege objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclResource is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclPrivilege[] List of ProjectA_Zed_Acl_Persistence_PacAclPrivilege objects
     * @throws PropelException
     */
    public function getAclPrivileges($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAclPrivilegesPartial && !$this->isNew();
        if (null === $this->collAclPrivileges || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAclPrivileges) {
                // return empty collection
                $this->initAclPrivileges();
            } else {
                $collAclPrivileges = ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery::create(null, $criteria)
                    ->filterByAclResource($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAclPrivilegesPartial && count($collAclPrivileges)) {
                      $this->initAclPrivileges(false);

                      foreach($collAclPrivileges as $obj) {
                        if (false == $this->collAclPrivileges->contains($obj)) {
                          $this->collAclPrivileges->append($obj);
                        }
                      }

                      $this->collAclPrivilegesPartial = true;
                    }

                    $collAclPrivileges->getInternalIterator()->rewind();
                    return $collAclPrivileges;
                }

                if($partial && $this->collAclPrivileges) {
                    foreach($this->collAclPrivileges as $obj) {
                        if($obj->isNew()) {
                            $collAclPrivileges[] = $obj;
                        }
                    }
                }

                $this->collAclPrivileges = $collAclPrivileges;
                $this->collAclPrivilegesPartial = false;
            }
        }

        return $this->collAclPrivileges;
    }

    /**
     * Sets a collection of AclPrivilege objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aclPrivileges A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function setAclPrivileges(PropelCollection $aclPrivileges, PropelPDO $con = null)
    {
        $aclPrivilegesToDelete = $this->getAclPrivileges(new Criteria(), $con)->diff($aclPrivileges);

        $this->aclPrivilegesScheduledForDeletion = unserialize(serialize($aclPrivilegesToDelete));

        foreach ($aclPrivilegesToDelete as $aclPrivilegeRemoved) {
            $aclPrivilegeRemoved->setAclResource(null);
        }

        $this->collAclPrivileges = null;
        foreach ($aclPrivileges as $aclPrivilege) {
            $this->addAclPrivilege($aclPrivilege);
        }

        $this->collAclPrivileges = $aclPrivileges;
        $this->collAclPrivilegesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Acl_Persistence_PacAclPrivilege objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Acl_Persistence_PacAclPrivilege objects.
     * @throws PropelException
     */
    public function countAclPrivileges(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAclPrivilegesPartial && !$this->isNew();
        if (null === $this->collAclPrivileges || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAclPrivileges) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAclPrivileges());
            }
            $query = ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclResource($this)
                ->count($con);
        }

        return count($this->collAclPrivileges);
    }

    /**
     * Method called to associate a ProjectA_Zed_Acl_Persistence_PacAclPrivilege object to this object
     * through the ProjectA_Zed_Acl_Persistence_PacAclPrivilege foreign key attribute.
     *
     * @param    ProjectA_Zed_Acl_Persistence_PacAclPrivilege $l ProjectA_Zed_Acl_Persistence_PacAclPrivilege
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function addAclPrivilege(ProjectA_Zed_Acl_Persistence_PacAclPrivilege $l)
    {
        if ($this->collAclPrivileges === null) {
            $this->initAclPrivileges();
            $this->collAclPrivilegesPartial = true;
        }
        if (!in_array($l, $this->collAclPrivileges->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAclPrivilege($l);
        }

        return $this;
    }

    /**
     * @param	AclPrivilege $aclPrivilege The aclPrivilege object to add.
     */
    protected function doAddAclPrivilege($aclPrivilege)
    {
        $this->collAclPrivileges[]= $aclPrivilege;
        $aclPrivilege->setAclResource($this);
    }

    /**
     * @param	AclPrivilege $aclPrivilege The aclPrivilege object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function removeAclPrivilege($aclPrivilege)
    {
        if ($this->getAclPrivileges()->contains($aclPrivilege)) {
            $this->collAclPrivileges->remove($this->collAclPrivileges->search($aclPrivilege));
            if (null === $this->aclPrivilegesScheduledForDeletion) {
                $this->aclPrivilegesScheduledForDeletion = clone $this->collAclPrivileges;
                $this->aclPrivilegesScheduledForDeletion->clear();
            }
            $this->aclPrivilegesScheduledForDeletion[]= clone $aclPrivilege;
            $aclPrivilege->setAclResource(null);
        }

        return $this;
    }

    /**
     * Clears out the collAclRoleResources collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     * @see        addAclRoleResources()
     */
    public function clearAclRoleResources()
    {
        $this->collAclRoleResources = null; // important to set this to null since that means it is uninitialized
        $this->collAclRoleResourcesPartial = null;

        return $this;
    }

    /**
     * reset is the collAclRoleResources collection loaded partially
     *
     * @return void
     */
    public function resetPartialAclRoleResources($v = true)
    {
        $this->collAclRoleResourcesPartial = $v;
    }

    /**
     * Initializes the collAclRoleResources collection.
     *
     * By default this just sets the collAclRoleResources collection to an empty array (like clearcollAclRoleResources());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAclRoleResources($overrideExisting = true)
    {
        if (null !== $this->collAclRoleResources && !$overrideExisting) {
            return;
        }
        $this->collAclRoleResources = new PropelObjectCollection();
        $this->collAclRoleResources->setModel('ProjectA_Zed_Acl_Persistence_PacAclRoleResource');
    }

    /**
     * Gets an array of ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclResource is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRoleResource[] List of ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects
     * @throws PropelException
     */
    public function getAclRoleResources($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAclRoleResourcesPartial && !$this->isNew();
        if (null === $this->collAclRoleResources || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAclRoleResources) {
                // return empty collection
                $this->initAclRoleResources();
            } else {
                $collAclRoleResources = ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create(null, $criteria)
                    ->filterByAclResource($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAclRoleResourcesPartial && count($collAclRoleResources)) {
                      $this->initAclRoleResources(false);

                      foreach($collAclRoleResources as $obj) {
                        if (false == $this->collAclRoleResources->contains($obj)) {
                          $this->collAclRoleResources->append($obj);
                        }
                      }

                      $this->collAclRoleResourcesPartial = true;
                    }

                    $collAclRoleResources->getInternalIterator()->rewind();
                    return $collAclRoleResources;
                }

                if($partial && $this->collAclRoleResources) {
                    foreach($this->collAclRoleResources as $obj) {
                        if($obj->isNew()) {
                            $collAclRoleResources[] = $obj;
                        }
                    }
                }

                $this->collAclRoleResources = $collAclRoleResources;
                $this->collAclRoleResourcesPartial = false;
            }
        }

        return $this->collAclRoleResources;
    }

    /**
     * Sets a collection of AclRoleResource objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aclRoleResources A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function setAclRoleResources(PropelCollection $aclRoleResources, PropelPDO $con = null)
    {
        $aclRoleResourcesToDelete = $this->getAclRoleResources(new Criteria(), $con)->diff($aclRoleResources);

        $this->aclRoleResourcesScheduledForDeletion = unserialize(serialize($aclRoleResourcesToDelete));

        foreach ($aclRoleResourcesToDelete as $aclRoleResourceRemoved) {
            $aclRoleResourceRemoved->setAclResource(null);
        }

        $this->collAclRoleResources = null;
        foreach ($aclRoleResources as $aclRoleResource) {
            $this->addAclRoleResource($aclRoleResource);
        }

        $this->collAclRoleResources = $aclRoleResources;
        $this->collAclRoleResourcesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects.
     * @throws PropelException
     */
    public function countAclRoleResources(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAclRoleResourcesPartial && !$this->isNew();
        if (null === $this->collAclRoleResources || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAclRoleResources) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAclRoleResources());
            }
            $query = ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclResource($this)
                ->count($con);
        }

        return count($this->collAclRoleResources);
    }

    /**
     * Method called to associate a ProjectA_Zed_Acl_Persistence_PacAclRoleResource object to this object
     * through the ProjectA_Zed_Acl_Persistence_PacAclRoleResource foreign key attribute.
     *
     * @param    ProjectA_Zed_Acl_Persistence_PacAclRoleResource $l ProjectA_Zed_Acl_Persistence_PacAclRoleResource
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function addAclRoleResource(ProjectA_Zed_Acl_Persistence_PacAclRoleResource $l)
    {
        if ($this->collAclRoleResources === null) {
            $this->initAclRoleResources();
            $this->collAclRoleResourcesPartial = true;
        }
        if (!in_array($l, $this->collAclRoleResources->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAclRoleResource($l);
        }

        return $this;
    }

    /**
     * @param	AclRoleResource $aclRoleResource The aclRoleResource object to add.
     */
    protected function doAddAclRoleResource($aclRoleResource)
    {
        $this->collAclRoleResources[]= $aclRoleResource;
        $aclRoleResource->setAclResource($this);
    }

    /**
     * @param	AclRoleResource $aclRoleResource The aclRoleResource object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function removeAclRoleResource($aclRoleResource)
    {
        if ($this->getAclRoleResources()->contains($aclRoleResource)) {
            $this->collAclRoleResources->remove($this->collAclRoleResources->search($aclRoleResource));
            if (null === $this->aclRoleResourcesScheduledForDeletion) {
                $this->aclRoleResourcesScheduledForDeletion = clone $this->collAclRoleResources;
                $this->aclRoleResourcesScheduledForDeletion->clear();
            }
            $this->aclRoleResourcesScheduledForDeletion[]= clone $aclRoleResource;
            $aclRoleResource->setAclResource(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclResource is new, it will return
     * an empty collection; or if this PacAclResource has previously
     * been saved, it will retrieve related AclRoleResources from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclResource.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRoleResource[] List of ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects
     */
    public function getAclRoleResourcesJoinAclRole($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create(null, $criteria);
        $query->joinWith('AclRole', $join_behavior);

        return $this->getAclRoleResources($query, $con);
    }

    /**
     * Clears out the collPacAclRolePrivileges collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     * @see        addPacAclRolePrivileges()
     */
    public function clearPacAclRolePrivileges()
    {
        $this->collPacAclRolePrivileges = null; // important to set this to null since that means it is uninitialized
        $this->collPacAclRolePrivilegesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacAclRolePrivileges collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacAclRolePrivileges($v = true)
    {
        $this->collPacAclRolePrivilegesPartial = $v;
    }

    /**
     * Initializes the collPacAclRolePrivileges collection.
     *
     * By default this just sets the collPacAclRolePrivileges collection to an empty array (like clearcollPacAclRolePrivileges());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacAclRolePrivileges($overrideExisting = true)
    {
        if (null !== $this->collPacAclRolePrivileges && !$overrideExisting) {
            return;
        }
        $this->collPacAclRolePrivileges = new PropelObjectCollection();
        $this->collPacAclRolePrivileges->setModel('ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege');
    }

    /**
     * Gets an array of ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclResource is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege[] List of ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects
     * @throws PropelException
     */
    public function getPacAclRolePrivileges($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacAclRolePrivilegesPartial && !$this->isNew();
        if (null === $this->collPacAclRolePrivileges || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacAclRolePrivileges) {
                // return empty collection
                $this->initPacAclRolePrivileges();
            } else {
                $collPacAclRolePrivileges = ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create(null, $criteria)
                    ->filterByAclResource($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacAclRolePrivilegesPartial && count($collPacAclRolePrivileges)) {
                      $this->initPacAclRolePrivileges(false);

                      foreach($collPacAclRolePrivileges as $obj) {
                        if (false == $this->collPacAclRolePrivileges->contains($obj)) {
                          $this->collPacAclRolePrivileges->append($obj);
                        }
                      }

                      $this->collPacAclRolePrivilegesPartial = true;
                    }

                    $collPacAclRolePrivileges->getInternalIterator()->rewind();
                    return $collPacAclRolePrivileges;
                }

                if($partial && $this->collPacAclRolePrivileges) {
                    foreach($this->collPacAclRolePrivileges as $obj) {
                        if($obj->isNew()) {
                            $collPacAclRolePrivileges[] = $obj;
                        }
                    }
                }

                $this->collPacAclRolePrivileges = $collPacAclRolePrivileges;
                $this->collPacAclRolePrivilegesPartial = false;
            }
        }

        return $this->collPacAclRolePrivileges;
    }

    /**
     * Sets a collection of PacAclRolePrivilege objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacAclRolePrivileges A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function setPacAclRolePrivileges(PropelCollection $pacAclRolePrivileges, PropelPDO $con = null)
    {
        $pacAclRolePrivilegesToDelete = $this->getPacAclRolePrivileges(new Criteria(), $con)->diff($pacAclRolePrivileges);

        $this->pacAclRolePrivilegesScheduledForDeletion = unserialize(serialize($pacAclRolePrivilegesToDelete));

        foreach ($pacAclRolePrivilegesToDelete as $pacAclRolePrivilegeRemoved) {
            $pacAclRolePrivilegeRemoved->setAclResource(null);
        }

        $this->collPacAclRolePrivileges = null;
        foreach ($pacAclRolePrivileges as $pacAclRolePrivilege) {
            $this->addPacAclRolePrivilege($pacAclRolePrivilege);
        }

        $this->collPacAclRolePrivileges = $pacAclRolePrivileges;
        $this->collPacAclRolePrivilegesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects.
     * @throws PropelException
     */
    public function countPacAclRolePrivileges(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacAclRolePrivilegesPartial && !$this->isNew();
        if (null === $this->collPacAclRolePrivileges || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacAclRolePrivileges) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacAclRolePrivileges());
            }
            $query = ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclResource($this)
                ->count($con);
        }

        return count($this->collPacAclRolePrivileges);
    }

    /**
     * Method called to associate a ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege object to this object
     * through the ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege foreign key attribute.
     *
     * @param    ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege $l ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function addPacAclRolePrivilege(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege $l)
    {
        if ($this->collPacAclRolePrivileges === null) {
            $this->initPacAclRolePrivileges();
            $this->collPacAclRolePrivilegesPartial = true;
        }
        if (!in_array($l, $this->collPacAclRolePrivileges->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacAclRolePrivilege($l);
        }

        return $this;
    }

    /**
     * @param	PacAclRolePrivilege $pacAclRolePrivilege The pacAclRolePrivilege object to add.
     */
    protected function doAddPacAclRolePrivilege($pacAclRolePrivilege)
    {
        $this->collPacAclRolePrivileges[]= $pacAclRolePrivilege;
        $pacAclRolePrivilege->setAclResource($this);
    }

    /**
     * @param	PacAclRolePrivilege $pacAclRolePrivilege The pacAclRolePrivilege object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function removePacAclRolePrivilege($pacAclRolePrivilege)
    {
        if ($this->getPacAclRolePrivileges()->contains($pacAclRolePrivilege)) {
            $this->collPacAclRolePrivileges->remove($this->collPacAclRolePrivileges->search($pacAclRolePrivilege));
            if (null === $this->pacAclRolePrivilegesScheduledForDeletion) {
                $this->pacAclRolePrivilegesScheduledForDeletion = clone $this->collPacAclRolePrivileges;
                $this->pacAclRolePrivilegesScheduledForDeletion->clear();
            }
            $this->pacAclRolePrivilegesScheduledForDeletion[]= clone $pacAclRolePrivilege;
            $pacAclRolePrivilege->setAclResource(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclResource is new, it will return
     * an empty collection; or if this PacAclResource has previously
     * been saved, it will retrieve related PacAclRolePrivileges from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclResource.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege[] List of ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects
     */
    public function getPacAclRolePrivilegesJoinAclRole($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create(null, $criteria);
        $query->joinWith('AclRole', $join_behavior);

        return $this->getPacAclRolePrivileges($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclResource is new, it will return
     * an empty collection; or if this PacAclResource has previously
     * been saved, it will retrieve related PacAclRolePrivileges from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclResource.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege[] List of ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects
     */
    public function getPacAclRolePrivilegesJoinAclPrivilege($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create(null, $criteria);
        $query->joinWith('AclPrivilege', $join_behavior);

        return $this->getPacAclRolePrivileges($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_acl_resource = null;
        $this->name = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collAclPrivileges) {
                foreach ($this->collAclPrivileges as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAclRoleResources) {
                foreach ($this->collAclRoleResources as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacAclRolePrivileges) {
                foreach ($this->collPacAclRolePrivileges as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAclPrivileges instanceof PropelCollection) {
            $this->collAclPrivileges->clearIterator();
        }
        $this->collAclPrivileges = null;
        if ($this->collAclRoleResources instanceof PropelCollection) {
            $this->collAclRoleResources->clearIterator();
        }
        $this->collAclRoleResources = null;
        if ($this->collPacAclRolePrivileges instanceof PropelCollection) {
            $this->collPacAclRolePrivileges->clearIterator();
        }
        $this->collPacAclRolePrivileges = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Acl_Persistence_PacAclResource The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclResourcePeer::UPDATED_AT;

        return $this;
    }

}
