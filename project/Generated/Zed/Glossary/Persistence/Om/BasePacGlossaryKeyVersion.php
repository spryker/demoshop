<?php


/**
 * Base class that represents a row from the 'pac_glossary_key_version' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKeyVersion extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer
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
     * The value for the pac_glossary_explanation_ids field.
     * @var        array
     */
    protected $pac_glossary_explanation_ids;

    /**
     * The unserialized $pac_glossary_explanation_ids value - i.e. the persisted object.
     * This is necessary to avoid repeated calls to unserialize() at runtime.
     * @var        object
     */
    protected $pac_glossary_explanation_ids_unserialized;

    /**
     * The value for the pac_glossary_explanation_versions field.
     * @var        array
     */
    protected $pac_glossary_explanation_versions;

    /**
     * The unserialized $pac_glossary_explanation_versions value - i.e. the persisted object.
     * This is necessary to avoid repeated calls to unserialize() at runtime.
     * @var        object
     */
    protected $pac_glossary_explanation_versions_unserialized;

    /**
     * @var        PacGlossaryKey
     */
    protected $aPacGlossaryKey;

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
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKeyVersion object.
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
     * Get the [pac_glossary_explanation_ids] column value.
     *
     * @return array
     */
    public function getPacGlossaryExplanationIds()
    {
        if (null === $this->pac_glossary_explanation_ids_unserialized) {
            $this->pac_glossary_explanation_ids_unserialized = array();
        }
        if (!$this->pac_glossary_explanation_ids_unserialized && null !== $this->pac_glossary_explanation_ids) {
            $pac_glossary_explanation_ids_unserialized = substr($this->pac_glossary_explanation_ids, 2, -2);
            $this->pac_glossary_explanation_ids_unserialized = $pac_glossary_explanation_ids_unserialized ? explode(' | ', $pac_glossary_explanation_ids_unserialized) : array();
        }

        return $this->pac_glossary_explanation_ids_unserialized;
    }

    /**
     * Test the presence of a value in the [pac_glossary_explanation_ids] array column value.
     * @param mixed $value
     *
     * @return boolean
     */
    public function hasPacGlossaryExplanationId($value)
    {
        return in_array($value, $this->getPacGlossaryExplanationIds());
    } // hasPacGlossaryExplanationId()

    /**
     * Get the [pac_glossary_explanation_versions] column value.
     *
     * @return array
     */
    public function getPacGlossaryExplanationVersions()
    {
        if (null === $this->pac_glossary_explanation_versions_unserialized) {
            $this->pac_glossary_explanation_versions_unserialized = array();
        }
        if (!$this->pac_glossary_explanation_versions_unserialized && null !== $this->pac_glossary_explanation_versions) {
            $pac_glossary_explanation_versions_unserialized = substr($this->pac_glossary_explanation_versions, 2, -2);
            $this->pac_glossary_explanation_versions_unserialized = $pac_glossary_explanation_versions_unserialized ? explode(' | ', $pac_glossary_explanation_versions_unserialized) : array();
        }

        return $this->pac_glossary_explanation_versions_unserialized;
    }

    /**
     * Test the presence of a value in the [pac_glossary_explanation_versions] array column value.
     * @param mixed $value
     *
     * @return boolean
     */
    public function hasPacGlossaryExplanationVersion($value)
    {
        return in_array($value, $this->getPacGlossaryExplanationVersions());
    } // hasPacGlossaryExplanationVersion()

    /**
     * Set the value of [id_glossary_key] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function setIdGlossaryKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_glossary_key !== $v) {
            $this->id_glossary_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY;
        }

        if ($this->aPacGlossaryKey !== null && $this->aPacGlossaryKey->getIdGlossaryKey() !== $v) {
            $this->aPacGlossaryKey = null;
        }


        return $this;
    } // setIdGlossaryKey()

    /**
     * Set the value of [fk_glossary_group] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function setFkGlossaryGroup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_glossary_group !== $v) {
            $this->fk_glossary_group = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::FK_GLOSSARY_GROUP;
        }


        return $this;
    } // setFkGlossaryGroup()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::NAME;
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_GLOBAL;
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Set the value of [pac_glossary_explanation_ids] column.
     *
     * @param array $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function setPacGlossaryExplanationIds($v)
    {
        if ($this->pac_glossary_explanation_ids_unserialized !== $v) {
            $this->pac_glossary_explanation_ids_unserialized = $v;
            $this->pac_glossary_explanation_ids = '| ' . implode(' | ', $v) . ' |';
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS;
        }


        return $this;
    } // setPacGlossaryExplanationIds()

    /**
     * Adds a value to the [pac_glossary_explanation_ids] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function addPacGlossaryExplanationId($value)
    {
        $currentArray = $this->getPacGlossaryExplanationIds();
        $currentArray []= $value;
        $this->setPacGlossaryExplanationIds($currentArray);

        return $this;
    } // addPacGlossaryExplanationId()

    /**
     * Removes a value from the [pac_glossary_explanation_ids] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function removePacGlossaryExplanationId($value)
    {
        $targetArray = array();
        foreach ($this->getPacGlossaryExplanationIds() as $element) {
            if ($element != $value) {
                $targetArray []= $element;
            }
        }
        $this->setPacGlossaryExplanationIds($targetArray);

        return $this;
    } // removePacGlossaryExplanationId()

    /**
     * Set the value of [pac_glossary_explanation_versions] column.
     *
     * @param array $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function setPacGlossaryExplanationVersions($v)
    {
        if ($this->pac_glossary_explanation_versions_unserialized !== $v) {
            $this->pac_glossary_explanation_versions_unserialized = $v;
            $this->pac_glossary_explanation_versions = '| ' . implode(' | ', $v) . ' |';
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS;
        }


        return $this;
    } // setPacGlossaryExplanationVersions()

    /**
     * Adds a value to the [pac_glossary_explanation_versions] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function addPacGlossaryExplanationVersion($value)
    {
        $currentArray = $this->getPacGlossaryExplanationVersions();
        $currentArray []= $value;
        $this->setPacGlossaryExplanationVersions($currentArray);

        return $this;
    } // addPacGlossaryExplanationVersion()

    /**
     * Removes a value from the [pac_glossary_explanation_versions] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     */
    public function removePacGlossaryExplanationVersion($value)
    {
        $targetArray = array();
        foreach ($this->getPacGlossaryExplanationVersions() as $element) {
            if ($element != $value) {
                $targetArray []= $element;
            }
        }
        $this->setPacGlossaryExplanationVersions($targetArray);

        return $this;
    } // removePacGlossaryExplanationVersion()

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
            $this->pac_glossary_explanation_ids = $row[$startcol + 6];
            $this->pac_glossary_explanation_ids_unserialized = null;
            $this->pac_glossary_explanation_versions = $row[$startcol + 7];
            $this->pac_glossary_explanation_versions_unserialized = null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion object", $e);
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

        if ($this->aPacGlossaryKey !== null && $this->id_glossary_key !== $this->aPacGlossaryKey->getIdGlossaryKey()) {
            $this->aPacGlossaryKey = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacGlossaryKey = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::addInstanceToPool($this);
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

            if ($this->aPacGlossaryKey !== null) {
                if ($this->aPacGlossaryKey->isModified() || $this->aPacGlossaryKey->isNew()) {
                    $affectedRows += $this->aPacGlossaryKey->save($con);
                }
                $this->setPacGlossaryKey($this->aPacGlossaryKey);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`id_glossary_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::FK_GLOSSARY_GROUP)) {
            $modifiedColumns[':p' . $index++]  = '`fk_glossary_group`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_GLOBAL)) {
            $modifiedColumns[':p' . $index++]  = '`is_global`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS)) {
            $modifiedColumns[':p' . $index++]  = '`pac_glossary_explanation_ids`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS)) {
            $modifiedColumns[':p' . $index++]  = '`pac_glossary_explanation_versions`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_glossary_key_version` (%s) VALUES (%s)',
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
                    case '`pac_glossary_explanation_ids`':
                        $stmt->bindValue($identifier, $this->pac_glossary_explanation_ids, PDO::PARAM_STR);
                        break;
                    case '`pac_glossary_explanation_versions`':
                        $stmt->bindValue($identifier, $this->pac_glossary_explanation_versions, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
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

            if ($this->aPacGlossaryKey !== null) {
                if (!$this->aPacGlossaryKey->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacGlossaryKey->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
            case 6:
                return $this->getPacGlossaryExplanationIds();
                break;
            case 7:
                return $this->getPacGlossaryExplanationVersions();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion'][serialize($this->getPrimaryKey())] = true;
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdGlossaryKey(),
            $keys[1] => $this->getFkGlossaryGroup(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getIsGlobal(),
            $keys[4] => $this->getIsDeleted(),
            $keys[5] => $this->getVersion(),
            $keys[6] => $this->getPacGlossaryExplanationIds(),
            $keys[7] => $this->getPacGlossaryExplanationVersions(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPacGlossaryKey) {
                $result['PacGlossaryKey'] = $this->aPacGlossaryKey->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
            case 6:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setPacGlossaryExplanationIds($value);
                break;
            case 7:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setPacGlossaryExplanationVersions($value);
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
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdGlossaryKey($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkGlossaryGroup($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsGlobal($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIsDeleted($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setVersion($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPacGlossaryExplanationIds($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPacGlossaryExplanationVersions($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $this->id_glossary_key);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::FK_GLOSSARY_GROUP)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::FK_GLOSSARY_GROUP, $this->fk_glossary_group);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::NAME)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_GLOBAL)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_GLOBAL, $this->is_global);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION, $this->version);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS, $this->pac_glossary_explanation_ids);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS, $this->pac_glossary_explanation_versions);

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
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $this->id_glossary_key);
        $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION, $this->version);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getIdGlossaryKey();
        $pks[1] = $this->getVersion();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setIdGlossaryKey($keys[0]);
        $this->setVersion($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdGlossaryKey()) && (null === $this->getVersion());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdGlossaryKey($this->getIdGlossaryKey());
        $copyObj->setFkGlossaryGroup($this->getFkGlossaryGroup());
        $copyObj->setName($this->getName());
        $copyObj->setIsGlobal($this->getIsGlobal());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setPacGlossaryExplanationIds($this->getPacGlossaryExplanationIds());
        $copyObj->setPacGlossaryExplanationVersions($this->getPacGlossaryExplanationVersions());

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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion Clone of current object.
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object.
     *
     * @param             ProjectA_Zed_Glossary_Persistence_PacGlossaryKey $v
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacGlossaryKey(ProjectA_Zed_Glossary_Persistence_PacGlossaryKey $v = null)
    {
        if ($v === null) {
            $this->setIdGlossaryKey(NULL);
        } else {
            $this->setIdGlossaryKey($v->getIdGlossaryKey());
        }

        $this->aPacGlossaryKey = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object, it will not be re-added.
        if ($v !== null) {
            $v->addPacGlossaryKeyVersion($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey The associated ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object.
     * @throws PropelException
     */
    public function getPacGlossaryKey(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacGlossaryKey === null && ($this->id_glossary_key !== null) && $doQuery) {
            $this->aPacGlossaryKey = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery::create()->findPk($this->id_glossary_key, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacGlossaryKey->addPacGlossaryKeyVersions($this);
             */
        }

        return $this->aPacGlossaryKey;
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
        $this->pac_glossary_explanation_ids = null;
        $this->pac_glossary_explanation_ids_unserialized = null;
        $this->pac_glossary_explanation_versions = null;
        $this->pac_glossary_explanation_versions_unserialized = null;
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
            if ($this->aPacGlossaryKey instanceof Persistent) {
              $this->aPacGlossaryKey->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPacGlossaryKey = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::DEFAULT_STRING_FORMAT);
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
