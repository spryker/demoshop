<?php


/**
 * Base class that represents a row from the 'pac_cms_template' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsTemplate extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_cms_template field.
     * @var        int
     */
    protected $id_cms_template;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the template_type field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $template_type;

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
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects.
     */
    protected $collPacCmsPages;
    protected $collPacCmsPagesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects.
     */
    protected $collPacCmsTemplatePartials;
    protected $collPacCmsTemplatePartialsPartial;

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
    protected $pacCmsPagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacCmsTemplatePartialsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->template_type = 1;
        $this->is_deleted = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsTemplate object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_cms_template] column value.
     *
     * @return int
     */
    public function getIdCmsTemplate()
    {

        return $this->id_cms_template;
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
     * Get the [template_type] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getTemplateType()
    {
        if (null === $this->template_type) {
            return null;
        }
        $valueSet = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::getValueSet(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::TEMPLATE_TYPE);
        if (!isset($valueSet[$this->template_type])) {
            throw new PropelException('Unknown stored enum key: ' . $this->template_type);
        }

        return $valueSet[$this->template_type];
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
     * Set the value of [id_cms_template] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function setIdCmsTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_cms_template !== $v) {
            $this->id_cms_template = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::ID_CMS_TEMPLATE;
        }


        return $this;
    } // setIdCmsTemplate()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [template_type] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setTemplateType($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::getValueSet(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::TEMPLATE_TYPE);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->template_type !== $v) {
            $this->template_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::TEMPLATE_TYPE;
        }


        return $this;
    } // setTemplateType()

    /**
     * Sets the value of the [is_deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::UPDATED_AT;
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
            if ($this->template_type !== 1) {
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

            $this->id_cms_template = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->template_type = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->is_deleted = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->created_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->updated_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPacCmsPages = null;

            $this->collPacCmsTemplatePartials = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplateQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::UPDATED_AT)) {
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

                ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::addInstanceToPool($this);
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

            if ($this->pacCmsPagesScheduledForDeletion !== null) {
                if (!$this->pacCmsPagesScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacCmsPagesScheduledForDeletion as $pacCmsPage) {
                        // need to save related object because we set the relation to null
                        $pacCmsPage->save($con);
                    }
                    $this->pacCmsPagesScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsPages !== null) {
                foreach ($this->collPacCmsPages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacCmsTemplatePartialsScheduledForDeletion !== null) {
                if (!$this->pacCmsTemplatePartialsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery::create()
                        ->filterByPrimaryKeys($this->pacCmsTemplatePartialsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacCmsTemplatePartialsScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsTemplatePartials !== null) {
                foreach ($this->collPacCmsTemplatePartials as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::ID_CMS_TEMPLATE;
        if (null !== $this->id_cms_template) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::ID_CMS_TEMPLATE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::ID_CMS_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`id_cms_template`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::TEMPLATE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`template_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_cms_template` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_cms_template`':
                        $stmt->bindValue($identifier, $this->id_cms_template, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`template_type`':
                        $stmt->bindValue($identifier, $this->template_type, PDO::PARAM_INT);
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
        $this->setIdCmsTemplate($pk);

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


            if (($retval = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacCmsPages !== null) {
                    foreach ($this->collPacCmsPages as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacCmsTemplatePartials !== null) {
                    foreach ($this->collPacCmsTemplatePartials as $referrerFK) {
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
        $pos = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCmsTemplate();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getTemplateType();
                break;
            case 3:
                return $this->getIsDeleted();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCmsTemplate(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getTemplateType(),
            $keys[3] => $this->getIsDeleted(),
            $keys[4] => $this->getCreatedAt(),
            $keys[5] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collPacCmsPages) {
                $result['PacCmsPages'] = $this->collPacCmsPages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacCmsTemplatePartials) {
                $result['PacCmsTemplatePartials'] = $this->collPacCmsTemplatePartials->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCmsTemplate($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $valueSet = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::getValueSet(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::TEMPLATE_TYPE);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setTemplateType($value);
                break;
            case 3:
                $this->setIsDeleted($value);
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
        $keys = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCmsTemplate($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTemplateType($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsDeleted($arr[$keys[3]]);
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
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::ID_CMS_TEMPLATE)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::ID_CMS_TEMPLATE, $this->id_cms_template);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::NAME)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::TEMPLATE_TYPE)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::TEMPLATE_TYPE, $this->template_type);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::ID_CMS_TEMPLATE, $this->id_cms_template);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCmsTemplate();
    }

    /**
     * Generic method to set the primary key (id_cms_template column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCmsTemplate($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCmsTemplate();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setTemplateType($this->getTemplateType());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacCmsPages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsPage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacCmsTemplatePartials() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsTemplatePartial($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCmsTemplate(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate Clone of current object.
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer();
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
        if ('PacCmsPage' == $relationName) {
            $this->initPacCmsPages();
        }
        if ('PacCmsTemplatePartial' == $relationName) {
            $this->initPacCmsTemplatePartials();
        }
    }

    /**
     * Clears out the collPacCmsPages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     * @see        addPacCmsPages()
     */
    public function clearPacCmsPages()
    {
        $this->collPacCmsPages = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsPagesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsPages collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsPages($v = true)
    {
        $this->collPacCmsPagesPartial = $v;
    }

    /**
     * Initializes the collPacCmsPages collection.
     *
     * By default this just sets the collPacCmsPages collection to an empty array (like clearcollPacCmsPages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsPages($overrideExisting = true)
    {
        if (null !== $this->collPacCmsPages && !$overrideExisting) {
            return;
        }
        $this->collPacCmsPages = new PropelObjectCollection();
        $this->collPacCmsPages->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects
     * @throws PropelException
     */
    public function getPacCmsPages($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPagesPartial && !$this->isNew();
        if (null === $this->collPacCmsPages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPages) {
                // return empty collection
                $this->initPacCmsPages();
            } else {
                $collPacCmsPages = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery::create(null, $criteria)
                    ->filterByPacCmsTemplate($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsPagesPartial && count($collPacCmsPages)) {
                      $this->initPacCmsPages(false);

                      foreach ($collPacCmsPages as $obj) {
                        if (false == $this->collPacCmsPages->contains($obj)) {
                          $this->collPacCmsPages->append($obj);
                        }
                      }

                      $this->collPacCmsPagesPartial = true;
                    }

                    $collPacCmsPages->getInternalIterator()->rewind();

                    return $collPacCmsPages;
                }

                if ($partial && $this->collPacCmsPages) {
                    foreach ($this->collPacCmsPages as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsPages[] = $obj;
                        }
                    }
                }

                $this->collPacCmsPages = $collPacCmsPages;
                $this->collPacCmsPagesPartial = false;
            }
        }

        return $this->collPacCmsPages;
    }

    /**
     * Sets a collection of PacCmsPage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsPages A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function setPacCmsPages(PropelCollection $pacCmsPages, PropelPDO $con = null)
    {
        $pacCmsPagesToDelete = $this->getPacCmsPages(new Criteria(), $con)->diff($pacCmsPages);


        $this->pacCmsPagesScheduledForDeletion = $pacCmsPagesToDelete;

        foreach ($pacCmsPagesToDelete as $pacCmsPageRemoved) {
            $pacCmsPageRemoved->setPacCmsTemplate(null);
        }

        $this->collPacCmsPages = null;
        foreach ($pacCmsPages as $pacCmsPage) {
            $this->addPacCmsPage($pacCmsPage);
        }

        $this->collPacCmsPages = $pacCmsPages;
        $this->collPacCmsPagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects.
     * @throws PropelException
     */
    public function countPacCmsPages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPagesPartial && !$this->isNew();
        if (null === $this->collPacCmsPages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsPages());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacCmsTemplate($this)
                ->count($con);
        }

        return count($this->collPacCmsPages);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function addPacCmsPage(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage $l)
    {
        if ($this->collPacCmsPages === null) {
            $this->initPacCmsPages();
            $this->collPacCmsPagesPartial = true;
        }

        if (!in_array($l, $this->collPacCmsPages->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsPage($l);

            if ($this->pacCmsPagesScheduledForDeletion and $this->pacCmsPagesScheduledForDeletion->contains($l)) {
                $this->pacCmsPagesScheduledForDeletion->remove($this->pacCmsPagesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsPage $pacCmsPage The pacCmsPage object to add.
     */
    protected function doAddPacCmsPage($pacCmsPage)
    {
        $this->collPacCmsPages[]= $pacCmsPage;
        $pacCmsPage->setPacCmsTemplate($this);
    }

    /**
     * @param	PacCmsPage $pacCmsPage The pacCmsPage object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function removePacCmsPage($pacCmsPage)
    {
        if ($this->getPacCmsPages()->contains($pacCmsPage)) {
            $this->collPacCmsPages->remove($this->collPacCmsPages->search($pacCmsPage));
            if (null === $this->pacCmsPagesScheduledForDeletion) {
                $this->pacCmsPagesScheduledForDeletion = clone $this->collPacCmsPages;
                $this->pacCmsPagesScheduledForDeletion->clear();
            }
            $this->pacCmsPagesScheduledForDeletion[]= $pacCmsPage;
            $pacCmsPage->setPacCmsTemplate(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsTemplate is new, it will return
     * an empty collection; or if this PacCmsTemplate has previously
     * been saved, it will retrieve related PacCmsPages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsTemplate.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage objects
     */
    public function getPacCmsPagesJoinPacCmsLayout($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery::create(null, $criteria);
        $query->joinWith('PacCmsLayout', $join_behavior);

        return $this->getPacCmsPages($query, $con);
    }

    /**
     * Clears out the collPacCmsTemplatePartials collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     * @see        addPacCmsTemplatePartials()
     */
    public function clearPacCmsTemplatePartials()
    {
        $this->collPacCmsTemplatePartials = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsTemplatePartialsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsTemplatePartials collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsTemplatePartials($v = true)
    {
        $this->collPacCmsTemplatePartialsPartial = $v;
    }

    /**
     * Initializes the collPacCmsTemplatePartials collection.
     *
     * By default this just sets the collPacCmsTemplatePartials collection to an empty array (like clearcollPacCmsTemplatePartials());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsTemplatePartials($overrideExisting = true)
    {
        if (null !== $this->collPacCmsTemplatePartials && !$overrideExisting) {
            return;
        }
        $this->collPacCmsTemplatePartials = new PropelObjectCollection();
        $this->collPacCmsTemplatePartials->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects
     * @throws PropelException
     */
    public function getPacCmsTemplatePartials($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsTemplatePartialsPartial && !$this->isNew();
        if (null === $this->collPacCmsTemplatePartials || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsTemplatePartials) {
                // return empty collection
                $this->initPacCmsTemplatePartials();
            } else {
                $collPacCmsTemplatePartials = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery::create(null, $criteria)
                    ->filterByPacCmsTemplate($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsTemplatePartialsPartial && count($collPacCmsTemplatePartials)) {
                      $this->initPacCmsTemplatePartials(false);

                      foreach ($collPacCmsTemplatePartials as $obj) {
                        if (false == $this->collPacCmsTemplatePartials->contains($obj)) {
                          $this->collPacCmsTemplatePartials->append($obj);
                        }
                      }

                      $this->collPacCmsTemplatePartialsPartial = true;
                    }

                    $collPacCmsTemplatePartials->getInternalIterator()->rewind();

                    return $collPacCmsTemplatePartials;
                }

                if ($partial && $this->collPacCmsTemplatePartials) {
                    foreach ($this->collPacCmsTemplatePartials as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsTemplatePartials[] = $obj;
                        }
                    }
                }

                $this->collPacCmsTemplatePartials = $collPacCmsTemplatePartials;
                $this->collPacCmsTemplatePartialsPartial = false;
            }
        }

        return $this->collPacCmsTemplatePartials;
    }

    /**
     * Sets a collection of PacCmsTemplatePartial objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsTemplatePartials A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function setPacCmsTemplatePartials(PropelCollection $pacCmsTemplatePartials, PropelPDO $con = null)
    {
        $pacCmsTemplatePartialsToDelete = $this->getPacCmsTemplatePartials(new Criteria(), $con)->diff($pacCmsTemplatePartials);


        $this->pacCmsTemplatePartialsScheduledForDeletion = $pacCmsTemplatePartialsToDelete;

        foreach ($pacCmsTemplatePartialsToDelete as $pacCmsTemplatePartialRemoved) {
            $pacCmsTemplatePartialRemoved->setPacCmsTemplate(null);
        }

        $this->collPacCmsTemplatePartials = null;
        foreach ($pacCmsTemplatePartials as $pacCmsTemplatePartial) {
            $this->addPacCmsTemplatePartial($pacCmsTemplatePartial);
        }

        $this->collPacCmsTemplatePartials = $pacCmsTemplatePartials;
        $this->collPacCmsTemplatePartialsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects.
     * @throws PropelException
     */
    public function countPacCmsTemplatePartials(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsTemplatePartialsPartial && !$this->isNew();
        if (null === $this->collPacCmsTemplatePartials || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsTemplatePartials) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsTemplatePartials());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacCmsTemplate($this)
                ->count($con);
        }

        return count($this->collPacCmsTemplatePartials);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function addPacCmsTemplatePartial(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial $l)
    {
        if ($this->collPacCmsTemplatePartials === null) {
            $this->initPacCmsTemplatePartials();
            $this->collPacCmsTemplatePartialsPartial = true;
        }

        if (!in_array($l, $this->collPacCmsTemplatePartials->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsTemplatePartial($l);

            if ($this->pacCmsTemplatePartialsScheduledForDeletion and $this->pacCmsTemplatePartialsScheduledForDeletion->contains($l)) {
                $this->pacCmsTemplatePartialsScheduledForDeletion->remove($this->pacCmsTemplatePartialsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsTemplatePartial $pacCmsTemplatePartial The pacCmsTemplatePartial object to add.
     */
    protected function doAddPacCmsTemplatePartial($pacCmsTemplatePartial)
    {
        $this->collPacCmsTemplatePartials[]= $pacCmsTemplatePartial;
        $pacCmsTemplatePartial->setPacCmsTemplate($this);
    }

    /**
     * @param	PacCmsTemplatePartial $pacCmsTemplatePartial The pacCmsTemplatePartial object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function removePacCmsTemplatePartial($pacCmsTemplatePartial)
    {
        if ($this->getPacCmsTemplatePartials()->contains($pacCmsTemplatePartial)) {
            $this->collPacCmsTemplatePartials->remove($this->collPacCmsTemplatePartials->search($pacCmsTemplatePartial));
            if (null === $this->pacCmsTemplatePartialsScheduledForDeletion) {
                $this->pacCmsTemplatePartialsScheduledForDeletion = clone $this->collPacCmsTemplatePartials;
                $this->pacCmsTemplatePartialsScheduledForDeletion->clear();
            }
            $this->pacCmsTemplatePartialsScheduledForDeletion[]= clone $pacCmsTemplatePartial;
            $pacCmsTemplatePartial->setPacCmsTemplate(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsTemplate is new, it will return
     * an empty collection; or if this PacCmsTemplate has previously
     * been saved, it will retrieve related PacCmsTemplatePartials from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsTemplate.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial objects
     */
    public function getPacCmsTemplatePartialsJoinPacCmsPartial($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartialQuery::create(null, $criteria);
        $query->joinWith('PacCmsPartial', $join_behavior);

        return $this->getPacCmsTemplatePartials($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_cms_template = null;
        $this->name = null;
        $this->template_type = null;
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
            if ($this->collPacCmsPages) {
                foreach ($this->collPacCmsPages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacCmsTemplatePartials) {
                foreach ($this->collPacCmsTemplatePartials as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacCmsPages instanceof PropelCollection) {
            $this->collPacCmsPages->clearIterator();
        }
        $this->collPacCmsPages = null;
        if ($this->collPacCmsTemplatePartials instanceof PropelCollection) {
            $this->collPacCmsTemplatePartials->clearIterator();
        }
        $this->collPacCmsTemplatePartials = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePeer::UPDATED_AT;

        return $this;
    }

}
