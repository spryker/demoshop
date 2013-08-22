<?php


/**
 * Base class that represents a row from the 'pac_dwh_process_run' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhProcessRun extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_dwh_process_run field.
     * @var        int
     */
    protected $id_dwh_process_run;

    /**
     * The value for the process_name field.
     * @var        string
     */
    protected $process_name;

    /**
     * The value for the execution_time field.
     * @var        double
     */
    protected $execution_time;

    /**
     * The value for the fk_dwh_import_run field.
     * @var        int
     */
    protected $fk_dwh_import_run;

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
     * @var        PacDwhImportRun
     */
    protected $aPacDwhImportRun;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhJobRun[] Collection to store aggregation of ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects.
     */
    protected $collPacDwhJobRuns;
    protected $collPacDwhJobRunsPartial;

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
    protected $pacDwhJobRunsScheduledForDeletion = null;

    /**
     * Get the [id_dwh_process_run] column value.
     *
     * @return int
     */
    public function getIdDwhProcessRun()
    {
        return $this->id_dwh_process_run;
    }

    /**
     * Get the [process_name] column value.
     *
     * @return string
     */
    public function getProcessName()
    {
        return $this->process_name;
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
     * Get the [fk_dwh_import_run] column value.
     *
     * @return int
     */
    public function getFkDwhImportRun()
    {
        return $this->fk_dwh_import_run;
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
     * Set the value of [id_dwh_process_run] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function setIdDwhProcessRun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_dwh_process_run !== $v) {
            $this->id_dwh_process_run = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN;
        }


        return $this;
    } // setIdDwhProcessRun()

    /**
     * Set the value of [process_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function setProcessName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->process_name !== $v) {
            $this->process_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::PROCESS_NAME;
        }


        return $this;
    } // setProcessName()

    /**
     * Set the value of [execution_time] column.
     *
     * @param double $v new value
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function setExecutionTime($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->execution_time !== $v) {
            $this->execution_time = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::EXECUTION_TIME;
        }


        return $this;
    } // setExecutionTime()

    /**
     * Set the value of [fk_dwh_import_run] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function setFkDwhImportRun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_dwh_import_run !== $v) {
            $this->fk_dwh_import_run = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN;
        }

        if ($this->aPacDwhImportRun !== null && $this->aPacDwhImportRun->getIdDwhImportRun() !== $v) {
            $this->aPacDwhImportRun = null;
        }


        return $this;
    } // setFkDwhImportRun()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT;
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

            $this->id_dwh_process_run = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->process_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->execution_time = ($row[$startcol + 2] !== null) ? (double) $row[$startcol + 2] : null;
            $this->fk_dwh_import_run = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->created_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->updated_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun object", $e);
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

        if ($this->aPacDwhImportRun !== null && $this->fk_dwh_import_run !== $this->aPacDwhImportRun->getIdDwhImportRun()) {
            $this->aPacDwhImportRun = null;
        }
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
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacDwhImportRun = null;
            $this->collPacDwhJobRuns = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPacDwhImportRun !== null) {
                if ($this->aPacDwhImportRun->isModified() || $this->aPacDwhImportRun->isNew()) {
                    $affectedRows += $this->aPacDwhImportRun->save($con);
                }
                $this->setPacDwhImportRun($this->aPacDwhImportRun);
            }

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

            if ($this->pacDwhJobRunsScheduledForDeletion !== null) {
                if (!$this->pacDwhJobRunsScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacDwhJobRunsScheduledForDeletion as $pacDwhJobRun) {
                        // need to save related object because we set the relation to null
                        $pacDwhJobRun->save($con);
                    }
                    $this->pacDwhJobRunsScheduledForDeletion = null;
                }
            }

            if ($this->collPacDwhJobRuns !== null) {
                foreach ($this->collPacDwhJobRuns as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN;
        if (null !== $this->id_dwh_process_run) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN)) {
            $modifiedColumns[':p' . $index++]  = '`id_dwh_process_run`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::PROCESS_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`process_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::EXECUTION_TIME)) {
            $modifiedColumns[':p' . $index++]  = '`execution_time`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN)) {
            $modifiedColumns[':p' . $index++]  = '`fk_dwh_import_run`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_dwh_process_run` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_dwh_process_run`':
                        $stmt->bindValue($identifier, $this->id_dwh_process_run, PDO::PARAM_INT);
                        break;
                    case '`process_name`':
                        $stmt->bindValue($identifier, $this->process_name, PDO::PARAM_STR);
                        break;
                    case '`execution_time`':
                        $stmt->bindValue($identifier, $this->execution_time, PDO::PARAM_STR);
                        break;
                    case '`fk_dwh_import_run`':
                        $stmt->bindValue($identifier, $this->fk_dwh_import_run, PDO::PARAM_INT);
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
        $this->setIdDwhProcessRun($pk);

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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPacDwhImportRun !== null) {
                if (!$this->aPacDwhImportRun->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacDwhImportRun->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacDwhJobRuns !== null) {
                    foreach ($this->collPacDwhJobRuns as $referrerFK) {
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
        $pos = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdDwhProcessRun();
                break;
            case 1:
                return $this->getProcessName();
                break;
            case 2:
                return $this->getExecutionTime();
                break;
            case 3:
                return $this->getFkDwhImportRun();
                break;
            case 4:
                return $this->getCreatedAt();
                break;
            case 5:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdDwhProcessRun(),
            $keys[1] => $this->getProcessName(),
            $keys[2] => $this->getExecutionTime(),
            $keys[3] => $this->getFkDwhImportRun(),
            $keys[4] => $this->getCreatedAt(),
            $keys[5] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPacDwhImportRun) {
                $result['PacDwhImportRun'] = $this->aPacDwhImportRun->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacDwhJobRuns) {
                $result['PacDwhJobRuns'] = $this->collPacDwhJobRuns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdDwhProcessRun($value);
                break;
            case 1:
                $this->setProcessName($value);
                break;
            case 2:
                $this->setExecutionTime($value);
                break;
            case 3:
                $this->setFkDwhImportRun($value);
                break;
            case 4:
                $this->setCreatedAt($value);
                break;
            case 5:
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
        $keys = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdDwhProcessRun($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setProcessName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setExecutionTime($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkDwhImportRun($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $this->id_dwh_process_run);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::PROCESS_NAME)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::PROCESS_NAME, $this->process_name);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::EXECUTION_TIME)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::EXECUTION_TIME, $this->execution_time);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN, $this->fk_dwh_import_run);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $this->id_dwh_process_run);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdDwhProcessRun();
    }

    /**
     * Generic method to set the primary key (id_dwh_process_run column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdDwhProcessRun($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdDwhProcessRun();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setProcessName($this->getProcessName());
        $copyObj->setExecutionTime($this->getExecutionTime());
        $copyObj->setFkDwhImportRun($this->getFkDwhImportRun());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacDwhJobRuns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacDwhJobRun($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdDwhProcessRun(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun Clone of current object.
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Dwh_Persistence_PacDwhImportRun object.
     *
     * @param             ProjectA_Zed_Dwh_Persistence_PacDwhImportRun $v
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacDwhImportRun(ProjectA_Zed_Dwh_Persistence_PacDwhImportRun $v = null)
    {
        if ($v === null) {
            $this->setFkDwhImportRun(NULL);
        } else {
            $this->setFkDwhImportRun($v->getIdDwhImportRun());
        }

        $this->aPacDwhImportRun = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Dwh_Persistence_PacDwhImportRun object, it will not be re-added.
        if ($v !== null) {
            $v->addPacDwhProcessRun($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Dwh_Persistence_PacDwhImportRun object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun The associated ProjectA_Zed_Dwh_Persistence_PacDwhImportRun object.
     * @throws PropelException
     */
    public function getPacDwhImportRun(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacDwhImportRun === null && ($this->fk_dwh_import_run !== null) && $doQuery) {
            $this->aPacDwhImportRun = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery::create()->findPk($this->fk_dwh_import_run, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacDwhImportRun->addPacDwhProcessRuns($this);
             */
        }

        return $this->aPacDwhImportRun;
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
        if ('PacDwhJobRun' == $relationName) {
            $this->initPacDwhJobRuns();
        }
    }

    /**
     * Clears out the collPacDwhJobRuns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     * @see        addPacDwhJobRuns()
     */
    public function clearPacDwhJobRuns()
    {
        $this->collPacDwhJobRuns = null; // important to set this to null since that means it is uninitialized
        $this->collPacDwhJobRunsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacDwhJobRuns collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacDwhJobRuns($v = true)
    {
        $this->collPacDwhJobRunsPartial = $v;
    }

    /**
     * Initializes the collPacDwhJobRuns collection.
     *
     * By default this just sets the collPacDwhJobRuns collection to an empty array (like clearcollPacDwhJobRuns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacDwhJobRuns($overrideExisting = true)
    {
        if (null !== $this->collPacDwhJobRuns && !$overrideExisting) {
            return;
        }
        $this->collPacDwhJobRuns = new PropelObjectCollection();
        $this->collPacDwhJobRuns->setModel('ProjectA_Zed_Dwh_Persistence_PacDwhJobRun');
    }

    /**
     * Gets an array of ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhJobRun[] List of ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects
     * @throws PropelException
     */
    public function getPacDwhJobRuns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhJobRunsPartial && !$this->isNew();
        if (null === $this->collPacDwhJobRuns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacDwhJobRuns) {
                // return empty collection
                $this->initPacDwhJobRuns();
            } else {
                $collPacDwhJobRuns = ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery::create(null, $criteria)
                    ->filterByPacDwhProcessRun($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacDwhJobRunsPartial && count($collPacDwhJobRuns)) {
                      $this->initPacDwhJobRuns(false);

                      foreach($collPacDwhJobRuns as $obj) {
                        if (false == $this->collPacDwhJobRuns->contains($obj)) {
                          $this->collPacDwhJobRuns->append($obj);
                        }
                      }

                      $this->collPacDwhJobRunsPartial = true;
                    }

                    $collPacDwhJobRuns->getInternalIterator()->rewind();
                    return $collPacDwhJobRuns;
                }

                if($partial && $this->collPacDwhJobRuns) {
                    foreach($this->collPacDwhJobRuns as $obj) {
                        if($obj->isNew()) {
                            $collPacDwhJobRuns[] = $obj;
                        }
                    }
                }

                $this->collPacDwhJobRuns = $collPacDwhJobRuns;
                $this->collPacDwhJobRunsPartial = false;
            }
        }

        return $this->collPacDwhJobRuns;
    }

    /**
     * Sets a collection of PacDwhJobRun objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacDwhJobRuns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function setPacDwhJobRuns(PropelCollection $pacDwhJobRuns, PropelPDO $con = null)
    {
        $pacDwhJobRunsToDelete = $this->getPacDwhJobRuns(new Criteria(), $con)->diff($pacDwhJobRuns);

        $this->pacDwhJobRunsScheduledForDeletion = unserialize(serialize($pacDwhJobRunsToDelete));

        foreach ($pacDwhJobRunsToDelete as $pacDwhJobRunRemoved) {
            $pacDwhJobRunRemoved->setPacDwhProcessRun(null);
        }

        $this->collPacDwhJobRuns = null;
        foreach ($pacDwhJobRuns as $pacDwhJobRun) {
            $this->addPacDwhJobRun($pacDwhJobRun);
        }

        $this->collPacDwhJobRuns = $pacDwhJobRuns;
        $this->collPacDwhJobRunsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects.
     * @throws PropelException
     */
    public function countPacDwhJobRuns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhJobRunsPartial && !$this->isNew();
        if (null === $this->collPacDwhJobRuns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacDwhJobRuns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacDwhJobRuns());
            }
            $query = ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacDwhProcessRun($this)
                ->count($con);
        }

        return count($this->collPacDwhJobRuns);
    }

    /**
     * Method called to associate a ProjectA_Zed_Dwh_Persistence_PacDwhJobRun object to this object
     * through the ProjectA_Zed_Dwh_Persistence_PacDwhJobRun foreign key attribute.
     *
     * @param    ProjectA_Zed_Dwh_Persistence_PacDwhJobRun $l ProjectA_Zed_Dwh_Persistence_PacDwhJobRun
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function addPacDwhJobRun(ProjectA_Zed_Dwh_Persistence_PacDwhJobRun $l)
    {
        if ($this->collPacDwhJobRuns === null) {
            $this->initPacDwhJobRuns();
            $this->collPacDwhJobRunsPartial = true;
        }
        if (!in_array($l, $this->collPacDwhJobRuns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacDwhJobRun($l);
        }

        return $this;
    }

    /**
     * @param	PacDwhJobRun $pacDwhJobRun The pacDwhJobRun object to add.
     */
    protected function doAddPacDwhJobRun($pacDwhJobRun)
    {
        $this->collPacDwhJobRuns[]= $pacDwhJobRun;
        $pacDwhJobRun->setPacDwhProcessRun($this);
    }

    /**
     * @param	PacDwhJobRun $pacDwhJobRun The pacDwhJobRun object to remove.
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function removePacDwhJobRun($pacDwhJobRun)
    {
        if ($this->getPacDwhJobRuns()->contains($pacDwhJobRun)) {
            $this->collPacDwhJobRuns->remove($this->collPacDwhJobRuns->search($pacDwhJobRun));
            if (null === $this->pacDwhJobRunsScheduledForDeletion) {
                $this->pacDwhJobRunsScheduledForDeletion = clone $this->collPacDwhJobRuns;
                $this->pacDwhJobRunsScheduledForDeletion->clear();
            }
            $this->pacDwhJobRunsScheduledForDeletion[]= $pacDwhJobRun;
            $pacDwhJobRun->setPacDwhProcessRun(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_dwh_process_run = null;
        $this->process_name = null;
        $this->execution_time = null;
        $this->fk_dwh_import_run = null;
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
            if ($this->collPacDwhJobRuns) {
                foreach ($this->collPacDwhJobRuns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPacDwhImportRun instanceof Persistent) {
              $this->aPacDwhImportRun->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacDwhJobRuns instanceof PropelCollection) {
            $this->collPacDwhJobRuns->clearIterator();
        }
        $this->collPacDwhJobRuns = null;
        $this->aPacDwhImportRun = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT;

        return $this;
    }

}
