<?php


/**
 * Base class that represents a row from the 'pac_cms_page_type' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsPageType extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_cms_page_type field.
     * @var        int
     */
    protected $id_cms_page_type;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the layout field.
     * @var        string
     */
    protected $layout;

    /**
     * The value for the view field.
     * @var        string
     */
    protected $view;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsPage[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_PacCmsPage objects.
     */
    protected $collPages;
    protected $collPagesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects.
     */
    protected $collElementTypePageTypeConstraints;
    protected $collElementTypePageTypeConstraintsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElementType[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_PacCmsElementType objects.
     */
    protected $collElementTypes;

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
    protected $elementTypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $elementTypePageTypeConstraintsScheduledForDeletion = null;

    /**
     * Get the [id_cms_page_type] column value.
     *
     * @return int
     */
    public function getIdCmsPageType()
    {
        return $this->id_cms_page_type;
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
     * Get the [layout] column value.
     *
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Get the [view] column value.
     *
     * @return string
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of [id_cms_page_type] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setIdCmsPageType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_cms_page_type !== $v) {
            $this->id_cms_page_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE;
        }


        return $this;
    } // setIdCmsPageType()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [layout] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setLayout($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->layout !== $v) {
            $this->layout = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::LAYOUT;
        }


        return $this;
    } // setLayout()

    /**
     * Set the value of [view] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setView($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->view !== $v) {
            $this->view = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::VIEW;
        }


        return $this;
    } // setView()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

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

            $this->id_cms_page_type = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->layout = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->view = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Cms_Persistence_PacCmsPageType object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPages = null;

            $this->collElementTypePageTypeConstraints = null;

            $this->collElementTypes = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::addInstanceToPool($this);
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

            if ($this->elementTypesScheduledForDeletion !== null) {
                if (!$this->elementTypesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->elementTypesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    ElementTypePageTypeConstraintQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->elementTypesScheduledForDeletion = null;
                }

                foreach ($this->getElementTypes() as $elementType) {
                    if ($elementType->isModified()) {
                        $elementType->save($con);
                    }
                }
            } elseif ($this->collElementTypes) {
                foreach ($this->collElementTypes as $elementType) {
                    if ($elementType->isModified()) {
                        $elementType->save($con);
                    }
                }
            }

            if ($this->pagesScheduledForDeletion !== null) {
                if (!$this->pagesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_PacCmsPageQuery::create()
                        ->filterByPrimaryKeys($this->pagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pagesScheduledForDeletion = null;
                }
            }

            if ($this->collPages !== null) {
                foreach ($this->collPages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->elementTypePageTypeConstraintsScheduledForDeletion !== null) {
                if (!$this->elementTypePageTypeConstraintsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery::create()
                        ->filterByPrimaryKeys($this->elementTypePageTypeConstraintsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->elementTypePageTypeConstraintsScheduledForDeletion = null;
                }
            }

            if ($this->collElementTypePageTypeConstraints !== null) {
                foreach ($this->collElementTypePageTypeConstraints as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE;
        if (null !== $this->id_cms_page_type) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`id_cms_page_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::LAYOUT)) {
            $modifiedColumns[':p' . $index++]  = '`layout`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::VIEW)) {
            $modifiedColumns[':p' . $index++]  = '`view`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_cms_page_type` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_cms_page_type`':
                        $stmt->bindValue($identifier, $this->id_cms_page_type, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`layout`':
                        $stmt->bindValue($identifier, $this->layout, PDO::PARAM_STR);
                        break;
                    case '`view`':
                        $stmt->bindValue($identifier, $this->view, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
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
        $this->setIdCmsPageType($pk);

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


            if (($retval = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPages !== null) {
                    foreach ($this->collPages as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collElementTypePageTypeConstraints !== null) {
                    foreach ($this->collElementTypePageTypeConstraints as $referrerFK) {
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
        $pos = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCmsPageType();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getLayout();
                break;
            case 3:
                return $this->getView();
                break;
            case 4:
                return $this->getDescription();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_PacCmsPageType'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_PacCmsPageType'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCmsPageType(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getLayout(),
            $keys[3] => $this->getView(),
            $keys[4] => $this->getDescription(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPages) {
                $result['Pages'] = $this->collPages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collElementTypePageTypeConstraints) {
                $result['ElementTypePageTypeConstraints'] = $this->collElementTypePageTypeConstraints->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCmsPageType($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setLayout($value);
                break;
            case 3:
                $this->setView($value);
                break;
            case 4:
                $this->setDescription($value);
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
        $keys = ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCmsPageType($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLayout($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setView($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $this->id_cms_page_type);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::NAME)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::LAYOUT)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::LAYOUT, $this->layout);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::VIEW)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::VIEW, $this->view);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DESCRIPTION)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DESCRIPTION, $this->description);

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
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::ID_CMS_PAGE_TYPE, $this->id_cms_page_type);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCmsPageType();
    }

    /**
     * Generic method to set the primary key (id_cms_page_type column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCmsPageType($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCmsPageType();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Cms_Persistence_PacCmsPageType (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setLayout($this->getLayout());
        $copyObj->setView($this->getView());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getElementTypePageTypeConstraints() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addElementTypePageTypeConstraint($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCmsPageType(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType Clone of current object.
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer();
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
        if ('Page' == $relationName) {
            $this->initPages();
        }
        if ('ElementTypePageTypeConstraint' == $relationName) {
            $this->initElementTypePageTypeConstraints();
        }
    }

    /**
     * Clears out the collPages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     * @see        addPages()
     */
    public function clearPages()
    {
        $this->collPages = null; // important to set this to null since that means it is uninitialized
        $this->collPagesPartial = null;

        return $this;
    }

    /**
     * reset is the collPages collection loaded partially
     *
     * @return void
     */
    public function resetPartialPages($v = true)
    {
        $this->collPagesPartial = $v;
    }

    /**
     * Initializes the collPages collection.
     *
     * By default this just sets the collPages collection to an empty array (like clearcollPages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPages($overrideExisting = true)
    {
        if (null !== $this->collPages && !$overrideExisting) {
            return;
        }
        $this->collPages = new PropelObjectCollection();
        $this->collPages->setModel('ProjectA_Zed_Cms_Persistence_PacCmsPage');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_PacCmsPage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_PacCmsPageType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsPage[] List of ProjectA_Zed_Cms_Persistence_PacCmsPage objects
     * @throws PropelException
     */
    public function getPages($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPagesPartial && !$this->isNew();
        if (null === $this->collPages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPages) {
                // return empty collection
                $this->initPages();
            } else {
                $collPages = ProjectA_Zed_Cms_Persistence_PacCmsPageQuery::create(null, $criteria)
                    ->filterByPageType($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPagesPartial && count($collPages)) {
                      $this->initPages(false);

                      foreach($collPages as $obj) {
                        if (false == $this->collPages->contains($obj)) {
                          $this->collPages->append($obj);
                        }
                      }

                      $this->collPagesPartial = true;
                    }

                    $collPages->getInternalIterator()->rewind();
                    return $collPages;
                }

                if($partial && $this->collPages) {
                    foreach($this->collPages as $obj) {
                        if($obj->isNew()) {
                            $collPages[] = $obj;
                        }
                    }
                }

                $this->collPages = $collPages;
                $this->collPagesPartial = false;
            }
        }

        return $this->collPages;
    }

    /**
     * Sets a collection of Page objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pages A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setPages(PropelCollection $pages, PropelPDO $con = null)
    {
        $pagesToDelete = $this->getPages(new Criteria(), $con)->diff($pages);

        $this->pagesScheduledForDeletion = unserialize(serialize($pagesToDelete));

        foreach ($pagesToDelete as $pageRemoved) {
            $pageRemoved->setPageType(null);
        }

        $this->collPages = null;
        foreach ($pages as $page) {
            $this->addPage($page);
        }

        $this->collPages = $pages;
        $this->collPagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_PacCmsPage objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_PacCmsPage objects.
     * @throws PropelException
     */
    public function countPages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPagesPartial && !$this->isNew();
        if (null === $this->collPages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPages) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPages());
            }
            $query = ProjectA_Zed_Cms_Persistence_PacCmsPageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPageType($this)
                ->count($con);
        }

        return count($this->collPages);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_PacCmsPage object to this object
     * through the ProjectA_Zed_Cms_Persistence_PacCmsPage foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_PacCmsPage $l ProjectA_Zed_Cms_Persistence_PacCmsPage
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function addPage(ProjectA_Zed_Cms_Persistence_PacCmsPage $l)
    {
        if ($this->collPages === null) {
            $this->initPages();
            $this->collPagesPartial = true;
        }
        if (!in_array($l, $this->collPages->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPage($l);
        }

        return $this;
    }

    /**
     * @param	Page $page The page object to add.
     */
    protected function doAddPage($page)
    {
        $this->collPages[]= $page;
        $page->setPageType($this);
    }

    /**
     * @param	Page $page The page object to remove.
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function removePage($page)
    {
        if ($this->getPages()->contains($page)) {
            $this->collPages->remove($this->collPages->search($page));
            if (null === $this->pagesScheduledForDeletion) {
                $this->pagesScheduledForDeletion = clone $this->collPages;
                $this->pagesScheduledForDeletion->clear();
            }
            $this->pagesScheduledForDeletion[]= clone $page;
            $page->setPageType(null);
        }

        return $this;
    }

    /**
     * Clears out the collElementTypePageTypeConstraints collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     * @see        addElementTypePageTypeConstraints()
     */
    public function clearElementTypePageTypeConstraints()
    {
        $this->collElementTypePageTypeConstraints = null; // important to set this to null since that means it is uninitialized
        $this->collElementTypePageTypeConstraintsPartial = null;

        return $this;
    }

    /**
     * reset is the collElementTypePageTypeConstraints collection loaded partially
     *
     * @return void
     */
    public function resetPartialElementTypePageTypeConstraints($v = true)
    {
        $this->collElementTypePageTypeConstraintsPartial = $v;
    }

    /**
     * Initializes the collElementTypePageTypeConstraints collection.
     *
     * By default this just sets the collElementTypePageTypeConstraints collection to an empty array (like clearcollElementTypePageTypeConstraints());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initElementTypePageTypeConstraints($overrideExisting = true)
    {
        if (null !== $this->collElementTypePageTypeConstraints && !$overrideExisting) {
            return;
        }
        $this->collElementTypePageTypeConstraints = new PropelObjectCollection();
        $this->collElementTypePageTypeConstraints->setModel('ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_PacCmsPageType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint[] List of ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects
     * @throws PropelException
     */
    public function getElementTypePageTypeConstraints($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collElementTypePageTypeConstraintsPartial && !$this->isNew();
        if (null === $this->collElementTypePageTypeConstraints || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collElementTypePageTypeConstraints) {
                // return empty collection
                $this->initElementTypePageTypeConstraints();
            } else {
                $collElementTypePageTypeConstraints = ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery::create(null, $criteria)
                    ->filterByPageType($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collElementTypePageTypeConstraintsPartial && count($collElementTypePageTypeConstraints)) {
                      $this->initElementTypePageTypeConstraints(false);

                      foreach($collElementTypePageTypeConstraints as $obj) {
                        if (false == $this->collElementTypePageTypeConstraints->contains($obj)) {
                          $this->collElementTypePageTypeConstraints->append($obj);
                        }
                      }

                      $this->collElementTypePageTypeConstraintsPartial = true;
                    }

                    $collElementTypePageTypeConstraints->getInternalIterator()->rewind();
                    return $collElementTypePageTypeConstraints;
                }

                if($partial && $this->collElementTypePageTypeConstraints) {
                    foreach($this->collElementTypePageTypeConstraints as $obj) {
                        if($obj->isNew()) {
                            $collElementTypePageTypeConstraints[] = $obj;
                        }
                    }
                }

                $this->collElementTypePageTypeConstraints = $collElementTypePageTypeConstraints;
                $this->collElementTypePageTypeConstraintsPartial = false;
            }
        }

        return $this->collElementTypePageTypeConstraints;
    }

    /**
     * Sets a collection of ElementTypePageTypeConstraint objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $elementTypePageTypeConstraints A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setElementTypePageTypeConstraints(PropelCollection $elementTypePageTypeConstraints, PropelPDO $con = null)
    {
        $elementTypePageTypeConstraintsToDelete = $this->getElementTypePageTypeConstraints(new Criteria(), $con)->diff($elementTypePageTypeConstraints);

        $this->elementTypePageTypeConstraintsScheduledForDeletion = unserialize(serialize($elementTypePageTypeConstraintsToDelete));

        foreach ($elementTypePageTypeConstraintsToDelete as $elementTypePageTypeConstraintRemoved) {
            $elementTypePageTypeConstraintRemoved->setPageType(null);
        }

        $this->collElementTypePageTypeConstraints = null;
        foreach ($elementTypePageTypeConstraints as $elementTypePageTypeConstraint) {
            $this->addElementTypePageTypeConstraint($elementTypePageTypeConstraint);
        }

        $this->collElementTypePageTypeConstraints = $elementTypePageTypeConstraints;
        $this->collElementTypePageTypeConstraintsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects.
     * @throws PropelException
     */
    public function countElementTypePageTypeConstraints(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collElementTypePageTypeConstraintsPartial && !$this->isNew();
        if (null === $this->collElementTypePageTypeConstraints || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collElementTypePageTypeConstraints) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getElementTypePageTypeConstraints());
            }
            $query = ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPageType($this)
                ->count($con);
        }

        return count($this->collElementTypePageTypeConstraints);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint object to this object
     * through the ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint $l ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function addElementTypePageTypeConstraint(ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint $l)
    {
        if ($this->collElementTypePageTypeConstraints === null) {
            $this->initElementTypePageTypeConstraints();
            $this->collElementTypePageTypeConstraintsPartial = true;
        }
        if (!in_array($l, $this->collElementTypePageTypeConstraints->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddElementTypePageTypeConstraint($l);
        }

        return $this;
    }

    /**
     * @param	ElementTypePageTypeConstraint $elementTypePageTypeConstraint The elementTypePageTypeConstraint object to add.
     */
    protected function doAddElementTypePageTypeConstraint($elementTypePageTypeConstraint)
    {
        $this->collElementTypePageTypeConstraints[]= $elementTypePageTypeConstraint;
        $elementTypePageTypeConstraint->setPageType($this);
    }

    /**
     * @param	ElementTypePageTypeConstraint $elementTypePageTypeConstraint The elementTypePageTypeConstraint object to remove.
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function removeElementTypePageTypeConstraint($elementTypePageTypeConstraint)
    {
        if ($this->getElementTypePageTypeConstraints()->contains($elementTypePageTypeConstraint)) {
            $this->collElementTypePageTypeConstraints->remove($this->collElementTypePageTypeConstraints->search($elementTypePageTypeConstraint));
            if (null === $this->elementTypePageTypeConstraintsScheduledForDeletion) {
                $this->elementTypePageTypeConstraintsScheduledForDeletion = clone $this->collElementTypePageTypeConstraints;
                $this->elementTypePageTypeConstraintsScheduledForDeletion->clear();
            }
            $this->elementTypePageTypeConstraintsScheduledForDeletion[]= clone $elementTypePageTypeConstraint;
            $elementTypePageTypeConstraint->setPageType(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsPageType is new, it will return
     * an empty collection; or if this PacCmsPageType has previously
     * been saved, it will retrieve related ElementTypePageTypeConstraints from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsPageType.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint[] List of ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint objects
     */
    public function getElementTypePageTypeConstraintsJoinElementType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraintQuery::create(null, $criteria);
        $query->joinWith('ElementType', $join_behavior);

        return $this->getElementTypePageTypeConstraints($query, $con);
    }

    /**
     * Clears out the collElementTypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     * @see        addElementTypes()
     */
    public function clearElementTypes()
    {
        $this->collElementTypes = null; // important to set this to null since that means it is uninitialized
        $this->collElementTypesPartial = null;

        return $this;
    }

    /**
     * Initializes the collElementTypes collection.
     *
     * By default this just sets the collElementTypes collection to an empty collection (like clearElementTypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initElementTypes()
    {
        $this->collElementTypes = new PropelObjectCollection();
        $this->collElementTypes->setModel('ProjectA_Zed_Cms_Persistence_PacCmsElementType');
    }

    /**
     * Gets a collection of ProjectA_Zed_Cms_Persistence_PacCmsElementType objects related by a many-to-many relationship
     * to the current object by way of the pac_cms_elementtype_pagetype_constraint cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_PacCmsPageType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElementType[] List of ProjectA_Zed_Cms_Persistence_PacCmsElementType objects
     */
    public function getElementTypes($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collElementTypes || null !== $criteria) {
            if ($this->isNew() && null === $this->collElementTypes) {
                // return empty collection
                $this->initElementTypes();
            } else {
                $collElementTypes = ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery::create(null, $criteria)
                    ->filterByPageType($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collElementTypes;
                }
                $this->collElementTypes = $collElementTypes;
            }
        }

        return $this->collElementTypes;
    }

    /**
     * Sets a collection of ProjectA_Zed_Cms_Persistence_PacCmsElementType objects related by a many-to-many relationship
     * to the current object by way of the pac_cms_elementtype_pagetype_constraint cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $elementTypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function setElementTypes(PropelCollection $elementTypes, PropelPDO $con = null)
    {
        $this->clearElementTypes();
        $currentElementTypes = $this->getElementTypes();

        $this->elementTypesScheduledForDeletion = $currentElementTypes->diff($elementTypes);

        foreach ($elementTypes as $elementType) {
            if (!$currentElementTypes->contains($elementType)) {
                $this->doAddElementType($elementType);
            }
        }

        $this->collElementTypes = $elementTypes;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Cms_Persistence_PacCmsElementType objects related by a many-to-many relationship
     * to the current object by way of the pac_cms_elementtype_pagetype_constraint cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Cms_Persistence_PacCmsElementType objects
     */
    public function countElementTypes($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collElementTypes || null !== $criteria) {
            if ($this->isNew() && null === $this->collElementTypes) {
                return 0;
            } else {
                $query = ProjectA_Zed_Cms_Persistence_PacCmsElementTypeQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPageType($this)
                    ->count($con);
            }
        } else {
            return count($this->collElementTypes);
        }
    }

    /**
     * Associate a ProjectA_Zed_Cms_Persistence_PacCmsElementType object to this object
     * through the pac_cms_elementtype_pagetype_constraint cross reference table.
     *
     * @param  ProjectA_Zed_Cms_Persistence_PacCmsElementType $pacCmsElementType The ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint object to relate
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function addElementType(ProjectA_Zed_Cms_Persistence_PacCmsElementType $pacCmsElementType)
    {
        if ($this->collElementTypes === null) {
            $this->initElementTypes();
        }
        if (!$this->collElementTypes->contains($pacCmsElementType)) { // only add it if the **same** object is not already associated
            $this->doAddElementType($pacCmsElementType);

            $this->collElementTypes[]= $pacCmsElementType;
        }

        return $this;
    }

    /**
     * @param	ElementType $elementType The elementType object to add.
     */
    protected function doAddElementType($elementType)
    {
        $pacElementTypePageTypeConstraint = new ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint();
        $pacElementTypePageTypeConstraint->setElementType($elementType);
        $this->addElementTypePageTypeConstraint($pacElementTypePageTypeConstraint);
    }

    /**
     * Remove a ProjectA_Zed_Cms_Persistence_PacCmsElementType object to this object
     * through the pac_cms_elementtype_pagetype_constraint cross reference table.
     *
     * @param ProjectA_Zed_Cms_Persistence_PacCmsElementType $pacCmsElementType The ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint object to relate
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The current object (for fluent API support)
     */
    public function removeElementType(ProjectA_Zed_Cms_Persistence_PacCmsElementType $pacCmsElementType)
    {
        if ($this->getElementTypes()->contains($pacCmsElementType)) {
            $this->collElementTypes->remove($this->collElementTypes->search($pacCmsElementType));
            if (null === $this->elementTypesScheduledForDeletion) {
                $this->elementTypesScheduledForDeletion = clone $this->collElementTypes;
                $this->elementTypesScheduledForDeletion->clear();
            }
            $this->elementTypesScheduledForDeletion[]= $pacCmsElementType;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_cms_page_type = null;
        $this->name = null;
        $this->layout = null;
        $this->view = null;
        $this->description = null;
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
            if ($this->collPages) {
                foreach ($this->collPages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collElementTypePageTypeConstraints) {
                foreach ($this->collElementTypePageTypeConstraints as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collElementTypes) {
                foreach ($this->collElementTypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPages instanceof PropelCollection) {
            $this->collPages->clearIterator();
        }
        $this->collPages = null;
        if ($this->collElementTypePageTypeConstraints instanceof PropelCollection) {
            $this->collElementTypePageTypeConstraints->clearIterator();
        }
        $this->collElementTypePageTypeConstraints = null;
        if ($this->collElementTypes instanceof PropelCollection) {
            $this->collElementTypes->clearIterator();
        }
        $this->collElementTypes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Cms_Persistence_PacCmsPageTypePeer::DEFAULT_STRING_FORMAT);
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
