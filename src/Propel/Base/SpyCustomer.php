<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyCustomer as ChildSpyCustomer;
use Propel\SpyCustomerAddress as ChildSpyCustomerAddress;
use Propel\SpyCustomerAddressQuery as ChildSpyCustomerAddressQuery;
use Propel\SpyCustomerQuery as ChildSpyCustomerQuery;
use Propel\SpyNewsletterSubscriber as ChildSpyNewsletterSubscriber;
use Propel\SpyNewsletterSubscriberQuery as ChildSpyNewsletterSubscriberQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\SpyWishlist as ChildSpyWishlist;
use Propel\SpyWishlistQuery as ChildSpyWishlistQuery;
use Propel\Map\SpyCustomerTableMap;
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
 * Base class that represents a row from the 'spy_customer' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyCustomer extends SpyCustomer implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyCustomerTableMap';


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
     * The value for the id_customer field.
     * @var        int
     */
    protected $id_customer;

    /**
     * The value for the customer_reference field.
     * @var        string
     */
    protected $customer_reference;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

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
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the company field.
     * @var        string
     */
    protected $company;

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
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the restore_password_key field.
     * @var        string
     */
    protected $restore_password_key;

    /**
     * The value for the restore_password_date field.
     * @var        \DateTime
     */
    protected $restore_password_date;

    /**
     * The value for the registered field.
     * @var        \DateTime
     */
    protected $registered;

    /**
     * The value for the registration_key field.
     * @var        string
     */
    protected $registration_key;

    /**
     * The value for the default_billing_address field.
     * @var        int
     */
    protected $default_billing_address;

    /**
     * The value for the default_shipping_address field.
     * @var        int
     */
    protected $default_shipping_address;

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
     * @var        ChildSpyCustomerAddress
     */
    protected $aBillingAddress;

    /**
     * @var        ChildSpyCustomerAddress
     */
    protected $aShippingAddress;

    /**
     * @var        ObjectCollection|ChildSpyCustomerAddress[] Collection to store aggregation of ChildSpyCustomerAddress objects.
     */
    protected $collAddresses;
    protected $collAddressesPartial;

    /**
     * @var        ObjectCollection|ChildSpyNewsletterSubscriber[] Collection to store aggregation of ChildSpyNewsletterSubscriber objects.
     */
    protected $collSpyNewsletterSubscribers;
    protected $collSpyNewsletterSubscribersPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrder[] Collection to store aggregation of ChildSpySalesOrder objects.
     */
    protected $collOrders;
    protected $collOrdersPartial;

    /**
     * @var        ObjectCollection|ChildSpyWishlist[] Collection to store aggregation of ChildSpyWishlist objects.
     */
    protected $collSpyWishlists;
    protected $collSpyWishlistsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCustomerAddress[]
     */
    protected $addressesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyNewsletterSubscriber[]
     */
    protected $spyNewsletterSubscribersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrder[]
     */
    protected $ordersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyWishlist[]
     */
    protected $spyWishlistsScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyCustomer object.
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
     * Compares this with another <code>SpyCustomer</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyCustomer</code>, delegates to
     * <code>equals(SpyCustomer)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyCustomer The current object, for fluid interface
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
     * Get the [id_customer] column value.
     *
     * @return int
     */
    public function getIdCustomer()
    {
        return $this->id_customer;
    }

    /**
     * Get the [customer_reference] column value.
     *
     * @return string
     */
    public function getCustomerReference()
    {
        return $this->customer_reference;
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
        $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_SALUTATION);
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
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
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
        $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_GENDER);
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
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [restore_password_key] column value.
     *
     * @return string
     */
    public function getRestorePasswordKey()
    {
        return $this->restore_password_key;
    }

    /**
     * Get the [optionally formatted] temporal [restore_password_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRestorePasswordDate($format = NULL)
    {
        if ($format === null) {
            return $this->restore_password_date;
        } else {
            return $this->restore_password_date instanceof \DateTime ? $this->restore_password_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [registered] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRegistered($format = NULL)
    {
        if ($format === null) {
            return $this->registered;
        } else {
            return $this->registered instanceof \DateTime ? $this->registered->format($format) : null;
        }
    }

    /**
     * Get the [registration_key] column value.
     *
     * @return string
     */
    public function getRegistrationKey()
    {
        return $this->registration_key;
    }

    /**
     * Get the [default_billing_address] column value.
     *
     * @return int
     */
    public function getDefaultBillingAddress()
    {
        return $this->default_billing_address;
    }

    /**
     * Get the [default_shipping_address] column value.
     *
     * @return int
     */
    public function getDefaultShippingAddress()
    {
        return $this->default_shipping_address;
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
     * Set the value of [id_customer] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setIdCustomer($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_customer !== $v) {
            $this->id_customer = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_ID_CUSTOMER] = true;
        }

        return $this;
    } // setIdCustomer()

    /**
     * Set the value of [customer_reference] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setCustomerReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customer_reference !== $v) {
            $this->customer_reference = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_CUSTOMER_REFERENCE] = true;
        }

        return $this;
    } // setCustomerReference()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [salutation] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_SALUTATION] = true;
        }

        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [company] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_COMPANY] = true;
        }

        return $this;
    } // setCompany()

    /**
     * Set the value of [gender] column.
     *
     * @param  string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_GENDER);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_GENDER] = true;
        }

        return $this;
    } // setGender()

    /**
     * Sets the value of [date_of_birth] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setDateOfBirth($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_of_birth !== null || $dt !== null) {
            if ($this->date_of_birth === null || $dt === null || $dt->format("Y-m-d") !== $this->date_of_birth->format("Y-m-d")) {
                $this->date_of_birth = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyCustomerTableMap::COL_DATE_OF_BIRTH] = true;
            }
        } // if either are not null

        return $this;
    } // setDateOfBirth()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [restore_password_key] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setRestorePasswordKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->restore_password_key !== $v) {
            $this->restore_password_key = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY] = true;
        }

        return $this;
    } // setRestorePasswordKey()

    /**
     * Sets the value of [restore_password_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setRestorePasswordDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->restore_password_date !== null || $dt !== null) {
            if ($this->restore_password_date === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->restore_password_date->format("Y-m-d H:i:s")) {
                $this->restore_password_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setRestorePasswordDate()

    /**
     * Sets the value of [registered] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setRegistered($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->registered !== null || $dt !== null) {
            if ($this->registered === null || $dt === null || $dt->format("Y-m-d") !== $this->registered->format("Y-m-d")) {
                $this->registered = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyCustomerTableMap::COL_REGISTERED] = true;
            }
        } // if either are not null

        return $this;
    } // setRegistered()

    /**
     * Set the value of [registration_key] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setRegistrationKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->registration_key !== $v) {
            $this->registration_key = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_REGISTRATION_KEY] = true;
        }

        return $this;
    } // setRegistrationKey()

    /**
     * Set the value of [default_billing_address] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setDefaultBillingAddress($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->default_billing_address !== $v) {
            $this->default_billing_address = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS] = true;
        }

        if ($this->aBillingAddress !== null && $this->aBillingAddress->getIdCustomerAddress() !== $v) {
            $this->aBillingAddress = null;
        }

        return $this;
    } // setDefaultBillingAddress()

    /**
     * Set the value of [default_shipping_address] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setDefaultShippingAddress($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->default_shipping_address !== $v) {
            $this->default_shipping_address = $v;
            $this->modifiedColumns[SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS] = true;
        }

        if ($this->aShippingAddress !== null && $this->aShippingAddress->getIdCustomerAddress() !== $v) {
            $this->aShippingAddress = null;
        }

        return $this;
    } // setDefaultShippingAddress()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyCustomerTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyCustomerTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyCustomerTableMap::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_customer = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyCustomerTableMap::translateFieldName('CustomerReference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_reference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyCustomerTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyCustomerTableMap::translateFieldName('Salutation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salutation = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyCustomerTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyCustomerTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyCustomerTableMap::translateFieldName('Company', TableMap::TYPE_PHPNAME, $indexType)];
            $this->company = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyCustomerTableMap::translateFieldName('Gender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gender = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyCustomerTableMap::translateFieldName('DateOfBirth', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->date_of_birth = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyCustomerTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyCustomerTableMap::translateFieldName('RestorePasswordKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->restore_password_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyCustomerTableMap::translateFieldName('RestorePasswordDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->restore_password_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpyCustomerTableMap::translateFieldName('Registered', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->registered = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpyCustomerTableMap::translateFieldName('RegistrationKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->registration_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpyCustomerTableMap::translateFieldName('DefaultBillingAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->default_billing_address = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpyCustomerTableMap::translateFieldName('DefaultShippingAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->default_shipping_address = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SpyCustomerTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SpyCustomerTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 18; // 18 = SpyCustomerTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyCustomer'), 0, $e);
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
        if ($this->aBillingAddress !== null && $this->default_billing_address !== $this->aBillingAddress->getIdCustomerAddress()) {
            $this->aBillingAddress = null;
        }
        if ($this->aShippingAddress !== null && $this->default_shipping_address !== $this->aShippingAddress->getIdCustomerAddress()) {
            $this->aShippingAddress = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyCustomerTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyCustomerQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBillingAddress = null;
            $this->aShippingAddress = null;
            $this->collAddresses = null;

            $this->collSpyNewsletterSubscribers = null;

            $this->collOrders = null;

            $this->collSpyWishlists = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyCustomer::setDeleted()
     * @see SpyCustomer::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyCustomerQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyCustomerTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyCustomerTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyCustomerTableMap::COL_UPDATED_AT)) {
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
                SpyCustomerTableMap::addInstanceToPool($this);
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

            if ($this->aBillingAddress !== null) {
                if ($this->aBillingAddress->isModified() || $this->aBillingAddress->isNew()) {
                    $affectedRows += $this->aBillingAddress->save($con);
                }
                $this->setBillingAddress($this->aBillingAddress);
            }

            if ($this->aShippingAddress !== null) {
                if ($this->aShippingAddress->isModified() || $this->aShippingAddress->isNew()) {
                    $affectedRows += $this->aShippingAddress->save($con);
                }
                $this->setShippingAddress($this->aShippingAddress);
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

            if ($this->addressesScheduledForDeletion !== null) {
                if (!$this->addressesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCustomerAddressQuery::create()
                        ->filterByPrimaryKeys($this->addressesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->addressesScheduledForDeletion = null;
                }
            }

            if ($this->collAddresses !== null) {
                foreach ($this->collAddresses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyNewsletterSubscribersScheduledForDeletion !== null) {
                if (!$this->spyNewsletterSubscribersScheduledForDeletion->isEmpty()) {
                    foreach ($this->spyNewsletterSubscribersScheduledForDeletion as $spyNewsletterSubscriber) {
                        // need to save related object because we set the relation to null
                        $spyNewsletterSubscriber->save($con);
                    }
                    $this->spyNewsletterSubscribersScheduledForDeletion = null;
                }
            }

            if ($this->collSpyNewsletterSubscribers !== null) {
                foreach ($this->collSpyNewsletterSubscribers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ordersScheduledForDeletion !== null) {
                if (!$this->ordersScheduledForDeletion->isEmpty()) {
                    foreach ($this->ordersScheduledForDeletion as $order) {
                        // need to save related object because we set the relation to null
                        $order->save($con);
                    }
                    $this->ordersScheduledForDeletion = null;
                }
            }

            if ($this->collOrders !== null) {
                foreach ($this->collOrders as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyWishlistsScheduledForDeletion !== null) {
                if (!$this->spyWishlistsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyWishlistQuery::create()
                        ->filterByPrimaryKeys($this->spyWishlistsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyWishlistsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyWishlists !== null) {
                foreach ($this->collSpyWishlists as $referrerFK) {
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

        $this->modifiedColumns[SpyCustomerTableMap::COL_ID_CUSTOMER] = true;
        if (null !== $this->id_customer) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyCustomerTableMap::COL_ID_CUSTOMER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyCustomerTableMap::COL_ID_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = 'id_customer';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_CUSTOMER_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'customer_reference';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = 'salutation';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = 'company';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_GENDER)) {
            $modifiedColumns[':p' . $index++]  = 'gender';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_DATE_OF_BIRTH)) {
            $modifiedColumns[':p' . $index++]  = 'date_of_birth';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'restore_password_key';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'restore_password_date';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_REGISTERED)) {
            $modifiedColumns[':p' . $index++]  = 'registered';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_REGISTRATION_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'registration_key';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'default_billing_address';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'default_shipping_address';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_customer (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_customer':
                        $stmt->bindValue($identifier, $this->id_customer, PDO::PARAM_INT);
                        break;
                    case 'customer_reference':
                        $stmt->bindValue($identifier, $this->customer_reference, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'salutation':
                        $stmt->bindValue($identifier, $this->salutation, PDO::PARAM_INT);
                        break;
                    case 'first_name':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'last_name':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'company':
                        $stmt->bindValue($identifier, $this->company, PDO::PARAM_STR);
                        break;
                    case 'gender':
                        $stmt->bindValue($identifier, $this->gender, PDO::PARAM_INT);
                        break;
                    case 'date_of_birth':
                        $stmt->bindValue($identifier, $this->date_of_birth ? $this->date_of_birth->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'restore_password_key':
                        $stmt->bindValue($identifier, $this->restore_password_key, PDO::PARAM_STR);
                        break;
                    case 'restore_password_date':
                        $stmt->bindValue($identifier, $this->restore_password_date ? $this->restore_password_date->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'registered':
                        $stmt->bindValue($identifier, $this->registered ? $this->registered->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'registration_key':
                        $stmt->bindValue($identifier, $this->registration_key, PDO::PARAM_STR);
                        break;
                    case 'default_billing_address':
                        $stmt->bindValue($identifier, $this->default_billing_address, PDO::PARAM_INT);
                        break;
                    case 'default_shipping_address':
                        $stmt->bindValue($identifier, $this->default_shipping_address, PDO::PARAM_INT);
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
            $pk = $con->lastInsertId('spy_customer_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCustomer($pk);

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
        $pos = SpyCustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdCustomer();
                break;
            case 1:
                return $this->getCustomerReference();
                break;
            case 2:
                return $this->getEmail();
                break;
            case 3:
                return $this->getSalutation();
                break;
            case 4:
                return $this->getFirstName();
                break;
            case 5:
                return $this->getLastName();
                break;
            case 6:
                return $this->getCompany();
                break;
            case 7:
                return $this->getGender();
                break;
            case 8:
                return $this->getDateOfBirth();
                break;
            case 9:
                return $this->getPassword();
                break;
            case 10:
                return $this->getRestorePasswordKey();
                break;
            case 11:
                return $this->getRestorePasswordDate();
                break;
            case 12:
                return $this->getRegistered();
                break;
            case 13:
                return $this->getRegistrationKey();
                break;
            case 14:
                return $this->getDefaultBillingAddress();
                break;
            case 15:
                return $this->getDefaultShippingAddress();
                break;
            case 16:
                return $this->getCreatedAt();
                break;
            case 17:
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

        if (isset($alreadyDumpedObjects['SpyCustomer'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyCustomer'][$this->hashCode()] = true;
        $keys = SpyCustomerTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCustomer(),
            $keys[1] => $this->getCustomerReference(),
            $keys[2] => $this->getEmail(),
            $keys[3] => $this->getSalutation(),
            $keys[4] => $this->getFirstName(),
            $keys[5] => $this->getLastName(),
            $keys[6] => $this->getCompany(),
            $keys[7] => $this->getGender(),
            $keys[8] => $this->getDateOfBirth(),
            $keys[9] => $this->getPassword(),
            $keys[10] => $this->getRestorePasswordKey(),
            $keys[11] => $this->getRestorePasswordDate(),
            $keys[12] => $this->getRegistered(),
            $keys[13] => $this->getRegistrationKey(),
            $keys[14] => $this->getDefaultBillingAddress(),
            $keys[15] => $this->getDefaultShippingAddress(),
            $keys[16] => $this->getCreatedAt(),
            $keys[17] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[8]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[8]];
            $result[$keys[8]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
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

        if ($result[$keys[16]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[16]];
            $result[$keys[16]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[17]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[17]];
            $result[$keys[17]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aBillingAddress) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCustomerAddress';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_customer_address';
                        break;
                    default:
                        $key = 'SpyCustomerAddress';
                }

                $result[$key] = $this->aBillingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aShippingAddress) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCustomerAddress';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_customer_address';
                        break;
                    default:
                        $key = 'SpyCustomerAddress';
                }

                $result[$key] = $this->aShippingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAddresses) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCustomerAddresses';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_customer_addresses';
                        break;
                    default:
                        $key = 'SpyCustomerAddresses';
                }

                $result[$key] = $this->collAddresses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyNewsletterSubscribers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyNewsletterSubscribers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_newsletter_subscribers';
                        break;
                    default:
                        $key = 'SpyNewsletterSubscribers';
                }

                $result[$key] = $this->collSpyNewsletterSubscribers->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrders) {

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

                $result[$key] = $this->collOrders->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyWishlists) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyWishlists';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_wishlists';
                        break;
                    default:
                        $key = 'SpyWishlists';
                }

                $result[$key] = $this->collSpyWishlists->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyCustomer
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyCustomerTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyCustomer
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCustomer($value);
                break;
            case 1:
                $this->setCustomerReference($value);
                break;
            case 2:
                $this->setEmail($value);
                break;
            case 3:
                $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 4:
                $this->setFirstName($value);
                break;
            case 5:
                $this->setLastName($value);
                break;
            case 6:
                $this->setCompany($value);
                break;
            case 7:
                $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_GENDER);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setGender($value);
                break;
            case 8:
                $this->setDateOfBirth($value);
                break;
            case 9:
                $this->setPassword($value);
                break;
            case 10:
                $this->setRestorePasswordKey($value);
                break;
            case 11:
                $this->setRestorePasswordDate($value);
                break;
            case 12:
                $this->setRegistered($value);
                break;
            case 13:
                $this->setRegistrationKey($value);
                break;
            case 14:
                $this->setDefaultBillingAddress($value);
                break;
            case 15:
                $this->setDefaultShippingAddress($value);
                break;
            case 16:
                $this->setCreatedAt($value);
                break;
            case 17:
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
        $keys = SpyCustomerTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCustomer($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCustomerReference($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEmail($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSalutation($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFirstName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLastName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCompany($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setGender($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDateOfBirth($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPassword($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setRestorePasswordKey($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setRestorePasswordDate($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setRegistered($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setRegistrationKey($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDefaultBillingAddress($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDefaultShippingAddress($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCreatedAt($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setUpdatedAt($arr[$keys[17]]);
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
     * @return $this|\Propel\SpyCustomer The current object, for fluid interface
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
        $criteria = new Criteria(SpyCustomerTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyCustomerTableMap::COL_ID_CUSTOMER)) {
            $criteria->add(SpyCustomerTableMap::COL_ID_CUSTOMER, $this->id_customer);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_CUSTOMER_REFERENCE)) {
            $criteria->add(SpyCustomerTableMap::COL_CUSTOMER_REFERENCE, $this->customer_reference);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_EMAIL)) {
            $criteria->add(SpyCustomerTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_SALUTATION)) {
            $criteria->add(SpyCustomerTableMap::COL_SALUTATION, $this->salutation);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_FIRST_NAME)) {
            $criteria->add(SpyCustomerTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_LAST_NAME)) {
            $criteria->add(SpyCustomerTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_COMPANY)) {
            $criteria->add(SpyCustomerTableMap::COL_COMPANY, $this->company);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_GENDER)) {
            $criteria->add(SpyCustomerTableMap::COL_GENDER, $this->gender);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_DATE_OF_BIRTH)) {
            $criteria->add(SpyCustomerTableMap::COL_DATE_OF_BIRTH, $this->date_of_birth);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_PASSWORD)) {
            $criteria->add(SpyCustomerTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY)) {
            $criteria->add(SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY, $this->restore_password_key);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE)) {
            $criteria->add(SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE, $this->restore_password_date);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_REGISTERED)) {
            $criteria->add(SpyCustomerTableMap::COL_REGISTERED, $this->registered);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_REGISTRATION_KEY)) {
            $criteria->add(SpyCustomerTableMap::COL_REGISTRATION_KEY, $this->registration_key);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS)) {
            $criteria->add(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS, $this->default_billing_address);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS)) {
            $criteria->add(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS, $this->default_shipping_address);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyCustomerTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyCustomerTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyCustomerTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyCustomerQuery::create();
        $criteria->add(SpyCustomerTableMap::COL_ID_CUSTOMER, $this->id_customer);

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
        $validPk = null !== $this->getIdCustomer();

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
        return $this->getIdCustomer();
    }

    /**
     * Generic method to set the primary key (id_customer column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCustomer($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdCustomer();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyCustomer (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCustomerReference($this->getCustomerReference());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setSalutation($this->getSalutation());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setCompany($this->getCompany());
        $copyObj->setGender($this->getGender());
        $copyObj->setDateOfBirth($this->getDateOfBirth());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setRestorePasswordKey($this->getRestorePasswordKey());
        $copyObj->setRestorePasswordDate($this->getRestorePasswordDate());
        $copyObj->setRegistered($this->getRegistered());
        $copyObj->setRegistrationKey($this->getRegistrationKey());
        $copyObj->setDefaultBillingAddress($this->getDefaultBillingAddress());
        $copyObj->setDefaultShippingAddress($this->getDefaultShippingAddress());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAddresses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAddress($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyNewsletterSubscribers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyNewsletterSubscriber($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyWishlists() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyWishlist($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCustomer(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyCustomer Clone of current object.
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
     * Declares an association between this object and a ChildSpyCustomerAddress object.
     *
     * @param  ChildSpyCustomerAddress $v
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBillingAddress(ChildSpyCustomerAddress $v = null)
    {
        if ($v === null) {
            $this->setDefaultBillingAddress(NULL);
        } else {
            $this->setDefaultBillingAddress($v->getIdCustomerAddress());
        }

        $this->aBillingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCustomerAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerBillingAddress($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCustomerAddress object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCustomerAddress The associated ChildSpyCustomerAddress object.
     * @throws PropelException
     */
    public function getBillingAddress(ConnectionInterface $con = null)
    {
        if ($this->aBillingAddress === null && ($this->default_billing_address !== null)) {
            $this->aBillingAddress = ChildSpyCustomerAddressQuery::create()->findPk($this->default_billing_address, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBillingAddress->addCustomerBillingAddresses($this);
             */
        }

        return $this->aBillingAddress;
    }

    /**
     * Declares an association between this object and a ChildSpyCustomerAddress object.
     *
     * @param  ChildSpyCustomerAddress $v
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShippingAddress(ChildSpyCustomerAddress $v = null)
    {
        if ($v === null) {
            $this->setDefaultShippingAddress(NULL);
        } else {
            $this->setDefaultShippingAddress($v->getIdCustomerAddress());
        }

        $this->aShippingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCustomerAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerShippingAddress($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCustomerAddress object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCustomerAddress The associated ChildSpyCustomerAddress object.
     * @throws PropelException
     */
    public function getShippingAddress(ConnectionInterface $con = null)
    {
        if ($this->aShippingAddress === null && ($this->default_shipping_address !== null)) {
            $this->aShippingAddress = ChildSpyCustomerAddressQuery::create()->findPk($this->default_shipping_address, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShippingAddress->addCustomerShippingAddresses($this);
             */
        }

        return $this->aShippingAddress;
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
        if ('Address' == $relationName) {
            return $this->initAddresses();
        }
        if ('SpyNewsletterSubscriber' == $relationName) {
            return $this->initSpyNewsletterSubscribers();
        }
        if ('Order' == $relationName) {
            return $this->initOrders();
        }
        if ('SpyWishlist' == $relationName) {
            return $this->initSpyWishlists();
        }
    }

    /**
     * Clears out the collAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAddresses()
     */
    public function clearAddresses()
    {
        $this->collAddresses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAddresses collection loaded partially.
     */
    public function resetPartialAddresses($v = true)
    {
        $this->collAddressesPartial = $v;
    }

    /**
     * Initializes the collAddresses collection.
     *
     * By default this just sets the collAddresses collection to an empty array (like clearcollAddresses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAddresses($overrideExisting = true)
    {
        if (null !== $this->collAddresses && !$overrideExisting) {
            return;
        }
        $this->collAddresses = new ObjectCollection();
        $this->collAddresses->setModel('\Propel\SpyCustomerAddress');
    }

    /**
     * Gets an array of ChildSpyCustomerAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCustomerAddress[] List of ChildSpyCustomerAddress objects
     * @throws PropelException
     */
    public function getAddresses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAddressesPartial && !$this->isNew();
        if (null === $this->collAddresses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAddresses) {
                // return empty collection
                $this->initAddresses();
            } else {
                $collAddresses = ChildSpyCustomerAddressQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAddressesPartial && count($collAddresses)) {
                        $this->initAddresses(false);

                        foreach ($collAddresses as $obj) {
                            if (false == $this->collAddresses->contains($obj)) {
                                $this->collAddresses->append($obj);
                            }
                        }

                        $this->collAddressesPartial = true;
                    }

                    return $collAddresses;
                }

                if ($partial && $this->collAddresses) {
                    foreach ($this->collAddresses as $obj) {
                        if ($obj->isNew()) {
                            $collAddresses[] = $obj;
                        }
                    }
                }

                $this->collAddresses = $collAddresses;
                $this->collAddressesPartial = false;
            }
        }

        return $this->collAddresses;
    }

    /**
     * Sets a collection of ChildSpyCustomerAddress objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $addresses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function setAddresses(Collection $addresses, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCustomerAddress[] $addressesToDelete */
        $addressesToDelete = $this->getAddresses(new Criteria(), $con)->diff($addresses);


        $this->addressesScheduledForDeletion = $addressesToDelete;

        foreach ($addressesToDelete as $addressRemoved) {
            $addressRemoved->setCustomer(null);
        }

        $this->collAddresses = null;
        foreach ($addresses as $address) {
            $this->addAddress($address);
        }

        $this->collAddresses = $addresses;
        $this->collAddressesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCustomerAddress objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCustomerAddress objects.
     * @throws PropelException
     */
    public function countAddresses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAddressesPartial && !$this->isNew();
        if (null === $this->collAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAddresses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAddresses());
            }

            $query = ChildSpyCustomerAddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collAddresses);
    }

    /**
     * Method called to associate a ChildSpyCustomerAddress object to this object
     * through the ChildSpyCustomerAddress foreign key attribute.
     *
     * @param  ChildSpyCustomerAddress $l ChildSpyCustomerAddress
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function addAddress(ChildSpyCustomerAddress $l)
    {
        if ($this->collAddresses === null) {
            $this->initAddresses();
            $this->collAddressesPartial = true;
        }

        if (!$this->collAddresses->contains($l)) {
            $this->doAddAddress($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCustomerAddress $address The ChildSpyCustomerAddress object to add.
     */
    protected function doAddAddress(ChildSpyCustomerAddress $address)
    {
        $this->collAddresses[]= $address;
        $address->setCustomer($this);
    }

    /**
     * @param  ChildSpyCustomerAddress $address The ChildSpyCustomerAddress object to remove.
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function removeAddress(ChildSpyCustomerAddress $address)
    {
        if ($this->getAddresses()->contains($address)) {
            $pos = $this->collAddresses->search($address);
            $this->collAddresses->remove($pos);
            if (null === $this->addressesScheduledForDeletion) {
                $this->addressesScheduledForDeletion = clone $this->collAddresses;
                $this->addressesScheduledForDeletion->clear();
            }
            $this->addressesScheduledForDeletion[]= clone $address;
            $address->setCustomer(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCustomer is new, it will return
     * an empty collection; or if this SpyCustomer has previously
     * been saved, it will retrieve related Addresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCustomer.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCustomerAddress[] List of ChildSpyCustomerAddress objects
     */
    public function getAddressesJoinRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Region', $joinBehavior);

        return $this->getAddresses($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCustomer is new, it will return
     * an empty collection; or if this SpyCustomer has previously
     * been saved, it will retrieve related Addresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCustomer.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCustomerAddress[] List of ChildSpyCustomerAddress objects
     */
    public function getAddressesJoinCountry(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Country', $joinBehavior);

        return $this->getAddresses($query, $con);
    }

    /**
     * Clears out the collSpyNewsletterSubscribers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyNewsletterSubscribers()
     */
    public function clearSpyNewsletterSubscribers()
    {
        $this->collSpyNewsletterSubscribers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyNewsletterSubscribers collection loaded partially.
     */
    public function resetPartialSpyNewsletterSubscribers($v = true)
    {
        $this->collSpyNewsletterSubscribersPartial = $v;
    }

    /**
     * Initializes the collSpyNewsletterSubscribers collection.
     *
     * By default this just sets the collSpyNewsletterSubscribers collection to an empty array (like clearcollSpyNewsletterSubscribers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyNewsletterSubscribers($overrideExisting = true)
    {
        if (null !== $this->collSpyNewsletterSubscribers && !$overrideExisting) {
            return;
        }
        $this->collSpyNewsletterSubscribers = new ObjectCollection();
        $this->collSpyNewsletterSubscribers->setModel('\Propel\SpyNewsletterSubscriber');
    }

    /**
     * Gets an array of ChildSpyNewsletterSubscriber objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyNewsletterSubscriber[] List of ChildSpyNewsletterSubscriber objects
     * @throws PropelException
     */
    public function getSpyNewsletterSubscribers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyNewsletterSubscribersPartial && !$this->isNew();
        if (null === $this->collSpyNewsletterSubscribers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyNewsletterSubscribers) {
                // return empty collection
                $this->initSpyNewsletterSubscribers();
            } else {
                $collSpyNewsletterSubscribers = ChildSpyNewsletterSubscriberQuery::create(null, $criteria)
                    ->filterBySpyCustomer($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyNewsletterSubscribersPartial && count($collSpyNewsletterSubscribers)) {
                        $this->initSpyNewsletterSubscribers(false);

                        foreach ($collSpyNewsletterSubscribers as $obj) {
                            if (false == $this->collSpyNewsletterSubscribers->contains($obj)) {
                                $this->collSpyNewsletterSubscribers->append($obj);
                            }
                        }

                        $this->collSpyNewsletterSubscribersPartial = true;
                    }

                    return $collSpyNewsletterSubscribers;
                }

                if ($partial && $this->collSpyNewsletterSubscribers) {
                    foreach ($this->collSpyNewsletterSubscribers as $obj) {
                        if ($obj->isNew()) {
                            $collSpyNewsletterSubscribers[] = $obj;
                        }
                    }
                }

                $this->collSpyNewsletterSubscribers = $collSpyNewsletterSubscribers;
                $this->collSpyNewsletterSubscribersPartial = false;
            }
        }

        return $this->collSpyNewsletterSubscribers;
    }

    /**
     * Sets a collection of ChildSpyNewsletterSubscriber objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyNewsletterSubscribers A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function setSpyNewsletterSubscribers(Collection $spyNewsletterSubscribers, ConnectionInterface $con = null)
    {
        /** @var ChildSpyNewsletterSubscriber[] $spyNewsletterSubscribersToDelete */
        $spyNewsletterSubscribersToDelete = $this->getSpyNewsletterSubscribers(new Criteria(), $con)->diff($spyNewsletterSubscribers);


        $this->spyNewsletterSubscribersScheduledForDeletion = $spyNewsletterSubscribersToDelete;

        foreach ($spyNewsletterSubscribersToDelete as $spyNewsletterSubscriberRemoved) {
            $spyNewsletterSubscriberRemoved->setSpyCustomer(null);
        }

        $this->collSpyNewsletterSubscribers = null;
        foreach ($spyNewsletterSubscribers as $spyNewsletterSubscriber) {
            $this->addSpyNewsletterSubscriber($spyNewsletterSubscriber);
        }

        $this->collSpyNewsletterSubscribers = $spyNewsletterSubscribers;
        $this->collSpyNewsletterSubscribersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyNewsletterSubscriber objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyNewsletterSubscriber objects.
     * @throws PropelException
     */
    public function countSpyNewsletterSubscribers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyNewsletterSubscribersPartial && !$this->isNew();
        if (null === $this->collSpyNewsletterSubscribers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyNewsletterSubscribers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyNewsletterSubscribers());
            }

            $query = ChildSpyNewsletterSubscriberQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyCustomer($this)
                ->count($con);
        }

        return count($this->collSpyNewsletterSubscribers);
    }

    /**
     * Method called to associate a ChildSpyNewsletterSubscriber object to this object
     * through the ChildSpyNewsletterSubscriber foreign key attribute.
     *
     * @param  ChildSpyNewsletterSubscriber $l ChildSpyNewsletterSubscriber
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function addSpyNewsletterSubscriber(ChildSpyNewsletterSubscriber $l)
    {
        if ($this->collSpyNewsletterSubscribers === null) {
            $this->initSpyNewsletterSubscribers();
            $this->collSpyNewsletterSubscribersPartial = true;
        }

        if (!$this->collSpyNewsletterSubscribers->contains($l)) {
            $this->doAddSpyNewsletterSubscriber($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyNewsletterSubscriber $spyNewsletterSubscriber The ChildSpyNewsletterSubscriber object to add.
     */
    protected function doAddSpyNewsletterSubscriber(ChildSpyNewsletterSubscriber $spyNewsletterSubscriber)
    {
        $this->collSpyNewsletterSubscribers[]= $spyNewsletterSubscriber;
        $spyNewsletterSubscriber->setSpyCustomer($this);
    }

    /**
     * @param  ChildSpyNewsletterSubscriber $spyNewsletterSubscriber The ChildSpyNewsletterSubscriber object to remove.
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function removeSpyNewsletterSubscriber(ChildSpyNewsletterSubscriber $spyNewsletterSubscriber)
    {
        if ($this->getSpyNewsletterSubscribers()->contains($spyNewsletterSubscriber)) {
            $pos = $this->collSpyNewsletterSubscribers->search($spyNewsletterSubscriber);
            $this->collSpyNewsletterSubscribers->remove($pos);
            if (null === $this->spyNewsletterSubscribersScheduledForDeletion) {
                $this->spyNewsletterSubscribersScheduledForDeletion = clone $this->collSpyNewsletterSubscribers;
                $this->spyNewsletterSubscribersScheduledForDeletion->clear();
            }
            $this->spyNewsletterSubscribersScheduledForDeletion[]= $spyNewsletterSubscriber;
            $spyNewsletterSubscriber->setSpyCustomer(null);
        }

        return $this;
    }

    /**
     * Clears out the collOrders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addOrders()
     */
    public function clearOrders()
    {
        $this->collOrders = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collOrders collection loaded partially.
     */
    public function resetPartialOrders($v = true)
    {
        $this->collOrdersPartial = $v;
    }

    /**
     * Initializes the collOrders collection.
     *
     * By default this just sets the collOrders collection to an empty array (like clearcollOrders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrders($overrideExisting = true)
    {
        if (null !== $this->collOrders && !$overrideExisting) {
            return;
        }
        $this->collOrders = new ObjectCollection();
        $this->collOrders->setModel('\Propel\SpySalesOrder');
    }

    /**
     * Gets an array of ChildSpySalesOrder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     * @throws PropelException
     */
    public function getOrders(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                // return empty collection
                $this->initOrders();
            } else {
                $collOrders = ChildSpySalesOrderQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collOrdersPartial && count($collOrders)) {
                        $this->initOrders(false);

                        foreach ($collOrders as $obj) {
                            if (false == $this->collOrders->contains($obj)) {
                                $this->collOrders->append($obj);
                            }
                        }

                        $this->collOrdersPartial = true;
                    }

                    return $collOrders;
                }

                if ($partial && $this->collOrders) {
                    foreach ($this->collOrders as $obj) {
                        if ($obj->isNew()) {
                            $collOrders[] = $obj;
                        }
                    }
                }

                $this->collOrders = $collOrders;
                $this->collOrdersPartial = false;
            }
        }

        return $this->collOrders;
    }

    /**
     * Sets a collection of ChildSpySalesOrder objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $orders A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function setOrders(Collection $orders, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrder[] $ordersToDelete */
        $ordersToDelete = $this->getOrders(new Criteria(), $con)->diff($orders);


        $this->ordersScheduledForDeletion = $ordersToDelete;

        foreach ($ordersToDelete as $orderRemoved) {
            $orderRemoved->setCustomer(null);
        }

        $this->collOrders = null;
        foreach ($orders as $order) {
            $this->addOrder($order);
        }

        $this->collOrders = $orders;
        $this->collOrdersPartial = false;

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
    public function countOrders(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrders());
            }

            $query = ChildSpySalesOrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collOrders);
    }

    /**
     * Method called to associate a ChildSpySalesOrder object to this object
     * through the ChildSpySalesOrder foreign key attribute.
     *
     * @param  ChildSpySalesOrder $l ChildSpySalesOrder
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function addOrder(ChildSpySalesOrder $l)
    {
        if ($this->collOrders === null) {
            $this->initOrders();
            $this->collOrdersPartial = true;
        }

        if (!$this->collOrders->contains($l)) {
            $this->doAddOrder($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrder $order The ChildSpySalesOrder object to add.
     */
    protected function doAddOrder(ChildSpySalesOrder $order)
    {
        $this->collOrders[]= $order;
        $order->setCustomer($this);
    }

    /**
     * @param  ChildSpySalesOrder $order The ChildSpySalesOrder object to remove.
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function removeOrder(ChildSpySalesOrder $order)
    {
        if ($this->getOrders()->contains($order)) {
            $pos = $this->collOrders->search($order);
            $this->collOrders->remove($pos);
            if (null === $this->ordersScheduledForDeletion) {
                $this->ordersScheduledForDeletion = clone $this->collOrders;
                $this->ordersScheduledForDeletion->clear();
            }
            $this->ordersScheduledForDeletion[]= $order;
            $order->setCustomer(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCustomer is new, it will return
     * an empty collection; or if this SpyCustomer has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCustomer.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getOrdersJoinBillingAddress(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('BillingAddress', $joinBehavior);

        return $this->getOrders($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCustomer is new, it will return
     * an empty collection; or if this SpyCustomer has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCustomer.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getOrdersJoinShippingAddress(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('ShippingAddress', $joinBehavior);

        return $this->getOrders($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCustomer is new, it will return
     * an empty collection; or if this SpyCustomer has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCustomer.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrder[] List of ChildSpySalesOrder objects
     */
    public function getOrdersJoinShipmentMethod(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderQuery::create(null, $criteria);
        $query->joinWith('ShipmentMethod', $joinBehavior);

        return $this->getOrders($query, $con);
    }

    /**
     * Clears out the collSpyWishlists collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyWishlists()
     */
    public function clearSpyWishlists()
    {
        $this->collSpyWishlists = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyWishlists collection loaded partially.
     */
    public function resetPartialSpyWishlists($v = true)
    {
        $this->collSpyWishlistsPartial = $v;
    }

    /**
     * Initializes the collSpyWishlists collection.
     *
     * By default this just sets the collSpyWishlists collection to an empty array (like clearcollSpyWishlists());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyWishlists($overrideExisting = true)
    {
        if (null !== $this->collSpyWishlists && !$overrideExisting) {
            return;
        }
        $this->collSpyWishlists = new ObjectCollection();
        $this->collSpyWishlists->setModel('\Propel\SpyWishlist');
    }

    /**
     * Gets an array of ChildSpyWishlist objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyWishlist[] List of ChildSpyWishlist objects
     * @throws PropelException
     */
    public function getSpyWishlists(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyWishlistsPartial && !$this->isNew();
        if (null === $this->collSpyWishlists || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyWishlists) {
                // return empty collection
                $this->initSpyWishlists();
            } else {
                $collSpyWishlists = ChildSpyWishlistQuery::create(null, $criteria)
                    ->filterBySpyCustomer($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyWishlistsPartial && count($collSpyWishlists)) {
                        $this->initSpyWishlists(false);

                        foreach ($collSpyWishlists as $obj) {
                            if (false == $this->collSpyWishlists->contains($obj)) {
                                $this->collSpyWishlists->append($obj);
                            }
                        }

                        $this->collSpyWishlistsPartial = true;
                    }

                    return $collSpyWishlists;
                }

                if ($partial && $this->collSpyWishlists) {
                    foreach ($this->collSpyWishlists as $obj) {
                        if ($obj->isNew()) {
                            $collSpyWishlists[] = $obj;
                        }
                    }
                }

                $this->collSpyWishlists = $collSpyWishlists;
                $this->collSpyWishlistsPartial = false;
            }
        }

        return $this->collSpyWishlists;
    }

    /**
     * Sets a collection of ChildSpyWishlist objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyWishlists A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function setSpyWishlists(Collection $spyWishlists, ConnectionInterface $con = null)
    {
        /** @var ChildSpyWishlist[] $spyWishlistsToDelete */
        $spyWishlistsToDelete = $this->getSpyWishlists(new Criteria(), $con)->diff($spyWishlists);


        $this->spyWishlistsScheduledForDeletion = $spyWishlistsToDelete;

        foreach ($spyWishlistsToDelete as $spyWishlistRemoved) {
            $spyWishlistRemoved->setSpyCustomer(null);
        }

        $this->collSpyWishlists = null;
        foreach ($spyWishlists as $spyWishlist) {
            $this->addSpyWishlist($spyWishlist);
        }

        $this->collSpyWishlists = $spyWishlists;
        $this->collSpyWishlistsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyWishlist objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyWishlist objects.
     * @throws PropelException
     */
    public function countSpyWishlists(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyWishlistsPartial && !$this->isNew();
        if (null === $this->collSpyWishlists || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyWishlists) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyWishlists());
            }

            $query = ChildSpyWishlistQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyCustomer($this)
                ->count($con);
        }

        return count($this->collSpyWishlists);
    }

    /**
     * Method called to associate a ChildSpyWishlist object to this object
     * through the ChildSpyWishlist foreign key attribute.
     *
     * @param  ChildSpyWishlist $l ChildSpyWishlist
     * @return $this|\Propel\SpyCustomer The current object (for fluent API support)
     */
    public function addSpyWishlist(ChildSpyWishlist $l)
    {
        if ($this->collSpyWishlists === null) {
            $this->initSpyWishlists();
            $this->collSpyWishlistsPartial = true;
        }

        if (!$this->collSpyWishlists->contains($l)) {
            $this->doAddSpyWishlist($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyWishlist $spyWishlist The ChildSpyWishlist object to add.
     */
    protected function doAddSpyWishlist(ChildSpyWishlist $spyWishlist)
    {
        $this->collSpyWishlists[]= $spyWishlist;
        $spyWishlist->setSpyCustomer($this);
    }

    /**
     * @param  ChildSpyWishlist $spyWishlist The ChildSpyWishlist object to remove.
     * @return $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function removeSpyWishlist(ChildSpyWishlist $spyWishlist)
    {
        if ($this->getSpyWishlists()->contains($spyWishlist)) {
            $pos = $this->collSpyWishlists->search($spyWishlist);
            $this->collSpyWishlists->remove($pos);
            if (null === $this->spyWishlistsScheduledForDeletion) {
                $this->spyWishlistsScheduledForDeletion = clone $this->collSpyWishlists;
                $this->spyWishlistsScheduledForDeletion->clear();
            }
            $this->spyWishlistsScheduledForDeletion[]= clone $spyWishlist;
            $spyWishlist->setSpyCustomer(null);
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
        if (null !== $this->aBillingAddress) {
            $this->aBillingAddress->removeCustomerBillingAddress($this);
        }
        if (null !== $this->aShippingAddress) {
            $this->aShippingAddress->removeCustomerShippingAddress($this);
        }
        $this->id_customer = null;
        $this->customer_reference = null;
        $this->email = null;
        $this->salutation = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->company = null;
        $this->gender = null;
        $this->date_of_birth = null;
        $this->password = null;
        $this->restore_password_key = null;
        $this->restore_password_date = null;
        $this->registered = null;
        $this->registration_key = null;
        $this->default_billing_address = null;
        $this->default_shipping_address = null;
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
            if ($this->collAddresses) {
                foreach ($this->collAddresses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyNewsletterSubscribers) {
                foreach ($this->collSpyNewsletterSubscribers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrders) {
                foreach ($this->collOrders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyWishlists) {
                foreach ($this->collSpyWishlists as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAddresses = null;
        $this->collSpyNewsletterSubscribers = null;
        $this->collOrders = null;
        $this->collSpyWishlists = null;
        $this->aBillingAddress = null;
        $this->aShippingAddress = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyCustomerTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyCustomer The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyCustomerTableMap::COL_UPDATED_AT] = true;

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
