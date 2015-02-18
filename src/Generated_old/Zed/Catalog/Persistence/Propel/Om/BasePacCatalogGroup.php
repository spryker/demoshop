<?php


/**
 * Base class that represents a row from the 'pac_catalog_group' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogGroup extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_group field.
     * @var        int
     */
    protected $id_catalog_group;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup objects.
     */
    protected $collAttributeGroups;
    protected $collAttributeGroupsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup objects.
     */
    protected $collAttributeSetGroups;
    protected $collAttributeSetGroupsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects.
     */
    protected $collAttributes;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects.
     */
    protected $collValueTypes;

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
    protected $attributesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $valueTypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $attributeGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $attributeSetGroupsScheduledForDeletion = null;

    /**
     * Get the [id_catalog_group] column value.
     *
     * @return int
     */
    public function getIdCatalogGroup()
    {

        return $this->id_catalog_group;
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
     * Set the value of [id_catalog_group] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function setIdCatalogGroup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_group !== $v) {
            $this->id_catalog_group = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::ID_CATALOG_GROUP;
        }


        return $this;
    } // setIdCatalogGroup()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::NAME;
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

            $this->id_catalog_group = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 2; // 2 = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAttributeGroups = null;

            $this->collAttributeSetGroups = null;

            $this->collAttributes = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::addInstanceToPool($this);
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

            if ($this->attributesScheduledForDeletion !== null) {
                if (!$this->attributesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->attributesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroupQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->attributesScheduledForDeletion = null;
                }

                foreach ($this->getAttributes() as $attribute) {
                    if ($attribute->isModified()) {
                        $attribute->save($con);
                    }
                }
            } elseif ($this->collAttributes) {
                foreach ($this->collAttributes as $attribute) {
                    if ($attribute->isModified()) {
                        $attribute->save($con);
                    }
                }
            }

            if ($this->valueTypesScheduledForDeletion !== null) {
                if (!$this->valueTypesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->valueTypesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroupQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->valueTypesScheduledForDeletion = null;
                }

                foreach ($this->getValueTypes() as $valueType) {
                    if ($valueType->isModified()) {
                        $valueType->save($con);
                    }
                }
            } elseif ($this->collValueTypes) {
                foreach ($this->collValueTypes as $valueType) {
                    if ($valueType->isModified()) {
                        $valueType->save($con);
                    }
                }
            }

            if ($this->attributeGroupsScheduledForDeletion !== null) {
                if (!$this->attributeGroupsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroupQuery::create()
                        ->filterByPrimaryKeys($this->attributeGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->attributeGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collAttributeGroups !== null) {
                foreach ($this->collAttributeGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->attributeSetGroupsScheduledForDeletion !== null) {
                if (!$this->attributeSetGroupsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroupQuery::create()
                        ->filterByPrimaryKeys($this->attributeSetGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->attributeSetGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collAttributeSetGroups !== null) {
                foreach ($this->collAttributeSetGroups as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::ID_CATALOG_GROUP;
        if (null !== $this->id_catalog_group) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::ID_CATALOG_GROUP . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::ID_CATALOG_GROUP)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_group`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_group` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_catalog_group`':
                        $stmt->bindValue($identifier, $this->id_catalog_group, PDO::PARAM_INT);
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
        $this->setIdCatalogGroup($pk);

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


            if (($retval = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAttributeGroups !== null) {
                    foreach ($this->collAttributeGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAttributeSetGroups !== null) {
                    foreach ($this->collAttributeSetGroups as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCatalogGroup();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogGroup(),
            $keys[1] => $this->getName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collAttributeGroups) {
                $result['AttributeGroups'] = $this->collAttributeGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAttributeSetGroups) {
                $result['AttributeSetGroups'] = $this->collAttributeSetGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCatalogGroup($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogGroup($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::ID_CATALOG_GROUP)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::ID_CATALOG_GROUP, $this->id_catalog_group);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::NAME)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::NAME, $this->name);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::ID_CATALOG_GROUP, $this->id_catalog_group);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCatalogGroup();
    }

    /**
     * Generic method to set the primary key (id_catalog_group column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCatalogGroup($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCatalogGroup();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup (or compatible) type.
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

            foreach ($this->getAttributeGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAttributeGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAttributeSetGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAttributeSetGroup($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCatalogGroup(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer();
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
        if ('AttributeGroup' == $relationName) {
            $this->initAttributeGroups();
        }
        if ('AttributeSetGroup' == $relationName) {
            $this->initAttributeSetGroups();
        }
    }

    /**
     * Clears out the collAttributeGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     * @see        addAttributeGroups()
     */
    public function clearAttributeGroups()
    {
        $this->collAttributeGroups = null; // important to set this to null since that means it is uninitialized
        $this->collAttributeGroupsPartial = null;

        return $this;
    }

    /**
     * reset is the collAttributeGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialAttributeGroups($v = true)
    {
        $this->collAttributeGroupsPartial = $v;
    }

    /**
     * Initializes the collAttributeGroups collection.
     *
     * By default this just sets the collAttributeGroups collection to an empty array (like clearcollAttributeGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAttributeGroups($overrideExisting = true)
    {
        if (null !== $this->collAttributeGroups && !$overrideExisting) {
            return;
        }
        $this->collAttributeGroups = new PropelObjectCollection();
        $this->collAttributeGroups->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup objects
     * @throws PropelException
     */
    public function getAttributeGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAttributeGroupsPartial && !$this->isNew();
        if (null === $this->collAttributeGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAttributeGroups) {
                // return empty collection
                $this->initAttributeGroups();
            } else {
                $collAttributeGroups = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroupQuery::create(null, $criteria)
                    ->filterByGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAttributeGroupsPartial && count($collAttributeGroups)) {
                      $this->initAttributeGroups(false);

                      foreach ($collAttributeGroups as $obj) {
                        if (false == $this->collAttributeGroups->contains($obj)) {
                          $this->collAttributeGroups->append($obj);
                        }
                      }

                      $this->collAttributeGroupsPartial = true;
                    }

                    $collAttributeGroups->getInternalIterator()->rewind();

                    return $collAttributeGroups;
                }

                if ($partial && $this->collAttributeGroups) {
                    foreach ($this->collAttributeGroups as $obj) {
                        if ($obj->isNew()) {
                            $collAttributeGroups[] = $obj;
                        }
                    }
                }

                $this->collAttributeGroups = $collAttributeGroups;
                $this->collAttributeGroupsPartial = false;
            }
        }

        return $this->collAttributeGroups;
    }

    /**
     * Sets a collection of AttributeGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $attributeGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function setAttributeGroups(PropelCollection $attributeGroups, PropelPDO $con = null)
    {
        $attributeGroupsToDelete = $this->getAttributeGroups(new Criteria(), $con)->diff($attributeGroups);


        $this->attributeGroupsScheduledForDeletion = $attributeGroupsToDelete;

        foreach ($attributeGroupsToDelete as $attributeGroupRemoved) {
            $attributeGroupRemoved->setGroup(null);
        }

        $this->collAttributeGroups = null;
        foreach ($attributeGroups as $attributeGroup) {
            $this->addAttributeGroup($attributeGroup);
        }

        $this->collAttributeGroups = $attributeGroups;
        $this->collAttributeGroupsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup objects.
     * @throws PropelException
     */
    public function countAttributeGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAttributeGroupsPartial && !$this->isNew();
        if (null === $this->collAttributeGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributeGroups) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAttributeGroups());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGroup($this)
                ->count($con);
        }

        return count($this->collAttributeGroups);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function addAttributeGroup(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup $l)
    {
        if ($this->collAttributeGroups === null) {
            $this->initAttributeGroups();
            $this->collAttributeGroupsPartial = true;
        }

        if (!in_array($l, $this->collAttributeGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAttributeGroup($l);

            if ($this->attributeGroupsScheduledForDeletion and $this->attributeGroupsScheduledForDeletion->contains($l)) {
                $this->attributeGroupsScheduledForDeletion->remove($this->attributeGroupsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	AttributeGroup $attributeGroup The attributeGroup object to add.
     */
    protected function doAddAttributeGroup($attributeGroup)
    {
        $this->collAttributeGroups[]= $attributeGroup;
        $attributeGroup->setGroup($this);
    }

    /**
     * @param	AttributeGroup $attributeGroup The attributeGroup object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function removeAttributeGroup($attributeGroup)
    {
        if ($this->getAttributeGroups()->contains($attributeGroup)) {
            $this->collAttributeGroups->remove($this->collAttributeGroups->search($attributeGroup));
            if (null === $this->attributeGroupsScheduledForDeletion) {
                $this->attributeGroupsScheduledForDeletion = clone $this->collAttributeGroups;
                $this->attributeGroupsScheduledForDeletion->clear();
            }
            $this->attributeGroupsScheduledForDeletion[]= clone $attributeGroup;
            $attributeGroup->setGroup(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogGroup is new, it will return
     * an empty collection; or if this PacCatalogGroup has previously
     * been saved, it will retrieve related AttributeGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup objects
     */
    public function getAttributeGroupsJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroupQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getAttributeGroups($query, $con);
    }

    /**
     * Clears out the collAttributeSetGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     * @see        addAttributeSetGroups()
     */
    public function clearAttributeSetGroups()
    {
        $this->collAttributeSetGroups = null; // important to set this to null since that means it is uninitialized
        $this->collAttributeSetGroupsPartial = null;

        return $this;
    }

    /**
     * reset is the collAttributeSetGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialAttributeSetGroups($v = true)
    {
        $this->collAttributeSetGroupsPartial = $v;
    }

    /**
     * Initializes the collAttributeSetGroups collection.
     *
     * By default this just sets the collAttributeSetGroups collection to an empty array (like clearcollAttributeSetGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAttributeSetGroups($overrideExisting = true)
    {
        if (null !== $this->collAttributeSetGroups && !$overrideExisting) {
            return;
        }
        $this->collAttributeSetGroups = new PropelObjectCollection();
        $this->collAttributeSetGroups->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup objects
     * @throws PropelException
     */
    public function getAttributeSetGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAttributeSetGroupsPartial && !$this->isNew();
        if (null === $this->collAttributeSetGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAttributeSetGroups) {
                // return empty collection
                $this->initAttributeSetGroups();
            } else {
                $collAttributeSetGroups = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroupQuery::create(null, $criteria)
                    ->filterByGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAttributeSetGroupsPartial && count($collAttributeSetGroups)) {
                      $this->initAttributeSetGroups(false);

                      foreach ($collAttributeSetGroups as $obj) {
                        if (false == $this->collAttributeSetGroups->contains($obj)) {
                          $this->collAttributeSetGroups->append($obj);
                        }
                      }

                      $this->collAttributeSetGroupsPartial = true;
                    }

                    $collAttributeSetGroups->getInternalIterator()->rewind();

                    return $collAttributeSetGroups;
                }

                if ($partial && $this->collAttributeSetGroups) {
                    foreach ($this->collAttributeSetGroups as $obj) {
                        if ($obj->isNew()) {
                            $collAttributeSetGroups[] = $obj;
                        }
                    }
                }

                $this->collAttributeSetGroups = $collAttributeSetGroups;
                $this->collAttributeSetGroupsPartial = false;
            }
        }

        return $this->collAttributeSetGroups;
    }

    /**
     * Sets a collection of AttributeSetGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $attributeSetGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function setAttributeSetGroups(PropelCollection $attributeSetGroups, PropelPDO $con = null)
    {
        $attributeSetGroupsToDelete = $this->getAttributeSetGroups(new Criteria(), $con)->diff($attributeSetGroups);


        $this->attributeSetGroupsScheduledForDeletion = $attributeSetGroupsToDelete;

        foreach ($attributeSetGroupsToDelete as $attributeSetGroupRemoved) {
            $attributeSetGroupRemoved->setGroup(null);
        }

        $this->collAttributeSetGroups = null;
        foreach ($attributeSetGroups as $attributeSetGroup) {
            $this->addAttributeSetGroup($attributeSetGroup);
        }

        $this->collAttributeSetGroups = $attributeSetGroups;
        $this->collAttributeSetGroupsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup objects.
     * @throws PropelException
     */
    public function countAttributeSetGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAttributeSetGroupsPartial && !$this->isNew();
        if (null === $this->collAttributeSetGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributeSetGroups) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAttributeSetGroups());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGroup($this)
                ->count($con);
        }

        return count($this->collAttributeSetGroups);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function addAttributeSetGroup(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup $l)
    {
        if ($this->collAttributeSetGroups === null) {
            $this->initAttributeSetGroups();
            $this->collAttributeSetGroupsPartial = true;
        }

        if (!in_array($l, $this->collAttributeSetGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAttributeSetGroup($l);

            if ($this->attributeSetGroupsScheduledForDeletion and $this->attributeSetGroupsScheduledForDeletion->contains($l)) {
                $this->attributeSetGroupsScheduledForDeletion->remove($this->attributeSetGroupsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	AttributeSetGroup $attributeSetGroup The attributeSetGroup object to add.
     */
    protected function doAddAttributeSetGroup($attributeSetGroup)
    {
        $this->collAttributeSetGroups[]= $attributeSetGroup;
        $attributeSetGroup->setGroup($this);
    }

    /**
     * @param	AttributeSetGroup $attributeSetGroup The attributeSetGroup object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function removeAttributeSetGroup($attributeSetGroup)
    {
        if ($this->getAttributeSetGroups()->contains($attributeSetGroup)) {
            $this->collAttributeSetGroups->remove($this->collAttributeSetGroups->search($attributeSetGroup));
            if (null === $this->attributeSetGroupsScheduledForDeletion) {
                $this->attributeSetGroupsScheduledForDeletion = clone $this->collAttributeSetGroups;
                $this->attributeSetGroupsScheduledForDeletion->clear();
            }
            $this->attributeSetGroupsScheduledForDeletion[]= clone $attributeSetGroup;
            $attributeSetGroup->setGroup(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogGroup is new, it will return
     * an empty collection; or if this PacCatalogGroup has previously
     * been saved, it will retrieve related AttributeSetGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup objects
     */
    public function getAttributeSetGroupsJoinValueType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroupQuery::create(null, $criteria);
        $query->joinWith('ValueType', $join_behavior);

        return $this->getAttributeSetGroups($query, $con);
    }

    /**
     * Clears out the collAttributes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     * @see        addAttributes()
     */
    public function clearAttributes()
    {
        $this->collAttributes = null; // important to set this to null since that means it is uninitialized
        $this->collAttributesPartial = null;

        return $this;
    }

    /**
     * Initializes the collAttributes collection.
     *
     * By default this just sets the collAttributes collection to an empty collection (like clearAttributes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initAttributes()
    {
        $this->collAttributes = new PropelObjectCollection();
        $this->collAttributes->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_group cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects
     */
    public function getAttributes($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAttributes || null !== $criteria) {
            if ($this->isNew() && null === $this->collAttributes) {
                // return empty collection
                $this->initAttributes();
            } else {
                $collAttributes = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery::create(null, $criteria)
                    ->filterByGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAttributes;
                }
                $this->collAttributes = $collAttributes;
            }
        }

        return $this->collAttributes;
    }

    /**
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_group cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $attributes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function setAttributes(PropelCollection $attributes, PropelPDO $con = null)
    {
        $this->clearAttributes();
        $currentAttributes = $this->getAttributes(null, $con);

        $this->attributesScheduledForDeletion = $currentAttributes->diff($attributes);

        foreach ($attributes as $attribute) {
            if (!$currentAttributes->contains($attribute)) {
                $this->doAddAttribute($attribute);
            }
        }

        $this->collAttributes = $attributes;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_group cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute objects
     */
    public function countAttributes($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAttributes || null !== $criteria) {
            if ($this->isNew() && null === $this->collAttributes) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collAttributes);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object to this object
     * through the pac_catalog_attribute_group cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $pacCatalogAttribute The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function addAttribute(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $pacCatalogAttribute)
    {
        if ($this->collAttributes === null) {
            $this->initAttributes();
        }

        if (!$this->collAttributes->contains($pacCatalogAttribute)) { // only add it if the **same** object is not already associated
            $this->doAddAttribute($pacCatalogAttribute);
            $this->collAttributes[] = $pacCatalogAttribute;

            if ($this->attributesScheduledForDeletion and $this->attributesScheduledForDeletion->contains($pacCatalogAttribute)) {
                $this->attributesScheduledForDeletion->remove($this->attributesScheduledForDeletion->search($pacCatalogAttribute));
            }
        }

        return $this;
    }

    /**
     * @param	Attribute $attribute The attribute object to add.
     */
    protected function doAddAttribute(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $attribute)
    {
        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$attribute->getGroups()->contains($this)) {
            $pacCatalogAttributeGroup = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup();
            $pacCatalogAttributeGroup->setAttribute($attribute);
            $this->addAttributeGroup($pacCatalogAttributeGroup);

            $foreignCollection = $attribute->getGroups();
            $foreignCollection[] = $this;
        }
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object to this object
     * through the pac_catalog_attribute_group cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $pacCatalogAttribute The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function removeAttribute(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $pacCatalogAttribute)
    {
        if ($this->getAttributes()->contains($pacCatalogAttribute)) {
            $this->collAttributes->remove($this->collAttributes->search($pacCatalogAttribute));
            if (null === $this->attributesScheduledForDeletion) {
                $this->attributesScheduledForDeletion = clone $this->collAttributes;
                $this->attributesScheduledForDeletion->clear();
            }
            $this->attributesScheduledForDeletion[]= $pacCatalogAttribute;
        }

        return $this;
    }

    /**
     * Clears out the collValueTypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     * @see        addValueTypes()
     */
    public function clearValueTypes()
    {
        $this->collValueTypes = null; // important to set this to null since that means it is uninitialized
        $this->collValueTypesPartial = null;

        return $this;
    }

    /**
     * Initializes the collValueTypes collection.
     *
     * By default this just sets the collValueTypes collection to an empty collection (like clearValueTypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initValueTypes()
    {
        $this->collValueTypes = new PropelObjectCollection();
        $this->collValueTypes->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_set_group cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects
     */
    public function getValueTypes($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collValueTypes || null !== $criteria) {
            if ($this->isNew() && null === $this->collValueTypes) {
                // return empty collection
                $this->initValueTypes();
            } else {
                $collValueTypes = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery::create(null, $criteria)
                    ->filterByGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collValueTypes;
                }
                $this->collValueTypes = $collValueTypes;
            }
        }

        return $this->collValueTypes;
    }

    /**
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_set_group cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $valueTypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function setValueTypes(PropelCollection $valueTypes, PropelPDO $con = null)
    {
        $this->clearValueTypes();
        $currentValueTypes = $this->getValueTypes(null, $con);

        $this->valueTypesScheduledForDeletion = $currentValueTypes->diff($valueTypes);

        foreach ($valueTypes as $valueType) {
            if (!$currentValueTypes->contains($valueType)) {
                $this->doAddValueType($valueType);
            }
        }

        $this->collValueTypes = $valueTypes;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_set_group cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType objects
     */
    public function countValueTypes($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collValueTypes || null !== $criteria) {
            if ($this->isNew() && null === $this->collValueTypes) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByGroup($this)
                    ->count($con);
            }
        } else {
            return count($this->collValueTypes);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType object to this object
     * through the pac_catalog_attribute_set_group cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $pacCatalogValueType The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function addValueType(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $pacCatalogValueType)
    {
        if ($this->collValueTypes === null) {
            $this->initValueTypes();
        }

        if (!$this->collValueTypes->contains($pacCatalogValueType)) { // only add it if the **same** object is not already associated
            $this->doAddValueType($pacCatalogValueType);
            $this->collValueTypes[] = $pacCatalogValueType;

            if ($this->valueTypesScheduledForDeletion and $this->valueTypesScheduledForDeletion->contains($pacCatalogValueType)) {
                $this->valueTypesScheduledForDeletion->remove($this->valueTypesScheduledForDeletion->search($pacCatalogValueType));
            }
        }

        return $this;
    }

    /**
     * @param	ValueType $valueType The valueType object to add.
     */
    protected function doAddValueType(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $valueType)
    {
        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$valueType->getGroups()->contains($this)) {
            $pacCatalogAttributeSetGroup = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup();
            $pacCatalogAttributeSetGroup->setValueType($valueType);
            $this->addAttributeSetGroup($pacCatalogAttributeSetGroup);

            $foreignCollection = $valueType->getGroups();
            $foreignCollection[] = $this;
        }
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType object to this object
     * through the pac_catalog_attribute_set_group cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $pacCatalogValueType The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup The current object (for fluent API support)
     */
    public function removeValueType(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $pacCatalogValueType)
    {
        if ($this->getValueTypes()->contains($pacCatalogValueType)) {
            $this->collValueTypes->remove($this->collValueTypes->search($pacCatalogValueType));
            if (null === $this->valueTypesScheduledForDeletion) {
                $this->valueTypesScheduledForDeletion = clone $this->collValueTypes;
                $this->valueTypesScheduledForDeletion->clear();
            }
            $this->valueTypesScheduledForDeletion[]= $pacCatalogValueType;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_catalog_group = null;
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
            if ($this->collAttributeGroups) {
                foreach ($this->collAttributeGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAttributeSetGroups) {
                foreach ($this->collAttributeSetGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAttributes) {
                foreach ($this->collAttributes as $o) {
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

        if ($this->collAttributeGroups instanceof PropelCollection) {
            $this->collAttributeGroups->clearIterator();
        }
        $this->collAttributeGroups = null;
        if ($this->collAttributeSetGroups instanceof PropelCollection) {
            $this->collAttributeSetGroups->clearIterator();
        }
        $this->collAttributeSetGroups = null;
        if ($this->collAttributes instanceof PropelCollection) {
            $this->collAttributes->clearIterator();
        }
        $this->collAttributes = null;
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
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroupPeer::DEFAULT_STRING_FORMAT);
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
