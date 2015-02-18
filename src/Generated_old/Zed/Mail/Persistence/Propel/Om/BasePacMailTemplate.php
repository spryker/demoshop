<?php


/**
 * Base class that represents a row from the 'pac_mail_template' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.om
 */
abstract class Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplate extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mail_template field.
     * @var        int
     */
    protected $id_mail_template;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the subject field.
     * @var        string
     */
    protected $subject;

    /**
     * The value for the sender field.
     * @var        string
     */
    protected $sender;

    /**
     * The value for the sender_name field.
     * @var        string
     */
    protected $sender_name;

    /**
     * The value for the text field.
     * @var        string
     */
    protected $text;

    /**
     * The value for the html field.
     * @var        string
     */
    protected $html;

    /**
     * The value for the date_interval field.
     * @var        string
     */
    protected $date_interval;

    /**
     * The value for the wrapper field.
     * @var        int
     */
    protected $wrapper;

    /**
     * The value for the deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $deleted;

    /**
     * The value for the version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $version;

    /**
     * The value for the version_created_at field.
     * @var        string
     */
    protected $version_created_at;

    /**
     * The value for the version_created_by field.
     * @var        string
     */
    protected $version_created_by;

    /**
     * @var        PacMailTemplate
     */
    protected $aMailTemplateWrapper;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate[] Collection to store aggregation of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects.
     */
    protected $collMailTemplates;
    protected $collMailTemplatesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion[] Collection to store aggregation of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects.
     */
    protected $collPacMailTemplateVersions;
    protected $collPacMailTemplateVersionsPartial;

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

    // versionable behavior


    /**
     * @var bool
     */
    protected $enforceVersion = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mailTemplatesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacMailTemplateVersionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->deleted = false;
        $this->version = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplate object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_mail_template] column value.
     *
     * @return int
     */
    public function getIdMailTemplate()
    {

        return $this->id_mail_template;
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
     * Get the [subject] column value.
     *
     * @return string
     */
    public function getSubject()
    {

        return $this->subject;
    }

    /**
     * Get the [sender] column value.
     *
     * @return string
     */
    public function getSender()
    {

        return $this->sender;
    }

    /**
     * Get the [sender_name] column value.
     *
     * @return string
     */
    public function getSenderName()
    {

        return $this->sender_name;
    }

    /**
     * Get the [text] column value.
     *
     * @return string
     */
    public function getText()
    {

        return $this->text;
    }

    /**
     * Get the [html] column value.
     *
     * @return string
     */
    public function getHtml()
    {

        return $this->html;
    }

    /**
     * Get the [date_interval] column value.
     *
     * @return string
     */
    public function getDateInterval()
    {

        return $this->date_interval;
    }

    /**
     * Get the [wrapper] column value.
     *
     * @return int
     */
    public function getWrapper()
    {

        return $this->wrapper;
    }

    /**
     * Get the [deleted] column value.
     *
     * @return boolean
     */
    public function getDeleted()
    {

        return $this->deleted;
    }

    /**
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {

        return $this->version;
    }

    /**
     * Get the [optionally formatted] temporal [version_created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getVersionCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->version_created_at === null) {
            return null;
        }

        if ($this->version_created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->version_created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->version_created_at, true), $x);
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
     * Get the [version_created_by] column value.
     *
     * @return string
     */
    public function getVersionCreatedBy()
    {

        return $this->version_created_by;
    }

    /**
     * Set the value of [id_mail_template] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setIdMailTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mail_template !== $v) {
            $this->id_mail_template = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE;
        }


        return $this;
    } // setIdMailTemplate()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [subject] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setSubject($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->subject !== $v) {
            $this->subject = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SUBJECT;
        }


        return $this;
    } // setSubject()

    /**
     * Set the value of [sender] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setSender($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sender !== $v) {
            $this->sender = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER;
        }


        return $this;
    } // setSender()

    /**
     * Set the value of [sender_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setSenderName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sender_name !== $v) {
            $this->sender_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER_NAME;
        }


        return $this;
    } // setSenderName()

    /**
     * Set the value of [text] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setText($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->text !== $v) {
            $this->text = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::TEXT;
        }


        return $this;
    } // setText()

    /**
     * Set the value of [html] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setHtml($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->html !== $v) {
            $this->html = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::HTML;
        }


        return $this;
    } // setHtml()

    /**
     * Set the value of [date_interval] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setDateInterval($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->date_interval !== $v) {
            $this->date_interval = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATE_INTERVAL;
        }


        return $this;
    } // setDateInterval()

    /**
     * Set the value of [wrapper] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setWrapper($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->wrapper !== $v) {
            $this->wrapper = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER;
        }

        if ($this->aMailTemplateWrapper !== null && $this->aMailTemplateWrapper->getIdMailTemplate() !== $v) {
            $this->aMailTemplateWrapper = null;
        }


        return $this;
    } // setWrapper()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->deleted !== $v) {
            $this->deleted = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [version] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Sets the value of [version_created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setVersionCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->version_created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->version_created_at !== null && $tmpDt = new DateTime($this->version_created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->version_created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setVersionCreatedAt()

    /**
     * Set the value of [version_created_by] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setVersionCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->version_created_by !== $v) {
            $this->version_created_by = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_BY;
        }


        return $this;
    } // setVersionCreatedBy()

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
            if ($this->deleted !== false) {
                return false;
            }

            if ($this->version !== 0) {
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

            $this->id_mail_template = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->subject = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sender = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->sender_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->text = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->html = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->date_interval = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->wrapper = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->deleted = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->version = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->version_created_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->version_created_by = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 13; // 13 = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object", $e);
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

        if ($this->aMailTemplateWrapper !== null && $this->wrapper !== $this->aMailTemplateWrapper->getIdMailTemplate()) {
            $this->aMailTemplateWrapper = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMailTemplateWrapper = null;
            $this->collMailTemplates = null;

            $this->collPacMailTemplateVersions = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // versionable behavior
            if ($this->isVersioningNecessary()) {
                $this->setVersion($this->isNew() ? 1 : $this->getLastVersionNumber($con) + 1);
                if (!$this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT)) {
                    $this->setVersionCreatedAt(time());
                }
                $createVersion = true; // for postSave hook
            }
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
                // versionable behavior
                if (isset($createVersion)) {
                    $this->addVersion($con);
                }
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

                ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::addInstanceToPool($this);
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

            if ($this->aMailTemplateWrapper !== null) {
                if ($this->aMailTemplateWrapper->isModified() || $this->aMailTemplateWrapper->isNew()) {
                    $affectedRows += $this->aMailTemplateWrapper->save($con);
                }
                $this->setMailTemplateWrapper($this->aMailTemplateWrapper);
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

            if ($this->mailTemplatesScheduledForDeletion !== null) {
                if (!$this->mailTemplatesScheduledForDeletion->isEmpty()) {
                    foreach ($this->mailTemplatesScheduledForDeletion as $mailTemplate) {
                        // need to save related object because we set the relation to null
                        $mailTemplate->save($con);
                    }
                    $this->mailTemplatesScheduledForDeletion = null;
                }
            }

            if ($this->collMailTemplates !== null) {
                foreach ($this->collMailTemplates as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacMailTemplateVersionsScheduledForDeletion !== null) {
                if (!$this->pacMailTemplateVersionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create()
                        ->filterByPrimaryKeys($this->pacMailTemplateVersionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacMailTemplateVersionsScheduledForDeletion = null;
                }
            }

            if ($this->collPacMailTemplateVersions !== null) {
                foreach ($this->collPacMailTemplateVersions as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE;
        if (null !== $this->id_mail_template) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`id_mail_template`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SUBJECT)) {
            $modifiedColumns[':p' . $index++]  = '`subject`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER)) {
            $modifiedColumns[':p' . $index++]  = '`sender`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`sender_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::TEXT)) {
            $modifiedColumns[':p' . $index++]  = '`text`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::HTML)) {
            $modifiedColumns[':p' . $index++]  = '`html`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATE_INTERVAL)) {
            $modifiedColumns[':p' . $index++]  = '`date_interval`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER)) {
            $modifiedColumns[':p' . $index++]  = '`wrapper`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_by`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_mail_template` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mail_template`':
                        $stmt->bindValue($identifier, $this->id_mail_template, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`subject`':
                        $stmt->bindValue($identifier, $this->subject, PDO::PARAM_STR);
                        break;
                    case '`sender`':
                        $stmt->bindValue($identifier, $this->sender, PDO::PARAM_STR);
                        break;
                    case '`sender_name`':
                        $stmt->bindValue($identifier, $this->sender_name, PDO::PARAM_STR);
                        break;
                    case '`text`':
                        $stmt->bindValue($identifier, $this->text, PDO::PARAM_STR);
                        break;
                    case '`html`':
                        $stmt->bindValue($identifier, $this->html, PDO::PARAM_STR);
                        break;
                    case '`date_interval`':
                        $stmt->bindValue($identifier, $this->date_interval, PDO::PARAM_STR);
                        break;
                    case '`wrapper`':
                        $stmt->bindValue($identifier, $this->wrapper, PDO::PARAM_INT);
                        break;
                    case '`deleted`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
                        break;
                    case '`version_created_at`':
                        $stmt->bindValue($identifier, $this->version_created_at, PDO::PARAM_STR);
                        break;
                    case '`version_created_by`':
                        $stmt->bindValue($identifier, $this->version_created_by, PDO::PARAM_STR);
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
        $this->setIdMailTemplate($pk);

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

            if ($this->aMailTemplateWrapper !== null) {
                if (!$this->aMailTemplateWrapper->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMailTemplateWrapper->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMailTemplates !== null) {
                    foreach ($this->collMailTemplates as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacMailTemplateVersions !== null) {
                    foreach ($this->collPacMailTemplateVersions as $referrerFK) {
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
        $pos = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMailTemplate();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getSubject();
                break;
            case 3:
                return $this->getSender();
                break;
            case 4:
                return $this->getSenderName();
                break;
            case 5:
                return $this->getText();
                break;
            case 6:
                return $this->getHtml();
                break;
            case 7:
                return $this->getDateInterval();
                break;
            case 8:
                return $this->getWrapper();
                break;
            case 9:
                return $this->getDeleted();
                break;
            case 10:
                return $this->getVersion();
                break;
            case 11:
                return $this->getVersionCreatedAt();
                break;
            case 12:
                return $this->getVersionCreatedBy();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMailTemplate(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getSubject(),
            $keys[3] => $this->getSender(),
            $keys[4] => $this->getSenderName(),
            $keys[5] => $this->getText(),
            $keys[6] => $this->getHtml(),
            $keys[7] => $this->getDateInterval(),
            $keys[8] => $this->getWrapper(),
            $keys[9] => $this->getDeleted(),
            $keys[10] => $this->getVersion(),
            $keys[11] => $this->getVersionCreatedAt(),
            $keys[12] => $this->getVersionCreatedBy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMailTemplateWrapper) {
                $result['MailTemplateWrapper'] = $this->aMailTemplateWrapper->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMailTemplates) {
                $result['MailTemplates'] = $this->collMailTemplates->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacMailTemplateVersions) {
                $result['PacMailTemplateVersions'] = $this->collPacMailTemplateVersions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMailTemplate($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setSubject($value);
                break;
            case 3:
                $this->setSender($value);
                break;
            case 4:
                $this->setSenderName($value);
                break;
            case 5:
                $this->setText($value);
                break;
            case 6:
                $this->setHtml($value);
                break;
            case 7:
                $this->setDateInterval($value);
                break;
            case 8:
                $this->setWrapper($value);
                break;
            case 9:
                $this->setDeleted($value);
                break;
            case 10:
                $this->setVersion($value);
                break;
            case 11:
                $this->setVersionCreatedAt($value);
                break;
            case 12:
                $this->setVersionCreatedBy($value);
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
        $keys = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMailTemplate($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSubject($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSender($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSenderName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setText($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setHtml($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDateInterval($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setWrapper($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDeleted($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setVersion($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setVersionCreatedAt($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setVersionCreatedBy($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $this->id_mail_template);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::NAME)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SUBJECT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SUBJECT, $this->subject);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER, $this->sender);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER_NAME)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER_NAME, $this->sender_name);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::TEXT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::TEXT, $this->text);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::HTML)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::HTML, $this->html);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATE_INTERVAL)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATE_INTERVAL, $this->date_interval);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER, $this->wrapper);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DELETED)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION, $this->version);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT, $this->version_created_at);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_BY)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_BY, $this->version_created_by);

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
        $criteria = new Criteria(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $this->id_mail_template);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMailTemplate();
    }

    /**
     * Generic method to set the primary key (id_mail_template column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMailTemplate($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMailTemplate();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setSubject($this->getSubject());
        $copyObj->setSender($this->getSender());
        $copyObj->setSenderName($this->getSenderName());
        $copyObj->setText($this->getText());
        $copyObj->setHtml($this->getHtml());
        $copyObj->setDateInterval($this->getDateInterval());
        $copyObj->setWrapper($this->getWrapper());
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setVersionCreatedAt($this->getVersionCreatedAt());
        $copyObj->setVersionCreatedBy($this->getVersionCreatedBy());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMailTemplates() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMailTemplate($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacMailTemplateVersions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacMailTemplateVersion($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMailTemplate(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate Clone of current object.
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object.
     *
     * @param                  ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate $v
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMailTemplateWrapper(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate $v = null)
    {
        if ($v === null) {
            $this->setWrapper(NULL);
        } else {
            $this->setWrapper($v->getIdMailTemplate());
        }

        $this->aMailTemplateWrapper = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object, it will not be re-added.
        if ($v !== null) {
            $v->addMailTemplate($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The associated ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object.
     * @throws PropelException
     */
    public function getMailTemplateWrapper(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMailTemplateWrapper === null && ($this->wrapper !== null) && $doQuery) {
            $this->aMailTemplateWrapper = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery::create()->findPk($this->wrapper, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMailTemplateWrapper->addMailTemplates($this);
             */
        }

        return $this->aMailTemplateWrapper;
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
        if ('MailTemplate' == $relationName) {
            $this->initMailTemplates();
        }
        if ('PacMailTemplateVersion' == $relationName) {
            $this->initPacMailTemplateVersions();
        }
    }

    /**
     * Clears out the collMailTemplates collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     * @see        addMailTemplates()
     */
    public function clearMailTemplates()
    {
        $this->collMailTemplates = null; // important to set this to null since that means it is uninitialized
        $this->collMailTemplatesPartial = null;

        return $this;
    }

    /**
     * reset is the collMailTemplates collection loaded partially
     *
     * @return void
     */
    public function resetPartialMailTemplates($v = true)
    {
        $this->collMailTemplatesPartial = $v;
    }

    /**
     * Initializes the collMailTemplates collection.
     *
     * By default this just sets the collMailTemplates collection to an empty array (like clearcollMailTemplates());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMailTemplates($overrideExisting = true)
    {
        if (null !== $this->collMailTemplates && !$overrideExisting) {
            return;
        }
        $this->collMailTemplates = new PropelObjectCollection();
        $this->collMailTemplates->setModel('ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate');
    }

    /**
     * Gets an array of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate[] List of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects
     * @throws PropelException
     */
    public function getMailTemplates($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMailTemplatesPartial && !$this->isNew();
        if (null === $this->collMailTemplates || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMailTemplates) {
                // return empty collection
                $this->initMailTemplates();
            } else {
                $collMailTemplates = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery::create(null, $criteria)
                    ->filterByMailTemplateWrapper($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMailTemplatesPartial && count($collMailTemplates)) {
                      $this->initMailTemplates(false);

                      foreach ($collMailTemplates as $obj) {
                        if (false == $this->collMailTemplates->contains($obj)) {
                          $this->collMailTemplates->append($obj);
                        }
                      }

                      $this->collMailTemplatesPartial = true;
                    }

                    $collMailTemplates->getInternalIterator()->rewind();

                    return $collMailTemplates;
                }

                if ($partial && $this->collMailTemplates) {
                    foreach ($this->collMailTemplates as $obj) {
                        if ($obj->isNew()) {
                            $collMailTemplates[] = $obj;
                        }
                    }
                }

                $this->collMailTemplates = $collMailTemplates;
                $this->collMailTemplatesPartial = false;
            }
        }

        return $this->collMailTemplates;
    }

    /**
     * Sets a collection of MailTemplate objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mailTemplates A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setMailTemplates(PropelCollection $mailTemplates, PropelPDO $con = null)
    {
        $mailTemplatesToDelete = $this->getMailTemplates(new Criteria(), $con)->diff($mailTemplates);


        $this->mailTemplatesScheduledForDeletion = $mailTemplatesToDelete;

        foreach ($mailTemplatesToDelete as $mailTemplateRemoved) {
            $mailTemplateRemoved->setMailTemplateWrapper(null);
        }

        $this->collMailTemplates = null;
        foreach ($mailTemplates as $mailTemplate) {
            $this->addMailTemplate($mailTemplate);
        }

        $this->collMailTemplates = $mailTemplates;
        $this->collMailTemplatesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects.
     * @throws PropelException
     */
    public function countMailTemplates(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMailTemplatesPartial && !$this->isNew();
        if (null === $this->collMailTemplates || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMailTemplates) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMailTemplates());
            }
            $query = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMailTemplateWrapper($this)
                ->count($con);
        }

        return count($this->collMailTemplates);
    }

    /**
     * Method called to associate a ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object to this object
     * through the ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate foreign key attribute.
     *
     * @param    ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate $l ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function addMailTemplate(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate $l)
    {
        if ($this->collMailTemplates === null) {
            $this->initMailTemplates();
            $this->collMailTemplatesPartial = true;
        }

        if (!in_array($l, $this->collMailTemplates->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMailTemplate($l);

            if ($this->mailTemplatesScheduledForDeletion and $this->mailTemplatesScheduledForDeletion->contains($l)) {
                $this->mailTemplatesScheduledForDeletion->remove($this->mailTemplatesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	MailTemplate $mailTemplate The mailTemplate object to add.
     */
    protected function doAddMailTemplate($mailTemplate)
    {
        $this->collMailTemplates[]= $mailTemplate;
        $mailTemplate->setMailTemplateWrapper($this);
    }

    /**
     * @param	MailTemplate $mailTemplate The mailTemplate object to remove.
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function removeMailTemplate($mailTemplate)
    {
        if ($this->getMailTemplates()->contains($mailTemplate)) {
            $this->collMailTemplates->remove($this->collMailTemplates->search($mailTemplate));
            if (null === $this->mailTemplatesScheduledForDeletion) {
                $this->mailTemplatesScheduledForDeletion = clone $this->collMailTemplates;
                $this->mailTemplatesScheduledForDeletion->clear();
            }
            $this->mailTemplatesScheduledForDeletion[]= $mailTemplate;
            $mailTemplate->setMailTemplateWrapper(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacMailTemplateVersions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     * @see        addPacMailTemplateVersions()
     */
    public function clearPacMailTemplateVersions()
    {
        $this->collPacMailTemplateVersions = null; // important to set this to null since that means it is uninitialized
        $this->collPacMailTemplateVersionsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacMailTemplateVersions collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacMailTemplateVersions($v = true)
    {
        $this->collPacMailTemplateVersionsPartial = $v;
    }

    /**
     * Initializes the collPacMailTemplateVersions collection.
     *
     * By default this just sets the collPacMailTemplateVersions collection to an empty array (like clearcollPacMailTemplateVersions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacMailTemplateVersions($overrideExisting = true)
    {
        if (null !== $this->collPacMailTemplateVersions && !$overrideExisting) {
            return;
        }
        $this->collPacMailTemplateVersions = new PropelObjectCollection();
        $this->collPacMailTemplateVersions->setModel('ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion');
    }

    /**
     * Gets an array of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion[] List of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects
     * @throws PropelException
     */
    public function getPacMailTemplateVersions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacMailTemplateVersionsPartial && !$this->isNew();
        if (null === $this->collPacMailTemplateVersions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacMailTemplateVersions) {
                // return empty collection
                $this->initPacMailTemplateVersions();
            } else {
                $collPacMailTemplateVersions = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create(null, $criteria)
                    ->filterByPacMailTemplate($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacMailTemplateVersionsPartial && count($collPacMailTemplateVersions)) {
                      $this->initPacMailTemplateVersions(false);

                      foreach ($collPacMailTemplateVersions as $obj) {
                        if (false == $this->collPacMailTemplateVersions->contains($obj)) {
                          $this->collPacMailTemplateVersions->append($obj);
                        }
                      }

                      $this->collPacMailTemplateVersionsPartial = true;
                    }

                    $collPacMailTemplateVersions->getInternalIterator()->rewind();

                    return $collPacMailTemplateVersions;
                }

                if ($partial && $this->collPacMailTemplateVersions) {
                    foreach ($this->collPacMailTemplateVersions as $obj) {
                        if ($obj->isNew()) {
                            $collPacMailTemplateVersions[] = $obj;
                        }
                    }
                }

                $this->collPacMailTemplateVersions = $collPacMailTemplateVersions;
                $this->collPacMailTemplateVersionsPartial = false;
            }
        }

        return $this->collPacMailTemplateVersions;
    }

    /**
     * Sets a collection of PacMailTemplateVersion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacMailTemplateVersions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function setPacMailTemplateVersions(PropelCollection $pacMailTemplateVersions, PropelPDO $con = null)
    {
        $pacMailTemplateVersionsToDelete = $this->getPacMailTemplateVersions(new Criteria(), $con)->diff($pacMailTemplateVersions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->pacMailTemplateVersionsScheduledForDeletion = clone $pacMailTemplateVersionsToDelete;

        foreach ($pacMailTemplateVersionsToDelete as $pacMailTemplateVersionRemoved) {
            $pacMailTemplateVersionRemoved->setPacMailTemplate(null);
        }

        $this->collPacMailTemplateVersions = null;
        foreach ($pacMailTemplateVersions as $pacMailTemplateVersion) {
            $this->addPacMailTemplateVersion($pacMailTemplateVersion);
        }

        $this->collPacMailTemplateVersions = $pacMailTemplateVersions;
        $this->collPacMailTemplateVersionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects.
     * @throws PropelException
     */
    public function countPacMailTemplateVersions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacMailTemplateVersionsPartial && !$this->isNew();
        if (null === $this->collPacMailTemplateVersions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacMailTemplateVersions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacMailTemplateVersions());
            }
            $query = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacMailTemplate($this)
                ->count($con);
        }

        return count($this->collPacMailTemplateVersions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion object to this object
     * through the ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion foreign key attribute.
     *
     * @param    ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion $l ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function addPacMailTemplateVersion(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion $l)
    {
        if ($this->collPacMailTemplateVersions === null) {
            $this->initPacMailTemplateVersions();
            $this->collPacMailTemplateVersionsPartial = true;
        }

        if (!in_array($l, $this->collPacMailTemplateVersions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacMailTemplateVersion($l);

            if ($this->pacMailTemplateVersionsScheduledForDeletion and $this->pacMailTemplateVersionsScheduledForDeletion->contains($l)) {
                $this->pacMailTemplateVersionsScheduledForDeletion->remove($this->pacMailTemplateVersionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacMailTemplateVersion $pacMailTemplateVersion The pacMailTemplateVersion object to add.
     */
    protected function doAddPacMailTemplateVersion($pacMailTemplateVersion)
    {
        $this->collPacMailTemplateVersions[]= $pacMailTemplateVersion;
        $pacMailTemplateVersion->setPacMailTemplate($this);
    }

    /**
     * @param	PacMailTemplateVersion $pacMailTemplateVersion The pacMailTemplateVersion object to remove.
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function removePacMailTemplateVersion($pacMailTemplateVersion)
    {
        if ($this->getPacMailTemplateVersions()->contains($pacMailTemplateVersion)) {
            $this->collPacMailTemplateVersions->remove($this->collPacMailTemplateVersions->search($pacMailTemplateVersion));
            if (null === $this->pacMailTemplateVersionsScheduledForDeletion) {
                $this->pacMailTemplateVersionsScheduledForDeletion = clone $this->collPacMailTemplateVersions;
                $this->pacMailTemplateVersionsScheduledForDeletion->clear();
            }
            $this->pacMailTemplateVersionsScheduledForDeletion[]= clone $pacMailTemplateVersion;
            $pacMailTemplateVersion->setPacMailTemplate(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mail_template = null;
        $this->name = null;
        $this->subject = null;
        $this->sender = null;
        $this->sender_name = null;
        $this->text = null;
        $this->html = null;
        $this->date_interval = null;
        $this->wrapper = null;
        $this->deleted = null;
        $this->version = null;
        $this->version_created_at = null;
        $this->version_created_by = null;
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
            if ($this->collMailTemplates) {
                foreach ($this->collMailTemplates as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacMailTemplateVersions) {
                foreach ($this->collPacMailTemplateVersions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMailTemplateWrapper instanceof Persistent) {
              $this->aMailTemplateWrapper->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMailTemplates instanceof PropelCollection) {
            $this->collMailTemplates->clearIterator();
        }
        $this->collMailTemplates = null;
        if ($this->collPacMailTemplateVersions instanceof PropelCollection) {
            $this->collPacMailTemplateVersions->clearIterator();
        }
        $this->collPacMailTemplateVersions = null;
        $this->aMailTemplateWrapper = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DEFAULT_STRING_FORMAT);
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

    // versionable behavior

    /**
     * Enforce a new Version of this object upon next save.
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate
     */
    public function enforceVersioning()
    {
        $this->enforceVersion = true;

        return $this;
    }

    /**
     * Checks whether the current state must be recorded as a version
     *
     * @param PropelPDO $con An optional PropelPDO connection to use.
     *
     * @return  boolean
     */
    public function isVersioningNecessary($con = null)
    {
        if ($this->alreadyInSave) {
            return false;
        }

        if ($this->enforceVersion) {
            return true;
        }

        if (ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::isVersioningEnabled() && ($this->isNew() || $this->isModified() || $this->isDeleted())) {
            return true;
        }
        if (null !== ($object = $this->getMailTemplateWrapper($con)) && $object->isVersioningNecessary($con)) {
            return true;
        }

        if ($this->collMailTemplates) {
            // to avoid infinite loops, emulate in save
            $this->alreadyInSave = true;

            foreach ($this->getMailTemplates(null, $con) as $relatedObject) {
                if ($relatedObject->isVersioningNecessary($con)) {
                    $this->alreadyInSave = false;

                    return true;
                }
            }

            $this->alreadyInSave = false;
        }


        return false;
    }

    /**
     * Creates a version of the current object and saves it.
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion A version object
     */
    public function addVersion($con = null)
    {
        $this->enforceVersion = false;

        $version = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion();
        $version->setIdMailTemplate($this->getIdMailTemplate());
        $version->setName($this->getName());
        $version->setSubject($this->getSubject());
        $version->setSender($this->getSender());
        $version->setSenderName($this->getSenderName());
        $version->setText($this->getText());
        $version->setHtml($this->getHtml());
        $version->setDateInterval($this->getDateInterval());
        $version->setWrapper($this->getWrapper());
        $version->setDeleted($this->getDeleted());
        $version->setVersion($this->getVersion());
        $version->setVersionCreatedAt($this->getVersionCreatedAt());
        $version->setVersionCreatedBy($this->getVersionCreatedBy());
        $version->setPacMailTemplate($this);
        if (($related = $this->getMailTemplateWrapper($con)) && $related->getVersion()) {
            $version->setWrapperVersion($related->getVersion());
        }
        if ($relateds = $this->getMailTemplates($con)->toKeyValue('IdMailTemplate', 'Version')) {
            $version->setPacMailTemplateIds(array_keys($relateds));
            $version->setPacMailTemplateVersions(array_values($relateds));
        }
        $version->save($con);

        return $version;
    }

    /**
     * Sets the properties of the current object to the value they had at a specific version
     *
     * @param   integer $versionNumber The version number to read
     * @param   PropelPDO $con the connection to use
     *
     * @return  ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     * @throws  PropelException - if no object with the given version can be found.
     */
    public function toVersion($versionNumber, $con = null)
    {
        $version = $this->getOneVersion($versionNumber, $con);
        if (!$version) {
            throw new PropelException(sprintf('No ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object found with version %d', $versionNumber));
        }
        $this->populateFromVersion($version, $con);

        return $this;
    }

    /**
     * Sets the properties of the curent object to the value they had at a specific version
     *
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion $version The version object to use
     * @param   PropelPDO $con the connection to use
     * @param   array $loadedObjects objects thats been loaded in a chain of populateFromVersion calls on referrer or fk objects.
     *
     * @return  ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The current object (for fluent API support)
     */
    public function populateFromVersion($version, $con = null, &$loadedObjects = array())
    {

        $loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$version->getIdMailTemplate()][$version->getVersion()] = $this;
        $this->setIdMailTemplate($version->getIdMailTemplate());
        $this->setName($version->getName());
        $this->setSubject($version->getSubject());
        $this->setSender($version->getSender());
        $this->setSenderName($version->getSenderName());
        $this->setText($version->getText());
        $this->setHtml($version->getHtml());
        $this->setDateInterval($version->getDateInterval());
        $this->setWrapper($version->getWrapper());
        $this->setDeleted($version->getDeleted());
        $this->setVersion($version->getVersion());
        $this->setVersionCreatedAt($version->getVersionCreatedAt());
        $this->setVersionCreatedBy($version->getVersionCreatedBy());
        if ($fkValue = $version->getWrapper()) {
            if (isset($loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate']) && isset($loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$fkValue]) && isset($loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$fkValue][$version->getWrapperVersion()])) {
                $related = $loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$fkValue][$version->getWrapperVersion()];
            } else {
                $related = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate();
                $relatedVersion = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create()
                    ->filterByIdMailTemplate($fkValue)
                    ->filterByVersion($version->getWrapperVersion())
                    ->findOne($con);
                $related->populateFromVersion($relatedVersion, $con, $loadedObjects);
                $related->setNew(false);
            }
            $this->setMailTemplateWrapper($related);
        }
        if ($fkValues = $version->getPacMailTemplateIds()) {
            $this->clearMailTemplates();
            $fkVersions = $version->getPacMailTemplateVersions();
            $query = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create();
            foreach ($fkValues as $key => $value) {
                $c1 = $query->getNewCriterion(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $value);
                $c2 = $query->getNewCriterion(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $fkVersions[$key]);
                $c1->addAnd($c2);
                $query->addOr($c1);
            }
            foreach ($query->find($con) as $relatedVersion) {
                if (isset($loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate']) && isset($loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$relatedVersion->getIdMailTemplate()]) && isset($loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$relatedVersion->getIdMailTemplate()][$relatedVersion->getVersion()])) {
                    $related = $loadedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate'][$relatedVersion->getIdMailTemplate()][$relatedVersion->getVersion()];
                } else {
                    $related = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate();
                    $related->populateFromVersion($relatedVersion, $con, $loadedObjects);
                    $related->setNew(false);
                }
                $this->addMailTemplate($related);
            }

            $this->resetPartialMailTemplates(false);
        }

        return $this;
    }

    /**
     * Gets the latest persisted version number for the current object
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  integer
     */
    public function getLastVersionNumber($con = null)
    {
        $v = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create()
            ->filterByPacMailTemplate($this)
            ->orderByVersion('desc')
            ->findOne($con);
        if (!$v) {
            return 0;
        }

        return $v->getVersion();
    }

    /**
     * Checks whether the current object is the latest one
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  boolean
     */
    public function isLastVersion($con = null)
    {
        return $this->getLastVersionNumber($con) == $this->getVersion();
    }

    /**
     * Retrieves a version object for this entity and a version number
     *
     * @param   integer $versionNumber The version number to read
     * @param   PropelPDO $con the connection to use
     *
     * @return  ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion A version object
     */
    public function getOneVersion($versionNumber, $con = null)
    {
        return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create()
            ->filterByPacMailTemplate($this)
            ->filterByVersion($versionNumber)
            ->findOne($con);
    }

    /**
     * Gets all the versions of this object, in incremental order
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  PropelObjectCollection A list of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects
     */
    public function getAllVersions($con = null)
    {
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION);

        return $this->getPacMailTemplateVersions($criteria, $con);
    }

    /**
     * Compares the current object with another of its version.
     * <code>
     * print_r($book->compareVersion(1));
     * => array(
     *   '1' => array('Title' => 'Book title at version 1'),
     *   '2' => array('Title' => 'Book title at version 2')
     * );
     * </code>
     *
     * @param   integer   $versionNumber
     * @param   string    $keys Main key used for the result diff (versions|columns)
     * @param   PropelPDO $con the connection to use
     * @param   array     $ignoredColumns  The columns to exclude from the diff.
     *
     * @return  array A list of differences
     */
    public function compareVersion($versionNumber, $keys = 'columns', $con = null, $ignoredColumns = array())
    {
        $fromVersion = $this->toArray();
        $toVersion = $this->getOneVersion($versionNumber, $con)->toArray();

        return $this->computeDiff($fromVersion, $toVersion, $keys, $ignoredColumns);
    }

    /**
     * Compares two versions of the current object.
     * <code>
     * print_r($book->compareVersions(1, 2));
     * => array(
     *   '1' => array('Title' => 'Book title at version 1'),
     *   '2' => array('Title' => 'Book title at version 2')
     * );
     * </code>
     *
     * @param   integer   $fromVersionNumber
     * @param   integer   $toVersionNumber
     * @param   string    $keys Main key used for the result diff (versions|columns)
     * @param   PropelPDO $con the connection to use
     * @param   array     $ignoredColumns  The columns to exclude from the diff.
     *
     * @return  array A list of differences
     */
    public function compareVersions($fromVersionNumber, $toVersionNumber, $keys = 'columns', $con = null, $ignoredColumns = array())
    {
        $fromVersion = $this->getOneVersion($fromVersionNumber, $con)->toArray();
        $toVersion = $this->getOneVersion($toVersionNumber, $con)->toArray();

        return $this->computeDiff($fromVersion, $toVersion, $keys, $ignoredColumns);
    }

    /**
     * Computes the diff between two versions.
     * <code>
     * print_r($this->computeDiff(1, 2));
     * => array(
     *   '1' => array('Title' => 'Book title at version 1'),
     *   '2' => array('Title' => 'Book title at version 2')
     * );
     * </code>
     *
     * @param   array     $fromVersion     An array representing the original version.
     * @param   array     $toVersion       An array representing the destination version.
     * @param   string    $keys            Main key used for the result diff (versions|columns).
     * @param   array     $ignoredColumns  The columns to exclude from the diff.
     *
     * @return  array A list of differences
     */
    protected function computeDiff($fromVersion, $toVersion, $keys = 'columns', $ignoredColumns = array())
    {
        $fromVersionNumber = $fromVersion['Version'];
        $toVersionNumber = $toVersion['Version'];
        $ignoredColumns = array_merge(array(
            'Version',
            'VersionCreatedAt',
            'VersionCreatedBy',
        ), $ignoredColumns);
        $diff = array();
        foreach ($fromVersion as $key => $value) {
            if (in_array($key, $ignoredColumns)) {
                continue;
            }
            if ($toVersion[$key] != $value) {
                switch ($keys) {
                    case 'versions':
                        $diff[$fromVersionNumber][$key] = $value;
                        $diff[$toVersionNumber][$key] = $toVersion[$key];
                        break;
                    default:
                        $diff[$key] = array(
                            $fromVersionNumber => $value,
                            $toVersionNumber => $toVersion[$key],
                        );
                        break;
                }
            }
        }

        return $diff;
    }
    /**
     * retrieve the last $number versions.
     *
     * @param integer $number the number of record to return.
     * @param ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery|Criteria $criteria Additional criteria to filter.
     * @param PropelPDO $con An optional connection to use.
     *
     * @return PropelCollection|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion[] List of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects
     */
    public function getLastVersions($number = 10, $criteria = null, PropelPDO $con = null)
    {
        $criteria = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create(null, $criteria);
        $criteria->addDescendingOrderByColumn(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION);
        $criteria->limit($number);

        return $this->getPacMailTemplateVersions($criteria, $con);
    }
}
