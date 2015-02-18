<?php


/**
 * Base class that represents a row from the 'pac_catalog_value_boolean' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogValueBoolean extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_value_boolean field.
     * @var        int
     */
    protected $id_catalog_value_boolean;

    /**
     * The value for the fk_catalog_attribute field.
     * @var        int
     */
    protected $fk_catalog_attribute;

    /**
     * The value for the fk_catalog_product field.
     * @var        int
     */
    protected $fk_catalog_product;

    /**
     * The value for the value field.
     * @var        boolean
     */
    protected $value;

    /**
     * @var        PacCatalogAttribute
     */
    protected $aAttribute;

    /**
     * @var        PacCatalogProduct
     */
    protected $aProductEntity;

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
     * Get the [id_catalog_value_boolean] column value.
     *
     * @return int
     */
    public function getIdCatalogValueBoolean()
    {

        return $this->id_catalog_value_boolean;
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
     * Get the [fk_catalog_product] column value.
     *
     * @return int
     */
    public function getFkCatalogProduct()
    {

        return $this->fk_catalog_product;
    }

    /**
     * Get the [value] column value.
     *
     * @return boolean
     */
    public function getValue()
    {

        return $this->value;
    }

    /**
     * Set the value of [id_catalog_value_boolean] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean The current object (for fluent API support)
     */
    public function setIdCatalogValueBoolean($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_value_boolean !== $v) {
            $this->id_catalog_value_boolean = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::ID_CATALOG_VALUE_BOOLEAN;
        }


        return $this;
    } // setIdCatalogValueBoolean()

    /**
     * Set the value of [fk_catalog_attribute] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean The current object (for fluent API support)
     */
    public function setFkCatalogAttribute($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_catalog_attribute !== $v) {
            $this->fk_catalog_attribute = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_ATTRIBUTE;
        }

        if ($this->aAttribute !== null && $this->aAttribute->getIdCatalogAttribute() !== $v) {
            $this->aAttribute = null;
        }


        return $this;
    } // setFkCatalogAttribute()

    /**
     * Set the value of [fk_catalog_product] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean The current object (for fluent API support)
     */
    public function setFkCatalogProduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_catalog_product !== $v) {
            $this->fk_catalog_product = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_PRODUCT;
        }

        if ($this->aProductEntity !== null && $this->aProductEntity->getIdCatalogProduct() !== $v) {
            $this->aProductEntity = null;
        }


        return $this;
    } // setFkCatalogProduct()

    /**
     * Sets the value of the [value] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::VALUE;
        }


        return $this;
    } // setValue()

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

            $this->id_catalog_value_boolean = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_catalog_attribute = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_catalog_product = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->value = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean object", $e);
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
        if ($this->aProductEntity !== null && $this->fk_catalog_product !== $this->aProductEntity->getIdCatalogProduct()) {
            $this->aProductEntity = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAttribute = null;
            $this->aProductEntity = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::addInstanceToPool($this);
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

            if ($this->aAttribute !== null) {
                if ($this->aAttribute->isModified() || $this->aAttribute->isNew()) {
                    $affectedRows += $this->aAttribute->save($con);
                }
                $this->setAttribute($this->aAttribute);
            }

            if ($this->aProductEntity !== null) {
                if ($this->aProductEntity->isModified() || $this->aProductEntity->isNew()) {
                    $affectedRows += $this->aProductEntity->save($con);
                }
                $this->setProductEntity($this->aProductEntity);
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::ID_CATALOG_VALUE_BOOLEAN;
        if (null !== $this->id_catalog_value_boolean) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::ID_CATALOG_VALUE_BOOLEAN . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::ID_CATALOG_VALUE_BOOLEAN)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_value_boolean`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_ATTRIBUTE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_catalog_attribute`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`fk_catalog_product`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`value`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_value_boolean` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_catalog_value_boolean`':
                        $stmt->bindValue($identifier, $this->id_catalog_value_boolean, PDO::PARAM_INT);
                        break;
                    case '`fk_catalog_attribute`':
                        $stmt->bindValue($identifier, $this->fk_catalog_attribute, PDO::PARAM_INT);
                        break;
                    case '`fk_catalog_product`':
                        $stmt->bindValue($identifier, $this->fk_catalog_product, PDO::PARAM_INT);
                        break;
                    case '`value`':
                        $stmt->bindValue($identifier, (int) $this->value, PDO::PARAM_INT);
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
        $this->setIdCatalogValueBoolean($pk);

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

            if ($this->aAttribute !== null) {
                if (!$this->aAttribute->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAttribute->getValidationFailures());
                }
            }

            if ($this->aProductEntity !== null) {
                if (!$this->aProductEntity->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductEntity->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCatalogValueBoolean();
                break;
            case 1:
                return $this->getFkCatalogAttribute();
                break;
            case 2:
                return $this->getFkCatalogProduct();
                break;
            case 3:
                return $this->getValue();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogValueBoolean(),
            $keys[1] => $this->getFkCatalogAttribute(),
            $keys[2] => $this->getFkCatalogProduct(),
            $keys[3] => $this->getValue(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aAttribute) {
                $result['Attribute'] = $this->aAttribute->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProductEntity) {
                $result['ProductEntity'] = $this->aProductEntity->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCatalogValueBoolean($value);
                break;
            case 1:
                $this->setFkCatalogAttribute($value);
                break;
            case 2:
                $this->setFkCatalogProduct($value);
                break;
            case 3:
                $this->setValue($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogValueBoolean($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCatalogAttribute($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkCatalogProduct($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setValue($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::ID_CATALOG_VALUE_BOOLEAN)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::ID_CATALOG_VALUE_BOOLEAN, $this->id_catalog_value_boolean);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_ATTRIBUTE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_ATTRIBUTE, $this->fk_catalog_attribute);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_PRODUCT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::FK_CATALOG_PRODUCT, $this->fk_catalog_product);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::VALUE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::VALUE, $this->value);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::ID_CATALOG_VALUE_BOOLEAN, $this->id_catalog_value_boolean);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCatalogValueBoolean();
    }

    /**
     * Generic method to set the primary key (id_catalog_value_boolean column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCatalogValueBoolean($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCatalogValueBoolean();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCatalogAttribute($this->getFkCatalogAttribute());
        $copyObj->setFkCatalogProduct($this->getFkCatalogProduct());
        $copyObj->setValue($this->getValue());

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
            $copyObj->setIdCatalogValueBoolean(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object.
     *
     * @param                  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $v
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAttribute(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $v = null)
    {
        if ($v === null) {
            $this->setFkCatalogAttribute(NULL);
        } else {
            $this->setFkCatalogAttribute($v->getIdCatalogAttribute());
        }

        $this->aAttribute = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object, it will not be re-added.
        if ($v !== null) {
            $v->addBoolean($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute The associated ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object.
     * @throws PropelException
     */
    public function getAttribute(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAttribute === null && ($this->fk_catalog_attribute !== null) && $doQuery) {
            $this->aAttribute = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery::create()->findPk($this->fk_catalog_attribute, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAttribute->addBooleans($this);
             */
        }

        return $this->aAttribute;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object.
     *
     * @param                  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct $v
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductEntity(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct $v = null)
    {
        if ($v === null) {
            $this->setFkCatalogProduct(NULL);
        } else {
            $this->setFkCatalogProduct($v->getIdCatalogProduct());
        }

        $this->aProductEntity = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object, it will not be re-added.
        if ($v !== null) {
            $v->addBoolean($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The associated ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object.
     * @throws PropelException
     */
    public function getProductEntity(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProductEntity === null && ($this->fk_catalog_product !== null) && $doQuery) {
            $this->aProductEntity = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery::create()->findPk($this->fk_catalog_product, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProductEntity->addBooleans($this);
             */
        }

        return $this->aProductEntity;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_catalog_value_boolean = null;
        $this->fk_catalog_attribute = null;
        $this->fk_catalog_product = null;
        $this->value = null;
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
            if ($this->aAttribute instanceof Persistent) {
              $this->aAttribute->clearAllReferences($deep);
            }
            if ($this->aProductEntity instanceof Persistent) {
              $this->aProductEntity->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aAttribute = null;
        $this->aProductEntity = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanPeer::DEFAULT_STRING_FORMAT);
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
