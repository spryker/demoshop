<?php


/**
 * Base class that represents a row from the 'sao_fulfillment_shipping_tracking_status_history' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingTrackingStatusHistory extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_shipping_tracking_status_history field.
     * @var        int
     */
    protected $id_shipping_tracking_status_history;

    /**
     * The value for the fk_shipping_tracking field.
     * @var        int
     */
    protected $fk_shipping_tracking;

    /**
     * The value for the code field.
     * @var        string
     */
    protected $code;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the notification_timestamp field.
     * @var        string
     */
    protected $notification_timestamp;

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
     * @var        SaoFulfillmentShippingTracking
     */
    protected $aTracking;

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
     * Get the [id_shipping_tracking_status_history] column value.
     *
     * @return int
     */
    public function getIdShippingTrackingStatusHistory()
    {
        return $this->id_shipping_tracking_status_history;
    }

    /**
     * Get the [fk_shipping_tracking] column value.
     *
     * @return int
     */
    public function getFkShippingTracking()
    {
        return $this->fk_shipping_tracking;
    }

    /**
     * Get the [code] column value.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [optionally formatted] temporal [notification_timestamp] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getNotificationTimestamp($format = 'Y-m-d H:i:s')
    {
        if ($this->notification_timestamp === null) {
            return null;
        }

        if ($this->notification_timestamp === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->notification_timestamp);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->notification_timestamp, true), $x);
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
     * Set the value of [id_shipping_tracking_status_history] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function setIdShippingTrackingStatusHistory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_shipping_tracking_status_history !== $v) {
            $this->id_shipping_tracking_status_history = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY;
        }


        return $this;
    } // setIdShippingTrackingStatusHistory()

    /**
     * Set the value of [fk_shipping_tracking] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function setFkShippingTracking($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_shipping_tracking !== $v) {
            $this->fk_shipping_tracking = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING;
        }

        if ($this->aTracking !== null && $this->aTracking->getIdShippingTracking() !== $v) {
            $this->aTracking = null;
        }


        return $this;
    } // setFkShippingTracking()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of [notification_timestamp] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function setNotificationTimestamp($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->notification_timestamp !== null || $dt !== null) {
            $currentDateAsString = ($this->notification_timestamp !== null && $tmpDt = new DateTime($this->notification_timestamp)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->notification_timestamp = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NOTIFICATION_TIMESTAMP;
            }
        } // if either are not null


        return $this;
    } // setNotificationTimestamp()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT;
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

            $this->id_shipping_tracking_status_history = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_shipping_tracking = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->code = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->notification_timestamp = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory object", $e);
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

        if ($this->aTracking !== null && $this->fk_shipping_tracking !== $this->aTracking->getIdShippingTracking()) {
            $this->aTracking = null;
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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTracking = null;
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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery::create()
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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT)) {
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

                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::addInstanceToPool($this);
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

            if ($this->aTracking !== null) {
                if ($this->aTracking->isModified() || $this->aTracking->isNew()) {
                    $affectedRows += $this->aTracking->save($con);
                }
                $this->setTracking($this->aTracking);
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

        $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY;
        if (null !== $this->id_shipping_tracking_status_history) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY)) {
            $modifiedColumns[':p' . $index++]  = '`id_shipping_tracking_status_history`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING)) {
            $modifiedColumns[':p' . $index++]  = '`fk_shipping_tracking`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`code`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NOTIFICATION_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = '`notification_timestamp`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_fulfillment_shipping_tracking_status_history` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_shipping_tracking_status_history`':
                        $stmt->bindValue($identifier, $this->id_shipping_tracking_status_history, PDO::PARAM_INT);
                        break;
                    case '`fk_shipping_tracking`':
                        $stmt->bindValue($identifier, $this->fk_shipping_tracking, PDO::PARAM_INT);
                        break;
                    case '`code`':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`notification_timestamp`':
                        $stmt->bindValue($identifier, $this->notification_timestamp, PDO::PARAM_STR);
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
        $this->setIdShippingTrackingStatusHistory($pk);

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

            if ($this->aTracking !== null) {
                if (!$this->aTracking->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTracking->getValidationFailures());
                }
            }


            if (($retval = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::doValidate($this, $columns)) !== true) {
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
        $pos = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdShippingTrackingStatusHistory();
                break;
            case 1:
                return $this->getFkShippingTracking();
                break;
            case 2:
                return $this->getCode();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getNotificationTimestamp();
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
        if (isset($alreadyDumpedObjects['Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory'][$this->getPrimaryKey()] = true;
        $keys = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdShippingTrackingStatusHistory(),
            $keys[1] => $this->getFkShippingTracking(),
            $keys[2] => $this->getCode(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getNotificationTimestamp(),
            $keys[5] => $this->getCreatedAt(),
            $keys[6] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aTracking) {
                $result['Tracking'] = $this->aTracking->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdShippingTrackingStatusHistory($value);
                break;
            case 1:
                $this->setFkShippingTracking($value);
                break;
            case 2:
                $this->setCode($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setNotificationTimestamp($value);
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
        $keys = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdShippingTrackingStatusHistory($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkShippingTracking($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCode($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNotificationTimestamp($arr[$keys[4]]);
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
        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $this->id_shipping_tracking_status_history);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING, $this->fk_shipping_tracking);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CODE)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CODE, $this->code);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DESCRIPTION)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NOTIFICATION_TIMESTAMP)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NOTIFICATION_TIMESTAMP, $this->notification_timestamp);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $this->id_shipping_tracking_status_history);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdShippingTrackingStatusHistory();
    }

    /**
     * Generic method to set the primary key (id_shipping_tracking_status_history column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdShippingTrackingStatusHistory($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdShippingTrackingStatusHistory();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkShippingTracking($this->getFkShippingTracking());
        $copyObj->setCode($this->getCode());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setNotificationTimestamp($this->getNotificationTimestamp());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdShippingTrackingStatusHistory(NULL); // this is a auto-increment column, so set to default value
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory Clone of current object.
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object.
     *
     * @param             Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $v
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTracking(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $v = null)
    {
        if ($v === null) {
            $this->setFkShippingTracking(NULL);
        } else {
            $this->setFkShippingTracking($v->getIdShippingTracking());
        }

        $this->aTracking = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object, it will not be re-added.
        if ($v !== null) {
            $v->addTrackingStatus($this);
        }


        return $this;
    }


    /**
     * Get the associated Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking The associated Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object.
     * @throws PropelException
     */
    public function getTracking(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTracking === null && ($this->fk_shipping_tracking !== null) && $doQuery) {
            $this->aTracking = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create()->findPk($this->fk_shipping_tracking, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTracking->addTrackingStatuses($this);
             */
        }

        return $this->aTracking;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_shipping_tracking_status_history = null;
        $this->fk_shipping_tracking = null;
        $this->code = null;
        $this->description = null;
        $this->notification_timestamp = null;
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
            if ($this->aTracking instanceof Persistent) {
              $this->aTracking->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aTracking = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DEFAULT_STRING_FORMAT);
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
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT;

        return $this;
    }

}
