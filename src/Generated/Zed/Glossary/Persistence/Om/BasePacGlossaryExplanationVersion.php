<?php


/**
 * Base class that represents a row from the 'pac_glossary_explanation_version' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanationVersion extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer
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
     * The value for the fk_glossary_key_version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $fk_glossary_key_version;

    /**
     * @var        PacGlossaryExplanation
     */
    protected $aPacGlossaryExplanation;

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
        $this->version = 0;
        $this->fk_glossary_key_version = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanationVersion object.
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
     * Get the [fk_glossary_key_version] column value.
     *
     * @return int
     */
    public function getFkGlossaryKeyVersion()
    {
        return $this->fk_glossary_key_version;
    }

    /**
     * Set the value of [id_glossary_explanation] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion The current object (for fluent API support)
     */
    public function setIdGlossaryExplanation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_glossary_explanation !== $v) {
            $this->id_glossary_explanation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION;
        }

        if ($this->aPacGlossaryExplanation !== null && $this->aPacGlossaryExplanation->getIdGlossaryExplanation() !== $v) {
            $this->aPacGlossaryExplanation = null;
        }


        return $this;
    } // setIdGlossaryExplanation()

    /**
     * Set the value of [fk_glossary_language] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion The current object (for fluent API support)
     */
    public function setFkGlossaryLanguage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_glossary_language !== $v) {
            $this->fk_glossary_language = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_LANGUAGE;
        }


        return $this;
    } // setFkGlossaryLanguage()

    /**
     * Set the value of [fk_glossary_key] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion The current object (for fluent API support)
     */
    public function setFkGlossaryKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_glossary_key !== $v) {
            $this->fk_glossary_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY;
        }


        return $this;
    } // setFkGlossaryKey()

    /**
     * Set the value of [text] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion The current object (for fluent API support)
     */
    public function setText($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->text !== $v) {
            $this->text = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::TEXT;
        }


        return $this;
    } // setText()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Set the value of [fk_glossary_key_version] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion The current object (for fluent API support)
     */
    public function setFkGlossaryKeyVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_glossary_key_version !== $v) {
            $this->fk_glossary_key_version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY_VERSION;
        }


        return $this;
    } // setFkGlossaryKeyVersion()

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

            if ($this->fk_glossary_key_version !== 0) {
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
            $this->fk_glossary_key_version = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion object", $e);
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

        if ($this->aPacGlossaryExplanation !== null && $this->id_glossary_explanation !== $this->aPacGlossaryExplanation->getIdGlossaryExplanation()) {
            $this->aPacGlossaryExplanation = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacGlossaryExplanation = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::addInstanceToPool($this);
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

            if ($this->aPacGlossaryExplanation !== null) {
                if ($this->aPacGlossaryExplanation->isModified() || $this->aPacGlossaryExplanation->isNew()) {
                    $affectedRows += $this->aPacGlossaryExplanation->save($con);
                }
                $this->setPacGlossaryExplanation($this->aPacGlossaryExplanation);
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
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION)) {
            $modifiedColumns[':p' . $index++]  = '`id_glossary_explanation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_LANGUAGE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_glossary_language`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_glossary_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::TEXT)) {
            $modifiedColumns[':p' . $index++]  = '`text`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY_VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`fk_glossary_key_version`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_glossary_explanation_version` (%s) VALUES (%s)',
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
                    case '`fk_glossary_key_version`':
                        $stmt->bindValue($identifier, $this->fk_glossary_key_version, PDO::PARAM_INT);
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

            if ($this->aPacGlossaryExplanation !== null) {
                if (!$this->aPacGlossaryExplanation->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacGlossaryExplanation->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
            case 5:
                return $this->getFkGlossaryKeyVersion();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion'][serialize($this->getPrimaryKey())] = true;
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdGlossaryExplanation(),
            $keys[1] => $this->getFkGlossaryLanguage(),
            $keys[2] => $this->getFkGlossaryKey(),
            $keys[3] => $this->getText(),
            $keys[4] => $this->getVersion(),
            $keys[5] => $this->getFkGlossaryKeyVersion(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPacGlossaryExplanation) {
                $result['PacGlossaryExplanation'] = $this->aPacGlossaryExplanation->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
            case 5:
                $this->setFkGlossaryKeyVersion($value);
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
        $keys = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdGlossaryExplanation($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkGlossaryLanguage($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkGlossaryKey($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setText($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setVersion($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFkGlossaryKeyVersion($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $this->id_glossary_explanation);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_LANGUAGE)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_LANGUAGE, $this->fk_glossary_language);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY, $this->fk_glossary_key);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::TEXT)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::TEXT, $this->text);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $this->version);
        if ($this->isColumnModified(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY_VERSION)) $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY_VERSION, $this->fk_glossary_key_version);

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
        $criteria = new Criteria(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $this->id_glossary_explanation);
        $criteria->add(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $this->version);

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
        $pks[0] = $this->getIdGlossaryExplanation();
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
        $this->setIdGlossaryExplanation($keys[0]);
        $this->setVersion($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdGlossaryExplanation()) && (null === $this->getVersion());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdGlossaryExplanation($this->getIdGlossaryExplanation());
        $copyObj->setFkGlossaryLanguage($this->getFkGlossaryLanguage());
        $copyObj->setFkGlossaryKey($this->getFkGlossaryKey());
        $copyObj->setText($this->getText());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setFkGlossaryKeyVersion($this->getFkGlossaryKeyVersion());

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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion Clone of current object.
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object.
     *
     * @param             ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation $v
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacGlossaryExplanation(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation $v = null)
    {
        if ($v === null) {
            $this->setIdGlossaryExplanation(NULL);
        } else {
            $this->setIdGlossaryExplanation($v->getIdGlossaryExplanation());
        }

        $this->aPacGlossaryExplanation = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object, it will not be re-added.
        if ($v !== null) {
            $v->addPacGlossaryExplanationVersion($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation The associated ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object.
     * @throws PropelException
     */
    public function getPacGlossaryExplanation(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacGlossaryExplanation === null && ($this->id_glossary_explanation !== null) && $doQuery) {
            $this->aPacGlossaryExplanation = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery::create()->findPk($this->id_glossary_explanation, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacGlossaryExplanation->addPacGlossaryExplanationVersions($this);
             */
        }

        return $this->aPacGlossaryExplanation;
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
        $this->fk_glossary_key_version = null;
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
            if ($this->aPacGlossaryExplanation instanceof Persistent) {
              $this->aPacGlossaryExplanation->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPacGlossaryExplanation = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::DEFAULT_STRING_FORMAT);
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
