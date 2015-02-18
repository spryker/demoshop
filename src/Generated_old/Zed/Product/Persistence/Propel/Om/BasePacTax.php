<?php


/**
 * Base class that represents a row from the 'pac_tax' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacTax extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the tax_id field.
     * @var        int
     */
    protected $tax_id;

    /**
     * The value for the rate field.
     * @var        int
     */
    protected $rate;

    /**
     * The value for the locale_id field.
     * @var        int
     */
    protected $locale_id;

    /**
     * @var        PacLocale
     */
    protected $aLocale;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects.
     */
    protected $collPacLocalizedProductAttributess;
    protected $collPacLocalizedProductAttributessPartial;

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
    protected $pacLocalizedProductAttributessScheduledForDeletion = null;

    /**
     * Get the [tax_id] column value.
     *
     * @return int
     */
    public function getTaxId()
    {

        return $this->tax_id;
    }

    /**
     * Get the [rate] column value.
     *
     * @return int
     */
    public function getRate()
    {

        return $this->rate;
    }

    /**
     * Get the [locale_id] column value.
     *
     * @return int
     */
    public function getLocaleId()
    {

        return $this->locale_id;
    }

    /**
     * Set the value of [tax_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     */
    public function setTaxId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tax_id !== $v) {
            $this->tax_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID;
        }


        return $this;
    } // setTaxId()

    /**
     * Set the value of [rate] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     */
    public function setRate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rate !== $v) {
            $this->rate = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::RATE;
        }


        return $this;
    } // setRate()

    /**
     * Set the value of [locale_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     */
    public function setLocaleId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->locale_id !== $v) {
            $this->locale_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID;
        }

        if ($this->aLocale !== null && $this->aLocale->getIdLocale() !== $v) {
            $this->aLocale = null;
        }


        return $this;
    } // setLocaleId()

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

            $this->tax_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->rate = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->locale_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Product_Persistence_Propel_PacTax object", $e);
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

        if ($this->aLocale !== null && $this->locale_id !== $this->aLocale->getIdLocale()) {
            $this->aLocale = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aLocale = null;
            $this->collPacLocalizedProductAttributess = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::addInstanceToPool($this);
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

            if ($this->aLocale !== null) {
                if ($this->aLocale->isModified() || $this->aLocale->isNew()) {
                    $affectedRows += $this->aLocale->save($con);
                }
                $this->setLocale($this->aLocale);
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

            if ($this->pacLocalizedProductAttributessScheduledForDeletion !== null) {
                if (!$this->pacLocalizedProductAttributessScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacLocalizedProductAttributessScheduledForDeletion as $pacLocalizedProductAttributes) {
                        // need to save related object because we set the relation to null
                        $pacLocalizedProductAttributes->save($con);
                    }
                    $this->pacLocalizedProductAttributessScheduledForDeletion = null;
                }
            }

            if ($this->collPacLocalizedProductAttributess !== null) {
                foreach ($this->collPacLocalizedProductAttributess as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tax_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::RATE)) {
            $modifiedColumns[':p' . $index++]  = '`rate`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`locale_id`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_tax` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`tax_id`':
                        $stmt->bindValue($identifier, $this->tax_id, PDO::PARAM_INT);
                        break;
                    case '`rate`':
                        $stmt->bindValue($identifier, $this->rate, PDO::PARAM_INT);
                        break;
                    case '`locale_id`':
                        $stmt->bindValue($identifier, $this->locale_id, PDO::PARAM_INT);
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
            $this->setTaxId($pk);
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

            if ($this->aLocale !== null) {
                if (!$this->aLocale->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLocale->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacLocalizedProductAttributess !== null) {
                    foreach ($this->collPacLocalizedProductAttributess as $referrerFK) {
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
        $pos = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTaxId();
                break;
            case 1:
                return $this->getRate();
                break;
            case 2:
                return $this->getLocaleId();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Product_Persistence_Propel_PacTax'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Product_Persistence_Propel_PacTax'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTaxId(),
            $keys[1] => $this->getRate(),
            $keys[2] => $this->getLocaleId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aLocale) {
                $result['Locale'] = $this->aLocale->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacLocalizedProductAttributess) {
                $result['PacLocalizedProductAttributess'] = $this->collPacLocalizedProductAttributess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTaxId($value);
                break;
            case 1:
                $this->setRate($value);
                break;
            case 2:
                $this->setLocaleId($value);
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
        $keys = ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTaxId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setRate($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLocaleId($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $this->tax_id);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::RATE)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::RATE, $this->rate);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::LOCALE_ID, $this->locale_id);

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
        $criteria = new Criteria(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::TAX_ID, $this->tax_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getTaxId();
    }

    /**
     * Generic method to set the primary key (tax_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTaxId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTaxId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Product_Persistence_Propel_PacTax (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRate($this->getRate());
        $copyObj->setLocaleId($this->getLocaleId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacLocalizedProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacLocalizedProductAttributes($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTaxId(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax Clone of current object.
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object.
     *
     * @param                  SprykerCore_Zed_Locale_Persistence_Propel_PacLocale $v
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLocale(SprykerCore_Zed_Locale_Persistence_Propel_PacLocale $v = null)
    {
        if ($v === null) {
            $this->setLocaleId(NULL);
        } else {
            $this->setLocaleId($v->getIdLocale());
        }

        $this->aLocale = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object, it will not be re-added.
        if ($v !== null) {
            $v->addPacTax($this);
        }


        return $this;
    }


    /**
     * Get the associated SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The associated SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object.
     * @throws PropelException
     */
    public function getLocale(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLocale === null && ($this->locale_id !== null) && $doQuery) {
            $this->aLocale = SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery::create()->findPk($this->locale_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLocale->addPacTaxes($this);
             */
        }

        return $this->aLocale;
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
        if ('PacLocalizedProductAttributes' == $relationName) {
            $this->initPacLocalizedProductAttributess();
        }
    }

    /**
     * Clears out the collPacLocalizedProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     * @see        addPacLocalizedProductAttributess()
     */
    public function clearPacLocalizedProductAttributess()
    {
        $this->collPacLocalizedProductAttributess = null; // important to set this to null since that means it is uninitialized
        $this->collPacLocalizedProductAttributessPartial = null;

        return $this;
    }

    /**
     * reset is the collPacLocalizedProductAttributess collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacLocalizedProductAttributess($v = true)
    {
        $this->collPacLocalizedProductAttributessPartial = $v;
    }

    /**
     * Initializes the collPacLocalizedProductAttributess collection.
     *
     * By default this just sets the collPacLocalizedProductAttributess collection to an empty array (like clearcollPacLocalizedProductAttributess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacLocalizedProductAttributess($overrideExisting = true)
    {
        if (null !== $this->collPacLocalizedProductAttributess && !$overrideExisting) {
            return;
        }
        $this->collPacLocalizedProductAttributess = new PropelObjectCollection();
        $this->collPacLocalizedProductAttributess->setModel('ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacTax is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects
     * @throws PropelException
     */
    public function getPacLocalizedProductAttributess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collPacLocalizedProductAttributess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacLocalizedProductAttributess) {
                // return empty collection
                $this->initPacLocalizedProductAttributess();
            } else {
                $collPacLocalizedProductAttributess = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria)
                    ->filterByPacTax($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacLocalizedProductAttributessPartial && count($collPacLocalizedProductAttributess)) {
                      $this->initPacLocalizedProductAttributess(false);

                      foreach ($collPacLocalizedProductAttributess as $obj) {
                        if (false == $this->collPacLocalizedProductAttributess->contains($obj)) {
                          $this->collPacLocalizedProductAttributess->append($obj);
                        }
                      }

                      $this->collPacLocalizedProductAttributessPartial = true;
                    }

                    $collPacLocalizedProductAttributess->getInternalIterator()->rewind();

                    return $collPacLocalizedProductAttributess;
                }

                if ($partial && $this->collPacLocalizedProductAttributess) {
                    foreach ($this->collPacLocalizedProductAttributess as $obj) {
                        if ($obj->isNew()) {
                            $collPacLocalizedProductAttributess[] = $obj;
                        }
                    }
                }

                $this->collPacLocalizedProductAttributess = $collPacLocalizedProductAttributess;
                $this->collPacLocalizedProductAttributessPartial = false;
            }
        }

        return $this->collPacLocalizedProductAttributess;
    }

    /**
     * Sets a collection of PacLocalizedProductAttributes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacLocalizedProductAttributess A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     */
    public function setPacLocalizedProductAttributess(PropelCollection $pacLocalizedProductAttributess, PropelPDO $con = null)
    {
        $pacLocalizedProductAttributessToDelete = $this->getPacLocalizedProductAttributess(new Criteria(), $con)->diff($pacLocalizedProductAttributess);


        $this->pacLocalizedProductAttributessScheduledForDeletion = $pacLocalizedProductAttributessToDelete;

        foreach ($pacLocalizedProductAttributessToDelete as $pacLocalizedProductAttributesRemoved) {
            $pacLocalizedProductAttributesRemoved->setPacTax(null);
        }

        $this->collPacLocalizedProductAttributess = null;
        foreach ($pacLocalizedProductAttributess as $pacLocalizedProductAttributes) {
            $this->addPacLocalizedProductAttributes($pacLocalizedProductAttributes);
        }

        $this->collPacLocalizedProductAttributess = $pacLocalizedProductAttributess;
        $this->collPacLocalizedProductAttributessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects.
     * @throws PropelException
     */
    public function countPacLocalizedProductAttributess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collPacLocalizedProductAttributess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacLocalizedProductAttributess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacLocalizedProductAttributess());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacTax($this)
                ->count($con);
        }

        return count($this->collPacLocalizedProductAttributess);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes $l ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     */
    public function addPacLocalizedProductAttributes(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes $l)
    {
        if ($this->collPacLocalizedProductAttributess === null) {
            $this->initPacLocalizedProductAttributess();
            $this->collPacLocalizedProductAttributessPartial = true;
        }

        if (!in_array($l, $this->collPacLocalizedProductAttributess->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacLocalizedProductAttributes($l);

            if ($this->pacLocalizedProductAttributessScheduledForDeletion and $this->pacLocalizedProductAttributessScheduledForDeletion->contains($l)) {
                $this->pacLocalizedProductAttributessScheduledForDeletion->remove($this->pacLocalizedProductAttributessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacLocalizedProductAttributes $pacLocalizedProductAttributes The pacLocalizedProductAttributes object to add.
     */
    protected function doAddPacLocalizedProductAttributes($pacLocalizedProductAttributes)
    {
        $this->collPacLocalizedProductAttributess[]= $pacLocalizedProductAttributes;
        $pacLocalizedProductAttributes->setPacTax($this);
    }

    /**
     * @param	PacLocalizedProductAttributes $pacLocalizedProductAttributes The pacLocalizedProductAttributes object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTax The current object (for fluent API support)
     */
    public function removePacLocalizedProductAttributes($pacLocalizedProductAttributes)
    {
        if ($this->getPacLocalizedProductAttributess()->contains($pacLocalizedProductAttributes)) {
            $this->collPacLocalizedProductAttributess->remove($this->collPacLocalizedProductAttributess->search($pacLocalizedProductAttributes));
            if (null === $this->pacLocalizedProductAttributessScheduledForDeletion) {
                $this->pacLocalizedProductAttributessScheduledForDeletion = clone $this->collPacLocalizedProductAttributess;
                $this->pacLocalizedProductAttributessScheduledForDeletion->clear();
            }
            $this->pacLocalizedProductAttributessScheduledForDeletion[]= $pacLocalizedProductAttributes;
            $pacLocalizedProductAttributes->setPacTax(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacTax is new, it will return
     * an empty collection; or if this PacTax has previously
     * been saved, it will retrieve related PacLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacTax.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects
     */
    public function getPacLocalizedProductAttributessJoinPacProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria);
        $query->joinWith('PacProduct', $join_behavior);

        return $this->getPacLocalizedProductAttributess($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacTax is new, it will return
     * an empty collection; or if this PacTax has previously
     * been saved, it will retrieve related PacLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacTax.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects
     */
    public function getPacLocalizedProductAttributessJoinLocale($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria);
        $query->joinWith('Locale', $join_behavior);

        return $this->getPacLocalizedProductAttributess($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->tax_id = null;
        $this->rate = null;
        $this->locale_id = null;
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
            if ($this->collPacLocalizedProductAttributess) {
                foreach ($this->collPacLocalizedProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aLocale instanceof Persistent) {
              $this->aLocale->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacLocalizedProductAttributess instanceof PropelCollection) {
            $this->collPacLocalizedProductAttributess->clearIterator();
        }
        $this->collPacLocalizedProductAttributess = null;
        $this->aLocale = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Product_Persistence_Propel_PacTaxPeer::DEFAULT_STRING_FORMAT);
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
