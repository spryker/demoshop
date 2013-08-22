<?php


/**
 * Base class that represents a row from the 'pac_payment' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/payment-package/ProjectA/Zed/Payment/Persistence.om
 */
abstract class Generated_Zed_Payment_Persistence_Om_BasePacPayment extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Payment_Persistence_PacPaymentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Payment_Persistence_PacPaymentPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_payment field.
     * @var        int
     */
    protected $id_payment;

    /**
     * The value for the transaction field.
     * @var        string
     */
    protected $transaction;

    /**
     * The value for the method field.
     * @var        string
     */
    protected $method;

    /**
     * The value for the provider field.
     * @var        string
     */
    protected $provider;

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
     * @var        ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen one-to-one related ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen object
     */
    protected $singlePaymentAdyen;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Payment_Persistence_PacPaymentAccount[] Collection to store aggregation of ProjectA_Zed_Payment_Persistence_PacPaymentAccount objects.
     */
    protected $collPaymentAccounts;
    protected $collPaymentAccountsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Payment_Persistence_PacPaymentTransaction[] Collection to store aggregation of ProjectA_Zed_Payment_Persistence_PacPaymentTransaction objects.
     */
    protected $collPaymentTransactions;
    protected $collPaymentTransactionsPartial;

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
    protected $paymentAdyensScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $paymentAccountsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $paymentTransactionsScheduledForDeletion = null;

    /**
     * Get the [id_payment] column value.
     *
     * @return int
     */
    public function getIdPayment()
    {
        return $this->id_payment;
    }

    /**
     * Get the [transaction] column value.
     *
     * @return string
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Get the [method] column value.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get the [provider] column value.
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
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
     * Set the value of [id_payment] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setIdPayment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_payment !== $v) {
            $this->id_payment = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::ID_PAYMENT;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setIdPayment()

    /**
     * Set the value of [transaction] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setTransaction($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->transaction !== $v) {
            $this->transaction = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::TRANSACTION;
        }


        return $this;
    } // setTransaction()

    /**
     * Set the value of [method] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setMethod($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->method !== $v) {
            $this->method = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::METHOD;
        }


        return $this;
    } // setMethod()

    /**
     * Set the value of [provider] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setProvider($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->provider !== $v) {
            $this->provider = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::PROVIDER;
        }


        return $this;
    } // setProvider()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::UPDATED_AT;
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

            $this->id_payment = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->transaction = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->method = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->provider = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->created_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->updated_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Payment_Persistence_PacPayment object", $e);
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

        if ($this->aOrder !== null && $this->id_payment !== $this->aOrder->getIdSalesOrder()) {
            $this->aOrder = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrder = null;
            $this->singlePaymentAdyen = null;

            $this->collPaymentAccounts = null;

            $this->collPaymentTransactions = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Payment_Persistence_PacPaymentQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Payment_Persistence_PacPaymentPeer::addInstanceToPool($this);
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

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
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

            if ($this->paymentAdyensScheduledForDeletion !== null) {
                if (!$this->paymentAdyensScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery::create()
                        ->filterByPrimaryKeys($this->paymentAdyensScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paymentAdyensScheduledForDeletion = null;
                }
            }

            if ($this->singlePaymentAdyen !== null) {
                if (!$this->singlePaymentAdyen->isDeleted() && ($this->singlePaymentAdyen->isNew() || $this->singlePaymentAdyen->isModified())) {
                        $affectedRows += $this->singlePaymentAdyen->save($con);
                }
            }

            if ($this->paymentAccountsScheduledForDeletion !== null) {
                if (!$this->paymentAccountsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Payment_Persistence_PacPaymentAccountQuery::create()
                        ->filterByPrimaryKeys($this->paymentAccountsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paymentAccountsScheduledForDeletion = null;
                }
            }

            if ($this->collPaymentAccounts !== null) {
                foreach ($this->collPaymentAccounts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->paymentTransactionsScheduledForDeletion !== null) {
                if (!$this->paymentTransactionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Payment_Persistence_PacPaymentTransactionQuery::create()
                        ->filterByPrimaryKeys($this->paymentTransactionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paymentTransactionsScheduledForDeletion = null;
                }
            }

            if ($this->collPaymentTransactions !== null) {
                foreach ($this->collPaymentTransactions as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::ID_PAYMENT)) {
            $modifiedColumns[':p' . $index++]  = '`id_payment`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::TRANSACTION)) {
            $modifiedColumns[':p' . $index++]  = '`transaction`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::METHOD)) {
            $modifiedColumns[':p' . $index++]  = '`method`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::PROVIDER)) {
            $modifiedColumns[':p' . $index++]  = '`provider`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_payment` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_payment`':
                        $stmt->bindValue($identifier, $this->id_payment, PDO::PARAM_INT);
                        break;
                    case '`transaction`':
                        $stmt->bindValue($identifier, $this->transaction, PDO::PARAM_STR);
                        break;
                    case '`method`':
                        $stmt->bindValue($identifier, $this->method, PDO::PARAM_STR);
                        break;
                    case '`provider`':
                        $stmt->bindValue($identifier, $this->provider, PDO::PARAM_STR);
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

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->singlePaymentAdyen !== null) {
                    if (!$this->singlePaymentAdyen->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singlePaymentAdyen->getValidationFailures());
                    }
                }

                if ($this->collPaymentAccounts !== null) {
                    foreach ($this->collPaymentAccounts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPaymentTransactions !== null) {
                    foreach ($this->collPaymentTransactions as $referrerFK) {
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
        $pos = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdPayment();
                break;
            case 1:
                return $this->getTransaction();
                break;
            case 2:
                return $this->getMethod();
                break;
            case 3:
                return $this->getProvider();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Payment_Persistence_PacPayment'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Payment_Persistence_PacPayment'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPayment(),
            $keys[1] => $this->getTransaction(),
            $keys[2] => $this->getMethod(),
            $keys[3] => $this->getProvider(),
            $keys[4] => $this->getCreatedAt(),
            $keys[5] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->singlePaymentAdyen) {
                $result['PaymentAdyen'] = $this->singlePaymentAdyen->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPaymentAccounts) {
                $result['PaymentAccounts'] = $this->collPaymentAccounts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPaymentTransactions) {
                $result['PaymentTransactions'] = $this->collPaymentTransactions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdPayment($value);
                break;
            case 1:
                $this->setTransaction($value);
                break;
            case 2:
                $this->setMethod($value);
                break;
            case 3:
                $this->setProvider($value);
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
        $keys = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdPayment($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTransaction($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMethod($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProvider($arr[$keys[3]]);
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
        $criteria = new Criteria(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::ID_PAYMENT)) $criteria->add(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::ID_PAYMENT, $this->id_payment);
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::TRANSACTION)) $criteria->add(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::TRANSACTION, $this->transaction);
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::METHOD)) $criteria->add(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::METHOD, $this->method);
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::PROVIDER)) $criteria->add(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::PROVIDER, $this->provider);
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::ID_PAYMENT, $this->id_payment);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdPayment();
    }

    /**
     * Generic method to set the primary key (id_payment column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPayment($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdPayment();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Payment_Persistence_PacPayment (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTransaction($this->getTransaction());
        $copyObj->setMethod($this->getMethod());
        $copyObj->setProvider($this->getProvider());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            $relObj = $this->getPaymentAdyen();
            if ($relObj) {
                $copyObj->setPaymentAdyen($relObj->copy($deepCopy));
            }

            foreach ($this->getPaymentAccounts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPaymentAccount($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPaymentTransactions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPaymentTransaction($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getOrder();
            if ($relObj) {
                $copyObj->setOrder($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPayment(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Payment_Persistence_PacPayment Clone of current object.
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
     * @return ProjectA_Zed_Payment_Persistence_PacPaymentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Payment_Persistence_PacPaymentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_PacSalesOrder object.
     *
     * @param             ProjectA_Zed_Sales_Persistence_PacSalesOrder $v
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(ProjectA_Zed_Sales_Persistence_PacSalesOrder $v = null)
    {
        if ($v === null) {
            $this->setIdPayment(NULL);
        } else {
            $this->setIdPayment($v->getIdSalesOrder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setPayment($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder The associated ProjectA_Zed_Sales_Persistence_PacSalesOrder object.
     * @throws PropelException
     */
    public function getOrder(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrder === null && ($this->id_payment !== null) && $doQuery) {
            $this->aOrder = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create()->findPk($this->id_payment, $con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aOrder->setPayment($this);
        }

        return $this->aOrder;
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
        if ('PaymentAccount' == $relationName) {
            $this->initPaymentAccounts();
        }
        if ('PaymentTransaction' == $relationName) {
            $this->initPaymentTransactions();
        }
    }

    /**
     * Gets a single ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen
     * @throws PropelException
     */
    public function getPaymentAdyen(PropelPDO $con = null)
    {

        if ($this->singlePaymentAdyen === null && !$this->isNew()) {
            $this->singlePaymentAdyen = ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singlePaymentAdyen;
    }

    /**
     * Sets a single ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen object as related to this object by a one-to-one relationship.
     *
     * @param             ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen $v ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPaymentAdyen(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen $v = null)
    {
        $this->singlePaymentAdyen = $v;

        // Make sure that that the passed-in ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen isn't already associated with this object
        if ($v !== null && $v->getPayment(null, false) === null) {
            $v->setPayment($this);
        }

        return $this;
    }

    /**
     * Clears out the collPaymentAccounts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     * @see        addPaymentAccounts()
     */
    public function clearPaymentAccounts()
    {
        $this->collPaymentAccounts = null; // important to set this to null since that means it is uninitialized
        $this->collPaymentAccountsPartial = null;

        return $this;
    }

    /**
     * reset is the collPaymentAccounts collection loaded partially
     *
     * @return void
     */
    public function resetPartialPaymentAccounts($v = true)
    {
        $this->collPaymentAccountsPartial = $v;
    }

    /**
     * Initializes the collPaymentAccounts collection.
     *
     * By default this just sets the collPaymentAccounts collection to an empty array (like clearcollPaymentAccounts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPaymentAccounts($overrideExisting = true)
    {
        if (null !== $this->collPaymentAccounts && !$overrideExisting) {
            return;
        }
        $this->collPaymentAccounts = new PropelObjectCollection();
        $this->collPaymentAccounts->setModel('ProjectA_Zed_Payment_Persistence_PacPaymentAccount');
    }

    /**
     * Gets an array of ProjectA_Zed_Payment_Persistence_PacPaymentAccount objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Payment_Persistence_PacPayment is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Payment_Persistence_PacPaymentAccount[] List of ProjectA_Zed_Payment_Persistence_PacPaymentAccount objects
     * @throws PropelException
     */
    public function getPaymentAccounts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPaymentAccountsPartial && !$this->isNew();
        if (null === $this->collPaymentAccounts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPaymentAccounts) {
                // return empty collection
                $this->initPaymentAccounts();
            } else {
                $collPaymentAccounts = ProjectA_Zed_Payment_Persistence_PacPaymentAccountQuery::create(null, $criteria)
                    ->filterByPayment($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPaymentAccountsPartial && count($collPaymentAccounts)) {
                      $this->initPaymentAccounts(false);

                      foreach($collPaymentAccounts as $obj) {
                        if (false == $this->collPaymentAccounts->contains($obj)) {
                          $this->collPaymentAccounts->append($obj);
                        }
                      }

                      $this->collPaymentAccountsPartial = true;
                    }

                    $collPaymentAccounts->getInternalIterator()->rewind();
                    return $collPaymentAccounts;
                }

                if($partial && $this->collPaymentAccounts) {
                    foreach($this->collPaymentAccounts as $obj) {
                        if($obj->isNew()) {
                            $collPaymentAccounts[] = $obj;
                        }
                    }
                }

                $this->collPaymentAccounts = $collPaymentAccounts;
                $this->collPaymentAccountsPartial = false;
            }
        }

        return $this->collPaymentAccounts;
    }

    /**
     * Sets a collection of PaymentAccount objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $paymentAccounts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setPaymentAccounts(PropelCollection $paymentAccounts, PropelPDO $con = null)
    {
        $paymentAccountsToDelete = $this->getPaymentAccounts(new Criteria(), $con)->diff($paymentAccounts);

        $this->paymentAccountsScheduledForDeletion = unserialize(serialize($paymentAccountsToDelete));

        foreach ($paymentAccountsToDelete as $paymentAccountRemoved) {
            $paymentAccountRemoved->setPayment(null);
        }

        $this->collPaymentAccounts = null;
        foreach ($paymentAccounts as $paymentAccount) {
            $this->addPaymentAccount($paymentAccount);
        }

        $this->collPaymentAccounts = $paymentAccounts;
        $this->collPaymentAccountsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Payment_Persistence_PacPaymentAccount objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Payment_Persistence_PacPaymentAccount objects.
     * @throws PropelException
     */
    public function countPaymentAccounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPaymentAccountsPartial && !$this->isNew();
        if (null === $this->collPaymentAccounts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPaymentAccounts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPaymentAccounts());
            }
            $query = ProjectA_Zed_Payment_Persistence_PacPaymentAccountQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPayment($this)
                ->count($con);
        }

        return count($this->collPaymentAccounts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Payment_Persistence_PacPaymentAccount object to this object
     * through the ProjectA_Zed_Payment_Persistence_PacPaymentAccount foreign key attribute.
     *
     * @param    ProjectA_Zed_Payment_Persistence_PacPaymentAccount $l ProjectA_Zed_Payment_Persistence_PacPaymentAccount
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function addPaymentAccount(ProjectA_Zed_Payment_Persistence_PacPaymentAccount $l)
    {
        if ($this->collPaymentAccounts === null) {
            $this->initPaymentAccounts();
            $this->collPaymentAccountsPartial = true;
        }
        if (!in_array($l, $this->collPaymentAccounts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPaymentAccount($l);
        }

        return $this;
    }

    /**
     * @param	PaymentAccount $paymentAccount The paymentAccount object to add.
     */
    protected function doAddPaymentAccount($paymentAccount)
    {
        $this->collPaymentAccounts[]= $paymentAccount;
        $paymentAccount->setPayment($this);
    }

    /**
     * @param	PaymentAccount $paymentAccount The paymentAccount object to remove.
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function removePaymentAccount($paymentAccount)
    {
        if ($this->getPaymentAccounts()->contains($paymentAccount)) {
            $this->collPaymentAccounts->remove($this->collPaymentAccounts->search($paymentAccount));
            if (null === $this->paymentAccountsScheduledForDeletion) {
                $this->paymentAccountsScheduledForDeletion = clone $this->collPaymentAccounts;
                $this->paymentAccountsScheduledForDeletion->clear();
            }
            $this->paymentAccountsScheduledForDeletion[]= clone $paymentAccount;
            $paymentAccount->setPayment(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacPayment is new, it will return
     * an empty collection; or if this PacPayment has previously
     * been saved, it will retrieve related PaymentAccounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacPayment.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Payment_Persistence_PacPaymentAccount[] List of ProjectA_Zed_Payment_Persistence_PacPaymentAccount objects
     */
    public function getPaymentAccountsJoinPaymentTransaction($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Payment_Persistence_PacPaymentAccountQuery::create(null, $criteria);
        $query->joinWith('PaymentTransaction', $join_behavior);

        return $this->getPaymentAccounts($query, $con);
    }

    /**
     * Clears out the collPaymentTransactions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     * @see        addPaymentTransactions()
     */
    public function clearPaymentTransactions()
    {
        $this->collPaymentTransactions = null; // important to set this to null since that means it is uninitialized
        $this->collPaymentTransactionsPartial = null;

        return $this;
    }

    /**
     * reset is the collPaymentTransactions collection loaded partially
     *
     * @return void
     */
    public function resetPartialPaymentTransactions($v = true)
    {
        $this->collPaymentTransactionsPartial = $v;
    }

    /**
     * Initializes the collPaymentTransactions collection.
     *
     * By default this just sets the collPaymentTransactions collection to an empty array (like clearcollPaymentTransactions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPaymentTransactions($overrideExisting = true)
    {
        if (null !== $this->collPaymentTransactions && !$overrideExisting) {
            return;
        }
        $this->collPaymentTransactions = new PropelObjectCollection();
        $this->collPaymentTransactions->setModel('ProjectA_Zed_Payment_Persistence_PacPaymentTransaction');
    }

    /**
     * Gets an array of ProjectA_Zed_Payment_Persistence_PacPaymentTransaction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Payment_Persistence_PacPayment is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Payment_Persistence_PacPaymentTransaction[] List of ProjectA_Zed_Payment_Persistence_PacPaymentTransaction objects
     * @throws PropelException
     */
    public function getPaymentTransactions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPaymentTransactionsPartial && !$this->isNew();
        if (null === $this->collPaymentTransactions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPaymentTransactions) {
                // return empty collection
                $this->initPaymentTransactions();
            } else {
                $collPaymentTransactions = ProjectA_Zed_Payment_Persistence_PacPaymentTransactionQuery::create(null, $criteria)
                    ->filterByPayment($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPaymentTransactionsPartial && count($collPaymentTransactions)) {
                      $this->initPaymentTransactions(false);

                      foreach($collPaymentTransactions as $obj) {
                        if (false == $this->collPaymentTransactions->contains($obj)) {
                          $this->collPaymentTransactions->append($obj);
                        }
                      }

                      $this->collPaymentTransactionsPartial = true;
                    }

                    $collPaymentTransactions->getInternalIterator()->rewind();
                    return $collPaymentTransactions;
                }

                if($partial && $this->collPaymentTransactions) {
                    foreach($this->collPaymentTransactions as $obj) {
                        if($obj->isNew()) {
                            $collPaymentTransactions[] = $obj;
                        }
                    }
                }

                $this->collPaymentTransactions = $collPaymentTransactions;
                $this->collPaymentTransactionsPartial = false;
            }
        }

        return $this->collPaymentTransactions;
    }

    /**
     * Sets a collection of PaymentTransaction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $paymentTransactions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function setPaymentTransactions(PropelCollection $paymentTransactions, PropelPDO $con = null)
    {
        $paymentTransactionsToDelete = $this->getPaymentTransactions(new Criteria(), $con)->diff($paymentTransactions);

        $this->paymentTransactionsScheduledForDeletion = unserialize(serialize($paymentTransactionsToDelete));

        foreach ($paymentTransactionsToDelete as $paymentTransactionRemoved) {
            $paymentTransactionRemoved->setPayment(null);
        }

        $this->collPaymentTransactions = null;
        foreach ($paymentTransactions as $paymentTransaction) {
            $this->addPaymentTransaction($paymentTransaction);
        }

        $this->collPaymentTransactions = $paymentTransactions;
        $this->collPaymentTransactionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Payment_Persistence_PacPaymentTransaction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Payment_Persistence_PacPaymentTransaction objects.
     * @throws PropelException
     */
    public function countPaymentTransactions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPaymentTransactionsPartial && !$this->isNew();
        if (null === $this->collPaymentTransactions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPaymentTransactions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPaymentTransactions());
            }
            $query = ProjectA_Zed_Payment_Persistence_PacPaymentTransactionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPayment($this)
                ->count($con);
        }

        return count($this->collPaymentTransactions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Payment_Persistence_PacPaymentTransaction object to this object
     * through the ProjectA_Zed_Payment_Persistence_PacPaymentTransaction foreign key attribute.
     *
     * @param    ProjectA_Zed_Payment_Persistence_PacPaymentTransaction $l ProjectA_Zed_Payment_Persistence_PacPaymentTransaction
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function addPaymentTransaction(ProjectA_Zed_Payment_Persistence_PacPaymentTransaction $l)
    {
        if ($this->collPaymentTransactions === null) {
            $this->initPaymentTransactions();
            $this->collPaymentTransactionsPartial = true;
        }
        if (!in_array($l, $this->collPaymentTransactions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPaymentTransaction($l);
        }

        return $this;
    }

    /**
     * @param	PaymentTransaction $paymentTransaction The paymentTransaction object to add.
     */
    protected function doAddPaymentTransaction($paymentTransaction)
    {
        $this->collPaymentTransactions[]= $paymentTransaction;
        $paymentTransaction->setPayment($this);
    }

    /**
     * @param	PaymentTransaction $paymentTransaction The paymentTransaction object to remove.
     * @return ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function removePaymentTransaction($paymentTransaction)
    {
        if ($this->getPaymentTransactions()->contains($paymentTransaction)) {
            $this->collPaymentTransactions->remove($this->collPaymentTransactions->search($paymentTransaction));
            if (null === $this->paymentTransactionsScheduledForDeletion) {
                $this->paymentTransactionsScheduledForDeletion = clone $this->collPaymentTransactions;
                $this->paymentTransactionsScheduledForDeletion->clear();
            }
            $this->paymentTransactionsScheduledForDeletion[]= clone $paymentTransaction;
            $paymentTransaction->setPayment(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_payment = null;
        $this->transaction = null;
        $this->method = null;
        $this->provider = null;
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
            if ($this->singlePaymentAdyen) {
                $this->singlePaymentAdyen->clearAllReferences($deep);
            }
            if ($this->collPaymentAccounts) {
                foreach ($this->collPaymentAccounts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPaymentTransactions) {
                foreach ($this->collPaymentTransactions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->singlePaymentAdyen instanceof PropelCollection) {
            $this->singlePaymentAdyen->clearIterator();
        }
        $this->singlePaymentAdyen = null;
        if ($this->collPaymentAccounts instanceof PropelCollection) {
            $this->collPaymentAccounts->clearIterator();
        }
        $this->collPaymentAccounts = null;
        if ($this->collPaymentTransactions instanceof PropelCollection) {
            $this->collPaymentTransactions->clearIterator();
        }
        $this->collPaymentTransactions = null;
        $this->aOrder = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Payment_Persistence_PacPaymentPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Payment_Persistence_PacPayment The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Payment_Persistence_PacPaymentPeer::UPDATED_AT;

        return $this;
    }

}
