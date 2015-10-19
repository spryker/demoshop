<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyAbstractProduct as ChildSpyAbstractProduct;
use Propel\SpyAbstractProductQuery as ChildSpyAbstractProductQuery;
use Propel\SpyLocalizedProductAttributes as ChildSpyLocalizedProductAttributes;
use Propel\SpyLocalizedProductAttributesQuery as ChildSpyLocalizedProductAttributesQuery;
use Propel\SpyPriceProduct as ChildSpyPriceProduct;
use Propel\SpyPriceProductQuery as ChildSpyPriceProductQuery;
use Propel\SpyProduct as ChildSpyProduct;
use Propel\SpyProductOptionConfigurationPreset as ChildSpyProductOptionConfigurationPreset;
use Propel\SpyProductOptionConfigurationPresetQuery as ChildSpyProductOptionConfigurationPresetQuery;
use Propel\SpyProductOptionTypeUsage as ChildSpyProductOptionTypeUsage;
use Propel\SpyProductOptionTypeUsageQuery as ChildSpyProductOptionTypeUsageQuery;
use Propel\SpyProductQuery as ChildSpyProductQuery;
use Propel\SpyProductToBundle as ChildSpyProductToBundle;
use Propel\SpyProductToBundleQuery as ChildSpyProductToBundleQuery;
use Propel\SpySearchableProducts as ChildSpySearchableProducts;
use Propel\SpySearchableProductsQuery as ChildSpySearchableProductsQuery;
use Propel\SpyStockProduct as ChildSpyStockProduct;
use Propel\SpyStockProductQuery as ChildSpyStockProductQuery;
use Propel\SpyWishlistItem as ChildSpyWishlistItem;
use Propel\SpyWishlistItemQuery as ChildSpyWishlistItemQuery;
use Propel\Map\SpyProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'spy_product' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyProduct extends SpyProduct implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyProductTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id_product field.
     * @var        int
     */
    protected $id_product;

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
     * The value for the attributes field.
     * @var        string
     */
    protected $attributes;

    /**
     * The value for the fk_abstract_product field.
     * @var        int
     */
    protected $fk_abstract_product;

    /**
     * The value for the created_at field.
     * @var        \DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        \DateTime
     */
    protected $updated_at;

    /**
     * @var        ChildSpyAbstractProduct
     */
    protected $aSpyAbstractProduct;

    /**
     * @var        ObjectCollection|ChildSpyPriceProduct[] Collection to store aggregation of ChildSpyPriceProduct objects.
     */
    protected $collPriceProducts;
    protected $collPriceProductsPartial;

    /**
     * @var        ObjectCollection|ChildSpyLocalizedProductAttributes[] Collection to store aggregation of ChildSpyLocalizedProductAttributes objects.
     */
    protected $collSpyLocalizedProductAttributess;
    protected $collSpyLocalizedProductAttributessPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductToBundle[] Collection to store aggregation of ChildSpyProductToBundle objects.
     */
    protected $collSpyProductToBundlesRelatedByFkProduct;
    protected $collSpyProductToBundlesRelatedByFkProductPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductToBundle[] Collection to store aggregation of ChildSpyProductToBundle objects.
     */
    protected $collBundleProducts;
    protected $collBundleProductsPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionTypeUsage[] Collection to store aggregation of ChildSpyProductOptionTypeUsage objects.
     */
    protected $collSpyProductOptionTypeUsages;
    protected $collSpyProductOptionTypeUsagesPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductOptionConfigurationPreset[] Collection to store aggregation of ChildSpyProductOptionConfigurationPreset objects.
     */
    protected $collSpyProductOptionConfigurationPresets;
    protected $collSpyProductOptionConfigurationPresetsPartial;

    /**
     * @var        ObjectCollection|ChildSpySearchableProducts[] Collection to store aggregation of ChildSpySearchableProducts objects.
     */
    protected $collSpySearchableProductss;
    protected $collSpySearchableProductssPartial;

    /**
     * @var        ObjectCollection|ChildSpyStockProduct[] Collection to store aggregation of ChildSpyStockProduct objects.
     */
    protected $collStockProducts;
    protected $collStockProductsPartial;

    /**
     * @var        ObjectCollection|ChildSpyWishlistItem[] Collection to store aggregation of ChildSpyWishlistItem objects.
     */
    protected $collSpyWishlistItems;
    protected $collSpyWishlistItemsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPriceProduct[]
     */
    protected $priceProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyLocalizedProductAttributes[]
     */
    protected $spyLocalizedProductAttributessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductToBundle[]
     */
    protected $spyProductToBundlesRelatedByFkProductScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductToBundle[]
     */
    protected $bundleProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionTypeUsage[]
     */
    protected $spyProductOptionTypeUsagesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductOptionConfigurationPreset[]
     */
    protected $spyProductOptionConfigurationPresetsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySearchableProducts[]
     */
    protected $spySearchableProductssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyStockProduct[]
     */
    protected $stockProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyWishlistItem[]
     */
    protected $spyWishlistItemsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
    }

    /**
     * Initializes internal state of Propel\Base\SpyProduct object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>SpyProduct</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyProduct</code>, delegates to
     * <code>equals(SpyProduct)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|SpyProduct The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [id_product] column value.
     *
     * @return int
     */
    public function getIdProduct()
    {
        return $this->id_product;
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
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->getIsActive();
    }

    /**
     * Get the [attributes] column value.
     *
     * @return string
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get the [fk_abstract_product] column value.
     *
     * @return int
     */
    public function getFkAbstractProduct()
    {
        return $this->fk_abstract_product;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTime ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTime ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id_product] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function setIdProduct($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_product !== $v) {
            $this->id_product = $v;
            $this->modifiedColumns[SpyProductTableMap::COL_ID_PRODUCT] = true;
        }

        return $this;
    } // setIdProduct()

    /**
     * Set the value of [sku] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[SpyProductTableMap::COL_SKU] = true;
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
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
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
            $this->modifiedColumns[SpyProductTableMap::COL_IS_ACTIVE] = true;
        }

        return $this;
    } // setIsActive()

    /**
     * Set the value of [attributes] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function setAttributes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->attributes !== $v) {
            $this->attributes = $v;
            $this->modifiedColumns[SpyProductTableMap::COL_ATTRIBUTES] = true;
        }

        return $this;
    } // setAttributes()

    /**
     * Set the value of [fk_abstract_product] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function setFkAbstractProduct($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_abstract_product !== $v) {
            $this->fk_abstract_product = $v;
            $this->modifiedColumns[SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT] = true;
        }

        if ($this->aSpyAbstractProduct !== null && $this->aSpyAbstractProduct->getIdAbstractProduct() !== $v) {
            $this->aSpyAbstractProduct = null;
        }

        return $this;
    } // setFkAbstractProduct()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyProductTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyProductTableMap::COL_UPDATED_AT] = true;
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
            if ($this->is_active !== true) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
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
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyProductTableMap::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_product = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyProductTableMap::translateFieldName('Sku', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sku = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyProductTableMap::translateFieldName('IsActive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_active = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyProductTableMap::translateFieldName('Attributes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->attributes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyProductTableMap::translateFieldName('FkAbstractProduct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_abstract_product = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyProductTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyProductTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = SpyProductTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyProduct'), 0, $e);
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
        if ($this->aSpyAbstractProduct !== null && $this->fk_abstract_product !== $this->aSpyAbstractProduct->getIdAbstractProduct()) {
            $this->aSpyAbstractProduct = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyProductQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyAbstractProduct = null;
            $this->collPriceProducts = null;

            $this->collSpyLocalizedProductAttributess = null;

            $this->collSpyProductToBundlesRelatedByFkProduct = null;

            $this->collBundleProducts = null;

            $this->collSpyProductOptionTypeUsages = null;

            $this->collSpyProductOptionConfigurationPresets = null;

            $this->collSpySearchableProductss = null;

            $this->collStockProducts = null;

            $this->collSpyWishlistItems = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyProduct::setDeleted()
     * @see SpyProduct::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyProductQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyProductTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyProductTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyProductTableMap::COL_UPDATED_AT)) {
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
                SpyProductTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSpyAbstractProduct !== null) {
                if ($this->aSpyAbstractProduct->isModified() || $this->aSpyAbstractProduct->isNew()) {
                    $affectedRows += $this->aSpyAbstractProduct->save($con);
                }
                $this->setSpyAbstractProduct($this->aSpyAbstractProduct);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->priceProductsScheduledForDeletion !== null) {
                if (!$this->priceProductsScheduledForDeletion->isEmpty()) {
                    foreach ($this->priceProductsScheduledForDeletion as $priceProduct) {
                        // need to save related object because we set the relation to null
                        $priceProduct->save($con);
                    }
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

            if ($this->spyLocalizedProductAttributessScheduledForDeletion !== null) {
                if (!$this->spyLocalizedProductAttributessScheduledForDeletion->isEmpty()) {
                    \Propel\SpyLocalizedProductAttributesQuery::create()
                        ->filterByPrimaryKeys($this->spyLocalizedProductAttributessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyLocalizedProductAttributessScheduledForDeletion = null;
                }
            }

            if ($this->collSpyLocalizedProductAttributess !== null) {
                foreach ($this->collSpyLocalizedProductAttributess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductToBundlesRelatedByFkProductScheduledForDeletion !== null) {
                if (!$this->spyProductToBundlesRelatedByFkProductScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductToBundleQuery::create()
                        ->filterByPrimaryKeys($this->spyProductToBundlesRelatedByFkProductScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductToBundlesRelatedByFkProductScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductToBundlesRelatedByFkProduct !== null) {
                foreach ($this->collSpyProductToBundlesRelatedByFkProduct as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bundleProductsScheduledForDeletion !== null) {
                if (!$this->bundleProductsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductToBundleQuery::create()
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

            if ($this->spyProductOptionTypeUsagesScheduledForDeletion !== null) {
                if (!$this->spyProductOptionTypeUsagesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionTypeUsageQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionTypeUsagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionTypeUsagesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionTypeUsages !== null) {
                foreach ($this->collSpyProductOptionTypeUsages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductOptionConfigurationPresetsScheduledForDeletion !== null) {
                if (!$this->spyProductOptionConfigurationPresetsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductOptionConfigurationPresetQuery::create()
                        ->filterByPrimaryKeys($this->spyProductOptionConfigurationPresetsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductOptionConfigurationPresetsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductOptionConfigurationPresets !== null) {
                foreach ($this->collSpyProductOptionConfigurationPresets as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spySearchableProductssScheduledForDeletion !== null) {
                if (!$this->spySearchableProductssScheduledForDeletion->isEmpty()) {
                    foreach ($this->spySearchableProductssScheduledForDeletion as $spySearchableProducts) {
                        // need to save related object because we set the relation to null
                        $spySearchableProducts->save($con);
                    }
                    $this->spySearchableProductssScheduledForDeletion = null;
                }
            }

            if ($this->collSpySearchableProductss !== null) {
                foreach ($this->collSpySearchableProductss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stockProductsScheduledForDeletion !== null) {
                if (!$this->stockProductsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyStockProductQuery::create()
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

            if ($this->spyWishlistItemsScheduledForDeletion !== null) {
                if (!$this->spyWishlistItemsScheduledForDeletion->isEmpty()) {
                    foreach ($this->spyWishlistItemsScheduledForDeletion as $spyWishlistItem) {
                        // need to save related object because we set the relation to null
                        $spyWishlistItem->save($con);
                    }
                    $this->spyWishlistItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyWishlistItems !== null) {
                foreach ($this->collSpyWishlistItems as $referrerFK) {
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
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[SpyProductTableMap::COL_ID_PRODUCT] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyProductTableMap::COL_ID_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`id_product`';
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_SKU)) {
            $modifiedColumns[':p' . $index++]  = '`sku`';
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_ATTRIBUTES)) {
            $modifiedColumns[':p' . $index++]  = '`attributes`';
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`fk_abstract_product`';
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `spy_product` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_product`':
                        $stmt->bindValue($identifier, $this->id_product, PDO::PARAM_INT);
                        break;
                    case '`sku`':
                        $stmt->bindValue($identifier, $this->sku, PDO::PARAM_STR);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case '`attributes`':
                        $stmt->bindValue($identifier, $this->attributes, PDO::PARAM_STR);
                        break;
                    case '`fk_abstract_product`':
                        $stmt->bindValue($identifier, $this->fk_abstract_product, PDO::PARAM_INT);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_product_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdProduct($pk);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_FIELDNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdProduct();
                break;
            case 1:
                return $this->getSku();
                break;
            case 2:
                return $this->getIsActive();
                break;
            case 3:
                return $this->getAttributes();
                break;
            case 4:
                return $this->getFkAbstractProduct();
                break;
            case 5:
                return $this->getCreatedAt();
                break;
            case 6:
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
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['SpyProduct'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyProduct'][$this->hashCode()] = true;
        $keys = SpyProductTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProduct(),
            $keys[1] => $this->getSku(),
            $keys[2] => $this->getIsActive(),
            $keys[3] => $this->getAttributes(),
            $keys[4] => $this->getFkAbstractProduct(),
            $keys[5] => $this->getCreatedAt(),
            $keys[6] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[5]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[5]];
            $result[$keys[5]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[6]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[6]];
            $result[$keys[6]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyAbstractProduct) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyAbstractProduct';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_abstract_product';
                        break;
                    default:
                        $key = 'SpyAbstractProduct';
                }

                $result[$key] = $this->aSpyAbstractProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPriceProducts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPriceProducts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_price_products';
                        break;
                    default:
                        $key = 'SpyPriceProducts';
                }

                $result[$key] = $this->collPriceProducts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyLocalizedProductAttributess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyLocalizedProductAttributess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_localized_attributess';
                        break;
                    default:
                        $key = 'SpyLocalizedProductAttributess';
                }

                $result[$key] = $this->collSpyLocalizedProductAttributess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductToBundlesRelatedByFkProduct) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductToBundles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_to_bundles';
                        break;
                    default:
                        $key = 'SpyProductToBundles';
                }

                $result[$key] = $this->collSpyProductToBundlesRelatedByFkProduct->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBundleProducts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductToBundles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_to_bundles';
                        break;
                    default:
                        $key = 'SpyProductToBundles';
                }

                $result[$key] = $this->collBundleProducts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionTypeUsages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionTypeUsages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_type_usages';
                        break;
                    default:
                        $key = 'SpyProductOptionTypeUsages';
                }

                $result[$key] = $this->collSpyProductOptionTypeUsages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductOptionConfigurationPresets) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductOptionConfigurationPresets';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_option_configuration_presets';
                        break;
                    default:
                        $key = 'SpyProductOptionConfigurationPresets';
                }

                $result[$key] = $this->collSpyProductOptionConfigurationPresets->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpySearchableProductss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySearchableProductss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_searchable_productss';
                        break;
                    default:
                        $key = 'SpySearchableProductss';
                }

                $result[$key] = $this->collSpySearchableProductss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStockProducts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyStockProducts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_stock_products';
                        break;
                    default:
                        $key = 'SpyStockProducts';
                }

                $result[$key] = $this->collStockProducts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyWishlistItems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyWishlistItems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_wishlist_items';
                        break;
                    default:
                        $key = 'SpyWishlistItems';
                }

                $result[$key] = $this->collSpyWishlistItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_FIELDNAME.
     * @return $this|\Propel\SpyProduct
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyProduct
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProduct($value);
                break;
            case 1:
                $this->setSku($value);
                break;
            case 2:
                $this->setIsActive($value);
                break;
            case 3:
                $this->setAttributes($value);
                break;
            case 4:
                $this->setFkAbstractProduct($value);
                break;
            case 5:
                $this->setCreatedAt($value);
                break;
            case 6:
                $this->setUpdatedAt($value);
                break;
        } // switch()

        return $this;
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
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_FIELDNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_FIELDNAME)
    {
        $keys = SpyProductTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdProduct($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSku($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIsActive($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAttributes($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFkAbstractProduct($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCreatedAt($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setUpdatedAt($arr[$keys[6]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_FIELDNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Propel\SpyProduct The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_FIELDNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SpyProductTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyProductTableMap::COL_ID_PRODUCT)) {
            $criteria->add(SpyProductTableMap::COL_ID_PRODUCT, $this->id_product);
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_SKU)) {
            $criteria->add(SpyProductTableMap::COL_SKU, $this->sku);
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_IS_ACTIVE)) {
            $criteria->add(SpyProductTableMap::COL_IS_ACTIVE, $this->is_active);
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_ATTRIBUTES)) {
            $criteria->add(SpyProductTableMap::COL_ATTRIBUTES, $this->attributes);
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT)) {
            $criteria->add(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT, $this->fk_abstract_product);
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyProductTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyProductTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyProductTableMap::COL_UPDATED_AT, $this->updated_at);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildSpyProductQuery::create();
        $criteria->add(SpyProductTableMap::COL_ID_PRODUCT, $this->id_product);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdProduct();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdProduct();
    }

    /**
     * Generic method to set the primary key (id_product column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProduct($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdProduct();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyProduct (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSku($this->getSku());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setAttributes($this->getAttributes());
        $copyObj->setFkAbstractProduct($this->getFkAbstractProduct());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getPriceProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPriceProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyLocalizedProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyLocalizedProductAttributes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductToBundlesRelatedByFkProduct() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductToBundleRelatedByFkProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBundleProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBundleProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionTypeUsages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionTypeUsage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductOptionConfigurationPresets() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductOptionConfigurationPreset($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpySearchableProductss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpySearchableProducts($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStockProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStockProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyWishlistItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyWishlistItem($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdProduct(NULL); // this is a auto-increment column, so set to default value
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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Propel\SpyProduct Clone of current object.
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
     * Declares an association between this object and a ChildSpyAbstractProduct object.
     *
     * @param  ChildSpyAbstractProduct $v
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyAbstractProduct(ChildSpyAbstractProduct $v = null)
    {
        if ($v === null) {
            $this->setFkAbstractProduct(NULL);
        } else {
            $this->setFkAbstractProduct($v->getIdAbstractProduct());
        }

        $this->aSpyAbstractProduct = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyAbstractProduct object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProduct($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyAbstractProduct object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyAbstractProduct The associated ChildSpyAbstractProduct object.
     * @throws PropelException
     */
    public function getSpyAbstractProduct(ConnectionInterface $con = null)
    {
        if ($this->aSpyAbstractProduct === null && ($this->fk_abstract_product !== null)) {
            $this->aSpyAbstractProduct = ChildSpyAbstractProductQuery::create()->findPk($this->fk_abstract_product, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyAbstractProduct->addSpyProducts($this);
             */
        }

        return $this->aSpyAbstractProduct;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('PriceProduct' == $relationName) {
            return $this->initPriceProducts();
        }
        if ('SpyLocalizedProductAttributes' == $relationName) {
            return $this->initSpyLocalizedProductAttributess();
        }
        if ('SpyProductToBundleRelatedByFkProduct' == $relationName) {
            return $this->initSpyProductToBundlesRelatedByFkProduct();
        }
        if ('BundleProduct' == $relationName) {
            return $this->initBundleProducts();
        }
        if ('SpyProductOptionTypeUsage' == $relationName) {
            return $this->initSpyProductOptionTypeUsages();
        }
        if ('SpyProductOptionConfigurationPreset' == $relationName) {
            return $this->initSpyProductOptionConfigurationPresets();
        }
        if ('SpySearchableProducts' == $relationName) {
            return $this->initSpySearchableProductss();
        }
        if ('StockProduct' == $relationName) {
            return $this->initStockProducts();
        }
        if ('SpyWishlistItem' == $relationName) {
            return $this->initSpyWishlistItems();
        }
    }

    /**
     * Clears out the collPriceProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPriceProducts()
     */
    public function clearPriceProducts()
    {
        $this->collPriceProducts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPriceProducts collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPriceProducts($overrideExisting = true)
    {
        if (null !== $this->collPriceProducts && !$overrideExisting) {
            return;
        }
        $this->collPriceProducts = new ObjectCollection();
        $this->collPriceProducts->setModel('\Propel\SpyPriceProduct');
    }

    /**
     * Gets an array of ChildSpyPriceProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPriceProduct[] List of ChildSpyPriceProduct objects
     * @throws PropelException
     */
    public function getPriceProducts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPriceProductsPartial && !$this->isNew();
        if (null === $this->collPriceProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPriceProducts) {
                // return empty collection
                $this->initPriceProducts();
            } else {
                $collPriceProducts = ChildSpyPriceProductQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPriceProductsPartial && count($collPriceProducts)) {
                        $this->initPriceProducts(false);

                        foreach ($collPriceProducts as $obj) {
                            if (false == $this->collPriceProducts->contains($obj)) {
                                $this->collPriceProducts->append($obj);
                            }
                        }

                        $this->collPriceProductsPartial = true;
                    }

                    return $collPriceProducts;
                }

                if ($partial && $this->collPriceProducts) {
                    foreach ($this->collPriceProducts as $obj) {
                        if ($obj->isNew()) {
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
     * Sets a collection of ChildSpyPriceProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $priceProducts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setPriceProducts(Collection $priceProducts, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPriceProduct[] $priceProductsToDelete */
        $priceProductsToDelete = $this->getPriceProducts(new Criteria(), $con)->diff($priceProducts);


        $this->priceProductsScheduledForDeletion = $priceProductsToDelete;

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
     * Returns the number of related SpyPriceProduct objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPriceProduct objects.
     * @throws PropelException
     */
    public function countPriceProducts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPriceProductsPartial && !$this->isNew();
        if (null === $this->collPriceProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPriceProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPriceProducts());
            }

            $query = ChildSpyPriceProductQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpyPriceProduct object to this object
     * through the ChildSpyPriceProduct foreign key attribute.
     *
     * @param  ChildSpyPriceProduct $l ChildSpyPriceProduct
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addPriceProduct(ChildSpyPriceProduct $l)
    {
        if ($this->collPriceProducts === null) {
            $this->initPriceProducts();
            $this->collPriceProductsPartial = true;
        }

        if (!$this->collPriceProducts->contains($l)) {
            $this->doAddPriceProduct($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPriceProduct $priceProduct The ChildSpyPriceProduct object to add.
     */
    protected function doAddPriceProduct(ChildSpyPriceProduct $priceProduct)
    {
        $this->collPriceProducts[]= $priceProduct;
        $priceProduct->setProduct($this);
    }

    /**
     * @param  ChildSpyPriceProduct $priceProduct The ChildSpyPriceProduct object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removePriceProduct(ChildSpyPriceProduct $priceProduct)
    {
        if ($this->getPriceProducts()->contains($priceProduct)) {
            $pos = $this->collPriceProducts->search($priceProduct);
            $this->collPriceProducts->remove($pos);
            if (null === $this->priceProductsScheduledForDeletion) {
                $this->priceProductsScheduledForDeletion = clone $this->collPriceProducts;
                $this->priceProductsScheduledForDeletion->clear();
            }
            $this->priceProductsScheduledForDeletion[]= $priceProduct;
            $priceProduct->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related PriceProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyPriceProduct[] List of ChildSpyPriceProduct objects
     */
    public function getPriceProductsJoinPriceType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyPriceProductQuery::create(null, $criteria);
        $query->joinWith('PriceType', $joinBehavior);

        return $this->getPriceProducts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related PriceProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyPriceProduct[] List of ChildSpyPriceProduct objects
     */
    public function getPriceProductsJoinSpyAbstractProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyPriceProductQuery::create(null, $criteria);
        $query->joinWith('SpyAbstractProduct', $joinBehavior);

        return $this->getPriceProducts($query, $con);
    }

    /**
     * Clears out the collSpyLocalizedProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyLocalizedProductAttributess()
     */
    public function clearSpyLocalizedProductAttributess()
    {
        $this->collSpyLocalizedProductAttributess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyLocalizedProductAttributess collection loaded partially.
     */
    public function resetPartialSpyLocalizedProductAttributess($v = true)
    {
        $this->collSpyLocalizedProductAttributessPartial = $v;
    }

    /**
     * Initializes the collSpyLocalizedProductAttributess collection.
     *
     * By default this just sets the collSpyLocalizedProductAttributess collection to an empty array (like clearcollSpyLocalizedProductAttributess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyLocalizedProductAttributess($overrideExisting = true)
    {
        if (null !== $this->collSpyLocalizedProductAttributess && !$overrideExisting) {
            return;
        }
        $this->collSpyLocalizedProductAttributess = new ObjectCollection();
        $this->collSpyLocalizedProductAttributess->setModel('\Propel\SpyLocalizedProductAttributes');
    }

    /**
     * Gets an array of ChildSpyLocalizedProductAttributes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyLocalizedProductAttributes[] List of ChildSpyLocalizedProductAttributes objects
     * @throws PropelException
     */
    public function getSpyLocalizedProductAttributess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedProductAttributess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedProductAttributess) {
                // return empty collection
                $this->initSpyLocalizedProductAttributess();
            } else {
                $collSpyLocalizedProductAttributess = ChildSpyLocalizedProductAttributesQuery::create(null, $criteria)
                    ->filterBySpyProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyLocalizedProductAttributessPartial && count($collSpyLocalizedProductAttributess)) {
                        $this->initSpyLocalizedProductAttributess(false);

                        foreach ($collSpyLocalizedProductAttributess as $obj) {
                            if (false == $this->collSpyLocalizedProductAttributess->contains($obj)) {
                                $this->collSpyLocalizedProductAttributess->append($obj);
                            }
                        }

                        $this->collSpyLocalizedProductAttributessPartial = true;
                    }

                    return $collSpyLocalizedProductAttributess;
                }

                if ($partial && $this->collSpyLocalizedProductAttributess) {
                    foreach ($this->collSpyLocalizedProductAttributess as $obj) {
                        if ($obj->isNew()) {
                            $collSpyLocalizedProductAttributess[] = $obj;
                        }
                    }
                }

                $this->collSpyLocalizedProductAttributess = $collSpyLocalizedProductAttributess;
                $this->collSpyLocalizedProductAttributessPartial = false;
            }
        }

        return $this->collSpyLocalizedProductAttributess;
    }

    /**
     * Sets a collection of ChildSpyLocalizedProductAttributes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyLocalizedProductAttributess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setSpyLocalizedProductAttributess(Collection $spyLocalizedProductAttributess, ConnectionInterface $con = null)
    {
        /** @var ChildSpyLocalizedProductAttributes[] $spyLocalizedProductAttributessToDelete */
        $spyLocalizedProductAttributessToDelete = $this->getSpyLocalizedProductAttributess(new Criteria(), $con)->diff($spyLocalizedProductAttributess);


        $this->spyLocalizedProductAttributessScheduledForDeletion = $spyLocalizedProductAttributessToDelete;

        foreach ($spyLocalizedProductAttributessToDelete as $spyLocalizedProductAttributesRemoved) {
            $spyLocalizedProductAttributesRemoved->setSpyProduct(null);
        }

        $this->collSpyLocalizedProductAttributess = null;
        foreach ($spyLocalizedProductAttributess as $spyLocalizedProductAttributes) {
            $this->addSpyLocalizedProductAttributes($spyLocalizedProductAttributes);
        }

        $this->collSpyLocalizedProductAttributess = $spyLocalizedProductAttributess;
        $this->collSpyLocalizedProductAttributessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyLocalizedProductAttributes objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyLocalizedProductAttributes objects.
     * @throws PropelException
     */
    public function countSpyLocalizedProductAttributess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedProductAttributess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedProductAttributess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyLocalizedProductAttributess());
            }

            $query = ChildSpyLocalizedProductAttributesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProduct($this)
                ->count($con);
        }

        return count($this->collSpyLocalizedProductAttributess);
    }

    /**
     * Method called to associate a ChildSpyLocalizedProductAttributes object to this object
     * through the ChildSpyLocalizedProductAttributes foreign key attribute.
     *
     * @param  ChildSpyLocalizedProductAttributes $l ChildSpyLocalizedProductAttributes
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addSpyLocalizedProductAttributes(ChildSpyLocalizedProductAttributes $l)
    {
        if ($this->collSpyLocalizedProductAttributess === null) {
            $this->initSpyLocalizedProductAttributess();
            $this->collSpyLocalizedProductAttributessPartial = true;
        }

        if (!$this->collSpyLocalizedProductAttributess->contains($l)) {
            $this->doAddSpyLocalizedProductAttributes($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes The ChildSpyLocalizedProductAttributes object to add.
     */
    protected function doAddSpyLocalizedProductAttributes(ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes)
    {
        $this->collSpyLocalizedProductAttributess[]= $spyLocalizedProductAttributes;
        $spyLocalizedProductAttributes->setSpyProduct($this);
    }

    /**
     * @param  ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes The ChildSpyLocalizedProductAttributes object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeSpyLocalizedProductAttributes(ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes)
    {
        if ($this->getSpyLocalizedProductAttributess()->contains($spyLocalizedProductAttributes)) {
            $pos = $this->collSpyLocalizedProductAttributess->search($spyLocalizedProductAttributes);
            $this->collSpyLocalizedProductAttributess->remove($pos);
            if (null === $this->spyLocalizedProductAttributessScheduledForDeletion) {
                $this->spyLocalizedProductAttributessScheduledForDeletion = clone $this->collSpyLocalizedProductAttributess;
                $this->spyLocalizedProductAttributessScheduledForDeletion->clear();
            }
            $this->spyLocalizedProductAttributessScheduledForDeletion[]= clone $spyLocalizedProductAttributes;
            $spyLocalizedProductAttributes->setSpyProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related SpyLocalizedProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyLocalizedProductAttributes[] List of ChildSpyLocalizedProductAttributes objects
     */
    public function getSpyLocalizedProductAttributessJoinLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyLocalizedProductAttributesQuery::create(null, $criteria);
        $query->joinWith('Locale', $joinBehavior);

        return $this->getSpyLocalizedProductAttributess($query, $con);
    }

    /**
     * Clears out the collSpyProductToBundlesRelatedByFkProduct collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductToBundlesRelatedByFkProduct()
     */
    public function clearSpyProductToBundlesRelatedByFkProduct()
    {
        $this->collSpyProductToBundlesRelatedByFkProduct = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductToBundlesRelatedByFkProduct collection loaded partially.
     */
    public function resetPartialSpyProductToBundlesRelatedByFkProduct($v = true)
    {
        $this->collSpyProductToBundlesRelatedByFkProductPartial = $v;
    }

    /**
     * Initializes the collSpyProductToBundlesRelatedByFkProduct collection.
     *
     * By default this just sets the collSpyProductToBundlesRelatedByFkProduct collection to an empty array (like clearcollSpyProductToBundlesRelatedByFkProduct());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductToBundlesRelatedByFkProduct($overrideExisting = true)
    {
        if (null !== $this->collSpyProductToBundlesRelatedByFkProduct && !$overrideExisting) {
            return;
        }
        $this->collSpyProductToBundlesRelatedByFkProduct = new ObjectCollection();
        $this->collSpyProductToBundlesRelatedByFkProduct->setModel('\Propel\SpyProductToBundle');
    }

    /**
     * Gets an array of ChildSpyProductToBundle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductToBundle[] List of ChildSpyProductToBundle objects
     * @throws PropelException
     */
    public function getSpyProductToBundlesRelatedByFkProduct(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductToBundlesRelatedByFkProductPartial && !$this->isNew();
        if (null === $this->collSpyProductToBundlesRelatedByFkProduct || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductToBundlesRelatedByFkProduct) {
                // return empty collection
                $this->initSpyProductToBundlesRelatedByFkProduct();
            } else {
                $collSpyProductToBundlesRelatedByFkProduct = ChildSpyProductToBundleQuery::create(null, $criteria)
                    ->filterBySpyProductRelatedByFkProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductToBundlesRelatedByFkProductPartial && count($collSpyProductToBundlesRelatedByFkProduct)) {
                        $this->initSpyProductToBundlesRelatedByFkProduct(false);

                        foreach ($collSpyProductToBundlesRelatedByFkProduct as $obj) {
                            if (false == $this->collSpyProductToBundlesRelatedByFkProduct->contains($obj)) {
                                $this->collSpyProductToBundlesRelatedByFkProduct->append($obj);
                            }
                        }

                        $this->collSpyProductToBundlesRelatedByFkProductPartial = true;
                    }

                    return $collSpyProductToBundlesRelatedByFkProduct;
                }

                if ($partial && $this->collSpyProductToBundlesRelatedByFkProduct) {
                    foreach ($this->collSpyProductToBundlesRelatedByFkProduct as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductToBundlesRelatedByFkProduct[] = $obj;
                        }
                    }
                }

                $this->collSpyProductToBundlesRelatedByFkProduct = $collSpyProductToBundlesRelatedByFkProduct;
                $this->collSpyProductToBundlesRelatedByFkProductPartial = false;
            }
        }

        return $this->collSpyProductToBundlesRelatedByFkProduct;
    }

    /**
     * Sets a collection of ChildSpyProductToBundle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductToBundlesRelatedByFkProduct A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setSpyProductToBundlesRelatedByFkProduct(Collection $spyProductToBundlesRelatedByFkProduct, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductToBundle[] $spyProductToBundlesRelatedByFkProductToDelete */
        $spyProductToBundlesRelatedByFkProductToDelete = $this->getSpyProductToBundlesRelatedByFkProduct(new Criteria(), $con)->diff($spyProductToBundlesRelatedByFkProduct);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyProductToBundlesRelatedByFkProductScheduledForDeletion = clone $spyProductToBundlesRelatedByFkProductToDelete;

        foreach ($spyProductToBundlesRelatedByFkProductToDelete as $spyProductToBundleRelatedByFkProductRemoved) {
            $spyProductToBundleRelatedByFkProductRemoved->setSpyProductRelatedByFkProduct(null);
        }

        $this->collSpyProductToBundlesRelatedByFkProduct = null;
        foreach ($spyProductToBundlesRelatedByFkProduct as $spyProductToBundleRelatedByFkProduct) {
            $this->addSpyProductToBundleRelatedByFkProduct($spyProductToBundleRelatedByFkProduct);
        }

        $this->collSpyProductToBundlesRelatedByFkProduct = $spyProductToBundlesRelatedByFkProduct;
        $this->collSpyProductToBundlesRelatedByFkProductPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductToBundle objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductToBundle objects.
     * @throws PropelException
     */
    public function countSpyProductToBundlesRelatedByFkProduct(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductToBundlesRelatedByFkProductPartial && !$this->isNew();
        if (null === $this->collSpyProductToBundlesRelatedByFkProduct || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductToBundlesRelatedByFkProduct) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductToBundlesRelatedByFkProduct());
            }

            $query = ChildSpyProductToBundleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductRelatedByFkProduct($this)
                ->count($con);
        }

        return count($this->collSpyProductToBundlesRelatedByFkProduct);
    }

    /**
     * Method called to associate a ChildSpyProductToBundle object to this object
     * through the ChildSpyProductToBundle foreign key attribute.
     *
     * @param  ChildSpyProductToBundle $l ChildSpyProductToBundle
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addSpyProductToBundleRelatedByFkProduct(ChildSpyProductToBundle $l)
    {
        if ($this->collSpyProductToBundlesRelatedByFkProduct === null) {
            $this->initSpyProductToBundlesRelatedByFkProduct();
            $this->collSpyProductToBundlesRelatedByFkProductPartial = true;
        }

        if (!$this->collSpyProductToBundlesRelatedByFkProduct->contains($l)) {
            $this->doAddSpyProductToBundleRelatedByFkProduct($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductToBundle $spyProductToBundleRelatedByFkProduct The ChildSpyProductToBundle object to add.
     */
    protected function doAddSpyProductToBundleRelatedByFkProduct(ChildSpyProductToBundle $spyProductToBundleRelatedByFkProduct)
    {
        $this->collSpyProductToBundlesRelatedByFkProduct[]= $spyProductToBundleRelatedByFkProduct;
        $spyProductToBundleRelatedByFkProduct->setSpyProductRelatedByFkProduct($this);
    }

    /**
     * @param  ChildSpyProductToBundle $spyProductToBundleRelatedByFkProduct The ChildSpyProductToBundle object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeSpyProductToBundleRelatedByFkProduct(ChildSpyProductToBundle $spyProductToBundleRelatedByFkProduct)
    {
        if ($this->getSpyProductToBundlesRelatedByFkProduct()->contains($spyProductToBundleRelatedByFkProduct)) {
            $pos = $this->collSpyProductToBundlesRelatedByFkProduct->search($spyProductToBundleRelatedByFkProduct);
            $this->collSpyProductToBundlesRelatedByFkProduct->remove($pos);
            if (null === $this->spyProductToBundlesRelatedByFkProductScheduledForDeletion) {
                $this->spyProductToBundlesRelatedByFkProductScheduledForDeletion = clone $this->collSpyProductToBundlesRelatedByFkProduct;
                $this->spyProductToBundlesRelatedByFkProductScheduledForDeletion->clear();
            }
            $this->spyProductToBundlesRelatedByFkProductScheduledForDeletion[]= clone $spyProductToBundleRelatedByFkProduct;
            $spyProductToBundleRelatedByFkProduct->setSpyProductRelatedByFkProduct(null);
        }

        return $this;
    }

    /**
     * Clears out the collBundleProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addBundleProducts()
     */
    public function clearBundleProducts()
    {
        $this->collBundleProducts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collBundleProducts collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBundleProducts($overrideExisting = true)
    {
        if (null !== $this->collBundleProducts && !$overrideExisting) {
            return;
        }
        $this->collBundleProducts = new ObjectCollection();
        $this->collBundleProducts->setModel('\Propel\SpyProductToBundle');
    }

    /**
     * Gets an array of ChildSpyProductToBundle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductToBundle[] List of ChildSpyProductToBundle objects
     * @throws PropelException
     */
    public function getBundleProducts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collBundleProductsPartial && !$this->isNew();
        if (null === $this->collBundleProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBundleProducts) {
                // return empty collection
                $this->initBundleProducts();
            } else {
                $collBundleProducts = ChildSpyProductToBundleQuery::create(null, $criteria)
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
     * Sets a collection of ChildSpyProductToBundle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $bundleProducts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setBundleProducts(Collection $bundleProducts, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductToBundle[] $bundleProductsToDelete */
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
     * Returns the number of related SpyProductToBundle objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductToBundle objects.
     * @throws PropelException
     */
    public function countBundleProducts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collBundleProductsPartial && !$this->isNew();
        if (null === $this->collBundleProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBundleProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBundleProducts());
            }

            $query = ChildSpyProductToBundleQuery::create(null, $criteria);
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
     * Method called to associate a ChildSpyProductToBundle object to this object
     * through the ChildSpyProductToBundle foreign key attribute.
     *
     * @param  ChildSpyProductToBundle $l ChildSpyProductToBundle
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addBundleProduct(ChildSpyProductToBundle $l)
    {
        if ($this->collBundleProducts === null) {
            $this->initBundleProducts();
            $this->collBundleProductsPartial = true;
        }

        if (!$this->collBundleProducts->contains($l)) {
            $this->doAddBundleProduct($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductToBundle $bundleProduct The ChildSpyProductToBundle object to add.
     */
    protected function doAddBundleProduct(ChildSpyProductToBundle $bundleProduct)
    {
        $this->collBundleProducts[]= $bundleProduct;
        $bundleProduct->setBundleProduct($this);
    }

    /**
     * @param  ChildSpyProductToBundle $bundleProduct The ChildSpyProductToBundle object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeBundleProduct(ChildSpyProductToBundle $bundleProduct)
    {
        if ($this->getBundleProducts()->contains($bundleProduct)) {
            $pos = $this->collBundleProducts->search($bundleProduct);
            $this->collBundleProducts->remove($pos);
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
     * Clears out the collSpyProductOptionTypeUsages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionTypeUsages()
     */
    public function clearSpyProductOptionTypeUsages()
    {
        $this->collSpyProductOptionTypeUsages = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionTypeUsages collection loaded partially.
     */
    public function resetPartialSpyProductOptionTypeUsages($v = true)
    {
        $this->collSpyProductOptionTypeUsagesPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionTypeUsages collection.
     *
     * By default this just sets the collSpyProductOptionTypeUsages collection to an empty array (like clearcollSpyProductOptionTypeUsages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionTypeUsages($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionTypeUsages && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionTypeUsages = new ObjectCollection();
        $this->collSpyProductOptionTypeUsages->setModel('\Propel\SpyProductOptionTypeUsage');
    }

    /**
     * Gets an array of ChildSpyProductOptionTypeUsage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionTypeUsage[] List of ChildSpyProductOptionTypeUsage objects
     * @throws PropelException
     */
    public function getSpyProductOptionTypeUsages(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsagesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsages) {
                // return empty collection
                $this->initSpyProductOptionTypeUsages();
            } else {
                $collSpyProductOptionTypeUsages = ChildSpyProductOptionTypeUsageQuery::create(null, $criteria)
                    ->filterBySpyProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionTypeUsagesPartial && count($collSpyProductOptionTypeUsages)) {
                        $this->initSpyProductOptionTypeUsages(false);

                        foreach ($collSpyProductOptionTypeUsages as $obj) {
                            if (false == $this->collSpyProductOptionTypeUsages->contains($obj)) {
                                $this->collSpyProductOptionTypeUsages->append($obj);
                            }
                        }

                        $this->collSpyProductOptionTypeUsagesPartial = true;
                    }

                    return $collSpyProductOptionTypeUsages;
                }

                if ($partial && $this->collSpyProductOptionTypeUsages) {
                    foreach ($this->collSpyProductOptionTypeUsages as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionTypeUsages[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionTypeUsages = $collSpyProductOptionTypeUsages;
                $this->collSpyProductOptionTypeUsagesPartial = false;
            }
        }

        return $this->collSpyProductOptionTypeUsages;
    }

    /**
     * Sets a collection of ChildSpyProductOptionTypeUsage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionTypeUsages A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setSpyProductOptionTypeUsages(Collection $spyProductOptionTypeUsages, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionTypeUsage[] $spyProductOptionTypeUsagesToDelete */
        $spyProductOptionTypeUsagesToDelete = $this->getSpyProductOptionTypeUsages(new Criteria(), $con)->diff($spyProductOptionTypeUsages);


        $this->spyProductOptionTypeUsagesScheduledForDeletion = $spyProductOptionTypeUsagesToDelete;

        foreach ($spyProductOptionTypeUsagesToDelete as $spyProductOptionTypeUsageRemoved) {
            $spyProductOptionTypeUsageRemoved->setSpyProduct(null);
        }

        $this->collSpyProductOptionTypeUsages = null;
        foreach ($spyProductOptionTypeUsages as $spyProductOptionTypeUsage) {
            $this->addSpyProductOptionTypeUsage($spyProductOptionTypeUsage);
        }

        $this->collSpyProductOptionTypeUsages = $spyProductOptionTypeUsages;
        $this->collSpyProductOptionTypeUsagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionTypeUsage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionTypeUsage objects.
     * @throws PropelException
     */
    public function countSpyProductOptionTypeUsages(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionTypeUsagesPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionTypeUsages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionTypeUsages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionTypeUsages());
            }

            $query = ChildSpyProductOptionTypeUsageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProduct($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionTypeUsages);
    }

    /**
     * Method called to associate a ChildSpyProductOptionTypeUsage object to this object
     * through the ChildSpyProductOptionTypeUsage foreign key attribute.
     *
     * @param  ChildSpyProductOptionTypeUsage $l ChildSpyProductOptionTypeUsage
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addSpyProductOptionTypeUsage(ChildSpyProductOptionTypeUsage $l)
    {
        if ($this->collSpyProductOptionTypeUsages === null) {
            $this->initSpyProductOptionTypeUsages();
            $this->collSpyProductOptionTypeUsagesPartial = true;
        }

        if (!$this->collSpyProductOptionTypeUsages->contains($l)) {
            $this->doAddSpyProductOptionTypeUsage($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage The ChildSpyProductOptionTypeUsage object to add.
     */
    protected function doAddSpyProductOptionTypeUsage(ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage)
    {
        $this->collSpyProductOptionTypeUsages[]= $spyProductOptionTypeUsage;
        $spyProductOptionTypeUsage->setSpyProduct($this);
    }

    /**
     * @param  ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage The ChildSpyProductOptionTypeUsage object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeSpyProductOptionTypeUsage(ChildSpyProductOptionTypeUsage $spyProductOptionTypeUsage)
    {
        if ($this->getSpyProductOptionTypeUsages()->contains($spyProductOptionTypeUsage)) {
            $pos = $this->collSpyProductOptionTypeUsages->search($spyProductOptionTypeUsage);
            $this->collSpyProductOptionTypeUsages->remove($pos);
            if (null === $this->spyProductOptionTypeUsagesScheduledForDeletion) {
                $this->spyProductOptionTypeUsagesScheduledForDeletion = clone $this->collSpyProductOptionTypeUsages;
                $this->spyProductOptionTypeUsagesScheduledForDeletion->clear();
            }
            $this->spyProductOptionTypeUsagesScheduledForDeletion[]= clone $spyProductOptionTypeUsage;
            $spyProductOptionTypeUsage->setSpyProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related SpyProductOptionTypeUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductOptionTypeUsage[] List of ChildSpyProductOptionTypeUsage objects
     */
    public function getSpyProductOptionTypeUsagesJoinSpyProductOptionType(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductOptionTypeUsageQuery::create(null, $criteria);
        $query->joinWith('SpyProductOptionType', $joinBehavior);

        return $this->getSpyProductOptionTypeUsages($query, $con);
    }

    /**
     * Clears out the collSpyProductOptionConfigurationPresets collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductOptionConfigurationPresets()
     */
    public function clearSpyProductOptionConfigurationPresets()
    {
        $this->collSpyProductOptionConfigurationPresets = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductOptionConfigurationPresets collection loaded partially.
     */
    public function resetPartialSpyProductOptionConfigurationPresets($v = true)
    {
        $this->collSpyProductOptionConfigurationPresetsPartial = $v;
    }

    /**
     * Initializes the collSpyProductOptionConfigurationPresets collection.
     *
     * By default this just sets the collSpyProductOptionConfigurationPresets collection to an empty array (like clearcollSpyProductOptionConfigurationPresets());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductOptionConfigurationPresets($overrideExisting = true)
    {
        if (null !== $this->collSpyProductOptionConfigurationPresets && !$overrideExisting) {
            return;
        }
        $this->collSpyProductOptionConfigurationPresets = new ObjectCollection();
        $this->collSpyProductOptionConfigurationPresets->setModel('\Propel\SpyProductOptionConfigurationPreset');
    }

    /**
     * Gets an array of ChildSpyProductOptionConfigurationPreset objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductOptionConfigurationPreset[] List of ChildSpyProductOptionConfigurationPreset objects
     * @throws PropelException
     */
    public function getSpyProductOptionConfigurationPresets(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionConfigurationPresetsPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionConfigurationPresets || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionConfigurationPresets) {
                // return empty collection
                $this->initSpyProductOptionConfigurationPresets();
            } else {
                $collSpyProductOptionConfigurationPresets = ChildSpyProductOptionConfigurationPresetQuery::create(null, $criteria)
                    ->filterBySpyProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductOptionConfigurationPresetsPartial && count($collSpyProductOptionConfigurationPresets)) {
                        $this->initSpyProductOptionConfigurationPresets(false);

                        foreach ($collSpyProductOptionConfigurationPresets as $obj) {
                            if (false == $this->collSpyProductOptionConfigurationPresets->contains($obj)) {
                                $this->collSpyProductOptionConfigurationPresets->append($obj);
                            }
                        }

                        $this->collSpyProductOptionConfigurationPresetsPartial = true;
                    }

                    return $collSpyProductOptionConfigurationPresets;
                }

                if ($partial && $this->collSpyProductOptionConfigurationPresets) {
                    foreach ($this->collSpyProductOptionConfigurationPresets as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductOptionConfigurationPresets[] = $obj;
                        }
                    }
                }

                $this->collSpyProductOptionConfigurationPresets = $collSpyProductOptionConfigurationPresets;
                $this->collSpyProductOptionConfigurationPresetsPartial = false;
            }
        }

        return $this->collSpyProductOptionConfigurationPresets;
    }

    /**
     * Sets a collection of ChildSpyProductOptionConfigurationPreset objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductOptionConfigurationPresets A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setSpyProductOptionConfigurationPresets(Collection $spyProductOptionConfigurationPresets, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductOptionConfigurationPreset[] $spyProductOptionConfigurationPresetsToDelete */
        $spyProductOptionConfigurationPresetsToDelete = $this->getSpyProductOptionConfigurationPresets(new Criteria(), $con)->diff($spyProductOptionConfigurationPresets);


        $this->spyProductOptionConfigurationPresetsScheduledForDeletion = $spyProductOptionConfigurationPresetsToDelete;

        foreach ($spyProductOptionConfigurationPresetsToDelete as $spyProductOptionConfigurationPresetRemoved) {
            $spyProductOptionConfigurationPresetRemoved->setSpyProduct(null);
        }

        $this->collSpyProductOptionConfigurationPresets = null;
        foreach ($spyProductOptionConfigurationPresets as $spyProductOptionConfigurationPreset) {
            $this->addSpyProductOptionConfigurationPreset($spyProductOptionConfigurationPreset);
        }

        $this->collSpyProductOptionConfigurationPresets = $spyProductOptionConfigurationPresets;
        $this->collSpyProductOptionConfigurationPresetsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductOptionConfigurationPreset objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductOptionConfigurationPreset objects.
     * @throws PropelException
     */
    public function countSpyProductOptionConfigurationPresets(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductOptionConfigurationPresetsPartial && !$this->isNew();
        if (null === $this->collSpyProductOptionConfigurationPresets || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductOptionConfigurationPresets) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductOptionConfigurationPresets());
            }

            $query = ChildSpyProductOptionConfigurationPresetQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProduct($this)
                ->count($con);
        }

        return count($this->collSpyProductOptionConfigurationPresets);
    }

    /**
     * Method called to associate a ChildSpyProductOptionConfigurationPreset object to this object
     * through the ChildSpyProductOptionConfigurationPreset foreign key attribute.
     *
     * @param  ChildSpyProductOptionConfigurationPreset $l ChildSpyProductOptionConfigurationPreset
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addSpyProductOptionConfigurationPreset(ChildSpyProductOptionConfigurationPreset $l)
    {
        if ($this->collSpyProductOptionConfigurationPresets === null) {
            $this->initSpyProductOptionConfigurationPresets();
            $this->collSpyProductOptionConfigurationPresetsPartial = true;
        }

        if (!$this->collSpyProductOptionConfigurationPresets->contains($l)) {
            $this->doAddSpyProductOptionConfigurationPreset($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductOptionConfigurationPreset $spyProductOptionConfigurationPreset The ChildSpyProductOptionConfigurationPreset object to add.
     */
    protected function doAddSpyProductOptionConfigurationPreset(ChildSpyProductOptionConfigurationPreset $spyProductOptionConfigurationPreset)
    {
        $this->collSpyProductOptionConfigurationPresets[]= $spyProductOptionConfigurationPreset;
        $spyProductOptionConfigurationPreset->setSpyProduct($this);
    }

    /**
     * @param  ChildSpyProductOptionConfigurationPreset $spyProductOptionConfigurationPreset The ChildSpyProductOptionConfigurationPreset object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeSpyProductOptionConfigurationPreset(ChildSpyProductOptionConfigurationPreset $spyProductOptionConfigurationPreset)
    {
        if ($this->getSpyProductOptionConfigurationPresets()->contains($spyProductOptionConfigurationPreset)) {
            $pos = $this->collSpyProductOptionConfigurationPresets->search($spyProductOptionConfigurationPreset);
            $this->collSpyProductOptionConfigurationPresets->remove($pos);
            if (null === $this->spyProductOptionConfigurationPresetsScheduledForDeletion) {
                $this->spyProductOptionConfigurationPresetsScheduledForDeletion = clone $this->collSpyProductOptionConfigurationPresets;
                $this->spyProductOptionConfigurationPresetsScheduledForDeletion->clear();
            }
            $this->spyProductOptionConfigurationPresetsScheduledForDeletion[]= clone $spyProductOptionConfigurationPreset;
            $spyProductOptionConfigurationPreset->setSpyProduct(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpySearchableProductss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpySearchableProductss()
     */
    public function clearSpySearchableProductss()
    {
        $this->collSpySearchableProductss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpySearchableProductss collection loaded partially.
     */
    public function resetPartialSpySearchableProductss($v = true)
    {
        $this->collSpySearchableProductssPartial = $v;
    }

    /**
     * Initializes the collSpySearchableProductss collection.
     *
     * By default this just sets the collSpySearchableProductss collection to an empty array (like clearcollSpySearchableProductss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpySearchableProductss($overrideExisting = true)
    {
        if (null !== $this->collSpySearchableProductss && !$overrideExisting) {
            return;
        }
        $this->collSpySearchableProductss = new ObjectCollection();
        $this->collSpySearchableProductss->setModel('\Propel\SpySearchableProducts');
    }

    /**
     * Gets an array of ChildSpySearchableProducts objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySearchableProducts[] List of ChildSpySearchableProducts objects
     * @throws PropelException
     */
    public function getSpySearchableProductss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySearchableProductssPartial && !$this->isNew();
        if (null === $this->collSpySearchableProductss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpySearchableProductss) {
                // return empty collection
                $this->initSpySearchableProductss();
            } else {
                $collSpySearchableProductss = ChildSpySearchableProductsQuery::create(null, $criteria)
                    ->filterBySpyProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpySearchableProductssPartial && count($collSpySearchableProductss)) {
                        $this->initSpySearchableProductss(false);

                        foreach ($collSpySearchableProductss as $obj) {
                            if (false == $this->collSpySearchableProductss->contains($obj)) {
                                $this->collSpySearchableProductss->append($obj);
                            }
                        }

                        $this->collSpySearchableProductssPartial = true;
                    }

                    return $collSpySearchableProductss;
                }

                if ($partial && $this->collSpySearchableProductss) {
                    foreach ($this->collSpySearchableProductss as $obj) {
                        if ($obj->isNew()) {
                            $collSpySearchableProductss[] = $obj;
                        }
                    }
                }

                $this->collSpySearchableProductss = $collSpySearchableProductss;
                $this->collSpySearchableProductssPartial = false;
            }
        }

        return $this->collSpySearchableProductss;
    }

    /**
     * Sets a collection of ChildSpySearchableProducts objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spySearchableProductss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setSpySearchableProductss(Collection $spySearchableProductss, ConnectionInterface $con = null)
    {
        /** @var ChildSpySearchableProducts[] $spySearchableProductssToDelete */
        $spySearchableProductssToDelete = $this->getSpySearchableProductss(new Criteria(), $con)->diff($spySearchableProductss);


        $this->spySearchableProductssScheduledForDeletion = $spySearchableProductssToDelete;

        foreach ($spySearchableProductssToDelete as $spySearchableProductsRemoved) {
            $spySearchableProductsRemoved->setSpyProduct(null);
        }

        $this->collSpySearchableProductss = null;
        foreach ($spySearchableProductss as $spySearchableProducts) {
            $this->addSpySearchableProducts($spySearchableProducts);
        }

        $this->collSpySearchableProductss = $spySearchableProductss;
        $this->collSpySearchableProductssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySearchableProducts objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySearchableProducts objects.
     * @throws PropelException
     */
    public function countSpySearchableProductss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySearchableProductssPartial && !$this->isNew();
        if (null === $this->collSpySearchableProductss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpySearchableProductss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpySearchableProductss());
            }

            $query = ChildSpySearchableProductsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProduct($this)
                ->count($con);
        }

        return count($this->collSpySearchableProductss);
    }

    /**
     * Method called to associate a ChildSpySearchableProducts object to this object
     * through the ChildSpySearchableProducts foreign key attribute.
     *
     * @param  ChildSpySearchableProducts $l ChildSpySearchableProducts
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addSpySearchableProducts(ChildSpySearchableProducts $l)
    {
        if ($this->collSpySearchableProductss === null) {
            $this->initSpySearchableProductss();
            $this->collSpySearchableProductssPartial = true;
        }

        if (!$this->collSpySearchableProductss->contains($l)) {
            $this->doAddSpySearchableProducts($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySearchableProducts $spySearchableProducts The ChildSpySearchableProducts object to add.
     */
    protected function doAddSpySearchableProducts(ChildSpySearchableProducts $spySearchableProducts)
    {
        $this->collSpySearchableProductss[]= $spySearchableProducts;
        $spySearchableProducts->setSpyProduct($this);
    }

    /**
     * @param  ChildSpySearchableProducts $spySearchableProducts The ChildSpySearchableProducts object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeSpySearchableProducts(ChildSpySearchableProducts $spySearchableProducts)
    {
        if ($this->getSpySearchableProductss()->contains($spySearchableProducts)) {
            $pos = $this->collSpySearchableProductss->search($spySearchableProducts);
            $this->collSpySearchableProductss->remove($pos);
            if (null === $this->spySearchableProductssScheduledForDeletion) {
                $this->spySearchableProductssScheduledForDeletion = clone $this->collSpySearchableProductss;
                $this->spySearchableProductssScheduledForDeletion->clear();
            }
            $this->spySearchableProductssScheduledForDeletion[]= $spySearchableProducts;
            $spySearchableProducts->setSpyProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related SpySearchableProductss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySearchableProducts[] List of ChildSpySearchableProducts objects
     */
    public function getSpySearchableProductssJoinSpyLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySearchableProductsQuery::create(null, $criteria);
        $query->joinWith('SpyLocale', $joinBehavior);

        return $this->getSpySearchableProductss($query, $con);
    }

    /**
     * Clears out the collStockProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addStockProducts()
     */
    public function clearStockProducts()
    {
        $this->collStockProducts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collStockProducts collection loaded partially.
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
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStockProducts($overrideExisting = true)
    {
        if (null !== $this->collStockProducts && !$overrideExisting) {
            return;
        }
        $this->collStockProducts = new ObjectCollection();
        $this->collStockProducts->setModel('\Propel\SpyStockProduct');
    }

    /**
     * Gets an array of ChildSpyStockProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyStockProduct[] List of ChildSpyStockProduct objects
     * @throws PropelException
     */
    public function getStockProducts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collStockProductsPartial && !$this->isNew();
        if (null === $this->collStockProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStockProducts) {
                // return empty collection
                $this->initStockProducts();
            } else {
                $collStockProducts = ChildSpyStockProductQuery::create(null, $criteria)
                    ->filterBySpyProduct($this)
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
     * Sets a collection of ChildSpyStockProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $stockProducts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setStockProducts(Collection $stockProducts, ConnectionInterface $con = null)
    {
        /** @var ChildSpyStockProduct[] $stockProductsToDelete */
        $stockProductsToDelete = $this->getStockProducts(new Criteria(), $con)->diff($stockProducts);


        $this->stockProductsScheduledForDeletion = $stockProductsToDelete;

        foreach ($stockProductsToDelete as $stockProductRemoved) {
            $stockProductRemoved->setSpyProduct(null);
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
     * Returns the number of related SpyStockProduct objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyStockProduct objects.
     * @throws PropelException
     */
    public function countStockProducts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collStockProductsPartial && !$this->isNew();
        if (null === $this->collStockProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStockProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getStockProducts());
            }

            $query = ChildSpyStockProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProduct($this)
                ->count($con);
        }

        return count($this->collStockProducts);
    }

    /**
     * Method called to associate a ChildSpyStockProduct object to this object
     * through the ChildSpyStockProduct foreign key attribute.
     *
     * @param  ChildSpyStockProduct $l ChildSpyStockProduct
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addStockProduct(ChildSpyStockProduct $l)
    {
        if ($this->collStockProducts === null) {
            $this->initStockProducts();
            $this->collStockProductsPartial = true;
        }

        if (!$this->collStockProducts->contains($l)) {
            $this->doAddStockProduct($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyStockProduct $stockProduct The ChildSpyStockProduct object to add.
     */
    protected function doAddStockProduct(ChildSpyStockProduct $stockProduct)
    {
        $this->collStockProducts[]= $stockProduct;
        $stockProduct->setSpyProduct($this);
    }

    /**
     * @param  ChildSpyStockProduct $stockProduct The ChildSpyStockProduct object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeStockProduct(ChildSpyStockProduct $stockProduct)
    {
        if ($this->getStockProducts()->contains($stockProduct)) {
            $pos = $this->collStockProducts->search($stockProduct);
            $this->collStockProducts->remove($pos);
            if (null === $this->stockProductsScheduledForDeletion) {
                $this->stockProductsScheduledForDeletion = clone $this->collStockProducts;
                $this->stockProductsScheduledForDeletion->clear();
            }
            $this->stockProductsScheduledForDeletion[]= clone $stockProduct;
            $stockProduct->setSpyProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related StockProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyStockProduct[] List of ChildSpyStockProduct objects
     */
    public function getStockProductsJoinStock(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyStockProductQuery::create(null, $criteria);
        $query->joinWith('Stock', $joinBehavior);

        return $this->getStockProducts($query, $con);
    }

    /**
     * Clears out the collSpyWishlistItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyWishlistItems()
     */
    public function clearSpyWishlistItems()
    {
        $this->collSpyWishlistItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyWishlistItems collection loaded partially.
     */
    public function resetPartialSpyWishlistItems($v = true)
    {
        $this->collSpyWishlistItemsPartial = $v;
    }

    /**
     * Initializes the collSpyWishlistItems collection.
     *
     * By default this just sets the collSpyWishlistItems collection to an empty array (like clearcollSpyWishlistItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyWishlistItems($overrideExisting = true)
    {
        if (null !== $this->collSpyWishlistItems && !$overrideExisting) {
            return;
        }
        $this->collSpyWishlistItems = new ObjectCollection();
        $this->collSpyWishlistItems->setModel('\Propel\SpyWishlistItem');
    }

    /**
     * Gets an array of ChildSpyWishlistItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyWishlistItem[] List of ChildSpyWishlistItem objects
     * @throws PropelException
     */
    public function getSpyWishlistItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyWishlistItemsPartial && !$this->isNew();
        if (null === $this->collSpyWishlistItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyWishlistItems) {
                // return empty collection
                $this->initSpyWishlistItems();
            } else {
                $collSpyWishlistItems = ChildSpyWishlistItemQuery::create(null, $criteria)
                    ->filterBySpyProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyWishlistItemsPartial && count($collSpyWishlistItems)) {
                        $this->initSpyWishlistItems(false);

                        foreach ($collSpyWishlistItems as $obj) {
                            if (false == $this->collSpyWishlistItems->contains($obj)) {
                                $this->collSpyWishlistItems->append($obj);
                            }
                        }

                        $this->collSpyWishlistItemsPartial = true;
                    }

                    return $collSpyWishlistItems;
                }

                if ($partial && $this->collSpyWishlistItems) {
                    foreach ($this->collSpyWishlistItems as $obj) {
                        if ($obj->isNew()) {
                            $collSpyWishlistItems[] = $obj;
                        }
                    }
                }

                $this->collSpyWishlistItems = $collSpyWishlistItems;
                $this->collSpyWishlistItemsPartial = false;
            }
        }

        return $this->collSpyWishlistItems;
    }

    /**
     * Sets a collection of ChildSpyWishlistItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyWishlistItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function setSpyWishlistItems(Collection $spyWishlistItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpyWishlistItem[] $spyWishlistItemsToDelete */
        $spyWishlistItemsToDelete = $this->getSpyWishlistItems(new Criteria(), $con)->diff($spyWishlistItems);


        $this->spyWishlistItemsScheduledForDeletion = $spyWishlistItemsToDelete;

        foreach ($spyWishlistItemsToDelete as $spyWishlistItemRemoved) {
            $spyWishlistItemRemoved->setSpyProduct(null);
        }

        $this->collSpyWishlistItems = null;
        foreach ($spyWishlistItems as $spyWishlistItem) {
            $this->addSpyWishlistItem($spyWishlistItem);
        }

        $this->collSpyWishlistItems = $spyWishlistItems;
        $this->collSpyWishlistItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyWishlistItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyWishlistItem objects.
     * @throws PropelException
     */
    public function countSpyWishlistItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyWishlistItemsPartial && !$this->isNew();
        if (null === $this->collSpyWishlistItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyWishlistItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyWishlistItems());
            }

            $query = ChildSpyWishlistItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProduct($this)
                ->count($con);
        }

        return count($this->collSpyWishlistItems);
    }

    /**
     * Method called to associate a ChildSpyWishlistItem object to this object
     * through the ChildSpyWishlistItem foreign key attribute.
     *
     * @param  ChildSpyWishlistItem $l ChildSpyWishlistItem
     * @return $this|\Propel\SpyProduct The current object (for fluent API support)
     */
    public function addSpyWishlistItem(ChildSpyWishlistItem $l)
    {
        if ($this->collSpyWishlistItems === null) {
            $this->initSpyWishlistItems();
            $this->collSpyWishlistItemsPartial = true;
        }

        if (!$this->collSpyWishlistItems->contains($l)) {
            $this->doAddSpyWishlistItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyWishlistItem $spyWishlistItem The ChildSpyWishlistItem object to add.
     */
    protected function doAddSpyWishlistItem(ChildSpyWishlistItem $spyWishlistItem)
    {
        $this->collSpyWishlistItems[]= $spyWishlistItem;
        $spyWishlistItem->setSpyProduct($this);
    }

    /**
     * @param  ChildSpyWishlistItem $spyWishlistItem The ChildSpyWishlistItem object to remove.
     * @return $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function removeSpyWishlistItem(ChildSpyWishlistItem $spyWishlistItem)
    {
        if ($this->getSpyWishlistItems()->contains($spyWishlistItem)) {
            $pos = $this->collSpyWishlistItems->search($spyWishlistItem);
            $this->collSpyWishlistItems->remove($pos);
            if (null === $this->spyWishlistItemsScheduledForDeletion) {
                $this->spyWishlistItemsScheduledForDeletion = clone $this->collSpyWishlistItems;
                $this->spyWishlistItemsScheduledForDeletion->clear();
            }
            $this->spyWishlistItemsScheduledForDeletion[]= $spyWishlistItem;
            $spyWishlistItem->setSpyProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related SpyWishlistItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyWishlistItem[] List of ChildSpyWishlistItem objects
     */
    public function getSpyWishlistItemsJoinSpyWishlist(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyWishlistItemQuery::create(null, $criteria);
        $query->joinWith('SpyWishlist', $joinBehavior);

        return $this->getSpyWishlistItems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyProduct is new, it will return
     * an empty collection; or if this SpyProduct has previously
     * been saved, it will retrieve related SpyWishlistItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyWishlistItem[] List of ChildSpyWishlistItem objects
     */
    public function getSpyWishlistItemsJoinSpyAbstractProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyWishlistItemQuery::create(null, $criteria);
        $query->joinWith('SpyAbstractProduct', $joinBehavior);

        return $this->getSpyWishlistItems($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyAbstractProduct) {
            $this->aSpyAbstractProduct->removeSpyProduct($this);
        }
        $this->id_product = null;
        $this->sku = null;
        $this->is_active = null;
        $this->attributes = null;
        $this->fk_abstract_product = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collPriceProducts) {
                foreach ($this->collPriceProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyLocalizedProductAttributess) {
                foreach ($this->collSpyLocalizedProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductToBundlesRelatedByFkProduct) {
                foreach ($this->collSpyProductToBundlesRelatedByFkProduct as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBundleProducts) {
                foreach ($this->collBundleProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionTypeUsages) {
                foreach ($this->collSpyProductOptionTypeUsages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductOptionConfigurationPresets) {
                foreach ($this->collSpyProductOptionConfigurationPresets as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpySearchableProductss) {
                foreach ($this->collSpySearchableProductss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStockProducts) {
                foreach ($this->collStockProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyWishlistItems) {
                foreach ($this->collSpyWishlistItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collPriceProducts = null;
        $this->collSpyLocalizedProductAttributess = null;
        $this->collSpyProductToBundlesRelatedByFkProduct = null;
        $this->collBundleProducts = null;
        $this->collSpyProductOptionTypeUsages = null;
        $this->collSpyProductOptionConfigurationPresets = null;
        $this->collSpySearchableProductss = null;
        $this->collStockProducts = null;
        $this->collSpyWishlistItems = null;
        $this->aSpyAbstractProduct = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyProductTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyProduct The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyProductTableMap::COL_UPDATED_AT] = true;

        return $this;
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
