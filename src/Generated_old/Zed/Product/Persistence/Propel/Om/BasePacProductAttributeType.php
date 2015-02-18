<?php


/**
 * Base class that represents a row from the 'pac_attribute_type' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacProductAttributeType extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the type_id field.
     * @var        int
     */
    protected $type_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the parent_type_id field.
     * @var        int
     */
    protected $parent_type_id;

    /**
     * The value for the input_representation field.
     * @var        string
     */
    protected $input_representation;

    /**
     * @var        PacProductAttributeType
     */
    protected $aPacProductAttributeTypeRelatedByParentTypeId;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects.
     */
    protected $collPacProductAttributesMetadatas;
    protected $collPacProductAttributesMetadatasPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects.
     */
    protected $collPacProductAttributeTypesRelatedByTypeId;
    protected $collPacProductAttributeTypesRelatedByTypeIdPartial;

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
    protected $pacProductAttributesMetadatasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion = null;

    /**
     * Get the [type_id] column value.
     *
     * @return int
     */
    public function getTypeId()
    {

        return $this->type_id;
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
     * Get the [parent_type_id] column value.
     *
     * @return int
     */
    public function getParentTypeId()
    {

        return $this->parent_type_id;
    }

    /**
     * Get the [input_representation] column value.
     *
     * @return string
     */
    public function getInputRepresentation()
    {

        return $this->input_representation;
    }

    /**
     * Set the value of [type_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function setTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->type_id !== $v) {
            $this->type_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID;
        }


        return $this;
    } // setTypeId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [parent_type_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function setParentTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->parent_type_id !== $v) {
            $this->parent_type_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID;
        }

        if ($this->aPacProductAttributeTypeRelatedByParentTypeId !== null && $this->aPacProductAttributeTypeRelatedByParentTypeId->getTypeId() !== $v) {
            $this->aPacProductAttributeTypeRelatedByParentTypeId = null;
        }


        return $this;
    } // setParentTypeId()

    /**
     * Set the value of [input_representation] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function setInputRepresentation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->input_representation !== $v) {
            $this->input_representation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::INPUT_REPRESENTATION;
        }


        return $this;
    } // setInputRepresentation()

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

            $this->type_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->parent_type_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->input_representation = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object", $e);
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

        if ($this->aPacProductAttributeTypeRelatedByParentTypeId !== null && $this->parent_type_id !== $this->aPacProductAttributeTypeRelatedByParentTypeId->getTypeId()) {
            $this->aPacProductAttributeTypeRelatedByParentTypeId = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacProductAttributeTypeRelatedByParentTypeId = null;
            $this->collPacProductAttributesMetadatas = null;

            $this->collPacProductAttributeTypesRelatedByTypeId = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::addInstanceToPool($this);
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
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPacProductAttributeTypeRelatedByParentTypeId !== null) {
                if ($this->aPacProductAttributeTypeRelatedByParentTypeId->isModified() || $this->aPacProductAttributeTypeRelatedByParentTypeId->isNew()) {
                    $affectedRows += $this->aPacProductAttributeTypeRelatedByParentTypeId->save($con);
                }
                $this->setPacProductAttributeTypeRelatedByParentTypeId($this->aPacProductAttributeTypeRelatedByParentTypeId);
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

            if ($this->pacProductAttributesMetadatasScheduledForDeletion !== null) {
                if (!$this->pacProductAttributesMetadatasScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacProductAttributesMetadatasScheduledForDeletion as $pacProductAttributesMetadata) {
                        // need to save related object because we set the relation to null
                        $pacProductAttributesMetadata->save($con);
                    }
                    $this->pacProductAttributesMetadatasScheduledForDeletion = null;
                }
            }

            if ($this->collPacProductAttributesMetadatas !== null) {
                foreach ($this->collPacProductAttributesMetadatas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion !== null) {
                if (!$this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion as $pacProductAttributeTypeRelatedByTypeId) {
                        // need to save related object because we set the relation to null
                        $pacProductAttributeTypeRelatedByTypeId->save($con);
                    }
                    $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion = null;
                }
            }

            if ($this->collPacProductAttributeTypesRelatedByTypeId !== null) {
                foreach ($this->collPacProductAttributeTypesRelatedByTypeId as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`type_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`parent_type_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::INPUT_REPRESENTATION)) {
            $modifiedColumns[':p' . $index++]  = '`input_representation`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_attribute_type` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`type_id`':
                        $stmt->bindValue($identifier, $this->type_id, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`parent_type_id`':
                        $stmt->bindValue($identifier, $this->parent_type_id, PDO::PARAM_INT);
                        break;
                    case '`input_representation`':
                        $stmt->bindValue($identifier, $this->input_representation, PDO::PARAM_STR);
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
        if ($pk !== null) {
            $this->setTypeId($pk);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPacProductAttributeTypeRelatedByParentTypeId !== null) {
                if (!$this->aPacProductAttributeTypeRelatedByParentTypeId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacProductAttributeTypeRelatedByParentTypeId->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacProductAttributesMetadatas !== null) {
                    foreach ($this->collPacProductAttributesMetadatas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacProductAttributeTypesRelatedByTypeId !== null) {
                    foreach ($this->collPacProductAttributeTypesRelatedByTypeId as $referrerFK) {
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
        $pos = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTypeId();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getParentTypeId();
                break;
            case 3:
                return $this->getInputRepresentation();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTypeId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getParentTypeId(),
            $keys[3] => $this->getInputRepresentation(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPacProductAttributeTypeRelatedByParentTypeId) {
                $result['PacProductAttributeTypeRelatedByParentTypeId'] = $this->aPacProductAttributeTypeRelatedByParentTypeId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacProductAttributesMetadatas) {
                $result['PacProductAttributesMetadatas'] = $this->collPacProductAttributesMetadatas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacProductAttributeTypesRelatedByTypeId) {
                $result['PacProductAttributeTypesRelatedByTypeId'] = $this->collPacProductAttributeTypesRelatedByTypeId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTypeId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setParentTypeId($value);
                break;
            case 3:
                $this->setInputRepresentation($value);
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
        $keys = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTypeId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setParentTypeId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setInputRepresentation($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $this->type_id);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NAME)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID, $this->parent_type_id);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::INPUT_REPRESENTATION)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::INPUT_REPRESENTATION, $this->input_representation);

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
        $criteria = new Criteria(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $this->type_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getTypeId();
    }

    /**
     * Generic method to set the primary key (type_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTypeId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTypeId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setParentTypeId($this->getParentTypeId());
        $copyObj->setInputRepresentation($this->getInputRepresentation());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacProductAttributesMetadatas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacProductAttributesMetadata($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacProductAttributeTypesRelatedByTypeId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacProductAttributeTypeRelatedByTypeId($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTypeId(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType Clone of current object.
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object.
     *
     * @param                  ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType $v
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacProductAttributeTypeRelatedByParentTypeId(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType $v = null)
    {
        if ($v === null) {
            $this->setParentTypeId(NULL);
        } else {
            $this->setParentTypeId($v->getTypeId());
        }

        $this->aPacProductAttributeTypeRelatedByParentTypeId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object, it will not be re-added.
        if ($v !== null) {
            $v->addPacProductAttributeTypeRelatedByTypeId($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The associated ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object.
     * @throws PropelException
     */
    public function getPacProductAttributeTypeRelatedByParentTypeId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacProductAttributeTypeRelatedByParentTypeId === null && ($this->parent_type_id !== null) && $doQuery) {
            $this->aPacProductAttributeTypeRelatedByParentTypeId = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery::create()->findPk($this->parent_type_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacProductAttributeTypeRelatedByParentTypeId->addPacProductAttributeTypesRelatedByTypeId($this);
             */
        }

        return $this->aPacProductAttributeTypeRelatedByParentTypeId;
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
        if ('PacProductAttributesMetadata' == $relationName) {
            $this->initPacProductAttributesMetadatas();
        }
        if ('PacProductAttributeTypeRelatedByTypeId' == $relationName) {
            $this->initPacProductAttributeTypesRelatedByTypeId();
        }
    }

    /**
     * Clears out the collPacProductAttributesMetadatas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     * @see        addPacProductAttributesMetadatas()
     */
    public function clearPacProductAttributesMetadatas()
    {
        $this->collPacProductAttributesMetadatas = null; // important to set this to null since that means it is uninitialized
        $this->collPacProductAttributesMetadatasPartial = null;

        return $this;
    }

    /**
     * reset is the collPacProductAttributesMetadatas collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacProductAttributesMetadatas($v = true)
    {
        $this->collPacProductAttributesMetadatasPartial = $v;
    }

    /**
     * Initializes the collPacProductAttributesMetadatas collection.
     *
     * By default this just sets the collPacProductAttributesMetadatas collection to an empty array (like clearcollPacProductAttributesMetadatas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacProductAttributesMetadatas($overrideExisting = true)
    {
        if (null !== $this->collPacProductAttributesMetadatas && !$overrideExisting) {
            return;
        }
        $this->collPacProductAttributesMetadatas = new PropelObjectCollection();
        $this->collPacProductAttributesMetadatas->setModel('ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata[] List of ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects
     * @throws PropelException
     */
    public function getPacProductAttributesMetadatas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacProductAttributesMetadatasPartial && !$this->isNew();
        if (null === $this->collPacProductAttributesMetadatas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacProductAttributesMetadatas) {
                // return empty collection
                $this->initPacProductAttributesMetadatas();
            } else {
                $collPacProductAttributesMetadatas = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery::create(null, $criteria)
                    ->filterByPacProductAttributeType($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacProductAttributesMetadatasPartial && count($collPacProductAttributesMetadatas)) {
                      $this->initPacProductAttributesMetadatas(false);

                      foreach ($collPacProductAttributesMetadatas as $obj) {
                        if (false == $this->collPacProductAttributesMetadatas->contains($obj)) {
                          $this->collPacProductAttributesMetadatas->append($obj);
                        }
                      }

                      $this->collPacProductAttributesMetadatasPartial = true;
                    }

                    $collPacProductAttributesMetadatas->getInternalIterator()->rewind();

                    return $collPacProductAttributesMetadatas;
                }

                if ($partial && $this->collPacProductAttributesMetadatas) {
                    foreach ($this->collPacProductAttributesMetadatas as $obj) {
                        if ($obj->isNew()) {
                            $collPacProductAttributesMetadatas[] = $obj;
                        }
                    }
                }

                $this->collPacProductAttributesMetadatas = $collPacProductAttributesMetadatas;
                $this->collPacProductAttributesMetadatasPartial = false;
            }
        }

        return $this->collPacProductAttributesMetadatas;
    }

    /**
     * Sets a collection of PacProductAttributesMetadata objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacProductAttributesMetadatas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function setPacProductAttributesMetadatas(PropelCollection $pacProductAttributesMetadatas, PropelPDO $con = null)
    {
        $pacProductAttributesMetadatasToDelete = $this->getPacProductAttributesMetadatas(new Criteria(), $con)->diff($pacProductAttributesMetadatas);


        $this->pacProductAttributesMetadatasScheduledForDeletion = $pacProductAttributesMetadatasToDelete;

        foreach ($pacProductAttributesMetadatasToDelete as $pacProductAttributesMetadataRemoved) {
            $pacProductAttributesMetadataRemoved->setPacProductAttributeType(null);
        }

        $this->collPacProductAttributesMetadatas = null;
        foreach ($pacProductAttributesMetadatas as $pacProductAttributesMetadata) {
            $this->addPacProductAttributesMetadata($pacProductAttributesMetadata);
        }

        $this->collPacProductAttributesMetadatas = $pacProductAttributesMetadatas;
        $this->collPacProductAttributesMetadatasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects.
     * @throws PropelException
     */
    public function countPacProductAttributesMetadatas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacProductAttributesMetadatasPartial && !$this->isNew();
        if (null === $this->collPacProductAttributesMetadatas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacProductAttributesMetadatas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacProductAttributesMetadatas());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacProductAttributeType($this)
                ->count($con);
        }

        return count($this->collPacProductAttributesMetadatas);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata $l ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function addPacProductAttributesMetadata(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata $l)
    {
        if ($this->collPacProductAttributesMetadatas === null) {
            $this->initPacProductAttributesMetadatas();
            $this->collPacProductAttributesMetadatasPartial = true;
        }

        if (!in_array($l, $this->collPacProductAttributesMetadatas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacProductAttributesMetadata($l);

            if ($this->pacProductAttributesMetadatasScheduledForDeletion and $this->pacProductAttributesMetadatasScheduledForDeletion->contains($l)) {
                $this->pacProductAttributesMetadatasScheduledForDeletion->remove($this->pacProductAttributesMetadatasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacProductAttributesMetadata $pacProductAttributesMetadata The pacProductAttributesMetadata object to add.
     */
    protected function doAddPacProductAttributesMetadata($pacProductAttributesMetadata)
    {
        $this->collPacProductAttributesMetadatas[]= $pacProductAttributesMetadata;
        $pacProductAttributesMetadata->setPacProductAttributeType($this);
    }

    /**
     * @param	PacProductAttributesMetadata $pacProductAttributesMetadata The pacProductAttributesMetadata object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function removePacProductAttributesMetadata($pacProductAttributesMetadata)
    {
        if ($this->getPacProductAttributesMetadatas()->contains($pacProductAttributesMetadata)) {
            $this->collPacProductAttributesMetadatas->remove($this->collPacProductAttributesMetadatas->search($pacProductAttributesMetadata));
            if (null === $this->pacProductAttributesMetadatasScheduledForDeletion) {
                $this->pacProductAttributesMetadatasScheduledForDeletion = clone $this->collPacProductAttributesMetadatas;
                $this->pacProductAttributesMetadatasScheduledForDeletion->clear();
            }
            $this->pacProductAttributesMetadatasScheduledForDeletion[]= $pacProductAttributesMetadata;
            $pacProductAttributesMetadata->setPacProductAttributeType(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacProductAttributeTypesRelatedByTypeId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     * @see        addPacProductAttributeTypesRelatedByTypeId()
     */
    public function clearPacProductAttributeTypesRelatedByTypeId()
    {
        $this->collPacProductAttributeTypesRelatedByTypeId = null; // important to set this to null since that means it is uninitialized
        $this->collPacProductAttributeTypesRelatedByTypeIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPacProductAttributeTypesRelatedByTypeId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacProductAttributeTypesRelatedByTypeId($v = true)
    {
        $this->collPacProductAttributeTypesRelatedByTypeIdPartial = $v;
    }

    /**
     * Initializes the collPacProductAttributeTypesRelatedByTypeId collection.
     *
     * By default this just sets the collPacProductAttributeTypesRelatedByTypeId collection to an empty array (like clearcollPacProductAttributeTypesRelatedByTypeId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacProductAttributeTypesRelatedByTypeId($overrideExisting = true)
    {
        if (null !== $this->collPacProductAttributeTypesRelatedByTypeId && !$overrideExisting) {
            return;
        }
        $this->collPacProductAttributeTypesRelatedByTypeId = new PropelObjectCollection();
        $this->collPacProductAttributeTypesRelatedByTypeId->setModel('ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType[] List of ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects
     * @throws PropelException
     */
    public function getPacProductAttributeTypesRelatedByTypeId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacProductAttributeTypesRelatedByTypeIdPartial && !$this->isNew();
        if (null === $this->collPacProductAttributeTypesRelatedByTypeId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacProductAttributeTypesRelatedByTypeId) {
                // return empty collection
                $this->initPacProductAttributeTypesRelatedByTypeId();
            } else {
                $collPacProductAttributeTypesRelatedByTypeId = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery::create(null, $criteria)
                    ->filterByPacProductAttributeTypeRelatedByParentTypeId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacProductAttributeTypesRelatedByTypeIdPartial && count($collPacProductAttributeTypesRelatedByTypeId)) {
                      $this->initPacProductAttributeTypesRelatedByTypeId(false);

                      foreach ($collPacProductAttributeTypesRelatedByTypeId as $obj) {
                        if (false == $this->collPacProductAttributeTypesRelatedByTypeId->contains($obj)) {
                          $this->collPacProductAttributeTypesRelatedByTypeId->append($obj);
                        }
                      }

                      $this->collPacProductAttributeTypesRelatedByTypeIdPartial = true;
                    }

                    $collPacProductAttributeTypesRelatedByTypeId->getInternalIterator()->rewind();

                    return $collPacProductAttributeTypesRelatedByTypeId;
                }

                if ($partial && $this->collPacProductAttributeTypesRelatedByTypeId) {
                    foreach ($this->collPacProductAttributeTypesRelatedByTypeId as $obj) {
                        if ($obj->isNew()) {
                            $collPacProductAttributeTypesRelatedByTypeId[] = $obj;
                        }
                    }
                }

                $this->collPacProductAttributeTypesRelatedByTypeId = $collPacProductAttributeTypesRelatedByTypeId;
                $this->collPacProductAttributeTypesRelatedByTypeIdPartial = false;
            }
        }

        return $this->collPacProductAttributeTypesRelatedByTypeId;
    }

    /**
     * Sets a collection of PacProductAttributeTypeRelatedByTypeId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacProductAttributeTypesRelatedByTypeId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function setPacProductAttributeTypesRelatedByTypeId(PropelCollection $pacProductAttributeTypesRelatedByTypeId, PropelPDO $con = null)
    {
        $pacProductAttributeTypesRelatedByTypeIdToDelete = $this->getPacProductAttributeTypesRelatedByTypeId(new Criteria(), $con)->diff($pacProductAttributeTypesRelatedByTypeId);


        $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion = $pacProductAttributeTypesRelatedByTypeIdToDelete;

        foreach ($pacProductAttributeTypesRelatedByTypeIdToDelete as $pacProductAttributeTypeRelatedByTypeIdRemoved) {
            $pacProductAttributeTypeRelatedByTypeIdRemoved->setPacProductAttributeTypeRelatedByParentTypeId(null);
        }

        $this->collPacProductAttributeTypesRelatedByTypeId = null;
        foreach ($pacProductAttributeTypesRelatedByTypeId as $pacProductAttributeTypeRelatedByTypeId) {
            $this->addPacProductAttributeTypeRelatedByTypeId($pacProductAttributeTypeRelatedByTypeId);
        }

        $this->collPacProductAttributeTypesRelatedByTypeId = $pacProductAttributeTypesRelatedByTypeId;
        $this->collPacProductAttributeTypesRelatedByTypeIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects.
     * @throws PropelException
     */
    public function countPacProductAttributeTypesRelatedByTypeId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacProductAttributeTypesRelatedByTypeIdPartial && !$this->isNew();
        if (null === $this->collPacProductAttributeTypesRelatedByTypeId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacProductAttributeTypesRelatedByTypeId) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacProductAttributeTypesRelatedByTypeId());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacProductAttributeTypeRelatedByParentTypeId($this)
                ->count($con);
        }

        return count($this->collPacProductAttributeTypesRelatedByTypeId);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType $l ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function addPacProductAttributeTypeRelatedByTypeId(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType $l)
    {
        if ($this->collPacProductAttributeTypesRelatedByTypeId === null) {
            $this->initPacProductAttributeTypesRelatedByTypeId();
            $this->collPacProductAttributeTypesRelatedByTypeIdPartial = true;
        }

        if (!in_array($l, $this->collPacProductAttributeTypesRelatedByTypeId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacProductAttributeTypeRelatedByTypeId($l);

            if ($this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion and $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion->contains($l)) {
                $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion->remove($this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacProductAttributeTypeRelatedByTypeId $pacProductAttributeTypeRelatedByTypeId The pacProductAttributeTypeRelatedByTypeId object to add.
     */
    protected function doAddPacProductAttributeTypeRelatedByTypeId($pacProductAttributeTypeRelatedByTypeId)
    {
        $this->collPacProductAttributeTypesRelatedByTypeId[]= $pacProductAttributeTypeRelatedByTypeId;
        $pacProductAttributeTypeRelatedByTypeId->setPacProductAttributeTypeRelatedByParentTypeId($this);
    }

    /**
     * @param	PacProductAttributeTypeRelatedByTypeId $pacProductAttributeTypeRelatedByTypeId The pacProductAttributeTypeRelatedByTypeId object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType The current object (for fluent API support)
     */
    public function removePacProductAttributeTypeRelatedByTypeId($pacProductAttributeTypeRelatedByTypeId)
    {
        if ($this->getPacProductAttributeTypesRelatedByTypeId()->contains($pacProductAttributeTypeRelatedByTypeId)) {
            $this->collPacProductAttributeTypesRelatedByTypeId->remove($this->collPacProductAttributeTypesRelatedByTypeId->search($pacProductAttributeTypeRelatedByTypeId));
            if (null === $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion) {
                $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion = clone $this->collPacProductAttributeTypesRelatedByTypeId;
                $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion->clear();
            }
            $this->pacProductAttributeTypesRelatedByTypeIdScheduledForDeletion[]= $pacProductAttributeTypeRelatedByTypeId;
            $pacProductAttributeTypeRelatedByTypeId->setPacProductAttributeTypeRelatedByParentTypeId(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->type_id = null;
        $this->name = null;
        $this->parent_type_id = null;
        $this->input_representation = null;
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
            if ($this->collPacProductAttributesMetadatas) {
                foreach ($this->collPacProductAttributesMetadatas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacProductAttributeTypesRelatedByTypeId) {
                foreach ($this->collPacProductAttributeTypesRelatedByTypeId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPacProductAttributeTypeRelatedByParentTypeId instanceof Persistent) {
              $this->aPacProductAttributeTypeRelatedByParentTypeId->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacProductAttributesMetadatas instanceof PropelCollection) {
            $this->collPacProductAttributesMetadatas->clearIterator();
        }
        $this->collPacProductAttributesMetadatas = null;
        if ($this->collPacProductAttributeTypesRelatedByTypeId instanceof PropelCollection) {
            $this->collPacProductAttributeTypesRelatedByTypeId->clearIterator();
        }
        $this->collPacProductAttributeTypesRelatedByTypeId = null;
        $this->aPacProductAttributeTypeRelatedByParentTypeId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::DEFAULT_STRING_FORMAT);
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
