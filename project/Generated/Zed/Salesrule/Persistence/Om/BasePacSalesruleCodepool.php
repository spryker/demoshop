<?php


/**
 * Base class that represents a row from the 'pac_salesrule_codepool' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.om
 */
abstract class Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleCodepool extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_salesrule_codepool field.
     * @var        int
     */
    protected $id_salesrule_codepool;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the prefix field.
     * @var        string
     */
    protected $prefix;

    /**
     * The value for the is_reusable field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_reusable;

    /**
     * The value for the is_once_per_customer field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $is_once_per_customer;

    /**
     * The value for the is_refundable field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_refundable;

    /**
     * The value for the is_balanced field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_balanced;

    /**
     * The value for the is_voucher field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_voucher;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $is_active;

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
     * @var        PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[] Collection to store aggregation of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects.
     */
    protected $collSalesruleCodes;
    protected $collSalesruleCodesPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool[] Collection to store aggregation of Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects.
     */
    protected $collMailSequenceElementCodepools;
    protected $collMailSequenceElementCodepoolsPartial;

    /**
     * @var        PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] Collection to store aggregation of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects.
     */
    protected $collSaoMailSequenceCartUserCodes;
    protected $collSaoMailSequenceCartUserCodesPartial;

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
    protected $salesruleCodesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mailSequenceElementCodepoolsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $saoMailSequenceCartUserCodesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_reusable = 0;
        $this->is_once_per_customer = 1;
        $this->is_refundable = 0;
        $this->is_balanced = 0;
        $this->is_voucher = 0;
        $this->is_active = 1;
    }

    /**
     * Initializes internal state of Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleCodepool object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_salesrule_codepool] column value.
     *
     * @return int
     */
    public function getIdSalesruleCodepool()
    {
        return $this->id_salesrule_codepool;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [prefix] column value.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Get the [is_reusable] column value.
     *
     * @return int
     */
    public function getIsReusable()
    {
        return $this->is_reusable;
    }

    /**
     * Get the [is_once_per_customer] column value.
     *
     * @return int
     */
    public function getIsOncePerCustomer()
    {
        return $this->is_once_per_customer;
    }

    /**
     * Get the [is_refundable] column value.
     *
     * @return int
     */
    public function getIsRefundable()
    {
        return $this->is_refundable;
    }

    /**
     * Get the [is_balanced] column value.
     *
     * @return int
     */
    public function getIsBalanced()
    {
        return $this->is_balanced;
    }

    /**
     * Get the [is_voucher] column value.
     *
     * @return int
     */
    public function getIsVoucher()
    {
        return $this->is_voucher;
    }

    /**
     * Get the [is_active] column value.
     *
     * @return int
     */
    public function getIsActive()
    {
        return $this->is_active;
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
     * Set the value of [id_salesrule_codepool] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setIdSalesruleCodepool($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_salesrule_codepool !== $v) {
            $this->id_salesrule_codepool = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::ID_SALESRULE_CODEPOOL;
        }


        return $this;
    } // setIdSalesruleCodepool()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [prefix] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setPrefix($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->prefix !== $v) {
            $this->prefix = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::PREFIX;
        }


        return $this;
    } // setPrefix()

    /**
     * Set the value of [is_reusable] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setIsReusable($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->is_reusable !== $v) {
            $this->is_reusable = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REUSABLE;
        }


        return $this;
    } // setIsReusable()

    /**
     * Set the value of [is_once_per_customer] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setIsOncePerCustomer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->is_once_per_customer !== $v) {
            $this->is_once_per_customer = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ONCE_PER_CUSTOMER;
        }


        return $this;
    } // setIsOncePerCustomer()

    /**
     * Set the value of [is_refundable] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setIsRefundable($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->is_refundable !== $v) {
            $this->is_refundable = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REFUNDABLE;
        }


        return $this;
    } // setIsRefundable()

    /**
     * Set the value of [is_balanced] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setIsBalanced($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->is_balanced !== $v) {
            $this->is_balanced = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_BALANCED;
        }


        return $this;
    } // setIsBalanced()

    /**
     * Set the value of [is_voucher] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setIsVoucher($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->is_voucher !== $v) {
            $this->is_voucher = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_VOUCHER;
        }


        return $this;
    } // setIsVoucher()

    /**
     * Set the value of [is_active] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setIsActive($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->is_active !== $v) {
            $this->is_active = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::UPDATED_AT;
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
            if ($this->is_reusable !== 0) {
                return false;
            }

            if ($this->is_once_per_customer !== 1) {
                return false;
            }

            if ($this->is_refundable !== 0) {
                return false;
            }

            if ($this->is_balanced !== 0) {
                return false;
            }

            if ($this->is_voucher !== 0) {
                return false;
            }

            if ($this->is_active !== 1) {
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

            $this->id_salesrule_codepool = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->prefix = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->is_reusable = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->is_once_per_customer = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->is_refundable = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->is_balanced = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->is_voucher = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->is_active = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSalesruleCodes = null;

            $this->collMailSequenceElementCodepools = null;

            $this->collSaoMailSequenceCartUserCodes = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::addInstanceToPool($this);
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

            if ($this->salesruleCodesScheduledForDeletion !== null) {
                if (!$this->salesruleCodesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery::create()
                        ->filterByPrimaryKeys($this->salesruleCodesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->mailSequenceElementCodepoolsScheduledForDeletion !== null) {
                if (!$this->mailSequenceElementCodepoolsScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery::create()
                        ->filterByPrimaryKeys($this->mailSequenceElementCodepoolsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mailSequenceElementCodepoolsScheduledForDeletion = null;
                }
            }

            if ($this->collMailSequenceElementCodepools !== null) {
                foreach ($this->collMailSequenceElementCodepools as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->saoMailSequenceCartUserCodesScheduledForDeletion !== null) {
                if (!$this->saoMailSequenceCartUserCodesScheduledForDeletion->isEmpty()) {
                    Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create()
                        ->filterByPrimaryKeys($this->saoMailSequenceCartUserCodesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->saoMailSequenceCartUserCodesScheduledForDeletion = null;
                }
            }

            if ($this->collSaoMailSequenceCartUserCodes !== null) {
                foreach ($this->collSaoMailSequenceCartUserCodes as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::ID_SALESRULE_CODEPOOL;
        if (null !== $this->id_salesrule_codepool) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::ID_SALESRULE_CODEPOOL . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::ID_SALESRULE_CODEPOOL)) {
            $modifiedColumns[':p' . $index++]  = '`id_salesrule_codepool`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::PREFIX)) {
            $modifiedColumns[':p' . $index++]  = '`prefix`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REUSABLE)) {
            $modifiedColumns[':p' . $index++]  = '`is_reusable`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ONCE_PER_CUSTOMER)) {
            $modifiedColumns[':p' . $index++]  = '`is_once_per_customer`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REFUNDABLE)) {
            $modifiedColumns[':p' . $index++]  = '`is_refundable`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_BALANCED)) {
            $modifiedColumns[':p' . $index++]  = '`is_balanced`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_VOUCHER)) {
            $modifiedColumns[':p' . $index++]  = '`is_voucher`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_salesrule_codepool` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_salesrule_codepool`':
                        $stmt->bindValue($identifier, $this->id_salesrule_codepool, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`prefix`':
                        $stmt->bindValue($identifier, $this->prefix, PDO::PARAM_STR);
                        break;
                    case '`is_reusable`':
                        $stmt->bindValue($identifier, $this->is_reusable, PDO::PARAM_INT);
                        break;
                    case '`is_once_per_customer`':
                        $stmt->bindValue($identifier, $this->is_once_per_customer, PDO::PARAM_INT);
                        break;
                    case '`is_refundable`':
                        $stmt->bindValue($identifier, $this->is_refundable, PDO::PARAM_INT);
                        break;
                    case '`is_balanced`':
                        $stmt->bindValue($identifier, $this->is_balanced, PDO::PARAM_INT);
                        break;
                    case '`is_voucher`':
                        $stmt->bindValue($identifier, $this->is_voucher, PDO::PARAM_INT);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, $this->is_active, PDO::PARAM_INT);
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
        $this->setIdSalesruleCodepool($pk);

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


            if (($retval = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSalesruleCodes !== null) {
                    foreach ($this->collSalesruleCodes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMailSequenceElementCodepools !== null) {
                    foreach ($this->collMailSequenceElementCodepools as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSaoMailSequenceCartUserCodes !== null) {
                    foreach ($this->collSaoMailSequenceCartUserCodes as $referrerFK) {
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
        $pos = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdSalesruleCodepool();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getPrefix();
                break;
            case 3:
                return $this->getIsReusable();
                break;
            case 4:
                return $this->getIsOncePerCustomer();
                break;
            case 5:
                return $this->getIsRefundable();
                break;
            case 6:
                return $this->getIsBalanced();
                break;
            case 7:
                return $this->getIsVoucher();
                break;
            case 8:
                return $this->getIsActive();
                break;
            case 9:
                return $this->getCreatedAt();
                break;
            case 10:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesruleCodepool(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getPrefix(),
            $keys[3] => $this->getIsReusable(),
            $keys[4] => $this->getIsOncePerCustomer(),
            $keys[5] => $this->getIsRefundable(),
            $keys[6] => $this->getIsBalanced(),
            $keys[7] => $this->getIsVoucher(),
            $keys[8] => $this->getIsActive(),
            $keys[9] => $this->getCreatedAt(),
            $keys[10] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collSalesruleCodes) {
                $result['SalesruleCodes'] = $this->collSalesruleCodes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMailSequenceElementCodepools) {
                $result['MailSequenceElementCodepools'] = $this->collMailSequenceElementCodepools->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSaoMailSequenceCartUserCodes) {
                $result['SaoMailSequenceCartUserCodes'] = $this->collSaoMailSequenceCartUserCodes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdSalesruleCodepool($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setPrefix($value);
                break;
            case 3:
                $this->setIsReusable($value);
                break;
            case 4:
                $this->setIsOncePerCustomer($value);
                break;
            case 5:
                $this->setIsRefundable($value);
                break;
            case 6:
                $this->setIsBalanced($value);
                break;
            case 7:
                $this->setIsVoucher($value);
                break;
            case 8:
                $this->setIsActive($value);
                break;
            case 9:
                $this->setCreatedAt($value);
                break;
            case 10:
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
        $keys = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdSalesruleCodepool($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPrefix($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsReusable($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIsOncePerCustomer($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIsRefundable($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setIsBalanced($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsVoucher($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIsActive($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::ID_SALESRULE_CODEPOOL)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::ID_SALESRULE_CODEPOOL, $this->id_salesrule_codepool);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::NAME)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::PREFIX)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::PREFIX, $this->prefix);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REUSABLE)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REUSABLE, $this->is_reusable);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ONCE_PER_CUSTOMER)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ONCE_PER_CUSTOMER, $this->is_once_per_customer);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REFUNDABLE)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_REFUNDABLE, $this->is_refundable);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_BALANCED)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_BALANCED, $this->is_balanced);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_VOUCHER)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_VOUCHER, $this->is_voucher);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ACTIVE)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::ID_SALESRULE_CODEPOOL, $this->id_salesrule_codepool);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdSalesruleCodepool();
    }

    /**
     * Generic method to set the primary key (id_salesrule_codepool column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesruleCodepool($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdSalesruleCodepool();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setPrefix($this->getPrefix());
        $copyObj->setIsReusable($this->getIsReusable());
        $copyObj->setIsOncePerCustomer($this->getIsOncePerCustomer());
        $copyObj->setIsRefundable($this->getIsRefundable());
        $copyObj->setIsBalanced($this->getIsBalanced());
        $copyObj->setIsVoucher($this->getIsVoucher());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSalesruleCodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesruleCode($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMailSequenceElementCodepools() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMailSequenceElementCodepool($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSaoMailSequenceCartUserCodes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSaoMailSequenceCartUserCode($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesruleCodepool(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool Clone of current object.
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer();
        }

        return self::$peer;
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
        if ('SalesruleCode' == $relationName) {
            $this->initSalesruleCodes();
        }
        if ('MailSequenceElementCodepool' == $relationName) {
            $this->initMailSequenceElementCodepools();
        }
        if ('SaoMailSequenceCartUserCode' == $relationName) {
            $this->initSaoMailSequenceCartUserCodes();
        }
    }

    /**
     * Clears out the collSalesruleCodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
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
     * If this ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool is new, it will return
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
                    ->filterByCodepool($this)
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setSalesruleCodes(PropelCollection $salesruleCodes, PropelPDO $con = null)
    {
        $salesruleCodesToDelete = $this->getSalesruleCodes(new Criteria(), $con)->diff($salesruleCodes);

        $this->salesruleCodesScheduledForDeletion = unserialize(serialize($salesruleCodesToDelete));

        foreach ($salesruleCodesToDelete as $salesruleCodeRemoved) {
            $salesruleCodeRemoved->setCodepool(null);
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
                ->filterByCodepool($this)
                ->count($con);
        }

        return count($this->collSalesruleCodes);
    }

    /**
     * Method called to associate a ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object to this object
     * through the ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode foreign key attribute.
     *
     * @param    ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode $l ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
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
        $salesruleCode->setCodepool($this);
    }

    /**
     * @param	SalesruleCode $salesruleCode The salesruleCode object to remove.
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function removeSalesruleCode($salesruleCode)
    {
        if ($this->getSalesruleCodes()->contains($salesruleCode)) {
            $this->collSalesruleCodes->remove($this->collSalesruleCodes->search($salesruleCode));
            if (null === $this->salesruleCodesScheduledForDeletion) {
                $this->salesruleCodesScheduledForDeletion = clone $this->collSalesruleCodes;
                $this->salesruleCodesScheduledForDeletion->clear();
            }
            $this->salesruleCodesScheduledForDeletion[]= clone $salesruleCode;
            $salesruleCode->setCodepool(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesruleCodepool is new, it will return
     * an empty collection; or if this PacSalesruleCodepool has previously
     * been saved, it will retrieve related SalesruleCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesruleCodepool.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[] List of ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects
     */
    public function getSalesruleCodesJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery::create(null, $criteria);
        $query->joinWith('Customer', $join_behavior);

        return $this->getSalesruleCodes($query, $con);
    }

    /**
     * Clears out the collMailSequenceElementCodepools collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     * @see        addMailSequenceElementCodepools()
     */
    public function clearMailSequenceElementCodepools()
    {
        $this->collMailSequenceElementCodepools = null; // important to set this to null since that means it is uninitialized
        $this->collMailSequenceElementCodepoolsPartial = null;

        return $this;
    }

    /**
     * reset is the collMailSequenceElementCodepools collection loaded partially
     *
     * @return void
     */
    public function resetPartialMailSequenceElementCodepools($v = true)
    {
        $this->collMailSequenceElementCodepoolsPartial = $v;
    }

    /**
     * Initializes the collMailSequenceElementCodepools collection.
     *
     * By default this just sets the collMailSequenceElementCodepools collection to an empty array (like clearcollMailSequenceElementCodepools());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMailSequenceElementCodepools($overrideExisting = true)
    {
        if (null !== $this->collMailSequenceElementCodepools && !$overrideExisting) {
            return;
        }
        $this->collMailSequenceElementCodepools = new PropelObjectCollection();
        $this->collMailSequenceElementCodepools->setModel('Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool');
    }

    /**
     * Gets an array of Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects
     * @throws PropelException
     */
    public function getMailSequenceElementCodepools($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMailSequenceElementCodepoolsPartial && !$this->isNew();
        if (null === $this->collMailSequenceElementCodepools || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMailSequenceElementCodepools) {
                // return empty collection
                $this->initMailSequenceElementCodepools();
            } else {
                $collMailSequenceElementCodepools = Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery::create(null, $criteria)
                    ->filterBySalesruleCodepool($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMailSequenceElementCodepoolsPartial && count($collMailSequenceElementCodepools)) {
                      $this->initMailSequenceElementCodepools(false);

                      foreach($collMailSequenceElementCodepools as $obj) {
                        if (false == $this->collMailSequenceElementCodepools->contains($obj)) {
                          $this->collMailSequenceElementCodepools->append($obj);
                        }
                      }

                      $this->collMailSequenceElementCodepoolsPartial = true;
                    }

                    $collMailSequenceElementCodepools->getInternalIterator()->rewind();
                    return $collMailSequenceElementCodepools;
                }

                if($partial && $this->collMailSequenceElementCodepools) {
                    foreach($this->collMailSequenceElementCodepools as $obj) {
                        if($obj->isNew()) {
                            $collMailSequenceElementCodepools[] = $obj;
                        }
                    }
                }

                $this->collMailSequenceElementCodepools = $collMailSequenceElementCodepools;
                $this->collMailSequenceElementCodepoolsPartial = false;
            }
        }

        return $this->collMailSequenceElementCodepools;
    }

    /**
     * Sets a collection of MailSequenceElementCodepool objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mailSequenceElementCodepools A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setMailSequenceElementCodepools(PropelCollection $mailSequenceElementCodepools, PropelPDO $con = null)
    {
        $mailSequenceElementCodepoolsToDelete = $this->getMailSequenceElementCodepools(new Criteria(), $con)->diff($mailSequenceElementCodepools);

        $this->mailSequenceElementCodepoolsScheduledForDeletion = unserialize(serialize($mailSequenceElementCodepoolsToDelete));

        foreach ($mailSequenceElementCodepoolsToDelete as $mailSequenceElementCodepoolRemoved) {
            $mailSequenceElementCodepoolRemoved->setSalesruleCodepool(null);
        }

        $this->collMailSequenceElementCodepools = null;
        foreach ($mailSequenceElementCodepools as $mailSequenceElementCodepool) {
            $this->addMailSequenceElementCodepool($mailSequenceElementCodepool);
        }

        $this->collMailSequenceElementCodepools = $mailSequenceElementCodepools;
        $this->collMailSequenceElementCodepoolsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects.
     * @throws PropelException
     */
    public function countMailSequenceElementCodepools(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMailSequenceElementCodepoolsPartial && !$this->isNew();
        if (null === $this->collMailSequenceElementCodepools || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMailSequenceElementCodepools) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMailSequenceElementCodepools());
            }
            $query = Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySalesruleCodepool($this)
                ->count($con);
        }

        return count($this->collMailSequenceElementCodepools);
    }

    /**
     * Method called to associate a Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool object to this object
     * through the Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool foreign key attribute.
     *
     * @param    Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool $l Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function addMailSequenceElementCodepool(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool $l)
    {
        if ($this->collMailSequenceElementCodepools === null) {
            $this->initMailSequenceElementCodepools();
            $this->collMailSequenceElementCodepoolsPartial = true;
        }
        if (!in_array($l, $this->collMailSequenceElementCodepools->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMailSequenceElementCodepool($l);
        }

        return $this;
    }

    /**
     * @param	MailSequenceElementCodepool $mailSequenceElementCodepool The mailSequenceElementCodepool object to add.
     */
    protected function doAddMailSequenceElementCodepool($mailSequenceElementCodepool)
    {
        $this->collMailSequenceElementCodepools[]= $mailSequenceElementCodepool;
        $mailSequenceElementCodepool->setSalesruleCodepool($this);
    }

    /**
     * @param	MailSequenceElementCodepool $mailSequenceElementCodepool The mailSequenceElementCodepool object to remove.
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function removeMailSequenceElementCodepool($mailSequenceElementCodepool)
    {
        if ($this->getMailSequenceElementCodepools()->contains($mailSequenceElementCodepool)) {
            $this->collMailSequenceElementCodepools->remove($this->collMailSequenceElementCodepools->search($mailSequenceElementCodepool));
            if (null === $this->mailSequenceElementCodepoolsScheduledForDeletion) {
                $this->mailSequenceElementCodepoolsScheduledForDeletion = clone $this->collMailSequenceElementCodepools;
                $this->mailSequenceElementCodepoolsScheduledForDeletion->clear();
            }
            $this->mailSequenceElementCodepoolsScheduledForDeletion[]= clone $mailSequenceElementCodepool;
            $mailSequenceElementCodepool->setSalesruleCodepool(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesruleCodepool is new, it will return
     * an empty collection; or if this PacSalesruleCodepool has previously
     * been saved, it will retrieve related MailSequenceElementCodepools from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesruleCodepool.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects
     */
    public function getMailSequenceElementCodepoolsJoinMailSequenceElement($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery::create(null, $criteria);
        $query->joinWith('MailSequenceElement', $join_behavior);

        return $this->getMailSequenceElementCodepools($query, $con);
    }

    /**
     * Clears out the collSaoMailSequenceCartUserCodes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     * @see        addSaoMailSequenceCartUserCodes()
     */
    public function clearSaoMailSequenceCartUserCodes()
    {
        $this->collSaoMailSequenceCartUserCodes = null; // important to set this to null since that means it is uninitialized
        $this->collSaoMailSequenceCartUserCodesPartial = null;

        return $this;
    }

    /**
     * reset is the collSaoMailSequenceCartUserCodes collection loaded partially
     *
     * @return void
     */
    public function resetPartialSaoMailSequenceCartUserCodes($v = true)
    {
        $this->collSaoMailSequenceCartUserCodesPartial = $v;
    }

    /**
     * Initializes the collSaoMailSequenceCartUserCodes collection.
     *
     * By default this just sets the collSaoMailSequenceCartUserCodes collection to an empty array (like clearcollSaoMailSequenceCartUserCodes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSaoMailSequenceCartUserCodes($overrideExisting = true)
    {
        if (null !== $this->collSaoMailSequenceCartUserCodes && !$overrideExisting) {
            return;
        }
        $this->collSaoMailSequenceCartUserCodes = new PropelObjectCollection();
        $this->collSaoMailSequenceCartUserCodes->setModel('Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode');
    }

    /**
     * Gets an array of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     * @throws PropelException
     */
    public function getSaoMailSequenceCartUserCodes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSaoMailSequenceCartUserCodesPartial && !$this->isNew();
        if (null === $this->collSaoMailSequenceCartUserCodes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSaoMailSequenceCartUserCodes) {
                // return empty collection
                $this->initSaoMailSequenceCartUserCodes();
            } else {
                $collSaoMailSequenceCartUserCodes = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria)
                    ->filterBySalesruleCodepool($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSaoMailSequenceCartUserCodesPartial && count($collSaoMailSequenceCartUserCodes)) {
                      $this->initSaoMailSequenceCartUserCodes(false);

                      foreach($collSaoMailSequenceCartUserCodes as $obj) {
                        if (false == $this->collSaoMailSequenceCartUserCodes->contains($obj)) {
                          $this->collSaoMailSequenceCartUserCodes->append($obj);
                        }
                      }

                      $this->collSaoMailSequenceCartUserCodesPartial = true;
                    }

                    $collSaoMailSequenceCartUserCodes->getInternalIterator()->rewind();
                    return $collSaoMailSequenceCartUserCodes;
                }

                if($partial && $this->collSaoMailSequenceCartUserCodes) {
                    foreach($this->collSaoMailSequenceCartUserCodes as $obj) {
                        if($obj->isNew()) {
                            $collSaoMailSequenceCartUserCodes[] = $obj;
                        }
                    }
                }

                $this->collSaoMailSequenceCartUserCodes = $collSaoMailSequenceCartUserCodes;
                $this->collSaoMailSequenceCartUserCodesPartial = false;
            }
        }

        return $this->collSaoMailSequenceCartUserCodes;
    }

    /**
     * Sets a collection of SaoMailSequenceCartUserCode objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $saoMailSequenceCartUserCodes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function setSaoMailSequenceCartUserCodes(PropelCollection $saoMailSequenceCartUserCodes, PropelPDO $con = null)
    {
        $saoMailSequenceCartUserCodesToDelete = $this->getSaoMailSequenceCartUserCodes(new Criteria(), $con)->diff($saoMailSequenceCartUserCodes);

        $this->saoMailSequenceCartUserCodesScheduledForDeletion = unserialize(serialize($saoMailSequenceCartUserCodesToDelete));

        foreach ($saoMailSequenceCartUserCodesToDelete as $saoMailSequenceCartUserCodeRemoved) {
            $saoMailSequenceCartUserCodeRemoved->setSalesruleCodepool(null);
        }

        $this->collSaoMailSequenceCartUserCodes = null;
        foreach ($saoMailSequenceCartUserCodes as $saoMailSequenceCartUserCode) {
            $this->addSaoMailSequenceCartUserCode($saoMailSequenceCartUserCode);
        }

        $this->collSaoMailSequenceCartUserCodes = $saoMailSequenceCartUserCodes;
        $this->collSaoMailSequenceCartUserCodesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects.
     * @throws PropelException
     */
    public function countSaoMailSequenceCartUserCodes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSaoMailSequenceCartUserCodesPartial && !$this->isNew();
        if (null === $this->collSaoMailSequenceCartUserCodes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSaoMailSequenceCartUserCodes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSaoMailSequenceCartUserCodes());
            }
            $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySalesruleCodepool($this)
                ->count($con);
        }

        return count($this->collSaoMailSequenceCartUserCodes);
    }

    /**
     * Method called to associate a Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode object to this object
     * through the Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode foreign key attribute.
     *
     * @param    Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode $l Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function addSaoMailSequenceCartUserCode(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode $l)
    {
        if ($this->collSaoMailSequenceCartUserCodes === null) {
            $this->initSaoMailSequenceCartUserCodes();
            $this->collSaoMailSequenceCartUserCodesPartial = true;
        }
        if (!in_array($l, $this->collSaoMailSequenceCartUserCodes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSaoMailSequenceCartUserCode($l);
        }

        return $this;
    }

    /**
     * @param	SaoMailSequenceCartUserCode $saoMailSequenceCartUserCode The saoMailSequenceCartUserCode object to add.
     */
    protected function doAddSaoMailSequenceCartUserCode($saoMailSequenceCartUserCode)
    {
        $this->collSaoMailSequenceCartUserCodes[]= $saoMailSequenceCartUserCode;
        $saoMailSequenceCartUserCode->setSalesruleCodepool($this);
    }

    /**
     * @param	SaoMailSequenceCartUserCode $saoMailSequenceCartUserCode The saoMailSequenceCartUserCode object to remove.
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function removeSaoMailSequenceCartUserCode($saoMailSequenceCartUserCode)
    {
        if ($this->getSaoMailSequenceCartUserCodes()->contains($saoMailSequenceCartUserCode)) {
            $this->collSaoMailSequenceCartUserCodes->remove($this->collSaoMailSequenceCartUserCodes->search($saoMailSequenceCartUserCode));
            if (null === $this->saoMailSequenceCartUserCodesScheduledForDeletion) {
                $this->saoMailSequenceCartUserCodesScheduledForDeletion = clone $this->collSaoMailSequenceCartUserCodes;
                $this->saoMailSequenceCartUserCodesScheduledForDeletion->clear();
            }
            $this->saoMailSequenceCartUserCodesScheduledForDeletion[]= clone $saoMailSequenceCartUserCode;
            $saoMailSequenceCartUserCode->setSalesruleCodepool(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesruleCodepool is new, it will return
     * an empty collection; or if this PacSalesruleCodepool has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesruleCodepool.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     */
    public function getSaoMailSequenceCartUserCodesJoinCartUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
        $query->joinWith('CartUser', $join_behavior);

        return $this->getSaoMailSequenceCartUserCodes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesruleCodepool is new, it will return
     * an empty collection; or if this PacSalesruleCodepool has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesruleCodepool.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     */
    public function getSaoMailSequenceCartUserCodesJoinMailSequence($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
        $query->joinWith('MailSequence', $join_behavior);

        return $this->getSaoMailSequenceCartUserCodes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesruleCodepool is new, it will return
     * an empty collection; or if this PacSalesruleCodepool has previously
     * been saved, it will retrieve related SaoMailSequenceCartUserCodes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesruleCodepool.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[] List of Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects
     */
    public function getSaoMailSequenceCartUserCodesJoinSalesruleCode($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery::create(null, $criteria);
        $query->joinWith('SalesruleCode', $join_behavior);

        return $this->getSaoMailSequenceCartUserCodes($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_salesrule_codepool = null;
        $this->name = null;
        $this->prefix = null;
        $this->is_reusable = null;
        $this->is_once_per_customer = null;
        $this->is_refundable = null;
        $this->is_balanced = null;
        $this->is_voucher = null;
        $this->is_active = null;
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
            if ($this->collSalesruleCodes) {
                foreach ($this->collSalesruleCodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMailSequenceElementCodepools) {
                foreach ($this->collMailSequenceElementCodepools as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSaoMailSequenceCartUserCodes) {
                foreach ($this->collSaoMailSequenceCartUserCodes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSalesruleCodes instanceof PropelCollection) {
            $this->collSalesruleCodes->clearIterator();
        }
        $this->collSalesruleCodes = null;
        if ($this->collMailSequenceElementCodepools instanceof PropelCollection) {
            $this->collMailSequenceElementCodepools->clearIterator();
        }
        $this->collMailSequenceElementCodepools = null;
        if ($this->collSaoMailSequenceCartUserCodes instanceof PropelCollection) {
            $this->collSaoMailSequenceCartUserCodes->clearIterator();
        }
        $this->collSaoMailSequenceCartUserCodes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolPeer::UPDATED_AT;

        return $this;
    }

}
