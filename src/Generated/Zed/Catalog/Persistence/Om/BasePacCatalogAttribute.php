<?php


/**
 * Base class that represents a row from the 'pac_catalog_attribute' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogAttribute extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_attribute field.
     * @var        int
     */
    protected $id_catalog_attribute;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueType[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueType objects.
     */
    protected $collValueTypes;
    protected $collValueTypesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup objects.
     */
    protected $collAttributeGroups;
    protected $collAttributeGroupsPartial;

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
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects.
     */
    protected $collIntegers;
    protected $collIntegersPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects.
     */
    protected $collTimestamps;
    protected $collTimestampsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects.
     */
    protected $collDecimals;
    protected $collDecimalsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueText[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects.
     */
    protected $collTexts;
    protected $collTextsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects.
     */
    protected $collTextAreas;
    protected $collTextAreasPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects.
     */
    protected $collBooleans;
    protected $collBooleansPartial;

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
    protected $optionMultisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionSinglesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $integersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $timestampsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $decimalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $textsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $textAreasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $booleansScheduledForDeletion = null;

    /**
     * Get the [id_catalog_attribute] column value.
     *
     * @return int
     */
    public function getIdCatalogAttribute()
    {
        return $this->id_catalog_attribute;
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
     * Set the value of [id_catalog_attribute] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setIdCatalogAttribute($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_attribute !== $v) {
            $this->id_catalog_attribute = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE;
        }


        return $this;
    } // setIdCatalogAttribute()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::NAME;
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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_catalog_attribute = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 2; // 2 = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collValueTypes = null;

            $this->collAttributeGroups = null;

            $this->collOptionMultis = null;

            $this->collOptionSingles = null;

            $this->collIntegers = null;

            $this->collTimestamps = null;

            $this->collDecimals = null;

            $this->collTexts = null;

            $this->collTextAreas = null;

            $this->collBooleans = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::addInstanceToPool($this);
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

            if ($this->groupsScheduledForDeletion !== null) {
                if (!$this->groupsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->groupsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    AttributeGroupQuery::create()
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

            if ($this->valueTypesScheduledForDeletion !== null) {
                if (!$this->valueTypesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create()
                        ->filterByPrimaryKeys($this->valueTypesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->valueTypesScheduledForDeletion = null;
                }
            }

            if ($this->collValueTypes !== null) {
                foreach ($this->collValueTypes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->attributeGroupsScheduledForDeletion !== null) {
                if (!$this->attributeGroupsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroupQuery::create()
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

            if ($this->integersScheduledForDeletion !== null) {
                if (!$this->integersScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create()
                        ->filterByPrimaryKeys($this->integersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->integersScheduledForDeletion = null;
                }
            }

            if ($this->collIntegers !== null) {
                foreach ($this->collIntegers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->timestampsScheduledForDeletion !== null) {
                if (!$this->timestampsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create()
                        ->filterByPrimaryKeys($this->timestampsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->timestampsScheduledForDeletion = null;
                }
            }

            if ($this->collTimestamps !== null) {
                foreach ($this->collTimestamps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->decimalsScheduledForDeletion !== null) {
                if (!$this->decimalsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create()
                        ->filterByPrimaryKeys($this->decimalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->decimalsScheduledForDeletion = null;
                }
            }

            if ($this->collDecimals !== null) {
                foreach ($this->collDecimals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->textsScheduledForDeletion !== null) {
                if (!$this->textsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create()
                        ->filterByPrimaryKeys($this->textsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->textsScheduledForDeletion = null;
                }
            }

            if ($this->collTexts !== null) {
                foreach ($this->collTexts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->textAreasScheduledForDeletion !== null) {
                if (!$this->textAreasScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create()
                        ->filterByPrimaryKeys($this->textAreasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->textAreasScheduledForDeletion = null;
                }
            }

            if ($this->collTextAreas !== null) {
                foreach ($this->collTextAreas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->booleansScheduledForDeletion !== null) {
                if (!$this->booleansScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create()
                        ->filterByPrimaryKeys($this->booleansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->booleansScheduledForDeletion = null;
                }
            }

            if ($this->collBooleans !== null) {
                foreach ($this->collBooleans as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE;
        if (null !== $this->id_catalog_attribute) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_attribute`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_attribute` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_catalog_attribute`':
                        $stmt->bindValue($identifier, $this->id_catalog_attribute, PDO::PARAM_INT);
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
        $this->setIdCatalogAttribute($pk);

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


            if (($retval = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collValueTypes !== null) {
                    foreach ($this->collValueTypes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAttributeGroups !== null) {
                    foreach ($this->collAttributeGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
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

                if ($this->collIntegers !== null) {
                    foreach ($this->collIntegers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTimestamps !== null) {
                    foreach ($this->collTimestamps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDecimals !== null) {
                    foreach ($this->collDecimals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTexts !== null) {
                    foreach ($this->collTexts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTextAreas !== null) {
                    foreach ($this->collTextAreas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBooleans !== null) {
                    foreach ($this->collBooleans as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCatalogAttribute();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogAttribute(),
            $keys[1] => $this->getName(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collValueTypes) {
                $result['ValueTypes'] = $this->collValueTypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAttributeGroups) {
                $result['AttributeGroups'] = $this->collAttributeGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOptionMultis) {
                $result['OptionMultis'] = $this->collOptionMultis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOptionSingles) {
                $result['OptionSingles'] = $this->collOptionSingles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collIntegers) {
                $result['Integers'] = $this->collIntegers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTimestamps) {
                $result['Timestamps'] = $this->collTimestamps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDecimals) {
                $result['Decimals'] = $this->collDecimals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTexts) {
                $result['Texts'] = $this->collTexts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTextAreas) {
                $result['TextAreas'] = $this->collTextAreas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBooleans) {
                $result['Booleans'] = $this->collBooleans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCatalogAttribute($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogAttribute($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $this->id_catalog_attribute);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::NAME)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::NAME, $this->name);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::ID_CATALOG_ATTRIBUTE, $this->id_catalog_attribute);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCatalogAttribute();
    }

    /**
     * Generic method to set the primary key (id_catalog_attribute column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCatalogAttribute($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCatalogAttribute();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute (or compatible) type.
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

            foreach ($this->getValueTypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addValueType($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAttributeGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAttributeGroup($relObj->copy($deepCopy));
                }
            }

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

            foreach ($this->getIntegers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInteger($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTimestamps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTimestamp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDecimals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDecimal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTexts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addText($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTextAreas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTextArea($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBooleans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBoolean($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCatalogAttribute(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer();
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
        if ('ValueType' == $relationName) {
            $this->initValueTypes();
        }
        if ('AttributeGroup' == $relationName) {
            $this->initAttributeGroups();
        }
        if ('OptionMulti' == $relationName) {
            $this->initOptionMultis();
        }
        if ('OptionSingle' == $relationName) {
            $this->initOptionSingles();
        }
        if ('Integer' == $relationName) {
            $this->initIntegers();
        }
        if ('Timestamp' == $relationName) {
            $this->initTimestamps();
        }
        if ('Decimal' == $relationName) {
            $this->initDecimals();
        }
        if ('Text' == $relationName) {
            $this->initTexts();
        }
        if ('TextArea' == $relationName) {
            $this->initTextAreas();
        }
        if ('Boolean' == $relationName) {
            $this->initBooleans();
        }
    }

    /**
     * Clears out the collValueTypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     * @see        addValueTypes()
     */
    public function clearValueTypes()
    {
        $this->collValueTypes = null; // important to set this to null since that means it is uninitialized
        $this->collValueTypesPartial = null;

        return $this;
    }

    /**
     * reset is the collValueTypes collection loaded partially
     *
     * @return void
     */
    public function resetPartialValueTypes($v = true)
    {
        $this->collValueTypesPartial = $v;
    }

    /**
     * Initializes the collValueTypes collection.
     *
     * By default this just sets the collValueTypes collection to an empty array (like clearcollValueTypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initValueTypes($overrideExisting = true)
    {
        if (null !== $this->collValueTypes && !$overrideExisting) {
            return;
        }
        $this->collValueTypes = new PropelObjectCollection();
        $this->collValueTypes->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueType');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueType[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueType objects
     * @throws PropelException
     */
    public function getValueTypes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collValueTypesPartial && !$this->isNew();
        if (null === $this->collValueTypes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collValueTypes) {
                // return empty collection
                $this->initValueTypes();
            } else {
                $collValueTypes = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collValueTypesPartial && count($collValueTypes)) {
                      $this->initValueTypes(false);

                      foreach($collValueTypes as $obj) {
                        if (false == $this->collValueTypes->contains($obj)) {
                          $this->collValueTypes->append($obj);
                        }
                      }

                      $this->collValueTypesPartial = true;
                    }

                    $collValueTypes->getInternalIterator()->rewind();
                    return $collValueTypes;
                }

                if($partial && $this->collValueTypes) {
                    foreach($this->collValueTypes as $obj) {
                        if($obj->isNew()) {
                            $collValueTypes[] = $obj;
                        }
                    }
                }

                $this->collValueTypes = $collValueTypes;
                $this->collValueTypesPartial = false;
            }
        }

        return $this->collValueTypes;
    }

    /**
     * Sets a collection of ValueType objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $valueTypes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setValueTypes(PropelCollection $valueTypes, PropelPDO $con = null)
    {
        $valueTypesToDelete = $this->getValueTypes(new Criteria(), $con)->diff($valueTypes);

        $this->valueTypesScheduledForDeletion = unserialize(serialize($valueTypesToDelete));

        foreach ($valueTypesToDelete as $valueTypeRemoved) {
            $valueTypeRemoved->setAttribute(null);
        }

        $this->collValueTypes = null;
        foreach ($valueTypes as $valueType) {
            $this->addValueType($valueType);
        }

        $this->collValueTypes = $valueTypes;
        $this->collValueTypesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueType objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueType objects.
     * @throws PropelException
     */
    public function countValueTypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collValueTypesPartial && !$this->isNew();
        if (null === $this->collValueTypes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collValueTypes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getValueTypes());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collValueTypes);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueType object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueType foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueType $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueType
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addValueType(ProjectA_Zed_Catalog_Persistence_PacCatalogValueType $l)
    {
        if ($this->collValueTypes === null) {
            $this->initValueTypes();
            $this->collValueTypesPartial = true;
        }
        if (!in_array($l, $this->collValueTypes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddValueType($l);
        }

        return $this;
    }

    /**
     * @param	ValueType $valueType The valueType object to add.
     */
    protected function doAddValueType($valueType)
    {
        $this->collValueTypes[]= $valueType;
        $valueType->setAttribute($this);
    }

    /**
     * @param	ValueType $valueType The valueType object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function removeValueType($valueType)
    {
        if ($this->getValueTypes()->contains($valueType)) {
            $this->collValueTypes->remove($this->collValueTypes->search($valueType));
            if (null === $this->valueTypesScheduledForDeletion) {
                $this->valueTypesScheduledForDeletion = clone $this->collValueTypes;
                $this->valueTypesScheduledForDeletion->clear();
            }
            $this->valueTypesScheduledForDeletion[]= clone $valueType;
            $valueType->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related ValueTypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueType[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueType objects
     */
    public function getValueTypesJoinAttributeSet($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create(null, $criteria);
        $query->joinWith('AttributeSet', $join_behavior);

        return $this->getValueTypes($query, $con);
    }

    /**
     * Clears out the collAttributeGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
        $this->collAttributeGroups->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup objects
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
                $collAttributeGroups = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroupQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAttributeGroupsPartial && count($collAttributeGroups)) {
                      $this->initAttributeGroups(false);

                      foreach($collAttributeGroups as $obj) {
                        if (false == $this->collAttributeGroups->contains($obj)) {
                          $this->collAttributeGroups->append($obj);
                        }
                      }

                      $this->collAttributeGroupsPartial = true;
                    }

                    $collAttributeGroups->getInternalIterator()->rewind();
                    return $collAttributeGroups;
                }

                if($partial && $this->collAttributeGroups) {
                    foreach($this->collAttributeGroups as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setAttributeGroups(PropelCollection $attributeGroups, PropelPDO $con = null)
    {
        $attributeGroupsToDelete = $this->getAttributeGroups(new Criteria(), $con)->diff($attributeGroups);

        $this->attributeGroupsScheduledForDeletion = unserialize(serialize($attributeGroupsToDelete));

        foreach ($attributeGroupsToDelete as $attributeGroupRemoved) {
            $attributeGroupRemoved->setAttribute(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup objects.
     * @throws PropelException
     */
    public function countAttributeGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAttributeGroupsPartial && !$this->isNew();
        if (null === $this->collAttributeGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributeGroups) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAttributeGroups());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collAttributeGroups);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup $l ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addAttributeGroup(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup $l)
    {
        if ($this->collAttributeGroups === null) {
            $this->initAttributeGroups();
            $this->collAttributeGroupsPartial = true;
        }
        if (!in_array($l, $this->collAttributeGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAttributeGroup($l);
        }

        return $this;
    }

    /**
     * @param	AttributeGroup $attributeGroup The attributeGroup object to add.
     */
    protected function doAddAttributeGroup($attributeGroup)
    {
        $this->collAttributeGroups[]= $attributeGroup;
        $attributeGroup->setAttribute($this);
    }

    /**
     * @param	AttributeGroup $attributeGroup The attributeGroup object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
            $attributeGroup->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related AttributeGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup objects
     */
    public function getAttributeGroupsJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroupQuery::create(null, $criteria);
        $query->joinWith('Group', $join_behavior);

        return $this->getAttributeGroups($query, $con);
    }

    /**
     * Clears out the collOptionMultis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
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
                    ->filterByAttribute($this)
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setOptionMultis(PropelCollection $optionMultis, PropelPDO $con = null)
    {
        $optionMultisToDelete = $this->getOptionMultis(new Criteria(), $con)->diff($optionMultis);

        $this->optionMultisScheduledForDeletion = unserialize(serialize($optionMultisToDelete));

        foreach ($optionMultisToDelete as $optionMultiRemoved) {
            $optionMultiRemoved->setAttribute(null);
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
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collOptionMultis);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
        $optionMulti->setAttribute($this);
    }

    /**
     * @param	OptionMulti $optionMulti The optionMulti object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
            $optionMulti->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related OptionMultis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects
     */
    public function getOptionMultisJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getOptionMultis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related OptionMultis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
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
                    ->filterByAttribute($this)
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setOptionSingles(PropelCollection $optionSingles, PropelPDO $con = null)
    {
        $optionSinglesToDelete = $this->getOptionSingles(new Criteria(), $con)->diff($optionSingles);

        $this->optionSinglesScheduledForDeletion = unserialize(serialize($optionSinglesToDelete));

        foreach ($optionSinglesToDelete as $optionSingleRemoved) {
            $optionSingleRemoved->setAttribute(null);
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
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collOptionSingles);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
        $optionSingle->setAttribute($this);
    }

    /**
     * @param	OptionSingle $optionSingle The optionSingle object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
            $optionSingle->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related OptionSingles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects
     */
    public function getOptionSinglesJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getOptionSingles($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related OptionSingles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
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
     * Clears out the collIntegers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     * @see        addIntegers()
     */
    public function clearIntegers()
    {
        $this->collIntegers = null; // important to set this to null since that means it is uninitialized
        $this->collIntegersPartial = null;

        return $this;
    }

    /**
     * reset is the collIntegers collection loaded partially
     *
     * @return void
     */
    public function resetPartialIntegers($v = true)
    {
        $this->collIntegersPartial = $v;
    }

    /**
     * Initializes the collIntegers collection.
     *
     * By default this just sets the collIntegers collection to an empty array (like clearcollIntegers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initIntegers($overrideExisting = true)
    {
        if (null !== $this->collIntegers && !$overrideExisting) {
            return;
        }
        $this->collIntegers = new PropelObjectCollection();
        $this->collIntegers->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects
     * @throws PropelException
     */
    public function getIntegers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collIntegersPartial && !$this->isNew();
        if (null === $this->collIntegers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collIntegers) {
                // return empty collection
                $this->initIntegers();
            } else {
                $collIntegers = ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collIntegersPartial && count($collIntegers)) {
                      $this->initIntegers(false);

                      foreach($collIntegers as $obj) {
                        if (false == $this->collIntegers->contains($obj)) {
                          $this->collIntegers->append($obj);
                        }
                      }

                      $this->collIntegersPartial = true;
                    }

                    $collIntegers->getInternalIterator()->rewind();
                    return $collIntegers;
                }

                if($partial && $this->collIntegers) {
                    foreach($this->collIntegers as $obj) {
                        if($obj->isNew()) {
                            $collIntegers[] = $obj;
                        }
                    }
                }

                $this->collIntegers = $collIntegers;
                $this->collIntegersPartial = false;
            }
        }

        return $this->collIntegers;
    }

    /**
     * Sets a collection of Integer objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $integers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setIntegers(PropelCollection $integers, PropelPDO $con = null)
    {
        $integersToDelete = $this->getIntegers(new Criteria(), $con)->diff($integers);

        $this->integersScheduledForDeletion = unserialize(serialize($integersToDelete));

        foreach ($integersToDelete as $integerRemoved) {
            $integerRemoved->setAttribute(null);
        }

        $this->collIntegers = null;
        foreach ($integers as $integer) {
            $this->addInteger($integer);
        }

        $this->collIntegers = $integers;
        $this->collIntegersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects.
     * @throws PropelException
     */
    public function countIntegers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collIntegersPartial && !$this->isNew();
        if (null === $this->collIntegers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collIntegers) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getIntegers());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collIntegers);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addInteger(ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger $l)
    {
        if ($this->collIntegers === null) {
            $this->initIntegers();
            $this->collIntegersPartial = true;
        }
        if (!in_array($l, $this->collIntegers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInteger($l);
        }

        return $this;
    }

    /**
     * @param	Integer $integer The integer object to add.
     */
    protected function doAddInteger($integer)
    {
        $this->collIntegers[]= $integer;
        $integer->setAttribute($this);
    }

    /**
     * @param	Integer $integer The integer object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function removeInteger($integer)
    {
        if ($this->getIntegers()->contains($integer)) {
            $this->collIntegers->remove($this->collIntegers->search($integer));
            if (null === $this->integersScheduledForDeletion) {
                $this->integersScheduledForDeletion = clone $this->collIntegers;
                $this->integersScheduledForDeletion->clear();
            }
            $this->integersScheduledForDeletion[]= clone $integer;
            $integer->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related Integers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects
     */
    public function getIntegersJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getIntegers($query, $con);
    }

    /**
     * Clears out the collTimestamps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     * @see        addTimestamps()
     */
    public function clearTimestamps()
    {
        $this->collTimestamps = null; // important to set this to null since that means it is uninitialized
        $this->collTimestampsPartial = null;

        return $this;
    }

    /**
     * reset is the collTimestamps collection loaded partially
     *
     * @return void
     */
    public function resetPartialTimestamps($v = true)
    {
        $this->collTimestampsPartial = $v;
    }

    /**
     * Initializes the collTimestamps collection.
     *
     * By default this just sets the collTimestamps collection to an empty array (like clearcollTimestamps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTimestamps($overrideExisting = true)
    {
        if (null !== $this->collTimestamps && !$overrideExisting) {
            return;
        }
        $this->collTimestamps = new PropelObjectCollection();
        $this->collTimestamps->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects
     * @throws PropelException
     */
    public function getTimestamps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTimestampsPartial && !$this->isNew();
        if (null === $this->collTimestamps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTimestamps) {
                // return empty collection
                $this->initTimestamps();
            } else {
                $collTimestamps = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTimestampsPartial && count($collTimestamps)) {
                      $this->initTimestamps(false);

                      foreach($collTimestamps as $obj) {
                        if (false == $this->collTimestamps->contains($obj)) {
                          $this->collTimestamps->append($obj);
                        }
                      }

                      $this->collTimestampsPartial = true;
                    }

                    $collTimestamps->getInternalIterator()->rewind();
                    return $collTimestamps;
                }

                if($partial && $this->collTimestamps) {
                    foreach($this->collTimestamps as $obj) {
                        if($obj->isNew()) {
                            $collTimestamps[] = $obj;
                        }
                    }
                }

                $this->collTimestamps = $collTimestamps;
                $this->collTimestampsPartial = false;
            }
        }

        return $this->collTimestamps;
    }

    /**
     * Sets a collection of Timestamp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $timestamps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setTimestamps(PropelCollection $timestamps, PropelPDO $con = null)
    {
        $timestampsToDelete = $this->getTimestamps(new Criteria(), $con)->diff($timestamps);

        $this->timestampsScheduledForDeletion = unserialize(serialize($timestampsToDelete));

        foreach ($timestampsToDelete as $timestampRemoved) {
            $timestampRemoved->setAttribute(null);
        }

        $this->collTimestamps = null;
        foreach ($timestamps as $timestamp) {
            $this->addTimestamp($timestamp);
        }

        $this->collTimestamps = $timestamps;
        $this->collTimestampsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects.
     * @throws PropelException
     */
    public function countTimestamps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTimestampsPartial && !$this->isNew();
        if (null === $this->collTimestamps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTimestamps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTimestamps());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collTimestamps);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addTimestamp(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp $l)
    {
        if ($this->collTimestamps === null) {
            $this->initTimestamps();
            $this->collTimestampsPartial = true;
        }
        if (!in_array($l, $this->collTimestamps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTimestamp($l);
        }

        return $this;
    }

    /**
     * @param	Timestamp $timestamp The timestamp object to add.
     */
    protected function doAddTimestamp($timestamp)
    {
        $this->collTimestamps[]= $timestamp;
        $timestamp->setAttribute($this);
    }

    /**
     * @param	Timestamp $timestamp The timestamp object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function removeTimestamp($timestamp)
    {
        if ($this->getTimestamps()->contains($timestamp)) {
            $this->collTimestamps->remove($this->collTimestamps->search($timestamp));
            if (null === $this->timestampsScheduledForDeletion) {
                $this->timestampsScheduledForDeletion = clone $this->collTimestamps;
                $this->timestampsScheduledForDeletion->clear();
            }
            $this->timestampsScheduledForDeletion[]= clone $timestamp;
            $timestamp->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related Timestamps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects
     */
    public function getTimestampsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getTimestamps($query, $con);
    }

    /**
     * Clears out the collDecimals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     * @see        addDecimals()
     */
    public function clearDecimals()
    {
        $this->collDecimals = null; // important to set this to null since that means it is uninitialized
        $this->collDecimalsPartial = null;

        return $this;
    }

    /**
     * reset is the collDecimals collection loaded partially
     *
     * @return void
     */
    public function resetPartialDecimals($v = true)
    {
        $this->collDecimalsPartial = $v;
    }

    /**
     * Initializes the collDecimals collection.
     *
     * By default this just sets the collDecimals collection to an empty array (like clearcollDecimals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDecimals($overrideExisting = true)
    {
        if (null !== $this->collDecimals && !$overrideExisting) {
            return;
        }
        $this->collDecimals = new PropelObjectCollection();
        $this->collDecimals->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects
     * @throws PropelException
     */
    public function getDecimals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDecimalsPartial && !$this->isNew();
        if (null === $this->collDecimals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDecimals) {
                // return empty collection
                $this->initDecimals();
            } else {
                $collDecimals = ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDecimalsPartial && count($collDecimals)) {
                      $this->initDecimals(false);

                      foreach($collDecimals as $obj) {
                        if (false == $this->collDecimals->contains($obj)) {
                          $this->collDecimals->append($obj);
                        }
                      }

                      $this->collDecimalsPartial = true;
                    }

                    $collDecimals->getInternalIterator()->rewind();
                    return $collDecimals;
                }

                if($partial && $this->collDecimals) {
                    foreach($this->collDecimals as $obj) {
                        if($obj->isNew()) {
                            $collDecimals[] = $obj;
                        }
                    }
                }

                $this->collDecimals = $collDecimals;
                $this->collDecimalsPartial = false;
            }
        }

        return $this->collDecimals;
    }

    /**
     * Sets a collection of Decimal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $decimals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setDecimals(PropelCollection $decimals, PropelPDO $con = null)
    {
        $decimalsToDelete = $this->getDecimals(new Criteria(), $con)->diff($decimals);

        $this->decimalsScheduledForDeletion = unserialize(serialize($decimalsToDelete));

        foreach ($decimalsToDelete as $decimalRemoved) {
            $decimalRemoved->setAttribute(null);
        }

        $this->collDecimals = null;
        foreach ($decimals as $decimal) {
            $this->addDecimal($decimal);
        }

        $this->collDecimals = $decimals;
        $this->collDecimalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects.
     * @throws PropelException
     */
    public function countDecimals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDecimalsPartial && !$this->isNew();
        if (null === $this->collDecimals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDecimals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDecimals());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collDecimals);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addDecimal(ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal $l)
    {
        if ($this->collDecimals === null) {
            $this->initDecimals();
            $this->collDecimalsPartial = true;
        }
        if (!in_array($l, $this->collDecimals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDecimal($l);
        }

        return $this;
    }

    /**
     * @param	Decimal $decimal The decimal object to add.
     */
    protected function doAddDecimal($decimal)
    {
        $this->collDecimals[]= $decimal;
        $decimal->setAttribute($this);
    }

    /**
     * @param	Decimal $decimal The decimal object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function removeDecimal($decimal)
    {
        if ($this->getDecimals()->contains($decimal)) {
            $this->collDecimals->remove($this->collDecimals->search($decimal));
            if (null === $this->decimalsScheduledForDeletion) {
                $this->decimalsScheduledForDeletion = clone $this->collDecimals;
                $this->decimalsScheduledForDeletion->clear();
            }
            $this->decimalsScheduledForDeletion[]= clone $decimal;
            $decimal->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related Decimals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects
     */
    public function getDecimalsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getDecimals($query, $con);
    }

    /**
     * Clears out the collTexts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     * @see        addTexts()
     */
    public function clearTexts()
    {
        $this->collTexts = null; // important to set this to null since that means it is uninitialized
        $this->collTextsPartial = null;

        return $this;
    }

    /**
     * reset is the collTexts collection loaded partially
     *
     * @return void
     */
    public function resetPartialTexts($v = true)
    {
        $this->collTextsPartial = $v;
    }

    /**
     * Initializes the collTexts collection.
     *
     * By default this just sets the collTexts collection to an empty array (like clearcollTexts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTexts($overrideExisting = true)
    {
        if (null !== $this->collTexts && !$overrideExisting) {
            return;
        }
        $this->collTexts = new PropelObjectCollection();
        $this->collTexts->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueText');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueText[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects
     * @throws PropelException
     */
    public function getTexts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTextsPartial && !$this->isNew();
        if (null === $this->collTexts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTexts) {
                // return empty collection
                $this->initTexts();
            } else {
                $collTexts = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTextsPartial && count($collTexts)) {
                      $this->initTexts(false);

                      foreach($collTexts as $obj) {
                        if (false == $this->collTexts->contains($obj)) {
                          $this->collTexts->append($obj);
                        }
                      }

                      $this->collTextsPartial = true;
                    }

                    $collTexts->getInternalIterator()->rewind();
                    return $collTexts;
                }

                if($partial && $this->collTexts) {
                    foreach($this->collTexts as $obj) {
                        if($obj->isNew()) {
                            $collTexts[] = $obj;
                        }
                    }
                }

                $this->collTexts = $collTexts;
                $this->collTextsPartial = false;
            }
        }

        return $this->collTexts;
    }

    /**
     * Sets a collection of Text objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $texts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setTexts(PropelCollection $texts, PropelPDO $con = null)
    {
        $textsToDelete = $this->getTexts(new Criteria(), $con)->diff($texts);

        $this->textsScheduledForDeletion = unserialize(serialize($textsToDelete));

        foreach ($textsToDelete as $textRemoved) {
            $textRemoved->setAttribute(null);
        }

        $this->collTexts = null;
        foreach ($texts as $text) {
            $this->addText($text);
        }

        $this->collTexts = $texts;
        $this->collTextsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects.
     * @throws PropelException
     */
    public function countTexts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTextsPartial && !$this->isNew();
        if (null === $this->collTexts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTexts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTexts());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collTexts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueText object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueText foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueText $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueText
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addText(ProjectA_Zed_Catalog_Persistence_PacCatalogValueText $l)
    {
        if ($this->collTexts === null) {
            $this->initTexts();
            $this->collTextsPartial = true;
        }
        if (!in_array($l, $this->collTexts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddText($l);
        }

        return $this;
    }

    /**
     * @param	Text $text The text object to add.
     */
    protected function doAddText($text)
    {
        $this->collTexts[]= $text;
        $text->setAttribute($this);
    }

    /**
     * @param	Text $text The text object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function removeText($text)
    {
        if ($this->getTexts()->contains($text)) {
            $this->collTexts->remove($this->collTexts->search($text));
            if (null === $this->textsScheduledForDeletion) {
                $this->textsScheduledForDeletion = clone $this->collTexts;
                $this->textsScheduledForDeletion->clear();
            }
            $this->textsScheduledForDeletion[]= clone $text;
            $text->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related Texts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueText[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects
     */
    public function getTextsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getTexts($query, $con);
    }

    /**
     * Clears out the collTextAreas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     * @see        addTextAreas()
     */
    public function clearTextAreas()
    {
        $this->collTextAreas = null; // important to set this to null since that means it is uninitialized
        $this->collTextAreasPartial = null;

        return $this;
    }

    /**
     * reset is the collTextAreas collection loaded partially
     *
     * @return void
     */
    public function resetPartialTextAreas($v = true)
    {
        $this->collTextAreasPartial = $v;
    }

    /**
     * Initializes the collTextAreas collection.
     *
     * By default this just sets the collTextAreas collection to an empty array (like clearcollTextAreas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTextAreas($overrideExisting = true)
    {
        if (null !== $this->collTextAreas && !$overrideExisting) {
            return;
        }
        $this->collTextAreas = new PropelObjectCollection();
        $this->collTextAreas->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects
     * @throws PropelException
     */
    public function getTextAreas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTextAreasPartial && !$this->isNew();
        if (null === $this->collTextAreas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTextAreas) {
                // return empty collection
                $this->initTextAreas();
            } else {
                $collTextAreas = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTextAreasPartial && count($collTextAreas)) {
                      $this->initTextAreas(false);

                      foreach($collTextAreas as $obj) {
                        if (false == $this->collTextAreas->contains($obj)) {
                          $this->collTextAreas->append($obj);
                        }
                      }

                      $this->collTextAreasPartial = true;
                    }

                    $collTextAreas->getInternalIterator()->rewind();
                    return $collTextAreas;
                }

                if($partial && $this->collTextAreas) {
                    foreach($this->collTextAreas as $obj) {
                        if($obj->isNew()) {
                            $collTextAreas[] = $obj;
                        }
                    }
                }

                $this->collTextAreas = $collTextAreas;
                $this->collTextAreasPartial = false;
            }
        }

        return $this->collTextAreas;
    }

    /**
     * Sets a collection of TextArea objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $textAreas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setTextAreas(PropelCollection $textAreas, PropelPDO $con = null)
    {
        $textAreasToDelete = $this->getTextAreas(new Criteria(), $con)->diff($textAreas);

        $this->textAreasScheduledForDeletion = unserialize(serialize($textAreasToDelete));

        foreach ($textAreasToDelete as $textAreaRemoved) {
            $textAreaRemoved->setAttribute(null);
        }

        $this->collTextAreas = null;
        foreach ($textAreas as $textArea) {
            $this->addTextArea($textArea);
        }

        $this->collTextAreas = $textAreas;
        $this->collTextAreasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects.
     * @throws PropelException
     */
    public function countTextAreas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTextAreasPartial && !$this->isNew();
        if (null === $this->collTextAreas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTextAreas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTextAreas());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collTextAreas);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addTextArea(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea $l)
    {
        if ($this->collTextAreas === null) {
            $this->initTextAreas();
            $this->collTextAreasPartial = true;
        }
        if (!in_array($l, $this->collTextAreas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTextArea($l);
        }

        return $this;
    }

    /**
     * @param	TextArea $textArea The textArea object to add.
     */
    protected function doAddTextArea($textArea)
    {
        $this->collTextAreas[]= $textArea;
        $textArea->setAttribute($this);
    }

    /**
     * @param	TextArea $textArea The textArea object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function removeTextArea($textArea)
    {
        if ($this->getTextAreas()->contains($textArea)) {
            $this->collTextAreas->remove($this->collTextAreas->search($textArea));
            if (null === $this->textAreasScheduledForDeletion) {
                $this->textAreasScheduledForDeletion = clone $this->collTextAreas;
                $this->textAreasScheduledForDeletion->clear();
            }
            $this->textAreasScheduledForDeletion[]= clone $textArea;
            $textArea->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related TextAreas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects
     */
    public function getTextAreasJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getTextAreas($query, $con);
    }

    /**
     * Clears out the collBooleans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     * @see        addBooleans()
     */
    public function clearBooleans()
    {
        $this->collBooleans = null; // important to set this to null since that means it is uninitialized
        $this->collBooleansPartial = null;

        return $this;
    }

    /**
     * reset is the collBooleans collection loaded partially
     *
     * @return void
     */
    public function resetPartialBooleans($v = true)
    {
        $this->collBooleansPartial = $v;
    }

    /**
     * Initializes the collBooleans collection.
     *
     * By default this just sets the collBooleans collection to an empty array (like clearcollBooleans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBooleans($overrideExisting = true)
    {
        if (null !== $this->collBooleans && !$overrideExisting) {
            return;
        }
        $this->collBooleans = new PropelObjectCollection();
        $this->collBooleans->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects
     * @throws PropelException
     */
    public function getBooleans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBooleansPartial && !$this->isNew();
        if (null === $this->collBooleans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBooleans) {
                // return empty collection
                $this->initBooleans();
            } else {
                $collBooleans = ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create(null, $criteria)
                    ->filterByAttribute($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBooleansPartial && count($collBooleans)) {
                      $this->initBooleans(false);

                      foreach($collBooleans as $obj) {
                        if (false == $this->collBooleans->contains($obj)) {
                          $this->collBooleans->append($obj);
                        }
                      }

                      $this->collBooleansPartial = true;
                    }

                    $collBooleans->getInternalIterator()->rewind();
                    return $collBooleans;
                }

                if($partial && $this->collBooleans) {
                    foreach($this->collBooleans as $obj) {
                        if($obj->isNew()) {
                            $collBooleans[] = $obj;
                        }
                    }
                }

                $this->collBooleans = $collBooleans;
                $this->collBooleansPartial = false;
            }
        }

        return $this->collBooleans;
    }

    /**
     * Sets a collection of Boolean objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $booleans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function setBooleans(PropelCollection $booleans, PropelPDO $con = null)
    {
        $booleansToDelete = $this->getBooleans(new Criteria(), $con)->diff($booleans);

        $this->booleansScheduledForDeletion = unserialize(serialize($booleansToDelete));

        foreach ($booleansToDelete as $booleanRemoved) {
            $booleanRemoved->setAttribute(null);
        }

        $this->collBooleans = null;
        foreach ($booleans as $boolean) {
            $this->addBoolean($boolean);
        }

        $this->collBooleans = $booleans;
        $this->collBooleansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects.
     * @throws PropelException
     */
    public function countBooleans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBooleansPartial && !$this->isNew();
        if (null === $this->collBooleans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBooleans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBooleans());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAttribute($this)
                ->count($con);
        }

        return count($this->collBooleans);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function addBoolean(ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean $l)
    {
        if ($this->collBooleans === null) {
            $this->initBooleans();
            $this->collBooleansPartial = true;
        }
        if (!in_array($l, $this->collBooleans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBoolean($l);
        }

        return $this;
    }

    /**
     * @param	Boolean $boolean The boolean object to add.
     */
    protected function doAddBoolean($boolean)
    {
        $this->collBooleans[]= $boolean;
        $boolean->setAttribute($this);
    }

    /**
     * @param	Boolean $boolean The boolean object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
     */
    public function removeBoolean($boolean)
    {
        if ($this->getBooleans()->contains($boolean)) {
            $this->collBooleans->remove($this->collBooleans->search($boolean));
            if (null === $this->booleansScheduledForDeletion) {
                $this->booleansScheduledForDeletion = clone $this->collBooleans;
                $this->booleansScheduledForDeletion->clear();
            }
            $this->booleansScheduledForDeletion[]= clone $boolean;
            $boolean->setAttribute(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogAttribute is new, it will return
     * an empty collection; or if this PacCatalogAttribute has previously
     * been saved, it will retrieve related Booleans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogAttribute.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects
     */
    public function getBooleansJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getBooleans($query, $con);
    }

    /**
     * Clears out the collGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
     * to the current object by way of the pac_catalog_attribute_group cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute is new, it will return
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
                    ->filterByAttribute($this)
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
     * to the current object by way of the pac_catalog_attribute_group cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $groups A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
     * to the current object by way of the pac_catalog_attribute_group cross-reference table.
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
                    ->filterByAttribute($this)
                    ->count($con);
            }
        } else {
            return count($this->collGroups);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_PacCatalogGroup object to this object
     * through the pac_catalog_attribute_group cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $pacCatalogGroup The ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
        $pacCatalogAttributeGroup = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup();
        $pacCatalogAttributeGroup->setGroup($group);
        $this->addAttributeGroup($pacCatalogAttributeGroup);
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_PacCatalogGroup object to this object
     * through the pac_catalog_attribute_group cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $pacCatalogGroup The ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute The current object (for fluent API support)
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
        $this->id_catalog_attribute = null;
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
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collValueTypes) {
                foreach ($this->collValueTypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAttributeGroups) {
                foreach ($this->collAttributeGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
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
            if ($this->collIntegers) {
                foreach ($this->collIntegers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTimestamps) {
                foreach ($this->collTimestamps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDecimals) {
                foreach ($this->collDecimals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTexts) {
                foreach ($this->collTexts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTextAreas) {
                foreach ($this->collTextAreas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBooleans) {
                foreach ($this->collBooleans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGroups) {
                foreach ($this->collGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collValueTypes instanceof PropelCollection) {
            $this->collValueTypes->clearIterator();
        }
        $this->collValueTypes = null;
        if ($this->collAttributeGroups instanceof PropelCollection) {
            $this->collAttributeGroups->clearIterator();
        }
        $this->collAttributeGroups = null;
        if ($this->collOptionMultis instanceof PropelCollection) {
            $this->collOptionMultis->clearIterator();
        }
        $this->collOptionMultis = null;
        if ($this->collOptionSingles instanceof PropelCollection) {
            $this->collOptionSingles->clearIterator();
        }
        $this->collOptionSingles = null;
        if ($this->collIntegers instanceof PropelCollection) {
            $this->collIntegers->clearIterator();
        }
        $this->collIntegers = null;
        if ($this->collTimestamps instanceof PropelCollection) {
            $this->collTimestamps->clearIterator();
        }
        $this->collTimestamps = null;
        if ($this->collDecimals instanceof PropelCollection) {
            $this->collDecimals->clearIterator();
        }
        $this->collDecimals = null;
        if ($this->collTexts instanceof PropelCollection) {
            $this->collTexts->clearIterator();
        }
        $this->collTexts = null;
        if ($this->collTextAreas instanceof PropelCollection) {
            $this->collTextAreas->clearIterator();
        }
        $this->collTextAreas = null;
        if ($this->collBooleans instanceof PropelCollection) {
            $this->collBooleans->clearIterator();
        }
        $this->collBooleans = null;
        if ($this->collGroups instanceof PropelCollection) {
            $this->collGroups->clearIterator();
        }
        $this->collGroups = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributePeer::DEFAULT_STRING_FORMAT);
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
