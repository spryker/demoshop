<?php


/**
 * Base class that represents a row from the 'pac_payment_control_raw_data_log' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/PaymentControl/Persistence/Propel.om
 */
abstract class Generated_Zed_PaymentControl_Persistence_Propel_Om_BasePacPaymentControlRawDataLog extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_payment_control_raw_data_log field.
     * @var        int
     */
    protected $id_payment_control_raw_data_log;

    /**
     * The value for the session_id field.
     * @var        string
     */
    protected $session_id;

    /**
     * The value for the ip_address field.
     * @var        string
     */
    protected $ip_address;

    /**
     * The value for the data field.
     * @var        string
     */
    protected $data;

    /**
     * The value for the offered_methods field.
     * @var        string
     */
    protected $offered_methods;

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
     * Get the [id_payment_control_raw_data_log] column value.
     *
     * @return int
     */
    public function getIdPaymentControlRawDataLog()
    {

        return $this->id_payment_control_raw_data_log;
    }

    /**
     * Get the [session_id] column value.
     *
     * @return string
     */
    public function getSessionId()
    {

        return $this->session_id;
    }

    /**
     * Get the [ip_address] column value.
     *
     * @return string
     */
    public function getIpAddress()
    {

        return $this->ip_address;
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
     * Get the [offered_methods] column value.
     *
     * @return string
     */
    public function getOfferedMethods()
    {

        return $this->offered_methods;
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
     * Set the value of [id_payment_control_raw_data_log] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function setIdPaymentControlRawDataLog($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_payment_control_raw_data_log !== $v) {
            $this->id_payment_control_raw_data_log = $v;
            $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG;
        }


        return $this;
    } // setIdPaymentControlRawDataLog()

    /**
     * Set the value of [session_id] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function setSessionId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->session_id !== $v) {
            $this->session_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::SESSION_ID;
        }


        return $this;
    } // setSessionId()

    /**
     * Set the value of [ip_address] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function setIpAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ip_address !== $v) {
            $this->ip_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::IP_ADDRESS;
        }


        return $this;
    } // setIpAddress()

    /**
     * Set the value of [data] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function setData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->data !== $v) {
            $this->data = $v;
            $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATA;
        }


        return $this;
    } // setData()

    /**
     * Set the value of [offered_methods] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function setOfferedMethods($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->offered_methods !== $v) {
            $this->offered_methods = $v;
            $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::OFFERED_METHODS;
        }


        return $this;
    } // setOfferedMethods()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT;
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

            $this->id_payment_control_raw_data_log = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->session_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->ip_address = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->data = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->offered_methods = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT)) {
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

                ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG;
        if (null !== $this->id_payment_control_raw_data_log) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG)) {
            $modifiedColumns[':p' . $index++]  = '`id_payment_control_raw_data_log`';
        }
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::SESSION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`session_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::IP_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`ip_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATA)) {
            $modifiedColumns[':p' . $index++]  = '`data`';
        }
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::OFFERED_METHODS)) {
            $modifiedColumns[':p' . $index++]  = '`offered_methods`';
        }
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_payment_control_raw_data_log` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_payment_control_raw_data_log`':
                        $stmt->bindValue($identifier, $this->id_payment_control_raw_data_log, PDO::PARAM_INT);
                        break;
                    case '`session_id`':
                        $stmt->bindValue($identifier, $this->session_id, PDO::PARAM_STR);
                        break;
                    case '`ip_address`':
                        $stmt->bindValue($identifier, $this->ip_address, PDO::PARAM_STR);
                        break;
                    case '`data`':
                        $stmt->bindValue($identifier, $this->data, PDO::PARAM_STR);
                        break;
                    case '`offered_methods`':
                        $stmt->bindValue($identifier, $this->offered_methods, PDO::PARAM_STR);
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
        $this->setIdPaymentControlRawDataLog($pk);

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


            if (($retval = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdPaymentControlRawDataLog();
                break;
            case 1:
                return $this->getSessionId();
                break;
            case 2:
                return $this->getIpAddress();
                break;
            case 3:
                return $this->getData();
                break;
            case 4:
                return $this->getOfferedMethods();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPaymentControlRawDataLog(),
            $keys[1] => $this->getSessionId(),
            $keys[2] => $this->getIpAddress(),
            $keys[3] => $this->getData(),
            $keys[4] => $this->getOfferedMethods(),
            $keys[5] => $this->getCreatedAt(),
            $keys[6] => $this->getUpdatedAt(),
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
        $pos = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdPaymentControlRawDataLog($value);
                break;
            case 1:
                $this->setSessionId($value);
                break;
            case 2:
                $this->setIpAddress($value);
                break;
            case 3:
                $this->setData($value);
                break;
            case 4:
                $this->setOfferedMethods($value);
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
        $keys = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdPaymentControlRawDataLog($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSessionId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIpAddress($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setData($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setOfferedMethods($arr[$keys[4]]);
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
        $criteria = new Criteria(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG)) $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $this->id_payment_control_raw_data_log);
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::SESSION_ID)) $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::SESSION_ID, $this->session_id);
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::IP_ADDRESS)) $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::IP_ADDRESS, $this->ip_address);
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATA)) $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATA, $this->data);
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::OFFERED_METHODS)) $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::OFFERED_METHODS, $this->offered_methods);
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $this->id_payment_control_raw_data_log);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdPaymentControlRawDataLog();
    }

    /**
     * Generic method to set the primary key (id_payment_control_raw_data_log column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPaymentControlRawDataLog($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdPaymentControlRawDataLog();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSessionId($this->getSessionId());
        $copyObj->setIpAddress($this->getIpAddress());
        $copyObj->setData($this->getData());
        $copyObj->setOfferedMethods($this->getOfferedMethods());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPaymentControlRawDataLog(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog Clone of current object.
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
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_payment_control_raw_data_log = null;
        $this->session_id = null;
        $this->ip_address = null;
        $this->data = null;
        $this->offered_methods = null;
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
        return (string) $this->exportTo(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT;

        return $this;
    }

}
