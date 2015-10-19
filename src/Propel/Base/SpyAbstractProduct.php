<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyAbstractProduct as ChildSpyAbstractProduct;
use Propel\SpyAbstractProductQuery as ChildSpyAbstractProductQuery;
use Propel\SpyLocalizedAbstractProductAttributes as ChildSpyLocalizedAbstractProductAttributes;
use Propel\SpyLocalizedAbstractProductAttributesQuery as ChildSpyLocalizedAbstractProductAttributesQuery;
use Propel\SpyPriceProduct as ChildSpyPriceProduct;
use Propel\SpyPriceProductQuery as ChildSpyPriceProductQuery;
use Propel\SpyProduct as ChildSpyProduct;
use Propel\SpyProductCategory as ChildSpyProductCategory;
use Propel\SpyProductCategoryQuery as ChildSpyProductCategoryQuery;
use Propel\SpyProductQuery as ChildSpyProductQuery;
use Propel\SpyTaxSet as ChildSpyTaxSet;
use Propel\SpyTaxSetQuery as ChildSpyTaxSetQuery;
use Propel\SpyUrl as ChildSpyUrl;
use Propel\SpyUrlQuery as ChildSpyUrlQuery;
use Propel\SpyWishlistItem as ChildSpyWishlistItem;
use Propel\SpyWishlistItemQuery as ChildSpyWishlistItemQuery;
use Propel\Map\SpyAbstractProductTableMap;
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
 * Base class that represents a row from the 'spy_abstract_product' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyAbstractProduct extends SpyAbstractProduct implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyAbstractProductTableMap';


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
     * The value for the id_abstract_product field.
     * @var        int
     */
    protected $id_abstract_product;

    /**
     * The value for the sku field.
     * @var        string
     */
    protected $sku;

    /**
     * The value for the attributes field.
     * @var        string
     */
    protected $attributes;

    /**
     * The value for the fk_tax_set field.
     * @var        int
     */
    protected $fk_tax_set;

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
     * @var        ChildSpyTaxSet
     */
    protected $aSpyTaxSet;

    /**
     * @var        ObjectCollection|ChildSpyPriceProduct[] Collection to store aggregation of ChildSpyPriceProduct objects.
     */
    protected $collPriceProducts;
    protected $collPriceProductsPartial;

    /**
     * @var        ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[] Collection to store aggregation of ChildSpyLocalizedAbstractProductAttributes objects.
     */
    protected $collSpyLocalizedAbstractProductAttributess;
    protected $collSpyLocalizedAbstractProductAttributessPartial;

    /**
     * @var        ObjectCollection|ChildSpyProduct[] Collection to store aggregation of ChildSpyProduct objects.
     */
    protected $collSpyProducts;
    protected $collSpyProductsPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductCategory[] Collection to store aggregation of ChildSpyProductCategory objects.
     */
    protected $collSpyProductCategories;
    protected $collSpyProductCategoriesPartial;

    /**
     * @var        ObjectCollection|ChildSpyUrl[] Collection to store aggregation of ChildSpyUrl objects.
     */
    protected $collSpyUrls;
    protected $collSpyUrlsPartial;

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
     * @var ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[]
     */
    protected $spyLocalizedAbstractProductAttributessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProduct[]
     */
    protected $spyProductsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductCategory[]
     */
    protected $spyProductCategoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyUrl[]
     */
    protected $spyUrlsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyWishlistItem[]
     */
    protected $spyWishlistItemsScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyAbstractProduct object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>SpyAbstractProduct</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyAbstractProduct</code>, delegates to
     * <code>equals(SpyAbstractProduct)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyAbstractProduct The current object, for fluid interface
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
     * Get the [id_abstract_product] column value.
     *
     * @return int
     */
    public function getIdAbstractProduct()
    {
        return $this->id_abstract_product;
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
     * Get the [attributes] column value.
     *
     * @return string
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get the [fk_tax_set] column value.
     *
     * @return int
     */
    public function getFkTaxSet()
    {
        return $this->fk_tax_set;
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
     * Set the value of [id_abstract_product] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function setIdAbstractProduct($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_abstract_product !== $v) {
            $this->id_abstract_product = $v;
            $this->modifiedColumns[SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT] = true;
        }

        return $this;
    } // setIdAbstractProduct()

    /**
     * Set the value of [sku] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function setSku($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sku !== $v) {
            $this->sku = $v;
            $this->modifiedColumns[SpyAbstractProductTableMap::COL_SKU] = true;
        }

        return $this;
    } // setSku()

    /**
     * Set the value of [attributes] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function setAttributes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->attributes !== $v) {
            $this->attributes = $v;
            $this->modifiedColumns[SpyAbstractProductTableMap::COL_ATTRIBUTES] = true;
        }

        return $this;
    } // setAttributes()

    /**
     * Set the value of [fk_tax_set] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function setFkTaxSet($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_tax_set !== $v) {
            $this->fk_tax_set = $v;
            $this->modifiedColumns[SpyAbstractProductTableMap::COL_FK_TAX_SET] = true;
        }

        if ($this->aSpyTaxSet !== null && $this->aSpyTaxSet->getIdTaxSet() !== $v) {
            $this->aSpyTaxSet = null;
        }

        return $this;
    } // setFkTaxSet()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyAbstractProductTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyAbstractProductTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyAbstractProductTableMap::translateFieldName('IdAbstractProduct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_abstract_product = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyAbstractProductTableMap::translateFieldName('Sku', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sku = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyAbstractProductTableMap::translateFieldName('Attributes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->attributes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyAbstractProductTableMap::translateFieldName('FkTaxSet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_tax_set = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyAbstractProductTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyAbstractProductTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = SpyAbstractProductTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyAbstractProduct'), 0, $e);
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
        if ($this->aSpyTaxSet !== null && $this->fk_tax_set !== $this->aSpyTaxSet->getIdTaxSet()) {
            $this->aSpyTaxSet = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyAbstractProductTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyAbstractProductQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyTaxSet = null;
            $this->collPriceProducts = null;

            $this->collSpyLocalizedAbstractProductAttributess = null;

            $this->collSpyProducts = null;

            $this->collSpyProductCategories = null;

            $this->collSpyUrls = null;

            $this->collSpyWishlistItems = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyAbstractProduct::setDeleted()
     * @see SpyAbstractProduct::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAbstractProductTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyAbstractProductQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAbstractProductTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyAbstractProductTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyAbstractProductTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyAbstractProductTableMap::COL_UPDATED_AT)) {
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
                SpyAbstractProductTableMap::addInstanceToPool($this);
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

            if ($this->aSpyTaxSet !== null) {
                if ($this->aSpyTaxSet->isModified() || $this->aSpyTaxSet->isNew()) {
                    $affectedRows += $this->aSpyTaxSet->save($con);
                }
                $this->setSpyTaxSet($this->aSpyTaxSet);
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

            if ($this->spyLocalizedAbstractProductAttributessScheduledForDeletion !== null) {
                if (!$this->spyLocalizedAbstractProductAttributessScheduledForDeletion->isEmpty()) {
                    \Propel\SpyLocalizedAbstractProductAttributesQuery::create()
                        ->filterByPrimaryKeys($this->spyLocalizedAbstractProductAttributessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyLocalizedAbstractProductAttributessScheduledForDeletion = null;
                }
            }

            if ($this->collSpyLocalizedAbstractProductAttributess !== null) {
                foreach ($this->collSpyLocalizedAbstractProductAttributess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductsScheduledForDeletion !== null) {
                if (!$this->spyProductsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductQuery::create()
                        ->filterByPrimaryKeys($this->spyProductsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProducts !== null) {
                foreach ($this->collSpyProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductCategoriesScheduledForDeletion !== null) {
                if (!$this->spyProductCategoriesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyProductCategoryQuery::create()
                        ->filterByPrimaryKeys($this->spyProductCategoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyProductCategoriesScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductCategories !== null) {
                foreach ($this->collSpyProductCategories as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyUrlsScheduledForDeletion !== null) {
                if (!$this->spyUrlsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyUrlQuery::create()
                        ->filterByPrimaryKeys($this->spyUrlsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyUrlsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyUrls !== null) {
                foreach ($this->collSpyUrls as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyWishlistItemsScheduledForDeletion !== null) {
                if (!$this->spyWishlistItemsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyWishlistItemQuery::create()
                        ->filterByPrimaryKeys($this->spyWishlistItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

        $this->modifiedColumns[SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = 'id_abstract_product';
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_SKU)) {
            $modifiedColumns[':p' . $index++]  = 'sku';
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_ATTRIBUTES)) {
            $modifiedColumns[':p' . $index++]  = 'attributes';
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_FK_TAX_SET)) {
            $modifiedColumns[':p' . $index++]  = 'fk_tax_set';
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_abstract_product (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_abstract_product':
                        $stmt->bindValue($identifier, $this->id_abstract_product, PDO::PARAM_INT);
                        break;
                    case 'sku':
                        $stmt->bindValue($identifier, $this->sku, PDO::PARAM_STR);
                        break;
                    case 'attributes':
                        $stmt->bindValue($identifier, $this->attributes, PDO::PARAM_STR);
                        break;
                    case 'fk_tax_set':
                        $stmt->bindValue($identifier, $this->fk_tax_set, PDO::PARAM_INT);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
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
            $pk = $con->lastInsertId('spy_abstract_product_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdAbstractProduct($pk);
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
        $pos = SpyAbstractProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdAbstractProduct();
                break;
            case 1:
                return $this->getSku();
                break;
            case 2:
                return $this->getAttributes();
                break;
            case 3:
                return $this->getFkTaxSet();
                break;
            case 4:
                return $this->getCreatedAt();
                break;
            case 5:
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

        if (isset($alreadyDumpedObjects['SpyAbstractProduct'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyAbstractProduct'][$this->hashCode()] = true;
        $keys = SpyAbstractProductTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdAbstractProduct(),
            $keys[1] => $this->getSku(),
            $keys[2] => $this->getAttributes(),
            $keys[3] => $this->getFkTaxSet(),
            $keys[4] => $this->getCreatedAt(),
            $keys[5] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[4]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[4]];
            $result[$keys[4]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[5]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[5]];
            $result[$keys[5]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyTaxSet) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTaxSet';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_tax_set';
                        break;
                    default:
                        $key = 'SpyTaxSet';
                }

                $result[$key] = $this->aSpyTaxSet->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collSpyLocalizedAbstractProductAttributess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyLocalizedAbstractProductAttributess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_abstract_product_localized_attributess';
                        break;
                    default:
                        $key = 'SpyLocalizedAbstractProductAttributess';
                }

                $result[$key] = $this->collSpyLocalizedAbstractProductAttributess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProducts) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProducts';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_products';
                        break;
                    default:
                        $key = 'SpyProducts';
                }

                $result[$key] = $this->collSpyProducts->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductCategories) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductCategories';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_product_categories';
                        break;
                    default:
                        $key = 'SpyProductCategories';
                }

                $result[$key] = $this->collSpyProductCategories->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyUrls) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyUrls';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_urls';
                        break;
                    default:
                        $key = 'SpyUrls';
                }

                $result[$key] = $this->collSpyUrls->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyAbstractProduct
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyAbstractProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyAbstractProduct
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdAbstractProduct($value);
                break;
            case 1:
                $this->setSku($value);
                break;
            case 2:
                $this->setAttributes($value);
                break;
            case 3:
                $this->setFkTaxSet($value);
                break;
            case 4:
                $this->setCreatedAt($value);
                break;
            case 5:
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
        $keys = SpyAbstractProductTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdAbstractProduct($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSku($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAttributes($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkTaxSet($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCreatedAt($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUpdatedAt($arr[$keys[5]]);
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
     * @return $this|\Propel\SpyAbstractProduct The current object, for fluid interface
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
        $criteria = new Criteria(SpyAbstractProductTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT)) {
            $criteria->add(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $this->id_abstract_product);
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_SKU)) {
            $criteria->add(SpyAbstractProductTableMap::COL_SKU, $this->sku);
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_ATTRIBUTES)) {
            $criteria->add(SpyAbstractProductTableMap::COL_ATTRIBUTES, $this->attributes);
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_FK_TAX_SET)) {
            $criteria->add(SpyAbstractProductTableMap::COL_FK_TAX_SET, $this->fk_tax_set);
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyAbstractProductTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyAbstractProductTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyAbstractProductTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyAbstractProductQuery::create();
        $criteria->add(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $this->id_abstract_product);

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
        $validPk = null !== $this->getIdAbstractProduct();

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
        return $this->getIdAbstractProduct();
    }

    /**
     * Generic method to set the primary key (id_abstract_product column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdAbstractProduct($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdAbstractProduct();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyAbstractProduct (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSku($this->getSku());
        $copyObj->setAttributes($this->getAttributes());
        $copyObj->setFkTaxSet($this->getFkTaxSet());
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

            foreach ($this->getSpyLocalizedAbstractProductAttributess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyLocalizedAbstractProductAttributes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductCategories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductCategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyUrls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyUrl($relObj->copy($deepCopy));
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
            $copyObj->setIdAbstractProduct(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyAbstractProduct Clone of current object.
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
     * Declares an association between this object and a ChildSpyTaxSet object.
     *
     * @param  ChildSpyTaxSet $v
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyTaxSet(ChildSpyTaxSet $v = null)
    {
        if ($v === null) {
            $this->setFkTaxSet(NULL);
        } else {
            $this->setFkTaxSet($v->getIdTaxSet());
        }

        $this->aSpyTaxSet = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyTaxSet object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyAbstractProduct($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyTaxSet object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyTaxSet The associated ChildSpyTaxSet object.
     * @throws PropelException
     */
    public function getSpyTaxSet(ConnectionInterface $con = null)
    {
        if ($this->aSpyTaxSet === null && ($this->fk_tax_set !== null)) {
            $this->aSpyTaxSet = ChildSpyTaxSetQuery::create()->findPk($this->fk_tax_set, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyTaxSet->addSpyAbstractProducts($this);
             */
        }

        return $this->aSpyTaxSet;
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
        if ('SpyLocalizedAbstractProductAttributes' == $relationName) {
            return $this->initSpyLocalizedAbstractProductAttributess();
        }
        if ('SpyProduct' == $relationName) {
            return $this->initSpyProducts();
        }
        if ('SpyProductCategory' == $relationName) {
            return $this->initSpyProductCategories();
        }
        if ('SpyUrl' == $relationName) {
            return $this->initSpyUrls();
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
     * If this ChildSpyAbstractProduct is new, it will return
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
                    ->filterBySpyAbstractProduct($this)
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
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function setPriceProducts(Collection $priceProducts, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPriceProduct[] $priceProductsToDelete */
        $priceProductsToDelete = $this->getPriceProducts(new Criteria(), $con)->diff($priceProducts);


        $this->priceProductsScheduledForDeletion = $priceProductsToDelete;

        foreach ($priceProductsToDelete as $priceProductRemoved) {
            $priceProductRemoved->setSpyAbstractProduct(null);
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
                ->filterBySpyAbstractProduct($this)
                ->count($con);
        }

        return count($this->collPriceProducts);
    }

    /**
     * Method called to associate a ChildSpyPriceProduct object to this object
     * through the ChildSpyPriceProduct foreign key attribute.
     *
     * @param  ChildSpyPriceProduct $l ChildSpyPriceProduct
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
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
        $priceProduct->setSpyAbstractProduct($this);
    }

    /**
     * @param  ChildSpyPriceProduct $priceProduct The ChildSpyPriceProduct object to remove.
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
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
            $priceProduct->setSpyAbstractProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related PriceProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyPriceProduct[] List of ChildSpyPriceProduct objects
     */
    public function getPriceProductsJoinProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyPriceProductQuery::create(null, $criteria);
        $query->joinWith('Product', $joinBehavior);

        return $this->getPriceProducts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related PriceProducts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
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
     * Clears out the collSpyLocalizedAbstractProductAttributess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyLocalizedAbstractProductAttributess()
     */
    public function clearSpyLocalizedAbstractProductAttributess()
    {
        $this->collSpyLocalizedAbstractProductAttributess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyLocalizedAbstractProductAttributess collection loaded partially.
     */
    public function resetPartialSpyLocalizedAbstractProductAttributess($v = true)
    {
        $this->collSpyLocalizedAbstractProductAttributessPartial = $v;
    }

    /**
     * Initializes the collSpyLocalizedAbstractProductAttributess collection.
     *
     * By default this just sets the collSpyLocalizedAbstractProductAttributess collection to an empty array (like clearcollSpyLocalizedAbstractProductAttributess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyLocalizedAbstractProductAttributess($overrideExisting = true)
    {
        if (null !== $this->collSpyLocalizedAbstractProductAttributess && !$overrideExisting) {
            return;
        }
        $this->collSpyLocalizedAbstractProductAttributess = new ObjectCollection();
        $this->collSpyLocalizedAbstractProductAttributess->setModel('\Propel\SpyLocalizedAbstractProductAttributes');
    }

    /**
     * Gets an array of ChildSpyLocalizedAbstractProductAttributes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAbstractProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[] List of ChildSpyLocalizedAbstractProductAttributes objects
     * @throws PropelException
     */
    public function getSpyLocalizedAbstractProductAttributess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedAbstractProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedAbstractProductAttributess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedAbstractProductAttributess) {
                // return empty collection
                $this->initSpyLocalizedAbstractProductAttributess();
            } else {
                $collSpyLocalizedAbstractProductAttributess = ChildSpyLocalizedAbstractProductAttributesQuery::create(null, $criteria)
                    ->filterBySpyAbstractProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyLocalizedAbstractProductAttributessPartial && count($collSpyLocalizedAbstractProductAttributess)) {
                        $this->initSpyLocalizedAbstractProductAttributess(false);

                        foreach ($collSpyLocalizedAbstractProductAttributess as $obj) {
                            if (false == $this->collSpyLocalizedAbstractProductAttributess->contains($obj)) {
                                $this->collSpyLocalizedAbstractProductAttributess->append($obj);
                            }
                        }

                        $this->collSpyLocalizedAbstractProductAttributessPartial = true;
                    }

                    return $collSpyLocalizedAbstractProductAttributess;
                }

                if ($partial && $this->collSpyLocalizedAbstractProductAttributess) {
                    foreach ($this->collSpyLocalizedAbstractProductAttributess as $obj) {
                        if ($obj->isNew()) {
                            $collSpyLocalizedAbstractProductAttributess[] = $obj;
                        }
                    }
                }

                $this->collSpyLocalizedAbstractProductAttributess = $collSpyLocalizedAbstractProductAttributess;
                $this->collSpyLocalizedAbstractProductAttributessPartial = false;
            }
        }

        return $this->collSpyLocalizedAbstractProductAttributess;
    }

    /**
     * Sets a collection of ChildSpyLocalizedAbstractProductAttributes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyLocalizedAbstractProductAttributess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function setSpyLocalizedAbstractProductAttributess(Collection $spyLocalizedAbstractProductAttributess, ConnectionInterface $con = null)
    {
        /** @var ChildSpyLocalizedAbstractProductAttributes[] $spyLocalizedAbstractProductAttributessToDelete */
        $spyLocalizedAbstractProductAttributessToDelete = $this->getSpyLocalizedAbstractProductAttributess(new Criteria(), $con)->diff($spyLocalizedAbstractProductAttributess);


        $this->spyLocalizedAbstractProductAttributessScheduledForDeletion = $spyLocalizedAbstractProductAttributessToDelete;

        foreach ($spyLocalizedAbstractProductAttributessToDelete as $spyLocalizedAbstractProductAttributesRemoved) {
            $spyLocalizedAbstractProductAttributesRemoved->setSpyAbstractProduct(null);
        }

        $this->collSpyLocalizedAbstractProductAttributess = null;
        foreach ($spyLocalizedAbstractProductAttributess as $spyLocalizedAbstractProductAttributes) {
            $this->addSpyLocalizedAbstractProductAttributes($spyLocalizedAbstractProductAttributes);
        }

        $this->collSpyLocalizedAbstractProductAttributess = $spyLocalizedAbstractProductAttributess;
        $this->collSpyLocalizedAbstractProductAttributessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyLocalizedAbstractProductAttributes objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyLocalizedAbstractProductAttributes objects.
     * @throws PropelException
     */
    public function countSpyLocalizedAbstractProductAttributess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyLocalizedAbstractProductAttributessPartial && !$this->isNew();
        if (null === $this->collSpyLocalizedAbstractProductAttributess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyLocalizedAbstractProductAttributess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyLocalizedAbstractProductAttributess());
            }

            $query = ChildSpyLocalizedAbstractProductAttributesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyAbstractProduct($this)
                ->count($con);
        }

        return count($this->collSpyLocalizedAbstractProductAttributess);
    }

    /**
     * Method called to associate a ChildSpyLocalizedAbstractProductAttributes object to this object
     * through the ChildSpyLocalizedAbstractProductAttributes foreign key attribute.
     *
     * @param  ChildSpyLocalizedAbstractProductAttributes $l ChildSpyLocalizedAbstractProductAttributes
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function addSpyLocalizedAbstractProductAttributes(ChildSpyLocalizedAbstractProductAttributes $l)
    {
        if ($this->collSpyLocalizedAbstractProductAttributess === null) {
            $this->initSpyLocalizedAbstractProductAttributess();
            $this->collSpyLocalizedAbstractProductAttributessPartial = true;
        }

        if (!$this->collSpyLocalizedAbstractProductAttributess->contains($l)) {
            $this->doAddSpyLocalizedAbstractProductAttributes($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes The ChildSpyLocalizedAbstractProductAttributes object to add.
     */
    protected function doAddSpyLocalizedAbstractProductAttributes(ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes)
    {
        $this->collSpyLocalizedAbstractProductAttributess[]= $spyLocalizedAbstractProductAttributes;
        $spyLocalizedAbstractProductAttributes->setSpyAbstractProduct($this);
    }

    /**
     * @param  ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes The ChildSpyLocalizedAbstractProductAttributes object to remove.
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function removeSpyLocalizedAbstractProductAttributes(ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes)
    {
        if ($this->getSpyLocalizedAbstractProductAttributess()->contains($spyLocalizedAbstractProductAttributes)) {
            $pos = $this->collSpyLocalizedAbstractProductAttributess->search($spyLocalizedAbstractProductAttributes);
            $this->collSpyLocalizedAbstractProductAttributess->remove($pos);
            if (null === $this->spyLocalizedAbstractProductAttributessScheduledForDeletion) {
                $this->spyLocalizedAbstractProductAttributessScheduledForDeletion = clone $this->collSpyLocalizedAbstractProductAttributess;
                $this->spyLocalizedAbstractProductAttributessScheduledForDeletion->clear();
            }
            $this->spyLocalizedAbstractProductAttributessScheduledForDeletion[]= clone $spyLocalizedAbstractProductAttributes;
            $spyLocalizedAbstractProductAttributes->setSpyAbstractProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyLocalizedAbstractProductAttributess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyLocalizedAbstractProductAttributes[] List of ChildSpyLocalizedAbstractProductAttributes objects
     */
    public function getSpyLocalizedAbstractProductAttributessJoinLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyLocalizedAbstractProductAttributesQuery::create(null, $criteria);
        $query->joinWith('Locale', $joinBehavior);

        return $this->getSpyLocalizedAbstractProductAttributess($query, $con);
    }

    /**
     * Clears out the collSpyProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProducts()
     */
    public function clearSpyProducts()
    {
        $this->collSpyProducts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProducts collection loaded partially.
     */
    public function resetPartialSpyProducts($v = true)
    {
        $this->collSpyProductsPartial = $v;
    }

    /**
     * Initializes the collSpyProducts collection.
     *
     * By default this just sets the collSpyProducts collection to an empty array (like clearcollSpyProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProducts($overrideExisting = true)
    {
        if (null !== $this->collSpyProducts && !$overrideExisting) {
            return;
        }
        $this->collSpyProducts = new ObjectCollection();
        $this->collSpyProducts->setModel('\Propel\SpyProduct');
    }

    /**
     * Gets an array of ChildSpyProduct objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAbstractProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProduct[] List of ChildSpyProduct objects
     * @throws PropelException
     */
    public function getSpyProducts(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductsPartial && !$this->isNew();
        if (null === $this->collSpyProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProducts) {
                // return empty collection
                $this->initSpyProducts();
            } else {
                $collSpyProducts = ChildSpyProductQuery::create(null, $criteria)
                    ->filterBySpyAbstractProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductsPartial && count($collSpyProducts)) {
                        $this->initSpyProducts(false);

                        foreach ($collSpyProducts as $obj) {
                            if (false == $this->collSpyProducts->contains($obj)) {
                                $this->collSpyProducts->append($obj);
                            }
                        }

                        $this->collSpyProductsPartial = true;
                    }

                    return $collSpyProducts;
                }

                if ($partial && $this->collSpyProducts) {
                    foreach ($this->collSpyProducts as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProducts[] = $obj;
                        }
                    }
                }

                $this->collSpyProducts = $collSpyProducts;
                $this->collSpyProductsPartial = false;
            }
        }

        return $this->collSpyProducts;
    }

    /**
     * Sets a collection of ChildSpyProduct objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProducts A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function setSpyProducts(Collection $spyProducts, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProduct[] $spyProductsToDelete */
        $spyProductsToDelete = $this->getSpyProducts(new Criteria(), $con)->diff($spyProducts);


        $this->spyProductsScheduledForDeletion = $spyProductsToDelete;

        foreach ($spyProductsToDelete as $spyProductRemoved) {
            $spyProductRemoved->setSpyAbstractProduct(null);
        }

        $this->collSpyProducts = null;
        foreach ($spyProducts as $spyProduct) {
            $this->addSpyProduct($spyProduct);
        }

        $this->collSpyProducts = $spyProducts;
        $this->collSpyProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProduct objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProduct objects.
     * @throws PropelException
     */
    public function countSpyProducts(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductsPartial && !$this->isNew();
        if (null === $this->collSpyProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProducts());
            }

            $query = ChildSpyProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyAbstractProduct($this)
                ->count($con);
        }

        return count($this->collSpyProducts);
    }

    /**
     * Method called to associate a ChildSpyProduct object to this object
     * through the ChildSpyProduct foreign key attribute.
     *
     * @param  ChildSpyProduct $l ChildSpyProduct
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function addSpyProduct(ChildSpyProduct $l)
    {
        if ($this->collSpyProducts === null) {
            $this->initSpyProducts();
            $this->collSpyProductsPartial = true;
        }

        if (!$this->collSpyProducts->contains($l)) {
            $this->doAddSpyProduct($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProduct $spyProduct The ChildSpyProduct object to add.
     */
    protected function doAddSpyProduct(ChildSpyProduct $spyProduct)
    {
        $this->collSpyProducts[]= $spyProduct;
        $spyProduct->setSpyAbstractProduct($this);
    }

    /**
     * @param  ChildSpyProduct $spyProduct The ChildSpyProduct object to remove.
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function removeSpyProduct(ChildSpyProduct $spyProduct)
    {
        if ($this->getSpyProducts()->contains($spyProduct)) {
            $pos = $this->collSpyProducts->search($spyProduct);
            $this->collSpyProducts->remove($pos);
            if (null === $this->spyProductsScheduledForDeletion) {
                $this->spyProductsScheduledForDeletion = clone $this->collSpyProducts;
                $this->spyProductsScheduledForDeletion->clear();
            }
            $this->spyProductsScheduledForDeletion[]= clone $spyProduct;
            $spyProduct->setSpyAbstractProduct(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyProductCategories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductCategories()
     */
    public function clearSpyProductCategories()
    {
        $this->collSpyProductCategories = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductCategories collection loaded partially.
     */
    public function resetPartialSpyProductCategories($v = true)
    {
        $this->collSpyProductCategoriesPartial = $v;
    }

    /**
     * Initializes the collSpyProductCategories collection.
     *
     * By default this just sets the collSpyProductCategories collection to an empty array (like clearcollSpyProductCategories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductCategories($overrideExisting = true)
    {
        if (null !== $this->collSpyProductCategories && !$overrideExisting) {
            return;
        }
        $this->collSpyProductCategories = new ObjectCollection();
        $this->collSpyProductCategories->setModel('\Propel\SpyProductCategory');
    }

    /**
     * Gets an array of ChildSpyProductCategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAbstractProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductCategory[] List of ChildSpyProductCategory objects
     * @throws PropelException
     */
    public function getSpyProductCategories(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductCategoriesPartial && !$this->isNew();
        if (null === $this->collSpyProductCategories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductCategories) {
                // return empty collection
                $this->initSpyProductCategories();
            } else {
                $collSpyProductCategories = ChildSpyProductCategoryQuery::create(null, $criteria)
                    ->filterBySpyAbstractProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductCategoriesPartial && count($collSpyProductCategories)) {
                        $this->initSpyProductCategories(false);

                        foreach ($collSpyProductCategories as $obj) {
                            if (false == $this->collSpyProductCategories->contains($obj)) {
                                $this->collSpyProductCategories->append($obj);
                            }
                        }

                        $this->collSpyProductCategoriesPartial = true;
                    }

                    return $collSpyProductCategories;
                }

                if ($partial && $this->collSpyProductCategories) {
                    foreach ($this->collSpyProductCategories as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductCategories[] = $obj;
                        }
                    }
                }

                $this->collSpyProductCategories = $collSpyProductCategories;
                $this->collSpyProductCategoriesPartial = false;
            }
        }

        return $this->collSpyProductCategories;
    }

    /**
     * Sets a collection of ChildSpyProductCategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductCategories A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function setSpyProductCategories(Collection $spyProductCategories, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductCategory[] $spyProductCategoriesToDelete */
        $spyProductCategoriesToDelete = $this->getSpyProductCategories(new Criteria(), $con)->diff($spyProductCategories);


        $this->spyProductCategoriesScheduledForDeletion = $spyProductCategoriesToDelete;

        foreach ($spyProductCategoriesToDelete as $spyProductCategoryRemoved) {
            $spyProductCategoryRemoved->setSpyAbstractProduct(null);
        }

        $this->collSpyProductCategories = null;
        foreach ($spyProductCategories as $spyProductCategory) {
            $this->addSpyProductCategory($spyProductCategory);
        }

        $this->collSpyProductCategories = $spyProductCategories;
        $this->collSpyProductCategoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductCategory objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductCategory objects.
     * @throws PropelException
     */
    public function countSpyProductCategories(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductCategoriesPartial && !$this->isNew();
        if (null === $this->collSpyProductCategories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductCategories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductCategories());
            }

            $query = ChildSpyProductCategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyAbstractProduct($this)
                ->count($con);
        }

        return count($this->collSpyProductCategories);
    }

    /**
     * Method called to associate a ChildSpyProductCategory object to this object
     * through the ChildSpyProductCategory foreign key attribute.
     *
     * @param  ChildSpyProductCategory $l ChildSpyProductCategory
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function addSpyProductCategory(ChildSpyProductCategory $l)
    {
        if ($this->collSpyProductCategories === null) {
            $this->initSpyProductCategories();
            $this->collSpyProductCategoriesPartial = true;
        }

        if (!$this->collSpyProductCategories->contains($l)) {
            $this->doAddSpyProductCategory($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductCategory $spyProductCategory The ChildSpyProductCategory object to add.
     */
    protected function doAddSpyProductCategory(ChildSpyProductCategory $spyProductCategory)
    {
        $this->collSpyProductCategories[]= $spyProductCategory;
        $spyProductCategory->setSpyAbstractProduct($this);
    }

    /**
     * @param  ChildSpyProductCategory $spyProductCategory The ChildSpyProductCategory object to remove.
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function removeSpyProductCategory(ChildSpyProductCategory $spyProductCategory)
    {
        if ($this->getSpyProductCategories()->contains($spyProductCategory)) {
            $pos = $this->collSpyProductCategories->search($spyProductCategory);
            $this->collSpyProductCategories->remove($pos);
            if (null === $this->spyProductCategoriesScheduledForDeletion) {
                $this->spyProductCategoriesScheduledForDeletion = clone $this->collSpyProductCategories;
                $this->spyProductCategoriesScheduledForDeletion->clear();
            }
            $this->spyProductCategoriesScheduledForDeletion[]= clone $spyProductCategory;
            $spyProductCategory->setSpyAbstractProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyProductCategories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyProductCategory[] List of ChildSpyProductCategory objects
     */
    public function getSpyProductCategoriesJoinSpyCategory(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyProductCategoryQuery::create(null, $criteria);
        $query->joinWith('SpyCategory', $joinBehavior);

        return $this->getSpyProductCategories($query, $con);
    }

    /**
     * Clears out the collSpyUrls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyUrls()
     */
    public function clearSpyUrls()
    {
        $this->collSpyUrls = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyUrls collection loaded partially.
     */
    public function resetPartialSpyUrls($v = true)
    {
        $this->collSpyUrlsPartial = $v;
    }

    /**
     * Initializes the collSpyUrls collection.
     *
     * By default this just sets the collSpyUrls collection to an empty array (like clearcollSpyUrls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyUrls($overrideExisting = true)
    {
        if (null !== $this->collSpyUrls && !$overrideExisting) {
            return;
        }
        $this->collSpyUrls = new ObjectCollection();
        $this->collSpyUrls->setModel('\Propel\SpyUrl');
    }

    /**
     * Gets an array of ChildSpyUrl objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyAbstractProduct is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     * @throws PropelException
     */
    public function getSpyUrls(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUrlsPartial && !$this->isNew();
        if (null === $this->collSpyUrls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyUrls) {
                // return empty collection
                $this->initSpyUrls();
            } else {
                $collSpyUrls = ChildSpyUrlQuery::create(null, $criteria)
                    ->filterBySpyProduct($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyUrlsPartial && count($collSpyUrls)) {
                        $this->initSpyUrls(false);

                        foreach ($collSpyUrls as $obj) {
                            if (false == $this->collSpyUrls->contains($obj)) {
                                $this->collSpyUrls->append($obj);
                            }
                        }

                        $this->collSpyUrlsPartial = true;
                    }

                    return $collSpyUrls;
                }

                if ($partial && $this->collSpyUrls) {
                    foreach ($this->collSpyUrls as $obj) {
                        if ($obj->isNew()) {
                            $collSpyUrls[] = $obj;
                        }
                    }
                }

                $this->collSpyUrls = $collSpyUrls;
                $this->collSpyUrlsPartial = false;
            }
        }

        return $this->collSpyUrls;
    }

    /**
     * Sets a collection of ChildSpyUrl objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyUrls A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function setSpyUrls(Collection $spyUrls, ConnectionInterface $con = null)
    {
        /** @var ChildSpyUrl[] $spyUrlsToDelete */
        $spyUrlsToDelete = $this->getSpyUrls(new Criteria(), $con)->diff($spyUrls);


        $this->spyUrlsScheduledForDeletion = $spyUrlsToDelete;

        foreach ($spyUrlsToDelete as $spyUrlRemoved) {
            $spyUrlRemoved->setSpyProduct(null);
        }

        $this->collSpyUrls = null;
        foreach ($spyUrls as $spyUrl) {
            $this->addSpyUrl($spyUrl);
        }

        $this->collSpyUrls = $spyUrls;
        $this->collSpyUrlsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyUrl objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyUrl objects.
     * @throws PropelException
     */
    public function countSpyUrls(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUrlsPartial && !$this->isNew();
        if (null === $this->collSpyUrls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyUrls) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyUrls());
            }

            $query = ChildSpyUrlQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProduct($this)
                ->count($con);
        }

        return count($this->collSpyUrls);
    }

    /**
     * Method called to associate a ChildSpyUrl object to this object
     * through the ChildSpyUrl foreign key attribute.
     *
     * @param  ChildSpyUrl $l ChildSpyUrl
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
     */
    public function addSpyUrl(ChildSpyUrl $l)
    {
        if ($this->collSpyUrls === null) {
            $this->initSpyUrls();
            $this->collSpyUrlsPartial = true;
        }

        if (!$this->collSpyUrls->contains($l)) {
            $this->doAddSpyUrl($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyUrl $spyUrl The ChildSpyUrl object to add.
     */
    protected function doAddSpyUrl(ChildSpyUrl $spyUrl)
    {
        $this->collSpyUrls[]= $spyUrl;
        $spyUrl->setSpyProduct($this);
    }

    /**
     * @param  ChildSpyUrl $spyUrl The ChildSpyUrl object to remove.
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function removeSpyUrl(ChildSpyUrl $spyUrl)
    {
        if ($this->getSpyUrls()->contains($spyUrl)) {
            $pos = $this->collSpyUrls->search($spyUrl);
            $this->collSpyUrls->remove($pos);
            if (null === $this->spyUrlsScheduledForDeletion) {
                $this->spyUrlsScheduledForDeletion = clone $this->collSpyUrls;
                $this->spyUrlsScheduledForDeletion->clear();
            }
            $this->spyUrlsScheduledForDeletion[]= $spyUrl;
            $spyUrl->setSpyProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyCategoryNode(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyCategoryNode', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinCmsPage(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('CmsPage', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyLocale', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyRedirect(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyRedirect', $joinBehavior);

        return $this->getSpyUrls($query, $con);
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
     * If this ChildSpyAbstractProduct is new, it will return
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
                    ->filterBySpyAbstractProduct($this)
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
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function setSpyWishlistItems(Collection $spyWishlistItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpyWishlistItem[] $spyWishlistItemsToDelete */
        $spyWishlistItemsToDelete = $this->getSpyWishlistItems(new Criteria(), $con)->diff($spyWishlistItems);


        $this->spyWishlistItemsScheduledForDeletion = $spyWishlistItemsToDelete;

        foreach ($spyWishlistItemsToDelete as $spyWishlistItemRemoved) {
            $spyWishlistItemRemoved->setSpyAbstractProduct(null);
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
                ->filterBySpyAbstractProduct($this)
                ->count($con);
        }

        return count($this->collSpyWishlistItems);
    }

    /**
     * Method called to associate a ChildSpyWishlistItem object to this object
     * through the ChildSpyWishlistItem foreign key attribute.
     *
     * @param  ChildSpyWishlistItem $l ChildSpyWishlistItem
     * @return $this|\Propel\SpyAbstractProduct The current object (for fluent API support)
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
        $spyWishlistItem->setSpyAbstractProduct($this);
    }

    /**
     * @param  ChildSpyWishlistItem $spyWishlistItem The ChildSpyWishlistItem object to remove.
     * @return $this|ChildSpyAbstractProduct The current object (for fluent API support)
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
            $this->spyWishlistItemsScheduledForDeletion[]= clone $spyWishlistItem;
            $spyWishlistItem->setSpyAbstractProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyWishlistItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
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
     * Otherwise if this SpyAbstractProduct is new, it will return
     * an empty collection; or if this SpyAbstractProduct has previously
     * been saved, it will retrieve related SpyWishlistItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyAbstractProduct.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyWishlistItem[] List of ChildSpyWishlistItem objects
     */
    public function getSpyWishlistItemsJoinSpyProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyWishlistItemQuery::create(null, $criteria);
        $query->joinWith('SpyProduct', $joinBehavior);

        return $this->getSpyWishlistItems($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyTaxSet) {
            $this->aSpyTaxSet->removeSpyAbstractProduct($this);
        }
        $this->id_abstract_product = null;
        $this->sku = null;
        $this->attributes = null;
        $this->fk_tax_set = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
            if ($this->collSpyLocalizedAbstractProductAttributess) {
                foreach ($this->collSpyLocalizedAbstractProductAttributess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProducts) {
                foreach ($this->collSpyProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductCategories) {
                foreach ($this->collSpyProductCategories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyUrls) {
                foreach ($this->collSpyUrls as $o) {
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
        $this->collSpyLocalizedAbstractProductAttributess = null;
        $this->collSpyProducts = null;
        $this->collSpyProductCategories = null;
        $this->collSpyUrls = null;
        $this->collSpyWishlistItems = null;
        $this->aSpyTaxSet = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyAbstractProductTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyAbstractProduct The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyAbstractProductTableMap::COL_UPDATED_AT] = true;

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
