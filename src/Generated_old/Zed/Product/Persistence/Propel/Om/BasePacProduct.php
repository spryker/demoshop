<?php


/**
 * Base class that represents a row from the 'pac_product' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacProduct extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Product_Persistence_Propel_PacProductPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Product_Persistence_Propel_PacProductPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the product_id field.
     * @var        int
     */
    protected $product_id;

    /**
     * The value for the sku field.
     * @var        string
     */
    protected $sku;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the abstract_product_id field.
     * @var        int
     */
    protected $abstract_product_id;

    /**
     * @var        PacAbstractProduct
     */
    protected $aPacAbstractProduct;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects.
     */
    protected $collPacLocalizedProductAttributess;
    protected $collPacLocalizedProductAttributessPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects.
     */
    protected $collPacProductToBundlesRelatedByProductId;
    protected $collPacProductToBundlesRelatedByProductIdPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects.
     */
    protected $collBundleProducts;
    protected $collBundleProductsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory[] Collection to store aggregation of ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects.
     */
    protected $collPacProductCategories;
    protected $collPacProductCategoriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[] Collection to store aggregation of ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects.
     */
    protected $collPacSearchableProductss;
    protected $collPacSearchableProductssPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct[] Collection to store aggregation of ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects.
     */
    protected $collStockProducts;
    protected $collStockProductsPartial;

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
    protected $pacLocalizedProductAttributessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacProductToBundlesRelatedByProductIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bundleProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacProductCategoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacSearchableProductssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockProductsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
    }

    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacProduct object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [product_id] column value.
     *
     * @return int
     */
    public function getProductId()
    {

        return $this->product_id;
    }

    /**
     * Get the [sku] column value.
     *
     * @return string
     */
    public function getSku()
    {

        return $this->sku;
    }

    /**
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function getIsActive()
    {

        return $this->is_active;
    }

    /**
     * Get the [abstract_product_id] column value.
     *
     * @return int
     */
    public function getAbstractProductId()
    {

        return $this->abstract_product_id;
    }

    /**
     * Set the value of [product_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setProductId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->product_id !== $v) {
            $this->product_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID;
        }


        return $this;
    } // setProductId()

    /**
     * Set the value of [sku] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::SKU;
        }


        return $this;
    } // setSku()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setIsActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_active !== $v) {
            $this->is_active = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Set the value of [abstract_product_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setAbstractProductId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->abstract_product_id !== $v) {
            $this->abstract_product_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID;
        }

        if ($this->aPacAbstractProduct !== null && $this->aPacAbstractProduct->getAbstractProductId() !== $v) {
            $this->aPacAbstractProduct = null;
        }


        return $this;
    } // setAbstractProductId()

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
            if ($this->is_active !== true) {
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

            $this->product_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->sku = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->is_active = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->abstract_product_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Product_Persistence_Propel_PacProduct object", $e);
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

        if ($this->aPacAbstractProduct !== null && $this->abstract_product_id !== $this->aPacAbstractProduct->getAbstractProductId()) {
            $this->aPacAbstractProduct = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacAbstractProduct = null;
            $this->collPacLocalizedProductAttributess = null;

            $this->collPacProductToBundlesRelatedByProductId = null;

            $this->collBundleProducts = null;

            $this->collPacProductCategories = null;

            $this->collPacSearchableProductss = null;

            $this->collStockProducts = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Product_Persistence_Propel_PacProductQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::addInstanceToPool($this);
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

            if ($this->aPacAbstractProduct !== null) {
                if ($this->aPacAbstractProduct->isModified() || $this->aPacAbstractProduct->isNew()) {
                    $affectedRows += $this->aPacAbstractProduct->save($con);
                }
                $this->setPacAbstractProduct($this->aPacAbstractProduct);
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

            if ($this->pacLocalizedProductAttributessScheduledForDeletion !== null) {
                if (!$this->pacLocalizedProductAttributessScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create()
                        ->filterByPrimaryKeys($this->pacLocalizedProductAttributessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacLocalizedProductAttributessScheduledForDeletion = null;
                }
            }

            if ($this->collPacLocalizedProductAttributess !== null) {
                foreach ($this->collPacLocalizedProductAttributess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacProductToBundlesRelatedByProductIdScheduledForDeletion !== null) {
                if (!$this->pacProductToBundlesRelatedByProductIdScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery::create()
                        ->filterByPrimaryKeys($this->pacProductToBundlesRelatedByProductIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion = null;
                }
            }

            if ($this->collPacProductToBundlesRelatedByProductId !== null) {
                foreach ($this->collPacProductToBundlesRelatedByProductId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bundleProductsScheduledForDeletion !== null) {
                if (!$this->bundleProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery::create()
                        ->filterByPrimaryKeys($this->bundleProductsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bundleProductsScheduledForDeletion = null;
                }
            }

            if ($this->collBundleProducts !== null) {
                foreach ($this->collBundleProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacProductCategoriesScheduledForDeletion !== null) {
                if (!$this->pacProductCategoriesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery::create()
                        ->filterByPrimaryKeys($this->pacProductCategoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacProductCategoriesScheduledForDeletion = null;
                }
            }

            if ($this->collPacProductCategories !== null) {
                foreach ($this->collPacProductCategories as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacSearchableProductssScheduledForDeletion !== null) {
                if (!$this->pacSearchableProductssScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacSearchableProductssScheduledForDeletion as $pacSearchableProducts) {
                        // need to save related object because we set the relation to null
                        $pacSearchableProducts->save($con);
                    }
                    $this->pacSearchableProductssScheduledForDeletion = null;
                }
            }

            if ($this->collPacSearchableProductss !== null) {
                foreach ($this->collPacSearchableProductss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockProductsScheduledForDeletion !== null) {
                if (!$this->stockProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery::create()
                        ->filterByPrimaryKeys($this->stockProductsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->stockProductsScheduledForDeletion = null;
                }
            }

            if ($this->collStockProducts !== null) {
                foreach ($this->collStockProducts as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`product_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::SKU)) {
            $modifiedColumns[':p' . $index++]  = '`sku`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`abstract_product_id`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_product` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`product_id`':
                        $stmt->bindValue($identifier, $this->product_id, PDO::PARAM_INT);
                        break;
                    case '`sku`':
                        $stmt->bindValue($identifier, $this->sku, PDO::PARAM_STR);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case '`abstract_product_id`':
                        $stmt->bindValue($identifier, $this->abstract_product_id, PDO::PARAM_INT);
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
        if ($pk !== null) {
            $this->setProductId($pk);
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

            if ($this->aPacAbstractProduct !== null) {
                if (!$this->aPacAbstractProduct->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacAbstractProduct->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacLocalizedProductAttributess !== null) {
                    foreach ($this->collPacLocalizedProductAttributess as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacProductToBundlesRelatedByProductId !== null) {
                    foreach ($this->collPacProductToBundlesRelatedByProductId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBundleProducts !== null) {
                    foreach ($this->collBundleProducts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacProductCategories !== null) {
                    foreach ($this->collPacProductCategories as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacSearchableProductss !== null) {
                    foreach ($this->collPacSearchableProductss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStockProducts !== null) {
                    foreach ($this->collStockProducts as $referrerFK) {
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
        $pos = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getProductId();
                break;
            case 1:
                return $this->getSku();
                break;
            case 2:
                return $this->getIsActive();
                break;
            case 3:
                return $this->getAbstractProductId();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Product_Persistence_Propel_PacProduct'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Product_Persistence_Propel_PacProduct'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getProductId(),
            $keys[1] => $this->getSku(),
            $keys[2] => $this->getIsActive(),
            $keys[3] => $this->getAbstractProductId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPacAbstractProduct) {
                $result['PacAbstractProduct'] = $this->aPacAbstractProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacLocalizedProductAttributess) {
                $result['PacLocalizedProductAttributess'] = $this->collPacLocalizedProductAttributess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacProductToBundlesRelatedByProductId) {
                $result['PacProductToBundlesRelatedByProductId'] = $this->collPacProductToBundlesRelatedByProductId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBundleProducts) {
                $result['BundleProducts'] = $this->collBundleProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacProductCategories) {
                $result['PacProductCategories'] = $this->collPacProductCategories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacSearchableProductss) {
                $result['PacSearchableProductss'] = $this->collPacSearchableProductss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockProducts) {
                $result['StockProducts'] = $this->collStockProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setProductId($value);
                break;
            case 1:
                $this->setSku($value);
                break;
            case 2:
                $this->setIsActive($value);
                break;
            case 3:
                $this->setAbstractProductId($value);
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
        $keys = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setProductId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSku($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIsActive($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAbstractProductId($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $this->product_id);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::SKU)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::SKU, $this->sku);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::IS_ACTIVE)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID)) $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID, $this->abstract_product_id);

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
        $criteria = new Criteria(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $this->product_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getProductId();
    }

    /**
     * Generic method to set the primary key (product_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setProductId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getProductId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Product_Persistence_Propel_PacProduct (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSku($this->getSku());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setAbstractProductId($this->getAbstractProductId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacLocalizedProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacLocalizedProductAttributes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacProductToBundlesRelatedByProductId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacProductToBundleRelatedByProductId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBundleProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBundleProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacProductCategories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacProductCategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacSearchableProductss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacSearchableProducts($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockProduct($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setProductId(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct Clone of current object.
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Product_Persistence_Propel_PacProductPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct object.
     *
     * @param                  ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct $v
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacAbstractProduct(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct $v = null)
    {
        if ($v === null) {
            $this->setAbstractProductId(NULL);
        } else {
            $this->setAbstractProductId($v->getAbstractProductId());
        }

        $this->aPacAbstractProduct = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct object, it will not be re-added.
        if ($v !== null) {
            $v->addPacProduct($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct The associated ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct object.
     * @throws PropelException
     */
    public function getPacAbstractProduct(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacAbstractProduct === null && ($this->abstract_product_id !== null) && $doQuery) {
            $this->aPacAbstractProduct = ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery::create()->findPk($this->abstract_product_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacAbstractProduct->addPacProducts($this);
             */
        }

        return $this->aPacAbstractProduct;
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
        if ('PacLocalizedProductAttributes' == $relationName) {
            $this->initPacLocalizedProductAttributess();
        }
        if ('PacProductToBundleRelatedByProductId' == $relationName) {
            $this->initPacProductToBundlesRelatedByProductId();
        }
        if ('BundleProduct' == $relationName) {
            $this->initBundleProducts();
        }
        if ('PacProductCategory' == $relationName) {
            $this->initPacProductCategories();
        }
        if ('PacSearchableProducts' == $relationName) {
            $this->initPacSearchableProductss();
        }
        if ('StockProduct' == $relationName) {
            $this->initStockProducts();
        }
    }

    /**
     * Clears out the collPacLocalizedProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     * @see        addPacLocalizedProductAttributess()
     */
    public function clearPacLocalizedProductAttributess()
    {
        $this->collPacLocalizedProductAttributess = null; // important to set this to null since that means it is uninitialized
        $this->collPacLocalizedProductAttributessPartial = null;

        return $this;
    }

    /**
     * reset is the collPacLocalizedProductAttributess collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacLocalizedProductAttributess($v = true)
    {
        $this->collPacLocalizedProductAttributessPartial = $v;
    }

    /**
     * Initializes the collPacLocalizedProductAttributess collection.
     *
     * By default this just sets the collPacLocalizedProductAttributess collection to an empty array (like clearcollPacLocalizedProductAttributess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacLocalizedProductAttributess($overrideExisting = true)
    {
        if (null !== $this->collPacLocalizedProductAttributess && !$overrideExisting) {
            return;
        }
        $this->collPacLocalizedProductAttributess = new PropelObjectCollection();
        $this->collPacLocalizedProductAttributess->setModel('ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects
     * @throws PropelException
     */
    public function getPacLocalizedProductAttributess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collPacLocalizedProductAttributess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacLocalizedProductAttributess) {
                // return empty collection
                $this->initPacLocalizedProductAttributess();
            } else {
                $collPacLocalizedProductAttributess = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria)
                    ->filterByPacProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacLocalizedProductAttributessPartial && count($collPacLocalizedProductAttributess)) {
                      $this->initPacLocalizedProductAttributess(false);

                      foreach ($collPacLocalizedProductAttributess as $obj) {
                        if (false == $this->collPacLocalizedProductAttributess->contains($obj)) {
                          $this->collPacLocalizedProductAttributess->append($obj);
                        }
                      }

                      $this->collPacLocalizedProductAttributessPartial = true;
                    }

                    $collPacLocalizedProductAttributess->getInternalIterator()->rewind();

                    return $collPacLocalizedProductAttributess;
                }

                if ($partial && $this->collPacLocalizedProductAttributess) {
                    foreach ($this->collPacLocalizedProductAttributess as $obj) {
                        if ($obj->isNew()) {
                            $collPacLocalizedProductAttributess[] = $obj;
                        }
                    }
                }

                $this->collPacLocalizedProductAttributess = $collPacLocalizedProductAttributess;
                $this->collPacLocalizedProductAttributessPartial = false;
            }
        }

        return $this->collPacLocalizedProductAttributess;
    }

    /**
     * Sets a collection of PacLocalizedProductAttributes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacLocalizedProductAttributess A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setPacLocalizedProductAttributess(PropelCollection $pacLocalizedProductAttributess, PropelPDO $con = null)
    {
        $pacLocalizedProductAttributessToDelete = $this->getPacLocalizedProductAttributess(new Criteria(), $con)->diff($pacLocalizedProductAttributess);


        $this->pacLocalizedProductAttributessScheduledForDeletion = $pacLocalizedProductAttributessToDelete;

        foreach ($pacLocalizedProductAttributessToDelete as $pacLocalizedProductAttributesRemoved) {
            $pacLocalizedProductAttributesRemoved->setPacProduct(null);
        }

        $this->collPacLocalizedProductAttributess = null;
        foreach ($pacLocalizedProductAttributess as $pacLocalizedProductAttributes) {
            $this->addPacLocalizedProductAttributes($pacLocalizedProductAttributes);
        }

        $this->collPacLocalizedProductAttributess = $pacLocalizedProductAttributess;
        $this->collPacLocalizedProductAttributessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects.
     * @throws PropelException
     */
    public function countPacLocalizedProductAttributess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collPacLocalizedProductAttributess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacLocalizedProductAttributess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacLocalizedProductAttributess());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacProduct($this)
                ->count($con);
        }

        return count($this->collPacLocalizedProductAttributess);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes $l ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function addPacLocalizedProductAttributes(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes $l)
    {
        if ($this->collPacLocalizedProductAttributess === null) {
            $this->initPacLocalizedProductAttributess();
            $this->collPacLocalizedProductAttributessPartial = true;
        }

        if (!in_array($l, $this->collPacLocalizedProductAttributess->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacLocalizedProductAttributes($l);

            if ($this->pacLocalizedProductAttributessScheduledForDeletion and $this->pacLocalizedProductAttributessScheduledForDeletion->contains($l)) {
                $this->pacLocalizedProductAttributessScheduledForDeletion->remove($this->pacLocalizedProductAttributessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacLocalizedProductAttributes $pacLocalizedProductAttributes The pacLocalizedProductAttributes object to add.
     */
    protected function doAddPacLocalizedProductAttributes($pacLocalizedProductAttributes)
    {
        $this->collPacLocalizedProductAttributess[]= $pacLocalizedProductAttributes;
        $pacLocalizedProductAttributes->setPacProduct($this);
    }

    /**
     * @param	PacLocalizedProductAttributes $pacLocalizedProductAttributes The pacLocalizedProductAttributes object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function removePacLocalizedProductAttributes($pacLocalizedProductAttributes)
    {
        if ($this->getPacLocalizedProductAttributess()->contains($pacLocalizedProductAttributes)) {
            $this->collPacLocalizedProductAttributess->remove($this->collPacLocalizedProductAttributess->search($pacLocalizedProductAttributes));
            if (null === $this->pacLocalizedProductAttributessScheduledForDeletion) {
                $this->pacLocalizedProductAttributessScheduledForDeletion = clone $this->collPacLocalizedProductAttributess;
                $this->pacLocalizedProductAttributessScheduledForDeletion->clear();
            }
            $this->pacLocalizedProductAttributessScheduledForDeletion[]= clone $pacLocalizedProductAttributes;
            $pacLocalizedProductAttributes->setPacProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacProduct is new, it will return
     * an empty collection; or if this PacProduct has previously
     * been saved, it will retrieve related PacLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects
     */
    public function getPacLocalizedProductAttributessJoinPacTax($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria);
        $query->joinWith('PacTax', $join_behavior);

        return $this->getPacLocalizedProductAttributess($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacProduct is new, it will return
     * an empty collection; or if this PacProduct has previously
     * been saved, it will retrieve related PacLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects
     */
    public function getPacLocalizedProductAttributessJoinLocale($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria);
        $query->joinWith('Locale', $join_behavior);

        return $this->getPacLocalizedProductAttributess($query, $con);
    }

    /**
     * Clears out the collPacProductToBundlesRelatedByProductId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     * @see        addPacProductToBundlesRelatedByProductId()
     */
    public function clearPacProductToBundlesRelatedByProductId()
    {
        $this->collPacProductToBundlesRelatedByProductId = null; // important to set this to null since that means it is uninitialized
        $this->collPacProductToBundlesRelatedByProductIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPacProductToBundlesRelatedByProductId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacProductToBundlesRelatedByProductId($v = true)
    {
        $this->collPacProductToBundlesRelatedByProductIdPartial = $v;
    }

    /**
     * Initializes the collPacProductToBundlesRelatedByProductId collection.
     *
     * By default this just sets the collPacProductToBundlesRelatedByProductId collection to an empty array (like clearcollPacProductToBundlesRelatedByProductId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacProductToBundlesRelatedByProductId($overrideExisting = true)
    {
        if (null !== $this->collPacProductToBundlesRelatedByProductId && !$overrideExisting) {
            return;
        }
        $this->collPacProductToBundlesRelatedByProductId = new PropelObjectCollection();
        $this->collPacProductToBundlesRelatedByProductId->setModel('ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle[] List of ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects
     * @throws PropelException
     */
    public function getPacProductToBundlesRelatedByProductId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacProductToBundlesRelatedByProductIdPartial && !$this->isNew();
        if (null === $this->collPacProductToBundlesRelatedByProductId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacProductToBundlesRelatedByProductId) {
                // return empty collection
                $this->initPacProductToBundlesRelatedByProductId();
            } else {
                $collPacProductToBundlesRelatedByProductId = ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery::create(null, $criteria)
                    ->filterByPacProductRelatedByProductId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacProductToBundlesRelatedByProductIdPartial && count($collPacProductToBundlesRelatedByProductId)) {
                      $this->initPacProductToBundlesRelatedByProductId(false);

                      foreach ($collPacProductToBundlesRelatedByProductId as $obj) {
                        if (false == $this->collPacProductToBundlesRelatedByProductId->contains($obj)) {
                          $this->collPacProductToBundlesRelatedByProductId->append($obj);
                        }
                      }

                      $this->collPacProductToBundlesRelatedByProductIdPartial = true;
                    }

                    $collPacProductToBundlesRelatedByProductId->getInternalIterator()->rewind();

                    return $collPacProductToBundlesRelatedByProductId;
                }

                if ($partial && $this->collPacProductToBundlesRelatedByProductId) {
                    foreach ($this->collPacProductToBundlesRelatedByProductId as $obj) {
                        if ($obj->isNew()) {
                            $collPacProductToBundlesRelatedByProductId[] = $obj;
                        }
                    }
                }

                $this->collPacProductToBundlesRelatedByProductId = $collPacProductToBundlesRelatedByProductId;
                $this->collPacProductToBundlesRelatedByProductIdPartial = false;
            }
        }

        return $this->collPacProductToBundlesRelatedByProductId;
    }

    /**
     * Sets a collection of PacProductToBundleRelatedByProductId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacProductToBundlesRelatedByProductId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setPacProductToBundlesRelatedByProductId(PropelCollection $pacProductToBundlesRelatedByProductId, PropelPDO $con = null)
    {
        $pacProductToBundlesRelatedByProductIdToDelete = $this->getPacProductToBundlesRelatedByProductId(new Criteria(), $con)->diff($pacProductToBundlesRelatedByProductId);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion = clone $pacProductToBundlesRelatedByProductIdToDelete;

        foreach ($pacProductToBundlesRelatedByProductIdToDelete as $pacProductToBundleRelatedByProductIdRemoved) {
            $pacProductToBundleRelatedByProductIdRemoved->setPacProductRelatedByProductId(null);
        }

        $this->collPacProductToBundlesRelatedByProductId = null;
        foreach ($pacProductToBundlesRelatedByProductId as $pacProductToBundleRelatedByProductId) {
            $this->addPacProductToBundleRelatedByProductId($pacProductToBundleRelatedByProductId);
        }

        $this->collPacProductToBundlesRelatedByProductId = $pacProductToBundlesRelatedByProductId;
        $this->collPacProductToBundlesRelatedByProductIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects.
     * @throws PropelException
     */
    public function countPacProductToBundlesRelatedByProductId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacProductToBundlesRelatedByProductIdPartial && !$this->isNew();
        if (null === $this->collPacProductToBundlesRelatedByProductId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacProductToBundlesRelatedByProductId) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacProductToBundlesRelatedByProductId());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacProductRelatedByProductId($this)
                ->count($con);
        }

        return count($this->collPacProductToBundlesRelatedByProductId);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle $l ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function addPacProductToBundleRelatedByProductId(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle $l)
    {
        if ($this->collPacProductToBundlesRelatedByProductId === null) {
            $this->initPacProductToBundlesRelatedByProductId();
            $this->collPacProductToBundlesRelatedByProductIdPartial = true;
        }

        if (!in_array($l, $this->collPacProductToBundlesRelatedByProductId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacProductToBundleRelatedByProductId($l);

            if ($this->pacProductToBundlesRelatedByProductIdScheduledForDeletion and $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion->contains($l)) {
                $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion->remove($this->pacProductToBundlesRelatedByProductIdScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacProductToBundleRelatedByProductId $pacProductToBundleRelatedByProductId The pacProductToBundleRelatedByProductId object to add.
     */
    protected function doAddPacProductToBundleRelatedByProductId($pacProductToBundleRelatedByProductId)
    {
        $this->collPacProductToBundlesRelatedByProductId[]= $pacProductToBundleRelatedByProductId;
        $pacProductToBundleRelatedByProductId->setPacProductRelatedByProductId($this);
    }

    /**
     * @param	PacProductToBundleRelatedByProductId $pacProductToBundleRelatedByProductId The pacProductToBundleRelatedByProductId object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function removePacProductToBundleRelatedByProductId($pacProductToBundleRelatedByProductId)
    {
        if ($this->getPacProductToBundlesRelatedByProductId()->contains($pacProductToBundleRelatedByProductId)) {
            $this->collPacProductToBundlesRelatedByProductId->remove($this->collPacProductToBundlesRelatedByProductId->search($pacProductToBundleRelatedByProductId));
            if (null === $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion) {
                $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion = clone $this->collPacProductToBundlesRelatedByProductId;
                $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion->clear();
            }
            $this->pacProductToBundlesRelatedByProductIdScheduledForDeletion[]= clone $pacProductToBundleRelatedByProductId;
            $pacProductToBundleRelatedByProductId->setPacProductRelatedByProductId(null);
        }

        return $this;
    }

    /**
     * Clears out the collBundleProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     * @see        addBundleProducts()
     */
    public function clearBundleProducts()
    {
        $this->collBundleProducts = null; // important to set this to null since that means it is uninitialized
        $this->collBundleProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collBundleProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialBundleProducts($v = true)
    {
        $this->collBundleProductsPartial = $v;
    }

    /**
     * Initializes the collBundleProducts collection.
     *
     * By default this just sets the collBundleProducts collection to an empty array (like clearcollBundleProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBundleProducts($overrideExisting = true)
    {
        if (null !== $this->collBundleProducts && !$overrideExisting) {
            return;
        }
        $this->collBundleProducts = new PropelObjectCollection();
        $this->collBundleProducts->setModel('ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle[] List of ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects
     * @throws PropelException
     */
    public function getBundleProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBundleProductsPartial && !$this->isNew();
        if (null === $this->collBundleProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBundleProducts) {
                // return empty collection
                $this->initBundleProducts();
            } else {
                $collBundleProducts = ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery::create(null, $criteria)
                    ->filterByBundleProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBundleProductsPartial && count($collBundleProducts)) {
                      $this->initBundleProducts(false);

                      foreach ($collBundleProducts as $obj) {
                        if (false == $this->collBundleProducts->contains($obj)) {
                          $this->collBundleProducts->append($obj);
                        }
                      }

                      $this->collBundleProductsPartial = true;
                    }

                    $collBundleProducts->getInternalIterator()->rewind();

                    return $collBundleProducts;
                }

                if ($partial && $this->collBundleProducts) {
                    foreach ($this->collBundleProducts as $obj) {
                        if ($obj->isNew()) {
                            $collBundleProducts[] = $obj;
                        }
                    }
                }

                $this->collBundleProducts = $collBundleProducts;
                $this->collBundleProductsPartial = false;
            }
        }

        return $this->collBundleProducts;
    }

    /**
     * Sets a collection of BundleProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bundleProducts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setBundleProducts(PropelCollection $bundleProducts, PropelPDO $con = null)
    {
        $bundleProductsToDelete = $this->getBundleProducts(new Criteria(), $con)->diff($bundleProducts);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->bundleProductsScheduledForDeletion = clone $bundleProductsToDelete;

        foreach ($bundleProductsToDelete as $bundleProductRemoved) {
            $bundleProductRemoved->setBundleProduct(null);
        }

        $this->collBundleProducts = null;
        foreach ($bundleProducts as $bundleProduct) {
            $this->addBundleProduct($bundleProduct);
        }

        $this->collBundleProducts = $bundleProducts;
        $this->collBundleProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects.
     * @throws PropelException
     */
    public function countBundleProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBundleProductsPartial && !$this->isNew();
        if (null === $this->collBundleProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBundleProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBundleProducts());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBundleProduct($this)
                ->count($con);
        }

        return count($this->collBundleProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle $l ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function addBundleProduct(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle $l)
    {
        if ($this->collBundleProducts === null) {
            $this->initBundleProducts();
            $this->collBundleProductsPartial = true;
        }

        if (!in_array($l, $this->collBundleProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBundleProduct($l);

            if ($this->bundleProductsScheduledForDeletion and $this->bundleProductsScheduledForDeletion->contains($l)) {
                $this->bundleProductsScheduledForDeletion->remove($this->bundleProductsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	BundleProduct $bundleProduct The bundleProduct object to add.
     */
    protected function doAddBundleProduct($bundleProduct)
    {
        $this->collBundleProducts[]= $bundleProduct;
        $bundleProduct->setBundleProduct($this);
    }

    /**
     * @param	BundleProduct $bundleProduct The bundleProduct object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function removeBundleProduct($bundleProduct)
    {
        if ($this->getBundleProducts()->contains($bundleProduct)) {
            $this->collBundleProducts->remove($this->collBundleProducts->search($bundleProduct));
            if (null === $this->bundleProductsScheduledForDeletion) {
                $this->bundleProductsScheduledForDeletion = clone $this->collBundleProducts;
                $this->bundleProductsScheduledForDeletion->clear();
            }
            $this->bundleProductsScheduledForDeletion[]= clone $bundleProduct;
            $bundleProduct->setBundleProduct(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacProductCategories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     * @see        addPacProductCategories()
     */
    public function clearPacProductCategories()
    {
        $this->collPacProductCategories = null; // important to set this to null since that means it is uninitialized
        $this->collPacProductCategoriesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacProductCategories collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacProductCategories($v = true)
    {
        $this->collPacProductCategoriesPartial = $v;
    }

    /**
     * Initializes the collPacProductCategories collection.
     *
     * By default this just sets the collPacProductCategories collection to an empty array (like clearcollPacProductCategories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacProductCategories($overrideExisting = true)
    {
        if (null !== $this->collPacProductCategories && !$overrideExisting) {
            return;
        }
        $this->collPacProductCategories = new PropelObjectCollection();
        $this->collPacProductCategories->setModel('ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory');
    }

    /**
     * Gets an array of ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory[] List of ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects
     * @throws PropelException
     */
    public function getPacProductCategories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacProductCategoriesPartial && !$this->isNew();
        if (null === $this->collPacProductCategories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacProductCategories) {
                // return empty collection
                $this->initPacProductCategories();
            } else {
                $collPacProductCategories = ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery::create(null, $criteria)
                    ->filterByPacProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacProductCategoriesPartial && count($collPacProductCategories)) {
                      $this->initPacProductCategories(false);

                      foreach ($collPacProductCategories as $obj) {
                        if (false == $this->collPacProductCategories->contains($obj)) {
                          $this->collPacProductCategories->append($obj);
                        }
                      }

                      $this->collPacProductCategoriesPartial = true;
                    }

                    $collPacProductCategories->getInternalIterator()->rewind();

                    return $collPacProductCategories;
                }

                if ($partial && $this->collPacProductCategories) {
                    foreach ($this->collPacProductCategories as $obj) {
                        if ($obj->isNew()) {
                            $collPacProductCategories[] = $obj;
                        }
                    }
                }

                $this->collPacProductCategories = $collPacProductCategories;
                $this->collPacProductCategoriesPartial = false;
            }
        }

        return $this->collPacProductCategories;
    }

    /**
     * Sets a collection of PacProductCategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacProductCategories A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setPacProductCategories(PropelCollection $pacProductCategories, PropelPDO $con = null)
    {
        $pacProductCategoriesToDelete = $this->getPacProductCategories(new Criteria(), $con)->diff($pacProductCategories);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->pacProductCategoriesScheduledForDeletion = clone $pacProductCategoriesToDelete;

        foreach ($pacProductCategoriesToDelete as $pacProductCategoryRemoved) {
            $pacProductCategoryRemoved->setPacProduct(null);
        }

        $this->collPacProductCategories = null;
        foreach ($pacProductCategories as $pacProductCategory) {
            $this->addPacProductCategory($pacProductCategory);
        }

        $this->collPacProductCategories = $pacProductCategories;
        $this->collPacProductCategoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects.
     * @throws PropelException
     */
    public function countPacProductCategories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacProductCategoriesPartial && !$this->isNew();
        if (null === $this->collPacProductCategories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacProductCategories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacProductCategories());
            }
            $query = ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacProduct($this)
                ->count($con);
        }

        return count($this->collPacProductCategories);
    }

    /**
     * Method called to associate a ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory object to this object
     * through the ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory foreign key attribute.
     *
     * @param    ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory $l ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function addPacProductCategory(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory $l)
    {
        if ($this->collPacProductCategories === null) {
            $this->initPacProductCategories();
            $this->collPacProductCategoriesPartial = true;
        }

        if (!in_array($l, $this->collPacProductCategories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacProductCategory($l);

            if ($this->pacProductCategoriesScheduledForDeletion and $this->pacProductCategoriesScheduledForDeletion->contains($l)) {
                $this->pacProductCategoriesScheduledForDeletion->remove($this->pacProductCategoriesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacProductCategory $pacProductCategory The pacProductCategory object to add.
     */
    protected function doAddPacProductCategory($pacProductCategory)
    {
        $this->collPacProductCategories[]= $pacProductCategory;
        $pacProductCategory->setPacProduct($this);
    }

    /**
     * @param	PacProductCategory $pacProductCategory The pacProductCategory object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function removePacProductCategory($pacProductCategory)
    {
        if ($this->getPacProductCategories()->contains($pacProductCategory)) {
            $this->collPacProductCategories->remove($this->collPacProductCategories->search($pacProductCategory));
            if (null === $this->pacProductCategoriesScheduledForDeletion) {
                $this->pacProductCategoriesScheduledForDeletion = clone $this->collPacProductCategories;
                $this->pacProductCategoriesScheduledForDeletion->clear();
            }
            $this->pacProductCategoriesScheduledForDeletion[]= clone $pacProductCategory;
            $pacProductCategory->setPacProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacProduct is new, it will return
     * an empty collection; or if this PacProduct has previously
     * been saved, it will retrieve related PacProductCategories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory[] List of ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects
     */
    public function getPacProductCategoriesJoinPacCategoryNode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery::create(null, $criteria);
        $query->joinWith('PacCategoryNode', $join_behavior);

        return $this->getPacProductCategories($query, $con);
    }

    /**
     * Clears out the collPacSearchableProductss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     * @see        addPacSearchableProductss()
     */
    public function clearPacSearchableProductss()
    {
        $this->collPacSearchableProductss = null; // important to set this to null since that means it is uninitialized
        $this->collPacSearchableProductssPartial = null;

        return $this;
    }

    /**
     * reset is the collPacSearchableProductss collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacSearchableProductss($v = true)
    {
        $this->collPacSearchableProductssPartial = $v;
    }

    /**
     * Initializes the collPacSearchableProductss collection.
     *
     * By default this just sets the collPacSearchableProductss collection to an empty array (like clearcollPacSearchableProductss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacSearchableProductss($overrideExisting = true)
    {
        if (null !== $this->collPacSearchableProductss && !$overrideExisting) {
            return;
        }
        $this->collPacSearchableProductss = new PropelObjectCollection();
        $this->collPacSearchableProductss->setModel('ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts');
    }

    /**
     * Gets an array of ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[] List of ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects
     * @throws PropelException
     */
    public function getPacSearchableProductss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacSearchableProductssPartial && !$this->isNew();
        if (null === $this->collPacSearchableProductss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacSearchableProductss) {
                // return empty collection
                $this->initPacSearchableProductss();
            } else {
                $collPacSearchableProductss = ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery::create(null, $criteria)
                    ->filterByPacProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacSearchableProductssPartial && count($collPacSearchableProductss)) {
                      $this->initPacSearchableProductss(false);

                      foreach ($collPacSearchableProductss as $obj) {
                        if (false == $this->collPacSearchableProductss->contains($obj)) {
                          $this->collPacSearchableProductss->append($obj);
                        }
                      }

                      $this->collPacSearchableProductssPartial = true;
                    }

                    $collPacSearchableProductss->getInternalIterator()->rewind();

                    return $collPacSearchableProductss;
                }

                if ($partial && $this->collPacSearchableProductss) {
                    foreach ($this->collPacSearchableProductss as $obj) {
                        if ($obj->isNew()) {
                            $collPacSearchableProductss[] = $obj;
                        }
                    }
                }

                $this->collPacSearchableProductss = $collPacSearchableProductss;
                $this->collPacSearchableProductssPartial = false;
            }
        }

        return $this->collPacSearchableProductss;
    }

    /**
     * Sets a collection of PacSearchableProducts objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacSearchableProductss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setPacSearchableProductss(PropelCollection $pacSearchableProductss, PropelPDO $con = null)
    {
        $pacSearchableProductssToDelete = $this->getPacSearchableProductss(new Criteria(), $con)->diff($pacSearchableProductss);


        $this->pacSearchableProductssScheduledForDeletion = $pacSearchableProductssToDelete;

        foreach ($pacSearchableProductssToDelete as $pacSearchableProductsRemoved) {
            $pacSearchableProductsRemoved->setPacProduct(null);
        }

        $this->collPacSearchableProductss = null;
        foreach ($pacSearchableProductss as $pacSearchableProducts) {
            $this->addPacSearchableProducts($pacSearchableProducts);
        }

        $this->collPacSearchableProductss = $pacSearchableProductss;
        $this->collPacSearchableProductssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects.
     * @throws PropelException
     */
    public function countPacSearchableProductss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacSearchableProductssPartial && !$this->isNew();
        if (null === $this->collPacSearchableProductss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacSearchableProductss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacSearchableProductss());
            }
            $query = ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacProduct($this)
                ->count($con);
        }

        return count($this->collPacSearchableProductss);
    }

    /**
     * Method called to associate a ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts object to this object
     * through the ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts foreign key attribute.
     *
     * @param    ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts $l ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function addPacSearchableProducts(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts $l)
    {
        if ($this->collPacSearchableProductss === null) {
            $this->initPacSearchableProductss();
            $this->collPacSearchableProductssPartial = true;
        }

        if (!in_array($l, $this->collPacSearchableProductss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacSearchableProducts($l);

            if ($this->pacSearchableProductssScheduledForDeletion and $this->pacSearchableProductssScheduledForDeletion->contains($l)) {
                $this->pacSearchableProductssScheduledForDeletion->remove($this->pacSearchableProductssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacSearchableProducts $pacSearchableProducts The pacSearchableProducts object to add.
     */
    protected function doAddPacSearchableProducts($pacSearchableProducts)
    {
        $this->collPacSearchableProductss[]= $pacSearchableProducts;
        $pacSearchableProducts->setPacProduct($this);
    }

    /**
     * @param	PacSearchableProducts $pacSearchableProducts The pacSearchableProducts object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function removePacSearchableProducts($pacSearchableProducts)
    {
        if ($this->getPacSearchableProductss()->contains($pacSearchableProducts)) {
            $this->collPacSearchableProductss->remove($this->collPacSearchableProductss->search($pacSearchableProducts));
            if (null === $this->pacSearchableProductssScheduledForDeletion) {
                $this->pacSearchableProductssScheduledForDeletion = clone $this->collPacSearchableProductss;
                $this->pacSearchableProductssScheduledForDeletion->clear();
            }
            $this->pacSearchableProductssScheduledForDeletion[]= $pacSearchableProducts;
            $pacSearchableProducts->setPacProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacProduct is new, it will return
     * an empty collection; or if this PacProduct has previously
     * been saved, it will retrieve related PacSearchableProductss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[] List of ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects
     */
    public function getPacSearchableProductssJoinPacLocale($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery::create(null, $criteria);
        $query->joinWith('PacLocale', $join_behavior);

        return $this->getPacSearchableProductss($query, $con);
    }

    /**
     * Clears out the collStockProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     * @see        addStockProducts()
     */
    public function clearStockProducts()
    {
        $this->collStockProducts = null; // important to set this to null since that means it is uninitialized
        $this->collStockProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collStockProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialStockProducts($v = true)
    {
        $this->collStockProductsPartial = $v;
    }

    /**
     * Initializes the collStockProducts collection.
     *
     * By default this just sets the collStockProducts collection to an empty array (like clearcollStockProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockProducts($overrideExisting = true)
    {
        if (null !== $this->collStockProducts && !$overrideExisting) {
            return;
        }
        $this->collStockProducts = new PropelObjectCollection();
        $this->collStockProducts->setModel('ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Product_Persistence_Propel_PacProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct[] List of ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects
     * @throws PropelException
     */
    public function getStockProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStockProductsPartial && !$this->isNew();
        if (null === $this->collStockProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockProducts) {
                // return empty collection
                $this->initStockProducts();
            } else {
                $collStockProducts = ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery::create(null, $criteria)
                    ->filterByPacProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockProductsPartial && count($collStockProducts)) {
                      $this->initStockProducts(false);

                      foreach ($collStockProducts as $obj) {
                        if (false == $this->collStockProducts->contains($obj)) {
                          $this->collStockProducts->append($obj);
                        }
                      }

                      $this->collStockProductsPartial = true;
                    }

                    $collStockProducts->getInternalIterator()->rewind();

                    return $collStockProducts;
                }

                if ($partial && $this->collStockProducts) {
                    foreach ($this->collStockProducts as $obj) {
                        if ($obj->isNew()) {
                            $collStockProducts[] = $obj;
                        }
                    }
                }

                $this->collStockProducts = $collStockProducts;
                $this->collStockProductsPartial = false;
            }
        }

        return $this->collStockProducts;
    }

    /**
     * Sets a collection of StockProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $stockProducts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function setStockProducts(PropelCollection $stockProducts, PropelPDO $con = null)
    {
        $stockProductsToDelete = $this->getStockProducts(new Criteria(), $con)->diff($stockProducts);


        $this->stockProductsScheduledForDeletion = $stockProductsToDelete;

        foreach ($stockProductsToDelete as $stockProductRemoved) {
            $stockProductRemoved->setPacProduct(null);
        }

        $this->collStockProducts = null;
        foreach ($stockProducts as $stockProduct) {
            $this->addStockProduct($stockProduct);
        }

        $this->collStockProducts = $stockProducts;
        $this->collStockProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects.
     * @throws PropelException
     */
    public function countStockProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockProductsPartial && !$this->isNew();
        if (null === $this->collStockProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getStockProducts());
            }
            $query = ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacProduct($this)
                ->count($con);
        }

        return count($this->collStockProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct object to this object
     * through the ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct $l ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function addStockProduct(ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct $l)
    {
        if ($this->collStockProducts === null) {
            $this->initStockProducts();
            $this->collStockProductsPartial = true;
        }

        if (!in_array($l, $this->collStockProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockProduct($l);

            if ($this->stockProductsScheduledForDeletion and $this->stockProductsScheduledForDeletion->contains($l)) {
                $this->stockProductsScheduledForDeletion->remove($this->stockProductsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	StockProduct $stockProduct The stockProduct object to add.
     */
    protected function doAddStockProduct($stockProduct)
    {
        $this->collStockProducts[]= $stockProduct;
        $stockProduct->setPacProduct($this);
    }

    /**
     * @param	StockProduct $stockProduct The stockProduct object to remove.
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct The current object (for fluent API support)
     */
    public function removeStockProduct($stockProduct)
    {
        if ($this->getStockProducts()->contains($stockProduct)) {
            $this->collStockProducts->remove($this->collStockProducts->search($stockProduct));
            if (null === $this->stockProductsScheduledForDeletion) {
                $this->stockProductsScheduledForDeletion = clone $this->collStockProducts;
                $this->stockProductsScheduledForDeletion->clear();
            }
            $this->stockProductsScheduledForDeletion[]= clone $stockProduct;
            $stockProduct->setPacProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacProduct is new, it will return
     * an empty collection; or if this PacProduct has previously
     * been saved, it will retrieve related StockProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct[] List of ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects
     */
    public function getStockProductsJoinStock($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery::create(null, $criteria);
        $query->joinWith('Stock', $join_behavior);

        return $this->getStockProducts($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->product_id = null;
        $this->sku = null;
        $this->is_active = null;
        $this->abstract_product_id = null;
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
            if ($this->collPacLocalizedProductAttributess) {
                foreach ($this->collPacLocalizedProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacProductToBundlesRelatedByProductId) {
                foreach ($this->collPacProductToBundlesRelatedByProductId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBundleProducts) {
                foreach ($this->collBundleProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacProductCategories) {
                foreach ($this->collPacProductCategories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacSearchableProductss) {
                foreach ($this->collPacSearchableProductss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockProducts) {
                foreach ($this->collStockProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPacAbstractProduct instanceof Persistent) {
              $this->aPacAbstractProduct->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacLocalizedProductAttributess instanceof PropelCollection) {
            $this->collPacLocalizedProductAttributess->clearIterator();
        }
        $this->collPacLocalizedProductAttributess = null;
        if ($this->collPacProductToBundlesRelatedByProductId instanceof PropelCollection) {
            $this->collPacProductToBundlesRelatedByProductId->clearIterator();
        }
        $this->collPacProductToBundlesRelatedByProductId = null;
        if ($this->collBundleProducts instanceof PropelCollection) {
            $this->collBundleProducts->clearIterator();
        }
        $this->collBundleProducts = null;
        if ($this->collPacProductCategories instanceof PropelCollection) {
            $this->collPacProductCategories->clearIterator();
        }
        $this->collPacProductCategories = null;
        if ($this->collPacSearchableProductss instanceof PropelCollection) {
            $this->collPacSearchableProductss->clearIterator();
        }
        $this->collPacSearchableProductss = null;
        if ($this->collStockProducts instanceof PropelCollection) {
            $this->collStockProducts->clearIterator();
        }
        $this->collStockProducts = null;
        $this->aPacAbstractProduct = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::DEFAULT_STRING_FORMAT);
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
