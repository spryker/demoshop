<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyCountry as ChildSpyCountry;
use Propel\SpyCountryQuery as ChildSpyCountryQuery;
use Propel\SpyRegion as ChildSpyRegion;
use Propel\SpyRegionQuery as ChildSpyRegionQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderAddress as ChildSpySalesOrderAddress;
use Propel\SpySalesOrderAddressHistory as ChildSpySalesOrderAddressHistory;
use Propel\SpySalesOrderAddressHistoryQuery as ChildSpySalesOrderAddressHistoryQuery;
use Propel\SpySalesOrderAddressQuery as ChildSpySalesOrderAddressQuery;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\Map\SpySalesOrderAddressTableMap;
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
 * Base class that represents a row from the 'spy_sales_order_address' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySalesOrderAddress extends SpySalesOrderAddress implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySalesOrderAddressTableMap';


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
     * The value for the id_sales_order_address field.
     * @var        int
     */
    protected $id_sales_order_address;

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
     * @var        ChildSpyRegion
     */
    protected $aRegion;

    /**
     * @var        ObjectCollection|ChildSpySalesOrder[] Collection to store aggregation of ChildSpySalesOrder objects.
     */
    protected $collSpySalesOrdersRelatedByFkSalesOrderAddressBilling;
    protected $collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrder[] Collection to store aggregation of ChildSpySalesOrder objects.
     */
    protected $collSpySalesOrdersRelatedByFkSalesOrderAddressShipping;
    protected $collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderAddressHistory[] Collection to store aggregation of ChildSpySalesOrderAddressHistory objects.
     */
    protected $collSalesOrderAddressHistories;
    protected $collSalesOrderAddressHistoriesPartial;

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
    protected $spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrder[]
     */
    protected $spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderAddressHistory[]
     */
    protected $salesOrderAddressHistoriesScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpySalesOrderAddress object.
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
     * Compares this with another <code>SpySalesOrderAddress</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySalesOrderAddress</code>, delegates to
     * <code>equals(SpySalesOrderAddress)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpySalesOrderAddress The current object, for fluid interface
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
     * Get the [id_sales_order_address] column value.
     *
     * @return int
     */
    public function getIdSalesOrderAddress()
    {
        return $this->id_sales_order_address;
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
        $valueSet = SpySalesOrderAddressTableMap::getValueSet(SpySalesOrderAddressTableMap::COL_SALUTATION);
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
     * Set the value of [id_sales_order_address] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setIdSalesOrderAddress($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_address !== $v) {
            $this->id_sales_order_address = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS] = true;
        }

        return $this;
    } // setIdSalesOrderAddress()

    /**
     * Set the value of [fk_country] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setFkCountry($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_country !== $v) {
            $this->fk_country = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_FK_COUNTRY] = true;
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
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setFkRegion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_region !== $v) {
            $this->fk_region = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_FK_REGION] = true;
        }

        if ($this->aRegion !== null && $this->aRegion->getIdRegion() !== $v) {
            $this->aRegion = null;
        }

        return $this;
    } // setFkRegion()

    /**
     * Set the value of [salutation] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = SpySalesOrderAddressTableMap::getValueSet(SpySalesOrderAddressTableMap::COL_SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_SALUTATION] = true;
        }

        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_MIDDLE_NAME] = true;
        }

        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [address1] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_ADDRESS1] = true;
        }

        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_ADDRESS2] = true;
        }

        return $this;
    } // setAddress2()

    /**
     * Set the value of [address3] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setAddress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address3 !== $v) {
            $this->address3 = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_ADDRESS3] = true;
        }

        return $this;
    } // setAddress3()

    /**
     * Set the value of [company] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_COMPANY] = true;
        }

        return $this;
    } // setCompany()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [zip_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_ZIP_CODE] = true;
        }

        return $this;
    } // setZipCode()

    /**
     * Set the value of [po_box] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setPoBox($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->po_box !== $v) {
            $this->po_box = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_PO_BOX] = true;
        }

        return $this;
    } // setPoBox()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [cell_phone] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setCellPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cell_phone !== $v) {
            $this->cell_phone = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_CELL_PHONE] = true;
        }

        return $this;
    } // setCellPhone()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('IdSalesOrderAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_sales_order_address = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('FkCountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_country = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('FkRegion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_region = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Salutation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salutation = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('MiddleName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->middle_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Address1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Address2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Address3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Company', TableMap::TYPE_PHPNAME, $indexType)];
            $this->company = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('ZipCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('PoBox', TableMap::TYPE_PHPNAME, $indexType)];
            $this->po_box = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('CellPhone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cell_phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : SpySalesOrderAddressTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = SpySalesOrderAddressTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySalesOrderAddress'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySalesOrderAddressQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCountry = null;
            $this->aRegion = null;
            $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = null;

            $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = null;

            $this->collSalesOrderAddressHistories = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySalesOrderAddress::setDeleted()
     * @see SpySalesOrderAddress::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySalesOrderAddressQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpySalesOrderAddressTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpySalesOrderAddressTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpySalesOrderAddressTableMap::COL_UPDATED_AT)) {
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
                SpySalesOrderAddressTableMap::addInstanceToPool($this);
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

            if ($this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion !== null) {
                if (!$this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderQuery::create()
                        ->filterByPrimaryKeys($this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = null;
                }
            }

            if ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling !== null) {
                foreach ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion !== null) {
                if (!$this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderQuery::create()
                        ->filterByPrimaryKeys($this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = null;
                }
            }

            if ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping !== null) {
                foreach ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesOrderAddressHistoriesScheduledForDeletion !== null) {
                if (!$this->salesOrderAddressHistoriesScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderAddressHistoryQuery::create()
                        ->filterByPrimaryKeys($this->salesOrderAddressHistoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->salesOrderAddressHistoriesScheduledForDeletion = null;
                }
            }

            if ($this->collSalesOrderAddressHistories !== null) {
                foreach ($this->collSalesOrderAddressHistories as $referrerFK) {
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

        $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS] = true;
        if (null !== $this->id_sales_order_address) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'id_sales_order_address';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_FK_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'fk_country';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_FK_REGION)) {
            $modifiedColumns[':p' . $index++]  = 'fk_region';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = 'salutation';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'middle_name';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = 'address1';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'address2';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'address3';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = 'company';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'city';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'zip_code';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_PO_BOX)) {
            $modifiedColumns[':p' . $index++]  = 'po_box';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_CELL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'cell_phone';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_sales_order_address (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_sales_order_address':
                        $stmt->bindValue($identifier, $this->id_sales_order_address, PDO::PARAM_INT);
                        break;
                    case 'fk_country':
                        $stmt->bindValue($identifier, $this->fk_country, PDO::PARAM_INT);
                        break;
                    case 'fk_region':
                        $stmt->bindValue($identifier, $this->fk_region, PDO::PARAM_INT);
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
            $pk = $con->lastInsertId('spy_sales_order_address_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSalesOrderAddress($pk);

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
        $pos = SpySalesOrderAddressTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSalesOrderAddress();
                break;
            case 1:
                return $this->getFkCountry();
                break;
            case 2:
                return $this->getFkRegion();
                break;
            case 3:
                return $this->getSalutation();
                break;
            case 4:
                return $this->getFirstName();
                break;
            case 5:
                return $this->getMiddleName();
                break;
            case 6:
                return $this->getLastName();
                break;
            case 7:
                return $this->getAddress1();
                break;
            case 8:
                return $this->getAddress2();
                break;
            case 9:
                return $this->getAddress3();
                break;
            case 10:
                return $this->getCompany();
                break;
            case 11:
                return $this->getCity();
                break;
            case 12:
                return $this->getZipCode();
                break;
            case 13:
                return $this->getPoBox();
                break;
            case 14:
                return $this->getPhone();
                break;
            case 15:
                return $this->getCellPhone();
                break;
            case 16:
                return $this->getDescription();
                break;
            case 17:
                return $this->getComment();
                break;
            case 18:
                return $this->getEmail();
                break;
            case 19:
                return $this->getCreatedAt();
                break;
            case 20:
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

        if (isset($alreadyDumpedObjects['SpySalesOrderAddress'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySalesOrderAddress'][$this->hashCode()] = true;
        $keys = SpySalesOrderAddressTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrderAddress(),
            $keys[1] => $this->getFkCountry(),
            $keys[2] => $this->getFkRegion(),
            $keys[3] => $this->getSalutation(),
            $keys[4] => $this->getFirstName(),
            $keys[5] => $this->getMiddleName(),
            $keys[6] => $this->getLastName(),
            $keys[7] => $this->getAddress1(),
            $keys[8] => $this->getAddress2(),
            $keys[9] => $this->getAddress3(),
            $keys[10] => $this->getCompany(),
            $keys[11] => $this->getCity(),
            $keys[12] => $this->getZipCode(),
            $keys[13] => $this->getPoBox(),
            $keys[14] => $this->getPhone(),
            $keys[15] => $this->getCellPhone(),
            $keys[16] => $this->getDescription(),
            $keys[17] => $this->getComment(),
            $keys[18] => $this->getEmail(),
            $keys[19] => $this->getCreatedAt(),
            $keys[20] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[19]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[19]];
            $result[$keys[19]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[20]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[20]];
            $result[$keys[20]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
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
            if (null !== $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling) {

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

                $result[$key] = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping) {

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

                $result[$key] = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderAddressHistories) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderAddressHistories';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_address_histories';
                        break;
                    default:
                        $key = 'SpySalesOrderAddressHistories';
                }

                $result[$key] = $this->collSalesOrderAddressHistories->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpySalesOrderAddress
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySalesOrderAddressTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySalesOrderAddress
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdSalesOrderAddress($value);
                break;
            case 1:
                $this->setFkCountry($value);
                break;
            case 2:
                $this->setFkRegion($value);
                break;
            case 3:
                $valueSet = SpySalesOrderAddressTableMap::getValueSet(SpySalesOrderAddressTableMap::COL_SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 4:
                $this->setFirstName($value);
                break;
            case 5:
                $this->setMiddleName($value);
                break;
            case 6:
                $this->setLastName($value);
                break;
            case 7:
                $this->setAddress1($value);
                break;
            case 8:
                $this->setAddress2($value);
                break;
            case 9:
                $this->setAddress3($value);
                break;
            case 10:
                $this->setCompany($value);
                break;
            case 11:
                $this->setCity($value);
                break;
            case 12:
                $this->setZipCode($value);
                break;
            case 13:
                $this->setPoBox($value);
                break;
            case 14:
                $this->setPhone($value);
                break;
            case 15:
                $this->setCellPhone($value);
                break;
            case 16:
                $this->setDescription($value);
                break;
            case 17:
                $this->setComment($value);
                break;
            case 18:
                $this->setEmail($value);
                break;
            case 19:
                $this->setCreatedAt($value);
                break;
            case 20:
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
        $keys = SpySalesOrderAddressTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdSalesOrderAddress($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkCountry($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkRegion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSalutation($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFirstName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMiddleName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLastName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAddress1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAddress2($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAddress3($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCompany($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCity($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setZipCode($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setPoBox($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPhone($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCellPhone($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDescription($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setComment($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setEmail($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setCreatedAt($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setUpdatedAt($arr[$keys[20]]);
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
     * @return $this|\Propel\SpySalesOrderAddress The current object, for fluid interface
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
        $criteria = new Criteria(SpySalesOrderAddressTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $this->id_sales_order_address);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_FK_COUNTRY)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_FK_COUNTRY, $this->fk_country);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_FK_REGION)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_FK_REGION, $this->fk_region);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_SALUTATION)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_SALUTATION, $this->salutation);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_FIRST_NAME)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_MIDDLE_NAME)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_MIDDLE_NAME, $this->middle_name);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_LAST_NAME)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ADDRESS1)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_ADDRESS1, $this->address1);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ADDRESS2)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_ADDRESS2, $this->address2);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ADDRESS3)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_ADDRESS3, $this->address3);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_COMPANY)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_COMPANY, $this->company);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_CITY)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_ZIP_CODE)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_ZIP_CODE, $this->zip_code);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_PO_BOX)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_PO_BOX, $this->po_box);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_PHONE)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_CELL_PHONE)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_CELL_PHONE, $this->cell_phone);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_DESCRIPTION)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_COMMENT)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_EMAIL)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_CREATED_AT)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpySalesOrderAddressTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpySalesOrderAddressTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpySalesOrderAddressQuery::create();
        $criteria->add(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $this->id_sales_order_address);

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
        $validPk = null !== $this->getIdSalesOrderAddress();

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
        return $this->getIdSalesOrderAddress();
    }

    /**
     * Generic method to set the primary key (id_sales_order_address column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesOrderAddress($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdSalesOrderAddress();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpySalesOrderAddress (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCountry($this->getFkCountry());
        $copyObj->setFkRegion($this->getFkRegion());
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

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpySalesOrdersRelatedByFkSalesOrderAddressBilling() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpySalesOrderRelatedByFkSalesOrderAddressBilling($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpySalesOrdersRelatedByFkSalesOrderAddressShipping() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpySalesOrderRelatedByFkSalesOrderAddressShipping($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesOrderAddressHistories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderAddressHistory($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesOrderAddress(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpySalesOrderAddress Clone of current object.
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
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
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
            $v->addSalesOrderAddress($this);
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
                $this->aCountry->addSalesOrderAddresses($this);
             */
        }

        return $this->aCountry;
    }

    /**
     * Declares an association between this object and a ChildSpyRegion object.
     *
     * @param  ChildSpyRegion $v
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
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
            $v->addSalesOrderAddress($this);
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
                $this->aRegion->addSalesOrderAddresses($this);
             */
        }

        return $this->aRegion;
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
        if ('SpySalesOrderRelatedByFkSalesOrderAddressBilling' == $relationName) {
            return $this->initSpySalesOrdersRelatedByFkSalesOrderAddressBilling();
        }
        if ('SpySalesOrderRelatedByFkSalesOrderAddressShipping' == $relationName) {
            return $this->initSpySalesOrdersRelatedByFkSalesOrderAddressShipping();
        }
        if ('SalesOrderAddressHistory' == $relationName) {
            return $this->initSalesOrderAddressHistories();
        }
    }

    /**
     * Clears out the collSpySalesOrdersRelatedByFkSalesOrderAddressBilling collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpySalesOrdersRelatedByFkSalesOrderAddressBilling()
     */
    public function clearSpySalesOrdersRelatedByFkSalesOrderAddressBilling()
    {
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpySalesOrdersRelatedByFkSalesOrderAddressBilling collection loaded partially.
     */
    public function resetPartialSpySalesOrdersRelatedByFkSalesOrderAddressBilling($v = true)
    {
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial = $v;
    }

    /**
     * Initializes the collSpySalesOrdersRelatedByFkSalesOrderAddressBilling collection.
     *
     * By default this just sets the collSpySalesOrdersRelatedByFkSalesOrderAddressBilling collection to an empty array (like clearcollSpySalesOrdersRelatedByFkSalesOrderAddressBilling());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpySalesOrdersRelatedByFkSalesOrderAddressBilling($overrideExisting = true)
    {
        if (null !== $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling && !$overrideExisting) {
            return;
        }
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = new ObjectCollection();
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling->setModel('\Propel\SpySalesOrder');
    }

    /**
     * Gets an array of ChildSpySalesOrder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderAddress is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     * @throws PropelException
     */
    public function getSpySalesOrdersRelatedByFkSalesOrderAddressBilling(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial && !$this->isNew();
        if (null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling) {
                // return empty collection
                $this->initSpySalesOrdersRelatedByFkSalesOrderAddressBilling();
            } else {
                $collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = ChildSpySalesOrderQuery::create(null, $criteria)
                    ->filterByBillingAddress($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial && count($collSpySalesOrdersRelatedByFkSalesOrderAddressBilling)) {
                        $this->initSpySalesOrdersRelatedByFkSalesOrderAddressBilling(false);

                        foreach ($collSpySalesOrdersRelatedByFkSalesOrderAddressBilling as $obj) {
                            if (false == $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling->contains($obj)) {
                                $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling->append($obj);
                            }
                        }

                        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial = true;
                    }

                    return $collSpySalesOrdersRelatedByFkSalesOrderAddressBilling;
                }

                if ($partial && $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling) {
                    foreach ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling as $obj) {
                        if ($obj->isNew()) {
                            $collSpySalesOrdersRelatedByFkSalesOrderAddressBilling[] = $obj;
                        }
                    }
                }

                $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = $collSpySalesOrdersRelatedByFkSalesOrderAddressBilling;
                $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial = false;
            }
        }

        return $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling;
    }

    /**
     * Sets a collection of ChildSpySalesOrder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spySalesOrdersRelatedByFkSalesOrderAddressBilling A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderAddress The current object (for fluent API support)
     */
    public function setSpySalesOrdersRelatedByFkSalesOrderAddressBilling(Collection $spySalesOrdersRelatedByFkSalesOrderAddressBilling, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrder[] $spySalesOrdersRelatedByFkSalesOrderAddressBillingToDelete */
        $spySalesOrdersRelatedByFkSalesOrderAddressBillingToDelete = $this->getSpySalesOrdersRelatedByFkSalesOrderAddressBilling(new Criteria(), $con)->diff($spySalesOrdersRelatedByFkSalesOrderAddressBilling);


        $this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = $spySalesOrdersRelatedByFkSalesOrderAddressBillingToDelete;

        foreach ($spySalesOrdersRelatedByFkSalesOrderAddressBillingToDelete as $spySalesOrderRelatedByFkSalesOrderAddressBillingRemoved) {
            $spySalesOrderRelatedByFkSalesOrderAddressBillingRemoved->setBillingAddress(null);
        }

        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = null;
        foreach ($spySalesOrdersRelatedByFkSalesOrderAddressBilling as $spySalesOrderRelatedByFkSalesOrderAddressBilling) {
            $this->addSpySalesOrderRelatedByFkSalesOrderAddressBilling($spySalesOrderRelatedByFkSalesOrderAddressBilling);
        }

        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = $spySalesOrdersRelatedByFkSalesOrderAddressBilling;
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial = false;

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
    public function countSpySalesOrdersRelatedByFkSalesOrderAddressBilling(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial && !$this->isNew();
        if (null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpySalesOrdersRelatedByFkSalesOrderAddressBilling());
            }

            $query = ChildSpySalesOrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBillingAddress($this)
                ->count($con);
        }

        return count($this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling);
    }

    /**
     * Method called to associate a ChildSpySalesOrder object to this object
     * through the ChildSpySalesOrder foreign key attribute.
     *
     * @param  ChildSpySalesOrder $l ChildSpySalesOrder
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function addSpySalesOrderRelatedByFkSalesOrderAddressBilling(ChildSpySalesOrder $l)
    {
        if ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling === null) {
            $this->initSpySalesOrdersRelatedByFkSalesOrderAddressBilling();
            $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBillingPartial = true;
        }

        if (!$this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling->contains($l)) {
            $this->doAddSpySalesOrderRelatedByFkSalesOrderAddressBilling($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressBilling The ChildSpySalesOrder object to add.
     */
    protected function doAddSpySalesOrderRelatedByFkSalesOrderAddressBilling(ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressBilling)
    {
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling[]= $spySalesOrderRelatedByFkSalesOrderAddressBilling;
        $spySalesOrderRelatedByFkSalesOrderAddressBilling->setBillingAddress($this);
    }

    /**
     * @param  ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressBilling The ChildSpySalesOrder object to remove.
     * @return $this|ChildSpySalesOrderAddress The current object (for fluent API support)
     */
    public function removeSpySalesOrderRelatedByFkSalesOrderAddressBilling(ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressBilling)
    {
        if ($this->getSpySalesOrdersRelatedByFkSalesOrderAddressBilling()->contains($spySalesOrderRelatedByFkSalesOrderAddressBilling)) {
            $pos = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling->search($spySalesOrderRelatedByFkSalesOrderAddressBilling);
            $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling->remove($pos);
            if (null === $this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion) {
                $this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = clone $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling;
                $this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion->clear();
            }
            $this->spySalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion[]= clone $spySalesOrderRelatedByFkSalesOrderAddressBilling;
            $spySalesOrderRelatedByFkSalesOrderAddressBilling->setBillingAddress(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderAddress is new, it will return
     * an empty collection; or if this SpySalesOrderAddress has previously
     * been saved, it will retrieve related SpySalesOrdersRelatedByFkSalesOrderAddressBilling from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderAddress.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getSpySalesOrdersRelatedByFkSalesOrderAddressBillingJoinCustomer(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('Customer', $joinBehavior);

        return $this->getSpySalesOrdersRelatedByFkSalesOrderAddressBilling($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderAddress is new, it will return
     * an empty collection; or if this SpySalesOrderAddress has previously
     * been saved, it will retrieve related SpySalesOrdersRelatedByFkSalesOrderAddressBilling from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderAddress.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getSpySalesOrdersRelatedByFkSalesOrderAddressBillingJoinShipmentMethod(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('ShipmentMethod', $joinBehavior);

        return $this->getSpySalesOrdersRelatedByFkSalesOrderAddressBilling($query, $con);
    }

    /**
     * Clears out the collSpySalesOrdersRelatedByFkSalesOrderAddressShipping collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpySalesOrdersRelatedByFkSalesOrderAddressShipping()
     */
    public function clearSpySalesOrdersRelatedByFkSalesOrderAddressShipping()
    {
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpySalesOrdersRelatedByFkSalesOrderAddressShipping collection loaded partially.
     */
    public function resetPartialSpySalesOrdersRelatedByFkSalesOrderAddressShipping($v = true)
    {
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial = $v;
    }

    /**
     * Initializes the collSpySalesOrdersRelatedByFkSalesOrderAddressShipping collection.
     *
     * By default this just sets the collSpySalesOrdersRelatedByFkSalesOrderAddressShipping collection to an empty array (like clearcollSpySalesOrdersRelatedByFkSalesOrderAddressShipping());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpySalesOrdersRelatedByFkSalesOrderAddressShipping($overrideExisting = true)
    {
        if (null !== $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping && !$overrideExisting) {
            return;
        }
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = new ObjectCollection();
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping->setModel('\Propel\SpySalesOrder');
    }

    /**
     * Gets an array of ChildSpySalesOrder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderAddress is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     * @throws PropelException
     */
    public function getSpySalesOrdersRelatedByFkSalesOrderAddressShipping(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial && !$this->isNew();
        if (null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping) {
                // return empty collection
                $this->initSpySalesOrdersRelatedByFkSalesOrderAddressShipping();
            } else {
                $collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = ChildSpySalesOrderQuery::create(null, $criteria)
                    ->filterByShippingAddress($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial && count($collSpySalesOrdersRelatedByFkSalesOrderAddressShipping)) {
                        $this->initSpySalesOrdersRelatedByFkSalesOrderAddressShipping(false);

                        foreach ($collSpySalesOrdersRelatedByFkSalesOrderAddressShipping as $obj) {
                            if (false == $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping->contains($obj)) {
                                $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping->append($obj);
                            }
                        }

                        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial = true;
                    }

                    return $collSpySalesOrdersRelatedByFkSalesOrderAddressShipping;
                }

                if ($partial && $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping) {
                    foreach ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping as $obj) {
                        if ($obj->isNew()) {
                            $collSpySalesOrdersRelatedByFkSalesOrderAddressShipping[] = $obj;
                        }
                    }
                }

                $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = $collSpySalesOrdersRelatedByFkSalesOrderAddressShipping;
                $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial = false;
            }
        }

        return $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping;
    }

    /**
     * Sets a collection of ChildSpySalesOrder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spySalesOrdersRelatedByFkSalesOrderAddressShipping A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderAddress The current object (for fluent API support)
     */
    public function setSpySalesOrdersRelatedByFkSalesOrderAddressShipping(Collection $spySalesOrdersRelatedByFkSalesOrderAddressShipping, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrder[] $spySalesOrdersRelatedByFkSalesOrderAddressShippingToDelete */
        $spySalesOrdersRelatedByFkSalesOrderAddressShippingToDelete = $this->getSpySalesOrdersRelatedByFkSalesOrderAddressShipping(new Criteria(), $con)->diff($spySalesOrdersRelatedByFkSalesOrderAddressShipping);


        $this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = $spySalesOrdersRelatedByFkSalesOrderAddressShippingToDelete;

        foreach ($spySalesOrdersRelatedByFkSalesOrderAddressShippingToDelete as $spySalesOrderRelatedByFkSalesOrderAddressShippingRemoved) {
            $spySalesOrderRelatedByFkSalesOrderAddressShippingRemoved->setShippingAddress(null);
        }

        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = null;
        foreach ($spySalesOrdersRelatedByFkSalesOrderAddressShipping as $spySalesOrderRelatedByFkSalesOrderAddressShipping) {
            $this->addSpySalesOrderRelatedByFkSalesOrderAddressShipping($spySalesOrderRelatedByFkSalesOrderAddressShipping);
        }

        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = $spySalesOrdersRelatedByFkSalesOrderAddressShipping;
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial = false;

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
    public function countSpySalesOrdersRelatedByFkSalesOrderAddressShipping(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial && !$this->isNew();
        if (null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpySalesOrdersRelatedByFkSalesOrderAddressShipping());
            }

            $query = ChildSpySalesOrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShippingAddress($this)
                ->count($con);
        }

        return count($this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping);
    }

    /**
     * Method called to associate a ChildSpySalesOrder object to this object
     * through the ChildSpySalesOrder foreign key attribute.
     *
     * @param  ChildSpySalesOrder $l ChildSpySalesOrder
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function addSpySalesOrderRelatedByFkSalesOrderAddressShipping(ChildSpySalesOrder $l)
    {
        if ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping === null) {
            $this->initSpySalesOrdersRelatedByFkSalesOrderAddressShipping();
            $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShippingPartial = true;
        }

        if (!$this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping->contains($l)) {
            $this->doAddSpySalesOrderRelatedByFkSalesOrderAddressShipping($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressShipping The ChildSpySalesOrder object to add.
     */
    protected function doAddSpySalesOrderRelatedByFkSalesOrderAddressShipping(ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressShipping)
    {
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping[]= $spySalesOrderRelatedByFkSalesOrderAddressShipping;
        $spySalesOrderRelatedByFkSalesOrderAddressShipping->setShippingAddress($this);
    }

    /**
     * @param  ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressShipping The ChildSpySalesOrder object to remove.
     * @return $this|ChildSpySalesOrderAddress The current object (for fluent API support)
     */
    public function removeSpySalesOrderRelatedByFkSalesOrderAddressShipping(ChildSpySalesOrder $spySalesOrderRelatedByFkSalesOrderAddressShipping)
    {
        if ($this->getSpySalesOrdersRelatedByFkSalesOrderAddressShipping()->contains($spySalesOrderRelatedByFkSalesOrderAddressShipping)) {
            $pos = $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping->search($spySalesOrderRelatedByFkSalesOrderAddressShipping);
            $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping->remove($pos);
            if (null === $this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion) {
                $this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = clone $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping;
                $this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion->clear();
            }
            $this->spySalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion[]= clone $spySalesOrderRelatedByFkSalesOrderAddressShipping;
            $spySalesOrderRelatedByFkSalesOrderAddressShipping->setShippingAddress(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderAddress is new, it will return
     * an empty collection; or if this SpySalesOrderAddress has previously
     * been saved, it will retrieve related SpySalesOrdersRelatedByFkSalesOrderAddressShipping from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderAddress.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getSpySalesOrdersRelatedByFkSalesOrderAddressShippingJoinCustomer(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('Customer', $joinBehavior);

        return $this->getSpySalesOrdersRelatedByFkSalesOrderAddressShipping($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderAddress is new, it will return
     * an empty collection; or if this SpySalesOrderAddress has previously
     * been saved, it will retrieve related SpySalesOrdersRelatedByFkSalesOrderAddressShipping from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderAddress.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getSpySalesOrdersRelatedByFkSalesOrderAddressShippingJoinShipmentMethod(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('ShipmentMethod', $joinBehavior);

        return $this->getSpySalesOrdersRelatedByFkSalesOrderAddressShipping($query, $con);
    }

    /**
     * Clears out the collSalesOrderAddressHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSalesOrderAddressHistories()
     */
    public function clearSalesOrderAddressHistories()
    {
        $this->collSalesOrderAddressHistories = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSalesOrderAddressHistories collection loaded partially.
     */
    public function resetPartialSalesOrderAddressHistories($v = true)
    {
        $this->collSalesOrderAddressHistoriesPartial = $v;
    }

    /**
     * Initializes the collSalesOrderAddressHistories collection.
     *
     * By default this just sets the collSalesOrderAddressHistories collection to an empty array (like clearcollSalesOrderAddressHistories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderAddressHistories($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderAddressHistories && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderAddressHistories = new ObjectCollection();
        $this->collSalesOrderAddressHistories->setModel('\Propel\SpySalesOrderAddressHistory');
    }

    /**
     * Gets an array of ChildSpySalesOrderAddressHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySalesOrderAddress is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderAddressHistory[] List of ChildSpySalesOrderAddressHistory objects
     * @throws PropelException
     */
    public function getSalesOrderAddressHistories(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                // return empty collection
                $this->initSalesOrderAddressHistories();
            } else {
                $collSalesOrderAddressHistories = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria)
                    ->filterBySalesOrderAddress($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressHistoriesPartial && count($collSalesOrderAddressHistories)) {
                        $this->initSalesOrderAddressHistories(false);

                        foreach ($collSalesOrderAddressHistories as $obj) {
                            if (false == $this->collSalesOrderAddressHistories->contains($obj)) {
                                $this->collSalesOrderAddressHistories->append($obj);
                            }
                        }

                        $this->collSalesOrderAddressHistoriesPartial = true;
                    }

                    return $collSalesOrderAddressHistories;
                }

                if ($partial && $this->collSalesOrderAddressHistories) {
                    foreach ($this->collSalesOrderAddressHistories as $obj) {
                        if ($obj->isNew()) {
                            $collSalesOrderAddressHistories[] = $obj;
                        }
                    }
                }

                $this->collSalesOrderAddressHistories = $collSalesOrderAddressHistories;
                $this->collSalesOrderAddressHistoriesPartial = false;
            }
        }

        return $this->collSalesOrderAddressHistories;
    }

    /**
     * Sets a collection of ChildSpySalesOrderAddressHistory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $salesOrderAddressHistories A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySalesOrderAddress The current object (for fluent API support)
     */
    public function setSalesOrderAddressHistories(Collection $salesOrderAddressHistories, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderAddressHistory[] $salesOrderAddressHistoriesToDelete */
        $salesOrderAddressHistoriesToDelete = $this->getSalesOrderAddressHistories(new Criteria(), $con)->diff($salesOrderAddressHistories);


        $this->salesOrderAddressHistoriesScheduledForDeletion = $salesOrderAddressHistoriesToDelete;

        foreach ($salesOrderAddressHistoriesToDelete as $salesOrderAddressHistoryRemoved) {
            $salesOrderAddressHistoryRemoved->setSalesOrderAddress(null);
        }

        $this->collSalesOrderAddressHistories = null;
        foreach ($salesOrderAddressHistories as $salesOrderAddressHistory) {
            $this->addSalesOrderAddressHistory($salesOrderAddressHistory);
        }

        $this->collSalesOrderAddressHistories = $salesOrderAddressHistories;
        $this->collSalesOrderAddressHistoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySalesOrderAddressHistory objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderAddressHistory objects.
     * @throws PropelException
     */
    public function countSalesOrderAddressHistories(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSalesOrderAddressHistories());
            }

            $query = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySalesOrderAddress($this)
                ->count($con);
        }

        return count($this->collSalesOrderAddressHistories);
    }

    /**
     * Method called to associate a ChildSpySalesOrderAddressHistory object to this object
     * through the ChildSpySalesOrderAddressHistory foreign key attribute.
     *
     * @param  ChildSpySalesOrderAddressHistory $l ChildSpySalesOrderAddressHistory
     * @return $this|\Propel\SpySalesOrderAddress The current object (for fluent API support)
     */
    public function addSalesOrderAddressHistory(ChildSpySalesOrderAddressHistory $l)
    {
        if ($this->collSalesOrderAddressHistories === null) {
            $this->initSalesOrderAddressHistories();
            $this->collSalesOrderAddressHistoriesPartial = true;
        }

        if (!$this->collSalesOrderAddressHistories->contains($l)) {
            $this->doAddSalesOrderAddressHistory($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderAddressHistory $salesOrderAddressHistory The ChildSpySalesOrderAddressHistory object to add.
     */
    protected function doAddSalesOrderAddressHistory(ChildSpySalesOrderAddressHistory $salesOrderAddressHistory)
    {
        $this->collSalesOrderAddressHistories[]= $salesOrderAddressHistory;
        $salesOrderAddressHistory->setSalesOrderAddress($this);
    }

    /**
     * @param  ChildSpySalesOrderAddressHistory $salesOrderAddressHistory The ChildSpySalesOrderAddressHistory object to remove.
     * @return $this|ChildSpySalesOrderAddress The current object (for fluent API support)
     */
    public function removeSalesOrderAddressHistory(ChildSpySalesOrderAddressHistory $salesOrderAddressHistory)
    {
        if ($this->getSalesOrderAddressHistories()->contains($salesOrderAddressHistory)) {
            $pos = $this->collSalesOrderAddressHistories->search($salesOrderAddressHistory);
            $this->collSalesOrderAddressHistories->remove($pos);
            if (null === $this->salesOrderAddressHistoriesScheduledForDeletion) {
                $this->salesOrderAddressHistoriesScheduledForDeletion = clone $this->collSalesOrderAddressHistories;
                $this->salesOrderAddressHistoriesScheduledForDeletion->clear();
            }
            $this->salesOrderAddressHistoriesScheduledForDeletion[]= clone $salesOrderAddressHistory;
            $salesOrderAddressHistory->setSalesOrderAddress(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderAddress is new, it will return
     * an empty collection; or if this SpySalesOrderAddress has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderAddress.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderAddressHistory[] List of ChildSpySalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinCountry(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('Country', $joinBehavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySalesOrderAddress is new, it will return
     * an empty collection; or if this SpySalesOrderAddress has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySalesOrderAddress.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderAddressHistory[] List of ChildSpySalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('Region', $joinBehavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCountry) {
            $this->aCountry->removeSalesOrderAddress($this);
        }
        if (null !== $this->aRegion) {
            $this->aRegion->removeSalesOrderAddress($this);
        }
        $this->id_sales_order_address = null;
        $this->fk_country = null;
        $this->fk_region = null;
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
            if ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling) {
                foreach ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping) {
                foreach ($this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesOrderAddressHistories) {
                foreach ($this->collSalesOrderAddressHistories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressBilling = null;
        $this->collSpySalesOrdersRelatedByFkSalesOrderAddressShipping = null;
        $this->collSalesOrderAddressHistories = null;
        $this->aCountry = null;
        $this->aRegion = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySalesOrderAddressTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpySalesOrderAddress The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpySalesOrderAddressTableMap::COL_UPDATED_AT] = true;

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
