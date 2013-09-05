<?php


/**
 * Base class that represents a row from the 'pac_tracking_instance' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingInstance extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_tracking_instance field.
     * @var        int
     */
    protected $id_tracking_instance;

    /**
     * The value for the fk_tracking_library_code field.
     * @var        int
     */
    protected $fk_tracking_library_code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the is_active field.
     * @var        boolean
     */
    protected $is_active;

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
     * @var        PacTrackingLibraryCode
     */
    protected $aTrackingLibraryCode;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmRelation[] Collection to store aggregation of ProjectA_Zed_Mcm_Persistence_PacMcmRelation objects.
     */
    protected $collPacMcmRelations;
    protected $collPacMcmRelationsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision[] Collection to store aggregation of ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects.
     */
    protected $collTrackingInstanceRevisions;
    protected $collTrackingInstanceRevisionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity[] Collection to store aggregation of ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects.
     */
    protected $collTrackingPageExclusivities;
    protected $collTrackingPageExclusivitiesPartial;

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
    protected $pacMcmRelationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $trackingInstanceRevisionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $trackingPageExclusivitiesScheduledForDeletion = null;

    /**
     * Get the [id_tracking_instance] column value.
     *
     * @return int
     */
    public function getIdTrackingInstance()
    {
        return $this->id_tracking_instance;
    }

    /**
     * Get the [fk_tracking_library_code] column value.
     *
     * @return int
     */
    public function getFkTrackingLibraryCode()
    {
        return $this->fk_tracking_library_code;
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
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
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
     * Set the value of [id_tracking_instance] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setIdTrackingInstance($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_tracking_instance !== $v) {
            $this->id_tracking_instance = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE;
        }


        return $this;
    } // setIdTrackingInstance()

    /**
     * Set the value of [fk_tracking_library_code] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setFkTrackingLibraryCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_tracking_library_code !== $v) {
            $this->fk_tracking_library_code = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE;
        }

        if ($this->aTrackingLibraryCode !== null && $this->aTrackingLibraryCode->getIdTrackingLibraryCode() !== $v) {
            $this->aTrackingLibraryCode = null;
        }


        return $this;
    } // setFkTrackingLibraryCode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT;
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

            $this->id_tracking_instance = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_tracking_library_code = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->is_active = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->created_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->updated_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Tracking_Persistence_PacTrackingInstance object", $e);
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

        if ($this->aTrackingLibraryCode !== null && $this->fk_tracking_library_code !== $this->aTrackingLibraryCode->getIdTrackingLibraryCode()) {
            $this->aTrackingLibraryCode = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTrackingLibraryCode = null;
            $this->collPacMcmRelations = null;

            $this->collTrackingInstanceRevisions = null;

            $this->collTrackingPageExclusivities = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT)) {
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

                ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::addInstanceToPool($this);
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

            if ($this->aTrackingLibraryCode !== null) {
                if ($this->aTrackingLibraryCode->isModified() || $this->aTrackingLibraryCode->isNew()) {
                    $affectedRows += $this->aTrackingLibraryCode->save($con);
                }
                $this->setTrackingLibraryCode($this->aTrackingLibraryCode);
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

            if ($this->pacMcmRelationsScheduledForDeletion !== null) {
                if (!$this->pacMcmRelationsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Mcm_Persistence_PacMcmRelationQuery::create()
                        ->filterByPrimaryKeys($this->pacMcmRelationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacMcmRelationsScheduledForDeletion = null;
                }
            }

            if ($this->collPacMcmRelations !== null) {
                foreach ($this->collPacMcmRelations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trackingInstanceRevisionsScheduledForDeletion !== null) {
                if (!$this->trackingInstanceRevisionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery::create()
                        ->filterByPrimaryKeys($this->trackingInstanceRevisionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trackingInstanceRevisionsScheduledForDeletion = null;
                }
            }

            if ($this->collTrackingInstanceRevisions !== null) {
                foreach ($this->collTrackingInstanceRevisions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trackingPageExclusivitiesScheduledForDeletion !== null) {
                if (!$this->trackingPageExclusivitiesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery::create()
                        ->filterByPrimaryKeys($this->trackingPageExclusivitiesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trackingPageExclusivitiesScheduledForDeletion = null;
                }
            }

            if ($this->collTrackingPageExclusivities !== null) {
                foreach ($this->collTrackingPageExclusivities as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE;
        if (null !== $this->id_tracking_instance) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE)) {
            $modifiedColumns[':p' . $index++]  = '`id_tracking_instance`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_tracking_library_code`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_tracking_instance` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_tracking_instance`':
                        $stmt->bindValue($identifier, $this->id_tracking_instance, PDO::PARAM_INT);
                        break;
                    case '`fk_tracking_library_code`':
                        $stmt->bindValue($identifier, $this->fk_tracking_library_code, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
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
        $this->setIdTrackingInstance($pk);

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

            if ($this->aTrackingLibraryCode !== null) {
                if (!$this->aTrackingLibraryCode->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTrackingLibraryCode->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacMcmRelations !== null) {
                    foreach ($this->collPacMcmRelations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTrackingInstanceRevisions !== null) {
                    foreach ($this->collTrackingInstanceRevisions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTrackingPageExclusivities !== null) {
                    foreach ($this->collTrackingPageExclusivities as $referrerFK) {
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
        $pos = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdTrackingInstance();
                break;
            case 1:
                return $this->getFkTrackingLibraryCode();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getIsActive();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Tracking_Persistence_PacTrackingInstance'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Tracking_Persistence_PacTrackingInstance'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdTrackingInstance(),
            $keys[1] => $this->getFkTrackingLibraryCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getIsActive(),
            $keys[4] => $this->getCreatedAt(),
            $keys[5] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aTrackingLibraryCode) {
                $result['TrackingLibraryCode'] = $this->aTrackingLibraryCode->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacMcmRelations) {
                $result['PacMcmRelations'] = $this->collPacMcmRelations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrackingInstanceRevisions) {
                $result['TrackingInstanceRevisions'] = $this->collTrackingInstanceRevisions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrackingPageExclusivities) {
                $result['TrackingPageExclusivities'] = $this->collTrackingPageExclusivities->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdTrackingInstance($value);
                break;
            case 1:
                $this->setFkTrackingLibraryCode($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setIsActive($value);
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
        $keys = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdTrackingInstance($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkTrackingLibraryCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsActive($arr[$keys[3]]);
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
        $criteria = new Criteria(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $this->id_tracking_instance);
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE, $this->fk_tracking_library_code);
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::NAME)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::IS_ACTIVE)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $this->id_tracking_instance);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdTrackingInstance();
    }

    /**
     * Generic method to set the primary key (id_tracking_instance column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdTrackingInstance($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdTrackingInstance();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Tracking_Persistence_PacTrackingInstance (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkTrackingLibraryCode($this->getFkTrackingLibraryCode());
        $copyObj->setName($this->getName());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacMcmRelations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacMcmRelation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrackingInstanceRevisions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrackingInstanceRevision($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrackingPageExclusivities() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrackingPageExclusivity($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdTrackingInstance(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance Clone of current object.
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode object.
     *
     * @param             ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode $v
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTrackingLibraryCode(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode $v = null)
    {
        if ($v === null) {
            $this->setFkTrackingLibraryCode(NULL);
        } else {
            $this->setFkTrackingLibraryCode($v->getIdTrackingLibraryCode());
        }

        $this->aTrackingLibraryCode = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode object, it will not be re-added.
        if ($v !== null) {
            $v->addTrackingInstance($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode The associated ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode object.
     * @throws PropelException
     */
    public function getTrackingLibraryCode(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTrackingLibraryCode === null && ($this->fk_tracking_library_code !== null) && $doQuery) {
            $this->aTrackingLibraryCode = ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery::create()->findPk($this->fk_tracking_library_code, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTrackingLibraryCode->addTrackingInstances($this);
             */
        }

        return $this->aTrackingLibraryCode;
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
        if ('PacMcmRelation' == $relationName) {
            $this->initPacMcmRelations();
        }
        if ('TrackingInstanceRevision' == $relationName) {
            $this->initTrackingInstanceRevisions();
        }
        if ('TrackingPageExclusivity' == $relationName) {
            $this->initTrackingPageExclusivities();
        }
    }

    /**
     * Clears out the collPacMcmRelations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     * @see        addPacMcmRelations()
     */
    public function clearPacMcmRelations()
    {
        $this->collPacMcmRelations = null; // important to set this to null since that means it is uninitialized
        $this->collPacMcmRelationsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacMcmRelations collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacMcmRelations($v = true)
    {
        $this->collPacMcmRelationsPartial = $v;
    }

    /**
     * Initializes the collPacMcmRelations collection.
     *
     * By default this just sets the collPacMcmRelations collection to an empty array (like clearcollPacMcmRelations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacMcmRelations($overrideExisting = true)
    {
        if (null !== $this->collPacMcmRelations && !$overrideExisting) {
            return;
        }
        $this->collPacMcmRelations = new PropelObjectCollection();
        $this->collPacMcmRelations->setModel('ProjectA_Zed_Mcm_Persistence_PacMcmRelation');
    }

    /**
     * Gets an array of ProjectA_Zed_Mcm_Persistence_PacMcmRelation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Tracking_Persistence_PacTrackingInstance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmRelation[] List of ProjectA_Zed_Mcm_Persistence_PacMcmRelation objects
     * @throws PropelException
     */
    public function getPacMcmRelations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacMcmRelationsPartial && !$this->isNew();
        if (null === $this->collPacMcmRelations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacMcmRelations) {
                // return empty collection
                $this->initPacMcmRelations();
            } else {
                $collPacMcmRelations = ProjectA_Zed_Mcm_Persistence_PacMcmRelationQuery::create(null, $criteria)
                    ->filterByTrackingInstance($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacMcmRelationsPartial && count($collPacMcmRelations)) {
                      $this->initPacMcmRelations(false);

                      foreach($collPacMcmRelations as $obj) {
                        if (false == $this->collPacMcmRelations->contains($obj)) {
                          $this->collPacMcmRelations->append($obj);
                        }
                      }

                      $this->collPacMcmRelationsPartial = true;
                    }

                    $collPacMcmRelations->getInternalIterator()->rewind();
                    return $collPacMcmRelations;
                }

                if($partial && $this->collPacMcmRelations) {
                    foreach($this->collPacMcmRelations as $obj) {
                        if($obj->isNew()) {
                            $collPacMcmRelations[] = $obj;
                        }
                    }
                }

                $this->collPacMcmRelations = $collPacMcmRelations;
                $this->collPacMcmRelationsPartial = false;
            }
        }

        return $this->collPacMcmRelations;
    }

    /**
     * Sets a collection of PacMcmRelation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacMcmRelations A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setPacMcmRelations(PropelCollection $pacMcmRelations, PropelPDO $con = null)
    {
        $pacMcmRelationsToDelete = $this->getPacMcmRelations(new Criteria(), $con)->diff($pacMcmRelations);

        $this->pacMcmRelationsScheduledForDeletion = unserialize(serialize($pacMcmRelationsToDelete));

        foreach ($pacMcmRelationsToDelete as $pacMcmRelationRemoved) {
            $pacMcmRelationRemoved->setTrackingInstance(null);
        }

        $this->collPacMcmRelations = null;
        foreach ($pacMcmRelations as $pacMcmRelation) {
            $this->addPacMcmRelation($pacMcmRelation);
        }

        $this->collPacMcmRelations = $pacMcmRelations;
        $this->collPacMcmRelationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Mcm_Persistence_PacMcmRelation objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Mcm_Persistence_PacMcmRelation objects.
     * @throws PropelException
     */
    public function countPacMcmRelations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacMcmRelationsPartial && !$this->isNew();
        if (null === $this->collPacMcmRelations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacMcmRelations) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacMcmRelations());
            }
            $query = ProjectA_Zed_Mcm_Persistence_PacMcmRelationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTrackingInstance($this)
                ->count($con);
        }

        return count($this->collPacMcmRelations);
    }

    /**
     * Method called to associate a ProjectA_Zed_Mcm_Persistence_PacMcmRelation object to this object
     * through the ProjectA_Zed_Mcm_Persistence_PacMcmRelation foreign key attribute.
     *
     * @param    ProjectA_Zed_Mcm_Persistence_PacMcmRelation $l ProjectA_Zed_Mcm_Persistence_PacMcmRelation
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function addPacMcmRelation(ProjectA_Zed_Mcm_Persistence_PacMcmRelation $l)
    {
        if ($this->collPacMcmRelations === null) {
            $this->initPacMcmRelations();
            $this->collPacMcmRelationsPartial = true;
        }
        if (!in_array($l, $this->collPacMcmRelations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacMcmRelation($l);
        }

        return $this;
    }

    /**
     * @param	PacMcmRelation $pacMcmRelation The pacMcmRelation object to add.
     */
    protected function doAddPacMcmRelation($pacMcmRelation)
    {
        $this->collPacMcmRelations[]= $pacMcmRelation;
        $pacMcmRelation->setTrackingInstance($this);
    }

    /**
     * @param	PacMcmRelation $pacMcmRelation The pacMcmRelation object to remove.
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function removePacMcmRelation($pacMcmRelation)
    {
        if ($this->getPacMcmRelations()->contains($pacMcmRelation)) {
            $this->collPacMcmRelations->remove($this->collPacMcmRelations->search($pacMcmRelation));
            if (null === $this->pacMcmRelationsScheduledForDeletion) {
                $this->pacMcmRelationsScheduledForDeletion = clone $this->collPacMcmRelations;
                $this->pacMcmRelationsScheduledForDeletion->clear();
            }
            $this->pacMcmRelationsScheduledForDeletion[]= clone $pacMcmRelation;
            $pacMcmRelation->setTrackingInstance(null);
        }

        return $this;
    }

    /**
     * Clears out the collTrackingInstanceRevisions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     * @see        addTrackingInstanceRevisions()
     */
    public function clearTrackingInstanceRevisions()
    {
        $this->collTrackingInstanceRevisions = null; // important to set this to null since that means it is uninitialized
        $this->collTrackingInstanceRevisionsPartial = null;

        return $this;
    }

    /**
     * reset is the collTrackingInstanceRevisions collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrackingInstanceRevisions($v = true)
    {
        $this->collTrackingInstanceRevisionsPartial = $v;
    }

    /**
     * Initializes the collTrackingInstanceRevisions collection.
     *
     * By default this just sets the collTrackingInstanceRevisions collection to an empty array (like clearcollTrackingInstanceRevisions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrackingInstanceRevisions($overrideExisting = true)
    {
        if (null !== $this->collTrackingInstanceRevisions && !$overrideExisting) {
            return;
        }
        $this->collTrackingInstanceRevisions = new PropelObjectCollection();
        $this->collTrackingInstanceRevisions->setModel('ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision');
    }

    /**
     * Gets an array of ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Tracking_Persistence_PacTrackingInstance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision[] List of ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects
     * @throws PropelException
     */
    public function getTrackingInstanceRevisions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrackingInstanceRevisionsPartial && !$this->isNew();
        if (null === $this->collTrackingInstanceRevisions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrackingInstanceRevisions) {
                // return empty collection
                $this->initTrackingInstanceRevisions();
            } else {
                $collTrackingInstanceRevisions = ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery::create(null, $criteria)
                    ->filterByTrackingInstance($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrackingInstanceRevisionsPartial && count($collTrackingInstanceRevisions)) {
                      $this->initTrackingInstanceRevisions(false);

                      foreach($collTrackingInstanceRevisions as $obj) {
                        if (false == $this->collTrackingInstanceRevisions->contains($obj)) {
                          $this->collTrackingInstanceRevisions->append($obj);
                        }
                      }

                      $this->collTrackingInstanceRevisionsPartial = true;
                    }

                    $collTrackingInstanceRevisions->getInternalIterator()->rewind();
                    return $collTrackingInstanceRevisions;
                }

                if($partial && $this->collTrackingInstanceRevisions) {
                    foreach($this->collTrackingInstanceRevisions as $obj) {
                        if($obj->isNew()) {
                            $collTrackingInstanceRevisions[] = $obj;
                        }
                    }
                }

                $this->collTrackingInstanceRevisions = $collTrackingInstanceRevisions;
                $this->collTrackingInstanceRevisionsPartial = false;
            }
        }

        return $this->collTrackingInstanceRevisions;
    }

    /**
     * Sets a collection of TrackingInstanceRevision objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trackingInstanceRevisions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setTrackingInstanceRevisions(PropelCollection $trackingInstanceRevisions, PropelPDO $con = null)
    {
        $trackingInstanceRevisionsToDelete = $this->getTrackingInstanceRevisions(new Criteria(), $con)->diff($trackingInstanceRevisions);

        $this->trackingInstanceRevisionsScheduledForDeletion = unserialize(serialize($trackingInstanceRevisionsToDelete));

        foreach ($trackingInstanceRevisionsToDelete as $trackingInstanceRevisionRemoved) {
            $trackingInstanceRevisionRemoved->setTrackingInstance(null);
        }

        $this->collTrackingInstanceRevisions = null;
        foreach ($trackingInstanceRevisions as $trackingInstanceRevision) {
            $this->addTrackingInstanceRevision($trackingInstanceRevision);
        }

        $this->collTrackingInstanceRevisions = $trackingInstanceRevisions;
        $this->collTrackingInstanceRevisionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects.
     * @throws PropelException
     */
    public function countTrackingInstanceRevisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrackingInstanceRevisionsPartial && !$this->isNew();
        if (null === $this->collTrackingInstanceRevisions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrackingInstanceRevisions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrackingInstanceRevisions());
            }
            $query = ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTrackingInstance($this)
                ->count($con);
        }

        return count($this->collTrackingInstanceRevisions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision object to this object
     * through the ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision foreign key attribute.
     *
     * @param    ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision $l ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function addTrackingInstanceRevision(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision $l)
    {
        if ($this->collTrackingInstanceRevisions === null) {
            $this->initTrackingInstanceRevisions();
            $this->collTrackingInstanceRevisionsPartial = true;
        }
        if (!in_array($l, $this->collTrackingInstanceRevisions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTrackingInstanceRevision($l);
        }

        return $this;
    }

    /**
     * @param	TrackingInstanceRevision $trackingInstanceRevision The trackingInstanceRevision object to add.
     */
    protected function doAddTrackingInstanceRevision($trackingInstanceRevision)
    {
        $this->collTrackingInstanceRevisions[]= $trackingInstanceRevision;
        $trackingInstanceRevision->setTrackingInstance($this);
    }

    /**
     * @param	TrackingInstanceRevision $trackingInstanceRevision The trackingInstanceRevision object to remove.
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function removeTrackingInstanceRevision($trackingInstanceRevision)
    {
        if ($this->getTrackingInstanceRevisions()->contains($trackingInstanceRevision)) {
            $this->collTrackingInstanceRevisions->remove($this->collTrackingInstanceRevisions->search($trackingInstanceRevision));
            if (null === $this->trackingInstanceRevisionsScheduledForDeletion) {
                $this->trackingInstanceRevisionsScheduledForDeletion = clone $this->collTrackingInstanceRevisions;
                $this->trackingInstanceRevisionsScheduledForDeletion->clear();
            }
            $this->trackingInstanceRevisionsScheduledForDeletion[]= clone $trackingInstanceRevision;
            $trackingInstanceRevision->setTrackingInstance(null);
        }

        return $this;
    }

    /**
     * Clears out the collTrackingPageExclusivities collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     * @see        addTrackingPageExclusivities()
     */
    public function clearTrackingPageExclusivities()
    {
        $this->collTrackingPageExclusivities = null; // important to set this to null since that means it is uninitialized
        $this->collTrackingPageExclusivitiesPartial = null;

        return $this;
    }

    /**
     * reset is the collTrackingPageExclusivities collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrackingPageExclusivities($v = true)
    {
        $this->collTrackingPageExclusivitiesPartial = $v;
    }

    /**
     * Initializes the collTrackingPageExclusivities collection.
     *
     * By default this just sets the collTrackingPageExclusivities collection to an empty array (like clearcollTrackingPageExclusivities());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrackingPageExclusivities($overrideExisting = true)
    {
        if (null !== $this->collTrackingPageExclusivities && !$overrideExisting) {
            return;
        }
        $this->collTrackingPageExclusivities = new PropelObjectCollection();
        $this->collTrackingPageExclusivities->setModel('ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity');
    }

    /**
     * Gets an array of ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Tracking_Persistence_PacTrackingInstance is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity[] List of ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects
     * @throws PropelException
     */
    public function getTrackingPageExclusivities($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrackingPageExclusivitiesPartial && !$this->isNew();
        if (null === $this->collTrackingPageExclusivities || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrackingPageExclusivities) {
                // return empty collection
                $this->initTrackingPageExclusivities();
            } else {
                $collTrackingPageExclusivities = ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery::create(null, $criteria)
                    ->filterByTrackingInstance($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrackingPageExclusivitiesPartial && count($collTrackingPageExclusivities)) {
                      $this->initTrackingPageExclusivities(false);

                      foreach($collTrackingPageExclusivities as $obj) {
                        if (false == $this->collTrackingPageExclusivities->contains($obj)) {
                          $this->collTrackingPageExclusivities->append($obj);
                        }
                      }

                      $this->collTrackingPageExclusivitiesPartial = true;
                    }

                    $collTrackingPageExclusivities->getInternalIterator()->rewind();
                    return $collTrackingPageExclusivities;
                }

                if($partial && $this->collTrackingPageExclusivities) {
                    foreach($this->collTrackingPageExclusivities as $obj) {
                        if($obj->isNew()) {
                            $collTrackingPageExclusivities[] = $obj;
                        }
                    }
                }

                $this->collTrackingPageExclusivities = $collTrackingPageExclusivities;
                $this->collTrackingPageExclusivitiesPartial = false;
            }
        }

        return $this->collTrackingPageExclusivities;
    }

    /**
     * Sets a collection of TrackingPageExclusivity objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trackingPageExclusivities A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function setTrackingPageExclusivities(PropelCollection $trackingPageExclusivities, PropelPDO $con = null)
    {
        $trackingPageExclusivitiesToDelete = $this->getTrackingPageExclusivities(new Criteria(), $con)->diff($trackingPageExclusivities);

        $this->trackingPageExclusivitiesScheduledForDeletion = unserialize(serialize($trackingPageExclusivitiesToDelete));

        foreach ($trackingPageExclusivitiesToDelete as $trackingPageExclusivityRemoved) {
            $trackingPageExclusivityRemoved->setTrackingInstance(null);
        }

        $this->collTrackingPageExclusivities = null;
        foreach ($trackingPageExclusivities as $trackingPageExclusivity) {
            $this->addTrackingPageExclusivity($trackingPageExclusivity);
        }

        $this->collTrackingPageExclusivities = $trackingPageExclusivities;
        $this->collTrackingPageExclusivitiesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects.
     * @throws PropelException
     */
    public function countTrackingPageExclusivities(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrackingPageExclusivitiesPartial && !$this->isNew();
        if (null === $this->collTrackingPageExclusivities || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrackingPageExclusivities) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrackingPageExclusivities());
            }
            $query = ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTrackingInstance($this)
                ->count($con);
        }

        return count($this->collTrackingPageExclusivities);
    }

    /**
     * Method called to associate a ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity object to this object
     * through the ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity foreign key attribute.
     *
     * @param    ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity $l ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function addTrackingPageExclusivity(ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity $l)
    {
        if ($this->collTrackingPageExclusivities === null) {
            $this->initTrackingPageExclusivities();
            $this->collTrackingPageExclusivitiesPartial = true;
        }
        if (!in_array($l, $this->collTrackingPageExclusivities->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTrackingPageExclusivity($l);
        }

        return $this;
    }

    /**
     * @param	TrackingPageExclusivity $trackingPageExclusivity The trackingPageExclusivity object to add.
     */
    protected function doAddTrackingPageExclusivity($trackingPageExclusivity)
    {
        $this->collTrackingPageExclusivities[]= $trackingPageExclusivity;
        $trackingPageExclusivity->setTrackingInstance($this);
    }

    /**
     * @param	TrackingPageExclusivity $trackingPageExclusivity The trackingPageExclusivity object to remove.
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function removeTrackingPageExclusivity($trackingPageExclusivity)
    {
        if ($this->getTrackingPageExclusivities()->contains($trackingPageExclusivity)) {
            $this->collTrackingPageExclusivities->remove($this->collTrackingPageExclusivities->search($trackingPageExclusivity));
            if (null === $this->trackingPageExclusivitiesScheduledForDeletion) {
                $this->trackingPageExclusivitiesScheduledForDeletion = clone $this->collTrackingPageExclusivities;
                $this->trackingPageExclusivitiesScheduledForDeletion->clear();
            }
            $this->trackingPageExclusivitiesScheduledForDeletion[]= clone $trackingPageExclusivity;
            $trackingPageExclusivity->setTrackingInstance(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacTrackingInstance is new, it will return
     * an empty collection; or if this PacTrackingInstance has previously
     * been saved, it will retrieve related TrackingPageExclusivities from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacTrackingInstance.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity[] List of ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity objects
     */
    public function getTrackingPageExclusivitiesJoinTrackingPageExclusivityGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery::create(null, $criteria);
        $query->joinWith('TrackingPageExclusivityGroup', $join_behavior);

        return $this->getTrackingPageExclusivities($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_tracking_instance = null;
        $this->fk_tracking_library_code = null;
        $this->name = null;
        $this->is_active = null;
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
            if ($this->collPacMcmRelations) {
                foreach ($this->collPacMcmRelations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrackingInstanceRevisions) {
                foreach ($this->collTrackingInstanceRevisions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrackingPageExclusivities) {
                foreach ($this->collTrackingPageExclusivities as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aTrackingLibraryCode instanceof Persistent) {
              $this->aTrackingLibraryCode->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacMcmRelations instanceof PropelCollection) {
            $this->collPacMcmRelations->clearIterator();
        }
        $this->collPacMcmRelations = null;
        if ($this->collTrackingInstanceRevisions instanceof PropelCollection) {
            $this->collTrackingInstanceRevisions->clearIterator();
        }
        $this->collTrackingInstanceRevisions = null;
        if ($this->collTrackingPageExclusivities instanceof PropelCollection) {
            $this->collTrackingPageExclusivities->clearIterator();
        }
        $this->collTrackingPageExclusivities = null;
        $this->aTrackingLibraryCode = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstance The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT;

        return $this;
    }

}
