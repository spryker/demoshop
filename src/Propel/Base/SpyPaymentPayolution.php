<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyPaymentPayolution as ChildSpyPaymentPayolution;
use Propel\SpyPaymentPayolutionOrderItem as ChildSpyPaymentPayolutionOrderItem;
use Propel\SpyPaymentPayolutionOrderItemQuery as ChildSpyPaymentPayolutionOrderItemQuery;
use Propel\SpyPaymentPayolutionQuery as ChildSpyPaymentPayolutionQuery;
use Propel\SpyPaymentPayolutionTransactionRequestLog as ChildSpyPaymentPayolutionTransactionRequestLog;
use Propel\SpyPaymentPayolutionTransactionRequestLogQuery as ChildSpyPaymentPayolutionTransactionRequestLogQuery;
use Propel\SpyPaymentPayolutionTransactionStatusLog as ChildSpyPaymentPayolutionTransactionStatusLog;
use Propel\SpyPaymentPayolutionTransactionStatusLogQuery as ChildSpyPaymentPayolutionTransactionStatusLogQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\Map\SpyPaymentPayolutionTableMap;
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
 * Base class that represents a row from the 'spy_payment_payolution' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyPaymentPayolution extends SpyPaymentPayolution implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyPaymentPayolutionTableMap';


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
     * The value for the id_payment_payolution field.
     * @var        int
     */
    protected $id_payment_payolution;

    /**
     * The value for the fk_sales_order field.
     * @var        int
     */
    protected $fk_sales_order;

    /**
     * The value for the account_brand field.
     * @var        string
     */
    protected $account_brand;

    /**
     * The value for the client_ip field.
     * @var        string
     */
    protected $client_ip;

    /**
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the salutation field.
     * @var        int
     */
    protected $salutation;

    /**
     * The value for the gender field.
     * @var        int
     */
    protected $gender;

    /**
     * The value for the date_of_birth field.
     * @var        \DateTime
     */
    protected $date_of_birth;

    /**
     * The value for the country_iso2_code field.
     * @var        string
     */
    protected $country_iso2_code;

    /**
     * The value for the city field.
     * @var        string
     */
    protected $city;

    /**
     * The value for the street field.
     * @var        string
     */
    protected $street;

    /**
     * The value for the zip_code field.
     * @var        string
     */
    protected $zip_code;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

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
     * The value for the language_iso2_code field.
     * @var        string
     */
    protected $language_iso2_code;

    /**
     * The value for the currency_iso3_code field.
     * @var        string
     */
    protected $currency_iso3_code;

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
     * @var        ChildSpySalesOrder
     */
    protected $aSpySalesOrder;

    /**
     * @var        ObjectCollection|ChildSpyPaymentPayolutionTransactionRequestLog[] Collection to store aggregation of ChildSpyPaymentPayolutionTransactionRequestLog objects.
     */
    protected $collSpyPaymentPayolutionTransactionRequestLogs;
    protected $collSpyPaymentPayolutionTransactionRequestLogsPartial;

    /**
     * @var        ObjectCollection|ChildSpyPaymentPayolutionTransactionStatusLog[] Collection to store aggregation of ChildSpyPaymentPayolutionTransactionStatusLog objects.
     */
    protected $collSpyPaymentPayolutionTransactionStatusLogs;
    protected $collSpyPaymentPayolutionTransactionStatusLogsPartial;

    /**
     * @var        ObjectCollection|ChildSpyPaymentPayolutionOrderItem[] Collection to store aggregation of ChildSpyPaymentPayolutionOrderItem objects.
     */
    protected $collSpyPaymentPayolutionOrderItems;
    protected $collSpyPaymentPayolutionOrderItemsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPaymentPayolutionTransactionRequestLog[]
     */
    protected $spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPaymentPayolutionTransactionStatusLog[]
     */
    protected $spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyPaymentPayolutionOrderItem[]
     */
    protected $spyPaymentPayolutionOrderItemsScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyPaymentPayolution object.
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
     * Compares this with another <code>SpyPaymentPayolution</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyPaymentPayolution</code>, delegates to
     * <code>equals(SpyPaymentPayolution)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyPaymentPayolution The current object, for fluid interface
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
     * Get the [id_payment_payolution] column value.
     *
     * @return int
     */
    public function getIdPaymentPayolution()
    {
        return $this->id_payment_payolution;
    }

    /**
     * Get the [fk_sales_order] column value.
     *
     * @return int
     */
    public function getFkSalesOrder()
    {
        return $this->fk_sales_order;
    }

    /**
     * Get the [account_brand] column value.
     *
     * @return string
     */
    public function getAccountBrand()
    {
        return $this->account_brand;
    }

    /**
     * Get the [client_ip] column value.
     *
     * @return string
     */
    public function getClientIp()
    {
        return $this->client_ip;
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
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
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
        $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_SALUTATION);
        if (!isset($valueSet[$this->salutation])) {
            throw new PropelException('Unknown stored enum key: ' . $this->salutation);
        }

        return $valueSet[$this->salutation];
    }

    /**
     * Get the [gender] column value.
     *
     * @return string
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getGender()
    {
        if (null === $this->gender) {
            return null;
        }
        $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_GENDER);
        if (!isset($valueSet[$this->gender])) {
            throw new PropelException('Unknown stored enum key: ' . $this->gender);
        }

        return $valueSet[$this->gender];
    }

    /**
     * Get the [optionally formatted] temporal [date_of_birth] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateOfBirth($format = NULL)
    {
        if ($format === null) {
            return $this->date_of_birth;
        } else {
            return $this->date_of_birth instanceof \DateTime ? $this->date_of_birth->format($format) : null;
        }
    }

    /**
     * Get the [country_iso2_code] column value.
     *
     * @return string
     */
    public function getCountryIso2Code()
    {
        return $this->country_iso2_code;
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
     * Get the [street] column value.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
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
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Get the [language_iso2_code] column value.
     *
     * @return string
     */
    public function getLanguageIso2Code()
    {
        return $this->language_iso2_code;
    }

    /**
     * Get the [currency_iso3_code] column value.
     *
     * @return string
     */
    public function getCurrencyIso3Code()
    {
        return $this->currency_iso3_code;
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
     * Set the value of [id_payment_payolution] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setIdPaymentPayolution($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_payment_payolution !== $v) {
            $this->id_payment_payolution = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION] = true;
        }

        return $this;
    } // setIdPaymentPayolution()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER] = true;
        }

        if ($this->aSpySalesOrder !== null && $this->aSpySalesOrder->getIdSalesOrder() !== $v) {
            $this->aSpySalesOrder = null;
        }

        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [account_brand] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setAccountBrand($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->account_brand !== $v) {
            $this->account_brand = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND] = true;
        }

        return $this;
    } // setAccountBrand()

    /**
     * Set the value of [client_ip] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setClientIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_ip !== $v) {
            $this->client_ip = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_CLIENT_IP] = true;
        }

        return $this;
    } // setClientIp()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [salutation] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_SALUTATION] = true;
        }

        return $this;
    } // setSalutation()

    /**
     * Set the value of [gender] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_GENDER);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_GENDER] = true;
        }

        return $this;
    } // setGender()

    /**
     * Sets the value of [date_of_birth] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setDateOfBirth($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_of_birth !== null || $dt !== null) {
            if ($this->date_of_birth === null || $dt === null || $dt->format("Y-m-d") !== $this->date_of_birth->format("Y-m-d")) {
                $this->date_of_birth = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH] = true;
            }
        } // if either are not null

        return $this;
    } // setDateOfBirth()

    /**
     * Set the value of [country_iso2_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setCountryIso2Code($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country_iso2_code !== $v) {
            $this->country_iso2_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE] = true;
        }

        return $this;
    } // setCountryIso2Code()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [street] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setStreet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->street !== $v) {
            $this->street = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_STREET] = true;
        }

        return $this;
    } // setStreet()

    /**
     * Set the value of [zip_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_ZIP_CODE] = true;
        }

        return $this;
    } // setZipCode()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [cell_phone] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setCellPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cell_phone !== $v) {
            $this->cell_phone = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_CELL_PHONE] = true;
        }

        return $this;
    } // setCellPhone()

    /**
     * Set the value of [language_iso2_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setLanguageIso2Code($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->language_iso2_code !== $v) {
            $this->language_iso2_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE] = true;
        }

        return $this;
    } // setLanguageIso2Code()

    /**
     * Set the value of [currency_iso3_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setCurrencyIso3Code($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->currency_iso3_code !== $v) {
            $this->currency_iso3_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE] = true;
        }

        return $this;
    } // setCurrencyIso3Code()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('IdPaymentPayolution', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_payment_payolution = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('FkSalesOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('AccountBrand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->account_brand = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('ClientIp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->client_ip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('Salutation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salutation = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('Gender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gender = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('DateOfBirth', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->date_of_birth = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('CountryIso2Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country_iso2_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('Street', TableMap::TYPE_PHPNAME, $indexType)];
            $this->street = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('ZipCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('CellPhone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cell_phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('LanguageIso2Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->language_iso2_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('CurrencyIso3Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currency_iso3_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : SpyPaymentPayolutionTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = SpyPaymentPayolutionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyPaymentPayolution'), 0, $e);
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
        if ($this->aSpySalesOrder !== null && $this->fk_sales_order !== $this->aSpySalesOrder->getIdSalesOrder()) {
            $this->aSpySalesOrder = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyPaymentPayolutionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpySalesOrder = null;
            $this->collSpyPaymentPayolutionTransactionRequestLogs = null;

            $this->collSpyPaymentPayolutionTransactionStatusLogs = null;

            $this->collSpyPaymentPayolutionOrderItems = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyPaymentPayolution::setDeleted()
     * @see SpyPaymentPayolution::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyPaymentPayolutionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyPaymentPayolutionTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyPaymentPayolutionTableMap::COL_UPDATED_AT)) {
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
                SpyPaymentPayolutionTableMap::addInstanceToPool($this);
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

            if ($this->aSpySalesOrder !== null) {
                if ($this->aSpySalesOrder->isModified() || $this->aSpySalesOrder->isNew()) {
                    $affectedRows += $this->aSpySalesOrder->save($con);
                }
                $this->setSpySalesOrder($this->aSpySalesOrder);
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

            if ($this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion !== null) {
                if (!$this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyPaymentPayolutionTransactionRequestLogQuery::create()
                        ->filterByPrimaryKeys($this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyPaymentPayolutionTransactionRequestLogs !== null) {
                foreach ($this->collSpyPaymentPayolutionTransactionRequestLogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion !== null) {
                if (!$this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyPaymentPayolutionTransactionStatusLogQuery::create()
                        ->filterByPrimaryKeys($this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyPaymentPayolutionTransactionStatusLogs !== null) {
                foreach ($this->collSpyPaymentPayolutionTransactionStatusLogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyPaymentPayolutionOrderItemsScheduledForDeletion !== null) {
                if (!$this->spyPaymentPayolutionOrderItemsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyPaymentPayolutionOrderItemQuery::create()
                        ->filterByPrimaryKeys($this->spyPaymentPayolutionOrderItemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyPaymentPayolutionOrderItemsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyPaymentPayolutionOrderItems !== null) {
                foreach ($this->collSpyPaymentPayolutionOrderItems as $referrerFK) {
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

        $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION] = true;
        if (null !== $this->id_payment_payolution) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION)) {
            $modifiedColumns[':p' . $index++]  = 'id_payment_payolution';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND)) {
            $modifiedColumns[':p' . $index++]  = 'account_brand';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CLIENT_IP)) {
            $modifiedColumns[':p' . $index++]  = 'client_ip';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = 'salutation';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_GENDER)) {
            $modifiedColumns[':p' . $index++]  = 'gender';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH)) {
            $modifiedColumns[':p' . $index++]  = 'date_of_birth';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'country_iso2_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'city';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_STREET)) {
            $modifiedColumns[':p' . $index++]  = 'street';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'zip_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CELL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'cell_phone';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'language_iso2_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'currency_iso3_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_payment_payolution (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_payment_payolution':
                        $stmt->bindValue($identifier, $this->id_payment_payolution, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case 'account_brand':
                        $stmt->bindValue($identifier, $this->account_brand, PDO::PARAM_STR);
                        break;
                    case 'client_ip':
                        $stmt->bindValue($identifier, $this->client_ip, PDO::PARAM_STR);
                        break;
                    case 'first_name':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'last_name':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'salutation':
                        $stmt->bindValue($identifier, $this->salutation, PDO::PARAM_INT);
                        break;
                    case 'gender':
                        $stmt->bindValue($identifier, $this->gender, PDO::PARAM_INT);
                        break;
                    case 'date_of_birth':
                        $stmt->bindValue($identifier, $this->date_of_birth ? $this->date_of_birth->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'country_iso2_code':
                        $stmt->bindValue($identifier, $this->country_iso2_code, PDO::PARAM_STR);
                        break;
                    case 'city':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'street':
                        $stmt->bindValue($identifier, $this->street, PDO::PARAM_STR);
                        break;
                    case 'zip_code':
                        $stmt->bindValue($identifier, $this->zip_code, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'cell_phone':
                        $stmt->bindValue($identifier, $this->cell_phone, PDO::PARAM_STR);
                        break;
                    case 'language_iso2_code':
                        $stmt->bindValue($identifier, $this->language_iso2_code, PDO::PARAM_STR);
                        break;
                    case 'currency_iso3_code':
                        $stmt->bindValue($identifier, $this->currency_iso3_code, PDO::PARAM_STR);
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
            $pk = $con->lastInsertId('spy_payment_payolution_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdPaymentPayolution($pk);

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
        $pos = SpyPaymentPayolutionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdPaymentPayolution();
                break;
            case 1:
                return $this->getFkSalesOrder();
                break;
            case 2:
                return $this->getAccountBrand();
                break;
            case 3:
                return $this->getClientIp();
                break;
            case 4:
                return $this->getFirstName();
                break;
            case 5:
                return $this->getLastName();
                break;
            case 6:
                return $this->getSalutation();
                break;
            case 7:
                return $this->getGender();
                break;
            case 8:
                return $this->getDateOfBirth();
                break;
            case 9:
                return $this->getCountryIso2Code();
                break;
            case 10:
                return $this->getCity();
                break;
            case 11:
                return $this->getStreet();
                break;
            case 12:
                return $this->getZipCode();
                break;
            case 13:
                return $this->getEmail();
                break;
            case 14:
                return $this->getPhone();
                break;
            case 15:
                return $this->getCellPhone();
                break;
            case 16:
                return $this->getLanguageIso2Code();
                break;
            case 17:
                return $this->getCurrencyIso3Code();
                break;
            case 18:
                return $this->getCreatedAt();
                break;
            case 19:
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

        if (isset($alreadyDumpedObjects['SpyPaymentPayolution'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyPaymentPayolution'][$this->hashCode()] = true;
        $keys = SpyPaymentPayolutionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPaymentPayolution(),
            $keys[1] => $this->getFkSalesOrder(),
            $keys[2] => $this->getAccountBrand(),
            $keys[3] => $this->getClientIp(),
            $keys[4] => $this->getFirstName(),
            $keys[5] => $this->getLastName(),
            $keys[6] => $this->getSalutation(),
            $keys[7] => $this->getGender(),
            $keys[8] => $this->getDateOfBirth(),
            $keys[9] => $this->getCountryIso2Code(),
            $keys[10] => $this->getCity(),
            $keys[11] => $this->getStreet(),
            $keys[12] => $this->getZipCode(),
            $keys[13] => $this->getEmail(),
            $keys[14] => $this->getPhone(),
            $keys[15] => $this->getCellPhone(),
            $keys[16] => $this->getLanguageIso2Code(),
            $keys[17] => $this->getCurrencyIso3Code(),
            $keys[18] => $this->getCreatedAt(),
            $keys[19] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[8]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[8]];
            $result[$keys[8]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[18]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[18]];
            $result[$keys[18]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[19]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[19]];
            $result[$keys[19]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpySalesOrder) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrder';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order';
                        break;
                    default:
                        $key = 'SpySalesOrder';
                }

                $result[$key] = $this->aSpySalesOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpyPaymentPayolutionTransactionRequestLogs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayolutionTransactionRequestLogs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payolution_transaction_request_logs';
                        break;
                    default:
                        $key = 'SpyPaymentPayolutionTransactionRequestLogs';
                }

                $result[$key] = $this->collSpyPaymentPayolutionTransactionRequestLogs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyPaymentPayolutionTransactionStatusLogs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayolutionTransactionStatusLogs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payolution_transaction_status_logs';
                        break;
                    default:
                        $key = 'SpyPaymentPayolutionTransactionStatusLogs';
                }

                $result[$key] = $this->collSpyPaymentPayolutionTransactionStatusLogs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyPaymentPayolutionOrderItems) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayolutionOrderItems';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payolution_order_items';
                        break;
                    default:
                        $key = 'SpyPaymentPayolutionOrderItems';
                }

                $result[$key] = $this->collSpyPaymentPayolutionOrderItems->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyPaymentPayolution
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyPaymentPayolutionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyPaymentPayolution
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdPaymentPayolution($value);
                break;
            case 1:
                $this->setFkSalesOrder($value);
                break;
            case 2:
                $this->setAccountBrand($value);
                break;
            case 3:
                $this->setClientIp($value);
                break;
            case 4:
                $this->setFirstName($value);
                break;
            case 5:
                $this->setLastName($value);
                break;
            case 6:
                $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 7:
                $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_GENDER);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setGender($value);
                break;
            case 8:
                $this->setDateOfBirth($value);
                break;
            case 9:
                $this->setCountryIso2Code($value);
                break;
            case 10:
                $this->setCity($value);
                break;
            case 11:
                $this->setStreet($value);
                break;
            case 12:
                $this->setZipCode($value);
                break;
            case 13:
                $this->setEmail($value);
                break;
            case 14:
                $this->setPhone($value);
                break;
            case 15:
                $this->setCellPhone($value);
                break;
            case 16:
                $this->setLanguageIso2Code($value);
                break;
            case 17:
                $this->setCurrencyIso3Code($value);
                break;
            case 18:
                $this->setCreatedAt($value);
                break;
            case 19:
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
        $keys = SpyPaymentPayolutionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdPaymentPayolution($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkSalesOrder($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAccountBrand($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setClientIp($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFirstName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLastName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSalutation($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setGender($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDateOfBirth($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCountryIso2Code($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCity($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setStreet($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setZipCode($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setEmail($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPhone($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCellPhone($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setLanguageIso2Code($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCurrencyIso3Code($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setCreatedAt($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setUpdatedAt($arr[$keys[19]]);
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
     * @return $this|\Propel\SpyPaymentPayolution The current object, for fluid interface
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
        $criteria = new Criteria(SpyPaymentPayolutionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $this->id_payment_payolution);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER, $this->fk_sales_order);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND, $this->account_brand);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CLIENT_IP)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_CLIENT_IP, $this->client_ip);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_FIRST_NAME)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_LAST_NAME)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_SALUTATION)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_SALUTATION, $this->salutation);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_GENDER)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_GENDER, $this->gender);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH, $this->date_of_birth);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE, $this->country_iso2_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CITY)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_STREET)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_STREET, $this->street);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_ZIP_CODE)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_ZIP_CODE, $this->zip_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_EMAIL)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_PHONE)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CELL_PHONE)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_CELL_PHONE, $this->cell_phone);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE, $this->language_iso2_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE, $this->currency_iso3_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyPaymentPayolutionTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyPaymentPayolutionQuery::create();
        $criteria->add(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $this->id_payment_payolution);

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
        $validPk = null !== $this->getIdPaymentPayolution();

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
        return $this->getIdPaymentPayolution();
    }

    /**
     * Generic method to set the primary key (id_payment_payolution column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPaymentPayolution($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdPaymentPayolution();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyPaymentPayolution (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setAccountBrand($this->getAccountBrand());
        $copyObj->setClientIp($this->getClientIp());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setSalutation($this->getSalutation());
        $copyObj->setGender($this->getGender());
        $copyObj->setDateOfBirth($this->getDateOfBirth());
        $copyObj->setCountryIso2Code($this->getCountryIso2Code());
        $copyObj->setCity($this->getCity());
        $copyObj->setStreet($this->getStreet());
        $copyObj->setZipCode($this->getZipCode());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setCellPhone($this->getCellPhone());
        $copyObj->setLanguageIso2Code($this->getLanguageIso2Code());
        $copyObj->setCurrencyIso3Code($this->getCurrencyIso3Code());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyPaymentPayolutionTransactionRequestLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyPaymentPayolutionTransactionRequestLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyPaymentPayolutionTransactionStatusLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyPaymentPayolutionTransactionStatusLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyPaymentPayolutionOrderItems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyPaymentPayolutionOrderItem($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPaymentPayolution(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyPaymentPayolution Clone of current object.
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
     * Declares an association between this object and a ChildSpySalesOrder object.
     *
     * @param  ChildSpySalesOrder $v
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpySalesOrder(ChildSpySalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aSpySalesOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyPaymentPayolution($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrder object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrder The associated ChildSpySalesOrder object.
     * @throws PropelException
     */
    public function getSpySalesOrder(ConnectionInterface $con = null)
    {
        if ($this->aSpySalesOrder === null && ($this->fk_sales_order !== null)) {
            $this->aSpySalesOrder = ChildSpySalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpySalesOrder->addSpyPaymentPayolutions($this);
             */
        }

        return $this->aSpySalesOrder;
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
        if ('SpyPaymentPayolutionTransactionRequestLog' == $relationName) {
            return $this->initSpyPaymentPayolutionTransactionRequestLogs();
        }
        if ('SpyPaymentPayolutionTransactionStatusLog' == $relationName) {
            return $this->initSpyPaymentPayolutionTransactionStatusLogs();
        }
        if ('SpyPaymentPayolutionOrderItem' == $relationName) {
            return $this->initSpyPaymentPayolutionOrderItems();
        }
    }

    /**
     * Clears out the collSpyPaymentPayolutionTransactionRequestLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyPaymentPayolutionTransactionRequestLogs()
     */
    public function clearSpyPaymentPayolutionTransactionRequestLogs()
    {
        $this->collSpyPaymentPayolutionTransactionRequestLogs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyPaymentPayolutionTransactionRequestLogs collection loaded partially.
     */
    public function resetPartialSpyPaymentPayolutionTransactionRequestLogs($v = true)
    {
        $this->collSpyPaymentPayolutionTransactionRequestLogsPartial = $v;
    }

    /**
     * Initializes the collSpyPaymentPayolutionTransactionRequestLogs collection.
     *
     * By default this just sets the collSpyPaymentPayolutionTransactionRequestLogs collection to an empty array (like clearcollSpyPaymentPayolutionTransactionRequestLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyPaymentPayolutionTransactionRequestLogs($overrideExisting = true)
    {
        if (null !== $this->collSpyPaymentPayolutionTransactionRequestLogs && !$overrideExisting) {
            return;
        }
        $this->collSpyPaymentPayolutionTransactionRequestLogs = new ObjectCollection();
        $this->collSpyPaymentPayolutionTransactionRequestLogs->setModel('\Propel\SpyPaymentPayolutionTransactionRequestLog');
    }

    /**
     * Gets an array of ChildSpyPaymentPayolutionTransactionRequestLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyPaymentPayolution is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPaymentPayolutionTransactionRequestLog[] List of ChildSpyPaymentPayolutionTransactionRequestLog objects
     * @throws PropelException
     */
    public function getSpyPaymentPayolutionTransactionRequestLogs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionTransactionRequestLogsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionTransactionRequestLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionTransactionRequestLogs) {
                // return empty collection
                $this->initSpyPaymentPayolutionTransactionRequestLogs();
            } else {
                $collSpyPaymentPayolutionTransactionRequestLogs = ChildSpyPaymentPayolutionTransactionRequestLogQuery::create(null, $criteria)
                    ->filterBySpyPaymentPayolution($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyPaymentPayolutionTransactionRequestLogsPartial && count($collSpyPaymentPayolutionTransactionRequestLogs)) {
                        $this->initSpyPaymentPayolutionTransactionRequestLogs(false);

                        foreach ($collSpyPaymentPayolutionTransactionRequestLogs as $obj) {
                            if (false == $this->collSpyPaymentPayolutionTransactionRequestLogs->contains($obj)) {
                                $this->collSpyPaymentPayolutionTransactionRequestLogs->append($obj);
                            }
                        }

                        $this->collSpyPaymentPayolutionTransactionRequestLogsPartial = true;
                    }

                    return $collSpyPaymentPayolutionTransactionRequestLogs;
                }

                if ($partial && $this->collSpyPaymentPayolutionTransactionRequestLogs) {
                    foreach ($this->collSpyPaymentPayolutionTransactionRequestLogs as $obj) {
                        if ($obj->isNew()) {
                            $collSpyPaymentPayolutionTransactionRequestLogs[] = $obj;
                        }
                    }
                }

                $this->collSpyPaymentPayolutionTransactionRequestLogs = $collSpyPaymentPayolutionTransactionRequestLogs;
                $this->collSpyPaymentPayolutionTransactionRequestLogsPartial = false;
            }
        }

        return $this->collSpyPaymentPayolutionTransactionRequestLogs;
    }

    /**
     * Sets a collection of ChildSpyPaymentPayolutionTransactionRequestLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyPaymentPayolutionTransactionRequestLogs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyPaymentPayolution The current object (for fluent API support)
     */
    public function setSpyPaymentPayolutionTransactionRequestLogs(Collection $spyPaymentPayolutionTransactionRequestLogs, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPaymentPayolutionTransactionRequestLog[] $spyPaymentPayolutionTransactionRequestLogsToDelete */
        $spyPaymentPayolutionTransactionRequestLogsToDelete = $this->getSpyPaymentPayolutionTransactionRequestLogs(new Criteria(), $con)->diff($spyPaymentPayolutionTransactionRequestLogs);


        $this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion = $spyPaymentPayolutionTransactionRequestLogsToDelete;

        foreach ($spyPaymentPayolutionTransactionRequestLogsToDelete as $spyPaymentPayolutionTransactionRequestLogRemoved) {
            $spyPaymentPayolutionTransactionRequestLogRemoved->setSpyPaymentPayolution(null);
        }

        $this->collSpyPaymentPayolutionTransactionRequestLogs = null;
        foreach ($spyPaymentPayolutionTransactionRequestLogs as $spyPaymentPayolutionTransactionRequestLog) {
            $this->addSpyPaymentPayolutionTransactionRequestLog($spyPaymentPayolutionTransactionRequestLog);
        }

        $this->collSpyPaymentPayolutionTransactionRequestLogs = $spyPaymentPayolutionTransactionRequestLogs;
        $this->collSpyPaymentPayolutionTransactionRequestLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyPaymentPayolutionTransactionRequestLog objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPaymentPayolutionTransactionRequestLog objects.
     * @throws PropelException
     */
    public function countSpyPaymentPayolutionTransactionRequestLogs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionTransactionRequestLogsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionTransactionRequestLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionTransactionRequestLogs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyPaymentPayolutionTransactionRequestLogs());
            }

            $query = ChildSpyPaymentPayolutionTransactionRequestLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyPaymentPayolution($this)
                ->count($con);
        }

        return count($this->collSpyPaymentPayolutionTransactionRequestLogs);
    }

    /**
     * Method called to associate a ChildSpyPaymentPayolutionTransactionRequestLog object to this object
     * through the ChildSpyPaymentPayolutionTransactionRequestLog foreign key attribute.
     *
     * @param  ChildSpyPaymentPayolutionTransactionRequestLog $l ChildSpyPaymentPayolutionTransactionRequestLog
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function addSpyPaymentPayolutionTransactionRequestLog(ChildSpyPaymentPayolutionTransactionRequestLog $l)
    {
        if ($this->collSpyPaymentPayolutionTransactionRequestLogs === null) {
            $this->initSpyPaymentPayolutionTransactionRequestLogs();
            $this->collSpyPaymentPayolutionTransactionRequestLogsPartial = true;
        }

        if (!$this->collSpyPaymentPayolutionTransactionRequestLogs->contains($l)) {
            $this->doAddSpyPaymentPayolutionTransactionRequestLog($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPaymentPayolutionTransactionRequestLog $spyPaymentPayolutionTransactionRequestLog The ChildSpyPaymentPayolutionTransactionRequestLog object to add.
     */
    protected function doAddSpyPaymentPayolutionTransactionRequestLog(ChildSpyPaymentPayolutionTransactionRequestLog $spyPaymentPayolutionTransactionRequestLog)
    {
        $this->collSpyPaymentPayolutionTransactionRequestLogs[]= $spyPaymentPayolutionTransactionRequestLog;
        $spyPaymentPayolutionTransactionRequestLog->setSpyPaymentPayolution($this);
    }

    /**
     * @param  ChildSpyPaymentPayolutionTransactionRequestLog $spyPaymentPayolutionTransactionRequestLog The ChildSpyPaymentPayolutionTransactionRequestLog object to remove.
     * @return $this|ChildSpyPaymentPayolution The current object (for fluent API support)
     */
    public function removeSpyPaymentPayolutionTransactionRequestLog(ChildSpyPaymentPayolutionTransactionRequestLog $spyPaymentPayolutionTransactionRequestLog)
    {
        if ($this->getSpyPaymentPayolutionTransactionRequestLogs()->contains($spyPaymentPayolutionTransactionRequestLog)) {
            $pos = $this->collSpyPaymentPayolutionTransactionRequestLogs->search($spyPaymentPayolutionTransactionRequestLog);
            $this->collSpyPaymentPayolutionTransactionRequestLogs->remove($pos);
            if (null === $this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion) {
                $this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion = clone $this->collSpyPaymentPayolutionTransactionRequestLogs;
                $this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion->clear();
            }
            $this->spyPaymentPayolutionTransactionRequestLogsScheduledForDeletion[]= clone $spyPaymentPayolutionTransactionRequestLog;
            $spyPaymentPayolutionTransactionRequestLog->setSpyPaymentPayolution(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyPaymentPayolutionTransactionStatusLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyPaymentPayolutionTransactionStatusLogs()
     */
    public function clearSpyPaymentPayolutionTransactionStatusLogs()
    {
        $this->collSpyPaymentPayolutionTransactionStatusLogs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyPaymentPayolutionTransactionStatusLogs collection loaded partially.
     */
    public function resetPartialSpyPaymentPayolutionTransactionStatusLogs($v = true)
    {
        $this->collSpyPaymentPayolutionTransactionStatusLogsPartial = $v;
    }

    /**
     * Initializes the collSpyPaymentPayolutionTransactionStatusLogs collection.
     *
     * By default this just sets the collSpyPaymentPayolutionTransactionStatusLogs collection to an empty array (like clearcollSpyPaymentPayolutionTransactionStatusLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyPaymentPayolutionTransactionStatusLogs($overrideExisting = true)
    {
        if (null !== $this->collSpyPaymentPayolutionTransactionStatusLogs && !$overrideExisting) {
            return;
        }
        $this->collSpyPaymentPayolutionTransactionStatusLogs = new ObjectCollection();
        $this->collSpyPaymentPayolutionTransactionStatusLogs->setModel('\Propel\SpyPaymentPayolutionTransactionStatusLog');
    }

    /**
     * Gets an array of ChildSpyPaymentPayolutionTransactionStatusLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyPaymentPayolution is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPaymentPayolutionTransactionStatusLog[] List of ChildSpyPaymentPayolutionTransactionStatusLog objects
     * @throws PropelException
     */
    public function getSpyPaymentPayolutionTransactionStatusLogs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionTransactionStatusLogsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionTransactionStatusLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionTransactionStatusLogs) {
                // return empty collection
                $this->initSpyPaymentPayolutionTransactionStatusLogs();
            } else {
                $collSpyPaymentPayolutionTransactionStatusLogs = ChildSpyPaymentPayolutionTransactionStatusLogQuery::create(null, $criteria)
                    ->filterBySpyPaymentPayolution($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyPaymentPayolutionTransactionStatusLogsPartial && count($collSpyPaymentPayolutionTransactionStatusLogs)) {
                        $this->initSpyPaymentPayolutionTransactionStatusLogs(false);

                        foreach ($collSpyPaymentPayolutionTransactionStatusLogs as $obj) {
                            if (false == $this->collSpyPaymentPayolutionTransactionStatusLogs->contains($obj)) {
                                $this->collSpyPaymentPayolutionTransactionStatusLogs->append($obj);
                            }
                        }

                        $this->collSpyPaymentPayolutionTransactionStatusLogsPartial = true;
                    }

                    return $collSpyPaymentPayolutionTransactionStatusLogs;
                }

                if ($partial && $this->collSpyPaymentPayolutionTransactionStatusLogs) {
                    foreach ($this->collSpyPaymentPayolutionTransactionStatusLogs as $obj) {
                        if ($obj->isNew()) {
                            $collSpyPaymentPayolutionTransactionStatusLogs[] = $obj;
                        }
                    }
                }

                $this->collSpyPaymentPayolutionTransactionStatusLogs = $collSpyPaymentPayolutionTransactionStatusLogs;
                $this->collSpyPaymentPayolutionTransactionStatusLogsPartial = false;
            }
        }

        return $this->collSpyPaymentPayolutionTransactionStatusLogs;
    }

    /**
     * Sets a collection of ChildSpyPaymentPayolutionTransactionStatusLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyPaymentPayolutionTransactionStatusLogs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyPaymentPayolution The current object (for fluent API support)
     */
    public function setSpyPaymentPayolutionTransactionStatusLogs(Collection $spyPaymentPayolutionTransactionStatusLogs, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPaymentPayolutionTransactionStatusLog[] $spyPaymentPayolutionTransactionStatusLogsToDelete */
        $spyPaymentPayolutionTransactionStatusLogsToDelete = $this->getSpyPaymentPayolutionTransactionStatusLogs(new Criteria(), $con)->diff($spyPaymentPayolutionTransactionStatusLogs);


        $this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion = $spyPaymentPayolutionTransactionStatusLogsToDelete;

        foreach ($spyPaymentPayolutionTransactionStatusLogsToDelete as $spyPaymentPayolutionTransactionStatusLogRemoved) {
            $spyPaymentPayolutionTransactionStatusLogRemoved->setSpyPaymentPayolution(null);
        }

        $this->collSpyPaymentPayolutionTransactionStatusLogs = null;
        foreach ($spyPaymentPayolutionTransactionStatusLogs as $spyPaymentPayolutionTransactionStatusLog) {
            $this->addSpyPaymentPayolutionTransactionStatusLog($spyPaymentPayolutionTransactionStatusLog);
        }

        $this->collSpyPaymentPayolutionTransactionStatusLogs = $spyPaymentPayolutionTransactionStatusLogs;
        $this->collSpyPaymentPayolutionTransactionStatusLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyPaymentPayolutionTransactionStatusLog objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPaymentPayolutionTransactionStatusLog objects.
     * @throws PropelException
     */
    public function countSpyPaymentPayolutionTransactionStatusLogs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionTransactionStatusLogsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionTransactionStatusLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionTransactionStatusLogs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyPaymentPayolutionTransactionStatusLogs());
            }

            $query = ChildSpyPaymentPayolutionTransactionStatusLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyPaymentPayolution($this)
                ->count($con);
        }

        return count($this->collSpyPaymentPayolutionTransactionStatusLogs);
    }

    /**
     * Method called to associate a ChildSpyPaymentPayolutionTransactionStatusLog object to this object
     * through the ChildSpyPaymentPayolutionTransactionStatusLog foreign key attribute.
     *
     * @param  ChildSpyPaymentPayolutionTransactionStatusLog $l ChildSpyPaymentPayolutionTransactionStatusLog
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function addSpyPaymentPayolutionTransactionStatusLog(ChildSpyPaymentPayolutionTransactionStatusLog $l)
    {
        if ($this->collSpyPaymentPayolutionTransactionStatusLogs === null) {
            $this->initSpyPaymentPayolutionTransactionStatusLogs();
            $this->collSpyPaymentPayolutionTransactionStatusLogsPartial = true;
        }

        if (!$this->collSpyPaymentPayolutionTransactionStatusLogs->contains($l)) {
            $this->doAddSpyPaymentPayolutionTransactionStatusLog($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPaymentPayolutionTransactionStatusLog $spyPaymentPayolutionTransactionStatusLog The ChildSpyPaymentPayolutionTransactionStatusLog object to add.
     */
    protected function doAddSpyPaymentPayolutionTransactionStatusLog(ChildSpyPaymentPayolutionTransactionStatusLog $spyPaymentPayolutionTransactionStatusLog)
    {
        $this->collSpyPaymentPayolutionTransactionStatusLogs[]= $spyPaymentPayolutionTransactionStatusLog;
        $spyPaymentPayolutionTransactionStatusLog->setSpyPaymentPayolution($this);
    }

    /**
     * @param  ChildSpyPaymentPayolutionTransactionStatusLog $spyPaymentPayolutionTransactionStatusLog The ChildSpyPaymentPayolutionTransactionStatusLog object to remove.
     * @return $this|ChildSpyPaymentPayolution The current object (for fluent API support)
     */
    public function removeSpyPaymentPayolutionTransactionStatusLog(ChildSpyPaymentPayolutionTransactionStatusLog $spyPaymentPayolutionTransactionStatusLog)
    {
        if ($this->getSpyPaymentPayolutionTransactionStatusLogs()->contains($spyPaymentPayolutionTransactionStatusLog)) {
            $pos = $this->collSpyPaymentPayolutionTransactionStatusLogs->search($spyPaymentPayolutionTransactionStatusLog);
            $this->collSpyPaymentPayolutionTransactionStatusLogs->remove($pos);
            if (null === $this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion) {
                $this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion = clone $this->collSpyPaymentPayolutionTransactionStatusLogs;
                $this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion->clear();
            }
            $this->spyPaymentPayolutionTransactionStatusLogsScheduledForDeletion[]= clone $spyPaymentPayolutionTransactionStatusLog;
            $spyPaymentPayolutionTransactionStatusLog->setSpyPaymentPayolution(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyPaymentPayolution is new, it will return
     * an empty collection; or if this SpyPaymentPayolution has previously
     * been saved, it will retrieve related SpyPaymentPayolutionTransactionStatusLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyPaymentPayolution.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyPaymentPayolutionTransactionStatusLog[] List of ChildSpyPaymentPayolutionTransactionStatusLog objects
     */
    public function getSpyPaymentPayolutionTransactionStatusLogsJoinSpyPaymentPayolutionTransactionRequestLog(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyPaymentPayolutionTransactionStatusLogQuery::create(null, $criteria);
        $query->joinWith('SpyPaymentPayolutionTransactionRequestLog', $joinBehavior);

        return $this->getSpyPaymentPayolutionTransactionStatusLogs($query, $con);
    }

    /**
     * Clears out the collSpyPaymentPayolutionOrderItems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyPaymentPayolutionOrderItems()
     */
    public function clearSpyPaymentPayolutionOrderItems()
    {
        $this->collSpyPaymentPayolutionOrderItems = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyPaymentPayolutionOrderItems collection loaded partially.
     */
    public function resetPartialSpyPaymentPayolutionOrderItems($v = true)
    {
        $this->collSpyPaymentPayolutionOrderItemsPartial = $v;
    }

    /**
     * Initializes the collSpyPaymentPayolutionOrderItems collection.
     *
     * By default this just sets the collSpyPaymentPayolutionOrderItems collection to an empty array (like clearcollSpyPaymentPayolutionOrderItems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyPaymentPayolutionOrderItems($overrideExisting = true)
    {
        if (null !== $this->collSpyPaymentPayolutionOrderItems && !$overrideExisting) {
            return;
        }
        $this->collSpyPaymentPayolutionOrderItems = new ObjectCollection();
        $this->collSpyPaymentPayolutionOrderItems->setModel('\Propel\SpyPaymentPayolutionOrderItem');
    }

    /**
     * Gets an array of ChildSpyPaymentPayolutionOrderItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyPaymentPayolution is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyPaymentPayolutionOrderItem[] List of ChildSpyPaymentPayolutionOrderItem objects
     * @throws PropelException
     */
    public function getSpyPaymentPayolutionOrderItems(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionOrderItems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionOrderItems) {
                // return empty collection
                $this->initSpyPaymentPayolutionOrderItems();
            } else {
                $collSpyPaymentPayolutionOrderItems = ChildSpyPaymentPayolutionOrderItemQuery::create(null, $criteria)
                    ->filterBySpyPaymentPayolution($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyPaymentPayolutionOrderItemsPartial && count($collSpyPaymentPayolutionOrderItems)) {
                        $this->initSpyPaymentPayolutionOrderItems(false);

                        foreach ($collSpyPaymentPayolutionOrderItems as $obj) {
                            if (false == $this->collSpyPaymentPayolutionOrderItems->contains($obj)) {
                                $this->collSpyPaymentPayolutionOrderItems->append($obj);
                            }
                        }

                        $this->collSpyPaymentPayolutionOrderItemsPartial = true;
                    }

                    return $collSpyPaymentPayolutionOrderItems;
                }

                if ($partial && $this->collSpyPaymentPayolutionOrderItems) {
                    foreach ($this->collSpyPaymentPayolutionOrderItems as $obj) {
                        if ($obj->isNew()) {
                            $collSpyPaymentPayolutionOrderItems[] = $obj;
                        }
                    }
                }

                $this->collSpyPaymentPayolutionOrderItems = $collSpyPaymentPayolutionOrderItems;
                $this->collSpyPaymentPayolutionOrderItemsPartial = false;
            }
        }

        return $this->collSpyPaymentPayolutionOrderItems;
    }

    /**
     * Sets a collection of ChildSpyPaymentPayolutionOrderItem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyPaymentPayolutionOrderItems A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyPaymentPayolution The current object (for fluent API support)
     */
    public function setSpyPaymentPayolutionOrderItems(Collection $spyPaymentPayolutionOrderItems, ConnectionInterface $con = null)
    {
        /** @var ChildSpyPaymentPayolutionOrderItem[] $spyPaymentPayolutionOrderItemsToDelete */
        $spyPaymentPayolutionOrderItemsToDelete = $this->getSpyPaymentPayolutionOrderItems(new Criteria(), $con)->diff($spyPaymentPayolutionOrderItems);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->spyPaymentPayolutionOrderItemsScheduledForDeletion = clone $spyPaymentPayolutionOrderItemsToDelete;

        foreach ($spyPaymentPayolutionOrderItemsToDelete as $spyPaymentPayolutionOrderItemRemoved) {
            $spyPaymentPayolutionOrderItemRemoved->setSpyPaymentPayolution(null);
        }

        $this->collSpyPaymentPayolutionOrderItems = null;
        foreach ($spyPaymentPayolutionOrderItems as $spyPaymentPayolutionOrderItem) {
            $this->addSpyPaymentPayolutionOrderItem($spyPaymentPayolutionOrderItem);
        }

        $this->collSpyPaymentPayolutionOrderItems = $spyPaymentPayolutionOrderItems;
        $this->collSpyPaymentPayolutionOrderItemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyPaymentPayolutionOrderItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyPaymentPayolutionOrderItem objects.
     * @throws PropelException
     */
    public function countSpyPaymentPayolutionOrderItems(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyPaymentPayolutionOrderItemsPartial && !$this->isNew();
        if (null === $this->collSpyPaymentPayolutionOrderItems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyPaymentPayolutionOrderItems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyPaymentPayolutionOrderItems());
            }

            $query = ChildSpyPaymentPayolutionOrderItemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyPaymentPayolution($this)
                ->count($con);
        }

        return count($this->collSpyPaymentPayolutionOrderItems);
    }

    /**
     * Method called to associate a ChildSpyPaymentPayolutionOrderItem object to this object
     * through the ChildSpyPaymentPayolutionOrderItem foreign key attribute.
     *
     * @param  ChildSpyPaymentPayolutionOrderItem $l ChildSpyPaymentPayolutionOrderItem
     * @return $this|\Propel\SpyPaymentPayolution The current object (for fluent API support)
     */
    public function addSpyPaymentPayolutionOrderItem(ChildSpyPaymentPayolutionOrderItem $l)
    {
        if ($this->collSpyPaymentPayolutionOrderItems === null) {
            $this->initSpyPaymentPayolutionOrderItems();
            $this->collSpyPaymentPayolutionOrderItemsPartial = true;
        }

        if (!$this->collSpyPaymentPayolutionOrderItems->contains($l)) {
            $this->doAddSpyPaymentPayolutionOrderItem($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem The ChildSpyPaymentPayolutionOrderItem object to add.
     */
    protected function doAddSpyPaymentPayolutionOrderItem(ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem)
    {
        $this->collSpyPaymentPayolutionOrderItems[]= $spyPaymentPayolutionOrderItem;
        $spyPaymentPayolutionOrderItem->setSpyPaymentPayolution($this);
    }

    /**
     * @param  ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem The ChildSpyPaymentPayolutionOrderItem object to remove.
     * @return $this|ChildSpyPaymentPayolution The current object (for fluent API support)
     */
    public function removeSpyPaymentPayolutionOrderItem(ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem)
    {
        if ($this->getSpyPaymentPayolutionOrderItems()->contains($spyPaymentPayolutionOrderItem)) {
            $pos = $this->collSpyPaymentPayolutionOrderItems->search($spyPaymentPayolutionOrderItem);
            $this->collSpyPaymentPayolutionOrderItems->remove($pos);
            if (null === $this->spyPaymentPayolutionOrderItemsScheduledForDeletion) {
                $this->spyPaymentPayolutionOrderItemsScheduledForDeletion = clone $this->collSpyPaymentPayolutionOrderItems;
                $this->spyPaymentPayolutionOrderItemsScheduledForDeletion->clear();
            }
            $this->spyPaymentPayolutionOrderItemsScheduledForDeletion[]= clone $spyPaymentPayolutionOrderItem;
            $spyPaymentPayolutionOrderItem->setSpyPaymentPayolution(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyPaymentPayolution is new, it will return
     * an empty collection; or if this SpyPaymentPayolution has previously
     * been saved, it will retrieve related SpyPaymentPayolutionOrderItems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyPaymentPayolution.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyPaymentPayolutionOrderItem[] List of ChildSpyPaymentPayolutionOrderItem objects
     */
    public function getSpyPaymentPayolutionOrderItemsJoinSpySalesOrderItem(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyPaymentPayolutionOrderItemQuery::create(null, $criteria);
        $query->joinWith('SpySalesOrderItem', $joinBehavior);

        return $this->getSpyPaymentPayolutionOrderItems($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpySalesOrder) {
            $this->aSpySalesOrder->removeSpyPaymentPayolution($this);
        }
        $this->id_payment_payolution = null;
        $this->fk_sales_order = null;
        $this->account_brand = null;
        $this->client_ip = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->salutation = null;
        $this->gender = null;
        $this->date_of_birth = null;
        $this->country_iso2_code = null;
        $this->city = null;
        $this->street = null;
        $this->zip_code = null;
        $this->email = null;
        $this->phone = null;
        $this->cell_phone = null;
        $this->language_iso2_code = null;
        $this->currency_iso3_code = null;
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
            if ($this->collSpyPaymentPayolutionTransactionRequestLogs) {
                foreach ($this->collSpyPaymentPayolutionTransactionRequestLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyPaymentPayolutionTransactionStatusLogs) {
                foreach ($this->collSpyPaymentPayolutionTransactionStatusLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyPaymentPayolutionOrderItems) {
                foreach ($this->collSpyPaymentPayolutionOrderItems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyPaymentPayolutionTransactionRequestLogs = null;
        $this->collSpyPaymentPayolutionTransactionStatusLogs = null;
        $this->collSpyPaymentPayolutionOrderItems = null;
        $this->aSpySalesOrder = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyPaymentPayolutionTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyPaymentPayolution The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyPaymentPayolutionTableMap::COL_UPDATED_AT] = true;

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
