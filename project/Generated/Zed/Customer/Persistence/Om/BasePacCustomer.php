<?php


/**
 * Base class that represents a row from the 'pac_customer' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/crm-package/ProjectA/Zed/Customer/Persistence.om
 */
abstract class Generated_Zed_Customer_Persistence_Om_BasePacCustomer extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Customer_Persistence_PacCustomerPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Customer_Persistence_PacCustomerPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_customer field.
     * @var        int
     */
    protected $id_customer;

    /**
     * The value for the fk_customer_status field.
     * @var        int
     */
    protected $fk_customer_status;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the increment_id field.
     * @var        string
     */
    protected $increment_id;

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
     * The value for the gender field.
     * @var        int
     */
    protected $gender;

    /**
     * The value for the date_of_birth field.
     * @var        string
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
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        PacCustomerAddress
     */
    protected $aBillingAddress;

    /**
     * @var        PacCustomerAddress
     */
    protected $aShippingAddress;

    /**
     * @var        PacCustomerStatus
     */
    protected $aStatus;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cart_Persistence_PacCartUser[] Collection to store aggregation of ProjectA_Zed_Cart_Persistence_PacCartUser objects.
     */
    protected $collCartUsers;
    protected $collCartUsersPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer_Persistence_PacCustomerAddress[] Collection to store aggregation of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects.
     */
    protected $collAddresses;
    protected $collAddressesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription[] Collection to store aggregation of ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription objects.
     */
    protected $collNewsletterSubscriptions;
    protected $collNewsletterSubscriptionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     */
    protected $collOrders;
    protected $collOrdersPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[] Collection to store aggregation of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects.
     */
    protected $collSalesruleCodes;
    protected $collSalesruleCodesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] Collection to store aggregation of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects.
     */
    protected $collCodeUsages;
    protected $collCodeUsagesPartial;

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
    protected $cartUsersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $addressesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $newsletterSubscriptionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ordersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $salesruleCodesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $codeUsagesScheduledForDeletion = null;

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
     * Get the [fk_customer_status] column value.
     *
     * @return int
     */
    public function getFkCustomerStatus()
    {
        return $this->fk_customer_status;
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
     * Get the [increment_id] column value.
     *
     * @return string
     */
    public function getIncrementId()
    {
        return $this->increment_id;
    }

    /**
     * Get the [salutation] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getSalutation()
    {
        if (null === $this->salutation) {
            return null;
        }
        $valueSet = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getValueSet(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION);
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
     * Get the [gender] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getGender()
    {
        if (null === $this->gender) {
            return null;
        }
        $valueSet = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getValueSet(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER);
        if (!isset($valueSet[$this->gender])) {
            throw new PropelException('Unknown stored enum key: ' . $this->gender);
        }

        return $valueSet[$this->gender];
    }

    /**
     * Get the [optionally formatted] temporal [date_of_birth] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateOfBirth($format = '%x')
    {
        if ($this->date_of_birth === null) {
            return null;
        }

        if ($this->date_of_birth === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date_of_birth);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_of_birth, true), $x);
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
     * Set the value of [id_customer] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setIdCustomer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_customer !== $v) {
            $this->id_customer = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER;
        }


        return $this;
    } // setIdCustomer()

    /**
     * Set the value of [fk_customer_status] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setFkCustomerStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_customer_status !== $v) {
            $this->fk_customer_status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS;
        }

        if ($this->aStatus !== null && $this->aStatus->getIdCustomerStatus() !== $v) {
            $this->aStatus = null;
        }


        return $this;
    } // setFkCustomerStatus()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [increment_id] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setIncrementId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->increment_id !== $v) {
            $this->increment_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::INCREMENT_ID;
        }


        return $this;
    } // setIncrementId()

    /**
     * Set the value of [salutation] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getValueSet(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION;
        }


        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [gender] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getValueSet(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER;
        }


        return $this;
    } // setGender()

    /**
     * Sets the value of [date_of_birth] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setDateOfBirth($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_of_birth !== null || $dt !== null) {
            $currentDateAsString = ($this->date_of_birth !== null && $tmpDt = new DateTime($this->date_of_birth)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date_of_birth = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATE_OF_BIRTH;
            }
        } // if either are not null


        return $this;
    } // setDateOfBirth()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [restore_password_key] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setRestorePasswordKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->restore_password_key !== $v) {
            $this->restore_password_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::RESTORE_PASSWORD_KEY;
        }


        return $this;
    } // setRestorePasswordKey()

    /**
     * Set the value of [default_billing_address] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setDefaultBillingAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->default_billing_address !== $v) {
            $this->default_billing_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS;
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setDefaultShippingAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->default_shipping_address !== $v) {
            $this->default_shipping_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS;
        }

        if ($this->aShippingAddress !== null && $this->aShippingAddress->getIdCustomerAddress() !== $v) {
            $this->aShippingAddress = null;
        }


        return $this;
    } // setDefaultShippingAddress()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT;
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

            $this->id_customer = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_customer_status = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->email = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->increment_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->salutation = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->first_name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->gender = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->date_of_birth = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->password = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->restore_password_key = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->default_billing_address = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->default_shipping_address = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->created_at = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updated_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Customer_Persistence_PacCustomer object", $e);
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

        if ($this->aStatus !== null && $this->fk_customer_status !== $this->aStatus->getIdCustomerStatus()) {
            $this->aStatus = null;
        }
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
            $con = Propel::getConnection(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBillingAddress = null;
            $this->aShippingAddress = null;
            $this->aStatus = null;
            $this->collCartUsers = null;

            $this->collAddresses = null;

            $this->collNewsletterSubscriptions = null;

            $this->collOrders = null;

            $this->collSalesruleCodes = null;

            $this->collCodeUsages = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Customer_Persistence_PacCustomerQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addInstanceToPool($this);
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

            if ($this->aStatus !== null) {
                if ($this->aStatus->isModified() || $this->aStatus->isNew()) {
                    $affectedRows += $this->aStatus->save($con);
                }
                $this->setStatus($this->aStatus);
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

            if ($this->cartUsersScheduledForDeletion !== null) {
                if (!$this->cartUsersScheduledForDeletion->isEmpty()) {
                    foreach ($this->cartUsersScheduledForDeletion as $cartUser) {
                        // need to save related object because we set the relation to null
                        $cartUser->save($con);
                    }
                    $this->cartUsersScheduledForDeletion = null;
                }
            }

            if ($this->collCartUsers !== null) {
                foreach ($this->collCartUsers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->addressesScheduledForDeletion !== null) {
                if (!$this->addressesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create()
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

            if ($this->newsletterSubscriptionsScheduledForDeletion !== null) {
                if (!$this->newsletterSubscriptionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->newsletterSubscriptionsScheduledForDeletion as $newsletterSubscription) {
                        // need to save related object because we set the relation to null
                        $newsletterSubscription->save($con);
                    }
                    $this->newsletterSubscriptionsScheduledForDeletion = null;
                }
            }

            if ($this->collNewsletterSubscriptions !== null) {
                foreach ($this->collNewsletterSubscriptions as $referrerFK) {
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

            if ($this->salesruleCodesScheduledForDeletion !== null) {
                if (!$this->salesruleCodesScheduledForDeletion->isEmpty()) {
                    foreach ($this->salesruleCodesScheduledForDeletion as $salesruleCode) {
                        // need to save related object because we set the relation to null
                        $salesruleCode->save($con);
                    }
                    $this->salesruleCodesScheduledForDeletion = null;
                }
            }

            if ($this->collSalesruleCodes !== null) {
                foreach ($this->collSalesruleCodes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->codeUsagesScheduledForDeletion !== null) {
                if (!$this->codeUsagesScheduledForDeletion->isEmpty()) {
                    foreach ($this->codeUsagesScheduledForDeletion as $codeUsage) {
                        // need to save related object because we set the relation to null
                        $codeUsage->save($con);
                    }
                    $this->codeUsagesScheduledForDeletion = null;
                }
            }

            if ($this->collCodeUsages !== null) {
                foreach ($this->collCodeUsages as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER;
        if (null !== $this->id_customer) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = '`id_customer`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`fk_customer_status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::INCREMENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`increment_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = '`salutation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER)) {
            $modifiedColumns[':p' . $index++]  = '`gender`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATE_OF_BIRTH)) {
            $modifiedColumns[':p' . $index++]  = '`date_of_birth`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::RESTORE_PASSWORD_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`restore_password_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`default_billing_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`default_shipping_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_customer` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_customer`':
                        $stmt->bindValue($identifier, $this->id_customer, PDO::PARAM_INT);
                        break;
                    case '`fk_customer_status`':
                        $stmt->bindValue($identifier, $this->fk_customer_status, PDO::PARAM_INT);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`increment_id`':
                        $stmt->bindValue($identifier, $this->increment_id, PDO::PARAM_STR);
                        break;
                    case '`salutation`':
                        $stmt->bindValue($identifier, $this->salutation, PDO::PARAM_INT);
                        break;
                    case '`first_name`':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`gender`':
                        $stmt->bindValue($identifier, $this->gender, PDO::PARAM_INT);
                        break;
                    case '`date_of_birth`':
                        $stmt->bindValue($identifier, $this->date_of_birth, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`restore_password_key`':
                        $stmt->bindValue($identifier, $this->restore_password_key, PDO::PARAM_STR);
                        break;
                    case '`default_billing_address`':
                        $stmt->bindValue($identifier, $this->default_billing_address, PDO::PARAM_INT);
                        break;
                    case '`default_shipping_address`':
                        $stmt->bindValue($identifier, $this->default_shipping_address, PDO::PARAM_INT);
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
        $this->setIdCustomer($pk);

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

            if ($this->aBillingAddress !== null) {
                if (!$this->aBillingAddress->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBillingAddress->getValidationFailures());
                }
            }

            if ($this->aShippingAddress !== null) {
                if (!$this->aShippingAddress->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aShippingAddress->getValidationFailures());
                }
            }

            if ($this->aStatus !== null) {
                if (!$this->aStatus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatus->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCartUsers !== null) {
                    foreach ($this->collCartUsers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAddresses !== null) {
                    foreach ($this->collAddresses as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNewsletterSubscriptions !== null) {
                    foreach ($this->collNewsletterSubscriptions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrders !== null) {
                    foreach ($this->collOrders as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSalesruleCodes !== null) {
                    foreach ($this->collSalesruleCodes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCodeUsages !== null) {
                    foreach ($this->collCodeUsages as $referrerFK) {
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
        $pos = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCustomer();
                break;
            case 1:
                return $this->getFkCustomerStatus();
                break;
            case 2:
                return $this->getEmail();
                break;
            case 3:
                return $this->getIncrementId();
                break;
            case 4:
                return $this->getSalutation();
                break;
            case 5:
                return $this->getFirstName();
                break;
            case 6:
                return $this->getLastName();
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
                return $this->getDefaultBillingAddress();
                break;
            case 12:
                return $this->getDefaultShippingAddress();
                break;
            case 13:
                return $this->getCreatedAt();
                break;
            case 14:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Customer_Persistence_PacCustomer'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Customer_Persistence_PacCustomer'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCustomer(),
            $keys[1] => $this->getFkCustomerStatus(),
            $keys[2] => $this->getEmail(),
            $keys[3] => $this->getIncrementId(),
            $keys[4] => $this->getSalutation(),
            $keys[5] => $this->getFirstName(),
            $keys[6] => $this->getLastName(),
            $keys[7] => $this->getGender(),
            $keys[8] => $this->getDateOfBirth(),
            $keys[9] => $this->getPassword(),
            $keys[10] => $this->getRestorePasswordKey(),
            $keys[11] => $this->getDefaultBillingAddress(),
            $keys[12] => $this->getDefaultShippingAddress(),
            $keys[13] => $this->getCreatedAt(),
            $keys[14] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aBillingAddress) {
                $result['BillingAddress'] = $this->aBillingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aShippingAddress) {
                $result['ShippingAddress'] = $this->aShippingAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatus) {
                $result['Status'] = $this->aStatus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCartUsers) {
                $result['CartUsers'] = $this->collCartUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAddresses) {
                $result['Addresses'] = $this->collAddresses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewsletterSubscriptions) {
                $result['NewsletterSubscriptions'] = $this->collNewsletterSubscriptions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrders) {
                $result['Orders'] = $this->collOrders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesruleCodes) {
                $result['SalesruleCodes'] = $this->collSalesruleCodes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCodeUsages) {
                $result['CodeUsages'] = $this->collCodeUsages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCustomer($value);
                break;
            case 1:
                $this->setFkCustomerStatus($value);
                break;
            case 2:
                $this->setEmail($value);
                break;
            case 3:
                $this->setIncrementId($value);
                break;
            case 4:
                $valueSet = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getValueSet(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 5:
                $this->setFirstName($value);
                break;
            case 6:
                $this->setLastName($value);
                break;
            case 7:
                $valueSet = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getValueSet(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER);
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
                $this->setDefaultBillingAddress($value);
                break;
            case 12:
                $this->setDefaultShippingAddress($value);
                break;
            case 13:
                $this->setCreatedAt($value);
                break;
            case 14:
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
        $keys = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCustomer($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCustomerStatus($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIncrementId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSalutation($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFirstName($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastName($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setGender($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDateOfBirth($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPassword($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setRestorePasswordKey($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setDefaultBillingAddress($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setDefaultShippingAddress($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setCreatedAt($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $this->id_customer);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS, $this->fk_customer_status);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::EMAIL)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::EMAIL, $this->email);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::INCREMENT_ID)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::INCREMENT_ID, $this->increment_id);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION, $this->salutation);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FIRST_NAME)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::LAST_NAME)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER, $this->gender);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATE_OF_BIRTH)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATE_OF_BIRTH, $this->date_of_birth);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::PASSWORD)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::RESTORE_PASSWORD_KEY)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::RESTORE_PASSWORD_KEY, $this->restore_password_key);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS, $this->default_billing_address);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS, $this->default_shipping_address);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $this->id_customer);

        return $criteria;
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
     * @param  int $key Primary key.
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
     * @param object $copyObj An object of ProjectA_Zed_Customer_Persistence_PacCustomer (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCustomerStatus($this->getFkCustomerStatus());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setIncrementId($this->getIncrementId());
        $copyObj->setSalutation($this->getSalutation());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setGender($this->getGender());
        $copyObj->setDateOfBirth($this->getDateOfBirth());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setRestorePasswordKey($this->getRestorePasswordKey());
        $copyObj->setDefaultBillingAddress($this->getDefaultBillingAddress());
        $copyObj->setDefaultShippingAddress($this->getDefaultShippingAddress());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCartUsers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCartUser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAddresses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAddress($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewsletterSubscriptions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNewsletterSubscription($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrder($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesruleCodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesruleCode($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCodeUsages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCodeUsage($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer Clone of current object.
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Customer_Persistence_PacCustomerPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Customer_Persistence_PacCustomerAddress object.
     *
     * @param             ProjectA_Zed_Customer_Persistence_PacCustomerAddress $v
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBillingAddress(ProjectA_Zed_Customer_Persistence_PacCustomerAddress $v = null)
    {
        if ($v === null) {
            $this->setDefaultBillingAddress(NULL);
        } else {
            $this->setDefaultBillingAddress($v->getIdCustomerAddress());
        }

        $this->aBillingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer_Persistence_PacCustomerAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerBillingAddress($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer_Persistence_PacCustomerAddress object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerAddress The associated ProjectA_Zed_Customer_Persistence_PacCustomerAddress object.
     * @throws PropelException
     */
    public function getBillingAddress(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBillingAddress === null && ($this->default_billing_address !== null) && $doQuery) {
            $this->aBillingAddress = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create()->findPk($this->default_billing_address, $con);
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
     * Declares an association between this object and a ProjectA_Zed_Customer_Persistence_PacCustomerAddress object.
     *
     * @param             ProjectA_Zed_Customer_Persistence_PacCustomerAddress $v
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShippingAddress(ProjectA_Zed_Customer_Persistence_PacCustomerAddress $v = null)
    {
        if ($v === null) {
            $this->setDefaultShippingAddress(NULL);
        } else {
            $this->setDefaultShippingAddress($v->getIdCustomerAddress());
        }

        $this->aShippingAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer_Persistence_PacCustomerAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerShippingAddress($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer_Persistence_PacCustomerAddress object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerAddress The associated ProjectA_Zed_Customer_Persistence_PacCustomerAddress object.
     * @throws PropelException
     */
    public function getShippingAddress(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aShippingAddress === null && ($this->default_shipping_address !== null) && $doQuery) {
            $this->aShippingAddress = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create()->findPk($this->default_shipping_address, $con);
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
     * Declares an association between this object and a ProjectA_Zed_Customer_Persistence_PacCustomerStatus object.
     *
     * @param             ProjectA_Zed_Customer_Persistence_PacCustomerStatus $v
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatus(ProjectA_Zed_Customer_Persistence_PacCustomerStatus $v = null)
    {
        if ($v === null) {
            $this->setFkCustomerStatus(NULL);
        } else {
            $this->setFkCustomerStatus($v->getIdCustomerStatus());
        }

        $this->aStatus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer_Persistence_PacCustomerStatus object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomer($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer_Persistence_PacCustomerStatus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerStatus The associated ProjectA_Zed_Customer_Persistence_PacCustomerStatus object.
     * @throws PropelException
     */
    public function getStatus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatus === null && ($this->fk_customer_status !== null) && $doQuery) {
            $this->aStatus = ProjectA_Zed_Customer_Persistence_PacCustomerStatusQuery::create()->findPk($this->fk_customer_status, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatus->addCustomers($this);
             */
        }

        return $this->aStatus;
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
        if ('CartUser' == $relationName) {
            $this->initCartUsers();
        }
        if ('Address' == $relationName) {
            $this->initAddresses();
        }
        if ('NewsletterSubscription' == $relationName) {
            $this->initNewsletterSubscriptions();
        }
        if ('Order' == $relationName) {
            $this->initOrders();
        }
        if ('SalesruleCode' == $relationName) {
            $this->initSalesruleCodes();
        }
        if ('CodeUsage' == $relationName) {
            $this->initCodeUsages();
        }
    }

    /**
     * Clears out the collCartUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @see        addCartUsers()
     */
    public function clearCartUsers()
    {
        $this->collCartUsers = null; // important to set this to null since that means it is uninitialized
        $this->collCartUsersPartial = null;

        return $this;
    }

    /**
     * reset is the collCartUsers collection loaded partially
     *
     * @return void
     */
    public function resetPartialCartUsers($v = true)
    {
        $this->collCartUsersPartial = $v;
    }

    /**
     * Initializes the collCartUsers collection.
     *
     * By default this just sets the collCartUsers collection to an empty array (like clearcollCartUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCartUsers($overrideExisting = true)
    {
        if (null !== $this->collCartUsers && !$overrideExisting) {
            return;
        }
        $this->collCartUsers = new PropelObjectCollection();
        $this->collCartUsers->setModel('ProjectA_Zed_Cart_Persistence_PacCartUser');
    }

    /**
     * Gets an array of ProjectA_Zed_Cart_Persistence_PacCartUser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer_Persistence_PacCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cart_Persistence_PacCartUser[] List of ProjectA_Zed_Cart_Persistence_PacCartUser objects
     * @throws PropelException
     */
    public function getCartUsers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCartUsersPartial && !$this->isNew();
        if (null === $this->collCartUsers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCartUsers) {
                // return empty collection
                $this->initCartUsers();
            } else {
                $collCartUsers = ProjectA_Zed_Cart_Persistence_PacCartUserQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCartUsersPartial && count($collCartUsers)) {
                      $this->initCartUsers(false);

                      foreach($collCartUsers as $obj) {
                        if (false == $this->collCartUsers->contains($obj)) {
                          $this->collCartUsers->append($obj);
                        }
                      }

                      $this->collCartUsersPartial = true;
                    }

                    $collCartUsers->getInternalIterator()->rewind();
                    return $collCartUsers;
                }

                if($partial && $this->collCartUsers) {
                    foreach($this->collCartUsers as $obj) {
                        if($obj->isNew()) {
                            $collCartUsers[] = $obj;
                        }
                    }
                }

                $this->collCartUsers = $collCartUsers;
                $this->collCartUsersPartial = false;
            }
        }

        return $this->collCartUsers;
    }

    /**
     * Sets a collection of CartUser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $cartUsers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setCartUsers(PropelCollection $cartUsers, PropelPDO $con = null)
    {
        $cartUsersToDelete = $this->getCartUsers(new Criteria(), $con)->diff($cartUsers);

        $this->cartUsersScheduledForDeletion = unserialize(serialize($cartUsersToDelete));

        foreach ($cartUsersToDelete as $cartUserRemoved) {
            $cartUserRemoved->setCustomer(null);
        }

        $this->collCartUsers = null;
        foreach ($cartUsers as $cartUser) {
            $this->addCartUser($cartUser);
        }

        $this->collCartUsers = $cartUsers;
        $this->collCartUsersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cart_Persistence_PacCartUser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cart_Persistence_PacCartUser objects.
     * @throws PropelException
     */
    public function countCartUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCartUsersPartial && !$this->isNew();
        if (null === $this->collCartUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCartUsers) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCartUsers());
            }
            $query = ProjectA_Zed_Cart_Persistence_PacCartUserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collCartUsers);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cart_Persistence_PacCartUser object to this object
     * through the ProjectA_Zed_Cart_Persistence_PacCartUser foreign key attribute.
     *
     * @param    ProjectA_Zed_Cart_Persistence_PacCartUser $l ProjectA_Zed_Cart_Persistence_PacCartUser
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function addCartUser(ProjectA_Zed_Cart_Persistence_PacCartUser $l)
    {
        if ($this->collCartUsers === null) {
            $this->initCartUsers();
            $this->collCartUsersPartial = true;
        }
        if (!in_array($l, $this->collCartUsers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCartUser($l);
        }

        return $this;
    }

    /**
     * @param	CartUser $cartUser The cartUser object to add.
     */
    protected function doAddCartUser($cartUser)
    {
        $this->collCartUsers[]= $cartUser;
        $cartUser->setCustomer($this);
    }

    /**
     * @param	CartUser $cartUser The cartUser object to remove.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function removeCartUser($cartUser)
    {
        if ($this->getCartUsers()->contains($cartUser)) {
            $this->collCartUsers->remove($this->collCartUsers->search($cartUser));
            if (null === $this->cartUsersScheduledForDeletion) {
                $this->cartUsersScheduledForDeletion = clone $this->collCartUsers;
                $this->cartUsersScheduledForDeletion->clear();
            }
            $this->cartUsersScheduledForDeletion[]= $cartUser;
            $cartUser->setCustomer(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related CartUsers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cart_Persistence_PacCartUser[] List of ProjectA_Zed_Cart_Persistence_PacCartUser objects
     */
    public function getCartUsersJoinCart($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cart_Persistence_PacCartUserQuery::create(null, $criteria);
        $query->joinWith('Cart', $join_behavior);

        return $this->getCartUsers($query, $con);
    }

    /**
     * Clears out the collAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @see        addAddresses()
     */
    public function clearAddresses()
    {
        $this->collAddresses = null; // important to set this to null since that means it is uninitialized
        $this->collAddressesPartial = null;

        return $this;
    }

    /**
     * reset is the collAddresses collection loaded partially
     *
     * @return void
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
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAddresses($overrideExisting = true)
    {
        if (null !== $this->collAddresses && !$overrideExisting) {
            return;
        }
        $this->collAddresses = new PropelObjectCollection();
        $this->collAddresses->setModel('ProjectA_Zed_Customer_Persistence_PacCustomerAddress');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer_Persistence_PacCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_PacCustomerAddress[] List of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects
     * @throws PropelException
     */
    public function getAddresses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAddressesPartial && !$this->isNew();
        if (null === $this->collAddresses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAddresses) {
                // return empty collection
                $this->initAddresses();
            } else {
                $collAddresses = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAddressesPartial && count($collAddresses)) {
                      $this->initAddresses(false);

                      foreach($collAddresses as $obj) {
                        if (false == $this->collAddresses->contains($obj)) {
                          $this->collAddresses->append($obj);
                        }
                      }

                      $this->collAddressesPartial = true;
                    }

                    $collAddresses->getInternalIterator()->rewind();
                    return $collAddresses;
                }

                if($partial && $this->collAddresses) {
                    foreach($this->collAddresses as $obj) {
                        if($obj->isNew()) {
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
     * Sets a collection of Address objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $addresses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setAddresses(PropelCollection $addresses, PropelPDO $con = null)
    {
        $addressesToDelete = $this->getAddresses(new Criteria(), $con)->diff($addresses);

        $this->addressesScheduledForDeletion = unserialize(serialize($addressesToDelete));

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
     * Returns the number of related ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects.
     * @throws PropelException
     */
    public function countAddresses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAddressesPartial && !$this->isNew();
        if (null === $this->collAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAddresses) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAddresses());
            }
            $query = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create(null, $criteria);
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
     * Method called to associate a ProjectA_Zed_Customer_Persistence_PacCustomerAddress object to this object
     * through the ProjectA_Zed_Customer_Persistence_PacCustomerAddress foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer_Persistence_PacCustomerAddress $l ProjectA_Zed_Customer_Persistence_PacCustomerAddress
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function addAddress(ProjectA_Zed_Customer_Persistence_PacCustomerAddress $l)
    {
        if ($this->collAddresses === null) {
            $this->initAddresses();
            $this->collAddressesPartial = true;
        }
        if (!in_array($l, $this->collAddresses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAddress($l);
        }

        return $this;
    }

    /**
     * @param	Address $address The address object to add.
     */
    protected function doAddAddress($address)
    {
        $this->collAddresses[]= $address;
        $address->setCustomer($this);
    }

    /**
     * @param	Address $address The address object to remove.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function removeAddress($address)
    {
        if ($this->getAddresses()->contains($address)) {
            $this->collAddresses->remove($this->collAddresses->search($address));
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
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related Addresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_PacCustomerAddress[] List of ProjectA_Zed_Customer_Persistence_PacCustomerAddress objects
     */
    public function getAddressesJoinCountry($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Country', $join_behavior);

        return $this->getAddresses($query, $con);
    }

    /**
     * Clears out the collNewsletterSubscriptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @see        addNewsletterSubscriptions()
     */
    public function clearNewsletterSubscriptions()
    {
        $this->collNewsletterSubscriptions = null; // important to set this to null since that means it is uninitialized
        $this->collNewsletterSubscriptionsPartial = null;

        return $this;
    }

    /**
     * reset is the collNewsletterSubscriptions collection loaded partially
     *
     * @return void
     */
    public function resetPartialNewsletterSubscriptions($v = true)
    {
        $this->collNewsletterSubscriptionsPartial = $v;
    }

    /**
     * Initializes the collNewsletterSubscriptions collection.
     *
     * By default this just sets the collNewsletterSubscriptions collection to an empty array (like clearcollNewsletterSubscriptions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNewsletterSubscriptions($overrideExisting = true)
    {
        if (null !== $this->collNewsletterSubscriptions && !$overrideExisting) {
            return;
        }
        $this->collNewsletterSubscriptions = new PropelObjectCollection();
        $this->collNewsletterSubscriptions->setModel('ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription');
    }

    /**
     * Gets an array of ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer_Persistence_PacCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription[] List of ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription objects
     * @throws PropelException
     */
    public function getNewsletterSubscriptions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNewsletterSubscriptionsPartial && !$this->isNew();
        if (null === $this->collNewsletterSubscriptions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNewsletterSubscriptions) {
                // return empty collection
                $this->initNewsletterSubscriptions();
            } else {
                $collNewsletterSubscriptions = ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscriptionQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNewsletterSubscriptionsPartial && count($collNewsletterSubscriptions)) {
                      $this->initNewsletterSubscriptions(false);

                      foreach($collNewsletterSubscriptions as $obj) {
                        if (false == $this->collNewsletterSubscriptions->contains($obj)) {
                          $this->collNewsletterSubscriptions->append($obj);
                        }
                      }

                      $this->collNewsletterSubscriptionsPartial = true;
                    }

                    $collNewsletterSubscriptions->getInternalIterator()->rewind();
                    return $collNewsletterSubscriptions;
                }

                if($partial && $this->collNewsletterSubscriptions) {
                    foreach($this->collNewsletterSubscriptions as $obj) {
                        if($obj->isNew()) {
                            $collNewsletterSubscriptions[] = $obj;
                        }
                    }
                }

                $this->collNewsletterSubscriptions = $collNewsletterSubscriptions;
                $this->collNewsletterSubscriptionsPartial = false;
            }
        }

        return $this->collNewsletterSubscriptions;
    }

    /**
     * Sets a collection of NewsletterSubscription objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $newsletterSubscriptions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setNewsletterSubscriptions(PropelCollection $newsletterSubscriptions, PropelPDO $con = null)
    {
        $newsletterSubscriptionsToDelete = $this->getNewsletterSubscriptions(new Criteria(), $con)->diff($newsletterSubscriptions);

        $this->newsletterSubscriptionsScheduledForDeletion = unserialize(serialize($newsletterSubscriptionsToDelete));

        foreach ($newsletterSubscriptionsToDelete as $newsletterSubscriptionRemoved) {
            $newsletterSubscriptionRemoved->setCustomer(null);
        }

        $this->collNewsletterSubscriptions = null;
        foreach ($newsletterSubscriptions as $newsletterSubscription) {
            $this->addNewsletterSubscription($newsletterSubscription);
        }

        $this->collNewsletterSubscriptions = $newsletterSubscriptions;
        $this->collNewsletterSubscriptionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription objects.
     * @throws PropelException
     */
    public function countNewsletterSubscriptions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNewsletterSubscriptionsPartial && !$this->isNew();
        if (null === $this->collNewsletterSubscriptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNewsletterSubscriptions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getNewsletterSubscriptions());
            }
            $query = ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscriptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collNewsletterSubscriptions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription object to this object
     * through the ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription foreign key attribute.
     *
     * @param    ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription $l ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function addNewsletterSubscription(ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription $l)
    {
        if ($this->collNewsletterSubscriptions === null) {
            $this->initNewsletterSubscriptions();
            $this->collNewsletterSubscriptionsPartial = true;
        }
        if (!in_array($l, $this->collNewsletterSubscriptions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNewsletterSubscription($l);
        }

        return $this;
    }

    /**
     * @param	NewsletterSubscription $newsletterSubscription The newsletterSubscription object to add.
     */
    protected function doAddNewsletterSubscription($newsletterSubscription)
    {
        $this->collNewsletterSubscriptions[]= $newsletterSubscription;
        $newsletterSubscription->setCustomer($this);
    }

    /**
     * @param	NewsletterSubscription $newsletterSubscription The newsletterSubscription object to remove.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function removeNewsletterSubscription($newsletterSubscription)
    {
        if ($this->getNewsletterSubscriptions()->contains($newsletterSubscription)) {
            $this->collNewsletterSubscriptions->remove($this->collNewsletterSubscriptions->search($newsletterSubscription));
            if (null === $this->newsletterSubscriptionsScheduledForDeletion) {
                $this->newsletterSubscriptionsScheduledForDeletion = clone $this->collNewsletterSubscriptions;
                $this->newsletterSubscriptionsScheduledForDeletion->clear();
            }
            $this->newsletterSubscriptionsScheduledForDeletion[]= $newsletterSubscription;
            $newsletterSubscription->setCustomer(null);
        }

        return $this;
    }

    /**
     * Clears out the collOrders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @see        addOrders()
     */
    public function clearOrders()
    {
        $this->collOrders = null; // important to set this to null since that means it is uninitialized
        $this->collOrdersPartial = null;

        return $this;
    }

    /**
     * reset is the collOrders collection loaded partially
     *
     * @return void
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
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrders($overrideExisting = true)
    {
        if (null !== $this->collOrders && !$overrideExisting) {
            return;
        }
        $this->collOrders = new PropelObjectCollection();
        $this->collOrders->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrder');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer_Persistence_PacCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     * @throws PropelException
     */
    public function getOrders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                // return empty collection
                $this->initOrders();
            } else {
                $collOrders = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrdersPartial && count($collOrders)) {
                      $this->initOrders(false);

                      foreach($collOrders as $obj) {
                        if (false == $this->collOrders->contains($obj)) {
                          $this->collOrders->append($obj);
                        }
                      }

                      $this->collOrdersPartial = true;
                    }

                    $collOrders->getInternalIterator()->rewind();
                    return $collOrders;
                }

                if($partial && $this->collOrders) {
                    foreach($this->collOrders as $obj) {
                        if($obj->isNew()) {
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
     * Sets a collection of Order objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orders A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setOrders(PropelCollection $orders, PropelPDO $con = null)
    {
        $ordersToDelete = $this->getOrders(new Criteria(), $con)->diff($orders);

        $this->ordersScheduledForDeletion = unserialize(serialize($ordersToDelete));

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
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException
     */
    public function countOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOrders());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
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
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrder object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrder foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrder $l ProjectA_Zed_Sales_Persistence_PacSalesOrder
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function addOrder(ProjectA_Zed_Sales_Persistence_PacSalesOrder $l)
    {
        if ($this->collOrders === null) {
            $this->initOrders();
            $this->collOrdersPartial = true;
        }
        if (!in_array($l, $this->collOrders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrder($l);
        }

        return $this;
    }

    /**
     * @param	Order $order The order object to add.
     */
    protected function doAddOrder($order)
    {
        $this->collOrders[]= $order;
        $order->setCustomer($this);
    }

    /**
     * @param	Order $order The order object to remove.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function removeOrder($order)
    {
        if ($this->getOrders()->contains($order)) {
            $this->collOrders->remove($this->collOrders->search($order));
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
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     */
    public function getOrdersJoinBillingAddress($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
        $query->joinWith('BillingAddress', $join_behavior);

        return $this->getOrders($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     */
    public function getOrdersJoinShippingAddress($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
        $query->joinWith('ShippingAddress', $join_behavior);

        return $this->getOrders($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     */
    public function getOrdersJoinProcess($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
        $query->joinWith('Process', $join_behavior);

        return $this->getOrders($query, $con);
    }

    /**
     * Clears out the collSalesruleCodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @see        addSalesruleCodes()
     */
    public function clearSalesruleCodes()
    {
        $this->collSalesruleCodes = null; // important to set this to null since that means it is uninitialized
        $this->collSalesruleCodesPartial = null;

        return $this;
    }

    /**
     * reset is the collSalesruleCodes collection loaded partially
     *
     * @return void
     */
    public function resetPartialSalesruleCodes($v = true)
    {
        $this->collSalesruleCodesPartial = $v;
    }

    /**
     * Initializes the collSalesruleCodes collection.
     *
     * By default this just sets the collSalesruleCodes collection to an empty array (like clearcollSalesruleCodes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesruleCodes($overrideExisting = true)
    {
        if (null !== $this->collSalesruleCodes && !$overrideExisting) {
            return;
        }
        $this->collSalesruleCodes = new PropelObjectCollection();
        $this->collSalesruleCodes->setModel('ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode');
    }

    /**
     * Gets an array of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer_Persistence_PacCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects
     * @throws PropelException
     */
    public function getSalesruleCodes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSalesruleCodesPartial && !$this->isNew();
        if (null === $this->collSalesruleCodes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesruleCodes) {
                // return empty collection
                $this->initSalesruleCodes();
            } else {
                $collSalesruleCodes = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesruleCodesPartial && count($collSalesruleCodes)) {
                      $this->initSalesruleCodes(false);

                      foreach($collSalesruleCodes as $obj) {
                        if (false == $this->collSalesruleCodes->contains($obj)) {
                          $this->collSalesruleCodes->append($obj);
                        }
                      }

                      $this->collSalesruleCodesPartial = true;
                    }

                    $collSalesruleCodes->getInternalIterator()->rewind();
                    return $collSalesruleCodes;
                }

                if($partial && $this->collSalesruleCodes) {
                    foreach($this->collSalesruleCodes as $obj) {
                        if($obj->isNew()) {
                            $collSalesruleCodes[] = $obj;
                        }
                    }
                }

                $this->collSalesruleCodes = $collSalesruleCodes;
                $this->collSalesruleCodesPartial = false;
            }
        }

        return $this->collSalesruleCodes;
    }

    /**
     * Sets a collection of SalesruleCode objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $salesruleCodes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setSalesruleCodes(PropelCollection $salesruleCodes, PropelPDO $con = null)
    {
        $salesruleCodesToDelete = $this->getSalesruleCodes(new Criteria(), $con)->diff($salesruleCodes);

        $this->salesruleCodesScheduledForDeletion = unserialize(serialize($salesruleCodesToDelete));

        foreach ($salesruleCodesToDelete as $salesruleCodeRemoved) {
            $salesruleCodeRemoved->setCustomer(null);
        }

        $this->collSalesruleCodes = null;
        foreach ($salesruleCodes as $salesruleCode) {
            $this->addSalesruleCode($salesruleCode);
        }

        $this->collSalesruleCodes = $salesruleCodes;
        $this->collSalesruleCodesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects.
     * @throws PropelException
     */
    public function countSalesruleCodes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesruleCodesPartial && !$this->isNew();
        if (null === $this->collSalesruleCodes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesruleCodes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSalesruleCodes());
            }
            $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collSalesruleCodes);
    }

    /**
     * Method called to associate a ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object to this object
     * through the ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode foreign key attribute.
     *
     * @param    ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode $l ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function addSalesruleCode(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode $l)
    {
        if ($this->collSalesruleCodes === null) {
            $this->initSalesruleCodes();
            $this->collSalesruleCodesPartial = true;
        }
        if (!in_array($l, $this->collSalesruleCodes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesruleCode($l);
        }

        return $this;
    }

    /**
     * @param	SalesruleCode $salesruleCode The salesruleCode object to add.
     */
    protected function doAddSalesruleCode($salesruleCode)
    {
        $this->collSalesruleCodes[]= $salesruleCode;
        $salesruleCode->setCustomer($this);
    }

    /**
     * @param	SalesruleCode $salesruleCode The salesruleCode object to remove.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function removeSalesruleCode($salesruleCode)
    {
        if ($this->getSalesruleCodes()->contains($salesruleCode)) {
            $this->collSalesruleCodes->remove($this->collSalesruleCodes->search($salesruleCode));
            if (null === $this->salesruleCodesScheduledForDeletion) {
                $this->salesruleCodesScheduledForDeletion = clone $this->collSalesruleCodes;
                $this->salesruleCodesScheduledForDeletion->clear();
            }
            $this->salesruleCodesScheduledForDeletion[]= $salesruleCode;
            $salesruleCode->setCustomer(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related SalesruleCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects
     */
    public function getSalesruleCodesJoinCodepool($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery::create(null, $criteria);
        $query->joinWith('Codepool', $join_behavior);

        return $this->getSalesruleCodes($query, $con);
    }

    /**
     * Clears out the collCodeUsages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     * @see        addCodeUsages()
     */
    public function clearCodeUsages()
    {
        $this->collCodeUsages = null; // important to set this to null since that means it is uninitialized
        $this->collCodeUsagesPartial = null;

        return $this;
    }

    /**
     * reset is the collCodeUsages collection loaded partially
     *
     * @return void
     */
    public function resetPartialCodeUsages($v = true)
    {
        $this->collCodeUsagesPartial = $v;
    }

    /**
     * Initializes the collCodeUsages collection.
     *
     * By default this just sets the collCodeUsages collection to an empty array (like clearcollCodeUsages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCodeUsages($overrideExisting = true)
    {
        if (null !== $this->collCodeUsages && !$overrideExisting) {
            return;
        }
        $this->collCodeUsages = new PropelObjectCollection();
        $this->collCodeUsages->setModel('ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage');
    }

    /**
     * Gets an array of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer_Persistence_PacCustomer is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects
     * @throws PropelException
     */
    public function getCodeUsages($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCodeUsagesPartial && !$this->isNew();
        if (null === $this->collCodeUsages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCodeUsages) {
                // return empty collection
                $this->initCodeUsages();
            } else {
                $collCodeUsages = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria)
                    ->filterByCustomer($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCodeUsagesPartial && count($collCodeUsages)) {
                      $this->initCodeUsages(false);

                      foreach($collCodeUsages as $obj) {
                        if (false == $this->collCodeUsages->contains($obj)) {
                          $this->collCodeUsages->append($obj);
                        }
                      }

                      $this->collCodeUsagesPartial = true;
                    }

                    $collCodeUsages->getInternalIterator()->rewind();
                    return $collCodeUsages;
                }

                if($partial && $this->collCodeUsages) {
                    foreach($this->collCodeUsages as $obj) {
                        if($obj->isNew()) {
                            $collCodeUsages[] = $obj;
                        }
                    }
                }

                $this->collCodeUsages = $collCodeUsages;
                $this->collCodeUsagesPartial = false;
            }
        }

        return $this->collCodeUsages;
    }

    /**
     * Sets a collection of CodeUsage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $codeUsages A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function setCodeUsages(PropelCollection $codeUsages, PropelPDO $con = null)
    {
        $codeUsagesToDelete = $this->getCodeUsages(new Criteria(), $con)->diff($codeUsages);

        $this->codeUsagesScheduledForDeletion = unserialize(serialize($codeUsagesToDelete));

        foreach ($codeUsagesToDelete as $codeUsageRemoved) {
            $codeUsageRemoved->setCustomer(null);
        }

        $this->collCodeUsages = null;
        foreach ($codeUsages as $codeUsage) {
            $this->addCodeUsage($codeUsage);
        }

        $this->collCodeUsages = $codeUsages;
        $this->collCodeUsagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects.
     * @throws PropelException
     */
    public function countCodeUsages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCodeUsagesPartial && !$this->isNew();
        if (null === $this->collCodeUsages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCodeUsages) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getCodeUsages());
            }
            $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer($this)
                ->count($con);
        }

        return count($this->collCodeUsages);
    }

    /**
     * Method called to associate a ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage object to this object
     * through the ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage foreign key attribute.
     *
     * @param    ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage $l ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function addCodeUsage(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage $l)
    {
        if ($this->collCodeUsages === null) {
            $this->initCodeUsages();
            $this->collCodeUsagesPartial = true;
        }
        if (!in_array($l, $this->collCodeUsages->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCodeUsage($l);
        }

        return $this;
    }

    /**
     * @param	CodeUsage $codeUsage The codeUsage object to add.
     */
    protected function doAddCodeUsage($codeUsage)
    {
        $this->collCodeUsages[]= $codeUsage;
        $codeUsage->setCustomer($this);
    }

    /**
     * @param	CodeUsage $codeUsage The codeUsage object to remove.
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function removeCodeUsage($codeUsage)
    {
        if ($this->getCodeUsages()->contains($codeUsage)) {
            $this->collCodeUsages->remove($this->collCodeUsages->search($codeUsage));
            if (null === $this->codeUsagesScheduledForDeletion) {
                $this->codeUsagesScheduledForDeletion = clone $this->collCodeUsages;
                $this->codeUsagesScheduledForDeletion->clear();
            }
            $this->codeUsagesScheduledForDeletion[]= $codeUsage;
            $codeUsage->setCustomer(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related CodeUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects
     */
    public function getCodeUsagesJoinCode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria);
        $query->joinWith('Code', $join_behavior);

        return $this->getCodeUsages($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer is new, it will return
     * an empty collection; or if this PacCustomer has previously
     * been saved, it will retrieve related CodeUsages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects
     */
    public function getCodeUsagesJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getCodeUsages($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_customer = null;
        $this->fk_customer_status = null;
        $this->email = null;
        $this->increment_id = null;
        $this->salutation = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->gender = null;
        $this->date_of_birth = null;
        $this->password = null;
        $this->restore_password_key = null;
        $this->default_billing_address = null;
        $this->default_shipping_address = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
            if ($this->collCartUsers) {
                foreach ($this->collCartUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAddresses) {
                foreach ($this->collAddresses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewsletterSubscriptions) {
                foreach ($this->collNewsletterSubscriptions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrders) {
                foreach ($this->collOrders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesruleCodes) {
                foreach ($this->collSalesruleCodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCodeUsages) {
                foreach ($this->collCodeUsages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aBillingAddress instanceof Persistent) {
              $this->aBillingAddress->clearAllReferences($deep);
            }
            if ($this->aShippingAddress instanceof Persistent) {
              $this->aShippingAddress->clearAllReferences($deep);
            }
            if ($this->aStatus instanceof Persistent) {
              $this->aStatus->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCartUsers instanceof PropelCollection) {
            $this->collCartUsers->clearIterator();
        }
        $this->collCartUsers = null;
        if ($this->collAddresses instanceof PropelCollection) {
            $this->collAddresses->clearIterator();
        }
        $this->collAddresses = null;
        if ($this->collNewsletterSubscriptions instanceof PropelCollection) {
            $this->collNewsletterSubscriptions->clearIterator();
        }
        $this->collNewsletterSubscriptions = null;
        if ($this->collOrders instanceof PropelCollection) {
            $this->collOrders->clearIterator();
        }
        $this->collOrders = null;
        if ($this->collSalesruleCodes instanceof PropelCollection) {
            $this->collSalesruleCodes->clearIterator();
        }
        $this->collSalesruleCodes = null;
        if ($this->collCodeUsages instanceof PropelCollection) {
            $this->collCodeUsages->clearIterator();
        }
        $this->collCodeUsages = null;
        $this->aBillingAddress = null;
        $this->aShippingAddress = null;
        $this->aStatus = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Customer_Persistence_PacCustomer The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT;

        return $this;
    }

}
