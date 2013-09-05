<?php


/**
 * Base class that represents a row from the 'sao_mail_sequence_cart_user_code' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceCartUserCode extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mail_sequence_cart_user_code field.
     * @var        int
     */
    protected $id_mail_sequence_cart_user_code;

    /**
     * The value for the fk_cart_user field.
     * @var        int
     */
    protected $fk_cart_user;

    /**
     * The value for the fk_mail_sequence field.
     * @var        int
     */
    protected $fk_mail_sequence;

    /**
     * The value for the fk_salesrule_code field.
     * @var        int
     */
    protected $fk_salesrule_code;

    /**
     * The value for the fk_salesrule_codepool field.
     * @var        int
     */
    protected $fk_salesrule_codepool;

    /**
     * @var        PacCartUser
     */
    protected $aCartUser;

    /**
     * @var        SaoMailSequence
     */
    protected $aMailSequence;

    /**
     * @var        PacSalesruleCode
     */
    protected $aSalesruleCode;

    /**
     * @var        PacSalesruleCodepool
     */
    protected $aSalesruleCodepool;

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
     * Get the [id_mail_sequence_cart_user_code] column value.
     *
     * @return int
     */
    public function getIdMailSequenceCartUserCode()
    {
        return $this->id_mail_sequence_cart_user_code;
    }

    /**
     * Get the [fk_cart_user] column value.
     *
     * @return int
     */
    public function getFkCartUser()
    {
        return $this->fk_cart_user;
    }

    /**
     * Get the [fk_mail_sequence] column value.
     *
     * @return int
     */
    public function getFkMailSequence()
    {
        return $this->fk_mail_sequence;
    }

    /**
     * Get the [fk_salesrule_code] column value.
     *
     * @return int
     */
    public function getFkSalesruleCode()
    {
        return $this->fk_salesrule_code;
    }

    /**
     * Get the [fk_salesrule_codepool] column value.
     *
     * @return int
     */
    public function getFkSalesruleCodepool()
    {
        return $this->fk_salesrule_codepool;
    }

    /**
     * Set the value of [id_mail_sequence_cart_user_code] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     */
    public function setIdMailSequenceCartUserCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mail_sequence_cart_user_code !== $v) {
            $this->id_mail_sequence_cart_user_code = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE;
        }


        return $this;
    } // setIdMailSequenceCartUserCode()

    /**
     * Set the value of [fk_cart_user] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     */
    public function setFkCartUser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_cart_user !== $v) {
            $this->fk_cart_user = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER;
        }

        if ($this->aCartUser !== null && $this->aCartUser->getIdCartUser() !== $v) {
            $this->aCartUser = null;
        }


        return $this;
    } // setFkCartUser()

    /**
     * Set the value of [fk_mail_sequence] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     */
    public function setFkMailSequence($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_mail_sequence !== $v) {
            $this->fk_mail_sequence = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE;
        }

        if ($this->aMailSequence !== null && $this->aMailSequence->getIdMailSequence() !== $v) {
            $this->aMailSequence = null;
        }


        return $this;
    } // setFkMailSequence()

    /**
     * Set the value of [fk_salesrule_code] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     */
    public function setFkSalesruleCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_salesrule_code !== $v) {
            $this->fk_salesrule_code = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE;
        }

        if ($this->aSalesruleCode !== null && $this->aSalesruleCode->getIdSalesruleCode() !== $v) {
            $this->aSalesruleCode = null;
        }


        return $this;
    } // setFkSalesruleCode()

    /**
     * Set the value of [fk_salesrule_codepool] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     */
    public function setFkSalesruleCodepool($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_salesrule_codepool !== $v) {
            $this->fk_salesrule_codepool = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL;
        }

        if ($this->aSalesruleCodepool !== null && $this->aSalesruleCodepool->getIdSalesruleCodepool() !== $v) {
            $this->aSalesruleCodepool = null;
        }


        return $this;
    } // setFkSalesruleCodepool()

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

            $this->id_mail_sequence_cart_user_code = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_cart_user = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_mail_sequence = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_salesrule_code = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->fk_salesrule_codepool = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode object", $e);
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

        if ($this->aCartUser !== null && $this->fk_cart_user !== $this->aCartUser->getIdCartUser()) {
            $this->aCartUser = null;
        }
        if ($this->aMailSequence !== null && $this->fk_mail_sequence !== $this->aMailSequence->getIdMailSequence()) {
            $this->aMailSequence = null;
        }
        if ($this->aSalesruleCode !== null && $this->fk_salesrule_code !== $this->aSalesruleCode->getIdSalesruleCode()) {
            $this->aSalesruleCode = null;
        }
        if ($this->aSalesruleCodepool !== null && $this->fk_salesrule_codepool !== $this->aSalesruleCodepool->getIdSalesruleCodepool()) {
            $this->aSalesruleCodepool = null;
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCartUser = null;
            $this->aMailSequence = null;
            $this->aSalesruleCode = null;
            $this->aSalesruleCodepool = null;
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create()
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::addInstanceToPool($this);
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

            if ($this->aCartUser !== null) {
                if ($this->aCartUser->isModified() || $this->aCartUser->isNew()) {
                    $affectedRows += $this->aCartUser->save($con);
                }
                $this->setCartUser($this->aCartUser);
            }

            if ($this->aMailSequence !== null) {
                if ($this->aMailSequence->isModified() || $this->aMailSequence->isNew()) {
                    $affectedRows += $this->aMailSequence->save($con);
                }
                $this->setMailSequence($this->aMailSequence);
            }

            if ($this->aSalesruleCode !== null) {
                if ($this->aSalesruleCode->isModified() || $this->aSalesruleCode->isNew()) {
                    $affectedRows += $this->aSalesruleCode->save($con);
                }
                $this->setSalesruleCode($this->aSalesruleCode);
            }

            if ($this->aSalesruleCodepool !== null) {
                if ($this->aSalesruleCodepool->isModified() || $this->aSalesruleCodepool->isNew()) {
                    $affectedRows += $this->aSalesruleCodepool->save($con);
                }
                $this->setSalesruleCodepool($this->aSalesruleCodepool);
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

        $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE;
        if (null !== $this->id_mail_sequence_cart_user_code) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`id_mail_sequence_cart_user_code`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_cart_user`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_mail_sequence`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_salesrule_code`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL)) {
            $modifiedColumns[':p' . $index++]  = '`fk_salesrule_codepool`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_mail_sequence_cart_user_code` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mail_sequence_cart_user_code`':
                        $stmt->bindValue($identifier, $this->id_mail_sequence_cart_user_code, PDO::PARAM_INT);
                        break;
                    case '`fk_cart_user`':
                        $stmt->bindValue($identifier, $this->fk_cart_user, PDO::PARAM_INT);
                        break;
                    case '`fk_mail_sequence`':
                        $stmt->bindValue($identifier, $this->fk_mail_sequence, PDO::PARAM_INT);
                        break;
                    case '`fk_salesrule_code`':
                        $stmt->bindValue($identifier, $this->fk_salesrule_code, PDO::PARAM_INT);
                        break;
                    case '`fk_salesrule_codepool`':
                        $stmt->bindValue($identifier, $this->fk_salesrule_codepool, PDO::PARAM_INT);
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
        $this->setIdMailSequenceCartUserCode($pk);

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

            if ($this->aCartUser !== null) {
                if (!$this->aCartUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCartUser->getValidationFailures());
                }
            }

            if ($this->aMailSequence !== null) {
                if (!$this->aMailSequence->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMailSequence->getValidationFailures());
                }
            }

            if ($this->aSalesruleCode !== null) {
                if (!$this->aSalesruleCode->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSalesruleCode->getValidationFailures());
                }
            }

            if ($this->aSalesruleCodepool !== null) {
                if (!$this->aSalesruleCodepool->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSalesruleCodepool->getValidationFailures());
                }
            }


            if (($retval = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::doValidate($this, $columns)) !== true) {
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMailSequenceCartUserCode();
                break;
            case 1:
                return $this->getFkCartUser();
                break;
            case 2:
                return $this->getFkMailSequence();
                break;
            case 3:
                return $this->getFkSalesruleCode();
                break;
            case 4:
                return $this->getFkSalesruleCodepool();
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
        if (isset($alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode'][$this->getPrimaryKey()] = true;
        $keys = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMailSequenceCartUserCode(),
            $keys[1] => $this->getFkCartUser(),
            $keys[2] => $this->getFkMailSequence(),
            $keys[3] => $this->getFkSalesruleCode(),
            $keys[4] => $this->getFkSalesruleCodepool(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCartUser) {
                $result['CartUser'] = $this->aCartUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMailSequence) {
                $result['MailSequence'] = $this->aMailSequence->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSalesruleCode) {
                $result['SalesruleCode'] = $this->aSalesruleCode->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSalesruleCodepool) {
                $result['SalesruleCodepool'] = $this->aSalesruleCodepool->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMailSequenceCartUserCode($value);
                break;
            case 1:
                $this->setFkCartUser($value);
                break;
            case 2:
                $this->setFkMailSequence($value);
                break;
            case 3:
                $this->setFkSalesruleCode($value);
                break;
            case 4:
                $this->setFkSalesruleCodepool($value);
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
        $keys = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMailSequenceCartUserCode($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCartUser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkMailSequence($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkSalesruleCode($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFkSalesruleCodepool($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $this->id_mail_sequence_cart_user_code);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER, $this->fk_cart_user);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE, $this->fk_mail_sequence);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE, $this->fk_salesrule_code);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL, $this->fk_salesrule_codepool);

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
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $this->id_mail_sequence_cart_user_code);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMailSequenceCartUserCode();
    }

    /**
     * Generic method to set the primary key (id_mail_sequence_cart_user_code column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMailSequenceCartUserCode($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMailSequenceCartUserCode();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCartUser($this->getFkCartUser());
        $copyObj->setFkMailSequence($this->getFkMailSequence());
        $copyObj->setFkSalesruleCode($this->getFkSalesruleCode());
        $copyObj->setFkSalesruleCodepool($this->getFkSalesruleCodepool());

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
            $copyObj->setIdMailSequenceCartUserCode(NULL); // this is a auto-increment column, so set to default value
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode Clone of current object.
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Cart_Persistence_PacCartUser object.
     *
     * @param             ProjectA_Zed_Cart_Persistence_PacCartUser $v
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCartUser(ProjectA_Zed_Cart_Persistence_PacCartUser $v = null)
    {
        if ($v === null) {
            $this->setFkCartUser(NULL);
        } else {
            $this->setFkCartUser($v->getIdCartUser());
        }

        $this->aCartUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Cart_Persistence_PacCartUser object, it will not be re-added.
        if ($v !== null) {
            $v->addSaoMailSequenceCartUserCode($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Cart_Persistence_PacCartUser object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser The associated ProjectA_Zed_Cart_Persistence_PacCartUser object.
     * @throws PropelException
     */
    public function getCartUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCartUser === null && ($this->fk_cart_user !== null) && $doQuery) {
            $this->aCartUser = ProjectA_Zed_Cart_Persistence_PacCartUserQuery::create()->findPk($this->fk_cart_user, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCartUser->addSaoMailSequenceCartUserCodes($this);
             */
        }

        return $this->aCartUser;
    }

    /**
     * Declares an association between this object and a Sao_Zed_Mail_Persistence_SaoMailSequence object.
     *
     * @param             Sao_Zed_Mail_Persistence_SaoMailSequence $v
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMailSequence(Sao_Zed_Mail_Persistence_SaoMailSequence $v = null)
    {
        if ($v === null) {
            $this->setFkMailSequence(NULL);
        } else {
            $this->setFkMailSequence($v->getIdMailSequence());
        }

        $this->aMailSequence = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sao_Zed_Mail_Persistence_SaoMailSequence object, it will not be re-added.
        if ($v !== null) {
            $v->addSaoMailSequenceCartUserCode($this);
        }


        return $this;
    }


    /**
     * Get the associated Sao_Zed_Mail_Persistence_SaoMailSequence object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The associated Sao_Zed_Mail_Persistence_SaoMailSequence object.
     * @throws PropelException
     */
    public function getMailSequence(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMailSequence === null && ($this->fk_mail_sequence !== null) && $doQuery) {
            $this->aMailSequence = Sao_Zed_Mail_Persistence_SaoMailSequenceQuery::create()->findPk($this->fk_mail_sequence, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMailSequence->addSaoMailSequenceCartUserCodes($this);
             */
        }

        return $this->aMailSequence;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object.
     *
     * @param             ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode $v
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSalesruleCode(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode $v = null)
    {
        if ($v === null) {
            $this->setFkSalesruleCode(NULL);
        } else {
            $this->setFkSalesruleCode($v->getIdSalesruleCode());
        }

        $this->aSalesruleCode = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object, it will not be re-added.
        if ($v !== null) {
            $v->addSaoMailSequenceCartUserCode($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode The associated ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object.
     * @throws PropelException
     */
    public function getSalesruleCode(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSalesruleCode === null && ($this->fk_salesrule_code !== null) && $doQuery) {
            $this->aSalesruleCode = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery::create()->findPk($this->fk_salesrule_code, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSalesruleCode->addSaoMailSequenceCartUserCodes($this);
             */
        }

        return $this->aSalesruleCode;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object.
     *
     * @param             ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool $v
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSalesruleCodepool(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool $v = null)
    {
        if ($v === null) {
            $this->setFkSalesruleCodepool(NULL);
        } else {
            $this->setFkSalesruleCodepool($v->getIdSalesruleCodepool());
        }

        $this->aSalesruleCodepool = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object, it will not be re-added.
        if ($v !== null) {
            $v->addSaoMailSequenceCartUserCode($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The associated ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object.
     * @throws PropelException
     */
    public function getSalesruleCodepool(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSalesruleCodepool === null && ($this->fk_salesrule_codepool !== null) && $doQuery) {
            $this->aSalesruleCodepool = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery::create()->findPk($this->fk_salesrule_codepool, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSalesruleCodepool->addSaoMailSequenceCartUserCodes($this);
             */
        }

        return $this->aSalesruleCodepool;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mail_sequence_cart_user_code = null;
        $this->fk_cart_user = null;
        $this->fk_mail_sequence = null;
        $this->fk_salesrule_code = null;
        $this->fk_salesrule_codepool = null;
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
            if ($this->aCartUser instanceof Persistent) {
              $this->aCartUser->clearAllReferences($deep);
            }
            if ($this->aMailSequence instanceof Persistent) {
              $this->aMailSequence->clearAllReferences($deep);
            }
            if ($this->aSalesruleCode instanceof Persistent) {
              $this->aSalesruleCode->clearAllReferences($deep);
            }
            if ($this->aSalesruleCodepool instanceof Persistent) {
              $this->aSalesruleCodepool->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aCartUser = null;
        $this->aMailSequence = null;
        $this->aSalesruleCode = null;
        $this->aSalesruleCodepool = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::DEFAULT_STRING_FORMAT);
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
