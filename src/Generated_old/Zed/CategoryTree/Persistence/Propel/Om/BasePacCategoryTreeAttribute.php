<?php


/**
 * Base class that represents a row from the 'pac_category_tree_attribute' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.om
 */
abstract class Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryTreeAttribute extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_category_attribute field.
     * @var        int
     */
    protected $id_category_attribute;

    /**
     * The value for the fk_category field.
     * @var        int
     */
    protected $fk_category;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the locale_id field.
     * @var        int
     */
    protected $locale_id;

    /**
     * The value for the url_key field.
     * @var        string
     */
    protected $url_key;

    /**
     * The value for the meta_title field.
     * @var        string
     */
    protected $meta_title;

    /**
     * The value for the meta_description field.
     * @var        string
     */
    protected $meta_description;

    /**
     * The value for the meta_keywords field.
     * @var        string
     */
    protected $meta_keywords;

    /**
     * The value for the category_image_name field.
     * @var        string
     */
    protected $category_image_name;

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
     * @var        PacLocale
     */
    protected $aLocale;

    /**
     * @var        PacCategoryTree
     */
    protected $aCategory;

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
     * Get the [id_category_attribute] column value.
     *
     * @return int
     */
    public function getIdCategoryAttribute()
    {

        return $this->id_category_attribute;
    }

    /**
     * Get the [fk_category] column value.
     *
     * @return int
     */
    public function getFkCategory()
    {

        return $this->fk_category;
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
     * Get the [locale_id] column value.
     *
     * @return int
     */
    public function getLocaleId()
    {

        return $this->locale_id;
    }

    /**
     * Get the [url_key] column value.
     *
     * @return string
     */
    public function getUrlKey()
    {

        return $this->url_key;
    }

    /**
     * Get the [meta_title] column value.
     *
     * @return string
     */
    public function getMetaTitle()
    {

        return $this->meta_title;
    }

    /**
     * Get the [meta_description] column value.
     *
     * @return string
     */
    public function getMetaDescription()
    {

        return $this->meta_description;
    }

    /**
     * Get the [meta_keywords] column value.
     *
     * @return string
     */
    public function getMetaKeywords()
    {

        return $this->meta_keywords;
    }

    /**
     * Get the [category_image_name] column value.
     *
     * @return string
     */
    public function getCategoryImageName()
    {

        return $this->category_image_name;
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
     * Set the value of [id_category_attribute] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setIdCategoryAttribute($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_category_attribute !== $v) {
            $this->id_category_attribute = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE;
        }


        return $this;
    } // setIdCategoryAttribute()

    /**
     * Set the value of [fk_category] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setFkCategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_category !== $v) {
            $this->fk_category = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY;
        }

        if ($this->aCategory !== null && $this->aCategory->getIdCategory() !== $v) {
            $this->aCategory = null;
        }


        return $this;
    } // setFkCategory()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [locale_id] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setLocaleId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->locale_id !== $v) {
            $this->locale_id = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID;
        }

        if ($this->aLocale !== null && $this->aLocale->getIdLocale() !== $v) {
            $this->aLocale = null;
        }


        return $this;
    } // setLocaleId()

    /**
     * Set the value of [url_key] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setUrlKey($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->url_key !== $v) {
            $this->url_key = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::URL_KEY;
        }


        return $this;
    } // setUrlKey()

    /**
     * Set the value of [meta_title] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setMetaTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->meta_title !== $v) {
            $this->meta_title = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_TITLE;
        }


        return $this;
    } // setMetaTitle()

    /**
     * Set the value of [meta_description] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setMetaDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->meta_description !== $v) {
            $this->meta_description = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_DESCRIPTION;
        }


        return $this;
    } // setMetaDescription()

    /**
     * Set the value of [meta_keywords] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setMetaKeywords($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->meta_keywords !== $v) {
            $this->meta_keywords = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_KEYWORDS;
        }


        return $this;
    } // setMetaKeywords()

    /**
     * Set the value of [category_image_name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setCategoryImageName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->category_image_name !== $v) {
            $this->category_image_name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CATEGORY_IMAGE_NAME;
        }


        return $this;
    } // setCategoryImageName()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT;
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
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_category_attribute = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_category = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->locale_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->url_key = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->meta_title = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->meta_description = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->meta_keywords = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->category_image_name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 11; // 11 = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute object", $e);
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

        if ($this->aCategory !== null && $this->fk_category !== $this->aCategory->getIdCategory()) {
            $this->aCategory = null;
        }
        if ($this->aLocale !== null && $this->locale_id !== $this->aLocale->getIdLocale()) {
            $this->aLocale = null;
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
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aLocale = null;
            $this->aCategory = null;
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
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT)) {
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

                ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::addInstanceToPool($this);
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

            if ($this->aLocale !== null) {
                if ($this->aLocale->isModified() || $this->aLocale->isNew()) {
                    $affectedRows += $this->aLocale->save($con);
                }
                $this->setLocale($this->aLocale);
            }

            if ($this->aCategory !== null) {
                if ($this->aCategory->isModified() || $this->aCategory->isNew()) {
                    $affectedRows += $this->aCategory->save($con);
                }
                $this->setCategory($this->aCategory);
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

        $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE;
        if (null !== $this->id_category_attribute) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE)) {
            $modifiedColumns[':p' . $index++]  = '`id_category_attribute`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`fk_category`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`locale_id`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::URL_KEY)) {
            $modifiedColumns[':p' . $index++]  = '`url_key`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`meta_title`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`meta_description`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_KEYWORDS)) {
            $modifiedColumns[':p' . $index++]  = '`meta_keywords`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CATEGORY_IMAGE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`category_image_name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_category_tree_attribute` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_category_attribute`':
                        $stmt->bindValue($identifier, $this->id_category_attribute, PDO::PARAM_INT);
                        break;
                    case '`fk_category`':
                        $stmt->bindValue($identifier, $this->fk_category, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`locale_id`':
                        $stmt->bindValue($identifier, $this->locale_id, PDO::PARAM_INT);
                        break;
                    case '`url_key`':
                        $stmt->bindValue($identifier, $this->url_key, PDO::PARAM_STR);
                        break;
                    case '`meta_title`':
                        $stmt->bindValue($identifier, $this->meta_title, PDO::PARAM_STR);
                        break;
                    case '`meta_description`':
                        $stmt->bindValue($identifier, $this->meta_description, PDO::PARAM_STR);
                        break;
                    case '`meta_keywords`':
                        $stmt->bindValue($identifier, $this->meta_keywords, PDO::PARAM_STR);
                        break;
                    case '`category_image_name`':
                        $stmt->bindValue($identifier, $this->category_image_name, PDO::PARAM_STR);
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
        $this->setIdCategoryAttribute($pk);

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

            if ($this->aLocale !== null) {
                if (!$this->aLocale->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLocale->getValidationFailures());
                }
            }

            if ($this->aCategory !== null) {
                if (!$this->aCategory->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCategory->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdCategoryAttribute();
                break;
            case 1:
                return $this->getFkCategory();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getLocaleId();
                break;
            case 4:
                return $this->getUrlKey();
                break;
            case 5:
                return $this->getMetaTitle();
                break;
            case 6:
                return $this->getMetaDescription();
                break;
            case 7:
                return $this->getMetaKeywords();
                break;
            case 8:
                return $this->getCategoryImageName();
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCategoryAttribute(),
            $keys[1] => $this->getFkCategory(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getLocaleId(),
            $keys[4] => $this->getUrlKey(),
            $keys[5] => $this->getMetaTitle(),
            $keys[6] => $this->getMetaDescription(),
            $keys[7] => $this->getMetaKeywords(),
            $keys[8] => $this->getCategoryImageName(),
            $keys[9] => $this->getCreatedAt(),
            $keys[10] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aLocale) {
                $result['Locale'] = $this->aLocale->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCategory) {
                $result['Category'] = $this->aCategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdCategoryAttribute($value);
                break;
            case 1:
                $this->setFkCategory($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setLocaleId($value);
                break;
            case 4:
                $this->setUrlKey($value);
                break;
            case 5:
                $this->setMetaTitle($value);
                break;
            case 6:
                $this->setMetaDescription($value);
                break;
            case 7:
                $this->setMetaKeywords($value);
                break;
            case 8:
                $this->setCategoryImageName($value);
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
        $keys = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdCategoryAttribute($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkCategory($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLocaleId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUrlKey($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMetaTitle($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMetaDescription($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMetaKeywords($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCategoryImageName($arr[$keys[8]]);
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
        $criteria = new Criteria(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $this->id_category_attribute);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::FK_CATEGORY, $this->fk_category);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::NAME)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::LOCALE_ID, $this->locale_id);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::URL_KEY)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::URL_KEY, $this->url_key);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_TITLE)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_TITLE, $this->meta_title);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_DESCRIPTION)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_DESCRIPTION, $this->meta_description);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_KEYWORDS)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::META_KEYWORDS, $this->meta_keywords);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CATEGORY_IMAGE_NAME)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CATEGORY_IMAGE_NAME, $this->category_image_name);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::ID_CATEGORY_ATTRIBUTE, $this->id_category_attribute);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCategoryAttribute();
    }

    /**
     * Generic method to set the primary key (id_category_attribute column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCategoryAttribute($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdCategoryAttribute();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkCategory($this->getFkCategory());
        $copyObj->setName($this->getName());
        $copyObj->setLocaleId($this->getLocaleId());
        $copyObj->setUrlKey($this->getUrlKey());
        $copyObj->setMetaTitle($this->getMetaTitle());
        $copyObj->setMetaDescription($this->getMetaDescription());
        $copyObj->setMetaKeywords($this->getMetaKeywords());
        $copyObj->setCategoryImageName($this->getCategoryImageName());
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
            $copyObj->setIdCategoryAttribute(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute Clone of current object.
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object.
     *
     * @param                  SprykerCore_Zed_Locale_Persistence_Propel_PacLocale $v
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLocale(SprykerCore_Zed_Locale_Persistence_Propel_PacLocale $v = null)
    {
        if ($v === null) {
            $this->setLocaleId(NULL);
        } else {
            $this->setLocaleId($v->getIdLocale());
        }

        $this->aLocale = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object, it will not be re-added.
        if ($v !== null) {
            $v->addPacCategoryTreeAttribute($this);
        }


        return $this;
    }


    /**
     * Get the associated SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale The associated SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object.
     * @throws PropelException
     */
    public function getLocale(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLocale === null && ($this->locale_id !== null) && $doQuery) {
            $this->aLocale = SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery::create()->findPk($this->locale_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLocale->addPacCategoryTreeAttributes($this);
             */
        }

        return $this->aLocale;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object.
     *
     * @param                  ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree $v
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategory(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree $v = null)
    {
        if ($v === null) {
            $this->setFkCategory(NULL);
        } else {
            $this->setFkCategory($v->getIdCategory());
        }

        $this->aCategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object, it will not be re-added.
        if ($v !== null) {
            $v->addAttribute($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree The associated ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object.
     * @throws PropelException
     */
    public function getCategory(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCategory === null && ($this->fk_category !== null) && $doQuery) {
            $this->aCategory = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery::create()->findPk($this->fk_category, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategory->addAttributes($this);
             */
        }

        return $this->aCategory;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_category_attribute = null;
        $this->fk_category = null;
        $this->name = null;
        $this->locale_id = null;
        $this->url_key = null;
        $this->meta_title = null;
        $this->meta_description = null;
        $this->meta_keywords = null;
        $this->category_image_name = null;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->aLocale instanceof Persistent) {
              $this->aLocale->clearAllReferences($deep);
            }
            if ($this->aCategory instanceof Persistent) {
              $this->aCategory->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aLocale = null;
        $this->aCategory = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributePeer::UPDATED_AT;

        return $this;
    }

}
