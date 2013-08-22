<?php


/**
 * Base class that represents a row from the 'pac_mcm_channel' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence.om
 */
abstract class Generated_Zed_Mcm_Persistence_Om_BasePacMcmChannel extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mcm_channel field.
     * @var        int
     */
    protected $id_mcm_channel;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] Collection to store aggregation of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     */
    protected $collPacMciCostEntries;
    protected $collPacMciCostEntriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel[] Collection to store aggregation of ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects.
     */
    protected $collPacMcmPartnerInChannels;
    protected $collPacMcmPartnerInChannelsPartial;

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
    protected $pacMciCostEntriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacMcmPartnerInChannelsScheduledForDeletion = null;

    /**
     * Get the [id_mcm_channel] column value.
     *
     * @return int
     */
    public function getIdMcmChannel()
    {
        return $this->id_mcm_channel;
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
     * Set the value of [id_mcm_channel] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function setIdMcmChannel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mcm_channel !== $v) {
            $this->id_mcm_channel = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL;
        }


        return $this;
    } // setIdMcmChannel()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NAME;
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

            $this->id_mcm_channel = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 2; // 2 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Mcm_Persistence_PacMcmChannel object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPacMciCostEntries = null;

            $this->collPacMcmPartnerInChannels = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Mcm_Persistence_PacMcmChannelQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($this);
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

            if ($this->pacMciCostEntriesScheduledForDeletion !== null) {
                if (!$this->pacMciCostEntriesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create()
                        ->filterByPrimaryKeys($this->pacMciCostEntriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacMciCostEntriesScheduledForDeletion = null;
                }
            }

            if ($this->collPacMciCostEntries !== null) {
                foreach ($this->collPacMciCostEntries as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacMcmPartnerInChannelsScheduledForDeletion !== null) {
                if (!$this->pacMcmPartnerInChannelsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery::create()
                        ->filterByPrimaryKeys($this->pacMcmPartnerInChannelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacMcmPartnerInChannelsScheduledForDeletion = null;
                }
            }

            if ($this->collPacMcmPartnerInChannels !== null) {
                foreach ($this->collPacMcmPartnerInChannels as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL;
        if (null !== $this->id_mcm_channel) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL)) {
            $modifiedColumns[':p' . $index++]  = '`id_mcm_channel`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_mcm_channel` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mcm_channel`':
                        $stmt->bindValue($identifier, $this->id_mcm_channel, PDO::PARAM_INT);
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
        $this->setIdMcmChannel($pk);

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


            if (($retval = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacMciCostEntries !== null) {
                    foreach ($this->collPacMciCostEntries as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacMcmPartnerInChannels !== null) {
                    foreach ($this->collPacMcmPartnerInChannels as $referrerFK) {
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
        $pos = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMcmChannel();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Mcm_Persistence_PacMcmChannel'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Mcm_Persistence_PacMcmChannel'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMcmChannel(),
            $keys[1] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPacMciCostEntries) {
                $result['PacMciCostEntries'] = $this->collPacMciCostEntries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacMcmPartnerInChannels) {
                $result['PacMcmPartnerInChannels'] = $this->collPacMcmPartnerInChannels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMcmChannel($value);
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
        $keys = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMcmChannel($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL)) $criteria->add(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $this->id_mcm_channel);
        if ($this->isColumnModified(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NAME)) $criteria->add(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NAME, $this->name);

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
        $criteria = new Criteria(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $this->id_mcm_channel);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMcmChannel();
    }

    /**
     * Generic method to set the primary key (id_mcm_channel column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMcmChannel($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMcmChannel();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Mcm_Persistence_PacMcmChannel (or compatible) type.
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

            foreach ($this->getPacMciCostEntries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacMciCostEntry($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacMcmPartnerInChannels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacMcmPartnerInChannel($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMcmChannel(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel Clone of current object.
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer();
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
        if ('PacMciCostEntry' == $relationName) {
            $this->initPacMciCostEntries();
        }
        if ('PacMcmPartnerInChannel' == $relationName) {
            $this->initPacMcmPartnerInChannels();
        }
    }

    /**
     * Clears out the collPacMciCostEntries collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     * @see        addPacMciCostEntries()
     */
    public function clearPacMciCostEntries()
    {
        $this->collPacMciCostEntries = null; // important to set this to null since that means it is uninitialized
        $this->collPacMciCostEntriesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacMciCostEntries collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacMciCostEntries($v = true)
    {
        $this->collPacMciCostEntriesPartial = $v;
    }

    /**
     * Initializes the collPacMciCostEntries collection.
     *
     * By default this just sets the collPacMciCostEntries collection to an empty array (like clearcollPacMciCostEntries());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacMciCostEntries($overrideExisting = true)
    {
        if (null !== $this->collPacMciCostEntries && !$overrideExisting) {
            return;
        }
        $this->collPacMciCostEntries = new PropelObjectCollection();
        $this->collPacMciCostEntries->setModel('ProjectA_Zed_Mci_Persistence_PacMciCostEntry');
    }

    /**
     * Gets an array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Mcm_Persistence_PacMcmChannel is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     * @throws PropelException
     */
    public function getPacMciCostEntries($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacMciCostEntriesPartial && !$this->isNew();
        if (null === $this->collPacMciCostEntries || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacMciCostEntries) {
                // return empty collection
                $this->initPacMciCostEntries();
            } else {
                $collPacMciCostEntries = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria)
                    ->filterByMcmChannel($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacMciCostEntriesPartial && count($collPacMciCostEntries)) {
                      $this->initPacMciCostEntries(false);

                      foreach($collPacMciCostEntries as $obj) {
                        if (false == $this->collPacMciCostEntries->contains($obj)) {
                          $this->collPacMciCostEntries->append($obj);
                        }
                      }

                      $this->collPacMciCostEntriesPartial = true;
                    }

                    $collPacMciCostEntries->getInternalIterator()->rewind();
                    return $collPacMciCostEntries;
                }

                if($partial && $this->collPacMciCostEntries) {
                    foreach($this->collPacMciCostEntries as $obj) {
                        if($obj->isNew()) {
                            $collPacMciCostEntries[] = $obj;
                        }
                    }
                }

                $this->collPacMciCostEntries = $collPacMciCostEntries;
                $this->collPacMciCostEntriesPartial = false;
            }
        }

        return $this->collPacMciCostEntries;
    }

    /**
     * Sets a collection of PacMciCostEntry objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacMciCostEntries A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function setPacMciCostEntries(PropelCollection $pacMciCostEntries, PropelPDO $con = null)
    {
        $pacMciCostEntriesToDelete = $this->getPacMciCostEntries(new Criteria(), $con)->diff($pacMciCostEntries);

        $this->pacMciCostEntriesScheduledForDeletion = unserialize(serialize($pacMciCostEntriesToDelete));

        foreach ($pacMciCostEntriesToDelete as $pacMciCostEntryRemoved) {
            $pacMciCostEntryRemoved->setMcmChannel(null);
        }

        $this->collPacMciCostEntries = null;
        foreach ($pacMciCostEntries as $pacMciCostEntry) {
            $this->addPacMciCostEntry($pacMciCostEntry);
        }

        $this->collPacMciCostEntries = $pacMciCostEntries;
        $this->collPacMciCostEntriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException
     */
    public function countPacMciCostEntries(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacMciCostEntriesPartial && !$this->isNew();
        if (null === $this->collPacMciCostEntries || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacMciCostEntries) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacMciCostEntries());
            }
            $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMcmChannel($this)
                ->count($con);
        }

        return count($this->collPacMciCostEntries);
    }

    /**
     * Method called to associate a ProjectA_Zed_Mci_Persistence_PacMciCostEntry object to this object
     * through the ProjectA_Zed_Mci_Persistence_PacMciCostEntry foreign key attribute.
     *
     * @param    ProjectA_Zed_Mci_Persistence_PacMciCostEntry $l ProjectA_Zed_Mci_Persistence_PacMciCostEntry
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function addPacMciCostEntry(ProjectA_Zed_Mci_Persistence_PacMciCostEntry $l)
    {
        if ($this->collPacMciCostEntries === null) {
            $this->initPacMciCostEntries();
            $this->collPacMciCostEntriesPartial = true;
        }
        if (!in_array($l, $this->collPacMciCostEntries->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacMciCostEntry($l);
        }

        return $this;
    }

    /**
     * @param	PacMciCostEntry $pacMciCostEntry The pacMciCostEntry object to add.
     */
    protected function doAddPacMciCostEntry($pacMciCostEntry)
    {
        $this->collPacMciCostEntries[]= $pacMciCostEntry;
        $pacMciCostEntry->setMcmChannel($this);
    }

    /**
     * @param	PacMciCostEntry $pacMciCostEntry The pacMciCostEntry object to remove.
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function removePacMciCostEntry($pacMciCostEntry)
    {
        if ($this->getPacMciCostEntries()->contains($pacMciCostEntry)) {
            $this->collPacMciCostEntries->remove($this->collPacMciCostEntries->search($pacMciCostEntry));
            if (null === $this->pacMciCostEntriesScheduledForDeletion) {
                $this->pacMciCostEntriesScheduledForDeletion = clone $this->collPacMciCostEntries;
                $this->pacMciCostEntriesScheduledForDeletion->clear();
            }
            $this->pacMciCostEntriesScheduledForDeletion[]= clone $pacMciCostEntry;
            $pacMciCostEntry->setMcmChannel(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMcmChannel is new, it will return
     * an empty collection; or if this PacMcmChannel has previously
     * been saved, it will retrieve related PacMciCostEntries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMcmChannel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesJoinMciCostType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('MciCostType', $join_behavior);

        return $this->getPacMciCostEntries($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMcmChannel is new, it will return
     * an empty collection; or if this PacMcmChannel has previously
     * been saved, it will retrieve related PacMciCostEntries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMcmChannel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesJoinMcmPartnerInChannel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmPartnerInChannel', $join_behavior);

        return $this->getPacMciCostEntries($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMcmChannel is new, it will return
     * an empty collection; or if this PacMcmChannel has previously
     * been saved, it will retrieve related PacMciCostEntries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMcmChannel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesJoinMcmPublication($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmPublication', $join_behavior);

        return $this->getPacMciCostEntries($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMcmChannel is new, it will return
     * an empty collection; or if this PacMcmChannel has previously
     * been saved, it will retrieve related PacMciCostEntries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMcmChannel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesJoinMcmCampaign($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmCampaign', $join_behavior);

        return $this->getPacMciCostEntries($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMcmChannel is new, it will return
     * an empty collection; or if this PacMcmChannel has previously
     * been saved, it will retrieve related PacMciCostEntries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMcmChannel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesJoinAclUserCreated($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('AclUserCreated', $join_behavior);

        return $this->getPacMciCostEntries($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMcmChannel is new, it will return
     * an empty collection; or if this PacMcmChannel has previously
     * been saved, it will retrieve related PacMciCostEntries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMcmChannel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesJoinAclUserUpdated($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('AclUserUpdated', $join_behavior);

        return $this->getPacMciCostEntries($query, $con);
    }

    /**
     * Clears out the collPacMcmPartnerInChannels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     * @see        addPacMcmPartnerInChannels()
     */
    public function clearPacMcmPartnerInChannels()
    {
        $this->collPacMcmPartnerInChannels = null; // important to set this to null since that means it is uninitialized
        $this->collPacMcmPartnerInChannelsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacMcmPartnerInChannels collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacMcmPartnerInChannels($v = true)
    {
        $this->collPacMcmPartnerInChannelsPartial = $v;
    }

    /**
     * Initializes the collPacMcmPartnerInChannels collection.
     *
     * By default this just sets the collPacMcmPartnerInChannels collection to an empty array (like clearcollPacMcmPartnerInChannels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacMcmPartnerInChannels($overrideExisting = true)
    {
        if (null !== $this->collPacMcmPartnerInChannels && !$overrideExisting) {
            return;
        }
        $this->collPacMcmPartnerInChannels = new PropelObjectCollection();
        $this->collPacMcmPartnerInChannels->setModel('ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel');
    }

    /**
     * Gets an array of ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Mcm_Persistence_PacMcmChannel is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel[] List of ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects
     * @throws PropelException
     */
    public function getPacMcmPartnerInChannels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacMcmPartnerInChannelsPartial && !$this->isNew();
        if (null === $this->collPacMcmPartnerInChannels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacMcmPartnerInChannels) {
                // return empty collection
                $this->initPacMcmPartnerInChannels();
            } else {
                $collPacMcmPartnerInChannels = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery::create(null, $criteria)
                    ->filterByMcmChannel($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacMcmPartnerInChannelsPartial && count($collPacMcmPartnerInChannels)) {
                      $this->initPacMcmPartnerInChannels(false);

                      foreach($collPacMcmPartnerInChannels as $obj) {
                        if (false == $this->collPacMcmPartnerInChannels->contains($obj)) {
                          $this->collPacMcmPartnerInChannels->append($obj);
                        }
                      }

                      $this->collPacMcmPartnerInChannelsPartial = true;
                    }

                    $collPacMcmPartnerInChannels->getInternalIterator()->rewind();
                    return $collPacMcmPartnerInChannels;
                }

                if($partial && $this->collPacMcmPartnerInChannels) {
                    foreach($this->collPacMcmPartnerInChannels as $obj) {
                        if($obj->isNew()) {
                            $collPacMcmPartnerInChannels[] = $obj;
                        }
                    }
                }

                $this->collPacMcmPartnerInChannels = $collPacMcmPartnerInChannels;
                $this->collPacMcmPartnerInChannelsPartial = false;
            }
        }

        return $this->collPacMcmPartnerInChannels;
    }

    /**
     * Sets a collection of PacMcmPartnerInChannel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacMcmPartnerInChannels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function setPacMcmPartnerInChannels(PropelCollection $pacMcmPartnerInChannels, PropelPDO $con = null)
    {
        $pacMcmPartnerInChannelsToDelete = $this->getPacMcmPartnerInChannels(new Criteria(), $con)->diff($pacMcmPartnerInChannels);

        $this->pacMcmPartnerInChannelsScheduledForDeletion = unserialize(serialize($pacMcmPartnerInChannelsToDelete));

        foreach ($pacMcmPartnerInChannelsToDelete as $pacMcmPartnerInChannelRemoved) {
            $pacMcmPartnerInChannelRemoved->setMcmChannel(null);
        }

        $this->collPacMcmPartnerInChannels = null;
        foreach ($pacMcmPartnerInChannels as $pacMcmPartnerInChannel) {
            $this->addPacMcmPartnerInChannel($pacMcmPartnerInChannel);
        }

        $this->collPacMcmPartnerInChannels = $pacMcmPartnerInChannels;
        $this->collPacMcmPartnerInChannelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects.
     * @throws PropelException
     */
    public function countPacMcmPartnerInChannels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacMcmPartnerInChannelsPartial && !$this->isNew();
        if (null === $this->collPacMcmPartnerInChannels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacMcmPartnerInChannels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacMcmPartnerInChannels());
            }
            $query = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMcmChannel($this)
                ->count($con);
        }

        return count($this->collPacMcmPartnerInChannels);
    }

    /**
     * Method called to associate a ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object to this object
     * through the ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel foreign key attribute.
     *
     * @param    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel $l ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function addPacMcmPartnerInChannel(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel $l)
    {
        if ($this->collPacMcmPartnerInChannels === null) {
            $this->initPacMcmPartnerInChannels();
            $this->collPacMcmPartnerInChannelsPartial = true;
        }
        if (!in_array($l, $this->collPacMcmPartnerInChannels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacMcmPartnerInChannel($l);
        }

        return $this;
    }

    /**
     * @param	PacMcmPartnerInChannel $pacMcmPartnerInChannel The pacMcmPartnerInChannel object to add.
     */
    protected function doAddPacMcmPartnerInChannel($pacMcmPartnerInChannel)
    {
        $this->collPacMcmPartnerInChannels[]= $pacMcmPartnerInChannel;
        $pacMcmPartnerInChannel->setMcmChannel($this);
    }

    /**
     * @param	PacMcmPartnerInChannel $pacMcmPartnerInChannel The pacMcmPartnerInChannel object to remove.
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The current object (for fluent API support)
     */
    public function removePacMcmPartnerInChannel($pacMcmPartnerInChannel)
    {
        if ($this->getPacMcmPartnerInChannels()->contains($pacMcmPartnerInChannel)) {
            $this->collPacMcmPartnerInChannels->remove($this->collPacMcmPartnerInChannels->search($pacMcmPartnerInChannel));
            if (null === $this->pacMcmPartnerInChannelsScheduledForDeletion) {
                $this->pacMcmPartnerInChannelsScheduledForDeletion = clone $this->collPacMcmPartnerInChannels;
                $this->pacMcmPartnerInChannelsScheduledForDeletion->clear();
            }
            $this->pacMcmPartnerInChannelsScheduledForDeletion[]= clone $pacMcmPartnerInChannel;
            $pacMcmPartnerInChannel->setMcmChannel(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMcmChannel is new, it will return
     * an empty collection; or if this PacMcmChannel has previously
     * been saved, it will retrieve related PacMcmPartnerInChannels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMcmChannel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel[] List of ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects
     */
    public function getPacMcmPartnerInChannelsJoinMcmPartner($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery::create(null, $criteria);
        $query->joinWith('McmPartner', $join_behavior);

        return $this->getPacMcmPartnerInChannels($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mcm_channel = null;
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
            if ($this->collPacMciCostEntries) {
                foreach ($this->collPacMciCostEntries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacMcmPartnerInChannels) {
                foreach ($this->collPacMcmPartnerInChannels as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacMciCostEntries instanceof PropelCollection) {
            $this->collPacMciCostEntries->clearIterator();
        }
        $this->collPacMciCostEntries = null;
        if ($this->collPacMcmPartnerInChannels instanceof PropelCollection) {
            $this->collPacMcmPartnerInChannels->clearIterator();
        }
        $this->collPacMcmPartnerInChannels = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::DEFAULT_STRING_FORMAT);
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
