<?php


/**
 * Base class that represents a row from the 'pac_catalog_product' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogProduct extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer
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
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle one-to-one related ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle object
     */
    protected $singleBundle;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects.
     */
    protected $collBundleProducts;
    protected $collBundleProductsPartial;

    /**
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig one-to-one related ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig object
     */
    protected $singleConfig;

    /**
     * @var        ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple one-to-one related ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple object
     */
    protected $singleSimple;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects.
     */
    protected $collOptionMultis;
    protected $collOptionMultisPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects.
     */
    protected $collOptionSingles;
    protected $collOptionSinglesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects.
     */
    protected $collIntegers;
    protected $collIntegersPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects.
     */
    protected $collTimestamps;
    protected $collTimestampsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects.
     */
    protected $collDecimals;
    protected $collDecimalsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueText[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects.
     */
    protected $collTexts;
    protected $collTextsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects.
     */
    protected $collTextAreas;
    protected $collTextAreasPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects.
     */
    protected $collBooleans;
    protected $collBooleansPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects.
     */
    protected $collProductCategories;
    protected $collProductCategoriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption objects.
     */
    protected $collProductOptions;
    protected $collProductOptionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Image_Persistence_PacImageProduct[] Collection to store aggregation of ProjectA_Zed_Image_Persistence_PacImageProduct objects.
     */
    protected $collImageProducts;
    protected $collImageProductsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Price_Persistence_PacPriceProduct[] Collection to store aggregation of ProjectA_Zed_Price_Persistence_PacPriceProduct objects.
     */
    protected $collPriceProducts;
    protected $collPriceProductsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Stock_Persistence_PacStockProduct[] Collection to store aggregation of ProjectA_Zed_Stock_Persistence_PacStockProduct objects.
     */
    protected $collStockProducts;
    protected $collStockProductsPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition[] Collection to store aggregation of Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects.
     */
    protected $collSoldLimitedEditions;
    protected $collSoldLimitedEditionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle objects.
     */
    protected $collBundleProductBundles;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogOption[] Collection to store aggregation of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects.
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
    protected $bundlesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bundleProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $configsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $simplesScheduledForDeletion = null;

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
    protected $textAreasScheduledForDeletion = null;

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
    protected $imageProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $priceProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stockProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $soldLimitedEditionsScheduledForDeletion = null;

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
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Om_BasePacCatalogProduct object.
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
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setIdCatalogProduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_catalog_product !== $v) {
            $this->id_catalog_product = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::ID_CATALOG_PRODUCT;
        }


        return $this;
    } // setIdCatalogProduct()

    /**
     * Set the value of [sku] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU;
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM;
        }


        return $this;
    } // setIsItem()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [variety] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setVariety($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->variety !== $v) {
            $this->variety = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY;
        }


        return $this;
    } // setVariety()

    /**
     * Set the value of [fk_catalog_attribute_set] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setFkCatalogAttributeSet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_catalog_attribute_set !== $v) {
            $this->fk_catalog_attribute_set = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET;
        }

        if ($this->aAttributeSet !== null && $this->aAttributeSet->getIdCatalogAttributeSet() !== $v) {
            $this->aAttributeSet = null;
        }


        return $this;
    } // setFkCatalogAttributeSet()

    /**
     * Set the value of [cache] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setCache($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cache !== $v) {
            $this->cache = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CACHE;
        }


        return $this;
    } // setCache()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::UPDATED_AT;
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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
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
            return $startcol + 9; // 9 = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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

            $this->singleConfig = null;

            $this->singleSimple = null;

            $this->collOptionMultis = null;

            $this->collOptionSingles = null;

            $this->collIntegers = null;

            $this->collTimestamps = null;

            $this->collDecimals = null;

            $this->collTexts = null;

            $this->collTextAreas = null;

            $this->collBooleans = null;

            $this->collProductCategories = null;

            $this->collProductOptions = null;

            $this->collImageProducts = null;

            $this->collPriceProducts = null;

            $this->collStockProducts = null;

            $this->collSoldLimitedEditions = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::addInstanceToPool($this);
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
                    BundleProductQuery::create()
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
                    ProductOptionQuery::create()
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

            if ($this->bundlesScheduledForDeletion !== null) {
                if (!$this->bundlesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleQuery::create()
                        ->filterByPrimaryKeys($this->bundlesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bundlesScheduledForDeletion = null;
                }
            }

            if ($this->singleBundle !== null) {
                if (!$this->singleBundle->isDeleted() && ($this->singleBundle->isNew() || $this->singleBundle->isModified())) {
                        $affectedRows += $this->singleBundle->save($con);
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

            if ($this->configsScheduledForDeletion !== null) {
                if (!$this->configsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfigQuery::create()
                        ->filterByPrimaryKeys($this->configsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->configsScheduledForDeletion = null;
                }
            }

            if ($this->singleConfig !== null) {
                if (!$this->singleConfig->isDeleted() && ($this->singleConfig->isNew() || $this->singleConfig->isModified())) {
                        $affectedRows += $this->singleConfig->save($con);
                }
            }

            if ($this->simplesScheduledForDeletion !== null) {
                if (!$this->simplesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimpleQuery::create()
                        ->filterByPrimaryKeys($this->simplesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->simplesScheduledForDeletion = null;
                }
            }

            if ($this->singleSimple !== null) {
                if (!$this->singleSimple->isDeleted() && ($this->singleSimple->isNew() || $this->singleSimple->isModified())) {
                        $affectedRows += $this->singleSimple->save($con);
                }
            }

            if ($this->optionMultisScheduledForDeletion !== null) {
                if (!$this->optionMultisScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create()
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
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create()
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
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create()
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
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create()
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
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create()
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
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create()
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

            if ($this->textAreasScheduledForDeletion !== null) {
                if (!$this->textAreasScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create()
                        ->filterByPrimaryKeys($this->textAreasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->textAreasScheduledForDeletion = null;
                }
            }

            if ($this->collTextAreas !== null) {
                foreach ($this->collTextAreas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->booleansScheduledForDeletion !== null) {
                if (!$this->booleansScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create()
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
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery::create()
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
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductOptionQuery::create()
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

            if ($this->imageProductsScheduledForDeletion !== null) {
                if (!$this->imageProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Image_Persistence_PacImageProductQuery::create()
                        ->filterByPrimaryKeys($this->imageProductsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->imageProductsScheduledForDeletion = null;
                }
            }

            if ($this->collImageProducts !== null) {
                foreach ($this->collImageProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->priceProductsScheduledForDeletion !== null) {
                if (!$this->priceProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Price_Persistence_PacPriceProductQuery::create()
                        ->filterByPrimaryKeys($this->priceProductsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->priceProductsScheduledForDeletion = null;
                }
            }

            if ($this->collPriceProducts !== null) {
                foreach ($this->collPriceProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockProductsScheduledForDeletion !== null) {
                if (!$this->stockProductsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Stock_Persistence_PacStockProductQuery::create()
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

            if ($this->soldLimitedEditionsScheduledForDeletion !== null) {
                if (!$this->soldLimitedEditionsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery::create()
                        ->filterByPrimaryKeys($this->soldLimitedEditionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->soldLimitedEditionsScheduledForDeletion = null;
                }
            }

            if ($this->collSoldLimitedEditions !== null) {
                foreach ($this->collSoldLimitedEditions as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::ID_CATALOG_PRODUCT;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::ID_CATALOG_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`id_catalog_product`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU)) {
            $modifiedColumns[':p' . $index++]  = '`sku`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM)) {
            $modifiedColumns[':p' . $index++]  = '`is_item`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY)) {
            $modifiedColumns[':p' . $index++]  = '`variety`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET)) {
            $modifiedColumns[':p' . $index++]  = '`fk_catalog_attribute_set`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CACHE)) {
            $modifiedColumns[':p' . $index++]  = '`cache`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::UPDATED_AT)) {
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

            if ($this->aAttributeSet !== null) {
                if (!$this->aAttributeSet->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAttributeSet->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::doValidate($this, $columns)) !== true) {
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

                if ($this->singleConfig !== null) {
                    if (!$this->singleConfig->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleConfig->getValidationFailures());
                    }
                }

                if ($this->singleSimple !== null) {
                    if (!$this->singleSimple->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSimple->getValidationFailures());
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

                if ($this->collTextAreas !== null) {
                    foreach ($this->collTextAreas as $referrerFK) {
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

                if ($this->collImageProducts !== null) {
                    foreach ($this->collImageProducts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPriceProducts !== null) {
                    foreach ($this->collPriceProducts as $referrerFK) {
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

                if ($this->collSoldLimitedEditions !== null) {
                    foreach ($this->collSoldLimitedEditions as $referrerFK) {
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogProduct'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Catalog_Persistence_PacCatalogProduct'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::getFieldNames($keyType);
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
            if (null !== $this->singleConfig) {
                $result['Config'] = $this->singleConfig->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleSimple) {
                $result['Simple'] = $this->singleSimple->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
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
            if (null !== $this->collTextAreas) {
                $result['TextAreas'] = $this->collTextAreas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collImageProducts) {
                $result['ImageProducts'] = $this->collImageProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPriceProducts) {
                $result['PriceProducts'] = $this->collPriceProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockProducts) {
                $result['StockProducts'] = $this->collStockProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSoldLimitedEditions) {
                $result['SoldLimitedEditions'] = $this->collSoldLimitedEditions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
        $keys = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::getFieldNames($keyType);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::ID_CATALOG_PRODUCT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $this->id_catalog_product);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU, $this->sku);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, $this->is_item);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, $this->status);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY, $this->variety);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, $this->fk_catalog_attribute_set);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CACHE)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CACHE, $this->cache);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::ID_CATALOG_PRODUCT, $this->id_catalog_product);

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
     * @param object $copyObj An object of ProjectA_Zed_Catalog_Persistence_PacCatalogProduct (or compatible) type.
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

            $relObj = $this->getConfig();
            if ($relObj) {
                $copyObj->setConfig($relObj->copy($deepCopy));
            }

            $relObj = $this->getSimple();
            if ($relObj) {
                $copyObj->setSimple($relObj->copy($deepCopy));
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

            foreach ($this->getTextAreas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTextArea($relObj->copy($deepCopy));
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

            foreach ($this->getImageProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addImageProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPriceProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPriceProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSoldLimitedEditions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSoldLimitedEdition($relObj->copy($deepCopy));
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct Clone of current object.
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $v
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAttributeSet(ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $v = null)
    {
        if ($v === null) {
            $this->setFkCatalogAttributeSet(NULL);
        } else {
            $this->setFkCatalogAttributeSet($v->getIdCatalogAttributeSet());
        }

        $this->aAttributeSet = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object, it will not be re-added.
        if ($v !== null) {
            $v->addProduct($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet The associated ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet object.
     * @throws PropelException
     */
    public function getAttributeSet(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAttributeSet === null && ($this->fk_catalog_attribute_set !== null) && $doQuery) {
            $this->aAttributeSet = ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery::create()->findPk($this->fk_catalog_attribute_set, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAttributeSet->addProducts($this);
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
        if ('TextArea' == $relationName) {
            $this->initTextAreas();
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
        if ('ImageProduct' == $relationName) {
            $this->initImageProducts();
        }
        if ('PriceProduct' == $relationName) {
            $this->initPriceProducts();
        }
        if ('StockProduct' == $relationName) {
            $this->initStockProducts();
        }
        if ('SoldLimitedEdition' == $relationName) {
            $this->initSoldLimitedEditions();
        }
    }

    /**
     * Gets a single ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle
     * @throws PropelException
     */
    public function getBundle(PropelPDO $con = null)
    {

        if ($this->singleBundle === null && !$this->isNew()) {
            $this->singleBundle = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleBundle;
    }

    /**
     * Sets a single ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle object as related to this object by a one-to-one relationship.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle $v ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBundle(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle $v = null)
    {
        $this->singleBundle = $v;

        // Make sure that that the passed-in ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle isn't already associated with this object
        if ($v !== null && $v->getProduct(null, false) === null) {
            $v->setProduct($this);
        }

        return $this;
    }

    /**
     * Clears out the collBundleProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
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
                    ->filterByBundleProductProduct($this)
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setBundleProducts(PropelCollection $bundleProducts, PropelPDO $con = null)
    {
        $bundleProductsToDelete = $this->getBundleProducts(new Criteria(), $con)->diff($bundleProducts);

        $this->bundleProductsScheduledForDeletion = unserialize(serialize($bundleProductsToDelete));

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
                ->filterByBundleProductProduct($this)
                ->count($con);
        }

        return count($this->collBundleProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct $l ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $bundleProduct->setBundleProductProduct($this);
    }

    /**
     * @param	BundleProduct $bundleProduct The bundleProduct object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct objects
     */
    public function getBundleProductsJoinBundleProductBundle($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProductQuery::create(null, $criteria);
        $query->joinWith('BundleProductBundle', $join_behavior);

        return $this->getBundleProducts($query, $con);
    }

    /**
     * Gets a single ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig
     * @throws PropelException
     */
    public function getConfig(PropelPDO $con = null)
    {

        if ($this->singleConfig === null && !$this->isNew()) {
            $this->singleConfig = ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfigQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleConfig;
    }

    /**
     * Sets a single ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig object as related to this object by a one-to-one relationship.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig $v ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setConfig(ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig $v = null)
    {
        $this->singleConfig = $v;

        // Make sure that that the passed-in ProjectA_Zed_Catalog_Persistence_PacCatalogProductConfig isn't already associated with this object
        if ($v !== null && $v->getProduct(null, false) === null) {
            $v->setProduct($this);
        }

        return $this;
    }

    /**
     * Gets a single ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple
     * @throws PropelException
     */
    public function getSimple(PropelPDO $con = null)
    {

        if ($this->singleSimple === null && !$this->isNew()) {
            $this->singleSimple = ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimpleQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSimple;
    }

    /**
     * Sets a single ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple object as related to this object by a one-to-one relationship.
     *
     * @param             ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple $v ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSimple(ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple $v = null)
    {
        $this->singleSimple = $v;

        // Make sure that that the passed-in ProjectA_Zed_Catalog_Persistence_PacCatalogProductSimple isn't already associated with this object
        if ($v !== null && $v->getProduct(null, false) === null) {
            $v->setProduct($this);
        }

        return $this;
    }

    /**
     * Clears out the collOptionMultis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collOptionMultis->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects
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
                $collOptionMultis = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionMultisPartial && count($collOptionMultis)) {
                      $this->initOptionMultis(false);

                      foreach($collOptionMultis as $obj) {
                        if (false == $this->collOptionMultis->contains($obj)) {
                          $this->collOptionMultis->append($obj);
                        }
                      }

                      $this->collOptionMultisPartial = true;
                    }

                    $collOptionMultis->getInternalIterator()->rewind();
                    return $collOptionMultis;
                }

                if($partial && $this->collOptionMultis) {
                    foreach($this->collOptionMultis as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setOptionMultis(PropelCollection $optionMultis, PropelPDO $con = null)
    {
        $optionMultisToDelete = $this->getOptionMultis(new Criteria(), $con)->diff($optionMultis);

        $this->optionMultisScheduledForDeletion = unserialize(serialize($optionMultisToDelete));

        foreach ($optionMultisToDelete as $optionMultiRemoved) {
            $optionMultiRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects.
     * @throws PropelException
     */
    public function countOptionMultis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionMultisPartial && !$this->isNew();
        if (null === $this->collOptionMultis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptionMultis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOptionMultis());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collOptionMultis);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addOptionMulti(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti $l)
    {
        if ($this->collOptionMultis === null) {
            $this->initOptionMultis();
            $this->collOptionMultisPartial = true;
        }
        if (!in_array($l, $this->collOptionMultis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOptionMulti($l);
        }

        return $this;
    }

    /**
     * @param	OptionMulti $optionMulti The optionMulti object to add.
     */
    protected function doAddOptionMulti($optionMulti)
    {
        $this->collOptionMultis[]= $optionMulti;
        $optionMulti->setProduct($this);
    }

    /**
     * @param	OptionMulti $optionMulti The optionMulti object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $optionMulti->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects
     */
    public function getOptionMultisJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti objects
     */
    public function getOptionMultisJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMultiQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getOptionMultis($query, $con);
    }

    /**
     * Clears out the collOptionSingles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collOptionSingles->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects
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
                $collOptionSingles = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOptionSinglesPartial && count($collOptionSingles)) {
                      $this->initOptionSingles(false);

                      foreach($collOptionSingles as $obj) {
                        if (false == $this->collOptionSingles->contains($obj)) {
                          $this->collOptionSingles->append($obj);
                        }
                      }

                      $this->collOptionSinglesPartial = true;
                    }

                    $collOptionSingles->getInternalIterator()->rewind();
                    return $collOptionSingles;
                }

                if($partial && $this->collOptionSingles) {
                    foreach($this->collOptionSingles as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setOptionSingles(PropelCollection $optionSingles, PropelPDO $con = null)
    {
        $optionSinglesToDelete = $this->getOptionSingles(new Criteria(), $con)->diff($optionSingles);

        $this->optionSinglesScheduledForDeletion = unserialize(serialize($optionSinglesToDelete));

        foreach ($optionSinglesToDelete as $optionSingleRemoved) {
            $optionSingleRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects.
     * @throws PropelException
     */
    public function countOptionSingles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOptionSinglesPartial && !$this->isNew();
        if (null === $this->collOptionSingles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOptionSingles) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOptionSingles());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collOptionSingles);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addOptionSingle(ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle $l)
    {
        if ($this->collOptionSingles === null) {
            $this->initOptionSingles();
            $this->collOptionSinglesPartial = true;
        }
        if (!in_array($l, $this->collOptionSingles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOptionSingle($l);
        }

        return $this;
    }

    /**
     * @param	OptionSingle $optionSingle The optionSingle object to add.
     */
    protected function doAddOptionSingle($optionSingle)
    {
        $this->collOptionSingles[]= $optionSingle;
        $optionSingle->setProduct($this);
    }

    /**
     * @param	OptionSingle $optionSingle The optionSingle object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $optionSingle->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects
     */
    public function getOptionSinglesJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle objects
     */
    public function getOptionSinglesJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingleQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getOptionSingles($query, $con);
    }

    /**
     * Clears out the collIntegers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collIntegers->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects
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
                $collIntegers = ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collIntegersPartial && count($collIntegers)) {
                      $this->initIntegers(false);

                      foreach($collIntegers as $obj) {
                        if (false == $this->collIntegers->contains($obj)) {
                          $this->collIntegers->append($obj);
                        }
                      }

                      $this->collIntegersPartial = true;
                    }

                    $collIntegers->getInternalIterator()->rewind();
                    return $collIntegers;
                }

                if($partial && $this->collIntegers) {
                    foreach($this->collIntegers as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setIntegers(PropelCollection $integers, PropelPDO $con = null)
    {
        $integersToDelete = $this->getIntegers(new Criteria(), $con)->diff($integers);

        $this->integersScheduledForDeletion = unserialize(serialize($integersToDelete));

        foreach ($integersToDelete as $integerRemoved) {
            $integerRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects.
     * @throws PropelException
     */
    public function countIntegers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collIntegersPartial && !$this->isNew();
        if (null === $this->collIntegers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collIntegers) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getIntegers());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collIntegers);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addInteger(ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger $l)
    {
        if ($this->collIntegers === null) {
            $this->initIntegers();
            $this->collIntegersPartial = true;
        }
        if (!in_array($l, $this->collIntegers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInteger($l);
        }

        return $this;
    }

    /**
     * @param	Integer $integer The integer object to add.
     */
    protected function doAddInteger($integer)
    {
        $this->collIntegers[]= $integer;
        $integer->setProduct($this);
    }

    /**
     * @param	Integer $integer The integer object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $integer->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger objects
     */
    public function getIntegersJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueIntegerQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getIntegers($query, $con);
    }

    /**
     * Clears out the collTimestamps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collTimestamps->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects
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
                $collTimestamps = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTimestampsPartial && count($collTimestamps)) {
                      $this->initTimestamps(false);

                      foreach($collTimestamps as $obj) {
                        if (false == $this->collTimestamps->contains($obj)) {
                          $this->collTimestamps->append($obj);
                        }
                      }

                      $this->collTimestampsPartial = true;
                    }

                    $collTimestamps->getInternalIterator()->rewind();
                    return $collTimestamps;
                }

                if($partial && $this->collTimestamps) {
                    foreach($this->collTimestamps as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setTimestamps(PropelCollection $timestamps, PropelPDO $con = null)
    {
        $timestampsToDelete = $this->getTimestamps(new Criteria(), $con)->diff($timestamps);

        $this->timestampsScheduledForDeletion = unserialize(serialize($timestampsToDelete));

        foreach ($timestampsToDelete as $timestampRemoved) {
            $timestampRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects.
     * @throws PropelException
     */
    public function countTimestamps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTimestampsPartial && !$this->isNew();
        if (null === $this->collTimestamps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTimestamps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTimestamps());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collTimestamps);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addTimestamp(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp $l)
    {
        if ($this->collTimestamps === null) {
            $this->initTimestamps();
            $this->collTimestampsPartial = true;
        }
        if (!in_array($l, $this->collTimestamps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTimestamp($l);
        }

        return $this;
    }

    /**
     * @param	Timestamp $timestamp The timestamp object to add.
     */
    protected function doAddTimestamp($timestamp)
    {
        $this->collTimestamps[]= $timestamp;
        $timestamp->setProduct($this);
    }

    /**
     * @param	Timestamp $timestamp The timestamp object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $timestamp->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp objects
     */
    public function getTimestampsJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestampQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getTimestamps($query, $con);
    }

    /**
     * Clears out the collDecimals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collDecimals->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects
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
                $collDecimals = ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDecimalsPartial && count($collDecimals)) {
                      $this->initDecimals(false);

                      foreach($collDecimals as $obj) {
                        if (false == $this->collDecimals->contains($obj)) {
                          $this->collDecimals->append($obj);
                        }
                      }

                      $this->collDecimalsPartial = true;
                    }

                    $collDecimals->getInternalIterator()->rewind();
                    return $collDecimals;
                }

                if($partial && $this->collDecimals) {
                    foreach($this->collDecimals as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setDecimals(PropelCollection $decimals, PropelPDO $con = null)
    {
        $decimalsToDelete = $this->getDecimals(new Criteria(), $con)->diff($decimals);

        $this->decimalsScheduledForDeletion = unserialize(serialize($decimalsToDelete));

        foreach ($decimalsToDelete as $decimalRemoved) {
            $decimalRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects.
     * @throws PropelException
     */
    public function countDecimals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDecimalsPartial && !$this->isNew();
        if (null === $this->collDecimals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDecimals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDecimals());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collDecimals);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addDecimal(ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal $l)
    {
        if ($this->collDecimals === null) {
            $this->initDecimals();
            $this->collDecimalsPartial = true;
        }
        if (!in_array($l, $this->collDecimals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDecimal($l);
        }

        return $this;
    }

    /**
     * @param	Decimal $decimal The decimal object to add.
     */
    protected function doAddDecimal($decimal)
    {
        $this->collDecimals[]= $decimal;
        $decimal->setProduct($this);
    }

    /**
     * @param	Decimal $decimal The decimal object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $decimal->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal objects
     */
    public function getDecimalsJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimalQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getDecimals($query, $con);
    }

    /**
     * Clears out the collTexts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collTexts->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueText');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueText[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects
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
                $collTexts = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTextsPartial && count($collTexts)) {
                      $this->initTexts(false);

                      foreach($collTexts as $obj) {
                        if (false == $this->collTexts->contains($obj)) {
                          $this->collTexts->append($obj);
                        }
                      }

                      $this->collTextsPartial = true;
                    }

                    $collTexts->getInternalIterator()->rewind();
                    return $collTexts;
                }

                if($partial && $this->collTexts) {
                    foreach($this->collTexts as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setTexts(PropelCollection $texts, PropelPDO $con = null)
    {
        $textsToDelete = $this->getTexts(new Criteria(), $con)->diff($texts);

        $this->textsScheduledForDeletion = unserialize(serialize($textsToDelete));

        foreach ($textsToDelete as $textRemoved) {
            $textRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects.
     * @throws PropelException
     */
    public function countTexts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTextsPartial && !$this->isNew();
        if (null === $this->collTexts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTexts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTexts());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collTexts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueText object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueText foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueText $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueText
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addText(ProjectA_Zed_Catalog_Persistence_PacCatalogValueText $l)
    {
        if ($this->collTexts === null) {
            $this->initTexts();
            $this->collTextsPartial = true;
        }
        if (!in_array($l, $this->collTexts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddText($l);
        }

        return $this;
    }

    /**
     * @param	Text $text The text object to add.
     */
    protected function doAddText($text)
    {
        $this->collTexts[]= $text;
        $text->setProduct($this);
    }

    /**
     * @param	Text $text The text object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $text->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueText[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueText objects
     */
    public function getTextsJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getTexts($query, $con);
    }

    /**
     * Clears out the collTextAreas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @see        addTextAreas()
     */
    public function clearTextAreas()
    {
        $this->collTextAreas = null; // important to set this to null since that means it is uninitialized
        $this->collTextAreasPartial = null;

        return $this;
    }

    /**
     * reset is the collTextAreas collection loaded partially
     *
     * @return void
     */
    public function resetPartialTextAreas($v = true)
    {
        $this->collTextAreasPartial = $v;
    }

    /**
     * Initializes the collTextAreas collection.
     *
     * By default this just sets the collTextAreas collection to an empty array (like clearcollTextAreas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTextAreas($overrideExisting = true)
    {
        if (null !== $this->collTextAreas && !$overrideExisting) {
            return;
        }
        $this->collTextAreas = new PropelObjectCollection();
        $this->collTextAreas->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects
     * @throws PropelException
     */
    public function getTextAreas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTextAreasPartial && !$this->isNew();
        if (null === $this->collTextAreas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTextAreas) {
                // return empty collection
                $this->initTextAreas();
            } else {
                $collTextAreas = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTextAreasPartial && count($collTextAreas)) {
                      $this->initTextAreas(false);

                      foreach($collTextAreas as $obj) {
                        if (false == $this->collTextAreas->contains($obj)) {
                          $this->collTextAreas->append($obj);
                        }
                      }

                      $this->collTextAreasPartial = true;
                    }

                    $collTextAreas->getInternalIterator()->rewind();
                    return $collTextAreas;
                }

                if($partial && $this->collTextAreas) {
                    foreach($this->collTextAreas as $obj) {
                        if($obj->isNew()) {
                            $collTextAreas[] = $obj;
                        }
                    }
                }

                $this->collTextAreas = $collTextAreas;
                $this->collTextAreasPartial = false;
            }
        }

        return $this->collTextAreas;
    }

    /**
     * Sets a collection of TextArea objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $textAreas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setTextAreas(PropelCollection $textAreas, PropelPDO $con = null)
    {
        $textAreasToDelete = $this->getTextAreas(new Criteria(), $con)->diff($textAreas);

        $this->textAreasScheduledForDeletion = unserialize(serialize($textAreasToDelete));

        foreach ($textAreasToDelete as $textAreaRemoved) {
            $textAreaRemoved->setProduct(null);
        }

        $this->collTextAreas = null;
        foreach ($textAreas as $textArea) {
            $this->addTextArea($textArea);
        }

        $this->collTextAreas = $textAreas;
        $this->collTextAreasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects.
     * @throws PropelException
     */
    public function countTextAreas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTextAreasPartial && !$this->isNew();
        if (null === $this->collTextAreas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTextAreas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTextAreas());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collTextAreas);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addTextArea(ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea $l)
    {
        if ($this->collTextAreas === null) {
            $this->initTextAreas();
            $this->collTextAreasPartial = true;
        }
        if (!in_array($l, $this->collTextAreas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTextArea($l);
        }

        return $this;
    }

    /**
     * @param	TextArea $textArea The textArea object to add.
     */
    protected function doAddTextArea($textArea)
    {
        $this->collTextAreas[]= $textArea;
        $textArea->setProduct($this);
    }

    /**
     * @param	TextArea $textArea The textArea object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeTextArea($textArea)
    {
        if ($this->getTextAreas()->contains($textArea)) {
            $this->collTextAreas->remove($this->collTextAreas->search($textArea));
            if (null === $this->textAreasScheduledForDeletion) {
                $this->textAreasScheduledForDeletion = clone $this->collTextAreas;
                $this->textAreasScheduledForDeletion->clear();
            }
            $this->textAreasScheduledForDeletion[]= clone $textArea;
            $textArea->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related TextAreas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea objects
     */
    public function getTextAreasJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextAreaQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getTextAreas($query, $con);
    }

    /**
     * Clears out the collBooleans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collBooleans->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects
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
                $collBooleans = ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBooleansPartial && count($collBooleans)) {
                      $this->initBooleans(false);

                      foreach($collBooleans as $obj) {
                        if (false == $this->collBooleans->contains($obj)) {
                          $this->collBooleans->append($obj);
                        }
                      }

                      $this->collBooleansPartial = true;
                    }

                    $collBooleans->getInternalIterator()->rewind();
                    return $collBooleans;
                }

                if($partial && $this->collBooleans) {
                    foreach($this->collBooleans as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setBooleans(PropelCollection $booleans, PropelPDO $con = null)
    {
        $booleansToDelete = $this->getBooleans(new Criteria(), $con)->diff($booleans);

        $this->booleansScheduledForDeletion = unserialize(serialize($booleansToDelete));

        foreach ($booleansToDelete as $booleanRemoved) {
            $booleanRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects.
     * @throws PropelException
     */
    public function countBooleans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBooleansPartial && !$this->isNew();
        if (null === $this->collBooleans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBooleans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBooleans());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collBooleans);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean $l ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addBoolean(ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean $l)
    {
        if ($this->collBooleans === null) {
            $this->initBooleans();
            $this->collBooleansPartial = true;
        }
        if (!in_array($l, $this->collBooleans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBoolean($l);
        }

        return $this;
    }

    /**
     * @param	Boolean $boolean The boolean object to add.
     */
    protected function doAddBoolean($boolean)
    {
        $this->collBooleans[]= $boolean;
        $boolean->setProduct($this);
    }

    /**
     * @param	Boolean $boolean The boolean object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $boolean->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean objects
     */
    public function getBooleansJoinAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogValueBooleanQuery::create(null, $criteria);
        $query->joinWith('Attribute', $join_behavior);

        return $this->getBooleans($query, $con);
    }

    /**
     * Clears out the collProductCategories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collProductCategories->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects
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
                $collProductCategories = ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductCategoriesPartial && count($collProductCategories)) {
                      $this->initProductCategories(false);

                      foreach($collProductCategories as $obj) {
                        if (false == $this->collProductCategories->contains($obj)) {
                          $this->collProductCategories->append($obj);
                        }
                      }

                      $this->collProductCategoriesPartial = true;
                    }

                    $collProductCategories->getInternalIterator()->rewind();
                    return $collProductCategories;
                }

                if($partial && $this->collProductCategories) {
                    foreach($this->collProductCategories as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setProductCategories(PropelCollection $productCategories, PropelPDO $con = null)
    {
        $productCategoriesToDelete = $this->getProductCategories(new Criteria(), $con)->diff($productCategories);

        $this->productCategoriesScheduledForDeletion = unserialize(serialize($productCategoriesToDelete));

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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects.
     * @throws PropelException
     */
    public function countProductCategories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductCategoriesPartial && !$this->isNew();
        if (null === $this->collProductCategories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductCategories) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getProductCategories());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery::create(null, $criteria);
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
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory $l ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addProductCategory(ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory $l)
    {
        if ($this->collProductCategories === null) {
            $this->initProductCategories();
            $this->collProductCategoriesPartial = true;
        }
        if (!in_array($l, $this->collProductCategories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductCategory($l);
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related ProductCategories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory objects
     */
    public function getProductCategoriesJoinCategoryName($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategoryQuery::create(null, $criteria);
        $query->joinWith('CategoryName', $join_behavior);

        return $this->getProductCategories($query, $con);
    }

    /**
     * Clears out the collProductOptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collProductOptions->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption');
    }

    /**
     * Gets an array of ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption objects
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
                $collProductOptions = ProjectA_Zed_Catalog_Persistence_PacCatalogProductOptionQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductOptionsPartial && count($collProductOptions)) {
                      $this->initProductOptions(false);

                      foreach($collProductOptions as $obj) {
                        if (false == $this->collProductOptions->contains($obj)) {
                          $this->collProductOptions->append($obj);
                        }
                      }

                      $this->collProductOptionsPartial = true;
                    }

                    $collProductOptions->getInternalIterator()->rewind();
                    return $collProductOptions;
                }

                if($partial && $this->collProductOptions) {
                    foreach($this->collProductOptions as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setProductOptions(PropelCollection $productOptions, PropelPDO $con = null)
    {
        $productOptionsToDelete = $this->getProductOptions(new Criteria(), $con)->diff($productOptions);

        $this->productOptionsScheduledForDeletion = unserialize(serialize($productOptionsToDelete));

        foreach ($productOptionsToDelete as $productOptionRemoved) {
            $productOptionRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption objects.
     * @throws PropelException
     */
    public function countProductOptions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductOptionsPartial && !$this->isNew();
        if (null === $this->collProductOptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductOptions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getProductOptions());
            }
            $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductOptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collProductOptions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption object to this object
     * through the ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption foreign key attribute.
     *
     * @param    ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption $l ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addProductOption(ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption $l)
    {
        if ($this->collProductOptions === null) {
            $this->initProductOptions();
            $this->collProductOptionsPartial = true;
        }
        if (!in_array($l, $this->collProductOptions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductOption($l);
        }

        return $this;
    }

    /**
     * @param	ProductOption $productOption The productOption object to add.
     */
    protected function doAddProductOption($productOption)
    {
        $this->collProductOptions[]= $productOption;
        $productOption->setProduct($this);
    }

    /**
     * @param	ProductOption $productOption The productOption object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $productOption->setProduct(null);
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption objects
     */
    public function getProductOptionsJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductOptionQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getProductOptions($query, $con);
    }

    /**
     * Clears out the collImageProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @see        addImageProducts()
     */
    public function clearImageProducts()
    {
        $this->collImageProducts = null; // important to set this to null since that means it is uninitialized
        $this->collImageProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collImageProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialImageProducts($v = true)
    {
        $this->collImageProductsPartial = $v;
    }

    /**
     * Initializes the collImageProducts collection.
     *
     * By default this just sets the collImageProducts collection to an empty array (like clearcollImageProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initImageProducts($overrideExisting = true)
    {
        if (null !== $this->collImageProducts && !$overrideExisting) {
            return;
        }
        $this->collImageProducts = new PropelObjectCollection();
        $this->collImageProducts->setModel('ProjectA_Zed_Image_Persistence_PacImageProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Image_Persistence_PacImageProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Image_Persistence_PacImageProduct[] List of ProjectA_Zed_Image_Persistence_PacImageProduct objects
     * @throws PropelException
     */
    public function getImageProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collImageProductsPartial && !$this->isNew();
        if (null === $this->collImageProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collImageProducts) {
                // return empty collection
                $this->initImageProducts();
            } else {
                $collImageProducts = ProjectA_Zed_Image_Persistence_PacImageProductQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collImageProductsPartial && count($collImageProducts)) {
                      $this->initImageProducts(false);

                      foreach($collImageProducts as $obj) {
                        if (false == $this->collImageProducts->contains($obj)) {
                          $this->collImageProducts->append($obj);
                        }
                      }

                      $this->collImageProductsPartial = true;
                    }

                    $collImageProducts->getInternalIterator()->rewind();
                    return $collImageProducts;
                }

                if($partial && $this->collImageProducts) {
                    foreach($this->collImageProducts as $obj) {
                        if($obj->isNew()) {
                            $collImageProducts[] = $obj;
                        }
                    }
                }

                $this->collImageProducts = $collImageProducts;
                $this->collImageProductsPartial = false;
            }
        }

        return $this->collImageProducts;
    }

    /**
     * Sets a collection of ImageProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $imageProducts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setImageProducts(PropelCollection $imageProducts, PropelPDO $con = null)
    {
        $imageProductsToDelete = $this->getImageProducts(new Criteria(), $con)->diff($imageProducts);

        $this->imageProductsScheduledForDeletion = unserialize(serialize($imageProductsToDelete));

        foreach ($imageProductsToDelete as $imageProductRemoved) {
            $imageProductRemoved->setProduct(null);
        }

        $this->collImageProducts = null;
        foreach ($imageProducts as $imageProduct) {
            $this->addImageProduct($imageProduct);
        }

        $this->collImageProducts = $imageProducts;
        $this->collImageProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Image_Persistence_PacImageProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Image_Persistence_PacImageProduct objects.
     * @throws PropelException
     */
    public function countImageProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collImageProductsPartial && !$this->isNew();
        if (null === $this->collImageProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collImageProducts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getImageProducts());
            }
            $query = ProjectA_Zed_Image_Persistence_PacImageProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collImageProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Image_Persistence_PacImageProduct object to this object
     * through the ProjectA_Zed_Image_Persistence_PacImageProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Image_Persistence_PacImageProduct $l ProjectA_Zed_Image_Persistence_PacImageProduct
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addImageProduct(ProjectA_Zed_Image_Persistence_PacImageProduct $l)
    {
        if ($this->collImageProducts === null) {
            $this->initImageProducts();
            $this->collImageProductsPartial = true;
        }
        if (!in_array($l, $this->collImageProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddImageProduct($l);
        }

        return $this;
    }

    /**
     * @param	ImageProduct $imageProduct The imageProduct object to add.
     */
    protected function doAddImageProduct($imageProduct)
    {
        $this->collImageProducts[]= $imageProduct;
        $imageProduct->setProduct($this);
    }

    /**
     * @param	ImageProduct $imageProduct The imageProduct object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeImageProduct($imageProduct)
    {
        if ($this->getImageProducts()->contains($imageProduct)) {
            $this->collImageProducts->remove($this->collImageProducts->search($imageProduct));
            if (null === $this->imageProductsScheduledForDeletion) {
                $this->imageProductsScheduledForDeletion = clone $this->collImageProducts;
                $this->imageProductsScheduledForDeletion->clear();
            }
            $this->imageProductsScheduledForDeletion[]= clone $imageProduct;
            $imageProduct->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related ImageProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Image_Persistence_PacImageProduct[] List of ProjectA_Zed_Image_Persistence_PacImageProduct objects
     */
    public function getImageProductsJoinImage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Image_Persistence_PacImageProductQuery::create(null, $criteria);
        $query->joinWith('Image', $join_behavior);

        return $this->getImageProducts($query, $con);
    }

    /**
     * Clears out the collPriceProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @see        addPriceProducts()
     */
    public function clearPriceProducts()
    {
        $this->collPriceProducts = null; // important to set this to null since that means it is uninitialized
        $this->collPriceProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collPriceProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialPriceProducts($v = true)
    {
        $this->collPriceProductsPartial = $v;
    }

    /**
     * Initializes the collPriceProducts collection.
     *
     * By default this just sets the collPriceProducts collection to an empty array (like clearcollPriceProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPriceProducts($overrideExisting = true)
    {
        if (null !== $this->collPriceProducts && !$overrideExisting) {
            return;
        }
        $this->collPriceProducts = new PropelObjectCollection();
        $this->collPriceProducts->setModel('ProjectA_Zed_Price_Persistence_PacPriceProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Price_Persistence_PacPriceProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Price_Persistence_PacPriceProduct[] List of ProjectA_Zed_Price_Persistence_PacPriceProduct objects
     * @throws PropelException
     */
    public function getPriceProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPriceProductsPartial && !$this->isNew();
        if (null === $this->collPriceProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPriceProducts) {
                // return empty collection
                $this->initPriceProducts();
            } else {
                $collPriceProducts = ProjectA_Zed_Price_Persistence_PacPriceProductQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPriceProductsPartial && count($collPriceProducts)) {
                      $this->initPriceProducts(false);

                      foreach($collPriceProducts as $obj) {
                        if (false == $this->collPriceProducts->contains($obj)) {
                          $this->collPriceProducts->append($obj);
                        }
                      }

                      $this->collPriceProductsPartial = true;
                    }

                    $collPriceProducts->getInternalIterator()->rewind();
                    return $collPriceProducts;
                }

                if($partial && $this->collPriceProducts) {
                    foreach($this->collPriceProducts as $obj) {
                        if($obj->isNew()) {
                            $collPriceProducts[] = $obj;
                        }
                    }
                }

                $this->collPriceProducts = $collPriceProducts;
                $this->collPriceProductsPartial = false;
            }
        }

        return $this->collPriceProducts;
    }

    /**
     * Sets a collection of PriceProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $priceProducts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setPriceProducts(PropelCollection $priceProducts, PropelPDO $con = null)
    {
        $priceProductsToDelete = $this->getPriceProducts(new Criteria(), $con)->diff($priceProducts);

        $this->priceProductsScheduledForDeletion = unserialize(serialize($priceProductsToDelete));

        foreach ($priceProductsToDelete as $priceProductRemoved) {
            $priceProductRemoved->setProduct(null);
        }

        $this->collPriceProducts = null;
        foreach ($priceProducts as $priceProduct) {
            $this->addPriceProduct($priceProduct);
        }

        $this->collPriceProducts = $priceProducts;
        $this->collPriceProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Price_Persistence_PacPriceProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Price_Persistence_PacPriceProduct objects.
     * @throws PropelException
     */
    public function countPriceProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPriceProductsPartial && !$this->isNew();
        if (null === $this->collPriceProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPriceProducts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPriceProducts());
            }
            $query = ProjectA_Zed_Price_Persistence_PacPriceProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collPriceProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Price_Persistence_PacPriceProduct object to this object
     * through the ProjectA_Zed_Price_Persistence_PacPriceProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Price_Persistence_PacPriceProduct $l ProjectA_Zed_Price_Persistence_PacPriceProduct
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addPriceProduct(ProjectA_Zed_Price_Persistence_PacPriceProduct $l)
    {
        if ($this->collPriceProducts === null) {
            $this->initPriceProducts();
            $this->collPriceProductsPartial = true;
        }
        if (!in_array($l, $this->collPriceProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPriceProduct($l);
        }

        return $this;
    }

    /**
     * @param	PriceProduct $priceProduct The priceProduct object to add.
     */
    protected function doAddPriceProduct($priceProduct)
    {
        $this->collPriceProducts[]= $priceProduct;
        $priceProduct->setProduct($this);
    }

    /**
     * @param	PriceProduct $priceProduct The priceProduct object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function removePriceProduct($priceProduct)
    {
        if ($this->getPriceProducts()->contains($priceProduct)) {
            $this->collPriceProducts->remove($this->collPriceProducts->search($priceProduct));
            if (null === $this->priceProductsScheduledForDeletion) {
                $this->priceProductsScheduledForDeletion = clone $this->collPriceProducts;
                $this->priceProductsScheduledForDeletion->clear();
            }
            $this->priceProductsScheduledForDeletion[]= clone $priceProduct;
            $priceProduct->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related PriceProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Price_Persistence_PacPriceProduct[] List of ProjectA_Zed_Price_Persistence_PacPriceProduct objects
     */
    public function getPriceProductsJoinPriceType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Price_Persistence_PacPriceProductQuery::create(null, $criteria);
        $query->joinWith('PriceType', $join_behavior);

        return $this->getPriceProducts($query, $con);
    }

    /**
     * Clears out the collStockProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collStockProducts->setModel('ProjectA_Zed_Stock_Persistence_PacStockProduct');
    }

    /**
     * Gets an array of ProjectA_Zed_Stock_Persistence_PacStockProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_PacStockProduct[] List of ProjectA_Zed_Stock_Persistence_PacStockProduct objects
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
                $collStockProducts = ProjectA_Zed_Stock_Persistence_PacStockProductQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStockProductsPartial && count($collStockProducts)) {
                      $this->initStockProducts(false);

                      foreach($collStockProducts as $obj) {
                        if (false == $this->collStockProducts->contains($obj)) {
                          $this->collStockProducts->append($obj);
                        }
                      }

                      $this->collStockProductsPartial = true;
                    }

                    $collStockProducts->getInternalIterator()->rewind();
                    return $collStockProducts;
                }

                if($partial && $this->collStockProducts) {
                    foreach($this->collStockProducts as $obj) {
                        if($obj->isNew()) {
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setStockProducts(PropelCollection $stockProducts, PropelPDO $con = null)
    {
        $stockProductsToDelete = $this->getStockProducts(new Criteria(), $con)->diff($stockProducts);

        $this->stockProductsScheduledForDeletion = unserialize(serialize($stockProductsToDelete));

        foreach ($stockProductsToDelete as $stockProductRemoved) {
            $stockProductRemoved->setProduct(null);
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
     * Returns the number of related ProjectA_Zed_Stock_Persistence_PacStockProduct objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Stock_Persistence_PacStockProduct objects.
     * @throws PropelException
     */
    public function countStockProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStockProductsPartial && !$this->isNew();
        if (null === $this->collStockProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockProducts) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStockProducts());
            }
            $query = ProjectA_Zed_Stock_Persistence_PacStockProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collStockProducts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Stock_Persistence_PacStockProduct object to this object
     * through the ProjectA_Zed_Stock_Persistence_PacStockProduct foreign key attribute.
     *
     * @param    ProjectA_Zed_Stock_Persistence_PacStockProduct $l ProjectA_Zed_Stock_Persistence_PacStockProduct
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addStockProduct(ProjectA_Zed_Stock_Persistence_PacStockProduct $l)
    {
        if ($this->collStockProducts === null) {
            $this->initStockProducts();
            $this->collStockProductsPartial = true;
        }
        if (!in_array($l, $this->collStockProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStockProduct($l);
        }

        return $this;
    }

    /**
     * @param	StockProduct $stockProduct The stockProduct object to add.
     */
    protected function doAddStockProduct($stockProduct)
    {
        $this->collStockProducts[]= $stockProduct;
        $stockProduct->setProduct($this);
    }

    /**
     * @param	StockProduct $stockProduct The stockProduct object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
            $stockProduct->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCatalogProduct is new, it will return
     * an empty collection; or if this PacCatalogProduct has previously
     * been saved, it will retrieve related StockProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCatalogProduct.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_PacStockProduct[] List of ProjectA_Zed_Stock_Persistence_PacStockProduct objects
     */
    public function getStockProductsJoinStock($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Stock_Persistence_PacStockProductQuery::create(null, $criteria);
        $query->joinWith('Stock', $join_behavior);

        return $this->getStockProducts($query, $con);
    }

    /**
     * Clears out the collSoldLimitedEditions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     * @see        addSoldLimitedEditions()
     */
    public function clearSoldLimitedEditions()
    {
        $this->collSoldLimitedEditions = null; // important to set this to null since that means it is uninitialized
        $this->collSoldLimitedEditionsPartial = null;

        return $this;
    }

    /**
     * reset is the collSoldLimitedEditions collection loaded partially
     *
     * @return void
     */
    public function resetPartialSoldLimitedEditions($v = true)
    {
        $this->collSoldLimitedEditionsPartial = $v;
    }

    /**
     * Initializes the collSoldLimitedEditions collection.
     *
     * By default this just sets the collSoldLimitedEditions collection to an empty array (like clearcollSoldLimitedEditions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSoldLimitedEditions($overrideExisting = true)
    {
        if (null !== $this->collSoldLimitedEditions && !$overrideExisting) {
            return;
        }
        $this->collSoldLimitedEditions = new PropelObjectCollection();
        $this->collSoldLimitedEditions->setModel('Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition');
    }

    /**
     * Gets an array of Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition[] List of Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects
     * @throws PropelException
     */
    public function getSoldLimitedEditions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSoldLimitedEditionsPartial && !$this->isNew();
        if (null === $this->collSoldLimitedEditions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSoldLimitedEditions) {
                // return empty collection
                $this->initSoldLimitedEditions();
            } else {
                $collSoldLimitedEditions = Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSoldLimitedEditionsPartial && count($collSoldLimitedEditions)) {
                      $this->initSoldLimitedEditions(false);

                      foreach($collSoldLimitedEditions as $obj) {
                        if (false == $this->collSoldLimitedEditions->contains($obj)) {
                          $this->collSoldLimitedEditions->append($obj);
                        }
                      }

                      $this->collSoldLimitedEditionsPartial = true;
                    }

                    $collSoldLimitedEditions->getInternalIterator()->rewind();
                    return $collSoldLimitedEditions;
                }

                if($partial && $this->collSoldLimitedEditions) {
                    foreach($this->collSoldLimitedEditions as $obj) {
                        if($obj->isNew()) {
                            $collSoldLimitedEditions[] = $obj;
                        }
                    }
                }

                $this->collSoldLimitedEditions = $collSoldLimitedEditions;
                $this->collSoldLimitedEditionsPartial = false;
            }
        }

        return $this->collSoldLimitedEditions;
    }

    /**
     * Sets a collection of SoldLimitedEdition objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $soldLimitedEditions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setSoldLimitedEditions(PropelCollection $soldLimitedEditions, PropelPDO $con = null)
    {
        $soldLimitedEditionsToDelete = $this->getSoldLimitedEditions(new Criteria(), $con)->diff($soldLimitedEditions);

        $this->soldLimitedEditionsScheduledForDeletion = unserialize(serialize($soldLimitedEditionsToDelete));

        foreach ($soldLimitedEditionsToDelete as $soldLimitedEditionRemoved) {
            $soldLimitedEditionRemoved->setProduct(null);
        }

        $this->collSoldLimitedEditions = null;
        foreach ($soldLimitedEditions as $soldLimitedEdition) {
            $this->addSoldLimitedEdition($soldLimitedEdition);
        }

        $this->collSoldLimitedEditions = $soldLimitedEditions;
        $this->collSoldLimitedEditionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition objects.
     * @throws PropelException
     */
    public function countSoldLimitedEditions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSoldLimitedEditionsPartial && !$this->isNew();
        if (null === $this->collSoldLimitedEditions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSoldLimitedEditions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSoldLimitedEditions());
            }
            $query = Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEditionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collSoldLimitedEditions);
    }

    /**
     * Method called to associate a Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition object to this object
     * through the Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition foreign key attribute.
     *
     * @param    Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition $l Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addSoldLimitedEdition(Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition $l)
    {
        if ($this->collSoldLimitedEditions === null) {
            $this->initSoldLimitedEditions();
            $this->collSoldLimitedEditionsPartial = true;
        }
        if (!in_array($l, $this->collSoldLimitedEditions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSoldLimitedEdition($l);
        }

        return $this;
    }

    /**
     * @param	SoldLimitedEdition $soldLimitedEdition The soldLimitedEdition object to add.
     */
    protected function doAddSoldLimitedEdition($soldLimitedEdition)
    {
        $this->collSoldLimitedEditions[]= $soldLimitedEdition;
        $soldLimitedEdition->setProduct($this);
    }

    /**
     * @param	SoldLimitedEdition $soldLimitedEdition The soldLimitedEdition object to remove.
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeSoldLimitedEdition($soldLimitedEdition)
    {
        if ($this->getSoldLimitedEditions()->contains($soldLimitedEdition)) {
            $this->collSoldLimitedEditions->remove($this->collSoldLimitedEditions->search($soldLimitedEdition));
            if (null === $this->soldLimitedEditionsScheduledForDeletion) {
                $this->soldLimitedEditionsScheduledForDeletion = clone $this->collSoldLimitedEditions;
                $this->soldLimitedEditionsScheduledForDeletion->clear();
            }
            $this->soldLimitedEditionsScheduledForDeletion[]= clone $soldLimitedEdition;
            $soldLimitedEdition->setProduct(null);
        }

        return $this;
    }

    /**
     * Clears out the collBundleProductBundles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collBundleProductBundles->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle objects
     */
    public function getBundleProductBundles($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collBundleProductBundles || null !== $criteria) {
            if ($this->isNew() && null === $this->collBundleProductBundles) {
                // return empty collection
                $this->initBundleProductBundles();
            } else {
                $collBundleProductBundles = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleQuery::create(null, $criteria)
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
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bundleProductBundles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setBundleProductBundles(PropelCollection $bundleProductBundles, PropelPDO $con = null)
    {
        $this->clearBundleProductBundles();
        $currentBundleProductBundles = $this->getBundleProductBundles();

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
     * Gets the number of ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_bundle_product cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle objects
     */
    public function countBundleProductBundles($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collBundleProductBundles || null !== $criteria) {
            if ($this->isNew() && null === $this->collBundleProductBundles) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleQuery::create(null, $criteria);
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
     * Associate a ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle object to this object
     * through the pac_catalog_product_bundle_product cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle $pacCatalogProductBundle The ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addBundleProductBundle(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle $pacCatalogProductBundle)
    {
        if ($this->collBundleProductBundles === null) {
            $this->initBundleProductBundles();
        }
        if (!$this->collBundleProductBundles->contains($pacCatalogProductBundle)) { // only add it if the **same** object is not already associated
            $this->doAddBundleProductBundle($pacCatalogProductBundle);

            $this->collBundleProductBundles[]= $pacCatalogProductBundle;
        }

        return $this;
    }

    /**
     * @param	BundleProductBundle $bundleProductBundle The bundleProductBundle object to add.
     */
    protected function doAddBundleProductBundle($bundleProductBundle)
    {
        $pacCatalogProductBundleProduct = new ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct();
        $pacCatalogProductBundleProduct->setBundleProductBundle($bundleProductBundle);
        $this->addBundleProduct($pacCatalogProductBundleProduct);
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle object to this object
     * through the pac_catalog_product_bundle_product cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle $pacCatalogProductBundle The ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeBundleProductBundle(ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundle $pacCatalogProductBundle)
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
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
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
        $this->collOptions->setModel('ProjectA_Zed_Catalog_Persistence_PacCatalogOption');
    }

    /**
     * Gets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_option cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Catalog_Persistence_PacCatalogProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_PacCatalogOption[] List of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects
     */
    public function getOptions($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collOptions || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptions) {
                // return empty collection
                $this->initOptions();
            } else {
                $collOptions = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery::create(null, $criteria)
                    ->filterByProduct($this)
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
     * Sets a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_option cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $options A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function setOptions(PropelCollection $options, PropelPDO $con = null)
    {
        $this->clearOptions();
        $currentOptions = $this->getOptions();

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
     * Gets the number of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects related by a many-to-many relationship
     * to the current object by way of the pac_catalog_product_option cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects
     */
    public function countOptions($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collOptions || null !== $criteria) {
            if ($this->isNew() && null === $this->collOptions) {
                return 0;
            } else {
                $query = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByProduct($this)
                    ->count($con);
            }
        } else {
            return count($this->collOptions);
        }
    }

    /**
     * Associate a ProjectA_Zed_Catalog_Persistence_PacCatalogOption object to this object
     * through the pac_catalog_product_option cross reference table.
     *
     * @param  ProjectA_Zed_Catalog_Persistence_PacCatalogOption $pacCatalogOption The ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function addOption(ProjectA_Zed_Catalog_Persistence_PacCatalogOption $pacCatalogOption)
    {
        if ($this->collOptions === null) {
            $this->initOptions();
        }
        if (!$this->collOptions->contains($pacCatalogOption)) { // only add it if the **same** object is not already associated
            $this->doAddOption($pacCatalogOption);

            $this->collOptions[]= $pacCatalogOption;
        }

        return $this;
    }

    /**
     * @param	Option $option The option object to add.
     */
    protected function doAddOption($option)
    {
        $pacCatalogProductOption = new ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption();
        $pacCatalogProductOption->setOption($option);
        $this->addProductOption($pacCatalogProductOption);
    }

    /**
     * Remove a ProjectA_Zed_Catalog_Persistence_PacCatalogOption object to this object
     * through the pac_catalog_product_option cross reference table.
     *
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogOption $pacCatalogOption The ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption object to relate
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function removeOption(ProjectA_Zed_Catalog_Persistence_PacCatalogOption $pacCatalogOption)
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
     * when using Propel in certain daemon or large-volumne/high-memory operations.
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
            if ($this->singleConfig) {
                $this->singleConfig->clearAllReferences($deep);
            }
            if ($this->singleSimple) {
                $this->singleSimple->clearAllReferences($deep);
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
            if ($this->collTextAreas) {
                foreach ($this->collTextAreas as $o) {
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
            if ($this->collImageProducts) {
                foreach ($this->collImageProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPriceProducts) {
                foreach ($this->collPriceProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockProducts) {
                foreach ($this->collStockProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSoldLimitedEditions) {
                foreach ($this->collSoldLimitedEditions as $o) {
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
        if ($this->singleConfig instanceof PropelCollection) {
            $this->singleConfig->clearIterator();
        }
        $this->singleConfig = null;
        if ($this->singleSimple instanceof PropelCollection) {
            $this->singleSimple->clearIterator();
        }
        $this->singleSimple = null;
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
        if ($this->collTextAreas instanceof PropelCollection) {
            $this->collTextAreas->clearIterator();
        }
        $this->collTextAreas = null;
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
        if ($this->collImageProducts instanceof PropelCollection) {
            $this->collImageProducts->clearIterator();
        }
        $this->collImageProducts = null;
        if ($this->collPriceProducts instanceof PropelCollection) {
            $this->collPriceProducts->clearIterator();
        }
        $this->collPriceProducts = null;
        if ($this->collStockProducts instanceof PropelCollection) {
            $this->collStockProducts->clearIterator();
        }
        $this->collStockProducts = null;
        if ($this->collSoldLimitedEditions instanceof PropelCollection) {
            $this->collSoldLimitedEditions->clearIterator();
        }
        $this->collSoldLimitedEditions = null;
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
        return (string) $this->exportTo(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Catalog_Persistence_PacCatalogProduct The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::UPDATED_AT;

        return $this;
    }

}
