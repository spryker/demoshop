<?php


/**
 * Base class that represents a row from the 'pac_sales_order_address_history' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderAddressHistory extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_sales_order_address_history field.
     * @var        int
     */
    protected $id_sales_order_address_history;

    /**
     * The value for the fk_misc_country field.
     * @var        int
     */
    protected $fk_misc_country;

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
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        PacMiscCountry
     */
    protected $aCountry;

    /**
     * @var        PacSalesOrderAddress
     */
    protected $aSalesOrderAddress;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_billing = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderAddressHistory object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [fk_misc_country] column value.
     *
     * @return int
     */
    public function getFkMiscCountry()
    {
        return $this->fk_misc_country;
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
        $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION);
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
     * Set the value of [id_sales_order_address_history] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setIdSalesOrderAddressHistory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_address_history !== $v) {
            $this->id_sales_order_address_history = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY;
        }


        return $this;
    } // setIdSalesOrderAddressHistory()

    /**
     * Set the value of [fk_misc_country] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setFkMiscCountry($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_misc_country !== $v) {
            $this->fk_misc_country = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY;
        }

        if ($this->aCountry !== null && $this->aCountry->getIdMiscCountry() !== $v) {
            $this->aCountry = null;
        }


        return $this;
    } // setFkMiscCountry()

    /**
     * Set the value of [fk_sales_order_address] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setFkSalesOrderAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_address !== $v) {
            $this->fk_sales_order_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS;
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
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::IS_BILLING;
        }


        return $this;
    } // setIsBilling()

    /**
     * Set the value of [salutation] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION;
        }


        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME;
        }


        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [address1] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS1;
        }


        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS2;
        }


        return $this;
    } // setAddress2()

    /**
     * Set the value of [address3] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setAddress3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address3 !== $v) {
            $this->address3 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS3;
        }


        return $this;
    } // setAddress3()

    /**
     * Set the value of [company] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMPANY;
        }


        return $this;
    } // setCompany()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CITY;
        }


        return $this;
    } // setCity()

    /**
     * Set the value of [zip_code] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ZIP_CODE;
        }


        return $this;
    } // setZipCode()

    /**
     * Set the value of [po_box] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setPoBox($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->po_box !== $v) {
            $this->po_box = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PO_BOX;
        }


        return $this;
    } // setPoBox()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [cell_phone] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCellPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cell_phone !== $v) {
            $this->cell_phone = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CELL_PHONE;
        }


        return $this;
    } // setCellPhone()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMMENT;
        }


        return $this;
    } // setComment()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT;
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

            $this->id_sales_order_address_history = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_misc_country = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_sales_order_address = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->is_billing = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->salutation = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->first_name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->middle_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->address1 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->address2 = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->address3 = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->company = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->city = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->zip_code = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->po_box = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->phone = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->cell_phone = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->description = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->comment = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->email = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->created_at = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->updated_at = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 22; // 22 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory object", $e);
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

        if ($this->aCountry !== null && $this->fk_misc_country !== $this->aCountry->getIdMiscCountry()) {
            $this->aCountry = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCountry = null;
            $this->aSalesOrderAddress = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY;
        if (null !== $this->id_sales_order_address_history) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY)) {
            $modifiedColumns[':p' . $index++]  = '`id_sales_order_address_history`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_misc_country`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::IS_BILLING)) {
            $modifiedColumns[':p' . $index++]  = '`is_billing`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = '`salutation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`middle_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = '`address1`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`address2`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = '`address3`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`company`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CITY)) {
            $modifiedColumns[':p' . $index++]  = '`city`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`zip_code`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PO_BOX)) {
            $modifiedColumns[':p' . $index++]  = '`po_box`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CELL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`cell_phone`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`comment`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_sales_order_address_history` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_sales_order_address_history`':
                        $stmt->bindValue($identifier, $this->id_sales_order_address_history, PDO::PARAM_INT);
                        break;
                    case '`fk_misc_country`':
                        $stmt->bindValue($identifier, $this->fk_misc_country, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order_address`':
                        $stmt->bindValue($identifier, $this->fk_sales_order_address, PDO::PARAM_INT);
                        break;
                    case '`is_billing`':
                        $stmt->bindValue($identifier, (int) $this->is_billing, PDO::PARAM_INT);
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
                    case '`address1`':
                        $stmt->bindValue($identifier, $this->address1, PDO::PARAM_STR);
                        break;
                    case '`address2`':
                        $stmt->bindValue($identifier, $this->address2, PDO::PARAM_STR);
                        break;
                    case '`address3`':
                        $stmt->bindValue($identifier, $this->address3, PDO::PARAM_STR);
                        break;
                    case '`company`':
                        $stmt->bindValue($identifier, $this->company, PDO::PARAM_STR);
                        break;
                    case '`city`':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case '`zip_code`':
                        $stmt->bindValue($identifier, $this->zip_code, PDO::PARAM_STR);
                        break;
                    case '`po_box`':
                        $stmt->bindValue($identifier, $this->po_box, PDO::PARAM_STR);
                        break;
                    case '`phone`':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '`cell_phone`':
                        $stmt->bindValue($identifier, $this->cell_phone, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`comment`':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
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
        $this->setIdSalesOrderAddressHistory($pk);

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

            if ($this->aCountry !== null) {
                if (!$this->aCountry->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCountry->getValidationFailures());
                }
            }

            if ($this->aSalesOrderAddress !== null) {
                if (!$this->aSalesOrderAddress->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSalesOrderAddress->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdSalesOrderAddressHistory();
                break;
            case 1:
                return $this->getFkMiscCountry();
                break;
            case 2:
                return $this->getFkSalesOrderAddress();
                break;
            case 3:
                return $this->getIsBilling();
                break;
            case 4:
                return $this->getSalutation();
                break;
            case 5:
                return $this->getFirstName();
                break;
            case 6:
                return $this->getMiddleName();
                break;
            case 7:
                return $this->getLastName();
                break;
            case 8:
                return $this->getAddress1();
                break;
            case 9:
                return $this->getAddress2();
                break;
            case 10:
                return $this->getAddress3();
                break;
            case 11:
                return $this->getCompany();
                break;
            case 12:
                return $this->getCity();
                break;
            case 13:
                return $this->getZipCode();
                break;
            case 14:
                return $this->getPoBox();
                break;
            case 15:
                return $this->getPhone();
                break;
            case 16:
                return $this->getCellPhone();
                break;
            case 17:
                return $this->getDescription();
                break;
            case 18:
                return $this->getComment();
                break;
            case 19:
                return $this->getEmail();
                break;
            case 20:
                return $this->getCreatedAt();
                break;
            case 21:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrderAddressHistory(),
            $keys[1] => $this->getFkMiscCountry(),
            $keys[2] => $this->getFkSalesOrderAddress(),
            $keys[3] => $this->getIsBilling(),
            $keys[4] => $this->getSalutation(),
            $keys[5] => $this->getFirstName(),
            $keys[6] => $this->getMiddleName(),
            $keys[7] => $this->getLastName(),
            $keys[8] => $this->getAddress1(),
            $keys[9] => $this->getAddress2(),
            $keys[10] => $this->getAddress3(),
            $keys[11] => $this->getCompany(),
            $keys[12] => $this->getCity(),
            $keys[13] => $this->getZipCode(),
            $keys[14] => $this->getPoBox(),
            $keys[15] => $this->getPhone(),
            $keys[16] => $this->getCellPhone(),
            $keys[17] => $this->getDescription(),
            $keys[18] => $this->getComment(),
            $keys[19] => $this->getEmail(),
            $keys[20] => $this->getCreatedAt(),
            $keys[21] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCountry) {
                $result['Country'] = $this->aCountry->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSalesOrderAddress) {
                $result['SalesOrderAddress'] = $this->aSalesOrderAddress->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdSalesOrderAddressHistory($value);
                break;
            case 1:
                $this->setFkMiscCountry($value);
                break;
            case 2:
                $this->setFkSalesOrderAddress($value);
                break;
            case 3:
                $this->setIsBilling($value);
                break;
            case 4:
                $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 5:
                $this->setFirstName($value);
                break;
            case 6:
                $this->setMiddleName($value);
                break;
            case 7:
                $this->setLastName($value);
                break;
            case 8:
                $this->setAddress1($value);
                break;
            case 9:
                $this->setAddress2($value);
                break;
            case 10:
                $this->setAddress3($value);
                break;
            case 11:
                $this->setCompany($value);
                break;
            case 12:
                $this->setCity($value);
                break;
            case 13:
                $this->setZipCode($value);
                break;
            case 14:
                $this->setPoBox($value);
                break;
            case 15:
                $this->setPhone($value);
                break;
            case 16:
                $this->setCellPhone($value);
                break;
            case 17:
                $this->setDescription($value);
                break;
            case 18:
                $this->setComment($value);
                break;
            case 19:
                $this->setEmail($value);
                break;
            case 20:
                $this->setCreatedAt($value);
                break;
            case 21:
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
        $keys = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdSalesOrderAddressHistory($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkMiscCountry($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkSalesOrderAddress($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsBilling($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSalutation($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFirstName($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMiddleName($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastName($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAddress1($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAddress2($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAddress3($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCompany($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setCity($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setZipCode($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setPoBox($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setPhone($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setCellPhone($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setDescription($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setComment($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setEmail($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setCreatedAt($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setUpdatedAt($arr[$keys[21]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $this->id_sales_order_address_history);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, $this->fk_misc_country);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, $this->fk_sales_order_address);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::IS_BILLING)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::IS_BILLING, $this->is_billing);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION, $this->salutation);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FIRST_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME, $this->middle_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::LAST_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS1)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS1, $this->address1);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS2)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS2, $this->address2);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS3)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS3, $this->address3);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMPANY)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMPANY, $this->company);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CITY)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CITY, $this->city);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ZIP_CODE)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ZIP_CODE, $this->zip_code);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PO_BOX)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PO_BOX, $this->po_box);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PHONE)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PHONE, $this->phone);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CELL_PHONE)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CELL_PHONE, $this->cell_phone);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DESCRIPTION)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMMENT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMMENT, $this->comment);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::EMAIL)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::EMAIL, $this->email);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $this->id_sales_order_address_history);

        return $criteria;
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
     * @param  int $key Primary key.
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
     * @param object $copyObj An object of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkMiscCountry($this->getFkMiscCountry());
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

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory Clone of current object.
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Misc_Persistence_PacMiscCountry object.
     *
     * @param             ProjectA_Zed_Misc_Persistence_PacMiscCountry $v
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCountry(ProjectA_Zed_Misc_Persistence_PacMiscCountry $v = null)
    {
        if ($v === null) {
            $this->setFkMiscCountry(NULL);
        } else {
            $this->setFkMiscCountry($v->getIdMiscCountry());
        }

        $this->aCountry = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Misc_Persistence_PacMiscCountry object, it will not be re-added.
        if ($v !== null) {
            $v->addSalesOrderAddressHistory($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Misc_Persistence_PacMiscCountry object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry The associated ProjectA_Zed_Misc_Persistence_PacMiscCountry object.
     * @throws PropelException
     */
    public function getCountry(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCountry === null && ($this->fk_misc_country !== null) && $doQuery) {
            $this->aCountry = ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery::create()->findPk($this->fk_misc_country, $con);
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
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object.
     *
     * @param             ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $v
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSalesOrderAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderAddress(NULL);
        } else {
            $this->setFkSalesOrderAddress($v->getIdSalesOrderAddress());
        }

        $this->aSalesOrderAddress = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object, it will not be re-added.
        if ($v !== null) {
            $v->addSalesOrderAddressHistory($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The associated ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object.
     * @throws PropelException
     */
    public function getSalesOrderAddress(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSalesOrderAddress === null && ($this->fk_sales_order_address !== null) && $doQuery) {
            $this->aSalesOrderAddress = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery::create()->findPk($this->fk_sales_order_address, $con);
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_sales_order_address_history = null;
        $this->fk_misc_country = null;
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
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
            if ($this->aCountry instanceof Persistent) {
              $this->aCountry->clearAllReferences($deep);
            }
            if ($this->aSalesOrderAddress instanceof Persistent) {
              $this->aSalesOrderAddress->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aCountry = null;
        $this->aSalesOrderAddress = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT;

        return $this;
    }

}
