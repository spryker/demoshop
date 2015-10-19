<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyDiscount as ChildSpyDiscount;
use Propel\SpyDiscountCollector as ChildSpyDiscountCollector;
use Propel\SpyDiscountCollectorQuery as ChildSpyDiscountCollectorQuery;
use Propel\SpyDiscountDecisionRule as ChildSpyDiscountDecisionRule;
use Propel\SpyDiscountDecisionRuleQuery as ChildSpyDiscountDecisionRuleQuery;
use Propel\SpyDiscountQuery as ChildSpyDiscountQuery;
use Propel\SpyDiscountVoucherPool as ChildSpyDiscountVoucherPool;
use Propel\SpyDiscountVoucherPoolQuery as ChildSpyDiscountVoucherPoolQuery;
use Propel\Map\SpyDiscountTableMap;
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
 * Base class that represents a row from the 'spy_discount' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyDiscount extends SpyDiscount implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyDiscountTableMap';


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
     * The value for the id_discount field.
     * @var        int
     */
    protected $id_discount;

    /**
     * The value for the fk_discount_voucher_pool field.
     * @var        int
     */
    protected $fk_discount_voucher_pool;

    /**
     * The value for the display_name field.
     * @var        string
     */
    protected $display_name;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the amount field.
     * @var        int
     */
    protected $amount;

    /**
     * The value for the type field.
     * @var        int
     */
    protected $type;

    /**
     * The value for the calculator_plugin field.
     * @var        string
     */
    protected $calculator_plugin;

    /**
     * The value for the is_privileged field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_privileged;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the valid_from field.
     * @var        \DateTime
     */
    protected $valid_from;

    /**
     * The value for the valid_to field.
     * @var        \DateTime
     */
    protected $valid_to;

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
     * @var        ChildSpyDiscountVoucherPool
     */
    protected $aVoucherPool;

    /**
     * @var        ObjectCollection|ChildSpyDiscountDecisionRule[] Collection to store aggregation of ChildSpyDiscountDecisionRule objects.
     */
    protected $collDecisionRules;
    protected $collDecisionRulesPartial;

    /**
     * @var        ObjectCollection|ChildSpyDiscountCollector[] Collection to store aggregation of ChildSpyDiscountCollector objects.
     */
    protected $collDiscountCollectors;
    protected $collDiscountCollectorsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyDiscountDecisionRule[]
     */
    protected $decisionRulesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyDiscountCollector[]
     */
    protected $discountCollectorsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_privileged = false;
        $this->is_active = false;
    }

    /**
     * Initializes internal state of Propel\Base\SpyDiscount object.
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
     * Compares this with another <code>SpyDiscount</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyDiscount</code>, delegates to
     * <code>equals(SpyDiscount)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyDiscount The current object, for fluid interface
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
     * Get the [id_discount] column value.
     *
     * @return int
     */
    public function getIdDiscount()
    {
        return $this->id_discount;
    }

    /**
     * Get the [fk_discount_voucher_pool] column value.
     *
     * @return int
     */
    public function getFkDiscountVoucherPool()
    {
        return $this->fk_discount_voucher_pool;
    }

    /**
     * Get the [display_name] column value.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getType()
    {
        if (null === $this->type) {
            return null;
        }
        $valueSet = SpyDiscountTableMap::getValueSet(SpyDiscountTableMap::COL_TYPE);
        if (!isset($valueSet[$this->type])) {
            throw new PropelException('Unknown stored enum key: ' . $this->type);
        }

        return $valueSet[$this->type];
    }

    /**
     * Get the [calculator_plugin] column value.
     *
     * @return string
     */
    public function getCalculatorPlugin()
    {
        return $this->calculator_plugin;
    }

    /**
     * Get the [is_privileged] column value.
     *
     * @return boolean
     */
    public function getIsPrivileged()
    {
        return $this->is_privileged;
    }

    /**
     * Get the [is_privileged] column value.
     *
     * @return boolean
     */
    public function isPrivileged()
    {
        return $this->getIsPrivileged();
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
     * Get the [optionally formatted] temporal [valid_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getValidFrom($format = NULL)
    {
        if ($format === null) {
            return $this->valid_from;
        } else {
            return $this->valid_from instanceof \DateTime ? $this->valid_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [valid_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getValidTo($format = NULL)
    {
        if ($format === null) {
            return $this->valid_to;
        } else {
            return $this->valid_to instanceof \DateTime ? $this->valid_to->format($format) : null;
        }
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
     * Set the value of [id_discount] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setIdDiscount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_discount !== $v) {
            $this->id_discount = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_ID_DISCOUNT] = true;
        }

        return $this;
    } // setIdDiscount()

    /**
     * Set the value of [fk_discount_voucher_pool] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setFkDiscountVoucherPool($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_discount_voucher_pool !== $v) {
            $this->fk_discount_voucher_pool = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL] = true;
        }

        if ($this->aVoucherPool !== null && $this->aVoucherPool->getIdDiscountVoucherPool() !== $v) {
            $this->aVoucherPool = null;
        }

        return $this;
    } // setFkDiscountVoucherPool()

    /**
     * Set the value of [display_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setDisplayName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->display_name !== $v) {
            $this->display_name = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_DISPLAY_NAME] = true;
        }

        return $this;
    } // setDisplayName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [type] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setType($v)
    {
        if ($v !== null) {
            $valueSet = SpyDiscountTableMap::getValueSet(SpyDiscountTableMap::COL_TYPE);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [calculator_plugin] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setCalculatorPlugin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->calculator_plugin !== $v) {
            $this->calculator_plugin = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_CALCULATOR_PLUGIN] = true;
        }

        return $this;
    } // setCalculatorPlugin()

    /**
     * Sets the value of the [is_privileged] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setIsPrivileged($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_privileged !== $v) {
            $this->is_privileged = $v;
            $this->modifiedColumns[SpyDiscountTableMap::COL_IS_PRIVILEGED] = true;
        }

        return $this;
    } // setIsPrivileged()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
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
            $this->modifiedColumns[SpyDiscountTableMap::COL_IS_ACTIVE] = true;
        }

        return $this;
    } // setIsActive()

    /**
     * Sets the value of [valid_from] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setValidFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->valid_from !== null || $dt !== null) {
            if ($this->valid_from === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->valid_from->format("Y-m-d H:i:s")) {
                $this->valid_from = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyDiscountTableMap::COL_VALID_FROM] = true;
            }
        } // if either are not null

        return $this;
    } // setValidFrom()

    /**
     * Sets the value of [valid_to] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setValidTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->valid_to !== null || $dt !== null) {
            if ($this->valid_to === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->valid_to->format("Y-m-d H:i:s")) {
                $this->valid_to = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyDiscountTableMap::COL_VALID_TO] = true;
            }
        } // if either are not null

        return $this;
    } // setValidTo()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyDiscountTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyDiscountTableMap::COL_UPDATED_AT] = true;
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
            if ($this->is_privileged !== false) {
                return false;
            }

            if ($this->is_active !== false) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyDiscountTableMap::translateFieldName('IdDiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_discount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyDiscountTableMap::translateFieldName('FkDiscountVoucherPool', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_discount_voucher_pool = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyDiscountTableMap::translateFieldName('DisplayName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->display_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyDiscountTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyDiscountTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyDiscountTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyDiscountTableMap::translateFieldName('CalculatorPlugin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->calculator_plugin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyDiscountTableMap::translateFieldName('IsPrivileged', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_privileged = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyDiscountTableMap::translateFieldName('IsActive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_active = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyDiscountTableMap::translateFieldName('ValidFrom', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->valid_from = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyDiscountTableMap::translateFieldName('ValidTo', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->valid_to = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyDiscountTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpyDiscountTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = SpyDiscountTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyDiscount'), 0, $e);
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
        if ($this->aVoucherPool !== null && $this->fk_discount_voucher_pool !== $this->aVoucherPool->getIdDiscountVoucherPool()) {
            $this->aVoucherPool = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyDiscountTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyDiscountQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aVoucherPool = null;
            $this->collDecisionRules = null;

            $this->collDiscountCollectors = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyDiscount::setDeleted()
     * @see SpyDiscount::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyDiscountQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyDiscountTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyDiscountTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyDiscountTableMap::COL_UPDATED_AT)) {
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
                SpyDiscountTableMap::addInstanceToPool($this);
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

            if ($this->aVoucherPool !== null) {
                if ($this->aVoucherPool->isModified() || $this->aVoucherPool->isNew()) {
                    $affectedRows += $this->aVoucherPool->save($con);
                }
                $this->setVoucherPool($this->aVoucherPool);
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

            if ($this->decisionRulesScheduledForDeletion !== null) {
                if (!$this->decisionRulesScheduledForDeletion->isEmpty()) {
                    foreach ($this->decisionRulesScheduledForDeletion as $decisionRule) {
                        // need to save related object because we set the relation to null
                        $decisionRule->save($con);
                    }
                    $this->decisionRulesScheduledForDeletion = null;
                }
            }

            if ($this->collDecisionRules !== null) {
                foreach ($this->collDecisionRules as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->discountCollectorsScheduledForDeletion !== null) {
                if (!$this->discountCollectorsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyDiscountCollectorQuery::create()
                        ->filterByPrimaryKeys($this->discountCollectorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->discountCollectorsScheduledForDeletion = null;
                }
            }

            if ($this->collDiscountCollectors !== null) {
                foreach ($this->collDiscountCollectors as $referrerFK) {
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

        $this->modifiedColumns[SpyDiscountTableMap::COL_ID_DISCOUNT] = true;
        if (null !== $this->id_discount) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyDiscountTableMap::COL_ID_DISCOUNT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyDiscountTableMap::COL_ID_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'id_discount';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL)) {
            $modifiedColumns[':p' . $index++]  = 'fk_discount_voucher_pool';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_DISPLAY_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'display_name';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_CALCULATOR_PLUGIN)) {
            $modifiedColumns[':p' . $index++]  = 'calculator_plugin';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_IS_PRIVILEGED)) {
            $modifiedColumns[':p' . $index++]  = 'is_privileged';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'is_active';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_VALID_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'valid_from';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_VALID_TO)) {
            $modifiedColumns[':p' . $index++]  = 'valid_to';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_discount (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_discount':
                        $stmt->bindValue($identifier, $this->id_discount, PDO::PARAM_INT);
                        break;
                    case 'fk_discount_voucher_pool':
                        $stmt->bindValue($identifier, $this->fk_discount_voucher_pool, PDO::PARAM_INT);
                        break;
                    case 'display_name':
                        $stmt->bindValue($identifier, $this->display_name, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
                        break;
                    case 'calculator_plugin':
                        $stmt->bindValue($identifier, $this->calculator_plugin, PDO::PARAM_STR);
                        break;
                    case 'is_privileged':
                        $stmt->bindValue($identifier, (int) $this->is_privileged, PDO::PARAM_INT);
                        break;
                    case 'is_active':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case 'valid_from':
                        $stmt->bindValue($identifier, $this->valid_from ? $this->valid_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'valid_to':
                        $stmt->bindValue($identifier, $this->valid_to ? $this->valid_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
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
            $pk = $con->lastInsertId('spy_discount_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdDiscount($pk);

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
        $pos = SpyDiscountTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdDiscount();
                break;
            case 1:
                return $this->getFkDiscountVoucherPool();
                break;
            case 2:
                return $this->getDisplayName();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getAmount();
                break;
            case 5:
                return $this->getType();
                break;
            case 6:
                return $this->getCalculatorPlugin();
                break;
            case 7:
                return $this->getIsPrivileged();
                break;
            case 8:
                return $this->getIsActive();
                break;
            case 9:
                return $this->getValidFrom();
                break;
            case 10:
                return $this->getValidTo();
                break;
            case 11:
                return $this->getCreatedAt();
                break;
            case 12:
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

        if (isset($alreadyDumpedObjects['SpyDiscount'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyDiscount'][$this->hashCode()] = true;
        $keys = SpyDiscountTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdDiscount(),
            $keys[1] => $this->getFkDiscountVoucherPool(),
            $keys[2] => $this->getDisplayName(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getAmount(),
            $keys[5] => $this->getType(),
            $keys[6] => $this->getCalculatorPlugin(),
            $keys[7] => $this->getIsPrivileged(),
            $keys[8] => $this->getIsActive(),
            $keys[9] => $this->getValidFrom(),
            $keys[10] => $this->getValidTo(),
            $keys[11] => $this->getCreatedAt(),
            $keys[12] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[9]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[9]];
            $result[$keys[9]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[10]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[10]];
            $result[$keys[10]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[11]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[11]];
            $result[$keys[11]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[12]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[12]];
            $result[$keys[12]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aVoucherPool) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyDiscountVoucherPool';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_discount_voucher_pool';
                        break;
                    default:
                        $key = 'SpyDiscountVoucherPool';
                }

                $result[$key] = $this->aVoucherPool->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDecisionRules) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyDiscountDecisionRules';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_discount_decision_rules';
                        break;
                    default:
                        $key = 'SpyDiscountDecisionRules';
                }

                $result[$key] = $this->collDecisionRules->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiscountCollectors) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyDiscountCollectors';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_discount_collectors';
                        break;
                    default:
                        $key = 'SpyDiscountCollectors';
                }

                $result[$key] = $this->collDiscountCollectors->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyDiscount
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyDiscountTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyDiscount
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdDiscount($value);
                break;
            case 1:
                $this->setFkDiscountVoucherPool($value);
                break;
            case 2:
                $this->setDisplayName($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setAmount($value);
                break;
            case 5:
                $valueSet = SpyDiscountTableMap::getValueSet(SpyDiscountTableMap::COL_TYPE);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setType($value);
                break;
            case 6:
                $this->setCalculatorPlugin($value);
                break;
            case 7:
                $this->setIsPrivileged($value);
                break;
            case 8:
                $this->setIsActive($value);
                break;
            case 9:
                $this->setValidFrom($value);
                break;
            case 10:
                $this->setValidTo($value);
                break;
            case 11:
                $this->setCreatedAt($value);
                break;
            case 12:
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
        $keys = SpyDiscountTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdDiscount($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkDiscountVoucherPool($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDisplayName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAmount($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setType($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCalculatorPlugin($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setIsPrivileged($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIsActive($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setValidFrom($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setValidTo($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCreatedAt($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setUpdatedAt($arr[$keys[12]]);
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
     * @return $this|\Propel\SpyDiscount The current object, for fluid interface
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
        $criteria = new Criteria(SpyDiscountTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyDiscountTableMap::COL_ID_DISCOUNT)) {
            $criteria->add(SpyDiscountTableMap::COL_ID_DISCOUNT, $this->id_discount);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL)) {
            $criteria->add(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, $this->fk_discount_voucher_pool);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_DISPLAY_NAME)) {
            $criteria->add(SpyDiscountTableMap::COL_DISPLAY_NAME, $this->display_name);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_DESCRIPTION)) {
            $criteria->add(SpyDiscountTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_AMOUNT)) {
            $criteria->add(SpyDiscountTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_TYPE)) {
            $criteria->add(SpyDiscountTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_CALCULATOR_PLUGIN)) {
            $criteria->add(SpyDiscountTableMap::COL_CALCULATOR_PLUGIN, $this->calculator_plugin);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_IS_PRIVILEGED)) {
            $criteria->add(SpyDiscountTableMap::COL_IS_PRIVILEGED, $this->is_privileged);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_IS_ACTIVE)) {
            $criteria->add(SpyDiscountTableMap::COL_IS_ACTIVE, $this->is_active);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_VALID_FROM)) {
            $criteria->add(SpyDiscountTableMap::COL_VALID_FROM, $this->valid_from);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_VALID_TO)) {
            $criteria->add(SpyDiscountTableMap::COL_VALID_TO, $this->valid_to);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyDiscountTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyDiscountTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyDiscountTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyDiscountQuery::create();
        $criteria->add(SpyDiscountTableMap::COL_ID_DISCOUNT, $this->id_discount);

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
        $validPk = null !== $this->getIdDiscount();

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
        return $this->getIdDiscount();
    }

    /**
     * Generic method to set the primary key (id_discount column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdDiscount($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdDiscount();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyDiscount (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkDiscountVoucherPool($this->getFkDiscountVoucherPool());
        $copyObj->setDisplayName($this->getDisplayName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setType($this->getType());
        $copyObj->setCalculatorPlugin($this->getCalculatorPlugin());
        $copyObj->setIsPrivileged($this->getIsPrivileged());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setValidFrom($this->getValidFrom());
        $copyObj->setValidTo($this->getValidTo());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getDecisionRules() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDecisionRule($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDiscountCollectors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscountCollector($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdDiscount(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyDiscount Clone of current object.
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
     * Declares an association between this object and a ChildSpyDiscountVoucherPool object.
     *
     * @param  ChildSpyDiscountVoucherPool $v
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     * @throws PropelException
     */
    public function setVoucherPool(ChildSpyDiscountVoucherPool $v = null)
    {
        if ($v === null) {
            $this->setFkDiscountVoucherPool(NULL);
        } else {
            $this->setFkDiscountVoucherPool($v->getIdDiscountVoucherPool());
        }

        $this->aVoucherPool = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyDiscountVoucherPool object, it will not be re-added.
        if ($v !== null) {
            $v->addDiscount($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyDiscountVoucherPool object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyDiscountVoucherPool The associated ChildSpyDiscountVoucherPool object.
     * @throws PropelException
     */
    public function getVoucherPool(ConnectionInterface $con = null)
    {
        if ($this->aVoucherPool === null && ($this->fk_discount_voucher_pool !== null)) {
            $this->aVoucherPool = ChildSpyDiscountVoucherPoolQuery::create()->findPk($this->fk_discount_voucher_pool, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aVoucherPool->addDiscounts($this);
             */
        }

        return $this->aVoucherPool;
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
        if ('DecisionRule' == $relationName) {
            return $this->initDecisionRules();
        }
        if ('DiscountCollector' == $relationName) {
            return $this->initDiscountCollectors();
        }
    }

    /**
     * Clears out the collDecisionRules collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDecisionRules()
     */
    public function clearDecisionRules()
    {
        $this->collDecisionRules = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDecisionRules collection loaded partially.
     */
    public function resetPartialDecisionRules($v = true)
    {
        $this->collDecisionRulesPartial = $v;
    }

    /**
     * Initializes the collDecisionRules collection.
     *
     * By default this just sets the collDecisionRules collection to an empty array (like clearcollDecisionRules());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDecisionRules($overrideExisting = true)
    {
        if (null !== $this->collDecisionRules && !$overrideExisting) {
            return;
        }
        $this->collDecisionRules = new ObjectCollection();
        $this->collDecisionRules->setModel('\Propel\SpyDiscountDecisionRule');
    }

    /**
     * Gets an array of ChildSpyDiscountDecisionRule objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyDiscount is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyDiscountDecisionRule[] List of ChildSpyDiscountDecisionRule objects
     * @throws PropelException
     */
    public function getDecisionRules(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDecisionRulesPartial && !$this->isNew();
        if (null === $this->collDecisionRules || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDecisionRules) {
                // return empty collection
                $this->initDecisionRules();
            } else {
                $collDecisionRules = ChildSpyDiscountDecisionRuleQuery::create(null, $criteria)
                    ->filterByDiscount($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDecisionRulesPartial && count($collDecisionRules)) {
                        $this->initDecisionRules(false);

                        foreach ($collDecisionRules as $obj) {
                            if (false == $this->collDecisionRules->contains($obj)) {
                                $this->collDecisionRules->append($obj);
                            }
                        }

                        $this->collDecisionRulesPartial = true;
                    }

                    return $collDecisionRules;
                }

                if ($partial && $this->collDecisionRules) {
                    foreach ($this->collDecisionRules as $obj) {
                        if ($obj->isNew()) {
                            $collDecisionRules[] = $obj;
                        }
                    }
                }

                $this->collDecisionRules = $collDecisionRules;
                $this->collDecisionRulesPartial = false;
            }
        }

        return $this->collDecisionRules;
    }

    /**
     * Sets a collection of ChildSpyDiscountDecisionRule objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $decisionRules A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyDiscount The current object (for fluent API support)
     */
    public function setDecisionRules(Collection $decisionRules, ConnectionInterface $con = null)
    {
        /** @var ChildSpyDiscountDecisionRule[] $decisionRulesToDelete */
        $decisionRulesToDelete = $this->getDecisionRules(new Criteria(), $con)->diff($decisionRules);


        $this->decisionRulesScheduledForDeletion = $decisionRulesToDelete;

        foreach ($decisionRulesToDelete as $decisionRuleRemoved) {
            $decisionRuleRemoved->setDiscount(null);
        }

        $this->collDecisionRules = null;
        foreach ($decisionRules as $decisionRule) {
            $this->addDecisionRule($decisionRule);
        }

        $this->collDecisionRules = $decisionRules;
        $this->collDecisionRulesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyDiscountDecisionRule objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyDiscountDecisionRule objects.
     * @throws PropelException
     */
    public function countDecisionRules(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDecisionRulesPartial && !$this->isNew();
        if (null === $this->collDecisionRules || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDecisionRules) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDecisionRules());
            }

            $query = ChildSpyDiscountDecisionRuleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDiscount($this)
                ->count($con);
        }

        return count($this->collDecisionRules);
    }

    /**
     * Method called to associate a ChildSpyDiscountDecisionRule object to this object
     * through the ChildSpyDiscountDecisionRule foreign key attribute.
     *
     * @param  ChildSpyDiscountDecisionRule $l ChildSpyDiscountDecisionRule
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function addDecisionRule(ChildSpyDiscountDecisionRule $l)
    {
        if ($this->collDecisionRules === null) {
            $this->initDecisionRules();
            $this->collDecisionRulesPartial = true;
        }

        if (!$this->collDecisionRules->contains($l)) {
            $this->doAddDecisionRule($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyDiscountDecisionRule $decisionRule The ChildSpyDiscountDecisionRule object to add.
     */
    protected function doAddDecisionRule(ChildSpyDiscountDecisionRule $decisionRule)
    {
        $this->collDecisionRules[]= $decisionRule;
        $decisionRule->setDiscount($this);
    }

    /**
     * @param  ChildSpyDiscountDecisionRule $decisionRule The ChildSpyDiscountDecisionRule object to remove.
     * @return $this|ChildSpyDiscount The current object (for fluent API support)
     */
    public function removeDecisionRule(ChildSpyDiscountDecisionRule $decisionRule)
    {
        if ($this->getDecisionRules()->contains($decisionRule)) {
            $pos = $this->collDecisionRules->search($decisionRule);
            $this->collDecisionRules->remove($pos);
            if (null === $this->decisionRulesScheduledForDeletion) {
                $this->decisionRulesScheduledForDeletion = clone $this->collDecisionRules;
                $this->decisionRulesScheduledForDeletion->clear();
            }
            $this->decisionRulesScheduledForDeletion[]= $decisionRule;
            $decisionRule->setDiscount(null);
        }

        return $this;
    }

    /**
     * Clears out the collDiscountCollectors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDiscountCollectors()
     */
    public function clearDiscountCollectors()
    {
        $this->collDiscountCollectors = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDiscountCollectors collection loaded partially.
     */
    public function resetPartialDiscountCollectors($v = true)
    {
        $this->collDiscountCollectorsPartial = $v;
    }

    /**
     * Initializes the collDiscountCollectors collection.
     *
     * By default this just sets the collDiscountCollectors collection to an empty array (like clearcollDiscountCollectors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiscountCollectors($overrideExisting = true)
    {
        if (null !== $this->collDiscountCollectors && !$overrideExisting) {
            return;
        }
        $this->collDiscountCollectors = new ObjectCollection();
        $this->collDiscountCollectors->setModel('\Propel\SpyDiscountCollector');
    }

    /**
     * Gets an array of ChildSpyDiscountCollector objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyDiscount is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyDiscountCollector[] List of ChildSpyDiscountCollector objects
     * @throws PropelException
     */
    public function getDiscountCollectors(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountCollectorsPartial && !$this->isNew();
        if (null === $this->collDiscountCollectors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiscountCollectors) {
                // return empty collection
                $this->initDiscountCollectors();
            } else {
                $collDiscountCollectors = ChildSpyDiscountCollectorQuery::create(null, $criteria)
                    ->filterByDiscount($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDiscountCollectorsPartial && count($collDiscountCollectors)) {
                        $this->initDiscountCollectors(false);

                        foreach ($collDiscountCollectors as $obj) {
                            if (false == $this->collDiscountCollectors->contains($obj)) {
                                $this->collDiscountCollectors->append($obj);
                            }
                        }

                        $this->collDiscountCollectorsPartial = true;
                    }

                    return $collDiscountCollectors;
                }

                if ($partial && $this->collDiscountCollectors) {
                    foreach ($this->collDiscountCollectors as $obj) {
                        if ($obj->isNew()) {
                            $collDiscountCollectors[] = $obj;
                        }
                    }
                }

                $this->collDiscountCollectors = $collDiscountCollectors;
                $this->collDiscountCollectorsPartial = false;
            }
        }

        return $this->collDiscountCollectors;
    }

    /**
     * Sets a collection of ChildSpyDiscountCollector objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $discountCollectors A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyDiscount The current object (for fluent API support)
     */
    public function setDiscountCollectors(Collection $discountCollectors, ConnectionInterface $con = null)
    {
        /** @var ChildSpyDiscountCollector[] $discountCollectorsToDelete */
        $discountCollectorsToDelete = $this->getDiscountCollectors(new Criteria(), $con)->diff($discountCollectors);


        $this->discountCollectorsScheduledForDeletion = $discountCollectorsToDelete;

        foreach ($discountCollectorsToDelete as $discountCollectorRemoved) {
            $discountCollectorRemoved->setDiscount(null);
        }

        $this->collDiscountCollectors = null;
        foreach ($discountCollectors as $discountCollector) {
            $this->addDiscountCollector($discountCollector);
        }

        $this->collDiscountCollectors = $discountCollectors;
        $this->collDiscountCollectorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyDiscountCollector objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyDiscountCollector objects.
     * @throws PropelException
     */
    public function countDiscountCollectors(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDiscountCollectorsPartial && !$this->isNew();
        if (null === $this->collDiscountCollectors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscountCollectors) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiscountCollectors());
            }

            $query = ChildSpyDiscountCollectorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDiscount($this)
                ->count($con);
        }

        return count($this->collDiscountCollectors);
    }

    /**
     * Method called to associate a ChildSpyDiscountCollector object to this object
     * through the ChildSpyDiscountCollector foreign key attribute.
     *
     * @param  ChildSpyDiscountCollector $l ChildSpyDiscountCollector
     * @return $this|\Propel\SpyDiscount The current object (for fluent API support)
     */
    public function addDiscountCollector(ChildSpyDiscountCollector $l)
    {
        if ($this->collDiscountCollectors === null) {
            $this->initDiscountCollectors();
            $this->collDiscountCollectorsPartial = true;
        }

        if (!$this->collDiscountCollectors->contains($l)) {
            $this->doAddDiscountCollector($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyDiscountCollector $discountCollector The ChildSpyDiscountCollector object to add.
     */
    protected function doAddDiscountCollector(ChildSpyDiscountCollector $discountCollector)
    {
        $this->collDiscountCollectors[]= $discountCollector;
        $discountCollector->setDiscount($this);
    }

    /**
     * @param  ChildSpyDiscountCollector $discountCollector The ChildSpyDiscountCollector object to remove.
     * @return $this|ChildSpyDiscount The current object (for fluent API support)
     */
    public function removeDiscountCollector(ChildSpyDiscountCollector $discountCollector)
    {
        if ($this->getDiscountCollectors()->contains($discountCollector)) {
            $pos = $this->collDiscountCollectors->search($discountCollector);
            $this->collDiscountCollectors->remove($pos);
            if (null === $this->discountCollectorsScheduledForDeletion) {
                $this->discountCollectorsScheduledForDeletion = clone $this->collDiscountCollectors;
                $this->discountCollectorsScheduledForDeletion->clear();
            }
            $this->discountCollectorsScheduledForDeletion[]= clone $discountCollector;
            $discountCollector->setDiscount(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aVoucherPool) {
            $this->aVoucherPool->removeDiscount($this);
        }
        $this->id_discount = null;
        $this->fk_discount_voucher_pool = null;
        $this->display_name = null;
        $this->description = null;
        $this->amount = null;
        $this->type = null;
        $this->calculator_plugin = null;
        $this->is_privileged = null;
        $this->is_active = null;
        $this->valid_from = null;
        $this->valid_to = null;
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
            if ($this->collDecisionRules) {
                foreach ($this->collDecisionRules as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDiscountCollectors) {
                foreach ($this->collDiscountCollectors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collDecisionRules = null;
        $this->collDiscountCollectors = null;
        $this->aVoucherPool = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyDiscountTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyDiscount The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyDiscountTableMap::COL_UPDATED_AT] = true;

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
