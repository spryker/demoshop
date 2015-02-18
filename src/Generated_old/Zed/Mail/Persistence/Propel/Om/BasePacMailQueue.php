<?php


/**
 * Base class that represents a row from the 'pac_mail_queue' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.om
 */
abstract class Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailQueue extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mail_queue field.
     * @var        int
     */
    protected $id_mail_queue;

    /**
     * The value for the mail_type field.
     * @var        string
     */
    protected $mail_type;

    /**
     * The value for the transfer_string field.
     * @var        string
     */
    protected $transfer_string;

    /**
     * The value for the reference_id field.
     * @var        int
     */
    protected $reference_id;

    /**
     * The value for the sent field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $sent;

    /**
     * The value for the send_tries field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $send_tries;

    /**
     * The value for the send_after field.
     * @var        string
     */
    protected $send_after;

    /**
     * The value for the last_response field.
     * @var        string
     */
    protected $last_response;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->sent = false;
        $this->send_tries = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailQueue object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_mail_queue] column value.
     *
     * @return int
     */
    public function getIdMailQueue()
    {

        return $this->id_mail_queue;
    }

    /**
     * Get the [mail_type] column value.
     *
     * @return string
     */
    public function getMailType()
    {

        return $this->mail_type;
    }

    /**
     * Get the [transfer_string] column value.
     *
     * @return string
     */
    public function getTransferString()
    {

        return $this->transfer_string;
    }

    /**
     * Get the [reference_id] column value.
     *
     * @return int
     */
    public function getReferenceId()
    {

        return $this->reference_id;
    }

    /**
     * Get the [sent] column value.
     *
     * @return boolean
     */
    public function getSent()
    {

        return $this->sent;
    }

    /**
     * Get the [send_tries] column value.
     *
     * @return int
     */
    public function getSendTries()
    {

        return $this->send_tries;
    }

    /**
     * Get the [optionally formatted] temporal [send_after] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSendAfter($format = 'Y-m-d H:i:s')
    {
        if ($this->send_after === null) {
            return null;
        }

        if ($this->send_after === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->send_after);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->send_after, true), $x);
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
     * Get the [last_response] column value.
     *
     * @return string
     */
    public function getLastResponse()
    {

        return $this->last_response;
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
     * Set the value of [id_mail_queue] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setIdMailQueue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mail_queue !== $v) {
            $this->id_mail_queue = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::ID_MAIL_QUEUE;
        }


        return $this;
    } // setIdMailQueue()

    /**
     * Set the value of [mail_type] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setMailType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mail_type !== $v) {
            $this->mail_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::MAIL_TYPE;
        }


        return $this;
    } // setMailType()

    /**
     * Set the value of [transfer_string] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setTransferString($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->transfer_string !== $v) {
            $this->transfer_string = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::TRANSFER_STRING;
        }


        return $this;
    } // setTransferString()

    /**
     * Set the value of [reference_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setReferenceId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->reference_id !== $v) {
            $this->reference_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::REFERENCE_ID;
        }


        return $this;
    } // setReferenceId()

    /**
     * Sets the value of the [sent] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setSent($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->sent !== $v) {
            $this->sent = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SENT;
        }


        return $this;
    } // setSent()

    /**
     * Set the value of [send_tries] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setSendTries($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->send_tries !== $v) {
            $this->send_tries = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_TRIES;
        }


        return $this;
    } // setSendTries()

    /**
     * Sets the value of [send_after] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setSendAfter($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->send_after !== null || $dt !== null) {
            $currentDateAsString = ($this->send_after !== null && $tmpDt = new DateTime($this->send_after)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->send_after = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_AFTER;
            }
        } // if either are not null


        return $this;
    } // setSendAfter()

    /**
     * Set the value of [last_response] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setLastResponse($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_response !== $v) {
            $this->last_response = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::LAST_RESPONSE;
        }


        return $this;
    } // setLastResponse()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::UPDATED_AT;
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
            if ($this->sent !== false) {
                return false;
            }

            if ($this->send_tries !== 0) {
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

            $this->id_mail_queue = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->mail_type = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->transfer_string = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->reference_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->sent = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->send_tries = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->send_after = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_response = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->created_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->updated_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 10; // 10 = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueueQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::UPDATED_AT)) {
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

                ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::ID_MAIL_QUEUE;
        if (null !== $this->id_mail_queue) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::ID_MAIL_QUEUE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::ID_MAIL_QUEUE)) {
            $modifiedColumns[':p' . $index++]  = '`id_mail_queue`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::MAIL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`mail_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::TRANSFER_STRING)) {
            $modifiedColumns[':p' . $index++]  = '`transfer_string`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::REFERENCE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`reference_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SENT)) {
            $modifiedColumns[':p' . $index++]  = '`sent`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_TRIES)) {
            $modifiedColumns[':p' . $index++]  = '`send_tries`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_AFTER)) {
            $modifiedColumns[':p' . $index++]  = '`send_after`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::LAST_RESPONSE)) {
            $modifiedColumns[':p' . $index++]  = '`last_response`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_mail_queue` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mail_queue`':
                        $stmt->bindValue($identifier, $this->id_mail_queue, PDO::PARAM_INT);
                        break;
                    case '`mail_type`':
                        $stmt->bindValue($identifier, $this->mail_type, PDO::PARAM_STR);
                        break;
                    case '`transfer_string`':
                        $stmt->bindValue($identifier, $this->transfer_string, PDO::PARAM_STR);
                        break;
                    case '`reference_id`':
                        $stmt->bindValue($identifier, $this->reference_id, PDO::PARAM_INT);
                        break;
                    case '`sent`':
                        $stmt->bindValue($identifier, (int) $this->sent, PDO::PARAM_INT);
                        break;
                    case '`send_tries`':
                        $stmt->bindValue($identifier, $this->send_tries, PDO::PARAM_INT);
                        break;
                    case '`send_after`':
                        $stmt->bindValue($identifier, $this->send_after, PDO::PARAM_STR);
                        break;
                    case '`last_response`':
                        $stmt->bindValue($identifier, $this->last_response, PDO::PARAM_STR);
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
        $this->setIdMailQueue($pk);

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


            if (($retval = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMailQueue();
                break;
            case 1:
                return $this->getMailType();
                break;
            case 2:
                return $this->getTransferString();
                break;
            case 3:
                return $this->getReferenceId();
                break;
            case 4:
                return $this->getSent();
                break;
            case 5:
                return $this->getSendTries();
                break;
            case 6:
                return $this->getSendAfter();
                break;
            case 7:
                return $this->getLastResponse();
                break;
            case 8:
                return $this->getCreatedAt();
                break;
            case 9:
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMailQueue(),
            $keys[1] => $this->getMailType(),
            $keys[2] => $this->getTransferString(),
            $keys[3] => $this->getReferenceId(),
            $keys[4] => $this->getSent(),
            $keys[5] => $this->getSendTries(),
            $keys[6] => $this->getSendAfter(),
            $keys[7] => $this->getLastResponse(),
            $keys[8] => $this->getCreatedAt(),
            $keys[9] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
        $pos = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMailQueue($value);
                break;
            case 1:
                $this->setMailType($value);
                break;
            case 2:
                $this->setTransferString($value);
                break;
            case 3:
                $this->setReferenceId($value);
                break;
            case 4:
                $this->setSent($value);
                break;
            case 5:
                $this->setSendTries($value);
                break;
            case 6:
                $this->setSendAfter($value);
                break;
            case 7:
                $this->setLastResponse($value);
                break;
            case 8:
                $this->setCreatedAt($value);
                break;
            case 9:
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
        $keys = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMailQueue($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMailType($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTransferString($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setReferenceId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSent($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSendTries($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSendAfter($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastResponse($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::ID_MAIL_QUEUE)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::ID_MAIL_QUEUE, $this->id_mail_queue);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::MAIL_TYPE)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::MAIL_TYPE, $this->mail_type);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::TRANSFER_STRING)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::TRANSFER_STRING, $this->transfer_string);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::REFERENCE_ID)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::REFERENCE_ID, $this->reference_id);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SENT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SENT, $this->sent);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_TRIES)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_TRIES, $this->send_tries);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_AFTER)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::SEND_AFTER, $this->send_after);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::LAST_RESPONSE)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::LAST_RESPONSE, $this->last_response);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::ID_MAIL_QUEUE, $this->id_mail_queue);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMailQueue();
    }

    /**
     * Generic method to set the primary key (id_mail_queue column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMailQueue($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMailQueue();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMailType($this->getMailType());
        $copyObj->setTransferString($this->getTransferString());
        $copyObj->setReferenceId($this->getReferenceId());
        $copyObj->setSent($this->getSent());
        $copyObj->setSendTries($this->getSendTries());
        $copyObj->setSendAfter($this->getSendAfter());
        $copyObj->setLastResponse($this->getLastResponse());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMailQueue(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue Clone of current object.
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mail_queue = null;
        $this->mail_type = null;
        $this->transfer_string = null;
        $this->reference_id = null;
        $this->sent = null;
        $this->send_tries = null;
        $this->send_after = null;
        $this->last_response = null;
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

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Mail_Persistence_Propel_PacMailQueue The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailQueuePeer::UPDATED_AT;

        return $this;
    }

}
