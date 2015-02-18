<?php


/**
 * Base class that represents a row from the 'pac_locale' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/SprykerCore/Zed/Locale/Persistence/Propel.om
 */
abstract class Generated_Zed_Locale_Persistence_Propel_Om_BasePacLocale extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_locale field.
     * @var        int
     */
    protected $id_locale;

    /**
     * The value for the locale_name field.
     * @var        string
     */
    protected $locale_name;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[] Collection to store aggregation of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects.
     */
    protected $collPacCategoryTreeAttributes;
    protected $collPacCategoryTreeAttributesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[] Collection to store aggregation of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects.
     */
    protected $collPacGlossaryTranslations;
    protected $collPacGlossaryTranslationsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects.
     */
    protected $collPacLocalizedAbstractProductAttributess;
    protected $collPacLocalizedAbstractProductAttributessPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects.
     */
    protected $collPacLocalizedProductAttributess;
    protected $collPacLocalizedProductAttributessPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacTax[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacTax objects.
     */
    protected $collPacTaxes;
    protected $collPacTaxesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacTypeValue[] Collection to store aggregation of ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects.
     */
    protected $collPacTypeValues;
    protected $collPacTypeValuesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[] Collection to store aggregation of ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects.
     */
    protected $collPacSearchableProductss;
    protected $collPacSearchableProductssPartial;

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
    protected $pacCategoryTreeAttributesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacGlossaryTranslationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacLocalizedAbstractProductAttributessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacLocalizedProductAttributessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacTaxesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacTypeValuesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacSearchableProductssScheduledForDeletion = null;

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
     * Initializes internal state of Generated_Zed_Locale_Persistence_Propel_Om_BasePacLocale object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_locale] column value.
     *
     * @return int
     */
    public function getIdLocale()
    {

        return $this->id_locale;
    }

    /**
     * Get the [locale_name] column value.
     *
     * @return string
     */
    public function getLocaleName()
    {

        return $this->locale_name;
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
     * Set the value of [id_locale] column.
     *
     * @param  int $v new value
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setIdLocale($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_locale !== $v) {
            $this->id_locale = $v;
            $this->modifiedColumns[] = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE;
        }


        return $this;
    } // setIdLocale()

    /**
     * Set the value of [locale_name] column.
     *
     * @param  string $v new value
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setLocaleName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->locale_name !== $v) {
            $this->locale_name = $v;
            $this->modifiedColumns[] = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::LOCALE_NAME;
        }


        return $this;
    } // setLocaleName()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
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
            $this->modifiedColumns[] = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

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

            $this->id_locale = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->locale_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->is_active = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object", $e);
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
            $con = Propel::getConnection(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPacCategoryTreeAttributes = null;

            $this->collPacGlossaryTranslations = null;

            $this->collPacLocalizedAbstractProductAttributess = null;

            $this->collPacLocalizedProductAttributess = null;

            $this->collPacTaxes = null;

            $this->collPacTypeValues = null;

            $this->collPacSearchableProductss = null;

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
            $con = Propel::getConnection(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery::create()
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
            $con = Propel::getConnection(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::addInstanceToPool($this);
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

            if ($this->pacCategoryTreeAttributesScheduledForDeletion !== null) {
                if (!$this->pacCategoryTreeAttributesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create()
                        ->filterByPrimaryKeys($this->pacCategoryTreeAttributesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacCategoryTreeAttributesScheduledForDeletion = null;
                }
            }

            if ($this->collPacCategoryTreeAttributes !== null) {
                foreach ($this->collPacCategoryTreeAttributes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacGlossaryTranslationsScheduledForDeletion !== null) {
                if (!$this->pacGlossaryTranslationsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create()
                        ->filterByPrimaryKeys($this->pacGlossaryTranslationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacGlossaryTranslationsScheduledForDeletion = null;
                }
            }

            if ($this->collPacGlossaryTranslations !== null) {
                foreach ($this->collPacGlossaryTranslations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacLocalizedAbstractProductAttributessScheduledForDeletion !== null) {
                if (!$this->pacLocalizedAbstractProductAttributessScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery::create()
                        ->filterByPrimaryKeys($this->pacLocalizedAbstractProductAttributessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacLocalizedAbstractProductAttributessScheduledForDeletion = null;
                }
            }

            if ($this->collPacLocalizedAbstractProductAttributess !== null) {
                foreach ($this->collPacLocalizedAbstractProductAttributess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->pacTaxesScheduledForDeletion !== null) {
                if (!$this->pacTaxesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery::create()
                        ->filterByPrimaryKeys($this->pacTaxesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacTaxesScheduledForDeletion = null;
                }
            }

            if ($this->collPacTaxes !== null) {
                foreach ($this->collPacTaxes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacTypeValuesScheduledForDeletion !== null) {
                if (!$this->pacTypeValuesScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacTypeValuesScheduledForDeletion as $pacTypeValue) {
                        // need to save related object because we set the relation to null
                        $pacTypeValue->save($con);
                    }
                    $this->pacTypeValuesScheduledForDeletion = null;
                }
            }

            if ($this->collPacTypeValues !== null) {
                foreach ($this->collPacTypeValues as $referrerFK) {
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

        $this->modifiedColumns[] = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE;
        if (null !== $this->id_locale) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE)) {
            $modifiedColumns[':p' . $index++]  = '`id_locale`';
        }
        if ($this->isColumnModified(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::LOCALE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`locale_name`';
        }
        if ($this->isColumnModified(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_locale` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_locale`':
                        $stmt->bindValue($identifier, $this->id_locale, PDO::PARAM_INT);
                        break;
                    case '`locale_name`':
                        $stmt->bindValue($identifier, $this->locale_name, PDO::PARAM_STR);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
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
        $this->setIdLocale($pk);

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


            if (($retval = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacCategoryTreeAttributes !== null) {
                    foreach ($this->collPacCategoryTreeAttributes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacGlossaryTranslations !== null) {
                    foreach ($this->collPacGlossaryTranslations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacLocalizedAbstractProductAttributess !== null) {
                    foreach ($this->collPacLocalizedAbstractProductAttributess as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacLocalizedProductAttributess !== null) {
                    foreach ($this->collPacLocalizedProductAttributess as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacTaxes !== null) {
                    foreach ($this->collPacTaxes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacTypeValues !== null) {
                    foreach ($this->collPacTypeValues as $referrerFK) {
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
        $pos = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdLocale();
                break;
            case 1:
                return $this->getLocaleName();
                break;
            case 2:
                return $this->getIsActive();
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
        if (isset($alreadyDumpedObjects['SprykerCore_Zed_Locale_Persistence_Propel_PacLocale'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SprykerCore_Zed_Locale_Persistence_Propel_PacLocale'][$this->getPrimaryKey()] = true;
        $keys = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdLocale(),
            $keys[1] => $this->getLocaleName(),
            $keys[2] => $this->getIsActive(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collPacCategoryTreeAttributes) {
                $result['PacCategoryTreeAttributes'] = $this->collPacCategoryTreeAttributes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacGlossaryTranslations) {
                $result['PacGlossaryTranslations'] = $this->collPacGlossaryTranslations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacLocalizedAbstractProductAttributess) {
                $result['PacLocalizedAbstractProductAttributess'] = $this->collPacLocalizedAbstractProductAttributess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacLocalizedProductAttributess) {
                $result['PacLocalizedProductAttributess'] = $this->collPacLocalizedProductAttributess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacTaxes) {
                $result['PacTaxes'] = $this->collPacTaxes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacTypeValues) {
                $result['PacTypeValues'] = $this->collPacTypeValues->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacSearchableProductss) {
                $result['PacSearchableProductss'] = $this->collPacSearchableProductss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdLocale($value);
                break;
            case 1:
                $this->setLocaleName($value);
                break;
            case 2:
                $this->setIsActive($value);
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
        $keys = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdLocale($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setLocaleName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIsActive($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::DATABASE_NAME);

        if ($this->isColumnModified(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE)) $criteria->add(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $this->id_locale);
        if ($this->isColumnModified(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::LOCALE_NAME)) $criteria->add(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::LOCALE_NAME, $this->locale_name);
        if ($this->isColumnModified(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::IS_ACTIVE)) $criteria->add(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::IS_ACTIVE, $this->is_active);

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
        $criteria = new Criteria(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::DATABASE_NAME);
        $criteria->add(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $this->id_locale);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdLocale();
    }

    /**
     * Generic method to set the primary key (id_locale column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdLocale($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdLocale();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SprykerCore_Zed_Locale_Persistence_Propel_PacLocale (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setLocaleName($this->getLocaleName());
        $copyObj->setIsActive($this->getIsActive());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacCategoryTreeAttributes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCategoryTreeAttribute($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacGlossaryTranslations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacGlossaryTranslation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacLocalizedAbstractProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacLocalizedAbstractProductAttributes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacLocalizedProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacLocalizedProductAttributes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacTaxes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacTax($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacTypeValues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacTypeValue($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacSearchableProductss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacSearchableProducts($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdLocale(NULL); // this is a auto-increment column, so set to default value
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
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale Clone of current object.
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
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer();
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
        if ('PacCategoryTreeAttribute' == $relationName) {
            $this->initPacCategoryTreeAttributes();
        }
        if ('PacGlossaryTranslation' == $relationName) {
            $this->initPacGlossaryTranslations();
        }
        if ('PacLocalizedAbstractProductAttributes' == $relationName) {
            $this->initPacLocalizedAbstractProductAttributess();
        }
        if ('PacLocalizedProductAttributes' == $relationName) {
            $this->initPacLocalizedProductAttributess();
        }
        if ('PacTax' == $relationName) {
            $this->initPacTaxes();
        }
        if ('PacTypeValue' == $relationName) {
            $this->initPacTypeValues();
        }
        if ('PacSearchableProducts' == $relationName) {
            $this->initPacSearchableProductss();
        }
    }

    /**
     * Clears out the collPacCategoryTreeAttributes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     * @see        addPacCategoryTreeAttributes()
     */
    public function clearPacCategoryTreeAttributes()
    {
        $this->collPacCategoryTreeAttributes = null; // important to set this to null since that means it is uninitialized
        $this->collPacCategoryTreeAttributesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCategoryTreeAttributes collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCategoryTreeAttributes($v = true)
    {
        $this->collPacCategoryTreeAttributesPartial = $v;
    }

    /**
     * Initializes the collPacCategoryTreeAttributes collection.
     *
     * By default this just sets the collPacCategoryTreeAttributes collection to an empty array (like clearcollPacCategoryTreeAttributes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCategoryTreeAttributes($overrideExisting = true)
    {
        if (null !== $this->collPacCategoryTreeAttributes && !$overrideExisting) {
            return;
        }
        $this->collPacCategoryTreeAttributes = new PropelObjectCollection();
        $this->collPacCategoryTreeAttributes->setModel('ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute');
    }

    /**
     * Gets an array of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SprykerCore_Zed_Locale_Persistence_Propel_PacLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[] List of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects
     * @throws PropelException
     */
    public function getPacCategoryTreeAttributes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCategoryTreeAttributesPartial && !$this->isNew();
        if (null === $this->collPacCategoryTreeAttributes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCategoryTreeAttributes) {
                // return empty collection
                $this->initPacCategoryTreeAttributes();
            } else {
                $collPacCategoryTreeAttributes = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCategoryTreeAttributesPartial && count($collPacCategoryTreeAttributes)) {
                      $this->initPacCategoryTreeAttributes(false);

                      foreach ($collPacCategoryTreeAttributes as $obj) {
                        if (false == $this->collPacCategoryTreeAttributes->contains($obj)) {
                          $this->collPacCategoryTreeAttributes->append($obj);
                        }
                      }

                      $this->collPacCategoryTreeAttributesPartial = true;
                    }

                    $collPacCategoryTreeAttributes->getInternalIterator()->rewind();

                    return $collPacCategoryTreeAttributes;
                }

                if ($partial && $this->collPacCategoryTreeAttributes) {
                    foreach ($this->collPacCategoryTreeAttributes as $obj) {
                        if ($obj->isNew()) {
                            $collPacCategoryTreeAttributes[] = $obj;
                        }
                    }
                }

                $this->collPacCategoryTreeAttributes = $collPacCategoryTreeAttributes;
                $this->collPacCategoryTreeAttributesPartial = false;
            }
        }

        return $this->collPacCategoryTreeAttributes;
    }

    /**
     * Sets a collection of PacCategoryTreeAttribute objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCategoryTreeAttributes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setPacCategoryTreeAttributes(PropelCollection $pacCategoryTreeAttributes, PropelPDO $con = null)
    {
        $pacCategoryTreeAttributesToDelete = $this->getPacCategoryTreeAttributes(new Criteria(), $con)->diff($pacCategoryTreeAttributes);


        $this->pacCategoryTreeAttributesScheduledForDeletion = $pacCategoryTreeAttributesToDelete;

        foreach ($pacCategoryTreeAttributesToDelete as $pacCategoryTreeAttributeRemoved) {
            $pacCategoryTreeAttributeRemoved->setLocale(null);
        }

        $this->collPacCategoryTreeAttributes = null;
        foreach ($pacCategoryTreeAttributes as $pacCategoryTreeAttribute) {
            $this->addPacCategoryTreeAttribute($pacCategoryTreeAttribute);
        }

        $this->collPacCategoryTreeAttributes = $pacCategoryTreeAttributes;
        $this->collPacCategoryTreeAttributesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects.
     * @throws PropelException
     */
    public function countPacCategoryTreeAttributes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCategoryTreeAttributesPartial && !$this->isNew();
        if (null === $this->collPacCategoryTreeAttributes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCategoryTreeAttributes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCategoryTreeAttributes());
            }
            $query = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collPacCategoryTreeAttributes);
    }

    /**
     * Method called to associate a ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute object to this object
     * through the ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute foreign key attribute.
     *
     * @param    ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute $l ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function addPacCategoryTreeAttribute(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute $l)
    {
        if ($this->collPacCategoryTreeAttributes === null) {
            $this->initPacCategoryTreeAttributes();
            $this->collPacCategoryTreeAttributesPartial = true;
        }

        if (!in_array($l, $this->collPacCategoryTreeAttributes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCategoryTreeAttribute($l);

            if ($this->pacCategoryTreeAttributesScheduledForDeletion and $this->pacCategoryTreeAttributesScheduledForDeletion->contains($l)) {
                $this->pacCategoryTreeAttributesScheduledForDeletion->remove($this->pacCategoryTreeAttributesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCategoryTreeAttribute $pacCategoryTreeAttribute The pacCategoryTreeAttribute object to add.
     */
    protected function doAddPacCategoryTreeAttribute($pacCategoryTreeAttribute)
    {
        $this->collPacCategoryTreeAttributes[]= $pacCategoryTreeAttribute;
        $pacCategoryTreeAttribute->setLocale($this);
    }

    /**
     * @param	PacCategoryTreeAttribute $pacCategoryTreeAttribute The pacCategoryTreeAttribute object to remove.
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function removePacCategoryTreeAttribute($pacCategoryTreeAttribute)
    {
        if ($this->getPacCategoryTreeAttributes()->contains($pacCategoryTreeAttribute)) {
            $this->collPacCategoryTreeAttributes->remove($this->collPacCategoryTreeAttributes->search($pacCategoryTreeAttribute));
            if (null === $this->pacCategoryTreeAttributesScheduledForDeletion) {
                $this->pacCategoryTreeAttributesScheduledForDeletion = clone $this->collPacCategoryTreeAttributes;
                $this->pacCategoryTreeAttributesScheduledForDeletion->clear();
            }
            $this->pacCategoryTreeAttributesScheduledForDeletion[]= clone $pacCategoryTreeAttribute;
            $pacCategoryTreeAttribute->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacLocale is new, it will return
     * an empty collection; or if this PacLocale has previously
     * been saved, it will retrieve related PacCategoryTreeAttributes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacLocale.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute[] List of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute objects
     */
    public function getPacCategoryTreeAttributesJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create(null, $criteria);
        $query->joinWith('Category', $join_behavior);

        return $this->getPacCategoryTreeAttributes($query, $con);
    }

    /**
     * Clears out the collPacGlossaryTranslations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     * @see        addPacGlossaryTranslations()
     */
    public function clearPacGlossaryTranslations()
    {
        $this->collPacGlossaryTranslations = null; // important to set this to null since that means it is uninitialized
        $this->collPacGlossaryTranslationsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacGlossaryTranslations collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacGlossaryTranslations($v = true)
    {
        $this->collPacGlossaryTranslationsPartial = $v;
    }

    /**
     * Initializes the collPacGlossaryTranslations collection.
     *
     * By default this just sets the collPacGlossaryTranslations collection to an empty array (like clearcollPacGlossaryTranslations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacGlossaryTranslations($overrideExisting = true)
    {
        if (null !== $this->collPacGlossaryTranslations && !$overrideExisting) {
            return;
        }
        $this->collPacGlossaryTranslations = new PropelObjectCollection();
        $this->collPacGlossaryTranslations->setModel('ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation');
    }

    /**
     * Gets an array of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SprykerCore_Zed_Locale_Persistence_Propel_PacLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[] List of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects
     * @throws PropelException
     */
    public function getPacGlossaryTranslations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryTranslationsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryTranslations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryTranslations) {
                // return empty collection
                $this->initPacGlossaryTranslations();
            } else {
                $collPacGlossaryTranslations = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create(null, $criteria)
                    ->filterByGlossaryLocale($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacGlossaryTranslationsPartial && count($collPacGlossaryTranslations)) {
                      $this->initPacGlossaryTranslations(false);

                      foreach ($collPacGlossaryTranslations as $obj) {
                        if (false == $this->collPacGlossaryTranslations->contains($obj)) {
                          $this->collPacGlossaryTranslations->append($obj);
                        }
                      }

                      $this->collPacGlossaryTranslationsPartial = true;
                    }

                    $collPacGlossaryTranslations->getInternalIterator()->rewind();

                    return $collPacGlossaryTranslations;
                }

                if ($partial && $this->collPacGlossaryTranslations) {
                    foreach ($this->collPacGlossaryTranslations as $obj) {
                        if ($obj->isNew()) {
                            $collPacGlossaryTranslations[] = $obj;
                        }
                    }
                }

                $this->collPacGlossaryTranslations = $collPacGlossaryTranslations;
                $this->collPacGlossaryTranslationsPartial = false;
            }
        }

        return $this->collPacGlossaryTranslations;
    }

    /**
     * Sets a collection of PacGlossaryTranslation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacGlossaryTranslations A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setPacGlossaryTranslations(PropelCollection $pacGlossaryTranslations, PropelPDO $con = null)
    {
        $pacGlossaryTranslationsToDelete = $this->getPacGlossaryTranslations(new Criteria(), $con)->diff($pacGlossaryTranslations);


        $this->pacGlossaryTranslationsScheduledForDeletion = $pacGlossaryTranslationsToDelete;

        foreach ($pacGlossaryTranslationsToDelete as $pacGlossaryTranslationRemoved) {
            $pacGlossaryTranslationRemoved->setGlossaryLocale(null);
        }

        $this->collPacGlossaryTranslations = null;
        foreach ($pacGlossaryTranslations as $pacGlossaryTranslation) {
            $this->addPacGlossaryTranslation($pacGlossaryTranslation);
        }

        $this->collPacGlossaryTranslations = $pacGlossaryTranslations;
        $this->collPacGlossaryTranslationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects.
     * @throws PropelException
     */
    public function countPacGlossaryTranslations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacGlossaryTranslationsPartial && !$this->isNew();
        if (null === $this->collPacGlossaryTranslations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacGlossaryTranslations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacGlossaryTranslations());
            }
            $query = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGlossaryLocale($this)
                ->count($con);
        }

        return count($this->collPacGlossaryTranslations);
    }

    /**
     * Method called to associate a ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation object to this object
     * through the ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation foreign key attribute.
     *
     * @param    ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation $l ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function addPacGlossaryTranslation(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation $l)
    {
        if ($this->collPacGlossaryTranslations === null) {
            $this->initPacGlossaryTranslations();
            $this->collPacGlossaryTranslationsPartial = true;
        }

        if (!in_array($l, $this->collPacGlossaryTranslations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacGlossaryTranslation($l);

            if ($this->pacGlossaryTranslationsScheduledForDeletion and $this->pacGlossaryTranslationsScheduledForDeletion->contains($l)) {
                $this->pacGlossaryTranslationsScheduledForDeletion->remove($this->pacGlossaryTranslationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacGlossaryTranslation $pacGlossaryTranslation The pacGlossaryTranslation object to add.
     */
    protected function doAddPacGlossaryTranslation($pacGlossaryTranslation)
    {
        $this->collPacGlossaryTranslations[]= $pacGlossaryTranslation;
        $pacGlossaryTranslation->setGlossaryLocale($this);
    }

    /**
     * @param	PacGlossaryTranslation $pacGlossaryTranslation The pacGlossaryTranslation object to remove.
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function removePacGlossaryTranslation($pacGlossaryTranslation)
    {
        if ($this->getPacGlossaryTranslations()->contains($pacGlossaryTranslation)) {
            $this->collPacGlossaryTranslations->remove($this->collPacGlossaryTranslations->search($pacGlossaryTranslation));
            if (null === $this->pacGlossaryTranslationsScheduledForDeletion) {
                $this->pacGlossaryTranslationsScheduledForDeletion = clone $this->collPacGlossaryTranslations;
                $this->pacGlossaryTranslationsScheduledForDeletion->clear();
            }
            $this->pacGlossaryTranslationsScheduledForDeletion[]= clone $pacGlossaryTranslation;
            $pacGlossaryTranslation->setGlossaryLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacLocale is new, it will return
     * an empty collection; or if this PacLocale has previously
     * been saved, it will retrieve related PacGlossaryTranslations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacLocale.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[] List of ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects
     */
    public function getPacGlossaryTranslationsJoinGlossaryKey($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery::create(null, $criteria);
        $query->joinWith('GlossaryKey', $join_behavior);

        return $this->getPacGlossaryTranslations($query, $con);
    }

    /**
     * Clears out the collPacLocalizedAbstractProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     * @see        addPacLocalizedAbstractProductAttributess()
     */
    public function clearPacLocalizedAbstractProductAttributess()
    {
        $this->collPacLocalizedAbstractProductAttributess = null; // important to set this to null since that means it is uninitialized
        $this->collPacLocalizedAbstractProductAttributessPartial = null;

        return $this;
    }

    /**
     * reset is the collPacLocalizedAbstractProductAttributess collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacLocalizedAbstractProductAttributess($v = true)
    {
        $this->collPacLocalizedAbstractProductAttributessPartial = $v;
    }

    /**
     * Initializes the collPacLocalizedAbstractProductAttributess collection.
     *
     * By default this just sets the collPacLocalizedAbstractProductAttributess collection to an empty array (like clearcollPacLocalizedAbstractProductAttributess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacLocalizedAbstractProductAttributess($overrideExisting = true)
    {
        if (null !== $this->collPacLocalizedAbstractProductAttributess && !$overrideExisting) {
            return;
        }
        $this->collPacLocalizedAbstractProductAttributess = new PropelObjectCollection();
        $this->collPacLocalizedAbstractProductAttributess->setModel('ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SprykerCore_Zed_Locale_Persistence_Propel_PacLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects
     * @throws PropelException
     */
    public function getPacLocalizedAbstractProductAttributess($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacLocalizedAbstractProductAttributessPartial && !$this->isNew();
        if (null === $this->collPacLocalizedAbstractProductAttributess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacLocalizedAbstractProductAttributess) {
                // return empty collection
                $this->initPacLocalizedAbstractProductAttributess();
            } else {
                $collPacLocalizedAbstractProductAttributess = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacLocalizedAbstractProductAttributessPartial && count($collPacLocalizedAbstractProductAttributess)) {
                      $this->initPacLocalizedAbstractProductAttributess(false);

                      foreach ($collPacLocalizedAbstractProductAttributess as $obj) {
                        if (false == $this->collPacLocalizedAbstractProductAttributess->contains($obj)) {
                          $this->collPacLocalizedAbstractProductAttributess->append($obj);
                        }
                      }

                      $this->collPacLocalizedAbstractProductAttributessPartial = true;
                    }

                    $collPacLocalizedAbstractProductAttributess->getInternalIterator()->rewind();

                    return $collPacLocalizedAbstractProductAttributess;
                }

                if ($partial && $this->collPacLocalizedAbstractProductAttributess) {
                    foreach ($this->collPacLocalizedAbstractProductAttributess as $obj) {
                        if ($obj->isNew()) {
                            $collPacLocalizedAbstractProductAttributess[] = $obj;
                        }
                    }
                }

                $this->collPacLocalizedAbstractProductAttributess = $collPacLocalizedAbstractProductAttributess;
                $this->collPacLocalizedAbstractProductAttributessPartial = false;
            }
        }

        return $this->collPacLocalizedAbstractProductAttributess;
    }

    /**
     * Sets a collection of PacLocalizedAbstractProductAttributes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacLocalizedAbstractProductAttributess A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setPacLocalizedAbstractProductAttributess(PropelCollection $pacLocalizedAbstractProductAttributess, PropelPDO $con = null)
    {
        $pacLocalizedAbstractProductAttributessToDelete = $this->getPacLocalizedAbstractProductAttributess(new Criteria(), $con)->diff($pacLocalizedAbstractProductAttributess);


        $this->pacLocalizedAbstractProductAttributessScheduledForDeletion = $pacLocalizedAbstractProductAttributessToDelete;

        foreach ($pacLocalizedAbstractProductAttributessToDelete as $pacLocalizedAbstractProductAttributesRemoved) {
            $pacLocalizedAbstractProductAttributesRemoved->setLocale(null);
        }

        $this->collPacLocalizedAbstractProductAttributess = null;
        foreach ($pacLocalizedAbstractProductAttributess as $pacLocalizedAbstractProductAttributes) {
            $this->addPacLocalizedAbstractProductAttributes($pacLocalizedAbstractProductAttributes);
        }

        $this->collPacLocalizedAbstractProductAttributess = $pacLocalizedAbstractProductAttributess;
        $this->collPacLocalizedAbstractProductAttributessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects.
     * @throws PropelException
     */
    public function countPacLocalizedAbstractProductAttributess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacLocalizedAbstractProductAttributessPartial && !$this->isNew();
        if (null === $this->collPacLocalizedAbstractProductAttributess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacLocalizedAbstractProductAttributess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacLocalizedAbstractProductAttributess());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collPacLocalizedAbstractProductAttributess);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes $l ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function addPacLocalizedAbstractProductAttributes(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes $l)
    {
        if ($this->collPacLocalizedAbstractProductAttributess === null) {
            $this->initPacLocalizedAbstractProductAttributess();
            $this->collPacLocalizedAbstractProductAttributessPartial = true;
        }

        if (!in_array($l, $this->collPacLocalizedAbstractProductAttributess->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacLocalizedAbstractProductAttributes($l);

            if ($this->pacLocalizedAbstractProductAttributessScheduledForDeletion and $this->pacLocalizedAbstractProductAttributessScheduledForDeletion->contains($l)) {
                $this->pacLocalizedAbstractProductAttributessScheduledForDeletion->remove($this->pacLocalizedAbstractProductAttributessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacLocalizedAbstractProductAttributes $pacLocalizedAbstractProductAttributes The pacLocalizedAbstractProductAttributes object to add.
     */
    protected function doAddPacLocalizedAbstractProductAttributes($pacLocalizedAbstractProductAttributes)
    {
        $this->collPacLocalizedAbstractProductAttributess[]= $pacLocalizedAbstractProductAttributes;
        $pacLocalizedAbstractProductAttributes->setLocale($this);
    }

    /**
     * @param	PacLocalizedAbstractProductAttributes $pacLocalizedAbstractProductAttributes The pacLocalizedAbstractProductAttributes object to remove.
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function removePacLocalizedAbstractProductAttributes($pacLocalizedAbstractProductAttributes)
    {
        if ($this->getPacLocalizedAbstractProductAttributess()->contains($pacLocalizedAbstractProductAttributes)) {
            $this->collPacLocalizedAbstractProductAttributess->remove($this->collPacLocalizedAbstractProductAttributess->search($pacLocalizedAbstractProductAttributes));
            if (null === $this->pacLocalizedAbstractProductAttributessScheduledForDeletion) {
                $this->pacLocalizedAbstractProductAttributessScheduledForDeletion = clone $this->collPacLocalizedAbstractProductAttributess;
                $this->pacLocalizedAbstractProductAttributessScheduledForDeletion->clear();
            }
            $this->pacLocalizedAbstractProductAttributessScheduledForDeletion[]= clone $pacLocalizedAbstractProductAttributes;
            $pacLocalizedAbstractProductAttributes->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacLocale is new, it will return
     * an empty collection; or if this PacLocale has previously
     * been saved, it will retrieve related PacLocalizedAbstractProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacLocale.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects
     */
    public function getPacLocalizedAbstractProductAttributessJoinPacAbstractProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery::create(null, $criteria);
        $query->joinWith('PacAbstractProduct', $join_behavior);

        return $this->getPacLocalizedAbstractProductAttributess($query, $con);
    }

    /**
     * Clears out the collPacLocalizedProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
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
     * If this SprykerCore_Zed_Locale_Persistence_Propel_PacLocale is new, it will return
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
                    ->filterByLocale($this)
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
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setPacLocalizedProductAttributess(PropelCollection $pacLocalizedProductAttributess, PropelPDO $con = null)
    {
        $pacLocalizedProductAttributessToDelete = $this->getPacLocalizedProductAttributess(new Criteria(), $con)->diff($pacLocalizedProductAttributess);


        $this->pacLocalizedProductAttributessScheduledForDeletion = $pacLocalizedProductAttributessToDelete;

        foreach ($pacLocalizedProductAttributessToDelete as $pacLocalizedProductAttributesRemoved) {
            $pacLocalizedProductAttributesRemoved->setLocale(null);
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
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collPacLocalizedProductAttributess);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes $l ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
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
        $pacLocalizedProductAttributes->setLocale($this);
    }

    /**
     * @param	PacLocalizedProductAttributes $pacLocalizedProductAttributes The pacLocalizedProductAttributes object to remove.
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
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
            $pacLocalizedProductAttributes->setLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacLocale is new, it will return
     * an empty collection; or if this PacLocale has previously
     * been saved, it will retrieve related PacLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacLocale.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes[] List of ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes objects
     */
    public function getPacLocalizedProductAttributessJoinPacProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery::create(null, $criteria);
        $query->joinWith('PacProduct', $join_behavior);

        return $this->getPacLocalizedProductAttributess($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacLocale is new, it will return
     * an empty collection; or if this PacLocale has previously
     * been saved, it will retrieve related PacLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacLocale.
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
     * Clears out the collPacTaxes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     * @see        addPacTaxes()
     */
    public function clearPacTaxes()
    {
        $this->collPacTaxes = null; // important to set this to null since that means it is uninitialized
        $this->collPacTaxesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacTaxes collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacTaxes($v = true)
    {
        $this->collPacTaxesPartial = $v;
    }

    /**
     * Initializes the collPacTaxes collection.
     *
     * By default this just sets the collPacTaxes collection to an empty array (like clearcollPacTaxes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacTaxes($overrideExisting = true)
    {
        if (null !== $this->collPacTaxes && !$overrideExisting) {
            return;
        }
        $this->collPacTaxes = new PropelObjectCollection();
        $this->collPacTaxes->setModel('ProjectA_Zed_Product_Persistence_Propel_PacTax');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacTax objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SprykerCore_Zed_Locale_Persistence_Propel_PacLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacTax[] List of ProjectA_Zed_Product_Persistence_Propel_PacTax objects
     * @throws PropelException
     */
    public function getPacTaxes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacTaxesPartial && !$this->isNew();
        if (null === $this->collPacTaxes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacTaxes) {
                // return empty collection
                $this->initPacTaxes();
            } else {
                $collPacTaxes = ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacTaxesPartial && count($collPacTaxes)) {
                      $this->initPacTaxes(false);

                      foreach ($collPacTaxes as $obj) {
                        if (false == $this->collPacTaxes->contains($obj)) {
                          $this->collPacTaxes->append($obj);
                        }
                      }

                      $this->collPacTaxesPartial = true;
                    }

                    $collPacTaxes->getInternalIterator()->rewind();

                    return $collPacTaxes;
                }

                if ($partial && $this->collPacTaxes) {
                    foreach ($this->collPacTaxes as $obj) {
                        if ($obj->isNew()) {
                            $collPacTaxes[] = $obj;
                        }
                    }
                }

                $this->collPacTaxes = $collPacTaxes;
                $this->collPacTaxesPartial = false;
            }
        }

        return $this->collPacTaxes;
    }

    /**
     * Sets a collection of PacTax objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacTaxes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setPacTaxes(PropelCollection $pacTaxes, PropelPDO $con = null)
    {
        $pacTaxesToDelete = $this->getPacTaxes(new Criteria(), $con)->diff($pacTaxes);


        $this->pacTaxesScheduledForDeletion = $pacTaxesToDelete;

        foreach ($pacTaxesToDelete as $pacTaxRemoved) {
            $pacTaxRemoved->setLocale(null);
        }

        $this->collPacTaxes = null;
        foreach ($pacTaxes as $pacTax) {
            $this->addPacTax($pacTax);
        }

        $this->collPacTaxes = $pacTaxes;
        $this->collPacTaxesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacTax objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacTax objects.
     * @throws PropelException
     */
    public function countPacTaxes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacTaxesPartial && !$this->isNew();
        if (null === $this->collPacTaxes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacTaxes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacTaxes());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collPacTaxes);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacTax object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacTax foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacTax $l ProjectA_Zed_Product_Persistence_Propel_PacTax
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function addPacTax(ProjectA_Zed_Product_Persistence_Propel_PacTax $l)
    {
        if ($this->collPacTaxes === null) {
            $this->initPacTaxes();
            $this->collPacTaxesPartial = true;
        }

        if (!in_array($l, $this->collPacTaxes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacTax($l);

            if ($this->pacTaxesScheduledForDeletion and $this->pacTaxesScheduledForDeletion->contains($l)) {
                $this->pacTaxesScheduledForDeletion->remove($this->pacTaxesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacTax $pacTax The pacTax object to add.
     */
    protected function doAddPacTax($pacTax)
    {
        $this->collPacTaxes[]= $pacTax;
        $pacTax->setLocale($this);
    }

    /**
     * @param	PacTax $pacTax The pacTax object to remove.
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function removePacTax($pacTax)
    {
        if ($this->getPacTaxes()->contains($pacTax)) {
            $this->collPacTaxes->remove($this->collPacTaxes->search($pacTax));
            if (null === $this->pacTaxesScheduledForDeletion) {
                $this->pacTaxesScheduledForDeletion = clone $this->collPacTaxes;
                $this->pacTaxesScheduledForDeletion->clear();
            }
            $this->pacTaxesScheduledForDeletion[]= clone $pacTax;
            $pacTax->setLocale(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacTypeValues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     * @see        addPacTypeValues()
     */
    public function clearPacTypeValues()
    {
        $this->collPacTypeValues = null; // important to set this to null since that means it is uninitialized
        $this->collPacTypeValuesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacTypeValues collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacTypeValues($v = true)
    {
        $this->collPacTypeValuesPartial = $v;
    }

    /**
     * Initializes the collPacTypeValues collection.
     *
     * By default this just sets the collPacTypeValues collection to an empty array (like clearcollPacTypeValues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacTypeValues($overrideExisting = true)
    {
        if (null !== $this->collPacTypeValues && !$overrideExisting) {
            return;
        }
        $this->collPacTypeValues = new PropelObjectCollection();
        $this->collPacTypeValues->setModel('ProjectA_Zed_Product_Persistence_Propel_PacTypeValue');
    }

    /**
     * Gets an array of ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SprykerCore_Zed_Locale_Persistence_Propel_PacLocale is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacTypeValue[] List of ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects
     * @throws PropelException
     */
    public function getPacTypeValues($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacTypeValuesPartial && !$this->isNew();
        if (null === $this->collPacTypeValues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacTypeValues) {
                // return empty collection
                $this->initPacTypeValues();
            } else {
                $collPacTypeValues = ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery::create(null, $criteria)
                    ->filterByLocale($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacTypeValuesPartial && count($collPacTypeValues)) {
                      $this->initPacTypeValues(false);

                      foreach ($collPacTypeValues as $obj) {
                        if (false == $this->collPacTypeValues->contains($obj)) {
                          $this->collPacTypeValues->append($obj);
                        }
                      }

                      $this->collPacTypeValuesPartial = true;
                    }

                    $collPacTypeValues->getInternalIterator()->rewind();

                    return $collPacTypeValues;
                }

                if ($partial && $this->collPacTypeValues) {
                    foreach ($this->collPacTypeValues as $obj) {
                        if ($obj->isNew()) {
                            $collPacTypeValues[] = $obj;
                        }
                    }
                }

                $this->collPacTypeValues = $collPacTypeValues;
                $this->collPacTypeValuesPartial = false;
            }
        }

        return $this->collPacTypeValues;
    }

    /**
     * Sets a collection of PacTypeValue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacTypeValues A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setPacTypeValues(PropelCollection $pacTypeValues, PropelPDO $con = null)
    {
        $pacTypeValuesToDelete = $this->getPacTypeValues(new Criteria(), $con)->diff($pacTypeValues);


        $this->pacTypeValuesScheduledForDeletion = $pacTypeValuesToDelete;

        foreach ($pacTypeValuesToDelete as $pacTypeValueRemoved) {
            $pacTypeValueRemoved->setLocale(null);
        }

        $this->collPacTypeValues = null;
        foreach ($pacTypeValues as $pacTypeValue) {
            $this->addPacTypeValue($pacTypeValue);
        }

        $this->collPacTypeValues = $pacTypeValues;
        $this->collPacTypeValuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects.
     * @throws PropelException
     */
    public function countPacTypeValues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacTypeValuesPartial && !$this->isNew();
        if (null === $this->collPacTypeValues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacTypeValues) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacTypeValues());
            }
            $query = ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLocale($this)
                ->count($con);
        }

        return count($this->collPacTypeValues);
    }

    /**
     * Method called to associate a ProjectA_Zed_Product_Persistence_Propel_PacTypeValue object to this object
     * through the ProjectA_Zed_Product_Persistence_Propel_PacTypeValue foreign key attribute.
     *
     * @param    ProjectA_Zed_Product_Persistence_Propel_PacTypeValue $l ProjectA_Zed_Product_Persistence_Propel_PacTypeValue
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function addPacTypeValue(ProjectA_Zed_Product_Persistence_Propel_PacTypeValue $l)
    {
        if ($this->collPacTypeValues === null) {
            $this->initPacTypeValues();
            $this->collPacTypeValuesPartial = true;
        }

        if (!in_array($l, $this->collPacTypeValues->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacTypeValue($l);

            if ($this->pacTypeValuesScheduledForDeletion and $this->pacTypeValuesScheduledForDeletion->contains($l)) {
                $this->pacTypeValuesScheduledForDeletion->remove($this->pacTypeValuesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacTypeValue $pacTypeValue The pacTypeValue object to add.
     */
    protected function doAddPacTypeValue($pacTypeValue)
    {
        $this->collPacTypeValues[]= $pacTypeValue;
        $pacTypeValue->setLocale($this);
    }

    /**
     * @param	PacTypeValue $pacTypeValue The pacTypeValue object to remove.
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function removePacTypeValue($pacTypeValue)
    {
        if ($this->getPacTypeValues()->contains($pacTypeValue)) {
            $this->collPacTypeValues->remove($this->collPacTypeValues->search($pacTypeValue));
            if (null === $this->pacTypeValuesScheduledForDeletion) {
                $this->pacTypeValuesScheduledForDeletion = clone $this->collPacTypeValues;
                $this->pacTypeValuesScheduledForDeletion->clear();
            }
            $this->pacTypeValuesScheduledForDeletion[]= $pacTypeValue;
            $pacTypeValue->setLocale(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacSearchableProductss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
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
     * If this SprykerCore_Zed_Locale_Persistence_Propel_PacLocale is new, it will return
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
                    ->filterByPacLocale($this)
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
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
     */
    public function setPacSearchableProductss(PropelCollection $pacSearchableProductss, PropelPDO $con = null)
    {
        $pacSearchableProductssToDelete = $this->getPacSearchableProductss(new Criteria(), $con)->diff($pacSearchableProductss);


        $this->pacSearchableProductssScheduledForDeletion = $pacSearchableProductssToDelete;

        foreach ($pacSearchableProductssToDelete as $pacSearchableProductsRemoved) {
            $pacSearchableProductsRemoved->setPacLocale(null);
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
                ->filterByPacLocale($this)
                ->count($con);
        }

        return count($this->collPacSearchableProductss);
    }

    /**
     * Method called to associate a ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts object to this object
     * through the ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts foreign key attribute.
     *
     * @param    ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts $l ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
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
        $pacSearchableProducts->setPacLocale($this);
    }

    /**
     * @param	PacSearchableProducts $pacSearchableProducts The pacSearchableProducts object to remove.
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The current object (for fluent API support)
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
            $pacSearchableProducts->setPacLocale(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacLocale is new, it will return
     * an empty collection; or if this PacLocale has previously
     * been saved, it will retrieve related PacSearchableProductss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacLocale.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[] List of ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects
     */
    public function getPacSearchableProductssJoinPacProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery::create(null, $criteria);
        $query->joinWith('PacProduct', $join_behavior);

        return $this->getPacSearchableProductss($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_locale = null;
        $this->locale_name = null;
        $this->is_active = null;
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
            if ($this->collPacCategoryTreeAttributes) {
                foreach ($this->collPacCategoryTreeAttributes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacGlossaryTranslations) {
                foreach ($this->collPacGlossaryTranslations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacLocalizedAbstractProductAttributess) {
                foreach ($this->collPacLocalizedAbstractProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacLocalizedProductAttributess) {
                foreach ($this->collPacLocalizedProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacTaxes) {
                foreach ($this->collPacTaxes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacTypeValues) {
                foreach ($this->collPacTypeValues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacSearchableProductss) {
                foreach ($this->collPacSearchableProductss as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacCategoryTreeAttributes instanceof PropelCollection) {
            $this->collPacCategoryTreeAttributes->clearIterator();
        }
        $this->collPacCategoryTreeAttributes = null;
        if ($this->collPacGlossaryTranslations instanceof PropelCollection) {
            $this->collPacGlossaryTranslations->clearIterator();
        }
        $this->collPacGlossaryTranslations = null;
        if ($this->collPacLocalizedAbstractProductAttributess instanceof PropelCollection) {
            $this->collPacLocalizedAbstractProductAttributess->clearIterator();
        }
        $this->collPacLocalizedAbstractProductAttributess = null;
        if ($this->collPacLocalizedProductAttributess instanceof PropelCollection) {
            $this->collPacLocalizedProductAttributess->clearIterator();
        }
        $this->collPacLocalizedProductAttributess = null;
        if ($this->collPacTaxes instanceof PropelCollection) {
            $this->collPacTaxes->clearIterator();
        }
        $this->collPacTaxes = null;
        if ($this->collPacTypeValues instanceof PropelCollection) {
            $this->collPacTypeValues->clearIterator();
        }
        $this->collPacTypeValues = null;
        if ($this->collPacSearchableProductss instanceof PropelCollection) {
            $this->collPacSearchableProductss->clearIterator();
        }
        $this->collPacSearchableProductss = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::DEFAULT_STRING_FORMAT);
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
