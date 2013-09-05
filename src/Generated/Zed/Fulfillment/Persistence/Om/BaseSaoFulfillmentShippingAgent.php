<?php


/**
 * Base class that represents a row from the 'sao_fulfillment_shipping_agent' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingAgent extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_shipping_agent field.
     * @var        int
     */
    protected $id_shipping_agent;

    /**
     * The value for the internal_name field.
     * @var        string
     */
    protected $internal_name;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the tracking_url field.
     * @var        string
     */
    protected $tracking_url;

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
     * @var        PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] Collection to store aggregation of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     */
    protected $collQuotes;
    protected $collQuotesPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[] Collection to store aggregation of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects.
     */
    protected $collTrackings;
    protected $collTrackingsPartial;

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
    protected $quotesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $trackingsScheduledForDeletion = null;

    /**
     * Get the [id_shipping_agent] column value.
     *
     * @return int
     */
    public function getIdShippingAgent()
    {
        return $this->id_shipping_agent;
    }

    /**
     * Get the [internal_name] column value.
     *
     * @return string
     */
    public function getInternalName()
    {
        return $this->internal_name;
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
     * Get the [tracking_url] column value.
     *
     * @return string
     */
    public function getTrackingUrl()
    {
        return $this->tracking_url;
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
     * Set the value of [id_shipping_agent] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setIdShippingAgent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_shipping_agent !== $v) {
            $this->id_shipping_agent = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT;
        }


        return $this;
    } // setIdShippingAgent()

    /**
     * Set the value of [internal_name] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setInternalName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->internal_name !== $v) {
            $this->internal_name = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::INTERNAL_NAME;
        }


        return $this;
    } // setInternalName()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [tracking_url] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setTrackingUrl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tracking_url !== $v) {
            $this->tracking_url = $v;
            $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::TRACKING_URL;
        }


        return $this;
    } // setTrackingUrl()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT;
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

            $this->id_shipping_agent = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->internal_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->tracking_url = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->created_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->updated_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object", $e);
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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collQuotes = null;

            $this->collTrackings = null;

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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery::create()
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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT)) {
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

                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addInstanceToPool($this);
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

            if ($this->quotesScheduledForDeletion !== null) {
                if (!$this->quotesScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()
                        ->filterByPrimaryKeys($this->quotesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quotesScheduledForDeletion = null;
                }
            }

            if ($this->collQuotes !== null) {
                foreach ($this->collQuotes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trackingsScheduledForDeletion !== null) {
                if (!$this->trackingsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create()
                        ->filterByPrimaryKeys($this->trackingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trackingsScheduledForDeletion = null;
                }
            }

            if ($this->collTrackings !== null) {
                foreach ($this->collTrackings as $referrerFK) {
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

        $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT;
        if (null !== $this->id_shipping_agent) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT)) {
            $modifiedColumns[':p' . $index++]  = '`id_shipping_agent`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::INTERNAL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`internal_name`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::TRACKING_URL)) {
            $modifiedColumns[':p' . $index++]  = '`tracking_url`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_fulfillment_shipping_agent` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_shipping_agent`':
                        $stmt->bindValue($identifier, $this->id_shipping_agent, PDO::PARAM_INT);
                        break;
                    case '`internal_name`':
                        $stmt->bindValue($identifier, $this->internal_name, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`tracking_url`':
                        $stmt->bindValue($identifier, $this->tracking_url, PDO::PARAM_STR);
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
        $this->setIdShippingAgent($pk);

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


            if (($retval = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collQuotes !== null) {
                    foreach ($this->collQuotes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTrackings !== null) {
                    foreach ($this->collTrackings as $referrerFK) {
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
        $pos = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdShippingAgent();
                break;
            case 1:
                return $this->getInternalName();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getTrackingUrl();
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
        if (isset($alreadyDumpedObjects['Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent'][$this->getPrimaryKey()] = true;
        $keys = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdShippingAgent(),
            $keys[1] => $this->getInternalName(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getTrackingUrl(),
            $keys[4] => $this->getCreatedAt(),
            $keys[5] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collQuotes) {
                $result['Quotes'] = $this->collQuotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrackings) {
                $result['Trackings'] = $this->collTrackings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdShippingAgent($value);
                break;
            case 1:
                $this->setInternalName($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setTrackingUrl($value);
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
        $keys = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdShippingAgent($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setInternalName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTrackingUrl($arr[$keys[3]]);
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
        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $this->id_shipping_agent);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::INTERNAL_NAME)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::INTERNAL_NAME, $this->internal_name);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NAME)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NAME, $this->name);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::TRACKING_URL)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::TRACKING_URL, $this->tracking_url);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT)) $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $this->id_shipping_agent);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdShippingAgent();
    }

    /**
     * Generic method to set the primary key (id_shipping_agent column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdShippingAgent($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdShippingAgent();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setInternalName($this->getInternalName());
        $copyObj->setName($this->getName());
        $copyObj->setTrackingUrl($this->getTrackingUrl());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getQuotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuote($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrackings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTracking($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdShippingAgent(NULL); // this is a auto-increment column, so set to default value
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent Clone of current object.
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer();
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
        if ('Quote' == $relationName) {
            $this->initQuotes();
        }
        if ('Tracking' == $relationName) {
            $this->initTrackings();
        }
    }

    /**
     * Clears out the collQuotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     * @see        addQuotes()
     */
    public function clearQuotes()
    {
        $this->collQuotes = null; // important to set this to null since that means it is uninitialized
        $this->collQuotesPartial = null;

        return $this;
    }

    /**
     * reset is the collQuotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuotes($v = true)
    {
        $this->collQuotesPartial = $v;
    }

    /**
     * Initializes the collQuotes collection.
     *
     * By default this just sets the collQuotes collection to an empty array (like clearcollQuotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuotes($overrideExisting = true)
    {
        if (null !== $this->collQuotes && !$overrideExisting) {
            return;
        }
        $this->collQuotes = new PropelObjectCollection();
        $this->collQuotes->setModel('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote');
    }

    /**
     * Gets an array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects
     * @throws PropelException
     */
    public function getQuotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuotesPartial && !$this->isNew();
        if (null === $this->collQuotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuotes) {
                // return empty collection
                $this->initQuotes();
            } else {
                $collQuotes = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria)
                    ->filterByShippingAgent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuotesPartial && count($collQuotes)) {
                      $this->initQuotes(false);

                      foreach($collQuotes as $obj) {
                        if (false == $this->collQuotes->contains($obj)) {
                          $this->collQuotes->append($obj);
                        }
                      }

                      $this->collQuotesPartial = true;
                    }

                    $collQuotes->getInternalIterator()->rewind();
                    return $collQuotes;
                }

                if($partial && $this->collQuotes) {
                    foreach($this->collQuotes as $obj) {
                        if($obj->isNew()) {
                            $collQuotes[] = $obj;
                        }
                    }
                }

                $this->collQuotes = $collQuotes;
                $this->collQuotesPartial = false;
            }
        }

        return $this->collQuotes;
    }

    /**
     * Sets a collection of Quote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quotes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setQuotes(PropelCollection $quotes, PropelPDO $con = null)
    {
        $quotesToDelete = $this->getQuotes(new Criteria(), $con)->diff($quotes);

        $this->quotesScheduledForDeletion = unserialize(serialize($quotesToDelete));

        foreach ($quotesToDelete as $quoteRemoved) {
            $quoteRemoved->setShippingAgent(null);
        }

        $this->collQuotes = null;
        foreach ($quotes as $quote) {
            $this->addQuote($quote);
        }

        $this->collQuotes = $quotes;
        $this->collQuotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException
     */
    public function countQuotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuotesPartial && !$this->isNew();
        if (null === $this->collQuotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuotes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getQuotes());
            }
            $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShippingAgent($this)
                ->count($con);
        }

        return count($this->collQuotes);
    }

    /**
     * Method called to associate a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object to this object
     * through the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote foreign key attribute.
     *
     * @param    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $l Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function addQuote(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $l)
    {
        if ($this->collQuotes === null) {
            $this->initQuotes();
            $this->collQuotesPartial = true;
        }
        if (!in_array($l, $this->collQuotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuote($l);
        }

        return $this;
    }

    /**
     * @param	Quote $quote The quote object to add.
     */
    protected function doAddQuote($quote)
    {
        $this->collQuotes[]= $quote;
        $quote->setShippingAgent($this);
    }

    /**
     * @param	Quote $quote The quote object to remove.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function removeQuote($quote)
    {
        if ($this->getQuotes()->contains($quote)) {
            $this->collQuotes->remove($this->collQuotes->search($quote));
            if (null === $this->quotesScheduledForDeletion) {
                $this->quotesScheduledForDeletion = clone $this->collQuotes;
                $this->quotesScheduledForDeletion->clear();
            }
            $this->quotesScheduledForDeletion[]= clone $quote;
            $quote->setShippingAgent(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SaoFulfillmentShippingAgent is new, it will return
     * an empty collection; or if this SaoFulfillmentShippingAgent has previously
     * been saved, it will retrieve related Quotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoFulfillmentShippingAgent.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects
     */
    public function getQuotesJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getQuotes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SaoFulfillmentShippingAgent is new, it will return
     * an empty collection; or if this SaoFulfillmentShippingAgent has previously
     * been saved, it will retrieve related Quotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoFulfillmentShippingAgent.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects
     */
    public function getQuotesJoinProvider($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create(null, $criteria);
        $query->joinWith('Provider', $join_behavior);

        return $this->getQuotes($query, $con);
    }

    /**
     * Clears out the collTrackings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     * @see        addTrackings()
     */
    public function clearTrackings()
    {
        $this->collTrackings = null; // important to set this to null since that means it is uninitialized
        $this->collTrackingsPartial = null;

        return $this;
    }

    /**
     * reset is the collTrackings collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrackings($v = true)
    {
        $this->collTrackingsPartial = $v;
    }

    /**
     * Initializes the collTrackings collection.
     *
     * By default this just sets the collTrackings collection to an empty array (like clearcollTrackings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrackings($overrideExisting = true)
    {
        if (null !== $this->collTrackings && !$overrideExisting) {
            return;
        }
        $this->collTrackings = new PropelObjectCollection();
        $this->collTrackings->setModel('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking');
    }

    /**
     * Gets an array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects
     * @throws PropelException
     */
    public function getTrackings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrackingsPartial && !$this->isNew();
        if (null === $this->collTrackings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrackings) {
                // return empty collection
                $this->initTrackings();
            } else {
                $collTrackings = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create(null, $criteria)
                    ->filterByShippingAgent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrackingsPartial && count($collTrackings)) {
                      $this->initTrackings(false);

                      foreach($collTrackings as $obj) {
                        if (false == $this->collTrackings->contains($obj)) {
                          $this->collTrackings->append($obj);
                        }
                      }

                      $this->collTrackingsPartial = true;
                    }

                    $collTrackings->getInternalIterator()->rewind();
                    return $collTrackings;
                }

                if($partial && $this->collTrackings) {
                    foreach($this->collTrackings as $obj) {
                        if($obj->isNew()) {
                            $collTrackings[] = $obj;
                        }
                    }
                }

                $this->collTrackings = $collTrackings;
                $this->collTrackingsPartial = false;
            }
        }

        return $this->collTrackings;
    }

    /**
     * Sets a collection of Tracking objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trackings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function setTrackings(PropelCollection $trackings, PropelPDO $con = null)
    {
        $trackingsToDelete = $this->getTrackings(new Criteria(), $con)->diff($trackings);

        $this->trackingsScheduledForDeletion = unserialize(serialize($trackingsToDelete));

        foreach ($trackingsToDelete as $trackingRemoved) {
            $trackingRemoved->setShippingAgent(null);
        }

        $this->collTrackings = null;
        foreach ($trackings as $tracking) {
            $this->addTracking($tracking);
        }

        $this->collTrackings = $trackings;
        $this->collTrackingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects.
     * @throws PropelException
     */
    public function countTrackings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrackingsPartial && !$this->isNew();
        if (null === $this->collTrackings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrackings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrackings());
            }
            $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShippingAgent($this)
                ->count($con);
        }

        return count($this->collTrackings);
    }

    /**
     * Method called to associate a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object to this object
     * through the Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking foreign key attribute.
     *
     * @param    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $l Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function addTracking(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $l)
    {
        if ($this->collTrackings === null) {
            $this->initTrackings();
            $this->collTrackingsPartial = true;
        }
        if (!in_array($l, $this->collTrackings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTracking($l);
        }

        return $this;
    }

    /**
     * @param	Tracking $tracking The tracking object to add.
     */
    protected function doAddTracking($tracking)
    {
        $this->collTrackings[]= $tracking;
        $tracking->setShippingAgent($this);
    }

    /**
     * @param	Tracking $tracking The tracking object to remove.
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function removeTracking($tracking)
    {
        if ($this->getTrackings()->contains($tracking)) {
            $this->collTrackings->remove($this->collTrackings->search($tracking));
            if (null === $this->trackingsScheduledForDeletion) {
                $this->trackingsScheduledForDeletion = clone $this->collTrackings;
                $this->trackingsScheduledForDeletion->clear();
            }
            $this->trackingsScheduledForDeletion[]= clone $tracking;
            $tracking->setShippingAgent(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SaoFulfillmentShippingAgent is new, it will return
     * an empty collection; or if this SaoFulfillmentShippingAgent has previously
     * been saved, it will retrieve related Trackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoFulfillmentShippingAgent.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[] List of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects
     */
    public function getTrackingsJoinQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery::create(null, $criteria);
        $query->joinWith('Quote', $join_behavior);

        return $this->getTrackings($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_shipping_agent = null;
        $this->internal_name = null;
        $this->name = null;
        $this->tracking_url = null;
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
            if ($this->collQuotes) {
                foreach ($this->collQuotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrackings) {
                foreach ($this->collTrackings as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collQuotes instanceof PropelCollection) {
            $this->collQuotes->clearIterator();
        }
        $this->collQuotes = null;
        if ($this->collTrackings instanceof PropelCollection) {
            $this->collTrackings->clearIterator();
        }
        $this->collTrackings = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::DEFAULT_STRING_FORMAT);
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
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT;

        return $this;
    }

}
