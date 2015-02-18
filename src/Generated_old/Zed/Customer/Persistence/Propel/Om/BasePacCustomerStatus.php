<?php


/**
 * Base class that represents a row from the 'pac_customer_status' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Customer/Persistence/Propel.om
 */
abstract class Generated_Zed_Customer_Persistence_Propel_Om_BasePacCustomerStatus extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_customer_status field.
     * @var        int
     */
    protected $id_customer_status;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomer[] Collection to store aggregation of ProjectA_Zed_Customer_Persistence_Propel_PacCustomer objects.
     */
    protected $collCustomers;
    protected $collCustomersPartial;

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
    protected $customersScheduledForDeletion = null;

    /**
     * Get the [id_customer_status] column value.
     *
     * @return int
     */
    public function getIdCustomerStatus()
    {

        return $this->id_customer_status;
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
     * Set the value of [id_customer_status] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus The current object (for fluent API support)
     */
    public function setIdCustomerStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_customer_status !== $v) {
            $this->id_customer_status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::ID_CUSTOMER_STATUS;
        }


        return $this;
    } // setIdCustomerStatus()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::NAME;
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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_customer_status = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 2; // 2 = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCustomers = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::addInstanceToPool($this);
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

            if ($this->customersScheduledForDeletion !== null) {
                if (!$this->customersScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Customer_Persistence_Propel_PacCustomerQuery::create()
                        ->filterByPrimaryKeys($this->customersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->customersScheduledForDeletion = null;
                }
            }

            if ($this->collCustomers !== null) {
                foreach ($this->collCustomers as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::ID_CUSTOMER_STATUS;
        if (null !== $this->id_customer_status) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::ID_CUSTOMER_STATUS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::ID_CUSTOMER_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`id_customer_status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_customer_status` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_customer_status`':
                        $stmt->bindValue($identifier, $this->id_customer_status, PDO::PARAM_INT);
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
        $this->setIdCustomerStatus($pk);

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


            if (($retval = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCustomers !== null) {
                    foreach ($this->collCustomers as $referrerFK) {
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
        $pos = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCustomerStatus();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCustomerStatus(),
            $keys[1] => $this->getName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collCustomers) {
                $result['Customers'] = $this->collCustomers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCustomerStatus($value);
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
        $keys = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCustomerStatus($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::ID_CUSTOMER_STATUS)) $criteria->add(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::ID_CUSTOMER_STATUS, $this->id_customer_status);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::NAME)) $criteria->add(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::NAME, $this->name);

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
        $criteria = new Criteria(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::ID_CUSTOMER_STATUS, $this->id_customer_status);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCustomerStatus();
    }

    /**
     * Generic method to set the primary key (id_customer_status column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCustomerStatus($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCustomerStatus();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus (or compatible) type.
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

            foreach ($this->getCustomers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomer($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCustomerStatus(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus Clone of current object.
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
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer();
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
        if ('Customer' == $relationName) {
            $this->initCustomers();
        }
    }

    /**
     * Clears out the collCustomers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus The current object (for fluent API support)
     * @see        addCustomers()
     */
    public function clearCustomers()
    {
        $this->collCustomers = null; // important to set this to null since that means it is uninitialized
        $this->collCustomersPartial = null;

        return $this;
    }

    /**
     * reset is the collCustomers collection loaded partially
     *
     * @return void
     */
    public function resetPartialCustomers($v = true)
    {
        $this->collCustomersPartial = $v;
    }

    /**
     * Initializes the collCustomers collection.
     *
     * By default this just sets the collCustomers collection to an empty array (like clearcollCustomers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomers($overrideExisting = true)
    {
        if (null !== $this->collCustomers && !$overrideExisting) {
            return;
        }
        $this->collCustomers = new PropelObjectCollection();
        $this->collCustomers->setModel('ProjectA_Zed_Customer_Persistence_Propel_PacCustomer');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer_Persistence_Propel_PacCustomer objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomer[] List of ProjectA_Zed_Customer_Persistence_Propel_PacCustomer objects
     * @throws PropelException
     */
    public function getCustomers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCustomersPartial && !$this->isNew();
        if (null === $this->collCustomers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomers) {
                // return empty collection
                $this->initCustomers();
            } else {
                $collCustomers = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerQuery::create(null, $criteria)
                    ->filterByStatus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCustomersPartial && count($collCustomers)) {
                      $this->initCustomers(false);

                      foreach ($collCustomers as $obj) {
                        if (false == $this->collCustomers->contains($obj)) {
                          $this->collCustomers->append($obj);
                        }
                      }

                      $this->collCustomersPartial = true;
                    }

                    $collCustomers->getInternalIterator()->rewind();

                    return $collCustomers;
                }

                if ($partial && $this->collCustomers) {
                    foreach ($this->collCustomers as $obj) {
                        if ($obj->isNew()) {
                            $collCustomers[] = $obj;
                        }
                    }
                }

                $this->collCustomers = $collCustomers;
                $this->collCustomersPartial = false;
            }
        }

        return $this->collCustomers;
    }

    /**
     * Sets a collection of Customer objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $customers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus The current object (for fluent API support)
     */
    public function setCustomers(PropelCollection $customers, PropelPDO $con = null)
    {
        $customersToDelete = $this->getCustomers(new Criteria(), $con)->diff($customers);


        $this->customersScheduledForDeletion = $customersToDelete;

        foreach ($customersToDelete as $customerRemoved) {
            $customerRemoved->setStatus(null);
        }

        $this->collCustomers = null;
        foreach ($customers as $customer) {
            $this->addCustomer($customer);
        }

        $this->collCustomers = $customers;
        $this->collCustomersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Customer_Persistence_Propel_PacCustomer objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer_Persistence_Propel_PacCustomer objects.
     * @throws PropelException
     */
    public function countCustomers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCustomersPartial && !$this->isNew();
        if (null === $this->collCustomers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomers());
            }
            $query = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStatus($this)
                ->count($con);
        }

        return count($this->collCustomers);
    }

    /**
     * Method called to associate a ProjectA_Zed_Customer_Persistence_Propel_PacCustomer object to this object
     * through the ProjectA_Zed_Customer_Persistence_Propel_PacCustomer foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $l ProjectA_Zed_Customer_Persistence_Propel_PacCustomer
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus The current object (for fluent API support)
     */
    public function addCustomer(ProjectA_Zed_Customer_Persistence_Propel_PacCustomer $l)
    {
        if ($this->collCustomers === null) {
            $this->initCustomers();
            $this->collCustomersPartial = true;
        }

        if (!in_array($l, $this->collCustomers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCustomer($l);

            if ($this->customersScheduledForDeletion and $this->customersScheduledForDeletion->contains($l)) {
                $this->customersScheduledForDeletion->remove($this->customersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Customer $customer The customer object to add.
     */
    protected function doAddCustomer($customer)
    {
        $this->collCustomers[]= $customer;
        $customer->setStatus($this);
    }

    /**
     * @param	Customer $customer The customer object to remove.
     * @return ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus The current object (for fluent API support)
     */
    public function removeCustomer($customer)
    {
        if ($this->getCustomers()->contains($customer)) {
            $this->collCustomers->remove($this->collCustomers->search($customer));
            if (null === $this->customersScheduledForDeletion) {
                $this->customersScheduledForDeletion = clone $this->collCustomers;
                $this->customersScheduledForDeletion->clear();
            }
            $this->customersScheduledForDeletion[]= clone $customer;
            $customer->setStatus(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomerStatus is new, it will return
     * an empty collection; or if this PacCustomerStatus has previously
     * been saved, it will retrieve related Customers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomerStatus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomer[] List of ProjectA_Zed_Customer_Persistence_Propel_PacCustomer objects
     */
    public function getCustomersJoinBillingAddress($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerQuery::create(null, $criteria);
        $query->joinWith('BillingAddress', $join_behavior);

        return $this->getCustomers($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomerStatus is new, it will return
     * an empty collection; or if this PacCustomerStatus has previously
     * been saved, it will retrieve related Customers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomerStatus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomer[] List of ProjectA_Zed_Customer_Persistence_Propel_PacCustomer objects
     */
    public function getCustomersJoinShippingAddress($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerQuery::create(null, $criteria);
        $query->joinWith('ShippingAddress', $join_behavior);

        return $this->getCustomers($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_customer_status = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collCustomers) {
                foreach ($this->collCustomers as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCustomers instanceof PropelCollection) {
            $this->collCustomers->clearIterator();
        }
        $this->collCustomers = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatusPeer::DEFAULT_STRING_FORMAT);
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
