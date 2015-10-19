<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySearchDocumentAttribute as ChildSpySearchDocumentAttribute;
use Propel\SpySearchDocumentAttributeQuery as ChildSpySearchDocumentAttributeQuery;
use Propel\SpySearchPageElementQuery as ChildSpySearchPageElementQuery;
use Propel\SpySearchPageElementTemplate as ChildSpySearchPageElementTemplate;
use Propel\SpySearchPageElementTemplateQuery as ChildSpySearchPageElementTemplateQuery;
use Propel\Map\SpySearchPageElementTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'spy_search_page_element' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySearchPageElement extends SpySearchPageElement implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySearchPageElementTableMap';


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
     * The value for the id_search_page_element field.
     * @var        int
     */
    protected $id_search_page_element;

    /**
     * The value for the element_key field.
     * @var        string
     */
    protected $element_key;

    /**
     * The value for the is_element_active field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_element_active;

    /**
     * The value for the fk_search_document_attribute field.
     * @var        int
     */
    protected $fk_search_document_attribute;

    /**
     * The value for the fk_search_page_element_template field.
     * @var        int
     */
    protected $fk_search_page_element_template;

    /**
     * @var        ChildSpySearchDocumentAttribute
     */
    protected $aDocumentAttribute;

    /**
     * @var        ChildSpySearchPageElementTemplate
     */
    protected $aElementTemplate;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_element_active = false;
    }

    /**
     * Initializes internal state of Propel\Base\SpySearchPageElement object.
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
     * Compares this with another <code>SpySearchPageElement</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySearchPageElement</code>, delegates to
     * <code>equals(SpySearchPageElement)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpySearchPageElement The current object, for fluid interface
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
     * Get the [id_search_page_element] column value.
     *
     * @return int
     */
    public function getIdSearchPageElement()
    {
        return $this->id_search_page_element;
    }

    /**
     * Get the [element_key] column value.
     *
     * @return string
     */
    public function getElementKey()
    {
        return $this->element_key;
    }

    /**
     * Get the [is_element_active] column value.
     *
     * @return boolean
     */
    public function getIsElementActive()
    {
        return $this->is_element_active;
    }

    /**
     * Get the [is_element_active] column value.
     *
     * @return boolean
     */
    public function isElementActive()
    {
        return $this->getIsElementActive();
    }

    /**
     * Get the [fk_search_document_attribute] column value.
     *
     * @return int
     */
    public function getFkSearchDocumentAttribute()
    {
        return $this->fk_search_document_attribute;
    }

    /**
     * Get the [fk_search_page_element_template] column value.
     *
     * @return int
     */
    public function getFkSearchPageElementTemplate()
    {
        return $this->fk_search_page_element_template;
    }

    /**
     * Set the value of [id_search_page_element] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySearchPageElement The current object (for fluent API support)
     */
    public function setIdSearchPageElement($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_search_page_element !== $v) {
            $this->id_search_page_element = $v;
            $this->modifiedColumns[SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT] = true;
        }

        return $this;
    } // setIdSearchPageElement()

    /**
     * Set the value of [element_key] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySearchPageElement The current object (for fluent API support)
     */
    public function setElementKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->element_key !== $v) {
            $this->element_key = $v;
            $this->modifiedColumns[SpySearchPageElementTableMap::COL_ELEMENT_KEY] = true;
        }

        return $this;
    } // setElementKey()

    /**
     * Sets the value of the [is_element_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpySearchPageElement The current object (for fluent API support)
     */
    public function setIsElementActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_element_active !== $v) {
            $this->is_element_active = $v;
            $this->modifiedColumns[SpySearchPageElementTableMap::COL_IS_ELEMENT_ACTIVE] = true;
        }

        return $this;
    } // setIsElementActive()

    /**
     * Set the value of [fk_search_document_attribute] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySearchPageElement The current object (for fluent API support)
     */
    public function setFkSearchDocumentAttribute($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_search_document_attribute !== $v) {
            $this->fk_search_document_attribute = $v;
            $this->modifiedColumns[SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE] = true;
        }

        if ($this->aDocumentAttribute !== null && $this->aDocumentAttribute->getIdSearchDocumentAttribute() !== $v) {
            $this->aDocumentAttribute = null;
        }

        return $this;
    } // setFkSearchDocumentAttribute()

    /**
     * Set the value of [fk_search_page_element_template] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySearchPageElement The current object (for fluent API support)
     */
    public function setFkSearchPageElementTemplate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_search_page_element_template !== $v) {
            $this->fk_search_page_element_template = $v;
            $this->modifiedColumns[SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE] = true;
        }

        if ($this->aElementTemplate !== null && $this->aElementTemplate->getIdSearchPageElementTemplate() !== $v) {
            $this->aElementTemplate = null;
        }

        return $this;
    } // setFkSearchPageElementTemplate()

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
            if ($this->is_element_active !== false) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySearchPageElementTableMap::translateFieldName('IdSearchPageElement', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_search_page_element = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySearchPageElementTableMap::translateFieldName('ElementKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->element_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpySearchPageElementTableMap::translateFieldName('IsElementActive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_element_active = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpySearchPageElementTableMap::translateFieldName('FkSearchDocumentAttribute', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_search_document_attribute = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpySearchPageElementTableMap::translateFieldName('FkSearchPageElementTemplate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_search_page_element_template = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = SpySearchPageElementTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySearchPageElement'), 0, $e);
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
        if ($this->aDocumentAttribute !== null && $this->fk_search_document_attribute !== $this->aDocumentAttribute->getIdSearchDocumentAttribute()) {
            $this->aDocumentAttribute = null;
        }
        if ($this->aElementTemplate !== null && $this->fk_search_page_element_template !== $this->aElementTemplate->getIdSearchPageElementTemplate()) {
            $this->aElementTemplate = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpySearchPageElementTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySearchPageElementQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDocumentAttribute = null;
            $this->aElementTemplate = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySearchPageElement::setDeleted()
     * @see SpySearchPageElement::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchPageElementTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySearchPageElementQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchPageElementTableMap::DATABASE_NAME);
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
                SpySearchPageElementTableMap::addInstanceToPool($this);
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

            if ($this->aDocumentAttribute !== null) {
                if ($this->aDocumentAttribute->isModified() || $this->aDocumentAttribute->isNew()) {
                    $affectedRows += $this->aDocumentAttribute->save($con);
                }
                $this->setDocumentAttribute($this->aDocumentAttribute);
            }

            if ($this->aElementTemplate !== null) {
                if ($this->aElementTemplate->isModified() || $this->aElementTemplate->isNew()) {
                    $affectedRows += $this->aElementTemplate->save($con);
                }
                $this->setElementTemplate($this->aElementTemplate);
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

        $this->modifiedColumns[SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT] = true;
        if (null !== $this->id_search_page_element) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT)) {
            $modifiedColumns[':p' . $index++]  = 'id_search_page_element';
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_ELEMENT_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'element_key';
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_IS_ELEMENT_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'is_element_active';
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_search_document_attribute';
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_search_page_element_template';
        }

        $sql = sprintf(
            'INSERT INTO spy_search_page_element (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_search_page_element':
                        $stmt->bindValue($identifier, $this->id_search_page_element, PDO::PARAM_INT);
                        break;
                    case 'element_key':
                        $stmt->bindValue($identifier, $this->element_key, PDO::PARAM_STR);
                        break;
                    case 'is_element_active':
                        $stmt->bindValue($identifier, (int) $this->is_element_active, PDO::PARAM_INT);
                        break;
                    case 'fk_search_document_attribute':
                        $stmt->bindValue($identifier, $this->fk_search_document_attribute, PDO::PARAM_INT);
                        break;
                    case 'fk_search_page_element_template':
                        $stmt->bindValue($identifier, $this->fk_search_page_element_template, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_search_page_element_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSearchPageElement($pk);

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
        $pos = SpySearchPageElementTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSearchPageElement();
                break;
            case 1:
                return $this->getElementKey();
                break;
            case 2:
                return $this->getIsElementActive();
                break;
            case 3:
                return $this->getFkSearchDocumentAttribute();
                break;
            case 4:
                return $this->getFkSearchPageElementTemplate();
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

        if (isset($alreadyDumpedObjects['SpySearchPageElement'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySearchPageElement'][$this->hashCode()] = true;
        $keys = SpySearchPageElementTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSearchPageElement(),
            $keys[1] => $this->getElementKey(),
            $keys[2] => $this->getIsElementActive(),
            $keys[3] => $this->getFkSearchDocumentAttribute(),
            $keys[4] => $this->getFkSearchPageElementTemplate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aDocumentAttribute) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySearchDocumentAttribute';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_search_document_attribute';
                        break;
                    default:
                        $key = 'SpySearchDocumentAttribute';
                }

                $result[$key] = $this->aDocumentAttribute->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aElementTemplate) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySearchPageElementTemplate';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_search_page_element_template';
                        break;
                    default:
                        $key = 'SpySearchPageElementTemplate';
                }

                $result[$key] = $this->aElementTemplate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Propel\SpySearchPageElement
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySearchPageElementTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySearchPageElement
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdSearchPageElement($value);
                break;
            case 1:
                $this->setElementKey($value);
                break;
            case 2:
                $this->setIsElementActive($value);
                break;
            case 3:
                $this->setFkSearchDocumentAttribute($value);
                break;
            case 4:
                $this->setFkSearchPageElementTemplate($value);
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
        $keys = SpySearchPageElementTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdSearchPageElement($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setElementKey($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIsElementActive($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFkSearchDocumentAttribute($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFkSearchPageElementTemplate($arr[$keys[4]]);
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
     * @return $this|\Propel\SpySearchPageElement The current object, for fluid interface
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
        $criteria = new Criteria(SpySearchPageElementTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT)) {
            $criteria->add(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $this->id_search_page_element);
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_ELEMENT_KEY)) {
            $criteria->add(SpySearchPageElementTableMap::COL_ELEMENT_KEY, $this->element_key);
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_IS_ELEMENT_ACTIVE)) {
            $criteria->add(SpySearchPageElementTableMap::COL_IS_ELEMENT_ACTIVE, $this->is_element_active);
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE)) {
            $criteria->add(SpySearchPageElementTableMap::COL_FK_SEARCH_DOCUMENT_ATTRIBUTE, $this->fk_search_document_attribute);
        }
        if ($this->isColumnModified(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE)) {
            $criteria->add(SpySearchPageElementTableMap::COL_FK_SEARCH_PAGE_ELEMENT_TEMPLATE, $this->fk_search_page_element_template);
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
        $criteria = ChildSpySearchPageElementQuery::create();
        $criteria->add(SpySearchPageElementTableMap::COL_ID_SEARCH_PAGE_ELEMENT, $this->id_search_page_element);

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
        $validPk = null !== $this->getIdSearchPageElement();

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
        return $this->getIdSearchPageElement();
    }

    /**
     * Generic method to set the primary key (id_search_page_element column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSearchPageElement($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdSearchPageElement();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpySearchPageElement (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setElementKey($this->getElementKey());
        $copyObj->setIsElementActive($this->getIsElementActive());
        $copyObj->setFkSearchDocumentAttribute($this->getFkSearchDocumentAttribute());
        $copyObj->setFkSearchPageElementTemplate($this->getFkSearchPageElementTemplate());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSearchPageElement(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpySearchPageElement Clone of current object.
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
     * Declares an association between this object and a ChildSpySearchDocumentAttribute object.
     *
     * @param  ChildSpySearchDocumentAttribute $v
     * @return $this|\Propel\SpySearchPageElement The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDocumentAttribute(ChildSpySearchDocumentAttribute $v = null)
    {
        if ($v === null) {
            $this->setFkSearchDocumentAttribute(NULL);
        } else {
            $this->setFkSearchDocumentAttribute($v->getIdSearchDocumentAttribute());
        }

        $this->aDocumentAttribute = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySearchDocumentAttribute object, it will not be re-added.
        if ($v !== null) {
            $v->addSpySearchPageElement($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySearchDocumentAttribute object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySearchDocumentAttribute The associated ChildSpySearchDocumentAttribute object.
     * @throws PropelException
     */
    public function getDocumentAttribute(ConnectionInterface $con = null)
    {
        if ($this->aDocumentAttribute === null && ($this->fk_search_document_attribute !== null)) {
            $this->aDocumentAttribute = ChildSpySearchDocumentAttributeQuery::create()->findPk($this->fk_search_document_attribute, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDocumentAttribute->addSpySearchPageElements($this);
             */
        }

        return $this->aDocumentAttribute;
    }

    /**
     * Declares an association between this object and a ChildSpySearchPageElementTemplate object.
     *
     * @param  ChildSpySearchPageElementTemplate $v
     * @return $this|\Propel\SpySearchPageElement The current object (for fluent API support)
     * @throws PropelException
     */
    public function setElementTemplate(ChildSpySearchPageElementTemplate $v = null)
    {
        if ($v === null) {
            $this->setFkSearchPageElementTemplate(NULL);
        } else {
            $this->setFkSearchPageElementTemplate($v->getIdSearchPageElementTemplate());
        }

        $this->aElementTemplate = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySearchPageElementTemplate object, it will not be re-added.
        if ($v !== null) {
            $v->addSpySearchPageElement($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySearchPageElementTemplate object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySearchPageElementTemplate The associated ChildSpySearchPageElementTemplate object.
     * @throws PropelException
     */
    public function getElementTemplate(ConnectionInterface $con = null)
    {
        if ($this->aElementTemplate === null && ($this->fk_search_page_element_template !== null)) {
            $this->aElementTemplate = ChildSpySearchPageElementTemplateQuery::create()->findPk($this->fk_search_page_element_template, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aElementTemplate->addSpySearchPageElements($this);
             */
        }

        return $this->aElementTemplate;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aDocumentAttribute) {
            $this->aDocumentAttribute->removeSpySearchPageElement($this);
        }
        if (null !== $this->aElementTemplate) {
            $this->aElementTemplate->removeSpySearchPageElement($this);
        }
        $this->id_search_page_element = null;
        $this->element_key = null;
        $this->is_element_active = null;
        $this->fk_search_document_attribute = null;
        $this->fk_search_page_element_template = null;
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
        } // if ($deep)

        $this->aDocumentAttribute = null;
        $this->aElementTemplate = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySearchPageElementTableMap::DEFAULT_STRING_FORMAT);
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
