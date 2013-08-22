<?php


/**
 * Base class that represents a row from the 'pac_catalog_value_option' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogValueOption extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_value_option field.
     * @var        int
     */
    protected $id_catalog_value_option;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the fk_catalog_value_type field.
     * @var        int
     */
    protected $fk_catalog_value_type;

    /**
     * @var        PacCatalogValueType
     */
    protected $aValueType;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects.
     */
    protected $collOptionMultis;
    protected $collOptionMultisPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects.
     */
    protected $collOptionSingles;
    protected $collOptionSinglesPartial;

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
    protected $optionMultisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionSinglesScheduledForDeletion = null;

    /**
     * Get the [id_catalog_value_option] column value.
     *
     * @return int
     */
    public function getIdCatalogValueOption()
    {
        return $this->id_catalog_value_option;
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
     * Get the [fk_catalog_value_type] column value.
     *
     * @return int
     */
    public function getFkCatalogValueType()
    {
        return $this->fk_catalog_value_type;
    }

    /**
     * Set the value of [id_catalog_value_option] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function setIdCatalogValueOption($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_value_option !== $v) {
            $this->id_catalog_value_option = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION;
        }


        return $this;
    } // setIdCatalogValueOption()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [fk_catalog_value_type] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function setFkCatalogValueType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_catalog_value_type !== $v) {
            $this->fk_catalog_value_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE;
        }

        if ($this->aValueType !== null && $this->aValueType->getIdCatalogValueType() !== $v) {
            $this->aValueType = null;
        }


        return $this;
    } // setFkCatalogValueType()

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

            $this->id_catalog_value_option = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->fk_catalog_value_type = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 3; // 3 = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption object", $e);
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

        if ($this->aValueType !== null && $this->fk_catalog_value_type !== $this->aValueType->getIdCatalogValueType()) {
            $this->aValueType = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aValueType = null;
            $this->collOptionMultis = null;

            $this->collOptionSingles = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::addInstanceToPool($this);
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

            if ($this->aValueType !== null) {
                if ($this->aValueType->isModified() || $this->aValueType->isNew()) {
                    $affectedRows += $this->aValueType->save($con);
                }
                $this->setValueType($this->aValueType);
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

            if ($this->optionMultisScheduledForDeletion !== null) {
                if (!$this->optionMultisScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create()
                        ->filterByPrimaryKeys($this->optionMultisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->optionMultisScheduledForDeletion = null;
                }
            }

            if ($this->collOptionMultis !== null) {
                foreach ($this->collOptionMultis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->optionSinglesScheduledForDeletion !== null) {
                if (!$this->optionSinglesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create()
                        ->filterByPrimaryKeys($this->optionSinglesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->optionSinglesScheduledForDeletion = null;
                }
            }

            if ($this->collOptionSingles !== null) {
                foreach ($this->collOptionSingles as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION;
        if (null !== $this->id_catalog_value_option) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_value_option`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_catalog_value_type`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_value_option` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_catalog_value_option`':
                        $stmt->bindValue($identifier, $this->id_catalog_value_option, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`fk_catalog_value_type`':
                        $stmt->bindValue($identifier, $this->fk_catalog_value_type, PDO::PARAM_INT);
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
        $this->setIdCatalogValueOption($pk);

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

            if ($this->aValueType !== null) {
                if (!$this->aValueType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aValueType->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collOptionMultis !== null) {
                    foreach ($this->collOptionMultis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOptionSingles !== null) {
                    foreach ($this->collOptionSingles as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCatalogValueOption();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getFkCatalogValueType();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogValueOption(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getFkCatalogValueType(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aValueType) {
                $result['ValueType'] = $this->aValueType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collOptionMultis) {
                $result['OptionMultis'] = $this->collOptionMultis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOptionSingles) {
                $result['OptionSingles'] = $this->collOptionSingles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCatalogValueOption($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setFkCatalogValueType($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogValueOption($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkCatalogValueType($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $this->id_catalog_value_option);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::NAME)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE, $this->fk_catalog_value_type);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $this->id_catalog_value_option);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCatalogValueOption();
    }

    /**
     * Generic method to set the primary key (id_catalog_value_option column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCatalogValueOption($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCatalogValueOption();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setFkCatalogValueType($this->getFkCatalogValueType());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getOptionMultis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOptionMulti($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOptionSingles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOptionSingle($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCatalogValueOption(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogValueType $v
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     * @throws PropelException
     */
    public function setValueType(ProjectA_Zed_Catalog_Persistence_PacCatalogValueType $v = null)
    {
        if ($v === null) {
            $this->setFkCatalogValueType(NULL);
        } else {
            $this->setFkCatalogValueType($v->getIdCatalogValueType());
        }

        $this->aValueType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object, it will not be re-added.
        if ($v !== null) {
            $v->addOption($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueType The associated ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object.
     * @throws PropelException
     */
    public function getValueType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aValueType === null && ($this->fk_catalog_value_type !== null) && $doQuery) {
            $this->aValueType = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create()->findPk($this->fk_catalog_value_type, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aValueType->addOptions($this);
             */
        }

        return $this->aValueType;
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
        if ('OptionMulti' == $relationName) {
            $this->initOptionMultis();
        }
        if ('OptionSingle' == $relationName) {
            $this->initOptionSingles();
        }
    }

    /**
     * Clears out the collOptionMultis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     * @see        addOptionMultis()
     */
    public function clearOptionMultis()
    {
        $this->collOptionMultis = null; // important to set this to null since that means it is uninitialized
        $this->collOptionMultisPartial = null;

        return $this;
    }

    /**
     * reset is the collOptionMultis collection loaded partially
     *
     * @return void
     */
    public function resetPartialOptionMultis($v = true)
    {
        $this->collOptionMultisPartial = $v;
    }

    /**
     * Initializes the collOptionMultis collection.
     *
     * By default this just sets the collOptionMultis collection to an empty array (like clearcollOptionMultis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOptionMultis($overrideExisting = true)
    {
        if (null !== $this->collOptionMultis && !$overrideExisting) {
            return;
        }
        $this->collOptionMultis = new PropelObjectCollection();
        $this->collOptionMultis->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects
     * @throws PropelException
     */
    public function getOptionMultis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOptionMultisPartial && !$this->isNew();
        if (null === $this->collOptionMultis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOptionMultis) {
                // return empty collection
                $this->initOptionMultis();
            } else {
                $collOptionMultis = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria)
                    ->filterByOption($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionMultisPartial && count($collOptionMultis)) {
                      $this->initOptionMultis(false);

                      foreach($collOptionMultis as $obj) {
                        if (false == $this->collOptionMultis->contains($obj)) {
                          $this->collOptionMultis->append($obj);
                        }
                      }

                      $this->collOptionMultisPartial = true;
                    }

                    $collOptionMultis->getInternalIterator()->rewind();
                    return $collOptionMultis;
                }

                if($partial && $this->collOptionMultis) {
                    foreach($this->collOptionMultis as $obj) {
                        if($obj->isNew()) {
                            $collOptionMultis[] = $obj;
                        }
                    }
                }

                $this->collOptionMultis = $collOptionMultis;
                $this->collOptionMultisPartial = false;
            }
        }

        return $this->collOptionMultis;
    }

    /**
     * Sets a collection of OptionMulti objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $optionMultis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function setOptionMultis(PropelCollection $optionMultis, PropelPDO $con = null)
    {
        $optionMultisToDelete = $this->getOptionMultis(new Criteria(), $con)->diff($optionMultis);

        $this->optionMultisScheduledForDeletion = unserialize(serialize($optionMultisToDelete));

        foreach ($optionMultisToDelete as $optionMultiRemoved) {
            $optionMultiRemoved->setOption(null);
        }

        $this->collOptionMultis = null;
        foreach ($optionMultis as $optionMulti) {
            $this->addOptionMulti($optionMulti);
        }

        $this->collOptionMultis = $optionMultis;
        $this->collOptionMultisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects.
     * @throws PropelException
     */
    public function countOptionMultis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionMultisPartial && !$this->isNew();
        if (null === $this->collOptionMultis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptionMultis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOptionMultis());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOption($this)
                ->count($con);
        }

        return count($this->collOptionMultis);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function addOptionMulti(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti $l)
    {
        if ($this->collOptionMultis === null) {
            $this->initOptionMultis();
            $this->collOptionMultisPartial = true;
        }
        if (!in_array($l, $this->collOptionMultis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOptionMulti($l);
        }

        return $this;
    }

    /**
     * @param	OptionMulti $optionMulti The optionMulti object to add.
     */
    protected function doAddOptionMulti($optionMulti)
    {
        $this->collOptionMultis[]= $optionMulti;
        $optionMulti->setOption($this);
    }

    /**
     * @param	OptionMulti $optionMulti The optionMulti object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function removeOptionMulti($optionMulti)
    {
        if ($this->getOptionMultis()->contains($optionMulti)) {
            $this->collOptionMultis->remove($this->collOptionMultis->search($optionMulti));
            if (null === $this->optionMultisScheduledForDeletion) {
                $this->optionMultisScheduledForDeletion = clone $this->collOptionMultis;
                $this->optionMultisScheduledForDeletion->clear();
            }
            $this->optionMultisScheduledForDeletion[]= clone $optionMulti;
            $optionMulti->setOption(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogValueOption is new, it will return
     * an empty collection; or if this PacCatalogValueOption has previously
     * been saved, it will retrieve related OptionMultis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogValueOption.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects
     */
    public function getOptionMultisJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getOptionMultis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogValueOption is new, it will return
     * an empty collection; or if this PacCatalogValueOption has previously
     * been saved, it will retrieve related OptionMultis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogValueOption.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects
     */
    public function getOptionMultisJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getOptionMultis($query, $con);
    }

    /**
     * Clears out the collOptionSingles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     * @see        addOptionSingles()
     */
    public function clearOptionSingles()
    {
        $this->collOptionSingles = null; // important to set this to null since that means it is uninitialized
        $this->collOptionSinglesPartial = null;

        return $this;
    }

    /**
     * reset is the collOptionSingles collection loaded partially
     *
     * @return void
     */
    public function resetPartialOptionSingles($v = true)
    {
        $this->collOptionSinglesPartial = $v;
    }

    /**
     * Initializes the collOptionSingles collection.
     *
     * By default this just sets the collOptionSingles collection to an empty array (like clearcollOptionSingles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOptionSingles($overrideExisting = true)
    {
        if (null !== $this->collOptionSingles && !$overrideExisting) {
            return;
        }
        $this->collOptionSingles = new PropelObjectCollection();
        $this->collOptionSingles->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects
     * @throws PropelException
     */
    public function getOptionSingles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOptionSinglesPartial && !$this->isNew();
        if (null === $this->collOptionSingles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOptionSingles) {
                // return empty collection
                $this->initOptionSingles();
            } else {
                $collOptionSingles = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria)
                    ->filterByOption($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionSinglesPartial && count($collOptionSingles)) {
                      $this->initOptionSingles(false);

                      foreach($collOptionSingles as $obj) {
                        if (false == $this->collOptionSingles->contains($obj)) {
                          $this->collOptionSingles->append($obj);
                        }
                      }

                      $this->collOptionSinglesPartial = true;
                    }

                    $collOptionSingles->getInternalIterator()->rewind();
                    return $collOptionSingles;
                }

                if($partial && $this->collOptionSingles) {
                    foreach($this->collOptionSingles as $obj) {
                        if($obj->isNew()) {
                            $collOptionSingles[] = $obj;
                        }
                    }
                }

                $this->collOptionSingles = $collOptionSingles;
                $this->collOptionSinglesPartial = false;
            }
        }

        return $this->collOptionSingles;
    }

    /**
     * Sets a collection of OptionSingle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $optionSingles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function setOptionSingles(PropelCollection $optionSingles, PropelPDO $con = null)
    {
        $optionSinglesToDelete = $this->getOptionSingles(new Criteria(), $con)->diff($optionSingles);

        $this->optionSinglesScheduledForDeletion = unserialize(serialize($optionSinglesToDelete));

        foreach ($optionSinglesToDelete as $optionSingleRemoved) {
            $optionSingleRemoved->setOption(null);
        }

        $this->collOptionSingles = null;
        foreach ($optionSingles as $optionSingle) {
            $this->addOptionSingle($optionSingle);
        }

        $this->collOptionSingles = $optionSingles;
        $this->collOptionSinglesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects.
     * @throws PropelException
     */
    public function countOptionSingles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionSinglesPartial && !$this->isNew();
        if (null === $this->collOptionSingles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptionSingles) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOptionSingles());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOption($this)
                ->count($con);
        }

        return count($this->collOptionSingles);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function addOptionSingle(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle $l)
    {
        if ($this->collOptionSingles === null) {
            $this->initOptionSingles();
            $this->collOptionSinglesPartial = true;
        }
        if (!in_array($l, $this->collOptionSingles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOptionSingle($l);
        }

        return $this;
    }

    /**
     * @param	OptionSingle $optionSingle The optionSingle object to add.
     */
    protected function doAddOptionSingle($optionSingle)
    {
        $this->collOptionSingles[]= $optionSingle;
        $optionSingle->setOption($this);
    }

    /**
     * @param	OptionSingle $optionSingle The optionSingle object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption The current object (for fluent API support)
     */
    public function removeOptionSingle($optionSingle)
    {
        if ($this->getOptionSingles()->contains($optionSingle)) {
            $this->collOptionSingles->remove($this->collOptionSingles->search($optionSingle));
            if (null === $this->optionSinglesScheduledForDeletion) {
                $this->optionSinglesScheduledForDeletion = clone $this->collOptionSingles;
                $this->optionSinglesScheduledForDeletion->clear();
            }
            $this->optionSinglesScheduledForDeletion[]= clone $optionSingle;
            $optionSingle->setOption(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogValueOption is new, it will return
     * an empty collection; or if this PacCatalogValueOption has previously
     * been saved, it will retrieve related OptionSingles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogValueOption.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects
     */
    public function getOptionSinglesJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getOptionSingles($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogValueOption is new, it will return
     * an empty collection; or if this PacCatalogValueOption has previously
     * been saved, it will retrieve related OptionSingles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogValueOption.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects
     */
    public function getOptionSinglesJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getOptionSingles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_catalog_value_option = null;
        $this->name = null;
        $this->fk_catalog_value_type = null;
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
            if ($this->collOptionMultis) {
                foreach ($this->collOptionMultis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptionSingles) {
                foreach ($this->collOptionSingles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aValueType instanceof Persistent) {
              $this->aValueType->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collOptionMultis instanceof PropelCollection) {
            $this->collOptionMultis->clearIterator();
        }
        $this->collOptionMultis = null;
        if ($this->collOptionSingles instanceof PropelCollection) {
            $this->collOptionSingles->clearIterator();
        }
        $this->collOptionSingles = null;
        $this->aValueType = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionPeer::DEFAULT_STRING_FORMAT);
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
