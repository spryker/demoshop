<?php


/**
 * Base class that represents a row from the 'pac_catalog_product_bundle' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogProductBundle extends ProjectA_Zed_Catalog_Component_Model_SpecificProduct implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_product field.
     * @var        int
     */
    protected $id_catalog_product;

    /**
     * @var        PacCatalogProduct
     */
    protected $aProduct;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects.
     */
    protected $collBundleProducts;
    protected $collBundleProductsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProduct[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogProduct objects.
     */
    protected $collBundleProductProducts;

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
    protected $bundleProductProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bundleProductsScheduledForDeletion = null;

    /**
     * Get the [id_catalog_product] column value.
     *
     * @return int
     */
    public function getIdCatalogProduct()
    {
        return $this->id_catalog_product;
    }

    /**
     * Set the value of [id_catalog_product] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     */
    public function setIdCatalogProduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_product !== $v) {
            $this->id_catalog_product = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT;
        }

        if ($this->aProduct !== null && $this->aProduct->getIdCatalogProduct() !== $v) {
            $this->aProduct = null;
        }


        return $this;
    } // setIdCatalogProduct()

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

            $this->id_catalog_product = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 1; // 1 = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle object", $e);
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

        if ($this->aProduct !== null && $this->id_catalog_product !== $this->aProduct->getIdCatalogProduct()) {
            $this->aProduct = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProduct = null;
            $this->collBundleProducts = null;

            $this->collBundleProductProducts = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::addInstanceToPool($this);
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

            if ($this->aProduct !== null) {
                if ($this->aProduct->isModified() || $this->aProduct->isNew()) {
                    $affectedRows += $this->aProduct->save($con);
                }
                $this->setProduct($this->aProduct);
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

            if ($this->bundleProductProductsScheduledForDeletion !== null) {
                if (!$this->bundleProductProductsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->bundleProductProductsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    BundleProductQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->bundleProductProductsScheduledForDeletion = null;
                }

                foreach ($this->getBundleProductProducts() as $bundleProductProduct) {
                    if ($bundleProductProduct->isModified()) {
                        $bundleProductProduct->save($con);
                    }
                }
            } elseif ($this->collBundleProductProducts) {
                foreach ($this->collBundleProductProducts as $bundleProductProduct) {
                    if ($bundleProductProduct->isModified()) {
                        $bundleProductProduct->save($con);
                    }
                }
            }

            if ($this->bundleProductsScheduledForDeletion !== null) {
                if (!$this->bundleProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProductQuery::create()
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
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_product`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_product_bundle` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_catalog_product`':
                        $stmt->bindValue($identifier, $this->id_catalog_product, PDO::PARAM_INT);
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

            if ($this->aProduct !== null) {
                if (!$this->aProduct->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProduct->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBundleProducts !== null) {
                    foreach ($this->collBundleProducts as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCatalogProduct();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogProduct(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aProduct) {
                $result['Product'] = $this->aProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBundleProducts) {
                $result['BundleProducts'] = $this->collBundleProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCatalogProduct($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogProduct($arr[$keys[0]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $this->id_catalog_product);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::ID_CATALOG_PRODUCT, $this->id_catalog_product);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCatalogProduct();
    }

    /**
     * Generic method to set the primary key (id_catalog_product column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCatalogProduct($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCatalogProduct();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBundleProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBundleProduct($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getProduct();
            if ($relObj) {
                $copyObj->setProduct($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCatalogProduct(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $v
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProduct(ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $v = null)
    {
        if ($v === null) {
            $this->setIdCatalogProduct(NULL);
        } else {
            $this->setIdCatalogProduct($v->getIdCatalogProduct());
        }

        $this->aProduct = $v;

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setBundle($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The associated ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object.
     * @throws PropelException
     */
    public function getProduct(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProduct === null && ($this->id_catalog_product !== null) && $doQuery) {
            $this->aProduct = ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery::create()->findPk($this->id_catalog_product, $con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aProduct->setBundle($this);
        }

        return $this->aProduct;
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
        if ('BundleProduct' == $relationName) {
            $this->initBundleProducts();
        }
    }

    /**
     * Clears out the collBundleProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
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
        $this->collBundleProducts->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects
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
                $collBundleProducts = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProductQuery::create(null, $criteria)
                    ->filterByBundleProductBundle($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBundleProductsPartial && count($collBundleProducts)) {
                      $this->initBundleProducts(false);

                      foreach($collBundleProducts as $obj) {
                        if (false == $this->collBundleProducts->contains($obj)) {
                          $this->collBundleProducts->append($obj);
                        }
                      }

                      $this->collBundleProductsPartial = true;
                    }

                    $collBundleProducts->getInternalIterator()->rewind();
                    return $collBundleProducts;
                }

                if($partial && $this->collBundleProducts) {
                    foreach($this->collBundleProducts as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     */
    public function setBundleProducts(PropelCollection $bundleProducts, PropelPDO $con = null)
    {
        $bundleProductsToDelete = $this->getBundleProducts(new Criteria(), $con)->diff($bundleProducts);

        $this->bundleProductsScheduledForDeletion = unserialize(serialize($bundleProductsToDelete));

        foreach ($bundleProductsToDelete as $bundleProductRemoved) {
            $bundleProductRemoved->setBundleProductBundle(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects.
     * @throws PropelException
     */
    public function countBundleProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBundleProductsPartial && !$this->isNew();
        if (null === $this->collBundleProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBundleProducts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBundleProducts());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBundleProductBundle($this)
                ->count($con);
        }

        return count($this->collBundleProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct $l ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     */
    public function addBundleProduct(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct $l)
    {
        if ($this->collBundleProducts === null) {
            $this->initBundleProducts();
            $this->collBundleProductsPartial = true;
        }
        if (!in_array($l, $this->collBundleProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBundleProduct($l);
        }

        return $this;
    }

    /**
     * @param	BundleProduct $bundleProduct The bundleProduct object to add.
     */
    protected function doAddBundleProduct($bundleProduct)
    {
        $this->collBundleProducts[]= $bundleProduct;
        $bundleProduct->setBundleProductBundle($this);
    }

    /**
     * @param	BundleProduct $bundleProduct The bundleProduct object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
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
            $bundleProduct->setBundleProductBundle(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProductBundle is new, it will return
     * an empty collection; or if this PacCatalogProductBundle has previously
     * been saved, it will retrieve related BundleProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProductBundle.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects
     */
    public function getBundleProductsJoinBundleProductProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProductQuery::create(null, $criteria);
        $query->joinWith('BundleProductProduct', $join_behavior);

        return $this->getBundleProducts($query, $con);
    }

    /**
     * Clears out the collBundleProductProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     * @see        addBundleProductProducts()
     */
    public function clearBundleProductProducts()
    {
        $this->collBundleProductProducts = null; // important to set this to null since that means it is uninitialized
        $this->collBundleProductProductsPartial = null;

        return $this;
    }

    /**
     * Initializes the collBundleProductProducts collection.
     *
     * By default this just sets the collBundleProductProducts collection to an empty collection (like clearBundleProductProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initBundleProductProducts()
    {
        $this->collBundleProductProducts = new PropelObjectCollection();
        $this->collBundleProductProducts->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogProduct');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogProduct objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProduct[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProduct objects
     */
    public function getBundleProductProducts($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collBundleProductProducts || null !== $criteria) {
            if ($this->isNew() && null === $this->collBundleProductProducts) {
                // return empty collection
                $this->initBundleProductProducts();
            } else {
                $collBundleProductProducts = ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery::create(null, $criteria)
                    ->filterByBundleProductBundle($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collBundleProductProducts;
                }
                $this->collBundleProductProducts = $collBundleProductProducts;
            }
        }

        return $this->collBundleProductProducts;
    }

    /**
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogProduct objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bundleProductProducts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     */
    public function setBundleProductProducts(PropelCollection $bundleProductProducts, PropelPDO $con = null)
    {
        $this->clearBundleProductProducts();
        $currentBundleProductProducts = $this->getBundleProductProducts();

        $this->bundleProductProductsScheduledForDeletion = $currentBundleProductProducts->diff($bundleProductProducts);

        foreach ($bundleProductProducts as $bundleProductProduct) {
            if (!$currentBundleProductProducts->contains($bundleProductProduct)) {
                $this->doAddBundleProductProduct($bundleProductProduct);
            }
        }

        $this->collBundleProductProducts = $bundleProductProducts;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Catalog_Persistence_PacCatalogProduct objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogProduct objects
     */
    public function countBundleProductProducts($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collBundleProductProducts || null !== $criteria) {
            if ($this->isNew() && null === $this->collBundleProductProducts) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByBundleProductBundle($this)
                    ->count($con);
            }
        } else {
            return count($this->collBundleProductProducts);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object to this object
     * through the pac_catalog_product_bundle_product cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $pacCatalogProduct The ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     */
    public function addBundleProductProduct(ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $pacCatalogProduct)
    {
        if ($this->collBundleProductProducts === null) {
            $this->initBundleProductProducts();
        }
        if (!$this->collBundleProductProducts->contains($pacCatalogProduct)) { // only add it if the **same** object is not already associated
            $this->doAddBundleProductProduct($pacCatalogProduct);

            $this->collBundleProductProducts[]= $pacCatalogProduct;
        }

        return $this;
    }

    /**
     * @param	BundleProductProduct $bundleProductProduct The bundleProductProduct object to add.
     */
    protected function doAddBundleProductProduct($bundleProductProduct)
    {
        $pacCatalogProductBundleProduct = new ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct();
        $pacCatalogProductBundleProduct->setBundleProductProduct($bundleProductProduct);
        $this->addBundleProduct($pacCatalogProductBundleProduct);
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object to this object
     * through the pac_catalog_product_bundle_product cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $pacCatalogProduct The ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle The current object (for fluent API support)
     */
    public function removeBundleProductProduct(ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $pacCatalogProduct)
    {
        if ($this->getBundleProductProducts()->contains($pacCatalogProduct)) {
            $this->collBundleProductProducts->remove($this->collBundleProductProducts->search($pacCatalogProduct));
            if (null === $this->bundleProductProductsScheduledForDeletion) {
                $this->bundleProductProductsScheduledForDeletion = clone $this->collBundleProductProducts;
                $this->bundleProductProductsScheduledForDeletion->clear();
            }
            $this->bundleProductProductsScheduledForDeletion[]= $pacCatalogProduct;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_catalog_product = null;
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
            if ($this->collBundleProducts) {
                foreach ($this->collBundleProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBundleProductProducts) {
                foreach ($this->collBundleProductProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aProduct instanceof Persistent) {
              $this->aProduct->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBundleProducts instanceof PropelCollection) {
            $this->collBundleProducts->clearIterator();
        }
        $this->collBundleProducts = null;
        if ($this->collBundleProductProducts instanceof PropelCollection) {
            $this->collBundleProductProducts->clearIterator();
        }
        $this->collBundleProductProducts = null;
        $this->aProduct = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundlePeer::DEFAULT_STRING_FORMAT);
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
