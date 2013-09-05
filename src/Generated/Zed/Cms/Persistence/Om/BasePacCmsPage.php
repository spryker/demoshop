<?php


/**
 * Base class that represents a row from the 'pac_cms_page' table.
 *
 *
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.om
 */
abstract class Generated_Zed_Cms_Persistence_Om_BasePacCmsPage extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Cms_Persistence_PacCmsPagePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Cms_Persistence_PacCmsPagePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_cms_page field.
     * @var        int
     */
    protected $id_cms_page;

    /**
     * The value for the fk_cms_page_type field.
     * @var        int
     */
    protected $fk_cms_page_type;

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
     * The value for the user field.
     * Note: this column has a database default value of: 'acl user'
     * @var        string
     */
    protected $user;

    /**
     * The value for the updated_from field.
     * @var        int
     */
    protected $updated_from;

    /**
     * The value for the version field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $version;

    /**
     * The value for the status field.
     * Note: this column has a database default value of: 2
     * @var        int
     */
    protected $status;

    /**
     * The value for the content field.
     * @var        string
     */
    protected $content;

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
     * @var        PacCmsPageType
     */
    protected $aPageType;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElementPage[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects.
     */
    protected $collElementPages;
    protected $collElementPagesPartial;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElement[] Collection to store aggregation of ProjectA_Zed_Cms_Persistence_PacCmsElement objects.
     */
    protected $collElements;

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
    protected $elementsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $elementPagesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->user = 'acl user';
        $this->version = 1;
        $this->status = 2;
    }

    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Om_BasePacCmsPage object.
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
     * Get the [fk_cms_page_type] column value.
     *
     * @return int
     */
    public function getFkCmsPageType()
    {
        return $this->fk_cms_page_type;
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
     * Get the [user] column value.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the [updated_from] column value.
     *
     * @return int
     */
    public function getUpdatedFrom()
    {
        return $this->updated_from;
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
        $valueSet = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getValueSet(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS);
        if (!isset($valueSet[$this->status])) {
            throw new PropelException('Unknown stored enum key: ' . $this->status);
        }

        return $valueSet[$this->status];
    }

    /**
     * Get the [content] column value.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
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
     * @param int $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setIdCmsPage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_cms_page !== $v) {
            $this->id_cms_page = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE;
        }


        return $this;
    } // setIdCmsPage()

    /**
     * Set the value of [fk_cms_page_type] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setFkCmsPageType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_cms_page_type !== $v) {
            $this->fk_cms_page_type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE;
        }

        if ($this->aPageType !== null && $this->aPageType->getIdCmsPageType() !== $v) {
            $this->aPageType = null;
        }


        return $this;
    } // setFkCmsPageType()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [url] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::URL;
        }


        return $this;
    } // setUrl()

    /**
     * Set the value of [user] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setUser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->user !== $v) {
            $this->user = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::USER;
        }


        return $this;
    } // setUser()

    /**
     * Set the value of [updated_from] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setUpdatedFrom($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->updated_from !== $v) {
            $this->updated_from = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_FROM;
        }


        return $this;
    } // setUpdatedFrom()

    /**
     * Set the value of [version] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setVersion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->version !== $v) {
            $this->version = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::VERSION;
        }


        return $this;
    } // setVersion()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     * @throws PropelException - if the value is not accepted by this enum.
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $valueSet = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getValueSet(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [content] column.
     *
     * @param string $v new value
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setContent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->content !== $v) {
            $this->content = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CONTENT;
        }


        return $this;
    } // setContent()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT;
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
            if ($this->user !== 'acl user') {
                return false;
            }

            if ($this->version !== 1) {
                return false;
            }

            if ($this->status !== 2) {
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

            $this->id_cms_page = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_cms_page_type = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->url = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->user = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->updated_from = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->version = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->status = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->content = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Cms_Persistence_PacCmsPage object", $e);
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

        if ($this->aPageType !== null && $this->fk_cms_page_type !== $this->aPageType->getIdCmsPageType()) {
            $this->aPageType = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPageType = null;
            $this->collElementPages = null;

            $this->collElements = null;
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Cms_Persistence_PacCmsPageQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT)) {
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

                ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::addInstanceToPool($this);
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

            if ($this->aPageType !== null) {
                if ($this->aPageType->isModified() || $this->aPageType->isNew()) {
                    $affectedRows += $this->aPageType->save($con);
                }
                $this->setPageType($this->aPageType);
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

            if ($this->elementsScheduledForDeletion !== null) {
                if (!$this->elementsScheduledForDeletion->isEmpty()) {
                    $pks = array();
                    $pk = $this->getPrimaryKey();
                    foreach ($this->elementsScheduledForDeletion->getPrimaryKeys(false) as $remotePk) {
                        $pks[] = array($pk, $remotePk);
                    }
                    ElementPageQuery::create()
                        ->filterByPrimaryKeys($pks)
                        ->delete($con);
                    $this->elementsScheduledForDeletion = null;
                }

                foreach ($this->getElements() as $element) {
                    if ($element->isModified()) {
                        $element->save($con);
                    }
                }
            } elseif ($this->collElements) {
                foreach ($this->collElements as $element) {
                    if ($element->isModified()) {
                        $element->save($con);
                    }
                }
            }

            if ($this->elementPagesScheduledForDeletion !== null) {
                if (!$this->elementPagesScheduledForDeletion->isEmpty()) {
                    ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery::create()
                        ->filterByPrimaryKeys($this->elementPagesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->elementPagesScheduledForDeletion = null;
                }
            }

            if ($this->collElementPages !== null) {
                foreach ($this->collElementPages as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE;
        if (null !== $this->id_cms_page) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE)) {
            $modifiedColumns[':p' . $index++]  = '`id_cms_page`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_cms_page_type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::URL)) {
            $modifiedColumns[':p' . $index++]  = '`url`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::USER)) {
            $modifiedColumns[':p' . $index++]  = '`user`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_FROM)) {
            $modifiedColumns[':p' . $index++]  = '`updated_from`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`version`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CONTENT)) {
            $modifiedColumns[':p' . $index++]  = '`content`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT)) {
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
                    case '`fk_cms_page_type`':
                        $stmt->bindValue($identifier, $this->fk_cms_page_type, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`url`':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case '`user`':
                        $stmt->bindValue($identifier, $this->user, PDO::PARAM_STR);
                        break;
                    case '`updated_from`':
                        $stmt->bindValue($identifier, $this->updated_from, PDO::PARAM_INT);
                        break;
                    case '`version`':
                        $stmt->bindValue($identifier, $this->version, PDO::PARAM_INT);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case '`content`':
                        $stmt->bindValue($identifier, $this->content, PDO::PARAM_STR);
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

            if ($this->aPageType !== null) {
                if (!$this->aPageType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPageType->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collElementPages !== null) {
                    foreach ($this->collElementPages as $referrerFK) {
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
        $pos = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getFkCmsPageType();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getUrl();
                break;
            case 4:
                return $this->getUser();
                break;
            case 5:
                return $this->getUpdatedFrom();
                break;
            case 6:
                return $this->getVersion();
                break;
            case 7:
                return $this->getStatus();
                break;
            case 8:
                return $this->getContent();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_PacCmsPage'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Cms_Persistence_PacCmsPage'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCmsPage(),
            $keys[1] => $this->getFkCmsPageType(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getUrl(),
            $keys[4] => $this->getUser(),
            $keys[5] => $this->getUpdatedFrom(),
            $keys[6] => $this->getVersion(),
            $keys[7] => $this->getStatus(),
            $keys[8] => $this->getContent(),
            $keys[9] => $this->getCreatedAt(),
            $keys[10] => $this->getUpdatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPageType) {
                $result['PageType'] = $this->aPageType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collElementPages) {
                $result['ElementPages'] = $this->collElementPages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setFkCmsPageType($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setUrl($value);
                break;
            case 4:
                $this->setUser($value);
                break;
            case 5:
                $this->setUpdatedFrom($value);
                break;
            case 6:
                $this->setVersion($value);
                break;
            case 7:
                $valueSet = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getValueSet(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setStatus($value);
                break;
            case 8:
                $this->setContent($value);
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
        $keys = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCmsPage($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCmsPageType($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUrl($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUser($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUpdatedFrom($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setVersion($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setContent($arr[$keys[8]]);
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
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $this->id_cms_page);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::FK_CMS_PAGE_TYPE, $this->fk_cms_page_type);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::NAME)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::URL)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::URL, $this->url);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::USER)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::USER, $this->user);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_FROM)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_FROM, $this->updated_from);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::VERSION)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::VERSION, $this->version);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::STATUS, $this->status);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CONTENT)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CONTENT, $this->content);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::ID_CMS_PAGE, $this->id_cms_page);

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
     * @param object $copyObj An object of ProjectA_Zed_Cms_Persistence_PacCmsPage (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCmsPageType($this->getFkCmsPageType());
        $copyObj->setName($this->getName());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setUser($this->getUser());
        $copyObj->setUpdatedFrom($this->getUpdatedFrom());
        $copyObj->setVersion($this->getVersion());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setContent($this->getContent());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getElementPages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addElementPage($relObj->copy($deepCopy));
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage Clone of current object.
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
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPagePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Cms_Persistence_PacCmsPagePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Cms_Persistence_PacCmsPageType object.
     *
     * @param             ProjectA_Zed_Cms_Persistence_PacCmsPageType $v
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPageType(ProjectA_Zed_Cms_Persistence_PacCmsPageType $v = null)
    {
        if ($v === null) {
            $this->setFkCmsPageType(NULL);
        } else {
            $this->setFkCmsPageType($v->getIdCmsPageType());
        }

        $this->aPageType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Cms_Persistence_PacCmsPageType object, it will not be re-added.
        if ($v !== null) {
            $v->addPage($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Cms_Persistence_PacCmsPageType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPageType The associated ProjectA_Zed_Cms_Persistence_PacCmsPageType object.
     * @throws PropelException
     */
    public function getPageType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPageType === null && ($this->fk_cms_page_type !== null) && $doQuery) {
            $this->aPageType = ProjectA_Zed_Cms_Persistence_PacCmsPageTypeQuery::create()->findPk($this->fk_cms_page_type, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPageType->addPages($this);
             */
        }

        return $this->aPageType;
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
        if ('ElementPage' == $relationName) {
            $this->initElementPages();
        }
    }

    /**
     * Clears out the collElementPages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     * @see        addElementPages()
     */
    public function clearElementPages()
    {
        $this->collElementPages = null; // important to set this to null since that means it is uninitialized
        $this->collElementPagesPartial = null;

        return $this;
    }

    /**
     * reset is the collElementPages collection loaded partially
     *
     * @return void
     */
    public function resetPartialElementPages($v = true)
    {
        $this->collElementPagesPartial = $v;
    }

    /**
     * Initializes the collElementPages collection.
     *
     * By default this just sets the collElementPages collection to an empty array (like clearcollElementPages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initElementPages($overrideExisting = true)
    {
        if (null !== $this->collElementPages && !$overrideExisting) {
            return;
        }
        $this->collElementPages = new PropelObjectCollection();
        $this->collElementPages->setModel('ProjectA_Zed_Cms_Persistence_PacCmsElementPage');
    }

    /**
     * Gets an array of ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_PacCmsPage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElementPage[] List of ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects
     * @throws PropelException
     */
    public function getElementPages($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collElementPagesPartial && !$this->isNew();
        if (null === $this->collElementPages || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collElementPages) {
                // return empty collection
                $this->initElementPages();
            } else {
                $collElementPages = ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery::create(null, $criteria)
                    ->filterByPage($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collElementPagesPartial && count($collElementPages)) {
                      $this->initElementPages(false);

                      foreach($collElementPages as $obj) {
                        if (false == $this->collElementPages->contains($obj)) {
                          $this->collElementPages->append($obj);
                        }
                      }

                      $this->collElementPagesPartial = true;
                    }

                    $collElementPages->getInternalIterator()->rewind();
                    return $collElementPages;
                }

                if($partial && $this->collElementPages) {
                    foreach($this->collElementPages as $obj) {
                        if($obj->isNew()) {
                            $collElementPages[] = $obj;
                        }
                    }
                }

                $this->collElementPages = $collElementPages;
                $this->collElementPagesPartial = false;
            }
        }

        return $this->collElementPages;
    }

    /**
     * Sets a collection of ElementPage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $elementPages A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setElementPages(PropelCollection $elementPages, PropelPDO $con = null)
    {
        $elementPagesToDelete = $this->getElementPages(new Criteria(), $con)->diff($elementPages);

        $this->elementPagesScheduledForDeletion = unserialize(serialize($elementPagesToDelete));

        foreach ($elementPagesToDelete as $elementPageRemoved) {
            $elementPageRemoved->setPage(null);
        }

        $this->collElementPages = null;
        foreach ($elementPages as $elementPage) {
            $this->addElementPage($elementPage);
        }

        $this->collElementPages = $elementPages;
        $this->collElementPagesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects.
     * @throws PropelException
     */
    public function countElementPages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collElementPagesPartial && !$this->isNew();
        if (null === $this->collElementPages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collElementPages) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getElementPages());
            }
            $query = ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPage($this)
                ->count($con);
        }

        return count($this->collElementPages);
    }

    /**
     * Method called to associate a ProjectA_Zed_Cms_Persistence_PacCmsElementPage object to this object
     * through the ProjectA_Zed_Cms_Persistence_PacCmsElementPage foreign key attribute.
     *
     * @param    ProjectA_Zed_Cms_Persistence_PacCmsElementPage $l ProjectA_Zed_Cms_Persistence_PacCmsElementPage
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function addElementPage(ProjectA_Zed_Cms_Persistence_PacCmsElementPage $l)
    {
        if ($this->collElementPages === null) {
            $this->initElementPages();
            $this->collElementPagesPartial = true;
        }
        if (!in_array($l, $this->collElementPages->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddElementPage($l);
        }

        return $this;
    }

    /**
     * @param	ElementPage $elementPage The elementPage object to add.
     */
    protected function doAddElementPage($elementPage)
    {
        $this->collElementPages[]= $elementPage;
        $elementPage->setPage($this);
    }

    /**
     * @param	ElementPage $elementPage The elementPage object to remove.
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function removeElementPage($elementPage)
    {
        if ($this->getElementPages()->contains($elementPage)) {
            $this->collElementPages->remove($this->collElementPages->search($elementPage));
            if (null === $this->elementPagesScheduledForDeletion) {
                $this->elementPagesScheduledForDeletion = clone $this->collElementPages;
                $this->elementPagesScheduledForDeletion->clear();
            }
            $this->elementPagesScheduledForDeletion[]= clone $elementPage;
            $elementPage->setPage(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacCmsPage is new, it will return
     * an empty collection; or if this PacCmsPage has previously
     * been saved, it will retrieve related ElementPages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacCmsPage.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElementPage[] List of ProjectA_Zed_Cms_Persistence_PacCmsElementPage objects
     */
    public function getElementPagesJoinElement($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Cms_Persistence_PacCmsElementPageQuery::create(null, $criteria);
        $query->joinWith('Element', $join_behavior);

        return $this->getElementPages($query, $con);
    }

    /**
     * Clears out the collElements collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     * @see        addElements()
     */
    public function clearElements()
    {
        $this->collElements = null; // important to set this to null since that means it is uninitialized
        $this->collElementsPartial = null;

        return $this;
    }

    /**
     * Initializes the collElements collection.
     *
     * By default this just sets the collElements collection to an empty collection (like clearElements());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @return void
     */
    public function initElements()
    {
        $this->collElements = new PropelObjectCollection();
        $this->collElements->setModel('ProjectA_Zed_Cms_Persistence_PacCmsElement');
    }

    /**
     * Gets a collection of ProjectA_Zed_Cms_Persistence_PacCmsElement objects related by a many-to-many relationship
     * to the current object by way of the pac_cms_element_page cross-reference table.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Cms_Persistence_PacCmsPage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param PropelPDO $con Optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_PacCmsElement[] List of ProjectA_Zed_Cms_Persistence_PacCmsElement objects
     */
    public function getElements($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collElements || null !== $criteria) {
            if ($this->isNew() && null === $this->collElements) {
                // return empty collection
                $this->initElements();
            } else {
                $collElements = ProjectA_Zed_Cms_Persistence_PacCmsElementQuery::create(null, $criteria)
                    ->filterByPage($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collElements;
                }
                $this->collElements = $collElements;
            }
        }

        return $this->collElements;
    }

    /**
     * Sets a collection of ProjectA_Zed_Cms_Persistence_PacCmsElement objects related by a many-to-many relationship
     * to the current object by way of the pac_cms_element_page cross-reference table.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $elements A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function setElements(PropelCollection $elements, PropelPDO $con = null)
    {
        $this->clearElements();
        $currentElements = $this->getElements();

        $this->elementsScheduledForDeletion = $currentElements->diff($elements);

        foreach ($elements as $element) {
            if (!$currentElements->contains($element)) {
                $this->doAddElement($element);
            }
        }

        $this->collElements = $elements;

        return $this;
    }

    /**
     * Gets the number of ProjectA_Zed_Cms_Persistence_PacCmsElement objects related by a many-to-many relationship
     * to the current object by way of the pac_cms_element_page cross-reference table.
     *
     * @param Criteria $criteria Optional query object to filter the query
     * @param boolean $distinct Set to true to force count distinct
     * @param PropelPDO $con Optional connection object
     *
     * @return int the number of related ProjectA_Zed_Cms_Persistence_PacCmsElement objects
     */
    public function countElements($criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collElements || null !== $criteria) {
            if ($this->isNew() && null === $this->collElements) {
                return 0;
            } else {
                $query = ProjectA_Zed_Cms_Persistence_PacCmsElementQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByPage($this)
                    ->count($con);
            }
        } else {
            return count($this->collElements);
        }
    }

    /**
     * Associate a ProjectA_Zed_Cms_Persistence_PacCmsElement object to this object
     * through the pac_cms_element_page cross reference table.
     *
     * @param  ProjectA_Zed_Cms_Persistence_PacCmsElement $pacCmsElement The ProjectA_Zed_Cms_Persistence_PacCmsElementPage object to relate
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function addElement(ProjectA_Zed_Cms_Persistence_PacCmsElement $pacCmsElement)
    {
        if ($this->collElements === null) {
            $this->initElements();
        }
        if (!$this->collElements->contains($pacCmsElement)) { // only add it if the **same** object is not already associated
            $this->doAddElement($pacCmsElement);

            $this->collElements[]= $pacCmsElement;
        }

        return $this;
    }

    /**
     * @param	Element $element The element object to add.
     */
    protected function doAddElement($element)
    {
        $pacCmsElementPage = new ProjectA_Zed_Cms_Persistence_PacCmsElementPage();
        $pacCmsElementPage->setElement($element);
        $this->addElementPage($pacCmsElementPage);
    }

    /**
     * Remove a ProjectA_Zed_Cms_Persistence_PacCmsElement object to this object
     * through the pac_cms_element_page cross reference table.
     *
     * @param ProjectA_Zed_Cms_Persistence_PacCmsElement $pacCmsElement The ProjectA_Zed_Cms_Persistence_PacCmsElementPage object to relate
     * @return ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function removeElement(ProjectA_Zed_Cms_Persistence_PacCmsElement $pacCmsElement)
    {
        if ($this->getElements()->contains($pacCmsElement)) {
            $this->collElements->remove($this->collElements->search($pacCmsElement));
            if (null === $this->elementsScheduledForDeletion) {
                $this->elementsScheduledForDeletion = clone $this->collElements;
                $this->elementsScheduledForDeletion->clear();
            }
            $this->elementsScheduledForDeletion[]= $pacCmsElement;
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_cms_page = null;
        $this->fk_cms_page_type = null;
        $this->name = null;
        $this->url = null;
        $this->user = null;
        $this->updated_from = null;
        $this->version = null;
        $this->status = null;
        $this->content = null;
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
            if ($this->collElementPages) {
                foreach ($this->collElementPages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collElements) {
                foreach ($this->collElements as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPageType instanceof Persistent) {
              $this->aPageType->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collElementPages instanceof PropelCollection) {
            $this->collElementPages->clearIterator();
        }
        $this->collElementPages = null;
        if ($this->collElements instanceof PropelCollection) {
            $this->collElements->clearIterator();
        }
        $this->collElements = null;
        $this->aPageType = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Cms_Persistence_PacCmsPage The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Cms_Persistence_PacCmsPagePeer::UPDATED_AT;

        return $this;
    }

}
