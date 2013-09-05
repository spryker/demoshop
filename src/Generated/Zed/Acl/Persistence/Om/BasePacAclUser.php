<?php


/**
 * Base class that represents a row from the 'pac_acl_user' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence.om
 */
abstract class Generated_Zed_Acl_Persistence_Om_BasePacAclUser extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Acl_Persistence_PacAclUserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Acl_Persistence_PacAclUserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_acl_user field.
     * @var        int
     */
    protected $id_acl_user;

    /**
     * The value for the fk_acl_role field.
     * @var        int
     */
    protected $fk_acl_role;

    /**
     * The value for the firstname field.
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the lastname field.
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the username field.
     * @var        string
     */
    protected $username;

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
     * The value for the last_login field.
     * @var        string
     */
    protected $last_login;

    /**
     * The value for the failed_logins field.
     * @var        int
     */
    protected $failed_logins;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the is_deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_deleted;

    /**
     * The value for the is_default field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_default;

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
     * @var        PacAclRole
     */
    protected $aAclRole;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission[] Collection to store aggregation of ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission objects.
     */
    protected $collPacDwhReportPermissions;
    protected $collPacDwhReportPermissionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission[] Collection to store aggregation of ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission objects.
     */
    protected $collPacDwhSaikuPermissions;
    protected $collPacDwhSaikuPermissionsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] Collection to store aggregation of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     */
    protected $collPacMciCostEntriesRelatedByFkAclUserCreated;
    protected $collPacMciCostEntriesRelatedByFkAclUserCreatedPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] Collection to store aggregation of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     */
    protected $collPacMciCostEntriesRelatedByFkAclUserUpdated;
    protected $collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects.
     */
    protected $collTransitionLogs;
    protected $collTransitionLogsPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderNote[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects.
     */
    protected $collOrderNotes;
    protected $collOrderNotesPartial;

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
    protected $pacDwhReportPermissionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacDwhSaikuPermissionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $transitionLogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orderNotesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
        $this->is_deleted = false;
        $this->is_default = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Om_BasePacAclUser object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_acl_user] column value.
     *
     * @return int
     */
    public function getIdAclUser()
    {
        return $this->id_acl_user;
    }

    /**
     * Get the [fk_acl_role] column value.
     *
     * @return int
     */
    public function getFkAclRole()
    {
        return $this->fk_acl_role;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
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
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
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
     * Get the [optionally formatted] temporal [last_login] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastLogin($format = 'Y-m-d H:i:s')
    {
        if ($this->last_login === null) {
            return null;
        }

        if ($this->last_login === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->last_login);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_login, true), $x);
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
     * Get the [failed_logins] column value.
     *
     * @return int
     */
    public function getFailedLogins()
    {
        return $this->failed_logins;
    }

    /**
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Get the [is_deleted] column value.
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Get the [is_default] column value.
     *
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->is_default;
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
     * Set the value of [id_acl_user] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setIdAclUser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_acl_user !== $v) {
            $this->id_acl_user = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER;
        }


        return $this;
    } // setIdAclUser()

    /**
     * Set the value of [fk_acl_role] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setFkAclRole($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_acl_role !== $v) {
            $this->fk_acl_role = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FK_ACL_ROLE;
        }

        if ($this->aAclRole !== null && $this->aAclRole->getIdAclRole() !== $v) {
            $this->aAclRole = null;
        }


        return $this;
    } // setFkAclRole()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FIRSTNAME;
        }


        return $this;
    } // setFirstname()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LASTNAME;
        }


        return $this;
    } // setLastname()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [restore_password_key] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setRestorePasswordKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->restore_password_key !== $v) {
            $this->restore_password_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::RESTORE_PASSWORD_KEY;
        }


        return $this;
    } // setRestorePasswordKey()

    /**
     * Sets the value of [last_login] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setLastLogin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_login !== null || $dt !== null) {
            $currentDateAsString = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_login = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LAST_LOGIN;
            }
        } // if either are not null


        return $this;
    } // setLastLogin()

    /**
     * Set the value of [failed_logins] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setFailedLogins($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->failed_logins !== $v) {
            $this->failed_logins = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FAILED_LOGINS;
        }


        return $this;
    } // setFailedLogins()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setIsActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_active !== $v) {
            $this->is_active = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Sets the value of the [is_deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setIsDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_deleted !== $v) {
            $this->is_deleted = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Sets the value of the [is_default] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setIsDefault($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_default !== $v) {
            $this->is_default = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DEFAULT;
        }


        return $this;
    } // setIsDefault()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::UPDATED_AT;
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
            if ($this->is_active !== true) {
                return false;
            }

            if ($this->is_deleted !== false) {
                return false;
            }

            if ($this->is_default !== false) {
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

            $this->id_acl_user = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_acl_role = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->firstname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->lastname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->email = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->username = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->password = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->restore_password_key = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_login = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->failed_logins = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->is_active = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->is_deleted = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
            $this->is_default = ($row[$startcol + 12] !== null) ? (boolean) $row[$startcol + 12] : null;
            $this->created_at = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updated_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Acl_Persistence_PacAclUser object", $e);
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

        if ($this->aAclRole !== null && $this->fk_acl_role !== $this->aAclRole->getIdAclRole()) {
            $this->aAclRole = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAclRole = null;
            $this->collPacDwhReportPermissions = null;

            $this->collPacDwhSaikuPermissions = null;

            $this->collPacMciCostEntriesRelatedByFkAclUserCreated = null;

            $this->collPacMciCostEntriesRelatedByFkAclUserUpdated = null;

            $this->collTransitionLogs = null;

            $this->collOrderNotes = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Acl_Persistence_PacAclUserQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($this);
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

            if ($this->aAclRole !== null) {
                if ($this->aAclRole->isModified() || $this->aAclRole->isNew()) {
                    $affectedRows += $this->aAclRole->save($con);
                }
                $this->setAclRole($this->aAclRole);
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

            if ($this->pacDwhReportPermissionsScheduledForDeletion !== null) {
                if (!$this->pacDwhReportPermissionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Dwh_Persistence_PacDwhReportPermissionQuery::create()
                        ->filterByPrimaryKeys($this->pacDwhReportPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacDwhReportPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collPacDwhReportPermissions !== null) {
                foreach ($this->collPacDwhReportPermissions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacDwhSaikuPermissionsScheduledForDeletion !== null) {
                if (!$this->pacDwhSaikuPermissionsScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermissionQuery::create()
                        ->filterByPrimaryKeys($this->pacDwhSaikuPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacDwhSaikuPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collPacDwhSaikuPermissions !== null) {
                foreach ($this->collPacDwhSaikuPermissions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion !== null) {
                if (!$this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create()
                        ->filterByPrimaryKeys($this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collPacMciCostEntriesRelatedByFkAclUserCreated !== null) {
                foreach ($this->collPacMciCostEntriesRelatedByFkAclUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion !== null) {
                if (!$this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create()
                        ->filterByPrimaryKeys($this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion = null;
                }
            }

            if ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated !== null) {
                foreach ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->transitionLogsScheduledForDeletion !== null) {
                if (!$this->transitionLogsScheduledForDeletion->isEmpty()) {
                    foreach ($this->transitionLogsScheduledForDeletion as $transitionLog) {
                        // need to save related object because we set the relation to null
                        $transitionLog->save($con);
                    }
                    $this->transitionLogsScheduledForDeletion = null;
                }
            }

            if ($this->collTransitionLogs !== null) {
                foreach ($this->collTransitionLogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orderNotesScheduledForDeletion !== null) {
                if (!$this->orderNotesScheduledForDeletion->isEmpty()) {
                    foreach ($this->orderNotesScheduledForDeletion as $orderNote) {
                        // need to save related object because we set the relation to null
                        $orderNote->save($con);
                    }
                    $this->orderNotesScheduledForDeletion = null;
                }
            }

            if ($this->collOrderNotes !== null) {
                foreach ($this->collOrderNotes as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER;
        if (null !== $this->id_acl_user) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER)) {
            $modifiedColumns[':p' . $index++]  = '`id_acl_user`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FK_ACL_ROLE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_acl_role`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`firstname`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`lastname`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`username`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::RESTORE_PASSWORD_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`restore_password_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LAST_LOGIN)) {
            $modifiedColumns[':p' . $index++]  = '`last_login`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FAILED_LOGINS)) {
            $modifiedColumns[':p' . $index++]  = '`failed_logins`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`is_active`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DEFAULT)) {
            $modifiedColumns[':p' . $index++]  = '`is_default`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_acl_user` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_acl_user`':
                        $stmt->bindValue($identifier, $this->id_acl_user, PDO::PARAM_INT);
                        break;
                    case '`fk_acl_role`':
                        $stmt->bindValue($identifier, $this->fk_acl_role, PDO::PARAM_INT);
                        break;
                    case '`firstname`':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case '`lastname`':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`username`':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`restore_password_key`':
                        $stmt->bindValue($identifier, $this->restore_password_key, PDO::PARAM_STR);
                        break;
                    case '`last_login`':
                        $stmt->bindValue($identifier, $this->last_login, PDO::PARAM_STR);
                        break;
                    case '`failed_logins`':
                        $stmt->bindValue($identifier, $this->failed_logins, PDO::PARAM_INT);
                        break;
                    case '`is_active`':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case '`is_deleted`':
                        $stmt->bindValue($identifier, (int) $this->is_deleted, PDO::PARAM_INT);
                        break;
                    case '`is_default`':
                        $stmt->bindValue($identifier, (int) $this->is_default, PDO::PARAM_INT);
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
        $this->setIdAclUser($pk);

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

            if ($this->aAclRole !== null) {
                if (!$this->aAclRole->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAclRole->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacDwhReportPermissions !== null) {
                    foreach ($this->collPacDwhReportPermissions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacDwhSaikuPermissions !== null) {
                    foreach ($this->collPacDwhSaikuPermissions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacMciCostEntriesRelatedByFkAclUserCreated !== null) {
                    foreach ($this->collPacMciCostEntriesRelatedByFkAclUserCreated as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated !== null) {
                    foreach ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTransitionLogs !== null) {
                    foreach ($this->collTransitionLogs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrderNotes !== null) {
                    foreach ($this->collOrderNotes as $referrerFK) {
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
        $pos = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdAclUser();
                break;
            case 1:
                return $this->getFkAclRole();
                break;
            case 2:
                return $this->getFirstname();
                break;
            case 3:
                return $this->getLastname();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getUsername();
                break;
            case 6:
                return $this->getPassword();
                break;
            case 7:
                return $this->getRestorePasswordKey();
                break;
            case 8:
                return $this->getLastLogin();
                break;
            case 9:
                return $this->getFailedLogins();
                break;
            case 10:
                return $this->getIsActive();
                break;
            case 11:
                return $this->getIsDeleted();
                break;
            case 12:
                return $this->getIsDefault();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Acl_Persistence_PacAclUser'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Acl_Persistence_PacAclUser'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdAclUser(),
            $keys[1] => $this->getFkAclRole(),
            $keys[2] => $this->getFirstname(),
            $keys[3] => $this->getLastname(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getUsername(),
            $keys[6] => $this->getPassword(),
            $keys[7] => $this->getRestorePasswordKey(),
            $keys[8] => $this->getLastLogin(),
            $keys[9] => $this->getFailedLogins(),
            $keys[10] => $this->getIsActive(),
            $keys[11] => $this->getIsDeleted(),
            $keys[12] => $this->getIsDefault(),
            $keys[13] => $this->getCreatedAt(),
            $keys[14] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAclRole) {
                $result['AclRole'] = $this->aAclRole->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacDwhReportPermissions) {
                $result['PacDwhReportPermissions'] = $this->collPacDwhReportPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacDwhSaikuPermissions) {
                $result['PacDwhSaikuPermissions'] = $this->collPacDwhSaikuPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacMciCostEntriesRelatedByFkAclUserCreated) {
                $result['PacMciCostEntriesRelatedByFkAclUserCreated'] = $this->collPacMciCostEntriesRelatedByFkAclUserCreated->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacMciCostEntriesRelatedByFkAclUserUpdated) {
                $result['PacMciCostEntriesRelatedByFkAclUserUpdated'] = $this->collPacMciCostEntriesRelatedByFkAclUserUpdated->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTransitionLogs) {
                $result['TransitionLogs'] = $this->collTransitionLogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrderNotes) {
                $result['OrderNotes'] = $this->collOrderNotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdAclUser($value);
                break;
            case 1:
                $this->setFkAclRole($value);
                break;
            case 2:
                $this->setFirstname($value);
                break;
            case 3:
                $this->setLastname($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $this->setUsername($value);
                break;
            case 6:
                $this->setPassword($value);
                break;
            case 7:
                $this->setRestorePasswordKey($value);
                break;
            case 8:
                $this->setLastLogin($value);
                break;
            case 9:
                $this->setFailedLogins($value);
                break;
            case 10:
                $this->setIsActive($value);
                break;
            case 11:
                $this->setIsDeleted($value);
                break;
            case 12:
                $this->setIsDefault($value);
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
        $keys = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdAclUser($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkAclRole($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFirstname($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLastname($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setEmail($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUsername($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPassword($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setRestorePasswordKey($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastLogin($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setFailedLogins($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIsActive($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setIsDeleted($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setIsDefault($arr[$keys[12]]);
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
        $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $this->id_acl_user);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FK_ACL_ROLE)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FK_ACL_ROLE, $this->fk_acl_role);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FIRSTNAME)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FIRSTNAME, $this->firstname);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LASTNAME)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LASTNAME, $this->lastname);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::EMAIL)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::EMAIL, $this->email);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::USERNAME)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::USERNAME, $this->username);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::PASSWORD)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::RESTORE_PASSWORD_KEY)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::RESTORE_PASSWORD_KEY, $this->restore_password_key);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LAST_LOGIN)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::LAST_LOGIN, $this->last_login);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FAILED_LOGINS)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::FAILED_LOGINS, $this->failed_logins);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_ACTIVE)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DEFAULT)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::IS_DEFAULT, $this->is_default);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $this->id_acl_user);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdAclUser();
    }

    /**
     * Generic method to set the primary key (id_acl_user column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdAclUser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdAclUser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Acl_Persistence_PacAclUser (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkAclRole($this->getFkAclRole());
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setRestorePasswordKey($this->getRestorePasswordKey());
        $copyObj->setLastLogin($this->getLastLogin());
        $copyObj->setFailedLogins($this->getFailedLogins());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setIsDefault($this->getIsDefault());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacDwhReportPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacDwhReportPermission($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacDwhSaikuPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacDwhSaikuPermission($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacMciCostEntriesRelatedByFkAclUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacMciCostEntryRelatedByFkAclUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacMciCostEntriesRelatedByFkAclUserUpdated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacMciCostEntryRelatedByFkAclUserUpdated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTransitionLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransitionLog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrderNotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrderNote($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdAclUser(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser Clone of current object.
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclUserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Acl_Persistence_PacAclUserPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Acl_Persistence_PacAclRole object.
     *
     * @param             ProjectA_Zed_Acl_Persistence_PacAclRole $v
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAclRole(ProjectA_Zed_Acl_Persistence_PacAclRole $v = null)
    {
        if ($v === null) {
            $this->setFkAclRole(NULL);
        } else {
            $this->setFkAclRole($v->getIdAclRole());
        }

        $this->aAclRole = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Acl_Persistence_PacAclRole object, it will not be re-added.
        if ($v !== null) {
            $v->addAclUser($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Acl_Persistence_PacAclRole object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Acl_Persistence_PacAclRole The associated ProjectA_Zed_Acl_Persistence_PacAclRole object.
     * @throws PropelException
     */
    public function getAclRole(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAclRole === null && ($this->fk_acl_role !== null) && $doQuery) {
            $this->aAclRole = ProjectA_Zed_Acl_Persistence_PacAclRoleQuery::create()->findPk($this->fk_acl_role, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAclRole->addAclUsers($this);
             */
        }

        return $this->aAclRole;
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
        if ('PacDwhReportPermission' == $relationName) {
            $this->initPacDwhReportPermissions();
        }
        if ('PacDwhSaikuPermission' == $relationName) {
            $this->initPacDwhSaikuPermissions();
        }
        if ('PacMciCostEntryRelatedByFkAclUserCreated' == $relationName) {
            $this->initPacMciCostEntriesRelatedByFkAclUserCreated();
        }
        if ('PacMciCostEntryRelatedByFkAclUserUpdated' == $relationName) {
            $this->initPacMciCostEntriesRelatedByFkAclUserUpdated();
        }
        if ('TransitionLog' == $relationName) {
            $this->initTransitionLogs();
        }
        if ('OrderNote' == $relationName) {
            $this->initOrderNotes();
        }
    }

    /**
     * Clears out the collPacDwhReportPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     * @see        addPacDwhReportPermissions()
     */
    public function clearPacDwhReportPermissions()
    {
        $this->collPacDwhReportPermissions = null; // important to set this to null since that means it is uninitialized
        $this->collPacDwhReportPermissionsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacDwhReportPermissions collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacDwhReportPermissions($v = true)
    {
        $this->collPacDwhReportPermissionsPartial = $v;
    }

    /**
     * Initializes the collPacDwhReportPermissions collection.
     *
     * By default this just sets the collPacDwhReportPermissions collection to an empty array (like clearcollPacDwhReportPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacDwhReportPermissions($overrideExisting = true)
    {
        if (null !== $this->collPacDwhReportPermissions && !$overrideExisting) {
            return;
        }
        $this->collPacDwhReportPermissions = new PropelObjectCollection();
        $this->collPacDwhReportPermissions->setModel('ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission');
    }

    /**
     * Gets an array of ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission[] List of ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission objects
     * @throws PropelException
     */
    public function getPacDwhReportPermissions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhReportPermissionsPartial && !$this->isNew();
        if (null === $this->collPacDwhReportPermissions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacDwhReportPermissions) {
                // return empty collection
                $this->initPacDwhReportPermissions();
            } else {
                $collPacDwhReportPermissions = ProjectA_Zed_Dwh_Persistence_PacDwhReportPermissionQuery::create(null, $criteria)
                    ->filterByAclUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacDwhReportPermissionsPartial && count($collPacDwhReportPermissions)) {
                      $this->initPacDwhReportPermissions(false);

                      foreach($collPacDwhReportPermissions as $obj) {
                        if (false == $this->collPacDwhReportPermissions->contains($obj)) {
                          $this->collPacDwhReportPermissions->append($obj);
                        }
                      }

                      $this->collPacDwhReportPermissionsPartial = true;
                    }

                    $collPacDwhReportPermissions->getInternalIterator()->rewind();
                    return $collPacDwhReportPermissions;
                }

                if($partial && $this->collPacDwhReportPermissions) {
                    foreach($this->collPacDwhReportPermissions as $obj) {
                        if($obj->isNew()) {
                            $collPacDwhReportPermissions[] = $obj;
                        }
                    }
                }

                $this->collPacDwhReportPermissions = $collPacDwhReportPermissions;
                $this->collPacDwhReportPermissionsPartial = false;
            }
        }

        return $this->collPacDwhReportPermissions;
    }

    /**
     * Sets a collection of PacDwhReportPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacDwhReportPermissions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setPacDwhReportPermissions(PropelCollection $pacDwhReportPermissions, PropelPDO $con = null)
    {
        $pacDwhReportPermissionsToDelete = $this->getPacDwhReportPermissions(new Criteria(), $con)->diff($pacDwhReportPermissions);

        $this->pacDwhReportPermissionsScheduledForDeletion = unserialize(serialize($pacDwhReportPermissionsToDelete));

        foreach ($pacDwhReportPermissionsToDelete as $pacDwhReportPermissionRemoved) {
            $pacDwhReportPermissionRemoved->setAclUser(null);
        }

        $this->collPacDwhReportPermissions = null;
        foreach ($pacDwhReportPermissions as $pacDwhReportPermission) {
            $this->addPacDwhReportPermission($pacDwhReportPermission);
        }

        $this->collPacDwhReportPermissions = $pacDwhReportPermissions;
        $this->collPacDwhReportPermissionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission objects.
     * @throws PropelException
     */
    public function countPacDwhReportPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhReportPermissionsPartial && !$this->isNew();
        if (null === $this->collPacDwhReportPermissions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacDwhReportPermissions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacDwhReportPermissions());
            }
            $query = ProjectA_Zed_Dwh_Persistence_PacDwhReportPermissionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclUser($this)
                ->count($con);
        }

        return count($this->collPacDwhReportPermissions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission object to this object
     * through the ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission foreign key attribute.
     *
     * @param    ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission $l ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function addPacDwhReportPermission(ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission $l)
    {
        if ($this->collPacDwhReportPermissions === null) {
            $this->initPacDwhReportPermissions();
            $this->collPacDwhReportPermissionsPartial = true;
        }
        if (!in_array($l, $this->collPacDwhReportPermissions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacDwhReportPermission($l);
        }

        return $this;
    }

    /**
     * @param	PacDwhReportPermission $pacDwhReportPermission The pacDwhReportPermission object to add.
     */
    protected function doAddPacDwhReportPermission($pacDwhReportPermission)
    {
        $this->collPacDwhReportPermissions[]= $pacDwhReportPermission;
        $pacDwhReportPermission->setAclUser($this);
    }

    /**
     * @param	PacDwhReportPermission $pacDwhReportPermission The pacDwhReportPermission object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function removePacDwhReportPermission($pacDwhReportPermission)
    {
        if ($this->getPacDwhReportPermissions()->contains($pacDwhReportPermission)) {
            $this->collPacDwhReportPermissions->remove($this->collPacDwhReportPermissions->search($pacDwhReportPermission));
            if (null === $this->pacDwhReportPermissionsScheduledForDeletion) {
                $this->pacDwhReportPermissionsScheduledForDeletion = clone $this->collPacDwhReportPermissions;
                $this->pacDwhReportPermissionsScheduledForDeletion->clear();
            }
            $this->pacDwhReportPermissionsScheduledForDeletion[]= clone $pacDwhReportPermission;
            $pacDwhReportPermission->setAclUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacDwhSaikuPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     * @see        addPacDwhSaikuPermissions()
     */
    public function clearPacDwhSaikuPermissions()
    {
        $this->collPacDwhSaikuPermissions = null; // important to set this to null since that means it is uninitialized
        $this->collPacDwhSaikuPermissionsPartial = null;

        return $this;
    }

    /**
     * reset is the collPacDwhSaikuPermissions collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacDwhSaikuPermissions($v = true)
    {
        $this->collPacDwhSaikuPermissionsPartial = $v;
    }

    /**
     * Initializes the collPacDwhSaikuPermissions collection.
     *
     * By default this just sets the collPacDwhSaikuPermissions collection to an empty array (like clearcollPacDwhSaikuPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacDwhSaikuPermissions($overrideExisting = true)
    {
        if (null !== $this->collPacDwhSaikuPermissions && !$overrideExisting) {
            return;
        }
        $this->collPacDwhSaikuPermissions = new PropelObjectCollection();
        $this->collPacDwhSaikuPermissions->setModel('ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission');
    }

    /**
     * Gets an array of ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission[] List of ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission objects
     * @throws PropelException
     */
    public function getPacDwhSaikuPermissions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhSaikuPermissionsPartial && !$this->isNew();
        if (null === $this->collPacDwhSaikuPermissions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacDwhSaikuPermissions) {
                // return empty collection
                $this->initPacDwhSaikuPermissions();
            } else {
                $collPacDwhSaikuPermissions = ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermissionQuery::create(null, $criteria)
                    ->filterByAclUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacDwhSaikuPermissionsPartial && count($collPacDwhSaikuPermissions)) {
                      $this->initPacDwhSaikuPermissions(false);

                      foreach($collPacDwhSaikuPermissions as $obj) {
                        if (false == $this->collPacDwhSaikuPermissions->contains($obj)) {
                          $this->collPacDwhSaikuPermissions->append($obj);
                        }
                      }

                      $this->collPacDwhSaikuPermissionsPartial = true;
                    }

                    $collPacDwhSaikuPermissions->getInternalIterator()->rewind();
                    return $collPacDwhSaikuPermissions;
                }

                if($partial && $this->collPacDwhSaikuPermissions) {
                    foreach($this->collPacDwhSaikuPermissions as $obj) {
                        if($obj->isNew()) {
                            $collPacDwhSaikuPermissions[] = $obj;
                        }
                    }
                }

                $this->collPacDwhSaikuPermissions = $collPacDwhSaikuPermissions;
                $this->collPacDwhSaikuPermissionsPartial = false;
            }
        }

        return $this->collPacDwhSaikuPermissions;
    }

    /**
     * Sets a collection of PacDwhSaikuPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacDwhSaikuPermissions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setPacDwhSaikuPermissions(PropelCollection $pacDwhSaikuPermissions, PropelPDO $con = null)
    {
        $pacDwhSaikuPermissionsToDelete = $this->getPacDwhSaikuPermissions(new Criteria(), $con)->diff($pacDwhSaikuPermissions);

        $this->pacDwhSaikuPermissionsScheduledForDeletion = unserialize(serialize($pacDwhSaikuPermissionsToDelete));

        foreach ($pacDwhSaikuPermissionsToDelete as $pacDwhSaikuPermissionRemoved) {
            $pacDwhSaikuPermissionRemoved->setAclUser(null);
        }

        $this->collPacDwhSaikuPermissions = null;
        foreach ($pacDwhSaikuPermissions as $pacDwhSaikuPermission) {
            $this->addPacDwhSaikuPermission($pacDwhSaikuPermission);
        }

        $this->collPacDwhSaikuPermissions = $pacDwhSaikuPermissions;
        $this->collPacDwhSaikuPermissionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission objects.
     * @throws PropelException
     */
    public function countPacDwhSaikuPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacDwhSaikuPermissionsPartial && !$this->isNew();
        if (null === $this->collPacDwhSaikuPermissions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacDwhSaikuPermissions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacDwhSaikuPermissions());
            }
            $query = ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermissionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclUser($this)
                ->count($con);
        }

        return count($this->collPacDwhSaikuPermissions);
    }

    /**
     * Method called to associate a ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission object to this object
     * through the ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission foreign key attribute.
     *
     * @param    ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission $l ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function addPacDwhSaikuPermission(ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission $l)
    {
        if ($this->collPacDwhSaikuPermissions === null) {
            $this->initPacDwhSaikuPermissions();
            $this->collPacDwhSaikuPermissionsPartial = true;
        }
        if (!in_array($l, $this->collPacDwhSaikuPermissions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacDwhSaikuPermission($l);
        }

        return $this;
    }

    /**
     * @param	PacDwhSaikuPermission $pacDwhSaikuPermission The pacDwhSaikuPermission object to add.
     */
    protected function doAddPacDwhSaikuPermission($pacDwhSaikuPermission)
    {
        $this->collPacDwhSaikuPermissions[]= $pacDwhSaikuPermission;
        $pacDwhSaikuPermission->setAclUser($this);
    }

    /**
     * @param	PacDwhSaikuPermission $pacDwhSaikuPermission The pacDwhSaikuPermission object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function removePacDwhSaikuPermission($pacDwhSaikuPermission)
    {
        if ($this->getPacDwhSaikuPermissions()->contains($pacDwhSaikuPermission)) {
            $this->collPacDwhSaikuPermissions->remove($this->collPacDwhSaikuPermissions->search($pacDwhSaikuPermission));
            if (null === $this->pacDwhSaikuPermissionsScheduledForDeletion) {
                $this->pacDwhSaikuPermissionsScheduledForDeletion = clone $this->collPacDwhSaikuPermissions;
                $this->pacDwhSaikuPermissionsScheduledForDeletion->clear();
            }
            $this->pacDwhSaikuPermissionsScheduledForDeletion[]= clone $pacDwhSaikuPermission;
            $pacDwhSaikuPermission->setAclUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collPacMciCostEntriesRelatedByFkAclUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     * @see        addPacMciCostEntriesRelatedByFkAclUserCreated()
     */
    public function clearPacMciCostEntriesRelatedByFkAclUserCreated()
    {
        $this->collPacMciCostEntriesRelatedByFkAclUserCreated = null; // important to set this to null since that means it is uninitialized
        $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial = null;

        return $this;
    }

    /**
     * reset is the collPacMciCostEntriesRelatedByFkAclUserCreated collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacMciCostEntriesRelatedByFkAclUserCreated($v = true)
    {
        $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial = $v;
    }

    /**
     * Initializes the collPacMciCostEntriesRelatedByFkAclUserCreated collection.
     *
     * By default this just sets the collPacMciCostEntriesRelatedByFkAclUserCreated collection to an empty array (like clearcollPacMciCostEntriesRelatedByFkAclUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacMciCostEntriesRelatedByFkAclUserCreated($overrideExisting = true)
    {
        if (null !== $this->collPacMciCostEntriesRelatedByFkAclUserCreated && !$overrideExisting) {
            return;
        }
        $this->collPacMciCostEntriesRelatedByFkAclUserCreated = new PropelObjectCollection();
        $this->collPacMciCostEntriesRelatedByFkAclUserCreated->setModel('ProjectA_Zed_Mci_Persistence_PacMciCostEntry');
    }

    /**
     * Gets an array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     * @throws PropelException
     */
    public function getPacMciCostEntriesRelatedByFkAclUserCreated($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial && !$this->isNew();
        if (null === $this->collPacMciCostEntriesRelatedByFkAclUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacMciCostEntriesRelatedByFkAclUserCreated) {
                // return empty collection
                $this->initPacMciCostEntriesRelatedByFkAclUserCreated();
            } else {
                $collPacMciCostEntriesRelatedByFkAclUserCreated = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria)
                    ->filterByAclUserCreated($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial && count($collPacMciCostEntriesRelatedByFkAclUserCreated)) {
                      $this->initPacMciCostEntriesRelatedByFkAclUserCreated(false);

                      foreach($collPacMciCostEntriesRelatedByFkAclUserCreated as $obj) {
                        if (false == $this->collPacMciCostEntriesRelatedByFkAclUserCreated->contains($obj)) {
                          $this->collPacMciCostEntriesRelatedByFkAclUserCreated->append($obj);
                        }
                      }

                      $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial = true;
                    }

                    $collPacMciCostEntriesRelatedByFkAclUserCreated->getInternalIterator()->rewind();
                    return $collPacMciCostEntriesRelatedByFkAclUserCreated;
                }

                if($partial && $this->collPacMciCostEntriesRelatedByFkAclUserCreated) {
                    foreach($this->collPacMciCostEntriesRelatedByFkAclUserCreated as $obj) {
                        if($obj->isNew()) {
                            $collPacMciCostEntriesRelatedByFkAclUserCreated[] = $obj;
                        }
                    }
                }

                $this->collPacMciCostEntriesRelatedByFkAclUserCreated = $collPacMciCostEntriesRelatedByFkAclUserCreated;
                $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial = false;
            }
        }

        return $this->collPacMciCostEntriesRelatedByFkAclUserCreated;
    }

    /**
     * Sets a collection of PacMciCostEntryRelatedByFkAclUserCreated objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacMciCostEntriesRelatedByFkAclUserCreated A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setPacMciCostEntriesRelatedByFkAclUserCreated(PropelCollection $pacMciCostEntriesRelatedByFkAclUserCreated, PropelPDO $con = null)
    {
        $pacMciCostEntriesRelatedByFkAclUserCreatedToDelete = $this->getPacMciCostEntriesRelatedByFkAclUserCreated(new Criteria(), $con)->diff($pacMciCostEntriesRelatedByFkAclUserCreated);

        $this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion = unserialize(serialize($pacMciCostEntriesRelatedByFkAclUserCreatedToDelete));

        foreach ($pacMciCostEntriesRelatedByFkAclUserCreatedToDelete as $pacMciCostEntryRelatedByFkAclUserCreatedRemoved) {
            $pacMciCostEntryRelatedByFkAclUserCreatedRemoved->setAclUserCreated(null);
        }

        $this->collPacMciCostEntriesRelatedByFkAclUserCreated = null;
        foreach ($pacMciCostEntriesRelatedByFkAclUserCreated as $pacMciCostEntryRelatedByFkAclUserCreated) {
            $this->addPacMciCostEntryRelatedByFkAclUserCreated($pacMciCostEntryRelatedByFkAclUserCreated);
        }

        $this->collPacMciCostEntriesRelatedByFkAclUserCreated = $pacMciCostEntriesRelatedByFkAclUserCreated;
        $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException
     */
    public function countPacMciCostEntriesRelatedByFkAclUserCreated(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial && !$this->isNew();
        if (null === $this->collPacMciCostEntriesRelatedByFkAclUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacMciCostEntriesRelatedByFkAclUserCreated) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacMciCostEntriesRelatedByFkAclUserCreated());
            }
            $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclUserCreated($this)
                ->count($con);
        }

        return count($this->collPacMciCostEntriesRelatedByFkAclUserCreated);
    }

    /**
     * Method called to associate a ProjectA_Zed_Mci_Persistence_PacMciCostEntry object to this object
     * through the ProjectA_Zed_Mci_Persistence_PacMciCostEntry foreign key attribute.
     *
     * @param    ProjectA_Zed_Mci_Persistence_PacMciCostEntry $l ProjectA_Zed_Mci_Persistence_PacMciCostEntry
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function addPacMciCostEntryRelatedByFkAclUserCreated(ProjectA_Zed_Mci_Persistence_PacMciCostEntry $l)
    {
        if ($this->collPacMciCostEntriesRelatedByFkAclUserCreated === null) {
            $this->initPacMciCostEntriesRelatedByFkAclUserCreated();
            $this->collPacMciCostEntriesRelatedByFkAclUserCreatedPartial = true;
        }
        if (!in_array($l, $this->collPacMciCostEntriesRelatedByFkAclUserCreated->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacMciCostEntryRelatedByFkAclUserCreated($l);
        }

        return $this;
    }

    /**
     * @param	PacMciCostEntryRelatedByFkAclUserCreated $pacMciCostEntryRelatedByFkAclUserCreated The pacMciCostEntryRelatedByFkAclUserCreated object to add.
     */
    protected function doAddPacMciCostEntryRelatedByFkAclUserCreated($pacMciCostEntryRelatedByFkAclUserCreated)
    {
        $this->collPacMciCostEntriesRelatedByFkAclUserCreated[]= $pacMciCostEntryRelatedByFkAclUserCreated;
        $pacMciCostEntryRelatedByFkAclUserCreated->setAclUserCreated($this);
    }

    /**
     * @param	PacMciCostEntryRelatedByFkAclUserCreated $pacMciCostEntryRelatedByFkAclUserCreated The pacMciCostEntryRelatedByFkAclUserCreated object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function removePacMciCostEntryRelatedByFkAclUserCreated($pacMciCostEntryRelatedByFkAclUserCreated)
    {
        if ($this->getPacMciCostEntriesRelatedByFkAclUserCreated()->contains($pacMciCostEntryRelatedByFkAclUserCreated)) {
            $this->collPacMciCostEntriesRelatedByFkAclUserCreated->remove($this->collPacMciCostEntriesRelatedByFkAclUserCreated->search($pacMciCostEntryRelatedByFkAclUserCreated));
            if (null === $this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion) {
                $this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion = clone $this->collPacMciCostEntriesRelatedByFkAclUserCreated;
                $this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion->clear();
            }
            $this->pacMciCostEntriesRelatedByFkAclUserCreatedScheduledForDeletion[]= clone $pacMciCostEntryRelatedByFkAclUserCreated;
            $pacMciCostEntryRelatedByFkAclUserCreated->setAclUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserCreatedJoinMciCostType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('MciCostType', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserCreatedJoinMcmChannel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmChannel', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserCreatedJoinMcmPartnerInChannel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmPartnerInChannel', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserCreatedJoinMcmPublication($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmPublication', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserCreatedJoinMcmCampaign($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmCampaign', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserCreated($query, $con);
    }

    /**
     * Clears out the collPacMciCostEntriesRelatedByFkAclUserUpdated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     * @see        addPacMciCostEntriesRelatedByFkAclUserUpdated()
     */
    public function clearPacMciCostEntriesRelatedByFkAclUserUpdated()
    {
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdated = null; // important to set this to null since that means it is uninitialized
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial = null;

        return $this;
    }

    /**
     * reset is the collPacMciCostEntriesRelatedByFkAclUserUpdated collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacMciCostEntriesRelatedByFkAclUserUpdated($v = true)
    {
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial = $v;
    }

    /**
     * Initializes the collPacMciCostEntriesRelatedByFkAclUserUpdated collection.
     *
     * By default this just sets the collPacMciCostEntriesRelatedByFkAclUserUpdated collection to an empty array (like clearcollPacMciCostEntriesRelatedByFkAclUserUpdated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacMciCostEntriesRelatedByFkAclUserUpdated($overrideExisting = true)
    {
        if (null !== $this->collPacMciCostEntriesRelatedByFkAclUserUpdated && !$overrideExisting) {
            return;
        }
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdated = new PropelObjectCollection();
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdated->setModel('ProjectA_Zed_Mci_Persistence_PacMciCostEntry');
    }

    /**
     * Gets an array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     * @throws PropelException
     */
    public function getPacMciCostEntriesRelatedByFkAclUserUpdated($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial && !$this->isNew();
        if (null === $this->collPacMciCostEntriesRelatedByFkAclUserUpdated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacMciCostEntriesRelatedByFkAclUserUpdated) {
                // return empty collection
                $this->initPacMciCostEntriesRelatedByFkAclUserUpdated();
            } else {
                $collPacMciCostEntriesRelatedByFkAclUserUpdated = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria)
                    ->filterByAclUserUpdated($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial && count($collPacMciCostEntriesRelatedByFkAclUserUpdated)) {
                      $this->initPacMciCostEntriesRelatedByFkAclUserUpdated(false);

                      foreach($collPacMciCostEntriesRelatedByFkAclUserUpdated as $obj) {
                        if (false == $this->collPacMciCostEntriesRelatedByFkAclUserUpdated->contains($obj)) {
                          $this->collPacMciCostEntriesRelatedByFkAclUserUpdated->append($obj);
                        }
                      }

                      $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial = true;
                    }

                    $collPacMciCostEntriesRelatedByFkAclUserUpdated->getInternalIterator()->rewind();
                    return $collPacMciCostEntriesRelatedByFkAclUserUpdated;
                }

                if($partial && $this->collPacMciCostEntriesRelatedByFkAclUserUpdated) {
                    foreach($this->collPacMciCostEntriesRelatedByFkAclUserUpdated as $obj) {
                        if($obj->isNew()) {
                            $collPacMciCostEntriesRelatedByFkAclUserUpdated[] = $obj;
                        }
                    }
                }

                $this->collPacMciCostEntriesRelatedByFkAclUserUpdated = $collPacMciCostEntriesRelatedByFkAclUserUpdated;
                $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial = false;
            }
        }

        return $this->collPacMciCostEntriesRelatedByFkAclUserUpdated;
    }

    /**
     * Sets a collection of PacMciCostEntryRelatedByFkAclUserUpdated objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacMciCostEntriesRelatedByFkAclUserUpdated A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setPacMciCostEntriesRelatedByFkAclUserUpdated(PropelCollection $pacMciCostEntriesRelatedByFkAclUserUpdated, PropelPDO $con = null)
    {
        $pacMciCostEntriesRelatedByFkAclUserUpdatedToDelete = $this->getPacMciCostEntriesRelatedByFkAclUserUpdated(new Criteria(), $con)->diff($pacMciCostEntriesRelatedByFkAclUserUpdated);

        $this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion = unserialize(serialize($pacMciCostEntriesRelatedByFkAclUserUpdatedToDelete));

        foreach ($pacMciCostEntriesRelatedByFkAclUserUpdatedToDelete as $pacMciCostEntryRelatedByFkAclUserUpdatedRemoved) {
            $pacMciCostEntryRelatedByFkAclUserUpdatedRemoved->setAclUserUpdated(null);
        }

        $this->collPacMciCostEntriesRelatedByFkAclUserUpdated = null;
        foreach ($pacMciCostEntriesRelatedByFkAclUserUpdated as $pacMciCostEntryRelatedByFkAclUserUpdated) {
            $this->addPacMciCostEntryRelatedByFkAclUserUpdated($pacMciCostEntryRelatedByFkAclUserUpdated);
        }

        $this->collPacMciCostEntriesRelatedByFkAclUserUpdated = $pacMciCostEntriesRelatedByFkAclUserUpdated;
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException
     */
    public function countPacMciCostEntriesRelatedByFkAclUserUpdated(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial && !$this->isNew();
        if (null === $this->collPacMciCostEntriesRelatedByFkAclUserUpdated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacMciCostEntriesRelatedByFkAclUserUpdated) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPacMciCostEntriesRelatedByFkAclUserUpdated());
            }
            $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclUserUpdated($this)
                ->count($con);
        }

        return count($this->collPacMciCostEntriesRelatedByFkAclUserUpdated);
    }

    /**
     * Method called to associate a ProjectA_Zed_Mci_Persistence_PacMciCostEntry object to this object
     * through the ProjectA_Zed_Mci_Persistence_PacMciCostEntry foreign key attribute.
     *
     * @param    ProjectA_Zed_Mci_Persistence_PacMciCostEntry $l ProjectA_Zed_Mci_Persistence_PacMciCostEntry
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function addPacMciCostEntryRelatedByFkAclUserUpdated(ProjectA_Zed_Mci_Persistence_PacMciCostEntry $l)
    {
        if ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated === null) {
            $this->initPacMciCostEntriesRelatedByFkAclUserUpdated();
            $this->collPacMciCostEntriesRelatedByFkAclUserUpdatedPartial = true;
        }
        if (!in_array($l, $this->collPacMciCostEntriesRelatedByFkAclUserUpdated->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacMciCostEntryRelatedByFkAclUserUpdated($l);
        }

        return $this;
    }

    /**
     * @param	PacMciCostEntryRelatedByFkAclUserUpdated $pacMciCostEntryRelatedByFkAclUserUpdated The pacMciCostEntryRelatedByFkAclUserUpdated object to add.
     */
    protected function doAddPacMciCostEntryRelatedByFkAclUserUpdated($pacMciCostEntryRelatedByFkAclUserUpdated)
    {
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdated[]= $pacMciCostEntryRelatedByFkAclUserUpdated;
        $pacMciCostEntryRelatedByFkAclUserUpdated->setAclUserUpdated($this);
    }

    /**
     * @param	PacMciCostEntryRelatedByFkAclUserUpdated $pacMciCostEntryRelatedByFkAclUserUpdated The pacMciCostEntryRelatedByFkAclUserUpdated object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function removePacMciCostEntryRelatedByFkAclUserUpdated($pacMciCostEntryRelatedByFkAclUserUpdated)
    {
        if ($this->getPacMciCostEntriesRelatedByFkAclUserUpdated()->contains($pacMciCostEntryRelatedByFkAclUserUpdated)) {
            $this->collPacMciCostEntriesRelatedByFkAclUserUpdated->remove($this->collPacMciCostEntriesRelatedByFkAclUserUpdated->search($pacMciCostEntryRelatedByFkAclUserUpdated));
            if (null === $this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion) {
                $this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion = clone $this->collPacMciCostEntriesRelatedByFkAclUserUpdated;
                $this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion->clear();
            }
            $this->pacMciCostEntriesRelatedByFkAclUserUpdatedScheduledForDeletion[]= clone $pacMciCostEntryRelatedByFkAclUserUpdated;
            $pacMciCostEntryRelatedByFkAclUserUpdated->setAclUserUpdated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserUpdated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserUpdatedJoinMciCostType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('MciCostType', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserUpdated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserUpdated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserUpdatedJoinMcmChannel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmChannel', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserUpdated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserUpdated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserUpdatedJoinMcmPartnerInChannel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmPartnerInChannel', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserUpdated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserUpdated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserUpdatedJoinMcmPublication($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmPublication', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserUpdated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related PacMciCostEntriesRelatedByFkAclUserUpdated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[] List of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects
     */
    public function getPacMciCostEntriesRelatedByFkAclUserUpdatedJoinMcmCampaign($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create(null, $criteria);
        $query->joinWith('McmCampaign', $join_behavior);

        return $this->getPacMciCostEntriesRelatedByFkAclUserUpdated($query, $con);
    }

    /**
     * Clears out the collTransitionLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     * @see        addTransitionLogs()
     */
    public function clearTransitionLogs()
    {
        $this->collTransitionLogs = null; // important to set this to null since that means it is uninitialized
        $this->collTransitionLogsPartial = null;

        return $this;
    }

    /**
     * reset is the collTransitionLogs collection loaded partially
     *
     * @return void
     */
    public function resetPartialTransitionLogs($v = true)
    {
        $this->collTransitionLogsPartial = $v;
    }

    /**
     * Initializes the collTransitionLogs collection.
     *
     * By default this just sets the collTransitionLogs collection to an empty array (like clearcollTransitionLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTransitionLogs($overrideExisting = true)
    {
        if (null !== $this->collTransitionLogs && !$overrideExisting) {
            return;
        }
        $this->collTransitionLogs = new PropelObjectCollection();
        $this->collTransitionLogs->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     * @throws PropelException
     */
    public function getTransitionLogs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTransitionLogsPartial && !$this->isNew();
        if (null === $this->collTransitionLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTransitionLogs) {
                // return empty collection
                $this->initTransitionLogs();
            } else {
                $collTransitionLogs = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria)
                    ->filterByAclUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTransitionLogsPartial && count($collTransitionLogs)) {
                      $this->initTransitionLogs(false);

                      foreach($collTransitionLogs as $obj) {
                        if (false == $this->collTransitionLogs->contains($obj)) {
                          $this->collTransitionLogs->append($obj);
                        }
                      }

                      $this->collTransitionLogsPartial = true;
                    }

                    $collTransitionLogs->getInternalIterator()->rewind();
                    return $collTransitionLogs;
                }

                if($partial && $this->collTransitionLogs) {
                    foreach($this->collTransitionLogs as $obj) {
                        if($obj->isNew()) {
                            $collTransitionLogs[] = $obj;
                        }
                    }
                }

                $this->collTransitionLogs = $collTransitionLogs;
                $this->collTransitionLogsPartial = false;
            }
        }

        return $this->collTransitionLogs;
    }

    /**
     * Sets a collection of TransitionLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $transitionLogs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setTransitionLogs(PropelCollection $transitionLogs, PropelPDO $con = null)
    {
        $transitionLogsToDelete = $this->getTransitionLogs(new Criteria(), $con)->diff($transitionLogs);

        $this->transitionLogsScheduledForDeletion = unserialize(serialize($transitionLogsToDelete));

        foreach ($transitionLogsToDelete as $transitionLogRemoved) {
            $transitionLogRemoved->setAclUser(null);
        }

        $this->collTransitionLogs = null;
        foreach ($transitionLogs as $transitionLog) {
            $this->addTransitionLog($transitionLog);
        }

        $this->collTransitionLogs = $transitionLogs;
        $this->collTransitionLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects.
     * @throws PropelException
     */
    public function countTransitionLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTransitionLogsPartial && !$this->isNew();
        if (null === $this->collTransitionLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTransitionLogs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTransitionLogs());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclUser($this)
                ->count($con);
        }

        return count($this->collTransitionLogs);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog $l ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function addTransitionLog(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog $l)
    {
        if ($this->collTransitionLogs === null) {
            $this->initTransitionLogs();
            $this->collTransitionLogsPartial = true;
        }
        if (!in_array($l, $this->collTransitionLogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTransitionLog($l);
        }

        return $this;
    }

    /**
     * @param	TransitionLog $transitionLog The transitionLog object to add.
     */
    protected function doAddTransitionLog($transitionLog)
    {
        $this->collTransitionLogs[]= $transitionLog;
        $transitionLog->setAclUser($this);
    }

    /**
     * @param	TransitionLog $transitionLog The transitionLog object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function removeTransitionLog($transitionLog)
    {
        if ($this->getTransitionLogs()->contains($transitionLog)) {
            $this->collTransitionLogs->remove($this->collTransitionLogs->search($transitionLog));
            if (null === $this->transitionLogsScheduledForDeletion) {
                $this->transitionLogsScheduledForDeletion = clone $this->collTransitionLogs;
                $this->transitionLogsScheduledForDeletion->clear();
            }
            $this->transitionLogsScheduledForDeletion[]= $transitionLog;
            $transitionLog->setAclUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     */
    public function getTransitionLogsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     */
    public function getTransitionLogsJoinOrderItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
        $query->joinWith('OrderItem', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related TransitionLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects
     */
    public function getTransitionLogsJoinProcess($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery::create(null, $criteria);
        $query->joinWith('Process', $join_behavior);

        return $this->getTransitionLogs($query, $con);
    }

    /**
     * Clears out the collOrderNotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     * @see        addOrderNotes()
     */
    public function clearOrderNotes()
    {
        $this->collOrderNotes = null; // important to set this to null since that means it is uninitialized
        $this->collOrderNotesPartial = null;

        return $this;
    }

    /**
     * reset is the collOrderNotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrderNotes($v = true)
    {
        $this->collOrderNotesPartial = $v;
    }

    /**
     * Initializes the collOrderNotes collection.
     *
     * By default this just sets the collOrderNotes collection to an empty array (like clearcollOrderNotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrderNotes($overrideExisting = true)
    {
        if (null !== $this->collOrderNotes && !$overrideExisting) {
            return;
        }
        $this->collOrderNotes = new PropelObjectCollection();
        $this->collOrderNotes->setModel('ProjectA_Zed_Sales_Persistence_PacSalesOrderNote');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Acl_Persistence_PacAclUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderNote[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects
     * @throws PropelException
     */
    public function getOrderNotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrderNotesPartial && !$this->isNew();
        if (null === $this->collOrderNotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrderNotes) {
                // return empty collection
                $this->initOrderNotes();
            } else {
                $collOrderNotes = ProjectA_Zed_Sales_Persistence_PacSalesOrderNoteQuery::create(null, $criteria)
                    ->filterByAclUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrderNotesPartial && count($collOrderNotes)) {
                      $this->initOrderNotes(false);

                      foreach($collOrderNotes as $obj) {
                        if (false == $this->collOrderNotes->contains($obj)) {
                          $this->collOrderNotes->append($obj);
                        }
                      }

                      $this->collOrderNotesPartial = true;
                    }

                    $collOrderNotes->getInternalIterator()->rewind();
                    return $collOrderNotes;
                }

                if($partial && $this->collOrderNotes) {
                    foreach($this->collOrderNotes as $obj) {
                        if($obj->isNew()) {
                            $collOrderNotes[] = $obj;
                        }
                    }
                }

                $this->collOrderNotes = $collOrderNotes;
                $this->collOrderNotesPartial = false;
            }
        }

        return $this->collOrderNotes;
    }

    /**
     * Sets a collection of OrderNote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orderNotes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function setOrderNotes(PropelCollection $orderNotes, PropelPDO $con = null)
    {
        $orderNotesToDelete = $this->getOrderNotes(new Criteria(), $con)->diff($orderNotes);

        $this->orderNotesScheduledForDeletion = unserialize(serialize($orderNotesToDelete));

        foreach ($orderNotesToDelete as $orderNoteRemoved) {
            $orderNoteRemoved->setAclUser(null);
        }

        $this->collOrderNotes = null;
        foreach ($orderNotes as $orderNote) {
            $this->addOrderNote($orderNote);
        }

        $this->collOrderNotes = $orderNotes;
        $this->collOrderNotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects.
     * @throws PropelException
     */
    public function countOrderNotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrderNotesPartial && !$this->isNew();
        if (null === $this->collOrderNotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrderNotes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getOrderNotes());
            }
            $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderNoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAclUser($this)
                ->count($con);
        }

        return count($this->collOrderNotes);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_PacSalesOrderNote object to this object
     * through the ProjectA_Zed_Sales_Persistence_PacSalesOrderNote foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_PacSalesOrderNote $l ProjectA_Zed_Sales_Persistence_PacSalesOrderNote
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function addOrderNote(ProjectA_Zed_Sales_Persistence_PacSalesOrderNote $l)
    {
        if ($this->collOrderNotes === null) {
            $this->initOrderNotes();
            $this->collOrderNotesPartial = true;
        }
        if (!in_array($l, $this->collOrderNotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrderNote($l);
        }

        return $this;
    }

    /**
     * @param	OrderNote $orderNote The orderNote object to add.
     */
    protected function doAddOrderNote($orderNote)
    {
        $this->collOrderNotes[]= $orderNote;
        $orderNote->setAclUser($this);
    }

    /**
     * @param	OrderNote $orderNote The orderNote object to remove.
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function removeOrderNote($orderNote)
    {
        if ($this->getOrderNotes()->contains($orderNote)) {
            $this->collOrderNotes->remove($this->collOrderNotes->search($orderNote));
            if (null === $this->orderNotesScheduledForDeletion) {
                $this->orderNotesScheduledForDeletion = clone $this->collOrderNotes;
                $this->orderNotesScheduledForDeletion->clear();
            }
            $this->orderNotesScheduledForDeletion[]= $orderNote;
            $orderNote->setAclUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacAclUser is new, it will return
     * an empty collection; or if this PacAclUser has previously
     * been saved, it will retrieve related OrderNotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacAclUser.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderNote[] List of ProjectA_Zed_Sales_Persistence_PacSalesOrderNote objects
     */
    public function getOrderNotesJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderNoteQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getOrderNotes($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_acl_user = null;
        $this->fk_acl_role = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->username = null;
        $this->password = null;
        $this->restore_password_key = null;
        $this->last_login = null;
        $this->failed_logins = null;
        $this->is_active = null;
        $this->is_deleted = null;
        $this->is_default = null;
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
            if ($this->collPacDwhReportPermissions) {
                foreach ($this->collPacDwhReportPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacDwhSaikuPermissions) {
                foreach ($this->collPacDwhSaikuPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacMciCostEntriesRelatedByFkAclUserCreated) {
                foreach ($this->collPacMciCostEntriesRelatedByFkAclUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated) {
                foreach ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTransitionLogs) {
                foreach ($this->collTransitionLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrderNotes) {
                foreach ($this->collOrderNotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aAclRole instanceof Persistent) {
              $this->aAclRole->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacDwhReportPermissions instanceof PropelCollection) {
            $this->collPacDwhReportPermissions->clearIterator();
        }
        $this->collPacDwhReportPermissions = null;
        if ($this->collPacDwhSaikuPermissions instanceof PropelCollection) {
            $this->collPacDwhSaikuPermissions->clearIterator();
        }
        $this->collPacDwhSaikuPermissions = null;
        if ($this->collPacMciCostEntriesRelatedByFkAclUserCreated instanceof PropelCollection) {
            $this->collPacMciCostEntriesRelatedByFkAclUserCreated->clearIterator();
        }
        $this->collPacMciCostEntriesRelatedByFkAclUserCreated = null;
        if ($this->collPacMciCostEntriesRelatedByFkAclUserUpdated instanceof PropelCollection) {
            $this->collPacMciCostEntriesRelatedByFkAclUserUpdated->clearIterator();
        }
        $this->collPacMciCostEntriesRelatedByFkAclUserUpdated = null;
        if ($this->collTransitionLogs instanceof PropelCollection) {
            $this->collTransitionLogs->clearIterator();
        }
        $this->collTransitionLogs = null;
        if ($this->collOrderNotes instanceof PropelCollection) {
            $this->collOrderNotes->clearIterator();
        }
        $this->collOrderNotes = null;
        $this->aAclRole = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Acl_Persistence_PacAclUserPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Acl_Persistence_PacAclUser The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::UPDATED_AT;

        return $this;
    }

}
