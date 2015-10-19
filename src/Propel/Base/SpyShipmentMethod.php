<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\SpyShipmentCarrier as ChildSpyShipmentCarrier;
use Propel\SpyShipmentCarrierQuery as ChildSpyShipmentCarrierQuery;
use Propel\SpyShipmentMethod as ChildSpyShipmentMethod;
use Propel\SpyShipmentMethodQuery as ChildSpyShipmentMethodQuery;
use Propel\SpyTaxSet as ChildSpyTaxSet;
use Propel\SpyTaxSetQuery as ChildSpyTaxSetQuery;
use Propel\Map\SpyShipmentMethodTableMap;
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

/**
 * Base class that represents a row from the 'spy_shipment_method' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyShipmentMethod extends SpyShipmentMethod implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyShipmentMethodTableMap';


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
     * The value for the id_shipment_method field.
     * @var        int
     */
    protected $id_shipment_method;

    /**
     * The value for the fk_shipment_carrier field.
     * @var        int
     */
    protected $fk_shipment_carrier;

    /**
     * The value for the fk_tax_set field.
     * @var        int
     */
    protected $fk_tax_set;

    /**
     * The value for the glossary_key_name field.
     * @var        string
     */
    protected $glossary_key_name;

    /**
     * The value for the glossary_key_description field.
     * @var        string
     */
    protected $glossary_key_description;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the price field.
     * @var        int
     */
    protected $price;

    /**
     * The value for the availability_plugin field.
     * @var        string
     */
    protected $availability_plugin;

    /**
     * The value for the price_calculation_plugin field.
     * @var        string
     */
    protected $price_calculation_plugin;

    /**
     * The value for the delivery_time_plugin field.
     * @var        string
     */
    protected $delivery_time_plugin;

    /**
     * The value for the tax_calculation_plugin field.
     * @var        string
     */
    protected $tax_calculation_plugin;

    /**
     * @var        ChildSpyShipmentCarrier
     */
    protected $aShipmentCarrier;

    /**
     * @var        ChildSpyTaxSet
     */
    protected $aTaxSet;

    /**
     * @var        ObjectCollection|ChildSpySalesOrder[] Collection to store aggregation of ChildSpySalesOrder objects.
     */
    protected $collShipmentMethodss;
    protected $collShipmentMethodssPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrder[]
     */
    protected $shipmentMethodssScheduledForDeletion = null;

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
     * Initializes internal state of Propel\Base\SpyShipmentMethod object.
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
     * Compares this with another <code>SpyShipmentMethod</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyShipmentMethod</code>, delegates to
     * <code>equals(SpyShipmentMethod)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyShipmentMethod The current object, for fluid interface
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
     * Get the [id_shipment_method] column value.
     *
     * @return int
     */
    public function getIdShipmentMethod()
    {
        return $this->id_shipment_method;
    }

    /**
     * Get the [fk_shipment_carrier] column value.
     *
     * @return int
     */
    public function getFkShipmentCarrier()
    {
        return $this->fk_shipment_carrier;
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
     * Get the [glossary_key_name] column value.
     *
     * @return string
     */
    public function getGlossaryKeyName()
    {
        return $this->glossary_key_name;
    }

    /**
     * Get the [glossary_key_description] column value.
     *
     * @return string
     */
    public function getGlossaryKeyDescription()
    {
        return $this->glossary_key_description;
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
     * Get the [price] column value.
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [availability_plugin] column value.
     *
     * @return string
     */
    public function getAvailabilityPlugin()
    {
        return $this->availability_plugin;
    }

    /**
     * Get the [price_calculation_plugin] column value.
     *
     * @return string
     */
    public function getPriceCalculationPlugin()
    {
        return $this->price_calculation_plugin;
    }

    /**
     * Get the [delivery_time_plugin] column value.
     *
     * @return string
     */
    public function getDeliveryTimePlugin()
    {
        return $this->delivery_time_plugin;
    }

    /**
     * Get the [tax_calculation_plugin] column value.
     *
     * @return string
     */
    public function getTaxCalculationPlugin()
    {
        return $this->tax_calculation_plugin;
    }

    /**
     * Set the value of [id_shipment_method] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setIdShipmentMethod($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_shipment_method !== $v) {
            $this->id_shipment_method = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD] = true;
        }

        return $this;
    } // setIdShipmentMethod()

    /**
     * Set the value of [fk_shipment_carrier] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setFkShipmentCarrier($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_shipment_carrier !== $v) {
            $this->fk_shipment_carrier = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER] = true;
        }

        if ($this->aShipmentCarrier !== null && $this->aShipmentCarrier->getIdShipmentCarrier() !== $v) {
            $this->aShipmentCarrier = null;
        }

        return $this;
    } // setFkShipmentCarrier()

    /**
     * Set the value of [fk_tax_set] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setFkTaxSet($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_tax_set !== $v) {
            $this->fk_tax_set = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_FK_TAX_SET] = true;
        }

        if ($this->aTaxSet !== null && $this->aTaxSet->getIdTaxSet() !== $v) {
            $this->aTaxSet = null;
        }

        return $this;
    } // setFkTaxSet()

    /**
     * Set the value of [glossary_key_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setGlossaryKeyName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->glossary_key_name !== $v) {
            $this->glossary_key_name = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_NAME] = true;
        }

        return $this;
    } // setGlossaryKeyName()

    /**
     * Set the value of [glossary_key_description] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setGlossaryKeyDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->glossary_key_description !== $v) {
            $this->glossary_key_description = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_DESCRIPTION] = true;
        }

        return $this;
    } // setGlossaryKeyDescription()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
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
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_IS_ACTIVE] = true;
        }

        return $this;
    } // setIsActive()

    /**
     * Set the value of [price] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [availability_plugin] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setAvailabilityPlugin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->availability_plugin !== $v) {
            $this->availability_plugin = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_AVAILABILITY_PLUGIN] = true;
        }

        return $this;
    } // setAvailabilityPlugin()

    /**
     * Set the value of [price_calculation_plugin] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setPriceCalculationPlugin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price_calculation_plugin !== $v) {
            $this->price_calculation_plugin = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_PRICE_CALCULATION_PLUGIN] = true;
        }

        return $this;
    } // setPriceCalculationPlugin()

    /**
     * Set the value of [delivery_time_plugin] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setDeliveryTimePlugin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->delivery_time_plugin !== $v) {
            $this->delivery_time_plugin = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_DELIVERY_TIME_PLUGIN] = true;
        }

        return $this;
    } // setDeliveryTimePlugin()

    /**
     * Set the value of [tax_calculation_plugin] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function setTaxCalculationPlugin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tax_calculation_plugin !== $v) {
            $this->tax_calculation_plugin = $v;
            $this->modifiedColumns[SpyShipmentMethodTableMap::COL_TAX_CALCULATION_PLUGIN] = true;
        }

        return $this;
    } // setTaxCalculationPlugin()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyShipmentMethodTableMap::translateFieldName('IdShipmentMethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_shipment_method = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyShipmentMethodTableMap::translateFieldName('FkShipmentCarrier', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_shipment_carrier = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyShipmentMethodTableMap::translateFieldName('FkTaxSet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_tax_set = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyShipmentMethodTableMap::translateFieldName('GlossaryKeyName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->glossary_key_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyShipmentMethodTableMap::translateFieldName('GlossaryKeyDescription', TableMap::TYPE_PHPNAME, $indexType)];
            $this->glossary_key_description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyShipmentMethodTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyShipmentMethodTableMap::translateFieldName('IsActive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_active = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyShipmentMethodTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyShipmentMethodTableMap::translateFieldName('AvailabilityPlugin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->availability_plugin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyShipmentMethodTableMap::translateFieldName('PriceCalculationPlugin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price_calculation_plugin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyShipmentMethodTableMap::translateFieldName('DeliveryTimePlugin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->delivery_time_plugin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyShipmentMethodTableMap::translateFieldName('TaxCalculationPlugin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tax_calculation_plugin = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = SpyShipmentMethodTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyShipmentMethod'), 0, $e);
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
        if ($this->aShipmentCarrier !== null && $this->fk_shipment_carrier !== $this->aShipmentCarrier->getIdShipmentCarrier()) {
            $this->aShipmentCarrier = null;
        }
        if ($this->aTaxSet !== null && $this->fk_tax_set !== $this->aTaxSet->getIdTaxSet()) {
            $this->aTaxSet = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyShipmentMethodTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyShipmentMethodQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aShipmentCarrier = null;
            $this->aTaxSet = null;
            $this->collShipmentMethodss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyShipmentMethod::setDeleted()
     * @see SpyShipmentMethod::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyShipmentMethodTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyShipmentMethodQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyShipmentMethodTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
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
                SpyShipmentMethodTableMap::addInstanceToPool($this);
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

            if ($this->aShipmentCarrier !== null) {
                if ($this->aShipmentCarrier->isModified() || $this->aShipmentCarrier->isNew()) {
                    $affectedRows += $this->aShipmentCarrier->save($con);
                }
                $this->setShipmentCarrier($this->aShipmentCarrier);
            }

            if ($this->aTaxSet !== null) {
                if ($this->aTaxSet->isModified() || $this->aTaxSet->isNew()) {
                    $affectedRows += $this->aTaxSet->save($con);
                }
                $this->setTaxSet($this->aTaxSet);
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

            if ($this->shipmentMethodssScheduledForDeletion !== null) {
                if (!$this->shipmentMethodssScheduledForDeletion->isEmpty()) {
                    foreach ($this->shipmentMethodssScheduledForDeletion as $shipmentMethods) {
                        // need to save related object because we set the relation to null
                        $shipmentMethods->save($con);
                    }
                    $this->shipmentMethodssScheduledForDeletion = null;
                }
            }

            if ($this->collShipmentMethodss !== null) {
                foreach ($this->collShipmentMethodss as $referrerFK) {
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

        $this->modifiedColumns[SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD] = true;
        if (null !== $this->id_shipment_method) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD)) {
            $modifiedColumns[':p' . $index++]  = '`id_shipment_method`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_shipment_carrier`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_FK_TAX_SET)) {
            $modifiedColumns[':p' . $index++]  = '`fk_tax_set`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`glossary_key_name`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`glossary_key_description`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = '`price`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_AVAILABILITY_PLUGIN)) {
            $modifiedColumns[':p' . $index++]  = '`availability_plugin`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_PRICE_CALCULATION_PLUGIN)) {
            $modifiedColumns[':p' . $index++]  = '`price_calculation_plugin`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_DELIVERY_TIME_PLUGIN)) {
            $modifiedColumns[':p' . $index++]  = '`delivery_time_plugin`';
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_TAX_CALCULATION_PLUGIN)) {
            $modifiedColumns[':p' . $index++]  = '`tax_calculation_plugin`';
        }

        $sql = sprintf(
            'INSERT INTO `spy_shipment_method` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_shipment_method`':
                        $stmt->bindValue($identifier, $this->id_shipment_method, PDO::PARAM_INT);
                        break;
                    case '`fk_shipment_carrier`':
                        $stmt->bindValue($identifier, $this->fk_shipment_carrier, PDO::PARAM_INT);
                        break;
                    case '`fk_tax_set`':
                        $stmt->bindValue($identifier, $this->fk_tax_set, PDO::PARAM_INT);
                        break;
                    case '`glossary_key_name`':
                        $stmt->bindValue($identifier, $this->glossary_key_name, PDO::PARAM_STR);
                        break;
                    case '`glossary_key_description`':
                        $stmt->bindValue($identifier, $this->glossary_key_description, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case '`price`':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_INT);
                        break;
                    case '`availability_plugin`':
                        $stmt->bindValue($identifier, $this->availability_plugin, PDO::PARAM_STR);
                        break;
                    case '`price_calculation_plugin`':
                        $stmt->bindValue($identifier, $this->price_calculation_plugin, PDO::PARAM_STR);
                        break;
                    case '`delivery_time_plugin`':
                        $stmt->bindValue($identifier, $this->delivery_time_plugin, PDO::PARAM_STR);
                        break;
                    case '`tax_calculation_plugin`':
                        $stmt->bindValue($identifier, $this->tax_calculation_plugin, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_shipment_method_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdShipmentMethod($pk);

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
        $pos = SpyShipmentMethodTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdShipmentMethod();
                break;
            case 1:
                return $this->getFkShipmentCarrier();
                break;
            case 2:
                return $this->getFkTaxSet();
                break;
            case 3:
                return $this->getGlossaryKeyName();
                break;
            case 4:
                return $this->getGlossaryKeyDescription();
                break;
            case 5:
                return $this->getName();
                break;
            case 6:
                return $this->getIsActive();
                break;
            case 7:
                return $this->getPrice();
                break;
            case 8:
                return $this->getAvailabilityPlugin();
                break;
            case 9:
                return $this->getPriceCalculationPlugin();
                break;
            case 10:
                return $this->getDeliveryTimePlugin();
                break;
            case 11:
                return $this->getTaxCalculationPlugin();
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

        if (isset($alreadyDumpedObjects['SpyShipmentMethod'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyShipmentMethod'][$this->hashCode()] = true;
        $keys = SpyShipmentMethodTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdShipmentMethod(),
            $keys[1] => $this->getFkShipmentCarrier(),
            $keys[2] => $this->getFkTaxSet(),
            $keys[3] => $this->getGlossaryKeyName(),
            $keys[4] => $this->getGlossaryKeyDescription(),
            $keys[5] => $this->getName(),
            $keys[6] => $this->getIsActive(),
            $keys[7] => $this->getPrice(),
            $keys[8] => $this->getAvailabilityPlugin(),
            $keys[9] => $this->getPriceCalculationPlugin(),
            $keys[10] => $this->getDeliveryTimePlugin(),
            $keys[11] => $this->getTaxCalculationPlugin(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aShipmentCarrier) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyShipmentCarrier';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_shipment_carrier';
                        break;
                    default:
                        $key = 'SpyShipmentCarrier';
                }

                $result[$key] = $this->aShipmentCarrier->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTaxSet) {

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

                $result[$key] = $this->aTaxSet->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collShipmentMethodss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrders';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_orders';
                        break;
                    default:
                        $key = 'SpySalesOrders';
                }

                $result[$key] = $this->collShipmentMethodss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyShipmentMethod
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyShipmentMethodTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyShipmentMethod
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdShipmentMethod($value);
                break;
            case 1:
                $this->setFkShipmentCarrier($value);
                break;
            case 2:
                $this->setFkTaxSet($value);
                break;
            case 3:
                $this->setGlossaryKeyName($value);
                break;
            case 4:
                $this->setGlossaryKeyDescription($value);
                break;
            case 5:
                $this->setName($value);
                break;
            case 6:
                $this->setIsActive($value);
                break;
            case 7:
                $this->setPrice($value);
                break;
            case 8:
                $this->setAvailabilityPlugin($value);
                break;
            case 9:
                $this->setPriceCalculationPlugin($value);
                break;
            case 10:
                $this->setDeliveryTimePlugin($value);
                break;
            case 11:
                $this->setTaxCalculationPlugin($value);
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
        $keys = SpyShipmentMethodTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdShipmentMethod($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkShipmentCarrier($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkTaxSet($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setGlossaryKeyName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setGlossaryKeyDescription($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIsActive($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPrice($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAvailabilityPlugin($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPriceCalculationPlugin($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDeliveryTimePlugin($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTaxCalculationPlugin($arr[$keys[11]]);
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
     * @return $this|\Propel\SpyShipmentMethod The current object, for fluid interface
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
        $criteria = new Criteria(SpyShipmentMethodTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $this->id_shipment_method);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_FK_SHIPMENT_CARRIER, $this->fk_shipment_carrier);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_FK_TAX_SET)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_FK_TAX_SET, $this->fk_tax_set);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_NAME)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_NAME, $this->glossary_key_name);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_DESCRIPTION)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_GLOSSARY_KEY_DESCRIPTION, $this->glossary_key_description);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_NAME)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_IS_ACTIVE)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_IS_ACTIVE, $this->is_active);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_PRICE)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_AVAILABILITY_PLUGIN)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_AVAILABILITY_PLUGIN, $this->availability_plugin);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_PRICE_CALCULATION_PLUGIN)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_PRICE_CALCULATION_PLUGIN, $this->price_calculation_plugin);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_DELIVERY_TIME_PLUGIN)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_DELIVERY_TIME_PLUGIN, $this->delivery_time_plugin);
        }
        if ($this->isColumnModified(SpyShipmentMethodTableMap::COL_TAX_CALCULATION_PLUGIN)) {
            $criteria->add(SpyShipmentMethodTableMap::COL_TAX_CALCULATION_PLUGIN, $this->tax_calculation_plugin);
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
        $criteria = ChildSpyShipmentMethodQuery::create();
        $criteria->add(SpyShipmentMethodTableMap::COL_ID_SHIPMENT_METHOD, $this->id_shipment_method);

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
        $validPk = null !== $this->getIdShipmentMethod();

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
        return $this->getIdShipmentMethod();
    }

    /**
     * Generic method to set the primary key (id_shipment_method column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdShipmentMethod($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdShipmentMethod();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyShipmentMethod (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkShipmentCarrier($this->getFkShipmentCarrier());
        $copyObj->setFkTaxSet($this->getFkTaxSet());
        $copyObj->setGlossaryKeyName($this->getGlossaryKeyName());
        $copyObj->setGlossaryKeyDescription($this->getGlossaryKeyDescription());
        $copyObj->setName($this->getName());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setAvailabilityPlugin($this->getAvailabilityPlugin());
        $copyObj->setPriceCalculationPlugin($this->getPriceCalculationPlugin());
        $copyObj->setDeliveryTimePlugin($this->getDeliveryTimePlugin());
        $copyObj->setTaxCalculationPlugin($this->getTaxCalculationPlugin());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getShipmentMethodss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addShipmentMethods($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdShipmentMethod(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyShipmentMethod Clone of current object.
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
     * Declares an association between this object and a ChildSpyShipmentCarrier object.
     *
     * @param  ChildSpyShipmentCarrier $v
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShipmentCarrier(ChildSpyShipmentCarrier $v = null)
    {
        if ($v === null) {
            $this->setFkShipmentCarrier(NULL);
        } else {
            $this->setFkShipmentCarrier($v->getIdShipmentCarrier());
        }

        $this->aShipmentCarrier = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyShipmentCarrier object, it will not be re-added.
        if ($v !== null) {
            $v->addShipmentMethods($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyShipmentCarrier object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyShipmentCarrier The associated ChildSpyShipmentCarrier object.
     * @throws PropelException
     */
    public function getShipmentCarrier(ConnectionInterface $con = null)
    {
        if ($this->aShipmentCarrier === null && ($this->fk_shipment_carrier !== null)) {
            $this->aShipmentCarrier = ChildSpyShipmentCarrierQuery::create()->findPk($this->fk_shipment_carrier, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShipmentCarrier->addShipmentMethodss($this);
             */
        }

        return $this->aShipmentCarrier;
    }

    /**
     * Declares an association between this object and a ChildSpyTaxSet object.
     *
     * @param  ChildSpyTaxSet $v
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTaxSet(ChildSpyTaxSet $v = null)
    {
        if ($v === null) {
            $this->setFkTaxSet(NULL);
        } else {
            $this->setFkTaxSet($v->getIdTaxSet());
        }

        $this->aTaxSet = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyTaxSet object, it will not be re-added.
        if ($v !== null) {
            $v->addShipmentMethods($this);
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
    public function getTaxSet(ConnectionInterface $con = null)
    {
        if ($this->aTaxSet === null && ($this->fk_tax_set !== null)) {
            $this->aTaxSet = ChildSpyTaxSetQuery::create()->findPk($this->fk_tax_set, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTaxSet->addShipmentMethodss($this);
             */
        }

        return $this->aTaxSet;
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
        if ('ShipmentMethods' == $relationName) {
            return $this->initShipmentMethodss();
        }
    }

    /**
     * Clears out the collShipmentMethodss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addShipmentMethodss()
     */
    public function clearShipmentMethodss()
    {
        $this->collShipmentMethodss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collShipmentMethodss collection loaded partially.
     */
    public function resetPartialShipmentMethodss($v = true)
    {
        $this->collShipmentMethodssPartial = $v;
    }

    /**
     * Initializes the collShipmentMethodss collection.
     *
     * By default this just sets the collShipmentMethodss collection to an empty array (like clearcollShipmentMethodss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initShipmentMethodss($overrideExisting = true)
    {
        if (null !== $this->collShipmentMethodss && !$overrideExisting) {
            return;
        }
        $this->collShipmentMethodss = new ObjectCollection();
        $this->collShipmentMethodss->setModel('\Propel\SpySalesOrder');
    }

    /**
     * Gets an array of ChildSpySalesOrder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyShipmentMethod is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     * @throws PropelException
     */
    public function getShipmentMethodss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collShipmentMethodssPartial && !$this->isNew();
        if (null === $this->collShipmentMethodss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collShipmentMethodss) {
                // return empty collection
                $this->initShipmentMethodss();
            } else {
                $collShipmentMethodss = ChildSpySalesOrderQuery::create(null, $criteria)
                    ->filterByShipmentMethod($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collShipmentMethodssPartial && count($collShipmentMethodss)) {
                        $this->initShipmentMethodss(false);

                        foreach ($collShipmentMethodss as $obj) {
                            if (false == $this->collShipmentMethodss->contains($obj)) {
                                $this->collShipmentMethodss->append($obj);
                            }
                        }

                        $this->collShipmentMethodssPartial = true;
                    }

                    return $collShipmentMethodss;
                }

                if ($partial && $this->collShipmentMethodss) {
                    foreach ($this->collShipmentMethodss as $obj) {
                        if ($obj->isNew()) {
                            $collShipmentMethodss[] = $obj;
                        }
                    }
                }

                $this->collShipmentMethodss = $collShipmentMethodss;
                $this->collShipmentMethodssPartial = false;
            }
        }

        return $this->collShipmentMethodss;
    }

    /**
     * Sets a collection of ChildSpySalesOrder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $shipmentMethodss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyShipmentMethod The current object (for fluent API support)
     */
    public function setShipmentMethodss(Collection $shipmentMethodss, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrder[] $shipmentMethodssToDelete */
        $shipmentMethodssToDelete = $this->getShipmentMethodss(new Criteria(), $con)->diff($shipmentMethodss);


        $this->shipmentMethodssScheduledForDeletion = $shipmentMethodssToDelete;

        foreach ($shipmentMethodssToDelete as $shipmentMethodsRemoved) {
            $shipmentMethodsRemoved->setShipmentMethod(null);
        }

        $this->collShipmentMethodss = null;
        foreach ($shipmentMethodss as $shipmentMethods) {
            $this->addShipmentMethods($shipmentMethods);
        }

        $this->collShipmentMethodss = $shipmentMethodss;
        $this->collShipmentMethodssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySalesOrder objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrder objects.
     * @throws PropelException
     */
    public function countShipmentMethodss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collShipmentMethodssPartial && !$this->isNew();
        if (null === $this->collShipmentMethodss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collShipmentMethodss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getShipmentMethodss());
            }

            $query = ChildSpySalesOrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShipmentMethod($this)
                ->count($con);
        }

        return count($this->collShipmentMethodss);
    }

    /**
     * Method called to associate a ChildSpySalesOrder object to this object
     * through the ChildSpySalesOrder foreign key attribute.
     *
     * @param  ChildSpySalesOrder $l ChildSpySalesOrder
     * @return $this|\Propel\SpyShipmentMethod The current object (for fluent API support)
     */
    public function addShipmentMethods(ChildSpySalesOrder $l)
    {
        if ($this->collShipmentMethodss === null) {
            $this->initShipmentMethodss();
            $this->collShipmentMethodssPartial = true;
        }

        if (!$this->collShipmentMethodss->contains($l)) {
            $this->doAddShipmentMethods($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrder $shipmentMethods The ChildSpySalesOrder object to add.
     */
    protected function doAddShipmentMethods(ChildSpySalesOrder $shipmentMethods)
    {
        $this->collShipmentMethodss[]= $shipmentMethods;
        $shipmentMethods->setShipmentMethod($this);
    }

    /**
     * @param  ChildSpySalesOrder $shipmentMethods The ChildSpySalesOrder object to remove.
     * @return $this|ChildSpyShipmentMethod The current object (for fluent API support)
     */
    public function removeShipmentMethods(ChildSpySalesOrder $shipmentMethods)
    {
        if ($this->getShipmentMethodss()->contains($shipmentMethods)) {
            $pos = $this->collShipmentMethodss->search($shipmentMethods);
            $this->collShipmentMethodss->remove($pos);
            if (null === $this->shipmentMethodssScheduledForDeletion) {
                $this->shipmentMethodssScheduledForDeletion = clone $this->collShipmentMethodss;
                $this->shipmentMethodssScheduledForDeletion->clear();
            }
            $this->shipmentMethodssScheduledForDeletion[]= $shipmentMethods;
            $shipmentMethods->setShipmentMethod(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyShipmentMethod is new, it will return
     * an empty collection; or if this SpyShipmentMethod has previously
     * been saved, it will retrieve related ShipmentMethodss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyShipmentMethod.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getShipmentMethodssJoinCustomer(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('Customer', $joinBehavior);

        return $this->getShipmentMethodss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyShipmentMethod is new, it will return
     * an empty collection; or if this SpyShipmentMethod has previously
     * been saved, it will retrieve related ShipmentMethodss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyShipmentMethod.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getShipmentMethodssJoinBillingAddress(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('BillingAddress', $joinBehavior);

        return $this->getShipmentMethodss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyShipmentMethod is new, it will return
     * an empty collection; or if this SpyShipmentMethod has previously
     * been saved, it will retrieve related ShipmentMethodss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyShipmentMethod.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getShipmentMethodssJoinShippingAddress(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('ShippingAddress', $joinBehavior);

        return $this->getShipmentMethodss($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aShipmentCarrier) {
            $this->aShipmentCarrier->removeShipmentMethods($this);
        }
        if (null !== $this->aTaxSet) {
            $this->aTaxSet->removeShipmentMethods($this);
        }
        $this->id_shipment_method = null;
        $this->fk_shipment_carrier = null;
        $this->fk_tax_set = null;
        $this->glossary_key_name = null;
        $this->glossary_key_description = null;
        $this->name = null;
        $this->is_active = null;
        $this->price = null;
        $this->availability_plugin = null;
        $this->price_calculation_plugin = null;
        $this->delivery_time_plugin = null;
        $this->tax_calculation_plugin = null;
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
            if ($this->collShipmentMethodss) {
                foreach ($this->collShipmentMethodss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collShipmentMethodss = null;
        $this->aShipmentCarrier = null;
        $this->aTaxSet = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyShipmentMethodTableMap::DEFAULT_STRING_FORMAT);
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
