<?php


/**
 * Base class that represents a row from the 'pac_customer2' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Customer2/Persistence/Propel.om
 */
abstract class Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2 extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_customer field.
     * @var        int
     */
    protected $id_customer;

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
     * The value for the restore_password_date field.
     * @var        string
     */
    protected $restore_password_date;

    /**
     * The value for the registered field.
     * @var        string
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
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        PacCustomer2Address
     */
    protected $aBillingAddress2;

    /**
     * @var        PacCustomer2Address
     */
    protected $aShippingAddress2;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] Collection to store aggregation of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     */
    protected $collAddress2s;
    protected $collAddress2sPartial;

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
    protected $address2sScheduledForDeletion = null;

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
        $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION);
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
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getGender()
    {
        if (null === $this->gender) {
            return null;
        }
        $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER);
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
     * Get the [optionally formatted] temporal [restore_password_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRestorePasswordDate($format = 'Y-m-d H:i:s')
    {
        if ($this->restore_password_date === null) {
            return null;
        }

        if ($this->restore_password_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->restore_password_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->restore_password_date, true), $x);
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
     * Get the [optionally formatted] temporal [registered] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRegistered($format = '%x')
    {
        if ($this->registered === null) {
            return null;
        }

        if ($this->registered === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->registered);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->registered, true), $x);
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
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setIdCustomer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_customer !== $v) {
            $this->id_customer = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER;
        }


        return $this;
    } // setIdCustomer()

    /**
     * Set the value of [email] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [increment_id] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setIncrementId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->increment_id !== $v) {
            $this->increment_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::INCREMENT_ID;
        }


        return $this;
    } // setIncrementId()

    /**
     * Set the value of [salutation] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION;
        }


        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::MIDDLE_NAME;
        }


        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [company] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COMPANY;
        }


        return $this;
    } // setCompany()

    /**
     * Set the value of [gender] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER;
        }


        return $this;
    } // setGender()

    /**
     * Sets the value of [date_of_birth] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setDateOfBirth($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_of_birth !== null || $dt !== null) {
            $currentDateAsString = ($this->date_of_birth !== null && $tmpDt = new DateTime($this->date_of_birth)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date_of_birth = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATE_OF_BIRTH;
            }
        } // if either are not null


        return $this;
    } // setDateOfBirth()

    /**
     * Set the value of [password] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [restore_password_key] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setRestorePasswordKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->restore_password_key !== $v) {
            $this->restore_password_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_KEY;
        }


        return $this;
    } // setRestorePasswordKey()

    /**
     * Sets the value of [restore_password_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setRestorePasswordDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->restore_password_date !== null || $dt !== null) {
            $currentDateAsString = ($this->restore_password_date !== null && $tmpDt = new DateTime($this->restore_password_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->restore_password_date = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_DATE;
            }
        } // if either are not null


        return $this;
    } // setRestorePasswordDate()

    /**
     * Sets the value of [registered] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setRegistered($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->registered !== null || $dt !== null) {
            $currentDateAsString = ($this->registered !== null && $tmpDt = new DateTime($this->registered)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->registered = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTERED;
            }
        } // if either are not null


        return $this;
    } // setRegistered()

    /**
     * Set the value of [registration_key] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setRegistrationKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->registration_key !== $v) {
            $this->registration_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTRATION_KEY;
        }


        return $this;
    } // setRegistrationKey()

    /**
     * Set the value of [default_billing_address] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setDefaultBillingAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->default_billing_address !== $v) {
            $this->default_billing_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS;
        }

        if ($this->aBillingAddress2 !== null && $this->aBillingAddress2->getIdCustomerAddress() !== $v) {
            $this->aBillingAddress2 = null;
        }


        return $this;
    } // setDefaultBillingAddress()

    /**
     * Set the value of [default_shipping_address] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setDefaultShippingAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->default_shipping_address !== $v) {
            $this->default_shipping_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS;
        }

        if ($this->aShippingAddress2 !== null && $this->aShippingAddress2->getIdCustomerAddress() !== $v) {
            $this->aShippingAddress2 = null;
        }


        return $this;
    } // setDefaultShippingAddress()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT;
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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_customer = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->email = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->increment_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->salutation = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->first_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->middle_name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->company = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->gender = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->date_of_birth = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->password = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->restore_password_key = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->restore_password_date = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->registered = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->registration_key = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->default_billing_address = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->default_shipping_address = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->created_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->updated_at = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 19; // 19 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object", $e);
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

        if ($this->aBillingAddress2 !== null && $this->default_billing_address !== $this->aBillingAddress2->getIdCustomerAddress()) {
            $this->aBillingAddress2 = null;
        }
        if ($this->aShippingAddress2 !== null && $this->default_shipping_address !== $this->aShippingAddress2->getIdCustomerAddress()) {
            $this->aShippingAddress2 = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBillingAddress2 = null;
            $this->aShippingAddress2 = null;
            $this->collAddress2s = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT)) {
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

                        $lumberjack = \ProjectA\Shared\Lumberjack\Code\Lumberjack::getInstance();
                        $lumberjack->addField("entityData", $this->toArray());
                        $lumberjack->addField("entity", get_class($this));
                        $lumberjack->addField("entityId", $id);
                        $lumberjack->addField("affectedRows", $affectedRows);

                        $authIdentity = ProjectA\Zed\Auth\Business\Model\Auth::getInstance()->getIdentity();
                        if (isset($authIdentity) && $authIdentity instanceof \ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
                            $lumberjack->addField("aclUserName", $authIdentity->getUsername());
                        }

                        $subType = $isInsert ? "insert" : "update";
                        $lumberjack->send(\ProjectA\Shared\Lumberjack\Code\Log\Types::SAVE, get_class($this) . " id:" . $id . " " . $subType, $subType);
                    }
                }

                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($this);
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
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aBillingAddress2 !== null) {
                if ($this->aBillingAddress2->isModified() || $this->aBillingAddress2->isNew()) {
                    $affectedRows += $this->aBillingAddress2->save($con);
                }
                $this->setBillingAddress2($this->aBillingAddress2);
            }

            if ($this->aShippingAddress2 !== null) {
                if ($this->aShippingAddress2->isModified() || $this->aShippingAddress2->isNew()) {
                    $affectedRows += $this->aShippingAddress2->save($con);
                }
                $this->setShippingAddress2($this->aShippingAddress2);
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

            if ($this->address2sScheduledForDeletion !== null) {
                if (!$this->address2sScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create()
                        ->filterByPrimaryKeys($this->address2sScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->address2sScheduledForDeletion = null;
                }
            }

            if ($this->collAddress2s !== null) {
                foreach ($this->collAddress2s as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER;
        if (null !== $this->id_customer) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = '`id_customer`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::INCREMENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`increment_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = '`salutation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`middle_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`company`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER)) {
            $modifiedColumns[':p' . $index++]  = '`gender`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATE_OF_BIRTH)) {
            $modifiedColumns[':p' . $index++]  = '`date_of_birth`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`restore_password_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`restore_password_date`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTERED)) {
            $modifiedColumns[':p' . $index++]  = '`registered`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTRATION_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`registration_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`default_billing_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`default_shipping_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_customer2` (%s) VALUES (%s)',
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
                    case '`middle_name`':
                        $stmt->bindValue($identifier, $this->middle_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`company`':
                        $stmt->bindValue($identifier, $this->company, PDO::PARAM_STR);
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
                    case '`restore_password_date`':
                        $stmt->bindValue($identifier, $this->restore_password_date, PDO::PARAM_STR);
                        break;
                    case '`registered`':
                        $stmt->bindValue($identifier, $this->registered, PDO::PARAM_STR);
                        break;
                    case '`registration_key`':
                        $stmt->bindValue($identifier, $this->registration_key, PDO::PARAM_STR);
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
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aBillingAddress2 !== null) {
                if (!$this->aBillingAddress2->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBillingAddress2->getValidationFailures());
                }
            }

            if ($this->aShippingAddress2 !== null) {
                if (!$this->aShippingAddress2->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aShippingAddress2->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAddress2s !== null) {
                    foreach ($this->collAddress2s as $referrerFK) {
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
        $pos = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getEmail();
                break;
            case 2:
                return $this->getIncrementId();
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
                return $this->getCompany();
                break;
            case 8:
                return $this->getGender();
                break;
            case 9:
                return $this->getDateOfBirth();
                break;
            case 10:
                return $this->getPassword();
                break;
            case 11:
                return $this->getRestorePasswordKey();
                break;
            case 12:
                return $this->getRestorePasswordDate();
                break;
            case 13:
                return $this->getRegistered();
                break;
            case 14:
                return $this->getRegistrationKey();
                break;
            case 15:
                return $this->getDefaultBillingAddress();
                break;
            case 16:
                return $this->getDefaultShippingAddress();
                break;
            case 17:
                return $this->getCreatedAt();
                break;
            case 18:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCustomer(),
            $keys[1] => $this->getEmail(),
            $keys[2] => $this->getIncrementId(),
            $keys[3] => $this->getSalutation(),
            $keys[4] => $this->getFirstName(),
            $keys[5] => $this->getMiddleName(),
            $keys[6] => $this->getLastName(),
            $keys[7] => $this->getCompany(),
            $keys[8] => $this->getGender(),
            $keys[9] => $this->getDateOfBirth(),
            $keys[10] => $this->getPassword(),
            $keys[11] => $this->getRestorePasswordKey(),
            $keys[12] => $this->getRestorePasswordDate(),
            $keys[13] => $this->getRegistered(),
            $keys[14] => $this->getRegistrationKey(),
            $keys[15] => $this->getDefaultBillingAddress(),
            $keys[16] => $this->getDefaultShippingAddress(),
            $keys[17] => $this->getCreatedAt(),
            $keys[18] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aBillingAddress2) {
                $result['BillingAddress2'] = $this->aBillingAddress2->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aShippingAddress2) {
                $result['ShippingAddress2'] = $this->aShippingAddress2->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAddress2s) {
                $result['Address2s'] = $this->collAddress2s->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setEmail($value);
                break;
            case 2:
                $this->setIncrementId($value);
                break;
            case 3:
                $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION);
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
                $this->setCompany($value);
                break;
            case 8:
                $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setGender($value);
                break;
            case 9:
                $this->setDateOfBirth($value);
                break;
            case 10:
                $this->setPassword($value);
                break;
            case 11:
                $this->setRestorePasswordKey($value);
                break;
            case 12:
                $this->setRestorePasswordDate($value);
                break;
            case 13:
                $this->setRegistered($value);
                break;
            case 14:
                $this->setRegistrationKey($value);
                break;
            case 15:
                $this->setDefaultBillingAddress($value);
                break;
            case 16:
                $this->setDefaultShippingAddress($value);
                break;
            case 17:
                $this->setCreatedAt($value);
                break;
            case 18:
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
        $keys = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCustomer($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setEmail($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIncrementId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSalutation($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFirstName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMiddleName($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastName($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCompany($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setGender($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDateOfBirth($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setPassword($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setRestorePasswordKey($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setRestorePasswordDate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setRegistered($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setRegistrationKey($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setDefaultBillingAddress($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setDefaultShippingAddress($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCreatedAt($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setUpdatedAt($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER, $this->id_customer);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL, $this->email);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::INCREMENT_ID)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::INCREMENT_ID, $this->increment_id);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION, $this->salutation);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::FIRST_NAME)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::MIDDLE_NAME)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::MIDDLE_NAME, $this->middle_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::LAST_NAME)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COMPANY)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COMPANY, $this->company);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER, $this->gender);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATE_OF_BIRTH)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATE_OF_BIRTH, $this->date_of_birth);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::PASSWORD)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::PASSWORD, $this->password);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_KEY)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_KEY, $this->restore_password_key);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_DATE)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_DATE, $this->restore_password_date);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTERED)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTERED, $this->registered);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTRATION_KEY)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTRATION_KEY, $this->registration_key);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS, $this->default_billing_address);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS, $this->default_shipping_address);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER, $this->id_customer);

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
     * @param object $copyObj An object of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEmail($this->getEmail());
        $copyObj->setIncrementId($this->getIncrementId());
        $copyObj->setSalutation($this->getSalutation());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setMiddleName($this->getMiddleName());
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

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAddress2s() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAddress2($relObj->copy($deepCopy));
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 Clone of current object.
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object.
     *
     * @param                  ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $v
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBillingAddress2(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $v = null)
    {
        if ($v === null) {
            $this->setDefaultBillingAddress(NULL);
        } else {
            $this->setDefaultBillingAddress($v->getIdCustomerAddress());
        }

        $this->aBillingAddress2 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerBillingAddress2($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The associated ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object.
     * @throws PropelException
     */
    public function getBillingAddress2(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBillingAddress2 === null && ($this->default_billing_address !== null) && $doQuery) {
            $this->aBillingAddress2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create()->findPk($this->default_billing_address, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBillingAddress2->addCustomerBillingAddress2s($this);
             */
        }

        return $this->aBillingAddress2;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object.
     *
     * @param                  ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $v
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     * @throws PropelException
     */
    public function setShippingAddress2(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $v = null)
    {
        if ($v === null) {
            $this->setDefaultShippingAddress(NULL);
        } else {
            $this->setDefaultShippingAddress($v->getIdCustomerAddress());
        }

        $this->aShippingAddress2 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerShippingAddress2($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The associated ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object.
     * @throws PropelException
     */
    public function getShippingAddress2(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aShippingAddress2 === null && ($this->default_shipping_address !== null) && $doQuery) {
            $this->aShippingAddress2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create()->findPk($this->default_shipping_address, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aShippingAddress2->addCustomerShippingAddress2s($this);
             */
        }

        return $this->aShippingAddress2;
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
        if ('Address2' == $relationName) {
            $this->initAddress2s();
        }
    }

    /**
     * Clears out the collAddress2s collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     * @see        addAddress2s()
     */
    public function clearAddress2s()
    {
        $this->collAddress2s = null; // important to set this to null since that means it is uninitialized
        $this->collAddress2sPartial = null;

        return $this;
    }

    /**
     * reset is the collAddress2s collection loaded partially
     *
     * @return void
     */
    public function resetPartialAddress2s($v = true)
    {
        $this->collAddress2sPartial = $v;
    }

    /**
     * Initializes the collAddress2s collection.
     *
     * By default this just sets the collAddress2s collection to an empty array (like clearcollAddress2s());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAddress2s($overrideExisting = true)
    {
        if (null !== $this->collAddress2s && !$overrideExisting) {
            return;
        }
        $this->collAddress2s = new PropelObjectCollection();
        $this->collAddress2s->setModel('ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects
     * @throws PropelException
     */
    public function getAddress2s($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAddress2sPartial && !$this->isNew();
        if (null === $this->collAddress2s || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAddress2s) {
                // return empty collection
                $this->initAddress2s();
            } else {
                $collAddress2s = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria)
                    ->filterByCustomer2($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAddress2sPartial && count($collAddress2s)) {
                      $this->initAddress2s(false);

                      foreach ($collAddress2s as $obj) {
                        if (false == $this->collAddress2s->contains($obj)) {
                          $this->collAddress2s->append($obj);
                        }
                      }

                      $this->collAddress2sPartial = true;
                    }

                    $collAddress2s->getInternalIterator()->rewind();

                    return $collAddress2s;
                }

                if ($partial && $this->collAddress2s) {
                    foreach ($this->collAddress2s as $obj) {
                        if ($obj->isNew()) {
                            $collAddress2s[] = $obj;
                        }
                    }
                }

                $this->collAddress2s = $collAddress2s;
                $this->collAddress2sPartial = false;
            }
        }

        return $this->collAddress2s;
    }

    /**
     * Sets a collection of Address2 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $address2s A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function setAddress2s(PropelCollection $address2s, PropelPDO $con = null)
    {
        $address2sToDelete = $this->getAddress2s(new Criteria(), $con)->diff($address2s);


        $this->address2sScheduledForDeletion = $address2sToDelete;

        foreach ($address2sToDelete as $address2Removed) {
            $address2Removed->setCustomer2(null);
        }

        $this->collAddress2s = null;
        foreach ($address2s as $address2) {
            $this->addAddress2($address2);
        }

        $this->collAddress2s = $address2s;
        $this->collAddress2sPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     * @throws PropelException
     */
    public function countAddress2s(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAddress2sPartial && !$this->isNew();
        if (null === $this->collAddress2s || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAddress2s) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAddress2s());
            }
            $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCustomer2($this)
                ->count($con);
        }

        return count($this->collAddress2s);
    }

    /**
     * Method called to associate a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object to this object
     * through the ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $l ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function addAddress2(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $l)
    {
        if ($this->collAddress2s === null) {
            $this->initAddress2s();
            $this->collAddress2sPartial = true;
        }

        if (!in_array($l, $this->collAddress2s->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAddress2($l);

            if ($this->address2sScheduledForDeletion and $this->address2sScheduledForDeletion->contains($l)) {
                $this->address2sScheduledForDeletion->remove($this->address2sScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Address2 $address2 The address2 object to add.
     */
    protected function doAddAddress2($address2)
    {
        $this->collAddress2s[]= $address2;
        $address2->setCustomer2($this);
    }

    /**
     * @param	Address2 $address2 The address2 object to remove.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function removeAddress2($address2)
    {
        if ($this->getAddress2s()->contains($address2)) {
            $this->collAddress2s->remove($this->collAddress2s->search($address2));
            if (null === $this->address2sScheduledForDeletion) {
                $this->address2sScheduledForDeletion = clone $this->collAddress2s;
                $this->address2sScheduledForDeletion->clear();
            }
            $this->address2sScheduledForDeletion[]= clone $address2;
            $address2->setCustomer2(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer2 is new, it will return
     * an empty collection; or if this PacCustomer2 has previously
     * been saved, it will retrieve related Address2s from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer2.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects
     */
    public function getAddress2sJoinCountry($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria);
        $query->joinWith('Country', $join_behavior);

        return $this->getAddress2s($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCustomer2 is new, it will return
     * an empty collection; or if this PacCustomer2 has previously
     * been saved, it will retrieve related Address2s from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCustomer2.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects
     */
    public function getAddress2sJoinRegion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create(null, $criteria);
        $query->joinWith('Region', $join_behavior);

        return $this->getAddress2s($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_customer = null;
        $this->email = null;
        $this->increment_id = null;
        $this->salutation = null;
        $this->first_name = null;
        $this->middle_name = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collAddress2s) {
                foreach ($this->collAddress2s as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aBillingAddress2 instanceof Persistent) {
              $this->aBillingAddress2->clearAllReferences($deep);
            }
            if ($this->aShippingAddress2 instanceof Persistent) {
              $this->aShippingAddress2->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAddress2s instanceof PropelCollection) {
            $this->collAddress2s->clearIterator();
        }
        $this->collAddress2s = null;
        $this->aBillingAddress2 = null;
        $this->aShippingAddress2 = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT;

        return $this;
    }

}
