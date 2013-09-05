<?php


/**
 * Base class that represents a row from the 'pac_tracking_conversion_type' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingConversionType extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_tracking_conversion_type field.
     * @var        int
     */
    protected $id_tracking_conversion_type;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion[] Collection to store aggregation of ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects.
     */
    protected $collTrackingPageTypeIsConversions;
    protected $collTrackingPageTypeIsConversionsPartial;

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
    protected $trackingPageTypeIsConversionsScheduledForDeletion = null;

    /**
     * Get the [id_tracking_conversion_type] column value.
     *
     * @return int
     */
    public function getIdTrackingConversionType()
    {
        return $this->id_tracking_conversion_type;
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
     * Set the value of [id_tracking_conversion_type] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType The current object (for fluent API support)
     */
    public function setIdTrackingConversionType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_tracking_conversion_type !== $v) {
            $this->id_tracking_conversion_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::ID_TRACKING_CONVERSION_TYPE;
        }


        return $this;
    } // setIdTrackingConversionType()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::NAME;
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

            $this->id_tracking_conversion_type = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 2; // 2 = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collTrackingPageTypeIsConversions = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::addInstanceToPool($this);
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

            if ($this->trackingPageTypeIsConversionsScheduledForDeletion !== null) {
                if (!$this->trackingPageTypeIsConversionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery::create()
                        ->filterByPrimaryKeys($this->trackingPageTypeIsConversionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trackingPageTypeIsConversionsScheduledForDeletion = null;
                }
            }

            if ($this->collTrackingPageTypeIsConversions !== null) {
                foreach ($this->collTrackingPageTypeIsConversions as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::ID_TRACKING_CONVERSION_TYPE;
        if (null !== $this->id_tracking_conversion_type) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::ID_TRACKING_CONVERSION_TYPE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::ID_TRACKING_CONVERSION_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`id_tracking_conversion_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_tracking_conversion_type` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_tracking_conversion_type`':
                        $stmt->bindValue($identifier, $this->id_tracking_conversion_type, PDO::PARAM_INT);
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
        $this->setIdTrackingConversionType($pk);

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


            if (($retval = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collTrackingPageTypeIsConversions !== null) {
                    foreach ($this->collTrackingPageTypeIsConversions as $referrerFK) {
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
        $pos = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdTrackingConversionType();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdTrackingConversionType(),
            $keys[1] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collTrackingPageTypeIsConversions) {
                $result['TrackingPageTypeIsConversions'] = $this->collTrackingPageTypeIsConversions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdTrackingConversionType($value);
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
        $keys = ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdTrackingConversionType($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::ID_TRACKING_CONVERSION_TYPE)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::ID_TRACKING_CONVERSION_TYPE, $this->id_tracking_conversion_type);
        if ($this->isColumnModified(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::NAME)) $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::NAME, $this->name);

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
        $criteria = new Criteria(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::ID_TRACKING_CONVERSION_TYPE, $this->id_tracking_conversion_type);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdTrackingConversionType();
    }

    /**
     * Generic method to set the primary key (id_tracking_conversion_type column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdTrackingConversionType($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdTrackingConversionType();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType (or compatible) type.
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

            foreach ($this->getTrackingPageTypeIsConversions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrackingPageTypeIsConversion($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdTrackingConversionType(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType Clone of current object.
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer();
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
        if ('TrackingPageTypeIsConversion' == $relationName) {
            $this->initTrackingPageTypeIsConversions();
        }
    }

    /**
     * Clears out the collTrackingPageTypeIsConversions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType The current object (for fluent API support)
     * @see        addTrackingPageTypeIsConversions()
     */
    public function clearTrackingPageTypeIsConversions()
    {
        $this->collTrackingPageTypeIsConversions = null; // important to set this to null since that means it is uninitialized
        $this->collTrackingPageTypeIsConversionsPartial = null;

        return $this;
    }

    /**
     * reset is the collTrackingPageTypeIsConversions collection loaded partially
     *
     * @return void
     */
    public function resetPartialTrackingPageTypeIsConversions($v = true)
    {
        $this->collTrackingPageTypeIsConversionsPartial = $v;
    }

    /**
     * Initializes the collTrackingPageTypeIsConversions collection.
     *
     * By default this just sets the collTrackingPageTypeIsConversions collection to an empty array (like clearcollTrackingPageTypeIsConversions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrackingPageTypeIsConversions($overrideExisting = true)
    {
        if (null !== $this->collTrackingPageTypeIsConversions && !$overrideExisting) {
            return;
        }
        $this->collTrackingPageTypeIsConversions = new PropelObjectCollection();
        $this->collTrackingPageTypeIsConversions->setModel('ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion');
    }

    /**
     * Gets an array of ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion[] List of ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects
     * @throws PropelException
     */
    public function getTrackingPageTypeIsConversions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTrackingPageTypeIsConversionsPartial && !$this->isNew();
        if (null === $this->collTrackingPageTypeIsConversions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrackingPageTypeIsConversions) {
                // return empty collection
                $this->initTrackingPageTypeIsConversions();
            } else {
                $collTrackingPageTypeIsConversions = ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery::create(null, $criteria)
                    ->filterByTrackingConversionType($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTrackingPageTypeIsConversionsPartial && count($collTrackingPageTypeIsConversions)) {
                      $this->initTrackingPageTypeIsConversions(false);

                      foreach($collTrackingPageTypeIsConversions as $obj) {
                        if (false == $this->collTrackingPageTypeIsConversions->contains($obj)) {
                          $this->collTrackingPageTypeIsConversions->append($obj);
                        }
                      }

                      $this->collTrackingPageTypeIsConversionsPartial = true;
                    }

                    $collTrackingPageTypeIsConversions->getInternalIterator()->rewind();
                    return $collTrackingPageTypeIsConversions;
                }

                if($partial && $this->collTrackingPageTypeIsConversions) {
                    foreach($this->collTrackingPageTypeIsConversions as $obj) {
                        if($obj->isNew()) {
                            $collTrackingPageTypeIsConversions[] = $obj;
                        }
                    }
                }

                $this->collTrackingPageTypeIsConversions = $collTrackingPageTypeIsConversions;
                $this->collTrackingPageTypeIsConversionsPartial = false;
            }
        }

        return $this->collTrackingPageTypeIsConversions;
    }

    /**
     * Sets a collection of TrackingPageTypeIsConversion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $trackingPageTypeIsConversions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType The current object (for fluent API support)
     */
    public function setTrackingPageTypeIsConversions(PropelCollection $trackingPageTypeIsConversions, PropelPDO $con = null)
    {
        $trackingPageTypeIsConversionsToDelete = $this->getTrackingPageTypeIsConversions(new Criteria(), $con)->diff($trackingPageTypeIsConversions);

        $this->trackingPageTypeIsConversionsScheduledForDeletion = unserialize(serialize($trackingPageTypeIsConversionsToDelete));

        foreach ($trackingPageTypeIsConversionsToDelete as $trackingPageTypeIsConversionRemoved) {
            $trackingPageTypeIsConversionRemoved->setTrackingConversionType(null);
        }

        $this->collTrackingPageTypeIsConversions = null;
        foreach ($trackingPageTypeIsConversions as $trackingPageTypeIsConversion) {
            $this->addTrackingPageTypeIsConversion($trackingPageTypeIsConversion);
        }

        $this->collTrackingPageTypeIsConversions = $trackingPageTypeIsConversions;
        $this->collTrackingPageTypeIsConversionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects.
     * @throws PropelException
     */
    public function countTrackingPageTypeIsConversions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTrackingPageTypeIsConversionsPartial && !$this->isNew();
        if (null === $this->collTrackingPageTypeIsConversions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrackingPageTypeIsConversions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTrackingPageTypeIsConversions());
            }
            $query = ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTrackingConversionType($this)
                ->count($con);
        }

        return count($this->collTrackingPageTypeIsConversions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion object to this object
     * through the ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion foreign key attribute.
     *
     * @param    ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion $l ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType The current object (for fluent API support)
     */
    public function addTrackingPageTypeIsConversion(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion $l)
    {
        if ($this->collTrackingPageTypeIsConversions === null) {
            $this->initTrackingPageTypeIsConversions();
            $this->collTrackingPageTypeIsConversionsPartial = true;
        }
        if (!in_array($l, $this->collTrackingPageTypeIsConversions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTrackingPageTypeIsConversion($l);
        }

        return $this;
    }

    /**
     * @param	TrackingPageTypeIsConversion $trackingPageTypeIsConversion The trackingPageTypeIsConversion object to add.
     */
    protected function doAddTrackingPageTypeIsConversion($trackingPageTypeIsConversion)
    {
        $this->collTrackingPageTypeIsConversions[]= $trackingPageTypeIsConversion;
        $trackingPageTypeIsConversion->setTrackingConversionType($this);
    }

    /**
     * @param	TrackingPageTypeIsConversion $trackingPageTypeIsConversion The trackingPageTypeIsConversion object to remove.
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType The current object (for fluent API support)
     */
    public function removeTrackingPageTypeIsConversion($trackingPageTypeIsConversion)
    {
        if ($this->getTrackingPageTypeIsConversions()->contains($trackingPageTypeIsConversion)) {
            $this->collTrackingPageTypeIsConversions->remove($this->collTrackingPageTypeIsConversions->search($trackingPageTypeIsConversion));
            if (null === $this->trackingPageTypeIsConversionsScheduledForDeletion) {
                $this->trackingPageTypeIsConversionsScheduledForDeletion = clone $this->collTrackingPageTypeIsConversions;
                $this->trackingPageTypeIsConversionsScheduledForDeletion->clear();
            }
            $this->trackingPageTypeIsConversionsScheduledForDeletion[]= clone $trackingPageTypeIsConversion;
            $trackingPageTypeIsConversion->setTrackingConversionType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacTrackingConversionType is new, it will return
     * an empty collection; or if this PacTrackingConversionType has previously
     * been saved, it will retrieve related TrackingPageTypeIsConversions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacTrackingConversionType.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion[] List of ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects
     */
    public function getTrackingPageTypeIsConversionsJoinTrackingPageType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery::create(null, $criteria);
        $query->joinWith('TrackingPageType', $join_behavior);

        return $this->getTrackingPageTypeIsConversions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_tracking_conversion_type = null;
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
            if ($this->collTrackingPageTypeIsConversions) {
                foreach ($this->collTrackingPageTypeIsConversions as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collTrackingPageTypeIsConversions instanceof PropelCollection) {
            $this->collTrackingPageTypeIsConversions->clearIterator();
        }
        $this->collTrackingPageTypeIsConversions = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypePeer::DEFAULT_STRING_FORMAT);
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
