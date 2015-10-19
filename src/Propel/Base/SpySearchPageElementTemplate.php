<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySearchPageElement as ChildSpySearchPageElement;
use Propel\SpySearchPageElementQuery as ChildSpySearchPageElementQuery;
use Propel\SpySearchPageElementTemplate as ChildSpySearchPageElementTemplate;
use Propel\SpySearchPageElementTemplateQuery as ChildSpySearchPageElementTemplateQuery;
use Propel\Map\SpySearchPageElementTemplateTableMap;
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

/**
 * Base class that represents a row from the 'spy_search_page_element_template' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpySearchPageElementTemplate extends SpySearchPageElementTemplate implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpySearchPageElementTemplateTableMap';


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
     * The value for the id_search_page_element_template field.
     * @var        int
     */
    protected $id_search_page_element_template;

    /**
     * The value for the template_name field.
     * @var        string
     */
    protected $template_name;

    /**
     * @var        ObjectCollection|ChildSpySearchPageElement[] Collection to store aggregation of ChildSpySearchPageElement objects.
     */
    protected $collSpySearchPageElements;
    protected $collSpySearchPageElementsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySearchPageElement[]
     */
    protected $spySearchPageElementsScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpySearchPageElementTemplate object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>SpySearchPageElementTemplate</code> instance.  If
     * <code>obj</code> is an instance of <code>SpySearchPageElementTemplate</code>, delegates to
     * <code>equals(SpySearchPageElementTemplate)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpySearchPageElementTemplate The current object, for fluid interface
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
     * Get the [id_search_page_element_template] column value.
     *
     * @return int
     */
    public function getIdSearchPageElementTemplate()
    {
        return $this->id_search_page_element_template;
    }

    /**
     * Get the [template_name] column value.
     *
     * @return string
     */
    public function getTemplateName()
    {
        return $this->template_name;
    }

    /**
     * Set the value of [id_search_page_element_template] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpySearchPageElementTemplate The current object (for fluent API support)
     */
    public function setIdSearchPageElementTemplate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_search_page_element_template !== $v) {
            $this->id_search_page_element_template = $v;
            $this->modifiedColumns[SpySearchPageElementTemplateTableMap::COL_ID_SEARCH_PAGE_ELEMENT_TEMPLATE] = true;
        }

        return $this;
    } // setIdSearchPageElementTemplate()

    /**
     * Set the value of [template_name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpySearchPageElementTemplate The current object (for fluent API support)
     */
    public function setTemplateName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->template_name !== $v) {
            $this->template_name = $v;
            $this->modifiedColumns[SpySearchPageElementTemplateTableMap::COL_TEMPLATE_NAME] = true;
        }

        return $this;
    } // setTemplateName()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpySearchPageElementTemplateTableMap::translateFieldName('IdSearchPageElementTemplate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_search_page_element_template = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpySearchPageElementTemplateTableMap::translateFieldName('TemplateName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->template_name = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 2; // 2 = SpySearchPageElementTemplateTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpySearchPageElementTemplate'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpySearchPageElementTemplateTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpySearchPageElementTemplateQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSpySearchPageElements = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpySearchPageElementTemplate::setDeleted()
     * @see SpySearchPageElementTemplate::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchPageElementTemplateTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpySearchPageElementTemplateQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchPageElementTemplateTableMap::DATABASE_NAME);
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
                SpySearchPageElementTemplateTableMap::addInstanceToPool($this);
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

            if ($this->spySearchPageElementsScheduledForDeletion !== null) {
                if (!$this->spySearchPageElementsScheduledForDeletion->isEmpty()) {
                    \Propel\SpySearchPageElementQuery::create()
                        ->filterByPrimaryKeys($this->spySearchPageElementsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->spySearchPageElementsScheduledForDeletion = null;
                }
            }

            if ($this->collSpySearchPageElements !== null) {
                foreach ($this->collSpySearchPageElements as $referrerFK) {
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

        $this->modifiedColumns[SpySearchPageElementTemplateTableMap::COL_ID_SEARCH_PAGE_ELEMENT_TEMPLATE] = true;
        if (null !== $this->id_search_page_element_template) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpySearchPageElementTemplateTableMap::COL_ID_SEARCH_PAGE_ELEMENT_TEMPLATE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpySearchPageElementTemplateTableMap::COL_ID_SEARCH_PAGE_ELEMENT_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = 'id_search_page_element_template';
        }
        if ($this->isColumnModified(SpySearchPageElementTemplateTableMap::COL_TEMPLATE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'template_name';
        }

        $sql = sprintf(
            'INSERT INTO spy_search_page_element_template (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_search_page_element_template':
                        $stmt->bindValue($identifier, $this->id_search_page_element_template, PDO::PARAM_INT);
                        break;
                    case 'template_name':
                        $stmt->bindValue($identifier, $this->template_name, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_search_page_element_template_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdSearchPageElementTemplate($pk);

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
        $pos = SpySearchPageElementTemplateTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSearchPageElementTemplate();
                break;
            case 1:
                return $this->getTemplateName();
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

        if (isset($alreadyDumpedObjects['SpySearchPageElementTemplate'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpySearchPageElementTemplate'][$this->hashCode()] = true;
        $keys = SpySearchPageElementTemplateTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSearchPageElementTemplate(),
            $keys[1] => $this->getTemplateName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSpySearchPageElements) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySearchPageElements';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_search_page_elements';
                        break;
                    default:
                        $key = 'SpySearchPageElements';
                }

                $result[$key] = $this->collSpySearchPageElements->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpySearchPageElementTemplate
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpySearchPageElementTemplateTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpySearchPageElementTemplate
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdSearchPageElementTemplate($value);
                break;
            case 1:
                $this->setTemplateName($value);
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
        $keys = SpySearchPageElementTemplateTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdSearchPageElementTemplate($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTemplateName($arr[$keys[1]]);
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
     * @return $this|\Propel\SpySearchPageElementTemplate The current object, for fluid interface
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
        $criteria = new Criteria(SpySearchPageElementTemplateTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpySearchPageElementTemplateTableMap::COL_ID_SEARCH_PAGE_ELEMENT_TEMPLATE)) {
            $criteria->add(SpySearchPageElementTemplateTableMap::COL_ID_SEARCH_PAGE_ELEMENT_TEMPLATE, $this->id_search_page_element_template);
        }
        if ($this->isColumnModified(SpySearchPageElementTemplateTableMap::COL_TEMPLATE_NAME)) {
            $criteria->add(SpySearchPageElementTemplateTableMap::COL_TEMPLATE_NAME, $this->template_name);
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
        $criteria = ChildSpySearchPageElementTemplateQuery::create();
        $criteria->add(SpySearchPageElementTemplateTableMap::COL_ID_SEARCH_PAGE_ELEMENT_TEMPLATE, $this->id_search_page_element_template);

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
        $validPk = null !== $this->getIdSearchPageElementTemplate();

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
        return $this->getIdSearchPageElementTemplate();
    }

    /**
     * Generic method to set the primary key (id_search_page_element_template column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSearchPageElementTemplate($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdSearchPageElementTemplate();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpySearchPageElementTemplate (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTemplateName($this->getTemplateName());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpySearchPageElements() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpySearchPageElement($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSearchPageElementTemplate(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpySearchPageElementTemplate Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('SpySearchPageElement' == $relationName) {
            return $this->initSpySearchPageElements();
        }
    }

    /**
     * Clears out the collSpySearchPageElements collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpySearchPageElements()
     */
    public function clearSpySearchPageElements()
    {
        $this->collSpySearchPageElements = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpySearchPageElements collection loaded partially.
     */
    public function resetPartialSpySearchPageElements($v = true)
    {
        $this->collSpySearchPageElementsPartial = $v;
    }

    /**
     * Initializes the collSpySearchPageElements collection.
     *
     * By default this just sets the collSpySearchPageElements collection to an empty array (like clearcollSpySearchPageElements());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpySearchPageElements($overrideExisting = true)
    {
        if (null !== $this->collSpySearchPageElements && !$overrideExisting) {
            return;
        }
        $this->collSpySearchPageElements = new ObjectCollection();
        $this->collSpySearchPageElements->setModel('\Propel\SpySearchPageElement');
    }

    /**
     * Gets an array of ChildSpySearchPageElement objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpySearchPageElementTemplate is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySearchPageElement[] List of ChildSpySearchPageElement objects
     * @throws PropelException
     */
    public function getSpySearchPageElements(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySearchPageElementsPartial && !$this->isNew();
        if (null === $this->collSpySearchPageElements || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpySearchPageElements) {
                // return empty collection
                $this->initSpySearchPageElements();
            } else {
                $collSpySearchPageElements = ChildSpySearchPageElementQuery::create(null, $criteria)
                    ->filterByElementTemplate($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpySearchPageElementsPartial && count($collSpySearchPageElements)) {
                        $this->initSpySearchPageElements(false);

                        foreach ($collSpySearchPageElements as $obj) {
                            if (false == $this->collSpySearchPageElements->contains($obj)) {
                                $this->collSpySearchPageElements->append($obj);
                            }
                        }

                        $this->collSpySearchPageElementsPartial = true;
                    }

                    return $collSpySearchPageElements;
                }

                if ($partial && $this->collSpySearchPageElements) {
                    foreach ($this->collSpySearchPageElements as $obj) {
                        if ($obj->isNew()) {
                            $collSpySearchPageElements[] = $obj;
                        }
                    }
                }

                $this->collSpySearchPageElements = $collSpySearchPageElements;
                $this->collSpySearchPageElementsPartial = false;
            }
        }

        return $this->collSpySearchPageElements;
    }

    /**
     * Sets a collection of ChildSpySearchPageElement objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spySearchPageElements A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpySearchPageElementTemplate The current object (for fluent API support)
     */
    public function setSpySearchPageElements(Collection $spySearchPageElements, ConnectionInterface $con = null)
    {
        /** @var ChildSpySearchPageElement[] $spySearchPageElementsToDelete */
        $spySearchPageElementsToDelete = $this->getSpySearchPageElements(new Criteria(), $con)->diff($spySearchPageElements);


        $this->spySearchPageElementsScheduledForDeletion = $spySearchPageElementsToDelete;

        foreach ($spySearchPageElementsToDelete as $spySearchPageElementRemoved) {
            $spySearchPageElementRemoved->setElementTemplate(null);
        }

        $this->collSpySearchPageElements = null;
        foreach ($spySearchPageElements as $spySearchPageElement) {
            $this->addSpySearchPageElement($spySearchPageElement);
        }

        $this->collSpySearchPageElements = $spySearchPageElements;
        $this->collSpySearchPageElementsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySearchPageElement objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySearchPageElement objects.
     * @throws PropelException
     */
    public function countSpySearchPageElements(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpySearchPageElementsPartial && !$this->isNew();
        if (null === $this->collSpySearchPageElements || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpySearchPageElements) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpySearchPageElements());
            }

            $query = ChildSpySearchPageElementQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByElementTemplate($this)
                ->count($con);
        }

        return count($this->collSpySearchPageElements);
    }

    /**
     * Method called to associate a ChildSpySearchPageElement object to this object
     * through the ChildSpySearchPageElement foreign key attribute.
     *
     * @param  ChildSpySearchPageElement $l ChildSpySearchPageElement
     * @return $this|\Propel\SpySearchPageElementTemplate The current object (for fluent API support)
     */
    public function addSpySearchPageElement(ChildSpySearchPageElement $l)
    {
        if ($this->collSpySearchPageElements === null) {
            $this->initSpySearchPageElements();
            $this->collSpySearchPageElementsPartial = true;
        }

        if (!$this->collSpySearchPageElements->contains($l)) {
            $this->doAddSpySearchPageElement($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySearchPageElement $spySearchPageElement The ChildSpySearchPageElement object to add.
     */
    protected function doAddSpySearchPageElement(ChildSpySearchPageElement $spySearchPageElement)
    {
        $this->collSpySearchPageElements[]= $spySearchPageElement;
        $spySearchPageElement->setElementTemplate($this);
    }

    /**
     * @param  ChildSpySearchPageElement $spySearchPageElement The ChildSpySearchPageElement object to remove.
     * @return $this|ChildSpySearchPageElementTemplate The current object (for fluent API support)
     */
    public function removeSpySearchPageElement(ChildSpySearchPageElement $spySearchPageElement)
    {
        if ($this->getSpySearchPageElements()->contains($spySearchPageElement)) {
            $pos = $this->collSpySearchPageElements->search($spySearchPageElement);
            $this->collSpySearchPageElements->remove($pos);
            if (null === $this->spySearchPageElementsScheduledForDeletion) {
                $this->spySearchPageElementsScheduledForDeletion = clone $this->collSpySearchPageElements;
                $this->spySearchPageElementsScheduledForDeletion->clear();
            }
            $this->spySearchPageElementsScheduledForDeletion[]= clone $spySearchPageElement;
            $spySearchPageElement->setElementTemplate(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpySearchPageElementTemplate is new, it will return
     * an empty collection; or if this SpySearchPageElementTemplate has previously
     * been saved, it will retrieve related SpySearchPageElements from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpySearchPageElementTemplate.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySearchPageElement[] List of ChildSpySearchPageElement objects
     */
    public function getSpySearchPageElementsJoinDocumentAttribute(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySearchPageElementQuery::create(null, $criteria);
        $query->joinWith('DocumentAttribute', $joinBehavior);

        return $this->getSpySearchPageElements($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id_search_page_element_template = null;
        $this->template_name = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
            if ($this->collSpySearchPageElements) {
                foreach ($this->collSpySearchPageElements as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpySearchPageElements = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpySearchPageElementTemplateTableMap::DEFAULT_STRING_FORMAT);
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
