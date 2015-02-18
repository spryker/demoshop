<?php


/**
 * Base class that represents a row from the 'pac_catalog_product' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProduct extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_catalog_product field.
     * @var        int
     */
    protected $id_catalog_product;

    /**
     * The value for the sku field.
     * @var        string
     */
    protected $sku;

    /**
     * The value for the is_item field.
     * @var        boolean
     */
    protected $is_item;

    /**
     * The value for the status field.
     * Note: this column has a database default value of: 'new'
     * @var        string
     */
    protected $status;

    /**
     * The value for the variety field.
     * @var        string
     */
    protected $variety;

    /**
     * The value for the fk_catalog_attribute_set field.
     * @var        int
     */
    protected $fk_catalog_attribute_set;

    /**
     * The value for the cache field.
     * @var        string
     */
    protected $cache;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        PacCatalogAttributeSet
     */
    protected $aAttributeSet;

    /**
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle one-to-one related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object
     */
    protected $singleBundle;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects.
     */
    protected $collBundleProducts;
    protected $collBundleProductsPartial;

    /**
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle one-to-one related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle object
     */
    protected $singleSingleEntity;

    /**
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig one-to-one related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig object
     */
    protected $singleConfigEntity;

    /**
     * @var        ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple one-to-one related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple object
     */
    protected $singleSimpleEntity;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects.
     */
    protected $collOptionMultis;
    protected $collOptionMultisPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle objects.
     */
    protected $collOptionSingles;
    protected $collOptionSinglesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger objects.
     */
    protected $collIntegers;
    protected $collIntegersPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp objects.
     */
    protected $collTimestamps;
    protected $collTimestampsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal objects.
     */
    protected $collDecimals;
    protected $collDecimalsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText objects.
     */
    protected $collTexts;
    protected $collTextsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean objects.
     */
    protected $collBooleans;
    protected $collBooleansPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory objects.
     */
    protected $collProductCategories;
    protected $collProductCategoriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption objects.
     */
    protected $collProductOptions;
    protected $collProductOptionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects.
     */
    protected $collPacCmsBlockProducts;
    protected $collPacCmsBlockProductsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage[] Collection to store aggregation of ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects.
     */
    protected $collProductImages;
    protected $collProductImagesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects.
     */
    protected $collBundleProductBundles;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects.
     */
    protected $collOptions;

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
    protected $bundleProductBundlesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bundleProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionMultisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $optionSinglesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $integersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $timestampsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $decimalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $textsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $booleansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productCategoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productOptionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacCmsBlockProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productImagesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->status = 'new';
    }

    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProduct object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

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
     * Get the [sku] column value.
     *
     * @return string
     */
    public function getSku()
    {

        return $this->sku;
    }

    /**
     * Get the [is_item] column value.
     *
     * @return boolean
     */
    public function getIsItem()
    {

        return $this->is_item;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {

        return $this->status;
    }

    /**
     * Get the [variety] column value.
     *
     * @return string
     */
    public function getVariety()
    {

        return $this->variety;
    }

    /**
     * Get the [fk_catalog_attribute_set] column value.
     *
     * @return int
     */
    public function getFkCatalogAttributeSet()
    {

        return $this->fk_catalog_attribute_set;
    }

    /**
     * Get the [cache] column value.
     *
     * @return string
     */
    public function getCache()
    {

        return $this->cache;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id_catalog_product] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setIdCatalogProduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_product !== $v) {
            $this->id_catalog_product = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT;
        }


        return $this;
    } // setIdCatalogProduct()

    /**
     * Set the value of [sku] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::SKU;
        }


        return $this;
    } // setSku()

    /**
     * Sets the value of the [is_item] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setIsItem($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_item !== $v) {
            $this->is_item = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::IS_ITEM;
        }


        return $this;
    } // setIsItem()

    /**
     * Set the value of [status] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [variety] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setVariety($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->variety !== $v) {
            $this->variety = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::VARIETY;
        }


        return $this;
    } // setVariety()

    /**
     * Set the value of [fk_catalog_attribute_set] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setFkCatalogAttributeSet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_catalog_attribute_set !== $v) {
            $this->fk_catalog_attribute_set = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET;
        }

        if ($this->aAttributeSet !== null && $this->aAttributeSet->getIdCatalogAttributeSet() !== $v) {
            $this->aAttributeSet = null;
        }


        return $this;
    } // setFkCatalogAttributeSet()

    /**
     * Set the value of [cache] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setCache($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cache !== $v) {
            $this->cache = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CACHE;
        }


        return $this;
    } // setCache()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

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
            if ($this->status !== 'new') {
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

            $this->id_catalog_product = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->sku = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->is_item = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->status = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->variety = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->fk_catalog_attribute_set = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->cache = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->created_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->updated_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 9; // 9 = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object", $e);
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

        if ($this->aAttributeSet !== null && $this->fk_catalog_attribute_set !== $this->aAttributeSet->getIdCatalogAttributeSet()) {
            $this->aAttributeSet = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAttributeSet = null;
            $this->singleBundle = null;

            $this->collBundleProducts = null;

            $this->singleSingleEntity = null;

            $this->singleConfigEntity = null;

            $this->singleSimpleEntity = null;

            $this->collOptionMultis = null;

            $this->collOptionSingles = null;

            $this->collIntegers = null;

            $this->collTimestamps = null;

            $this->collDecimals = null;

            $this->collTexts = null;

            $this->collBooleans = null;

            $this->collProductCategories = null;

            $this->collProductOptions = null;

            $this->collPacCmsBlockProducts = null;

            $this->collProductImages = null;

            $this->collBundleProductBundles = null;
            $this->collOptions = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
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

                ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::addInstanceToPool($this);
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

            if ($this->aAttributeSet !== null) {
                if ($this->aAttributeSet->isModified() || $this->aAttributeSet->isNew()) {
                    $affectedRows += $this->aAttributeSet->save($con);
                }
                $this->setAttributeSet($this->aAttributeSet);
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

            if ($this->bundleProductBundlesScheduledForDeletion !== null) {
                if (!$this->bundleProductBundlesScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->bundleProductBundlesScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($remotePk, $pk);
                    }
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->bundleProductBundlesScheduledForDeletion = null;
                }

                foreach ($this->getBundleProductBundles() as $bundleProductBundle) {
                    if ($bundleProductBundle->isModified()) {
                        $bundleProductBundle->save($con);
                    }
                }
            } elseif ($this->collBundleProductBundles) {
                foreach ($this->collBundleProductBundles as $bundleProductBundle) {
                    if ($bundleProductBundle->isModified()) {
                        $bundleProductBundle->save($con);
                    }
                }
            }

            if ($this->optionsScheduledForDeletion !== null) {
                if (!$this->optionsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->optionsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->optionsScheduledForDeletion = null;
                }

                foreach ($this->getOptions() as $option) {
                    if ($option->isModified()) {
                        $option->save($con);
                    }
                }
            } elseif ($this->collOptions) {
                foreach ($this->collOptions as $option) {
                    if ($option->isModified()) {
                        $option->save($con);
                    }
                }
            }

            if ($this->singleBundle !== null) {
                if (!$this->singleBundle->isDeleted() && ($this->singleBundle->isNew() || $this->singleBundle->isModified())) {
                        $affectedRows += $this->singleBundle->save($con);
                }
            }

            if ($this->bundleProductsScheduledForDeletion !== null) {
                if (!$this->bundleProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery::create()
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

            if ($this->singleSingleEntity !== null) {
                if (!$this->singleSingleEntity->isDeleted() && ($this->singleSingleEntity->isNew() || $this->singleSingleEntity->isModified())) {
                        $affectedRows += $this->singleSingleEntity->save($con);
                }
            }

            if ($this->singleConfigEntity !== null) {
                if (!$this->singleConfigEntity->isDeleted() && ($this->singleConfigEntity->isNew() || $this->singleConfigEntity->isModified())) {
                        $affectedRows += $this->singleConfigEntity->save($con);
                }
            }

            if ($this->singleSimpleEntity !== null) {
                if (!$this->singleSimpleEntity->isDeleted() && ($this->singleSimpleEntity->isNew() || $this->singleSimpleEntity->isModified())) {
                        $affectedRows += $this->singleSimpleEntity->save($con);
                }
            }

            if ($this->optionMultisScheduledForDeletion !== null) {
                if (!$this->optionMultisScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery::create()
                        ->filterByPrimaryKeys($this->optionMultisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->optionMultisScheduledForDeletion = null;
                }
            }

            if ($this->collOptionMultis !== null) {
                foreach ($this->collOptionMultis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->optionSinglesScheduledForDeletion !== null) {
                if (!$this->optionSinglesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery::create()
                        ->filterByPrimaryKeys($this->optionSinglesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->optionSinglesScheduledForDeletion = null;
                }
            }

            if ($this->collOptionSingles !== null) {
                foreach ($this->collOptionSingles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->integersScheduledForDeletion !== null) {
                if (!$this->integersScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery::create()
                        ->filterByPrimaryKeys($this->integersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->integersScheduledForDeletion = null;
                }
            }

            if ($this->collIntegers !== null) {
                foreach ($this->collIntegers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->timestampsScheduledForDeletion !== null) {
                if (!$this->timestampsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery::create()
                        ->filterByPrimaryKeys($this->timestampsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->timestampsScheduledForDeletion = null;
                }
            }

            if ($this->collTimestamps !== null) {
                foreach ($this->collTimestamps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->decimalsScheduledForDeletion !== null) {
                if (!$this->decimalsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery::create()
                        ->filterByPrimaryKeys($this->decimalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->decimalsScheduledForDeletion = null;
                }
            }

            if ($this->collDecimals !== null) {
                foreach ($this->collDecimals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->textsScheduledForDeletion !== null) {
                if (!$this->textsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery::create()
                        ->filterByPrimaryKeys($this->textsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->textsScheduledForDeletion = null;
                }
            }

            if ($this->collTexts !== null) {
                foreach ($this->collTexts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->booleansScheduledForDeletion !== null) {
                if (!$this->booleansScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery::create()
                        ->filterByPrimaryKeys($this->booleansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->booleansScheduledForDeletion = null;
                }
            }

            if ($this->collBooleans !== null) {
                foreach ($this->collBooleans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productCategoriesScheduledForDeletion !== null) {
                if (!$this->productCategoriesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategoryQuery::create()
                        ->filterByPrimaryKeys($this->productCategoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productCategoriesScheduledForDeletion = null;
                }
            }

            if ($this->collProductCategories !== null) {
                foreach ($this->collProductCategories as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productOptionsScheduledForDeletion !== null) {
                if (!$this->productOptionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery::create()
                        ->filterByPrimaryKeys($this->productOptionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productOptionsScheduledForDeletion = null;
                }
            }

            if ($this->collProductOptions !== null) {
                foreach ($this->collProductOptions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacCmsBlockProductsScheduledForDeletion !== null) {
                if (!$this->pacCmsBlockProductsScheduledForDeletion->isEmpty()) {
                    foreach ($this->pacCmsBlockProductsScheduledForDeletion as $pacCmsBlockProduct) {
                        // need to save related object because we set the relation to null
                        $pacCmsBlockProduct->save($con);
                    }
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

            if ($this->productImagesScheduledForDeletion !== null) {
                if (!$this->productImagesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery::create()
                        ->filterByPrimaryKeys($this->productImagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productImagesScheduledForDeletion = null;
                }
            }

            if ($this->collProductImages !== null) {
                foreach ($this->collProductImages as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_product`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::SKU)) {
            $modifiedColumns[':p' . $index++]  = '`sku`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::IS_ITEM)) {
            $modifiedColumns[':p' . $index++]  = '`is_item`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::VARIETY)) {
            $modifiedColumns[':p' . $index++]  = '`variety`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET)) {
            $modifiedColumns[':p' . $index++]  = '`fk_catalog_attribute_set`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CACHE)) {
            $modifiedColumns[':p' . $index++]  = '`cache`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_catalog_product` (%s) VALUES (%s)',
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
                    case '`sku`':
                        $stmt->bindValue($identifier, $this->sku, PDO::PARAM_STR);
                        break;
                    case '`is_item`':
                        $stmt->bindValue($identifier, (int) $this->is_item, PDO::PARAM_INT);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case '`variety`':
                        $stmt->bindValue($identifier, $this->variety, PDO::PARAM_STR);
                        break;
                    case '`fk_catalog_attribute_set`':
                        $stmt->bindValue($identifier, $this->fk_catalog_attribute_set, PDO::PARAM_INT);
                        break;
                    case '`cache`':
                        $stmt->bindValue($identifier, $this->cache, PDO::PARAM_STR);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
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
            $this->setIdCatalogProduct($pk);
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

            if ($this->aAttributeSet !== null) {
                if (!$this->aAttributeSet->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAttributeSet->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->singleBundle !== null) {
                    if (!$this->singleBundle->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleBundle->getValidationFailures());
                    }
                }

                if ($this->collBundleProducts !== null) {
                    foreach ($this->collBundleProducts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleSingleEntity !== null) {
                    if (!$this->singleSingleEntity->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSingleEntity->getValidationFailures());
                    }
                }

                if ($this->singleConfigEntity !== null) {
                    if (!$this->singleConfigEntity->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleConfigEntity->getValidationFailures());
                    }
                }

                if ($this->singleSimpleEntity !== null) {
                    if (!$this->singleSimpleEntity->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSimpleEntity->getValidationFailures());
                    }
                }

                if ($this->collOptionMultis !== null) {
                    foreach ($this->collOptionMultis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOptionSingles !== null) {
                    foreach ($this->collOptionSingles as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collIntegers !== null) {
                    foreach ($this->collIntegers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTimestamps !== null) {
                    foreach ($this->collTimestamps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDecimals !== null) {
                    foreach ($this->collDecimals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTexts !== null) {
                    foreach ($this->collTexts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBooleans !== null) {
                    foreach ($this->collBooleans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductCategories !== null) {
                    foreach ($this->collProductCategories as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductOptions !== null) {
                    foreach ($this->collProductOptions as $referrerFK) {
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

                if ($this->collProductImages !== null) {
                    foreach ($this->collProductImages as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
            case 1:
                return $this->getSku();
                break;
            case 2:
                return $this->getIsItem();
                break;
            case 3:
                return $this->getStatus();
                break;
            case 4:
                return $this->getVariety();
                break;
            case 5:
                return $this->getFkCatalogAttributeSet();
                break;
            case 6:
                return $this->getCache();
                break;
            case 7:
                return $this->getCreatedAt();
                break;
            case 8:
                return $this->getUpdatedAt();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCatalogProduct(),
            $keys[1] => $this->getSku(),
            $keys[2] => $this->getIsItem(),
            $keys[3] => $this->getStatus(),
            $keys[4] => $this->getVariety(),
            $keys[5] => $this->getFkCatalogAttributeSet(),
            $keys[6] => $this->getCache(),
            $keys[7] => $this->getCreatedAt(),
            $keys[8] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aAttributeSet) {
                $result['AttributeSet'] = $this->aAttributeSet->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleBundle) {
                $result['Bundle'] = $this->singleBundle->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBundleProducts) {
                $result['BundleProducts'] = $this->collBundleProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleSingleEntity) {
                $result['SingleEntity'] = $this->singleSingleEntity->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleConfigEntity) {
                $result['ConfigEntity'] = $this->singleConfigEntity->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleSimpleEntity) {
                $result['SimpleEntity'] = $this->singleSimpleEntity->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collOptionMultis) {
                $result['OptionMultis'] = $this->collOptionMultis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOptionSingles) {
                $result['OptionSingles'] = $this->collOptionSingles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collIntegers) {
                $result['Integers'] = $this->collIntegers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTimestamps) {
                $result['Timestamps'] = $this->collTimestamps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDecimals) {
                $result['Decimals'] = $this->collDecimals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTexts) {
                $result['Texts'] = $this->collTexts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBooleans) {
                $result['Booleans'] = $this->collBooleans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductCategories) {
                $result['ProductCategories'] = $this->collProductCategories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductOptions) {
                $result['ProductOptions'] = $this->collProductOptions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacCmsBlockProducts) {
                $result['PacCmsBlockProducts'] = $this->collPacCmsBlockProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductImages) {
                $result['ProductImages'] = $this->collProductImages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
            case 1:
                $this->setSku($value);
                break;
            case 2:
                $this->setIsItem($value);
                break;
            case 3:
                $this->setStatus($value);
                break;
            case 4:
                $this->setVariety($value);
                break;
            case 5:
                $this->setFkCatalogAttributeSet($value);
                break;
            case 6:
                $this->setCache($value);
                break;
            case 7:
                $this->setCreatedAt($value);
                break;
            case 8:
                $this->setUpdatedAt($value);
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
        $keys = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCatalogProduct($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSku($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIsItem($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setStatus($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setVariety($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFkCatalogAttributeSet($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCache($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $this->id_catalog_product);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::SKU)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::SKU, $this->sku);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::IS_ITEM)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::IS_ITEM, $this->is_item);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::STATUS)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::STATUS, $this->status);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::VARIETY)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::VARIETY, $this->variety);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, $this->fk_catalog_attribute_set);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CACHE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CACHE, $this->cache);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $this->id_catalog_product);

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
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSku($this->getSku());
        $copyObj->setIsItem($this->getIsItem());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setVariety($this->getVariety());
        $copyObj->setFkCatalogAttributeSet($this->getFkCatalogAttributeSet());
        $copyObj->setCache($this->getCache());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            $relObj = $this->getBundle();
            if ($relObj) {
                $copyObj->setBundle($relObj->copy($deepCopy));
            }

            foreach ($this->getBundleProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBundleProduct($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getSingleEntity();
            if ($relObj) {
                $copyObj->setSingleEntity($relObj->copy($deepCopy));
            }

            $relObj = $this->getConfigEntity();
            if ($relObj) {
                $copyObj->setConfigEntity($relObj->copy($deepCopy));
            }

            $relObj = $this->getSimpleEntity();
            if ($relObj) {
                $copyObj->setSimpleEntity($relObj->copy($deepCopy));
            }

            foreach ($this->getOptionMultis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOptionMulti($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOptionSingles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOptionSingle($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getIntegers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInteger($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTimestamps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTimestamp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDecimals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDecimal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTexts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addText($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBooleans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBoolean($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductCategories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductCategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductOptions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductOption($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacCmsBlockProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsBlockProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductImages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductImage($relObj->copy($deepCopy));
                }
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet object.
     *
     * @param                  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $v
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAttributeSet(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $v = null)
    {
        if ($v === null) {
            $this->setFkCatalogAttributeSet(NULL);
        } else {
            $this->setFkCatalogAttributeSet($v->getIdCatalogAttributeSet());
        }

        $this->aAttributeSet = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet object, it will not be re-added.
        if ($v !== null) {
            $v->addProductEntity($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet The associated ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet object.
     * @throws PropelException
     */
    public function getAttributeSet(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAttributeSet === null && ($this->fk_catalog_attribute_set !== null) && $doQuery) {
            $this->aAttributeSet = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSetQuery::create()->findPk($this->fk_catalog_attribute_set, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAttributeSet->addProductEntities($this);
             */
        }

        return $this->aAttributeSet;
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
        if ('OptionMulti' == $relationName) {
            $this->initOptionMultis();
        }
        if ('OptionSingle' == $relationName) {
            $this->initOptionSingles();
        }
        if ('Integer' == $relationName) {
            $this->initIntegers();
        }
        if ('Timestamp' == $relationName) {
            $this->initTimestamps();
        }
        if ('Decimal' == $relationName) {
            $this->initDecimals();
        }
        if ('Text' == $relationName) {
            $this->initTexts();
        }
        if ('Boolean' == $relationName) {
            $this->initBooleans();
        }
        if ('ProductCategory' == $relationName) {
            $this->initProductCategories();
        }
        if ('ProductOption' == $relationName) {
            $this->initProductOptions();
        }
        if ('PacCmsBlockProduct' == $relationName) {
            $this->initPacCmsBlockProducts();
        }
        if ('ProductImage' == $relationName) {
            $this->initProductImages();
        }
    }

    /**
     * Gets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle
     * @throws PropelException
     */
    public function getBundle(PropelPDO $con = null)
    {

        if ($this->singleBundle === null && !$this->isNew()) {
            $this->singleBundle = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleBundle;
    }

    /**
     * Sets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object as related to this object by a one-to-one relationship.
     *
     * @param                  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $v ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBundle(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $v = null)
    {
        $this->singleBundle = $v;

        // Make sure that that the passed-in ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle isn't already associated with this object
        if ($v !== null && $v->getProductEntity(null, false) === null) {
            $v->setProductEntity($this);
        }

        return $this;
    }

    /**
     * Clears out the collBundleProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
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
        $this->collBundleProducts->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects
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
                $collBundleProducts = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery::create(null, $criteria)
                    ->filterByBundleProductProduct($this)
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setBundleProducts(PropelCollection $bundleProducts, PropelPDO $con = null)
    {
        $bundleProductsToDelete = $this->getBundleProducts(new Criteria(), $con)->diff($bundleProducts);


        $this->bundleProductsScheduledForDeletion = $bundleProductsToDelete;

        foreach ($bundleProductsToDelete as $bundleProductRemoved) {
            $bundleProductRemoved->setBundleProductProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects.
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
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBundleProductProduct($this)
                ->count($con);
        }

        return count($this->collBundleProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addBundleProduct(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct $l)
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
        $bundleProduct->setBundleProductProduct($this);
    }

    /**
     * @param	BundleProduct $bundleProduct The bundleProduct object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
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
            $bundleProduct->setBundleProductProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related BundleProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct objects
     */
    public function getBundleProductsJoinBundleProductBundle($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProductQuery::create(null, $criteria);
        $query->joinWith('BundleProductBundle', $join_behavior);

        return $this->getBundleProducts($query, $con);
    }

    /**
     * Gets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle
     * @throws PropelException
     */
    public function getSingleEntity(PropelPDO $con = null)
    {

        if ($this->singleSingleEntity === null && !$this->isNew()) {
            $this->singleSingleEntity = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingleQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSingleEntity;
    }

    /**
     * Sets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle object as related to this object by a one-to-one relationship.
     *
     * @param                  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle $v ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSingleEntity(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle $v = null)
    {
        $this->singleSingleEntity = $v;

        // Make sure that that the passed-in ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle isn't already associated with this object
        if ($v !== null && $v->getProductEntity(null, false) === null) {
            $v->setProductEntity($this);
        }

        return $this;
    }

    /**
     * Gets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig
     * @throws PropelException
     */
    public function getConfigEntity(PropelPDO $con = null)
    {

        if ($this->singleConfigEntity === null && !$this->isNew()) {
            $this->singleConfigEntity = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfigQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleConfigEntity;
    }

    /**
     * Sets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig object as related to this object by a one-to-one relationship.
     *
     * @param                  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig $v ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setConfigEntity(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig $v = null)
    {
        $this->singleConfigEntity = $v;

        // Make sure that that the passed-in ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig isn't already associated with this object
        if ($v !== null && $v->getProductEntity(null, false) === null) {
            $v->setProductEntity($this);
        }

        return $this;
    }

    /**
     * Gets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple
     * @throws PropelException
     */
    public function getSimpleEntity(PropelPDO $con = null)
    {

        if ($this->singleSimpleEntity === null && !$this->isNew()) {
            $this->singleSimpleEntity = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimpleQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSimpleEntity;
    }

    /**
     * Sets a single ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple object as related to this object by a one-to-one relationship.
     *
     * @param                  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple $v ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSimpleEntity(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple $v = null)
    {
        $this->singleSimpleEntity = $v;

        // Make sure that that the passed-in ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple isn't already associated with this object
        if ($v !== null && $v->getProductEntity(null, false) === null) {
            $v->setProductEntity($this);
        }

        return $this;
    }

    /**
     * Clears out the collOptionMultis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addOptionMultis()
     */
    public function clearOptionMultis()
    {
        $this->collOptionMultis = null; // important to set this to null since that means it is uninitialized
        $this->collOptionMultisPartial = null;

        return $this;
    }

    /**
     * reset is the collOptionMultis collection loaded partially
     *
     * @return void
     */
    public function resetPartialOptionMultis($v = true)
    {
        $this->collOptionMultisPartial = $v;
    }

    /**
     * Initializes the collOptionMultis collection.
     *
     * By default this just sets the collOptionMultis collection to an empty array (like clearcollOptionMultis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOptionMultis($overrideExisting = true)
    {
        if (null !== $this->collOptionMultis && !$overrideExisting) {
            return;
        }
        $this->collOptionMultis = new PropelObjectCollection();
        $this->collOptionMultis->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects
     * @throws PropelException
     */
    public function getOptionMultis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOptionMultisPartial && !$this->isNew();
        if (null === $this->collOptionMultis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOptionMultis) {
                // return empty collection
                $this->initOptionMultis();
            } else {
                $collOptionMultis = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionMultisPartial && count($collOptionMultis)) {
                      $this->initOptionMultis(false);

                      foreach ($collOptionMultis as $obj) {
                        if (false == $this->collOptionMultis->contains($obj)) {
                          $this->collOptionMultis->append($obj);
                        }
                      }

                      $this->collOptionMultisPartial = true;
                    }

                    $collOptionMultis->getInternalIterator()->rewind();

                    return $collOptionMultis;
                }

                if ($partial && $this->collOptionMultis) {
                    foreach ($this->collOptionMultis as $obj) {
                        if ($obj->isNew()) {
                            $collOptionMultis[] = $obj;
                        }
                    }
                }

                $this->collOptionMultis = $collOptionMultis;
                $this->collOptionMultisPartial = false;
            }
        }

        return $this->collOptionMultis;
    }

    /**
     * Sets a collection of OptionMulti objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $optionMultis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setOptionMultis(PropelCollection $optionMultis, PropelPDO $con = null)
    {
        $optionMultisToDelete = $this->getOptionMultis(new Criteria(), $con)->diff($optionMultis);


        $this->optionMultisScheduledForDeletion = $optionMultisToDelete;

        foreach ($optionMultisToDelete as $optionMultiRemoved) {
            $optionMultiRemoved->setProductEntity(null);
        }

        $this->collOptionMultis = null;
        foreach ($optionMultis as $optionMulti) {
            $this->addOptionMulti($optionMulti);
        }

        $this->collOptionMultis = $optionMultis;
        $this->collOptionMultisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects.
     * @throws PropelException
     */
    public function countOptionMultis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionMultisPartial && !$this->isNew();
        if (null === $this->collOptionMultis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptionMultis) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOptionMultis());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collOptionMultis);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addOptionMulti(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti $l)
    {
        if ($this->collOptionMultis === null) {
            $this->initOptionMultis();
            $this->collOptionMultisPartial = true;
        }

        if (!in_array($l, $this->collOptionMultis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOptionMulti($l);

            if ($this->optionMultisScheduledForDeletion and $this->optionMultisScheduledForDeletion->contains($l)) {
                $this->optionMultisScheduledForDeletion->remove($this->optionMultisScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	OptionMulti $optionMulti The optionMulti object to add.
     */
    protected function doAddOptionMulti($optionMulti)
    {
        $this->collOptionMultis[]= $optionMulti;
        $optionMulti->setProductEntity($this);
    }

    /**
     * @param	OptionMulti $optionMulti The optionMulti object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeOptionMulti($optionMulti)
    {
        if ($this->getOptionMultis()->contains($optionMulti)) {
            $this->collOptionMultis->remove($this->collOptionMultis->search($optionMulti));
            if (null === $this->optionMultisScheduledForDeletion) {
                $this->optionMultisScheduledForDeletion = clone $this->collOptionMultis;
                $this->optionMultisScheduledForDeletion->clear();
            }
            $this->optionMultisScheduledForDeletion[]= clone $optionMulti;
            $optionMulti->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related OptionMultis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects
     */
    public function getOptionMultisJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getOptionMultis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related OptionMultis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects
     */
    public function getOptionMultisJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getOptionMultis($query, $con);
    }

    /**
     * Clears out the collOptionSingles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addOptionSingles()
     */
    public function clearOptionSingles()
    {
        $this->collOptionSingles = null; // important to set this to null since that means it is uninitialized
        $this->collOptionSinglesPartial = null;

        return $this;
    }

    /**
     * reset is the collOptionSingles collection loaded partially
     *
     * @return void
     */
    public function resetPartialOptionSingles($v = true)
    {
        $this->collOptionSinglesPartial = $v;
    }

    /**
     * Initializes the collOptionSingles collection.
     *
     * By default this just sets the collOptionSingles collection to an empty array (like clearcollOptionSingles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOptionSingles($overrideExisting = true)
    {
        if (null !== $this->collOptionSingles && !$overrideExisting) {
            return;
        }
        $this->collOptionSingles = new PropelObjectCollection();
        $this->collOptionSingles->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle objects
     * @throws PropelException
     */
    public function getOptionSingles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOptionSinglesPartial && !$this->isNew();
        if (null === $this->collOptionSingles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOptionSingles) {
                // return empty collection
                $this->initOptionSingles();
            } else {
                $collOptionSingles = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionSinglesPartial && count($collOptionSingles)) {
                      $this->initOptionSingles(false);

                      foreach ($collOptionSingles as $obj) {
                        if (false == $this->collOptionSingles->contains($obj)) {
                          $this->collOptionSingles->append($obj);
                        }
                      }

                      $this->collOptionSinglesPartial = true;
                    }

                    $collOptionSingles->getInternalIterator()->rewind();

                    return $collOptionSingles;
                }

                if ($partial && $this->collOptionSingles) {
                    foreach ($this->collOptionSingles as $obj) {
                        if ($obj->isNew()) {
                            $collOptionSingles[] = $obj;
                        }
                    }
                }

                $this->collOptionSingles = $collOptionSingles;
                $this->collOptionSinglesPartial = false;
            }
        }

        return $this->collOptionSingles;
    }

    /**
     * Sets a collection of OptionSingle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $optionSingles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setOptionSingles(PropelCollection $optionSingles, PropelPDO $con = null)
    {
        $optionSinglesToDelete = $this->getOptionSingles(new Criteria(), $con)->diff($optionSingles);


        $this->optionSinglesScheduledForDeletion = $optionSinglesToDelete;

        foreach ($optionSinglesToDelete as $optionSingleRemoved) {
            $optionSingleRemoved->setProductEntity(null);
        }

        $this->collOptionSingles = null;
        foreach ($optionSingles as $optionSingle) {
            $this->addOptionSingle($optionSingle);
        }

        $this->collOptionSingles = $optionSingles;
        $this->collOptionSinglesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle objects.
     * @throws PropelException
     */
    public function countOptionSingles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionSinglesPartial && !$this->isNew();
        if (null === $this->collOptionSingles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptionSingles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOptionSingles());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collOptionSingles);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addOptionSingle(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle $l)
    {
        if ($this->collOptionSingles === null) {
            $this->initOptionSingles();
            $this->collOptionSinglesPartial = true;
        }

        if (!in_array($l, $this->collOptionSingles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOptionSingle($l);

            if ($this->optionSinglesScheduledForDeletion and $this->optionSinglesScheduledForDeletion->contains($l)) {
                $this->optionSinglesScheduledForDeletion->remove($this->optionSinglesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	OptionSingle $optionSingle The optionSingle object to add.
     */
    protected function doAddOptionSingle($optionSingle)
    {
        $this->collOptionSingles[]= $optionSingle;
        $optionSingle->setProductEntity($this);
    }

    /**
     * @param	OptionSingle $optionSingle The optionSingle object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeOptionSingle($optionSingle)
    {
        if ($this->getOptionSingles()->contains($optionSingle)) {
            $this->collOptionSingles->remove($this->collOptionSingles->search($optionSingle));
            if (null === $this->optionSinglesScheduledForDeletion) {
                $this->optionSinglesScheduledForDeletion = clone $this->collOptionSingles;
                $this->optionSinglesScheduledForDeletion->clear();
            }
            $this->optionSinglesScheduledForDeletion[]= clone $optionSingle;
            $optionSingle->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related OptionSingles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle objects
     */
    public function getOptionSinglesJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getOptionSingles($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related OptionSingles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle objects
     */
    public function getOptionSinglesJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getOptionSingles($query, $con);
    }

    /**
     * Clears out the collIntegers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addIntegers()
     */
    public function clearIntegers()
    {
        $this->collIntegers = null; // important to set this to null since that means it is uninitialized
        $this->collIntegersPartial = null;

        return $this;
    }

    /**
     * reset is the collIntegers collection loaded partially
     *
     * @return void
     */
    public function resetPartialIntegers($v = true)
    {
        $this->collIntegersPartial = $v;
    }

    /**
     * Initializes the collIntegers collection.
     *
     * By default this just sets the collIntegers collection to an empty array (like clearcollIntegers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initIntegers($overrideExisting = true)
    {
        if (null !== $this->collIntegers && !$overrideExisting) {
            return;
        }
        $this->collIntegers = new PropelObjectCollection();
        $this->collIntegers->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger objects
     * @throws PropelException
     */
    public function getIntegers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collIntegersPartial && !$this->isNew();
        if (null === $this->collIntegers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collIntegers) {
                // return empty collection
                $this->initIntegers();
            } else {
                $collIntegers = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collIntegersPartial && count($collIntegers)) {
                      $this->initIntegers(false);

                      foreach ($collIntegers as $obj) {
                        if (false == $this->collIntegers->contains($obj)) {
                          $this->collIntegers->append($obj);
                        }
                      }

                      $this->collIntegersPartial = true;
                    }

                    $collIntegers->getInternalIterator()->rewind();

                    return $collIntegers;
                }

                if ($partial && $this->collIntegers) {
                    foreach ($this->collIntegers as $obj) {
                        if ($obj->isNew()) {
                            $collIntegers[] = $obj;
                        }
                    }
                }

                $this->collIntegers = $collIntegers;
                $this->collIntegersPartial = false;
            }
        }

        return $this->collIntegers;
    }

    /**
     * Sets a collection of Integer objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $integers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setIntegers(PropelCollection $integers, PropelPDO $con = null)
    {
        $integersToDelete = $this->getIntegers(new Criteria(), $con)->diff($integers);


        $this->integersScheduledForDeletion = $integersToDelete;

        foreach ($integersToDelete as $integerRemoved) {
            $integerRemoved->setProductEntity(null);
        }

        $this->collIntegers = null;
        foreach ($integers as $integer) {
            $this->addInteger($integer);
        }

        $this->collIntegers = $integers;
        $this->collIntegersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger objects.
     * @throws PropelException
     */
    public function countIntegers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collIntegersPartial && !$this->isNew();
        if (null === $this->collIntegers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collIntegers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getIntegers());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collIntegers);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addInteger(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger $l)
    {
        if ($this->collIntegers === null) {
            $this->initIntegers();
            $this->collIntegersPartial = true;
        }

        if (!in_array($l, $this->collIntegers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInteger($l);

            if ($this->integersScheduledForDeletion and $this->integersScheduledForDeletion->contains($l)) {
                $this->integersScheduledForDeletion->remove($this->integersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Integer $integer The integer object to add.
     */
    protected function doAddInteger($integer)
    {
        $this->collIntegers[]= $integer;
        $integer->setProductEntity($this);
    }

    /**
     * @param	Integer $integer The integer object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeInteger($integer)
    {
        if ($this->getIntegers()->contains($integer)) {
            $this->collIntegers->remove($this->collIntegers->search($integer));
            if (null === $this->integersScheduledForDeletion) {
                $this->integersScheduledForDeletion = clone $this->collIntegers;
                $this->integersScheduledForDeletion->clear();
            }
            $this->integersScheduledForDeletion[]= clone $integer;
            $integer->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related Integers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger objects
     */
    public function getIntegersJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueIntegerQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getIntegers($query, $con);
    }

    /**
     * Clears out the collTimestamps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addTimestamps()
     */
    public function clearTimestamps()
    {
        $this->collTimestamps = null; // important to set this to null since that means it is uninitialized
        $this->collTimestampsPartial = null;

        return $this;
    }

    /**
     * reset is the collTimestamps collection loaded partially
     *
     * @return void
     */
    public function resetPartialTimestamps($v = true)
    {
        $this->collTimestampsPartial = $v;
    }

    /**
     * Initializes the collTimestamps collection.
     *
     * By default this just sets the collTimestamps collection to an empty array (like clearcollTimestamps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTimestamps($overrideExisting = true)
    {
        if (null !== $this->collTimestamps && !$overrideExisting) {
            return;
        }
        $this->collTimestamps = new PropelObjectCollection();
        $this->collTimestamps->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp objects
     * @throws PropelException
     */
    public function getTimestamps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTimestampsPartial && !$this->isNew();
        if (null === $this->collTimestamps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTimestamps) {
                // return empty collection
                $this->initTimestamps();
            } else {
                $collTimestamps = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTimestampsPartial && count($collTimestamps)) {
                      $this->initTimestamps(false);

                      foreach ($collTimestamps as $obj) {
                        if (false == $this->collTimestamps->contains($obj)) {
                          $this->collTimestamps->append($obj);
                        }
                      }

                      $this->collTimestampsPartial = true;
                    }

                    $collTimestamps->getInternalIterator()->rewind();

                    return $collTimestamps;
                }

                if ($partial && $this->collTimestamps) {
                    foreach ($this->collTimestamps as $obj) {
                        if ($obj->isNew()) {
                            $collTimestamps[] = $obj;
                        }
                    }
                }

                $this->collTimestamps = $collTimestamps;
                $this->collTimestampsPartial = false;
            }
        }

        return $this->collTimestamps;
    }

    /**
     * Sets a collection of Timestamp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $timestamps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setTimestamps(PropelCollection $timestamps, PropelPDO $con = null)
    {
        $timestampsToDelete = $this->getTimestamps(new Criteria(), $con)->diff($timestamps);


        $this->timestampsScheduledForDeletion = $timestampsToDelete;

        foreach ($timestampsToDelete as $timestampRemoved) {
            $timestampRemoved->setProductEntity(null);
        }

        $this->collTimestamps = null;
        foreach ($timestamps as $timestamp) {
            $this->addTimestamp($timestamp);
        }

        $this->collTimestamps = $timestamps;
        $this->collTimestampsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp objects.
     * @throws PropelException
     */
    public function countTimestamps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTimestampsPartial && !$this->isNew();
        if (null === $this->collTimestamps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTimestamps) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTimestamps());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collTimestamps);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addTimestamp(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp $l)
    {
        if ($this->collTimestamps === null) {
            $this->initTimestamps();
            $this->collTimestampsPartial = true;
        }

        if (!in_array($l, $this->collTimestamps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTimestamp($l);

            if ($this->timestampsScheduledForDeletion and $this->timestampsScheduledForDeletion->contains($l)) {
                $this->timestampsScheduledForDeletion->remove($this->timestampsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Timestamp $timestamp The timestamp object to add.
     */
    protected function doAddTimestamp($timestamp)
    {
        $this->collTimestamps[]= $timestamp;
        $timestamp->setProductEntity($this);
    }

    /**
     * @param	Timestamp $timestamp The timestamp object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeTimestamp($timestamp)
    {
        if ($this->getTimestamps()->contains($timestamp)) {
            $this->collTimestamps->remove($this->collTimestamps->search($timestamp));
            if (null === $this->timestampsScheduledForDeletion) {
                $this->timestampsScheduledForDeletion = clone $this->collTimestamps;
                $this->timestampsScheduledForDeletion->clear();
            }
            $this->timestampsScheduledForDeletion[]= clone $timestamp;
            $timestamp->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related Timestamps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp objects
     */
    public function getTimestampsJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestampQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getTimestamps($query, $con);
    }

    /**
     * Clears out the collDecimals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addDecimals()
     */
    public function clearDecimals()
    {
        $this->collDecimals = null; // important to set this to null since that means it is uninitialized
        $this->collDecimalsPartial = null;

        return $this;
    }

    /**
     * reset is the collDecimals collection loaded partially
     *
     * @return void
     */
    public function resetPartialDecimals($v = true)
    {
        $this->collDecimalsPartial = $v;
    }

    /**
     * Initializes the collDecimals collection.
     *
     * By default this just sets the collDecimals collection to an empty array (like clearcollDecimals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDecimals($overrideExisting = true)
    {
        if (null !== $this->collDecimals && !$overrideExisting) {
            return;
        }
        $this->collDecimals = new PropelObjectCollection();
        $this->collDecimals->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal objects
     * @throws PropelException
     */
    public function getDecimals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDecimalsPartial && !$this->isNew();
        if (null === $this->collDecimals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDecimals) {
                // return empty collection
                $this->initDecimals();
            } else {
                $collDecimals = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDecimalsPartial && count($collDecimals)) {
                      $this->initDecimals(false);

                      foreach ($collDecimals as $obj) {
                        if (false == $this->collDecimals->contains($obj)) {
                          $this->collDecimals->append($obj);
                        }
                      }

                      $this->collDecimalsPartial = true;
                    }

                    $collDecimals->getInternalIterator()->rewind();

                    return $collDecimals;
                }

                if ($partial && $this->collDecimals) {
                    foreach ($this->collDecimals as $obj) {
                        if ($obj->isNew()) {
                            $collDecimals[] = $obj;
                        }
                    }
                }

                $this->collDecimals = $collDecimals;
                $this->collDecimalsPartial = false;
            }
        }

        return $this->collDecimals;
    }

    /**
     * Sets a collection of Decimal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $decimals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setDecimals(PropelCollection $decimals, PropelPDO $con = null)
    {
        $decimalsToDelete = $this->getDecimals(new Criteria(), $con)->diff($decimals);


        $this->decimalsScheduledForDeletion = $decimalsToDelete;

        foreach ($decimalsToDelete as $decimalRemoved) {
            $decimalRemoved->setProductEntity(null);
        }

        $this->collDecimals = null;
        foreach ($decimals as $decimal) {
            $this->addDecimal($decimal);
        }

        $this->collDecimals = $decimals;
        $this->collDecimalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal objects.
     * @throws PropelException
     */
    public function countDecimals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDecimalsPartial && !$this->isNew();
        if (null === $this->collDecimals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDecimals) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDecimals());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collDecimals);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addDecimal(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal $l)
    {
        if ($this->collDecimals === null) {
            $this->initDecimals();
            $this->collDecimalsPartial = true;
        }

        if (!in_array($l, $this->collDecimals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDecimal($l);

            if ($this->decimalsScheduledForDeletion and $this->decimalsScheduledForDeletion->contains($l)) {
                $this->decimalsScheduledForDeletion->remove($this->decimalsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Decimal $decimal The decimal object to add.
     */
    protected function doAddDecimal($decimal)
    {
        $this->collDecimals[]= $decimal;
        $decimal->setProductEntity($this);
    }

    /**
     * @param	Decimal $decimal The decimal object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeDecimal($decimal)
    {
        if ($this->getDecimals()->contains($decimal)) {
            $this->collDecimals->remove($this->collDecimals->search($decimal));
            if (null === $this->decimalsScheduledForDeletion) {
                $this->decimalsScheduledForDeletion = clone $this->collDecimals;
                $this->decimalsScheduledForDeletion->clear();
            }
            $this->decimalsScheduledForDeletion[]= clone $decimal;
            $decimal->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related Decimals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal objects
     */
    public function getDecimalsJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimalQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getDecimals($query, $con);
    }

    /**
     * Clears out the collTexts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addTexts()
     */
    public function clearTexts()
    {
        $this->collTexts = null; // important to set this to null since that means it is uninitialized
        $this->collTextsPartial = null;

        return $this;
    }

    /**
     * reset is the collTexts collection loaded partially
     *
     * @return void
     */
    public function resetPartialTexts($v = true)
    {
        $this->collTextsPartial = $v;
    }

    /**
     * Initializes the collTexts collection.
     *
     * By default this just sets the collTexts collection to an empty array (like clearcollTexts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTexts($overrideExisting = true)
    {
        if (null !== $this->collTexts && !$overrideExisting) {
            return;
        }
        $this->collTexts = new PropelObjectCollection();
        $this->collTexts->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText objects
     * @throws PropelException
     */
    public function getTexts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTextsPartial && !$this->isNew();
        if (null === $this->collTexts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTexts) {
                // return empty collection
                $this->initTexts();
            } else {
                $collTexts = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTextsPartial && count($collTexts)) {
                      $this->initTexts(false);

                      foreach ($collTexts as $obj) {
                        if (false == $this->collTexts->contains($obj)) {
                          $this->collTexts->append($obj);
                        }
                      }

                      $this->collTextsPartial = true;
                    }

                    $collTexts->getInternalIterator()->rewind();

                    return $collTexts;
                }

                if ($partial && $this->collTexts) {
                    foreach ($this->collTexts as $obj) {
                        if ($obj->isNew()) {
                            $collTexts[] = $obj;
                        }
                    }
                }

                $this->collTexts = $collTexts;
                $this->collTextsPartial = false;
            }
        }

        return $this->collTexts;
    }

    /**
     * Sets a collection of Text objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $texts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setTexts(PropelCollection $texts, PropelPDO $con = null)
    {
        $textsToDelete = $this->getTexts(new Criteria(), $con)->diff($texts);


        $this->textsScheduledForDeletion = $textsToDelete;

        foreach ($textsToDelete as $textRemoved) {
            $textRemoved->setProductEntity(null);
        }

        $this->collTexts = null;
        foreach ($texts as $text) {
            $this->addText($text);
        }

        $this->collTexts = $texts;
        $this->collTextsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText objects.
     * @throws PropelException
     */
    public function countTexts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTextsPartial && !$this->isNew();
        if (null === $this->collTexts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTexts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTexts());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collTexts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addText(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText $l)
    {
        if ($this->collTexts === null) {
            $this->initTexts();
            $this->collTextsPartial = true;
        }

        if (!in_array($l, $this->collTexts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddText($l);

            if ($this->textsScheduledForDeletion and $this->textsScheduledForDeletion->contains($l)) {
                $this->textsScheduledForDeletion->remove($this->textsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Text $text The text object to add.
     */
    protected function doAddText($text)
    {
        $this->collTexts[]= $text;
        $text->setProductEntity($this);
    }

    /**
     * @param	Text $text The text object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeText($text)
    {
        if ($this->getTexts()->contains($text)) {
            $this->collTexts->remove($this->collTexts->search($text));
            if (null === $this->textsScheduledForDeletion) {
                $this->textsScheduledForDeletion = clone $this->collTexts;
                $this->textsScheduledForDeletion->clear();
            }
            $this->textsScheduledForDeletion[]= clone $text;
            $text->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related Texts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText objects
     */
    public function getTextsJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTextQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getTexts($query, $con);
    }

    /**
     * Clears out the collBooleans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addBooleans()
     */
    public function clearBooleans()
    {
        $this->collBooleans = null; // important to set this to null since that means it is uninitialized
        $this->collBooleansPartial = null;

        return $this;
    }

    /**
     * reset is the collBooleans collection loaded partially
     *
     * @return void
     */
    public function resetPartialBooleans($v = true)
    {
        $this->collBooleansPartial = $v;
    }

    /**
     * Initializes the collBooleans collection.
     *
     * By default this just sets the collBooleans collection to an empty array (like clearcollBooleans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBooleans($overrideExisting = true)
    {
        if (null !== $this->collBooleans && !$overrideExisting) {
            return;
        }
        $this->collBooleans = new PropelObjectCollection();
        $this->collBooleans->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean objects
     * @throws PropelException
     */
    public function getBooleans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBooleansPartial && !$this->isNew();
        if (null === $this->collBooleans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBooleans) {
                // return empty collection
                $this->initBooleans();
            } else {
                $collBooleans = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBooleansPartial && count($collBooleans)) {
                      $this->initBooleans(false);

                      foreach ($collBooleans as $obj) {
                        if (false == $this->collBooleans->contains($obj)) {
                          $this->collBooleans->append($obj);
                        }
                      }

                      $this->collBooleansPartial = true;
                    }

                    $collBooleans->getInternalIterator()->rewind();

                    return $collBooleans;
                }

                if ($partial && $this->collBooleans) {
                    foreach ($this->collBooleans as $obj) {
                        if ($obj->isNew()) {
                            $collBooleans[] = $obj;
                        }
                    }
                }

                $this->collBooleans = $collBooleans;
                $this->collBooleansPartial = false;
            }
        }

        return $this->collBooleans;
    }

    /**
     * Sets a collection of Boolean objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $booleans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setBooleans(PropelCollection $booleans, PropelPDO $con = null)
    {
        $booleansToDelete = $this->getBooleans(new Criteria(), $con)->diff($booleans);


        $this->booleansScheduledForDeletion = $booleansToDelete;

        foreach ($booleansToDelete as $booleanRemoved) {
            $booleanRemoved->setProductEntity(null);
        }

        $this->collBooleans = null;
        foreach ($booleans as $boolean) {
            $this->addBoolean($boolean);
        }

        $this->collBooleans = $booleans;
        $this->collBooleansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean objects.
     * @throws PropelException
     */
    public function countBooleans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBooleansPartial && !$this->isNew();
        if (null === $this->collBooleans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBooleans) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBooleans());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collBooleans);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addBoolean(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean $l)
    {
        if ($this->collBooleans === null) {
            $this->initBooleans();
            $this->collBooleansPartial = true;
        }

        if (!in_array($l, $this->collBooleans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBoolean($l);

            if ($this->booleansScheduledForDeletion and $this->booleansScheduledForDeletion->contains($l)) {
                $this->booleansScheduledForDeletion->remove($this->booleansScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Boolean $boolean The boolean object to add.
     */
    protected function doAddBoolean($boolean)
    {
        $this->collBooleans[]= $boolean;
        $boolean->setProductEntity($this);
    }

    /**
     * @param	Boolean $boolean The boolean object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeBoolean($boolean)
    {
        if ($this->getBooleans()->contains($boolean)) {
            $this->collBooleans->remove($this->collBooleans->search($boolean));
            if (null === $this->booleansScheduledForDeletion) {
                $this->booleansScheduledForDeletion = clone $this->collBooleans;
                $this->booleansScheduledForDeletion->clear();
            }
            $this->booleansScheduledForDeletion[]= clone $boolean;
            $boolean->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related Booleans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean objects
     */
    public function getBooleansJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBooleanQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getBooleans($query, $con);
    }

    /**
     * Clears out the collProductCategories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addProductCategories()
     */
    public function clearProductCategories()
    {
        $this->collProductCategories = null; // important to set this to null since that means it is uninitialized
        $this->collProductCategoriesPartial = null;

        return $this;
    }

    /**
     * reset is the collProductCategories collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductCategories($v = true)
    {
        $this->collProductCategoriesPartial = $v;
    }

    /**
     * Initializes the collProductCategories collection.
     *
     * By default this just sets the collProductCategories collection to an empty array (like clearcollProductCategories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductCategories($overrideExisting = true)
    {
        if (null !== $this->collProductCategories && !$overrideExisting) {
            return;
        }
        $this->collProductCategories = new PropelObjectCollection();
        $this->collProductCategories->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory objects
     * @throws PropelException
     */
    public function getProductCategories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductCategoriesPartial && !$this->isNew();
        if (null === $this->collProductCategories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductCategories) {
                // return empty collection
                $this->initProductCategories();
            } else {
                $collProductCategories = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategoryQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductCategoriesPartial && count($collProductCategories)) {
                      $this->initProductCategories(false);

                      foreach ($collProductCategories as $obj) {
                        if (false == $this->collProductCategories->contains($obj)) {
                          $this->collProductCategories->append($obj);
                        }
                      }

                      $this->collProductCategoriesPartial = true;
                    }

                    $collProductCategories->getInternalIterator()->rewind();

                    return $collProductCategories;
                }

                if ($partial && $this->collProductCategories) {
                    foreach ($this->collProductCategories as $obj) {
                        if ($obj->isNew()) {
                            $collProductCategories[] = $obj;
                        }
                    }
                }

                $this->collProductCategories = $collProductCategories;
                $this->collProductCategoriesPartial = false;
            }
        }

        return $this->collProductCategories;
    }

    /**
     * Sets a collection of ProductCategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productCategories A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setProductCategories(PropelCollection $productCategories, PropelPDO $con = null)
    {
        $productCategoriesToDelete = $this->getProductCategories(new Criteria(), $con)->diff($productCategories);


        $this->productCategoriesScheduledForDeletion = $productCategoriesToDelete;

        foreach ($productCategoriesToDelete as $productCategoryRemoved) {
            $productCategoryRemoved->setProduct(null);
        }

        $this->collProductCategories = null;
        foreach ($productCategories as $productCategory) {
            $this->addProductCategory($productCategory);
        }

        $this->collProductCategories = $productCategories;
        $this->collProductCategoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory objects.
     * @throws PropelException
     */
    public function countProductCategories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductCategoriesPartial && !$this->isNew();
        if (null === $this->collProductCategories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductCategories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductCategories());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collProductCategories);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addProductCategory(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory $l)
    {
        if ($this->collProductCategories === null) {
            $this->initProductCategories();
            $this->collProductCategoriesPartial = true;
        }

        if (!in_array($l, $this->collProductCategories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductCategory($l);

            if ($this->productCategoriesScheduledForDeletion and $this->productCategoriesScheduledForDeletion->contains($l)) {
                $this->productCategoriesScheduledForDeletion->remove($this->productCategoriesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ProductCategory $productCategory The productCategory object to add.
     */
    protected function doAddProductCategory($productCategory)
    {
        $this->collProductCategories[]= $productCategory;
        $productCategory->setProduct($this);
    }

    /**
     * @param	ProductCategory $productCategory The productCategory object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeProductCategory($productCategory)
    {
        if ($this->getProductCategories()->contains($productCategory)) {
            $this->collProductCategories->remove($this->collProductCategories->search($productCategory));
            if (null === $this->productCategoriesScheduledForDeletion) {
                $this->productCategoriesScheduledForDeletion = clone $this->collProductCategories;
                $this->productCategoriesScheduledForDeletion->clear();
            }
            $this->productCategoriesScheduledForDeletion[]= clone $productCategory;
            $productCategory->setProduct(null);
        }

        return $this;
    }

    /**
     * Clears out the collProductOptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addProductOptions()
     */
    public function clearProductOptions()
    {
        $this->collProductOptions = null; // important to set this to null since that means it is uninitialized
        $this->collProductOptionsPartial = null;

        return $this;
    }

    /**
     * reset is the collProductOptions collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductOptions($v = true)
    {
        $this->collProductOptionsPartial = $v;
    }

    /**
     * Initializes the collProductOptions collection.
     *
     * By default this just sets the collProductOptions collection to an empty array (like clearcollProductOptions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductOptions($overrideExisting = true)
    {
        if (null !== $this->collProductOptions && !$overrideExisting) {
            return;
        }
        $this->collProductOptions = new PropelObjectCollection();
        $this->collProductOptions->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption objects
     * @throws PropelException
     */
    public function getProductOptions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductOptionsPartial && !$this->isNew();
        if (null === $this->collProductOptions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductOptions) {
                // return empty collection
                $this->initProductOptions();
            } else {
                $collProductOptions = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductOptionsPartial && count($collProductOptions)) {
                      $this->initProductOptions(false);

                      foreach ($collProductOptions as $obj) {
                        if (false == $this->collProductOptions->contains($obj)) {
                          $this->collProductOptions->append($obj);
                        }
                      }

                      $this->collProductOptionsPartial = true;
                    }

                    $collProductOptions->getInternalIterator()->rewind();

                    return $collProductOptions;
                }

                if ($partial && $this->collProductOptions) {
                    foreach ($this->collProductOptions as $obj) {
                        if ($obj->isNew()) {
                            $collProductOptions[] = $obj;
                        }
                    }
                }

                $this->collProductOptions = $collProductOptions;
                $this->collProductOptionsPartial = false;
            }
        }

        return $this->collProductOptions;
    }

    /**
     * Sets a collection of ProductOption objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productOptions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setProductOptions(PropelCollection $productOptions, PropelPDO $con = null)
    {
        $productOptionsToDelete = $this->getProductOptions(new Criteria(), $con)->diff($productOptions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->productOptionsScheduledForDeletion = clone $productOptionsToDelete;

        foreach ($productOptionsToDelete as $productOptionRemoved) {
            $productOptionRemoved->setProductEntity(null);
        }

        $this->collProductOptions = null;
        foreach ($productOptions as $productOption) {
            $this->addProductOption($productOption);
        }

        $this->collProductOptions = $productOptions;
        $this->collProductOptionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption objects.
     * @throws PropelException
     */
    public function countProductOptions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductOptionsPartial && !$this->isNew();
        if (null === $this->collProductOptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductOptions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductOptions());
            }
            $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductEntity($this)
                ->count($con);
        }

        return count($this->collProductOptions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption object to this object
     * through the ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption $l ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addProductOption(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption $l)
    {
        if ($this->collProductOptions === null) {
            $this->initProductOptions();
            $this->collProductOptionsPartial = true;
        }

        if (!in_array($l, $this->collProductOptions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductOption($l);

            if ($this->productOptionsScheduledForDeletion and $this->productOptionsScheduledForDeletion->contains($l)) {
                $this->productOptionsScheduledForDeletion->remove($this->productOptionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ProductOption $productOption The productOption object to add.
     */
    protected function doAddProductOption($productOption)
    {
        $this->collProductOptions[]= $productOption;
        $productOption->setProductEntity($this);
    }

    /**
     * @param	ProductOption $productOption The productOption object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeProductOption($productOption)
    {
        if ($this->getProductOptions()->contains($productOption)) {
            $this->collProductOptions->remove($this->collProductOptions->search($productOption));
            if (null === $this->productOptionsScheduledForDeletion) {
                $this->productOptionsScheduledForDeletion = clone $this->collProductOptions;
                $this->productOptionsScheduledForDeletion->clear();
            }
            $this->productOptionsScheduledForDeletion[]= clone $productOption;
            $productOption->setProductEntity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related ProductOptions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption objects
     */
    public function getProductOptionsJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOptionQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getProductOptions($query, $con);
    }

    /**
     * Clears out the collPacCmsBlockProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
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
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
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
                    ->filterByPacCatalogProduct($this)
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setPacCmsBlockProducts(PropelCollection $pacCmsBlockProducts, PropelPDO $con = null)
    {
        $pacCmsBlockProductsToDelete = $this->getPacCmsBlockProducts(new Criteria(), $con)->diff($pacCmsBlockProducts);


        $this->pacCmsBlockProductsScheduledForDeletion = $pacCmsBlockProductsToDelete;

        foreach ($pacCmsBlockProductsToDelete as $pacCmsBlockProductRemoved) {
            $pacCmsBlockProductRemoved->setPacCatalogProduct(null);
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
                ->filterByPacCatalogProduct($this)
                ->count($con);
        }

        return count($this->collPacCmsBlockProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
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
        $pacCmsBlockProduct->setPacCatalogProduct($this);
    }

    /**
     * @param	PacCmsBlockProduct $pacCmsBlockProduct The pacCmsBlockProduct object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removePacCmsBlockProduct($pacCmsBlockProduct)
    {
        if ($this->getPacCmsBlockProducts()->contains($pacCmsBlockProduct)) {
            $this->collPacCmsBlockProducts->remove($this->collPacCmsBlockProducts->search($pacCmsBlockProduct));
            if (null === $this->pacCmsBlockProductsScheduledForDeletion) {
                $this->pacCmsBlockProductsScheduledForDeletion = clone $this->collPacCmsBlockProducts;
                $this->pacCmsBlockProductsScheduledForDeletion->clear();
            }
            $this->pacCmsBlockProductsScheduledForDeletion[]= $pacCmsBlockProduct;
            $pacCmsBlockProduct->setPacCatalogProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related PacCmsBlockProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct objects
     */
    public function getPacCmsBlockProductsJoinPacCmsBlock($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery::create(null, $criteria);
        $query->joinWith('PacCmsBlock', $join_behavior);

        return $this->getPacCmsBlockProducts($query, $con);
    }

    /**
     * Clears out the collProductImages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addProductImages()
     */
    public function clearProductImages()
    {
        $this->collProductImages = null; // important to set this to null since that means it is uninitialized
        $this->collProductImagesPartial = null;

        return $this;
    }

    /**
     * reset is the collProductImages collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductImages($v = true)
    {
        $this->collProductImagesPartial = $v;
    }

    /**
     * Initializes the collProductImages collection.
     *
     * By default this just sets the collProductImages collection to an empty array (like clearcollProductImages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductImages($overrideExisting = true)
    {
        if (null !== $this->collProductImages && !$overrideExisting) {
            return;
        }
        $this->collProductImages = new PropelObjectCollection();
        $this->collProductImages->setModel('ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage');
    }

    /**
     * Gets an array of ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage[] List of ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects
     * @throws PropelException
     */
    public function getProductImages($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductImagesPartial && !$this->isNew();
        if (null === $this->collProductImages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductImages) {
                // return empty collection
                $this->initProductImages();
            } else {
                $collProductImages = ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductImagesPartial && count($collProductImages)) {
                      $this->initProductImages(false);

                      foreach ($collProductImages as $obj) {
                        if (false == $this->collProductImages->contains($obj)) {
                          $this->collProductImages->append($obj);
                        }
                      }

                      $this->collProductImagesPartial = true;
                    }

                    $collProductImages->getInternalIterator()->rewind();

                    return $collProductImages;
                }

                if ($partial && $this->collProductImages) {
                    foreach ($this->collProductImages as $obj) {
                        if ($obj->isNew()) {
                            $collProductImages[] = $obj;
                        }
                    }
                }

                $this->collProductImages = $collProductImages;
                $this->collProductImagesPartial = false;
            }
        }

        return $this->collProductImages;
    }

    /**
     * Sets a collection of ProductImage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productImages A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setProductImages(PropelCollection $productImages, PropelPDO $con = null)
    {
        $productImagesToDelete = $this->getProductImages(new Criteria(), $con)->diff($productImages);


        $this->productImagesScheduledForDeletion = $productImagesToDelete;

        foreach ($productImagesToDelete as $productImageRemoved) {
            $productImageRemoved->setProduct(null);
        }

        $this->collProductImages = null;
        foreach ($productImages as $productImage) {
            $this->addProductImage($productImage);
        }

        $this->collProductImages = $productImages;
        $this->collProductImagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects.
     * @throws PropelException
     */
    public function countProductImages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductImagesPartial && !$this->isNew();
        if (null === $this->collProductImages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductImages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductImages());
            }
            $query = ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collProductImages);
    }

    /**
     * Method called to associate a ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage object to this object
     * through the ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage foreign key attribute.
     *
     * @param    ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage $l ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addProductImage(ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage $l)
    {
        if ($this->collProductImages === null) {
            $this->initProductImages();
            $this->collProductImagesPartial = true;
        }

        if (!in_array($l, $this->collProductImages->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductImage($l);

            if ($this->productImagesScheduledForDeletion and $this->productImagesScheduledForDeletion->contains($l)) {
                $this->productImagesScheduledForDeletion->remove($this->productImagesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ProductImage $productImage The productImage object to add.
     */
    protected function doAddProductImage($productImage)
    {
        $this->collProductImages[]= $productImage;
        $productImage->setProduct($this);
    }

    /**
     * @param	ProductImage $productImage The productImage object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeProductImage($productImage)
    {
        if ($this->getProductImages()->contains($productImage)) {
            $this->collProductImages->remove($this->collProductImages->search($productImage));
            if (null === $this->productImagesScheduledForDeletion) {
                $this->productImagesScheduledForDeletion = clone $this->collProductImages;
                $this->productImagesScheduledForDeletion->clear();
            }
            $this->productImagesScheduledForDeletion[]= clone $productImage;
            $productImage->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related ProductImages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage[] List of ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage objects
     */
    public function getProductImagesJoinProductImageSize($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageQuery::create(null, $criteria);
        $query->joinWith('ProductImageSize', $join_behavior);

        return $this->getProductImages($query, $con);
    }

    /**
     * Clears out the collBundleProductBundles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addBundleProductBundles()
     */
    public function clearBundleProductBundles()
    {
        $this->collBundleProductBundles = null; // important to set this to null since that means it is uninitialized
        $this->collBundleProductBundlesPartial = null;

        return $this;
    }

    /**
     * Initializes the collBundleProductBundles collection.
     *
     * By default this just sets the collBundleProductBundles collection to an empty collection (like clearBundleProductBundles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initBundleProductBundles()
    {
        $this->collBundleProductBundles = new PropelObjectCollection();
        $this->collBundleProductBundles->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects
     */
    public function getBundleProductBundles($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collBundleProductBundles || null !== $criteria) {
            if ($this->isNew() && null === $this->collBundleProductBundles) {
                // return empty collection
                $this->initBundleProductBundles();
            } else {
                $collBundleProductBundles = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery::create(null, $criteria)
                    ->filterByBundleProductProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collBundleProductBundles;
                }
                $this->collBundleProductBundles = $collBundleProductBundles;
            }
        }

        return $this->collBundleProductBundles;
    }

    /**
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bundleProductBundles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setBundleProductBundles(PropelCollection $bundleProductBundles, PropelPDO $con = null)
    {
        $this->clearBundleProductBundles();
        $currentBundleProductBundles = $this->getBundleProductBundles(null, $con);

        $this->bundleProductBundlesScheduledForDeletion = $currentBundleProductBundles->diff($bundleProductBundles);

        foreach ($bundleProductBundles as $bundleProductBundle) {
            if (!$currentBundleProductBundles->contains($bundleProductBundle)) {
                $this->doAddBundleProductBundle($bundleProductBundle);
            }
        }

        $this->collBundleProductBundles = $bundleProductBundles;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle objects
     */
    public function countBundleProductBundles($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collBundleProductBundles || null !== $criteria) {
            if ($this->isNew() && null === $this->collBundleProductBundles) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByBundleProductProduct($this)
                    ->count($con);
            }
        } else {
            return count($this->collBundleProductBundles);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object to this object
     * through the pac_catalog_product_bundle_product cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $pacCatalogProductBundle The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addBundleProductBundle(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $pacCatalogProductBundle)
    {
        if ($this->collBundleProductBundles === null) {
            $this->initBundleProductBundles();
        }

        if (!$this->collBundleProductBundles->contains($pacCatalogProductBundle)) { // only add it if the **same** object is not already associated
            $this->doAddBundleProductBundle($pacCatalogProductBundle);
            $this->collBundleProductBundles[] = $pacCatalogProductBundle;

            if ($this->bundleProductBundlesScheduledForDeletion and $this->bundleProductBundlesScheduledForDeletion->contains($pacCatalogProductBundle)) {
                $this->bundleProductBundlesScheduledForDeletion->remove($this->bundleProductBundlesScheduledForDeletion->search($pacCatalogProductBundle));
            }
        }

        return $this;
    }

    /**
     * @param	BundleProductBundle $bundleProductBundle The bundleProductBundle object to add.
     */
    protected function doAddBundleProductBundle(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $bundleProductBundle)
    {
        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$bundleProductBundle->getBundleProductProducts()->contains($this)) {
            $pacCatalogProductBundleProduct = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct();
            $pacCatalogProductBundleProduct->setBundleProductBundle($bundleProductBundle);
            $this->addBundleProduct($pacCatalogProductBundleProduct);

            $foreignCollection = $bundleProductBundle->getBundleProductProducts();
            $foreignCollection[] = $this;
        }
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle object to this object
     * through the pac_catalog_product_bundle_product cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $pacCatalogProductBundle The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeBundleProductBundle(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle $pacCatalogProductBundle)
    {
        if ($this->getBundleProductBundles()->contains($pacCatalogProductBundle)) {
            $this->collBundleProductBundles->remove($this->collBundleProductBundles->search($pacCatalogProductBundle));
            if (null === $this->bundleProductBundlesScheduledForDeletion) {
                $this->bundleProductBundlesScheduledForDeletion = clone $this->collBundleProductBundles;
                $this->bundleProductBundlesScheduledForDeletion->clear();
            }
            $this->bundleProductBundlesScheduledForDeletion[]= $pacCatalogProductBundle;
        }

        return $this;
    }

    /**
     * Clears out the collOptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     * @see        addOptions()
     */
    public function clearOptions()
    {
        $this->collOptions = null; // important to set this to null since that means it is uninitialized
        $this->collOptionsPartial = null;

        return $this;
    }

    /**
     * Initializes the collOptions collection.
     *
     * By default this just sets the collOptions collection to an empty collection (like clearOptions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initOptions()
    {
        $this->collOptions = new PropelObjectCollection();
        $this->collOptions->setModel('ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_option cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption[] List of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects
     */
    public function getOptions($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collOptions || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptions) {
                // return empty collection
                $this->initOptions();
            } else {
                $collOptions = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery::create(null, $criteria)
                    ->filterByProductEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collOptions;
                }
                $this->collOptions = $collOptions;
            }
        }

        return $this->collOptions;
    }

    /**
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_option cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $options A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function setOptions(PropelCollection $options, PropelPDO $con = null)
    {
        $this->clearOptions();
        $currentOptions = $this->getOptions(null, $con);

        $this->optionsScheduledForDeletion = $currentOptions->diff($options);

        foreach ($options as $option) {
            if (!$currentOptions->contains($option)) {
                $this->doAddOption($option);
            }
        }

        $this->collOptions = $options;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_option cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption objects
     */
    public function countOptions($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collOptions || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptions) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOptionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProductEntity($this)
                    ->count($con);
            }
        } else {
            return count($this->collOptions);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption object to this object
     * through the pac_catalog_product_option cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption $pacCatalogOption The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function addOption(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption $pacCatalogOption)
    {
        if ($this->collOptions === null) {
            $this->initOptions();
        }

        if (!$this->collOptions->contains($pacCatalogOption)) { // only add it if the **same** object is not already associated
            $this->doAddOption($pacCatalogOption);
            $this->collOptions[] = $pacCatalogOption;

            if ($this->optionsScheduledForDeletion and $this->optionsScheduledForDeletion->contains($pacCatalogOption)) {
                $this->optionsScheduledForDeletion->remove($this->optionsScheduledForDeletion->search($pacCatalogOption));
            }
        }

        return $this;
    }

    /**
     * @param	Option $option The option object to add.
     */
    protected function doAddOption(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption $option)
    {
        // set the back reference to this object directly as using provided method either results
        // in endless loop or in multiple relations
        if (!$option->getProductEntities()->contains($this)) {
            $pacCatalogProductOption = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption();
            $pacCatalogProductOption->setOption($option);
            $this->addProductOption($pacCatalogProductOption);

            $foreignCollection = $option->getProductEntities();
            $foreignCollection[] = $this;
        }
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption object to this object
     * through the pac_catalog_product_option cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption $pacCatalogOption The ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption object to relate
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeOption(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption $pacCatalogOption)
    {
        if ($this->getOptions()->contains($pacCatalogOption)) {
            $this->collOptions->remove($this->collOptions->search($pacCatalogOption));
            if (null === $this->optionsScheduledForDeletion) {
                $this->optionsScheduledForDeletion = clone $this->collOptions;
                $this->optionsScheduledForDeletion->clear();
            }
            $this->optionsScheduledForDeletion[]= $pacCatalogOption;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_catalog_product = null;
        $this->sku = null;
        $this->is_item = null;
        $this->status = null;
        $this->variety = null;
        $this->fk_catalog_attribute_set = null;
        $this->cache = null;
        $this->created_at = null;
        $this->updated_at = null;
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
            if ($this->singleBundle) {
                $this->singleBundle->clearAllReferences($deep);
            }
            if ($this->collBundleProducts) {
                foreach ($this->collBundleProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleSingleEntity) {
                $this->singleSingleEntity->clearAllReferences($deep);
            }
            if ($this->singleConfigEntity) {
                $this->singleConfigEntity->clearAllReferences($deep);
            }
            if ($this->singleSimpleEntity) {
                $this->singleSimpleEntity->clearAllReferences($deep);
            }
            if ($this->collOptionMultis) {
                foreach ($this->collOptionMultis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptionSingles) {
                foreach ($this->collOptionSingles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collIntegers) {
                foreach ($this->collIntegers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTimestamps) {
                foreach ($this->collTimestamps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDecimals) {
                foreach ($this->collDecimals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTexts) {
                foreach ($this->collTexts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBooleans) {
                foreach ($this->collBooleans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductCategories) {
                foreach ($this->collProductCategories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductOptions) {
                foreach ($this->collProductOptions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacCmsBlockProducts) {
                foreach ($this->collPacCmsBlockProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductImages) {
                foreach ($this->collProductImages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBundleProductBundles) {
                foreach ($this->collBundleProductBundles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOptions) {
                foreach ($this->collOptions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aAttributeSet instanceof Persistent) {
              $this->aAttributeSet->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->singleBundle instanceof PropelCollection) {
            $this->singleBundle->clearIterator();
        }
        $this->singleBundle = null;
        if ($this->collBundleProducts instanceof PropelCollection) {
            $this->collBundleProducts->clearIterator();
        }
        $this->collBundleProducts = null;
        if ($this->singleSingleEntity instanceof PropelCollection) {
            $this->singleSingleEntity->clearIterator();
        }
        $this->singleSingleEntity = null;
        if ($this->singleConfigEntity instanceof PropelCollection) {
            $this->singleConfigEntity->clearIterator();
        }
        $this->singleConfigEntity = null;
        if ($this->singleSimpleEntity instanceof PropelCollection) {
            $this->singleSimpleEntity->clearIterator();
        }
        $this->singleSimpleEntity = null;
        if ($this->collOptionMultis instanceof PropelCollection) {
            $this->collOptionMultis->clearIterator();
        }
        $this->collOptionMultis = null;
        if ($this->collOptionSingles instanceof PropelCollection) {
            $this->collOptionSingles->clearIterator();
        }
        $this->collOptionSingles = null;
        if ($this->collIntegers instanceof PropelCollection) {
            $this->collIntegers->clearIterator();
        }
        $this->collIntegers = null;
        if ($this->collTimestamps instanceof PropelCollection) {
            $this->collTimestamps->clearIterator();
        }
        $this->collTimestamps = null;
        if ($this->collDecimals instanceof PropelCollection) {
            $this->collDecimals->clearIterator();
        }
        $this->collDecimals = null;
        if ($this->collTexts instanceof PropelCollection) {
            $this->collTexts->clearIterator();
        }
        $this->collTexts = null;
        if ($this->collBooleans instanceof PropelCollection) {
            $this->collBooleans->clearIterator();
        }
        $this->collBooleans = null;
        if ($this->collProductCategories instanceof PropelCollection) {
            $this->collProductCategories->clearIterator();
        }
        $this->collProductCategories = null;
        if ($this->collProductOptions instanceof PropelCollection) {
            $this->collProductOptions->clearIterator();
        }
        $this->collProductOptions = null;
        if ($this->collPacCmsBlockProducts instanceof PropelCollection) {
            $this->collPacCmsBlockProducts->clearIterator();
        }
        $this->collPacCmsBlockProducts = null;
        if ($this->collProductImages instanceof PropelCollection) {
            $this->collProductImages->clearIterator();
        }
        $this->collProductImages = null;
        if ($this->collBundleProductBundles instanceof PropelCollection) {
            $this->collBundleProductBundles->clearIterator();
        }
        $this->collBundleProductBundles = null;
        if ($this->collOptions instanceof PropelCollection) {
            $this->collOptions->clearIterator();
        }
        $this->collOptions = null;
        $this->aAttributeSet = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::DEFAULT_STRING_FORMAT);
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

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductPeer::UPDATED_AT;

        return $this;
    }

}
