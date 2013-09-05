<?php


/**
 * Base class that represents a row from the 'sao_mail_sequence_element' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceElement extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mail_sequence_element field.
     * @var        int
     */
    protected $id_mail_sequence_element;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the template field.
     * @var        string
     */
    protected $template;

    /**
     * The value for the interval field.
     * @var        string
     */
    protected $interval;

    /**
     * The value for the position field.
     * @var        int
     */
    protected $position;

    /**
     * The value for the fk_mail_sequence field.
     * @var        int
     */
    protected $fk_mail_sequence;

    /**
     * @var        SaoMailSequence
     */
    protected $aMailSequence;

    /**
     * @var        Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool one-to-one related Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool object
     */
    protected $singleMailSequenceElementCodepool;

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
    protected $mailSequenceElementCodepoolsScheduledForDeletion = null;

    /**
     * Get the [id_mail_sequence_element] column value.
     *
     * @return int
     */
    public function getIdMailSequenceElement()
    {
        return $this->id_mail_sequence_element;
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
     * Get the [template] column value.
     * Explicit no FK to template table. As so you will be able to use other template systems with the sequences.
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Get the [interval] column value.
     * use php date-string parsing functionality. e.g. 5 days or 20 minutes
     * @return string
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Get the [position] column value.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get the [fk_mail_sequence] column value.
     *
     * @return int
     */
    public function getFkMailSequence()
    {
        return $this->fk_mail_sequence;
    }

    /**
     * Set the value of [id_mail_sequence_element] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     */
    public function setIdMailSequenceElement($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mail_sequence_element !== $v) {
            $this->id_mail_sequence_element = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT;
        }


        return $this;
    } // setIdMailSequenceElement()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [template] column.
     * Explicit no FK to template table. As so you will be able to use other template systems with the sequences.
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     */
    public function setTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->template !== $v) {
            $this->template = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::TEMPLATE;
        }


        return $this;
    } // setTemplate()

    /**
     * Set the value of [interval] column.
     * use php date-string parsing functionality. e.g. 5 days or 20 minutes
     * @param string $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     */
    public function setInterval($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->interval !== $v) {
            $this->interval = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::INTERVAL;
        }


        return $this;
    } // setInterval()

    /**
     * Set the value of [position] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     */
    public function setPosition($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->position !== $v) {
            $this->position = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION;
        }


        return $this;
    } // setPosition()

    /**
     * Set the value of [fk_mail_sequence] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     */
    public function setFkMailSequence($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_mail_sequence !== $v) {
            $this->fk_mail_sequence = $v;
            $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE;
        }

        if ($this->aMailSequence !== null && $this->aMailSequence->getIdMailSequence() !== $v) {
            $this->aMailSequence = null;
        }


        return $this;
    } // setFkMailSequence()

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

            $this->id_mail_sequence_element = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->template = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->interval = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->position = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->fk_mail_sequence = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Mail_Persistence_SaoMailSequenceElement object", $e);
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

        if ($this->aMailSequence !== null && $this->fk_mail_sequence !== $this->aMailSequence->getIdMailSequence()) {
            $this->aMailSequence = null;
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMailSequence = null;
            $this->singleMailSequenceElementCodepool = null;

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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery::create()
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
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::addInstanceToPool($this);
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

            if ($this->aMailSequence !== null) {
                if ($this->aMailSequence->isModified() || $this->aMailSequence->isNew()) {
                    $affectedRows += $this->aMailSequence->save($con);
                }
                $this->setMailSequence($this->aMailSequence);
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

            if ($this->mailSequenceElementCodepoolsScheduledForDeletion !== null) {
                if (!$this->mailSequenceElementCodepoolsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery::create()
                        ->filterByPrimaryKeys($this->mailSequenceElementCodepoolsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mailSequenceElementCodepoolsScheduledForDeletion = null;
                }
            }

            if ($this->singleMailSequenceElementCodepool !== null) {
                if (!$this->singleMailSequenceElementCodepool->isDeleted() && ($this->singleMailSequenceElementCodepool->isNew() || $this->singleMailSequenceElementCodepool->isModified())) {
                        $affectedRows += $this->singleMailSequenceElementCodepool->save($con);
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

        $this->modifiedColumns[] = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT;
        if (null !== $this->id_mail_sequence_element) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT)) {
            $modifiedColumns[':p' . $index++]  = '`id_mail_sequence_element`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`template`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::INTERVAL)) {
            $modifiedColumns[':p' . $index++]  = '`interval`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION)) {
            $modifiedColumns[':p' . $index++]  = '`position`';
        }
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_mail_sequence`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_mail_sequence_element` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mail_sequence_element`':
                        $stmt->bindValue($identifier, $this->id_mail_sequence_element, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`template`':
                        $stmt->bindValue($identifier, $this->template, PDO::PARAM_STR);
                        break;
                    case '`interval`':
                        $stmt->bindValue($identifier, $this->interval, PDO::PARAM_STR);
                        break;
                    case '`position`':
                        $stmt->bindValue($identifier, $this->position, PDO::PARAM_INT);
                        break;
                    case '`fk_mail_sequence`':
                        $stmt->bindValue($identifier, $this->fk_mail_sequence, PDO::PARAM_INT);
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
        $this->setIdMailSequenceElement($pk);

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

            if ($this->aMailSequence !== null) {
                if (!$this->aMailSequence->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMailSequence->getValidationFailures());
                }
            }


            if (($retval = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->singleMailSequenceElementCodepool !== null) {
                    if (!$this->singleMailSequenceElementCodepool->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleMailSequenceElementCodepool->getValidationFailures());
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMailSequenceElement();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getTemplate();
                break;
            case 3:
                return $this->getInterval();
                break;
            case 4:
                return $this->getPosition();
                break;
            case 5:
                return $this->getFkMailSequence();
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
        if (isset($alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailSequenceElement'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Mail_Persistence_SaoMailSequenceElement'][$this->getPrimaryKey()] = true;
        $keys = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMailSequenceElement(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getTemplate(),
            $keys[3] => $this->getInterval(),
            $keys[4] => $this->getPosition(),
            $keys[5] => $this->getFkMailSequence(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMailSequence) {
                $result['MailSequence'] = $this->aMailSequence->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleMailSequenceElementCodepool) {
                $result['MailSequenceElementCodepool'] = $this->singleMailSequenceElementCodepool->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
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
        $pos = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMailSequenceElement($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setTemplate($value);
                break;
            case 3:
                $this->setInterval($value);
                break;
            case 4:
                $this->setPosition($value);
                break;
            case 5:
                $this->setFkMailSequence($value);
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
        $keys = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMailSequenceElement($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTemplate($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setInterval($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPosition($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFkMailSequence($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $this->id_mail_sequence_element);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::NAME)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::NAME, $this->name);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::TEMPLATE)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::TEMPLATE, $this->template);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::INTERVAL)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::INTERVAL, $this->interval);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION, $this->position);
        if ($this->isColumnModified(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE)) $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE, $this->fk_mail_sequence);

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
        $criteria = new Criteria(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $this->id_mail_sequence_element);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMailSequenceElement();
    }

    /**
     * Generic method to set the primary key (id_mail_sequence_element column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMailSequenceElement($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMailSequenceElement();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sao_Zed_Mail_Persistence_SaoMailSequenceElement (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setTemplate($this->getTemplate());
        $copyObj->setInterval($this->getInterval());
        $copyObj->setPosition($this->getPosition());
        $copyObj->setFkMailSequence($this->getFkMailSequence());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            $relObj = $this->getMailSequenceElementCodepool();
            if ($relObj) {
                $copyObj->setMailSequenceElementCodepool($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMailSequenceElement(NULL); // this is a auto-increment column, so set to default value
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement Clone of current object.
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sao_Zed_Mail_Persistence_SaoMailSequence object.
     *
     * @param             Sao_Zed_Mail_Persistence_SaoMailSequence $v
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMailSequence(Sao_Zed_Mail_Persistence_SaoMailSequence $v = null)
    {
        if ($v === null) {
            $this->setFkMailSequence(NULL);
        } else {
            $this->setFkMailSequence($v->getIdMailSequence());
        }

        $this->aMailSequence = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sao_Zed_Mail_Persistence_SaoMailSequence object, it will not be re-added.
        if ($v !== null) {
            $v->addMailSequenceElement($this);
        }


        return $this;
    }


    /**
     * Get the associated Sao_Zed_Mail_Persistence_SaoMailSequence object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence The associated Sao_Zed_Mail_Persistence_SaoMailSequence object.
     * @throws PropelException
     */
    public function getMailSequence(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMailSequence === null && ($this->fk_mail_sequence !== null) && $doQuery) {
            $this->aMailSequence = Sao_Zed_Mail_Persistence_SaoMailSequenceQuery::create()->findPk($this->fk_mail_sequence, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMailSequence->addMailSequenceElements($this);
             */
        }

        return $this->aMailSequence;
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
    }

    /**
     * Gets a single Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool
     * @throws PropelException
     */
    public function getMailSequenceElementCodepool(PropelPDO $con = null)
    {

        if ($this->singleMailSequenceElementCodepool === null && !$this->isNew()) {
            $this->singleMailSequenceElementCodepool = Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleMailSequenceElementCodepool;
    }

    /**
     * Sets a single Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool object as related to this object by a one-to-one relationship.
     *
     * @param             Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool $v Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMailSequenceElementCodepool(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool $v = null)
    {
        $this->singleMailSequenceElementCodepool = $v;

        // Make sure that that the passed-in Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool isn't already associated with this object
        if ($v !== null && $v->getMailSequenceElement(null, false) === null) {
            $v->setMailSequenceElement($this);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mail_sequence_element = null;
        $this->name = null;
        $this->template = null;
        $this->interval = null;
        $this->position = null;
        $this->fk_mail_sequence = null;
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
            if ($this->singleMailSequenceElementCodepool) {
                $this->singleMailSequenceElementCodepool->clearAllReferences($deep);
            }
            if ($this->aMailSequence instanceof Persistent) {
              $this->aMailSequence->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->singleMailSequenceElementCodepool instanceof PropelCollection) {
            $this->singleMailSequenceElementCodepool->clearIterator();
        }
        $this->singleMailSequenceElementCodepool = null;
        $this->aMailSequence = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::DEFAULT_STRING_FORMAT);
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
