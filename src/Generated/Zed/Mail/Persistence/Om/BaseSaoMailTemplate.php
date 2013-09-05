<?php


/**
 * Base class that represents a row from the 'sao_mail_template' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailTemplate extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Mail_Persistence_SaoMailTemplatePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Mail_Persistence_SaoMailTemplatePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
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
     * The value for the wrap field.
     * @var        int
     */
    protected $wrap;

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
     * @var        SaoMailTemplate
     */
    protected $aMailTemplateWrap;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailTemplate[] Collection to store aggregation of Sao_Zed_Mail_Persistence_SaoMailTemplate objects.
     */
    protected $collMailTemplates;
    protected $collMailTemplatesPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailTemplateVersion[] Collection to store aggregation of Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects.
     */
    protected $collSaoMailTemplateVersions;
    protected $collSaoMailTemplateVersionsPartial;

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
    protected $saoMailTemplateVersionsScheduledForDeletion = null;

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
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailTemplate object.
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
     * Get the [wrap] column value.
     *
     * @return int
     */
    public function getWrap()
    {
        return $this->wrap;
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
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setIdMailTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mail_template !== $v) {
            $this->id_mail_template = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE;
        }


        return $this;
    } // setIdMailTemplate()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [subject] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setSubject($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->subject !== $v) {
            $this->subject = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SUBJECT;
        }


        return $this;
    } // setSubject()

    /**
     * Set the value of [sender] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setSender($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sender !== $v) {
            $this->sender = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SENDER;
        }


        return $this;
    } // setSender()

    /**
     * Set the value of [text] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setText($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->text !== $v) {
            $this->text = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::TEXT;
        }


        return $this;
    } // setText()

    /**
     * Set the value of [html] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setHtml($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->html !== $v) {
            $this->html = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::HTML;
        }


        return $this;
    } // setHtml()

    /**
     * Set the value of [wrap] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setWrap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->wrap !== $v) {
            $this->wrap = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP;
        }

        if ($this->aMailTemplateWrap !== null && $this->aMailTemplateWrap->getIdMailTemplate() !== $v) {
            $this->aMailTemplateWrap = null;
        }


        return $this;
    } // setWrap()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
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
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Sets the value of [version_created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setVersionCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->version_created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->version_created_at !== null && $tmpDt = new DateTime($this->version_created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->version_created_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setVersionCreatedAt()

    /**
     * Set the value of [version_created_by] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setVersionCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->version_created_by !== $v) {
            $this->version_created_by = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_BY;
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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
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
            $this->text = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->html = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->wrap = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->deleted = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->version = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->version_created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->version_created_by = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Mail_Persistence_SaoMailTemplate object", $e);
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

        if ($this->aMailTemplateWrap !== null && $this->wrap !== $this->aMailTemplateWrap->getIdMailTemplate()) {
            $this->aMailTemplateWrap = null;
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMailTemplateWrap = null;
            $this->collMailTemplates = null;

            $this->collSaoMailTemplateVersions = null;

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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Mail_Persistence_SaoMailTemplateQuery::create()
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // versionable behavior
            if ($this->isVersioningNecessary()) {
                $this->setVersion($this->isNew() ? 1 : $this->getLastVersionNumber($con) + 1);
                if (!$this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT)) {
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

                Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::addInstanceToPool($this);
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

            if ($this->aMailTemplateWrap !== null) {
                if ($this->aMailTemplateWrap->isModified() || $this->aMailTemplateWrap->isNew()) {
                    $affectedRows += $this->aMailTemplateWrap->save($con);
                }
                $this->setMailTemplateWrap($this->aMailTemplateWrap);
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

            if ($this->saoMailTemplateVersionsScheduledForDeletion !== null) {
                if (!$this->saoMailTemplateVersionsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create()
                        ->filterByPrimaryKeys($this->saoMailTemplateVersionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoMailTemplateVersionsScheduledForDeletion = null;
                }
            }

            if ($this->collSaoMailTemplateVersions !== null) {
                foreach ($this->collSaoMailTemplateVersions as $referrerFK) {
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

        $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE;
        if (null !== $this->id_mail_template) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`id_mail_template`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SUBJECT)) {
            $modifiedColumns[':p' . $index++]  = '`subject`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SENDER)) {
            $modifiedColumns[':p' . $index++]  = '`sender`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::TEXT)) {
            $modifiedColumns[':p' . $index++]  = '`text`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::HTML)) {
            $modifiedColumns[':p' . $index++]  = '`html`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP)) {
            $modifiedColumns[':p' . $index++]  = '`wrap`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_at`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_by`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_mail_template` (%s) VALUES (%s)',
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
                    case '`text`':
                        $stmt->bindValue($identifier, $this->text, PDO::PARAM_STR);
                        break;
                    case '`html`':
                        $stmt->bindValue($identifier, $this->html, PDO::PARAM_STR);
                        break;
                    case '`wrap`':
                        $stmt->bindValue($identifier, $this->wrap, PDO::PARAM_INT);
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

            if ($this->aMailTemplateWrap !== null) {
                if (!$this->aMailTemplateWrap->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMailTemplateWrap->getValidationFailures());
                }
            }


            if (($retval = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMailTemplates !== null) {
                    foreach ($this->collMailTemplates as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSaoMailTemplateVersions !== null) {
                    foreach ($this->collSaoMailTemplateVersions as $referrerFK) {
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getText();
                break;
            case 5:
                return $this->getHtml();
                break;
            case 6:
                return $this->getWrap();
                break;
            case 7:
                return $this->getDeleted();
                break;
            case 8:
                return $this->getVersion();
                break;
            case 9:
                return $this->getVersionCreatedAt();
                break;
            case 10:
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
        if (isset($alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$this->getPrimaryKey()] = true;
        $keys = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMailTemplate(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getSubject(),
            $keys[3] => $this->getSender(),
            $keys[4] => $this->getText(),
            $keys[5] => $this->getHtml(),
            $keys[6] => $this->getWrap(),
            $keys[7] => $this->getDeleted(),
            $keys[8] => $this->getVersion(),
            $keys[9] => $this->getVersionCreatedAt(),
            $keys[10] => $this->getVersionCreatedBy(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMailTemplateWrap) {
                $result['MailTemplateWrap'] = $this->aMailTemplateWrap->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMailTemplates) {
                $result['MailTemplates'] = $this->collMailTemplates->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSaoMailTemplateVersions) {
                $result['SaoMailTemplateVersions'] = $this->collSaoMailTemplateVersions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setText($value);
                break;
            case 5:
                $this->setHtml($value);
                break;
            case 6:
                $this->setWrap($value);
                break;
            case 7:
                $this->setDeleted($value);
                break;
            case 8:
                $this->setVersion($value);
                break;
            case 9:
                $this->setVersionCreatedAt($value);
                break;
            case 10:
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
        $keys = Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMailTemplate($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSubject($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSender($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setText($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setHtml($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setWrap($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDeleted($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setVersion($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setVersionCreatedAt($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setVersionCreatedBy($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $this->id_mail_template);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME, $this->name);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SUBJECT)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SUBJECT, $this->subject);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SENDER)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SENDER, $this->sender);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::TEXT)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::TEXT, $this->text);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::HTML)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::HTML, $this->html);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP, $this->wrap);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DELETED)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DELETED, $this->deleted);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION, $this->version);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_AT, $this->version_created_at);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_BY)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::VERSION_CREATED_BY, $this->version_created_by);

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
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE, $this->id_mail_template);

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
     * @param object $copyObj An object of Sao_Zed_Mail_Persistence_SaoMailTemplate (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setSubject($this->getSubject());
        $copyObj->setSender($this->getSender());
        $copyObj->setText($this->getText());
        $copyObj->setHtml($this->getHtml());
        $copyObj->setWrap($this->getWrap());
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

            foreach ($this->getSaoMailTemplateVersions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSaoMailTemplateVersion($relObj->copy($deepCopy));
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate Clone of current object.
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplatePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Mail_Persistence_SaoMailTemplatePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sao_Zed_Mail_Persistence_SaoMailTemplate object.
     *
     * @param             Sao_Zed_Mail_Persistence_SaoMailTemplate $v
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMailTemplateWrap(Sao_Zed_Mail_Persistence_SaoMailTemplate $v = null)
    {
        if ($v === null) {
            $this->setWrap(NULL);
        } else {
            $this->setWrap($v->getIdMailTemplate());
        }

        $this->aMailTemplateWrap = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sao_Zed_Mail_Persistence_SaoMailTemplate object, it will not be re-added.
        if ($v !== null) {
            $v->addMailTemplate($this);
        }


        return $this;
    }


    /**
     * Get the associated Sao_Zed_Mail_Persistence_SaoMailTemplate object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The associated Sao_Zed_Mail_Persistence_SaoMailTemplate object.
     * @throws PropelException
     */
    public function getMailTemplateWrap(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMailTemplateWrap === null && ($this->wrap !== null) && $doQuery) {
            $this->aMailTemplateWrap = Sao_Zed_Mail_Persistence_SaoMailTemplateQuery::create()->findPk($this->wrap, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMailTemplateWrap->addMailTemplates($this);
             */
        }

        return $this->aMailTemplateWrap;
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
        if ('SaoMailTemplateVersion' == $relationName) {
            $this->initSaoMailTemplateVersions();
        }
    }

    /**
     * Clears out the collMailTemplates collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
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
        $this->collMailTemplates->setModel('Sao_Zed_Mail_Persistence_SaoMailTemplate');
    }

    /**
     * Gets an array of Sao_Zed_Mail_Persistence_SaoMailTemplate objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Mail_Persistence_SaoMailTemplate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailTemplate[] List of Sao_Zed_Mail_Persistence_SaoMailTemplate objects
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
                $collMailTemplates = Sao_Zed_Mail_Persistence_SaoMailTemplateQuery::create(null, $criteria)
                    ->filterByMailTemplateWrap($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMailTemplatesPartial && count($collMailTemplates)) {
                      $this->initMailTemplates(false);

                      foreach($collMailTemplates as $obj) {
                        if (false == $this->collMailTemplates->contains($obj)) {
                          $this->collMailTemplates->append($obj);
                        }
                      }

                      $this->collMailTemplatesPartial = true;
                    }

                    $collMailTemplates->getInternalIterator()->rewind();
                    return $collMailTemplates;
                }

                if($partial && $this->collMailTemplates) {
                    foreach($this->collMailTemplates as $obj) {
                        if($obj->isNew()) {
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setMailTemplates(PropelCollection $mailTemplates, PropelPDO $con = null)
    {
        $mailTemplatesToDelete = $this->getMailTemplates(new Criteria(), $con)->diff($mailTemplates);

        $this->mailTemplatesScheduledForDeletion = unserialize(serialize($mailTemplatesToDelete));

        foreach ($mailTemplatesToDelete as $mailTemplateRemoved) {
            $mailTemplateRemoved->setMailTemplateWrap(null);
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
     * Returns the number of related Sao_Zed_Mail_Persistence_SaoMailTemplate objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Mail_Persistence_SaoMailTemplate objects.
     * @throws PropelException
     */
    public function countMailTemplates(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMailTemplatesPartial && !$this->isNew();
        if (null === $this->collMailTemplates || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMailTemplates) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMailTemplates());
            }
            $query = Sao_Zed_Mail_Persistence_SaoMailTemplateQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMailTemplateWrap($this)
                ->count($con);
        }

        return count($this->collMailTemplates);
    }

    /**
     * Method called to associate a Sao_Zed_Mail_Persistence_SaoMailTemplate object to this object
     * through the Sao_Zed_Mail_Persistence_SaoMailTemplate foreign key attribute.
     *
     * @param    Sao_Zed_Mail_Persistence_SaoMailTemplate $l Sao_Zed_Mail_Persistence_SaoMailTemplate
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function addMailTemplate(Sao_Zed_Mail_Persistence_SaoMailTemplate $l)
    {
        if ($this->collMailTemplates === null) {
            $this->initMailTemplates();
            $this->collMailTemplatesPartial = true;
        }
        if (!in_array($l, $this->collMailTemplates->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMailTemplate($l);
        }

        return $this;
    }

    /**
     * @param	MailTemplate $mailTemplate The mailTemplate object to add.
     */
    protected function doAddMailTemplate($mailTemplate)
    {
        $this->collMailTemplates[]= $mailTemplate;
        $mailTemplate->setMailTemplateWrap($this);
    }

    /**
     * @param	MailTemplate $mailTemplate The mailTemplate object to remove.
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
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
            $mailTemplate->setMailTemplateWrap(null);
        }

        return $this;
    }

    /**
     * Clears out the collSaoMailTemplateVersions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     * @see        addSaoMailTemplateVersions()
     */
    public function clearSaoMailTemplateVersions()
    {
        $this->collSaoMailTemplateVersions = null; // important to set this to null since that means it is uninitialized
        $this->collSaoMailTemplateVersionsPartial = null;

        return $this;
    }

    /**
     * reset is the collSaoMailTemplateVersions collection loaded partially
     *
     * @return void
     */
    public function resetPartialSaoMailTemplateVersions($v = true)
    {
        $this->collSaoMailTemplateVersionsPartial = $v;
    }

    /**
     * Initializes the collSaoMailTemplateVersions collection.
     *
     * By default this just sets the collSaoMailTemplateVersions collection to an empty array (like clearcollSaoMailTemplateVersions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSaoMailTemplateVersions($overrideExisting = true)
    {
        if (null !== $this->collSaoMailTemplateVersions && !$overrideExisting) {
            return;
        }
        $this->collSaoMailTemplateVersions = new PropelObjectCollection();
        $this->collSaoMailTemplateVersions->setModel('Sao_Zed_Mail_Persistence_SaoMailTemplateVersion');
    }

    /**
     * Gets an array of Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Mail_Persistence_SaoMailTemplate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailTemplateVersion[] List of Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects
     * @throws PropelException
     */
    public function getSaoMailTemplateVersions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSaoMailTemplateVersionsPartial && !$this->isNew();
        if (null === $this->collSaoMailTemplateVersions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSaoMailTemplateVersions) {
                // return empty collection
                $this->initSaoMailTemplateVersions();
            } else {
                $collSaoMailTemplateVersions = Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create(null, $criteria)
                    ->filterBySaoMailTemplate($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSaoMailTemplateVersionsPartial && count($collSaoMailTemplateVersions)) {
                      $this->initSaoMailTemplateVersions(false);

                      foreach($collSaoMailTemplateVersions as $obj) {
                        if (false == $this->collSaoMailTemplateVersions->contains($obj)) {
                          $this->collSaoMailTemplateVersions->append($obj);
                        }
                      }

                      $this->collSaoMailTemplateVersionsPartial = true;
                    }

                    $collSaoMailTemplateVersions->getInternalIterator()->rewind();
                    return $collSaoMailTemplateVersions;
                }

                if($partial && $this->collSaoMailTemplateVersions) {
                    foreach($this->collSaoMailTemplateVersions as $obj) {
                        if($obj->isNew()) {
                            $collSaoMailTemplateVersions[] = $obj;
                        }
                    }
                }

                $this->collSaoMailTemplateVersions = $collSaoMailTemplateVersions;
                $this->collSaoMailTemplateVersionsPartial = false;
            }
        }

        return $this->collSaoMailTemplateVersions;
    }

    /**
     * Sets a collection of SaoMailTemplateVersion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $saoMailTemplateVersions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function setSaoMailTemplateVersions(PropelCollection $saoMailTemplateVersions, PropelPDO $con = null)
    {
        $saoMailTemplateVersionsToDelete = $this->getSaoMailTemplateVersions(new Criteria(), $con)->diff($saoMailTemplateVersions);

        $this->saoMailTemplateVersionsScheduledForDeletion = unserialize(serialize($saoMailTemplateVersionsToDelete));

        foreach ($saoMailTemplateVersionsToDelete as $saoMailTemplateVersionRemoved) {
            $saoMailTemplateVersionRemoved->setSaoMailTemplate(null);
        }

        $this->collSaoMailTemplateVersions = null;
        foreach ($saoMailTemplateVersions as $saoMailTemplateVersion) {
            $this->addSaoMailTemplateVersion($saoMailTemplateVersion);
        }

        $this->collSaoMailTemplateVersions = $saoMailTemplateVersions;
        $this->collSaoMailTemplateVersionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects.
     * @throws PropelException
     */
    public function countSaoMailTemplateVersions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSaoMailTemplateVersionsPartial && !$this->isNew();
        if (null === $this->collSaoMailTemplateVersions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSaoMailTemplateVersions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSaoMailTemplateVersions());
            }
            $query = Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySaoMailTemplate($this)
                ->count($con);
        }

        return count($this->collSaoMailTemplateVersions);
    }

    /**
     * Method called to associate a Sao_Zed_Mail_Persistence_SaoMailTemplateVersion object to this object
     * through the Sao_Zed_Mail_Persistence_SaoMailTemplateVersion foreign key attribute.
     *
     * @param    Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $l Sao_Zed_Mail_Persistence_SaoMailTemplateVersion
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function addSaoMailTemplateVersion(Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $l)
    {
        if ($this->collSaoMailTemplateVersions === null) {
            $this->initSaoMailTemplateVersions();
            $this->collSaoMailTemplateVersionsPartial = true;
        }
        if (!in_array($l, $this->collSaoMailTemplateVersions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSaoMailTemplateVersion($l);
        }

        return $this;
    }

    /**
     * @param	SaoMailTemplateVersion $saoMailTemplateVersion The saoMailTemplateVersion object to add.
     */
    protected function doAddSaoMailTemplateVersion($saoMailTemplateVersion)
    {
        $this->collSaoMailTemplateVersions[]= $saoMailTemplateVersion;
        $saoMailTemplateVersion->setSaoMailTemplate($this);
    }

    /**
     * @param	SaoMailTemplateVersion $saoMailTemplateVersion The saoMailTemplateVersion object to remove.
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function removeSaoMailTemplateVersion($saoMailTemplateVersion)
    {
        if ($this->getSaoMailTemplateVersions()->contains($saoMailTemplateVersion)) {
            $this->collSaoMailTemplateVersions->remove($this->collSaoMailTemplateVersions->search($saoMailTemplateVersion));
            if (null === $this->saoMailTemplateVersionsScheduledForDeletion) {
                $this->saoMailTemplateVersionsScheduledForDeletion = clone $this->collSaoMailTemplateVersions;
                $this->saoMailTemplateVersionsScheduledForDeletion->clear();
            }
            $this->saoMailTemplateVersionsScheduledForDeletion[]= clone $saoMailTemplateVersion;
            $saoMailTemplateVersion->setSaoMailTemplate(null);
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
        $this->text = null;
        $this->html = null;
        $this->wrap = null;
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
     * when using Propel in certain daemon or large-volumne/high-memory operations.
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
            if ($this->collSaoMailTemplateVersions) {
                foreach ($this->collSaoMailTemplateVersions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMailTemplateWrap instanceof Persistent) {
              $this->aMailTemplateWrap->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMailTemplates instanceof PropelCollection) {
            $this->collMailTemplates->clearIterator();
        }
        $this->collMailTemplates = null;
        if ($this->collSaoMailTemplateVersions instanceof PropelCollection) {
            $this->collSaoMailTemplateVersions->clearIterator();
        }
        $this->collSaoMailTemplateVersions = null;
        $this->aMailTemplateWrap = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DEFAULT_STRING_FORMAT);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate
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

        if (Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::isVersioningEnabled() && ($this->isNew() || $this->isModified() || $this->isDeleted())) {
            return true;
        }
        if (null !== ($object = $this->getMailTemplateWrap($con)) && $object->isVersioningNecessary($con)) {
            return true;
        }

      // to avoid infinite loops, emulate in save
      $this->alreadyInSave = true;
        foreach ($this->getMailTemplates(null, $con) as $relatedObject) {
            if ($relatedObject->isVersioningNecessary($con)) {
          $this->alreadyInSave = false;

                return true;
            }
        }
      $this->alreadyInSave = false;


        return false;
    }

    /**
     * Creates a version of the current object and saves it.
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  Sao_Zed_Mail_Persistence_SaoMailTemplateVersion A version object
     */
    public function addVersion($con = null)
    {
        $this->enforceVersion = false;

        $version = new Sao_Zed_Mail_Persistence_SaoMailTemplateVersion();
        $version->setIdMailTemplate($this->getIdMailTemplate());
        $version->setName($this->getName());
        $version->setSubject($this->getSubject());
        $version->setSender($this->getSender());
        $version->setText($this->getText());
        $version->setHtml($this->getHtml());
        $version->setWrap($this->getWrap());
        $version->setDeleted($this->getDeleted());
        $version->setVersion($this->getVersion());
        $version->setVersionCreatedAt($this->getVersionCreatedAt());
        $version->setVersionCreatedBy($this->getVersionCreatedBy());
        $version->setSaoMailTemplate($this);
        if (($related = $this->getMailTemplateWrap($con)) && $related->getVersion()) {
            $version->setWrapVersion($related->getVersion());
        }
        if ($relateds = $this->getMailTemplates($con)->toKeyValue('IdMailTemplate', 'Version')) {
            $version->setSaoMailTemplateIds(array_keys($relateds));
            $version->setSaoMailTemplateVersions(array_values($relateds));
        }
        $version->save($con);

        return $version;
    }

    /**
     * Sets the properties of the curent object to the value they had at a specific version
     *
     * @param   integer $versionNumber The version number to read
     * @param   PropelPDO $con the connection to use
     *
     * @return  Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     * @throws  PropelException - if no object with the given version can be found.
     */
    public function toVersion($versionNumber, $con = null)
    {
        $version = $this->getOneVersion($versionNumber, $con);
        if (!$version) {
            throw new PropelException(sprintf('No Sao_Zed_Mail_Persistence_SaoMailTemplate object found with version %d', $version));
        }
        $this->populateFromVersion($version, $con);

        return $this;
    }

    /**
     * Sets the properties of the curent object to the value they had at a specific version
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $version The version object to use
     * @param   PropelPDO $con the connection to use
     * @param   array $loadedObjects objects thats been loaded in a chain of populateFromVersion calls on referrer or fk objects.
     *
     * @return  Sao_Zed_Mail_Persistence_SaoMailTemplate The current object (for fluent API support)
     */
    public function populateFromVersion($version, $con = null, &$loadedObjects = array())
    {

        $loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$version->getIdMailTemplate()][$version->getVersion()] = $this;
        $this->setIdMailTemplate($version->getIdMailTemplate());
        $this->setName($version->getName());
        $this->setSubject($version->getSubject());
        $this->setSender($version->getSender());
        $this->setText($version->getText());
        $this->setHtml($version->getHtml());
        $this->setWrap($version->getWrap());
        $this->setDeleted($version->getDeleted());
        $this->setVersion($version->getVersion());
        $this->setVersionCreatedAt($version->getVersionCreatedAt());
        $this->setVersionCreatedBy($version->getVersionCreatedBy());
        if ($fkValue = $version->getWrap()) {
            if (isset($loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate']) && isset($loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$fkValue]) && isset($loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$fkValue][$version->getWrapVersion()])) {
                $related = $loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$fkValue][$version->getWrapVersion()];
            } else {
                $related = new Sao_Zed_Mail_Persistence_SaoMailTemplate();
                $relatedVersion = Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create()
                    ->filterByIdMailTemplate($fkValue)
                    ->filterByVersion($version->getWrapVersion())
                    ->findOne($con);
                $related->populateFromVersion($relatedVersion, $con, $loadedObjects);
                $related->setNew(false);
            }
            $this->setMailTemplateWrap($related);
        }
        if ($fkValues = $version->getSaoMailTemplateIds()) {
            $this->clearMailTemplates();
            $fkVersions = $version->getSaoMailTemplateVersions();
            $query = Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create();
            foreach ($fkValues as $key => $value) {
                $c1 = $query->getNewCriterion(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $value);
                $c2 = $query->getNewCriterion(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION, $fkVersions[$key]);
                $c1->addAnd($c2);
                $query->addOr($c1);
            }
            foreach ($query->find($con) as $relatedVersion) {
                if (isset($loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate']) && isset($loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$relatedVersion->getIdMailTemplate()]) && isset($loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$relatedVersion->getIdMailTemplate()][$relatedVersion->getVersion()])) {
                    $related = $loadedObjects['Sao_Zed_Mail_Persistence_SaoMailTemplate'][$relatedVersion->getIdMailTemplate()][$relatedVersion->getVersion()];
                } else {
                    $related = new Sao_Zed_Mail_Persistence_SaoMailTemplate();
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
        $v = Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create()
            ->filterBySaoMailTemplate($this)
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
     * @return  Sao_Zed_Mail_Persistence_SaoMailTemplateVersion A version object
     */
    public function getOneVersion($versionNumber, $con = null)
    {
        return Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create()
            ->filterBySaoMailTemplate($this)
            ->filterByVersion($versionNumber)
            ->findOne($con);
    }

    /**
     * Gets all the versions of this object, in incremental order
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  PropelObjectCollection A list of Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects
     */
    public function getAllVersions($con = null)
    {
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION);

        return $this->getSaoMailTemplateVersions($criteria, $con);
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
     * @param Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery|Criteria $criteria Additional criteria to filter.
     * @param PropelPDO $con An optional connection to use.
     *
     * @return PropelCollection|Sao_Zed_Mail_Persistence_SaoMailTemplateVersion[] List of Sao_Zed_Mail_Persistence_SaoMailTemplateVersion objects
     */
    public function getLastVersions($number = 10, $criteria = null, PropelPDO $con = null)
    {
        $criteria = Sao_Zed_Mail_Persistence_SaoMailTemplateVersionQuery::create(null, $criteria);
        $criteria->addDescendingOrderByColumn(Sao_Zed_Mail_Persistence_SaoMailTemplateVersionPeer::VERSION);
        $criteria->limit($number);

        return $this->getSaoMailTemplateVersions($criteria, $con);
    }
}
