<?php


/**
 * Base class that represents a row from the 'pac_dwh_import_run' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhImportRun extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_dwh_import_run field.
     * @var        int
     */
    protected $id_dwh_import_run;

    /**
     * The value for the execution_time field.
     * @var        double
     */
    protected $execution_time;

    /**
     * The value for the succeeded field.
     * @var        boolean
     */
    protected $succeeded;

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
     * @var        PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun[] Collection to store aggregation of ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects.
     */
    protected $collPacDwhProcessRuns;
    protected $collPacDwhProcessRunsPartial;

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
    protected $pacDwhProcessRunsScheduledForDeletion = null;

    /**
     * Get the [id_dwh_import_run] column value.
     *
     * @return int
     */
    public function getIdDwhImportRun()
    {
        return $this->id_dwh_import_run;
    }

    /**
     * Get the [execution_time] column value.
     *
     * @return double
     */
    public function getExecutionTime()
    {
        return $this->execution_time;
    }

    /**
     * Get the [succeeded] column value.
     *
     * @return boolean
     */
    public function getSucceeded()
    {
        return $this->succeeded;
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
     * Set the value of [id_dwh_import_run] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function setIdDwhImportRun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_dwh_import_run !== $v) {
            $this->id_dwh_import_run = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN;
        }


        return $this;
    } // setIdDwhImportRun()

    /**
     * Set the value of [execution_time] column.
     *
     * @param double $v new value
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function setExecutionTime($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->execution_time !== $v) {
            $this->execution_time = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::EXECUTION_TIME;
        }


        return $this;
    } // setExecutionTime()

    /**
     * Sets the value of the [succeeded] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function setSucceeded($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->succeeded !== $v) {
            $this->succeeded = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::SUCCEEDED;
        }


        return $this;
    } // setSucceeded()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT;
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

            $this->id_dwh_import_run = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->execution_time = ($row[$startcol + 1] !== null) ? (double) $row[$startcol + 1] : null;
            $this->succeeded = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->created_at = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->updated_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Dwh_Persistence_PacDwhImportRun object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPacDwhProcessRuns = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::addInstanceToPool($this);
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

            if ($this->pacDwhProcessRunsScheduledForDeletion !== null) {
                if (!$this->pacDwhProcessRunsScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacDwhProcessRunsScheduledForDeletion as $pacDwhProcessRun) {
                        // need to save related object because we set the relation to null
                        $pacDwhProcessRun->save($con);
                    }
                    $this->pacDwhProcessRunsScheduledForDeletion = null;
                }
            }

            if ($this->collPacDwhProcessRuns !== null) {
                foreach ($this->collPacDwhProcessRuns as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN;
        if (null !== $this->id_dwh_import_run) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN)) {
            $modifiedColumns[':p' . $index++]  = '`id_dwh_import_run`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::EXECUTION_TIME)) {
            $modifiedColumns[':p' . $index++]  = '`execution_time`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::SUCCEEDED)) {
            $modifiedColumns[':p' . $index++]  = '`succeeded`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_dwh_import_run` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_dwh_import_run`':
                        $stmt->bindValue($identifier, $this->id_dwh_import_run, PDO::PARAM_INT);
                        break;
                    case '`execution_time`':
                        $stmt->bindValue($identifier, $this->execution_time, PDO::PARAM_STR);
                        break;
                    case '`succeeded`':
                        $stmt->bindValue($identifier, (int) $this->succeeded, PDO::PARAM_INT);
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
        $this->setIdDwhImportRun($pk);

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


            if (($retval = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacDwhProcessRuns !== null) {
                    foreach ($this->collPacDwhProcessRuns as $referrerFK) {
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
        $pos = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdDwhImportRun();
                break;
            case 1:
                return $this->getExecutionTime();
                break;
            case 2:
                return $this->getSucceeded();
                break;
            case 3:
                return $this->getCreatedAt();
                break;
            case 4:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Dwh_Persistence_PacDwhImportRun'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Dwh_Persistence_PacDwhImportRun'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdDwhImportRun(),
            $keys[1] => $this->getExecutionTime(),
            $keys[2] => $this->getSucceeded(),
            $keys[3] => $this->getCreatedAt(),
            $keys[4] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPacDwhProcessRuns) {
                $result['PacDwhProcessRuns'] = $this->collPacDwhProcessRuns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdDwhImportRun($value);
                break;
            case 1:
                $this->setExecutionTime($value);
                break;
            case 2:
                $this->setSucceeded($value);
                break;
            case 3:
                $this->setCreatedAt($value);
                break;
            case 4:
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
        $keys = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdDwhImportRun($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setExecutionTime($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSucceeded($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $this->id_dwh_import_run);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::EXECUTION_TIME)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::EXECUTION_TIME, $this->execution_time);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::SUCCEEDED)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::SUCCEEDED, $this->succeeded);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $this->id_dwh_import_run);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdDwhImportRun();
    }

    /**
     * Generic method to set the primary key (id_dwh_import_run column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdDwhImportRun($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdDwhImportRun();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Dwh_Persistence_PacDwhImportRun (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setExecutionTime($this->getExecutionTime());
        $copyObj->setSucceeded($this->getSucceeded());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacDwhProcessRuns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacDwhProcessRun($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdDwhImportRun(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun Clone of current object.
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer();
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
        if ('PacDwhProcessRun' == $relationName) {
            $this->initPacDwhProcessRuns();
        }
    }

    /**
     * Clears out the collPacDwhProcessRuns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     * @see        addPacDwhProcessRuns()
     */
    public function clearPacDwhProcessRuns()
    {
        $this->collPacDwhProcessRuns = null; // important to set this to null since that means it is uninitialized
        $this->collPacDwhProcessRunsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacDwhProcessRuns collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacDwhProcessRuns($v = true)
    {
        $this->collPacDwhProcessRunsPartial = $v;
    }

    /**
     * Initializes the collPacDwhProcessRuns collection.
     *
     * By default this just sets the collPacDwhProcessRuns collection to an empty array (like clearcollPacDwhProcessRuns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacDwhProcessRuns($overrideExisting = true)
    {
        if (null !== $this->collPacDwhProcessRuns && !$overrideExisting) {
            return;
        }
        $this->collPacDwhProcessRuns = new PropelObjectCollection();
        $this->collPacDwhProcessRuns->setModel('ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun');
    }

    /**
     * Gets an array of ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Dwh_Persistence_PacDwhImportRun is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun[] List of ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects
     * @throws PropelException
     */
    public function getPacDwhProcessRuns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhProcessRunsPartial && !$this->isNew();
        if (null === $this->collPacDwhProcessRuns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacDwhProcessRuns) {
                // return empty collection
                $this->initPacDwhProcessRuns();
            } else {
                $collPacDwhProcessRuns = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery::create(null, $criteria)
                    ->filterByPacDwhImportRun($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacDwhProcessRunsPartial && count($collPacDwhProcessRuns)) {
                      $this->initPacDwhProcessRuns(false);

                      foreach($collPacDwhProcessRuns as $obj) {
                        if (false == $this->collPacDwhProcessRuns->contains($obj)) {
                          $this->collPacDwhProcessRuns->append($obj);
                        }
                      }

                      $this->collPacDwhProcessRunsPartial = true;
                    }

                    $collPacDwhProcessRuns->getInternalIterator()->rewind();
                    return $collPacDwhProcessRuns;
                }

                if($partial && $this->collPacDwhProcessRuns) {
                    foreach($this->collPacDwhProcessRuns as $obj) {
                        if($obj->isNew()) {
                            $collPacDwhProcessRuns[] = $obj;
                        }
                    }
                }

                $this->collPacDwhProcessRuns = $collPacDwhProcessRuns;
                $this->collPacDwhProcessRunsPartial = false;
            }
        }

        return $this->collPacDwhProcessRuns;
    }

    /**
     * Sets a collection of PacDwhProcessRun objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacDwhProcessRuns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function setPacDwhProcessRuns(PropelCollection $pacDwhProcessRuns, PropelPDO $con = null)
    {
        $pacDwhProcessRunsToDelete = $this->getPacDwhProcessRuns(new Criteria(), $con)->diff($pacDwhProcessRuns);

        $this->pacDwhProcessRunsScheduledForDeletion = unserialize(serialize($pacDwhProcessRunsToDelete));

        foreach ($pacDwhProcessRunsToDelete as $pacDwhProcessRunRemoved) {
            $pacDwhProcessRunRemoved->setPacDwhImportRun(null);
        }

        $this->collPacDwhProcessRuns = null;
        foreach ($pacDwhProcessRuns as $pacDwhProcessRun) {
            $this->addPacDwhProcessRun($pacDwhProcessRun);
        }

        $this->collPacDwhProcessRuns = $pacDwhProcessRuns;
        $this->collPacDwhProcessRunsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects.
     * @throws PropelException
     */
    public function countPacDwhProcessRuns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhProcessRunsPartial && !$this->isNew();
        if (null === $this->collPacDwhProcessRuns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacDwhProcessRuns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacDwhProcessRuns());
            }
            $query = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacDwhImportRun($this)
                ->count($con);
        }

        return count($this->collPacDwhProcessRuns);
    }

    /**
     * Method called to associate a ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun object to this object
     * through the ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun foreign key attribute.
     *
     * @param    ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun $l ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function addPacDwhProcessRun(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun $l)
    {
        if ($this->collPacDwhProcessRuns === null) {
            $this->initPacDwhProcessRuns();
            $this->collPacDwhProcessRunsPartial = true;
        }
        if (!in_array($l, $this->collPacDwhProcessRuns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacDwhProcessRun($l);
        }

        return $this;
    }

    /**
     * @param	PacDwhProcessRun $pacDwhProcessRun The pacDwhProcessRun object to add.
     */
    protected function doAddPacDwhProcessRun($pacDwhProcessRun)
    {
        $this->collPacDwhProcessRuns[]= $pacDwhProcessRun;
        $pacDwhProcessRun->setPacDwhImportRun($this);
    }

    /**
     * @param	PacDwhProcessRun $pacDwhProcessRun The pacDwhProcessRun object to remove.
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function removePacDwhProcessRun($pacDwhProcessRun)
    {
        if ($this->getPacDwhProcessRuns()->contains($pacDwhProcessRun)) {
            $this->collPacDwhProcessRuns->remove($this->collPacDwhProcessRuns->search($pacDwhProcessRun));
            if (null === $this->pacDwhProcessRunsScheduledForDeletion) {
                $this->pacDwhProcessRunsScheduledForDeletion = clone $this->collPacDwhProcessRuns;
                $this->pacDwhProcessRunsScheduledForDeletion->clear();
            }
            $this->pacDwhProcessRunsScheduledForDeletion[]= $pacDwhProcessRun;
            $pacDwhProcessRun->setPacDwhImportRun(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_dwh_import_run = null;
        $this->execution_time = null;
        $this->succeeded = null;
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
            if ($this->collPacDwhProcessRuns) {
                foreach ($this->collPacDwhProcessRuns as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacDwhProcessRuns instanceof PropelCollection) {
            $this->collPacDwhProcessRuns->clearIterator();
        }
        $this->collPacDwhProcessRuns = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT;

        return $this;
    }

}
