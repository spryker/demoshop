<?php


/**
 * Base class that represents a row from the 'pac_mail_template_version' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.om
 */
abstract class Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplateVersion extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_mail_template field.
     * @var        int
     */
    protected $id_mail_template;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the subject field.
     * @var        string
     */
    protected $subject;

    /**
     * The value for the sender field.
     * @var        string
     */
    protected $sender;

    /**
     * The value for the sender_name field.
     * @var        string
     */
    protected $sender_name;

    /**
     * The value for the text field.
     * @var        string
     */
    protected $text;

    /**
     * The value for the html field.
     * @var        string
     */
    protected $html;

    /**
     * The value for the date_interval field.
     * @var        string
     */
    protected $date_interval;

    /**
     * The value for the wrapper field.
     * @var        int
     */
    protected $wrapper;

    /**
     * The value for the deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $deleted;

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
     * The value for the wrapper_version field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $wrapper_version;

    /**
     * The value for the pac_mail_template_ids field.
     * @var        array
     */
    protected $pac_mail_template_ids;

    /**
     * The unserialized $pac_mail_template_ids value - i.e. the persisted object.
     * This is necessary to avoid repeated calls to unserialize() at runtime.
     * @var        object
     */
    protected $pac_mail_template_ids_unserialized;

    /**
     * The value for the pac_mail_template_versions field.
     * @var        array
     */
    protected $pac_mail_template_versions;

    /**
     * The unserialized $pac_mail_template_versions value - i.e. the persisted object.
     * This is necessary to avoid repeated calls to unserialize() at runtime.
     * @var        object
     */
    protected $pac_mail_template_versions_unserialized;

    /**
     * @var        PacMailTemplate
     */
    protected $aPacMailTemplate;

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
        $this->deleted = false;
        $this->version = 0;
        $this->wrapper_version = 0;
    }

    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplateVersion object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_mail_template] column value.
     *
     * @return int
     */
    public function getIdMailTemplate()
    {

        return $this->id_mail_template;
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
     * Get the [subject] column value.
     *
     * @return string
     */
    public function getSubject()
    {

        return $this->subject;
    }

    /**
     * Get the [sender] column value.
     *
     * @return string
     */
    public function getSender()
    {

        return $this->sender;
    }

    /**
     * Get the [sender_name] column value.
     *
     * @return string
     */
    public function getSenderName()
    {

        return $this->sender_name;
    }

    /**
     * Get the [text] column value.
     *
     * @return string
     */
    public function getText()
    {

        return $this->text;
    }

    /**
     * Get the [html] column value.
     *
     * @return string
     */
    public function getHtml()
    {

        return $this->html;
    }

    /**
     * Get the [date_interval] column value.
     *
     * @return string
     */
    public function getDateInterval()
    {

        return $this->date_interval;
    }

    /**
     * Get the [wrapper] column value.
     *
     * @return int
     */
    public function getWrapper()
    {

        return $this->wrapper;
    }

    /**
     * Get the [deleted] column value.
     *
     * @return boolean
     */
    public function getDeleted()
    {

        return $this->deleted;
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
     * Get the [wrapper_version] column value.
     *
     * @return int
     */
    public function getWrapperVersion()
    {

        return $this->wrapper_version;
    }

    /**
     * Get the [pac_mail_template_ids] column value.
     *
     * @return array
     */
    public function getPacMailTemplateIds()
    {
        if (null === $this->pac_mail_template_ids_unserialized) {
            $this->pac_mail_template_ids_unserialized = array();
        }
        if (!$this->pac_mail_template_ids_unserialized && null !== $this->pac_mail_template_ids) {
            $pac_mail_template_ids_unserialized = substr($this->pac_mail_template_ids, 2, -2);
            $this->pac_mail_template_ids_unserialized = $pac_mail_template_ids_unserialized ? explode(' | ', $pac_mail_template_ids_unserialized) : array();
        }

        return $this->pac_mail_template_ids_unserialized;
    }

    /**
     * Test the presence of a value in the [pac_mail_template_ids] array column value.
     * @param mixed $value
     *
     * @return boolean
     */
    public function hasPacMailTemplateId($value)
    {
        return in_array($value, $this->getPacMailTemplateIds());
    } // hasPacMailTemplateId()

    /**
     * Get the [pac_mail_template_versions] column value.
     *
     * @return array
     */
    public function getPacMailTemplateVersions()
    {
        if (null === $this->pac_mail_template_versions_unserialized) {
            $this->pac_mail_template_versions_unserialized = array();
        }
        if (!$this->pac_mail_template_versions_unserialized && null !== $this->pac_mail_template_versions) {
            $pac_mail_template_versions_unserialized = substr($this->pac_mail_template_versions, 2, -2);
            $this->pac_mail_template_versions_unserialized = $pac_mail_template_versions_unserialized ? explode(' | ', $pac_mail_template_versions_unserialized) : array();
        }

        return $this->pac_mail_template_versions_unserialized;
    }

    /**
     * Test the presence of a value in the [pac_mail_template_versions] array column value.
     * @param mixed $value
     *
     * @return boolean
     */
    public function hasPacMailTemplateVersion($value)
    {
        return in_array($value, $this->getPacMailTemplateVersions());
    } // hasPacMailTemplateVersion()

    /**
     * Set the value of [id_mail_template] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setIdMailTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_mail_template !== $v) {
            $this->id_mail_template = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE;
        }

        if ($this->aPacMailTemplate !== null && $this->aPacMailTemplate->getIdMailTemplate() !== $v) {
            $this->aPacMailTemplate = null;
        }


        return $this;
    } // setIdMailTemplate()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [subject] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setSubject($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->subject !== $v) {
            $this->subject = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SUBJECT;
        }


        return $this;
    } // setSubject()

    /**
     * Set the value of [sender] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setSender($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sender !== $v) {
            $this->sender = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER;
        }


        return $this;
    } // setSender()

    /**
     * Set the value of [sender_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setSenderName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sender_name !== $v) {
            $this->sender_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER_NAME;
        }


        return $this;
    } // setSenderName()

    /**
     * Set the value of [text] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setText($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->text !== $v) {
            $this->text = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::TEXT;
        }


        return $this;
    } // setText()

    /**
     * Set the value of [html] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setHtml($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->html !== $v) {
            $this->html = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::HTML;
        }


        return $this;
    } // setHtml()

    /**
     * Set the value of [date_interval] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setDateInterval($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->date_interval !== $v) {
            $this->date_interval = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATE_INTERVAL;
        }


        return $this;
    } // setDateInterval()

    /**
     * Set the value of [wrapper] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setWrapper($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->wrapper !== $v) {
            $this->wrapper = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER;
        }


        return $this;
    } // setWrapper()

    /**
     * Sets the value of the [deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setDeleted($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->deleted !== $v) {
            $this->deleted = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DELETED;
        }


        return $this;
    } // setDeleted()

    /**
     * Set the value of [version] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Sets the value of [version_created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setVersionCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->version_created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->version_created_at !== null && $tmpDt = new DateTime($this->version_created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->version_created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setVersionCreatedAt()

    /**
     * Set the value of [version_created_by] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setVersionCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->version_created_by !== $v) {
            $this->version_created_by = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_BY;
        }


        return $this;
    } // setVersionCreatedBy()

    /**
     * Set the value of [wrapper_version] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setWrapperVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->wrapper_version !== $v) {
            $this->wrapper_version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER_VERSION;
        }


        return $this;
    } // setWrapperVersion()

    /**
     * Set the value of [pac_mail_template_ids] column.
     *
     * @param  array $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setPacMailTemplateIds($v)
    {
        if ($this->pac_mail_template_ids_unserialized !== $v) {
            $this->pac_mail_template_ids_unserialized = $v;
            $this->pac_mail_template_ids = '| ' . implode(' | ', (array) $v) . ' |';
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS;
        }


        return $this;
    } // setPacMailTemplateIds()

    /**
     * Adds a value to the [pac_mail_template_ids] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function addPacMailTemplateId($value)
    {
        $currentArray = $this->getPacMailTemplateIds();
        $currentArray []= $value;
        $this->setPacMailTemplateIds($currentArray);

        return $this;
    } // addPacMailTemplateId()

    /**
     * Removes a value from the [pac_mail_template_ids] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function removePacMailTemplateId($value)
    {
        $targetArray = array();
        foreach ($this->getPacMailTemplateIds() as $element) {
            if ($element != $value) {
                $targetArray []= $element;
            }
        }
        $this->setPacMailTemplateIds($targetArray);

        return $this;
    } // removePacMailTemplateId()

    /**
     * Set the value of [pac_mail_template_versions] column.
     *
     * @param  array $v new value
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function setPacMailTemplateVersions($v)
    {
        if ($this->pac_mail_template_versions_unserialized !== $v) {
            $this->pac_mail_template_versions_unserialized = $v;
            $this->pac_mail_template_versions = '| ' . implode(' | ', (array) $v) . ' |';
            $this->modifiedColumns[] = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS;
        }


        return $this;
    } // setPacMailTemplateVersions()

    /**
     * Adds a value to the [pac_mail_template_versions] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function addPacMailTemplateVersion($value)
    {
        $currentArray = $this->getPacMailTemplateVersions();
        $currentArray []= $value;
        $this->setPacMailTemplateVersions($currentArray);

        return $this;
    } // addPacMailTemplateVersion()

    /**
     * Removes a value from the [pac_mail_template_versions] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     */
    public function removePacMailTemplateVersion($value)
    {
        $targetArray = array();
        foreach ($this->getPacMailTemplateVersions() as $element) {
            if ($element != $value) {
                $targetArray []= $element;
            }
        }
        $this->setPacMailTemplateVersions($targetArray);

        return $this;
    } // removePacMailTemplateVersion()

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
            if ($this->deleted !== false) {
                return false;
            }

            if ($this->version !== 0) {
                return false;
            }

            if ($this->wrapper_version !== 0) {
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

            $this->id_mail_template = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->subject = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sender = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->sender_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->text = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->html = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->date_interval = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->wrapper = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->deleted = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->version = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->version_created_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->version_created_by = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->wrapper_version = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->pac_mail_template_ids = $row[$startcol + 14];
            $this->pac_mail_template_ids_unserialized = null;
            $this->pac_mail_template_versions = $row[$startcol + 15];
            $this->pac_mail_template_versions_unserialized = null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 16; // 16 = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion object", $e);
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

        if ($this->aPacMailTemplate !== null && $this->id_mail_template !== $this->aPacMailTemplate->getIdMailTemplate()) {
            $this->aPacMailTemplate = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacMailTemplate = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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

                ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::addInstanceToPool($this);
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

            if ($this->aPacMailTemplate !== null) {
                if ($this->aPacMailTemplate->isModified() || $this->aPacMailTemplate->isNew()) {
                    $affectedRows += $this->aPacMailTemplate->save($con);
                }
                $this->setPacMailTemplate($this->aPacMailTemplate);
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
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`id_mail_template`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SUBJECT)) {
            $modifiedColumns[':p' . $index++]  = '`subject`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER)) {
            $modifiedColumns[':p' . $index++]  = '`sender`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`sender_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::TEXT)) {
            $modifiedColumns[':p' . $index++]  = '`text`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::HTML)) {
            $modifiedColumns[':p' . $index++]  = '`html`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATE_INTERVAL)) {
            $modifiedColumns[':p' . $index++]  = '`date_interval`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER)) {
            $modifiedColumns[':p' . $index++]  = '`wrapper`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`version_created_by`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER_VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`wrapper_version`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS)) {
            $modifiedColumns[':p' . $index++]  = '`pac_mail_template_ids`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS)) {
            $modifiedColumns[':p' . $index++]  = '`pac_mail_template_versions`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_mail_template_version` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_mail_template`':
                        $stmt->bindValue($identifier, $this->id_mail_template, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`subject`':
                        $stmt->bindValue($identifier, $this->subject, PDO::PARAM_STR);
                        break;
                    case '`sender`':
                        $stmt->bindValue($identifier, $this->sender, PDO::PARAM_STR);
                        break;
                    case '`sender_name`':
                        $stmt->bindValue($identifier, $this->sender_name, PDO::PARAM_STR);
                        break;
                    case '`text`':
                        $stmt->bindValue($identifier, $this->text, PDO::PARAM_STR);
                        break;
                    case '`html`':
                        $stmt->bindValue($identifier, $this->html, PDO::PARAM_STR);
                        break;
                    case '`date_interval`':
                        $stmt->bindValue($identifier, $this->date_interval, PDO::PARAM_STR);
                        break;
                    case '`wrapper`':
                        $stmt->bindValue($identifier, $this->wrapper, PDO::PARAM_INT);
                        break;
                    case '`deleted`':
                        $stmt->bindValue($identifier, (int) $this->deleted, PDO::PARAM_INT);
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
                    case '`wrapper_version`':
                        $stmt->bindValue($identifier, $this->wrapper_version, PDO::PARAM_INT);
                        break;
                    case '`pac_mail_template_ids`':
                        $stmt->bindValue($identifier, $this->pac_mail_template_ids, PDO::PARAM_STR);
                        break;
                    case '`pac_mail_template_versions`':
                        $stmt->bindValue($identifier, $this->pac_mail_template_versions, PDO::PARAM_STR);
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

            if ($this->aPacMailTemplate !== null) {
                if (!$this->aPacMailTemplate->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacMailTemplate->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMailTemplate();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getSubject();
                break;
            case 3:
                return $this->getSender();
                break;
            case 4:
                return $this->getSenderName();
                break;
            case 5:
                return $this->getText();
                break;
            case 6:
                return $this->getHtml();
                break;
            case 7:
                return $this->getDateInterval();
                break;
            case 8:
                return $this->getWrapper();
                break;
            case 9:
                return $this->getDeleted();
                break;
            case 10:
                return $this->getVersion();
                break;
            case 11:
                return $this->getVersionCreatedAt();
                break;
            case 12:
                return $this->getVersionCreatedBy();
                break;
            case 13:
                return $this->getWrapperVersion();
                break;
            case 14:
                return $this->getPacMailTemplateIds();
                break;
            case 15:
                return $this->getPacMailTemplateVersions();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion'][serialize($this->getPrimaryKey())] = true;
        $keys = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMailTemplate(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getSubject(),
            $keys[3] => $this->getSender(),
            $keys[4] => $this->getSenderName(),
            $keys[5] => $this->getText(),
            $keys[6] => $this->getHtml(),
            $keys[7] => $this->getDateInterval(),
            $keys[8] => $this->getWrapper(),
            $keys[9] => $this->getDeleted(),
            $keys[10] => $this->getVersion(),
            $keys[11] => $this->getVersionCreatedAt(),
            $keys[12] => $this->getVersionCreatedBy(),
            $keys[13] => $this->getWrapperVersion(),
            $keys[14] => $this->getPacMailTemplateIds(),
            $keys[15] => $this->getPacMailTemplateVersions(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPacMailTemplate) {
                $result['PacMailTemplate'] = $this->aPacMailTemplate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMailTemplate($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setSubject($value);
                break;
            case 3:
                $this->setSender($value);
                break;
            case 4:
                $this->setSenderName($value);
                break;
            case 5:
                $this->setText($value);
                break;
            case 6:
                $this->setHtml($value);
                break;
            case 7:
                $this->setDateInterval($value);
                break;
            case 8:
                $this->setWrapper($value);
                break;
            case 9:
                $this->setDeleted($value);
                break;
            case 10:
                $this->setVersion($value);
                break;
            case 11:
                $this->setVersionCreatedAt($value);
                break;
            case 12:
                $this->setVersionCreatedBy($value);
                break;
            case 13:
                $this->setWrapperVersion($value);
                break;
            case 14:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setPacMailTemplateIds($value);
                break;
            case 15:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setPacMailTemplateVersions($value);
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
        $keys = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMailTemplate($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSubject($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSender($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSenderName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setText($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setHtml($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDateInterval($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setWrapper($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDeleted($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setVersion($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setVersionCreatedAt($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setVersionCreatedBy($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setWrapperVersion($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setPacMailTemplateIds($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setPacMailTemplateVersions($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $this->id_mail_template);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::NAME)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SUBJECT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SUBJECT, $this->subject);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER, $this->sender);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER_NAME)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER_NAME, $this->sender_name);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::TEXT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::TEXT, $this->text);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::HTML)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::HTML, $this->html);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATE_INTERVAL)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATE_INTERVAL, $this->date_interval);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER, $this->wrapper);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DELETED)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DELETED, $this->deleted);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $this->version);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_AT)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_AT, $this->version_created_at);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_BY)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_BY, $this->version_created_by);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER_VERSION)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER_VERSION, $this->wrapper_version);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS, $this->pac_mail_template_ids);
        if ($this->isColumnModified(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS)) $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS, $this->pac_mail_template_versions);

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
        $criteria = new Criteria(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $this->id_mail_template);
        $criteria->add(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $this->version);

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
        $pks[0] = $this->getIdMailTemplate();
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
        $this->setIdMailTemplate($keys[0]);
        $this->setVersion($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdMailTemplate()) && (null === $this->getVersion());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdMailTemplate($this->getIdMailTemplate());
        $copyObj->setName($this->getName());
        $copyObj->setSubject($this->getSubject());
        $copyObj->setSender($this->getSender());
        $copyObj->setSenderName($this->getSenderName());
        $copyObj->setText($this->getText());
        $copyObj->setHtml($this->getHtml());
        $copyObj->setDateInterval($this->getDateInterval());
        $copyObj->setWrapper($this->getWrapper());
        $copyObj->setDeleted($this->getDeleted());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setVersionCreatedAt($this->getVersionCreatedAt());
        $copyObj->setVersionCreatedBy($this->getVersionCreatedBy());
        $copyObj->setWrapperVersion($this->getWrapperVersion());
        $copyObj->setPacMailTemplateIds($this->getPacMailTemplateIds());
        $copyObj->setPacMailTemplateVersions($this->getPacMailTemplateVersions());

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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion Clone of current object.
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object.
     *
     * @param                  ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate $v
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacMailTemplate(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate $v = null)
    {
        if ($v === null) {
            $this->setIdMailTemplate(NULL);
        } else {
            $this->setIdMailTemplate($v->getIdMailTemplate());
        }

        $this->aPacMailTemplate = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object, it will not be re-added.
        if ($v !== null) {
            $v->addPacMailTemplateVersion($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate The associated ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object.
     * @throws PropelException
     */
    public function getPacMailTemplate(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacMailTemplate === null && ($this->id_mail_template !== null) && $doQuery) {
            $this->aPacMailTemplate = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery::create()->findPk($this->id_mail_template, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacMailTemplate->addPacMailTemplateVersions($this);
             */
        }

        return $this->aPacMailTemplate;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_mail_template = null;
        $this->name = null;
        $this->subject = null;
        $this->sender = null;
        $this->sender_name = null;
        $this->text = null;
        $this->html = null;
        $this->date_interval = null;
        $this->wrapper = null;
        $this->deleted = null;
        $this->version = null;
        $this->version_created_at = null;
        $this->version_created_by = null;
        $this->wrapper_version = null;
        $this->pac_mail_template_ids = null;
        $this->pac_mail_template_ids_unserialized = null;
        $this->pac_mail_template_versions = null;
        $this->pac_mail_template_versions_unserialized = null;
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
            if ($this->aPacMailTemplate instanceof Persistent) {
              $this->aPacMailTemplate->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPacMailTemplate = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DEFAULT_STRING_FORMAT);
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
