<?php


/**
 * Base class that represents a row from the 'pac_category_tree' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.om
 */
abstract class Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryTree extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_category field.
     * @var        int
     */
    protected $id_category;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode[] Collection to store aggregation of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects.
     */
    protected $collNodes;
    protected $collNodesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[] Collection to store aggregation of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects.
     */
    protected $collAttributes;
    protected $collAttributesPartial;

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
    protected $nodesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $attributesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
    }

    /**
     * Initializes internal state of Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryTree object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_category] column value.
     *
     * @return int
     */
    public function getIdCategory()
    {

        return $this->id_category;
    }

    /**
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function getIsActive()
    {

        return $this->is_active;
    }

    /**
     * Set the value of [id_category] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function setIdCategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_category !== $v) {
            $this->id_category = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY;
        }


        return $this;
    } // setIdCategory()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function setIsActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_active !== $v) {
            $this->is_active = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

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
            if ($this->is_active !== true) {
                return false;
            }

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

            $this->id_category = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->is_active = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 2; // 2 = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collNodes = null;

            $this->collAttributes = null;

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
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::addInstanceToPool($this);
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

            if ($this->nodesScheduledForDeletion !== null) {
                if (!$this->nodesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery::create()
                        ->filterByPrimaryKeys($this->nodesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nodesScheduledForDeletion = null;
                }
            }

            if ($this->collNodes !== null) {
                foreach ($this->collNodes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->attributesScheduledForDeletion !== null) {
                if (!$this->attributesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create()
                        ->filterByPrimaryKeys($this->attributesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->attributesScheduledForDeletion = null;
                }
            }

            if ($this->collAttributes !== null) {
                foreach ($this->collAttributes as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY;
        if (null !== $this->id_category) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`id_category`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_category_tree` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_category`':
                        $stmt->bindValue($identifier, $this->id_category, PDO::PARAM_INT);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
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
        $this->setIdCategory($pk);

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


            if (($retval = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collNodes !== null) {
                    foreach ($this->collNodes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAttributes !== null) {
                    foreach ($this->collAttributes as $referrerFK) {
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
        $pos = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCategory();
                break;
            case 1:
                return $this->getIsActive();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCategory(),
            $keys[1] => $this->getIsActive(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collNodes) {
                $result['Nodes'] = $this->collNodes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAttributes) {
                $result['Attributes'] = $this->collAttributes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCategory($value);
                break;
            case 1:
                $this->setIsActive($value);
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
        $keys = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCategory($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIsActive($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $this->id_category);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::IS_ACTIVE)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::IS_ACTIVE, $this->is_active);

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
        $criteria = new Criteria(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $this->id_category);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCategory();
    }

    /**
     * Generic method to set the primary key (id_category column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCategory($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCategory();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIsActive($this->getIsActive());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getNodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNode($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAttributes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAttribute($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCategory(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree Clone of current object.
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer();
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
        if ('Node' == $relationName) {
            $this->initNodes();
        }
        if ('Attribute' == $relationName) {
            $this->initAttributes();
        }
    }

    /**
     * Clears out the collNodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     * @see        addNodes()
     */
    public function clearNodes()
    {
        $this->collNodes = null; // important to set this to null since that means it is uninitialized
        $this->collNodesPartial = null;

        return $this;
    }

    /**
     * reset is the collNodes collection loaded partially
     *
     * @return void
     */
    public function resetPartialNodes($v = true)
    {
        $this->collNodesPartial = $v;
    }

    /**
     * Initializes the collNodes collection.
     *
     * By default this just sets the collNodes collection to an empty array (like clearcollNodes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNodes($overrideExisting = true)
    {
        if (null !== $this->collNodes && !$overrideExisting) {
            return;
        }
        $this->collNodes = new PropelObjectCollection();
        $this->collNodes->setModel('ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode');
    }

    /**
     * Gets an array of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode[] List of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects
     * @throws PropelException
     */
    public function getNodes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNodesPartial && !$this->isNew();
        if (null === $this->collNodes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNodes) {
                // return empty collection
                $this->initNodes();
            } else {
                $collNodes = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery::create(null, $criteria)
                    ->filterByCategory($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNodesPartial && count($collNodes)) {
                      $this->initNodes(false);

                      foreach ($collNodes as $obj) {
                        if (false == $this->collNodes->contains($obj)) {
                          $this->collNodes->append($obj);
                        }
                      }

                      $this->collNodesPartial = true;
                    }

                    $collNodes->getInternalIterator()->rewind();

                    return $collNodes;
                }

                if ($partial && $this->collNodes) {
                    foreach ($this->collNodes as $obj) {
                        if ($obj->isNew()) {
                            $collNodes[] = $obj;
                        }
                    }
                }

                $this->collNodes = $collNodes;
                $this->collNodesPartial = false;
            }
        }

        return $this->collNodes;
    }

    /**
     * Sets a collection of Node objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $nodes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function setNodes(PropelCollection $nodes, PropelPDO $con = null)
    {
        $nodesToDelete = $this->getNodes(new Criteria(), $con)->diff($nodes);


        $this->nodesScheduledForDeletion = $nodesToDelete;

        foreach ($nodesToDelete as $nodeRemoved) {
            $nodeRemoved->setCategory(null);
        }

        $this->collNodes = null;
        foreach ($nodes as $node) {
            $this->addNode($node);
        }

        $this->collNodes = $nodes;
        $this->collNodesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects.
     * @throws PropelException
     */
    public function countNodes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNodesPartial && !$this->isNew();
        if (null === $this->collNodes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNodes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getNodes());
            }
            $query = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCategory($this)
                ->count($con);
        }

        return count($this->collNodes);
    }

    /**
     * Method called to associate a ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object to this object
     * through the ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode foreign key attribute.
     *
     * @param    ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode $l ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function addNode(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode $l)
    {
        if ($this->collNodes === null) {
            $this->initNodes();
            $this->collNodesPartial = true;
        }

        if (!in_array($l, $this->collNodes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNode($l);

            if ($this->nodesScheduledForDeletion and $this->nodesScheduledForDeletion->contains($l)) {
                $this->nodesScheduledForDeletion->remove($this->nodesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Node $node The node object to add.
     */
    protected function doAddNode($node)
    {
        $this->collNodes[]= $node;
        $node->setCategory($this);
    }

    /**
     * @param	Node $node The node object to remove.
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function removeNode($node)
    {
        if ($this->getNodes()->contains($node)) {
            $this->collNodes->remove($this->collNodes->search($node));
            if (null === $this->nodesScheduledForDeletion) {
                $this->nodesScheduledForDeletion = clone $this->collNodes;
                $this->nodesScheduledForDeletion->clear();
            }
            $this->nodesScheduledForDeletion[]= clone $node;
            $node->setCategory(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCategoryTree is new, it will return
     * an empty collection; or if this PacCategoryTree has previously
     * been saved, it will retrieve related Nodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCategoryTree.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode[] List of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects
     */
    public function getNodesJoinCategoryNode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery::create(null, $criteria);
        $query->joinWith('CategoryNode', $join_behavior);

        return $this->getNodes($query, $con);
    }

    /**
     * Clears out the collAttributes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     * @see        addAttributes()
     */
    public function clearAttributes()
    {
        $this->collAttributes = null; // important to set this to null since that means it is uninitialized
        $this->collAttributesPartial = null;

        return $this;
    }

    /**
     * reset is the collAttributes collection loaded partially
     *
     * @return void
     */
    public function resetPartialAttributes($v = true)
    {
        $this->collAttributesPartial = $v;
    }

    /**
     * Initializes the collAttributes collection.
     *
     * By default this just sets the collAttributes collection to an empty array (like clearcollAttributes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAttributes($overrideExisting = true)
    {
        if (null !== $this->collAttributes && !$overrideExisting) {
            return;
        }
        $this->collAttributes = new PropelObjectCollection();
        $this->collAttributes->setModel('ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute');
    }

    /**
     * Gets an array of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[] List of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects
     * @throws PropelException
     */
    public function getAttributes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAttributesPartial && !$this->isNew();
        if (null === $this->collAttributes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAttributes) {
                // return empty collection
                $this->initAttributes();
            } else {
                $collAttributes = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create(null, $criteria)
                    ->filterByCategory($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAttributesPartial && count($collAttributes)) {
                      $this->initAttributes(false);

                      foreach ($collAttributes as $obj) {
                        if (false == $this->collAttributes->contains($obj)) {
                          $this->collAttributes->append($obj);
                        }
                      }

                      $this->collAttributesPartial = true;
                    }

                    $collAttributes->getInternalIterator()->rewind();

                    return $collAttributes;
                }

                if ($partial && $this->collAttributes) {
                    foreach ($this->collAttributes as $obj) {
                        if ($obj->isNew()) {
                            $collAttributes[] = $obj;
                        }
                    }
                }

                $this->collAttributes = $collAttributes;
                $this->collAttributesPartial = false;
            }
        }

        return $this->collAttributes;
    }

    /**
     * Sets a collection of Attribute objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $attributes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function setAttributes(PropelCollection $attributes, PropelPDO $con = null)
    {
        $attributesToDelete = $this->getAttributes(new Criteria(), $con)->diff($attributes);


        $this->attributesScheduledForDeletion = $attributesToDelete;

        foreach ($attributesToDelete as $attributeRemoved) {
            $attributeRemoved->setCategory(null);
        }

        $this->collAttributes = null;
        foreach ($attributes as $attribute) {
            $this->addAttribute($attribute);
        }

        $this->collAttributes = $attributes;
        $this->collAttributesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects.
     * @throws PropelException
     */
    public function countAttributes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAttributesPartial && !$this->isNew();
        if (null === $this->collAttributes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAttributes());
            }
            $query = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCategory($this)
                ->count($con);
        }

        return count($this->collAttributes);
    }

    /**
     * Method called to associate a ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute object to this object
     * through the ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute foreign key attribute.
     *
     * @param    ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute $l ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function addAttribute(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute $l)
    {
        if ($this->collAttributes === null) {
            $this->initAttributes();
            $this->collAttributesPartial = true;
        }

        if (!in_array($l, $this->collAttributes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAttribute($l);

            if ($this->attributesScheduledForDeletion and $this->attributesScheduledForDeletion->contains($l)) {
                $this->attributesScheduledForDeletion->remove($this->attributesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Attribute $attribute The attribute object to add.
     */
    protected function doAddAttribute($attribute)
    {
        $this->collAttributes[]= $attribute;
        $attribute->setCategory($this);
    }

    /**
     * @param	Attribute $attribute The attribute object to remove.
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The current object (for fluent API support)
     */
    public function removeAttribute($attribute)
    {
        if ($this->getAttributes()->contains($attribute)) {
            $this->collAttributes->remove($this->collAttributes->search($attribute));
            if (null === $this->attributesScheduledForDeletion) {
                $this->attributesScheduledForDeletion = clone $this->collAttributes;
                $this->attributesScheduledForDeletion->clear();
            }
            $this->attributesScheduledForDeletion[]= clone $attribute;
            $attribute->setCategory(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCategoryTree is new, it will return
     * an empty collection; or if this PacCategoryTree has previously
     * been saved, it will retrieve related Attributes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCategoryTree.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[] List of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects
     */
    public function getAttributesJoinLocale($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create(null, $criteria);
        $query->joinWith('Locale', $join_behavior);

        return $this->getAttributes($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_category = null;
        $this->is_active = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
            if ($this->collNodes) {
                foreach ($this->collNodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAttributes) {
                foreach ($this->collAttributes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collNodes instanceof PropelCollection) {
            $this->collNodes->clearIterator();
        }
        $this->collNodes = null;
        if ($this->collAttributes instanceof PropelCollection) {
            $this->collAttributes->clearIterator();
        }
        $this->collAttributes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::DEFAULT_STRING_FORMAT);
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
