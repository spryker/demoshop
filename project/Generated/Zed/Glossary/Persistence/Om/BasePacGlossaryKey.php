<?php


/**
 * Base class that represents a row from the 'pac_glossary_key' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKey extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_glossary_key field.
     * @var        int
     */
    protected $id_glossary_key;

    /**
     * The value for the fk_glossary_group field.
     * @var        int
     */
    protected $fk_glossary_group;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the is_global field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_global;

    /**
     * The value for the is_deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_deleted;

    /**
     * The value for the version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $version;

    /**
     * @var        PacGlossaryGroup
     */
    protected $aGlossaryGroup;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation[] Collection to store aggregation of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects.
     */
    protected $collGlossaryExplanations;
    protected $collGlossaryExplanationsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup[] Collection to store aggregation of ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects.
     */
    protected $collGlossaryLookups;
    protected $collGlossaryLookupsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion[] Collection to store aggregation of ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects.
     */
    protected $collPacGlossaryKeyVersions;
    protected $collPacGlossaryKeyVersionsPartial;

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

    // versionable behavior


    /**
     * @var bool
     */
    protected $enforceVersion = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $glossaryExplanationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $glossaryLookupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacGlossaryKeyVersionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_global = false;
        $this->is_deleted = false;
        $this->version = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKey object.
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
     * Get the [fk_glossary_group] column value.
     *
     * @return int
     */
    public function getFkGlossaryGroup()
    {
        return $this->fk_glossary_group;
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
     * Get the [is_global] column value.
     *
     * @return boolean
     */
    public function getIsGlobal()
    {
        return $this->is_global;
    }

    /**
     * Get the [is_deleted] column value.
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of [id_glossary_key] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setIdGlossaryKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_glossary_key !== $v) {
            $this->id_glossary_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY;
        }


        return $this;
    } // setIdGlossaryKey()

    /**
     * Set the value of [fk_glossary_group] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setFkGlossaryGroup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_glossary_group !== $v) {
            $this->fk_glossary_group = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP;
        }

        if ($this->aGlossaryGroup !== null && $this->aGlossaryGroup->getIdGlossaryGroup() !== $v) {
            $this->aGlossaryGroup = null;
        }


        return $this;
    } // setFkGlossaryGroup()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [is_global] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setIsGlobal($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_global !== $v) {
            $this->is_global = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_GLOBAL;
        }


        return $this;
    } // setIsGlobal()

    /**
     * Sets the value of the [is_deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setIsDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_deleted !== $v) {
            $this->is_deleted = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::VERSION;
        }


        return $this;
    } // setVersion()

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
            if ($this->is_global !== false) {
                return false;
            }

            if ($this->is_deleted !== false) {
                return false;
            }

            if ($this->version !== 0) {
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

            $this->id_glossary_key = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_glossary_group = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->is_global = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->is_deleted = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->version = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object", $e);
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

        if ($this->aGlossaryGroup !== null && $this->fk_glossary_group !== $this->aGlossaryGroup->getIdGlossaryGroup()) {
            $this->aGlossaryGroup = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aGlossaryGroup = null;
            $this->collGlossaryExplanations = null;

            $this->collGlossaryLookups = null;

            $this->collPacGlossaryKeyVersions = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // versionable behavior
            if ($this->isVersioningNecessary()) {
                $this->setVersion($this->isNew() ? 1 : $this->getLastVersionNumber($con) + 1);
                $createVersion = true; // for postSave hook
            }
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
                // versionable behavior
                if (isset($createVersion)) {
                    $this->addVersion($con);
                }
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

                ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::addInstanceToPool($this);
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

            if ($this->aGlossaryGroup !== null) {
                if ($this->aGlossaryGroup->isModified() || $this->aGlossaryGroup->isNew()) {
                    $affectedRows += $this->aGlossaryGroup->save($con);
                }
                $this->setGlossaryGroup($this->aGlossaryGroup);
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

            if ($this->glossaryExplanationsScheduledForDeletion !== null) {
                if (!$this->glossaryExplanationsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery::create()
                        ->filterByPrimaryKeys($this->glossaryExplanationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->glossaryExplanationsScheduledForDeletion = null;
                }
            }

            if ($this->collGlossaryExplanations !== null) {
                foreach ($this->collGlossaryExplanations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->glossaryLookupsScheduledForDeletion !== null) {
                if (!$this->glossaryLookupsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery::create()
                        ->filterByPrimaryKeys($this->glossaryLookupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->glossaryLookupsScheduledForDeletion = null;
                }
            }

            if ($this->collGlossaryLookups !== null) {
                foreach ($this->collGlossaryLookups as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacGlossaryKeyVersionsScheduledForDeletion !== null) {
                if (!$this->pacGlossaryKeyVersionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create()
                        ->filterByPrimaryKeys($this->pacGlossaryKeyVersionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacGlossaryKeyVersionsScheduledForDeletion = null;
                }
            }

            if ($this->collPacGlossaryKeyVersions !== null) {
                foreach ($this->collPacGlossaryKeyVersions as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY;
        if (null !== $this->id_glossary_key) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`id_glossary_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP)) {
            $modifiedColumns[':p' . $index++]  = '`fk_glossary_group`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_GLOBAL)) {
            $modifiedColumns[':p' . $index++]  = '`is_global`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
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
                    case '`fk_glossary_group`':
                        $stmt->bindValue($identifier, $this->fk_glossary_group, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`is_global`':
                        $stmt->bindValue($identifier, (int) $this->is_global, PDO::PARAM_INT);
                        break;
                    case '`is_deleted`':
                        $stmt->bindValue($identifier, (int) $this->is_deleted, PDO::PARAM_INT);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
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

            if ($this->aGlossaryGroup !== null) {
                if (!$this->aGlossaryGroup->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aGlossaryGroup->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collGlossaryExplanations !== null) {
                    foreach ($this->collGlossaryExplanations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collGlossaryLookups !== null) {
                    foreach ($this->collGlossaryLookups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacGlossaryKeyVersions !== null) {
                    foreach ($this->collPacGlossaryKeyVersions as $referrerFK) {
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getFkGlossaryGroup();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getIsGlobal();
                break;
            case 4:
                return $this->getIsDeleted();
                break;
            case 5:
                return $this->getVersion();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKey'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKey'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdGlossaryKey(),
            $keys[1] => $this->getFkGlossaryGroup(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getIsGlobal(),
            $keys[4] => $this->getIsDeleted(),
            $keys[5] => $this->getVersion(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aGlossaryGroup) {
                $result['GlossaryGroup'] = $this->aGlossaryGroup->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collGlossaryExplanations) {
                $result['GlossaryExplanations'] = $this->collGlossaryExplanations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGlossaryLookups) {
                $result['GlossaryLookups'] = $this->collGlossaryLookups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacGlossaryKeyVersions) {
                $result['PacGlossaryKeyVersions'] = $this->collPacGlossaryKeyVersions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setFkGlossaryGroup($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setIsGlobal($value);
                break;
            case 4:
                $this->setIsDeleted($value);
                break;
            case 5:
                $this->setVersion($value);
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
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdGlossaryKey($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkGlossaryGroup($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsGlobal($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIsDeleted($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setVersion($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $this->id_glossary_key);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP, $this->fk_glossary_group);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::NAME)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_GLOBAL)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_GLOBAL, $this->is_global);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::VERSION)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::VERSION, $this->version);

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
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $this->id_glossary_key);

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
     * @param object $copyObj An object of ProjectA_Zed_Glossary_Persistence_PacGlossaryKey (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkGlossaryGroup($this->getFkGlossaryGroup());
        $copyObj->setName($this->getName());
        $copyObj->setIsGlobal($this->getIsGlobal());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setVersion($this->getVersion());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getGlossaryExplanations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGlossaryExplanation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGlossaryLookups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGlossaryLookup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacGlossaryKeyVersions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacGlossaryKeyVersion($relObj->copy($deepCopy));
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey Clone of current object.
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup object.
     *
     * @param             ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup $v
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGlossaryGroup(ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup $v = null)
    {
        if ($v === null) {
            $this->setFkGlossaryGroup(NULL);
        } else {
            $this->setFkGlossaryGroup($v->getIdGlossaryGroup());
        }

        $this->aGlossaryGroup = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup object, it will not be re-added.
        if ($v !== null) {
            $v->addGlossaryKey($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup The associated ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup object.
     * @throws PropelException
     */
    public function getGlossaryGroup(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aGlossaryGroup === null && ($this->fk_glossary_group !== null) && $doQuery) {
            $this->aGlossaryGroup = ProjectA_Zed_Glossary_Persistence_PacGlossaryGroupQuery::create()->findPk($this->fk_glossary_group, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGlossaryGroup->addGlossaryKeys($this);
             */
        }

        return $this->aGlossaryGroup;
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
        if ('GlossaryExplanation' == $relationName) {
            $this->initGlossaryExplanations();
        }
        if ('GlossaryLookup' == $relationName) {
            $this->initGlossaryLookups();
        }
        if ('PacGlossaryKeyVersion' == $relationName) {
            $this->initPacGlossaryKeyVersions();
        }
    }

    /**
     * Clears out the collGlossaryExplanations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     * @see        addGlossaryExplanations()
     */
    public function clearGlossaryExplanations()
    {
        $this->collGlossaryExplanations = null; // important to set this to null since that means it is uninitialized
        $this->collGlossaryExplanationsPartial = null;

        return $this;
    }

    /**
     * reset is the collGlossaryExplanations collection loaded partially
     *
     * @return void
     */
    public function resetPartialGlossaryExplanations($v = true)
    {
        $this->collGlossaryExplanationsPartial = $v;
    }

    /**
     * Initializes the collGlossaryExplanations collection.
     *
     * By default this just sets the collGlossaryExplanations collection to an empty array (like clearcollGlossaryExplanations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGlossaryExplanations($overrideExisting = true)
    {
        if (null !== $this->collGlossaryExplanations && !$overrideExisting) {
            return;
        }
        $this->collGlossaryExplanations = new PropelObjectCollection();
        $this->collGlossaryExplanations->setModel('ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation');
    }

    /**
     * Gets an array of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Glossary_Persistence_PacGlossaryKey is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation[] List of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects
     * @throws PropelException
     */
    public function getGlossaryExplanations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGlossaryExplanationsPartial && !$this->isNew();
        if (null === $this->collGlossaryExplanations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGlossaryExplanations) {
                // return empty collection
                $this->initGlossaryExplanations();
            } else {
                $collGlossaryExplanations = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery::create(null, $criteria)
                    ->filterByGlossaryKey($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGlossaryExplanationsPartial && count($collGlossaryExplanations)) {
                      $this->initGlossaryExplanations(false);

                      foreach($collGlossaryExplanations as $obj) {
                        if (false == $this->collGlossaryExplanations->contains($obj)) {
                          $this->collGlossaryExplanations->append($obj);
                        }
                      }

                      $this->collGlossaryExplanationsPartial = true;
                    }

                    $collGlossaryExplanations->getInternalIterator()->rewind();
                    return $collGlossaryExplanations;
                }

                if($partial && $this->collGlossaryExplanations) {
                    foreach($this->collGlossaryExplanations as $obj) {
                        if($obj->isNew()) {
                            $collGlossaryExplanations[] = $obj;
                        }
                    }
                }

                $this->collGlossaryExplanations = $collGlossaryExplanations;
                $this->collGlossaryExplanationsPartial = false;
            }
        }

        return $this->collGlossaryExplanations;
    }

    /**
     * Sets a collection of GlossaryExplanation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $glossaryExplanations A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setGlossaryExplanations(PropelCollection $glossaryExplanations, PropelPDO $con = null)
    {
        $glossaryExplanationsToDelete = $this->getGlossaryExplanations(new Criteria(), $con)->diff($glossaryExplanations);

        $this->glossaryExplanationsScheduledForDeletion = unserialize(serialize($glossaryExplanationsToDelete));

        foreach ($glossaryExplanationsToDelete as $glossaryExplanationRemoved) {
            $glossaryExplanationRemoved->setGlossaryKey(null);
        }

        $this->collGlossaryExplanations = null;
        foreach ($glossaryExplanations as $glossaryExplanation) {
            $this->addGlossaryExplanation($glossaryExplanation);
        }

        $this->collGlossaryExplanations = $glossaryExplanations;
        $this->collGlossaryExplanationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects.
     * @throws PropelException
     */
    public function countGlossaryExplanations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGlossaryExplanationsPartial && !$this->isNew();
        if (null === $this->collGlossaryExplanations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGlossaryExplanations) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getGlossaryExplanations());
            }
            $query = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGlossaryKey($this)
                ->count($con);
        }

        return count($this->collGlossaryExplanations);
    }

    /**
     * Method called to associate a ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object to this object
     * through the ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation foreign key attribute.
     *
     * @param    ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation $l ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function addGlossaryExplanation(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation $l)
    {
        if ($this->collGlossaryExplanations === null) {
            $this->initGlossaryExplanations();
            $this->collGlossaryExplanationsPartial = true;
        }
        if (!in_array($l, $this->collGlossaryExplanations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGlossaryExplanation($l);
        }

        return $this;
    }

    /**
     * @param	GlossaryExplanation $glossaryExplanation The glossaryExplanation object to add.
     */
    protected function doAddGlossaryExplanation($glossaryExplanation)
    {
        $this->collGlossaryExplanations[]= $glossaryExplanation;
        $glossaryExplanation->setGlossaryKey($this);
    }

    /**
     * @param	GlossaryExplanation $glossaryExplanation The glossaryExplanation object to remove.
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function removeGlossaryExplanation($glossaryExplanation)
    {
        if ($this->getGlossaryExplanations()->contains($glossaryExplanation)) {
            $this->collGlossaryExplanations->remove($this->collGlossaryExplanations->search($glossaryExplanation));
            if (null === $this->glossaryExplanationsScheduledForDeletion) {
                $this->glossaryExplanationsScheduledForDeletion = clone $this->collGlossaryExplanations;
                $this->glossaryExplanationsScheduledForDeletion->clear();
            }
            $this->glossaryExplanationsScheduledForDeletion[]= clone $glossaryExplanation;
            $glossaryExplanation->setGlossaryKey(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacGlossaryKey is new, it will return
     * an empty collection; or if this PacGlossaryKey has previously
     * been saved, it will retrieve related GlossaryExplanations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacGlossaryKey.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation[] List of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects
     */
    public function getGlossaryExplanationsJoinGlossaryLanguage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery::create(null, $criteria);
        $query->joinWith('GlossaryLanguage', $join_behavior);

        return $this->getGlossaryExplanations($query, $con);
    }

    /**
     * Clears out the collGlossaryLookups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     * @see        addGlossaryLookups()
     */
    public function clearGlossaryLookups()
    {
        $this->collGlossaryLookups = null; // important to set this to null since that means it is uninitialized
        $this->collGlossaryLookupsPartial = null;

        return $this;
    }

    /**
     * reset is the collGlossaryLookups collection loaded partially
     *
     * @return void
     */
    public function resetPartialGlossaryLookups($v = true)
    {
        $this->collGlossaryLookupsPartial = $v;
    }

    /**
     * Initializes the collGlossaryLookups collection.
     *
     * By default this just sets the collGlossaryLookups collection to an empty array (like clearcollGlossaryLookups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGlossaryLookups($overrideExisting = true)
    {
        if (null !== $this->collGlossaryLookups && !$overrideExisting) {
            return;
        }
        $this->collGlossaryLookups = new PropelObjectCollection();
        $this->collGlossaryLookups->setModel('ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup');
    }

    /**
     * Gets an array of ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Glossary_Persistence_PacGlossaryKey is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup[] List of ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects
     * @throws PropelException
     */
    public function getGlossaryLookups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGlossaryLookupsPartial && !$this->isNew();
        if (null === $this->collGlossaryLookups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGlossaryLookups) {
                // return empty collection
                $this->initGlossaryLookups();
            } else {
                $collGlossaryLookups = ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery::create(null, $criteria)
                    ->filterByGlossaryKey($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGlossaryLookupsPartial && count($collGlossaryLookups)) {
                      $this->initGlossaryLookups(false);

                      foreach($collGlossaryLookups as $obj) {
                        if (false == $this->collGlossaryLookups->contains($obj)) {
                          $this->collGlossaryLookups->append($obj);
                        }
                      }

                      $this->collGlossaryLookupsPartial = true;
                    }

                    $collGlossaryLookups->getInternalIterator()->rewind();
                    return $collGlossaryLookups;
                }

                if($partial && $this->collGlossaryLookups) {
                    foreach($this->collGlossaryLookups as $obj) {
                        if($obj->isNew()) {
                            $collGlossaryLookups[] = $obj;
                        }
                    }
                }

                $this->collGlossaryLookups = $collGlossaryLookups;
                $this->collGlossaryLookupsPartial = false;
            }
        }

        return $this->collGlossaryLookups;
    }

    /**
     * Sets a collection of GlossaryLookup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $glossaryLookups A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setGlossaryLookups(PropelCollection $glossaryLookups, PropelPDO $con = null)
    {
        $glossaryLookupsToDelete = $this->getGlossaryLookups(new Criteria(), $con)->diff($glossaryLookups);

        $this->glossaryLookupsScheduledForDeletion = unserialize(serialize($glossaryLookupsToDelete));

        foreach ($glossaryLookupsToDelete as $glossaryLookupRemoved) {
            $glossaryLookupRemoved->setGlossaryKey(null);
        }

        $this->collGlossaryLookups = null;
        foreach ($glossaryLookups as $glossaryLookup) {
            $this->addGlossaryLookup($glossaryLookup);
        }

        $this->collGlossaryLookups = $glossaryLookups;
        $this->collGlossaryLookupsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup objects.
     * @throws PropelException
     */
    public function countGlossaryLookups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGlossaryLookupsPartial && !$this->isNew();
        if (null === $this->collGlossaryLookups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGlossaryLookups) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getGlossaryLookups());
            }
            $query = ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGlossaryKey($this)
                ->count($con);
        }

        return count($this->collGlossaryLookups);
    }

    /**
     * Method called to associate a ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup object to this object
     * through the ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup foreign key attribute.
     *
     * @param    ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup $l ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function addGlossaryLookup(ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup $l)
    {
        if ($this->collGlossaryLookups === null) {
            $this->initGlossaryLookups();
            $this->collGlossaryLookupsPartial = true;
        }
        if (!in_array($l, $this->collGlossaryLookups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGlossaryLookup($l);
        }

        return $this;
    }

    /**
     * @param	GlossaryLookup $glossaryLookup The glossaryLookup object to add.
     */
    protected function doAddGlossaryLookup($glossaryLookup)
    {
        $this->collGlossaryLookups[]= $glossaryLookup;
        $glossaryLookup->setGlossaryKey($this);
    }

    /**
     * @param	GlossaryLookup $glossaryLookup The glossaryLookup object to remove.
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function removeGlossaryLookup($glossaryLookup)
    {
        if ($this->getGlossaryLookups()->contains($glossaryLookup)) {
            $this->collGlossaryLookups->remove($this->collGlossaryLookups->search($glossaryLookup));
            if (null === $this->glossaryLookupsScheduledForDeletion) {
                $this->glossaryLookupsScheduledForDeletion = clone $this->collGlossaryLookups;
                $this->glossaryLookupsScheduledForDeletion->clear();
            }
            $this->glossaryLookupsScheduledForDeletion[]= clone $glossaryLookup;
            $glossaryLookup->setGlossaryKey(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacGlossaryKeyVersions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     * @see        addPacGlossaryKeyVersions()
     */
    public function clearPacGlossaryKeyVersions()
    {
        $this->collPacGlossaryKeyVersions = null; // important to set this to null since that means it is uninitialized
        $this->collPacGlossaryKeyVersionsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacGlossaryKeyVersions collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacGlossaryKeyVersions($v = true)
    {
        $this->collPacGlossaryKeyVersionsPartial = $v;
    }

    /**
     * Initializes the collPacGlossaryKeyVersions collection.
     *
     * By default this just sets the collPacGlossaryKeyVersions collection to an empty array (like clearcollPacGlossaryKeyVersions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacGlossaryKeyVersions($overrideExisting = true)
    {
        if (null !== $this->collPacGlossaryKeyVersions && !$overrideExisting) {
            return;
        }
        $this->collPacGlossaryKeyVersions = new PropelObjectCollection();
        $this->collPacGlossaryKeyVersions->setModel('ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion');
    }

    /**
     * Gets an array of ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Glossary_Persistence_PacGlossaryKey is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion[] List of ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects
     * @throws PropelException
     */
    public function getPacGlossaryKeyVersions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryKeyVersionsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryKeyVersions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryKeyVersions) {
                // return empty collection
                $this->initPacGlossaryKeyVersions();
            } else {
                $collPacGlossaryKeyVersions = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create(null, $criteria)
                    ->filterByPacGlossaryKey($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacGlossaryKeyVersionsPartial && count($collPacGlossaryKeyVersions)) {
                      $this->initPacGlossaryKeyVersions(false);

                      foreach($collPacGlossaryKeyVersions as $obj) {
                        if (false == $this->collPacGlossaryKeyVersions->contains($obj)) {
                          $this->collPacGlossaryKeyVersions->append($obj);
                        }
                      }

                      $this->collPacGlossaryKeyVersionsPartial = true;
                    }

                    $collPacGlossaryKeyVersions->getInternalIterator()->rewind();
                    return $collPacGlossaryKeyVersions;
                }

                if($partial && $this->collPacGlossaryKeyVersions) {
                    foreach($this->collPacGlossaryKeyVersions as $obj) {
                        if($obj->isNew()) {
                            $collPacGlossaryKeyVersions[] = $obj;
                        }
                    }
                }

                $this->collPacGlossaryKeyVersions = $collPacGlossaryKeyVersions;
                $this->collPacGlossaryKeyVersionsPartial = false;
            }
        }

        return $this->collPacGlossaryKeyVersions;
    }

    /**
     * Sets a collection of PacGlossaryKeyVersion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacGlossaryKeyVersions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function setPacGlossaryKeyVersions(PropelCollection $pacGlossaryKeyVersions, PropelPDO $con = null)
    {
        $pacGlossaryKeyVersionsToDelete = $this->getPacGlossaryKeyVersions(new Criteria(), $con)->diff($pacGlossaryKeyVersions);

        $this->pacGlossaryKeyVersionsScheduledForDeletion = unserialize(serialize($pacGlossaryKeyVersionsToDelete));

        foreach ($pacGlossaryKeyVersionsToDelete as $pacGlossaryKeyVersionRemoved) {
            $pacGlossaryKeyVersionRemoved->setPacGlossaryKey(null);
        }

        $this->collPacGlossaryKeyVersions = null;
        foreach ($pacGlossaryKeyVersions as $pacGlossaryKeyVersion) {
            $this->addPacGlossaryKeyVersion($pacGlossaryKeyVersion);
        }

        $this->collPacGlossaryKeyVersions = $pacGlossaryKeyVersions;
        $this->collPacGlossaryKeyVersionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects.
     * @throws PropelException
     */
    public function countPacGlossaryKeyVersions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryKeyVersionsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryKeyVersions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryKeyVersions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacGlossaryKeyVersions());
            }
            $query = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacGlossaryKey($this)
                ->count($con);
        }

        return count($this->collPacGlossaryKeyVersions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion object to this object
     * through the ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion foreign key attribute.
     *
     * @param    ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion $l ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function addPacGlossaryKeyVersion(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion $l)
    {
        if ($this->collPacGlossaryKeyVersions === null) {
            $this->initPacGlossaryKeyVersions();
            $this->collPacGlossaryKeyVersionsPartial = true;
        }
        if (!in_array($l, $this->collPacGlossaryKeyVersions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacGlossaryKeyVersion($l);
        }

        return $this;
    }

    /**
     * @param	PacGlossaryKeyVersion $pacGlossaryKeyVersion The pacGlossaryKeyVersion object to add.
     */
    protected function doAddPacGlossaryKeyVersion($pacGlossaryKeyVersion)
    {
        $this->collPacGlossaryKeyVersions[]= $pacGlossaryKeyVersion;
        $pacGlossaryKeyVersion->setPacGlossaryKey($this);
    }

    /**
     * @param	PacGlossaryKeyVersion $pacGlossaryKeyVersion The pacGlossaryKeyVersion object to remove.
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function removePacGlossaryKeyVersion($pacGlossaryKeyVersion)
    {
        if ($this->getPacGlossaryKeyVersions()->contains($pacGlossaryKeyVersion)) {
            $this->collPacGlossaryKeyVersions->remove($this->collPacGlossaryKeyVersions->search($pacGlossaryKeyVersion));
            if (null === $this->pacGlossaryKeyVersionsScheduledForDeletion) {
                $this->pacGlossaryKeyVersionsScheduledForDeletion = clone $this->collPacGlossaryKeyVersions;
                $this->pacGlossaryKeyVersionsScheduledForDeletion->clear();
            }
            $this->pacGlossaryKeyVersionsScheduledForDeletion[]= clone $pacGlossaryKeyVersion;
            $pacGlossaryKeyVersion->setPacGlossaryKey(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_glossary_key = null;
        $this->fk_glossary_group = null;
        $this->name = null;
        $this->is_global = null;
        $this->is_deleted = null;
        $this->version = null;
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
            if ($this->collGlossaryExplanations) {
                foreach ($this->collGlossaryExplanations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGlossaryLookups) {
                foreach ($this->collGlossaryLookups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacGlossaryKeyVersions) {
                foreach ($this->collPacGlossaryKeyVersions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aGlossaryGroup instanceof Persistent) {
              $this->aGlossaryGroup->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collGlossaryExplanations instanceof PropelCollection) {
            $this->collGlossaryExplanations->clearIterator();
        }
        $this->collGlossaryExplanations = null;
        if ($this->collGlossaryLookups instanceof PropelCollection) {
            $this->collGlossaryLookups->clearIterator();
        }
        $this->collGlossaryLookups = null;
        if ($this->collPacGlossaryKeyVersions instanceof PropelCollection) {
            $this->collPacGlossaryKeyVersions->clearIterator();
        }
        $this->collPacGlossaryKeyVersions = null;
        $this->aGlossaryGroup = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::DEFAULT_STRING_FORMAT);
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

    // versionable behavior

    /**
     * Enforce a new Version of this object upon next save.
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey
     */
    public function enforceVersioning()
    {
        $this->enforceVersion = true;

        return $this;
    }

    /**
     * Checks whether the current state must be recorded as a version
     *
     * @param PropelPDO $con An optional PropelPDO connection to use.
     *
     * @return  boolean
     */
    public function isVersioningNecessary($con = null)
    {
        if ($this->alreadyInSave) {
            return false;
        }

        if ($this->enforceVersion) {
            return true;
        }

        if (ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::isVersioningEnabled() && ($this->isNew() || $this->isModified() || $this->isDeleted())) {
            return true;
        }
      // to avoid infinite loops, emulate in save
      $this->alreadyInSave = true;
        foreach ($this->getGlossaryExplanations(null, $con) as $relatedObject) {
            if ($relatedObject->isVersioningNecessary($con)) {
          $this->alreadyInSave = false;

                return true;
            }
        }
      $this->alreadyInSave = false;


        return false;
    }

    /**
     * Creates a version of the current object and saves it.
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion A version object
     */
    public function addVersion($con = null)
    {
        $this->enforceVersion = false;

        $version = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion();
        $version->setIdGlossaryKey($this->getIdGlossaryKey());
        $version->setFkGlossaryGroup($this->getFkGlossaryGroup());
        $version->setName($this->getName());
        $version->setIsGlobal($this->getIsGlobal());
        $version->setIsDeleted($this->getIsDeleted());
        $version->setVersion($this->getVersion());
        $version->setPacGlossaryKey($this);
        if ($relateds = $this->getGlossaryExplanations($con)->toKeyValue('IdGlossaryExplanation', 'Version')) {
            $version->setPacGlossaryExplanationIds(array_keys($relateds));
            $version->setPacGlossaryExplanationVersions(array_values($relateds));
        }
        $version->save($con);

        return $version;
    }

    /**
     * Sets the properties of the curent object to the value they had at a specific version
     *
     * @param   integer $versionNumber The version number to read
     * @param   PropelPDO $con the connection to use
     *
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     * @throws  PropelException - if no object with the given version can be found.
     */
    public function toVersion($versionNumber, $con = null)
    {
        $version = $this->getOneVersion($versionNumber, $con);
        if (!$version) {
            throw new PropelException(sprintf('No ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object found with version %d', $version));
        }
        $this->populateFromVersion($version, $con);

        return $this;
    }

    /**
     * Sets the properties of the curent object to the value they had at a specific version
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion $version The version object to use
     * @param   PropelPDO $con the connection to use
     * @param   array $loadedObjects objects thats been loaded in a chain of populateFromVersion calls on referrer or fk objects.
     *
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The current object (for fluent API support)
     */
    public function populateFromVersion($version, $con = null, &$loadedObjects = array())
    {

        $loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKey'][$version->getIdGlossaryKey()][$version->getVersion()] = $this;
        $this->setIdGlossaryKey($version->getIdGlossaryKey());
        $this->setFkGlossaryGroup($version->getFkGlossaryGroup());
        $this->setName($version->getName());
        $this->setIsGlobal($version->getIsGlobal());
        $this->setIsDeleted($version->getIsDeleted());
        $this->setVersion($version->getVersion());
        if ($fkValues = $version->getPacGlossaryExplanationIds()) {
            $this->clearGlossaryExplanations();
            $fkVersions = $version->getPacGlossaryExplanationVersions();
            $query = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create();
            foreach ($fkValues as $key => $value) {
                $c1 = $query->getNewCriterion(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $value);
                $c2 = $query->getNewCriterion(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $fkVersions[$key]);
                $c1->addAnd($c2);
                $query->addOr($c1);
            }
            foreach ($query->find($con) as $relatedVersion) {
                if (isset($loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation']) && isset($loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation'][$relatedVersion->getIdGlossaryExplanation()]) && isset($loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation'][$relatedVersion->getIdGlossaryExplanation()][$relatedVersion->getVersion()])) {
                    $related = $loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation'][$relatedVersion->getIdGlossaryExplanation()][$relatedVersion->getVersion()];
                } else {
                    $related = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation();
                    $related->populateFromVersion($relatedVersion, $con, $loadedObjects);
                    $related->setNew(false);
                }
                $this->addGlossaryExplanation($related);
            }

            $this->resetPartialGlossaryExplanations(false);
        }

        return $this;
    }

    /**
     * Gets the latest persisted version number for the current object
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  integer
     */
    public function getLastVersionNumber($con = null)
    {
        $v = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create()
            ->filterByPacGlossaryKey($this)
            ->orderByVersion('desc')
            ->findOne($con);
        if (!$v) {
            return 0;
        }

        return $v->getVersion();
    }

    /**
     * Checks whether the current object is the latest one
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  boolean
     */
    public function isLastVersion($con = null)
    {
        return $this->getLastVersionNumber($con) == $this->getVersion();
    }

    /**
     * Retrieves a version object for this entity and a version number
     *
     * @param   integer $versionNumber The version number to read
     * @param   PropelPDO $con the connection to use
     *
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion A version object
     */
    public function getOneVersion($versionNumber, $con = null)
    {
        return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create()
            ->filterByPacGlossaryKey($this)
            ->filterByVersion($versionNumber)
            ->findOne($con);
    }

    /**
     * Gets all the versions of this object, in incremental order
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  PropelObjectCollection A list of ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects
     */
    public function getAllVersions($con = null)
    {
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION);

        return $this->getPacGlossaryKeyVersions($criteria, $con);
    }

    /**
     * Compares the current object with another of its version.
     * <code>
     * print_r($book->compareVersion(1));
     * => array(
     *   '1' => array('Title' => 'Book title at version 1'),
     *   '2' => array('Title' => 'Book title at version 2')
     * );
     * </code>
     *
     * @param   integer   $versionNumber
     * @param   string    $keys Main key used for the result diff (versions|columns)
     * @param   PropelPDO $con the connection to use
     * @param   array     $ignoredColumns  The columns to exclude from the diff.
     *
     * @return  array A list of differences
     */
    public function compareVersion($versionNumber, $keys = 'columns', $con = null, $ignoredColumns = array())
    {
        $fromVersion = $this->toArray();
        $toVersion = $this->getOneVersion($versionNumber, $con)->toArray();

        return $this->computeDiff($fromVersion, $toVersion, $keys, $ignoredColumns);
    }

    /**
     * Compares two versions of the current object.
     * <code>
     * print_r($book->compareVersions(1, 2));
     * => array(
     *   '1' => array('Title' => 'Book title at version 1'),
     *   '2' => array('Title' => 'Book title at version 2')
     * );
     * </code>
     *
     * @param   integer   $fromVersionNumber
     * @param   integer   $toVersionNumber
     * @param   string    $keys Main key used for the result diff (versions|columns)
     * @param   PropelPDO $con the connection to use
     * @param   array     $ignoredColumns  The columns to exclude from the diff.
     *
     * @return  array A list of differences
     */
    public function compareVersions($fromVersionNumber, $toVersionNumber, $keys = 'columns', $con = null, $ignoredColumns = array())
    {
        $fromVersion = $this->getOneVersion($fromVersionNumber, $con)->toArray();
        $toVersion = $this->getOneVersion($toVersionNumber, $con)->toArray();

        return $this->computeDiff($fromVersion, $toVersion, $keys, $ignoredColumns);
    }

    /**
     * Computes the diff between two versions.
     * <code>
     * print_r($this->computeDiff(1, 2));
     * => array(
     *   '1' => array('Title' => 'Book title at version 1'),
     *   '2' => array('Title' => 'Book title at version 2')
     * );
     * </code>
     *
     * @param   array     $fromVersion     An array representing the original version.
     * @param   array     $toVersion       An array representing the destination version.
     * @param   string    $keys            Main key used for the result diff (versions|columns).
     * @param   array     $ignoredColumns  The columns to exclude from the diff.
     *
     * @return  array A list of differences
     */
    protected function computeDiff($fromVersion, $toVersion, $keys = 'columns', $ignoredColumns = array())
    {
        $fromVersionNumber = $fromVersion['Version'];
        $toVersionNumber = $toVersion['Version'];
        $ignoredColumns = array_merge(array(
            'Version',
        ), $ignoredColumns);
        $diff = array();
        foreach ($fromVersion as $key => $value) {
            if (in_array($key, $ignoredColumns)) {
                continue;
            }
            if ($toVersion[$key] != $value) {
                switch ($keys) {
                    case 'versions':
                        $diff[$fromVersionNumber][$key] = $value;
                        $diff[$toVersionNumber][$key] = $toVersion[$key];
                        break;
                    default:
                        $diff[$key] = array(
                            $fromVersionNumber => $value,
                            $toVersionNumber => $toVersion[$key],
                        );
                        break;
                }
            }
        }

        return $diff;
    }
    /**
     * retrieve the last $number versions.
     *
     * @param integer $number the number of record to return.
     * @param ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery|Criteria $criteria Additional criteria to filter.
     * @param PropelPDO $con An optional connection to use.
     *
     * @return PropelCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion[] List of ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects
     */
    public function getLastVersions($number = 10, $criteria = null, PropelPDO $con = null)
    {
        $criteria = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create(null, $criteria);
        $criteria->addDescendingOrderByColumn(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION);
        $criteria->limit($number);

        return $this->getPacGlossaryKeyVersions($criteria, $con);
    }
}
