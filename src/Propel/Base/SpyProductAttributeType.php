<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductAttributeType as ChildSpyProductAttributeType;
use Propel\SpyProductAttributeTypeQuery as ChildSpyProductAttributeTypeQuery;
use Propel\SpyProductAttributesMetadata as ChildSpyProductAttributesMetadata;
use Propel\SpyProductAttributesMetadataQuery as ChildSpyProductAttributesMetadataQuery;
use Propel\Map\SpyProductAttributeTypeTableMap;
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
 * Base class that represents a row from the 'spy_attribute_type' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyProductAttributeType extends SpyProductAttributeType implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyProductAttributeTypeTableMap';


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
     * The value for the id_type field.
     * @var        int
     */
    protected $id_type;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the fk_parent_type field.
     * @var        int
     */
    protected $fk_parent_type;

    /**
     * The value for the input_representation field.
     * @var        string
     */
    protected $input_representation;

    /**
     * @var        ChildSpyProductAttributeType
     */
    protected $aSpyProductAttributeTypeRelatedByFkParentType;

    /**
     * @var        ObjectCollection|ChildSpyProductAttributesMetadata[] Collection to store aggregation of ChildSpyProductAttributesMetadata objects.
     */
    protected $collSpyProductAttributesMetadatas;
    protected $collSpyProductAttributesMetadatasPartial;

    /**
     * @var        ObjectCollection|ChildSpyProductAttributeType[] Collection to store aggregation of ChildSpyProductAttributeType objects.
     */
    protected $collSpyProductAttributeTypesRelatedByIdType;
    protected $collSpyProductAttributeTypesRelatedByIdTypePartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductAttributesMetadata[]
     */
    protected $spyProductAttributesMetadatasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyProductAttributeType[]
     */
    protected $spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion = null;

    /**
     * Initializes internal state of Propel\Base\SpyProductAttributeType object.
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
     * Compares this with another <code>SpyProductAttributeType</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyProductAttributeType</code>, delegates to
     * <code>equals(SpyProductAttributeType)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyProductAttributeType The current object, for fluid interface
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
     * Get the [id_type] column value.
     *
     * @return int
     */
    public function getIdType()
    {
        return $this->id_type;
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
     * Get the [fk_parent_type] column value.
     *
     * @return int
     */
    public function getFkParentType()
    {
        return $this->fk_parent_type;
    }

    /**
     * Get the [input_representation] column value.
     *
     * @return string
     */
    public function getInputRepresentation()
    {
        return $this->input_representation;
    }

    /**
     * Set the value of [id_type] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductAttributeType The current object (for fluent API support)
     */
    public function setIdType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_type !== $v) {
            $this->id_type = $v;
            $this->modifiedColumns[SpyProductAttributeTypeTableMap::COL_ID_TYPE] = true;
        }

        return $this;
    } // setIdType()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyProductAttributeType The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpyProductAttributeTypeTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [fk_parent_type] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyProductAttributeType The current object (for fluent API support)
     */
    public function setFkParentType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_parent_type !== $v) {
            $this->fk_parent_type = $v;
            $this->modifiedColumns[SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE] = true;
        }

        if ($this->aSpyProductAttributeTypeRelatedByFkParentType !== null && $this->aSpyProductAttributeTypeRelatedByFkParentType->getIdType() !== $v) {
            $this->aSpyProductAttributeTypeRelatedByFkParentType = null;
        }

        return $this;
    } // setFkParentType()

    /**
     * Set the value of [input_representation] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyProductAttributeType The current object (for fluent API support)
     */
    public function setInputRepresentation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->input_representation !== $v) {
            $this->input_representation = $v;
            $this->modifiedColumns[SpyProductAttributeTypeTableMap::COL_INPUT_REPRESENTATION] = true;
        }

        return $this;
    } // setInputRepresentation()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyProductAttributeTypeTableMap::translateFieldName('IdType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyProductAttributeTypeTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyProductAttributeTypeTableMap::translateFieldName('FkParentType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_parent_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyProductAttributeTypeTableMap::translateFieldName('InputRepresentation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->input_representation = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = SpyProductAttributeTypeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyProductAttributeType'), 0, $e);
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
        if ($this->aSpyProductAttributeTypeRelatedByFkParentType !== null && $this->fk_parent_type !== $this->aSpyProductAttributeTypeRelatedByFkParentType->getIdType()) {
            $this->aSpyProductAttributeTypeRelatedByFkParentType = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductAttributeTypeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyProductAttributeTypeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyProductAttributeTypeRelatedByFkParentType = null;
            $this->collSpyProductAttributesMetadatas = null;

            $this->collSpyProductAttributeTypesRelatedByIdType = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyProductAttributeType::setDeleted()
     * @see SpyProductAttributeType::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributeTypeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyProductAttributeTypeQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributeTypeTableMap::DATABASE_NAME);
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
                SpyProductAttributeTypeTableMap::addInstanceToPool($this);
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

            if ($this->aSpyProductAttributeTypeRelatedByFkParentType !== null) {
                if ($this->aSpyProductAttributeTypeRelatedByFkParentType->isModified() || $this->aSpyProductAttributeTypeRelatedByFkParentType->isNew()) {
                    $affectedRows += $this->aSpyProductAttributeTypeRelatedByFkParentType->save($con);
                }
                $this->setSpyProductAttributeTypeRelatedByFkParentType($this->aSpyProductAttributeTypeRelatedByFkParentType);
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

            if ($this->spyProductAttributesMetadatasScheduledForDeletion !== null) {
                if (!$this->spyProductAttributesMetadatasScheduledForDeletion->isEmpty()) {
                    foreach ($this->spyProductAttributesMetadatasScheduledForDeletion as $spyProductAttributesMetadata) {
                        // need to save related object because we set the relation to null
                        $spyProductAttributesMetadata->save($con);
                    }
                    $this->spyProductAttributesMetadatasScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductAttributesMetadatas !== null) {
                foreach ($this->collSpyProductAttributesMetadatas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion !== null) {
                if (!$this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion->isEmpty()) {
                    foreach ($this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion as $spyProductAttributeTypeRelatedByIdType) {
                        // need to save related object because we set the relation to null
                        $spyProductAttributeTypeRelatedByIdType->save($con);
                    }
                    $this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion = null;
                }
            }

            if ($this->collSpyProductAttributeTypesRelatedByIdType !== null) {
                foreach ($this->collSpyProductAttributeTypesRelatedByIdType as $referrerFK) {
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

        $this->modifiedColumns[SpyProductAttributeTypeTableMap::COL_ID_TYPE] = true;

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_ID_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`id_type`';
        }
        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`fk_parent_type`';
        }
        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_INPUT_REPRESENTATION)) {
            $modifiedColumns[':p' . $index++]  = '`input_representation`';
        }

        $sql = sprintf(
            'INSERT INTO `spy_attribute_type` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_type`':
                        $stmt->bindValue($identifier, $this->id_type, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`fk_parent_type`':
                        $stmt->bindValue($identifier, $this->fk_parent_type, PDO::PARAM_INT);
                        break;
                    case '`input_representation`':
                        $stmt->bindValue($identifier, $this->input_representation, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_attribute_type_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        if ($pk !== null) {
            $this->setIdType($pk);
        }

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
        $pos = SpyProductAttributeTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdType();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getFkParentType();
                break;
            case 3:
                return $this->getInputRepresentation();
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

        if (isset($alreadyDumpedObjects['SpyProductAttributeType'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyProductAttributeType'][$this->hashCode()] = true;
        $keys = SpyProductAttributeTypeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdType(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getFkParentType(),
            $keys[3] => $this->getInputRepresentation(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyProductAttributeTypeRelatedByFkParentType) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductAttributeType';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_attribute_type';
                        break;
                    default:
                        $key = 'SpyProductAttributeType';
                }

                $result[$key] = $this->aSpyProductAttributeTypeRelatedByFkParentType->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSpyProductAttributesMetadatas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductAttributesMetadatas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_attributes_metadatas';
                        break;
                    default:
                        $key = 'SpyProductAttributesMetadatas';
                }

                $result[$key] = $this->collSpyProductAttributesMetadatas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSpyProductAttributeTypesRelatedByIdType) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyProductAttributeTypes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_attribute_types';
                        break;
                    default:
                        $key = 'SpyProductAttributeTypes';
                }

                $result[$key] = $this->collSpyProductAttributeTypesRelatedByIdType->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyProductAttributeType
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyProductAttributeTypeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyProductAttributeType
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdType($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setFkParentType($value);
                break;
            case 3:
                $this->setInputRepresentation($value);
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
        $keys = SpyProductAttributeTypeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdType($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkParentType($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInputRepresentation($arr[$keys[3]]);
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
     * @return $this|\Propel\SpyProductAttributeType The current object, for fluid interface
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
        $criteria = new Criteria(SpyProductAttributeTypeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_ID_TYPE)) {
            $criteria->add(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $this->id_type);
        }
        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_NAME)) {
            $criteria->add(SpyProductAttributeTypeTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE)) {
            $criteria->add(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE, $this->fk_parent_type);
        }
        if ($this->isColumnModified(SpyProductAttributeTypeTableMap::COL_INPUT_REPRESENTATION)) {
            $criteria->add(SpyProductAttributeTypeTableMap::COL_INPUT_REPRESENTATION, $this->input_representation);
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
        $criteria = ChildSpyProductAttributeTypeQuery::create();
        $criteria->add(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $this->id_type);

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
        $validPk = null !== $this->getIdType();

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
        return $this->getIdType();
    }

    /**
     * Generic method to set the primary key (id_type column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdType($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdType();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyProductAttributeType (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setFkParentType($this->getFkParentType());
        $copyObj->setInputRepresentation($this->getInputRepresentation());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyProductAttributesMetadatas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductAttributesMetadata($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSpyProductAttributeTypesRelatedByIdType() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyProductAttributeTypeRelatedByIdType($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdType(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyProductAttributeType Clone of current object.
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
     * Declares an association between this object and a ChildSpyProductAttributeType object.
     *
     * @param  ChildSpyProductAttributeType $v
     * @return $this|\Propel\SpyProductAttributeType The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyProductAttributeTypeRelatedByFkParentType(ChildSpyProductAttributeType $v = null)
    {
        if ($v === null) {
            $this->setFkParentType(NULL);
        } else {
            $this->setFkParentType($v->getIdType());
        }

        $this->aSpyProductAttributeTypeRelatedByFkParentType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyProductAttributeType object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyProductAttributeTypeRelatedByIdType($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyProductAttributeType object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyProductAttributeType The associated ChildSpyProductAttributeType object.
     * @throws PropelException
     */
    public function getSpyProductAttributeTypeRelatedByFkParentType(ConnectionInterface $con = null)
    {
        if ($this->aSpyProductAttributeTypeRelatedByFkParentType === null && ($this->fk_parent_type !== null)) {
            $this->aSpyProductAttributeTypeRelatedByFkParentType = ChildSpyProductAttributeTypeQuery::create()->findPk($this->fk_parent_type, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyProductAttributeTypeRelatedByFkParentType->addSpyProductAttributeTypesRelatedByIdType($this);
             */
        }

        return $this->aSpyProductAttributeTypeRelatedByFkParentType;
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
        if ('SpyProductAttributesMetadata' == $relationName) {
            return $this->initSpyProductAttributesMetadatas();
        }
        if ('SpyProductAttributeTypeRelatedByIdType' == $relationName) {
            return $this->initSpyProductAttributeTypesRelatedByIdType();
        }
    }

    /**
     * Clears out the collSpyProductAttributesMetadatas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductAttributesMetadatas()
     */
    public function clearSpyProductAttributesMetadatas()
    {
        $this->collSpyProductAttributesMetadatas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductAttributesMetadatas collection loaded partially.
     */
    public function resetPartialSpyProductAttributesMetadatas($v = true)
    {
        $this->collSpyProductAttributesMetadatasPartial = $v;
    }

    /**
     * Initializes the collSpyProductAttributesMetadatas collection.
     *
     * By default this just sets the collSpyProductAttributesMetadatas collection to an empty array (like clearcollSpyProductAttributesMetadatas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductAttributesMetadatas($overrideExisting = true)
    {
        if (null !== $this->collSpyProductAttributesMetadatas && !$overrideExisting) {
            return;
        }
        $this->collSpyProductAttributesMetadatas = new ObjectCollection();
        $this->collSpyProductAttributesMetadatas->setModel('\Propel\SpyProductAttributesMetadata');
    }

    /**
     * Gets an array of ChildSpyProductAttributesMetadata objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductAttributeType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductAttributesMetadata[] List of ChildSpyProductAttributesMetadata objects
     * @throws PropelException
     */
    public function getSpyProductAttributesMetadatas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductAttributesMetadatasPartial && !$this->isNew();
        if (null === $this->collSpyProductAttributesMetadatas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductAttributesMetadatas) {
                // return empty collection
                $this->initSpyProductAttributesMetadatas();
            } else {
                $collSpyProductAttributesMetadatas = ChildSpyProductAttributesMetadataQuery::create(null, $criteria)
                    ->filterBySpyProductAttributeType($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductAttributesMetadatasPartial && count($collSpyProductAttributesMetadatas)) {
                        $this->initSpyProductAttributesMetadatas(false);

                        foreach ($collSpyProductAttributesMetadatas as $obj) {
                            if (false == $this->collSpyProductAttributesMetadatas->contains($obj)) {
                                $this->collSpyProductAttributesMetadatas->append($obj);
                            }
                        }

                        $this->collSpyProductAttributesMetadatasPartial = true;
                    }

                    return $collSpyProductAttributesMetadatas;
                }

                if ($partial && $this->collSpyProductAttributesMetadatas) {
                    foreach ($this->collSpyProductAttributesMetadatas as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductAttributesMetadatas[] = $obj;
                        }
                    }
                }

                $this->collSpyProductAttributesMetadatas = $collSpyProductAttributesMetadatas;
                $this->collSpyProductAttributesMetadatasPartial = false;
            }
        }

        return $this->collSpyProductAttributesMetadatas;
    }

    /**
     * Sets a collection of ChildSpyProductAttributesMetadata objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductAttributesMetadatas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductAttributeType The current object (for fluent API support)
     */
    public function setSpyProductAttributesMetadatas(Collection $spyProductAttributesMetadatas, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductAttributesMetadata[] $spyProductAttributesMetadatasToDelete */
        $spyProductAttributesMetadatasToDelete = $this->getSpyProductAttributesMetadatas(new Criteria(), $con)->diff($spyProductAttributesMetadatas);


        $this->spyProductAttributesMetadatasScheduledForDeletion = $spyProductAttributesMetadatasToDelete;

        foreach ($spyProductAttributesMetadatasToDelete as $spyProductAttributesMetadataRemoved) {
            $spyProductAttributesMetadataRemoved->setSpyProductAttributeType(null);
        }

        $this->collSpyProductAttributesMetadatas = null;
        foreach ($spyProductAttributesMetadatas as $spyProductAttributesMetadata) {
            $this->addSpyProductAttributesMetadata($spyProductAttributesMetadata);
        }

        $this->collSpyProductAttributesMetadatas = $spyProductAttributesMetadatas;
        $this->collSpyProductAttributesMetadatasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductAttributesMetadata objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductAttributesMetadata objects.
     * @throws PropelException
     */
    public function countSpyProductAttributesMetadatas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductAttributesMetadatasPartial && !$this->isNew();
        if (null === $this->collSpyProductAttributesMetadatas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductAttributesMetadatas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductAttributesMetadatas());
            }

            $query = ChildSpyProductAttributesMetadataQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductAttributeType($this)
                ->count($con);
        }

        return count($this->collSpyProductAttributesMetadatas);
    }

    /**
     * Method called to associate a ChildSpyProductAttributesMetadata object to this object
     * through the ChildSpyProductAttributesMetadata foreign key attribute.
     *
     * @param  ChildSpyProductAttributesMetadata $l ChildSpyProductAttributesMetadata
     * @return $this|\Propel\SpyProductAttributeType The current object (for fluent API support)
     */
    public function addSpyProductAttributesMetadata(ChildSpyProductAttributesMetadata $l)
    {
        if ($this->collSpyProductAttributesMetadatas === null) {
            $this->initSpyProductAttributesMetadatas();
            $this->collSpyProductAttributesMetadatasPartial = true;
        }

        if (!$this->collSpyProductAttributesMetadatas->contains($l)) {
            $this->doAddSpyProductAttributesMetadata($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductAttributesMetadata $spyProductAttributesMetadata The ChildSpyProductAttributesMetadata object to add.
     */
    protected function doAddSpyProductAttributesMetadata(ChildSpyProductAttributesMetadata $spyProductAttributesMetadata)
    {
        $this->collSpyProductAttributesMetadatas[]= $spyProductAttributesMetadata;
        $spyProductAttributesMetadata->setSpyProductAttributeType($this);
    }

    /**
     * @param  ChildSpyProductAttributesMetadata $spyProductAttributesMetadata The ChildSpyProductAttributesMetadata object to remove.
     * @return $this|ChildSpyProductAttributeType The current object (for fluent API support)
     */
    public function removeSpyProductAttributesMetadata(ChildSpyProductAttributesMetadata $spyProductAttributesMetadata)
    {
        if ($this->getSpyProductAttributesMetadatas()->contains($spyProductAttributesMetadata)) {
            $pos = $this->collSpyProductAttributesMetadatas->search($spyProductAttributesMetadata);
            $this->collSpyProductAttributesMetadatas->remove($pos);
            if (null === $this->spyProductAttributesMetadatasScheduledForDeletion) {
                $this->spyProductAttributesMetadatasScheduledForDeletion = clone $this->collSpyProductAttributesMetadatas;
                $this->spyProductAttributesMetadatasScheduledForDeletion->clear();
            }
            $this->spyProductAttributesMetadatasScheduledForDeletion[]= $spyProductAttributesMetadata;
            $spyProductAttributesMetadata->setSpyProductAttributeType(null);
        }

        return $this;
    }

    /**
     * Clears out the collSpyProductAttributeTypesRelatedByIdType collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyProductAttributeTypesRelatedByIdType()
     */
    public function clearSpyProductAttributeTypesRelatedByIdType()
    {
        $this->collSpyProductAttributeTypesRelatedByIdType = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyProductAttributeTypesRelatedByIdType collection loaded partially.
     */
    public function resetPartialSpyProductAttributeTypesRelatedByIdType($v = true)
    {
        $this->collSpyProductAttributeTypesRelatedByIdTypePartial = $v;
    }

    /**
     * Initializes the collSpyProductAttributeTypesRelatedByIdType collection.
     *
     * By default this just sets the collSpyProductAttributeTypesRelatedByIdType collection to an empty array (like clearcollSpyProductAttributeTypesRelatedByIdType());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyProductAttributeTypesRelatedByIdType($overrideExisting = true)
    {
        if (null !== $this->collSpyProductAttributeTypesRelatedByIdType && !$overrideExisting) {
            return;
        }
        $this->collSpyProductAttributeTypesRelatedByIdType = new ObjectCollection();
        $this->collSpyProductAttributeTypesRelatedByIdType->setModel('\Propel\SpyProductAttributeType');
    }

    /**
     * Gets an array of ChildSpyProductAttributeType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyProductAttributeType is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyProductAttributeType[] List of ChildSpyProductAttributeType objects
     * @throws PropelException
     */
    public function getSpyProductAttributeTypesRelatedByIdType(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductAttributeTypesRelatedByIdTypePartial && !$this->isNew();
        if (null === $this->collSpyProductAttributeTypesRelatedByIdType || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyProductAttributeTypesRelatedByIdType) {
                // return empty collection
                $this->initSpyProductAttributeTypesRelatedByIdType();
            } else {
                $collSpyProductAttributeTypesRelatedByIdType = ChildSpyProductAttributeTypeQuery::create(null, $criteria)
                    ->filterBySpyProductAttributeTypeRelatedByFkParentType($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyProductAttributeTypesRelatedByIdTypePartial && count($collSpyProductAttributeTypesRelatedByIdType)) {
                        $this->initSpyProductAttributeTypesRelatedByIdType(false);

                        foreach ($collSpyProductAttributeTypesRelatedByIdType as $obj) {
                            if (false == $this->collSpyProductAttributeTypesRelatedByIdType->contains($obj)) {
                                $this->collSpyProductAttributeTypesRelatedByIdType->append($obj);
                            }
                        }

                        $this->collSpyProductAttributeTypesRelatedByIdTypePartial = true;
                    }

                    return $collSpyProductAttributeTypesRelatedByIdType;
                }

                if ($partial && $this->collSpyProductAttributeTypesRelatedByIdType) {
                    foreach ($this->collSpyProductAttributeTypesRelatedByIdType as $obj) {
                        if ($obj->isNew()) {
                            $collSpyProductAttributeTypesRelatedByIdType[] = $obj;
                        }
                    }
                }

                $this->collSpyProductAttributeTypesRelatedByIdType = $collSpyProductAttributeTypesRelatedByIdType;
                $this->collSpyProductAttributeTypesRelatedByIdTypePartial = false;
            }
        }

        return $this->collSpyProductAttributeTypesRelatedByIdType;
    }

    /**
     * Sets a collection of ChildSpyProductAttributeType objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyProductAttributeTypesRelatedByIdType A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyProductAttributeType The current object (for fluent API support)
     */
    public function setSpyProductAttributeTypesRelatedByIdType(Collection $spyProductAttributeTypesRelatedByIdType, ConnectionInterface $con = null)
    {
        /** @var ChildSpyProductAttributeType[] $spyProductAttributeTypesRelatedByIdTypeToDelete */
        $spyProductAttributeTypesRelatedByIdTypeToDelete = $this->getSpyProductAttributeTypesRelatedByIdType(new Criteria(), $con)->diff($spyProductAttributeTypesRelatedByIdType);


        $this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion = $spyProductAttributeTypesRelatedByIdTypeToDelete;

        foreach ($spyProductAttributeTypesRelatedByIdTypeToDelete as $spyProductAttributeTypeRelatedByIdTypeRemoved) {
            $spyProductAttributeTypeRelatedByIdTypeRemoved->setSpyProductAttributeTypeRelatedByFkParentType(null);
        }

        $this->collSpyProductAttributeTypesRelatedByIdType = null;
        foreach ($spyProductAttributeTypesRelatedByIdType as $spyProductAttributeTypeRelatedByIdType) {
            $this->addSpyProductAttributeTypeRelatedByIdType($spyProductAttributeTypeRelatedByIdType);
        }

        $this->collSpyProductAttributeTypesRelatedByIdType = $spyProductAttributeTypesRelatedByIdType;
        $this->collSpyProductAttributeTypesRelatedByIdTypePartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyProductAttributeType objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyProductAttributeType objects.
     * @throws PropelException
     */
    public function countSpyProductAttributeTypesRelatedByIdType(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyProductAttributeTypesRelatedByIdTypePartial && !$this->isNew();
        if (null === $this->collSpyProductAttributeTypesRelatedByIdType || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyProductAttributeTypesRelatedByIdType) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyProductAttributeTypesRelatedByIdType());
            }

            $query = ChildSpyProductAttributeTypeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyProductAttributeTypeRelatedByFkParentType($this)
                ->count($con);
        }

        return count($this->collSpyProductAttributeTypesRelatedByIdType);
    }

    /**
     * Method called to associate a ChildSpyProductAttributeType object to this object
     * through the ChildSpyProductAttributeType foreign key attribute.
     *
     * @param  ChildSpyProductAttributeType $l ChildSpyProductAttributeType
     * @return $this|\Propel\SpyProductAttributeType The current object (for fluent API support)
     */
    public function addSpyProductAttributeTypeRelatedByIdType(ChildSpyProductAttributeType $l)
    {
        if ($this->collSpyProductAttributeTypesRelatedByIdType === null) {
            $this->initSpyProductAttributeTypesRelatedByIdType();
            $this->collSpyProductAttributeTypesRelatedByIdTypePartial = true;
        }

        if (!$this->collSpyProductAttributeTypesRelatedByIdType->contains($l)) {
            $this->doAddSpyProductAttributeTypeRelatedByIdType($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyProductAttributeType $spyProductAttributeTypeRelatedByIdType The ChildSpyProductAttributeType object to add.
     */
    protected function doAddSpyProductAttributeTypeRelatedByIdType(ChildSpyProductAttributeType $spyProductAttributeTypeRelatedByIdType)
    {
        $this->collSpyProductAttributeTypesRelatedByIdType[]= $spyProductAttributeTypeRelatedByIdType;
        $spyProductAttributeTypeRelatedByIdType->setSpyProductAttributeTypeRelatedByFkParentType($this);
    }

    /**
     * @param  ChildSpyProductAttributeType $spyProductAttributeTypeRelatedByIdType The ChildSpyProductAttributeType object to remove.
     * @return $this|ChildSpyProductAttributeType The current object (for fluent API support)
     */
    public function removeSpyProductAttributeTypeRelatedByIdType(ChildSpyProductAttributeType $spyProductAttributeTypeRelatedByIdType)
    {
        if ($this->getSpyProductAttributeTypesRelatedByIdType()->contains($spyProductAttributeTypeRelatedByIdType)) {
            $pos = $this->collSpyProductAttributeTypesRelatedByIdType->search($spyProductAttributeTypeRelatedByIdType);
            $this->collSpyProductAttributeTypesRelatedByIdType->remove($pos);
            if (null === $this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion) {
                $this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion = clone $this->collSpyProductAttributeTypesRelatedByIdType;
                $this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion->clear();
            }
            $this->spyProductAttributeTypesRelatedByIdTypeScheduledForDeletion[]= $spyProductAttributeTypeRelatedByIdType;
            $spyProductAttributeTypeRelatedByIdType->setSpyProductAttributeTypeRelatedByFkParentType(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyProductAttributeTypeRelatedByFkParentType) {
            $this->aSpyProductAttributeTypeRelatedByFkParentType->removeSpyProductAttributeTypeRelatedByIdType($this);
        }
        $this->id_type = null;
        $this->name = null;
        $this->fk_parent_type = null;
        $this->input_representation = null;
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
            if ($this->collSpyProductAttributesMetadatas) {
                foreach ($this->collSpyProductAttributesMetadatas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSpyProductAttributeTypesRelatedByIdType) {
                foreach ($this->collSpyProductAttributeTypesRelatedByIdType as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyProductAttributesMetadatas = null;
        $this->collSpyProductAttributeTypesRelatedByIdType = null;
        $this->aSpyProductAttributeTypeRelatedByFkParentType = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyProductAttributeTypeTableMap::DEFAULT_STRING_FORMAT);
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
