<?php


/**
 * Base class that represents a row from the 'pac_customer2_address' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Customer2/Persistence/Propel.om
 */
abstract class Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2Address extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_customer_address field.
     * @var        int
     */
    protected $id_customer_address;

    /**
     * The value for the fk_customer field.
     * @var        int
     */
    protected $fk_customer;

    /**
     * The value for the fk_misc_country field.
     * @var        int
     */
    protected $fk_misc_country;

    /**
     * The value for the fk_misc_region field.
     * @var        int
     */
    protected $fk_misc_region;

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
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the is_deleted field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_deleted;

    /**
     * The value for the deleted_at field.
     * @var        string
     */
    protected $deleted_at;

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
     * @var        PacCustomer2
     */
    protected $aCustomer2;

    /**
     * @var        PacMiscCountry
     */
    protected $aCountry;

    /**
     * @var        PacMiscRegion
     */
    protected $aRegion;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2[] Collection to store aggregation of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     */
    protected $collCustomerBillingAddress2s;
    protected $collCustomerBillingAddress2sPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2[] Collection to store aggregation of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     */
    protected $collCustomerShippingAddress2s;
    protected $collCustomerShippingAddress2sPartial;

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
    protected $customerBillingAddress2sScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $customerShippingAddress2sScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_deleted = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2Address object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_customer_address] column value.
     *
     * @return int
     */
    public function getIdCustomerAddress()
    {

        return $this->id_customer_address;
    }

    /**
     * Get the [fk_customer] column value.
     *
     * @return int
     */
    public function getFkCustomer()
    {

        return $this->fk_customer;
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
     * Get the [fk_misc_region] column value.
     *
     * @return int
     */
    public function getFkMiscRegion()
    {

        return $this->fk_misc_region;
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
        $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION);
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
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {

        return $this->comment;
    }

    /**
     * Get the [is_deleted] column value.
     *
     * @return int
     */
    public function getIsDeleted()
    {

        return $this->is_deleted;
    }

    /**
     * Get the [optionally formatted] temporal [deleted_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDeletedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->deleted_at === null) {
            return null;
        }

        if ($this->deleted_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->deleted_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->deleted_at, true), $x);
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
     * Set the value of [id_customer_address] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setIdCustomerAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_customer_address !== $v) {
            $this->id_customer_address = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS;
        }


        return $this;
    } // setIdCustomerAddress()

    /**
     * Set the value of [fk_customer] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setFkCustomer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_customer !== $v) {
            $this->fk_customer = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER;
        }

        if ($this->aCustomer2 !== null && $this->aCustomer2->getIdCustomer() !== $v) {
            $this->aCustomer2 = null;
        }


        return $this;
    } // setFkCustomer()

    /**
     * Set the value of [fk_misc_country] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setFkMiscCountry($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_misc_country !== $v) {
            $this->fk_misc_country = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY;
        }

        if ($this->aCountry !== null && $this->aCountry->getIdMiscCountry() !== $v) {
            $this->aCountry = null;
        }


        return $this;
    } // setFkMiscCountry()

    /**
     * Set the value of [fk_misc_region] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setFkMiscRegion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_misc_region !== $v) {
            $this->fk_misc_region = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION;
        }

        if ($this->aRegion !== null && $this->aRegion->getIdMiscRegion() !== $v) {
            $this->aRegion = null;
        }


        return $this;
    } // setFkMiscRegion()

    /**
     * Set the value of [salutation] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION;
        }


        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::MIDDLE_NAME;
        }


        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [address1] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS1;
        }


        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS2;
        }


        return $this;
    } // setAddress2()

    /**
     * Set the value of [address3] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setAddress3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address3 !== $v) {
            $this->address3 = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS3;
        }


        return $this;
    } // setAddress3()

    /**
     * Set the value of [company] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMPANY;
        }


        return $this;
    } // setCompany()

    /**
     * Set the value of [city] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CITY;
        }


        return $this;
    } // setCity()

    /**
     * Set the value of [zip_code] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ZIP_CODE;
        }


        return $this;
    } // setZipCode()

    /**
     * Set the value of [po_box] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setPoBox($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->po_box !== $v) {
            $this->po_box = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PO_BOX;
        }


        return $this;
    } // setPoBox()

    /**
     * Set the value of [phone] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [cell_phone] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setCellPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cell_phone !== $v) {
            $this->cell_phone = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CELL_PHONE;
        }


        return $this;
    } // setCellPhone()

    /**
     * Set the value of [comment] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMMENT;
        }


        return $this;
    } // setComment()

    /**
     * Set the value of [is_deleted] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setIsDeleted($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->is_deleted !== $v) {
            $this->is_deleted = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Sets the value of [deleted_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setDeletedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->deleted_at !== null || $dt !== null) {
            $currentDateAsString = ($this->deleted_at !== null && $tmpDt = new DateTime($this->deleted_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->deleted_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DELETED_AT;
            }
        } // if either are not null


        return $this;
    } // setDeletedAt()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT;
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
            if ($this->is_deleted !== 0) {
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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_customer_address = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_customer = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_misc_country = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_misc_region = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
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
            $this->comment = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->is_deleted = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->deleted_at = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->created_at = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->updated_at = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 22; // 22 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object", $e);
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

        if ($this->aCustomer2 !== null && $this->fk_customer !== $this->aCustomer2->getIdCustomer()) {
            $this->aCustomer2 = null;
        }
        if ($this->aCountry !== null && $this->fk_misc_country !== $this->aCountry->getIdMiscCountry()) {
            $this->aCountry = null;
        }
        if ($this->aRegion !== null && $this->fk_misc_region !== $this->aRegion->getIdMiscRegion()) {
            $this->aRegion = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCustomer2 = null;
            $this->aCountry = null;
            $this->aRegion = null;
            $this->collCustomerBillingAddress2s = null;

            $this->collCustomerShippingAddress2s = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addInstanceToPool($this);
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

            if ($this->aCustomer2 !== null) {
                if ($this->aCustomer2->isModified() || $this->aCustomer2->isNew()) {
                    $affectedRows += $this->aCustomer2->save($con);
                }
                $this->setCustomer2($this->aCustomer2);
            }

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
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->customerBillingAddress2sScheduledForDeletion !== null) {
                if (!$this->customerBillingAddress2sScheduledForDeletion->isEmpty()) {
                    foreach ($this->customerBillingAddress2sScheduledForDeletion as $customerBillingAddress2) {
                        // need to save related object because we set the relation to null
                        $customerBillingAddress2->save($con);
                    }
                    $this->customerBillingAddress2sScheduledForDeletion = null;
                }
            }

            if ($this->collCustomerBillingAddress2s !== null) {
                foreach ($this->collCustomerBillingAddress2s as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->customerShippingAddress2sScheduledForDeletion !== null) {
                if (!$this->customerShippingAddress2sScheduledForDeletion->isEmpty()) {
                    foreach ($this->customerShippingAddress2sScheduledForDeletion as $customerShippingAddress2) {
                        // need to save related object because we set the relation to null
                        $customerShippingAddress2->save($con);
                    }
                    $this->customerShippingAddress2sScheduledForDeletion = null;
                }
            }

            if ($this->collCustomerShippingAddress2s !== null) {
                foreach ($this->collCustomerShippingAddress2s as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS;
        if (null !== $this->id_customer_address) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`id_customer_address`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_customer`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_misc_country`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION)) {
            $modifiedColumns[':p' . $index++]  = '`fk_misc_region`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = '`salutation`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`middle_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = '`address1`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`address2`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = '`address3`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`company`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CITY)) {
            $modifiedColumns[':p' . $index++]  = '`city`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`zip_code`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PO_BOX)) {
            $modifiedColumns[':p' . $index++]  = '`po_box`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CELL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`cell_phone`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`comment`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DELETED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`deleted_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_customer2_address` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_customer_address`':
                        $stmt->bindValue($identifier, $this->id_customer_address, PDO::PARAM_INT);
                        break;
                    case '`fk_customer`':
                        $stmt->bindValue($identifier, $this->fk_customer, PDO::PARAM_INT);
                        break;
                    case '`fk_misc_country`':
                        $stmt->bindValue($identifier, $this->fk_misc_country, PDO::PARAM_INT);
                        break;
                    case '`fk_misc_region`':
                        $stmt->bindValue($identifier, $this->fk_misc_region, PDO::PARAM_INT);
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
                    case '`comment`':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case '`is_deleted`':
                        $stmt->bindValue($identifier, $this->is_deleted, PDO::PARAM_INT);
                        break;
                    case '`deleted_at`':
                        $stmt->bindValue($identifier, $this->deleted_at, PDO::PARAM_STR);
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
        $this->setIdCustomerAddress($pk);

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

            if ($this->aCustomer2 !== null) {
                if (!$this->aCustomer2->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCustomer2->getValidationFailures());
                }
            }

            if ($this->aCountry !== null) {
                if (!$this->aCountry->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCountry->getValidationFailures());
                }
            }

            if ($this->aRegion !== null) {
                if (!$this->aRegion->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRegion->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCustomerBillingAddress2s !== null) {
                    foreach ($this->collCustomerBillingAddress2s as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCustomerShippingAddress2s !== null) {
                    foreach ($this->collCustomerShippingAddress2s as $referrerFK) {
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
        $pos = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCustomerAddress();
                break;
            case 1:
                return $this->getFkCustomer();
                break;
            case 2:
                return $this->getFkMiscCountry();
                break;
            case 3:
                return $this->getFkMiscRegion();
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
                return $this->getComment();
                break;
            case 18:
                return $this->getIsDeleted();
                break;
            case 19:
                return $this->getDeletedAt();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCustomerAddress(),
            $keys[1] => $this->getFkCustomer(),
            $keys[2] => $this->getFkMiscCountry(),
            $keys[3] => $this->getFkMiscRegion(),
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
            $keys[17] => $this->getComment(),
            $keys[18] => $this->getIsDeleted(),
            $keys[19] => $this->getDeletedAt(),
            $keys[20] => $this->getCreatedAt(),
            $keys[21] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCustomer2) {
                $result['Customer2'] = $this->aCustomer2->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCountry) {
                $result['Country'] = $this->aCountry->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRegion) {
                $result['Region'] = $this->aRegion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCustomerBillingAddress2s) {
                $result['CustomerBillingAddress2s'] = $this->collCustomerBillingAddress2s->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCustomerShippingAddress2s) {
                $result['CustomerShippingAddress2s'] = $this->collCustomerShippingAddress2s->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCustomerAddress($value);
                break;
            case 1:
                $this->setFkCustomer($value);
                break;
            case 2:
                $this->setFkMiscCountry($value);
                break;
            case 3:
                $this->setFkMiscRegion($value);
                break;
            case 4:
                $valueSet = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getValueSet(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION);
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
                $this->setComment($value);
                break;
            case 18:
                $this->setIsDeleted($value);
                break;
            case 19:
                $this->setDeletedAt($value);
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
        $keys = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCustomerAddress($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCustomer($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkMiscCountry($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkMiscRegion($arr[$keys[3]]);
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
        if (array_key_exists($keys[17], $arr)) $this->setComment($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setIsDeleted($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setDeletedAt($arr[$keys[19]]);
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
        $criteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $this->id_customer_address);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER, $this->fk_customer);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY, $this->fk_misc_country);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION, $this->fk_misc_region);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION, $this->salutation);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FIRST_NAME)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::MIDDLE_NAME)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::MIDDLE_NAME, $this->middle_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::LAST_NAME)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS1)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS1, $this->address1);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS2)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS2, $this->address2);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS3)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS3, $this->address3);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMPANY)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMPANY, $this->company);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CITY)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CITY, $this->city);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ZIP_CODE)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ZIP_CODE, $this->zip_code);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PO_BOX)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PO_BOX, $this->po_box);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PHONE)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PHONE, $this->phone);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CELL_PHONE)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CELL_PHONE, $this->cell_phone);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMMENT)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMMENT, $this->comment);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DELETED_AT)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DELETED_AT, $this->deleted_at);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $this->id_customer_address);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCustomerAddress();
    }

    /**
     * Generic method to set the primary key (id_customer_address column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCustomerAddress($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCustomerAddress();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCustomer($this->getFkCustomer());
        $copyObj->setFkMiscCountry($this->getFkMiscCountry());
        $copyObj->setFkMiscRegion($this->getFkMiscRegion());
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
        $copyObj->setComment($this->getComment());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setDeletedAt($this->getDeletedAt());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCustomerBillingAddress2s() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerBillingAddress2($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCustomerShippingAddress2s() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerShippingAddress2($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCustomerAddress(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address Clone of current object.
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object.
     *
     * @param                  ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $v
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCustomer2(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $v = null)
    {
        if ($v === null) {
            $this->setFkCustomer(NULL);
        } else {
            $this->setFkCustomer($v->getIdCustomer());
        }

        $this->aCustomer2 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object, it will not be re-added.
        if ($v !== null) {
            $v->addAddress2($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 The associated ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object.
     * @throws PropelException
     */
    public function getCustomer2(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCustomer2 === null && ($this->fk_customer !== null) && $doQuery) {
            $this->aCustomer2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query::create()->findPk($this->fk_customer, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCustomer2->addAddress2s($this);
             */
        }

        return $this->aCustomer2;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object.
     *
     * @param                  ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry $v
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCountry(ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry $v = null)
    {
        if ($v === null) {
            $this->setFkMiscCountry(NULL);
        } else {
            $this->setFkMiscCountry($v->getIdMiscCountry());
        }

        $this->aCountry = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerAddress2($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry The associated ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object.
     * @throws PropelException
     */
    public function getCountry(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCountry === null && ($this->fk_misc_country !== null) && $doQuery) {
            $this->aCountry = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryQuery::create()->findPk($this->fk_misc_country, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCountry->addCustomerAddress2s($this);
             */
        }

        return $this->aCountry;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion object.
     *
     * @param                  ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion $v
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRegion(ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion $v = null)
    {
        if ($v === null) {
            $this->setFkMiscRegion(NULL);
        } else {
            $this->setFkMiscRegion($v->getIdMiscRegion());
        }

        $this->aRegion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion object, it will not be re-added.
        if ($v !== null) {
            $v->addCustomerAddress2($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion The associated ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion object.
     * @throws PropelException
     */
    public function getRegion(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRegion === null && ($this->fk_misc_region !== null) && $doQuery) {
            $this->aRegion = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery::create()->findPk($this->fk_misc_region, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRegion->addCustomerAddress2s($this);
             */
        }

        return $this->aRegion;
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
        if ('CustomerBillingAddress2' == $relationName) {
            $this->initCustomerBillingAddress2s();
        }
        if ('CustomerShippingAddress2' == $relationName) {
            $this->initCustomerShippingAddress2s();
        }
    }

    /**
     * Clears out the collCustomerBillingAddress2s collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     * @see        addCustomerBillingAddress2s()
     */
    public function clearCustomerBillingAddress2s()
    {
        $this->collCustomerBillingAddress2s = null; // important to set this to null since that means it is uninitialized
        $this->collCustomerBillingAddress2sPartial = null;

        return $this;
    }

    /**
     * reset is the collCustomerBillingAddress2s collection loaded partially
     *
     * @return void
     */
    public function resetPartialCustomerBillingAddress2s($v = true)
    {
        $this->collCustomerBillingAddress2sPartial = $v;
    }

    /**
     * Initializes the collCustomerBillingAddress2s collection.
     *
     * By default this just sets the collCustomerBillingAddress2s collection to an empty array (like clearcollCustomerBillingAddress2s());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomerBillingAddress2s($overrideExisting = true)
    {
        if (null !== $this->collCustomerBillingAddress2s && !$overrideExisting) {
            return;
        }
        $this->collCustomerBillingAddress2s = new PropelObjectCollection();
        $this->collCustomerBillingAddress2s->setModel('ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects
     * @throws PropelException
     */
    public function getCustomerBillingAddress2s($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCustomerBillingAddress2sPartial && !$this->isNew();
        if (null === $this->collCustomerBillingAddress2s || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomerBillingAddress2s) {
                // return empty collection
                $this->initCustomerBillingAddress2s();
            } else {
                $collCustomerBillingAddress2s = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query::create(null, $criteria)
                    ->filterByBillingAddress2($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCustomerBillingAddress2sPartial && count($collCustomerBillingAddress2s)) {
                      $this->initCustomerBillingAddress2s(false);

                      foreach ($collCustomerBillingAddress2s as $obj) {
                        if (false == $this->collCustomerBillingAddress2s->contains($obj)) {
                          $this->collCustomerBillingAddress2s->append($obj);
                        }
                      }

                      $this->collCustomerBillingAddress2sPartial = true;
                    }

                    $collCustomerBillingAddress2s->getInternalIterator()->rewind();

                    return $collCustomerBillingAddress2s;
                }

                if ($partial && $this->collCustomerBillingAddress2s) {
                    foreach ($this->collCustomerBillingAddress2s as $obj) {
                        if ($obj->isNew()) {
                            $collCustomerBillingAddress2s[] = $obj;
                        }
                    }
                }

                $this->collCustomerBillingAddress2s = $collCustomerBillingAddress2s;
                $this->collCustomerBillingAddress2sPartial = false;
            }
        }

        return $this->collCustomerBillingAddress2s;
    }

    /**
     * Sets a collection of CustomerBillingAddress2 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $customerBillingAddress2s A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setCustomerBillingAddress2s(PropelCollection $customerBillingAddress2s, PropelPDO $con = null)
    {
        $customerBillingAddress2sToDelete = $this->getCustomerBillingAddress2s(new Criteria(), $con)->diff($customerBillingAddress2s);


        $this->customerBillingAddress2sScheduledForDeletion = $customerBillingAddress2sToDelete;

        foreach ($customerBillingAddress2sToDelete as $customerBillingAddress2Removed) {
            $customerBillingAddress2Removed->setBillingAddress2(null);
        }

        $this->collCustomerBillingAddress2s = null;
        foreach ($customerBillingAddress2s as $customerBillingAddress2) {
            $this->addCustomerBillingAddress2($customerBillingAddress2);
        }

        $this->collCustomerBillingAddress2s = $customerBillingAddress2s;
        $this->collCustomerBillingAddress2sPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * @throws PropelException
     */
    public function countCustomerBillingAddress2s(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCustomerBillingAddress2sPartial && !$this->isNew();
        if (null === $this->collCustomerBillingAddress2s || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerBillingAddress2s) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomerBillingAddress2s());
            }
            $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBillingAddress2($this)
                ->count($con);
        }

        return count($this->collCustomerBillingAddress2s);
    }

    /**
     * Method called to associate a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object to this object
     * through the ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $l ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function addCustomerBillingAddress2(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $l)
    {
        if ($this->collCustomerBillingAddress2s === null) {
            $this->initCustomerBillingAddress2s();
            $this->collCustomerBillingAddress2sPartial = true;
        }

        if (!in_array($l, $this->collCustomerBillingAddress2s->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCustomerBillingAddress2($l);

            if ($this->customerBillingAddress2sScheduledForDeletion and $this->customerBillingAddress2sScheduledForDeletion->contains($l)) {
                $this->customerBillingAddress2sScheduledForDeletion->remove($this->customerBillingAddress2sScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CustomerBillingAddress2 $customerBillingAddress2 The customerBillingAddress2 object to add.
     */
    protected function doAddCustomerBillingAddress2($customerBillingAddress2)
    {
        $this->collCustomerBillingAddress2s[]= $customerBillingAddress2;
        $customerBillingAddress2->setBillingAddress2($this);
    }

    /**
     * @param	CustomerBillingAddress2 $customerBillingAddress2 The customerBillingAddress2 object to remove.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function removeCustomerBillingAddress2($customerBillingAddress2)
    {
        if ($this->getCustomerBillingAddress2s()->contains($customerBillingAddress2)) {
            $this->collCustomerBillingAddress2s->remove($this->collCustomerBillingAddress2s->search($customerBillingAddress2));
            if (null === $this->customerBillingAddress2sScheduledForDeletion) {
                $this->customerBillingAddress2sScheduledForDeletion = clone $this->collCustomerBillingAddress2s;
                $this->customerBillingAddress2sScheduledForDeletion->clear();
            }
            $this->customerBillingAddress2sScheduledForDeletion[]= $customerBillingAddress2;
            $customerBillingAddress2->setBillingAddress2(null);
        }

        return $this;
    }

    /**
     * Clears out the collCustomerShippingAddress2s collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     * @see        addCustomerShippingAddress2s()
     */
    public function clearCustomerShippingAddress2s()
    {
        $this->collCustomerShippingAddress2s = null; // important to set this to null since that means it is uninitialized
        $this->collCustomerShippingAddress2sPartial = null;

        return $this;
    }

    /**
     * reset is the collCustomerShippingAddress2s collection loaded partially
     *
     * @return void
     */
    public function resetPartialCustomerShippingAddress2s($v = true)
    {
        $this->collCustomerShippingAddress2sPartial = $v;
    }

    /**
     * Initializes the collCustomerShippingAddress2s collection.
     *
     * By default this just sets the collCustomerShippingAddress2s collection to an empty array (like clearcollCustomerShippingAddress2s());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomerShippingAddress2s($overrideExisting = true)
    {
        if (null !== $this->collCustomerShippingAddress2s && !$overrideExisting) {
            return;
        }
        $this->collCustomerShippingAddress2s = new PropelObjectCollection();
        $this->collCustomerShippingAddress2s->setModel('ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2');
    }

    /**
     * Gets an array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2[] List of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects
     * @throws PropelException
     */
    public function getCustomerShippingAddress2s($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCustomerShippingAddress2sPartial && !$this->isNew();
        if (null === $this->collCustomerShippingAddress2s || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomerShippingAddress2s) {
                // return empty collection
                $this->initCustomerShippingAddress2s();
            } else {
                $collCustomerShippingAddress2s = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query::create(null, $criteria)
                    ->filterByShippingAddress2($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCustomerShippingAddress2sPartial && count($collCustomerShippingAddress2s)) {
                      $this->initCustomerShippingAddress2s(false);

                      foreach ($collCustomerShippingAddress2s as $obj) {
                        if (false == $this->collCustomerShippingAddress2s->contains($obj)) {
                          $this->collCustomerShippingAddress2s->append($obj);
                        }
                      }

                      $this->collCustomerShippingAddress2sPartial = true;
                    }

                    $collCustomerShippingAddress2s->getInternalIterator()->rewind();

                    return $collCustomerShippingAddress2s;
                }

                if ($partial && $this->collCustomerShippingAddress2s) {
                    foreach ($this->collCustomerShippingAddress2s as $obj) {
                        if ($obj->isNew()) {
                            $collCustomerShippingAddress2s[] = $obj;
                        }
                    }
                }

                $this->collCustomerShippingAddress2s = $collCustomerShippingAddress2s;
                $this->collCustomerShippingAddress2sPartial = false;
            }
        }

        return $this->collCustomerShippingAddress2s;
    }

    /**
     * Sets a collection of CustomerShippingAddress2 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $customerShippingAddress2s A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function setCustomerShippingAddress2s(PropelCollection $customerShippingAddress2s, PropelPDO $con = null)
    {
        $customerShippingAddress2sToDelete = $this->getCustomerShippingAddress2s(new Criteria(), $con)->diff($customerShippingAddress2s);


        $this->customerShippingAddress2sScheduledForDeletion = $customerShippingAddress2sToDelete;

        foreach ($customerShippingAddress2sToDelete as $customerShippingAddress2Removed) {
            $customerShippingAddress2Removed->setShippingAddress2(null);
        }

        $this->collCustomerShippingAddress2s = null;
        foreach ($customerShippingAddress2s as $customerShippingAddress2) {
            $this->addCustomerShippingAddress2($customerShippingAddress2);
        }

        $this->collCustomerShippingAddress2s = $customerShippingAddress2s;
        $this->collCustomerShippingAddress2sPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * @throws PropelException
     */
    public function countCustomerShippingAddress2s(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCustomerShippingAddress2sPartial && !$this->isNew();
        if (null === $this->collCustomerShippingAddress2s || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerShippingAddress2s) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomerShippingAddress2s());
            }
            $query = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShippingAddress2($this)
                ->count($con);
        }

        return count($this->collCustomerShippingAddress2s);
    }

    /**
     * Method called to associate a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object to this object
     * through the ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 foreign key attribute.
     *
     * @param    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $l ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function addCustomerShippingAddress2(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $l)
    {
        if ($this->collCustomerShippingAddress2s === null) {
            $this->initCustomerShippingAddress2s();
            $this->collCustomerShippingAddress2sPartial = true;
        }

        if (!in_array($l, $this->collCustomerShippingAddress2s->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCustomerShippingAddress2($l);

            if ($this->customerShippingAddress2sScheduledForDeletion and $this->customerShippingAddress2sScheduledForDeletion->contains($l)) {
                $this->customerShippingAddress2sScheduledForDeletion->remove($this->customerShippingAddress2sScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CustomerShippingAddress2 $customerShippingAddress2 The customerShippingAddress2 object to add.
     */
    protected function doAddCustomerShippingAddress2($customerShippingAddress2)
    {
        $this->collCustomerShippingAddress2s[]= $customerShippingAddress2;
        $customerShippingAddress2->setShippingAddress2($this);
    }

    /**
     * @param	CustomerShippingAddress2 $customerShippingAddress2 The customerShippingAddress2 object to remove.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function removeCustomerShippingAddress2($customerShippingAddress2)
    {
        if ($this->getCustomerShippingAddress2s()->contains($customerShippingAddress2)) {
            $this->collCustomerShippingAddress2s->remove($this->collCustomerShippingAddress2s->search($customerShippingAddress2));
            if (null === $this->customerShippingAddress2sScheduledForDeletion) {
                $this->customerShippingAddress2sScheduledForDeletion = clone $this->collCustomerShippingAddress2s;
                $this->customerShippingAddress2sScheduledForDeletion->clear();
            }
            $this->customerShippingAddress2sScheduledForDeletion[]= $customerShippingAddress2;
            $customerShippingAddress2->setShippingAddress2(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_customer_address = null;
        $this->fk_customer = null;
        $this->fk_misc_country = null;
        $this->fk_misc_region = null;
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
        $this->comment = null;
        $this->is_deleted = null;
        $this->deleted_at = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collCustomerBillingAddress2s) {
                foreach ($this->collCustomerBillingAddress2s as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCustomerShippingAddress2s) {
                foreach ($this->collCustomerShippingAddress2s as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCustomer2 instanceof Persistent) {
              $this->aCustomer2->clearAllReferences($deep);
            }
            if ($this->aCountry instanceof Persistent) {
              $this->aCountry->clearAllReferences($deep);
            }
            if ($this->aRegion instanceof Persistent) {
              $this->aRegion->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCustomerBillingAddress2s instanceof PropelCollection) {
            $this->collCustomerBillingAddress2s->clearIterator();
        }
        $this->collCustomerBillingAddress2s = null;
        if ($this->collCustomerShippingAddress2s instanceof PropelCollection) {
            $this->collCustomerShippingAddress2s->clearIterator();
        }
        $this->collCustomerShippingAddress2s = null;
        $this->aCustomer2 = null;
        $this->aCountry = null;
        $this->aRegion = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT;

        return $this;
    }

}
