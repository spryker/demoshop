<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyCountry as ChildSpyCountry;
use Propel\SpyCountryQuery as ChildSpyCountryQuery;
use Propel\SpyRegion as ChildSpyRegion;
use Propel\SpyRegionQuery as ChildSpyRegionQuery;
use Propel\SpySalesOrderAddress as ChildSpySalesOrderAddress;
use Propel\SpySalesOrderAddressHistory as ChildSpySalesOrderAddressHistory;
use Propel\SpySalesOrderAddressHistoryQuery as ChildSpySalesOrderAddressHistoryQuery;
use Propel\SpySalesOrderAddressQuery as ChildSpySalesOrderAddressQuery;
use Propel\Map\SpySalesOrderAddressHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'spy_sales_order_address_history' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySalesOrderAddressHistory extends SpySalesOrderAddressHistory implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySalesOrderAddressHistoryTableMap';


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
     * The value for the id_sales_order_address_history field.
     * @var        int
     */
    protected $id_sales_order_address_history;

    /**
     * The value for the fk_country field.
     * @var        int
     */
    protected $fk_country;

    /**
     * The value for the fk_region field.
     * @var        int
     */
    protected $fk_region;

    /**
     * The value for the fk_sales_order_address field.
     * @var        int
     */
    protected $fk_sales_order_address;

    /**
     * The value for the is_billing field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_billing;

    /**
     * The value for the salutation field.
     * @var        int
     */
    protected $salutation;

    /**
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the middle_name field.
     * @var        string
     */
    protected $middle_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the address1 field.
     * @var        string
     */
    protected $address1;

    /**
     * The value for the address2 field.
     * @var        string
     */
    protected $address2;

    /**
     * The value for the address3 field.
     * @var        string
     */
    protected $address3;

    /**
     * The value for the company field.
     * @var        string
     */
    protected $company;

    /**
     * The value for the city field.
     * @var        string
     */
    protected $city;

    /**
     * The value for the zip_code field.
     * @var        string
     */
    protected $zip_code;

    /**
     * The value for the po_box field.
     * @var        string
     */
    protected $po_box;

    /**
     * The value for the phone field.
     * @var        string
     */
    protected $phone;

    /**
     * The value for the cell_phone field.
     * @var        string
     */
    protected $cell_phone;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

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
     * @var        ChildSpyCountry
     */
    protected $aCountry;

    /**
     * @var        ChildSpySalesOrderAddress
     */
    protected $aSalesOrderAddress;

    /**
     * @var        ChildSpyRegion
     */
    protected $aRegion;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_billing = false;
    }

    /**
     * Initializes internal state of Propel\Base\SpySalesOrderAddressHistory object.
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
     * Compares this with another <code>SpySalesOrderAddressHistory</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySalesOrderAddressHistory</code>, delegates to
     * <code>equals(SpySalesOrderAddressHistory)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpySalesOrderAddressHistory The current object, for fluid interface
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
     * Get the [id_sales_order_address_history] column value.
     *
     * @return int
     */
    public function getIdSalesOrderAddressHistory()
    {
        return $this->id_sales_order_address_history;
    }

    /**
     * Get the [fk_country] column value.
     *
     * @return int
     */
    public function getFkCountry()
    {
        return $this->fk_country;
    }

    /**
     * Get the [fk_region] column value.
     *
     * @return int
     */
    public function getFkRegion()
    {
        return $this->fk_region;
    }

    /**
     * Get the [fk_sales_order_address] column value.
     *
     * @return int
     */
    public function getFkSalesOrderAddress()
    {
        return $this->fk_sales_order_address;
    }

    /**
     * Get the [is_billing] column value.
     *
     * @return boolean
     */
    public function getIsBilling()
    {
        return $this->is_billing;
    }

    /**
     * Get the [is_billing] column value.
     *
     * @return boolean
     */
    public function isBilling()
    {
        return $this->getIsBilling();
    }

    /**
     * Get the [salutation] column value.
     *
     * @return string
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getSalutation()
    {
        if (null === $this->salutation) {
            return null;
        }
        $valueSet = SpySalesOrderAddressHistoryTableMap::getValueSet(SpySalesOrderAddressHistoryTableMap::COL_SALUTATION);
        if (!isset($valueSet[$this->salutation])) {
            throw new PropelException('Unknown stored enum key: ' . $this->salutation);
        }

        return $valueSet[$this->salutation];
    }

    /**
     * Get the [first_name] column value.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the [middle_name] column value.
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the [address1] column value.
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Get the [address2] column value.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Get the [address3] column value.
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Get the [company] column value.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get the [city] column value.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the [zip_code] column value.
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * Get the [po_box] column value.
     *
     * @return string
     */
    public function getPoBox()
    {
        return $this->po_box;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [cell_phone] column value.
     *
     * @return string
     */
    public function getCellPhone()
    {
        return $this->cell_phone;
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
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Set the value of [id_sales_order_address_history] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setIdSalesOrderAddressHistory($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_address_history !== $v) {
            $this->id_sales_order_address_history = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY] = true;
        }

        return $this;
    } // setIdSalesOrderAddressHistory()

    /**
     * Set the value of [fk_country] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setFkCountry($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_country !== $v) {
            $this->fk_country = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_FK_COUNTRY] = true;
        }

        if ($this->aCountry !== null && $this->aCountry->getIdCountry() !== $v) {
            $this->aCountry = null;
        }

        return $this;
    } // setFkCountry()

    /**
     * Set the value of [fk_region] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setFkRegion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_region !== $v) {
            $this->fk_region = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_FK_REGION] = true;
        }

        if ($this->aRegion !== null && $this->aRegion->getIdRegion() !== $v) {
            $this->aRegion = null;
        }

        return $this;
    } // setFkRegion()

    /**
     * Set the value of [fk_sales_order_address] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setFkSalesOrderAddress($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_address !== $v) {
            $this->fk_sales_order_address = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_FK_SALES_ORDER_ADDRESS] = true;
        }

        if ($this->aSalesOrderAddress !== null && $this->aSalesOrderAddress->getIdSalesOrderAddress() !== $v) {
            $this->aSalesOrderAddress = null;
        }

        return $this;
    } // setFkSalesOrderAddress()

    /**
     * Sets the value of the [is_billing] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setIsBilling($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_billing !== $v) {
            $this->is_billing = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_IS_BILLING] = true;
        }

        return $this;
    } // setIsBilling()

    /**
     * Set the value of [salutation] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = SpySalesOrderAddressHistoryTableMap::getValueSet(SpySalesOrderAddressHistoryTableMap::COL_SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_SALUTATION] = true;
        }

        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_MIDDLE_NAME] = true;
        }

        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [address1] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_ADDRESS1] = true;
        }

        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_ADDRESS2] = true;
        }

        return $this;
    } // setAddress2()

    /**
     * Set the value of [address3] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setAddress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address3 !== $v) {
            $this->address3 = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_ADDRESS3] = true;
        }

        return $this;
    } // setAddress3()

    /**
     * Set the value of [company] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_COMPANY] = true;
        }

        return $this;
    } // setCompany()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [zip_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_ZIP_CODE] = true;
        }

        return $this;
    } // setZipCode()

    /**
     * Set the value of [po_box] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setPoBox($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->po_box !== $v) {
            $this->po_box = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_PO_BOX] = true;
        }

        return $this;
    } // setPoBox()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [cell_phone] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCellPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cell_phone !== $v) {
            $this->cell_phone = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_CELL_PHONE] = true;
        }

        return $this;
    } // setCellPhone()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT] = true;
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
            if ($this->is_billing !== false) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('IdSalesOrderAddressHistory', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sales_order_address_history = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('FkCountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_country = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('FkRegion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_region = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('FkSalesOrderAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order_address = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('IsBilling', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_billing = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Salutation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salutation = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('MiddleName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->middle_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Address1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Address2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Address3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Company', TableMap::TYPE_PHPNAME, $indexType)];
            $this->company = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('ZipCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('PoBox', TableMap::TYPE_PHPNAME, $indexType)];
            $this->po_box = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('CellPhone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cell_phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : SpySalesOrderAddressHistoryTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 23; // 23 = SpySalesOrderAddressHistoryTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySalesOrderAddressHistory'), 0, $e);
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
        if ($this->aCountry !== null && $this->fk_country !== $this->aCountry->getIdCountry()) {
            $this->aCountry = null;
        }
        if ($this->aRegion !== null && $this->fk_region !== $this->aRegion->getIdRegion()) {
            $this->aRegion = null;
        }
        if ($this->aSalesOrderAddress !== null && $this->fk_sales_order_address !== $this->aSalesOrderAddress->getIdSalesOrderAddress()) {
            $this->aSalesOrderAddress = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySalesOrderAddressHistoryQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCountry = null;
            $this->aSalesOrderAddress = null;
            $this->aRegion = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySalesOrderAddressHistory::setDeleted()
     * @see SpySalesOrderAddressHistory::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySalesOrderAddressHistoryQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT)) {
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
                SpySalesOrderAddressHistoryTableMap::addInstanceToPool($this);
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

            if ($this->aCountry !== null) {
                if ($this->aCountry->isModified() || $this->aCountry->isNew()) {
                    $affectedRows += $this->aCountry->save($con);
                }
                $this->setCountry($this->aCountry);
            }

            if ($this->aSalesOrderAddress !== null) {
                if ($this->aSalesOrderAddress->isModified() || $this->aSalesOrderAddress->isNew()) {
                    $affectedRows += $this->aSalesOrderAddress->save($con);
                }
                $this->setSalesOrderAddress($this->aSalesOrderAddress);
            }

            if ($this->aRegion !== null) {
                if ($this->aRegion->isModified() || $this->aRegion->isNew()) {
                    $affectedRows += $this->aRegion->save($con);
                }
                $this->setRegion($this->aRegion);
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

        $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY] = true;
        if (null !== $this->id_sales_order_address_history) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY)) {
            $modifiedColumns[':p' . $index++]  = 'id_sales_order_address_history';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FK_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'fk_country';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FK_REGION)) {
            $modifiedColumns[':p' . $index++]  = 'fk_region';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FK_SALES_ORDER_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order_address';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_IS_BILLING)) {
            $modifiedColumns[':p' . $index++]  = 'is_billing';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = 'salutation';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'middle_name';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = 'address1';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'address2';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'address3';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = 'company';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'city';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'zip_code';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_PO_BOX)) {
            $modifiedColumns[':p' . $index++]  = 'po_box';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_CELL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'cell_phone';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_sales_order_address_history (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_sales_order_address_history':
                        $stmt->bindValue($identifier, $this->id_sales_order_address_history, PDO::PARAM_INT);
                        break;
                    case 'fk_country':
                        $stmt->bindValue($identifier, $this->fk_country, PDO::PARAM_INT);
                        break;
                    case 'fk_region':
                        $stmt->bindValue($identifier, $this->fk_region, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order_address':
                        $stmt->bindValue($identifier, $this->fk_sales_order_address, PDO::PARAM_INT);
                        break;
                    case 'is_billing':
                        $stmt->bindValue($identifier, (int) $this->is_billing, PDO::PARAM_INT);
                        break;
                    case 'salutation':
                        $stmt->bindValue($identifier, $this->salutation, PDO::PARAM_INT);
                        break;
                    case 'first_name':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'middle_name':
                        $stmt->bindValue($identifier, $this->middle_name, PDO::PARAM_STR);
                        break;
                    case 'last_name':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'address1':
                        $stmt->bindValue($identifier, $this->address1, PDO::PARAM_STR);
                        break;
                    case 'address2':
                        $stmt->bindValue($identifier, $this->address2, PDO::PARAM_STR);
                        break;
                    case 'address3':
                        $stmt->bindValue($identifier, $this->address3, PDO::PARAM_STR);
                        break;
                    case 'company':
                        $stmt->bindValue($identifier, $this->company, PDO::PARAM_STR);
                        break;
                    case 'city':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'zip_code':
                        $stmt->bindValue($identifier, $this->zip_code, PDO::PARAM_STR);
                        break;
                    case 'po_box':
                        $stmt->bindValue($identifier, $this->po_box, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'cell_phone':
                        $stmt->bindValue($identifier, $this->cell_phone, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
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
            $pk = $con->lastInsertId('spy_sales_order_address_history_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSalesOrderAddressHistory($pk);

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
        $pos = SpySalesOrderAddressHistoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSalesOrderAddressHistory();
                break;
            case 1:
                return $this->getFkCountry();
                break;
            case 2:
                return $this->getFkRegion();
                break;
            case 3:
                return $this->getFkSalesOrderAddress();
                break;
            case 4:
                return $this->getIsBilling();
                break;
            case 5:
                return $this->getSalutation();
                break;
            case 6:
                return $this->getFirstName();
                break;
            case 7:
                return $this->getMiddleName();
                break;
            case 8:
                return $this->getLastName();
                break;
            case 9:
                return $this->getAddress1();
                break;
            case 10:
                return $this->getAddress2();
                break;
            case 11:
                return $this->getAddress3();
                break;
            case 12:
                return $this->getCompany();
                break;
            case 13:
                return $this->getCity();
                break;
            case 14:
                return $this->getZipCode();
                break;
            case 15:
                return $this->getPoBox();
                break;
            case 16:
                return $this->getPhone();
                break;
            case 17:
                return $this->getCellPhone();
                break;
            case 18:
                return $this->getDescription();
                break;
            case 19:
                return $this->getComment();
                break;
            case 20:
                return $this->getEmail();
                break;
            case 21:
                return $this->getCreatedAt();
                break;
            case 22:
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

        if (isset($alreadyDumpedObjects['SpySalesOrderAddressHistory'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySalesOrderAddressHistory'][$this->hashCode()] = true;
        $keys = SpySalesOrderAddressHistoryTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrderAddressHistory(),
            $keys[1] => $this->getFkCountry(),
            $keys[2] => $this->getFkRegion(),
            $keys[3] => $this->getFkSalesOrderAddress(),
            $keys[4] => $this->getIsBilling(),
            $keys[5] => $this->getSalutation(),
            $keys[6] => $this->getFirstName(),
            $keys[7] => $this->getMiddleName(),
            $keys[8] => $this->getLastName(),
            $keys[9] => $this->getAddress1(),
            $keys[10] => $this->getAddress2(),
            $keys[11] => $this->getAddress3(),
            $keys[12] => $this->getCompany(),
            $keys[13] => $this->getCity(),
            $keys[14] => $this->getZipCode(),
            $keys[15] => $this->getPoBox(),
            $keys[16] => $this->getPhone(),
            $keys[17] => $this->getCellPhone(),
            $keys[18] => $this->getDescription(),
            $keys[19] => $this->getComment(),
            $keys[20] => $this->getEmail(),
            $keys[21] => $this->getCreatedAt(),
            $keys[22] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[21]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[21]];
            $result[$keys[21]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[22]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[22]];
            $result[$keys[22]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCountry) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCountry';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_country';
                        break;
                    default:
                        $key = 'SpyCountry';
                }

                $result[$key] = $this->aCountry->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSalesOrderAddress) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderAddress';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_address';
                        break;
                    default:
                        $key = 'SpySalesOrderAddress';
                }

                $result[$key] = $this->aSalesOrderAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRegion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyRegion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_region';
                        break;
                    default:
                        $key = 'SpyRegion';
                }

                $result[$key] = $this->aRegion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Propel\SpySalesOrderAddressHistory
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySalesOrderAddressHistoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySalesOrderAddressHistory
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdSalesOrderAddressHistory($value);
                break;
            case 1:
                $this->setFkCountry($value);
                break;
            case 2:
                $this->setFkRegion($value);
                break;
            case 3:
                $this->setFkSalesOrderAddress($value);
                break;
            case 4:
                $this->setIsBilling($value);
                break;
            case 5:
                $valueSet = SpySalesOrderAddressHistoryTableMap::getValueSet(SpySalesOrderAddressHistoryTableMap::COL_SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 6:
                $this->setFirstName($value);
                break;
            case 7:
                $this->setMiddleName($value);
                break;
            case 8:
                $this->setLastName($value);
                break;
            case 9:
                $this->setAddress1($value);
                break;
            case 10:
                $this->setAddress2($value);
                break;
            case 11:
                $this->setAddress3($value);
                break;
            case 12:
                $this->setCompany($value);
                break;
            case 13:
                $this->setCity($value);
                break;
            case 14:
                $this->setZipCode($value);
                break;
            case 15:
                $this->setPoBox($value);
                break;
            case 16:
                $this->setPhone($value);
                break;
            case 17:
                $this->setCellPhone($value);
                break;
            case 18:
                $this->setDescription($value);
                break;
            case 19:
                $this->setComment($value);
                break;
            case 20:
                $this->setEmail($value);
                break;
            case 21:
                $this->setCreatedAt($value);
                break;
            case 22:
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
        $keys = SpySalesOrderAddressHistoryTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdSalesOrderAddressHistory($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkCountry($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkRegion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkSalesOrderAddress($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIsBilling($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSalutation($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFirstName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setMiddleName($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setLastName($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAddress1($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setAddress2($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAddress3($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCompany($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCity($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setZipCode($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPoBox($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPhone($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCellPhone($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDescription($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setComment($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setEmail($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setCreatedAt($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setUpdatedAt($arr[$keys[22]]);
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
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object, for fluid interface
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
        $criteria = new Criteria(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY, $this->id_sales_order_address_history);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FK_COUNTRY)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_FK_COUNTRY, $this->fk_country);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FK_REGION)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_FK_REGION, $this->fk_region);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FK_SALES_ORDER_ADDRESS)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_FK_SALES_ORDER_ADDRESS, $this->fk_sales_order_address);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_IS_BILLING)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_IS_BILLING, $this->is_billing);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_SALUTATION)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_SALUTATION, $this->salutation);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_FIRST_NAME)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_MIDDLE_NAME)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_MIDDLE_NAME, $this->middle_name);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_LAST_NAME)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS1)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS1, $this->address1);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS2)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS2, $this->address2);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS3)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS3, $this->address3);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_COMPANY)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_COMPANY, $this->company);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_CITY)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_ZIP_CODE)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_ZIP_CODE, $this->zip_code);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_PO_BOX)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_PO_BOX, $this->po_box);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_PHONE)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_CELL_PHONE)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_CELL_PHONE, $this->cell_phone);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_DESCRIPTION)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_COMMENT)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_EMAIL)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpySalesOrderAddressHistoryQuery::create();
        $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY, $this->id_sales_order_address_history);

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
        $validPk = null !== $this->getIdSalesOrderAddressHistory();

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
        return $this->getIdSalesOrderAddressHistory();
    }

    /**
     * Generic method to set the primary key (id_sales_order_address_history column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesOrderAddressHistory($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdSalesOrderAddressHistory();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpySalesOrderAddressHistory (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCountry($this->getFkCountry());
        $copyObj->setFkRegion($this->getFkRegion());
        $copyObj->setFkSalesOrderAddress($this->getFkSalesOrderAddress());
        $copyObj->setIsBilling($this->getIsBilling());
        $copyObj->setSalutation($this->getSalutation());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setMiddleName($this->getMiddleName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setAddress1($this->getAddress1());
        $copyObj->setAddress2($this->getAddress2());
        $copyObj->setAddress3($this->getAddress3());
        $copyObj->setCompany($this->getCompany());
        $copyObj->setCity($this->getCity());
        $copyObj->setZipCode($this->getZipCode());
        $copyObj->setPoBox($this->getPoBox());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setCellPhone($this->getCellPhone());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setComment($this->getComment());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesOrderAddressHistory(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpySalesOrderAddressHistory Clone of current object.
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
     * Declares an association between this object and a ChildSpyCountry object.
     *
     * @param  ChildSpyCountry $v
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCountry(ChildSpyCountry $v = null)
    {
        if ($v === null) {
            $this->setFkCountry(NULL);
        } else {
            $this->setFkCountry($v->getIdCountry());
        }

        $this->aCountry = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCountry object, it will not be re-added.
        if ($v !== null) {
            $v->addSalesOrderAddressHistory($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCountry object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCountry The associated ChildSpyCountry object.
     * @throws PropelException
     */
    public function getCountry(ConnectionInterface $con = null)
    {
        if ($this->aCountry === null && ($this->fk_country !== null)) {
            $this->aCountry = ChildSpyCountryQuery::create()->findPk($this->fk_country, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCountry->addSalesOrderAddressHistories($this);
             */
        }

        return $this->aCountry;
    }

    /**
     * Declares an association between this object and a ChildSpySalesOrderAddress object.
     *
     * @param  ChildSpySalesOrderAddress $v
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSalesOrderAddress(ChildSpySalesOrderAddress $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderAddress(NULL);
        } else {
            $this->setFkSalesOrderAddress($v->getIdSalesOrderAddress());
        }

        $this->aSalesOrderAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrderAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addSalesOrderAddressHistory($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrderAddress object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrderAddress The associated ChildSpySalesOrderAddress object.
     * @throws PropelException
     */
    public function getSalesOrderAddress(ConnectionInterface $con = null)
    {
        if ($this->aSalesOrderAddress === null && ($this->fk_sales_order_address !== null)) {
            $this->aSalesOrderAddress = ChildSpySalesOrderAddressQuery::create()->findPk($this->fk_sales_order_address, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSalesOrderAddress->addSalesOrderAddressHistories($this);
             */
        }

        return $this->aSalesOrderAddress;
    }

    /**
     * Declares an association between this object and a ChildSpyRegion object.
     *
     * @param  ChildSpyRegion $v
     * @return $this|\Propel\SpySalesOrderAddressHistory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRegion(ChildSpyRegion $v = null)
    {
        if ($v === null) {
            $this->setFkRegion(NULL);
        } else {
            $this->setFkRegion($v->getIdRegion());
        }

        $this->aRegion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyRegion object, it will not be re-added.
        if ($v !== null) {
            $v->addSalesOrderAddressHistory($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyRegion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyRegion The associated ChildSpyRegion object.
     * @throws PropelException
     */
    public function getRegion(ConnectionInterface $con = null)
    {
        if ($this->aRegion === null && ($this->fk_region !== null)) {
            $this->aRegion = ChildSpyRegionQuery::create()->findPk($this->fk_region, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRegion->addSalesOrderAddressHistories($this);
             */
        }

        return $this->aRegion;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCountry) {
            $this->aCountry->removeSalesOrderAddressHistory($this);
        }
        if (null !== $this->aSalesOrderAddress) {
            $this->aSalesOrderAddress->removeSalesOrderAddressHistory($this);
        }
        if (null !== $this->aRegion) {
            $this->aRegion->removeSalesOrderAddressHistory($this);
        }
        $this->id_sales_order_address_history = null;
        $this->fk_country = null;
        $this->fk_region = null;
        $this->fk_sales_order_address = null;
        $this->is_billing = null;
        $this->salutation = null;
        $this->first_name = null;
        $this->middle_name = null;
        $this->last_name = null;
        $this->address1 = null;
        $this->address2 = null;
        $this->address3 = null;
        $this->company = null;
        $this->city = null;
        $this->zip_code = null;
        $this->po_box = null;
        $this->phone = null;
        $this->cell_phone = null;
        $this->description = null;
        $this->comment = null;
        $this->email = null;
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
        } // if ($deep)

        $this->aCountry = null;
        $this->aSalesOrderAddress = null;
        $this->aRegion = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySalesOrderAddressHistoryTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpySalesOrderAddressHistory The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT] = true;

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
