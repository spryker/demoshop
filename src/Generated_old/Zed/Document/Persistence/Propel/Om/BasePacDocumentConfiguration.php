<?php


/**
 * Base class that represents a row from the 'pac_document_configuration' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.om
 */
abstract class Generated_Zed_Document_Persistence_Propel_Om_BasePacDocumentConfiguration extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_document_configuration field.
     * @var        int
     */
    protected $id_document_configuration;

    /**
     * The value for the fk_document_type field.
     * @var        int
     */
    protected $fk_document_type;

    /**
     * The value for the fk_document_template field.
     * @var        int
     */
    protected $fk_document_template;

    /**
     * The value for the fk_document_render_engine field.
     * @var        int
     */
    protected $fk_document_render_engine;

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
     * @var        PacDocumentType
     */
    protected $aType;

    /**
     * @var        PacDocumentTemplate
     */
    protected $aTemplate;

    /**
     * @var        PacDocumentRenderEngine
     */
    protected $aRenderEngine;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocument[] Collection to store aggregation of ProjectA_Zed_Document_Persistence_Propel_PacDocument objects.
     */
    protected $collDocuments;
    protected $collDocumentsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration[] Collection to store aggregation of ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects.
     */
    protected $collInvoices;
    protected $collInvoicesPartial;

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
    protected $documentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $invoicesScheduledForDeletion = null;

    /**
     * Get the [id_document_configuration] column value.
     *
     * @return int
     */
    public function getIdDocumentConfiguration()
    {

        return $this->id_document_configuration;
    }

    /**
     * Get the [fk_document_type] column value.
     *
     * @return int
     */
    public function getFkDocumentType()
    {

        return $this->fk_document_type;
    }

    /**
     * Get the [fk_document_template] column value.
     *
     * @return int
     */
    public function getFkDocumentTemplate()
    {

        return $this->fk_document_template;
    }

    /**
     * Get the [fk_document_render_engine] column value.
     *
     * @return int
     */
    public function getFkDocumentRenderEngine()
    {

        return $this->fk_document_render_engine;
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
     * Set the value of [id_document_configuration] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setIdDocumentConfiguration($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_document_configuration !== $v) {
            $this->id_document_configuration = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION;
        }


        return $this;
    } // setIdDocumentConfiguration()

    /**
     * Set the value of [fk_document_type] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setFkDocumentType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_document_type !== $v) {
            $this->fk_document_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE;
        }

        if ($this->aType !== null && $this->aType->getIdDocumentType() !== $v) {
            $this->aType = null;
        }


        return $this;
    } // setFkDocumentType()

    /**
     * Set the value of [fk_document_template] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setFkDocumentTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_document_template !== $v) {
            $this->fk_document_template = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE;
        }

        if ($this->aTemplate !== null && $this->aTemplate->getIdDocumentTemplate() !== $v) {
            $this->aTemplate = null;
        }


        return $this;
    } // setFkDocumentTemplate()

    /**
     * Set the value of [fk_document_render_engine] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setFkDocumentRenderEngine($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_document_render_engine !== $v) {
            $this->fk_document_render_engine = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE;
        }

        if ($this->aRenderEngine !== null && $this->aRenderEngine->getIdDocumentRenderEngine() !== $v) {
            $this->aRenderEngine = null;
        }


        return $this;
    } // setFkDocumentRenderEngine()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT;
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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_document_configuration = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_document_type = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_document_template = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_document_render_engine = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object", $e);
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

        if ($this->aType !== null && $this->fk_document_type !== $this->aType->getIdDocumentType()) {
            $this->aType = null;
        }
        if ($this->aTemplate !== null && $this->fk_document_template !== $this->aTemplate->getIdDocumentTemplate()) {
            $this->aTemplate = null;
        }
        if ($this->aRenderEngine !== null && $this->fk_document_render_engine !== $this->aRenderEngine->getIdDocumentRenderEngine()) {
            $this->aRenderEngine = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aType = null;
            $this->aTemplate = null;
            $this->aRenderEngine = null;
            $this->collDocuments = null;

            $this->collInvoices = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::addInstanceToPool($this);
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
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aType !== null) {
                if ($this->aType->isModified() || $this->aType->isNew()) {
                    $affectedRows += $this->aType->save($con);
                }
                $this->setType($this->aType);
            }

            if ($this->aTemplate !== null) {
                if ($this->aTemplate->isModified() || $this->aTemplate->isNew()) {
                    $affectedRows += $this->aTemplate->save($con);
                }
                $this->setTemplate($this->aTemplate);
            }

            if ($this->aRenderEngine !== null) {
                if ($this->aRenderEngine->isModified() || $this->aRenderEngine->isNew()) {
                    $affectedRows += $this->aRenderEngine->save($con);
                }
                $this->setRenderEngine($this->aRenderEngine);
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

            if ($this->documentsScheduledForDeletion !== null) {
                if (!$this->documentsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery::create()
                        ->filterByPrimaryKeys($this->documentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->documentsScheduledForDeletion = null;
                }
            }

            if ($this->collDocuments !== null) {
                foreach ($this->collDocuments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->invoicesScheduledForDeletion !== null) {
                if (!$this->invoicesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery::create()
                        ->filterByPrimaryKeys($this->invoicesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->invoicesScheduledForDeletion = null;
                }
            }

            if ($this->collInvoices !== null) {
                foreach ($this->collInvoices as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION;
        if (null !== $this->id_document_configuration) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION)) {
            $modifiedColumns[':p' . $index++]  = '`id_document_configuration`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_document_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_document_template`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_document_render_engine`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_document_configuration` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_document_configuration`':
                        $stmt->bindValue($identifier, $this->id_document_configuration, PDO::PARAM_INT);
                        break;
                    case '`fk_document_type`':
                        $stmt->bindValue($identifier, $this->fk_document_type, PDO::PARAM_INT);
                        break;
                    case '`fk_document_template`':
                        $stmt->bindValue($identifier, $this->fk_document_template, PDO::PARAM_INT);
                        break;
                    case '`fk_document_render_engine`':
                        $stmt->bindValue($identifier, $this->fk_document_render_engine, PDO::PARAM_INT);
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
        $this->setIdDocumentConfiguration($pk);

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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aType !== null) {
                if (!$this->aType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aType->getValidationFailures());
                }
            }

            if ($this->aTemplate !== null) {
                if (!$this->aTemplate->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTemplate->getValidationFailures());
                }
            }

            if ($this->aRenderEngine !== null) {
                if (!$this->aRenderEngine->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRenderEngine->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDocuments !== null) {
                    foreach ($this->collDocuments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collInvoices !== null) {
                    foreach ($this->collInvoices as $referrerFK) {
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
        $pos = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdDocumentConfiguration();
                break;
            case 1:
                return $this->getFkDocumentType();
                break;
            case 2:
                return $this->getFkDocumentTemplate();
                break;
            case 3:
                return $this->getFkDocumentRenderEngine();
                break;
            case 4:
                return $this->getName();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdDocumentConfiguration(),
            $keys[1] => $this->getFkDocumentType(),
            $keys[2] => $this->getFkDocumentTemplate(),
            $keys[3] => $this->getFkDocumentRenderEngine(),
            $keys[4] => $this->getName(),
            $keys[5] => $this->getCreatedAt(),
            $keys[6] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aType) {
                $result['Type'] = $this->aType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTemplate) {
                $result['Template'] = $this->aTemplate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRenderEngine) {
                $result['RenderEngine'] = $this->aRenderEngine->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDocuments) {
                $result['Documents'] = $this->collDocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInvoices) {
                $result['Invoices'] = $this->collInvoices->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdDocumentConfiguration($value);
                break;
            case 1:
                $this->setFkDocumentType($value);
                break;
            case 2:
                $this->setFkDocumentTemplate($value);
                break;
            case 3:
                $this->setFkDocumentRenderEngine($value);
                break;
            case 4:
                $this->setName($value);
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
        $keys = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdDocumentConfiguration($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkDocumentType($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkDocumentTemplate($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkDocumentRenderEngine($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
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
        $criteria = new Criteria(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $this->id_document_configuration);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TYPE, $this->fk_document_type);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_TEMPLATE, $this->fk_document_template);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::FK_DOCUMENT_RENDER_ENGINE, $this->fk_document_render_engine);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::NAME)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::ID_DOCUMENT_CONFIGURATION, $this->id_document_configuration);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdDocumentConfiguration();
    }

    /**
     * Generic method to set the primary key (id_document_configuration column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdDocumentConfiguration($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdDocumentConfiguration();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkDocumentType($this->getFkDocumentType());
        $copyObj->setFkDocumentTemplate($this->getFkDocumentTemplate());
        $copyObj->setFkDocumentRenderEngine($this->getFkDocumentRenderEngine());
        $copyObj->setName($this->getName());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDocument($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInvoices() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInvoice($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdDocumentConfiguration(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration Clone of current object.
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Document_Persistence_Propel_PacDocumentType object.
     *
     * @param                  ProjectA_Zed_Document_Persistence_Propel_PacDocumentType $v
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     * @throws PropelException
     */
    public function setType(ProjectA_Zed_Document_Persistence_Propel_PacDocumentType $v = null)
    {
        if ($v === null) {
            $this->setFkDocumentType(NULL);
        } else {
            $this->setFkDocumentType($v->getIdDocumentType());
        }

        $this->aType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Document_Persistence_Propel_PacDocumentType object, it will not be re-added.
        if ($v !== null) {
            $v->addDocumentConfiguration($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentType The associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentType object.
     * @throws PropelException
     */
    public function getType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aType === null && ($this->fk_document_type !== null) && $doQuery) {
            $this->aType = ProjectA_Zed_Document_Persistence_Propel_PacDocumentTypeQuery::create()->findPk($this->fk_document_type, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aType->addDocumentConfigurations($this);
             */
        }

        return $this->aType;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate object.
     *
     * @param                  ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate $v
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTemplate(ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate $v = null)
    {
        if ($v === null) {
            $this->setFkDocumentTemplate(NULL);
        } else {
            $this->setFkDocumentTemplate($v->getIdDocumentTemplate());
        }

        $this->aTemplate = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate object, it will not be re-added.
        if ($v !== null) {
            $v->addDocumentConfiguration($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate The associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate object.
     * @throws PropelException
     */
    public function getTemplate(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTemplate === null && ($this->fk_document_template !== null) && $doQuery) {
            $this->aTemplate = ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateQuery::create()->findPk($this->fk_document_template, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTemplate->addDocumentConfigurations($this);
             */
        }

        return $this->aTemplate;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine object.
     *
     * @param                  ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine $v
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRenderEngine(ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine $v = null)
    {
        if ($v === null) {
            $this->setFkDocumentRenderEngine(NULL);
        } else {
            $this->setFkDocumentRenderEngine($v->getIdDocumentRenderEngine());
        }

        $this->aRenderEngine = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine object, it will not be re-added.
        if ($v !== null) {
            $v->addDocumentConfiguration($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine The associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine object.
     * @throws PropelException
     */
    public function getRenderEngine(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRenderEngine === null && ($this->fk_document_render_engine !== null) && $doQuery) {
            $this->aRenderEngine = ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngineQuery::create()->findPk($this->fk_document_render_engine, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRenderEngine->addDocumentConfigurations($this);
             */
        }

        return $this->aRenderEngine;
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
        if ('Document' == $relationName) {
            $this->initDocuments();
        }
        if ('Invoice' == $relationName) {
            $this->initInvoices();
        }
    }

    /**
     * Clears out the collDocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     * @see        addDocuments()
     */
    public function clearDocuments()
    {
        $this->collDocuments = null; // important to set this to null since that means it is uninitialized
        $this->collDocumentsPartial = null;

        return $this;
    }

    /**
     * reset is the collDocuments collection loaded partially
     *
     * @return void
     */
    public function resetPartialDocuments($v = true)
    {
        $this->collDocumentsPartial = $v;
    }

    /**
     * Initializes the collDocuments collection.
     *
     * By default this just sets the collDocuments collection to an empty array (like clearcollDocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDocuments($overrideExisting = true)
    {
        if (null !== $this->collDocuments && !$overrideExisting) {
            return;
        }
        $this->collDocuments = new PropelObjectCollection();
        $this->collDocuments->setModel('ProjectA_Zed_Document_Persistence_Propel_PacDocument');
    }

    /**
     * Gets an array of ProjectA_Zed_Document_Persistence_Propel_PacDocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocument[] List of ProjectA_Zed_Document_Persistence_Propel_PacDocument objects
     * @throws PropelException
     */
    public function getDocuments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDocumentsPartial && !$this->isNew();
        if (null === $this->collDocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDocuments) {
                // return empty collection
                $this->initDocuments();
            } else {
                $collDocuments = ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery::create(null, $criteria)
                    ->filterByConfiguration($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDocumentsPartial && count($collDocuments)) {
                      $this->initDocuments(false);

                      foreach ($collDocuments as $obj) {
                        if (false == $this->collDocuments->contains($obj)) {
                          $this->collDocuments->append($obj);
                        }
                      }

                      $this->collDocumentsPartial = true;
                    }

                    $collDocuments->getInternalIterator()->rewind();

                    return $collDocuments;
                }

                if ($partial && $this->collDocuments) {
                    foreach ($this->collDocuments as $obj) {
                        if ($obj->isNew()) {
                            $collDocuments[] = $obj;
                        }
                    }
                }

                $this->collDocuments = $collDocuments;
                $this->collDocumentsPartial = false;
            }
        }

        return $this->collDocuments;
    }

    /**
     * Sets a collection of Document objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $documents A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setDocuments(PropelCollection $documents, PropelPDO $con = null)
    {
        $documentsToDelete = $this->getDocuments(new Criteria(), $con)->diff($documents);


        $this->documentsScheduledForDeletion = $documentsToDelete;

        foreach ($documentsToDelete as $documentRemoved) {
            $documentRemoved->setConfiguration(null);
        }

        $this->collDocuments = null;
        foreach ($documents as $document) {
            $this->addDocument($document);
        }

        $this->collDocuments = $documents;
        $this->collDocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Document_Persistence_Propel_PacDocument objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Document_Persistence_Propel_PacDocument objects.
     * @throws PropelException
     */
    public function countDocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDocumentsPartial && !$this->isNew();
        if (null === $this->collDocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDocuments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDocuments());
            }
            $query = ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByConfiguration($this)
                ->count($con);
        }

        return count($this->collDocuments);
    }

    /**
     * Method called to associate a ProjectA_Zed_Document_Persistence_Propel_PacDocument object to this object
     * through the ProjectA_Zed_Document_Persistence_Propel_PacDocument foreign key attribute.
     *
     * @param    ProjectA_Zed_Document_Persistence_Propel_PacDocument $l ProjectA_Zed_Document_Persistence_Propel_PacDocument
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function addDocument(ProjectA_Zed_Document_Persistence_Propel_PacDocument $l)
    {
        if ($this->collDocuments === null) {
            $this->initDocuments();
            $this->collDocumentsPartial = true;
        }

        if (!in_array($l, $this->collDocuments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDocument($l);

            if ($this->documentsScheduledForDeletion and $this->documentsScheduledForDeletion->contains($l)) {
                $this->documentsScheduledForDeletion->remove($this->documentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Document $document The document object to add.
     */
    protected function doAddDocument($document)
    {
        $this->collDocuments[]= $document;
        $document->setConfiguration($this);
    }

    /**
     * @param	Document $document The document object to remove.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function removeDocument($document)
    {
        if ($this->getDocuments()->contains($document)) {
            $this->collDocuments->remove($this->collDocuments->search($document));
            if (null === $this->documentsScheduledForDeletion) {
                $this->documentsScheduledForDeletion = clone $this->collDocuments;
                $this->documentsScheduledForDeletion->clear();
            }
            $this->documentsScheduledForDeletion[]= clone $document;
            $document->setConfiguration(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacDocumentConfiguration is new, it will return
     * an empty collection; or if this PacDocumentConfiguration has previously
     * been saved, it will retrieve related Documents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacDocumentConfiguration.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocument[] List of ProjectA_Zed_Document_Persistence_Propel_PacDocument objects
     */
    public function getDocumentsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getDocuments($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacDocumentConfiguration is new, it will return
     * an empty collection; or if this PacDocumentConfiguration has previously
     * been saved, it will retrieve related Documents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacDocumentConfiguration.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocument[] List of ProjectA_Zed_Document_Persistence_Propel_PacDocument objects
     */
    public function getDocumentsJoinRenderEngine($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery::create(null, $criteria);
        $query->joinWith('RenderEngine', $join_behavior);

        return $this->getDocuments($query, $con);
    }

    /**
     * Clears out the collInvoices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     * @see        addInvoices()
     */
    public function clearInvoices()
    {
        $this->collInvoices = null; // important to set this to null since that means it is uninitialized
        $this->collInvoicesPartial = null;

        return $this;
    }

    /**
     * reset is the collInvoices collection loaded partially
     *
     * @return void
     */
    public function resetPartialInvoices($v = true)
    {
        $this->collInvoicesPartial = $v;
    }

    /**
     * Initializes the collInvoices collection.
     *
     * By default this just sets the collInvoices collection to an empty array (like clearcollInvoices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInvoices($overrideExisting = true)
    {
        if (null !== $this->collInvoices && !$overrideExisting) {
            return;
        }
        $this->collInvoices = new PropelObjectCollection();
        $this->collInvoices->setModel('ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration');
    }

    /**
     * Gets an array of ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration[] List of ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects
     * @throws PropelException
     */
    public function getInvoices($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInvoicesPartial && !$this->isNew();
        if (null === $this->collInvoices || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInvoices) {
                // return empty collection
                $this->initInvoices();
            } else {
                $collInvoices = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery::create(null, $criteria)
                    ->filterByDocumentConfiguration($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInvoicesPartial && count($collInvoices)) {
                      $this->initInvoices(false);

                      foreach ($collInvoices as $obj) {
                        if (false == $this->collInvoices->contains($obj)) {
                          $this->collInvoices->append($obj);
                        }
                      }

                      $this->collInvoicesPartial = true;
                    }

                    $collInvoices->getInternalIterator()->rewind();

                    return $collInvoices;
                }

                if ($partial && $this->collInvoices) {
                    foreach ($this->collInvoices as $obj) {
                        if ($obj->isNew()) {
                            $collInvoices[] = $obj;
                        }
                    }
                }

                $this->collInvoices = $collInvoices;
                $this->collInvoicesPartial = false;
            }
        }

        return $this->collInvoices;
    }

    /**
     * Sets a collection of Invoice objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $invoices A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function setInvoices(PropelCollection $invoices, PropelPDO $con = null)
    {
        $invoicesToDelete = $this->getInvoices(new Criteria(), $con)->diff($invoices);


        $this->invoicesScheduledForDeletion = $invoicesToDelete;

        foreach ($invoicesToDelete as $invoiceRemoved) {
            $invoiceRemoved->setDocumentConfiguration(null);
        }

        $this->collInvoices = null;
        foreach ($invoices as $invoice) {
            $this->addInvoice($invoice);
        }

        $this->collInvoices = $invoices;
        $this->collInvoicesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects.
     * @throws PropelException
     */
    public function countInvoices(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInvoicesPartial && !$this->isNew();
        if (null === $this->collInvoices || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInvoices) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInvoices());
            }
            $query = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDocumentConfiguration($this)
                ->count($con);
        }

        return count($this->collInvoices);
    }

    /**
     * Method called to associate a ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration object to this object
     * through the ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration foreign key attribute.
     *
     * @param    ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration $l ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function addInvoice(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration $l)
    {
        if ($this->collInvoices === null) {
            $this->initInvoices();
            $this->collInvoicesPartial = true;
        }

        if (!in_array($l, $this->collInvoices->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInvoice($l);

            if ($this->invoicesScheduledForDeletion and $this->invoicesScheduledForDeletion->contains($l)) {
                $this->invoicesScheduledForDeletion->remove($this->invoicesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Invoice $invoice The invoice object to add.
     */
    protected function doAddInvoice($invoice)
    {
        $this->collInvoices[]= $invoice;
        $invoice->setDocumentConfiguration($this);
    }

    /**
     * @param	Invoice $invoice The invoice object to remove.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function removeInvoice($invoice)
    {
        if ($this->getInvoices()->contains($invoice)) {
            $this->collInvoices->remove($this->collInvoices->search($invoice));
            if (null === $this->invoicesScheduledForDeletion) {
                $this->invoicesScheduledForDeletion = clone $this->collInvoices;
                $this->invoicesScheduledForDeletion->clear();
            }
            $this->invoicesScheduledForDeletion[]= clone $invoice;
            $invoice->setDocumentConfiguration(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_document_configuration = null;
        $this->fk_document_type = null;
        $this->fk_document_template = null;
        $this->fk_document_render_engine = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collDocuments) {
                foreach ($this->collDocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInvoices) {
                foreach ($this->collInvoices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aType instanceof Persistent) {
              $this->aType->clearAllReferences($deep);
            }
            if ($this->aTemplate instanceof Persistent) {
              $this->aTemplate->clearAllReferences($deep);
            }
            if ($this->aRenderEngine instanceof Persistent) {
              $this->aRenderEngine->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDocuments instanceof PropelCollection) {
            $this->collDocuments->clearIterator();
        }
        $this->collDocuments = null;
        if ($this->collInvoices instanceof PropelCollection) {
            $this->collInvoices->clearIterator();
        }
        $this->collInvoices = null;
        $this->aType = null;
        $this->aTemplate = null;
        $this->aRenderEngine = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationPeer::UPDATED_AT;

        return $this;
    }

}
