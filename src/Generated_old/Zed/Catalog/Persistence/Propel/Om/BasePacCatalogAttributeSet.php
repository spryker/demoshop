<?php


/**
 * Base class that represents a row from the 'pac_catalog_attribute_set' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogAttributeSet extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_attribute_set field.
     * @var        int
     */
    protected $id_catalog_attribute_set;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects.
     */
    protected $collProductEntities;
    protected $collProductEntitiesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects.
     */
    protected $collValueTypes;
    protected $collValueTypesPartial;

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
    protected $productEntitiesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $valueTypesScheduledForDeletion = null;

    /**
     * Get the [id_catalog_attribute_set] column value.
     *
     * @return int
     */
    public function getIdCatalogAttributeSet()
    {

        return $this->id_catalog_attribute_set;
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
     * Set the value of [id_catalog_attribute_set] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function setIdCatalogAttributeSet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_attribute_set !== $v) {
            $this->id_catalog_attribute_set = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET;
        }


        return $this;
    } // setIdCatalogAttributeSet()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::NAME;
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

            $this->id_catalog_attribute_set = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 2; // 2 = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collProductEntities = null;

            $this->collValueTypes = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::addInstanceToPool($this);
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

            if ($this->productEntitiesScheduledForDeletion !== null) {
                if (!$this->productEntitiesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery::create()
                        ->filterByPrimaryKeys($this->productEntitiesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productEntitiesScheduledForDeletion = null;
                }
            }

            if ($this->collProductEntities !== null) {
                foreach ($this->collProductEntities as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->valueTypesScheduledForDeletion !== null) {
                if (!$this->valueTypesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery::create()
                        ->filterByPrimaryKeys($this->valueTypesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->valueTypesScheduledForDeletion = null;
                }
            }

            if ($this->collValueTypes !== null) {
                foreach ($this->collValueTypes as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET;
        if (null !== $this->id_catalog_attribute_set) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_attribute_set`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_attribute_set` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_catalog_attribute_set`':
                        $stmt->bindValue($identifier, $this->id_catalog_attribute_set, PDO::PARAM_INT);
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
        $this->setIdCatalogAttributeSet($pk);

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


            if (($retval = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProductEntities !== null) {
                    foreach ($this->collProductEntities as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collValueTypes !== null) {
                    foreach ($this->collValueTypes as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCatalogAttributeSet();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogAttributeSet(),
            $keys[1] => $this->getName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collProductEntities) {
                $result['ProductEntities'] = $this->collProductEntities->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collValueTypes) {
                $result['ValueTypes'] = $this->collValueTypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCatalogAttributeSet($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogAttributeSet($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $this->id_catalog_attribute_set);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::NAME)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::NAME, $this->name);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::ID_CATALOG_ATTRIBUTE_SET, $this->id_catalog_attribute_set);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCatalogAttributeSet();
    }

    /**
     * Generic method to set the primary key (id_catalog_attribute_set column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCatalogAttributeSet($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCatalogAttributeSet();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet (or compatible) type.
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

            foreach ($this->getProductEntities() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductEntity($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getValueTypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addValueType($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCatalogAttributeSet(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer();
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
        if ('ProductEntity' == $relationName) {
            $this->initProductEntities();
        }
        if ('ValueType' == $relationName) {
            $this->initValueTypes();
        }
    }

    /**
     * Clears out the collProductEntities collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     * @see        addProductEntities()
     */
    public function clearProductEntities()
    {
        $this->collProductEntities = null; // important to set this to null since that means it is uninitialized
        $this->collProductEntitiesPartial = null;

        return $this;
    }

    /**
     * reset is the collProductEntities collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductEntities($v = true)
    {
        $this->collProductEntitiesPartial = $v;
    }

    /**
     * Initializes the collProductEntities collection.
     *
     * By default this just sets the collProductEntities collection to an empty array (like clearcollProductEntities());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductEntities($overrideExisting = true)
    {
        if (null !== $this->collProductEntities && !$overrideExisting) {
            return;
        }
        $this->collProductEntities = new PropelObjectCollection();
        $this->collProductEntities->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects
     * @throws PropelException
     */
    public function getProductEntities($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductEntitiesPartial && !$this->isNew();
        if (null === $this->collProductEntities || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductEntities) {
                // return empty collection
                $this->initProductEntities();
            } else {
                $collProductEntities = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery::create(null, $criteria)
                    ->filterByAttributeSet($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductEntitiesPartial && count($collProductEntities)) {
                      $this->initProductEntities(false);

                      foreach ($collProductEntities as $obj) {
                        if (false == $this->collProductEntities->contains($obj)) {
                          $this->collProductEntities->append($obj);
                        }
                      }

                      $this->collProductEntitiesPartial = true;
                    }

                    $collProductEntities->getInternalIterator()->rewind();

                    return $collProductEntities;
                }

                if ($partial && $this->collProductEntities) {
                    foreach ($this->collProductEntities as $obj) {
                        if ($obj->isNew()) {
                            $collProductEntities[] = $obj;
                        }
                    }
                }

                $this->collProductEntities = $collProductEntities;
                $this->collProductEntitiesPartial = false;
            }
        }

        return $this->collProductEntities;
    }

    /**
     * Sets a collection of ProductEntity objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productEntities A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function setProductEntities(PropelCollection $productEntities, PropelPDO $con = null)
    {
        $productEntitiesToDelete = $this->getProductEntities(new Criteria(), $con)->diff($productEntities);


        $this->productEntitiesScheduledForDeletion = $productEntitiesToDelete;

        foreach ($productEntitiesToDelete as $productEntityRemoved) {
            $productEntityRemoved->setAttributeSet(null);
        }

        $this->collProductEntities = null;
        foreach ($productEntities as $productEntity) {
            $this->addProductEntity($productEntity);
        }

        $this->collProductEntities = $productEntities;
        $this->collProductEntitiesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct objects.
     * @throws PropelException
     */
    public function countProductEntities(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductEntitiesPartial && !$this->isNew();
        if (null === $this->collProductEntities || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductEntities) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductEntities());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttributeSet($this)
                ->count($con);
        }

        return count($this->collProductEntities);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function addProductEntity(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct $l)
    {
        if ($this->collProductEntities === null) {
            $this->initProductEntities();
            $this->collProductEntitiesPartial = true;
        }

        if (!in_array($l, $this->collProductEntities->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductEntity($l);

            if ($this->productEntitiesScheduledForDeletion and $this->productEntitiesScheduledForDeletion->contains($l)) {
                $this->productEntitiesScheduledForDeletion->remove($this->productEntitiesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ProductEntity $productEntity The productEntity object to add.
     */
    protected function doAddProductEntity($productEntity)
    {
        $this->collProductEntities[]= $productEntity;
        $productEntity->setAttributeSet($this);
    }

    /**
     * @param	ProductEntity $productEntity The productEntity object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function removeProductEntity($productEntity)
    {
        if ($this->getProductEntities()->contains($productEntity)) {
            $this->collProductEntities->remove($this->collProductEntities->search($productEntity));
            if (null === $this->productEntitiesScheduledForDeletion) {
                $this->productEntitiesScheduledForDeletion = clone $this->collProductEntities;
                $this->productEntitiesScheduledForDeletion->clear();
            }
            $this->productEntitiesScheduledForDeletion[]= clone $productEntity;
            $productEntity->setAttributeSet(null);
        }

        return $this;
    }

    /**
     * Clears out the collValueTypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     * @see        addValueTypes()
     */
    public function clearValueTypes()
    {
        $this->collValueTypes = null; // important to set this to null since that means it is uninitialized
        $this->collValueTypesPartial = null;

        return $this;
    }

    /**
     * reset is the collValueTypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialValueTypes($v = true)
    {
        $this->collValueTypesPartial = $v;
    }

    /**
     * Initializes the collValueTypes collection.
     *
     * By default this just sets the collValueTypes collection to an empty array (like clearcollValueTypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initValueTypes($overrideExisting = true)
    {
        if (null !== $this->collValueTypes && !$overrideExisting) {
            return;
        }
        $this->collValueTypes = new PropelObjectCollection();
        $this->collValueTypes->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects
     * @throws PropelException
     */
    public function getValueTypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collValueTypesPartial && !$this->isNew();
        if (null === $this->collValueTypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collValueTypes) {
                // return empty collection
                $this->initValueTypes();
            } else {
                $collValueTypes = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery::create(null, $criteria)
                    ->filterByAttributeSet($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collValueTypesPartial && count($collValueTypes)) {
                      $this->initValueTypes(false);

                      foreach ($collValueTypes as $obj) {
                        if (false == $this->collValueTypes->contains($obj)) {
                          $this->collValueTypes->append($obj);
                        }
                      }

                      $this->collValueTypesPartial = true;
                    }

                    $collValueTypes->getInternalIterator()->rewind();

                    return $collValueTypes;
                }

                if ($partial && $this->collValueTypes) {
                    foreach ($this->collValueTypes as $obj) {
                        if ($obj->isNew()) {
                            $collValueTypes[] = $obj;
                        }
                    }
                }

                $this->collValueTypes = $collValueTypes;
                $this->collValueTypesPartial = false;
            }
        }

        return $this->collValueTypes;
    }

    /**
     * Sets a collection of ValueType objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $valueTypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function setValueTypes(PropelCollection $valueTypes, PropelPDO $con = null)
    {
        $valueTypesToDelete = $this->getValueTypes(new Criteria(), $con)->diff($valueTypes);


        $this->valueTypesScheduledForDeletion = $valueTypesToDelete;

        foreach ($valueTypesToDelete as $valueTypeRemoved) {
            $valueTypeRemoved->setAttributeSet(null);
        }

        $this->collValueTypes = null;
        foreach ($valueTypes as $valueType) {
            $this->addValueType($valueType);
        }

        $this->collValueTypes = $valueTypes;
        $this->collValueTypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects.
     * @throws PropelException
     */
    public function countValueTypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collValueTypesPartial && !$this->isNew();
        if (null === $this->collValueTypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collValueTypes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getValueTypes());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttributeSet($this)
                ->count($con);
        }

        return count($this->collValueTypes);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function addValueType(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $l)
    {
        if ($this->collValueTypes === null) {
            $this->initValueTypes();
            $this->collValueTypesPartial = true;
        }

        if (!in_array($l, $this->collValueTypes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddValueType($l);

            if ($this->valueTypesScheduledForDeletion and $this->valueTypesScheduledForDeletion->contains($l)) {
                $this->valueTypesScheduledForDeletion->remove($this->valueTypesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ValueType $valueType The valueType object to add.
     */
    protected function doAddValueType($valueType)
    {
        $this->collValueTypes[]= $valueType;
        $valueType->setAttributeSet($this);
    }

    /**
     * @param	ValueType $valueType The valueType object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The current object (for fluent API support)
     */
    public function removeValueType($valueType)
    {
        if ($this->getValueTypes()->contains($valueType)) {
            $this->collValueTypes->remove($this->collValueTypes->search($valueType));
            if (null === $this->valueTypesScheduledForDeletion) {
                $this->valueTypesScheduledForDeletion = clone $this->collValueTypes;
                $this->valueTypesScheduledForDeletion->clear();
            }
            $this->valueTypesScheduledForDeletion[]= clone $valueType;
            $valueType->setAttributeSet(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttributeSet is new, it will return
     * an empty collection; or if this PacCatalogAttributeSet has previously
     * been saved, it will retrieve related ValueTypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttributeSet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects
     */
    public function getValueTypesJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getValueTypes($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_catalog_attribute_set = null;
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
            if ($this->collProductEntities) {
                foreach ($this->collProductEntities as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collValueTypes) {
                foreach ($this->collValueTypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProductEntities instanceof PropelCollection) {
            $this->collProductEntities->clearIterator();
        }
        $this->collProductEntities = null;
        if ($this->collValueTypes instanceof PropelCollection) {
            $this->collValueTypes->clearIterator();
        }
        $this->collValueTypes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetPeer::DEFAULT_STRING_FORMAT);
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
