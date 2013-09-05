<?php


/**
 * Base class that represents a row from the 'pac_cart_user' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/cart-package/ProjectA/Zed/Cart/Persistence.om
 */
abstract class Generated_Zed_Cart_Persistence_Om_BasePacCartUser extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Cart_Persistence_PacCartUserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Cart_Persistence_PacCartUserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_cart_user field.
     * @var        int
     */
    protected $id_cart_user;

    /**
     * The value for the fk_cart field.
     * @var        int
     */
    protected $fk_cart;

    /**
     * The value for the fk_customer field.
     * @var        int
     */
    protected $fk_customer;

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
     * @var        PacCart
     */
    protected $aCart;

    /**
     * @var        PacCustomer
     */
    protected $aCustomer;

    /**
     * @var        ProjectA_Zed_Cart_Persistence_PacCartUserStep one-to-one related ProjectA_Zed_Cart_Persistence_PacCartUserStep object
     */
    protected $singleCartUserStep;

    /**
     * @var        Sao_Zed_Cart_Persistence_SaoCartUser one-to-one related Sao_Zed_Cart_Persistence_SaoCartUser object
     */
    protected $singleSaoCartUser;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] Collection to store aggregation of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects.
     */
    protected $collSaoMailSequenceCartUserCodes;
    protected $collSaoMailSequenceCartUserCodesPartial;

    /**
     * @var        Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist one-to-one related Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist object
     */
    protected $singleSaoMailSequenceCartUserBlacklist;

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
    protected $cartUserStepsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoCartUsersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoMailSequenceCartUserCodesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoMailSequenceCartUserBlacklistsScheduledForDeletion = null;

    /**
     * Get the [id_cart_user] column value.
     *
     * @return int
     */
    public function getIdCartUser()
    {
        return $this->id_cart_user;
    }

    /**
     * Get the [fk_cart] column value.
     *
     * @return int
     */
    public function getFkCart()
    {
        return $this->fk_cart;
    }

    /**
     * Get the [fk_customer] column value.
     *
     * @return int
     */
    public function getFkCustomer()
    {
        return $this->fk_customer;
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
     * Set the value of [id_cart_user] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function setIdCartUser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_cart_user !== $v) {
            $this->id_cart_user = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::ID_CART_USER;
        }


        return $this;
    } // setIdCartUser()

    /**
     * Set the value of [fk_cart] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function setFkCart($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_cart !== $v) {
            $this->fk_cart = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CART;
        }

        if ($this->aCart !== null && $this->aCart->getIdCart() !== $v) {
            $this->aCart = null;
        }


        return $this;
    } // setFkCart()

    /**
     * Set the value of [fk_customer] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function setFkCustomer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_customer !== $v) {
            $this->fk_customer = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CUSTOMER;
        }

        if ($this->aCustomer !== null && $this->aCustomer->getIdCustomer() !== $v) {
            $this->aCustomer = null;
        }


        return $this;
    } // setFkCustomer()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::UPDATED_AT;
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

            $this->id_cart_user = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_cart = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_customer = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->created_at = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->updated_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Cart_Persistence_PacCartUser object", $e);
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

        if ($this->aCart !== null && $this->fk_cart !== $this->aCart->getIdCart()) {
            $this->aCart = null;
        }
        if ($this->aCustomer !== null && $this->fk_customer !== $this->aCustomer->getIdCustomer()) {
            $this->aCustomer = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCart = null;
            $this->aCustomer = null;
            $this->singleCartUserStep = null;

            $this->singleSaoCartUser = null;

            $this->collSaoMailSequenceCartUserCodes = null;

            $this->singleSaoMailSequenceCartUserBlacklist = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Cart_Persistence_PacCartUserQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Cart_Persistence_PacCartUserPeer::addInstanceToPool($this);
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

            if ($this->aCart !== null) {
                if ($this->aCart->isModified() || $this->aCart->isNew()) {
                    $affectedRows += $this->aCart->save($con);
                }
                $this->setCart($this->aCart);
            }

            if ($this->aCustomer !== null) {
                if ($this->aCustomer->isModified() || $this->aCustomer->isNew()) {
                    $affectedRows += $this->aCustomer->save($con);
                }
                $this->setCustomer($this->aCustomer);
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

            if ($this->cartUserStepsScheduledForDeletion !== null) {
                if (!$this->cartUserStepsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery::create()
                        ->filterByPrimaryKeys($this->cartUserStepsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cartUserStepsScheduledForDeletion = null;
                }
            }

            if ($this->singleCartUserStep !== null) {
                if (!$this->singleCartUserStep->isDeleted() && ($this->singleCartUserStep->isNew() || $this->singleCartUserStep->isModified())) {
                        $affectedRows += $this->singleCartUserStep->save($con);
                }
            }

            if ($this->saoCartUsersScheduledForDeletion !== null) {
                if (!$this->saoCartUsersScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Cart_Persistence_SaoCartUserQuery::create()
                        ->filterByPrimaryKeys($this->saoCartUsersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoCartUsersScheduledForDeletion = null;
                }
            }

            if ($this->singleSaoCartUser !== null) {
                if (!$this->singleSaoCartUser->isDeleted() && ($this->singleSaoCartUser->isNew() || $this->singleSaoCartUser->isModified())) {
                        $affectedRows += $this->singleSaoCartUser->save($con);
                }
            }

            if ($this->saoMailSequenceCartUserCodesScheduledForDeletion !== null) {
                if (!$this->saoMailSequenceCartUserCodesScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create()
                        ->filterByPrimaryKeys($this->saoMailSequenceCartUserCodesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoMailSequenceCartUserCodesScheduledForDeletion = null;
                }
            }

            if ($this->collSaoMailSequenceCartUserCodes !== null) {
                foreach ($this->collSaoMailSequenceCartUserCodes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->saoMailSequenceCartUserBlacklistsScheduledForDeletion !== null) {
                if (!$this->saoMailSequenceCartUserBlacklistsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery::create()
                        ->filterByPrimaryKeys($this->saoMailSequenceCartUserBlacklistsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoMailSequenceCartUserBlacklistsScheduledForDeletion = null;
                }
            }

            if ($this->singleSaoMailSequenceCartUserBlacklist !== null) {
                if (!$this->singleSaoMailSequenceCartUserBlacklist->isDeleted() && ($this->singleSaoMailSequenceCartUserBlacklist->isNew() || $this->singleSaoMailSequenceCartUserBlacklist->isModified())) {
                        $affectedRows += $this->singleSaoMailSequenceCartUserBlacklist->save($con);
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

        $this->modifiedColumns[] = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::ID_CART_USER;
        if (null !== $this->id_cart_user) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Cart_Persistence_PacCartUserPeer::ID_CART_USER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::ID_CART_USER)) {
            $modifiedColumns[':p' . $index++]  = '`id_cart_user`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CART)) {
            $modifiedColumns[':p' . $index++]  = '`fk_cart`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_customer`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_cart_user` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_cart_user`':
                        $stmt->bindValue($identifier, $this->id_cart_user, PDO::PARAM_INT);
                        break;
                    case '`fk_cart`':
                        $stmt->bindValue($identifier, $this->fk_cart, PDO::PARAM_INT);
                        break;
                    case '`fk_customer`':
                        $stmt->bindValue($identifier, $this->fk_customer, PDO::PARAM_INT);
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
        $this->setIdCartUser($pk);

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

            if ($this->aCart !== null) {
                if (!$this->aCart->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCart->getValidationFailures());
                }
            }

            if ($this->aCustomer !== null) {
                if (!$this->aCustomer->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCustomer->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->singleCartUserStep !== null) {
                    if (!$this->singleCartUserStep->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleCartUserStep->getValidationFailures());
                    }
                }

                if ($this->singleSaoCartUser !== null) {
                    if (!$this->singleSaoCartUser->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSaoCartUser->getValidationFailures());
                    }
                }

                if ($this->collSaoMailSequenceCartUserCodes !== null) {
                    foreach ($this->collSaoMailSequenceCartUserCodes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleSaoMailSequenceCartUserBlacklist !== null) {
                    if (!$this->singleSaoMailSequenceCartUserBlacklist->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSaoMailSequenceCartUserBlacklist->getValidationFailures());
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
        $pos = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCartUser();
                break;
            case 1:
                return $this->getFkCart();
                break;
            case 2:
                return $this->getFkCustomer();
                break;
            case 3:
                return $this->getCreatedAt();
                break;
            case 4:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Cart_Persistence_PacCartUser'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Cart_Persistence_PacCartUser'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCartUser(),
            $keys[1] => $this->getFkCart(),
            $keys[2] => $this->getFkCustomer(),
            $keys[3] => $this->getCreatedAt(),
            $keys[4] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCart) {
                $result['Cart'] = $this->aCart->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCustomer) {
                $result['Customer'] = $this->aCustomer->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleCartUserStep) {
                $result['CartUserStep'] = $this->singleCartUserStep->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleSaoCartUser) {
                $result['SaoCartUser'] = $this->singleSaoCartUser->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSaoMailSequenceCartUserCodes) {
                $result['SaoMailSequenceCartUserCodes'] = $this->collSaoMailSequenceCartUserCodes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleSaoMailSequenceCartUserBlacklist) {
                $result['SaoMailSequenceCartUserBlacklist'] = $this->singleSaoMailSequenceCartUserBlacklist->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCartUser($value);
                break;
            case 1:
                $this->setFkCart($value);
                break;
            case 2:
                $this->setFkCustomer($value);
                break;
            case 3:
                $this->setCreatedAt($value);
                break;
            case 4:
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
        $keys = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCartUser($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCart($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkCustomer($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::ID_CART_USER)) $criteria->add(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::ID_CART_USER, $this->id_cart_user);
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CART)) $criteria->add(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CART, $this->fk_cart);
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CUSTOMER)) $criteria->add(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::FK_CUSTOMER, $this->fk_customer);
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::ID_CART_USER, $this->id_cart_user);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCartUser();
    }

    /**
     * Generic method to set the primary key (id_cart_user column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCartUser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCartUser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Cart_Persistence_PacCartUser (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCart($this->getFkCart());
        $copyObj->setFkCustomer($this->getFkCustomer());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            $relObj = $this->getCartUserStep();
            if ($relObj) {
                $copyObj->setCartUserStep($relObj->copy($deepCopy));
            }

            $relObj = $this->getSaoCartUser();
            if ($relObj) {
                $copyObj->setSaoCartUser($relObj->copy($deepCopy));
            }

            foreach ($this->getSaoMailSequenceCartUserCodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSaoMailSequenceCartUserCode($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getSaoMailSequenceCartUserBlacklist();
            if ($relObj) {
                $copyObj->setSaoMailSequenceCartUserBlacklist($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCartUser(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser Clone of current object.
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Cart_Persistence_PacCartUserPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Cart_Persistence_PacCart object.
     *
     * @param             ProjectA_Zed_Cart_Persistence_PacCart $v
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCart(ProjectA_Zed_Cart_Persistence_PacCart $v = null)
    {
        if ($v === null) {
            $this->setFkCart(NULL);
        } else {
            $this->setFkCart($v->getIdCart());
        }

        $this->aCart = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Cart_Persistence_PacCart object, it will not be re-added.
        if ($v !== null) {
            $v->addCartUser($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Cart_Persistence_PacCart object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Cart_Persistence_PacCart The associated ProjectA_Zed_Cart_Persistence_PacCart object.
     * @throws PropelException
     */
    public function getCart(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCart === null && ($this->fk_cart !== null) && $doQuery) {
            $this->aCart = ProjectA_Zed_Cart_Persistence_PacCartQuery::create()->findPk($this->fk_cart, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCart->addCartUsers($this);
             */
        }

        return $this->aCart;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Customer_Persistence_PacCustomer object.
     *
     * @param             ProjectA_Zed_Customer_Persistence_PacCustomer $v
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCustomer(ProjectA_Zed_Customer_Persistence_PacCustomer $v = null)
    {
        if ($v === null) {
            $this->setFkCustomer(NULL);
        } else {
            $this->setFkCustomer($v->getIdCustomer());
        }

        $this->aCustomer = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer_Persistence_PacCustomer object, it will not be re-added.
        if ($v !== null) {
            $v->addCartUser($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer_Persistence_PacCustomer object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The associated ProjectA_Zed_Customer_Persistence_PacCustomer object.
     * @throws PropelException
     */
    public function getCustomer(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCustomer === null && ($this->fk_customer !== null) && $doQuery) {
            $this->aCustomer = ProjectA_Zed_Customer_Persistence_PacCustomerQuery::create()->findPk($this->fk_customer, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCustomer->addCartUsers($this);
             */
        }

        return $this->aCustomer;
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
        if ('SaoMailSequenceCartUserCode' == $relationName) {
            $this->initSaoMailSequenceCartUserCodes();
        }
    }

    /**
     * Gets a single ProjectA_Zed_Cart_Persistence_PacCartUserStep object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStep
     * @throws PropelException
     */
    public function getCartUserStep(PropelPDO $con = null)
    {

        if ($this->singleCartUserStep === null && !$this->isNew()) {
            $this->singleCartUserStep = ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleCartUserStep;
    }

    /**
     * Sets a single ProjectA_Zed_Cart_Persistence_PacCartUserStep object as related to this object by a one-to-one relationship.
     *
     * @param             ProjectA_Zed_Cart_Persistence_PacCartUserStep $v ProjectA_Zed_Cart_Persistence_PacCartUserStep
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCartUserStep(ProjectA_Zed_Cart_Persistence_PacCartUserStep $v = null)
    {
        $this->singleCartUserStep = $v;

        // Make sure that that the passed-in ProjectA_Zed_Cart_Persistence_PacCartUserStep isn't already associated with this object
        if ($v !== null && $v->getCartUser(null, false) === null) {
            $v->setCartUser($this);
        }

        return $this;
    }

    /**
     * Gets a single Sao_Zed_Cart_Persistence_SaoCartUser object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Sao_Zed_Cart_Persistence_SaoCartUser
     * @throws PropelException
     */
    public function getSaoCartUser(PropelPDO $con = null)
    {

        if ($this->singleSaoCartUser === null && !$this->isNew()) {
            $this->singleSaoCartUser = Sao_Zed_Cart_Persistence_SaoCartUserQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSaoCartUser;
    }

    /**
     * Sets a single Sao_Zed_Cart_Persistence_SaoCartUser object as related to this object by a one-to-one relationship.
     *
     * @param             Sao_Zed_Cart_Persistence_SaoCartUser $v Sao_Zed_Cart_Persistence_SaoCartUser
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSaoCartUser(Sao_Zed_Cart_Persistence_SaoCartUser $v = null)
    {
        $this->singleSaoCartUser = $v;

        // Make sure that that the passed-in Sao_Zed_Cart_Persistence_SaoCartUser isn't already associated with this object
        if ($v !== null && $v->getCartUser(null, false) === null) {
            $v->setCartUser($this);
        }

        return $this;
    }

    /**
     * Clears out the collSaoMailSequenceCartUserCodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     * @see        addSaoMailSequenceCartUserCodes()
     */
    public function clearSaoMailSequenceCartUserCodes()
    {
        $this->collSaoMailSequenceCartUserCodes = null; // important to set this to null since that means it is uninitialized
        $this->collSaoMailSequenceCartUserCodesPartial = null;

        return $this;
    }

    /**
     * reset is the collSaoMailSequenceCartUserCodes collection loaded partially
     *
     * @return void
     */
    public function resetPartialSaoMailSequenceCartUserCodes($v = true)
    {
        $this->collSaoMailSequenceCartUserCodesPartial = $v;
    }

    /**
     * Initializes the collSaoMailSequenceCartUserCodes collection.
     *
     * By default this just sets the collSaoMailSequenceCartUserCodes collection to an empty array (like clearcollSaoMailSequenceCartUserCodes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSaoMailSequenceCartUserCodes($overrideExisting = true)
    {
        if (null !== $this->collSaoMailSequenceCartUserCodes && !$overrideExisting) {
            return;
        }
        $this->collSaoMailSequenceCartUserCodes = new PropelObjectCollection();
        $this->collSaoMailSequenceCartUserCodes->setModel('Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode');
    }

    /**
     * Gets an array of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cart_Persistence_PacCartUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     * @throws PropelException
     */
    public function getSaoMailSequenceCartUserCodes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSaoMailSequenceCartUserCodesPartial && !$this->isNew();
        if (null === $this->collSaoMailSequenceCartUserCodes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSaoMailSequenceCartUserCodes) {
                // return empty collection
                $this->initSaoMailSequenceCartUserCodes();
            } else {
                $collSaoMailSequenceCartUserCodes = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria)
                    ->filterByCartUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSaoMailSequenceCartUserCodesPartial && count($collSaoMailSequenceCartUserCodes)) {
                      $this->initSaoMailSequenceCartUserCodes(false);

                      foreach($collSaoMailSequenceCartUserCodes as $obj) {
                        if (false == $this->collSaoMailSequenceCartUserCodes->contains($obj)) {
                          $this->collSaoMailSequenceCartUserCodes->append($obj);
                        }
                      }

                      $this->collSaoMailSequenceCartUserCodesPartial = true;
                    }

                    $collSaoMailSequenceCartUserCodes->getInternalIterator()->rewind();
                    return $collSaoMailSequenceCartUserCodes;
                }

                if($partial && $this->collSaoMailSequenceCartUserCodes) {
                    foreach($this->collSaoMailSequenceCartUserCodes as $obj) {
                        if($obj->isNew()) {
                            $collSaoMailSequenceCartUserCodes[] = $obj;
                        }
                    }
                }

                $this->collSaoMailSequenceCartUserCodes = $collSaoMailSequenceCartUserCodes;
                $this->collSaoMailSequenceCartUserCodesPartial = false;
            }
        }

        return $this->collSaoMailSequenceCartUserCodes;
    }

    /**
     * Sets a collection of SaoMailSequenceCartUserCode objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $saoMailSequenceCartUserCodes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function setSaoMailSequenceCartUserCodes(PropelCollection $saoMailSequenceCartUserCodes, PropelPDO $con = null)
    {
        $saoMailSequenceCartUserCodesToDelete = $this->getSaoMailSequenceCartUserCodes(new Criteria(), $con)->diff($saoMailSequenceCartUserCodes);

        $this->saoMailSequenceCartUserCodesScheduledForDeletion = unserialize(serialize($saoMailSequenceCartUserCodesToDelete));

        foreach ($saoMailSequenceCartUserCodesToDelete as $saoMailSequenceCartUserCodeRemoved) {
            $saoMailSequenceCartUserCodeRemoved->setCartUser(null);
        }

        $this->collSaoMailSequenceCartUserCodes = null;
        foreach ($saoMailSequenceCartUserCodes as $saoMailSequenceCartUserCode) {
            $this->addSaoMailSequenceCartUserCode($saoMailSequenceCartUserCode);
        }

        $this->collSaoMailSequenceCartUserCodes = $saoMailSequenceCartUserCodes;
        $this->collSaoMailSequenceCartUserCodesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects.
     * @throws PropelException
     */
    public function countSaoMailSequenceCartUserCodes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSaoMailSequenceCartUserCodesPartial && !$this->isNew();
        if (null === $this->collSaoMailSequenceCartUserCodes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSaoMailSequenceCartUserCodes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSaoMailSequenceCartUserCodes());
            }
            $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCartUser($this)
                ->count($con);
        }

        return count($this->collSaoMailSequenceCartUserCodes);
    }

    /**
     * Method called to associate a Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode object to this object
     * through the Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode foreign key attribute.
     *
     * @param    Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode $l Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function addSaoMailSequenceCartUserCode(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode $l)
    {
        if ($this->collSaoMailSequenceCartUserCodes === null) {
            $this->initSaoMailSequenceCartUserCodes();
            $this->collSaoMailSequenceCartUserCodesPartial = true;
        }
        if (!in_array($l, $this->collSaoMailSequenceCartUserCodes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSaoMailSequenceCartUserCode($l);
        }

        return $this;
    }

    /**
     * @param	SaoMailSequenceCartUserCode $saoMailSequenceCartUserCode The saoMailSequenceCartUserCode object to add.
     */
    protected function doAddSaoMailSequenceCartUserCode($saoMailSequenceCartUserCode)
    {
        $this->collSaoMailSequenceCartUserCodes[]= $saoMailSequenceCartUserCode;
        $saoMailSequenceCartUserCode->setCartUser($this);
    }

    /**
     * @param	SaoMailSequenceCartUserCode $saoMailSequenceCartUserCode The saoMailSequenceCartUserCode object to remove.
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function removeSaoMailSequenceCartUserCode($saoMailSequenceCartUserCode)
    {
        if ($this->getSaoMailSequenceCartUserCodes()->contains($saoMailSequenceCartUserCode)) {
            $this->collSaoMailSequenceCartUserCodes->remove($this->collSaoMailSequenceCartUserCodes->search($saoMailSequenceCartUserCode));
            if (null === $this->saoMailSequenceCartUserCodesScheduledForDeletion) {
                $this->saoMailSequenceCartUserCodesScheduledForDeletion = clone $this->collSaoMailSequenceCartUserCodes;
                $this->saoMailSequenceCartUserCodesScheduledForDeletion->clear();
            }
            $this->saoMailSequenceCartUserCodesScheduledForDeletion[]= clone $saoMailSequenceCartUserCode;
            $saoMailSequenceCartUserCode->setCartUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCartUser is new, it will return
     * an empty collection; or if this PacCartUser has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCartUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     */
    public function getSaoMailSequenceCartUserCodesJoinMailSequence($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
        $query->joinWith('MailSequence', $join_behavior);

        return $this->getSaoMailSequenceCartUserCodes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCartUser is new, it will return
     * an empty collection; or if this PacCartUser has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCartUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     */
    public function getSaoMailSequenceCartUserCodesJoinSalesruleCode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
        $query->joinWith('SalesruleCode', $join_behavior);

        return $this->getSaoMailSequenceCartUserCodes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCartUser is new, it will return
     * an empty collection; or if this PacCartUser has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCartUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     */
    public function getSaoMailSequenceCartUserCodesJoinSalesruleCodepool($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
        $query->joinWith('SalesruleCodepool', $join_behavior);

        return $this->getSaoMailSequenceCartUserCodes($query, $con);
    }

    /**
     * Gets a single Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist
     * @throws PropelException
     */
    public function getSaoMailSequenceCartUserBlacklist(PropelPDO $con = null)
    {

        if ($this->singleSaoMailSequenceCartUserBlacklist === null && !$this->isNew()) {
            $this->singleSaoMailSequenceCartUserBlacklist = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSaoMailSequenceCartUserBlacklist;
    }

    /**
     * Sets a single Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist object as related to this object by a one-to-one relationship.
     *
     * @param             Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist $v Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSaoMailSequenceCartUserBlacklist(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist $v = null)
    {
        $this->singleSaoMailSequenceCartUserBlacklist = $v;

        // Make sure that that the passed-in Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist isn't already associated with this object
        if ($v !== null && $v->getCartUser(null, false) === null) {
            $v->setCartUser($this);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_cart_user = null;
        $this->fk_cart = null;
        $this->fk_customer = null;
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
            if ($this->singleCartUserStep) {
                $this->singleCartUserStep->clearAllReferences($deep);
            }
            if ($this->singleSaoCartUser) {
                $this->singleSaoCartUser->clearAllReferences($deep);
            }
            if ($this->collSaoMailSequenceCartUserCodes) {
                foreach ($this->collSaoMailSequenceCartUserCodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleSaoMailSequenceCartUserBlacklist) {
                $this->singleSaoMailSequenceCartUserBlacklist->clearAllReferences($deep);
            }
            if ($this->aCart instanceof Persistent) {
              $this->aCart->clearAllReferences($deep);
            }
            if ($this->aCustomer instanceof Persistent) {
              $this->aCustomer->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->singleCartUserStep instanceof PropelCollection) {
            $this->singleCartUserStep->clearIterator();
        }
        $this->singleCartUserStep = null;
        if ($this->singleSaoCartUser instanceof PropelCollection) {
            $this->singleSaoCartUser->clearIterator();
        }
        $this->singleSaoCartUser = null;
        if ($this->collSaoMailSequenceCartUserCodes instanceof PropelCollection) {
            $this->collSaoMailSequenceCartUserCodes->clearIterator();
        }
        $this->collSaoMailSequenceCartUserCodes = null;
        if ($this->singleSaoMailSequenceCartUserBlacklist instanceof PropelCollection) {
            $this->singleSaoMailSequenceCartUserBlacklist->clearIterator();
        }
        $this->singleSaoMailSequenceCartUserBlacklist = null;
        $this->aCart = null;
        $this->aCustomer = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Cart_Persistence_PacCartUserPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Cart_Persistence_PacCartUser The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Cart_Persistence_PacCartUserPeer::UPDATED_AT;

        return $this;
    }

}
