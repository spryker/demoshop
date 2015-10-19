<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyCmsBlock as ChildSpyCmsBlock;
use Propel\SpyCmsBlockQuery as ChildSpyCmsBlockQuery;
use Propel\SpyCmsGlossaryKeyMapping as ChildSpyCmsGlossaryKeyMapping;
use Propel\SpyCmsGlossaryKeyMappingQuery as ChildSpyCmsGlossaryKeyMappingQuery;
use Propel\SpyCmsPage as ChildSpyCmsPage;
use Propel\SpyCmsPageQuery as ChildSpyCmsPageQuery;
use Propel\SpyCmsTemplate as ChildSpyCmsTemplate;
use Propel\SpyCmsTemplateQuery as ChildSpyCmsTemplateQuery;
use Propel\SpyUrl as ChildSpyUrl;
use Propel\SpyUrlQuery as ChildSpyUrlQuery;
use Propel\Map\SpyCmsPageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'spy_cms_page' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyCmsPage extends SpyCmsPage implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyCmsPageTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id_cms_page field.
     * @var        int
     */
    protected $id_cms_page;

    /**
     * The value for the fk_template field.
     * @var        int
     */
    protected $fk_template;

    /**
     * The value for the valid_from field.
     * @var        \DateTime
     */
    protected $valid_from;

    /**
     * The value for the valid_to field.
     * @var        \DateTime
     */
    protected $valid_to;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * @var        ChildSpyCmsTemplate
     */
    protected $aCmsTemplate;

    /**
     * @var        ObjectCollection|ChildSpyCmsGlossaryKeyMapping[] Collection to store aggregation of ChildSpyCmsGlossaryKeyMapping objects.
     */
    protected $collSpyCmsGlossaryKeyMappings;
    protected $collSpyCmsGlossaryKeyMappingsPartial;

    /**
     * @var        ObjectCollection|ChildSpyCmsBlock[] Collection to store aggregation of ChildSpyCmsBlock objects.
     */
    protected $collSpyCmsBlocks;
    protected $collSpyCmsBlocksPartial;

    /**
     * @var        ObjectCollection|ChildSpyUrl[] Collection to store aggregation of ChildSpyUrl objects.
     */
    protected $collSpyUrls;
    protected $collSpyUrlsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCmsGlossaryKeyMapping[]
     */
    protected $spyCmsGlossaryKeyMappingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCmsBlock[]
     */
    protected $spyCmsBlocksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyUrl[]
     */
    protected $spyUrlsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
    }

    /**
     * Initializes internal state of Propel\Base\SpyCmsPage object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>SpyCmsPage</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyCmsPage</code>, delegates to
     * <code>equals(SpyCmsPage)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|SpyCmsPage The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
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
     * Get the [fk_template] column value.
     *
     * @return int
     */
    public function getFkTemplate()
    {
        return $this->fk_template;
    }

    /**
     * Get the [optionally formatted] temporal [valid_from] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getValidFrom($format = NULL)
    {
        if ($format === null) {
            return $this->valid_from;
        } else {
            return $this->valid_from instanceof \DateTime ? $this->valid_from->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [valid_to] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getValidTo($format = NULL)
    {
        if ($format === null) {
            return $this->valid_to;
        } else {
            return $this->valid_to instanceof \DateTime ? $this->valid_to->format($format) : null;
        }
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
     * Get the [is_active] column value.
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->getIsActive();
    }

    /**
     * Set the value of [id_cms_page] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     */
    public function setIdCmsPage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_cms_page !== $v) {
            $this->id_cms_page = $v;
            $this->modifiedColumns[SpyCmsPageTableMap::COL_ID_CMS_PAGE] = true;
        }

        return $this;
    } // setIdCmsPage()

    /**
     * Set the value of [fk_template] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     */
    public function setFkTemplate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_template !== $v) {
            $this->fk_template = $v;
            $this->modifiedColumns[SpyCmsPageTableMap::COL_FK_TEMPLATE] = true;
        }

        if ($this->aCmsTemplate !== null && $this->aCmsTemplate->getIdCmsTemplate() !== $v) {
            $this->aCmsTemplate = null;
        }

        return $this;
    } // setFkTemplate()

    /**
     * Sets the value of [valid_from] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     */
    public function setValidFrom($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->valid_from !== null || $dt !== null) {
            if ($this->valid_from === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->valid_from->format("Y-m-d H:i:s")) {
                $this->valid_from = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyCmsPageTableMap::COL_VALID_FROM] = true;
            }
        } // if either are not null

        return $this;
    } // setValidFrom()

    /**
     * Sets the value of [valid_to] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     */
    public function setValidTo($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->valid_to !== null || $dt !== null) {
            if ($this->valid_to === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->valid_to->format("Y-m-d H:i:s")) {
                $this->valid_to = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyCmsPageTableMap::COL_VALID_TO] = true;
            }
        } // if either are not null

        return $this;
    } // setValidTo()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
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
            $this->modifiedColumns[SpyCmsPageTableMap::COL_IS_ACTIVE] = true;
        }

        return $this;
    } // setIsActive()

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

        // otherwise, everything was equal, so return TRUE
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
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyCmsPageTableMap::translateFieldName('IdCmsPage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_cms_page = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyCmsPageTableMap::translateFieldName('FkTemplate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_template = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyCmsPageTableMap::translateFieldName('ValidFrom', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->valid_from = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyCmsPageTableMap::translateFieldName('ValidTo', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->valid_to = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyCmsPageTableMap::translateFieldName('IsActive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_active = (null !== $col) ? (boolean) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = SpyCmsPageTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyCmsPage'), 0, $e);
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
        if ($this->aCmsTemplate !== null && $this->fk_template !== $this->aCmsTemplate->getIdCmsTemplate()) {
            $this->aCmsTemplate = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCmsPageTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyCmsPageQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCmsTemplate = null;
            $this->collSpyCmsGlossaryKeyMappings = null;

            $this->collSpyCmsBlocks = null;

            $this->collSpyUrls = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyCmsPage::setDeleted()
     * @see SpyCmsPage::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsPageTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyCmsPageQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsPageTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
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
                SpyCmsPageTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCmsTemplate !== null) {
                if ($this->aCmsTemplate->isModified() || $this->aCmsTemplate->isNew()) {
                    $affectedRows += $this->aCmsTemplate->save($con);
                }
                $this->setCmsTemplate($this->aCmsTemplate);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->spyCmsGlossaryKeyMappingsScheduledForDeletion !== null) {
                if (!$this->spyCmsGlossaryKeyMappingsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCmsGlossaryKeyMappingQuery::create()
                        ->filterByPrimaryKeys($this->spyCmsGlossaryKeyMappingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyCmsGlossaryKeyMappingsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyCmsGlossaryKeyMappings !== null) {
                foreach ($this->collSpyCmsGlossaryKeyMappings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyCmsBlocksScheduledForDeletion !== null) {
                if (!$this->spyCmsBlocksScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCmsBlockQuery::create()
                        ->filterByPrimaryKeys($this->spyCmsBlocksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyCmsBlocksScheduledForDeletion = null;
                }
            }

            if ($this->collSpyCmsBlocks !== null) {
                foreach ($this->collSpyCmsBlocks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyUrlsScheduledForDeletion !== null) {
                if (!$this->spyUrlsScheduledForDeletion->isEmpty()) {
                    \Propel\SpyUrlQuery::create()
                        ->filterByPrimaryKeys($this->spyUrlsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spyUrlsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyUrls !== null) {
                foreach ($this->collSpyUrls as $referrerFK) {
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
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[SpyCmsPageTableMap::COL_ID_CMS_PAGE] = true;
        if (null !== $this->id_cms_page) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyCmsPageTableMap::COL_ID_CMS_PAGE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_ID_CMS_PAGE)) {
            $modifiedColumns[':p' . $index++]  = 'id_cms_page';
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_FK_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_template';
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_VALID_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'valid_from';
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_VALID_TO)) {
            $modifiedColumns[':p' . $index++]  = 'valid_to';
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'is_active';
        }

        $sql = sprintf(
            'INSERT INTO spy_cms_page (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_cms_page':
                        $stmt->bindValue($identifier, $this->id_cms_page, PDO::PARAM_INT);
                        break;
                    case 'fk_template':
                        $stmt->bindValue($identifier, $this->fk_template, PDO::PARAM_INT);
                        break;
                    case 'valid_from':
                        $stmt->bindValue($identifier, $this->valid_from ? $this->valid_from->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'valid_to':
                        $stmt->bindValue($identifier, $this->valid_to ? $this->valid_to->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'is_active':
                        $stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_cms_page_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCmsPage($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_FIELDNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyCmsPageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdCmsPage();
                break;
            case 1:
                return $this->getFkTemplate();
                break;
            case 2:
                return $this->getValidFrom();
                break;
            case 3:
                return $this->getValidTo();
                break;
            case 4:
                return $this->getIsActive();
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
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['SpyCmsPage'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyCmsPage'][$this->hashCode()] = true;
        $keys = SpyCmsPageTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCmsPage(),
            $keys[1] => $this->getFkTemplate(),
            $keys[2] => $this->getValidFrom(),
            $keys[3] => $this->getValidTo(),
            $keys[4] => $this->getIsActive(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[2]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[2]];
            $result[$keys[2]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[3]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[3]];
            $result[$keys[3]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCmsTemplate) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCmsTemplate';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_cms_template';
                        break;
                    default:
                        $key = 'SpyCmsTemplate';
                }

                $result[$key] = $this->aCmsTemplate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpyCmsGlossaryKeyMappings) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCmsGlossaryKeyMappings';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_cms_glossary_key_mappings';
                        break;
                    default:
                        $key = 'SpyCmsGlossaryKeyMappings';
                }

                $result[$key] = $this->collSpyCmsGlossaryKeyMappings->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyCmsBlocks) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCmsBlocks';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_cms_blocks';
                        break;
                    default:
                        $key = 'SpyCmsBlocks';
                }

                $result[$key] = $this->collSpyCmsBlocks->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyUrls) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyUrls';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_urls';
                        break;
                    default:
                        $key = 'SpyUrls';
                }

                $result[$key] = $this->collSpyUrls->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_FIELDNAME.
     * @return $this|\Propel\SpyCmsPage
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyCmsPageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyCmsPage
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCmsPage($value);
                break;
            case 1:
                $this->setFkTemplate($value);
                break;
            case 2:
                $this->setValidFrom($value);
                break;
            case 3:
                $this->setValidTo($value);
                break;
            case 4:
                $this->setIsActive($value);
                break;
        } // switch()

        return $this;
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
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_FIELDNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_FIELDNAME)
    {
        $keys = SpyCmsPageTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCmsPage($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkTemplate($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setValidFrom($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setValidTo($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIsActive($arr[$keys[4]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_FIELDNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Propel\SpyCmsPage The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_FIELDNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SpyCmsPageTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyCmsPageTableMap::COL_ID_CMS_PAGE)) {
            $criteria->add(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $this->id_cms_page);
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_FK_TEMPLATE)) {
            $criteria->add(SpyCmsPageTableMap::COL_FK_TEMPLATE, $this->fk_template);
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_VALID_FROM)) {
            $criteria->add(SpyCmsPageTableMap::COL_VALID_FROM, $this->valid_from);
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_VALID_TO)) {
            $criteria->add(SpyCmsPageTableMap::COL_VALID_TO, $this->valid_to);
        }
        if ($this->isColumnModified(SpyCmsPageTableMap::COL_IS_ACTIVE)) {
            $criteria->add(SpyCmsPageTableMap::COL_IS_ACTIVE, $this->is_active);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildSpyCmsPageQuery::create();
        $criteria->add(SpyCmsPageTableMap::COL_ID_CMS_PAGE, $this->id_cms_page);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdCmsPage();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
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
     * @param       int $key Primary key.
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
     * @param      object $copyObj An object of \Propel\SpyCmsPage (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkTemplate($this->getFkTemplate());
        $copyObj->setValidFrom($this->getValidFrom());
        $copyObj->setValidTo($this->getValidTo());
        $copyObj->setIsActive($this->getIsActive());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyCmsGlossaryKeyMappings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyCmsGlossaryKeyMapping($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyCmsBlocks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyCmsBlock($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyUrls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyUrl($relObj->copy($deepCopy));
                }
            }

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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Propel\SpyCmsPage Clone of current object.
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
     * Declares an association between this object and a ChildSpyCmsTemplate object.
     *
     * @param  ChildSpyCmsTemplate $v
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCmsTemplate(ChildSpyCmsTemplate $v = null)
    {
        if ($v === null) {
            $this->setFkTemplate(NULL);
        } else {
            $this->setFkTemplate($v->getIdCmsTemplate());
        }

        $this->aCmsTemplate = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCmsTemplate object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyCmsPage($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCmsTemplate object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCmsTemplate The associated ChildSpyCmsTemplate object.
     * @throws PropelException
     */
    public function getCmsTemplate(ConnectionInterface $con = null)
    {
        if ($this->aCmsTemplate === null && ($this->fk_template !== null)) {
            $this->aCmsTemplate = ChildSpyCmsTemplateQuery::create()->findPk($this->fk_template, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCmsTemplate->addSpyCmsPages($this);
             */
        }

        return $this->aCmsTemplate;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('SpyCmsGlossaryKeyMapping' == $relationName) {
            return $this->initSpyCmsGlossaryKeyMappings();
        }
        if ('SpyCmsBlock' == $relationName) {
            return $this->initSpyCmsBlocks();
        }
        if ('SpyUrl' == $relationName) {
            return $this->initSpyUrls();
        }
    }

    /**
     * Clears out the collSpyCmsGlossaryKeyMappings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyCmsGlossaryKeyMappings()
     */
    public function clearSpyCmsGlossaryKeyMappings()
    {
        $this->collSpyCmsGlossaryKeyMappings = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyCmsGlossaryKeyMappings collection loaded partially.
     */
    public function resetPartialSpyCmsGlossaryKeyMappings($v = true)
    {
        $this->collSpyCmsGlossaryKeyMappingsPartial = $v;
    }

    /**
     * Initializes the collSpyCmsGlossaryKeyMappings collection.
     *
     * By default this just sets the collSpyCmsGlossaryKeyMappings collection to an empty array (like clearcollSpyCmsGlossaryKeyMappings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyCmsGlossaryKeyMappings($overrideExisting = true)
    {
        if (null !== $this->collSpyCmsGlossaryKeyMappings && !$overrideExisting) {
            return;
        }
        $this->collSpyCmsGlossaryKeyMappings = new ObjectCollection();
        $this->collSpyCmsGlossaryKeyMappings->setModel('\Propel\SpyCmsGlossaryKeyMapping');
    }

    /**
     * Gets an array of ChildSpyCmsGlossaryKeyMapping objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCmsPage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCmsGlossaryKeyMapping[] List of ChildSpyCmsGlossaryKeyMapping objects
     * @throws PropelException
     */
    public function getSpyCmsGlossaryKeyMappings(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyCmsGlossaryKeyMappingsPartial && !$this->isNew();
        if (null === $this->collSpyCmsGlossaryKeyMappings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyCmsGlossaryKeyMappings) {
                // return empty collection
                $this->initSpyCmsGlossaryKeyMappings();
            } else {
                $collSpyCmsGlossaryKeyMappings = ChildSpyCmsGlossaryKeyMappingQuery::create(null, $criteria)
                    ->filterByCmsPage($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyCmsGlossaryKeyMappingsPartial && count($collSpyCmsGlossaryKeyMappings)) {
                        $this->initSpyCmsGlossaryKeyMappings(false);

                        foreach ($collSpyCmsGlossaryKeyMappings as $obj) {
                            if (false == $this->collSpyCmsGlossaryKeyMappings->contains($obj)) {
                                $this->collSpyCmsGlossaryKeyMappings->append($obj);
                            }
                        }

                        $this->collSpyCmsGlossaryKeyMappingsPartial = true;
                    }

                    return $collSpyCmsGlossaryKeyMappings;
                }

                if ($partial && $this->collSpyCmsGlossaryKeyMappings) {
                    foreach ($this->collSpyCmsGlossaryKeyMappings as $obj) {
                        if ($obj->isNew()) {
                            $collSpyCmsGlossaryKeyMappings[] = $obj;
                        }
                    }
                }

                $this->collSpyCmsGlossaryKeyMappings = $collSpyCmsGlossaryKeyMappings;
                $this->collSpyCmsGlossaryKeyMappingsPartial = false;
            }
        }

        return $this->collSpyCmsGlossaryKeyMappings;
    }

    /**
     * Sets a collection of ChildSpyCmsGlossaryKeyMapping objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyCmsGlossaryKeyMappings A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCmsPage The current object (for fluent API support)
     */
    public function setSpyCmsGlossaryKeyMappings(Collection $spyCmsGlossaryKeyMappings, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCmsGlossaryKeyMapping[] $spyCmsGlossaryKeyMappingsToDelete */
        $spyCmsGlossaryKeyMappingsToDelete = $this->getSpyCmsGlossaryKeyMappings(new Criteria(), $con)->diff($spyCmsGlossaryKeyMappings);


        $this->spyCmsGlossaryKeyMappingsScheduledForDeletion = $spyCmsGlossaryKeyMappingsToDelete;

        foreach ($spyCmsGlossaryKeyMappingsToDelete as $spyCmsGlossaryKeyMappingRemoved) {
            $spyCmsGlossaryKeyMappingRemoved->setCmsPage(null);
        }

        $this->collSpyCmsGlossaryKeyMappings = null;
        foreach ($spyCmsGlossaryKeyMappings as $spyCmsGlossaryKeyMapping) {
            $this->addSpyCmsGlossaryKeyMapping($spyCmsGlossaryKeyMapping);
        }

        $this->collSpyCmsGlossaryKeyMappings = $spyCmsGlossaryKeyMappings;
        $this->collSpyCmsGlossaryKeyMappingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCmsGlossaryKeyMapping objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCmsGlossaryKeyMapping objects.
     * @throws PropelException
     */
    public function countSpyCmsGlossaryKeyMappings(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyCmsGlossaryKeyMappingsPartial && !$this->isNew();
        if (null === $this->collSpyCmsGlossaryKeyMappings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyCmsGlossaryKeyMappings) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyCmsGlossaryKeyMappings());
            }

            $query = ChildSpyCmsGlossaryKeyMappingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCmsPage($this)
                ->count($con);
        }

        return count($this->collSpyCmsGlossaryKeyMappings);
    }

    /**
     * Method called to associate a ChildSpyCmsGlossaryKeyMapping object to this object
     * through the ChildSpyCmsGlossaryKeyMapping foreign key attribute.
     *
     * @param  ChildSpyCmsGlossaryKeyMapping $l ChildSpyCmsGlossaryKeyMapping
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     */
    public function addSpyCmsGlossaryKeyMapping(ChildSpyCmsGlossaryKeyMapping $l)
    {
        if ($this->collSpyCmsGlossaryKeyMappings === null) {
            $this->initSpyCmsGlossaryKeyMappings();
            $this->collSpyCmsGlossaryKeyMappingsPartial = true;
        }

        if (!$this->collSpyCmsGlossaryKeyMappings->contains($l)) {
            $this->doAddSpyCmsGlossaryKeyMapping($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCmsGlossaryKeyMapping $spyCmsGlossaryKeyMapping The ChildSpyCmsGlossaryKeyMapping object to add.
     */
    protected function doAddSpyCmsGlossaryKeyMapping(ChildSpyCmsGlossaryKeyMapping $spyCmsGlossaryKeyMapping)
    {
        $this->collSpyCmsGlossaryKeyMappings[]= $spyCmsGlossaryKeyMapping;
        $spyCmsGlossaryKeyMapping->setCmsPage($this);
    }

    /**
     * @param  ChildSpyCmsGlossaryKeyMapping $spyCmsGlossaryKeyMapping The ChildSpyCmsGlossaryKeyMapping object to remove.
     * @return $this|ChildSpyCmsPage The current object (for fluent API support)
     */
    public function removeSpyCmsGlossaryKeyMapping(ChildSpyCmsGlossaryKeyMapping $spyCmsGlossaryKeyMapping)
    {
        if ($this->getSpyCmsGlossaryKeyMappings()->contains($spyCmsGlossaryKeyMapping)) {
            $pos = $this->collSpyCmsGlossaryKeyMappings->search($spyCmsGlossaryKeyMapping);
            $this->collSpyCmsGlossaryKeyMappings->remove($pos);
            if (null === $this->spyCmsGlossaryKeyMappingsScheduledForDeletion) {
                $this->spyCmsGlossaryKeyMappingsScheduledForDeletion = clone $this->collSpyCmsGlossaryKeyMappings;
                $this->spyCmsGlossaryKeyMappingsScheduledForDeletion->clear();
            }
            $this->spyCmsGlossaryKeyMappingsScheduledForDeletion[]= clone $spyCmsGlossaryKeyMapping;
            $spyCmsGlossaryKeyMapping->setCmsPage(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCmsPage is new, it will return
     * an empty collection; or if this SpyCmsPage has previously
     * been saved, it will retrieve related SpyCmsGlossaryKeyMappings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCmsPage.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCmsGlossaryKeyMapping[] List of ChildSpyCmsGlossaryKeyMapping objects
     */
    public function getSpyCmsGlossaryKeyMappingsJoinGlossaryKey(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCmsGlossaryKeyMappingQuery::create(null, $criteria);
        $query->joinWith('GlossaryKey', $joinBehavior);

        return $this->getSpyCmsGlossaryKeyMappings($query, $con);
    }

    /**
     * Clears out the collSpyCmsBlocks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyCmsBlocks()
     */
    public function clearSpyCmsBlocks()
    {
        $this->collSpyCmsBlocks = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyCmsBlocks collection loaded partially.
     */
    public function resetPartialSpyCmsBlocks($v = true)
    {
        $this->collSpyCmsBlocksPartial = $v;
    }

    /**
     * Initializes the collSpyCmsBlocks collection.
     *
     * By default this just sets the collSpyCmsBlocks collection to an empty array (like clearcollSpyCmsBlocks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyCmsBlocks($overrideExisting = true)
    {
        if (null !== $this->collSpyCmsBlocks && !$overrideExisting) {
            return;
        }
        $this->collSpyCmsBlocks = new ObjectCollection();
        $this->collSpyCmsBlocks->setModel('\Propel\SpyCmsBlock');
    }

    /**
     * Gets an array of ChildSpyCmsBlock objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCmsPage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCmsBlock[] List of ChildSpyCmsBlock objects
     * @throws PropelException
     */
    public function getSpyCmsBlocks(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyCmsBlocksPartial && !$this->isNew();
        if (null === $this->collSpyCmsBlocks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyCmsBlocks) {
                // return empty collection
                $this->initSpyCmsBlocks();
            } else {
                $collSpyCmsBlocks = ChildSpyCmsBlockQuery::create(null, $criteria)
                    ->filterBySpyCmsPage($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyCmsBlocksPartial && count($collSpyCmsBlocks)) {
                        $this->initSpyCmsBlocks(false);

                        foreach ($collSpyCmsBlocks as $obj) {
                            if (false == $this->collSpyCmsBlocks->contains($obj)) {
                                $this->collSpyCmsBlocks->append($obj);
                            }
                        }

                        $this->collSpyCmsBlocksPartial = true;
                    }

                    return $collSpyCmsBlocks;
                }

                if ($partial && $this->collSpyCmsBlocks) {
                    foreach ($this->collSpyCmsBlocks as $obj) {
                        if ($obj->isNew()) {
                            $collSpyCmsBlocks[] = $obj;
                        }
                    }
                }

                $this->collSpyCmsBlocks = $collSpyCmsBlocks;
                $this->collSpyCmsBlocksPartial = false;
            }
        }

        return $this->collSpyCmsBlocks;
    }

    /**
     * Sets a collection of ChildSpyCmsBlock objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyCmsBlocks A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCmsPage The current object (for fluent API support)
     */
    public function setSpyCmsBlocks(Collection $spyCmsBlocks, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCmsBlock[] $spyCmsBlocksToDelete */
        $spyCmsBlocksToDelete = $this->getSpyCmsBlocks(new Criteria(), $con)->diff($spyCmsBlocks);


        $this->spyCmsBlocksScheduledForDeletion = $spyCmsBlocksToDelete;

        foreach ($spyCmsBlocksToDelete as $spyCmsBlockRemoved) {
            $spyCmsBlockRemoved->setSpyCmsPage(null);
        }

        $this->collSpyCmsBlocks = null;
        foreach ($spyCmsBlocks as $spyCmsBlock) {
            $this->addSpyCmsBlock($spyCmsBlock);
        }

        $this->collSpyCmsBlocks = $spyCmsBlocks;
        $this->collSpyCmsBlocksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCmsBlock objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCmsBlock objects.
     * @throws PropelException
     */
    public function countSpyCmsBlocks(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyCmsBlocksPartial && !$this->isNew();
        if (null === $this->collSpyCmsBlocks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyCmsBlocks) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyCmsBlocks());
            }

            $query = ChildSpyCmsBlockQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyCmsPage($this)
                ->count($con);
        }

        return count($this->collSpyCmsBlocks);
    }

    /**
     * Method called to associate a ChildSpyCmsBlock object to this object
     * through the ChildSpyCmsBlock foreign key attribute.
     *
     * @param  ChildSpyCmsBlock $l ChildSpyCmsBlock
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     */
    public function addSpyCmsBlock(ChildSpyCmsBlock $l)
    {
        if ($this->collSpyCmsBlocks === null) {
            $this->initSpyCmsBlocks();
            $this->collSpyCmsBlocksPartial = true;
        }

        if (!$this->collSpyCmsBlocks->contains($l)) {
            $this->doAddSpyCmsBlock($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCmsBlock $spyCmsBlock The ChildSpyCmsBlock object to add.
     */
    protected function doAddSpyCmsBlock(ChildSpyCmsBlock $spyCmsBlock)
    {
        $this->collSpyCmsBlocks[]= $spyCmsBlock;
        $spyCmsBlock->setSpyCmsPage($this);
    }

    /**
     * @param  ChildSpyCmsBlock $spyCmsBlock The ChildSpyCmsBlock object to remove.
     * @return $this|ChildSpyCmsPage The current object (for fluent API support)
     */
    public function removeSpyCmsBlock(ChildSpyCmsBlock $spyCmsBlock)
    {
        if ($this->getSpyCmsBlocks()->contains($spyCmsBlock)) {
            $pos = $this->collSpyCmsBlocks->search($spyCmsBlock);
            $this->collSpyCmsBlocks->remove($pos);
            if (null === $this->spyCmsBlocksScheduledForDeletion) {
                $this->spyCmsBlocksScheduledForDeletion = clone $this->collSpyCmsBlocks;
                $this->spyCmsBlocksScheduledForDeletion->clear();
            }
            $this->spyCmsBlocksScheduledForDeletion[]= clone $spyCmsBlock;
            $spyCmsBlock->setSpyCmsPage(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyUrls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyUrls()
     */
    public function clearSpyUrls()
    {
        $this->collSpyUrls = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyUrls collection loaded partially.
     */
    public function resetPartialSpyUrls($v = true)
    {
        $this->collSpyUrlsPartial = $v;
    }

    /**
     * Initializes the collSpyUrls collection.
     *
     * By default this just sets the collSpyUrls collection to an empty array (like clearcollSpyUrls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyUrls($overrideExisting = true)
    {
        if (null !== $this->collSpyUrls && !$overrideExisting) {
            return;
        }
        $this->collSpyUrls = new ObjectCollection();
        $this->collSpyUrls->setModel('\Propel\SpyUrl');
    }

    /**
     * Gets an array of ChildSpyUrl objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCmsPage is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     * @throws PropelException
     */
    public function getSpyUrls(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUrlsPartial && !$this->isNew();
        if (null === $this->collSpyUrls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyUrls) {
                // return empty collection
                $this->initSpyUrls();
            } else {
                $collSpyUrls = ChildSpyUrlQuery::create(null, $criteria)
                    ->filterByCmsPage($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyUrlsPartial && count($collSpyUrls)) {
                        $this->initSpyUrls(false);

                        foreach ($collSpyUrls as $obj) {
                            if (false == $this->collSpyUrls->contains($obj)) {
                                $this->collSpyUrls->append($obj);
                            }
                        }

                        $this->collSpyUrlsPartial = true;
                    }

                    return $collSpyUrls;
                }

                if ($partial && $this->collSpyUrls) {
                    foreach ($this->collSpyUrls as $obj) {
                        if ($obj->isNew()) {
                            $collSpyUrls[] = $obj;
                        }
                    }
                }

                $this->collSpyUrls = $collSpyUrls;
                $this->collSpyUrlsPartial = false;
            }
        }

        return $this->collSpyUrls;
    }

    /**
     * Sets a collection of ChildSpyUrl objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyUrls A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCmsPage The current object (for fluent API support)
     */
    public function setSpyUrls(Collection $spyUrls, ConnectionInterface $con = null)
    {
        /** @var ChildSpyUrl[] $spyUrlsToDelete */
        $spyUrlsToDelete = $this->getSpyUrls(new Criteria(), $con)->diff($spyUrls);


        $this->spyUrlsScheduledForDeletion = $spyUrlsToDelete;

        foreach ($spyUrlsToDelete as $spyUrlRemoved) {
            $spyUrlRemoved->setCmsPage(null);
        }

        $this->collSpyUrls = null;
        foreach ($spyUrls as $spyUrl) {
            $this->addSpyUrl($spyUrl);
        }

        $this->collSpyUrls = $spyUrls;
        $this->collSpyUrlsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyUrl objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyUrl objects.
     * @throws PropelException
     */
    public function countSpyUrls(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyUrlsPartial && !$this->isNew();
        if (null === $this->collSpyUrls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyUrls) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyUrls());
            }

            $query = ChildSpyUrlQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCmsPage($this)
                ->count($con);
        }

        return count($this->collSpyUrls);
    }

    /**
     * Method called to associate a ChildSpyUrl object to this object
     * through the ChildSpyUrl foreign key attribute.
     *
     * @param  ChildSpyUrl $l ChildSpyUrl
     * @return $this|\Propel\SpyCmsPage The current object (for fluent API support)
     */
    public function addSpyUrl(ChildSpyUrl $l)
    {
        if ($this->collSpyUrls === null) {
            $this->initSpyUrls();
            $this->collSpyUrlsPartial = true;
        }

        if (!$this->collSpyUrls->contains($l)) {
            $this->doAddSpyUrl($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyUrl $spyUrl The ChildSpyUrl object to add.
     */
    protected function doAddSpyUrl(ChildSpyUrl $spyUrl)
    {
        $this->collSpyUrls[]= $spyUrl;
        $spyUrl->setCmsPage($this);
    }

    /**
     * @param  ChildSpyUrl $spyUrl The ChildSpyUrl object to remove.
     * @return $this|ChildSpyCmsPage The current object (for fluent API support)
     */
    public function removeSpyUrl(ChildSpyUrl $spyUrl)
    {
        if ($this->getSpyUrls()->contains($spyUrl)) {
            $pos = $this->collSpyUrls->search($spyUrl);
            $this->collSpyUrls->remove($pos);
            if (null === $this->spyUrlsScheduledForDeletion) {
                $this->spyUrlsScheduledForDeletion = clone $this->collSpyUrls;
                $this->spyUrlsScheduledForDeletion->clear();
            }
            $this->spyUrlsScheduledForDeletion[]= $spyUrl;
            $spyUrl->setCmsPage(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCmsPage is new, it will return
     * an empty collection; or if this SpyCmsPage has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCmsPage.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyCategoryNode(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyCategoryNode', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCmsPage is new, it will return
     * an empty collection; or if this SpyCmsPage has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCmsPage.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyProduct(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyProduct', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCmsPage is new, it will return
     * an empty collection; or if this SpyCmsPage has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCmsPage.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyLocale(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyLocale', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCmsPage is new, it will return
     * an empty collection; or if this SpyCmsPage has previously
     * been saved, it will retrieve related SpyUrls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCmsPage.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyUrl[] List of ChildSpyUrl objects
     */
    public function getSpyUrlsJoinSpyRedirect(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyUrlQuery::create(null, $criteria);
        $query->joinWith('SpyRedirect', $joinBehavior);

        return $this->getSpyUrls($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCmsTemplate) {
            $this->aCmsTemplate->removeSpyCmsPage($this);
        }
        $this->id_cms_page = null;
        $this->fk_template = null;
        $this->valid_from = null;
        $this->valid_to = null;
        $this->is_active = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collSpyCmsGlossaryKeyMappings) {
                foreach ($this->collSpyCmsGlossaryKeyMappings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyCmsBlocks) {
                foreach ($this->collSpyCmsBlocks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyUrls) {
                foreach ($this->collSpyUrls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyCmsGlossaryKeyMappings = null;
        $this->collSpyCmsBlocks = null;
        $this->collSpyUrls = null;
        $this->aCmsTemplate = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyCmsPageTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
