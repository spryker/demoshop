<?php


/**
 * Base class that represents a row from the 'pac_sales_order_address' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderAddress extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_sales_order_address field.
     * @var        int
     */
    protected $id_sales_order_address;

    /**
     * The value for the fk_misc_country field.
     * @var        int
     */
    protected $fk_misc_country;

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
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects.
     */
    protected $collSalesOrderAddressHistories;
    protected $collSalesOrderAddressHistoriesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     */
    protected $collPacSalesOrdersRelatedByFkSalesOrderAddressBilling;
    protected $collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     */
    protected $collPacSalesOrdersRelatedByFkSalesOrderAddressShipping;
    protected $collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial;

    /**
     * @var        Sao_Zed_Sales_Persistence_SaoSalesOrderAddress one-to-one related Sao_Zed_Sales_Persistence_SaoSalesOrderAddress object
     */
    protected $singleSaoAddress;

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
    protected $salesOrderAddressHistoriesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoAddressesScheduledForDeletion = null;

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
     * Get the [fk_misc_country] column value.
     *
     * @return int
     */
    public function getFkMiscCountry()
    {
        return $this->fk_misc_country;
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
        $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::SALUTATION);
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
     * Set the value of [id_sales_order_address] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setIdSalesOrderAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_address !== $v) {
            $this->id_sales_order_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS;
        }


        return $this;
    } // setIdSalesOrderAddress()

    /**
     * Set the value of [fk_misc_country] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setFkMiscCountry($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_misc_country !== $v) {
            $this->fk_misc_country = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FK_MISC_COUNTRY;
        }

        if ($this->aCountry !== null && $this->aCountry->getIdMiscCountry() !== $v) {
            $this->aCountry = null;
        }


        return $this;
    } // setFkMiscCountry()

    /**
     * Set the value of [salutation] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::SALUTATION;
        }


        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::MIDDLE_NAME;
        }


        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [address1] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS1;
        }


        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS2;
        }


        return $this;
    } // setAddress2()

    /**
     * Set the value of [address3] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setAddress3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address3 !== $v) {
            $this->address3 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS3;
        }


        return $this;
    } // setAddress3()

    /**
     * Set the value of [company] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMPANY;
        }


        return $this;
    } // setCompany()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CITY;
        }


        return $this;
    } // setCity()

    /**
     * Set the value of [zip_code] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ZIP_CODE;
        }


        return $this;
    } // setZipCode()

    /**
     * Set the value of [po_box] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setPoBox($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->po_box !== $v) {
            $this->po_box = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PO_BOX;
        }


        return $this;
    } // setPoBox()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [cell_phone] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setCellPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cell_phone !== $v) {
            $this->cell_phone = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CELL_PHONE;
        }


        return $this;
    } // setCellPhone()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMMENT;
        }


        return $this;
    } // setComment()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::UPDATED_AT;
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

            $this->id_sales_order_address = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_misc_country = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->salutation = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->first_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->middle_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->address1 = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->address2 = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->address3 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->company = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->city = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->zip_code = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->po_box = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->phone = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->cell_phone = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->description = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->comment = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->email = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->created_at = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->updated_at = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 20; // 20 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCountry = null;
            $this->collSalesOrderAddressHistories = null;

            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = null;

            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = null;

            $this->singleSaoAddress = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($this);
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

            if ($this->salesOrderAddressHistoriesScheduledForDeletion !== null) {
                if (!$this->salesOrderAddressHistoriesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create()
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

            if ($this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion !== null) {
                if (!$this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create()
                        ->filterByPrimaryKeys($this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = null;
                }
            }

            if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling !== null) {
                foreach ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion !== null) {
                if (!$this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create()
                        ->filterByPrimaryKeys($this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = null;
                }
            }

            if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping !== null) {
                foreach ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->saoAddressesScheduledForDeletion !== null) {
                if (!$this->saoAddressesScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery::create()
                        ->filterByPrimaryKeys($this->saoAddressesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoAddressesScheduledForDeletion = null;
                }
            }

            if ($this->singleSaoAddress !== null) {
                if (!$this->singleSaoAddress->isDeleted() && ($this->singleSaoAddress->isNew() || $this->singleSaoAddress->isModified())) {
                        $affectedRows += $this->singleSaoAddress->save($con);
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

        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS;
        if (null !== $this->id_sales_order_address) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`id_sales_order_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FK_MISC_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_misc_country`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = '`salutation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`middle_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = '`address1`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`address2`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = '`address3`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`company`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CITY)) {
            $modifiedColumns[':p' . $index++]  = '`city`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`zip_code`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PO_BOX)) {
            $modifiedColumns[':p' . $index++]  = '`po_box`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CELL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`cell_phone`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`comment`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_sales_order_address` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_sales_order_address`':
                        $stmt->bindValue($identifier, $this->id_sales_order_address, PDO::PARAM_INT);
                        break;
                    case '`fk_misc_country`':
                        $stmt->bindValue($identifier, $this->fk_misc_country, PDO::PARAM_INT);
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
        $this->setIdSalesOrderAddress($pk);

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


            if (($retval = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSalesOrderAddressHistories !== null) {
                    foreach ($this->collSalesOrderAddressHistories as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling !== null) {
                    foreach ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping !== null) {
                    foreach ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleSaoAddress !== null) {
                    if (!$this->singleSaoAddress->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSaoAddress->getValidationFailures());
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
        $pos = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdSalesOrderAddress();
                break;
            case 1:
                return $this->getFkMiscCountry();
                break;
            case 2:
                return $this->getSalutation();
                break;
            case 3:
                return $this->getFirstName();
                break;
            case 4:
                return $this->getMiddleName();
                break;
            case 5:
                return $this->getLastName();
                break;
            case 6:
                return $this->getAddress1();
                break;
            case 7:
                return $this->getAddress2();
                break;
            case 8:
                return $this->getAddress3();
                break;
            case 9:
                return $this->getCompany();
                break;
            case 10:
                return $this->getCity();
                break;
            case 11:
                return $this->getZipCode();
                break;
            case 12:
                return $this->getPoBox();
                break;
            case 13:
                return $this->getPhone();
                break;
            case 14:
                return $this->getCellPhone();
                break;
            case 15:
                return $this->getDescription();
                break;
            case 16:
                return $this->getComment();
                break;
            case 17:
                return $this->getEmail();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrderAddress(),
            $keys[1] => $this->getFkMiscCountry(),
            $keys[2] => $this->getSalutation(),
            $keys[3] => $this->getFirstName(),
            $keys[4] => $this->getMiddleName(),
            $keys[5] => $this->getLastName(),
            $keys[6] => $this->getAddress1(),
            $keys[7] => $this->getAddress2(),
            $keys[8] => $this->getAddress3(),
            $keys[9] => $this->getCompany(),
            $keys[10] => $this->getCity(),
            $keys[11] => $this->getZipCode(),
            $keys[12] => $this->getPoBox(),
            $keys[13] => $this->getPhone(),
            $keys[14] => $this->getCellPhone(),
            $keys[15] => $this->getDescription(),
            $keys[16] => $this->getComment(),
            $keys[17] => $this->getEmail(),
            $keys[18] => $this->getCreatedAt(),
            $keys[19] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCountry) {
                $result['Country'] = $this->aCountry->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSalesOrderAddressHistories) {
                $result['SalesOrderAddressHistories'] = $this->collSalesOrderAddressHistories->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling) {
                $result['PacSalesOrdersRelatedByFkSalesOrderAddressBilling'] = $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping) {
                $result['PacSalesOrdersRelatedByFkSalesOrderAddressShipping'] = $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleSaoAddress) {
                $result['SaoAddress'] = $this->singleSaoAddress->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdSalesOrderAddress($value);
                break;
            case 1:
                $this->setFkMiscCountry($value);
                break;
            case 2:
                $valueSet = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getValueSet(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::SALUTATION);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setSalutation($value);
                break;
            case 3:
                $this->setFirstName($value);
                break;
            case 4:
                $this->setMiddleName($value);
                break;
            case 5:
                $this->setLastName($value);
                break;
            case 6:
                $this->setAddress1($value);
                break;
            case 7:
                $this->setAddress2($value);
                break;
            case 8:
                $this->setAddress3($value);
                break;
            case 9:
                $this->setCompany($value);
                break;
            case 10:
                $this->setCity($value);
                break;
            case 11:
                $this->setZipCode($value);
                break;
            case 12:
                $this->setPoBox($value);
                break;
            case 13:
                $this->setPhone($value);
                break;
            case 14:
                $this->setCellPhone($value);
                break;
            case 15:
                $this->setDescription($value);
                break;
            case 16:
                $this->setComment($value);
                break;
            case 17:
                $this->setEmail($value);
                break;
            case 18:
                $this->setCreatedAt($value);
                break;
            case 19:
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
        $keys = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdSalesOrderAddress($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkMiscCountry($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSalutation($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFirstName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setMiddleName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastName($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAddress1($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAddress2($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAddress3($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCompany($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCity($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setZipCode($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setPoBox($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setPhone($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCellPhone($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setDescription($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setComment($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setEmail($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCreatedAt($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setUpdatedAt($arr[$keys[19]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $this->id_sales_order_address);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FK_MISC_COUNTRY)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FK_MISC_COUNTRY, $this->fk_misc_country);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::SALUTATION)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::SALUTATION, $this->salutation);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FIRST_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::MIDDLE_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::MIDDLE_NAME, $this->middle_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::LAST_NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS1)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS1, $this->address1);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS2)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS2, $this->address2);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS3)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ADDRESS3, $this->address3);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMPANY)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMPANY, $this->company);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CITY)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CITY, $this->city);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ZIP_CODE)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ZIP_CODE, $this->zip_code);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PO_BOX)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PO_BOX, $this->po_box);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PHONE)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::PHONE, $this->phone);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CELL_PHONE)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CELL_PHONE, $this->cell_phone);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DESCRIPTION)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMMENT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::COMMENT, $this->comment);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::EMAIL)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::EMAIL, $this->email);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $this->id_sales_order_address);

        return $criteria;
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
     * @param  int $key Primary key.
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
     * @param object $copyObj An object of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkMiscCountry($this->getFkMiscCountry());
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

            foreach ($this->getSalesOrderAddressHistories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderAddressHistory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacSalesOrdersRelatedByFkSalesOrderAddressBilling() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacSalesOrderRelatedByFkSalesOrderAddressBilling($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacSalesOrdersRelatedByFkSalesOrderAddressShipping() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacSalesOrderRelatedByFkSalesOrderAddressShipping($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getSaoAddress();
            if ($relObj) {
                $copyObj->setSaoAddress($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress Clone of current object.
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Misc_Persistence_PacMiscCountry object.
     *
     * @param             ProjectA_Zed_Misc_Persistence_PacMiscCountry $v
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
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
            $v->addSalesOrderAddress($this);
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
                $this->aCountry->addSalesOrderAddresses($this);
             */
        }

        return $this->aCountry;
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
        if ('SalesOrderAddressHistory' == $relationName) {
            $this->initSalesOrderAddressHistories();
        }
        if ('PacSalesOrderRelatedByFkSalesOrderAddressBilling' == $relationName) {
            $this->initPacSalesOrdersRelatedByFkSalesOrderAddressBilling();
        }
        if ('PacSalesOrderRelatedByFkSalesOrderAddressShipping' == $relationName) {
            $this->initPacSalesOrdersRelatedByFkSalesOrderAddressShipping();
        }
    }

    /**
     * Clears out the collSalesOrderAddressHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     * @see        addSalesOrderAddressHistories()
     */
    public function clearSalesOrderAddressHistories()
    {
        $this->collSalesOrderAddressHistories = null; // important to set this to null since that means it is uninitialized
        $this->collSalesOrderAddressHistoriesPartial = null;

        return $this;
    }

    /**
     * reset is the collSalesOrderAddressHistories collection loaded partially
     *
     * @return void
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
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderAddressHistories($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderAddressHistories && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderAddressHistories = new PropelObjectCollection();
        $this->collSalesOrderAddressHistories->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects
     * @throws PropelException
     */
    public function getSalesOrderAddressHistories($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                // return empty collection
                $this->initSalesOrderAddressHistories();
            } else {
                $collSalesOrderAddressHistories = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create(null, $criteria)
                    ->filterBySalesOrderAddress($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressHistoriesPartial && count($collSalesOrderAddressHistories)) {
                      $this->initSalesOrderAddressHistories(false);

                      foreach($collSalesOrderAddressHistories as $obj) {
                        if (false == $this->collSalesOrderAddressHistories->contains($obj)) {
                          $this->collSalesOrderAddressHistories->append($obj);
                        }
                      }

                      $this->collSalesOrderAddressHistoriesPartial = true;
                    }

                    $collSalesOrderAddressHistories->getInternalIterator()->rewind();
                    return $collSalesOrderAddressHistories;
                }

                if($partial && $this->collSalesOrderAddressHistories) {
                    foreach($this->collSalesOrderAddressHistories as $obj) {
                        if($obj->isNew()) {
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
     * Sets a collection of SalesOrderAddressHistory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $salesOrderAddressHistories A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setSalesOrderAddressHistories(PropelCollection $salesOrderAddressHistories, PropelPDO $con = null)
    {
        $salesOrderAddressHistoriesToDelete = $this->getSalesOrderAddressHistories(new Criteria(), $con)->diff($salesOrderAddressHistories);

        $this->salesOrderAddressHistoriesScheduledForDeletion = unserialize(serialize($salesOrderAddressHistoriesToDelete));

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
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects.
     * @throws PropelException
     */
    public function countSalesOrderAddressHistories(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSalesOrderAddressHistories());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create(null, $criteria);
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
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory $l ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function addSalesOrderAddressHistory(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory $l)
    {
        if ($this->collSalesOrderAddressHistories === null) {
            $this->initSalesOrderAddressHistories();
            $this->collSalesOrderAddressHistoriesPartial = true;
        }
        if (!in_array($l, $this->collSalesOrderAddressHistories->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSalesOrderAddressHistory($l);
        }

        return $this;
    }

    /**
     * @param	SalesOrderAddressHistory $salesOrderAddressHistory The salesOrderAddressHistory object to add.
     */
    protected function doAddSalesOrderAddressHistory($salesOrderAddressHistory)
    {
        $this->collSalesOrderAddressHistories[]= $salesOrderAddressHistory;
        $salesOrderAddressHistory->setSalesOrderAddress($this);
    }

    /**
     * @param	SalesOrderAddressHistory $salesOrderAddressHistory The salesOrderAddressHistory object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function removeSalesOrderAddressHistory($salesOrderAddressHistory)
    {
        if ($this->getSalesOrderAddressHistories()->contains($salesOrderAddressHistory)) {
            $this->collSalesOrderAddressHistories->remove($this->collSalesOrderAddressHistories->search($salesOrderAddressHistory));
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
     * Otherwise if this PacSalesOrderAddress is new, it will return
     * an empty collection; or if this PacSalesOrderAddress has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderAddress.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinCountry($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('Country', $join_behavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }

    /**
     * Clears out the collPacSalesOrdersRelatedByFkSalesOrderAddressBilling collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     * @see        addPacSalesOrdersRelatedByFkSalesOrderAddressBilling()
     */
    public function clearPacSalesOrdersRelatedByFkSalesOrderAddressBilling()
    {
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = null; // important to set this to null since that means it is uninitialized
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial = null;

        return $this;
    }

    /**
     * reset is the collPacSalesOrdersRelatedByFkSalesOrderAddressBilling collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacSalesOrdersRelatedByFkSalesOrderAddressBilling($v = true)
    {
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial = $v;
    }

    /**
     * Initializes the collPacSalesOrdersRelatedByFkSalesOrderAddressBilling collection.
     *
     * By default this just sets the collPacSalesOrdersRelatedByFkSalesOrderAddressBilling collection to an empty array (like clearcollPacSalesOrdersRelatedByFkSalesOrderAddressBilling());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacSalesOrdersRelatedByFkSalesOrderAddressBilling($overrideExisting = true)
    {
        if (null !== $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling && !$overrideExisting) {
            return;
        }
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = new PropelObjectCollection();
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrder');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     * @throws PropelException
     */
    public function getPacSalesOrdersRelatedByFkSalesOrderAddressBilling($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial && !$this->isNew();
        if (null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling) {
                // return empty collection
                $this->initPacSalesOrdersRelatedByFkSalesOrderAddressBilling();
            } else {
                $collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria)
                    ->filterByBillingAddress($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial && count($collPacSalesOrdersRelatedByFkSalesOrderAddressBilling)) {
                      $this->initPacSalesOrdersRelatedByFkSalesOrderAddressBilling(false);

                      foreach($collPacSalesOrdersRelatedByFkSalesOrderAddressBilling as $obj) {
                        if (false == $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->contains($obj)) {
                          $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->append($obj);
                        }
                      }

                      $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial = true;
                    }

                    $collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->getInternalIterator()->rewind();
                    return $collPacSalesOrdersRelatedByFkSalesOrderAddressBilling;
                }

                if($partial && $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling) {
                    foreach($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling as $obj) {
                        if($obj->isNew()) {
                            $collPacSalesOrdersRelatedByFkSalesOrderAddressBilling[] = $obj;
                        }
                    }
                }

                $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = $collPacSalesOrdersRelatedByFkSalesOrderAddressBilling;
                $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial = false;
            }
        }

        return $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling;
    }

    /**
     * Sets a collection of PacSalesOrderRelatedByFkSalesOrderAddressBilling objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacSalesOrdersRelatedByFkSalesOrderAddressBilling A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setPacSalesOrdersRelatedByFkSalesOrderAddressBilling(PropelCollection $pacSalesOrdersRelatedByFkSalesOrderAddressBilling, PropelPDO $con = null)
    {
        $pacSalesOrdersRelatedByFkSalesOrderAddressBillingToDelete = $this->getPacSalesOrdersRelatedByFkSalesOrderAddressBilling(new Criteria(), $con)->diff($pacSalesOrdersRelatedByFkSalesOrderAddressBilling);

        $this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = unserialize(serialize($pacSalesOrdersRelatedByFkSalesOrderAddressBillingToDelete));

        foreach ($pacSalesOrdersRelatedByFkSalesOrderAddressBillingToDelete as $pacSalesOrderRelatedByFkSalesOrderAddressBillingRemoved) {
            $pacSalesOrderRelatedByFkSalesOrderAddressBillingRemoved->setBillingAddress(null);
        }

        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = null;
        foreach ($pacSalesOrdersRelatedByFkSalesOrderAddressBilling as $pacSalesOrderRelatedByFkSalesOrderAddressBilling) {
            $this->addPacSalesOrderRelatedByFkSalesOrderAddressBilling($pacSalesOrderRelatedByFkSalesOrderAddressBilling);
        }

        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = $pacSalesOrdersRelatedByFkSalesOrderAddressBilling;
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial = false;

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
    public function countPacSalesOrdersRelatedByFkSalesOrderAddressBilling(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial && !$this->isNew();
        if (null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacSalesOrdersRelatedByFkSalesOrderAddressBilling());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBillingAddress($this)
                ->count($con);
        }

        return count($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrder object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrder foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrder $l ProjectA_Zed_Sales_Persistence_PacSalesOrder
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function addPacSalesOrderRelatedByFkSalesOrderAddressBilling(ProjectA_Zed_Sales_Persistence_PacSalesOrder $l)
    {
        if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling === null) {
            $this->initPacSalesOrdersRelatedByFkSalesOrderAddressBilling();
            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBillingPartial = true;
        }
        if (!in_array($l, $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacSalesOrderRelatedByFkSalesOrderAddressBilling($l);
        }

        return $this;
    }

    /**
     * @param	PacSalesOrderRelatedByFkSalesOrderAddressBilling $pacSalesOrderRelatedByFkSalesOrderAddressBilling The pacSalesOrderRelatedByFkSalesOrderAddressBilling object to add.
     */
    protected function doAddPacSalesOrderRelatedByFkSalesOrderAddressBilling($pacSalesOrderRelatedByFkSalesOrderAddressBilling)
    {
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling[]= $pacSalesOrderRelatedByFkSalesOrderAddressBilling;
        $pacSalesOrderRelatedByFkSalesOrderAddressBilling->setBillingAddress($this);
    }

    /**
     * @param	PacSalesOrderRelatedByFkSalesOrderAddressBilling $pacSalesOrderRelatedByFkSalesOrderAddressBilling The pacSalesOrderRelatedByFkSalesOrderAddressBilling object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function removePacSalesOrderRelatedByFkSalesOrderAddressBilling($pacSalesOrderRelatedByFkSalesOrderAddressBilling)
    {
        if ($this->getPacSalesOrdersRelatedByFkSalesOrderAddressBilling()->contains($pacSalesOrderRelatedByFkSalesOrderAddressBilling)) {
            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->remove($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->search($pacSalesOrderRelatedByFkSalesOrderAddressBilling));
            if (null === $this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion) {
                $this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion = clone $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling;
                $this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion->clear();
            }
            $this->pacSalesOrdersRelatedByFkSalesOrderAddressBillingScheduledForDeletion[]= clone $pacSalesOrderRelatedByFkSalesOrderAddressBilling;
            $pacSalesOrderRelatedByFkSalesOrderAddressBilling->setBillingAddress(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderAddress is new, it will return
     * an empty collection; or if this PacSalesOrderAddress has previously
     * been saved, it will retrieve related PacSalesOrdersRelatedByFkSalesOrderAddressBilling from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderAddress.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     */
    public function getPacSalesOrdersRelatedByFkSalesOrderAddressBillingJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
        $query->joinWith('Customer', $join_behavior);

        return $this->getPacSalesOrdersRelatedByFkSalesOrderAddressBilling($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderAddress is new, it will return
     * an empty collection; or if this PacSalesOrderAddress has previously
     * been saved, it will retrieve related PacSalesOrdersRelatedByFkSalesOrderAddressBilling from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderAddress.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     */
    public function getPacSalesOrdersRelatedByFkSalesOrderAddressBillingJoinProcess($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
        $query->joinWith('Process', $join_behavior);

        return $this->getPacSalesOrdersRelatedByFkSalesOrderAddressBilling($query, $con);
    }

    /**
     * Clears out the collPacSalesOrdersRelatedByFkSalesOrderAddressShipping collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     * @see        addPacSalesOrdersRelatedByFkSalesOrderAddressShipping()
     */
    public function clearPacSalesOrdersRelatedByFkSalesOrderAddressShipping()
    {
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = null; // important to set this to null since that means it is uninitialized
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial = null;

        return $this;
    }

    /**
     * reset is the collPacSalesOrdersRelatedByFkSalesOrderAddressShipping collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacSalesOrdersRelatedByFkSalesOrderAddressShipping($v = true)
    {
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial = $v;
    }

    /**
     * Initializes the collPacSalesOrdersRelatedByFkSalesOrderAddressShipping collection.
     *
     * By default this just sets the collPacSalesOrdersRelatedByFkSalesOrderAddressShipping collection to an empty array (like clearcollPacSalesOrdersRelatedByFkSalesOrderAddressShipping());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacSalesOrdersRelatedByFkSalesOrderAddressShipping($overrideExisting = true)
    {
        if (null !== $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping && !$overrideExisting) {
            return;
        }
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = new PropelObjectCollection();
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrder');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     * @throws PropelException
     */
    public function getPacSalesOrdersRelatedByFkSalesOrderAddressShipping($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial && !$this->isNew();
        if (null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping) {
                // return empty collection
                $this->initPacSalesOrdersRelatedByFkSalesOrderAddressShipping();
            } else {
                $collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria)
                    ->filterByShippingAddress($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial && count($collPacSalesOrdersRelatedByFkSalesOrderAddressShipping)) {
                      $this->initPacSalesOrdersRelatedByFkSalesOrderAddressShipping(false);

                      foreach($collPacSalesOrdersRelatedByFkSalesOrderAddressShipping as $obj) {
                        if (false == $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->contains($obj)) {
                          $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->append($obj);
                        }
                      }

                      $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial = true;
                    }

                    $collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->getInternalIterator()->rewind();
                    return $collPacSalesOrdersRelatedByFkSalesOrderAddressShipping;
                }

                if($partial && $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping) {
                    foreach($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping as $obj) {
                        if($obj->isNew()) {
                            $collPacSalesOrdersRelatedByFkSalesOrderAddressShipping[] = $obj;
                        }
                    }
                }

                $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = $collPacSalesOrdersRelatedByFkSalesOrderAddressShipping;
                $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial = false;
            }
        }

        return $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping;
    }

    /**
     * Sets a collection of PacSalesOrderRelatedByFkSalesOrderAddressShipping objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacSalesOrdersRelatedByFkSalesOrderAddressShipping A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function setPacSalesOrdersRelatedByFkSalesOrderAddressShipping(PropelCollection $pacSalesOrdersRelatedByFkSalesOrderAddressShipping, PropelPDO $con = null)
    {
        $pacSalesOrdersRelatedByFkSalesOrderAddressShippingToDelete = $this->getPacSalesOrdersRelatedByFkSalesOrderAddressShipping(new Criteria(), $con)->diff($pacSalesOrdersRelatedByFkSalesOrderAddressShipping);

        $this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = unserialize(serialize($pacSalesOrdersRelatedByFkSalesOrderAddressShippingToDelete));

        foreach ($pacSalesOrdersRelatedByFkSalesOrderAddressShippingToDelete as $pacSalesOrderRelatedByFkSalesOrderAddressShippingRemoved) {
            $pacSalesOrderRelatedByFkSalesOrderAddressShippingRemoved->setShippingAddress(null);
        }

        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = null;
        foreach ($pacSalesOrdersRelatedByFkSalesOrderAddressShipping as $pacSalesOrderRelatedByFkSalesOrderAddressShipping) {
            $this->addPacSalesOrderRelatedByFkSalesOrderAddressShipping($pacSalesOrderRelatedByFkSalesOrderAddressShipping);
        }

        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = $pacSalesOrdersRelatedByFkSalesOrderAddressShipping;
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial = false;

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
    public function countPacSalesOrdersRelatedByFkSalesOrderAddressShipping(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial && !$this->isNew();
        if (null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacSalesOrdersRelatedByFkSalesOrderAddressShipping());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShippingAddress($this)
                ->count($con);
        }

        return count($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrder object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrder foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrder $l ProjectA_Zed_Sales_Persistence_PacSalesOrder
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function addPacSalesOrderRelatedByFkSalesOrderAddressShipping(ProjectA_Zed_Sales_Persistence_PacSalesOrder $l)
    {
        if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping === null) {
            $this->initPacSalesOrdersRelatedByFkSalesOrderAddressShipping();
            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShippingPartial = true;
        }
        if (!in_array($l, $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacSalesOrderRelatedByFkSalesOrderAddressShipping($l);
        }

        return $this;
    }

    /**
     * @param	PacSalesOrderRelatedByFkSalesOrderAddressShipping $pacSalesOrderRelatedByFkSalesOrderAddressShipping The pacSalesOrderRelatedByFkSalesOrderAddressShipping object to add.
     */
    protected function doAddPacSalesOrderRelatedByFkSalesOrderAddressShipping($pacSalesOrderRelatedByFkSalesOrderAddressShipping)
    {
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping[]= $pacSalesOrderRelatedByFkSalesOrderAddressShipping;
        $pacSalesOrderRelatedByFkSalesOrderAddressShipping->setShippingAddress($this);
    }

    /**
     * @param	PacSalesOrderRelatedByFkSalesOrderAddressShipping $pacSalesOrderRelatedByFkSalesOrderAddressShipping The pacSalesOrderRelatedByFkSalesOrderAddressShipping object to remove.
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function removePacSalesOrderRelatedByFkSalesOrderAddressShipping($pacSalesOrderRelatedByFkSalesOrderAddressShipping)
    {
        if ($this->getPacSalesOrdersRelatedByFkSalesOrderAddressShipping()->contains($pacSalesOrderRelatedByFkSalesOrderAddressShipping)) {
            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->remove($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->search($pacSalesOrderRelatedByFkSalesOrderAddressShipping));
            if (null === $this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion) {
                $this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion = clone $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping;
                $this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion->clear();
            }
            $this->pacSalesOrdersRelatedByFkSalesOrderAddressShippingScheduledForDeletion[]= clone $pacSalesOrderRelatedByFkSalesOrderAddressShipping;
            $pacSalesOrderRelatedByFkSalesOrderAddressShipping->setShippingAddress(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderAddress is new, it will return
     * an empty collection; or if this PacSalesOrderAddress has previously
     * been saved, it will retrieve related PacSalesOrdersRelatedByFkSalesOrderAddressShipping from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderAddress.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     */
    public function getPacSalesOrdersRelatedByFkSalesOrderAddressShippingJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
        $query->joinWith('Customer', $join_behavior);

        return $this->getPacSalesOrdersRelatedByFkSalesOrderAddressShipping($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesOrderAddress is new, it will return
     * an empty collection; or if this PacSalesOrderAddress has previously
     * been saved, it will retrieve related PacSalesOrdersRelatedByFkSalesOrderAddressShipping from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesOrderAddress.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrder[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects
     */
    public function getPacSalesOrdersRelatedByFkSalesOrderAddressShippingJoinProcess($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create(null, $criteria);
        $query->joinWith('Process', $join_behavior);

        return $this->getPacSalesOrdersRelatedByFkSalesOrderAddressShipping($query, $con);
    }

    /**
     * Gets a single Sao_Zed_Sales_Persistence_SaoSalesOrderAddress object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderAddress
     * @throws PropelException
     */
    public function getSaoAddress(PropelPDO $con = null)
    {

        if ($this->singleSaoAddress === null && !$this->isNew()) {
            $this->singleSaoAddress = Sao_Zed_Sales_Persistence_SaoSalesOrderAddressQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSaoAddress;
    }

    /**
     * Sets a single Sao_Zed_Sales_Persistence_SaoSalesOrderAddress object as related to this object by a one-to-one relationship.
     *
     * @param             Sao_Zed_Sales_Persistence_SaoSalesOrderAddress $v Sao_Zed_Sales_Persistence_SaoSalesOrderAddress
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSaoAddress(Sao_Zed_Sales_Persistence_SaoSalesOrderAddress $v = null)
    {
        $this->singleSaoAddress = $v;

        // Make sure that that the passed-in Sao_Zed_Sales_Persistence_SaoSalesOrderAddress isn't already associated with this object
        if ($v !== null && $v->getAddress(null, false) === null) {
            $v->setAddress($this);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_sales_order_address = null;
        $this->fk_misc_country = null;
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
            if ($this->collSalesOrderAddressHistories) {
                foreach ($this->collSalesOrderAddressHistories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling) {
                foreach ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping) {
                foreach ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleSaoAddress) {
                $this->singleSaoAddress->clearAllReferences($deep);
            }
            if ($this->aCountry instanceof Persistent) {
              $this->aCountry->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSalesOrderAddressHistories instanceof PropelCollection) {
            $this->collSalesOrderAddressHistories->clearIterator();
        }
        $this->collSalesOrderAddressHistories = null;
        if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling instanceof PropelCollection) {
            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling->clearIterator();
        }
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressBilling = null;
        if ($this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping instanceof PropelCollection) {
            $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping->clearIterator();
        }
        $this->collPacSalesOrdersRelatedByFkSalesOrderAddressShipping = null;
        if ($this->singleSaoAddress instanceof PropelCollection) {
            $this->singleSaoAddress->clearIterator();
        }
        $this->singleSaoAddress = null;
        $this->aCountry = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::UPDATED_AT;

        return $this;
    }

}
