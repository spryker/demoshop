<?php


/**
 * Base class that represents a row from the 'pac_catalog_value_type' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogValueType extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_value_type field.
     * @var        int
     */
    protected $id_catalog_value_type;

    /**
     * The value for the variety field.
     * @var        string
     */
    protected $variety;

    /**
     * The value for the fk_catalog_attribute field.
     * @var        int
     */
    protected $fk_catalog_attribute;

    /**
     * The value for the fk_catalog_attribute_set field.
     * @var        int
     */
    protected $fk_catalog_attribute_set;

    /**
     * @var        PacCatalogAttribute
     */
    protected $aAttribute;

    /**
     * @var        PacCatalogAttributeSet
     */
    protected $aAttributeSet;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects.
     */
    protected $collAttributeSetGroups;
    protected $collAttributeSetGroupsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption objects.
     */
    protected $collOptions;
    protected $collOptionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogGroup[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects.
     */
    protected $collGroups;

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
    protected $groupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $attributeSetGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionsScheduledForDeletion = null;

    /**
     * Get the [id_catalog_value_type] column value.
     *
     * @return int
     */
    public function getIdCatalogValueType()
    {
        return $this->id_catalog_value_type;
    }

    /**
     * Get the [variety] column value.
     *
     * @return string
     */
    public function getVariety()
    {
        return $this->variety;
    }

    /**
     * Get the [fk_catalog_attribute] column value.
     *
     * @return int
     */
    public function getFkCatalogAttribute()
    {
        return $this->fk_catalog_attribute;
    }

    /**
     * Get the [fk_catalog_attribute_set] column value.
     *
     * @return int
     */
    public function getFkCatalogAttributeSet()
    {
        return $this->fk_catalog_attribute_set;
    }

    /**
     * Set the value of [id_catalog_value_type] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function setIdCatalogValueType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_value_type !== $v) {
            $this->id_catalog_value_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE;
        }


        return $this;
    } // setIdCatalogValueType()

    /**
     * Set the value of [variety] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function setVariety($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->variety !== $v) {
            $this->variety = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY;
        }


        return $this;
    } // setVariety()

    /**
     * Set the value of [fk_catalog_attribute] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function setFkCatalogAttribute($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_catalog_attribute !== $v) {
            $this->fk_catalog_attribute = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE;
        }

        if ($this->aAttribute !== null && $this->aAttribute->getIdCatalogAttribute() !== $v) {
            $this->aAttribute = null;
        }


        return $this;
    } // setFkCatalogAttribute()

    /**
     * Set the value of [fk_catalog_attribute_set] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function setFkCatalogAttributeSet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_catalog_attribute_set !== $v) {
            $this->fk_catalog_attribute_set = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET;
        }

        if ($this->aAttributeSet !== null && $this->aAttributeSet->getIdCatalogAttributeSet() !== $v) {
            $this->aAttributeSet = null;
        }


        return $this;
    } // setFkCatalogAttributeSet()

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

            $this->id_catalog_value_type = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->variety = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->fk_catalog_attribute = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_catalog_attribute_set = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object", $e);
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

        if ($this->aAttribute !== null && $this->fk_catalog_attribute !== $this->aAttribute->getIdCatalogAttribute()) {
            $this->aAttribute = null;
        }
        if ($this->aAttributeSet !== null && $this->fk_catalog_attribute_set !== $this->aAttributeSet->getIdCatalogAttributeSet()) {
            $this->aAttributeSet = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAttribute = null;
            $this->aAttributeSet = null;
            $this->collAttributeSetGroups = null;

            $this->collOptions = null;

            $this->collGroups = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::addInstanceToPool($this);
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

            if ($this->aAttribute !== null) {
                if ($this->aAttribute->isModified() || $this->aAttribute->isNew()) {
                    $affectedRows += $this->aAttribute->save($con);
                }
                $this->setAttribute($this->aAttribute);
            }

            if ($this->aAttributeSet !== null) {
                if ($this->aAttributeSet->isModified() || $this->aAttributeSet->isNew()) {
                    $affectedRows += $this->aAttributeSet->save($con);
                }
                $this->setAttributeSet($this->aAttributeSet);
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

            if ($this->groupsScheduledForDeletion !== null) {
                if (!$this->groupsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->groupsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    AttributeSetGroupQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->groupsScheduledForDeletion = null;
                }

                foreach ($this->getGroups() as $group) {
                    if ($group->isModified()) {
                        $group->save($con);
                    }
                }
            } elseif ($this->collGroups) {
                foreach ($this->collGroups as $group) {
                    if ($group->isModified()) {
                        $group->save($con);
                    }
                }
            }

            if ($this->attributeSetGroupsScheduledForDeletion !== null) {
                if (!$this->attributeSetGroupsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery::create()
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

            if ($this->optionsScheduledForDeletion !== null) {
                if (!$this->optionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionQuery::create()
                        ->filterByPrimaryKeys($this->optionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->optionsScheduledForDeletion = null;
                }
            }

            if ($this->collOptions !== null) {
                foreach ($this->collOptions as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE;
        if (null !== $this->id_catalog_value_type) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_value_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY)) {
            $modifiedColumns[':p' . $index++]  = '`variety`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_catalog_attribute`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET)) {
            $modifiedColumns[':p' . $index++]  = '`fk_catalog_attribute_set`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_value_type` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_catalog_value_type`':
                        $stmt->bindValue($identifier, $this->id_catalog_value_type, PDO::PARAM_INT);
                        break;
                    case '`variety`':
                        $stmt->bindValue($identifier, $this->variety, PDO::PARAM_STR);
                        break;
                    case '`fk_catalog_attribute`':
                        $stmt->bindValue($identifier, $this->fk_catalog_attribute, PDO::PARAM_INT);
                        break;
                    case '`fk_catalog_attribute_set`':
                        $stmt->bindValue($identifier, $this->fk_catalog_attribute_set, PDO::PARAM_INT);
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
        $this->setIdCatalogValueType($pk);

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

            if ($this->aAttribute !== null) {
                if (!$this->aAttribute->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAttribute->getValidationFailures());
                }
            }

            if ($this->aAttributeSet !== null) {
                if (!$this->aAttributeSet->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAttributeSet->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAttributeSetGroups !== null) {
                    foreach ($this->collAttributeSetGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOptions !== null) {
                    foreach ($this->collOptions as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCatalogValueType();
                break;
            case 1:
                return $this->getVariety();
                break;
            case 2:
                return $this->getFkCatalogAttribute();
                break;
            case 3:
                return $this->getFkCatalogAttributeSet();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogValueType'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogValueType'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogValueType(),
            $keys[1] => $this->getVariety(),
            $keys[2] => $this->getFkCatalogAttribute(),
            $keys[3] => $this->getFkCatalogAttributeSet(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAttribute) {
                $result['Attribute'] = $this->aAttribute->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAttributeSet) {
                $result['AttributeSet'] = $this->aAttributeSet->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAttributeSetGroups) {
                $result['AttributeSetGroups'] = $this->collAttributeSetGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOptions) {
                $result['Options'] = $this->collOptions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCatalogValueType($value);
                break;
            case 1:
                $this->setVariety($value);
                break;
            case 2:
                $this->setFkCatalogAttribute($value);
                break;
            case 3:
                $this->setFkCatalogAttributeSet($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogValueType($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setVariety($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkCatalogAttribute($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkCatalogAttributeSet($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $this->id_catalog_value_type);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY, $this->variety);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE, $this->fk_catalog_attribute);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::FK_CATALOG_ATTRIBUTE_SET, $this->fk_catalog_attribute_set);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::ID_CATALOG_VALUE_TYPE, $this->id_catalog_value_type);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCatalogValueType();
    }

    /**
     * Generic method to set the primary key (id_catalog_value_type column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCatalogValueType($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCatalogValueType();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_PacCatalogValueType (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setVariety($this->getVariety());
        $copyObj->setFkCatalogAttribute($this->getFkCatalogAttribute());
        $copyObj->setFkCatalogAttributeSet($this->getFkCatalogAttributeSet());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAttributeSetGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAttributeSetGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOptions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOption($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCatalogValueType(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute object.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute $v
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAttribute(ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute $v = null)
    {
        if ($v === null) {
            $this->setFkCatalogAttribute(NULL);
        } else {
            $this->setFkCatalogAttribute($v->getIdCatalogAttribute());
        }

        $this->aAttribute = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute object, it will not be re-added.
        if ($v !== null) {
            $v->addValueType($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The associated ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute object.
     * @throws PropelException
     */
    public function getAttribute(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAttribute === null && ($this->fk_catalog_attribute !== null) && $doQuery) {
            $this->aAttribute = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeQuery::create()->findPk($this->fk_catalog_attribute, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAttribute->addValueTypes($this);
             */
        }

        return $this->aAttribute;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $v
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAttributeSet(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $v = null)
    {
        if ($v === null) {
            $this->setFkCatalogAttributeSet(NULL);
        } else {
            $this->setFkCatalogAttributeSet($v->getIdCatalogAttributeSet());
        }

        $this->aAttributeSet = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object, it will not be re-added.
        if ($v !== null) {
            $v->addValueType($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet The associated ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object.
     * @throws PropelException
     */
    public function getAttributeSet(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAttributeSet === null && ($this->fk_catalog_attribute_set !== null) && $doQuery) {
            $this->aAttributeSet = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery::create()->findPk($this->fk_catalog_attribute_set, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAttributeSet->addValueTypes($this);
             */
        }

        return $this->aAttributeSet;
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
        if ('AttributeSetGroup' == $relationName) {
            $this->initAttributeSetGroups();
        }
        if ('Option' == $relationName) {
            $this->initOptions();
        }
    }

    /**
     * Clears out the collAttributeSetGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
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
        $this->collAttributeSetGroups->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogValueType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects
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
                $collAttributeSetGroups = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery::create(null, $criteria)
                    ->filterByValueType($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAttributeSetGroupsPartial && count($collAttributeSetGroups)) {
                      $this->initAttributeSetGroups(false);

                      foreach($collAttributeSetGroups as $obj) {
                        if (false == $this->collAttributeSetGroups->contains($obj)) {
                          $this->collAttributeSetGroups->append($obj);
                        }
                      }

                      $this->collAttributeSetGroupsPartial = true;
                    }

                    $collAttributeSetGroups->getInternalIterator()->rewind();
                    return $collAttributeSetGroups;
                }

                if($partial && $this->collAttributeSetGroups) {
                    foreach($this->collAttributeSetGroups as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function setAttributeSetGroups(PropelCollection $attributeSetGroups, PropelPDO $con = null)
    {
        $attributeSetGroupsToDelete = $this->getAttributeSetGroups(new Criteria(), $con)->diff($attributeSetGroups);

        $this->attributeSetGroupsScheduledForDeletion = unserialize(serialize($attributeSetGroupsToDelete));

        foreach ($attributeSetGroupsToDelete as $attributeSetGroupRemoved) {
            $attributeSetGroupRemoved->setValueType(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects.
     * @throws PropelException
     */
    public function countAttributeSetGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAttributeSetGroupsPartial && !$this->isNew();
        if (null === $this->collAttributeSetGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributeSetGroups) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAttributeSetGroups());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByValueType($this)
                ->count($con);
        }

        return count($this->collAttributeSetGroups);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup $l ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function addAttributeSetGroup(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup $l)
    {
        if ($this->collAttributeSetGroups === null) {
            $this->initAttributeSetGroups();
            $this->collAttributeSetGroupsPartial = true;
        }
        if (!in_array($l, $this->collAttributeSetGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAttributeSetGroup($l);
        }

        return $this;
    }

    /**
     * @param	AttributeSetGroup $attributeSetGroup The attributeSetGroup object to add.
     */
    protected function doAddAttributeSetGroup($attributeSetGroup)
    {
        $this->collAttributeSetGroups[]= $attributeSetGroup;
        $attributeSetGroup->setValueType($this);
    }

    /**
     * @param	AttributeSetGroup $attributeSetGroup The attributeSetGroup object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
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
            $attributeSetGroup->setValueType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogValueType is new, it will return
     * an empty collection; or if this PacCatalogValueType has previously
     * been saved, it will retrieve related AttributeSetGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogValueType.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup objects
     */
    public function getAttributeSetGroupsJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery::create(null, $criteria);
        $query->joinWith('Group', $join_behavior);

        return $this->getAttributeSetGroups($query, $con);
    }

    /**
     * Clears out the collOptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     * @see        addOptions()
     */
    public function clearOptions()
    {
        $this->collOptions = null; // important to set this to null since that means it is uninitialized
        $this->collOptionsPartial = null;

        return $this;
    }

    /**
     * reset is the collOptions collection loaded partially
     *
     * @return void
     */
    public function resetPartialOptions($v = true)
    {
        $this->collOptionsPartial = $v;
    }

    /**
     * Initializes the collOptions collection.
     *
     * By default this just sets the collOptions collection to an empty array (like clearcollOptions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOptions($overrideExisting = true)
    {
        if (null !== $this->collOptions && !$overrideExisting) {
            return;
        }
        $this->collOptions = new PropelObjectCollection();
        $this->collOptions->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogValueType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption objects
     * @throws PropelException
     */
    public function getOptions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOptionsPartial && !$this->isNew();
        if (null === $this->collOptions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOptions) {
                // return empty collection
                $this->initOptions();
            } else {
                $collOptions = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionQuery::create(null, $criteria)
                    ->filterByValueType($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionsPartial && count($collOptions)) {
                      $this->initOptions(false);

                      foreach($collOptions as $obj) {
                        if (false == $this->collOptions->contains($obj)) {
                          $this->collOptions->append($obj);
                        }
                      }

                      $this->collOptionsPartial = true;
                    }

                    $collOptions->getInternalIterator()->rewind();
                    return $collOptions;
                }

                if($partial && $this->collOptions) {
                    foreach($this->collOptions as $obj) {
                        if($obj->isNew()) {
                            $collOptions[] = $obj;
                        }
                    }
                }

                $this->collOptions = $collOptions;
                $this->collOptionsPartial = false;
            }
        }

        return $this->collOptions;
    }

    /**
     * Sets a collection of Option objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $options A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function setOptions(PropelCollection $options, PropelPDO $con = null)
    {
        $optionsToDelete = $this->getOptions(new Criteria(), $con)->diff($options);

        $this->optionsScheduledForDeletion = unserialize(serialize($optionsToDelete));

        foreach ($optionsToDelete as $optionRemoved) {
            $optionRemoved->setValueType(null);
        }

        $this->collOptions = null;
        foreach ($options as $option) {
            $this->addOption($option);
        }

        $this->collOptions = $options;
        $this->collOptionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption objects.
     * @throws PropelException
     */
    public function countOptions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionsPartial && !$this->isNew();
        if (null === $this->collOptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOptions());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByValueType($this)
                ->count($con);
        }

        return count($this->collOptions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function addOption(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption $l)
    {
        if ($this->collOptions === null) {
            $this->initOptions();
            $this->collOptionsPartial = true;
        }
        if (!in_array($l, $this->collOptions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOption($l);
        }

        return $this;
    }

    /**
     * @param	Option $option The option object to add.
     */
    protected function doAddOption($option)
    {
        $this->collOptions[]= $option;
        $option->setValueType($this);
    }

    /**
     * @param	Option $option The option object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function removeOption($option)
    {
        if ($this->getOptions()->contains($option)) {
            $this->collOptions->remove($this->collOptions->search($option));
            if (null === $this->optionsScheduledForDeletion) {
                $this->optionsScheduledForDeletion = clone $this->collOptions;
                $this->optionsScheduledForDeletion->clear();
            }
            $this->optionsScheduledForDeletion[]= clone $option;
            $option->setValueType(null);
        }

        return $this;
    }

    /**
     * Clears out the collGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     * @see        addGroups()
     */
    public function clearGroups()
    {
        $this->collGroups = null; // important to set this to null since that means it is uninitialized
        $this->collGroupsPartial = null;

        return $this;
    }

    /**
     * Initializes the collGroups collection.
     *
     * By default this just sets the collGroups collection to an empty collection (like clearGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initGroups()
    {
        $this->collGroups = new PropelObjectCollection();
        $this->collGroups->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogGroup');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_set_group cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogValueType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogGroup[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects
     */
    public function getGroups($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collGroups || null !== $criteria) {
            if ($this->isNew() && null === $this->collGroups) {
                // return empty collection
                $this->initGroups();
            } else {
                $collGroups = ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery::create(null, $criteria)
                    ->filterByValueType($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collGroups;
                }
                $this->collGroups = $collGroups;
            }
        }

        return $this->collGroups;
    }

    /**
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_set_group cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $groups A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function setGroups(PropelCollection $groups, PropelPDO $con = null)
    {
        $this->clearGroups();
        $currentGroups = $this->getGroups();

        $this->groupsScheduledForDeletion = $currentGroups->diff($groups);

        foreach ($groups as $group) {
            if (!$currentGroups->contains($group)) {
                $this->doAddGroup($group);
            }
        }

        $this->collGroups = $groups;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_attribute_set_group cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogGroup objects
     */
    public function countGroups($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collGroups || null !== $criteria) {
            if ($this->isNew() && null === $this->collGroups) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByValueType($this)
                    ->count($con);
            }
        } else {
            return count($this->collGroups);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_PacCatalogGroup object to this object
     * through the pac_catalog_attribute_set_group cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $pacCatalogGroup The ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function addGroup(ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $pacCatalogGroup)
    {
        if ($this->collGroups === null) {
            $this->initGroups();
        }
        if (!$this->collGroups->contains($pacCatalogGroup)) { // only add it if the **same** object is not already associated
            $this->doAddGroup($pacCatalogGroup);

            $this->collGroups[]= $pacCatalogGroup;
        }

        return $this;
    }

    /**
     * @param	Group $group The group object to add.
     */
    protected function doAddGroup($group)
    {
        $pacCatalogAttributeSetGroup = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup();
        $pacCatalogAttributeSetGroup->setGroup($group);
        $this->addAttributeSetGroup($pacCatalogAttributeSetGroup);
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_PacCatalogGroup object to this object
     * through the pac_catalog_attribute_set_group cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $pacCatalogGroup The ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The current object (for fluent API support)
     */
    public function removeGroup(ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $pacCatalogGroup)
    {
        if ($this->getGroups()->contains($pacCatalogGroup)) {
            $this->collGroups->remove($this->collGroups->search($pacCatalogGroup));
            if (null === $this->groupsScheduledForDeletion) {
                $this->groupsScheduledForDeletion = clone $this->collGroups;
                $this->groupsScheduledForDeletion->clear();
            }
            $this->groupsScheduledForDeletion[]= $pacCatalogGroup;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_catalog_value_type = null;
        $this->variety = null;
        $this->fk_catalog_attribute = null;
        $this->fk_catalog_attribute_set = null;
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
            if ($this->collAttributeSetGroups) {
                foreach ($this->collAttributeSetGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptions) {
                foreach ($this->collOptions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGroups) {
                foreach ($this->collGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aAttribute instanceof Persistent) {
              $this->aAttribute->clearAllReferences($deep);
            }
            if ($this->aAttributeSet instanceof Persistent) {
              $this->aAttributeSet->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAttributeSetGroups instanceof PropelCollection) {
            $this->collAttributeSetGroups->clearIterator();
        }
        $this->collAttributeSetGroups = null;
        if ($this->collOptions instanceof PropelCollection) {
            $this->collOptions->clearIterator();
        }
        $this->collOptions = null;
        if ($this->collGroups instanceof PropelCollection) {
            $this->collGroups->clearIterator();
        }
        $this->collGroups = null;
        $this->aAttribute = null;
        $this->aAttributeSet = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::DEFAULT_STRING_FORMAT);
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
