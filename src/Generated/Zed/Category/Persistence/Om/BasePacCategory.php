<?php


/**
 * Base class that represents a row from the 'pac_category' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.om
 */
abstract class Generated_Zed_Category_Persistence_Om_BasePacCategory extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Category_Persistence_PacCategoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Category_Persistence_PacCategoryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_category field.
     * @var        int
     */
    protected $id_category;

    /**
     * The value for the fk_category_name field.
     * @var        int
     */
    protected $fk_category_name;

    /**
     * The value for the fk_category_scope field.
     * @var        int
     */
    protected $fk_category_scope;

    /**
     * The value for the lft field.
     * @var        int
     */
    protected $lft;

    /**
     * The value for the rgt field.
     * @var        int
     */
    protected $rgt;

    /**
     * The value for the level field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $level;

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
     * @var        PacCategoryScope
     */
    protected $aScope;

    /**
     * @var        PacCategoryName
     */
    protected $aName;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategoryAttribute[] Collection to store aggregation of ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects.
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

    // nested_set behavior

    /**
     * Queries to be executed in the save transaction
     * @var        array
     */
    protected $nestedSetQueries = array();

    /**
     * Internal cache for children nodes
     * @var        null|PropelObjectCollection
     */
    protected $collNestedSetChildren = null;

    /**
     * Internal cache for parent node
     * @var        null|ProjectA_Zed_Category_Persistence_PacCategory
     */
    protected $aNestedSetParent = null;


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
        $this->level = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Category_Persistence_Om_BasePacCategory object.
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
     * Get the [fk_category_name] column value.
     *
     * @return int
     */
    public function getFkCategoryName()
    {
        return $this->fk_category_name;
    }

    /**
     * Get the [fk_category_scope] column value.
     *
     * @return int
     */
    public function getFkCategoryScope()
    {
        return $this->fk_category_scope;
    }

    /**
     * Get the [lft] column value.
     *
     * @return int
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Get the [rgt] column value.
     *
     * @return int
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Get the [level] column value.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
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
     * Set the value of [id_category] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setIdCategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_category !== $v) {
            $this->id_category = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY;
        }


        return $this;
    } // setIdCategory()

    /**
     * Set the value of [fk_category_name] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setFkCategoryName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_category_name !== $v) {
            $this->fk_category_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME;
        }

        if ($this->aName !== null && $this->aName->getIdCategoryName() !== $v) {
            $this->aName = null;
        }


        return $this;
    } // setFkCategoryName()

    /**
     * Set the value of [fk_category_scope] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setFkCategoryScope($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_category_scope !== $v) {
            $this->fk_category_scope = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE;
        }

        if ($this->aScope !== null && $this->aScope->getIdCategoryScope() !== $v) {
            $this->aScope = null;
        }


        return $this;
    } // setFkCategoryScope()

    /**
     * Set the value of [lft] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setLft($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->lft !== $v) {
            $this->lft = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT;
        }


        return $this;
    } // setLft()

    /**
     * Set the value of [rgt] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setRgt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rgt !== $v) {
            $this->rgt = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT;
        }


        return $this;
    } // setRgt()

    /**
     * Set the value of [level] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL;
        }


        return $this;
    } // setLevel()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT;
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
            if ($this->level !== 0) {
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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_category = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_category_name = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_category_scope = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->lft = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->rgt = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->level = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->created_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->updated_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Category_Persistence_PacCategory object", $e);
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

        if ($this->aName !== null && $this->fk_category_name !== $this->aName->getIdCategoryName()) {
            $this->aName = null;
        }
        if ($this->aScope !== null && $this->fk_category_scope !== $this->aScope->getIdCategoryScope()) {
            $this->aScope = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aScope = null;
            $this->aName = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // nested_set behavior
            if ($this->isRoot()) {
                throw new PropelException('Deletion of a root node is disabled for nested sets. Use ProjectA_Zed_Category_Persistence_PacCategoryPeer::deleteTree($scope) instead to delete an entire tree');
            }

            if ($this->isInTree()) {
                $this->deleteDescendants($con);
            }

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                // nested_set behavior
                if ($this->isInTree()) {
                    // fill up the room that was used by the node
                    ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues(-2, $this->getRightValue() + 1, null, $this->getScopeValue(), $con);
                }

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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // nested_set behavior
            if ($this->isNew() && $this->isRoot()) {
                // check if no other root exist in, the tree
                $nbRoots = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
                    ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, 1, Criteria::EQUAL)
                    ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $this->getScopeValue(), Criteria::EQUAL)
                    ->count($con);
                if ($nbRoots > 0) {
                        throw new PropelException(sprintf('A root node already exists in this tree with scope "%s".', $this->getScopeValue()));
                }
            }
            $this->processNestedSetQueries($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($this);
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

            if ($this->aScope !== null) {
                if ($this->aScope->isModified() || $this->aScope->isNew()) {
                    $affectedRows += $this->aScope->save($con);
                }
                $this->setScope($this->aScope);
            }

            if ($this->aName !== null) {
                if ($this->aName->isModified() || $this->aName->isNew()) {
                    $affectedRows += $this->aName->save($con);
                }
                $this->setName($this->aName);
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

            if ($this->attributesScheduledForDeletion !== null) {
                if (!$this->attributesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery::create()
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

        $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY;
        if (null !== $this->id_category) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`id_category`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`fk_category_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_category_scope`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT)) {
            $modifiedColumns[':p' . $index++]  = '`lft`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT)) {
            $modifiedColumns[':p' . $index++]  = '`rgt`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL)) {
            $modifiedColumns[':p' . $index++]  = '`level`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_category` (%s) VALUES (%s)',
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
                    case '`fk_category_name`':
                        $stmt->bindValue($identifier, $this->fk_category_name, PDO::PARAM_INT);
                        break;
                    case '`fk_category_scope`':
                        $stmt->bindValue($identifier, $this->fk_category_scope, PDO::PARAM_INT);
                        break;
                    case '`lft`':
                        $stmt->bindValue($identifier, $this->lft, PDO::PARAM_INT);
                        break;
                    case '`rgt`':
                        $stmt->bindValue($identifier, $this->rgt, PDO::PARAM_INT);
                        break;
                    case '`level`':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_INT);
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

            if ($this->aScope !== null) {
                if (!$this->aScope->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aScope->getValidationFailures());
                }
            }

            if ($this->aName !== null) {
                if (!$this->aName->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aName->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Category_Persistence_PacCategoryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = ProjectA_Zed_Category_Persistence_PacCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getFkCategoryName();
                break;
            case 2:
                return $this->getFkCategoryScope();
                break;
            case 3:
                return $this->getLft();
                break;
            case 4:
                return $this->getRgt();
                break;
            case 5:
                return $this->getLevel();
                break;
            case 6:
                return $this->getCreatedAt();
                break;
            case 7:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Category_Persistence_PacCategory'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Category_Persistence_PacCategory'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCategory(),
            $keys[1] => $this->getFkCategoryName(),
            $keys[2] => $this->getFkCategoryScope(),
            $keys[3] => $this->getLft(),
            $keys[4] => $this->getRgt(),
            $keys[5] => $this->getLevel(),
            $keys[6] => $this->getCreatedAt(),
            $keys[7] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aScope) {
                $result['Scope'] = $this->aScope->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aName) {
                $result['Name'] = $this->aName->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Category_Persistence_PacCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setFkCategoryName($value);
                break;
            case 2:
                $this->setFkCategoryScope($value);
                break;
            case 3:
                $this->setLft($value);
                break;
            case 4:
                $this->setRgt($value);
                break;
            case 5:
                $this->setLevel($value);
                break;
            case 6:
                $this->setCreatedAt($value);
                break;
            case 7:
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
        $keys = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCategory($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCategoryName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkCategoryScope($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLft($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRgt($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLevel($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $this->id_category);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, $this->fk_category_name);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, $this->fk_category_scope);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT, $this->lft);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT, $this->rgt);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL, $this->level);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $this->id_category);

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
     * @param object $copyObj An object of ProjectA_Zed_Category_Persistence_PacCategory (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCategoryName($this->getFkCategoryName());
        $copyObj->setFkCategoryScope($this->getFkCategoryScope());
        $copyObj->setLft($this->getLft());
        $copyObj->setRgt($this->getRgt());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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
     * @return ProjectA_Zed_Category_Persistence_PacCategory Clone of current object.
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Category_Persistence_PacCategoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Category_Persistence_PacCategoryScope object.
     *
     * @param             ProjectA_Zed_Category_Persistence_PacCategoryScope $v
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setScope(ProjectA_Zed_Category_Persistence_PacCategoryScope $v = null)
    {
        if ($v === null) {
            $this->setFkCategoryScope(NULL);
        } else {
            $this->setFkCategoryScope($v->getIdCategoryScope());
        }

        $this->aScope = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Category_Persistence_PacCategoryScope object, it will not be re-added.
        if ($v !== null) {
            $v->addCategory($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Category_Persistence_PacCategoryScope object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Category_Persistence_PacCategoryScope The associated ProjectA_Zed_Category_Persistence_PacCategoryScope object.
     * @throws PropelException
     */
    public function getScope(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aScope === null && ($this->fk_category_scope !== null) && $doQuery) {
            $this->aScope = ProjectA_Zed_Category_Persistence_PacCategoryScopeQuery::create()->findPk($this->fk_category_scope, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aScope->addCategories($this);
             */
        }

        return $this->aScope;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Category_Persistence_PacCategoryName object.
     *
     * @param             ProjectA_Zed_Category_Persistence_PacCategoryName $v
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setName(ProjectA_Zed_Category_Persistence_PacCategoryName $v = null)
    {
        if ($v === null) {
            $this->setFkCategoryName(NULL);
        } else {
            $this->setFkCategoryName($v->getIdCategoryName());
        }

        $this->aName = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Category_Persistence_PacCategoryName object, it will not be re-added.
        if ($v !== null) {
            $v->addCategory($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Category_Persistence_PacCategoryName object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Category_Persistence_PacCategoryName The associated ProjectA_Zed_Category_Persistence_PacCategoryName object.
     * @throws PropelException
     */
    public function getName(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aName === null && ($this->fk_category_name !== null) && $doQuery) {
            $this->aName = ProjectA_Zed_Category_Persistence_PacCategoryNameQuery::create()->findPk($this->fk_category_name, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aName->addCategories($this);
             */
        }

        return $this->aName;
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
        if ('Attribute' == $relationName) {
            $this->initAttributes();
        }
    }

    /**
     * Clears out the collAttributes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
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
        $this->collAttributes->setModel('ProjectA_Zed_Category_Persistence_PacCategoryAttribute');
    }

    /**
     * Gets an array of ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Category_Persistence_PacCategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategoryAttribute[] List of ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects
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
                $collAttributes = ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery::create(null, $criteria)
                    ->filterByCategory($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAttributesPartial && count($collAttributes)) {
                      $this->initAttributes(false);

                      foreach($collAttributes as $obj) {
                        if (false == $this->collAttributes->contains($obj)) {
                          $this->collAttributes->append($obj);
                        }
                      }

                      $this->collAttributesPartial = true;
                    }

                    $collAttributes->getInternalIterator()->rewind();
                    return $collAttributes;
                }

                if($partial && $this->collAttributes) {
                    foreach($this->collAttributes as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setAttributes(PropelCollection $attributes, PropelPDO $con = null)
    {
        $attributesToDelete = $this->getAttributes(new Criteria(), $con)->diff($attributes);

        $this->attributesScheduledForDeletion = unserialize(serialize($attributesToDelete));

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
     * Returns the number of related ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects.
     * @throws PropelException
     */
    public function countAttributes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAttributesPartial && !$this->isNew();
        if (null === $this->collAttributes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAttributes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAttributes());
            }
            $query = ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery::create(null, $criteria);
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
     * Method called to associate a ProjectA_Zed_Category_Persistence_PacCategoryAttribute object to this object
     * through the ProjectA_Zed_Category_Persistence_PacCategoryAttribute foreign key attribute.
     *
     * @param    ProjectA_Zed_Category_Persistence_PacCategoryAttribute $l ProjectA_Zed_Category_Persistence_PacCategoryAttribute
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function addAttribute(ProjectA_Zed_Category_Persistence_PacCategoryAttribute $l)
    {
        if ($this->collAttributes === null) {
            $this->initAttributes();
            $this->collAttributesPartial = true;
        }
        if (!in_array($l, $this->collAttributes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAttribute($l);
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
     * @return ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
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
     * Otherwise if this PacCategory is new, it will return
     * an empty collection; or if this PacCategory has previously
     * been saved, it will retrieve related Attributes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCategory.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategoryAttribute[] List of ProjectA_Zed_Category_Persistence_PacCategoryAttribute objects
     */
    public function getAttributesJoinAttributeKey($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery::create(null, $criteria);
        $query->joinWith('AttributeKey', $join_behavior);

        return $this->getAttributes($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_category = null;
        $this->fk_category_name = null;
        $this->fk_category_scope = null;
        $this->lft = null;
        $this->rgt = null;
        $this->level = null;
        $this->created_at = null;
        $this->updated_at = null;
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
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collAttributes) {
                foreach ($this->collAttributes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aScope instanceof Persistent) {
              $this->aScope->clearAllReferences($deep);
            }
            if ($this->aName instanceof Persistent) {
              $this->aName->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        // nested_set behavior
        $this->collNestedSetChildren = null;
        $this->aNestedSetParent = null;
        if ($this->collAttributes instanceof PropelCollection) {
            $this->collAttributes->clearIterator();
        }
        $this->collAttributes = null;
        $this->aScope = null;
        $this->aName = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DEFAULT_STRING_FORMAT);
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

    // nested_set behavior

    /**
     * Execute queries that were saved to be run inside the save transaction
     */
    protected function processNestedSetQueries($con)
    {
        foreach ($this->nestedSetQueries as $query) {
            $query['arguments'][]= $con;
            call_user_func_array($query['callable'], $query['arguments']);
        }
        $this->nestedSetQueries = array();
    }

    /**
     * Proxy getter method for the left value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set left value
     */
    public function getLeftValue()
    {
        return $this->lft;
    }

    /**
     * Proxy getter method for the right value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set right value
     */
    public function getRightValue()
    {
        return $this->rgt;
    }

    /**
     * Proxy getter method for the scope value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set scope value
     */
    public function getScopeValue()
    {
        return $this->fk_category_scope;
    }

    /**
     * Proxy setter method for the left value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set left value
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setLeftValue($v)
    {
        return $this->setLft($v);
    }

    /**
     * Proxy setter method for the right value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set right value
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setRightValue($v)
    {
        return $this->setRgt($v);
    }

    /**
     * Proxy setter method for the scope value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set scope value
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function setScopeValue($v)
    {
        return $this->setFkCategoryScope($v);
    }

    /**
     * Creates the supplied node as the root node.
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     * @throws     PropelException
     */
    public function makeRoot()
    {
        if ($this->getLeftValue() || $this->getRightValue()) {
            throw new PropelException('Cannot turn an existing node into a root node.');
        }

        $this->setLeftValue(1);
        $this->setRightValue(2);
        $this->setLevel(0);

        return $this;
    }

    /**
     * Tests if onbject is a node, i.e. if it is inserted in the tree
     *
     * @return     bool
     */
    public function isInTree()
    {
        return $this->getLeftValue() > 0 && $this->getRightValue() > $this->getLeftValue();
    }

    /**
     * Tests if node is a root
     *
     * @return     bool
     */
    public function isRoot()
    {
        return $this->isInTree() && $this->getLeftValue() == 1;
    }

    /**
     * Tests if node is a leaf
     *
     * @return     bool
     */
    public function isLeaf()
    {
        return $this->isInTree() &&  ($this->getRightValue() - $this->getLeftValue()) == 1;
    }

    /**
     * Tests if node is a descendant of another node
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $node Propel node object
     * @return     bool
     */
    public function isDescendantOf($parent)
    {
        if ($this->getScopeValue() !== $parent->getScopeValue()) {
            return false; //since the `this` and $parent are in different scopes, there's no way that `this` is be a descendant of $parent.
        }

        return $this->isInTree() && $this->getLeftValue() > $parent->getLeftValue() && $this->getRightValue() < $parent->getRightValue();
    }

    /**
     * Tests if node is a ancestor of another node
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $node Propel node object
     * @return     bool
     */
    public function isAncestorOf($child)
    {
        return $child->isDescendantOf($this);
    }

    /**
     * Tests if object has an ancestor
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasParent(PropelPDO $con = null)
    {
        return $this->getLevel() > 0;
    }

    /**
     * Sets the cache for parent node of the current object.
     * Warning: this does not move the current object in the tree.
     * Use moveTofirstChildOf() or moveToLastChildOf() for that purpose
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $parent
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current object, for fluid interface
     */
    public function setParent($parent = null)
    {
        $this->aNestedSetParent = $parent;

        return $this;
    }

    /**
     * Gets parent node for the current object if it exists
     * The result is cached so further calls to the same method don't issue any queries
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getParent(PropelPDO $con = null)
    {
        if ($this->aNestedSetParent === null && $this->hasParent()) {
            $this->aNestedSetParent = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
                ->ancestorsOf($this)
                ->orderByLevel(true)
                ->findOne($con);
        }

        return $this->aNestedSetParent;
    }

    /**
     * Determines if the node has previous sibling
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasPrevSibling(PropelPDO $con = null)
    {
        if (!ProjectA_Zed_Category_Persistence_PacCategoryPeer::isValid($this)) {
            return false;
        }

        return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
            ->filterByRgt($this->getLeftValue() - 1)
            ->inTree($this->getScopeValue())
            ->count($con) > 0;
    }

    /**
     * Gets previous sibling for the given node if it exists
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getPrevSibling(PropelPDO $con = null)
    {
        return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
            ->filterByRgt($this->getLeftValue() - 1)
            ->inTree($this->getScopeValue())
            ->findOne($con);
    }

    /**
     * Determines if the node has next sibling
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasNextSibling(PropelPDO $con = null)
    {
        if (!ProjectA_Zed_Category_Persistence_PacCategoryPeer::isValid($this)) {
            return false;
        }

        return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
            ->filterByLft($this->getRightValue() + 1)
            ->inTree($this->getScopeValue())
            ->count($con) > 0;
    }

    /**
     * Gets next sibling for the given node if it exists
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getNextSibling(PropelPDO $con = null)
    {
        return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
            ->filterByLft($this->getRightValue() + 1)
            ->inTree($this->getScopeValue())
            ->findOne($con);
    }

    /**
     * Clears out the $collNestedSetChildren collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return     void
     */
    public function clearNestedSetChildren()
    {
        $this->collNestedSetChildren = null;
    }

    /**
     * Initializes the $collNestedSetChildren collection.
     *
     * @return     void
     */
    public function initNestedSetChildren()
    {
        $this->collNestedSetChildren = new PropelObjectCollection();
        $this->collNestedSetChildren->setModel('ProjectA_Zed_Category_Persistence_PacCategory');
    }

    /**
     * Adds an element to the internal $collNestedSetChildren collection.
     * Beware that this doesn't insert a node in the tree.
     * This method is only used to facilitate children hydration.
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $pacCategory
     *
     * @return     void
     */
    public function addNestedSetChild($pacCategory)
    {
        if ($this->collNestedSetChildren === null) {
            $this->initNestedSetChildren();
        }
        if (!in_array($pacCategory, $this->collNestedSetChildren->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->collNestedSetChildren[]= $pacCategory;
            $pacCategory->setParent($this);
        }
    }

    /**
     * Tests if node has children
     *
     * @return     bool
     */
    public function hasChildren()
    {
        return ($this->getRightValue() - $this->getLeftValue()) > 1;
    }

    /**
     * Gets the children of the given node
     *
     * @param      Criteria  $criteria Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array     List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getChildren($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNestedSetChildren || null !== $criteria) {
            if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
                // return empty collection
                $this->initNestedSetChildren();
            } else {
                $collNestedSetChildren = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $criteria)
                  ->childrenOf($this)
                  ->orderByBranch()
                    ->find($con);
                if (null !== $criteria) {
                    return $collNestedSetChildren;
                }
                $this->collNestedSetChildren = $collNestedSetChildren;
            }
        }

        return $this->collNestedSetChildren;
    }

    /**
     * Gets number of children for the given node
     *
     * @param      Criteria  $criteria Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     int       Number of children
     */
    public function countChildren($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNestedSetChildren || null !== $criteria) {
            if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
                return 0;
            } else {
                return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $criteria)
                    ->childrenOf($this)
                    ->count($con);
            }
        } else {
            return count($this->collNestedSetChildren);
        }
    }

    /**
     * Gets the first child of the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getFirstChild($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $query)
                ->childrenOf($this)
                ->orderByBranch()
                ->findOne($con);
        }
    }

    /**
     * Gets the last child of the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getLastChild($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $query)
                ->childrenOf($this)
                ->orderByBranch(true)
                ->findOne($con);
        }
    }

    /**
     * Gets the siblings of the given node
     *
     * @param      bool			$includeNode Whether to include the current node or not
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     *
     * @return     array 		List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getSiblings($includeNode = false, $query = null, PropelPDO $con = null)
    {
        if ($this->isRoot()) {
            return array();
        } else {
             $query = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $query)
                    ->childrenOf($this->getParent($con))
                    ->orderByBranch();
            if (!$includeNode) {
                $query->prune($this);
            }

            return $query->find($con);
        }
    }

    /**
     * Gets descendants for the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getDescendants($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $query)
                ->descendantsOf($this)
                ->orderByBranch()
                ->find($con);
        }
    }

    /**
     * Gets number of descendants for the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     int 		Number of descendants
     */
    public function countDescendants($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            // save one query
            return 0;
        } else {
            return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $query)
                ->descendantsOf($this)
                ->count($con);
        }
    }

    /**
     * Gets descendants for the given node, plus the current node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getBranch($query = null, PropelPDO $con = null)
    {
        return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $query)
            ->branchOf($this)
            ->orderByBranch()
            ->find($con);
    }

    /**
     * Gets ancestors for the given node, starting with the root node
     * Use it for breadcrumb paths for instance
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of ProjectA_Zed_Category_Persistence_PacCategory objects
     */
    public function getAncestors($query = null, PropelPDO $con = null)
    {
        if ($this->isRoot()) {
            // save one query
            return array();
        } else {
            return ProjectA_Zed_Category_Persistence_PacCategoryQuery::create(null, $query)
                ->ancestorsOf($this)
                ->orderByBranch()
                ->find($con);
        }
    }

    /**
     * Inserts the given $child node as first child of current
     * The modifications in the current object and the tree
     * are not persisted until the child object is saved.
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $child	Propel object for child node
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function addChild(ProjectA_Zed_Category_Persistence_PacCategory $child)
    {
        if ($this->isNew()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must not be new to accept children.');
        }
        $child->insertAsFirstChildOf($this);

        return $this;
    }

    /**
     * Inserts the current node as first child of given $parent node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $parent	Propel object for parent node
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function insertAsFirstChildOf($parent)
    {
        if ($this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must not already be in the tree to be inserted. Use the moveToFirstChildOf() instead.');
        }
        $left = $parent->getLeftValue() + 1;
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($parent->getLevel() + 1);
        $scope = $parent->getScopeValue();
        $this->setScopeValue($scope);
        // update the children collection of the parent
        $parent->addNestedSetChild($this);

        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ProjectA_Zed_Category_Persistence_PacCategoryPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as last child of given $parent node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $parent	Propel object for parent node
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function insertAsLastChildOf($parent)
    {
        if ($this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must not already be in the tree to be inserted. Use the moveToLastChildOf() instead.');
        }
        $left = $parent->getRightValue();
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($parent->getLevel() + 1);
        $scope = $parent->getScopeValue();
        $this->setScopeValue($scope);
        // update the children collection of the parent
        $parent->addNestedSetChild($this);

        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ProjectA_Zed_Category_Persistence_PacCategoryPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as prev sibling given $sibling node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $sibling	Propel object for parent node
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function insertAsPrevSiblingOf($sibling)
    {
        if ($this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must not already be in the tree to be inserted. Use the moveToPrevSiblingOf() instead.');
        }
        $left = $sibling->getLeftValue();
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($sibling->getLevel());
        $scope = $sibling->getScopeValue();
        $this->setScopeValue($scope);
        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ProjectA_Zed_Category_Persistence_PacCategoryPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as next sibling given $sibling node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $sibling	Propel object for parent node
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function insertAsNextSiblingOf($sibling)
    {
        if ($this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must not already be in the tree to be inserted. Use the moveToNextSiblingOf() instead.');
        }
        $left = $sibling->getRightValue() + 1;
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($sibling->getLevel());
        $scope = $sibling->getScopeValue();
        $this->setScopeValue($scope);
        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('ProjectA_Zed_Category_Persistence_PacCategoryPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Moves current node and its subtree to be the first child of $parent
     * The modifications in the current object and the tree are immediate
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $parent	Propel object for parent node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function moveToFirstChildOf($parent, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must be already in the tree to be moved. Use the insertAsFirstChildOf() instead.');
        }
        if ($parent->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($parent->getLeftValue() + 1, $parent->getLevel() - $this->getLevel() + 1, $parent->getScopeValue(), $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the last child of $parent
     * The modifications in the current object and the tree are immediate
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $parent	Propel object for parent node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function moveToLastChildOf($parent, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must be already in the tree to be moved. Use the insertAsLastChildOf() instead.');
        }
        if ($parent->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($parent->getRightValue(), $parent->getLevel() - $this->getLevel() + 1, $parent->getScopeValue(), $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the previous sibling of $sibling
     * The modifications in the current object and the tree are immediate
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $sibling	Propel object for sibling node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function moveToPrevSiblingOf($sibling, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must be already in the tree to be moved. Use the insertAsPrevSiblingOf() instead.');
        }
        if ($sibling->isRoot()) {
            throw new PropelException('Cannot move to previous sibling of a root node.');
        }
        if ($sibling->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($sibling->getLeftValue(), $sibling->getLevel() - $this->getLevel(), $sibling->getScopeValue(), $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the next sibling of $sibling
     * The modifications in the current object and the tree are immediate
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $sibling	Propel object for sibling node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current Propel object
     */
    public function moveToNextSiblingOf($sibling, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A ProjectA_Zed_Category_Persistence_PacCategory object must be already in the tree to be moved. Use the insertAsNextSiblingOf() instead.');
        }
        if ($sibling->isRoot()) {
            throw new PropelException('Cannot move to next sibling of a root node.');
        }
        if ($sibling->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($sibling->getRightValue() + 1, $sibling->getLevel() - $this->getLevel(), $sibling->getScopeValue(), $con);

        return $this;
    }

    /**
     * Move current node and its children to location $destLeft and updates rest of tree
     *
     * @param      int	$destLeft Destination left value
     * @param      int	$levelDelta Delta to add to the levels
     * @param      PropelPDO $con		Connection to use.
     */
    protected function moveSubtreeTo($destLeft, $levelDelta, $targetScope = null, PropelPDO $con = null)
    {
        $preventDefault = false;
        $left  = $this->getLeftValue();
        $right = $this->getRightValue();
        $scope = $this->getScopeValue();

        if ($targetScope === null){
            $targetScope = $scope;
        }


        $treeSize = $right - $left +1;

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {

            // make room next to the target for the subtree
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues($treeSize, $destLeft, null, $targetScope, $con);



            if ($targetScope != $scope){

                //move subtree to < 0, so the items are out of scope.
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues(-$right, $left, $right, $scope, $con);

                //update scopes
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::setNegativeScope($targetScope, $con);

                //update levels
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftLevel($levelDelta, $left - $right, 0, $targetScope, $con);

                //move the subtree to the target
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues(($right - $left) + $destLeft, $left - $right, 0, $targetScope, $con);


                $preventDefault = true;
            }


            if (!$preventDefault){


                if ($left >= $destLeft) { // src was shifted too?
                    $left += $treeSize;
                    $right += $treeSize;
                }

                if ($levelDelta) {
                    // update the levels of the subtree
                    ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftLevel($levelDelta, $left, $right, $scope, $con);
                }

                // move the subtree to the target
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues($destLeft - $left, $left, $right, $scope, $con);
            }

            // remove the empty room at the previous location of the subtree
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues(-$treeSize, $right + 1, null, $scope, $con);

            // update all loaded nodes
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::updateLoadedNodes(null, $con);

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Deletes all descendants for the given node
     * Instance pooling is wiped out by this command,
     * so existing ProjectA_Zed_Category_Persistence_PacCategory instances are probably invalid (except for the current one)
     *
     * @param      PropelPDO $con Connection to use.
     *
     * @return     int 		number of deleted nodes
     */
    public function deleteDescendants(PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            // save one query
            return;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $left = $this->getLeftValue();
        $right = $this->getRightValue();
        $scope = $this->getScopeValue();
        $con->beginTransaction();
        try {
            // delete descendant nodes (will empty the instance pool)
            $ret = ProjectA_Zed_Category_Persistence_PacCategoryQuery::create()
                ->descendantsOf($this)
                ->delete($con);

            // fill up the room that was used by descendants
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues($left - $right + 1, $right, null, $scope, $con);

            // fix the right value for the current node, which is now a leaf
            $this->setRightValue($left + 1);

            $con->commit();
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }

        return $ret;
    }

    /**
     * Returns a pre-order iterator for this node and its children.
     *
     * @return     RecursiveIterator
     */
    public function getIterator()
    {
        return new NestedSetRecursiveIterator($this);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT;

        return $this;
    }

}
