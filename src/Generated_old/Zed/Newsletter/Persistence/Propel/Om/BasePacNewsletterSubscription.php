<?php


/**
 * Base class that represents a row from the 'pac_newsletter_subscription' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Newsletter/Persistence/Propel.om
 */
abstract class Generated_Zed_Newsletter_Persistence_Propel_Om_BasePacNewsletterSubscription extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_newsletter_subscription field.
     * @var        int
     */
    protected $id_newsletter_subscription;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the status field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $status;

    /**
     * The value for the confirmation_key field.
     * @var        string
     */
    protected $confirmation_key;

    /**
     * The value for the unsubscription_key field.
     * @var        string
     */
    protected $unsubscription_key;

    /**
     * The value for the subscribed_at field.
     * @var        string
     */
    protected $subscribed_at;

    /**
     * The value for the confirmed_at field.
     * @var        string
     */
    protected $confirmed_at;

    /**
     * The value for the unsubscribed_at field.
     * @var        string
     */
    protected $unsubscribed_at;

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
        $this->status = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Newsletter_Persistence_Propel_Om_BasePacNewsletterSubscription object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_newsletter_subscription] column value.
     *
     * @return int
     */
    public function getIdNewsletterSubscription()
    {

        return $this->id_newsletter_subscription;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getStatus()
    {
        if (null === $this->status) {
            return null;
        }
        $valueSet = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::getValueSet(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::STATUS);
        if (!isset($valueSet[$this->status])) {
            throw new PropelException('Unknown stored enum key: ' . $this->status);
        }

        return $valueSet[$this->status];
    }

    /**
     * Get the [confirmation_key] column value.
     *
     * @return string
     */
    public function getConfirmationKey()
    {

        return $this->confirmation_key;
    }

    /**
     * Get the [unsubscription_key] column value.
     *
     * @return string
     */
    public function getUnsubscriptionKey()
    {

        return $this->unsubscription_key;
    }

    /**
     * Get the [optionally formatted] temporal [subscribed_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSubscribedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->subscribed_at === null) {
            return null;
        }

        if ($this->subscribed_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->subscribed_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->subscribed_at, true), $x);
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
     * Get the [optionally formatted] temporal [confirmed_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getConfirmedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->confirmed_at === null) {
            return null;
        }

        if ($this->confirmed_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->confirmed_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->confirmed_at, true), $x);
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
     * Get the [optionally formatted] temporal [unsubscribed_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUnsubscribedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->unsubscribed_at === null) {
            return null;
        }

        if ($this->unsubscribed_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->unsubscribed_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->unsubscribed_at, true), $x);
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
     * Set the value of [id_newsletter_subscription] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     */
    public function setIdNewsletterSubscription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_newsletter_subscription !== $v) {
            $this->id_newsletter_subscription = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::ID_NEWSLETTER_SUBSCRIPTION;
        }


        return $this;
    } // setIdNewsletterSubscription()

    /**
     * Set the value of [email] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [status] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::getValueSet(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::STATUS);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [confirmation_key] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     */
    public function setConfirmationKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->confirmation_key !== $v) {
            $this->confirmation_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMATION_KEY;
        }


        return $this;
    } // setConfirmationKey()

    /**
     * Set the value of [unsubscription_key] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     */
    public function setUnsubscriptionKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->unsubscription_key !== $v) {
            $this->unsubscription_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIPTION_KEY;
        }


        return $this;
    } // setUnsubscriptionKey()

    /**
     * Sets the value of [subscribed_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     */
    public function setSubscribedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->subscribed_at !== null || $dt !== null) {
            $currentDateAsString = ($this->subscribed_at !== null && $tmpDt = new DateTime($this->subscribed_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->subscribed_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::SUBSCRIBED_AT;
            }
        } // if either are not null


        return $this;
    } // setSubscribedAt()

    /**
     * Sets the value of [confirmed_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     */
    public function setConfirmedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->confirmed_at !== null || $dt !== null) {
            $currentDateAsString = ($this->confirmed_at !== null && $tmpDt = new DateTime($this->confirmed_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->confirmed_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMED_AT;
            }
        } // if either are not null


        return $this;
    } // setConfirmedAt()

    /**
     * Sets the value of [unsubscribed_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription The current object (for fluent API support)
     */
    public function setUnsubscribedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->unsubscribed_at !== null || $dt !== null) {
            $currentDateAsString = ($this->unsubscribed_at !== null && $tmpDt = new DateTime($this->unsubscribed_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->unsubscribed_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIBED_AT;
            }
        } // if either are not null


        return $this;
    } // setUnsubscribedAt()

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
            if ($this->status !== 0) {
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

            $this->id_newsletter_subscription = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->email = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->status = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->confirmation_key = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->unsubscription_key = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->subscribed_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->confirmed_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->unsubscribed_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
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

                ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::ID_NEWSLETTER_SUBSCRIPTION;
        if (null !== $this->id_newsletter_subscription) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::ID_NEWSLETTER_SUBSCRIPTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::ID_NEWSLETTER_SUBSCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`id_newsletter_subscription`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMATION_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`confirmation_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIPTION_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`unsubscription_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::SUBSCRIBED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`subscribed_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`confirmed_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIBED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`unsubscribed_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_newsletter_subscription` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_newsletter_subscription`':
                        $stmt->bindValue($identifier, $this->id_newsletter_subscription, PDO::PARAM_INT);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case '`confirmation_key`':
                        $stmt->bindValue($identifier, $this->confirmation_key, PDO::PARAM_STR);
                        break;
                    case '`unsubscription_key`':
                        $stmt->bindValue($identifier, $this->unsubscription_key, PDO::PARAM_STR);
                        break;
                    case '`subscribed_at`':
                        $stmt->bindValue($identifier, $this->subscribed_at, PDO::PARAM_STR);
                        break;
                    case '`confirmed_at`':
                        $stmt->bindValue($identifier, $this->confirmed_at, PDO::PARAM_STR);
                        break;
                    case '`unsubscribed_at`':
                        $stmt->bindValue($identifier, $this->unsubscribed_at, PDO::PARAM_STR);
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
        $this->setIdNewsletterSubscription($pk);

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


            if (($retval = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdNewsletterSubscription();
                break;
            case 1:
                return $this->getEmail();
                break;
            case 2:
                return $this->getStatus();
                break;
            case 3:
                return $this->getConfirmationKey();
                break;
            case 4:
                return $this->getUnsubscriptionKey();
                break;
            case 5:
                return $this->getSubscribedAt();
                break;
            case 6:
                return $this->getConfirmedAt();
                break;
            case 7:
                return $this->getUnsubscribedAt();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdNewsletterSubscription(),
            $keys[1] => $this->getEmail(),
            $keys[2] => $this->getStatus(),
            $keys[3] => $this->getConfirmationKey(),
            $keys[4] => $this->getUnsubscriptionKey(),
            $keys[5] => $this->getSubscribedAt(),
            $keys[6] => $this->getConfirmedAt(),
            $keys[7] => $this->getUnsubscribedAt(),
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
        $pos = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdNewsletterSubscription($value);
                break;
            case 1:
                $this->setEmail($value);
                break;
            case 2:
                $valueSet = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::getValueSet(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::STATUS);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setStatus($value);
                break;
            case 3:
                $this->setConfirmationKey($value);
                break;
            case 4:
                $this->setUnsubscriptionKey($value);
                break;
            case 5:
                $this->setSubscribedAt($value);
                break;
            case 6:
                $this->setConfirmedAt($value);
                break;
            case 7:
                $this->setUnsubscribedAt($value);
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
        $keys = ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdNewsletterSubscription($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setEmail($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setStatus($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setConfirmationKey($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUnsubscriptionKey($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSubscribedAt($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setConfirmedAt($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setUnsubscribedAt($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::ID_NEWSLETTER_SUBSCRIPTION)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::ID_NEWSLETTER_SUBSCRIPTION, $this->id_newsletter_subscription);
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::EMAIL)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::EMAIL, $this->email);
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::STATUS)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::STATUS, $this->status);
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMATION_KEY)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMATION_KEY, $this->confirmation_key);
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIPTION_KEY)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIPTION_KEY, $this->unsubscription_key);
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::SUBSCRIBED_AT)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::SUBSCRIBED_AT, $this->subscribed_at);
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMED_AT)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::CONFIRMED_AT, $this->confirmed_at);
        if ($this->isColumnModified(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIBED_AT)) $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::UNSUBSCRIBED_AT, $this->unsubscribed_at);

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
        $criteria = new Criteria(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::ID_NEWSLETTER_SUBSCRIPTION, $this->id_newsletter_subscription);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdNewsletterSubscription();
    }

    /**
     * Generic method to set the primary key (id_newsletter_subscription column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdNewsletterSubscription($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdNewsletterSubscription();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEmail($this->getEmail());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setConfirmationKey($this->getConfirmationKey());
        $copyObj->setUnsubscriptionKey($this->getUnsubscriptionKey());
        $copyObj->setSubscribedAt($this->getSubscribedAt());
        $copyObj->setConfirmedAt($this->getConfirmedAt());
        $copyObj->setUnsubscribedAt($this->getUnsubscribedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdNewsletterSubscription(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscription Clone of current object.
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
     * @return ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_newsletter_subscription = null;
        $this->email = null;
        $this->status = null;
        $this->confirmation_key = null;
        $this->unsubscription_key = null;
        $this->subscribed_at = null;
        $this->confirmed_at = null;
        $this->unsubscribed_at = null;
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
        return (string) $this->exportTo(ProjectA_Zed_Newsletter_Persistence_Propel_PacNewsletterSubscriptionPeer::DEFAULT_STRING_FORMAT);
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

}
