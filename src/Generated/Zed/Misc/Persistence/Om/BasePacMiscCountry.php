<?php


/**
 * Base class that represents a row from the 'pac_misc_country' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/infrastructure-package/ProjectA/Zed/Misc/Persistence.om
 */
abstract class Generated_Zed_Misc_Persistence_Om_BasePacMiscCountry extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_misc_country field.
     * @var        int
     */
    protected $id_misc_country;

    /**
     * The value for the iso2_code field.
     * @var        string
     */
    protected $iso2_code;

    /**
     * The value for the iso3_code field.
     * @var        string
     */
    protected $iso3_code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the postal_code_madatory field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $postal_code_madatory;

    /**
     * The value for the postal_code_regex field.
     * @var        string
     */
    protected $postal_code_regex;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer_Persistence_PacCustomerAddress[] Collection to store aggregation of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects.
     */
    protected $collCustomerAddresses;
    protected $collCustomerAddressesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress objects.
     */
    protected $collSalesOrderAddresses;
    protected $collSalesOrderAddressesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects.
     */
    protected $collSalesOrderAddressHistories;
    protected $collSalesOrderAddressHistoriesPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Misc_Persistence_SaoMiscRegion[] Collection to store aggregation of Sao_Zed_Misc_Persistence_SaoMiscRegion objects.
     */
    protected $collRegions;
    protected $collRegionsPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesTax[] Collection to store aggregation of Sao_Zed_Sales_Persistence_SaoSalesTax objects.
     */
    protected $collSalesTaxes;
    protected $collSalesTaxesPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrderItem[] Collection to store aggregation of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     */
    protected $collSaoSalesOrderItemAddresses;
    protected $collSaoSalesOrderItemAddressesPartial;

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
    protected $salesOrderAddressesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $salesOrderAddressHistoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $regionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $salesTaxesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoSalesOrderItemAddressesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->postal_code_madatory = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Misc_Persistence_Om_BasePacMiscCountry object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_misc_country] column value.
     *
     * @return int
     */
    public function getIdMiscCountry()
    {
        return $this->id_misc_country;
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
     * Get the [iso3_code] column value.
     *
     * @return string
     */
    public function getIso3Code()
    {
        return $this->iso3_code;
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
     * Get the [postal_code_madatory] column value.
     *
     * @return boolean
     */
    public function getPostalCodeMadatory()
    {
        return $this->postal_code_madatory;
    }

    /**
     * Get the [postal_code_regex] column value.
     *
     * @return string
     */
    public function getPostalCodeRegex()
    {
        return $this->postal_code_regex;
    }

    /**
     * Set the value of [id_misc_country] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setIdMiscCountry($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_misc_country !== $v) {
            $this->id_misc_country = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY;
        }


        return $this;
    } // setIdMiscCountry()

    /**
     * Set the value of [iso2_code] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setIso2Code($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->iso2_code !== $v) {
            $this->iso2_code = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO2_CODE;
        }


        return $this;
    } // setIso2Code()

    /**
     * Set the value of [iso3_code] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setIso3Code($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->iso3_code !== $v) {
            $this->iso3_code = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO3_CODE;
        }


        return $this;
    } // setIso3Code()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [postal_code_madatory] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setPostalCodeMadatory($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->postal_code_madatory !== $v) {
            $this->postal_code_madatory = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_MADATORY;
        }


        return $this;
    } // setPostalCodeMadatory()

    /**
     * Set the value of [postal_code_regex] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setPostalCodeRegex($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->postal_code_regex !== $v) {
            $this->postal_code_regex = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_REGEX;
        }


        return $this;
    } // setPostalCodeRegex()

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
            if ($this->postal_code_madatory !== false) {
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

            $this->id_misc_country = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->iso2_code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->iso3_code = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->postal_code_madatory = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->postal_code_regex = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Misc_Persistence_PacMiscCountry object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCustomerAddresses = null;

            $this->collSalesOrderAddresses = null;

            $this->collSalesOrderAddressHistories = null;

            $this->collRegions = null;

            $this->collSalesTaxes = null;

            $this->collSaoSalesOrderItemAddresses = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addInstanceToPool($this);
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

            if ($this->customerAddressesScheduledForDeletion !== null) {
                if (!$this->customerAddressesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create()
                        ->filterByPrimaryKeys($this->customerAddressesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->salesOrderAddressesScheduledForDeletion !== null) {
                if (!$this->salesOrderAddressesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery::create()
                        ->filterByPrimaryKeys($this->salesOrderAddressesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create()
                        ->filterByPrimaryKeys($this->salesOrderAddressHistoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->regionsScheduledForDeletion !== null) {
                if (!$this->regionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->regionsScheduledForDeletion as $region) {
                        // need to save related object because we set the relation to null
                        $region->save($con);
                    }
                    $this->regionsScheduledForDeletion = null;
                }
            }

            if ($this->collRegions !== null) {
                foreach ($this->collRegions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesTaxesScheduledForDeletion !== null) {
                if (!$this->salesTaxesScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Sales_Persistence_SaoSalesTaxQuery::create()
                        ->filterByPrimaryKeys($this->salesTaxesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->salesTaxesScheduledForDeletion = null;
                }
            }

            if ($this->collSalesTaxes !== null) {
                foreach ($this->collSalesTaxes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->saoSalesOrderItemAddressesScheduledForDeletion !== null) {
                if (!$this->saoSalesOrderItemAddressesScheduledForDeletion->isEmpty()) {
                    foreach ($this->saoSalesOrderItemAddressesScheduledForDeletion as $saoSalesOrderItemAddress) {
                        // need to save related object because we set the relation to null
                        $saoSalesOrderItemAddress->save($con);
                    }
                    $this->saoSalesOrderItemAddressesScheduledForDeletion = null;
                }
            }

            if ($this->collSaoSalesOrderItemAddresses !== null) {
                foreach ($this->collSaoSalesOrderItemAddresses as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY;
        if (null !== $this->id_misc_country) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`id_misc_country`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO2_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`iso2_code`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO3_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`iso3_code`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_MADATORY)) {
            $modifiedColumns[':p' . $index++]  = '`postal_code_madatory`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_REGEX)) {
            $modifiedColumns[':p' . $index++]  = '`postal_code_regex`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_misc_country` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_misc_country`':
                        $stmt->bindValue($identifier, $this->id_misc_country, PDO::PARAM_INT);
                        break;
                    case '`iso2_code`':
                        $stmt->bindValue($identifier, $this->iso2_code, PDO::PARAM_STR);
                        break;
                    case '`iso3_code`':
                        $stmt->bindValue($identifier, $this->iso3_code, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`postal_code_madatory`':
                        $stmt->bindValue($identifier, (int) $this->postal_code_madatory, PDO::PARAM_INT);
                        break;
                    case '`postal_code_regex`':
                        $stmt->bindValue($identifier, $this->postal_code_regex, PDO::PARAM_STR);
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
        $this->setIdMiscCountry($pk);

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


            if (($retval = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCustomerAddresses !== null) {
                    foreach ($this->collCustomerAddresses as $referrerFK) {
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

                if ($this->collRegions !== null) {
                    foreach ($this->collRegions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSalesTaxes !== null) {
                    foreach ($this->collSalesTaxes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSaoSalesOrderItemAddresses !== null) {
                    foreach ($this->collSaoSalesOrderItemAddresses as $referrerFK) {
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
        $pos = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMiscCountry();
                break;
            case 1:
                return $this->getIso2Code();
                break;
            case 2:
                return $this->getIso3Code();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getPostalCodeMadatory();
                break;
            case 5:
                return $this->getPostalCodeRegex();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Misc_Persistence_PacMiscCountry'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Misc_Persistence_PacMiscCountry'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMiscCountry(),
            $keys[1] => $this->getIso2Code(),
            $keys[2] => $this->getIso3Code(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getPostalCodeMadatory(),
            $keys[5] => $this->getPostalCodeRegex(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collCustomerAddresses) {
                $result['CustomerAddresses'] = $this->collCustomerAddresses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderAddresses) {
                $result['SalesOrderAddresses'] = $this->collSalesOrderAddresses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderAddressHistories) {
                $result['SalesOrderAddressHistories'] = $this->collSalesOrderAddressHistories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRegions) {
                $result['Regions'] = $this->collRegions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesTaxes) {
                $result['SalesTaxes'] = $this->collSalesTaxes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSaoSalesOrderItemAddresses) {
                $result['SaoSalesOrderItemAddresses'] = $this->collSaoSalesOrderItemAddresses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMiscCountry($value);
                break;
            case 1:
                $this->setIso2Code($value);
                break;
            case 2:
                $this->setIso3Code($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setPostalCodeMadatory($value);
                break;
            case 5:
                $this->setPostalCodeRegex($value);
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
        $keys = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMiscCountry($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIso2Code($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIso3Code($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPostalCodeMadatory($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setPostalCodeRegex($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY)) $criteria->add(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $this->id_misc_country);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO2_CODE)) $criteria->add(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO2_CODE, $this->iso2_code);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO3_CODE)) $criteria->add(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ISO3_CODE, $this->iso3_code);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NAME)) $criteria->add(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_MADATORY)) $criteria->add(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_MADATORY, $this->postal_code_madatory);
        if ($this->isColumnModified(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_REGEX)) $criteria->add(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::POSTAL_CODE_REGEX, $this->postal_code_regex);

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
        $criteria = new Criteria(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $this->id_misc_country);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMiscCountry();
    }

    /**
     * Generic method to set the primary key (id_misc_country column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMiscCountry($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMiscCountry();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Misc_Persistence_PacMiscCountry (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIso2Code($this->getIso2Code());
        $copyObj->setIso3Code($this->getIso3Code());
        $copyObj->setName($this->getName());
        $copyObj->setPostalCodeMadatory($this->getPostalCodeMadatory());
        $copyObj->setPostalCodeRegex($this->getPostalCodeRegex());

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

            foreach ($this->getRegions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRegion($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesTaxes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesTax($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSaoSalesOrderItemAddresses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSaoSalesOrderItemAddress($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMiscCountry(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry Clone of current object.
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer();
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
        if ('CustomerAddress' == $relationName) {
            $this->initCustomerAddresses();
        }
        if ('SalesOrderAddress' == $relationName) {
            $this->initSalesOrderAddresses();
        }
        if ('SalesOrderAddressHistory' == $relationName) {
            $this->initSalesOrderAddressHistories();
        }
        if ('Region' == $relationName) {
            $this->initRegions();
        }
        if ('SalesTax' == $relationName) {
            $this->initSalesTaxes();
        }
        if ('SaoSalesOrderItemAddress' == $relationName) {
            $this->initSaoSalesOrderItemAddresses();
        }
    }

    /**
     * Clears out the collCustomerAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
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
        $this->collCustomerAddresses->setModel('ProjectA_Zed_Customer_Persistence_PacCustomerAddress');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_PacMiscCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_PacCustomerAddress[] List of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects
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
                $collCustomerAddresses = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCustomerAddressesPartial && count($collCustomerAddresses)) {
                      $this->initCustomerAddresses(false);

                      foreach($collCustomerAddresses as $obj) {
                        if (false == $this->collCustomerAddresses->contains($obj)) {
                          $this->collCustomerAddresses->append($obj);
                        }
                      }

                      $this->collCustomerAddressesPartial = true;
                    }

                    $collCustomerAddresses->getInternalIterator()->rewind();
                    return $collCustomerAddresses;
                }

                if($partial && $this->collCustomerAddresses) {
                    foreach($this->collCustomerAddresses as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setCustomerAddresses(PropelCollection $customerAddresses, PropelPDO $con = null)
    {
        $customerAddressesToDelete = $this->getCustomerAddresses(new Criteria(), $con)->diff($customerAddresses);

        $this->customerAddressesScheduledForDeletion = unserialize(serialize($customerAddressesToDelete));

        foreach ($customerAddressesToDelete as $customerAddressRemoved) {
            $customerAddressRemoved->setCountry(null);
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
     * Returns the number of related ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects.
     * @throws PropelException
     */
    public function countCustomerAddresses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCustomerAddressesPartial && !$this->isNew();
        if (null === $this->collCustomerAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerAddresses) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCustomerAddresses());
            }
            $query = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collCustomerAddresses);
    }

    /**
     * Method called to associate a ProjectA_Zed_Customer_Persistence_PacCustomerAddress object to this object
     * through the ProjectA_Zed_Customer_Persistence_PacCustomerAddress foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer_Persistence_PacCustomerAddress $l ProjectA_Zed_Customer_Persistence_PacCustomerAddress
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function addCustomerAddress(ProjectA_Zed_Customer_Persistence_PacCustomerAddress $l)
    {
        if ($this->collCustomerAddresses === null) {
            $this->initCustomerAddresses();
            $this->collCustomerAddressesPartial = true;
        }
        if (!in_array($l, $this->collCustomerAddresses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCustomerAddress($l);
        }

        return $this;
    }

    /**
     * @param	CustomerAddress $customerAddress The customerAddress object to add.
     */
    protected function doAddCustomerAddress($customerAddress)
    {
        $this->collCustomerAddresses[]= $customerAddress;
        $customerAddress->setCountry($this);
    }

    /**
     * @param	CustomerAddress $customerAddress The customerAddress object to remove.
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function removeCustomerAddress($customerAddress)
    {
        if ($this->getCustomerAddresses()->contains($customerAddress)) {
            $this->collCustomerAddresses->remove($this->collCustomerAddresses->search($customerAddress));
            if (null === $this->customerAddressesScheduledForDeletion) {
                $this->customerAddressesScheduledForDeletion = clone $this->collCustomerAddresses;
                $this->customerAddressesScheduledForDeletion->clear();
            }
            $this->customerAddressesScheduledForDeletion[]= clone $customerAddress;
            $customerAddress->setCountry(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscCountry is new, it will return
     * an empty collection; or if this PacMiscCountry has previously
     * been saved, it will retrieve related CustomerAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscCountry.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_PacCustomerAddress[] List of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects
     */
    public function getCustomerAddressesJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Customer', $join_behavior);

        return $this->getCustomerAddresses($query, $con);
    }

    /**
     * Clears out the collSalesOrderAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
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
        $this->collSalesOrderAddresses->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_PacMiscCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress objects
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
                $collSalesOrderAddresses = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressesPartial && count($collSalesOrderAddresses)) {
                      $this->initSalesOrderAddresses(false);

                      foreach($collSalesOrderAddresses as $obj) {
                        if (false == $this->collSalesOrderAddresses->contains($obj)) {
                          $this->collSalesOrderAddresses->append($obj);
                        }
                      }

                      $this->collSalesOrderAddressesPartial = true;
                    }

                    $collSalesOrderAddresses->getInternalIterator()->rewind();
                    return $collSalesOrderAddresses;
                }

                if($partial && $this->collSalesOrderAddresses) {
                    foreach($this->collSalesOrderAddresses as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setSalesOrderAddresses(PropelCollection $salesOrderAddresses, PropelPDO $con = null)
    {
        $salesOrderAddressesToDelete = $this->getSalesOrderAddresses(new Criteria(), $con)->diff($salesOrderAddresses);

        $this->salesOrderAddressesScheduledForDeletion = unserialize(serialize($salesOrderAddressesToDelete));

        foreach ($salesOrderAddressesToDelete as $salesOrderAddressRemoved) {
            $salesOrderAddressRemoved->setCountry(null);
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
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress objects.
     * @throws PropelException
     */
    public function countSalesOrderAddresses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddresses) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSalesOrderAddresses());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collSalesOrderAddresses);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $l ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function addSalesOrderAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $l)
    {
        if ($this->collSalesOrderAddresses === null) {
            $this->initSalesOrderAddresses();
            $this->collSalesOrderAddressesPartial = true;
        }
        if (!in_array($l, $this->collSalesOrderAddresses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesOrderAddress($l);
        }

        return $this;
    }

    /**
     * @param	SalesOrderAddress $salesOrderAddress The salesOrderAddress object to add.
     */
    protected function doAddSalesOrderAddress($salesOrderAddress)
    {
        $this->collSalesOrderAddresses[]= $salesOrderAddress;
        $salesOrderAddress->setCountry($this);
    }

    /**
     * @param	SalesOrderAddress $salesOrderAddress The salesOrderAddress object to remove.
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function removeSalesOrderAddress($salesOrderAddress)
    {
        if ($this->getSalesOrderAddresses()->contains($salesOrderAddress)) {
            $this->collSalesOrderAddresses->remove($this->collSalesOrderAddresses->search($salesOrderAddress));
            if (null === $this->salesOrderAddressesScheduledForDeletion) {
                $this->salesOrderAddressesScheduledForDeletion = clone $this->collSalesOrderAddresses;
                $this->salesOrderAddressesScheduledForDeletion->clear();
            }
            $this->salesOrderAddressesScheduledForDeletion[]= clone $salesOrderAddress;
            $salesOrderAddress->setCountry(null);
        }

        return $this;
    }

    /**
     * Clears out the collSalesOrderAddressHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
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
        $this->collSalesOrderAddressHistories->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_PacMiscCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects
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
                $collSalesOrderAddressHistories = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressHistoriesPartial && count($collSalesOrderAddressHistories)) {
                      $this->initSalesOrderAddressHistories(false);

                      foreach($collSalesOrderAddressHistories as $obj) {
                        if (false == $this->collSalesOrderAddressHistories->contains($obj)) {
                          $this->collSalesOrderAddressHistories->append($obj);
                        }
                      }

                      $this->collSalesOrderAddressHistoriesPartial = true;
                    }

                    $collSalesOrderAddressHistories->getInternalIterator()->rewind();
                    return $collSalesOrderAddressHistories;
                }

                if($partial && $this->collSalesOrderAddressHistories) {
                    foreach($this->collSalesOrderAddressHistories as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setSalesOrderAddressHistories(PropelCollection $salesOrderAddressHistories, PropelPDO $con = null)
    {
        $salesOrderAddressHistoriesToDelete = $this->getSalesOrderAddressHistories(new Criteria(), $con)->diff($salesOrderAddressHistories);

        $this->salesOrderAddressHistoriesScheduledForDeletion = unserialize(serialize($salesOrderAddressHistoriesToDelete));

        foreach ($salesOrderAddressHistoriesToDelete as $salesOrderAddressHistoryRemoved) {
            $salesOrderAddressHistoryRemoved->setCountry(null);
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
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects.
     * @throws PropelException
     */
    public function countSalesOrderAddressHistories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSalesOrderAddressHistories());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collSalesOrderAddressHistories);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory $l ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function addSalesOrderAddressHistory(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory $l)
    {
        if ($this->collSalesOrderAddressHistories === null) {
            $this->initSalesOrderAddressHistories();
            $this->collSalesOrderAddressHistoriesPartial = true;
        }
        if (!in_array($l, $this->collSalesOrderAddressHistories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesOrderAddressHistory($l);
        }

        return $this;
    }

    /**
     * @param	SalesOrderAddressHistory $salesOrderAddressHistory The salesOrderAddressHistory object to add.
     */
    protected function doAddSalesOrderAddressHistory($salesOrderAddressHistory)
    {
        $this->collSalesOrderAddressHistories[]= $salesOrderAddressHistory;
        $salesOrderAddressHistory->setCountry($this);
    }

    /**
     * @param	SalesOrderAddressHistory $salesOrderAddressHistory The salesOrderAddressHistory object to remove.
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function removeSalesOrderAddressHistory($salesOrderAddressHistory)
    {
        if ($this->getSalesOrderAddressHistories()->contains($salesOrderAddressHistory)) {
            $this->collSalesOrderAddressHistories->remove($this->collSalesOrderAddressHistories->search($salesOrderAddressHistory));
            if (null === $this->salesOrderAddressHistoriesScheduledForDeletion) {
                $this->salesOrderAddressHistoriesScheduledForDeletion = clone $this->collSalesOrderAddressHistories;
                $this->salesOrderAddressHistoriesScheduledForDeletion->clear();
            }
            $this->salesOrderAddressHistoriesScheduledForDeletion[]= clone $salesOrderAddressHistory;
            $salesOrderAddressHistory->setCountry(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscCountry is new, it will return
     * an empty collection; or if this PacMiscCountry has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscCountry.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinSalesOrderAddress($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('SalesOrderAddress', $join_behavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }

    /**
     * Clears out the collRegions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     * @see        addRegions()
     */
    public function clearRegions()
    {
        $this->collRegions = null; // important to set this to null since that means it is uninitialized
        $this->collRegionsPartial = null;

        return $this;
    }

    /**
     * reset is the collRegions collection loaded partially
     *
     * @return void
     */
    public function resetPartialRegions($v = true)
    {
        $this->collRegionsPartial = $v;
    }

    /**
     * Initializes the collRegions collection.
     *
     * By default this just sets the collRegions collection to an empty array (like clearcollRegions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRegions($overrideExisting = true)
    {
        if (null !== $this->collRegions && !$overrideExisting) {
            return;
        }
        $this->collRegions = new PropelObjectCollection();
        $this->collRegions->setModel('Sao_Zed_Misc_Persistence_SaoMiscRegion');
    }

    /**
     * Gets an array of Sao_Zed_Misc_Persistence_SaoMiscRegion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_PacMiscCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Misc_Persistence_SaoMiscRegion[] List of Sao_Zed_Misc_Persistence_SaoMiscRegion objects
     * @throws PropelException
     */
    public function getRegions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRegionsPartial && !$this->isNew();
        if (null === $this->collRegions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRegions) {
                // return empty collection
                $this->initRegions();
            } else {
                $collRegions = Sao_Zed_Misc_Persistence_SaoMiscRegionQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRegionsPartial && count($collRegions)) {
                      $this->initRegions(false);

                      foreach($collRegions as $obj) {
                        if (false == $this->collRegions->contains($obj)) {
                          $this->collRegions->append($obj);
                        }
                      }

                      $this->collRegionsPartial = true;
                    }

                    $collRegions->getInternalIterator()->rewind();
                    return $collRegions;
                }

                if($partial && $this->collRegions) {
                    foreach($this->collRegions as $obj) {
                        if($obj->isNew()) {
                            $collRegions[] = $obj;
                        }
                    }
                }

                $this->collRegions = $collRegions;
                $this->collRegionsPartial = false;
            }
        }

        return $this->collRegions;
    }

    /**
     * Sets a collection of Region objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $regions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setRegions(PropelCollection $regions, PropelPDO $con = null)
    {
        $regionsToDelete = $this->getRegions(new Criteria(), $con)->diff($regions);

        $this->regionsScheduledForDeletion = unserialize(serialize($regionsToDelete));

        foreach ($regionsToDelete as $regionRemoved) {
            $regionRemoved->setCountry(null);
        }

        $this->collRegions = null;
        foreach ($regions as $region) {
            $this->addRegion($region);
        }

        $this->collRegions = $regions;
        $this->collRegionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Misc_Persistence_SaoMiscRegion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Misc_Persistence_SaoMiscRegion objects.
     * @throws PropelException
     */
    public function countRegions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRegionsPartial && !$this->isNew();
        if (null === $this->collRegions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRegions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRegions());
            }
            $query = Sao_Zed_Misc_Persistence_SaoMiscRegionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collRegions);
    }

    /**
     * Method called to associate a Sao_Zed_Misc_Persistence_SaoMiscRegion object to this object
     * through the Sao_Zed_Misc_Persistence_SaoMiscRegion foreign key attribute.
     *
     * @param    Sao_Zed_Misc_Persistence_SaoMiscRegion $l Sao_Zed_Misc_Persistence_SaoMiscRegion
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function addRegion(Sao_Zed_Misc_Persistence_SaoMiscRegion $l)
    {
        if ($this->collRegions === null) {
            $this->initRegions();
            $this->collRegionsPartial = true;
        }
        if (!in_array($l, $this->collRegions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRegion($l);
        }

        return $this;
    }

    /**
     * @param	Region $region The region object to add.
     */
    protected function doAddRegion($region)
    {
        $this->collRegions[]= $region;
        $region->setCountry($this);
    }

    /**
     * @param	Region $region The region object to remove.
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function removeRegion($region)
    {
        if ($this->getRegions()->contains($region)) {
            $this->collRegions->remove($this->collRegions->search($region));
            if (null === $this->regionsScheduledForDeletion) {
                $this->regionsScheduledForDeletion = clone $this->collRegions;
                $this->regionsScheduledForDeletion->clear();
            }
            $this->regionsScheduledForDeletion[]= $region;
            $region->setCountry(null);
        }

        return $this;
    }

    /**
     * Clears out the collSalesTaxes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     * @see        addSalesTaxes()
     */
    public function clearSalesTaxes()
    {
        $this->collSalesTaxes = null; // important to set this to null since that means it is uninitialized
        $this->collSalesTaxesPartial = null;

        return $this;
    }

    /**
     * reset is the collSalesTaxes collection loaded partially
     *
     * @return void
     */
    public function resetPartialSalesTaxes($v = true)
    {
        $this->collSalesTaxesPartial = $v;
    }

    /**
     * Initializes the collSalesTaxes collection.
     *
     * By default this just sets the collSalesTaxes collection to an empty array (like clearcollSalesTaxes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesTaxes($overrideExisting = true)
    {
        if (null !== $this->collSalesTaxes && !$overrideExisting) {
            return;
        }
        $this->collSalesTaxes = new PropelObjectCollection();
        $this->collSalesTaxes->setModel('Sao_Zed_Sales_Persistence_SaoSalesTax');
    }

    /**
     * Gets an array of Sao_Zed_Sales_Persistence_SaoSalesTax objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_PacMiscCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesTax[] List of Sao_Zed_Sales_Persistence_SaoSalesTax objects
     * @throws PropelException
     */
    public function getSalesTaxes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSalesTaxesPartial && !$this->isNew();
        if (null === $this->collSalesTaxes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesTaxes) {
                // return empty collection
                $this->initSalesTaxes();
            } else {
                $collSalesTaxes = Sao_Zed_Sales_Persistence_SaoSalesTaxQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesTaxesPartial && count($collSalesTaxes)) {
                      $this->initSalesTaxes(false);

                      foreach($collSalesTaxes as $obj) {
                        if (false == $this->collSalesTaxes->contains($obj)) {
                          $this->collSalesTaxes->append($obj);
                        }
                      }

                      $this->collSalesTaxesPartial = true;
                    }

                    $collSalesTaxes->getInternalIterator()->rewind();
                    return $collSalesTaxes;
                }

                if($partial && $this->collSalesTaxes) {
                    foreach($this->collSalesTaxes as $obj) {
                        if($obj->isNew()) {
                            $collSalesTaxes[] = $obj;
                        }
                    }
                }

                $this->collSalesTaxes = $collSalesTaxes;
                $this->collSalesTaxesPartial = false;
            }
        }

        return $this->collSalesTaxes;
    }

    /**
     * Sets a collection of SalesTax objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $salesTaxes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setSalesTaxes(PropelCollection $salesTaxes, PropelPDO $con = null)
    {
        $salesTaxesToDelete = $this->getSalesTaxes(new Criteria(), $con)->diff($salesTaxes);

        $this->salesTaxesScheduledForDeletion = unserialize(serialize($salesTaxesToDelete));

        foreach ($salesTaxesToDelete as $salesTaxRemoved) {
            $salesTaxRemoved->setCountry(null);
        }

        $this->collSalesTaxes = null;
        foreach ($salesTaxes as $salesTax) {
            $this->addSalesTax($salesTax);
        }

        $this->collSalesTaxes = $salesTaxes;
        $this->collSalesTaxesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Sales_Persistence_SaoSalesTax objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Sales_Persistence_SaoSalesTax objects.
     * @throws PropelException
     */
    public function countSalesTaxes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesTaxesPartial && !$this->isNew();
        if (null === $this->collSalesTaxes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesTaxes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSalesTaxes());
            }
            $query = Sao_Zed_Sales_Persistence_SaoSalesTaxQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collSalesTaxes);
    }

    /**
     * Method called to associate a Sao_Zed_Sales_Persistence_SaoSalesTax object to this object
     * through the Sao_Zed_Sales_Persistence_SaoSalesTax foreign key attribute.
     *
     * @param    Sao_Zed_Sales_Persistence_SaoSalesTax $l Sao_Zed_Sales_Persistence_SaoSalesTax
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function addSalesTax(Sao_Zed_Sales_Persistence_SaoSalesTax $l)
    {
        if ($this->collSalesTaxes === null) {
            $this->initSalesTaxes();
            $this->collSalesTaxesPartial = true;
        }
        if (!in_array($l, $this->collSalesTaxes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesTax($l);
        }

        return $this;
    }

    /**
     * @param	SalesTax $salesTax The salesTax object to add.
     */
    protected function doAddSalesTax($salesTax)
    {
        $this->collSalesTaxes[]= $salesTax;
        $salesTax->setCountry($this);
    }

    /**
     * @param	SalesTax $salesTax The salesTax object to remove.
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function removeSalesTax($salesTax)
    {
        if ($this->getSalesTaxes()->contains($salesTax)) {
            $this->collSalesTaxes->remove($this->collSalesTaxes->search($salesTax));
            if (null === $this->salesTaxesScheduledForDeletion) {
                $this->salesTaxesScheduledForDeletion = clone $this->collSalesTaxes;
                $this->salesTaxesScheduledForDeletion->clear();
            }
            $this->salesTaxesScheduledForDeletion[]= clone $salesTax;
            $salesTax->setCountry(null);
        }

        return $this;
    }

    /**
     * Clears out the collSaoSalesOrderItemAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     * @see        addSaoSalesOrderItemAddresses()
     */
    public function clearSaoSalesOrderItemAddresses()
    {
        $this->collSaoSalesOrderItemAddresses = null; // important to set this to null since that means it is uninitialized
        $this->collSaoSalesOrderItemAddressesPartial = null;

        return $this;
    }

    /**
     * reset is the collSaoSalesOrderItemAddresses collection loaded partially
     *
     * @return void
     */
    public function resetPartialSaoSalesOrderItemAddresses($v = true)
    {
        $this->collSaoSalesOrderItemAddressesPartial = $v;
    }

    /**
     * Initializes the collSaoSalesOrderItemAddresses collection.
     *
     * By default this just sets the collSaoSalesOrderItemAddresses collection to an empty array (like clearcollSaoSalesOrderItemAddresses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSaoSalesOrderItemAddresses($overrideExisting = true)
    {
        if (null !== $this->collSaoSalesOrderItemAddresses && !$overrideExisting) {
            return;
        }
        $this->collSaoSalesOrderItemAddresses = new PropelObjectCollection();
        $this->collSaoSalesOrderItemAddresses->setModel('Sao_Zed_Sales_Persistence_SaoSalesOrderItem');
    }

    /**
     * Gets an array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Misc_Persistence_PacMiscCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrderItem[] List of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects
     * @throws PropelException
     */
    public function getSaoSalesOrderItemAddresses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSaoSalesOrderItemAddressesPartial && !$this->isNew();
        if (null === $this->collSaoSalesOrderItemAddresses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSaoSalesOrderItemAddresses) {
                // return empty collection
                $this->initSaoSalesOrderItemAddresses();
            } else {
                $collSaoSalesOrderItemAddresses = Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSaoSalesOrderItemAddressesPartial && count($collSaoSalesOrderItemAddresses)) {
                      $this->initSaoSalesOrderItemAddresses(false);

                      foreach($collSaoSalesOrderItemAddresses as $obj) {
                        if (false == $this->collSaoSalesOrderItemAddresses->contains($obj)) {
                          $this->collSaoSalesOrderItemAddresses->append($obj);
                        }
                      }

                      $this->collSaoSalesOrderItemAddressesPartial = true;
                    }

                    $collSaoSalesOrderItemAddresses->getInternalIterator()->rewind();
                    return $collSaoSalesOrderItemAddresses;
                }

                if($partial && $this->collSaoSalesOrderItemAddresses) {
                    foreach($this->collSaoSalesOrderItemAddresses as $obj) {
                        if($obj->isNew()) {
                            $collSaoSalesOrderItemAddresses[] = $obj;
                        }
                    }
                }

                $this->collSaoSalesOrderItemAddresses = $collSaoSalesOrderItemAddresses;
                $this->collSaoSalesOrderItemAddressesPartial = false;
            }
        }

        return $this->collSaoSalesOrderItemAddresses;
    }

    /**
     * Sets a collection of SaoSalesOrderItemAddress objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $saoSalesOrderItemAddresses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function setSaoSalesOrderItemAddresses(PropelCollection $saoSalesOrderItemAddresses, PropelPDO $con = null)
    {
        $saoSalesOrderItemAddressesToDelete = $this->getSaoSalesOrderItemAddresses(new Criteria(), $con)->diff($saoSalesOrderItemAddresses);

        $this->saoSalesOrderItemAddressesScheduledForDeletion = unserialize(serialize($saoSalesOrderItemAddressesToDelete));

        foreach ($saoSalesOrderItemAddressesToDelete as $saoSalesOrderItemAddressRemoved) {
            $saoSalesOrderItemAddressRemoved->setCountry(null);
        }

        $this->collSaoSalesOrderItemAddresses = null;
        foreach ($saoSalesOrderItemAddresses as $saoSalesOrderItemAddress) {
            $this->addSaoSalesOrderItemAddress($saoSalesOrderItemAddress);
        }

        $this->collSaoSalesOrderItemAddresses = $saoSalesOrderItemAddresses;
        $this->collSaoSalesOrderItemAddressesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     * @throws PropelException
     */
    public function countSaoSalesOrderItemAddresses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSaoSalesOrderItemAddressesPartial && !$this->isNew();
        if (null === $this->collSaoSalesOrderItemAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSaoSalesOrderItemAddresses) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSaoSalesOrderItemAddresses());
            }
            $query = Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collSaoSalesOrderItemAddresses);
    }

    /**
     * Method called to associate a Sao_Zed_Sales_Persistence_SaoSalesOrderItem object to this object
     * through the Sao_Zed_Sales_Persistence_SaoSalesOrderItem foreign key attribute.
     *
     * @param    Sao_Zed_Sales_Persistence_SaoSalesOrderItem $l Sao_Zed_Sales_Persistence_SaoSalesOrderItem
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function addSaoSalesOrderItemAddress(Sao_Zed_Sales_Persistence_SaoSalesOrderItem $l)
    {
        if ($this->collSaoSalesOrderItemAddresses === null) {
            $this->initSaoSalesOrderItemAddresses();
            $this->collSaoSalesOrderItemAddressesPartial = true;
        }
        if (!in_array($l, $this->collSaoSalesOrderItemAddresses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSaoSalesOrderItemAddress($l);
        }

        return $this;
    }

    /**
     * @param	SaoSalesOrderItemAddress $saoSalesOrderItemAddress The saoSalesOrderItemAddress object to add.
     */
    protected function doAddSaoSalesOrderItemAddress($saoSalesOrderItemAddress)
    {
        $this->collSaoSalesOrderItemAddresses[]= $saoSalesOrderItemAddress;
        $saoSalesOrderItemAddress->setCountry($this);
    }

    /**
     * @param	SaoSalesOrderItemAddress $saoSalesOrderItemAddress The saoSalesOrderItemAddress object to remove.
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The current object (for fluent API support)
     */
    public function removeSaoSalesOrderItemAddress($saoSalesOrderItemAddress)
    {
        if ($this->getSaoSalesOrderItemAddresses()->contains($saoSalesOrderItemAddress)) {
            $this->collSaoSalesOrderItemAddresses->remove($this->collSaoSalesOrderItemAddresses->search($saoSalesOrderItemAddress));
            if (null === $this->saoSalesOrderItemAddressesScheduledForDeletion) {
                $this->saoSalesOrderItemAddressesScheduledForDeletion = clone $this->collSaoSalesOrderItemAddresses;
                $this->saoSalesOrderItemAddressesScheduledForDeletion->clear();
            }
            $this->saoSalesOrderItemAddressesScheduledForDeletion[]= $saoSalesOrderItemAddress;
            $saoSalesOrderItemAddress->setCountry(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscCountry is new, it will return
     * an empty collection; or if this PacMiscCountry has previously
     * been saved, it will retrieve related SaoSalesOrderItemAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscCountry.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrderItem[] List of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects
     */
    public function getSaoSalesOrderItemAddressesJoinRegion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('Region', $join_behavior);

        return $this->getSaoSalesOrderItemAddresses($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacMiscCountry is new, it will return
     * an empty collection; or if this PacMiscCountry has previously
     * been saved, it will retrieve related SaoSalesOrderItemAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacMiscCountry.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrderItem[] List of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects
     */
    public function getSaoSalesOrderItemAddressesJoinSalesOrderItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery::create(null, $criteria);
        $query->joinWith('SalesOrderItem', $join_behavior);

        return $this->getSaoSalesOrderItemAddresses($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_misc_country = null;
        $this->iso2_code = null;
        $this->iso3_code = null;
        $this->name = null;
        $this->postal_code_madatory = null;
        $this->postal_code_regex = null;
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
            if ($this->collCustomerAddresses) {
                foreach ($this->collCustomerAddresses as $o) {
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
            if ($this->collRegions) {
                foreach ($this->collRegions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesTaxes) {
                foreach ($this->collSalesTaxes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSaoSalesOrderItemAddresses) {
                foreach ($this->collSaoSalesOrderItemAddresses as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCustomerAddresses instanceof PropelCollection) {
            $this->collCustomerAddresses->clearIterator();
        }
        $this->collCustomerAddresses = null;
        if ($this->collSalesOrderAddresses instanceof PropelCollection) {
            $this->collSalesOrderAddresses->clearIterator();
        }
        $this->collSalesOrderAddresses = null;
        if ($this->collSalesOrderAddressHistories instanceof PropelCollection) {
            $this->collSalesOrderAddressHistories->clearIterator();
        }
        $this->collSalesOrderAddressHistories = null;
        if ($this->collRegions instanceof PropelCollection) {
            $this->collRegions->clearIterator();
        }
        $this->collRegions = null;
        if ($this->collSalesTaxes instanceof PropelCollection) {
            $this->collSalesTaxes->clearIterator();
        }
        $this->collSalesTaxes = null;
        if ($this->collSaoSalesOrderItemAddresses instanceof PropelCollection) {
            $this->collSaoSalesOrderItemAddresses->clearIterator();
        }
        $this->collSaoSalesOrderItemAddresses = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::DEFAULT_STRING_FORMAT);
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
