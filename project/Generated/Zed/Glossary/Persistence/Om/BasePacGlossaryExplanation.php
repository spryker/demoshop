<?php


/**
 * Base class that represents a row from the 'pac_glossary_explanation' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanation extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_glossary_explanation field.
     * @var        int
     */
    protected $id_glossary_explanation;

    /**
     * The value for the fk_glossary_language field.
     * @var        int
     */
    protected $fk_glossary_language;

    /**
     * The value for the fk_glossary_key field.
     * @var        int
     */
    protected $fk_glossary_key;

    /**
     * The value for the text field.
     * @var        string
     */
    protected $text;

    /**
     * The value for the version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $version;

    /**
     * @var        PacGlossaryLanguage
     */
    protected $aGlossaryLanguage;

    /**
     * @var        PacGlossaryKey
     */
    protected $aGlossaryKey;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion[] Collection to store aggregation of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects.
     */
    protected $collPacGlossaryExplanationVersions;
    protected $collPacGlossaryExplanationVersionsPartial;

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
    protected $pacGlossaryExplanationVersionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->version = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanation object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_glossary_explanation] column value.
     *
     * @return int
     */
    public function getIdGlossaryExplanation()
    {
        return $this->id_glossary_explanation;
    }

    /**
     * Get the [fk_glossary_language] column value.
     *
     * @return int
     */
    public function getFkGlossaryLanguage()
    {
        return $this->fk_glossary_language;
    }

    /**
     * Get the [fk_glossary_key] column value.
     *
     * @return int
     */
    public function getFkGlossaryKey()
    {
        return $this->fk_glossary_key;
    }

    /**
     * Get the [text] column value.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
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
     * Set the value of [id_glossary_explanation] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function setIdGlossaryExplanation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_glossary_explanation !== $v) {
            $this->id_glossary_explanation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION;
        }


        return $this;
    } // setIdGlossaryExplanation()

    /**
     * Set the value of [fk_glossary_language] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function setFkGlossaryLanguage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_glossary_language !== $v) {
            $this->fk_glossary_language = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE;
        }

        if ($this->aGlossaryLanguage !== null && $this->aGlossaryLanguage->getIdGlossaryLanguage() !== $v) {
            $this->aGlossaryLanguage = null;
        }


        return $this;
    } // setFkGlossaryLanguage()

    /**
     * Set the value of [fk_glossary_key] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function setFkGlossaryKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_glossary_key !== $v) {
            $this->fk_glossary_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY;
        }

        if ($this->aGlossaryKey !== null && $this->aGlossaryKey->getIdGlossaryKey() !== $v) {
            $this->aGlossaryKey = null;
        }


        return $this;
    } // setFkGlossaryKey()

    /**
     * Set the value of [text] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function setText($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->text !== $v) {
            $this->text = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::TEXT;
        }


        return $this;
    } // setText()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::VERSION;
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

            $this->id_glossary_explanation = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_glossary_language = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_glossary_key = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->text = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->version = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object", $e);
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

        if ($this->aGlossaryLanguage !== null && $this->fk_glossary_language !== $this->aGlossaryLanguage->getIdGlossaryLanguage()) {
            $this->aGlossaryLanguage = null;
        }
        if ($this->aGlossaryKey !== null && $this->fk_glossary_key !== $this->aGlossaryKey->getIdGlossaryKey()) {
            $this->aGlossaryKey = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aGlossaryLanguage = null;
            $this->aGlossaryKey = null;
            $this->collPacGlossaryExplanationVersions = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::addInstanceToPool($this);
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

            if ($this->aGlossaryLanguage !== null) {
                if ($this->aGlossaryLanguage->isModified() || $this->aGlossaryLanguage->isNew()) {
                    $affectedRows += $this->aGlossaryLanguage->save($con);
                }
                $this->setGlossaryLanguage($this->aGlossaryLanguage);
            }

            if ($this->aGlossaryKey !== null) {
                if ($this->aGlossaryKey->isModified() || $this->aGlossaryKey->isNew()) {
                    $affectedRows += $this->aGlossaryKey->save($con);
                }
                $this->setGlossaryKey($this->aGlossaryKey);
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

            if ($this->pacGlossaryExplanationVersionsScheduledForDeletion !== null) {
                if (!$this->pacGlossaryExplanationVersionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create()
                        ->filterByPrimaryKeys($this->pacGlossaryExplanationVersionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacGlossaryExplanationVersionsScheduledForDeletion = null;
                }
            }

            if ($this->collPacGlossaryExplanationVersions !== null) {
                foreach ($this->collPacGlossaryExplanationVersions as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION;
        if (null !== $this->id_glossary_explanation) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION)) {
            $modifiedColumns[':p' . $index++]  = '`id_glossary_explanation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_glossary_language`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_glossary_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::TEXT)) {
            $modifiedColumns[':p' . $index++]  = '`text`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_glossary_explanation` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_glossary_explanation`':
                        $stmt->bindValue($identifier, $this->id_glossary_explanation, PDO::PARAM_INT);
                        break;
                    case '`fk_glossary_language`':
                        $stmt->bindValue($identifier, $this->fk_glossary_language, PDO::PARAM_INT);
                        break;
                    case '`fk_glossary_key`':
                        $stmt->bindValue($identifier, $this->fk_glossary_key, PDO::PARAM_INT);
                        break;
                    case '`text`':
                        $stmt->bindValue($identifier, $this->text, PDO::PARAM_STR);
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
        $this->setIdGlossaryExplanation($pk);

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

            if ($this->aGlossaryLanguage !== null) {
                if (!$this->aGlossaryLanguage->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aGlossaryLanguage->getValidationFailures());
                }
            }

            if ($this->aGlossaryKey !== null) {
                if (!$this->aGlossaryKey->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aGlossaryKey->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacGlossaryExplanationVersions !== null) {
                    foreach ($this->collPacGlossaryExplanationVersions as $referrerFK) {
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdGlossaryExplanation();
                break;
            case 1:
                return $this->getFkGlossaryLanguage();
                break;
            case 2:
                return $this->getFkGlossaryKey();
                break;
            case 3:
                return $this->getText();
                break;
            case 4:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdGlossaryExplanation(),
            $keys[1] => $this->getFkGlossaryLanguage(),
            $keys[2] => $this->getFkGlossaryKey(),
            $keys[3] => $this->getText(),
            $keys[4] => $this->getVersion(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aGlossaryLanguage) {
                $result['GlossaryLanguage'] = $this->aGlossaryLanguage->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aGlossaryKey) {
                $result['GlossaryKey'] = $this->aGlossaryKey->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacGlossaryExplanationVersions) {
                $result['PacGlossaryExplanationVersions'] = $this->collPacGlossaryExplanationVersions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdGlossaryExplanation($value);
                break;
            case 1:
                $this->setFkGlossaryLanguage($value);
                break;
            case 2:
                $this->setFkGlossaryKey($value);
                break;
            case 3:
                $this->setText($value);
                break;
            case 4:
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
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdGlossaryExplanation($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkGlossaryLanguage($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkGlossaryKey($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setText($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setVersion($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $this->id_glossary_explanation);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE, $this->fk_glossary_language);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY, $this->fk_glossary_key);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::TEXT)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::TEXT, $this->text);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::VERSION)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::VERSION, $this->version);

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
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $this->id_glossary_explanation);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdGlossaryExplanation();
    }

    /**
     * Generic method to set the primary key (id_glossary_explanation column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdGlossaryExplanation($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdGlossaryExplanation();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkGlossaryLanguage($this->getFkGlossaryLanguage());
        $copyObj->setFkGlossaryKey($this->getFkGlossaryKey());
        $copyObj->setText($this->getText());
        $copyObj->setVersion($this->getVersion());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacGlossaryExplanationVersions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacGlossaryExplanationVersion($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdGlossaryExplanation(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation Clone of current object.
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage object.
     *
     * @param             ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage $v
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGlossaryLanguage(ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage $v = null)
    {
        if ($v === null) {
            $this->setFkGlossaryLanguage(NULL);
        } else {
            $this->setFkGlossaryLanguage($v->getIdGlossaryLanguage());
        }

        $this->aGlossaryLanguage = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage object, it will not be re-added.
        if ($v !== null) {
            $v->addGlossaryExplanation($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage The associated ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage object.
     * @throws PropelException
     */
    public function getGlossaryLanguage(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aGlossaryLanguage === null && ($this->fk_glossary_language !== null) && $doQuery) {
            $this->aGlossaryLanguage = ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery::create()->findPk($this->fk_glossary_language, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGlossaryLanguage->addGlossaryExplanations($this);
             */
        }

        return $this->aGlossaryLanguage;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object.
     *
     * @param             ProjectA_Zed_Glossary_Persistence_PacGlossaryKey $v
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGlossaryKey(ProjectA_Zed_Glossary_Persistence_PacGlossaryKey $v = null)
    {
        if ($v === null) {
            $this->setFkGlossaryKey(NULL);
        } else {
            $this->setFkGlossaryKey($v->getIdGlossaryKey());
        }

        $this->aGlossaryKey = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object, it will not be re-added.
        if ($v !== null) {
            $v->addGlossaryExplanation($this);
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
    public function getGlossaryKey(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aGlossaryKey === null && ($this->fk_glossary_key !== null) && $doQuery) {
            $this->aGlossaryKey = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery::create()->findPk($this->fk_glossary_key, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGlossaryKey->addGlossaryExplanations($this);
             */
        }

        return $this->aGlossaryKey;
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
        if ('PacGlossaryExplanationVersion' == $relationName) {
            $this->initPacGlossaryExplanationVersions();
        }
    }

    /**
     * Clears out the collPacGlossaryExplanationVersions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     * @see        addPacGlossaryExplanationVersions()
     */
    public function clearPacGlossaryExplanationVersions()
    {
        $this->collPacGlossaryExplanationVersions = null; // important to set this to null since that means it is uninitialized
        $this->collPacGlossaryExplanationVersionsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacGlossaryExplanationVersions collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacGlossaryExplanationVersions($v = true)
    {
        $this->collPacGlossaryExplanationVersionsPartial = $v;
    }

    /**
     * Initializes the collPacGlossaryExplanationVersions collection.
     *
     * By default this just sets the collPacGlossaryExplanationVersions collection to an empty array (like clearcollPacGlossaryExplanationVersions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacGlossaryExplanationVersions($overrideExisting = true)
    {
        if (null !== $this->collPacGlossaryExplanationVersions && !$overrideExisting) {
            return;
        }
        $this->collPacGlossaryExplanationVersions = new PropelObjectCollection();
        $this->collPacGlossaryExplanationVersions->setModel('ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion');
    }

    /**
     * Gets an array of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion[] List of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects
     * @throws PropelException
     */
    public function getPacGlossaryExplanationVersions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryExplanationVersionsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryExplanationVersions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryExplanationVersions) {
                // return empty collection
                $this->initPacGlossaryExplanationVersions();
            } else {
                $collPacGlossaryExplanationVersions = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create(null, $criteria)
                    ->filterByPacGlossaryExplanation($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacGlossaryExplanationVersionsPartial && count($collPacGlossaryExplanationVersions)) {
                      $this->initPacGlossaryExplanationVersions(false);

                      foreach($collPacGlossaryExplanationVersions as $obj) {
                        if (false == $this->collPacGlossaryExplanationVersions->contains($obj)) {
                          $this->collPacGlossaryExplanationVersions->append($obj);
                        }
                      }

                      $this->collPacGlossaryExplanationVersionsPartial = true;
                    }

                    $collPacGlossaryExplanationVersions->getInternalIterator()->rewind();
                    return $collPacGlossaryExplanationVersions;
                }

                if($partial && $this->collPacGlossaryExplanationVersions) {
                    foreach($this->collPacGlossaryExplanationVersions as $obj) {
                        if($obj->isNew()) {
                            $collPacGlossaryExplanationVersions[] = $obj;
                        }
                    }
                }

                $this->collPacGlossaryExplanationVersions = $collPacGlossaryExplanationVersions;
                $this->collPacGlossaryExplanationVersionsPartial = false;
            }
        }

        return $this->collPacGlossaryExplanationVersions;
    }

    /**
     * Sets a collection of PacGlossaryExplanationVersion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacGlossaryExplanationVersions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function setPacGlossaryExplanationVersions(PropelCollection $pacGlossaryExplanationVersions, PropelPDO $con = null)
    {
        $pacGlossaryExplanationVersionsToDelete = $this->getPacGlossaryExplanationVersions(new Criteria(), $con)->diff($pacGlossaryExplanationVersions);

        $this->pacGlossaryExplanationVersionsScheduledForDeletion = unserialize(serialize($pacGlossaryExplanationVersionsToDelete));

        foreach ($pacGlossaryExplanationVersionsToDelete as $pacGlossaryExplanationVersionRemoved) {
            $pacGlossaryExplanationVersionRemoved->setPacGlossaryExplanation(null);
        }

        $this->collPacGlossaryExplanationVersions = null;
        foreach ($pacGlossaryExplanationVersions as $pacGlossaryExplanationVersion) {
            $this->addPacGlossaryExplanationVersion($pacGlossaryExplanationVersion);
        }

        $this->collPacGlossaryExplanationVersions = $pacGlossaryExplanationVersions;
        $this->collPacGlossaryExplanationVersionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects.
     * @throws PropelException
     */
    public function countPacGlossaryExplanationVersions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryExplanationVersionsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryExplanationVersions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryExplanationVersions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacGlossaryExplanationVersions());
            }
            $query = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacGlossaryExplanation($this)
                ->count($con);
        }

        return count($this->collPacGlossaryExplanationVersions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion object to this object
     * through the ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion foreign key attribute.
     *
     * @param    ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion $l ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function addPacGlossaryExplanationVersion(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion $l)
    {
        if ($this->collPacGlossaryExplanationVersions === null) {
            $this->initPacGlossaryExplanationVersions();
            $this->collPacGlossaryExplanationVersionsPartial = true;
        }
        if (!in_array($l, $this->collPacGlossaryExplanationVersions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacGlossaryExplanationVersion($l);
        }

        return $this;
    }

    /**
     * @param	PacGlossaryExplanationVersion $pacGlossaryExplanationVersion The pacGlossaryExplanationVersion object to add.
     */
    protected function doAddPacGlossaryExplanationVersion($pacGlossaryExplanationVersion)
    {
        $this->collPacGlossaryExplanationVersions[]= $pacGlossaryExplanationVersion;
        $pacGlossaryExplanationVersion->setPacGlossaryExplanation($this);
    }

    /**
     * @param	PacGlossaryExplanationVersion $pacGlossaryExplanationVersion The pacGlossaryExplanationVersion object to remove.
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function removePacGlossaryExplanationVersion($pacGlossaryExplanationVersion)
    {
        if ($this->getPacGlossaryExplanationVersions()->contains($pacGlossaryExplanationVersion)) {
            $this->collPacGlossaryExplanationVersions->remove($this->collPacGlossaryExplanationVersions->search($pacGlossaryExplanationVersion));
            if (null === $this->pacGlossaryExplanationVersionsScheduledForDeletion) {
                $this->pacGlossaryExplanationVersionsScheduledForDeletion = clone $this->collPacGlossaryExplanationVersions;
                $this->pacGlossaryExplanationVersionsScheduledForDeletion->clear();
            }
            $this->pacGlossaryExplanationVersionsScheduledForDeletion[]= clone $pacGlossaryExplanationVersion;
            $pacGlossaryExplanationVersion->setPacGlossaryExplanation(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_glossary_explanation = null;
        $this->fk_glossary_language = null;
        $this->fk_glossary_key = null;
        $this->text = null;
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
            if ($this->collPacGlossaryExplanationVersions) {
                foreach ($this->collPacGlossaryExplanationVersions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aGlossaryLanguage instanceof Persistent) {
              $this->aGlossaryLanguage->clearAllReferences($deep);
            }
            if ($this->aGlossaryKey instanceof Persistent) {
              $this->aGlossaryKey->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacGlossaryExplanationVersions instanceof PropelCollection) {
            $this->collPacGlossaryExplanationVersions->clearIterator();
        }
        $this->collPacGlossaryExplanationVersions = null;
        $this->aGlossaryLanguage = null;
        $this->aGlossaryKey = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::DEFAULT_STRING_FORMAT);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation
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

        if (ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::isVersioningEnabled() && ($this->isNew() || $this->isModified() || $this->isDeleted())) {
            return true;
        }
        if (null !== ($object = $this->getGlossaryKey($con)) && $object->isVersioningNecessary($con)) {
            return true;
        }


        return false;
    }

    /**
     * Creates a version of the current object and saves it.
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion A version object
     */
    public function addVersion($con = null)
    {
        $this->enforceVersion = false;

        $version = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion();
        $version->setIdGlossaryExplanation($this->getIdGlossaryExplanation());
        $version->setFkGlossaryLanguage($this->getFkGlossaryLanguage());
        $version->setFkGlossaryKey($this->getFkGlossaryKey());
        $version->setText($this->getText());
        $version->setVersion($this->getVersion());
        $version->setPacGlossaryExplanation($this);
        if (($related = $this->getGlossaryKey($con)) && $related->getVersion()) {
            $version->setFkGlossaryKeyVersion($related->getVersion());
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
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     * @throws  PropelException - if no object with the given version can be found.
     */
    public function toVersion($versionNumber, $con = null)
    {
        $version = $this->getOneVersion($versionNumber, $con);
        if (!$version) {
            throw new PropelException(sprintf('No ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object found with version %d', $version));
        }
        $this->populateFromVersion($version, $con);

        return $this;
    }

    /**
     * Sets the properties of the curent object to the value they had at a specific version
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion $version The version object to use
     * @param   PropelPDO $con the connection to use
     * @param   array $loadedObjects objects thats been loaded in a chain of populateFromVersion calls on referrer or fk objects.
     *
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The current object (for fluent API support)
     */
    public function populateFromVersion($version, $con = null, &$loadedObjects = array())
    {

        $loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation'][$version->getIdGlossaryExplanation()][$version->getVersion()] = $this;
        $this->setIdGlossaryExplanation($version->getIdGlossaryExplanation());
        $this->setFkGlossaryLanguage($version->getFkGlossaryLanguage());
        $this->setFkGlossaryKey($version->getFkGlossaryKey());
        $this->setText($version->getText());
        $this->setVersion($version->getVersion());
        if ($fkValue = $version->getFkGlossaryKey()) {
            if (isset($loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKey']) && isset($loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKey'][$fkValue]) && isset($loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKey'][$fkValue][$version->getFkGlossaryKeyVersion()])) {
                $related = $loadedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryKey'][$fkValue][$version->getFkGlossaryKeyVersion()];
            } else {
                $related = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKey();
                $relatedVersion = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery::create()
                    ->filterByIdGlossaryKey($fkValue)
                    ->filterByVersion($version->getFkGlossaryKeyVersion())
                    ->findOne($con);
                $related->populateFromVersion($relatedVersion, $con, $loadedObjects);
                $related->setNew(false);
            }
            $this->setGlossaryKey($related);
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
        $v = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create()
            ->filterByPacGlossaryExplanation($this)
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
     * @return  ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion A version object
     */
    public function getOneVersion($versionNumber, $con = null)
    {
        return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create()
            ->filterByPacGlossaryExplanation($this)
            ->filterByVersion($versionNumber)
            ->findOne($con);
    }

    /**
     * Gets all the versions of this object, in incremental order
     *
     * @param   PropelPDO $con the connection to use
     *
     * @return  PropelObjectCollection A list of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects
     */
    public function getAllVersions($con = null)
    {
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION);

        return $this->getPacGlossaryExplanationVersions($criteria, $con);
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
     * @param ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery|Criteria $criteria Additional criteria to filter.
     * @param PropelPDO $con An optional connection to use.
     *
     * @return PropelCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion[] List of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects
     */
    public function getLastVersions($number = 10, $criteria = null, PropelPDO $con = null)
    {
        $criteria = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create(null, $criteria);
        $criteria->addDescendingOrderByColumn(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION);
        $criteria->limit($number);

        return $this->getPacGlossaryExplanationVersions($criteria, $con);
    }
}
