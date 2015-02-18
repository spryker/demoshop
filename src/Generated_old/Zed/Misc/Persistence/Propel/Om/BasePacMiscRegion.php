<?php


/**
 * Base class that represents a row from the 'pac_misc_region' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Misc/Persistence/Propel.om
 */
abstract class Generated_Zed_Misc_Persistence_Propel_Om_BasePacMiscRegion extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_misc_region field.
     * @var        int
     */
    protected $id_misc_region;

    /**
     * The value for the fk_misc_country field.
     * @var        int
     */
    protected $fk_misc_country;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the iso2_code field.
     * @var        string
     */
    protected $iso2_code;

    /**
     * @var        PacMiscCountry
     */
    protected $aCountry;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress[] Collection to store aggregation of ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress objects.
     */
    protected $collCustomerAddresses;
    protected $collCustomerAddressesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] Collection to store aggregation of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     */
    protected $collCustomerAddress2s;
    protected $collCustomerAddress2sPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects.
     */
    protected $collSalesOrderAddresses;
    protected $collSalesOrderAddressesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     */
    protected $collSalesOrderAddressHistories;
    protected $collSalesOrderAddressHistoriesPartial;

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
    protected $customerAddressesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $customerAddress2sScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $salesOrderAddressesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $salesOrderAddressHistoriesScheduledForDeletion = null;

    /**
     * Get the [id_misc_region] column value.
     *
     * @return int
     */
    public function getIdMiscRegion()
    {

        return $this->id_misc_region;
    }

    /**
     * Get the [fk_misc_country] column value.
     *
     * @return int
     */
    public function getFkMiscCountry()
    {

        return $this->fk_misc_country;
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
     * Get the [iso2_code] column value.
     *
     * @return string
     */
    public function getIso2Code()
    {

        return $this->iso2_code;
    }

    /**
     * Set the value of [id_misc_region] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setIdMiscRegion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_misc_region !== $v) {
            $this->id_misc_region = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION;
        }


        return $this;
    } // setIdMiscRegion()

    /**
     * Set the value of [fk_misc_country] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setFkMiscCountry($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_misc_country !== $v) {
            $this->fk_misc_country = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY;
        }

        if ($this->aCountry !== null && $this->aCountry->getIdMiscCountry() !== $v) {
            $this->aCountry = null;
        }


        return $this;
    } // setFkMiscCountry()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [iso2_code] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setIso2Code($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->iso2_code !== $v) {
            $this->iso2_code = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ISO2_CODE;
        }


        return $this;
    } // setIso2Code()

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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_misc_region = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_misc_country = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->iso2_code = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion object", $e);
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

        if ($this->aCountry !== null && $this->fk_misc_country !== $this->aCountry->getIdMiscCountry()) {
            $this->aCountry = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCountry = null;
            $this->collCustomerAddresses = null;

            $this->collCustomerAddress2s = null;

            $this->collSalesOrderAddresses = null;

            $this->collSalesOrderAddressHistories = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addInstanceToPool($this);
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

            if ($this->aCountry !== null) {
                if ($this->aCountry->isModified() || $this->aCountry->isNew()) {
                    $affectedRows += $this->aCountry->save($con);
                }
                $this->setCountry($this->aCountry);
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

            if ($this->customerAddressesScheduledForDeletion !== null) {
                if (!$this->customerAddressesScheduledForDeletion->isEmpty()) {
                    foreach ($this->customerAddressesScheduledForDeletion as $customerAddress) {
                        // need to save related object because we set the relation to null
                        $customerAddress->save($con);
                    }
                    $this->customerAddressesScheduledForDeletion = null;
                }
            }

            if ($this->collCustomerAddresses !== null) {
                foreach ($this->collCustomerAddresses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->customerAddress2sScheduledForDeletion !== null) {
                if (!$this->customerAddress2sScheduledForDeletion->isEmpty()) {
                    foreach ($this->customerAddress2sScheduledForDeletion as $customerAddress2) {
                        // need to save related object because we set the relation to null
                        $customerAddress2->save($con);
                    }
                    $this->customerAddress2sScheduledForDeletion = null;
                }
            }

            if ($this->collCustomerAddress2s !== null) {
                foreach ($this->collCustomerAddress2s as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesOrderAddressesScheduledForDeletion !== null) {
                if (!$this->salesOrderAddressesScheduledForDeletion->isEmpty()) {
                    foreach ($this->salesOrderAddressesScheduledForDeletion as $salesOrderAddress) {
                        // need to save related object because we set the relation to null
                        $salesOrderAddress->save($con);
                    }
                    $this->salesOrderAddressesScheduledForDeletion = null;
                }
            }

            if ($this->collSalesOrderAddresses !== null) {
                foreach ($this->collSalesOrderAddresses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesOrderAddressHistoriesScheduledForDeletion !== null) {
                if (!$this->salesOrderAddressHistoriesScheduledForDeletion->isEmpty()) {
                    foreach ($this->salesOrderAddressHistoriesScheduledForDeletion as $salesOrderAddressHistory) {
                        // need to save related object because we set the relation to null
                        $salesOrderAddressHistory->save($con);
                    }
                    $this->salesOrderAddressHistoriesScheduledForDeletion = null;
                }
            }

            if ($this->collSalesOrderAddressHistories !== null) {
                foreach ($this->collSalesOrderAddressHistories as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION;
        if (null !== $this->id_misc_region) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION)) {
            $modifiedColumns[':p' . $index++]  = '`id_misc_region`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_misc_country`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ISO2_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`iso2_code`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_misc_region` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_misc_region`':
                        $stmt->bindValue($identifier, $this->id_misc_region, PDO::PARAM_INT);
                        break;
                    case '`fk_misc_country`':
                        $stmt->bindValue($identifier, $this->fk_misc_country, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`iso2_code`':
                        $stmt->bindValue($identifier, $this->iso2_code, PDO::PARAM_STR);
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
        $this->setIdMiscRegion($pk);

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

            if ($this->aCountry !== null) {
                if (!$this->aCountry->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCountry->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCustomerAddresses !== null) {
                    foreach ($this->collCustomerAddresses as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCustomerAddress2s !== null) {
                    foreach ($this->collCustomerAddress2s as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSalesOrderAddresses !== null) {
                    foreach ($this->collSalesOrderAddresses as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSalesOrderAddressHistories !== null) {
                    foreach ($this->collSalesOrderAddressHistories as $referrerFK) {
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
        $pos = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMiscRegion();
                break;
            case 1:
                return $this->getFkMiscCountry();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getIso2Code();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMiscRegion(),
            $keys[1] => $this->getFkMiscCountry(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getIso2Code(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCountry) {
                $result['Country'] = $this->aCountry->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCustomerAddresses) {
                $result['CustomerAddresses'] = $this->collCustomerAddresses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCustomerAddress2s) {
                $result['CustomerAddress2s'] = $this->collCustomerAddress2s->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderAddresses) {
                $result['SalesOrderAddresses'] = $this->collSalesOrderAddresses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderAddressHistories) {
                $result['SalesOrderAddressHistories'] = $this->collSalesOrderAddressHistories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMiscRegion($value);
                break;
            case 1:
                $this->setFkMiscCountry($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setIso2Code($value);
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
        $keys = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMiscRegion($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkMiscCountry($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIso2Code($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION)) $criteria->add(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $this->id_misc_region);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY)) $criteria->add(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::FK_MISC_COUNTRY, $this->fk_misc_country);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NAME)) $criteria->add(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ISO2_CODE)) $criteria->add(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ISO2_CODE, $this->iso2_code);

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
        $criteria = new Criteria(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $this->id_misc_region);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMiscRegion();
    }

    /**
     * Generic method to set the primary key (id_misc_region column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMiscRegion($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMiscRegion();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkMiscCountry($this->getFkMiscCountry());
        $copyObj->setName($this->getName());
        $copyObj->setIso2Code($this->getIso2Code());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCustomerAddresses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerAddress($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCustomerAddress2s() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerAddress2($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesOrderAddresses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderAddress($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesOrderAddressHistories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderAddressHistory($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMiscRegion(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion Clone of current object.
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
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object.
     *
     * @param                  ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry $v
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCountry(ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry $v = null)
    {
        if ($v === null) {
            $this->setFkMiscCountry(NULL);
        } else {
            $this->setFkMiscCountry($v->getIdMiscCountry());
        }

        $this->aCountry = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object, it will not be re-added.
        if ($v !== null) {
            $v->addRegion($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry The associated ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object.
     * @throws PropelException
     */
    public function getCountry(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCountry === null && ($this->fk_misc_country !== null) && $doQuery) {
            $this->aCountry = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryQuery::create()->findPk($this->fk_misc_country, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCountry->addRegions($this);
             */
        }

        return $this->aCountry;
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
        if ('CustomerAddress' == $relationName) {
            $this->initCustomerAddresses();
        }
        if ('CustomerAddress2' == $relationName) {
            $this->initCustomerAddress2s();
        }
        if ('SalesOrderAddress' == $relationName) {
            $this->initSalesOrderAddresses();
        }
        if ('SalesOrderAddressHistory' == $relationName) {
            $this->initSalesOrderAddressHistories();
        }
    }

    /**
     * Clears out the collCustomerAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     * @see        addCustomerAddresses()
     */
    public function clearCustomerAddresses()
    {
        $this->collCustomerAddresses = null; // important to set this to null since that means it is uninitialized
        $this->collCustomerAddressesPartial = null;

        return $this;
    }

    /**
     * reset is the collCustomerAddresses collection loaded partially
     *
     * @return void
     */
    public function resetPartialCustomerAddresses($v = true)
    {
        $this->collCustomerAddressesPartial = $v;
    }

    /**
     * Initializes the collCustomerAddresses collection.
     *
     * By default this just sets the collCustomerAddresses collection to an empty array (like clearcollCustomerAddresses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomerAddresses($overrideExisting = true)
    {
        if (null !== $this->collCustomerAddresses && !$overrideExisting) {
            return;
        }
        $this->collCustomerAddresses = new PropelObjectCollection();
        $this->collCustomerAddresses->setModel('ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress[] List of ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress objects
     * @throws PropelException
     */
    public function getCustomerAddresses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCustomerAddressesPartial && !$this->isNew();
        if (null === $this->collCustomerAddresses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomerAddresses) {
                // return empty collection
                $this->initCustomerAddresses();
            } else {
                $collCustomerAddresses = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddressQuery::create(null, $criteria)
                    ->filterByRegion($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCustomerAddressesPartial && count($collCustomerAddresses)) {
                      $this->initCustomerAddresses(false);

                      foreach ($collCustomerAddresses as $obj) {
                        if (false == $this->collCustomerAddresses->contains($obj)) {
                          $this->collCustomerAddresses->append($obj);
                        }
                      }

                      $this->collCustomerAddressesPartial = true;
                    }

                    $collCustomerAddresses->getInternalIterator()->rewind();

                    return $collCustomerAddresses;
                }

                if ($partial && $this->collCustomerAddresses) {
                    foreach ($this->collCustomerAddresses as $obj) {
                        if ($obj->isNew()) {
                            $collCustomerAddresses[] = $obj;
                        }
                    }
                }

                $this->collCustomerAddresses = $collCustomerAddresses;
                $this->collCustomerAddressesPartial = false;
            }
        }

        return $this->collCustomerAddresses;
    }

    /**
     * Sets a collection of CustomerAddress objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $customerAddresses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setCustomerAddresses(PropelCollection $customerAddresses, PropelPDO $con = null)
    {
        $customerAddressesToDelete = $this->getCustomerAddresses(new Criteria(), $con)->diff($customerAddresses);


        $this->customerAddressesScheduledForDeletion = $customerAddressesToDelete;

        foreach ($customerAddressesToDelete as $customerAddressRemoved) {
            $customerAddressRemoved->setRegion(null);
        }

        $this->collCustomerAddresses = null;
        foreach ($customerAddresses as $customerAddress) {
            $this->addCustomerAddress($customerAddress);
        }

        $this->collCustomerAddresses = $customerAddresses;
        $this->collCustomerAddressesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress objects.
     * @throws PropelException
     */
    public function countCustomerAddresses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCustomerAddressesPartial && !$this->isNew();
        if (null === $this->collCustomerAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerAddresses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomerAddresses());
            }
            $query = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegion($this)
                ->count($con);
        }

        return count($this->collCustomerAddresses);
    }

    /**
     * Method called to associate a ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress object to this object
     * through the ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress $l ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function addCustomerAddress(ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress $l)
    {
        if ($this->collCustomerAddresses === null) {
            $this->initCustomerAddresses();
            $this->collCustomerAddressesPartial = true;
        }

        if (!in_array($l, $this->collCustomerAddresses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCustomerAddress($l);

            if ($this->customerAddressesScheduledForDeletion and $this->customerAddressesScheduledForDeletion->contains($l)) {
                $this->customerAddressesScheduledForDeletion->remove($this->customerAddressesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CustomerAddress $customerAddress The customerAddress object to add.
     */
    protected function doAddCustomerAddress($customerAddress)
    {
        $this->collCustomerAddresses[]= $customerAddress;
        $customerAddress->setRegion($this);
    }

    /**
     * @param	CustomerAddress $customerAddress The customerAddress object to remove.
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function removeCustomerAddress($customerAddress)
    {
        if ($this->getCustomerAddresses()->contains($customerAddress)) {
            $this->collCustomerAddresses->remove($this->collCustomerAddresses->search($customerAddress));
            if (null === $this->customerAddressesScheduledForDeletion) {
                $this->customerAddressesScheduledForDeletion = clone $this->collCustomerAddresses;
                $this->customerAddressesScheduledForDeletion->clear();
            }
            $this->customerAddressesScheduledForDeletion[]= $customerAddress;
            $customerAddress->setRegion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscRegion is new, it will return
     * an empty collection; or if this PacMiscRegion has previously
     * been saved, it will retrieve related CustomerAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscRegion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress[] List of ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress objects
     */
    public function getCustomerAddressesJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Customer', $join_behavior);

        return $this->getCustomerAddresses($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscRegion is new, it will return
     * an empty collection; or if this PacMiscRegion has previously
     * been saved, it will retrieve related CustomerAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscRegion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress[] List of ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress objects
     */
    public function getCustomerAddressesJoinCountry($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Country', $join_behavior);

        return $this->getCustomerAddresses($query, $con);
    }

    /**
     * Clears out the collCustomerAddress2s collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     * @see        addCustomerAddress2s()
     */
    public function clearCustomerAddress2s()
    {
        $this->collCustomerAddress2s = null; // important to set this to null since that means it is uninitialized
        $this->collCustomerAddress2sPartial = null;

        return $this;
    }

    /**
     * reset is the collCustomerAddress2s collection loaded partially
     *
     * @return void
     */
    public function resetPartialCustomerAddress2s($v = true)
    {
        $this->collCustomerAddress2sPartial = $v;
    }

    /**
     * Initializes the collCustomerAddress2s collection.
     *
     * By default this just sets the collCustomerAddress2s collection to an empty array (like clearcollCustomerAddress2s());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomerAddress2s($overrideExisting = true)
    {
        if (null !== $this->collCustomerAddress2s && !$overrideExisting) {
            return;
        }
        $this->collCustomerAddress2s = new PropelObjectCollection();
        $this->collCustomerAddress2s->setModel('ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects
     * @throws PropelException
     */
    public function getCustomerAddress2s($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCustomerAddress2sPartial && !$this->isNew();
        if (null === $this->collCustomerAddress2s || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomerAddress2s) {
                // return empty collection
                $this->initCustomerAddress2s();
            } else {
                $collCustomerAddress2s = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria)
                    ->filterByRegion($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCustomerAddress2sPartial && count($collCustomerAddress2s)) {
                      $this->initCustomerAddress2s(false);

                      foreach ($collCustomerAddress2s as $obj) {
                        if (false == $this->collCustomerAddress2s->contains($obj)) {
                          $this->collCustomerAddress2s->append($obj);
                        }
                      }

                      $this->collCustomerAddress2sPartial = true;
                    }

                    $collCustomerAddress2s->getInternalIterator()->rewind();

                    return $collCustomerAddress2s;
                }

                if ($partial && $this->collCustomerAddress2s) {
                    foreach ($this->collCustomerAddress2s as $obj) {
                        if ($obj->isNew()) {
                            $collCustomerAddress2s[] = $obj;
                        }
                    }
                }

                $this->collCustomerAddress2s = $collCustomerAddress2s;
                $this->collCustomerAddress2sPartial = false;
            }
        }

        return $this->collCustomerAddress2s;
    }

    /**
     * Sets a collection of CustomerAddress2 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $customerAddress2s A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setCustomerAddress2s(PropelCollection $customerAddress2s, PropelPDO $con = null)
    {
        $customerAddress2sToDelete = $this->getCustomerAddress2s(new Criteria(), $con)->diff($customerAddress2s);


        $this->customerAddress2sScheduledForDeletion = $customerAddress2sToDelete;

        foreach ($customerAddress2sToDelete as $customerAddress2Removed) {
            $customerAddress2Removed->setRegion(null);
        }

        $this->collCustomerAddress2s = null;
        foreach ($customerAddress2s as $customerAddress2) {
            $this->addCustomerAddress2($customerAddress2);
        }

        $this->collCustomerAddress2s = $customerAddress2s;
        $this->collCustomerAddress2sPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     * @throws PropelException
     */
    public function countCustomerAddress2s(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCustomerAddress2sPartial && !$this->isNew();
        if (null === $this->collCustomerAddress2s || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerAddress2s) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomerAddress2s());
            }
            $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegion($this)
                ->count($con);
        }

        return count($this->collCustomerAddress2s);
    }

    /**
     * Method called to associate a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object to this object
     * through the ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $l ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function addCustomerAddress2(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $l)
    {
        if ($this->collCustomerAddress2s === null) {
            $this->initCustomerAddress2s();
            $this->collCustomerAddress2sPartial = true;
        }

        if (!in_array($l, $this->collCustomerAddress2s->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCustomerAddress2($l);

            if ($this->customerAddress2sScheduledForDeletion and $this->customerAddress2sScheduledForDeletion->contains($l)) {
                $this->customerAddress2sScheduledForDeletion->remove($this->customerAddress2sScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CustomerAddress2 $customerAddress2 The customerAddress2 object to add.
     */
    protected function doAddCustomerAddress2($customerAddress2)
    {
        $this->collCustomerAddress2s[]= $customerAddress2;
        $customerAddress2->setRegion($this);
    }

    /**
     * @param	CustomerAddress2 $customerAddress2 The customerAddress2 object to remove.
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function removeCustomerAddress2($customerAddress2)
    {
        if ($this->getCustomerAddress2s()->contains($customerAddress2)) {
            $this->collCustomerAddress2s->remove($this->collCustomerAddress2s->search($customerAddress2));
            if (null === $this->customerAddress2sScheduledForDeletion) {
                $this->customerAddress2sScheduledForDeletion = clone $this->collCustomerAddress2s;
                $this->customerAddress2sScheduledForDeletion->clear();
            }
            $this->customerAddress2sScheduledForDeletion[]= $customerAddress2;
            $customerAddress2->setRegion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscRegion is new, it will return
     * an empty collection; or if this PacMiscRegion has previously
     * been saved, it will retrieve related CustomerAddress2s from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscRegion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects
     */
    public function getCustomerAddress2sJoinCustomer2($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria);
        $query->joinWith('Customer2', $join_behavior);

        return $this->getCustomerAddress2s($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscRegion is new, it will return
     * an empty collection; or if this PacMiscRegion has previously
     * been saved, it will retrieve related CustomerAddress2s from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscRegion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects
     */
    public function getCustomerAddress2sJoinCountry($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria);
        $query->joinWith('Country', $join_behavior);

        return $this->getCustomerAddress2s($query, $con);
    }

    /**
     * Clears out the collSalesOrderAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     * @see        addSalesOrderAddresses()
     */
    public function clearSalesOrderAddresses()
    {
        $this->collSalesOrderAddresses = null; // important to set this to null since that means it is uninitialized
        $this->collSalesOrderAddressesPartial = null;

        return $this;
    }

    /**
     * reset is the collSalesOrderAddresses collection loaded partially
     *
     * @return void
     */
    public function resetPartialSalesOrderAddresses($v = true)
    {
        $this->collSalesOrderAddressesPartial = $v;
    }

    /**
     * Initializes the collSalesOrderAddresses collection.
     *
     * By default this just sets the collSalesOrderAddresses collection to an empty array (like clearcollSalesOrderAddresses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderAddresses($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderAddresses && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderAddresses = new PropelObjectCollection();
        $this->collSalesOrderAddresses->setModel('ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects
     * @throws PropelException
     */
    public function getSalesOrderAddresses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddresses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddresses) {
                // return empty collection
                $this->initSalesOrderAddresses();
            } else {
                $collSalesOrderAddresses = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery::create(null, $criteria)
                    ->filterByRegion($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressesPartial && count($collSalesOrderAddresses)) {
                      $this->initSalesOrderAddresses(false);

                      foreach ($collSalesOrderAddresses as $obj) {
                        if (false == $this->collSalesOrderAddresses->contains($obj)) {
                          $this->collSalesOrderAddresses->append($obj);
                        }
                      }

                      $this->collSalesOrderAddressesPartial = true;
                    }

                    $collSalesOrderAddresses->getInternalIterator()->rewind();

                    return $collSalesOrderAddresses;
                }

                if ($partial && $this->collSalesOrderAddresses) {
                    foreach ($this->collSalesOrderAddresses as $obj) {
                        if ($obj->isNew()) {
                            $collSalesOrderAddresses[] = $obj;
                        }
                    }
                }

                $this->collSalesOrderAddresses = $collSalesOrderAddresses;
                $this->collSalesOrderAddressesPartial = false;
            }
        }

        return $this->collSalesOrderAddresses;
    }

    /**
     * Sets a collection of SalesOrderAddress objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $salesOrderAddresses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setSalesOrderAddresses(PropelCollection $salesOrderAddresses, PropelPDO $con = null)
    {
        $salesOrderAddressesToDelete = $this->getSalesOrderAddresses(new Criteria(), $con)->diff($salesOrderAddresses);


        $this->salesOrderAddressesScheduledForDeletion = $salesOrderAddressesToDelete;

        foreach ($salesOrderAddressesToDelete as $salesOrderAddressRemoved) {
            $salesOrderAddressRemoved->setRegion(null);
        }

        $this->collSalesOrderAddresses = null;
        foreach ($salesOrderAddresses as $salesOrderAddress) {
            $this->addSalesOrderAddress($salesOrderAddress);
        }

        $this->collSalesOrderAddresses = $salesOrderAddresses;
        $this->collSalesOrderAddressesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects.
     * @throws PropelException
     */
    public function countSalesOrderAddresses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddresses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSalesOrderAddresses());
            }
            $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegion($this)
                ->count($con);
        }

        return count($this->collSalesOrderAddresses);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress object to this object
     * through the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress $l ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function addSalesOrderAddress(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress $l)
    {
        if ($this->collSalesOrderAddresses === null) {
            $this->initSalesOrderAddresses();
            $this->collSalesOrderAddressesPartial = true;
        }

        if (!in_array($l, $this->collSalesOrderAddresses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesOrderAddress($l);

            if ($this->salesOrderAddressesScheduledForDeletion and $this->salesOrderAddressesScheduledForDeletion->contains($l)) {
                $this->salesOrderAddressesScheduledForDeletion->remove($this->salesOrderAddressesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	SalesOrderAddress $salesOrderAddress The salesOrderAddress object to add.
     */
    protected function doAddSalesOrderAddress($salesOrderAddress)
    {
        $this->collSalesOrderAddresses[]= $salesOrderAddress;
        $salesOrderAddress->setRegion($this);
    }

    /**
     * @param	SalesOrderAddress $salesOrderAddress The salesOrderAddress object to remove.
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function removeSalesOrderAddress($salesOrderAddress)
    {
        if ($this->getSalesOrderAddresses()->contains($salesOrderAddress)) {
            $this->collSalesOrderAddresses->remove($this->collSalesOrderAddresses->search($salesOrderAddress));
            if (null === $this->salesOrderAddressesScheduledForDeletion) {
                $this->salesOrderAddressesScheduledForDeletion = clone $this->collSalesOrderAddresses;
                $this->salesOrderAddressesScheduledForDeletion->clear();
            }
            $this->salesOrderAddressesScheduledForDeletion[]= $salesOrderAddress;
            $salesOrderAddress->setRegion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscRegion is new, it will return
     * an empty collection; or if this PacMiscRegion has previously
     * been saved, it will retrieve related SalesOrderAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscRegion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects
     */
    public function getSalesOrderAddressesJoinCountry($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery::create(null, $criteria);
        $query->joinWith('Country', $join_behavior);

        return $this->getSalesOrderAddresses($query, $con);
    }

    /**
     * Clears out the collSalesOrderAddressHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     * @see        addSalesOrderAddressHistories()
     */
    public function clearSalesOrderAddressHistories()
    {
        $this->collSalesOrderAddressHistories = null; // important to set this to null since that means it is uninitialized
        $this->collSalesOrderAddressHistoriesPartial = null;

        return $this;
    }

    /**
     * reset is the collSalesOrderAddressHistories collection loaded partially
     *
     * @return void
     */
    public function resetPartialSalesOrderAddressHistories($v = true)
    {
        $this->collSalesOrderAddressHistoriesPartial = $v;
    }

    /**
     * Initializes the collSalesOrderAddressHistories collection.
     *
     * By default this just sets the collSalesOrderAddressHistories collection to an empty array (like clearcollSalesOrderAddressHistories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderAddressHistories($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderAddressHistories && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderAddressHistories = new PropelObjectCollection();
        $this->collSalesOrderAddressHistories->setModel('ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects
     * @throws PropelException
     */
    public function getSalesOrderAddressHistories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                // return empty collection
                $this->initSalesOrderAddressHistories();
            } else {
                $collSalesOrderAddressHistories = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery::create(null, $criteria)
                    ->filterByRegion($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressHistoriesPartial && count($collSalesOrderAddressHistories)) {
                      $this->initSalesOrderAddressHistories(false);

                      foreach ($collSalesOrderAddressHistories as $obj) {
                        if (false == $this->collSalesOrderAddressHistories->contains($obj)) {
                          $this->collSalesOrderAddressHistories->append($obj);
                        }
                      }

                      $this->collSalesOrderAddressHistoriesPartial = true;
                    }

                    $collSalesOrderAddressHistories->getInternalIterator()->rewind();

                    return $collSalesOrderAddressHistories;
                }

                if ($partial && $this->collSalesOrderAddressHistories) {
                    foreach ($this->collSalesOrderAddressHistories as $obj) {
                        if ($obj->isNew()) {
                            $collSalesOrderAddressHistories[] = $obj;
                        }
                    }
                }

                $this->collSalesOrderAddressHistories = $collSalesOrderAddressHistories;
                $this->collSalesOrderAddressHistoriesPartial = false;
            }
        }

        return $this->collSalesOrderAddressHistories;
    }

    /**
     * Sets a collection of SalesOrderAddressHistory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $salesOrderAddressHistories A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function setSalesOrderAddressHistories(PropelCollection $salesOrderAddressHistories, PropelPDO $con = null)
    {
        $salesOrderAddressHistoriesToDelete = $this->getSalesOrderAddressHistories(new Criteria(), $con)->diff($salesOrderAddressHistories);


        $this->salesOrderAddressHistoriesScheduledForDeletion = $salesOrderAddressHistoriesToDelete;

        foreach ($salesOrderAddressHistoriesToDelete as $salesOrderAddressHistoryRemoved) {
            $salesOrderAddressHistoryRemoved->setRegion(null);
        }

        $this->collSalesOrderAddressHistories = null;
        foreach ($salesOrderAddressHistories as $salesOrderAddressHistory) {
            $this->addSalesOrderAddressHistory($salesOrderAddressHistory);
        }

        $this->collSalesOrderAddressHistories = $salesOrderAddressHistories;
        $this->collSalesOrderAddressHistoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException
     */
    public function countSalesOrderAddressHistories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSalesOrderAddressHistories());
            }
            $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegion($this)
                ->count($con);
        }

        return count($this->collSalesOrderAddressHistories);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object to this object
     * through the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory $l ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function addSalesOrderAddressHistory(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory $l)
    {
        if ($this->collSalesOrderAddressHistories === null) {
            $this->initSalesOrderAddressHistories();
            $this->collSalesOrderAddressHistoriesPartial = true;
        }

        if (!in_array($l, $this->collSalesOrderAddressHistories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesOrderAddressHistory($l);

            if ($this->salesOrderAddressHistoriesScheduledForDeletion and $this->salesOrderAddressHistoriesScheduledForDeletion->contains($l)) {
                $this->salesOrderAddressHistoriesScheduledForDeletion->remove($this->salesOrderAddressHistoriesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	SalesOrderAddressHistory $salesOrderAddressHistory The salesOrderAddressHistory object to add.
     */
    protected function doAddSalesOrderAddressHistory($salesOrderAddressHistory)
    {
        $this->collSalesOrderAddressHistories[]= $salesOrderAddressHistory;
        $salesOrderAddressHistory->setRegion($this);
    }

    /**
     * @param	SalesOrderAddressHistory $salesOrderAddressHistory The salesOrderAddressHistory object to remove.
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The current object (for fluent API support)
     */
    public function removeSalesOrderAddressHistory($salesOrderAddressHistory)
    {
        if ($this->getSalesOrderAddressHistories()->contains($salesOrderAddressHistory)) {
            $this->collSalesOrderAddressHistories->remove($this->collSalesOrderAddressHistories->search($salesOrderAddressHistory));
            if (null === $this->salesOrderAddressHistoriesScheduledForDeletion) {
                $this->salesOrderAddressHistoriesScheduledForDeletion = clone $this->collSalesOrderAddressHistories;
                $this->salesOrderAddressHistoriesScheduledForDeletion->clear();
            }
            $this->salesOrderAddressHistoriesScheduledForDeletion[]= $salesOrderAddressHistory;
            $salesOrderAddressHistory->setRegion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscRegion is new, it will return
     * an empty collection; or if this PacMiscRegion has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscRegion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinCountry($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('Country', $join_behavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscRegion is new, it will return
     * an empty collection; or if this PacMiscRegion has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscRegion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinSalesOrderAddress($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('SalesOrderAddress', $join_behavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_misc_region = null;
        $this->fk_misc_country = null;
        $this->name = null;
        $this->iso2_code = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collCustomerAddresses) {
                foreach ($this->collCustomerAddresses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCustomerAddress2s) {
                foreach ($this->collCustomerAddress2s as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesOrderAddresses) {
                foreach ($this->collSalesOrderAddresses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesOrderAddressHistories) {
                foreach ($this->collSalesOrderAddressHistories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCountry instanceof Persistent) {
              $this->aCountry->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCustomerAddresses instanceof PropelCollection) {
            $this->collCustomerAddresses->clearIterator();
        }
        $this->collCustomerAddresses = null;
        if ($this->collCustomerAddress2s instanceof PropelCollection) {
            $this->collCustomerAddress2s->clearIterator();
        }
        $this->collCustomerAddress2s = null;
        if ($this->collSalesOrderAddresses instanceof PropelCollection) {
            $this->collSalesOrderAddresses->clearIterator();
        }
        $this->collSalesOrderAddresses = null;
        if ($this->collSalesOrderAddressHistories instanceof PropelCollection) {
            $this->collSalesOrderAddressHistories->clearIterator();
        }
        $this->collSalesOrderAddressHistories = null;
        $this->aCountry = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::DEFAULT_STRING_FORMAT);
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
