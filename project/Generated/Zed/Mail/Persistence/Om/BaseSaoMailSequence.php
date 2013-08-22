<?php


/**
 * Base class that represents a row from the 'sao_mail_sequence' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequence extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Mail_Persistence_SaoMailSequencePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Mail_Persistence_SaoMailSequencePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mail_sequence field.
     * @var        int
     */
    protected $id_mail_sequence;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceElement[] Collection to store aggregation of Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects.
     */
    protected $collMailSequenceElements;
    protected $collMailSequenceElementsPartial;

    /**
     * @var        Sao_Zed_Mail_Persistence_SaoMailSequenceStep one-to-one related Sao_Zed_Mail_Persistence_SaoMailSequenceStep object
     */
    protected $singleMailSequenceStep;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] Collection to store aggregation of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects.
     */
    protected $collSaoMailSequenceCartUserCodes;
    protected $collSaoMailSequenceCartUserCodesPartial;

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
    protected $mailSequenceElementsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mailSequenceStepsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoMailSequenceCartUserCodesScheduledForDeletion = null;

    /**
     * Get the [id_mail_sequence] column value.
     *
     * @return int
     */
    public function getIdMailSequence()
    {
        return $this->id_mail_sequence;
    }

    /**
     * Get the [name] column value.
     * internal display name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of [id_mail_sequence] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     */
    public function setIdMailSequence($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mail_sequence !== $v) {
            $this->id_mail_sequence = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE;
        }


        return $this;
    } // setIdMailSequence()

    /**
     * Set the value of [name] column.
     * internal display name
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::NAME;
        }


        return $this;
    } // setName()

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

            $this->id_mail_sequence = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 2; // 2 = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Mail_Persistence_SaoMailSequence object", $e);
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collMailSequenceElements = null;

            $this->singleMailSequenceStep = null;

            $this->collSaoMailSequenceCartUserCodes = null;

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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Mail_Persistence_SaoMailSequenceQuery::create()
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                Sao_Zed_Mail_Persistence_SaoMailSequencePeer::addInstanceToPool($this);
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

            if ($this->mailSequenceElementsScheduledForDeletion !== null) {
                if (!$this->mailSequenceElementsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery::create()
                        ->filterByPrimaryKeys($this->mailSequenceElementsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mailSequenceElementsScheduledForDeletion = null;
                }
            }

            if ($this->collMailSequenceElements !== null) {
                foreach ($this->collMailSequenceElements as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mailSequenceStepsScheduledForDeletion !== null) {
                if (!$this->mailSequenceStepsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery::create()
                        ->filterByPrimaryKeys($this->mailSequenceStepsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mailSequenceStepsScheduledForDeletion = null;
                }
            }

            if ($this->singleMailSequenceStep !== null) {
                if (!$this->singleMailSequenceStep->isDeleted() && ($this->singleMailSequenceStep->isNew() || $this->singleMailSequenceStep->isModified())) {
                        $affectedRows += $this->singleMailSequenceStep->save($con);
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

        $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE;
        if (null !== $this->id_mail_sequence) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE)) {
            $modifiedColumns[':p' . $index++]  = '`id_mail_sequence`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_mail_sequence` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mail_sequence`':
                        $stmt->bindValue($identifier, $this->id_mail_sequence, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
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
        $this->setIdMailSequence($pk);

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


            if (($retval = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMailSequenceElements !== null) {
                    foreach ($this->collMailSequenceElements as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleMailSequenceStep !== null) {
                    if (!$this->singleMailSequenceStep->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleMailSequenceStep->getValidationFailures());
                    }
                }

                if ($this->collSaoMailSequenceCartUserCodes !== null) {
                    foreach ($this->collSaoMailSequenceCartUserCodes as $referrerFK) {
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMailSequence();
                break;
            case 1:
                return $this->getName();
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
        if (isset($alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailSequence'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailSequence'][$this->getPrimaryKey()] = true;
        $keys = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMailSequence(),
            $keys[1] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collMailSequenceElements) {
                $result['MailSequenceElements'] = $this->collMailSequenceElements->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleMailSequenceStep) {
                $result['MailSequenceStep'] = $this->singleMailSequenceStep->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSaoMailSequenceCartUserCodes) {
                $result['SaoMailSequenceCartUserCodes'] = $this->collSaoMailSequenceCartUserCodes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMailSequence($value);
                break;
            case 1:
                $this->setName($value);
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
        $keys = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMailSequence($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $this->id_mail_sequence);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::NAME)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::NAME, $this->name);

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
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $this->id_mail_sequence);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMailSequence();
    }

    /**
     * Generic method to set the primary key (id_mail_sequence column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMailSequence($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMailSequence();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sao_Zed_Mail_Persistence_SaoMailSequence (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMailSequenceElements() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMailSequenceElement($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getMailSequenceStep();
            if ($relObj) {
                $copyObj->setMailSequenceStep($relObj->copy($deepCopy));
            }

            foreach ($this->getSaoMailSequenceCartUserCodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSaoMailSequenceCartUserCode($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMailSequence(NULL); // this is a auto-increment column, so set to default value
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence Clone of current object.
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequencePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Mail_Persistence_SaoMailSequencePeer();
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
        if ('MailSequenceElement' == $relationName) {
            $this->initMailSequenceElements();
        }
        if ('SaoMailSequenceCartUserCode' == $relationName) {
            $this->initSaoMailSequenceCartUserCodes();
        }
    }

    /**
     * Clears out the collMailSequenceElements collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     * @see        addMailSequenceElements()
     */
    public function clearMailSequenceElements()
    {
        $this->collMailSequenceElements = null; // important to set this to null since that means it is uninitialized
        $this->collMailSequenceElementsPartial = null;

        return $this;
    }

    /**
     * reset is the collMailSequenceElements collection loaded partially
     *
     * @return void
     */
    public function resetPartialMailSequenceElements($v = true)
    {
        $this->collMailSequenceElementsPartial = $v;
    }

    /**
     * Initializes the collMailSequenceElements collection.
     *
     * By default this just sets the collMailSequenceElements collection to an empty array (like clearcollMailSequenceElements());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMailSequenceElements($overrideExisting = true)
    {
        if (null !== $this->collMailSequenceElements && !$overrideExisting) {
            return;
        }
        $this->collMailSequenceElements = new PropelObjectCollection();
        $this->collMailSequenceElements->setModel('Sao_Zed_Mail_Persistence_SaoMailSequenceElement');
    }

    /**
     * Gets an array of Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sao_Zed_Mail_Persistence_SaoMailSequence is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceElement[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects
     * @throws PropelException
     */
    public function getMailSequenceElements($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMailSequenceElementsPartial && !$this->isNew();
        if (null === $this->collMailSequenceElements || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMailSequenceElements) {
                // return empty collection
                $this->initMailSequenceElements();
            } else {
                $collMailSequenceElements = Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery::create(null, $criteria)
                    ->filterByMailSequence($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMailSequenceElementsPartial && count($collMailSequenceElements)) {
                      $this->initMailSequenceElements(false);

                      foreach($collMailSequenceElements as $obj) {
                        if (false == $this->collMailSequenceElements->contains($obj)) {
                          $this->collMailSequenceElements->append($obj);
                        }
                      }

                      $this->collMailSequenceElementsPartial = true;
                    }

                    $collMailSequenceElements->getInternalIterator()->rewind();
                    return $collMailSequenceElements;
                }

                if($partial && $this->collMailSequenceElements) {
                    foreach($this->collMailSequenceElements as $obj) {
                        if($obj->isNew()) {
                            $collMailSequenceElements[] = $obj;
                        }
                    }
                }

                $this->collMailSequenceElements = $collMailSequenceElements;
                $this->collMailSequenceElementsPartial = false;
            }
        }

        return $this->collMailSequenceElements;
    }

    /**
     * Sets a collection of MailSequenceElement objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mailSequenceElements A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     */
    public function setMailSequenceElements(PropelCollection $mailSequenceElements, PropelPDO $con = null)
    {
        $mailSequenceElementsToDelete = $this->getMailSequenceElements(new Criteria(), $con)->diff($mailSequenceElements);

        $this->mailSequenceElementsScheduledForDeletion = unserialize(serialize($mailSequenceElementsToDelete));

        foreach ($mailSequenceElementsToDelete as $mailSequenceElementRemoved) {
            $mailSequenceElementRemoved->setMailSequence(null);
        }

        $this->collMailSequenceElements = null;
        foreach ($mailSequenceElements as $mailSequenceElement) {
            $this->addMailSequenceElement($mailSequenceElement);
        }

        $this->collMailSequenceElements = $mailSequenceElements;
        $this->collMailSequenceElementsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects.
     * @throws PropelException
     */
    public function countMailSequenceElements(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMailSequenceElementsPartial && !$this->isNew();
        if (null === $this->collMailSequenceElements || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMailSequenceElements) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMailSequenceElements());
            }
            $query = Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMailSequence($this)
                ->count($con);
        }

        return count($this->collMailSequenceElements);
    }

    /**
     * Method called to associate a Sao_Zed_Mail_Persistence_SaoMailSequenceElement object to this object
     * through the Sao_Zed_Mail_Persistence_SaoMailSequenceElement foreign key attribute.
     *
     * @param    Sao_Zed_Mail_Persistence_SaoMailSequenceElement $l Sao_Zed_Mail_Persistence_SaoMailSequenceElement
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     */
    public function addMailSequenceElement(Sao_Zed_Mail_Persistence_SaoMailSequenceElement $l)
    {
        if ($this->collMailSequenceElements === null) {
            $this->initMailSequenceElements();
            $this->collMailSequenceElementsPartial = true;
        }
        if (!in_array($l, $this->collMailSequenceElements->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMailSequenceElement($l);
        }

        return $this;
    }

    /**
     * @param	MailSequenceElement $mailSequenceElement The mailSequenceElement object to add.
     */
    protected function doAddMailSequenceElement($mailSequenceElement)
    {
        $this->collMailSequenceElements[]= $mailSequenceElement;
        $mailSequenceElement->setMailSequence($this);
    }

    /**
     * @param	MailSequenceElement $mailSequenceElement The mailSequenceElement object to remove.
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     */
    public function removeMailSequenceElement($mailSequenceElement)
    {
        if ($this->getMailSequenceElements()->contains($mailSequenceElement)) {
            $this->collMailSequenceElements->remove($this->collMailSequenceElements->search($mailSequenceElement));
            if (null === $this->mailSequenceElementsScheduledForDeletion) {
                $this->mailSequenceElementsScheduledForDeletion = clone $this->collMailSequenceElements;
                $this->mailSequenceElementsScheduledForDeletion->clear();
            }
            $this->mailSequenceElementsScheduledForDeletion[]= clone $mailSequenceElement;
            $mailSequenceElement->setMailSequence(null);
        }

        return $this;
    }

    /**
     * Gets a single Sao_Zed_Mail_Persistence_SaoMailSequenceStep object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStep
     * @throws PropelException
     */
    public function getMailSequenceStep(PropelPDO $con = null)
    {

        if ($this->singleMailSequenceStep === null && !$this->isNew()) {
            $this->singleMailSequenceStep = Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleMailSequenceStep;
    }

    /**
     * Sets a single Sao_Zed_Mail_Persistence_SaoMailSequenceStep object as related to this object by a one-to-one relationship.
     *
     * @param             Sao_Zed_Mail_Persistence_SaoMailSequenceStep $v Sao_Zed_Mail_Persistence_SaoMailSequenceStep
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMailSequenceStep(Sao_Zed_Mail_Persistence_SaoMailSequenceStep $v = null)
    {
        $this->singleMailSequenceStep = $v;

        // Make sure that that the passed-in Sao_Zed_Mail_Persistence_SaoMailSequenceStep isn't already associated with this object
        if ($v !== null && $v->getMailSequence(null, false) === null) {
            $v->setMailSequence($this);
        }

        return $this;
    }

    /**
     * Clears out the collSaoMailSequenceCartUserCodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
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
     * If this Sao_Zed_Mail_Persistence_SaoMailSequence is new, it will return
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
                    ->filterByMailSequence($this)
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
     */
    public function setSaoMailSequenceCartUserCodes(PropelCollection $saoMailSequenceCartUserCodes, PropelPDO $con = null)
    {
        $saoMailSequenceCartUserCodesToDelete = $this->getSaoMailSequenceCartUserCodes(new Criteria(), $con)->diff($saoMailSequenceCartUserCodes);

        $this->saoMailSequenceCartUserCodesScheduledForDeletion = unserialize(serialize($saoMailSequenceCartUserCodesToDelete));

        foreach ($saoMailSequenceCartUserCodesToDelete as $saoMailSequenceCartUserCodeRemoved) {
            $saoMailSequenceCartUserCodeRemoved->setMailSequence(null);
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
                ->filterByMailSequence($this)
                ->count($con);
        }

        return count($this->collSaoMailSequenceCartUserCodes);
    }

    /**
     * Method called to associate a Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode object to this object
     * through the Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode foreign key attribute.
     *
     * @param    Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode $l Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
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
        $saoMailSequenceCartUserCode->setMailSequence($this);
    }

    /**
     * @param	SaoMailSequenceCartUserCode $saoMailSequenceCartUserCode The saoMailSequenceCartUserCode object to remove.
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The current object (for fluent API support)
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
            $saoMailSequenceCartUserCode->setMailSequence(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SaoMailSequence is new, it will return
     * an empty collection; or if this SaoMailSequence has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoMailSequence.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     */
    public function getSaoMailSequenceCartUserCodesJoinCartUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
        $query->joinWith('CartUser', $join_behavior);

        return $this->getSaoMailSequenceCartUserCodes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SaoMailSequence is new, it will return
     * an empty collection; or if this SaoMailSequence has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoMailSequence.
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
     * Otherwise if this SaoMailSequence is new, it will return
     * an empty collection; or if this SaoMailSequence has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SaoMailSequence.
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mail_sequence = null;
        $this->name = null;
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
            if ($this->collMailSequenceElements) {
                foreach ($this->collMailSequenceElements as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleMailSequenceStep) {
                $this->singleMailSequenceStep->clearAllReferences($deep);
            }
            if ($this->collSaoMailSequenceCartUserCodes) {
                foreach ($this->collSaoMailSequenceCartUserCodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMailSequenceElements instanceof PropelCollection) {
            $this->collMailSequenceElements->clearIterator();
        }
        $this->collMailSequenceElements = null;
        if ($this->singleMailSequenceStep instanceof PropelCollection) {
            $this->singleMailSequenceStep->clearIterator();
        }
        $this->singleMailSequenceStep = null;
        if ($this->collSaoMailSequenceCartUserCodes instanceof PropelCollection) {
            $this->collSaoMailSequenceCartUserCodes->clearIterator();
        }
        $this->collSaoMailSequenceCartUserCodes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::DEFAULT_STRING_FORMAT);
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
