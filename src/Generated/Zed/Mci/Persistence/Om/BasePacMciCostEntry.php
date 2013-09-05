<?php


/**
 * Base class that represents a row from the 'pac_mci_cost_entry' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence.om
 */
abstract class Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntry extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mci_cost_entry field.
     * @var        int
     */
    protected $id_mci_cost_entry;

    /**
     * The value for the from field.
     * @var        string
     */
    protected $from;

    /**
     * The value for the to field.
     * @var        string
     */
    protected $to;

    /**
     * The value for the cost field.
     * @var        int
     */
    protected $cost;

    /**
     * The value for the fk_mci_cost_type field.
     * @var        int
     */
    protected $fk_mci_cost_type;

    /**
     * The value for the fk_mcm_channel field.
     * @var        int
     */
    protected $fk_mcm_channel;

    /**
     * The value for the fk_mcm_partner_in_channel field.
     * @var        int
     */
    protected $fk_mcm_partner_in_channel;

    /**
     * The value for the fk_mcm_publication field.
     * @var        int
     */
    protected $fk_mcm_publication;

    /**
     * The value for the fk_mcm_campaign field.
     * @var        int
     */
    protected $fk_mcm_campaign;

    /**
     * The value for the fk_acl_user_created field.
     * @var        int
     */
    protected $fk_acl_user_created;

    /**
     * The value for the fk_acl_user_updated field.
     * @var        int
     */
    protected $fk_acl_user_updated;

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
     * @var        PacMciCostType
     */
    protected $aMciCostType;

    /**
     * @var        PacMcmChannel
     */
    protected $aMcmChannel;

    /**
     * @var        PacMcmPartnerInChannel
     */
    protected $aMcmPartnerInChannel;

    /**
     * @var        PacMcmPublication
     */
    protected $aMcmPublication;

    /**
     * @var        PacMcmCampaign
     */
    protected $aMcmCampaign;

    /**
     * @var        PacAclUser
     */
    protected $aAclUserCreated;

    /**
     * @var        PacAclUser
     */
    protected $aAclUserUpdated;

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
     * Get the [id_mci_cost_entry] column value.
     *
     * @return int
     */
    public function getIdMciCostEntry()
    {
        return $this->id_mci_cost_entry;
    }

    /**
     * Get the [optionally formatted] temporal [from] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFrom($format = '%x')
    {
        if ($this->from === null) {
            return null;
        }

        if ($this->from === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->from);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->from, true), $x);
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
     * Get the [optionally formatted] temporal [to] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTo($format = '%x')
    {
        if ($this->to === null) {
            return null;
        }

        if ($this->to === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->to);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->to, true), $x);
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
     * Get the [cost] column value.
     *
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Get the [fk_mci_cost_type] column value.
     *
     * @return int
     */
    public function getFkMciCostType()
    {
        return $this->fk_mci_cost_type;
    }

    /**
     * Get the [fk_mcm_channel] column value.
     *
     * @return int
     */
    public function getFkMcmChannel()
    {
        return $this->fk_mcm_channel;
    }

    /**
     * Get the [fk_mcm_partner_in_channel] column value.
     *
     * @return int
     */
    public function getFkMcmPartnerInChannel()
    {
        return $this->fk_mcm_partner_in_channel;
    }

    /**
     * Get the [fk_mcm_publication] column value.
     *
     * @return int
     */
    public function getFkMcmPublication()
    {
        return $this->fk_mcm_publication;
    }

    /**
     * Get the [fk_mcm_campaign] column value.
     *
     * @return int
     */
    public function getFkMcmCampaign()
    {
        return $this->fk_mcm_campaign;
    }

    /**
     * Get the [fk_acl_user_created] column value.
     *
     * @return int
     */
    public function getFkAclUserCreated()
    {
        return $this->fk_acl_user_created;
    }

    /**
     * Get the [fk_acl_user_updated] column value.
     *
     * @return int
     */
    public function getFkAclUserUpdated()
    {
        return $this->fk_acl_user_updated;
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
     * Set the value of [id_mci_cost_entry] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setIdMciCostEntry($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mci_cost_entry !== $v) {
            $this->id_mci_cost_entry = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY;
        }


        return $this;
    } // setIdMciCostEntry()

    /**
     * Sets the value of [from] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->from !== null || $dt !== null) {
            $currentDateAsString = ($this->from !== null && $tmpDt = new DateTime($this->from)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->from = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM;
            }
        } // if either are not null


        return $this;
    } // setFrom()

    /**
     * Sets the value of [to] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->to !== null || $dt !== null) {
            $currentDateAsString = ($this->to !== null && $tmpDt = new DateTime($this->to)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->to = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO;
            }
        } // if either are not null


        return $this;
    } // setTo()

    /**
     * Set the value of [cost] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setCost($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->cost !== $v) {
            $this->cost = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST;
        }


        return $this;
    } // setCost()

    /**
     * Set the value of [fk_mci_cost_type] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFkMciCostType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_mci_cost_type !== $v) {
            $this->fk_mci_cost_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE;
        }

        if ($this->aMciCostType !== null && $this->aMciCostType->getIdMciCostType() !== $v) {
            $this->aMciCostType = null;
        }


        return $this;
    } // setFkMciCostType()

    /**
     * Set the value of [fk_mcm_channel] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFkMcmChannel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_mcm_channel !== $v) {
            $this->fk_mcm_channel = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL;
        }

        if ($this->aMcmChannel !== null && $this->aMcmChannel->getIdMcmChannel() !== $v) {
            $this->aMcmChannel = null;
        }


        return $this;
    } // setFkMcmChannel()

    /**
     * Set the value of [fk_mcm_partner_in_channel] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFkMcmPartnerInChannel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_mcm_partner_in_channel !== $v) {
            $this->fk_mcm_partner_in_channel = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL;
        }

        if ($this->aMcmPartnerInChannel !== null && $this->aMcmPartnerInChannel->getIdMcmPartnerInChannel() !== $v) {
            $this->aMcmPartnerInChannel = null;
        }


        return $this;
    } // setFkMcmPartnerInChannel()

    /**
     * Set the value of [fk_mcm_publication] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFkMcmPublication($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_mcm_publication !== $v) {
            $this->fk_mcm_publication = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION;
        }

        if ($this->aMcmPublication !== null && $this->aMcmPublication->getIdMcmPublication() !== $v) {
            $this->aMcmPublication = null;
        }


        return $this;
    } // setFkMcmPublication()

    /**
     * Set the value of [fk_mcm_campaign] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFkMcmCampaign($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_mcm_campaign !== $v) {
            $this->fk_mcm_campaign = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN;
        }

        if ($this->aMcmCampaign !== null && $this->aMcmCampaign->getIdMcmCampaign() !== $v) {
            $this->aMcmCampaign = null;
        }


        return $this;
    } // setFkMcmCampaign()

    /**
     * Set the value of [fk_acl_user_created] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFkAclUserCreated($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_acl_user_created !== $v) {
            $this->fk_acl_user_created = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED;
        }

        if ($this->aAclUserCreated !== null && $this->aAclUserCreated->getIdAclUser() !== $v) {
            $this->aAclUserCreated = null;
        }


        return $this;
    } // setFkAclUserCreated()

    /**
     * Set the value of [fk_acl_user_updated] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setFkAclUserUpdated($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_acl_user_updated !== $v) {
            $this->fk_acl_user_updated = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED;
        }

        if ($this->aAclUserUpdated !== null && $this->aAclUserUpdated->getIdAclUser() !== $v) {
            $this->aAclUserUpdated = null;
        }


        return $this;
    } // setFkAclUserUpdated()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT;
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

            $this->id_mci_cost_entry = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->from = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->to = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->cost = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->fk_mci_cost_type = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->fk_mcm_channel = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->fk_mcm_partner_in_channel = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->fk_mcm_publication = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->fk_mcm_campaign = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->fk_acl_user_created = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->fk_acl_user_updated = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->created_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->updated_at = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 13; // 13 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Mci_Persistence_PacMciCostEntry object", $e);
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

        if ($this->aMciCostType !== null && $this->fk_mci_cost_type !== $this->aMciCostType->getIdMciCostType()) {
            $this->aMciCostType = null;
        }
        if ($this->aMcmChannel !== null && $this->fk_mcm_channel !== $this->aMcmChannel->getIdMcmChannel()) {
            $this->aMcmChannel = null;
        }
        if ($this->aMcmPartnerInChannel !== null && $this->fk_mcm_partner_in_channel !== $this->aMcmPartnerInChannel->getIdMcmPartnerInChannel()) {
            $this->aMcmPartnerInChannel = null;
        }
        if ($this->aMcmPublication !== null && $this->fk_mcm_publication !== $this->aMcmPublication->getIdMcmPublication()) {
            $this->aMcmPublication = null;
        }
        if ($this->aMcmCampaign !== null && $this->fk_mcm_campaign !== $this->aMcmCampaign->getIdMcmCampaign()) {
            $this->aMcmCampaign = null;
        }
        if ($this->aAclUserCreated !== null && $this->fk_acl_user_created !== $this->aAclUserCreated->getIdAclUser()) {
            $this->aAclUserCreated = null;
        }
        if ($this->aAclUserUpdated !== null && $this->fk_acl_user_updated !== $this->aAclUserUpdated->getIdAclUser()) {
            $this->aAclUserUpdated = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMciCostType = null;
            $this->aMcmChannel = null;
            $this->aMcmPartnerInChannel = null;
            $this->aMcmPublication = null;
            $this->aMcmCampaign = null;
            $this->aAclUserCreated = null;
            $this->aAclUserUpdated = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT)) {
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

                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($this);
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

            if ($this->aMciCostType !== null) {
                if ($this->aMciCostType->isModified() || $this->aMciCostType->isNew()) {
                    $affectedRows += $this->aMciCostType->save($con);
                }
                $this->setMciCostType($this->aMciCostType);
            }

            if ($this->aMcmChannel !== null) {
                if ($this->aMcmChannel->isModified() || $this->aMcmChannel->isNew()) {
                    $affectedRows += $this->aMcmChannel->save($con);
                }
                $this->setMcmChannel($this->aMcmChannel);
            }

            if ($this->aMcmPartnerInChannel !== null) {
                if ($this->aMcmPartnerInChannel->isModified() || $this->aMcmPartnerInChannel->isNew()) {
                    $affectedRows += $this->aMcmPartnerInChannel->save($con);
                }
                $this->setMcmPartnerInChannel($this->aMcmPartnerInChannel);
            }

            if ($this->aMcmPublication !== null) {
                if ($this->aMcmPublication->isModified() || $this->aMcmPublication->isNew()) {
                    $affectedRows += $this->aMcmPublication->save($con);
                }
                $this->setMcmPublication($this->aMcmPublication);
            }

            if ($this->aMcmCampaign !== null) {
                if ($this->aMcmCampaign->isModified() || $this->aMcmCampaign->isNew()) {
                    $affectedRows += $this->aMcmCampaign->save($con);
                }
                $this->setMcmCampaign($this->aMcmCampaign);
            }

            if ($this->aAclUserCreated !== null) {
                if ($this->aAclUserCreated->isModified() || $this->aAclUserCreated->isNew()) {
                    $affectedRows += $this->aAclUserCreated->save($con);
                }
                $this->setAclUserCreated($this->aAclUserCreated);
            }

            if ($this->aAclUserUpdated !== null) {
                if ($this->aAclUserUpdated->isModified() || $this->aAclUserUpdated->isNew()) {
                    $affectedRows += $this->aAclUserUpdated->save($con);
                }
                $this->setAclUserUpdated($this->aAclUserUpdated);
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

        $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY;
        if (null !== $this->id_mci_cost_entry) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY)) {
            $modifiedColumns[':p' . $index++]  = '`id_mci_cost_entry`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM)) {
            $modifiedColumns[':p' . $index++]  = '`from`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO)) {
            $modifiedColumns[':p' . $index++]  = '`to`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST)) {
            $modifiedColumns[':p' . $index++]  = '`cost`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_mci_cost_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL)) {
            $modifiedColumns[':p' . $index++]  = '`fk_mcm_channel`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL)) {
            $modifiedColumns[':p' . $index++]  = '`fk_mcm_partner_in_channel`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION)) {
            $modifiedColumns[':p' . $index++]  = '`fk_mcm_publication`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN)) {
            $modifiedColumns[':p' . $index++]  = '`fk_mcm_campaign`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`fk_acl_user_created`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = '`fk_acl_user_updated`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_mci_cost_entry` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mci_cost_entry`':
                        $stmt->bindValue($identifier, $this->id_mci_cost_entry, PDO::PARAM_INT);
                        break;
                    case '`from`':
                        $stmt->bindValue($identifier, $this->from, PDO::PARAM_STR);
                        break;
                    case '`to`':
                        $stmt->bindValue($identifier, $this->to, PDO::PARAM_STR);
                        break;
                    case '`cost`':
                        $stmt->bindValue($identifier, $this->cost, PDO::PARAM_INT);
                        break;
                    case '`fk_mci_cost_type`':
                        $stmt->bindValue($identifier, $this->fk_mci_cost_type, PDO::PARAM_INT);
                        break;
                    case '`fk_mcm_channel`':
                        $stmt->bindValue($identifier, $this->fk_mcm_channel, PDO::PARAM_INT);
                        break;
                    case '`fk_mcm_partner_in_channel`':
                        $stmt->bindValue($identifier, $this->fk_mcm_partner_in_channel, PDO::PARAM_INT);
                        break;
                    case '`fk_mcm_publication`':
                        $stmt->bindValue($identifier, $this->fk_mcm_publication, PDO::PARAM_INT);
                        break;
                    case '`fk_mcm_campaign`':
                        $stmt->bindValue($identifier, $this->fk_mcm_campaign, PDO::PARAM_INT);
                        break;
                    case '`fk_acl_user_created`':
                        $stmt->bindValue($identifier, $this->fk_acl_user_created, PDO::PARAM_INT);
                        break;
                    case '`fk_acl_user_updated`':
                        $stmt->bindValue($identifier, $this->fk_acl_user_updated, PDO::PARAM_INT);
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
        $this->setIdMciCostEntry($pk);

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

            if ($this->aMciCostType !== null) {
                if (!$this->aMciCostType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMciCostType->getValidationFailures());
                }
            }

            if ($this->aMcmChannel !== null) {
                if (!$this->aMcmChannel->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMcmChannel->getValidationFailures());
                }
            }

            if ($this->aMcmPartnerInChannel !== null) {
                if (!$this->aMcmPartnerInChannel->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMcmPartnerInChannel->getValidationFailures());
                }
            }

            if ($this->aMcmPublication !== null) {
                if (!$this->aMcmPublication->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMcmPublication->getValidationFailures());
                }
            }

            if ($this->aMcmCampaign !== null) {
                if (!$this->aMcmCampaign->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMcmCampaign->getValidationFailures());
                }
            }

            if ($this->aAclUserCreated !== null) {
                if (!$this->aAclUserCreated->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAclUserCreated->getValidationFailures());
                }
            }

            if ($this->aAclUserUpdated !== null) {
                if (!$this->aAclUserUpdated->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAclUserUpdated->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMciCostEntry();
                break;
            case 1:
                return $this->getFrom();
                break;
            case 2:
                return $this->getTo();
                break;
            case 3:
                return $this->getCost();
                break;
            case 4:
                return $this->getFkMciCostType();
                break;
            case 5:
                return $this->getFkMcmChannel();
                break;
            case 6:
                return $this->getFkMcmPartnerInChannel();
                break;
            case 7:
                return $this->getFkMcmPublication();
                break;
            case 8:
                return $this->getFkMcmCampaign();
                break;
            case 9:
                return $this->getFkAclUserCreated();
                break;
            case 10:
                return $this->getFkAclUserUpdated();
                break;
            case 11:
                return $this->getCreatedAt();
                break;
            case 12:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Mci_Persistence_PacMciCostEntry'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Mci_Persistence_PacMciCostEntry'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMciCostEntry(),
            $keys[1] => $this->getFrom(),
            $keys[2] => $this->getTo(),
            $keys[3] => $this->getCost(),
            $keys[4] => $this->getFkMciCostType(),
            $keys[5] => $this->getFkMcmChannel(),
            $keys[6] => $this->getFkMcmPartnerInChannel(),
            $keys[7] => $this->getFkMcmPublication(),
            $keys[8] => $this->getFkMcmCampaign(),
            $keys[9] => $this->getFkAclUserCreated(),
            $keys[10] => $this->getFkAclUserUpdated(),
            $keys[11] => $this->getCreatedAt(),
            $keys[12] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMciCostType) {
                $result['MciCostType'] = $this->aMciCostType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMcmChannel) {
                $result['McmChannel'] = $this->aMcmChannel->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMcmPartnerInChannel) {
                $result['McmPartnerInChannel'] = $this->aMcmPartnerInChannel->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMcmPublication) {
                $result['McmPublication'] = $this->aMcmPublication->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMcmCampaign) {
                $result['McmCampaign'] = $this->aMcmCampaign->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAclUserCreated) {
                $result['AclUserCreated'] = $this->aAclUserCreated->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAclUserUpdated) {
                $result['AclUserUpdated'] = $this->aAclUserUpdated->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMciCostEntry($value);
                break;
            case 1:
                $this->setFrom($value);
                break;
            case 2:
                $this->setTo($value);
                break;
            case 3:
                $this->setCost($value);
                break;
            case 4:
                $this->setFkMciCostType($value);
                break;
            case 5:
                $this->setFkMcmChannel($value);
                break;
            case 6:
                $this->setFkMcmPartnerInChannel($value);
                break;
            case 7:
                $this->setFkMcmPublication($value);
                break;
            case 8:
                $this->setFkMcmCampaign($value);
                break;
            case 9:
                $this->setFkAclUserCreated($value);
                break;
            case 10:
                $this->setFkAclUserUpdated($value);
                break;
            case 11:
                $this->setCreatedAt($value);
                break;
            case 12:
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
        $keys = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMciCostEntry($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFrom($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTo($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCost($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFkMciCostType($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFkMcmChannel($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setFkMcmPartnerInChannel($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setFkMcmPublication($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setFkMcmCampaign($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setFkAclUserCreated($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setFkAclUserUpdated($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCreatedAt($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $this->id_mci_cost_entry);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM, $this->from);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO, $this->to);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST, $this->cost);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, $this->fk_mci_cost_type);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, $this->fk_mcm_channel);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, $this->fk_mcm_partner_in_channel);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, $this->fk_mcm_publication);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, $this->fk_mcm_campaign);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, $this->fk_acl_user_created);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, $this->fk_acl_user_updated);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $this->id_mci_cost_entry);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdMciCostEntry();
    }

    /**
     * Generic method to set the primary key (id_mci_cost_entry column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMciCostEntry($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMciCostEntry();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Mci_Persistence_PacMciCostEntry (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFrom($this->getFrom());
        $copyObj->setTo($this->getTo());
        $copyObj->setCost($this->getCost());
        $copyObj->setFkMciCostType($this->getFkMciCostType());
        $copyObj->setFkMcmChannel($this->getFkMcmChannel());
        $copyObj->setFkMcmPartnerInChannel($this->getFkMcmPartnerInChannel());
        $copyObj->setFkMcmPublication($this->getFkMcmPublication());
        $copyObj->setFkMcmCampaign($this->getFkMcmCampaign());
        $copyObj->setFkAclUserCreated($this->getFkAclUserCreated());
        $copyObj->setFkAclUserUpdated($this->getFkAclUserUpdated());
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
            $copyObj->setIdMciCostEntry(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry Clone of current object.
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Mci_Persistence_PacMciCostType object.
     *
     * @param             ProjectA_Zed_Mci_Persistence_PacMciCostType $v
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMciCostType(ProjectA_Zed_Mci_Persistence_PacMciCostType $v = null)
    {
        if ($v === null) {
            $this->setFkMciCostType(NULL);
        } else {
            $this->setFkMciCostType($v->getIdMciCostType());
        }

        $this->aMciCostType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Mci_Persistence_PacMciCostType object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMciCostEntry($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Mci_Persistence_PacMciCostType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostType The associated ProjectA_Zed_Mci_Persistence_PacMciCostType object.
     * @throws PropelException
     */
    public function getMciCostType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMciCostType === null && ($this->fk_mci_cost_type !== null) && $doQuery) {
            $this->aMciCostType = ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery::create()->findPk($this->fk_mci_cost_type, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMciCostType->addPacMciCostEntries($this);
             */
        }

        return $this->aMciCostType;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Mcm_Persistence_PacMcmChannel object.
     *
     * @param             ProjectA_Zed_Mcm_Persistence_PacMcmChannel $v
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMcmChannel(ProjectA_Zed_Mcm_Persistence_PacMcmChannel $v = null)
    {
        if ($v === null) {
            $this->setFkMcmChannel(NULL);
        } else {
            $this->setFkMcmChannel($v->getIdMcmChannel());
        }

        $this->aMcmChannel = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Mcm_Persistence_PacMcmChannel object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMciCostEntry($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Mcm_Persistence_PacMcmChannel object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmChannel The associated ProjectA_Zed_Mcm_Persistence_PacMcmChannel object.
     * @throws PropelException
     */
    public function getMcmChannel(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMcmChannel === null && ($this->fk_mcm_channel !== null) && $doQuery) {
            $this->aMcmChannel = ProjectA_Zed_Mcm_Persistence_PacMcmChannelQuery::create()->findPk($this->fk_mcm_channel, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMcmChannel->addPacMciCostEntries($this);
             */
        }

        return $this->aMcmChannel;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object.
     *
     * @param             ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel $v
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMcmPartnerInChannel(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel $v = null)
    {
        if ($v === null) {
            $this->setFkMcmPartnerInChannel(NULL);
        } else {
            $this->setFkMcmPartnerInChannel($v->getIdMcmPartnerInChannel());
        }

        $this->aMcmPartnerInChannel = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMciCostEntry($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel The associated ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object.
     * @throws PropelException
     */
    public function getMcmPartnerInChannel(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMcmPartnerInChannel === null && ($this->fk_mcm_partner_in_channel !== null) && $doQuery) {
            $this->aMcmPartnerInChannel = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery::create()->findPk($this->fk_mcm_partner_in_channel, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMcmPartnerInChannel->addPacMciCostEntries($this);
             */
        }

        return $this->aMcmPartnerInChannel;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Mcm_Persistence_PacMcmPublication object.
     *
     * @param             ProjectA_Zed_Mcm_Persistence_PacMcmPublication $v
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMcmPublication(ProjectA_Zed_Mcm_Persistence_PacMcmPublication $v = null)
    {
        if ($v === null) {
            $this->setFkMcmPublication(NULL);
        } else {
            $this->setFkMcmPublication($v->getIdMcmPublication());
        }

        $this->aMcmPublication = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Mcm_Persistence_PacMcmPublication object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMciCostEntry($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Mcm_Persistence_PacMcmPublication object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPublication The associated ProjectA_Zed_Mcm_Persistence_PacMcmPublication object.
     * @throws PropelException
     */
    public function getMcmPublication(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMcmPublication === null && ($this->fk_mcm_publication !== null) && $doQuery) {
            $this->aMcmPublication = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationQuery::create()->findPk($this->fk_mcm_publication, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMcmPublication->addPacMciCostEntries($this);
             */
        }

        return $this->aMcmPublication;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Mcm_Persistence_PacMcmCampaign object.
     *
     * @param             ProjectA_Zed_Mcm_Persistence_PacMcmCampaign $v
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMcmCampaign(ProjectA_Zed_Mcm_Persistence_PacMcmCampaign $v = null)
    {
        if ($v === null) {
            $this->setFkMcmCampaign(NULL);
        } else {
            $this->setFkMcmCampaign($v->getIdMcmCampaign());
        }

        $this->aMcmCampaign = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Mcm_Persistence_PacMcmCampaign object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMciCostEntry($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Mcm_Persistence_PacMcmCampaign object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaign The associated ProjectA_Zed_Mcm_Persistence_PacMcmCampaign object.
     * @throws PropelException
     */
    public function getMcmCampaign(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMcmCampaign === null && ($this->fk_mcm_campaign !== null) && $doQuery) {
            $this->aMcmCampaign = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery::create()->findPk($this->fk_mcm_campaign, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMcmCampaign->addPacMciCostEntries($this);
             */
        }

        return $this->aMcmCampaign;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Acl_Persistence_PacAclUser object.
     *
     * @param             ProjectA_Zed_Acl_Persistence_PacAclUser $v
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAclUserCreated(ProjectA_Zed_Acl_Persistence_PacAclUser $v = null)
    {
        if ($v === null) {
            $this->setFkAclUserCreated(NULL);
        } else {
            $this->setFkAclUserCreated($v->getIdAclUser());
        }

        $this->aAclUserCreated = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Acl_Persistence_PacAclUser object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMciCostEntryRelatedByFkAclUserCreated($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Acl_Persistence_PacAclUser object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The associated ProjectA_Zed_Acl_Persistence_PacAclUser object.
     * @throws PropelException
     */
    public function getAclUserCreated(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAclUserCreated === null && ($this->fk_acl_user_created !== null) && $doQuery) {
            $this->aAclUserCreated = ProjectA_Zed_Acl_Persistence_PacAclUserQuery::create()->findPk($this->fk_acl_user_created, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAclUserCreated->addPacMciCostEntriesRelatedByFkAclUserCreated($this);
             */
        }

        return $this->aAclUserCreated;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Acl_Persistence_PacAclUser object.
     *
     * @param             ProjectA_Zed_Acl_Persistence_PacAclUser $v
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAclUserUpdated(ProjectA_Zed_Acl_Persistence_PacAclUser $v = null)
    {
        if ($v === null) {
            $this->setFkAclUserUpdated(NULL);
        } else {
            $this->setFkAclUserUpdated($v->getIdAclUser());
        }

        $this->aAclUserUpdated = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Acl_Persistence_PacAclUser object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMciCostEntryRelatedByFkAclUserUpdated($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Acl_Persistence_PacAclUser object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Acl_Persistence_PacAclUser The associated ProjectA_Zed_Acl_Persistence_PacAclUser object.
     * @throws PropelException
     */
    public function getAclUserUpdated(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAclUserUpdated === null && ($this->fk_acl_user_updated !== null) && $doQuery) {
            $this->aAclUserUpdated = ProjectA_Zed_Acl_Persistence_PacAclUserQuery::create()->findPk($this->fk_acl_user_updated, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAclUserUpdated->addPacMciCostEntriesRelatedByFkAclUserUpdated($this);
             */
        }

        return $this->aAclUserUpdated;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mci_cost_entry = null;
        $this->from = null;
        $this->to = null;
        $this->cost = null;
        $this->fk_mci_cost_type = null;
        $this->fk_mcm_channel = null;
        $this->fk_mcm_partner_in_channel = null;
        $this->fk_mcm_publication = null;
        $this->fk_mcm_campaign = null;
        $this->fk_acl_user_created = null;
        $this->fk_acl_user_updated = null;
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
            if ($this->aMciCostType instanceof Persistent) {
              $this->aMciCostType->clearAllReferences($deep);
            }
            if ($this->aMcmChannel instanceof Persistent) {
              $this->aMcmChannel->clearAllReferences($deep);
            }
            if ($this->aMcmPartnerInChannel instanceof Persistent) {
              $this->aMcmPartnerInChannel->clearAllReferences($deep);
            }
            if ($this->aMcmPublication instanceof Persistent) {
              $this->aMcmPublication->clearAllReferences($deep);
            }
            if ($this->aMcmCampaign instanceof Persistent) {
              $this->aMcmCampaign->clearAllReferences($deep);
            }
            if ($this->aAclUserCreated instanceof Persistent) {
              $this->aAclUserCreated->clearAllReferences($deep);
            }
            if ($this->aAclUserUpdated instanceof Persistent) {
              $this->aAclUserUpdated->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aMciCostType = null;
        $this->aMcmChannel = null;
        $this->aMcmPartnerInChannel = null;
        $this->aMcmPublication = null;
        $this->aMcmCampaign = null;
        $this->aAclUserCreated = null;
        $this->aAclUserUpdated = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Mci_Persistence_PacMciCostEntry The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT;

        return $this;
    }

}
