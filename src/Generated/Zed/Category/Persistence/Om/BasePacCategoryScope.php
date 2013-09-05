<?php


/**
 * Base class that represents a row from the 'pac_category_scope' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.om
 */
abstract class Generated_Zed_Category_Persistence_Om_BasePacCategoryScope extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Category_Persistence_PacCategoryScopePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Category_Persistence_PacCategoryScopePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_category_scope field.
     * @var        int
     */
    protected $id_category_scope;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategory[] Collection to store aggregation of ProjectA_Zed_Category_Persistence_PacCategory objects.
     */
    protected $collCategories;
    protected $collCategoriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey[] Collection to store aggregation of ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects.
     */
    protected $collAttributeKeys;
    protected $collAttributeKeysPartial;

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
    protected $categoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $attributeKeysScheduledForDeletion = null;

    /**
     * Get the [id_category_scope] column value.
     *
     * @return int
     */
    public function getIdCategoryScope()
    {
        return $this->id_category_scope;
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
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id_category_scope] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function setIdCategoryScope($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_category_scope !== $v) {
            $this->id_category_scope = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE;
        }


        return $this;
    } // setIdCategoryScope()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

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

            $this->id_category_scope = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->created_at = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->updated_at = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Category_Persistence_PacCategoryScope object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCategories = null;

            $this->collAttributeKeys = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Category_Persistence_PacCategoryScopeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
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

                ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::addInstanceToPool($this);
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

            if ($this->categoriesScheduledForDeletion !== null) {
                if (!$this->categoriesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
                        ->filterByPrimaryKeys($this->categoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->categoriesScheduledForDeletion = null;
                }
            }

            if ($this->collCategories !== null) {
                foreach ($this->collCategories as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->attributeKeysScheduledForDeletion !== null) {
                if (!$this->attributeKeysScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery::create()
                        ->filterByPrimaryKeys($this->attributeKeysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->attributeKeysScheduledForDeletion = null;
                }
            }

            if ($this->collAttributeKeys !== null) {
                foreach ($this->collAttributeKeys as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE;
        if (null !== $this->id_category_scope) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE)) {
            $modifiedColumns[':p' . $index++]  = '`id_category_scope`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_category_scope` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_category_scope`':
                        $stmt->bindValue($identifier, $this->id_category_scope, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
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
        $this->setIdCategoryScope($pk);

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


            if (($retval = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCategories !== null) {
                    foreach ($this->collCategories as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAttributeKeys !== null) {
                    foreach ($this->collAttributeKeys as $referrerFK) {
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
        $pos = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCategoryScope();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getCreatedAt();
                break;
            case 3:
                return $this->getUpdatedAt();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Category_Persistence_PacCategoryScope'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Category_Persistence_PacCategoryScope'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCategoryScope(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getCreatedAt(),
            $keys[3] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collCategories) {
                $result['Categories'] = $this->collCategories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAttributeKeys) {
                $result['AttributeKeys'] = $this->collAttributeKeys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCategoryScope($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setCreatedAt($value);
                break;
            case 3:
                $this->setUpdatedAt($value);
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
        $keys = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCategoryScope($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $this->id_category_scope);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::NAME)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $this->id_category_scope);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCategoryScope();
    }

    /**
     * Generic method to set the primary key (id_category_scope column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCategoryScope($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCategoryScope();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Category_Persistence_PacCategoryScope (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCategories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAttributeKeys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAttributeKey($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCategoryScope(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope Clone of current object.
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScopePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Category_Persistence_PacCategoryScopePeer();
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
        if ('Category' == $relationName) {
            $this->initCategories();
        }
        if ('AttributeKey' == $relationName) {
            $this->initAttributeKeys();
        }
    }

    /**
     * Clears out the collCategories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     * @see        addCategories()
     */
    public function clearCategories()
    {
        $this->collCategories = null; // important to set this to null since that means it is uninitialized
        $this->collCategoriesPartial = null;

        return $this;
    }

    /**
     * reset is the collCategories collection loaded partially
     *
     * @return void
     */
    public function resetPartialCategories($v = true)
    {
        $this->collCategoriesPartial = $v;
    }

    /**
     * Initializes the collCategories collection.
     *
     * By default this just sets the collCategories collection to an empty array (like clearcollCategories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCategories($overrideExisting = true)
    {
        if (null !== $this->collCategories && !$overrideExisting) {
            return;
        }
        $this->collCategories = new PropelObjectCollection();
        $this->collCategories->setModel('ProjectA_Zed_Category_Persistence_PacCategory');
    }

    /**
     * Gets an array of ProjectA_Zed_Category_Persistence_PacCategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Category_Persistence_PacCategoryScope is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategory[] List of ProjectA_Zed_Category_Persistence_PacCategory objects
     * @throws PropelException
     */
    public function getCategories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCategoriesPartial && !$this->isNew();
        if (null === $this->collCategories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCategories) {
                // return empty collection
                $this->initCategories();
            } else {
                $collCategories = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $criteria)
                    ->filterByScope($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCategoriesPartial && count($collCategories)) {
                      $this->initCategories(false);

                      foreach($collCategories as $obj) {
                        if (false == $this->collCategories->contains($obj)) {
                          $this->collCategories->append($obj);
                        }
                      }

                      $this->collCategoriesPartial = true;
                    }

                    $collCategories->getInternalIterator()->rewind();
                    return $collCategories;
                }

                if($partial && $this->collCategories) {
                    foreach($this->collCategories as $obj) {
                        if($obj->isNew()) {
                            $collCategories[] = $obj;
                        }
                    }
                }

                $this->collCategories = $collCategories;
                $this->collCategoriesPartial = false;
            }
        }

        return $this->collCategories;
    }

    /**
     * Sets a collection of Category objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $categories A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function setCategories(PropelCollection $categories, PropelPDO $con = null)
    {
        $categoriesToDelete = $this->getCategories(new Criteria(), $con)->diff($categories);

        $this->categoriesScheduledForDeletion = unserialize(serialize($categoriesToDelete));

        foreach ($categoriesToDelete as $categoryRemoved) {
            $categoryRemoved->setScope(null);
        }

        $this->collCategories = null;
        foreach ($categories as $category) {
            $this->addCategory($category);
        }

        $this->collCategories = $categories;
        $this->collCategoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Category_Persistence_PacCategory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Category_Persistence_PacCategory objects.
     * @throws PropelException
     */
    public function countCategories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCategoriesPartial && !$this->isNew();
        if (null === $this->collCategories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCategories) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCategories());
            }
            $query = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByScope($this)
                ->count($con);
        }

        return count($this->collCategories);
    }

    /**
     * Method called to associate a ProjectA_Zed_Category_Persistence_PacCategory object to this object
     * through the ProjectA_Zed_Category_Persistence_PacCategory foreign key attribute.
     *
     * @param    ProjectA_Zed_Category_Persistence_PacCategory $l ProjectA_Zed_Category_Persistence_PacCategory
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function addCategory(ProjectA_Zed_Category_Persistence_PacCategory $l)
    {
        if ($this->collCategories === null) {
            $this->initCategories();
            $this->collCategoriesPartial = true;
        }
        if (!in_array($l, $this->collCategories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCategory($l);
        }

        return $this;
    }

    /**
     * @param	Category $category The category object to add.
     */
    protected function doAddCategory($category)
    {
        $this->collCategories[]= $category;
        $category->setScope($this);
    }

    /**
     * @param	Category $category The category object to remove.
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function removeCategory($category)
    {
        if ($this->getCategories()->contains($category)) {
            $this->collCategories->remove($this->collCategories->search($category));
            if (null === $this->categoriesScheduledForDeletion) {
                $this->categoriesScheduledForDeletion = clone $this->collCategories;
                $this->categoriesScheduledForDeletion->clear();
            }
            $this->categoriesScheduledForDeletion[]= clone $category;
            $category->setScope(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCategoryScope is new, it will return
     * an empty collection; or if this PacCategoryScope has previously
     * been saved, it will retrieve related Categories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCategoryScope.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategory[] List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getCategoriesJoinName($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $criteria);
        $query->joinWith('Name', $join_behavior);

        return $this->getCategories($query, $con);
    }

    /**
     * Clears out the collAttributeKeys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     * @see        addAttributeKeys()
     */
    public function clearAttributeKeys()
    {
        $this->collAttributeKeys = null; // important to set this to null since that means it is uninitialized
        $this->collAttributeKeysPartial = null;

        return $this;
    }

    /**
     * reset is the collAttributeKeys collection loaded partially
     *
     * @return void
     */
    public function resetPartialAttributeKeys($v = true)
    {
        $this->collAttributeKeysPartial = $v;
    }

    /**
     * Initializes the collAttributeKeys collection.
     *
     * By default this just sets the collAttributeKeys collection to an empty array (like clearcollAttributeKeys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAttributeKeys($overrideExisting = true)
    {
        if (null !== $this->collAttributeKeys && !$overrideExisting) {
            return;
        }
        $this->collAttributeKeys = new PropelObjectCollection();
        $this->collAttributeKeys->setModel('ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey');
    }

    /**
     * Gets an array of ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Category_Persistence_PacCategoryScope is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey[] List of ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects
     * @throws PropelException
     */
    public function getAttributeKeys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAttributeKeysPartial && !$this->isNew();
        if (null === $this->collAttributeKeys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAttributeKeys) {
                // return empty collection
                $this->initAttributeKeys();
            } else {
                $collAttributeKeys = ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery::create(null, $criteria)
                    ->filterByScope($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAttributeKeysPartial && count($collAttributeKeys)) {
                      $this->initAttributeKeys(false);

                      foreach($collAttributeKeys as $obj) {
                        if (false == $this->collAttributeKeys->contains($obj)) {
                          $this->collAttributeKeys->append($obj);
                        }
                      }

                      $this->collAttributeKeysPartial = true;
                    }

                    $collAttributeKeys->getInternalIterator()->rewind();
                    return $collAttributeKeys;
                }

                if($partial && $this->collAttributeKeys) {
                    foreach($this->collAttributeKeys as $obj) {
                        if($obj->isNew()) {
                            $collAttributeKeys[] = $obj;
                        }
                    }
                }

                $this->collAttributeKeys = $collAttributeKeys;
                $this->collAttributeKeysPartial = false;
            }
        }

        return $this->collAttributeKeys;
    }

    /**
     * Sets a collection of AttributeKey objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $attributeKeys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function setAttributeKeys(PropelCollection $attributeKeys, PropelPDO $con = null)
    {
        $attributeKeysToDelete = $this->getAttributeKeys(new Criteria(), $con)->diff($attributeKeys);

        $this->attributeKeysScheduledForDeletion = unserialize(serialize($attributeKeysToDelete));

        foreach ($attributeKeysToDelete as $attributeKeyRemoved) {
            $attributeKeyRemoved->setScope(null);
        }

        $this->collAttributeKeys = null;
        foreach ($attributeKeys as $attributeKey) {
            $this->addAttributeKey($attributeKey);
        }

        $this->collAttributeKeys = $attributeKeys;
        $this->collAttributeKeysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey objects.
     * @throws PropelException
     */
    public function countAttributeKeys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAttributeKeysPartial && !$this->isNew();
        if (null === $this->collAttributeKeys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributeKeys) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAttributeKeys());
            }
            $query = ProjectA_Zed_Category_Persistence_PacCategoryAttributeKeyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByScope($this)
                ->count($con);
        }

        return count($this->collAttributeKeys);
    }

    /**
     * Method called to associate a ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey object to this object
     * through the ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey foreign key attribute.
     *
     * @param    ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey $l ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function addAttributeKey(ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey $l)
    {
        if ($this->collAttributeKeys === null) {
            $this->initAttributeKeys();
            $this->collAttributeKeysPartial = true;
        }
        if (!in_array($l, $this->collAttributeKeys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAttributeKey($l);
        }

        return $this;
    }

    /**
     * @param	AttributeKey $attributeKey The attributeKey object to add.
     */
    protected function doAddAttributeKey($attributeKey)
    {
        $this->collAttributeKeys[]= $attributeKey;
        $attributeKey->setScope($this);
    }

    /**
     * @param	AttributeKey $attributeKey The attributeKey object to remove.
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function removeAttributeKey($attributeKey)
    {
        if ($this->getAttributeKeys()->contains($attributeKey)) {
            $this->collAttributeKeys->remove($this->collAttributeKeys->search($attributeKey));
            if (null === $this->attributeKeysScheduledForDeletion) {
                $this->attributeKeysScheduledForDeletion = clone $this->collAttributeKeys;
                $this->attributeKeysScheduledForDeletion->clear();
            }
            $this->attributeKeysScheduledForDeletion[]= clone $attributeKey;
            $attributeKey->setScope(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_category_scope = null;
        $this->name = null;
        $this->created_at = null;
        $this->updated_at = null;
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
            if ($this->collCategories) {
                foreach ($this->collCategories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAttributeKeys) {
                foreach ($this->collAttributeKeys as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCategories instanceof PropelCollection) {
            $this->collCategories->clearIterator();
        }
        $this->collCategories = null;
        if ($this->collAttributeKeys instanceof PropelCollection) {
            $this->collAttributeKeys->clearIterator();
        }
        $this->collAttributeKeys = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::DEFAULT_STRING_FORMAT);
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

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategoryScope The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::UPDATED_AT;

        return $this;
    }

}
