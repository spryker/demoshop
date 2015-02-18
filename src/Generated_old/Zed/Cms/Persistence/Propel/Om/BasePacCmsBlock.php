<?php


/**
 * Base class that represents a row from the 'pac_cms_block' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlock extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_cms_block field.
     * @var        int
     */
    protected $id_cms_block;

    /**
     * The value for the fk_cms_block_type field.
     * @var        int
     */
    protected $fk_cms_block_type;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the is_deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_deleted;

    /**
     * @var        PacCmsBlockType
     */
    protected $aPacCmsBlockType;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects.
     */
    protected $collPacCmsPageBlockBlocks;
    protected $collPacCmsPageBlockBlocksPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText objects.
     */
    protected $collPacCmsBlockTexts;
    protected $collPacCmsBlockTextsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects.
     */
    protected $collPacCmsBlockProducts;
    protected $collPacCmsBlockProductsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects.
     */
    protected $collPacCmsBlockGlossaries;
    protected $collPacCmsBlockGlossariesPartial;

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
    protected $pacCmsPageBlockBlocksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacCmsBlockTextsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacCmsBlockProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacCmsBlockGlossariesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_deleted = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlock object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_cms_block] column value.
     *
     * @return int
     */
    public function getIdCmsBlock()
    {

        return $this->id_cms_block;
    }

    /**
     * Get the [fk_cms_block_type] column value.
     *
     * @return int
     */
    public function getFkCmsBlockType()
    {

        return $this->fk_cms_block_type;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {

        return $this->title;
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
     * Set the value of [id_cms_block] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function setIdCmsBlock($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_cms_block !== $v) {
            $this->id_cms_block = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK;
        }


        return $this;
    } // setIdCmsBlock()

    /**
     * Set the value of [fk_cms_block_type] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function setFkCmsBlockType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_cms_block_type !== $v) {
            $this->fk_cms_block_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE;
        }

        if ($this->aPacCmsBlockType !== null && $this->aPacCmsBlockType->getIdCmsBlockType() !== $v) {
            $this->aPacCmsBlockType = null;
        }


        return $this;
    } // setFkCmsBlockType()

    /**
     * Set the value of [title] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Sets the value of the [is_deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

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
            if ($this->is_deleted !== false) {
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

            $this->id_cms_block = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_cms_block_type = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->title = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->is_deleted = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock object", $e);
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

        if ($this->aPacCmsBlockType !== null && $this->fk_cms_block_type !== $this->aPacCmsBlockType->getIdCmsBlockType()) {
            $this->aPacCmsBlockType = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacCmsBlockType = null;
            $this->collPacCmsPageBlockBlocks = null;

            $this->collPacCmsBlockTexts = null;

            $this->collPacCmsBlockProducts = null;

            $this->collPacCmsBlockGlossaries = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::addInstanceToPool($this);
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
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPacCmsBlockType !== null) {
                if ($this->aPacCmsBlockType->isModified() || $this->aPacCmsBlockType->isNew()) {
                    $affectedRows += $this->aPacCmsBlockType->save($con);
                }
                $this->setPacCmsBlockType($this->aPacCmsBlockType);
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

            if ($this->pacCmsPageBlockBlocksScheduledForDeletion !== null) {
                if (!$this->pacCmsPageBlockBlocksScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create()
                        ->filterByPrimaryKeys($this->pacCmsPageBlockBlocksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacCmsPageBlockBlocksScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsPageBlockBlocks !== null) {
                foreach ($this->collPacCmsPageBlockBlocks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacCmsBlockTextsScheduledForDeletion !== null) {
                if (!$this->pacCmsBlockTextsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTextQuery::create()
                        ->filterByPrimaryKeys($this->pacCmsBlockTextsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacCmsBlockTextsScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsBlockTexts !== null) {
                foreach ($this->collPacCmsBlockTexts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacCmsBlockProductsScheduledForDeletion !== null) {
                if (!$this->pacCmsBlockProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery::create()
                        ->filterByPrimaryKeys($this->pacCmsBlockProductsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacCmsBlockProductsScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsBlockProducts !== null) {
                foreach ($this->collPacCmsBlockProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacCmsBlockGlossariesScheduledForDeletion !== null) {
                if (!$this->pacCmsBlockGlossariesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery::create()
                        ->filterByPrimaryKeys($this->pacCmsBlockGlossariesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK;
        if (null !== $this->id_cms_block) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK)) {
            $modifiedColumns[':p' . $index++]  = '`id_cms_block`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_cms_block_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_cms_block` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_cms_block`':
                        $stmt->bindValue($identifier, $this->id_cms_block, PDO::PARAM_INT);
                        break;
                    case '`fk_cms_block_type`':
                        $stmt->bindValue($identifier, $this->fk_cms_block_type, PDO::PARAM_INT);
                        break;
                    case '`title`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`is_deleted`':
                        $stmt->bindValue($identifier, (int) $this->is_deleted, PDO::PARAM_INT);
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
        $this->setIdCmsBlock($pk);

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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPacCmsBlockType !== null) {
                if (!$this->aPacCmsBlockType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacCmsBlockType->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacCmsPageBlockBlocks !== null) {
                    foreach ($this->collPacCmsPageBlockBlocks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacCmsBlockTexts !== null) {
                    foreach ($this->collPacCmsBlockTexts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacCmsBlockProducts !== null) {
                    foreach ($this->collPacCmsBlockProducts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacCmsBlockGlossaries !== null) {
                    foreach ($this->collPacCmsBlockGlossaries as $referrerFK) {
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
        $pos = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCmsBlock();
                break;
            case 1:
                return $this->getFkCmsBlockType();
                break;
            case 2:
                return $this->getTitle();
                break;
            case 3:
                return $this->getIsDeleted();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCmsBlock(),
            $keys[1] => $this->getFkCmsBlockType(),
            $keys[2] => $this->getTitle(),
            $keys[3] => $this->getIsDeleted(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPacCmsBlockType) {
                $result['PacCmsBlockType'] = $this->aPacCmsBlockType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacCmsPageBlockBlocks) {
                $result['PacCmsPageBlockBlocks'] = $this->collPacCmsPageBlockBlocks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacCmsBlockTexts) {
                $result['PacCmsBlockTexts'] = $this->collPacCmsBlockTexts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacCmsBlockProducts) {
                $result['PacCmsBlockProducts'] = $this->collPacCmsBlockProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacCmsBlockGlossaries) {
                $result['PacCmsBlockGlossaries'] = $this->collPacCmsBlockGlossaries->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCmsBlock($value);
                break;
            case 1:
                $this->setFkCmsBlockType($value);
                break;
            case 2:
                $this->setTitle($value);
                break;
            case 3:
                $this->setIsDeleted($value);
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
        $keys = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCmsBlock($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCmsBlockType($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsDeleted($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $this->id_cms_block);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE, $this->fk_cms_block_type);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::TITLE)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::TITLE, $this->title);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::IS_DELETED, $this->is_deleted);

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
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $this->id_cms_block);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCmsBlock();
    }

    /**
     * Generic method to set the primary key (id_cms_block column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCmsBlock($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCmsBlock();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCmsBlockType($this->getFkCmsBlockType());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setIsDeleted($this->getIsDeleted());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacCmsPageBlockBlocks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsPageBlockBlock($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacCmsBlockTexts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsBlockText($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacCmsBlockProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsBlockProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacCmsBlockGlossaries() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsBlockGlossary($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCmsBlock(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock Clone of current object.
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType object.
     *
     * @param                  ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType $v
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacCmsBlockType(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType $v = null)
    {
        if ($v === null) {
            $this->setFkCmsBlockType(NULL);
        } else {
            $this->setFkCmsBlockType($v->getIdCmsBlockType());
        }

        $this->aPacCmsBlockType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType object, it will not be re-added.
        if ($v !== null) {
            $v->addPacCmsBlock($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType The associated ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType object.
     * @throws PropelException
     */
    public function getPacCmsBlockType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacCmsBlockType === null && ($this->fk_cms_block_type !== null) && $doQuery) {
            $this->aPacCmsBlockType = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery::create()->findPk($this->fk_cms_block_type, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacCmsBlockType->addPacCmsBlocks($this);
             */
        }

        return $this->aPacCmsBlockType;
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
        if ('PacCmsPageBlockBlock' == $relationName) {
            $this->initPacCmsPageBlockBlocks();
        }
        if ('PacCmsBlockText' == $relationName) {
            $this->initPacCmsBlockTexts();
        }
        if ('PacCmsBlockProduct' == $relationName) {
            $this->initPacCmsBlockProducts();
        }
        if ('PacCmsBlockGlossary' == $relationName) {
            $this->initPacCmsBlockGlossaries();
        }
    }

    /**
     * Clears out the collPacCmsPageBlockBlocks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     * @see        addPacCmsPageBlockBlocks()
     */
    public function clearPacCmsPageBlockBlocks()
    {
        $this->collPacCmsPageBlockBlocks = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsPageBlockBlocksPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsPageBlockBlocks collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsPageBlockBlocks($v = true)
    {
        $this->collPacCmsPageBlockBlocksPartial = $v;
    }

    /**
     * Initializes the collPacCmsPageBlockBlocks collection.
     *
     * By default this just sets the collPacCmsPageBlockBlocks collection to an empty array (like clearcollPacCmsPageBlockBlocks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsPageBlockBlocks($overrideExisting = true)
    {
        if (null !== $this->collPacCmsPageBlockBlocks && !$overrideExisting) {
            return;
        }
        $this->collPacCmsPageBlockBlocks = new PropelObjectCollection();
        $this->collPacCmsPageBlockBlocks->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects
     * @throws PropelException
     */
    public function getPacCmsPageBlockBlocks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPageBlockBlocksPartial && !$this->isNew();
        if (null === $this->collPacCmsPageBlockBlocks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPageBlockBlocks) {
                // return empty collection
                $this->initPacCmsPageBlockBlocks();
            } else {
                $collPacCmsPageBlockBlocks = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria)
                    ->filterByPacCmsBlock($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsPageBlockBlocksPartial && count($collPacCmsPageBlockBlocks)) {
                      $this->initPacCmsPageBlockBlocks(false);

                      foreach ($collPacCmsPageBlockBlocks as $obj) {
                        if (false == $this->collPacCmsPageBlockBlocks->contains($obj)) {
                          $this->collPacCmsPageBlockBlocks->append($obj);
                        }
                      }

                      $this->collPacCmsPageBlockBlocksPartial = true;
                    }

                    $collPacCmsPageBlockBlocks->getInternalIterator()->rewind();

                    return $collPacCmsPageBlockBlocks;
                }

                if ($partial && $this->collPacCmsPageBlockBlocks) {
                    foreach ($this->collPacCmsPageBlockBlocks as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsPageBlockBlocks[] = $obj;
                        }
                    }
                }

                $this->collPacCmsPageBlockBlocks = $collPacCmsPageBlockBlocks;
                $this->collPacCmsPageBlockBlocksPartial = false;
            }
        }

        return $this->collPacCmsPageBlockBlocks;
    }

    /**
     * Sets a collection of PacCmsPageBlockBlock objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsPageBlockBlocks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function setPacCmsPageBlockBlocks(PropelCollection $pacCmsPageBlockBlocks, PropelPDO $con = null)
    {
        $pacCmsPageBlockBlocksToDelete = $this->getPacCmsPageBlockBlocks(new Criteria(), $con)->diff($pacCmsPageBlockBlocks);


        $this->pacCmsPageBlockBlocksScheduledForDeletion = $pacCmsPageBlockBlocksToDelete;

        foreach ($pacCmsPageBlockBlocksToDelete as $pacCmsPageBlockBlockRemoved) {
            $pacCmsPageBlockBlockRemoved->setPacCmsBlock(null);
        }

        $this->collPacCmsPageBlockBlocks = null;
        foreach ($pacCmsPageBlockBlocks as $pacCmsPageBlockBlock) {
            $this->addPacCmsPageBlockBlock($pacCmsPageBlockBlock);
        }

        $this->collPacCmsPageBlockBlocks = $pacCmsPageBlockBlocks;
        $this->collPacCmsPageBlockBlocksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects.
     * @throws PropelException
     */
    public function countPacCmsPageBlockBlocks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPageBlockBlocksPartial && !$this->isNew();
        if (null === $this->collPacCmsPageBlockBlocks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPageBlockBlocks) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsPageBlockBlocks());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacCmsBlock($this)
                ->count($con);
        }

        return count($this->collPacCmsPageBlockBlocks);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function addPacCmsPageBlockBlock(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock $l)
    {
        if ($this->collPacCmsPageBlockBlocks === null) {
            $this->initPacCmsPageBlockBlocks();
            $this->collPacCmsPageBlockBlocksPartial = true;
        }

        if (!in_array($l, $this->collPacCmsPageBlockBlocks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsPageBlockBlock($l);

            if ($this->pacCmsPageBlockBlocksScheduledForDeletion and $this->pacCmsPageBlockBlocksScheduledForDeletion->contains($l)) {
                $this->pacCmsPageBlockBlocksScheduledForDeletion->remove($this->pacCmsPageBlockBlocksScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsPageBlockBlock $pacCmsPageBlockBlock The pacCmsPageBlockBlock object to add.
     */
    protected function doAddPacCmsPageBlockBlock($pacCmsPageBlockBlock)
    {
        $this->collPacCmsPageBlockBlocks[]= $pacCmsPageBlockBlock;
        $pacCmsPageBlockBlock->setPacCmsBlock($this);
    }

    /**
     * @param	PacCmsPageBlockBlock $pacCmsPageBlockBlock The pacCmsPageBlockBlock object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function removePacCmsPageBlockBlock($pacCmsPageBlockBlock)
    {
        if ($this->getPacCmsPageBlockBlocks()->contains($pacCmsPageBlockBlock)) {
            $this->collPacCmsPageBlockBlocks->remove($this->collPacCmsPageBlockBlocks->search($pacCmsPageBlockBlock));
            if (null === $this->pacCmsPageBlockBlocksScheduledForDeletion) {
                $this->pacCmsPageBlockBlocksScheduledForDeletion = clone $this->collPacCmsPageBlockBlocks;
                $this->pacCmsPageBlockBlocksScheduledForDeletion->clear();
            }
            $this->pacCmsPageBlockBlocksScheduledForDeletion[]= clone $pacCmsPageBlockBlock;
            $pacCmsPageBlockBlock->setPacCmsBlock(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsBlock is new, it will return
     * an empty collection; or if this PacCmsBlock has previously
     * been saved, it will retrieve related PacCmsPageBlockBlocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsBlock.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects
     */
    public function getPacCmsPageBlockBlocksJoinPacCmsPage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria);
        $query->joinWith('PacCmsPage', $join_behavior);

        return $this->getPacCmsPageBlockBlocks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsBlock is new, it will return
     * an empty collection; or if this PacCmsBlock has previously
     * been saved, it will retrieve related PacCmsPageBlockBlocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsBlock.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects
     */
    public function getPacCmsPageBlockBlocksJoinPacCmsTemplatePartial($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria);
        $query->joinWith('PacCmsTemplatePartial', $join_behavior);

        return $this->getPacCmsPageBlockBlocks($query, $con);
    }

    /**
     * Clears out the collPacCmsBlockTexts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     * @see        addPacCmsBlockTexts()
     */
    public function clearPacCmsBlockTexts()
    {
        $this->collPacCmsBlockTexts = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsBlockTextsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsBlockTexts collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsBlockTexts($v = true)
    {
        $this->collPacCmsBlockTextsPartial = $v;
    }

    /**
     * Initializes the collPacCmsBlockTexts collection.
     *
     * By default this just sets the collPacCmsBlockTexts collection to an empty array (like clearcollPacCmsBlockTexts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsBlockTexts($overrideExisting = true)
    {
        if (null !== $this->collPacCmsBlockTexts && !$overrideExisting) {
            return;
        }
        $this->collPacCmsBlockTexts = new PropelObjectCollection();
        $this->collPacCmsBlockTexts->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText objects
     * @throws PropelException
     */
    public function getPacCmsBlockTexts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsBlockTextsPartial && !$this->isNew();
        if (null === $this->collPacCmsBlockTexts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsBlockTexts) {
                // return empty collection
                $this->initPacCmsBlockTexts();
            } else {
                $collPacCmsBlockTexts = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTextQuery::create(null, $criteria)
                    ->filterByPacCmsBlock($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsBlockTextsPartial && count($collPacCmsBlockTexts)) {
                      $this->initPacCmsBlockTexts(false);

                      foreach ($collPacCmsBlockTexts as $obj) {
                        if (false == $this->collPacCmsBlockTexts->contains($obj)) {
                          $this->collPacCmsBlockTexts->append($obj);
                        }
                      }

                      $this->collPacCmsBlockTextsPartial = true;
                    }

                    $collPacCmsBlockTexts->getInternalIterator()->rewind();

                    return $collPacCmsBlockTexts;
                }

                if ($partial && $this->collPacCmsBlockTexts) {
                    foreach ($this->collPacCmsBlockTexts as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsBlockTexts[] = $obj;
                        }
                    }
                }

                $this->collPacCmsBlockTexts = $collPacCmsBlockTexts;
                $this->collPacCmsBlockTextsPartial = false;
            }
        }

        return $this->collPacCmsBlockTexts;
    }

    /**
     * Sets a collection of PacCmsBlockText objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsBlockTexts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function setPacCmsBlockTexts(PropelCollection $pacCmsBlockTexts, PropelPDO $con = null)
    {
        $pacCmsBlockTextsToDelete = $this->getPacCmsBlockTexts(new Criteria(), $con)->diff($pacCmsBlockTexts);


        $this->pacCmsBlockTextsScheduledForDeletion = $pacCmsBlockTextsToDelete;

        foreach ($pacCmsBlockTextsToDelete as $pacCmsBlockTextRemoved) {
            $pacCmsBlockTextRemoved->setPacCmsBlock(null);
        }

        $this->collPacCmsBlockTexts = null;
        foreach ($pacCmsBlockTexts as $pacCmsBlockText) {
            $this->addPacCmsBlockText($pacCmsBlockText);
        }

        $this->collPacCmsBlockTexts = $pacCmsBlockTexts;
        $this->collPacCmsBlockTextsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText objects.
     * @throws PropelException
     */
    public function countPacCmsBlockTexts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsBlockTextsPartial && !$this->isNew();
        if (null === $this->collPacCmsBlockTexts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsBlockTexts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsBlockTexts());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTextQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacCmsBlock($this)
                ->count($con);
        }

        return count($this->collPacCmsBlockTexts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function addPacCmsBlockText(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText $l)
    {
        if ($this->collPacCmsBlockTexts === null) {
            $this->initPacCmsBlockTexts();
            $this->collPacCmsBlockTextsPartial = true;
        }

        if (!in_array($l, $this->collPacCmsBlockTexts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsBlockText($l);

            if ($this->pacCmsBlockTextsScheduledForDeletion and $this->pacCmsBlockTextsScheduledForDeletion->contains($l)) {
                $this->pacCmsBlockTextsScheduledForDeletion->remove($this->pacCmsBlockTextsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsBlockText $pacCmsBlockText The pacCmsBlockText object to add.
     */
    protected function doAddPacCmsBlockText($pacCmsBlockText)
    {
        $this->collPacCmsBlockTexts[]= $pacCmsBlockText;
        $pacCmsBlockText->setPacCmsBlock($this);
    }

    /**
     * @param	PacCmsBlockText $pacCmsBlockText The pacCmsBlockText object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function removePacCmsBlockText($pacCmsBlockText)
    {
        if ($this->getPacCmsBlockTexts()->contains($pacCmsBlockText)) {
            $this->collPacCmsBlockTexts->remove($this->collPacCmsBlockTexts->search($pacCmsBlockText));
            if (null === $this->pacCmsBlockTextsScheduledForDeletion) {
                $this->pacCmsBlockTextsScheduledForDeletion = clone $this->collPacCmsBlockTexts;
                $this->pacCmsBlockTextsScheduledForDeletion->clear();
            }
            $this->pacCmsBlockTextsScheduledForDeletion[]= clone $pacCmsBlockText;
            $pacCmsBlockText->setPacCmsBlock(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacCmsBlockProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     * @see        addPacCmsBlockProducts()
     */
    public function clearPacCmsBlockProducts()
    {
        $this->collPacCmsBlockProducts = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsBlockProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsBlockProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsBlockProducts($v = true)
    {
        $this->collPacCmsBlockProductsPartial = $v;
    }

    /**
     * Initializes the collPacCmsBlockProducts collection.
     *
     * By default this just sets the collPacCmsBlockProducts collection to an empty array (like clearcollPacCmsBlockProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsBlockProducts($overrideExisting = true)
    {
        if (null !== $this->collPacCmsBlockProducts && !$overrideExisting) {
            return;
        }
        $this->collPacCmsBlockProducts = new PropelObjectCollection();
        $this->collPacCmsBlockProducts->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects
     * @throws PropelException
     */
    public function getPacCmsBlockProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsBlockProductsPartial && !$this->isNew();
        if (null === $this->collPacCmsBlockProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsBlockProducts) {
                // return empty collection
                $this->initPacCmsBlockProducts();
            } else {
                $collPacCmsBlockProducts = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery::create(null, $criteria)
                    ->filterByPacCmsBlock($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsBlockProductsPartial && count($collPacCmsBlockProducts)) {
                      $this->initPacCmsBlockProducts(false);

                      foreach ($collPacCmsBlockProducts as $obj) {
                        if (false == $this->collPacCmsBlockProducts->contains($obj)) {
                          $this->collPacCmsBlockProducts->append($obj);
                        }
                      }

                      $this->collPacCmsBlockProductsPartial = true;
                    }

                    $collPacCmsBlockProducts->getInternalIterator()->rewind();

                    return $collPacCmsBlockProducts;
                }

                if ($partial && $this->collPacCmsBlockProducts) {
                    foreach ($this->collPacCmsBlockProducts as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsBlockProducts[] = $obj;
                        }
                    }
                }

                $this->collPacCmsBlockProducts = $collPacCmsBlockProducts;
                $this->collPacCmsBlockProductsPartial = false;
            }
        }

        return $this->collPacCmsBlockProducts;
    }

    /**
     * Sets a collection of PacCmsBlockProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsBlockProducts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function setPacCmsBlockProducts(PropelCollection $pacCmsBlockProducts, PropelPDO $con = null)
    {
        $pacCmsBlockProductsToDelete = $this->getPacCmsBlockProducts(new Criteria(), $con)->diff($pacCmsBlockProducts);


        $this->pacCmsBlockProductsScheduledForDeletion = $pacCmsBlockProductsToDelete;

        foreach ($pacCmsBlockProductsToDelete as $pacCmsBlockProductRemoved) {
            $pacCmsBlockProductRemoved->setPacCmsBlock(null);
        }

        $this->collPacCmsBlockProducts = null;
        foreach ($pacCmsBlockProducts as $pacCmsBlockProduct) {
            $this->addPacCmsBlockProduct($pacCmsBlockProduct);
        }

        $this->collPacCmsBlockProducts = $pacCmsBlockProducts;
        $this->collPacCmsBlockProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects.
     * @throws PropelException
     */
    public function countPacCmsBlockProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsBlockProductsPartial && !$this->isNew();
        if (null === $this->collPacCmsBlockProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsBlockProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsBlockProducts());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacCmsBlock($this)
                ->count($con);
        }

        return count($this->collPacCmsBlockProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function addPacCmsBlockProduct(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct $l)
    {
        if ($this->collPacCmsBlockProducts === null) {
            $this->initPacCmsBlockProducts();
            $this->collPacCmsBlockProductsPartial = true;
        }

        if (!in_array($l, $this->collPacCmsBlockProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsBlockProduct($l);

            if ($this->pacCmsBlockProductsScheduledForDeletion and $this->pacCmsBlockProductsScheduledForDeletion->contains($l)) {
                $this->pacCmsBlockProductsScheduledForDeletion->remove($this->pacCmsBlockProductsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsBlockProduct $pacCmsBlockProduct The pacCmsBlockProduct object to add.
     */
    protected function doAddPacCmsBlockProduct($pacCmsBlockProduct)
    {
        $this->collPacCmsBlockProducts[]= $pacCmsBlockProduct;
        $pacCmsBlockProduct->setPacCmsBlock($this);
    }

    /**
     * @param	PacCmsBlockProduct $pacCmsBlockProduct The pacCmsBlockProduct object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function removePacCmsBlockProduct($pacCmsBlockProduct)
    {
        if ($this->getPacCmsBlockProducts()->contains($pacCmsBlockProduct)) {
            $this->collPacCmsBlockProducts->remove($this->collPacCmsBlockProducts->search($pacCmsBlockProduct));
            if (null === $this->pacCmsBlockProductsScheduledForDeletion) {
                $this->pacCmsBlockProductsScheduledForDeletion = clone $this->collPacCmsBlockProducts;
                $this->pacCmsBlockProductsScheduledForDeletion->clear();
            }
            $this->pacCmsBlockProductsScheduledForDeletion[]= clone $pacCmsBlockProduct;
            $pacCmsBlockProduct->setPacCmsBlock(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsBlock is new, it will return
     * an empty collection; or if this PacCmsBlock has previously
     * been saved, it will retrieve related PacCmsBlockProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsBlock.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects
     */
    public function getPacCmsBlockProductsJoinPacCatalogProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery::create(null, $criteria);
        $query->joinWith('PacCatalogProduct', $join_behavior);

        return $this->getPacCmsBlockProducts($query, $con);
    }

    /**
     * Clears out the collPacCmsBlockGlossaries collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
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
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock is new, it will return
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
                    ->filterByPacCmsBlock($this)
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function setPacCmsBlockGlossaries(PropelCollection $pacCmsBlockGlossaries, PropelPDO $con = null)
    {
        $pacCmsBlockGlossariesToDelete = $this->getPacCmsBlockGlossaries(new Criteria(), $con)->diff($pacCmsBlockGlossaries);


        $this->pacCmsBlockGlossariesScheduledForDeletion = $pacCmsBlockGlossariesToDelete;

        foreach ($pacCmsBlockGlossariesToDelete as $pacCmsBlockGlossaryRemoved) {
            $pacCmsBlockGlossaryRemoved->setPacCmsBlock(null);
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
                ->filterByPacCmsBlock($this)
                ->count($con);
        }

        return count($this->collPacCmsBlockGlossaries);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
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
        $pacCmsBlockGlossary->setPacCmsBlock($this);
    }

    /**
     * @param	PacCmsBlockGlossary $pacCmsBlockGlossary The pacCmsBlockGlossary object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock The current object (for fluent API support)
     */
    public function removePacCmsBlockGlossary($pacCmsBlockGlossary)
    {
        if ($this->getPacCmsBlockGlossaries()->contains($pacCmsBlockGlossary)) {
            $this->collPacCmsBlockGlossaries->remove($this->collPacCmsBlockGlossaries->search($pacCmsBlockGlossary));
            if (null === $this->pacCmsBlockGlossariesScheduledForDeletion) {
                $this->pacCmsBlockGlossariesScheduledForDeletion = clone $this->collPacCmsBlockGlossaries;
                $this->pacCmsBlockGlossariesScheduledForDeletion->clear();
            }
            $this->pacCmsBlockGlossariesScheduledForDeletion[]= clone $pacCmsBlockGlossary;
            $pacCmsBlockGlossary->setPacCmsBlock(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsBlock is new, it will return
     * an empty collection; or if this PacCmsBlock has previously
     * been saved, it will retrieve related PacCmsBlockGlossaries from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsBlock.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects
     */
    public function getPacCmsBlockGlossariesJoinPacGlossaryKey($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery::create(null, $criteria);
        $query->joinWith('PacGlossaryKey', $join_behavior);

        return $this->getPacCmsBlockGlossaries($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_cms_block = null;
        $this->fk_cms_block_type = null;
        $this->title = null;
        $this->is_deleted = null;
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
            if ($this->collPacCmsPageBlockBlocks) {
                foreach ($this->collPacCmsPageBlockBlocks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacCmsBlockTexts) {
                foreach ($this->collPacCmsBlockTexts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacCmsBlockProducts) {
                foreach ($this->collPacCmsBlockProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacCmsBlockGlossaries) {
                foreach ($this->collPacCmsBlockGlossaries as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPacCmsBlockType instanceof Persistent) {
              $this->aPacCmsBlockType->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacCmsPageBlockBlocks instanceof PropelCollection) {
            $this->collPacCmsPageBlockBlocks->clearIterator();
        }
        $this->collPacCmsPageBlockBlocks = null;
        if ($this->collPacCmsBlockTexts instanceof PropelCollection) {
            $this->collPacCmsBlockTexts->clearIterator();
        }
        $this->collPacCmsBlockTexts = null;
        if ($this->collPacCmsBlockProducts instanceof PropelCollection) {
            $this->collPacCmsBlockProducts->clearIterator();
        }
        $this->collPacCmsBlockProducts = null;
        if ($this->collPacCmsBlockGlossaries instanceof PropelCollection) {
            $this->collPacCmsBlockGlossaries->clearIterator();
        }
        $this->collPacCmsBlockGlossaries = null;
        $this->aPacCmsBlockType = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::DEFAULT_STRING_FORMAT);
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
