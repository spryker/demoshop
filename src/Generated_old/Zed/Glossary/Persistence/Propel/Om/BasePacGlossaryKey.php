<?php


/**
 * Base class that represents a row from the 'pac_glossary_key' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Glossary/Persistence/Propel.om
 */
abstract class Generated_Zed_Glossary_Persistence_Propel_Om_BasePacGlossaryKey extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_glossary_key field.
     * @var        int
     */
    protected $id_glossary_key;

    /**
     * The value for the key field.
     * @var        string
     */
    protected $key;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects.
     */
    protected $collPacCmsBlockGlossaries;
    protected $collPacCmsBlockGlossariesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[] Collection to store aggregation of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects.
     */
    protected $collPacGlossaryTranslations;
    protected $collPacGlossaryTranslationsPartial;

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
    protected $pacCmsBlockGlossariesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacGlossaryTranslationsScheduledForDeletion = null;

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
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Propel_Om_BasePacGlossaryKey object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_glossary_key] column value.
     *
     * @return int
     */
    public function getIdGlossaryKey()
    {

        return $this->id_glossary_key;
    }

    /**
     * Get the [key] column value.
     *
     * @return string
     */
    public function getKey()
    {

        return $this->key;
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
     * Set the value of [id_glossary_key] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function setIdGlossaryKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_glossary_key !== $v) {
            $this->id_glossary_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY;
        }


        return $this;
    } // setIdGlossaryKey()

    /**
     * Set the value of [key] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function setKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->key !== $v) {
            $this->key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::KEY;
        }


        return $this;
    } // setKey()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::IS_ACTIVE;
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

            $this->id_glossary_key = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->key = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->is_active = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPacCmsBlockGlossaries = null;

            $this->collPacGlossaryTranslations = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::addInstanceToPool($this);
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

            if ($this->pacCmsBlockGlossariesScheduledForDeletion !== null) {
                if (!$this->pacCmsBlockGlossariesScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacCmsBlockGlossariesScheduledForDeletion as $pacCmsBlockGlossary) {
                        // need to save related object because we set the relation to null
                        $pacCmsBlockGlossary->save($con);
                    }
                    $this->pacCmsBlockGlossariesScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsBlockGlossaries !== null) {
                foreach ($this->collPacCmsBlockGlossaries as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacGlossaryTranslationsScheduledForDeletion !== null) {
                if (!$this->pacGlossaryTranslationsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create()
                        ->filterByPrimaryKeys($this->pacGlossaryTranslationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacGlossaryTranslationsScheduledForDeletion = null;
                }
            }

            if ($this->collPacGlossaryTranslations !== null) {
                foreach ($this->collPacGlossaryTranslations as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY;
        if (null !== $this->id_glossary_key) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`id_glossary_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::KEY)) {
            $modifiedColumns[':p' . $index++]  = '`key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_glossary_key` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_glossary_key`':
                        $stmt->bindValue($identifier, $this->id_glossary_key, PDO::PARAM_INT);
                        break;
                    case '`key`':
                        $stmt->bindValue($identifier, $this->key, PDO::PARAM_STR);
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
        $this->setIdGlossaryKey($pk);

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


            if (($retval = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacCmsBlockGlossaries !== null) {
                    foreach ($this->collPacCmsBlockGlossaries as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacGlossaryTranslations !== null) {
                    foreach ($this->collPacGlossaryTranslations as $referrerFK) {
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
        $pos = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdGlossaryKey();
                break;
            case 1:
                return $this->getKey();
                break;
            case 2:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdGlossaryKey(),
            $keys[1] => $this->getKey(),
            $keys[2] => $this->getIsActive(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collPacCmsBlockGlossaries) {
                $result['PacCmsBlockGlossaries'] = $this->collPacCmsBlockGlossaries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacGlossaryTranslations) {
                $result['PacGlossaryTranslations'] = $this->collPacGlossaryTranslations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdGlossaryKey($value);
                break;
            case 1:
                $this->setKey($value);
                break;
            case 2:
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
        $keys = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdGlossaryKey($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKey($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIsActive($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY)) $criteria->add(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $this->id_glossary_key);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::KEY)) $criteria->add(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::KEY, $this->key);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::IS_ACTIVE)) $criteria->add(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::IS_ACTIVE, $this->is_active);

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
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $this->id_glossary_key);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdGlossaryKey();
    }

    /**
     * Generic method to set the primary key (id_glossary_key column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdGlossaryKey($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdGlossaryKey();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKey($this->getKey());
        $copyObj->setIsActive($this->getIsActive());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacCmsBlockGlossaries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsBlockGlossary($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacGlossaryTranslations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacGlossaryTranslation($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdGlossaryKey(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey Clone of current object.
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer();
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
        if ('PacCmsBlockGlossary' == $relationName) {
            $this->initPacCmsBlockGlossaries();
        }
        if ('PacGlossaryTranslation' == $relationName) {
            $this->initPacGlossaryTranslations();
        }
    }

    /**
     * Clears out the collPacCmsBlockGlossaries collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     * @see        addPacCmsBlockGlossaries()
     */
    public function clearPacCmsBlockGlossaries()
    {
        $this->collPacCmsBlockGlossaries = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsBlockGlossariesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsBlockGlossaries collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsBlockGlossaries($v = true)
    {
        $this->collPacCmsBlockGlossariesPartial = $v;
    }

    /**
     * Initializes the collPacCmsBlockGlossaries collection.
     *
     * By default this just sets the collPacCmsBlockGlossaries collection to an empty array (like clearcollPacCmsBlockGlossaries());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsBlockGlossaries($overrideExisting = true)
    {
        if (null !== $this->collPacCmsBlockGlossaries && !$overrideExisting) {
            return;
        }
        $this->collPacCmsBlockGlossaries = new PropelObjectCollection();
        $this->collPacCmsBlockGlossaries->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects
     * @throws PropelException
     */
    public function getPacCmsBlockGlossaries($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsBlockGlossariesPartial && !$this->isNew();
        if (null === $this->collPacCmsBlockGlossaries || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsBlockGlossaries) {
                // return empty collection
                $this->initPacCmsBlockGlossaries();
            } else {
                $collPacCmsBlockGlossaries = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery::create(null, $criteria)
                    ->filterByPacGlossaryKey($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsBlockGlossariesPartial && count($collPacCmsBlockGlossaries)) {
                      $this->initPacCmsBlockGlossaries(false);

                      foreach ($collPacCmsBlockGlossaries as $obj) {
                        if (false == $this->collPacCmsBlockGlossaries->contains($obj)) {
                          $this->collPacCmsBlockGlossaries->append($obj);
                        }
                      }

                      $this->collPacCmsBlockGlossariesPartial = true;
                    }

                    $collPacCmsBlockGlossaries->getInternalIterator()->rewind();

                    return $collPacCmsBlockGlossaries;
                }

                if ($partial && $this->collPacCmsBlockGlossaries) {
                    foreach ($this->collPacCmsBlockGlossaries as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsBlockGlossaries[] = $obj;
                        }
                    }
                }

                $this->collPacCmsBlockGlossaries = $collPacCmsBlockGlossaries;
                $this->collPacCmsBlockGlossariesPartial = false;
            }
        }

        return $this->collPacCmsBlockGlossaries;
    }

    /**
     * Sets a collection of PacCmsBlockGlossary objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsBlockGlossaries A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function setPacCmsBlockGlossaries(PropelCollection $pacCmsBlockGlossaries, PropelPDO $con = null)
    {
        $pacCmsBlockGlossariesToDelete = $this->getPacCmsBlockGlossaries(new Criteria(), $con)->diff($pacCmsBlockGlossaries);


        $this->pacCmsBlockGlossariesScheduledForDeletion = $pacCmsBlockGlossariesToDelete;

        foreach ($pacCmsBlockGlossariesToDelete as $pacCmsBlockGlossaryRemoved) {
            $pacCmsBlockGlossaryRemoved->setPacGlossaryKey(null);
        }

        $this->collPacCmsBlockGlossaries = null;
        foreach ($pacCmsBlockGlossaries as $pacCmsBlockGlossary) {
            $this->addPacCmsBlockGlossary($pacCmsBlockGlossary);
        }

        $this->collPacCmsBlockGlossaries = $pacCmsBlockGlossaries;
        $this->collPacCmsBlockGlossariesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects.
     * @throws PropelException
     */
    public function countPacCmsBlockGlossaries(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsBlockGlossariesPartial && !$this->isNew();
        if (null === $this->collPacCmsBlockGlossaries || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsBlockGlossaries) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsBlockGlossaries());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacGlossaryKey($this)
                ->count($con);
        }

        return count($this->collPacCmsBlockGlossaries);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function addPacCmsBlockGlossary(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary $l)
    {
        if ($this->collPacCmsBlockGlossaries === null) {
            $this->initPacCmsBlockGlossaries();
            $this->collPacCmsBlockGlossariesPartial = true;
        }

        if (!in_array($l, $this->collPacCmsBlockGlossaries->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsBlockGlossary($l);

            if ($this->pacCmsBlockGlossariesScheduledForDeletion and $this->pacCmsBlockGlossariesScheduledForDeletion->contains($l)) {
                $this->pacCmsBlockGlossariesScheduledForDeletion->remove($this->pacCmsBlockGlossariesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsBlockGlossary $pacCmsBlockGlossary The pacCmsBlockGlossary object to add.
     */
    protected function doAddPacCmsBlockGlossary($pacCmsBlockGlossary)
    {
        $this->collPacCmsBlockGlossaries[]= $pacCmsBlockGlossary;
        $pacCmsBlockGlossary->setPacGlossaryKey($this);
    }

    /**
     * @param	PacCmsBlockGlossary $pacCmsBlockGlossary The pacCmsBlockGlossary object to remove.
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function removePacCmsBlockGlossary($pacCmsBlockGlossary)
    {
        if ($this->getPacCmsBlockGlossaries()->contains($pacCmsBlockGlossary)) {
            $this->collPacCmsBlockGlossaries->remove($this->collPacCmsBlockGlossaries->search($pacCmsBlockGlossary));
            if (null === $this->pacCmsBlockGlossariesScheduledForDeletion) {
                $this->pacCmsBlockGlossariesScheduledForDeletion = clone $this->collPacCmsBlockGlossaries;
                $this->pacCmsBlockGlossariesScheduledForDeletion->clear();
            }
            $this->pacCmsBlockGlossariesScheduledForDeletion[]= $pacCmsBlockGlossary;
            $pacCmsBlockGlossary->setPacGlossaryKey(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacGlossaryKey is new, it will return
     * an empty collection; or if this PacGlossaryKey has previously
     * been saved, it will retrieve related PacCmsBlockGlossaries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacGlossaryKey.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects
     */
    public function getPacCmsBlockGlossariesJoinPacCmsBlock($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery::create(null, $criteria);
        $query->joinWith('PacCmsBlock', $join_behavior);

        return $this->getPacCmsBlockGlossaries($query, $con);
    }

    /**
     * Clears out the collPacGlossaryTranslations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     * @see        addPacGlossaryTranslations()
     */
    public function clearPacGlossaryTranslations()
    {
        $this->collPacGlossaryTranslations = null; // important to set this to null since that means it is uninitialized
        $this->collPacGlossaryTranslationsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacGlossaryTranslations collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacGlossaryTranslations($v = true)
    {
        $this->collPacGlossaryTranslationsPartial = $v;
    }

    /**
     * Initializes the collPacGlossaryTranslations collection.
     *
     * By default this just sets the collPacGlossaryTranslations collection to an empty array (like clearcollPacGlossaryTranslations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacGlossaryTranslations($overrideExisting = true)
    {
        if (null !== $this->collPacGlossaryTranslations && !$overrideExisting) {
            return;
        }
        $this->collPacGlossaryTranslations = new PropelObjectCollection();
        $this->collPacGlossaryTranslations->setModel('ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation');
    }

    /**
     * Gets an array of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[] List of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects
     * @throws PropelException
     */
    public function getPacGlossaryTranslations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryTranslationsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryTranslations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryTranslations) {
                // return empty collection
                $this->initPacGlossaryTranslations();
            } else {
                $collPacGlossaryTranslations = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create(null, $criteria)
                    ->filterByGlossaryKey($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacGlossaryTranslationsPartial && count($collPacGlossaryTranslations)) {
                      $this->initPacGlossaryTranslations(false);

                      foreach ($collPacGlossaryTranslations as $obj) {
                        if (false == $this->collPacGlossaryTranslations->contains($obj)) {
                          $this->collPacGlossaryTranslations->append($obj);
                        }
                      }

                      $this->collPacGlossaryTranslationsPartial = true;
                    }

                    $collPacGlossaryTranslations->getInternalIterator()->rewind();

                    return $collPacGlossaryTranslations;
                }

                if ($partial && $this->collPacGlossaryTranslations) {
                    foreach ($this->collPacGlossaryTranslations as $obj) {
                        if ($obj->isNew()) {
                            $collPacGlossaryTranslations[] = $obj;
                        }
                    }
                }

                $this->collPacGlossaryTranslations = $collPacGlossaryTranslations;
                $this->collPacGlossaryTranslationsPartial = false;
            }
        }

        return $this->collPacGlossaryTranslations;
    }

    /**
     * Sets a collection of PacGlossaryTranslation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacGlossaryTranslations A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function setPacGlossaryTranslations(PropelCollection $pacGlossaryTranslations, PropelPDO $con = null)
    {
        $pacGlossaryTranslationsToDelete = $this->getPacGlossaryTranslations(new Criteria(), $con)->diff($pacGlossaryTranslations);


        $this->pacGlossaryTranslationsScheduledForDeletion = $pacGlossaryTranslationsToDelete;

        foreach ($pacGlossaryTranslationsToDelete as $pacGlossaryTranslationRemoved) {
            $pacGlossaryTranslationRemoved->setGlossaryKey(null);
        }

        $this->collPacGlossaryTranslations = null;
        foreach ($pacGlossaryTranslations as $pacGlossaryTranslation) {
            $this->addPacGlossaryTranslation($pacGlossaryTranslation);
        }

        $this->collPacGlossaryTranslations = $pacGlossaryTranslations;
        $this->collPacGlossaryTranslationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects.
     * @throws PropelException
     */
    public function countPacGlossaryTranslations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryTranslationsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryTranslations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryTranslations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacGlossaryTranslations());
            }
            $query = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGlossaryKey($this)
                ->count($con);
        }

        return count($this->collPacGlossaryTranslations);
    }

    /**
     * Method called to associate a ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation object to this object
     * through the ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation foreign key attribute.
     *
     * @param    ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation $l ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function addPacGlossaryTranslation(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation $l)
    {
        if ($this->collPacGlossaryTranslations === null) {
            $this->initPacGlossaryTranslations();
            $this->collPacGlossaryTranslationsPartial = true;
        }

        if (!in_array($l, $this->collPacGlossaryTranslations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacGlossaryTranslation($l);

            if ($this->pacGlossaryTranslationsScheduledForDeletion and $this->pacGlossaryTranslationsScheduledForDeletion->contains($l)) {
                $this->pacGlossaryTranslationsScheduledForDeletion->remove($this->pacGlossaryTranslationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacGlossaryTranslation $pacGlossaryTranslation The pacGlossaryTranslation object to add.
     */
    protected function doAddPacGlossaryTranslation($pacGlossaryTranslation)
    {
        $this->collPacGlossaryTranslations[]= $pacGlossaryTranslation;
        $pacGlossaryTranslation->setGlossaryKey($this);
    }

    /**
     * @param	PacGlossaryTranslation $pacGlossaryTranslation The pacGlossaryTranslation object to remove.
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey The current object (for fluent API support)
     */
    public function removePacGlossaryTranslation($pacGlossaryTranslation)
    {
        if ($this->getPacGlossaryTranslations()->contains($pacGlossaryTranslation)) {
            $this->collPacGlossaryTranslations->remove($this->collPacGlossaryTranslations->search($pacGlossaryTranslation));
            if (null === $this->pacGlossaryTranslationsScheduledForDeletion) {
                $this->pacGlossaryTranslationsScheduledForDeletion = clone $this->collPacGlossaryTranslations;
                $this->pacGlossaryTranslationsScheduledForDeletion->clear();
            }
            $this->pacGlossaryTranslationsScheduledForDeletion[]= clone $pacGlossaryTranslation;
            $pacGlossaryTranslation->setGlossaryKey(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacGlossaryKey is new, it will return
     * an empty collection; or if this PacGlossaryKey has previously
     * been saved, it will retrieve related PacGlossaryTranslations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacGlossaryKey.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[] List of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects
     */
    public function getPacGlossaryTranslationsJoinGlossaryLocale($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create(null, $criteria);
        $query->joinWith('GlossaryLocale', $join_behavior);

        return $this->getPacGlossaryTranslations($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_glossary_key = null;
        $this->key = null;
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
            if ($this->collPacCmsBlockGlossaries) {
                foreach ($this->collPacCmsBlockGlossaries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacGlossaryTranslations) {
                foreach ($this->collPacGlossaryTranslations as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacCmsBlockGlossaries instanceof PropelCollection) {
            $this->collPacCmsBlockGlossaries->clearIterator();
        }
        $this->collPacCmsBlockGlossaries = null;
        if ($this->collPacGlossaryTranslations instanceof PropelCollection) {
            $this->collPacGlossaryTranslations->clearIterator();
        }
        $this->collPacGlossaryTranslations = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::DEFAULT_STRING_FORMAT);
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
