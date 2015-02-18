<?php


/**
 * Base class that represents a row from the 'pac_cms_page' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPage extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_cms_page field.
     * @var        int
     */
    protected $id_cms_page;

    /**
     * The value for the fk_cms_template field.
     * @var        int
     */
    protected $fk_cms_template;

    /**
     * The value for the fk_cms_layout field.
     * @var        int
     */
    protected $fk_cms_layout;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the url field.
     * @var        string
     */
    protected $url;

    /**
     * The value for the status field.
     * Note: this column has a database default value of: 2
     * @var        int
     */
    protected $status;

    /**
     * The value for the hash field.
     * @var        string
     */
    protected $hash;

    /**
     * The value for the is_deleted field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_deleted;

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
     * @var        PacCmsTemplate
     */
    protected $aPacCmsTemplate;

    /**
     * @var        PacCmsLayout
     */
    protected $aPacCmsLayout;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects.
     */
    protected $collPacCmsPageBlocks;
    protected $collPacCmsPageBlocksPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects.
     */
    protected $collPacCmsPageAttributeValues;
    protected $collPacCmsPageAttributeValuesPartial;

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
    protected $pacCmsPageBlocksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pacCmsPageAttributeValuesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->status = 2;
        $this->is_deleted = false;
    }

    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsPage object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_cms_page] column value.
     *
     * @return int
     */
    public function getIdCmsPage()
    {

        return $this->id_cms_page;
    }

    /**
     * Get the [fk_cms_template] column value.
     *
     * @return int
     */
    public function getFkCmsTemplate()
    {

        return $this->fk_cms_template;
    }

    /**
     * Get the [fk_cms_layout] column value.
     *
     * @return int
     */
    public function getFkCmsLayout()
    {

        return $this->fk_cms_layout;
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
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {

        return $this->url;
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     * @throws PropelException - if the stored enum key is unknown.
     */
    public function getStatus()
    {
        if (null === $this->status) {
            return null;
        }
        $valueSet = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getValueSet(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS);
        if (!isset($valueSet[$this->status])) {
            throw new PropelException('Unknown stored enum key: ' . $this->status);
        }

        return $valueSet[$this->status];
    }

    /**
     * Get the [hash] column value.
     *
     * @return string
     */
    public function getHash()
    {

        return $this->hash;
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
     * Set the value of [id_cms_page] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setIdCmsPage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_cms_page !== $v) {
            $this->id_cms_page = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE;
        }


        return $this;
    } // setIdCmsPage()

    /**
     * Set the value of [fk_cms_template] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setFkCmsTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_cms_template !== $v) {
            $this->fk_cms_template = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE;
        }

        if ($this->aPacCmsTemplate !== null && $this->aPacCmsTemplate->getIdCmsTemplate() !== $v) {
            $this->aPacCmsTemplate = null;
        }


        return $this;
    } // setFkCmsTemplate()

    /**
     * Set the value of [fk_cms_layout] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setFkCmsLayout($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_cms_layout !== $v) {
            $this->fk_cms_layout = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT;
        }

        if ($this->aPacCmsLayout !== null && $this->aPacCmsLayout->getIdCmsLayout() !== $v) {
            $this->aPacCmsLayout = null;
        }


        return $this;
    } // setFkCmsLayout()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [url] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::URL;
        }


        return $this;
    } // setUrl()

    /**
     * Set the value of [status] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getValueSet(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [hash] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setHash($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->hash !== $v) {
            $this->hash = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::HASH;
        }


        return $this;
    } // setHash()

    /**
     * Sets the value of the [is_deleted] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::IS_DELETED;
        }


        return $this;
    } // setIsDeleted()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT;
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
            if ($this->status !== 2) {
                return false;
            }

            if ($this->is_deleted !== false) {
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

            $this->id_cms_page = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_cms_template = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_cms_layout = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->url = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->status = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->hash = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->is_deleted = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->created_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->updated_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 10; // 10 = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage object", $e);
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

        if ($this->aPacCmsTemplate !== null && $this->fk_cms_template !== $this->aPacCmsTemplate->getIdCmsTemplate()) {
            $this->aPacCmsTemplate = null;
        }
        if ($this->aPacCmsLayout !== null && $this->fk_cms_layout !== $this->aPacCmsLayout->getIdCmsLayout()) {
            $this->aPacCmsLayout = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPacCmsTemplate = null;
            $this->aPacCmsLayout = null;
            $this->collPacCmsPageBlocks = null;

            $this->collPacCmsPageAttributeValues = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT)) {
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

                ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::addInstanceToPool($this);
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

            if ($this->aPacCmsTemplate !== null) {
                if ($this->aPacCmsTemplate->isModified() || $this->aPacCmsTemplate->isNew()) {
                    $affectedRows += $this->aPacCmsTemplate->save($con);
                }
                $this->setPacCmsTemplate($this->aPacCmsTemplate);
            }

            if ($this->aPacCmsLayout !== null) {
                if ($this->aPacCmsLayout->isModified() || $this->aPacCmsLayout->isNew()) {
                    $affectedRows += $this->aPacCmsLayout->save($con);
                }
                $this->setPacCmsLayout($this->aPacCmsLayout);
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

            if ($this->pacCmsPageBlocksScheduledForDeletion !== null) {
                if (!$this->pacCmsPageBlocksScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create()
                        ->filterByPrimaryKeys($this->pacCmsPageBlocksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacCmsPageBlocksScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsPageBlocks !== null) {
                foreach ($this->collPacCmsPageBlocks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pacCmsPageAttributeValuesScheduledForDeletion !== null) {
                if (!$this->pacCmsPageAttributeValuesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery::create()
                        ->filterByPrimaryKeys($this->pacCmsPageAttributeValuesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pacCmsPageAttributeValuesScheduledForDeletion = null;
                }
            }

            if ($this->collPacCmsPageAttributeValues !== null) {
                foreach ($this->collPacCmsPageAttributeValues as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE;
        if (null !== $this->id_cms_page) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE)) {
            $modifiedColumns[':p' . $index++]  = '`id_cms_page`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_cms_template`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT)) {
            $modifiedColumns[':p' . $index++]  = '`fk_cms_layout`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::URL)) {
            $modifiedColumns[':p' . $index++]  = '`url`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::HASH)) {
            $modifiedColumns[':p' . $index++]  = '`hash`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::IS_DELETED)) {
            $modifiedColumns[':p' . $index++]  = '`is_deleted`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_cms_page` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_cms_page`':
                        $stmt->bindValue($identifier, $this->id_cms_page, PDO::PARAM_INT);
                        break;
                    case '`fk_cms_template`':
                        $stmt->bindValue($identifier, $this->fk_cms_template, PDO::PARAM_INT);
                        break;
                    case '`fk_cms_layout`':
                        $stmt->bindValue($identifier, $this->fk_cms_layout, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`url`':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case '`hash`':
                        $stmt->bindValue($identifier, $this->hash, PDO::PARAM_STR);
                        break;
                    case '`is_deleted`':
                        $stmt->bindValue($identifier, (int) $this->is_deleted, PDO::PARAM_INT);
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
        $this->setIdCmsPage($pk);

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

            if ($this->aPacCmsTemplate !== null) {
                if (!$this->aPacCmsTemplate->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacCmsTemplate->getValidationFailures());
                }
            }

            if ($this->aPacCmsLayout !== null) {
                if (!$this->aPacCmsLayout->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPacCmsLayout->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPacCmsPageBlocks !== null) {
                    foreach ($this->collPacCmsPageBlocks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPacCmsPageAttributeValues !== null) {
                    foreach ($this->collPacCmsPageAttributeValues as $referrerFK) {
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
        $pos = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCmsPage();
                break;
            case 1:
                return $this->getFkCmsTemplate();
                break;
            case 2:
                return $this->getFkCmsLayout();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getUrl();
                break;
            case 5:
                return $this->getStatus();
                break;
            case 6:
                return $this->getHash();
                break;
            case 7:
                return $this->getIsDeleted();
                break;
            case 8:
                return $this->getCreatedAt();
                break;
            case 9:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCmsPage(),
            $keys[1] => $this->getFkCmsTemplate(),
            $keys[2] => $this->getFkCmsLayout(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getUrl(),
            $keys[5] => $this->getStatus(),
            $keys[6] => $this->getHash(),
            $keys[7] => $this->getIsDeleted(),
            $keys[8] => $this->getCreatedAt(),
            $keys[9] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPacCmsTemplate) {
                $result['PacCmsTemplate'] = $this->aPacCmsTemplate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPacCmsLayout) {
                $result['PacCmsLayout'] = $this->aPacCmsLayout->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPacCmsPageBlocks) {
                $result['PacCmsPageBlocks'] = $this->collPacCmsPageBlocks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPacCmsPageAttributeValues) {
                $result['PacCmsPageAttributeValues'] = $this->collPacCmsPageAttributeValues->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCmsPage($value);
                break;
            case 1:
                $this->setFkCmsTemplate($value);
                break;
            case 2:
                $this->setFkCmsLayout($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setUrl($value);
                break;
            case 5:
                $valueSet = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getValueSet(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setStatus($value);
                break;
            case 6:
                $this->setHash($value);
                break;
            case 7:
                $this->setIsDeleted($value);
                break;
            case 8:
                $this->setCreatedAt($value);
                break;
            case 9:
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
        $keys = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCmsPage($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCmsTemplate($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkCmsLayout($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUrl($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setHash($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsDeleted($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $this->id_cms_page);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_TEMPLATE, $this->fk_cms_template);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::FK_CMS_LAYOUT, $this->fk_cms_layout);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::NAME)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::URL)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::URL, $this->url);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::STATUS, $this->status);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::HASH)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::HASH, $this->hash);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::IS_DELETED)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::IS_DELETED, $this->is_deleted);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::ID_CMS_PAGE, $this->id_cms_page);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCmsPage();
    }

    /**
     * Generic method to set the primary key (id_cms_page column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCmsPage($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCmsPage();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCmsTemplate($this->getFkCmsTemplate());
        $copyObj->setFkCmsLayout($this->getFkCmsLayout());
        $copyObj->setName($this->getName());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setHash($this->getHash());
        $copyObj->setIsDeleted($this->getIsDeleted());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPacCmsPageBlocks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsPageBlock($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPacCmsPageAttributeValues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPacCmsPageAttributeValue($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCmsPage(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage Clone of current object.
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate object.
     *
     * @param                  ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate $v
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacCmsTemplate(ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate $v = null)
    {
        if ($v === null) {
            $this->setFkCmsTemplate(NULL);
        } else {
            $this->setFkCmsTemplate($v->getIdCmsTemplate());
        }

        $this->aPacCmsTemplate = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate object, it will not be re-added.
        if ($v !== null) {
            $v->addPacCmsPage($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate The associated ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate object.
     * @throws PropelException
     */
    public function getPacCmsTemplate(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacCmsTemplate === null && ($this->fk_cms_template !== null) && $doQuery) {
            $this->aPacCmsTemplate = ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplateQuery::create()->findPk($this->fk_cms_template, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacCmsTemplate->addPacCmsPages($this);
             */
        }

        return $this->aPacCmsTemplate;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout object.
     *
     * @param                  ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout $v
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPacCmsLayout(ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout $v = null)
    {
        if ($v === null) {
            $this->setFkCmsLayout(NULL);
        } else {
            $this->setFkCmsLayout($v->getIdCmsLayout());
        }

        $this->aPacCmsLayout = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout object, it will not be re-added.
        if ($v !== null) {
            $v->addPacCmsPage($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout The associated ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayout object.
     * @throws PropelException
     */
    public function getPacCmsLayout(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPacCmsLayout === null && ($this->fk_cms_layout !== null) && $doQuery) {
            $this->aPacCmsLayout = ProjectA_Zed_Cms_Persistence_Propel_PacCmsLayoutQuery::create()->findPk($this->fk_cms_layout, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPacCmsLayout->addPacCmsPages($this);
             */
        }

        return $this->aPacCmsLayout;
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
        if ('PacCmsPageBlock' == $relationName) {
            $this->initPacCmsPageBlocks();
        }
        if ('PacCmsPageAttributeValue' == $relationName) {
            $this->initPacCmsPageAttributeValues();
        }
    }

    /**
     * Clears out the collPacCmsPageBlocks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     * @see        addPacCmsPageBlocks()
     */
    public function clearPacCmsPageBlocks()
    {
        $this->collPacCmsPageBlocks = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsPageBlocksPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsPageBlocks collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsPageBlocks($v = true)
    {
        $this->collPacCmsPageBlocksPartial = $v;
    }

    /**
     * Initializes the collPacCmsPageBlocks collection.
     *
     * By default this just sets the collPacCmsPageBlocks collection to an empty array (like clearcollPacCmsPageBlocks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsPageBlocks($overrideExisting = true)
    {
        if (null !== $this->collPacCmsPageBlocks && !$overrideExisting) {
            return;
        }
        $this->collPacCmsPageBlocks = new PropelObjectCollection();
        $this->collPacCmsPageBlocks->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects
     * @throws PropelException
     */
    public function getPacCmsPageBlocks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPageBlocksPartial && !$this->isNew();
        if (null === $this->collPacCmsPageBlocks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPageBlocks) {
                // return empty collection
                $this->initPacCmsPageBlocks();
            } else {
                $collPacCmsPageBlocks = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria)
                    ->filterByPacCmsPage($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsPageBlocksPartial && count($collPacCmsPageBlocks)) {
                      $this->initPacCmsPageBlocks(false);

                      foreach ($collPacCmsPageBlocks as $obj) {
                        if (false == $this->collPacCmsPageBlocks->contains($obj)) {
                          $this->collPacCmsPageBlocks->append($obj);
                        }
                      }

                      $this->collPacCmsPageBlocksPartial = true;
                    }

                    $collPacCmsPageBlocks->getInternalIterator()->rewind();

                    return $collPacCmsPageBlocks;
                }

                if ($partial && $this->collPacCmsPageBlocks) {
                    foreach ($this->collPacCmsPageBlocks as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsPageBlocks[] = $obj;
                        }
                    }
                }

                $this->collPacCmsPageBlocks = $collPacCmsPageBlocks;
                $this->collPacCmsPageBlocksPartial = false;
            }
        }

        return $this->collPacCmsPageBlocks;
    }

    /**
     * Sets a collection of PacCmsPageBlock objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsPageBlocks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setPacCmsPageBlocks(PropelCollection $pacCmsPageBlocks, PropelPDO $con = null)
    {
        $pacCmsPageBlocksToDelete = $this->getPacCmsPageBlocks(new Criteria(), $con)->diff($pacCmsPageBlocks);


        $this->pacCmsPageBlocksScheduledForDeletion = $pacCmsPageBlocksToDelete;

        foreach ($pacCmsPageBlocksToDelete as $pacCmsPageBlockRemoved) {
            $pacCmsPageBlockRemoved->setPacCmsPage(null);
        }

        $this->collPacCmsPageBlocks = null;
        foreach ($pacCmsPageBlocks as $pacCmsPageBlock) {
            $this->addPacCmsPageBlock($pacCmsPageBlock);
        }

        $this->collPacCmsPageBlocks = $pacCmsPageBlocks;
        $this->collPacCmsPageBlocksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects.
     * @throws PropelException
     */
    public function countPacCmsPageBlocks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPageBlocksPartial && !$this->isNew();
        if (null === $this->collPacCmsPageBlocks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPageBlocks) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsPageBlocks());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacCmsPage($this)
                ->count($con);
        }

        return count($this->collPacCmsPageBlocks);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function addPacCmsPageBlock(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock $l)
    {
        if ($this->collPacCmsPageBlocks === null) {
            $this->initPacCmsPageBlocks();
            $this->collPacCmsPageBlocksPartial = true;
        }

        if (!in_array($l, $this->collPacCmsPageBlocks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsPageBlock($l);

            if ($this->pacCmsPageBlocksScheduledForDeletion and $this->pacCmsPageBlocksScheduledForDeletion->contains($l)) {
                $this->pacCmsPageBlocksScheduledForDeletion->remove($this->pacCmsPageBlocksScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsPageBlock $pacCmsPageBlock The pacCmsPageBlock object to add.
     */
    protected function doAddPacCmsPageBlock($pacCmsPageBlock)
    {
        $this->collPacCmsPageBlocks[]= $pacCmsPageBlock;
        $pacCmsPageBlock->setPacCmsPage($this);
    }

    /**
     * @param	PacCmsPageBlock $pacCmsPageBlock The pacCmsPageBlock object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function removePacCmsPageBlock($pacCmsPageBlock)
    {
        if ($this->getPacCmsPageBlocks()->contains($pacCmsPageBlock)) {
            $this->collPacCmsPageBlocks->remove($this->collPacCmsPageBlocks->search($pacCmsPageBlock));
            if (null === $this->pacCmsPageBlocksScheduledForDeletion) {
                $this->pacCmsPageBlocksScheduledForDeletion = clone $this->collPacCmsPageBlocks;
                $this->pacCmsPageBlocksScheduledForDeletion->clear();
            }
            $this->pacCmsPageBlocksScheduledForDeletion[]= clone $pacCmsPageBlock;
            $pacCmsPageBlock->setPacCmsPage(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsPage is new, it will return
     * an empty collection; or if this PacCmsPage has previously
     * been saved, it will retrieve related PacCmsPageBlocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsPage.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects
     */
    public function getPacCmsPageBlocksJoinPacCmsBlock($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria);
        $query->joinWith('PacCmsBlock', $join_behavior);

        return $this->getPacCmsPageBlocks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsPage is new, it will return
     * an empty collection; or if this PacCmsPage has previously
     * been saved, it will retrieve related PacCmsPageBlocks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsPage.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock objects
     */
    public function getPacCmsPageBlocksJoinPacCmsTemplatePartial($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery::create(null, $criteria);
        $query->joinWith('PacCmsTemplatePartial', $join_behavior);

        return $this->getPacCmsPageBlocks($query, $con);
    }

    /**
     * Clears out the collPacCmsPageAttributeValues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     * @see        addPacCmsPageAttributeValues()
     */
    public function clearPacCmsPageAttributeValues()
    {
        $this->collPacCmsPageAttributeValues = null; // important to set this to null since that means it is uninitialized
        $this->collPacCmsPageAttributeValuesPartial = null;

        return $this;
    }

    /**
     * reset is the collPacCmsPageAttributeValues collection loaded partially
     *
     * @return void
     */
    public function resetPartialPacCmsPageAttributeValues($v = true)
    {
        $this->collPacCmsPageAttributeValuesPartial = $v;
    }

    /**
     * Initializes the collPacCmsPageAttributeValues collection.
     *
     * By default this just sets the collPacCmsPageAttributeValues collection to an empty array (like clearcollPacCmsPageAttributeValues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPacCmsPageAttributeValues($overrideExisting = true)
    {
        if (null !== $this->collPacCmsPageAttributeValues && !$overrideExisting) {
            return;
        }
        $this->collPacCmsPageAttributeValues = new PropelObjectCollection();
        $this->collPacCmsPageAttributeValues->setModel('ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects
     * @throws PropelException
     */
    public function getPacCmsPageAttributeValues($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPageAttributeValuesPartial && !$this->isNew();
        if (null === $this->collPacCmsPageAttributeValues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPageAttributeValues) {
                // return empty collection
                $this->initPacCmsPageAttributeValues();
            } else {
                $collPacCmsPageAttributeValues = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery::create(null, $criteria)
                    ->filterByPacCmsPage($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPacCmsPageAttributeValuesPartial && count($collPacCmsPageAttributeValues)) {
                      $this->initPacCmsPageAttributeValues(false);

                      foreach ($collPacCmsPageAttributeValues as $obj) {
                        if (false == $this->collPacCmsPageAttributeValues->contains($obj)) {
                          $this->collPacCmsPageAttributeValues->append($obj);
                        }
                      }

                      $this->collPacCmsPageAttributeValuesPartial = true;
                    }

                    $collPacCmsPageAttributeValues->getInternalIterator()->rewind();

                    return $collPacCmsPageAttributeValues;
                }

                if ($partial && $this->collPacCmsPageAttributeValues) {
                    foreach ($this->collPacCmsPageAttributeValues as $obj) {
                        if ($obj->isNew()) {
                            $collPacCmsPageAttributeValues[] = $obj;
                        }
                    }
                }

                $this->collPacCmsPageAttributeValues = $collPacCmsPageAttributeValues;
                $this->collPacCmsPageAttributeValuesPartial = false;
            }
        }

        return $this->collPacCmsPageAttributeValues;
    }

    /**
     * Sets a collection of PacCmsPageAttributeValue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pacCmsPageAttributeValues A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function setPacCmsPageAttributeValues(PropelCollection $pacCmsPageAttributeValues, PropelPDO $con = null)
    {
        $pacCmsPageAttributeValuesToDelete = $this->getPacCmsPageAttributeValues(new Criteria(), $con)->diff($pacCmsPageAttributeValues);


        $this->pacCmsPageAttributeValuesScheduledForDeletion = $pacCmsPageAttributeValuesToDelete;

        foreach ($pacCmsPageAttributeValuesToDelete as $pacCmsPageAttributeValueRemoved) {
            $pacCmsPageAttributeValueRemoved->setPacCmsPage(null);
        }

        $this->collPacCmsPageAttributeValues = null;
        foreach ($pacCmsPageAttributeValues as $pacCmsPageAttributeValue) {
            $this->addPacCmsPageAttributeValue($pacCmsPageAttributeValue);
        }

        $this->collPacCmsPageAttributeValues = $pacCmsPageAttributeValues;
        $this->collPacCmsPageAttributeValuesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects.
     * @throws PropelException
     */
    public function countPacCmsPageAttributeValues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPacCmsPageAttributeValuesPartial && !$this->isNew();
        if (null === $this->collPacCmsPageAttributeValues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPacCmsPageAttributeValues) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPacCmsPageAttributeValues());
            }
            $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPacCmsPage($this)
                ->count($con);
        }

        return count($this->collPacCmsPageAttributeValues);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue object to this object
     * through the ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue $l ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function addPacCmsPageAttributeValue(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue $l)
    {
        if ($this->collPacCmsPageAttributeValues === null) {
            $this->initPacCmsPageAttributeValues();
            $this->collPacCmsPageAttributeValuesPartial = true;
        }

        if (!in_array($l, $this->collPacCmsPageAttributeValues->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPacCmsPageAttributeValue($l);

            if ($this->pacCmsPageAttributeValuesScheduledForDeletion and $this->pacCmsPageAttributeValuesScheduledForDeletion->contains($l)) {
                $this->pacCmsPageAttributeValuesScheduledForDeletion->remove($this->pacCmsPageAttributeValuesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PacCmsPageAttributeValue $pacCmsPageAttributeValue The pacCmsPageAttributeValue object to add.
     */
    protected function doAddPacCmsPageAttributeValue($pacCmsPageAttributeValue)
    {
        $this->collPacCmsPageAttributeValues[]= $pacCmsPageAttributeValue;
        $pacCmsPageAttributeValue->setPacCmsPage($this);
    }

    /**
     * @param	PacCmsPageAttributeValue $pacCmsPageAttributeValue The pacCmsPageAttributeValue object to remove.
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function removePacCmsPageAttributeValue($pacCmsPageAttributeValue)
    {
        if ($this->getPacCmsPageAttributeValues()->contains($pacCmsPageAttributeValue)) {
            $this->collPacCmsPageAttributeValues->remove($this->collPacCmsPageAttributeValues->search($pacCmsPageAttributeValue));
            if (null === $this->pacCmsPageAttributeValuesScheduledForDeletion) {
                $this->pacCmsPageAttributeValuesScheduledForDeletion = clone $this->collPacCmsPageAttributeValues;
                $this->pacCmsPageAttributeValuesScheduledForDeletion->clear();
            }
            $this->pacCmsPageAttributeValuesScheduledForDeletion[]= clone $pacCmsPageAttributeValue;
            $pacCmsPageAttributeValue->setPacCmsPage(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsPage is new, it will return
     * an empty collection; or if this PacCmsPage has previously
     * been saved, it will retrieve related PacCmsPageAttributeValues from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsPage.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue[] List of ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValue objects
     */
    public function getPacCmsPageAttributeValuesJoinPacCmsPageAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttributeValueQuery::create(null, $criteria);
        $query->joinWith('PacCmsPageAttribute', $join_behavior);

        return $this->getPacCmsPageAttributeValues($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_cms_page = null;
        $this->fk_cms_template = null;
        $this->fk_cms_layout = null;
        $this->name = null;
        $this->url = null;
        $this->status = null;
        $this->hash = null;
        $this->is_deleted = null;
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
            if ($this->collPacCmsPageBlocks) {
                foreach ($this->collPacCmsPageBlocks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPacCmsPageAttributeValues) {
                foreach ($this->collPacCmsPageAttributeValues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPacCmsTemplate instanceof Persistent) {
              $this->aPacCmsTemplate->clearAllReferences($deep);
            }
            if ($this->aPacCmsLayout instanceof Persistent) {
              $this->aPacCmsLayout->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPacCmsPageBlocks instanceof PropelCollection) {
            $this->collPacCmsPageBlocks->clearIterator();
        }
        $this->collPacCmsPageBlocks = null;
        if ($this->collPacCmsPageAttributeValues instanceof PropelCollection) {
            $this->collPacCmsPageAttributeValues->clearIterator();
        }
        $this->collPacCmsPageAttributeValues = null;
        $this->aPacCmsTemplate = null;
        $this->aPacCmsLayout = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_Propel_PacCmsPagePeer::UPDATED_AT;

        return $this;
    }

}
