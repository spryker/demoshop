<?php


/**
 * Base class that represents a row from the 'pac_document' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.om
 */
abstract class Generated_Zed_Document_Persistence_Propel_Om_BasePacDocument extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_document field.
     * @var        int
     */
    protected $id_document;

    /**
     * The value for the fk_sales_order field.
     * @var        int
     */
    protected $fk_sales_order;

    /**
     * The value for the fk_document_render_engine field.
     * @var        int
     */
    protected $fk_document_render_engine;

    /**
     * The value for the fk_document_configuration field.
     * @var        int
     */
    protected $fk_document_configuration;

    /**
     * The value for the data field.
     * @var        string
     */
    protected $data;

    /**
     * The value for the template field.
     * @var        string
     */
    protected $template;

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
     * @var        PacSalesOrder
     */
    protected $aOrder;

    /**
     * @var        PacDocumentRenderEngine
     */
    protected $aRenderEngine;

    /**
     * @var        PacDocumentConfiguration
     */
    protected $aConfiguration;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess[] Collection to store aggregation of ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess objects.
     */
    protected $collDocumentRenderProcesses;
    protected $collDocumentRenderProcessesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument[] Collection to store aggregation of ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument objects.
     */
    protected $collInvoiceDocuments;
    protected $collInvoiceDocumentsPartial;

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
    protected $documentRenderProcessesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $invoiceDocumentsScheduledForDeletion = null;

    /**
     * Get the [id_document] column value.
     *
     * @return int
     */
    public function getIdDocument()
    {

        return $this->id_document;
    }

    /**
     * Get the [fk_sales_order] column value.
     *
     * @return int
     */
    public function getFkSalesOrder()
    {

        return $this->fk_sales_order;
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
     * Get the [fk_document_configuration] column value.
     *
     * @return int
     */
    public function getFkDocumentConfiguration()
    {

        return $this->fk_document_configuration;
    }

    /**
     * Get the [data] column value.
     *
     * @return string
     */
    public function getData()
    {

        return $this->data;
    }

    /**
     * Get the [template] column value.
     *
     * @return string
     */
    public function getTemplate()
    {

        return $this->template;
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
     * Set the value of [id_document] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setIdDocument($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_document !== $v) {
            $this->id_document = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT;
        }


        return $this;
    } // setIdDocument()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [fk_document_render_engine] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setFkDocumentRenderEngine($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_document_render_engine !== $v) {
            $this->fk_document_render_engine = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE;
        }

        if ($this->aRenderEngine !== null && $this->aRenderEngine->getIdDocumentRenderEngine() !== $v) {
            $this->aRenderEngine = null;
        }


        return $this;
    } // setFkDocumentRenderEngine()

    /**
     * Set the value of [fk_document_configuration] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setFkDocumentConfiguration($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_document_configuration !== $v) {
            $this->fk_document_configuration = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION;
        }

        if ($this->aConfiguration !== null && $this->aConfiguration->getIdDocumentConfiguration() !== $v) {
            $this->aConfiguration = null;
        }


        return $this;
    } // setFkDocumentConfiguration()

    /**
     * Set the value of [data] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->data !== $v) {
            $this->data = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATA;
        }


        return $this;
    } // setData()

    /**
     * Set the value of [template] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->template !== $v) {
            $this->template = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::TEMPLATE;
        }


        return $this;
    } // setTemplate()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT;
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

            $this->id_document = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_sales_order = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_document_render_engine = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_document_configuration = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->data = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->template = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->created_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->updated_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Document_Persistence_Propel_PacDocument object", $e);
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

        if ($this->aOrder !== null && $this->fk_sales_order !== $this->aOrder->getIdSalesOrder()) {
            $this->aOrder = null;
        }
        if ($this->aRenderEngine !== null && $this->fk_document_render_engine !== $this->aRenderEngine->getIdDocumentRenderEngine()) {
            $this->aRenderEngine = null;
        }
        if ($this->aConfiguration !== null && $this->fk_document_configuration !== $this->aConfiguration->getIdDocumentConfiguration()) {
            $this->aConfiguration = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrder = null;
            $this->aRenderEngine = null;
            $this->aConfiguration = null;
            $this->collDocumentRenderProcesses = null;

            $this->collInvoiceDocuments = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::addInstanceToPool($this);
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

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

            if ($this->aRenderEngine !== null) {
                if ($this->aRenderEngine->isModified() || $this->aRenderEngine->isNew()) {
                    $affectedRows += $this->aRenderEngine->save($con);
                }
                $this->setRenderEngine($this->aRenderEngine);
            }

            if ($this->aConfiguration !== null) {
                if ($this->aConfiguration->isModified() || $this->aConfiguration->isNew()) {
                    $affectedRows += $this->aConfiguration->save($con);
                }
                $this->setConfiguration($this->aConfiguration);
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

            if ($this->documentRenderProcessesScheduledForDeletion !== null) {
                if (!$this->documentRenderProcessesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcessQuery::create()
                        ->filterByPrimaryKeys($this->documentRenderProcessesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->documentRenderProcessesScheduledForDeletion = null;
                }
            }

            if ($this->collDocumentRenderProcesses !== null) {
                foreach ($this->collDocumentRenderProcesses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->invoiceDocumentsScheduledForDeletion !== null) {
                if (!$this->invoiceDocumentsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocumentQuery::create()
                        ->filterByPrimaryKeys($this->invoiceDocumentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->invoiceDocumentsScheduledForDeletion = null;
                }
            }

            if ($this->collInvoiceDocuments !== null) {
                foreach ($this->collInvoiceDocuments as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT;
        if (null !== $this->id_document) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT)) {
            $modifiedColumns[':p' . $index++]  = '`id_document`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_document_render_engine`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION)) {
            $modifiedColumns[':p' . $index++]  = '`fk_document_configuration`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATA)) {
            $modifiedColumns[':p' . $index++]  = '`data`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`template`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_document` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_document`':
                        $stmt->bindValue($identifier, $this->id_document, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order`':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case '`fk_document_render_engine`':
                        $stmt->bindValue($identifier, $this->fk_document_render_engine, PDO::PARAM_INT);
                        break;
                    case '`fk_document_configuration`':
                        $stmt->bindValue($identifier, $this->fk_document_configuration, PDO::PARAM_INT);
                        break;
                    case '`data`':
                        $stmt->bindValue($identifier, $this->data, PDO::PARAM_STR);
                        break;
                    case '`template`':
                        $stmt->bindValue($identifier, $this->template, PDO::PARAM_STR);
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
        $this->setIdDocument($pk);

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

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }

            if ($this->aRenderEngine !== null) {
                if (!$this->aRenderEngine->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRenderEngine->getValidationFailures());
                }
            }

            if ($this->aConfiguration !== null) {
                if (!$this->aConfiguration->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aConfiguration->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDocumentRenderProcesses !== null) {
                    foreach ($this->collDocumentRenderProcesses as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collInvoiceDocuments !== null) {
                    foreach ($this->collInvoiceDocuments as $referrerFK) {
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
        $pos = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdDocument();
                break;
            case 1:
                return $this->getFkSalesOrder();
                break;
            case 2:
                return $this->getFkDocumentRenderEngine();
                break;
            case 3:
                return $this->getFkDocumentConfiguration();
                break;
            case 4:
                return $this->getData();
                break;
            case 5:
                return $this->getTemplate();
                break;
            case 6:
                return $this->getCreatedAt();
                break;
            case 7:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Document_Persistence_Propel_PacDocument'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Document_Persistence_Propel_PacDocument'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdDocument(),
            $keys[1] => $this->getFkSalesOrder(),
            $keys[2] => $this->getFkDocumentRenderEngine(),
            $keys[3] => $this->getFkDocumentConfiguration(),
            $keys[4] => $this->getData(),
            $keys[5] => $this->getTemplate(),
            $keys[6] => $this->getCreatedAt(),
            $keys[7] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRenderEngine) {
                $result['RenderEngine'] = $this->aRenderEngine->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aConfiguration) {
                $result['Configuration'] = $this->aConfiguration->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDocumentRenderProcesses) {
                $result['DocumentRenderProcesses'] = $this->collDocumentRenderProcesses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInvoiceDocuments) {
                $result['InvoiceDocuments'] = $this->collInvoiceDocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdDocument($value);
                break;
            case 1:
                $this->setFkSalesOrder($value);
                break;
            case 2:
                $this->setFkDocumentRenderEngine($value);
                break;
            case 3:
                $this->setFkDocumentConfiguration($value);
                break;
            case 4:
                $this->setData($value);
                break;
            case 5:
                $this->setTemplate($value);
                break;
            case 6:
                $this->setCreatedAt($value);
                break;
            case 7:
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
        $keys = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdDocument($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkSalesOrder($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkDocumentRenderEngine($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkDocumentConfiguration($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setData($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTemplate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $this->id_document);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_SALES_ORDER, $this->fk_sales_order);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_RENDER_ENGINE, $this->fk_document_render_engine);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::FK_DOCUMENT_CONFIGURATION, $this->fk_document_configuration);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATA)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATA, $this->data);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::TEMPLATE)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::TEMPLATE, $this->template);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::ID_DOCUMENT, $this->id_document);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdDocument();
    }

    /**
     * Generic method to set the primary key (id_document column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdDocument($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdDocument();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Document_Persistence_Propel_PacDocument (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setFkDocumentRenderEngine($this->getFkDocumentRenderEngine());
        $copyObj->setFkDocumentConfiguration($this->getFkDocumentConfiguration());
        $copyObj->setData($this->getData());
        $copyObj->setTemplate($this->getTemplate());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDocumentRenderProcesses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDocumentRenderProcess($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInvoiceDocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInvoiceDocument($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdDocument(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument Clone of current object.
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
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object.
     *
     * @param                  ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $v
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addDocument($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder The associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object.
     * @throws PropelException
     */
    public function getOrder(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrder === null && ($this->fk_sales_order !== null) && $doQuery) {
            $this->aOrder = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrder->addDocuments($this);
             */
        }

        return $this->aOrder;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine object.
     *
     * @param                  ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine $v
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
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
            $v->addDocument($this);
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
                $this->aRenderEngine->addDocuments($this);
             */
        }

        return $this->aRenderEngine;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object.
     *
     * @param                  ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration $v
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     * @throws PropelException
     */
    public function setConfiguration(ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration $v = null)
    {
        if ($v === null) {
            $this->setFkDocumentConfiguration(NULL);
        } else {
            $this->setFkDocumentConfiguration($v->getIdDocumentConfiguration());
        }

        $this->aConfiguration = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object, it will not be re-added.
        if ($v !== null) {
            $v->addDocument($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration The associated ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object.
     * @throws PropelException
     */
    public function getConfiguration(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aConfiguration === null && ($this->fk_document_configuration !== null) && $doQuery) {
            $this->aConfiguration = ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery::create()->findPk($this->fk_document_configuration, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aConfiguration->addDocuments($this);
             */
        }

        return $this->aConfiguration;
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
        if ('DocumentRenderProcess' == $relationName) {
            $this->initDocumentRenderProcesses();
        }
        if ('InvoiceDocument' == $relationName) {
            $this->initInvoiceDocuments();
        }
    }

    /**
     * Clears out the collDocumentRenderProcesses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     * @see        addDocumentRenderProcesses()
     */
    public function clearDocumentRenderProcesses()
    {
        $this->collDocumentRenderProcesses = null; // important to set this to null since that means it is uninitialized
        $this->collDocumentRenderProcessesPartial = null;

        return $this;
    }

    /**
     * reset is the collDocumentRenderProcesses collection loaded partially
     *
     * @return void
     */
    public function resetPartialDocumentRenderProcesses($v = true)
    {
        $this->collDocumentRenderProcessesPartial = $v;
    }

    /**
     * Initializes the collDocumentRenderProcesses collection.
     *
     * By default this just sets the collDocumentRenderProcesses collection to an empty array (like clearcollDocumentRenderProcesses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDocumentRenderProcesses($overrideExisting = true)
    {
        if (null !== $this->collDocumentRenderProcesses && !$overrideExisting) {
            return;
        }
        $this->collDocumentRenderProcesses = new PropelObjectCollection();
        $this->collDocumentRenderProcesses->setModel('ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess');
    }

    /**
     * Gets an array of ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Document_Persistence_Propel_PacDocument is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess[] List of ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess objects
     * @throws PropelException
     */
    public function getDocumentRenderProcesses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDocumentRenderProcessesPartial && !$this->isNew();
        if (null === $this->collDocumentRenderProcesses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDocumentRenderProcesses) {
                // return empty collection
                $this->initDocumentRenderProcesses();
            } else {
                $collDocumentRenderProcesses = ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcessQuery::create(null, $criteria)
                    ->filterByDocument($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDocumentRenderProcessesPartial && count($collDocumentRenderProcesses)) {
                      $this->initDocumentRenderProcesses(false);

                      foreach ($collDocumentRenderProcesses as $obj) {
                        if (false == $this->collDocumentRenderProcesses->contains($obj)) {
                          $this->collDocumentRenderProcesses->append($obj);
                        }
                      }

                      $this->collDocumentRenderProcessesPartial = true;
                    }

                    $collDocumentRenderProcesses->getInternalIterator()->rewind();

                    return $collDocumentRenderProcesses;
                }

                if ($partial && $this->collDocumentRenderProcesses) {
                    foreach ($this->collDocumentRenderProcesses as $obj) {
                        if ($obj->isNew()) {
                            $collDocumentRenderProcesses[] = $obj;
                        }
                    }
                }

                $this->collDocumentRenderProcesses = $collDocumentRenderProcesses;
                $this->collDocumentRenderProcessesPartial = false;
            }
        }

        return $this->collDocumentRenderProcesses;
    }

    /**
     * Sets a collection of DocumentRenderProcess objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $documentRenderProcesses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setDocumentRenderProcesses(PropelCollection $documentRenderProcesses, PropelPDO $con = null)
    {
        $documentRenderProcessesToDelete = $this->getDocumentRenderProcesses(new Criteria(), $con)->diff($documentRenderProcesses);


        $this->documentRenderProcessesScheduledForDeletion = $documentRenderProcessesToDelete;

        foreach ($documentRenderProcessesToDelete as $documentRenderProcessRemoved) {
            $documentRenderProcessRemoved->setDocument(null);
        }

        $this->collDocumentRenderProcesses = null;
        foreach ($documentRenderProcesses as $documentRenderProcess) {
            $this->addDocumentRenderProcess($documentRenderProcess);
        }

        $this->collDocumentRenderProcesses = $documentRenderProcesses;
        $this->collDocumentRenderProcessesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess objects.
     * @throws PropelException
     */
    public function countDocumentRenderProcesses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDocumentRenderProcessesPartial && !$this->isNew();
        if (null === $this->collDocumentRenderProcesses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDocumentRenderProcesses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDocumentRenderProcesses());
            }
            $query = ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcessQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDocument($this)
                ->count($con);
        }

        return count($this->collDocumentRenderProcesses);
    }

    /**
     * Method called to associate a ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess object to this object
     * through the ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess foreign key attribute.
     *
     * @param    ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess $l ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function addDocumentRenderProcess(ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderProcess $l)
    {
        if ($this->collDocumentRenderProcesses === null) {
            $this->initDocumentRenderProcesses();
            $this->collDocumentRenderProcessesPartial = true;
        }

        if (!in_array($l, $this->collDocumentRenderProcesses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDocumentRenderProcess($l);

            if ($this->documentRenderProcessesScheduledForDeletion and $this->documentRenderProcessesScheduledForDeletion->contains($l)) {
                $this->documentRenderProcessesScheduledForDeletion->remove($this->documentRenderProcessesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	DocumentRenderProcess $documentRenderProcess The documentRenderProcess object to add.
     */
    protected function doAddDocumentRenderProcess($documentRenderProcess)
    {
        $this->collDocumentRenderProcesses[]= $documentRenderProcess;
        $documentRenderProcess->setDocument($this);
    }

    /**
     * @param	DocumentRenderProcess $documentRenderProcess The documentRenderProcess object to remove.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function removeDocumentRenderProcess($documentRenderProcess)
    {
        if ($this->getDocumentRenderProcesses()->contains($documentRenderProcess)) {
            $this->collDocumentRenderProcesses->remove($this->collDocumentRenderProcesses->search($documentRenderProcess));
            if (null === $this->documentRenderProcessesScheduledForDeletion) {
                $this->documentRenderProcessesScheduledForDeletion = clone $this->collDocumentRenderProcesses;
                $this->documentRenderProcessesScheduledForDeletion->clear();
            }
            $this->documentRenderProcessesScheduledForDeletion[]= clone $documentRenderProcess;
            $documentRenderProcess->setDocument(null);
        }

        return $this;
    }

    /**
     * Clears out the collInvoiceDocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     * @see        addInvoiceDocuments()
     */
    public function clearInvoiceDocuments()
    {
        $this->collInvoiceDocuments = null; // important to set this to null since that means it is uninitialized
        $this->collInvoiceDocumentsPartial = null;

        return $this;
    }

    /**
     * reset is the collInvoiceDocuments collection loaded partially
     *
     * @return void
     */
    public function resetPartialInvoiceDocuments($v = true)
    {
        $this->collInvoiceDocumentsPartial = $v;
    }

    /**
     * Initializes the collInvoiceDocuments collection.
     *
     * By default this just sets the collInvoiceDocuments collection to an empty array (like clearcollInvoiceDocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInvoiceDocuments($overrideExisting = true)
    {
        if (null !== $this->collInvoiceDocuments && !$overrideExisting) {
            return;
        }
        $this->collInvoiceDocuments = new PropelObjectCollection();
        $this->collInvoiceDocuments->setModel('ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument');
    }

    /**
     * Gets an array of ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Document_Persistence_Propel_PacDocument is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument[] List of ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument objects
     * @throws PropelException
     */
    public function getInvoiceDocuments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInvoiceDocumentsPartial && !$this->isNew();
        if (null === $this->collInvoiceDocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInvoiceDocuments) {
                // return empty collection
                $this->initInvoiceDocuments();
            } else {
                $collInvoiceDocuments = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocumentQuery::create(null, $criteria)
                    ->filterByDocument($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInvoiceDocumentsPartial && count($collInvoiceDocuments)) {
                      $this->initInvoiceDocuments(false);

                      foreach ($collInvoiceDocuments as $obj) {
                        if (false == $this->collInvoiceDocuments->contains($obj)) {
                          $this->collInvoiceDocuments->append($obj);
                        }
                      }

                      $this->collInvoiceDocumentsPartial = true;
                    }

                    $collInvoiceDocuments->getInternalIterator()->rewind();

                    return $collInvoiceDocuments;
                }

                if ($partial && $this->collInvoiceDocuments) {
                    foreach ($this->collInvoiceDocuments as $obj) {
                        if ($obj->isNew()) {
                            $collInvoiceDocuments[] = $obj;
                        }
                    }
                }

                $this->collInvoiceDocuments = $collInvoiceDocuments;
                $this->collInvoiceDocumentsPartial = false;
            }
        }

        return $this->collInvoiceDocuments;
    }

    /**
     * Sets a collection of InvoiceDocument objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $invoiceDocuments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function setInvoiceDocuments(PropelCollection $invoiceDocuments, PropelPDO $con = null)
    {
        $invoiceDocumentsToDelete = $this->getInvoiceDocuments(new Criteria(), $con)->diff($invoiceDocuments);


        $this->invoiceDocumentsScheduledForDeletion = $invoiceDocumentsToDelete;

        foreach ($invoiceDocumentsToDelete as $invoiceDocumentRemoved) {
            $invoiceDocumentRemoved->setDocument(null);
        }

        $this->collInvoiceDocuments = null;
        foreach ($invoiceDocuments as $invoiceDocument) {
            $this->addInvoiceDocument($invoiceDocument);
        }

        $this->collInvoiceDocuments = $invoiceDocuments;
        $this->collInvoiceDocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument objects.
     * @throws PropelException
     */
    public function countInvoiceDocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInvoiceDocumentsPartial && !$this->isNew();
        if (null === $this->collInvoiceDocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInvoiceDocuments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInvoiceDocuments());
            }
            $query = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDocument($this)
                ->count($con);
        }

        return count($this->collInvoiceDocuments);
    }

    /**
     * Method called to associate a ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument object to this object
     * through the ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument foreign key attribute.
     *
     * @param    ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument $l ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function addInvoiceDocument(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument $l)
    {
        if ($this->collInvoiceDocuments === null) {
            $this->initInvoiceDocuments();
            $this->collInvoiceDocumentsPartial = true;
        }

        if (!in_array($l, $this->collInvoiceDocuments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInvoiceDocument($l);

            if ($this->invoiceDocumentsScheduledForDeletion and $this->invoiceDocumentsScheduledForDeletion->contains($l)) {
                $this->invoiceDocumentsScheduledForDeletion->remove($this->invoiceDocumentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	InvoiceDocument $invoiceDocument The invoiceDocument object to add.
     */
    protected function doAddInvoiceDocument($invoiceDocument)
    {
        $this->collInvoiceDocuments[]= $invoiceDocument;
        $invoiceDocument->setDocument($this);
    }

    /**
     * @param	InvoiceDocument $invoiceDocument The invoiceDocument object to remove.
     * @return ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function removeInvoiceDocument($invoiceDocument)
    {
        if ($this->getInvoiceDocuments()->contains($invoiceDocument)) {
            $this->collInvoiceDocuments->remove($this->collInvoiceDocuments->search($invoiceDocument));
            if (null === $this->invoiceDocumentsScheduledForDeletion) {
                $this->invoiceDocumentsScheduledForDeletion = clone $this->collInvoiceDocuments;
                $this->invoiceDocumentsScheduledForDeletion->clear();
            }
            $this->invoiceDocumentsScheduledForDeletion[]= clone $invoiceDocument;
            $invoiceDocument->setDocument(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacDocument is new, it will return
     * an empty collection; or if this PacDocument has previously
     * been saved, it will retrieve related InvoiceDocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacDocument.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument[] List of ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocument objects
     */
    public function getInvoiceDocumentsJoinInvoice($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceDocumentQuery::create(null, $criteria);
        $query->joinWith('Invoice', $join_behavior);

        return $this->getInvoiceDocuments($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_document = null;
        $this->fk_sales_order = null;
        $this->fk_document_render_engine = null;
        $this->fk_document_configuration = null;
        $this->data = null;
        $this->template = null;
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
            if ($this->collDocumentRenderProcesses) {
                foreach ($this->collDocumentRenderProcesses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInvoiceDocuments) {
                foreach ($this->collInvoiceDocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }
            if ($this->aRenderEngine instanceof Persistent) {
              $this->aRenderEngine->clearAllReferences($deep);
            }
            if ($this->aConfiguration instanceof Persistent) {
              $this->aConfiguration->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDocumentRenderProcesses instanceof PropelCollection) {
            $this->collDocumentRenderProcesses->clearIterator();
        }
        $this->collDocumentRenderProcesses = null;
        if ($this->collInvoiceDocuments instanceof PropelCollection) {
            $this->collInvoiceDocuments->clearIterator();
        }
        $this->collInvoiceDocuments = null;
        $this->aOrder = null;
        $this->aRenderEngine = null;
        $this->aConfiguration = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Document_Persistence_Propel_PacDocument The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Document_Persistence_Propel_PacDocumentPeer::UPDATED_AT;

        return $this;
    }

}
