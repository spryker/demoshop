<?php


/**
 * Base class that represents a row from the 'sao_sales_order_item_version' table.
 *
 *
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemVersion extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_sales_order_item field.
     * @var        int
     */
    protected $id_sales_order_item;

    /**
     * The value for the fk_artist_sales field.
     * @var        int
     */
    protected $fk_artist_sales;

    /**
     * The value for the impression field.
     * @var        int
     */
    protected $impression;

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
     * The value for the marked_for_refund field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $marked_for_refund;

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
     * The value for the version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $version;

    /**
     * The value for the version_created_at field.
     * @var        string
     */
    protected $version_created_at;

    /**
     * The value for the version_created_by field.
     * @var        string
     */
    protected $version_created_by;

    /**
     * The value for the version_comment field.
     * @var        string
     */
    protected $version_comment;

    /**
     * @var        SaoSalesOrderItem
     */
    protected $aSaoSalesOrderItem;

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
        $this->marked_for_refund = false;
        $this->version = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemVersion object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_sales_order_item] column value.
     *
     * @return int
     */
    public function getIdSalesOrderItem()
    {
        return $this->id_sales_order_item;
    }

    /**
     * Get the [fk_artist_sales] column value.
     *
     * @return int
     */
    public function getFkArtistSales()
    {
        return $this->fk_artist_sales;
    }

    /**
     * Get the [impression] column value.
     *
     * @return int
     */
    public function getImpression()
    {
        return $this->impression;
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
        $valueSet = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getValueSet(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION);
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
     * Get the [marked_for_refund] column value.
     *
     * @return boolean
     */
    public function getMarkedForRefund()
    {
        return $this->marked_for_refund;
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
     * Get the [version] column value.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get the [optionally formatted] temporal [version_created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getVersionCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->version_created_at === null) {
            return null;
        }

        if ($this->version_created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->version_created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->version_created_at, true), $x);
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
     * Get the [version_created_by] column value.
     *
     * @return string
     */
    public function getVersionCreatedBy()
    {
        return $this->version_created_by;
    }

    /**
     * Get the [version_comment] column value.
     *
     * @return string
     */
    public function getVersionComment()
    {
        return $this->version_comment;
    }

    /**
     * Set the value of [id_sales_order_item] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setIdSalesOrderItem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_sales_order_item !== $v) {
            $this->id_sales_order_item = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM;
        }

        if ($this->aSaoSalesOrderItem !== null && $this->aSaoSalesOrderItem->getIdSalesOrderItem() !== $v) {
            $this->aSaoSalesOrderItem = null;
        }


        return $this;
    } // setIdSalesOrderItem()

    /**
     * Set the value of [fk_artist_sales] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setFkArtistSales($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_artist_sales !== $v) {
            $this->fk_artist_sales = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_ARTIST_SALES;
        }


        return $this;
    } // setFkArtistSales()

    /**
     * Set the value of [impression] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setImpression($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->impression !== $v) {
            $this->impression = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::IMPRESSION;
        }


        return $this;
    } // setImpression()

    /**
     * Set the value of [fk_misc_country] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setFkMiscCountry($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_misc_country !== $v) {
            $this->fk_misc_country = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_COUNTRY;
        }


        return $this;
    } // setFkMiscCountry()

    /**
     * Set the value of [fk_misc_region] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setFkMiscRegion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_misc_region !== $v) {
            $this->fk_misc_region = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_REGION;
        }


        return $this;
    } // setFkMiscRegion()

    /**
     * Set the value of [salutation] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setSalutation($v)
    {
        if ($v !== null) {
            $valueSet = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getValueSet(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->salutation !== $v) {
            $this->salutation = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION;
        }


        return $this;
    } // setSalutation()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [middle_name] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setMiddleName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->middle_name !== $v) {
            $this->middle_name = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MIDDLE_NAME;
        }


        return $this;
    } // setMiddleName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [address1] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS1;
        }


        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS2;
        }


        return $this;
    } // setAddress2()

    /**
     * Set the value of [address3] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setAddress3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address3 !== $v) {
            $this->address3 = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS3;
        }


        return $this;
    } // setAddress3()

    /**
     * Set the value of [company] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setCompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->company !== $v) {
            $this->company = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMPANY;
        }


        return $this;
    } // setCompany()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CITY;
        }


        return $this;
    } // setCity()

    /**
     * Set the value of [zip_code] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setZipCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->zip_code !== $v) {
            $this->zip_code = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ZIP_CODE;
        }


        return $this;
    } // setZipCode()

    /**
     * Set the value of [po_box] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setPoBox($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->po_box !== $v) {
            $this->po_box = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PO_BOX;
        }


        return $this;
    } // setPoBox()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [cell_phone] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setCellPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cell_phone !== $v) {
            $this->cell_phone = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CELL_PHONE;
        }


        return $this;
    } // setCellPhone()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMMENT;
        }


        return $this;
    } // setComment()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Sets the value of the [marked_for_refund] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setMarkedForRefund($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->marked_for_refund !== $v) {
            $this->marked_for_refund = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MARKED_FOR_REFUND;
        }


        return $this;
    } // setMarkedForRefund()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Sets the value of [version_created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setVersionCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->version_created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->version_created_at !== null && $tmpDt = new DateTime($this->version_created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->version_created_at = $newDateAsString;
                $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setVersionCreatedAt()

    /**
     * Set the value of [version_created_by] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setVersionCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->version_created_by !== $v) {
            $this->version_created_by = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_BY;
        }


        return $this;
    } // setVersionCreatedBy()

    /**
     * Set the value of [version_comment] column.
     *
     * @param string $v new value
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     */
    public function setVersionComment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->version_comment !== $v) {
            $this->version_comment = $v;
            $this->modifiedColumns[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_COMMENT;
        }


        return $this;
    } // setVersionComment()

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
            if ($this->marked_for_refund !== false) {
                return false;
            }

            if ($this->version !== 0) {
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

            $this->id_sales_order_item = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_artist_sales = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->impression = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_misc_country = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->fk_misc_region = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->salutation = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->first_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->middle_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->address1 = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->address2 = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->address3 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->company = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->city = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->zip_code = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->po_box = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->phone = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->cell_phone = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->description = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->comment = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->email = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->marked_for_refund = ($row[$startcol + 21] !== null) ? (boolean) $row[$startcol + 21] : null;
            $this->created_at = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->updated_at = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->version = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
            $this->version_created_at = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->version_created_by = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->version_comment = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 28; // 28 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion object", $e);
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

        if ($this->aSaoSalesOrderItem !== null && $this->id_sales_order_item !== $this->aSaoSalesOrderItem->getIdSalesOrderItem()) {
            $this->aSaoSalesOrderItem = null;
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
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSaoSalesOrderItem = null;
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
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionQuery::create()
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
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
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

                Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::addInstanceToPool($this);
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

            if ($this->aSaoSalesOrderItem !== null) {
                if ($this->aSaoSalesOrderItem->isModified() || $this->aSaoSalesOrderItem->isNew()) {
                    $affectedRows += $this->aSaoSalesOrderItem->save($con);
                }
                $this->setSaoSalesOrderItem($this->aSaoSalesOrderItem);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM)) {
            $modifiedColumns[':p' . $index++]  = '`id_sales_order_item`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_ARTIST_SALES)) {
            $modifiedColumns[':p' . $index++]  = '`fk_artist_sales`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::IMPRESSION)) {
            $modifiedColumns[':p' . $index++]  = '`impression`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_misc_country`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_REGION)) {
            $modifiedColumns[':p' . $index++]  = '`fk_misc_region`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION)) {
            $modifiedColumns[':p' . $index++]  = '`salutation`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MIDDLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`middle_name`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = '`address1`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`address2`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = '`address3`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`company`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CITY)) {
            $modifiedColumns[':p' . $index++]  = '`city`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ZIP_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`zip_code`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PO_BOX)) {
            $modifiedColumns[':p' . $index++]  = '`po_box`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CELL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`cell_phone`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`comment`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MARKED_FOR_REFUND)) {
            $modifiedColumns[':p' . $index++]  = '`marked_for_refund`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_at`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_by`';
        }
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`version_comment`';
        }

        $sql = sprintf(
            'INSERT INTO `sao_sales_order_item_version` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_sales_order_item`':
                        $stmt->bindValue($identifier, $this->id_sales_order_item, PDO::PARAM_INT);
                        break;
                    case '`fk_artist_sales`':
                        $stmt->bindValue($identifier, $this->fk_artist_sales, PDO::PARAM_INT);
                        break;
                    case '`impression`':
                        $stmt->bindValue($identifier, $this->impression, PDO::PARAM_INT);
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
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`comment`':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`marked_for_refund`':
                        $stmt->bindValue($identifier, (int) $this->marked_for_refund, PDO::PARAM_INT);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
                        break;
                    case '`version_created_at`':
                        $stmt->bindValue($identifier, $this->version_created_at, PDO::PARAM_STR);
                        break;
                    case '`version_created_by`':
                        $stmt->bindValue($identifier, $this->version_created_by, PDO::PARAM_STR);
                        break;
                    case '`version_comment`':
                        $stmt->bindValue($identifier, $this->version_comment, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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

            if ($this->aSaoSalesOrderItem !== null) {
                if (!$this->aSaoSalesOrderItem->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSaoSalesOrderItem->getValidationFailures());
                }
            }


            if (($retval = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdSalesOrderItem();
                break;
            case 1:
                return $this->getFkArtistSales();
                break;
            case 2:
                return $this->getImpression();
                break;
            case 3:
                return $this->getFkMiscCountry();
                break;
            case 4:
                return $this->getFkMiscRegion();
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
                return $this->getMarkedForRefund();
                break;
            case 22:
                return $this->getCreatedAt();
                break;
            case 23:
                return $this->getUpdatedAt();
                break;
            case 24:
                return $this->getVersion();
                break;
            case 25:
                return $this->getVersionCreatedAt();
                break;
            case 26:
                return $this->getVersionCreatedBy();
                break;
            case 27:
                return $this->getVersionComment();
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
        if (isset($alreadyDumpedObjects['Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion'][serialize($this->getPrimaryKey())] = true;
        $keys = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesOrderItem(),
            $keys[1] => $this->getFkArtistSales(),
            $keys[2] => $this->getImpression(),
            $keys[3] => $this->getFkMiscCountry(),
            $keys[4] => $this->getFkMiscRegion(),
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
            $keys[21] => $this->getMarkedForRefund(),
            $keys[22] => $this->getCreatedAt(),
            $keys[23] => $this->getUpdatedAt(),
            $keys[24] => $this->getVersion(),
            $keys[25] => $this->getVersionCreatedAt(),
            $keys[26] => $this->getVersionCreatedBy(),
            $keys[27] => $this->getVersionComment(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSaoSalesOrderItem) {
                $result['SaoSalesOrderItem'] = $this->aSaoSalesOrderItem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdSalesOrderItem($value);
                break;
            case 1:
                $this->setFkArtistSales($value);
                break;
            case 2:
                $this->setImpression($value);
                break;
            case 3:
                $this->setFkMiscCountry($value);
                break;
            case 4:
                $this->setFkMiscRegion($value);
                break;
            case 5:
                $valueSet = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getValueSet(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION);
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
                $this->setMarkedForRefund($value);
                break;
            case 22:
                $this->setCreatedAt($value);
                break;
            case 23:
                $this->setUpdatedAt($value);
                break;
            case 24:
                $this->setVersion($value);
                break;
            case 25:
                $this->setVersionCreatedAt($value);
                break;
            case 26:
                $this->setVersionCreatedBy($value);
                break;
            case 27:
                $this->setVersionComment($value);
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
        $keys = Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdSalesOrderItem($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkArtistSales($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setImpression($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkMiscCountry($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFkMiscRegion($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSalutation($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setFirstName($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMiddleName($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastName($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAddress1($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAddress2($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAddress3($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setCompany($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setCity($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setZipCode($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setPoBox($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setPhone($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCellPhone($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setDescription($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setComment($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setEmail($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setMarkedForRefund($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setCreatedAt($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setUpdatedAt($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setVersion($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setVersionCreatedAt($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setVersionCreatedBy($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setVersionComment($arr[$keys[27]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DATABASE_NAME);

        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $this->id_sales_order_item);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_ARTIST_SALES)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_ARTIST_SALES, $this->fk_artist_sales);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::IMPRESSION)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::IMPRESSION, $this->impression);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_COUNTRY)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_COUNTRY, $this->fk_misc_country);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_REGION)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FK_MISC_REGION, $this->fk_misc_region);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::SALUTATION, $this->salutation);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FIRST_NAME)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MIDDLE_NAME)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MIDDLE_NAME, $this->middle_name);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::LAST_NAME)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS1)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS1, $this->address1);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS2)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS2, $this->address2);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS3)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ADDRESS3, $this->address3);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMPANY)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMPANY, $this->company);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CITY)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CITY, $this->city);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ZIP_CODE)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ZIP_CODE, $this->zip_code);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PO_BOX)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PO_BOX, $this->po_box);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PHONE)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::PHONE, $this->phone);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CELL_PHONE)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CELL_PHONE, $this->cell_phone);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DESCRIPTION)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMMENT)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::COMMENT, $this->comment);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::EMAIL)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::EMAIL, $this->email);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MARKED_FOR_REFUND)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::MARKED_FOR_REFUND, $this->marked_for_refund);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CREATED_AT)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::UPDATED_AT)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION, $this->version);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_AT)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_AT, $this->version_created_at);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_BY)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_CREATED_BY, $this->version_created_by);
        if ($this->isColumnModified(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_COMMENT)) $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION_COMMENT, $this->version_comment);

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
        $criteria = new Criteria(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::ID_SALES_ORDER_ITEM, $this->id_sales_order_item);
        $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::VERSION, $this->version);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getIdSalesOrderItem();
        $pks[1] = $this->getVersion();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setIdSalesOrderItem($keys[0]);
        $this->setVersion($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdSalesOrderItem()) && (null === $this->getVersion());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdSalesOrderItem($this->getIdSalesOrderItem());
        $copyObj->setFkArtistSales($this->getFkArtistSales());
        $copyObj->setImpression($this->getImpression());
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
        $copyObj->setDescription($this->getDescription());
        $copyObj->setComment($this->getComment());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setMarkedForRefund($this->getMarkedForRefund());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setVersionCreatedAt($this->getVersionCreatedAt());
        $copyObj->setVersionCreatedBy($this->getVersionCreatedBy());
        $copyObj->setVersionComment($this->getVersionComment());

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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion Clone of current object.
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sao_Zed_Sales_Persistence_SaoSalesOrderItem object.
     *
     * @param             Sao_Zed_Sales_Persistence_SaoSalesOrderItem $v
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSaoSalesOrderItem(Sao_Zed_Sales_Persistence_SaoSalesOrderItem $v = null)
    {
        if ($v === null) {
            $this->setIdSalesOrderItem(NULL);
        } else {
            $this->setIdSalesOrderItem($v->getIdSalesOrderItem());
        }

        $this->aSaoSalesOrderItem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sao_Zed_Sales_Persistence_SaoSalesOrderItem object, it will not be re-added.
        if ($v !== null) {
            $v->addSaoSalesOrderItemVersion($this);
        }


        return $this;
    }


    /**
     * Get the associated Sao_Zed_Sales_Persistence_SaoSalesOrderItem object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItem The associated Sao_Zed_Sales_Persistence_SaoSalesOrderItem object.
     * @throws PropelException
     */
    public function getSaoSalesOrderItem(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSaoSalesOrderItem === null && ($this->id_sales_order_item !== null) && $doQuery) {
            $this->aSaoSalesOrderItem = Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery::create()->findPk($this->id_sales_order_item, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSaoSalesOrderItem->addSaoSalesOrderItemVersions($this);
             */
        }

        return $this->aSaoSalesOrderItem;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_sales_order_item = null;
        $this->fk_artist_sales = null;
        $this->impression = null;
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
        $this->description = null;
        $this->comment = null;
        $this->email = null;
        $this->marked_for_refund = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->version = null;
        $this->version_created_at = null;
        $this->version_created_by = null;
        $this->version_comment = null;
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
            if ($this->aSaoSalesOrderItem instanceof Persistent) {
              $this->aSaoSalesOrderItem->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aSaoSalesOrderItem = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::DEFAULT_STRING_FORMAT);
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

}
